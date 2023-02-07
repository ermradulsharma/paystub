<?php

namespace App\Http\Controllers;

use App\Models\StateTax;
use App\Models\Template;
use PDF;
use Illuminate\Http\Request;

class UkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function patstubx_modern()
     {
         $data = [
              'date' => date('m/d/Y')
         ];


          $pdf = PDF::loadView('allForms.global.patstubx_modern', $data)->setPaper('a4', 'portrait');
          
          return $pdf->stream('Patstubx_Modern.pdf'); 
     }

     public function pin_blue_uk()
     {
         $data = [
              'date' => date('m/d/Y')
         ];


          $pdf = PDF::loadView('allForms.uk.pin_blue_uk', $data)->setPaper('a4', 'portrait');
          
          return $pdf->stream('pin_blue_uk.pdf'); 
     }

     public function sage_blue_uk()
     {
         $data = [
              'date' => date('m/d/Y')
         ];


          $pdf = PDF::loadView('allForms.uk.sage_blue_uk', $data)->setPaper('a4', 'portrait');
          
          return $pdf->stream('sage_blue_uk.pdf'); 
     }

     public function tawny()
     {
         $data = [
              'date' => date('m/d/Y')
         ];


          $pdf = PDF::loadView('allForms.uk.tawny', $data)->setPaper('a4', 'portrait');
          
          return $pdf->stream('tawny.pdf'); 
     }

    public function index()
    {
        $basicType = Template::where('type', 'basic')->get();
        $advanceType = Template::where('type', 'advance')->get();
        $stateTaxes = StateTax::get();
        return view('ukPaystub', compact('basicType', 'advanceType', 'stateTaxes'));
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
