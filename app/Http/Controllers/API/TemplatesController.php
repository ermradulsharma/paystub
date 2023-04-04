<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PaySlip;
use App\Models\Template;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
            if ($requestData['form_type'] == "w2form") {
                $pageName = "w2form";
            } else {
                if ($requestData['advance_temp']) {
                    $pageName = $requestData['advance_temp'];
                } else {
                    $pageName = $requestData['basic_temp'];
                }
            }
            $path = public_path() . '/uploads/mailData';
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $invoiceData['requestData'] = $requestData;
            $pdf = PDF::loadView('allForms/' . $request->form_type . '/' . $pageName, $invoiceData)->setPaper('a4');
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
            if ($requestData['form_type'] == "w2form") {
                $pageName = "w2form";
            } else {
                if ($requestData['advance_temp']) {
                    $pageName = $requestData['advance_temp'];
                } else {
                    $pageName = $requestData['basic_temp'];
                }
            }
            $path = public_path() . '/uploads/mailData';
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

            if (Auth::user()->expiryDate != '') {
                $requestData['watermark'] = 'no';
            }

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
            $slip->title = $requestData['cname'] ?? "";
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
            $paySlipObj = PaySlip::select('id', 'reference', 'user_id', 'pdf', 'type', 'created_at', 'data')->where('user_id', Auth::user()->id)->get();
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

            $paySlipObj = PaySlip::where(['user_id' => Auth::user()->id, 'id' => $requestData['id']])->exists();
            if ($paySlipObj) {
                PaySlip::where(['user_id' => Auth::user()->id, 'id' => $requestData['id']])->forceDelete();
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
            json_decode($paySlipObj->data, true);
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

    public function generatePdf(Request $request)
    {
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
            $requestData = PaySlip::generatePDF($request);
            if ($requestData['status'] == 200) {
                $response['pdf'] = $requestData['pdf'];
                $response['success'] = true;
                $response['message'] = "Data saved successfully";
                $response['status'] = STATUS_OK;
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }

    /* public function invoiceMail(Request $request)
    {

        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
            $paySlipObj = PaySlip::where(['user_id' => Auth::user()->id])->exists();
            if ($paySlipObj) {
                $invoice = PaySlip::where(['user_id' => Auth::user()->id])->first();
                if ($request->id != null) {
                    $invoice = $invoice->where('id', $request->id);
                }
                $invoice = $invoice->orderBy('id', 'desc')->first();
                $requestData = json_decode($invoice->data);
                $requestData = collect($requestData);
                $requestData['watermark'] = 'no';
                $pageName = $requestData['advance_temp'] ?? $requestData['basic_temp'];

                $path = public_path('/uploads/mailData');
                File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
                return        $invoiceData['requestData'] = $requestData;
                $pdf = PDF::loadView('allForms/' . $requestData['form_type'] . '/' . $pageName, $invoiceData)->setPaper('a4', 'portrait');
                $fileName =  date('_d_m_Y_h_i_s') . '.pdf';
                $pdf->save($path . '/' . $fileName);
                if ($invoice) {
                    $mailData = [
                        'email' => Auth::user()->email,
                        'title' => 'Please find attachment file'
                    ];
                    $moreData = [];
                    $file = public_path('/uploads/mailData/' . basename($fileName));
                    try {
                        Mail::send('mail.invoice_mail', $moreData, function ($message) use ($mailData, $file) {
                            $message->to($mailData['email']);
                            $message->subject($mailData['title']);
                            $message->attach($file);
                        });
                        $response['message'] = "Please check your mail";
                        $response['status'] = STATUS_OK;
                        $response['success'] = TRUE;
                        return response()->json($response, $response['status']);
                    } catch (\Exception $e) {
                        $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
                    }
                }
            } else {
                $response['message'] = "Please choose Paystub pay slip";
                return response()->json($response, 422);
            }
        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
        }
        return response()->json($response, $response['status']);
    } */

    public function subscription(Request $request)
    {
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
            $requestData = $request->all();
            if (!array_key_exists('expiryDate', $requestData)) {
                $requestData += array('expiryDate' => Carbon::now());
            }
            $userObj = User::find(Auth::user()->id);
            if ($requestData['type'] == 1) {
                if ($requestData['subcription_type'] == 1) {
                    $userObj->expiryDate = Carbon::now()->addMonth();
                } else  if ($requestData['subcription_type'] == 3) {
                    $userObj->expiryDate = Carbon::now()->addMonths(3);
                } else  if ($requestData['subcription_type'] == 6) {
                    $userObj->expiryDate = Carbon::now()->addMonths(6);
                } else  if ($requestData['subcription_type'] == 99) {
                    $userObj->expiryDate = Carbon::now()->addYears(99);
                } else {
                    $userObj->expiryDate = Carbon::now()->addHours(24);
                }
            } else {
                $userObj->expiryDate = "";
            }
            $userObj->save();
            $response['success'] = true;
            $response['message'] = "Data saved successfully";
            $response['status'] = STATUS_OK;
        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }

    public function checkSubscription(Request $request)
    {
        $response['message'] = "";
        $response['status'] = STATUS_BAD_REQUEST;
        $response['success'] = FALSE;
        try {
            // return Auth::user();
            $userObj = User::select('expiryDate')->find(Auth::user()->id);
            if($userObj->expiryDate != ''){
                $expiry = date('m-d-Y', strtotime($userObj->expiryDate));
            }
             //Carbon::parse($userObj->expiryDate)->format('m-d-Y');
            $userObj->expiryDate = $expiry ?? '';
            $response['data'] = $userObj;
            $response['success'] = true;
            $response['message'] = "Expiry Date";
            $response['status'] = STATUS_OK;
        } catch (Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            Log::error($e->getTraceAsString());
            $response['status'] = STATUS_GENERAL_ERROR;
        }
        return response()->json($response, $response['status']);
    }
}
