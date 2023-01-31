<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TemplateFormController extends Controller
{
    public function BasicPaystubUsaPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        // return view('allForms.Temp1', $data);
        $pdf = PDF::loadView('allForms.Temp1', $data);
        return $pdf->stream('BasicPaystubx.pdf');
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
        // return view('allForms.paystub-check');
        $pdf = PDF::loadView('allForms.paystub-check', $data);
        return $pdf->setPaper('A4')->stream('paystub-check.pdf');
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
        //   return view('allForms.paybill');
        $pdf = PDF::loadView('allForms.paybill', $data);
        return $pdf->stream('W2Paystubx.pdf');
    }

    public function advanceDistrictUsa()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        //   return view('allForms.advance');
        $pdf = PDF::loadView('allForms.advance', $data);
        return $pdf->stream('W2Paystubx.pdf');
    }


    public function AdvanceBlueBoxUsaPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];
        // return view('allForms.bluebox');
        $pdf = PDF::loadView('allForms.bluebox', $data);
        return $pdf->stream('blueboxTemp.pdf');
    }

    public function AdvanceglobleUsaPDF()
    {
        $data = [
            'date' => date('m/d/Y')
        ];

        // return view('allForms.globleusa');
        $pdf = PDF::loadView('allForms.globleusa', $data);
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
        $pdf = PDF::loadView('allForms.paystub_blue', $data);
        //    return view('allForms.paystub_blue');
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
            $requestObj = $requestData['advance_temp'];
        } else {
            $requestObj = $requestData['basic_temp'];
        }
        return view('allForms.' . $requestObj, compact('requestData'));
        // $pdf = PDF::loadView('allForms.'.$requestData['advance_temp'], $requestData);
        // return $pdf->stream($requestData['advance_temp'].''.'.pdf');
    }

    public function sendPDF(Request $request)
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
        $pdf = PDF::loadView('allForms/' . $pageName, $invoiceData)->setPaper('a4');
        $fileName =  date('_d_m_Y_h_i_s') . '.pdf';
        $pdf->save($path . '/' . $fileName);
        $maildata = [
            'email' => Auth::user()->email,
            'title' => ''
        ];
        $moreData = [];
        $file = public_path('/uploads/mailData/' . $fileName);
        try {
            Mail::send('mail.invoice_mail', $moreData, function ($message) use ($maildata, $file) {
                $message->to($maildata['email']);
                $message->subject($maildata['title']);
                $message->attach($file);
            });
        } catch (\Exception $e) {
            $response['message'] = $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();
        }
        $response['pdf'] = asset('/uploads/mailData/' . $fileName);
        $response['message'] = "Mail send successfully.";
        return response()->json($response, 200);
    }
}
