<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Session;
use App\Models\Plan;
use App\Models\Subcription;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        if(Session::has('error')){
            dd(Session::get('error'));
        }

        if(Session::has('success')){
            dd(Session::get('success'));
        }
    }
    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        if(!$request->has('plan')){
            redirect()
                ->route('prizing')
                ->with('error', 'Please choose plan.');
        }
        $planId = $request->plan;
        $planDetail = Plan::where('id',$planId)->first();
        if(!$planDetail){
            redirect()
            ->route('prizing')
            ->with('error', 'Please choose plan.');
        }
        $price = $planDetail->price;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction',$planId),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $price
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
            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request,$planId)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $expiry_date = date('Y-m-d H:i:s');
            $planDetail = Plan::where('id',$planId)->first();
            $expiry_date = date('Y-m-d', strtotime("+".$planDetail->plan_duration)).' 23:59:59';
            if($planDetail->plan_duration == 'unlimited'){
                $expiry_date = '';
            }else if($planDetail->plan_duration == '24 Hours'){
                $expiry_date = date('Y-m-d').' 23:59:59';
            }
            $subcriptionObj                         = new Subcription();
            $subcriptionObj->user_id                = Auth::user()->id;
            $subcriptionObj->plan_id                = $planId;
            $subcriptionObj->transaction_id         = $response['id'];
            $subcriptionObj->start_date             = date('Y-m-d H:i:s');
            $subcriptionObj->expiry_date            = $expiry_date;
            $subcriptionObj->transaction_status     = $response['status'] ?? '';
            $subcriptionObj->created_at             = date('Y-m-d H:i:s');
            $subcriptionObj->updated_at             = date('Y-m-d H:i:s');
            $subcriptionObj->save();

            return redirect()
                ->route('prizing')
                ->with('message', 'Transaction complete.');
        } else {
            return redirect()
                ->route('prizing')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('prizing')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
