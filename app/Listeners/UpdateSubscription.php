<?php

namespace App\Listeners;

use App\Events\PaymentProcessed;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class UpdateSubscription
{
    /**
     * Handle the event.
     */
    public function handle(PaymentProcessed $event)
    {
        $payment = $event->payment;
        $metadata = $payment->metadata ?? [];

        Log::info('UpdateSubscription Listener Fired', ['payment_id' => $payment->id]);

        if (empty($metadata['plan_id'])) {
            Log::warning('No plan_id in payment metadata', ['payment_id' => $payment->id]);

            return;
        }

        try {
            $planDetail = Plan::find($metadata['plan_id']);
            if (! $planDetail) {
                Log::error('Plan not found', ['plan_id' => $metadata['plan_id']]);

                return;
            }

            $user = User::find($payment->user_id);
            if (! $user) {
                Log::error('User not found', ['user_id' => $payment->user_id]);

                return;
            }

            // Logic adapted from PayPalController
            $subscription = Subscription::where('user_id', $user->id)
                ->where('plan_id', $planDetail->id)
                ->where('expiry_date', '>', Carbon::now()) // Check if active ?? or just get latest
                ->latest()
                ->first();

            if (! $subscription) {
                $subscription = new Subscription();
                $subscription->user_id = $user->id;
            }

            $subscription->plan_id = $planDetail->id;
            $subscription->country = $metadata['country'] ?? 'usa';
            $subscription->transaction_id = $payment->order_id; // Using Order ID as Transaction ID
            $subscription->start_date = Carbon::now();

            // Calculate Expiry
            // Assuming logic from old controller: 24h, 1 month, or generic months
            if ($planDetail->plan_duration == '24') {
                $subscription->expiry_date = Carbon::now()->addDay();
            } elseif ($planDetail->plan_duration == '1') {
                $subscription->expiry_date = Carbon::now()->addMonth();
            } else {
                $subscription->expiry_date = Carbon::now()->addMonths((int) $planDetail->plan_duration);
            }

            $subscription->transaction_status = $payment->status;
            $subscription->device_type = 'website';
            $subscription->save();

            // Update User Profile Expiry
            if ($subscription->country == 'usa') {
                $user->usa_expiry_date = $subscription->expiry_date;
            } elseif ($subscription->country == 'uk') {
                $user->uk_expiry_date = $subscription->expiry_date;
            } elseif ($subscription->country == 'canada') {
                $user->canada_expiry_date = $subscription->expiry_date;
            }
            $user->save();

            // Send Invoice
            try {
                if (function_exists('invoiceMail')) {
                    invoiceMail($user->id, $subscription->country);
                }
            } catch (\Exception $e) {
                Log::error('Invoice Mail Failed', ['error' => $e->getMessage()]);
            }

            Log::info('Subscription updated successfully', ['subscription_id' => $subscription->id]);
        } catch (\Exception $e) {
            Log::error('UpdateSubscription Listener Exception', ['error' => $e->getMessage()]);
        }
    }
}
