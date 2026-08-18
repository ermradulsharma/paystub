<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\StateTax;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeductionController extends Controller
{
    public function getDeduction(Request $request)
    {
        $response = [];
        $response['message'] = '';
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = false;
        try {
            $dataObj = Deduction::getDeduction($request);
            if ($dataObj['status'] == 200) {
                $response['data'] = $dataObj['data'];

                $response['message'] = 'Deduction fetched successfully';
                $response['status'] = STATUS_OK;
                $response['success'] = true;
            }

        } catch (Exception $e) {
            Log::error('API Deduction Error: ' . $e->getMessage());
            $response['message'] = DEFAULT_ERROR_MESSAGE;
            $response['status'] = STATUS_GENERAL_ERROR;
        }

        return response()->json($response, $response['status']);
    }

    public function getStateTaxes(Request $request)
    {
        $response = [];
        $response['message'] = '';
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = false;
        try {
            $dataObj = StateTax::getStateTaxes($request);
            if ($dataObj['status'] == 200) {
                $response['data'] = $dataObj['data'];

                $response['message'] = 'State taxes fetched successfully';
                $response['status'] = STATUS_OK;
                $response['success'] = true;
            }

        } catch (Exception $e) {
            Log::error('API Deduction Error: ' . $e->getMessage());
            $response['message'] = DEFAULT_ERROR_MESSAGE;
            $response['status'] = STATUS_GENERAL_ERROR;
        }

        return response()->json($response, $response['status']);
    }
}
