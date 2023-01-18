<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class TemplateFormController extends Controller
{
    public function BasicPaystubPDF()
    {
        $data = [

            'date' => date('m/d/Y')
        ];
          
        // return view('allForms.Temp1');
         
       
         $pdf = PDF::loadView('allForms.Temp1', $data);
         
         return $pdf->stream('W2Paystubx.pdf');
    
     

        //return view('allForms.Temp1', $data);


        $pdf = PDF::loadHtml('allForms.Temp1', $data);

        return $pdf->stream('W2Paystubx.pdf');
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
    public function advanceCeruleanUsa(){
        $data = [
            
            'date' => date('m/d/Y')
        ];
          
        //   return view('allForms.paybill');
         
       
          $pdf = PDF::loadView('allForms.paybill', $data);
         
         return $pdf->stream('W2Paystubx.pdf');

     
    }
    public function advanceDistrictUsa(){
        $data = [
            
            'date' => date('m/d/Y')
        ];
          
          return view('allForms.advance');
         
       
        //  $pdf = PDF::loadView('allForms.advance', $data);
         
        //  return $pdf->stream('W2Paystubx.pdf');

     
    }

   
}
