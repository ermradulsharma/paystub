<?php

namespace App\Http\Controllers;

use App\Models\PaySlip;
use App\Services\ValidationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use File;

class W2FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Request $request)
    {

        $response = (new ValidationService)->usa($request);
        if ($response['status'] == 301) {
            return response()->json($response, $response['status']);
        }
        $requestData = $request->all();
        if ($requestData['form_type'] == "w2form") {
            $pageName = "w2form";
        } else {
            if ($requestData['advance_temp']) {
                $pageName = $requestData['advance_temp'];
            } else {
                $pageName = $requestData['basic_temp'];
            }
        }


        // $pageName = $requestData['advance_temp'] ?? $requestData['basic_temp'] ?? '';


        $path = public_path() . '/uploads/mailData';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $invoiceData['requestData'] = $requestData;
        $pdf = PDF::loadView('allForms/' . $request->form_type . '/' . $pageName, $invoiceData)->setPaper('a4', 'portrait');
        $fileName =  date('_d_m_Y_h_i_s') . '.pdf';
        $pdf->download($path . '/' . $fileName);
        // return back();
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
        $slip->type = $requestData['form_type'];
        $slip->title = $requestData['cname'] ?? "";
        $slip->pdf = $fileName;
        $slip->save();
        $response['data'] = $slip;
        $response['message'] = "Data saved successfully successfully.";
        return response()->json($response, $response['status']);
    }

    public function previewPDF()
    {
        $data = [
            'title' => 'Welcome to paystubx',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('allForms.w2Pdf', $data);

        return $pdf->stream('W2Paystubx.pdf');
    }
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
