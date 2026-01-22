<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalService
{
    protected $provider;

    public function __construct(PayPalClient $provider = null)
    {
        $this->provider = $provider ?? new PayPalClient();
        if (! $provider) {
            $this->provider->setApiCredentials(config('paypal'));
            $this->provider->getAccessToken();
        }
    }

    /**
     * Create an order for the given amount and currency.
     */
    public function createOrder(float $amount, string $currency = 'USD', array $extra = []): array
    {
        $orderData = array_merge([
            'intent' => 'CAPTURE',
            'purchase_units' => [[
                'amount' => [
                    'currency_code' => $currency,
                    'value' => number_format($amount, 2, '.', ''),
                ],
            ]],
            'application_context' => [
                'brand_name' => config('app.name'),
                'landing_page' => 'NO_PREFERENCE',
                'user_action' => 'PAY_NOW',
                'return_url' => route('paypal.success'),
                'cancel_url' => route('paypal.cancel'),
            ],
        ], $extra);

        try {
            $response = $this->provider->createOrder($orderData);
            Log::info('PayPal order created', ['response' => $response]);

            return $response;
        } catch (\Exception $e) {
            Log::error('PayPal order creation failed', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * Capture a PayPal order.
     */
    public function captureOrder(string $orderId): array
    {
        try {
            $response = $this->provider->capturePaymentOrder($orderId);
            Log::info('PayPal order captured', ['order_id' => $orderId, 'response' => $response]);

            return $response;
        } catch (\Exception $e) {
            Log::error('PayPal capture failed', ['order_id' => $orderId, 'error' => $e->getMessage()]);
            throw $e;
        }
    }
}
