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
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
            $dataObj = Deduction::getDeduction($request);
            if($dataObj['status'] == 200){
                $response['data'] = $dataObj['data'];

                $response['message'] = "Deduction fetched successfully";
                $response['status'] = STATUS_OK;
                $response['success'] = TRUE;
            }

        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }
    public function getStateTaxes(Request $request)
    {
        $response = [];
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
            $dataObj = StateTax::getStateTaxes($request);
            if($dataObj['status'] == 200){
                $response['data'] = $dataObj['data'];

                $response['message'] = "State taxes fetched successfully";
                $response['status'] = STATUS_OK;
                $response['success'] = TRUE;
            }

        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }
}
