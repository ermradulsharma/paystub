<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CurrencyService
{
    /**
     * Fetch live real-time exchange rates with caching layer.
     *
     * @return array
     */
    public function getLiveExchangeRates(): array
    {
        return Cache::remember('paystubx_live_exchange_rates', 3600, function () {
            try {
                $response = Http::timeout(5)->get('https://open.er-api.com/v6/latest/USD');
                if ($response->successful()) {
                    $data = $response->json();
                    if (!empty($data['rates'])) {
                        return $data['rates'];
                    }
                }
            } catch (\Throwable $e) {
                Log::warning('Live Forex API fetch exception: ' . $e->getMessage());
            }

            // Fallback interbank reference rates if API unreachable
            return [
                'USD' => 1.0,
                'EUR' => 0.92,
                'GBP' => 0.79,
                'CAD' => 1.35,
                'AUD' => 1.52,
                'INR' => 83.45,
                'JPY' => 155.20,
                'CHF' => 0.91,
                'SGD' => 1.35,
                'AED' => 3.67,
                'SAR' => 3.75,
                'MXN' => 16.80,
                'BRL' => 5.15,
                'ZAR' => 18.50,
                'NZD' => 1.65,
                'HKD' => 7.82,
                'SEK' => 10.80,
                'NOK' => 10.90,
                'DKK' => 6.88,
                'PLN' => 3.95,
                'THB' => 36.50,
                'IDR' => 16000.0,
                'MYR' => 4.72,
                'PHP' => 57.50,
                'KRW' => 1360.0,
                'TRY' => 32.20,
                'EGP' => 47.50,
                'PKR' => 278.0,
                'BDT' => 117.0,
                'CNY' => 7.23,
            ];
        });
    }
}
