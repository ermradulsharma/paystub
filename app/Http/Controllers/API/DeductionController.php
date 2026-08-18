<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\TaxService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeductionController extends Controller
{
    protected TaxService $taxService;

    public function __construct(TaxService $taxService)
    {
        $this->taxService = $taxService;
    }

    public function getDeduction(Request $request): JsonResponse
    {
        try {
            $dataObj = $this->taxService->getDeductions($request);
            return response()->json([
                'success' => true,
                'status' => STATUS_OK,
                'message' => 'Deduction fetched successfully',
                'data' => $dataObj['data'],
            ], STATUS_OK);
        } catch (Exception $e) {
            Log::error('API Deduction Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'status' => STATUS_GENERAL_ERROR,
                'message' => DEFAULT_ERROR_MESSAGE,
            ], STATUS_GENERAL_ERROR);
        }
    }

    public function getStateTaxes(Request $request): JsonResponse
    {
        try {
            $dataObj = $this->taxService->getStateTaxes($request);
            return response()->json([
                'success' => true,
                'status' => STATUS_OK,
                'message' => 'State taxes fetched successfully',
                'data' => $dataObj['data'],
            ], STATUS_OK);
        } catch (Exception $e) {
            Log::error('API StateTaxes Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'status' => STATUS_GENERAL_ERROR,
                'message' => DEFAULT_ERROR_MESSAGE,
            ], STATUS_GENERAL_ERROR);
        }
    }
}
