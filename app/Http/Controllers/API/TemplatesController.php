<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TemplatesController extends Controller
{
    public function getTemplate(Request $request)
    {
        $response = [];
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
             $dataObj = Template::getTemplate($request);
            if ($dataObj['status'] == 200) {
                $response['basic'] = $dataObj['basic'];
                $response['advance'] = $dataObj['advance'];

                $response['message'] = "Templates fetched successfully";
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
    public function templatesPreview(Request $request)
    {
        $response = [];
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        $requestData = $request->all();
        $earning = [];
        $rate = [];
        $hours = [];
        $total = [];
        $period = [];
        $ytd_total = [];
        $taxes = [];
        $taxes_rate = [];
        $taxes_ytd = [];
        $tax_deduction = [];
        $period_tax_deduction = [];
        $ytd_tax_deduction = [];

        foreach($request->earn ?? [] as $d){
            $earning[] = $d['earning'];
            $rate[] = $d['rate'];
            $hours[] = $d['hours'];
            $total[] = $d['total'];
            $period[] = $d['period'];
            $ytd_total[] = $d['ytd_total'];
        }
        $requestData['earning'] = $earning;
        $requestData['rate'] = $rate;
        $requestData['hours'] = $hours;
        $requestData['total'] = $total;
        $requestData['period'] = $period;
        $requestData['ytd_total'] = $ytd_total;

        // ======== tax ========
        foreach($request->tax ?? [] as $d){
            $taxes[] = $d['taxes'];
            $taxes_rate[] = $d['taxes_rate'];
            $taxes_ytd[] = $d['taxes_ytd'];
        }

        $requestData['taxes'] = $taxes;
        $requestData['taxes_rate'] = $taxes_rate;
        $requestData['taxes_ytd'] = $taxes_ytd;

        // ======== Extra tax ========
        foreach($request->extra_tax_deduction ?? [] as $d){
            $tax_deduction[] = $d['tax_deduction'];
            $period_tax_deduction[] = $d['period_tax_deduction'];
            $ytd_tax_deduction[] = $d['ytd_tax_deduction'];
        }

        $requestData['tax_deduction'] = $tax_deduction;
        $requestData['period_tax_deduction'] = $period_tax_deduction;
        $requestData['ytd_tax_deduction'] = $ytd_tax_deduction;

        try {
            if ($requestData['advance_temp']) {
                $requestObj = $requestData['advance_temp'];
            } else {
                $requestObj = $requestData['basic_temp'];
            }
            return view('allForms.' . $requestObj, compact('requestData'));
        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }
}
