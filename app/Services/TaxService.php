<?php

namespace App\Services;

use App\Models\Deduction;
use App\Models\StateTax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TaxService
{
    /**
     * Get deduction list with query caching.
     *
     * @param Request|null $request
     * @return array
     */
    public function getDeductions(?Request $request = null): array
    {
        $deductions = Cache::remember('deductions_all', 3600, function () {
            return Deduction::orderBy('id', 'asc')->get();
        });

        return [
            'status' => 200,
            'success' => true,
            'data' => $deductions,
        ];
    }

    /**
     * Get state tax list with query caching.
     *
     * @param Request|null $request
     * @return array
     */
    public function getStateTaxes(?Request $request = null): array
    {
        $countryCode = strtoupper($request->country_code ?? 'USA');
        $cacheKey = 'state_taxes_' . $countryCode;

        $stateTaxes = Cache::remember($cacheKey, 3600, function () use ($countryCode) {
            return StateTax::where('country_code', $countryCode)
                ->orWhereNull('country_code')
                ->orderBy('state', 'asc')
                ->get();
        });

        return [
            'status' => 200,
            'success' => true,
            'data' => $stateTaxes,
        ];
    }
}
