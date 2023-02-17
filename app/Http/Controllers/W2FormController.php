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
        }
        $path = public_path() . '/uploads/mailData';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $invoiceData['requestData'] = $requestData;
        $pdf = PDF::loadView('allForms/' . $request->form_type . '/' . $pageName, $invoiceData)->setPaper('a4', 'portrait');
        // $fileName =  date('_d_m_Y_h_i_s') . '.pdf';
        return  $pdf->download('w2form.pdf');
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
