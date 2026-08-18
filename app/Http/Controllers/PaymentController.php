<?php

namespace App\Http\Controllers;

use App\Events\PaymentProcessed;
use App\Models\Payment;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $payPalService;

    public function __construct(PayPalService $payPalService)
    {
        $this->payPalService = $payPalService;
    }

    /**
     * Process PayPal Payment
     */
    public function processPayPal(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'nullable|string|size:3',
        ]);

        $amount = $request->input('amount');
        $currency = $request->input('currency', 'USD');

        try {
            $order = $this->payPalService->createOrder($amount, $currency);

            // Log pending payment
            Payment::create([
                'user_id' => auth()->id() ?? 0, // 0 for guest if applicable, or ensure middleware
                'order_id' => $order['id'] ?? null,
                'amount' => $amount,
                'currency' => $currency,
                'status' => 'pending',
                'gateway' => 'paypal',
                'response_data' => $order,
            ]);

            // Return approval link
            foreach ($order['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect($link['href']);
                }
            }

            return back()->with('error', 'Something went wrong with PayPal');
        } catch (\Exception $e) {
            Log::error('Payment processing failed', ['error' => $e->getMessage()]);

            return back()->with('error', 'Payment initialization failed.');
        }
    }

    /**
     * PayPal Success Callback
     */
    public function success(Request $request)
    {
        $orderId = $request->query('token');

        if (! $orderId) {
            return redirect()->route('welcome')->with('error', 'Invalid payment token.');
        }

        try {
            $response = $this->payPalService->captureOrder($orderId);

            if (isset($response['status']) && $response['status'] == 'COMPLETED') {

                // Update or Create payment record
                $payment = Payment::updateOrCreate(
                    ['order_id' => $orderId],
                    [
                        'user_id' => auth()->id() ?? 0,
                        'status' => 'completed',
                        'response_data' => $response,
                        // Amount could be verified from response here
                    ]
                );

                // Fire event
                event(new PaymentProcessed($payment));

                return redirect()->route('userDashboard')->with('success', 'Payment successful!');
            }

            return redirect()->route('userDashboard')->with('error', 'Payment not completed.');
        } catch (\Exception $e) {
            Log::error('Payment capture failed', ['error' => $e->getMessage()]);

            return redirect()->route('userDashboard')->with('error', 'Payment verification failed.');
        }
    }

    /**
     * PayPal Cancel Callback
     */
    public function cancel()
    {
        return redirect()->route('userDashboard')->with('info', 'Payment cancelled.');
    }
}
