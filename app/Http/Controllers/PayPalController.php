<?php

namespace App\Http\Controllers;

use App\Models\PaySlip;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Session;
use App\Models\Plan;
use App\Models\Subcription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

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
            Log::info('Create Transaction Function', array('Exception' => $e->getMessage()));
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
            if (!$request->has('plan')) {
                redirect()->route('prizing')->with('error', 'Please choose plan.');
            }
            $planDetail = Plan::find($request->plan);
            if (!$planDetail) {
                redirect()->route('prizing')->with('error', 'Please choose plan.');
            }
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction', $request->plan, $request->type),
                    "cancel_url" => route('cancelTransaction'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $planDetail->price
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {
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
            Log::info('Process Transaction Function', array('Exception' => $e->getMessage()));
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request, $planId, $type)
    {
        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
            $response = $provider->capturePaymentOrder($request['token']);

            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                $planDetail = Plan::find($planId);
                $countryObj = PaySlip::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
                $subcriptionObj = Subcription::where(['plan_id' => $planId, 'country' => $type  ])->where('expiry_date', '>', Carbon::now())->first();
                if (!$subcriptionObj) {
                    $subcriptionObj = new Subcription;
                }
                $subcriptionObj->user_id = Auth::user()->id;
                $subcriptionObj->plan_id = $planDetail->id;
                $subcriptionObj->country = $countryObj->type;
                $subcriptionObj->transaction_id = $response['id'];
                $subcriptionObj->start_date = Carbon::now();
                if ($planDetail->plan_duration == '24') {
                    $subcriptionObj->expiry_date = Carbon::now()->addDay();
                } else if ($planDetail->plan_duration == '1') {
                    $subcriptionObj->expiry_date = Carbon::now()->addMonth();
                } else {
                    $subcriptionObj->expiry_date = Carbon::now()->addMonths($planDetail->plan_duration);
                }

                $subcriptionObj->transaction_status = $response['status'] ?? '';
                if ($subcriptionObj->save()) {
                    $userObj = User::find(Auth::user()->id);
                    $userObj->expiryDate = $subcriptionObj->expiry_date;
                    if ($userObj->save()) {
                        $invoice = invoiceMail(Auth::user()->id);
                    }
                }
                if ($invoice == 'success') {
                    return redirect()->route('profile')->with('message', $response['message'] ?? 'Transaction completed successfully');
                }
            } else {
                return redirect()->back()->with('message', $response['message'] ?? 'Something went wrong. Please try again later');
            }
        } catch (\Exception $e) {
            Log::info('Success Transaction Function', array('Exception' => $e->getMessage()));
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
                case "hourly":
                    return $expiryDate->addHours($planDetail->plan_duration);
                    break;
                case "daily":
                    return $expiryDate->addDay($planDetail->plan_duration);
                    break;
                case "monthly":
                    return $expiryDate->addMonths($planDetail->plan_duration);
                    break;
                case "yearly":
                    return $expiryDate->addYears($planDetail->plan_duration);
                    break;
                default:
                    return $expiryDate;
            }
        } catch (\Exception $e) {
            Log::info('Get ExpiryDate Function', array('Exception' => $e->getMessage()));
        }
    }

    // Function check user expiry of subcription
    public function checkExpiry()
    {
        try {
            $subcriberData = User::where('expiryDate', '!=', '')->where('expiryDate', '<=', Carbon::now())->get();
            foreach ($subcriberData as $key => $user) {
                User::where('id', $user->id)->update(['expiryDate' => '']);
            }
            Log::info('Check Expiry Message', array('Success' => 'Cron successfully completed on ' . Carbon::now()));
        } catch (\Exception $e) {
            Log::info('Check Expiry Message', array('Exception' => $e->getMessage()));
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
                ->with('error', $response['message'] ?? 'you have cancelled the transaction.');
        } catch (\Exception $e) {
            Log::info('Cancel Transaction Function', array('Exception' => $e->getMessage()));
        }
    }
}
