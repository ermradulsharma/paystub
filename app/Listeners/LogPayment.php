<?php

namespace App\Listeners;

use App\Events\PaymentProcessed;
use Illuminate\Support\Facades\Log;

class LogPayment
{
    /**
     * Handle the event.
     */
    public function handle(PaymentProcessed $event)
    {
        $payment = $event->payment;
        // Log to file
        Log::info('Payment processed', ['payment_id' => $payment->id, 'status' => $payment->status]);
        // Additional analytics could be added here (e.g., send to external service)
    }
}
