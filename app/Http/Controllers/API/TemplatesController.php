<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PaySlip;
use App\Models\Template;
use PDF;
use File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $requestData = Template::template($request);
        try {
            if ($requestData['advance_temp']) {
                $pageName = $requestData['advance_temp'];
            } else {
                $pageName = $requestData['basic_temp'];
            }
            $path = public_path() . '/uploads/mailData';
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $invoiceData['requestData'] = $requestData;
            $pdf = PDF::loadView('allForms/usa/' . $pageName, $invoiceData)->setPaper('a4');
            $fileName =  date('_d_m_Y_h_i_s') . '.pdf';
            $pdf->save($path . '/' . $fileName);
            $file = public_path('/uploads/mailData/' . $fileName);
            $response['pdf'] = asset('/uploads/mailData/' . $fileName);
            $response['message'] = "Template created";
            $response['status'] = 200;
            $response['success'] = TRUE;
        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }

    public function templatesDataSave(Request $request)
    {
        $response = [];
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        $requestData = Template::template($request);
        try {
            if ($requestData['advance_temp']) {
                $pageName = $requestData['advance_temp'];
            } else {
                $pageName = $requestData['basic_temp'];
            }
            $path = public_path() . '/uploads/mailData';
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $invoiceData['requestData'] = $requestData;
            $pdf = PDF::loadView('allForms/' . $request->form_type . '/' . $pageName, $invoiceData)->setPaper('a4', 'portrait');
            $fileName =  date('_d_m_Y_h_i_s') . '.pdf';
            $pdf->save($path . '/' . $fileName);
            $invoice_id = $request->invoice_id ?? 0;
            $slip = PaySlip::where(['user_id' => Auth::user()->id, 'id' => $invoice_id])->first();
            if (!$slip) {
                $slip = new PaySlip;
                $slip->user_id = Auth::user()->id;
                $slip->reference = "PayStubx-" . rand(100000, 999999);
            } else {
                try {
                    unlink(public_path('/uploads/mailData/' . basename($slip->pdf)));
                } catch (Exception $e) {
                }
            }
            $slip->data = json_encode($requestData);
            $slip->title = $requestData['cname'];
            $slip->pdf = $fileName;
            $slip->type = $request->form_type;
            if ($slip->save()) {
                $response['message'] = "Template save successfully";
                $response['status'] = 200;
                $response['success'] = TRUE;
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }

    public function getPdfList(Request $request)
    {
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
            $paySlipObj = PaySlip::select('id', 'reference', 'user_id', 'pdf', 'created_at')->where('user_id', Auth::user()->id)->get();
            $response['data'] = $paySlipObj;
            $response['message'] = "Payslip fetch successfully";
            $response['status'] = 200;
            $response['success'] = TRUE;
        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }

    public function deleteTemplate(Request $request)
    {
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
            $requestData = $request->all();
            foreach ($requestData['id'] as $id) {
                $paySlipObj = PaySlip::where(['user_id' => Auth::user()->id, 'id' => $id])->exists();
                if ($paySlipObj) {
                    PaySlip::where(['user_id' => Auth::user()->id, 'id' => $id])->forceDelete();
                }
            }
            $response['message'] = "Payslip deleted successfully";
            $response['status'] = 200;
            $response['success'] = TRUE;
        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }

    public function editFormData(Request $request)
    {
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
            $requestData = $request->all();
            $paySlipObj = PaySlip::where(['user_id' => Auth::user()->id, 'id' => $requestData['id']])->exists();
            if ($paySlipObj) {
                $paySlipObj =  PaySlip::where(['user_id' => Auth::user()->id, 'id' => $requestData['id']])->first();
            }
            json_decode($paySlipObj->data);
            $paySlipObj->slipData = Template::editFormData(json_decode($paySlipObj->data));
            unset($paySlipObj->data);
            $response['data'] = $paySlipObj;
            $response['message'] = "Payslip deleted successfully";
            $response['status'] = 200;
            $response['success'] = TRUE;
        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }
}
