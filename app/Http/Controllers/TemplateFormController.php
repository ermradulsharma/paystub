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
          
        return view('allForms.Temp1', $data);
         
       
        //  $pdf = PDF::loadView('allForms.Temp1', $data);
         
        //  return $pdf->stream('W2Paystubx.pdf');
    
     
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
          
       // return view('allForms.pt-blue');
         
       
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
}

