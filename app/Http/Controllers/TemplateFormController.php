<?php

namespace App\Http\Controllers;

use App\Models\PaySlip;
use App\Models\Template;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Http\Request;
use PDF;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TemplateFormController extends Controller
{
    public function BasicPaystubUsaPDF()
    {
        $requestData = [
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('allForms.paystubx_basic', $requestData);
        return $pdf->download('paystubx_basic.pdf');
    }

    public function AdvancePtGreenPaystubPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];

        // return view('allForms.pt-green');
        $pdf = PDF::loadView('allForms.pt-green', $data);
        return $pdf->setPaper('A4')->stream('pt-greenPaystubx.pdf');
    }

    public function AdvancePtBlueUsaPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];

        // return view('allForms.pt-blue');
        $pdf = PDF::loadView('allForms.pt-blue', $data);
        return $pdf->setPaper('A4')->stream('pt-bluePaystubx.pdf');
    }

    public function AdvancePtBrownUsaPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        //    return view('allForms.pt-brown');
        $pdf = PDF::loadView('allForms.pt-brown', $data);
        return $pdf->setPaper('A4')->stream('pt-brownPaystubx.pdf');
    }

    public function BasicPriorUsaPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        // return view('allForms.paystubs-prior');
        $pdf = PDF::loadView('allForms.paystubs-prior', $data);
        return $pdf->setPaper('A4')->stream('paystubs-prior.pdf');
    }

    public function AdvanceCheckUsaPDf()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        // return view('allForms.paystubx');
        $pdf = PDF::loadView('allForms.paystubx', $data);
        return $pdf->setPaper('A4')->stream('paystubx.pdf');
    }
    public function BasicPinBlueUkPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        // return view('allForms.pin-blue');
        $pdf = PDF::loadView('allForms.pin-blue', $data);
        return $pdf->setPaper('A4')->stream('pin-blue.pdf');
    }

    public function PaystubPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        // return view('allForms.htmlTemp', $data);
        return $options = PDF::getOptions();
        return PDF::loadView('allForms.htmlTemp')->stream('W2Paystubx.pdf');
    }
    public function advanceCeruleanUsa()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        //return view('allForms.paybill');
        $pdf = PDF::loadView('allForms.paybill', $data);
        return $pdf->stream('paybill.pdf');
    }

    public function advanceDistrictUsa()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        //   return view('allForms.paystubx_district');
        $pdf = PDF::loadView('allForms.paystubx_district', $data);
        return $pdf->stream('W2Paystubx.pdf');
    }


    public function AdvanceBlueBoxUsaPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
         return view('allForms.box_blue');
        $pdf = PDF::loadView('allForms.box_blue', $data);
        return $pdf->stream('blueboxTemp.pdf');
    }

    public function AdvanceglobleUsaPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];

        // return view('allForms.global_white');
        $pdf = PDF::loadView('allForms.global_white', $data);
        return $pdf->stream('GlobleTemp.pdf');
    }
    public function AdvanceModernUsaPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        // return view('allForms.modernusa');
        $pdf = PDF::loadView('allForms.modernusa', $data);
        return $pdf->stream('ModernTemp.pdf');
    }
    public function BasicPayStubBluePDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        $pdf = PDF::loadView('allForms.paystubx_blue', $data);
        //    return view('allForms.paystubx_blue');
        return $pdf->stream('basic_temp_blue.pdf');
    }

    public function BasicTawnyUkPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        // return view('allForms.ukbasic-tawny', $data);
        $pdf = PDF::loadView('allForms.ukbasic-tawny', $data);
        return $pdf->stream('ukbasic-tawny.pdf');
    }

    public function BasicUkPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        // return view('allForms.sage-blue', $data);
        $pdf = PDF::loadView('allForms.sage-blue', $data);
        return $pdf->stream('ukbasicsage.pdf');
    }

    public function templates(Request $request)
    {
        $requestData = $request->all();
        if ($requestData['advance_temp']) {
            $pageName = $requestData['advance_temp'];
        } else {
            $pageName = $requestData['basic_temp'];
        }

        $path = public_path() . '/uploads/mailData';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $invoiceData['requestData'] = $requestData;
        $pdf = PDF::loadView('allForms/' . $pageName, $invoiceData)->setPaper('a4','portrait');
    //    return $pdf->stream($pageName.'.pdf');
        $fileName =  date('_d_m_Y_h_i_s') . '.pdf';
        $pdf->save($path . '/' . $fileName);
        $response['pdf'] = asset('/uploads/mailData/' . $fileName);
        $response['message'] = "Mail send successfully.";
        return response()->json($response, 200);
        //return view('allForms.' . $requestObj, compact('requestData'));
    }

    //======= usa store data =========
    public function usaStoreData(Request $request)
    {
        $requestData = $request->all();
        if ($requestData['advance_temp']) {
            $pageName = $requestData['advance_temp'];
        } else {
            $pageName = $requestData['basic_temp'];
        }

        $path = public_path() . '/uploads/mailData';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $invoiceData['requestData'] = $requestData;
        $pdf = PDF::loadView('allForms/' . $pageName, $invoiceData)->setPaper('a4','portrait');
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
        $slip->save();
        $response['message'] = "Data saved successfully successfully.";
        return response()->json($response, 200);
    }

    //======invoice list ==========

    public function invoiceList(Request $request)
    {
        $invoiceList = PaySlip::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('lists.invoiceList', compact('invoiceList'));
    }

    public function invoiceDelete(Request $request, $id)
    {
        $invoice = PaySlip::where(['user_id' => Auth::user()->id, 'id' => $id])->first();
        if ($invoice) {
            try {
                unlink(public_path('/uploads/mailData/' . basename($invoice->pdf)));
            } catch (Exception $e) {
            }
            $invoice->delete();
        }

        return redirect()->back()->with('success', 'Invoice has been deleted successfully.');
    }

    public function invoiceMail($id)
    {
        $invoice = PaySlip::where(['user_id' => Auth::user()->id, 'id' => $id])->first();
        if ($invoice) {
            $mailData = [
                'email' => Auth::user()->email,
                'title' => 'Please find atteched file'
            ];
            $moreData = [];
            $file = public_path('/uploads/mailData/' . basename($invoice->pdf));
            try {
                Mail::send('mail.invoice_mail', $moreData, function ($message) use ($mailData, $file) {
                    $message->to($mailData['email']);
                    $message->subject($mailData['title']);
                    $message->attach($file);
                });
            } catch (\Exception $e) {
                $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
            }
        }

        return redirect()->back()->with('success', 'Mail has been sent successfully.');
    }

}
