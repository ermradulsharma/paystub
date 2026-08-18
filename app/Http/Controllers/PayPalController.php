<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        try {
            return redirect()->route('prizing')->with('error', 'Something went wrong.');
        } catch (\Exception $e) {
            Log::info('Create Transaction Function', ['Exception' => $e->getMessage()]);
        }
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        try {
            if (! $request->has('plan')) {
                return redirect()->route('prizing')->with('error', 'Please choose plan.');
            }
            $planDetail = Plan::find($request->plan);
            if (! $planDetail) {
                return redirect()->route('prizing')->with('error', 'Please choose plan.');
            }
            if ($request->type != '') {
                $req = $request->plan.'&'.$request->type;
            } else {
                // $req = $request->plan . '&' . $request->id;
                $req = $request->plan.'&'.$request->id;
            }
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('successTransaction', $req),
                    'cancel_url' => route('cancelTransaction'),
                ],
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => $planDetail->price,
                        ],
                    ],
                ],
            ]);

            if (isset($response['id']) && $response['id'] != null) {
                // return $response;
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()->route('createTransaction')->with('error', 'Something went wrong.');
            } else {
                return redirect()->route('createTransaction')->with('error', $response['message'] ?? 'Something went wrong.');
            }
        } catch (Exception $e) {
            Log::info('Process Transaction Function', ['Exception' => $e->getMessage()]);
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request, $details)
    {
        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
            $response = $provider->capturePaymentOrder($request['token']);
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                $xolode = explode('&', $details);
                $planDetail = Plan::find($xolode[0]);

                if (! $planDetail) {
                    return redirect()->route('prizing')->with('error', 'Plan not found.');
                }

                if (intval($xolode[1])) {
                    $subcriptionObj = Subscription::where(['id' => $xolode[1], 'user_id' => Auth::id()])->first();
                } else {
                    $subcriptionObj = Subscription::where(['plan_id' => $xolode[0], 'user_id' => Auth::id()])->where('expiry_date', '<', Carbon::now())->first();
                }
                \Illuminate\Support\Facades\DB::transaction(function () use (&$subcriptionObj, $planDetail, $xolode, $response) {
                    if (! $subcriptionObj) {
                        $subcriptionObj = new Subscription;
                    }
                    if (! $subcriptionObj->exists) {
                        $subcriptionObj->user_id = Auth::id();
                    }
                    $subcriptionObj->plan_id = $planDetail->id;
                    if (intval($xolode[1])) {
                        $subcriptionObj->country = $subcriptionObj->country;
                    } else {
                        $subcriptionObj->country = $xolode[1];
                    }

                    $subcriptionObj->transaction_id = $response['id'];
                    $subcriptionObj->start_date = Carbon::now();
                    if ($planDetail->plan_duration == '24') {
                        $subcriptionObj->expiry_date = Carbon::now()->addDay();
                    } elseif ($planDetail->plan_duration == '1') {
                        $subcriptionObj->expiry_date = Carbon::now()->addMonth();
                    } else {
                        $subcriptionObj->expiry_date = Carbon::now()->addMonths($planDetail->plan_duration);
                    }
                    $subcriptionObj->transaction_status = $response['status'] ?? '';
                    $subcriptionObj->device_type = 'website';
                    $subcriptionObj->save();

                    $userObj = User::find(Auth::id());
                    if ($userObj) {
                        if ($subcriptionObj->country == 'usa') {
                            $userObj->usa_expiry_date = $subcriptionObj->expiry_date ?? '';
                        } elseif ($subcriptionObj->country == 'uk') {
                            $userObj->uk_expiry_date = $subcriptionObj->expiry_date ?? '';
                        } elseif ($subcriptionObj->country == 'canada') {
                            $userObj->canada_expiry_date = $subcriptionObj->expiry_date ?? '';
                        }
                        $userObj->save();
                        invoiceMail(Auth::id(), $subcriptionObj->country);
                    }
                });
                return redirect()->route('profile')->with('message', $response['message'] ?? 'Transaction completed successfully');
            } else {
                return redirect()->back()->with('message', $response['message'] ?? 'Something went wrong. Please try again later');
            }
        } catch (\Exception $e) {
            Log::info('Success Transaction Function', ['Exception' => $e->getMessage()]);

            return redirect(route('prizing'));
        }
    }

    // Function for get expiry date according to subcription plan
    private function getExpiryDate($planDetail)
    {
        try {
            $planDetail = Plan::find($planDetail);
            $expiryDate = Carbon::now();
            switch ($planDetail->plan_type) {
                case 'hourly':
                    return $expiryDate->addHours($planDetail->plan_duration);
                    break;
                case 'daily':
                    return $expiryDate->addDay($planDetail->plan_duration);
                    break;
                case 'monthly':
                    return $expiryDate->addMonths($planDetail->plan_duration);
                    break;
                case 'yearly':
                    return $expiryDate->addYears($planDetail->plan_duration);
                    break;
                default:
                    return $expiryDate;
            }
        } catch (\Exception $e) {
            Log::info('Get ExpiryDate Function', ['Exception' => $e->getMessage()]);
        }
    }

    // Function check user expiry of subcription
    public function checkExpiry()
    {
        try {
            $subcriberData = User::where('usa_expiry_date', '<=', Carbon::now())->orWhere('uk_expiry_date', '<=', Carbon::now())->orWhere('canada_expiry_date', '<=', Carbon::now())->get();
            foreach ($subcriberData as $key => $user) {
                User::where('id', $user->id)->update(['expiryDate' => '']);
            }
            Log::info('Check Expiry Message', ['Success' => 'Cron successfully completed on '.Carbon::now()]);
        } catch (\Exception $e) {
            Log::info('Check Expiry Message', ['Exception' => $e->getMessage()]);
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        try {
            return redirect()
                ->route('prizing')
                ->with('error', 'You have cancelled the transaction.');
        } catch (\Exception $e) {
            Log::info('Cancel Transaction Function', ['Exception' => $e->getMessage()]);
        }
    }
}
