<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use File;

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
          
        $pdf = PDF::loadView('allForms.Temp1', $data);   
       // return view('allForms.Temp1', $data);
        return $pdf->stream('Paystubx.pdf');


  
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
    public function advanceCeruleanUsa(){
        $data = [
            
            'date' => date('m/d/Y')
        ];
          
        //   return view('allForms.paybill');
         
       
          $pdf = PDF::loadView('allForms.paybill', $data);
         
         return $pdf->stream('W2Paystubx.pdf');

     
    }
    public function AdvanceBlueBoxUsaPDF(){
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
    public function BasicpatstubBluePDF()
    {
        $data = [
            
            'date' => date('m/d/Y')
        ];
          
         $pdf = PDF::loadView('allForms.paystub_blue', $data);   
    //    return view('allForms.paystub_blue');
        return $pdf->stream('basictemp_blue.pdf');
        

    }

    public function BasicTawnyUkPDF()
    {
        $data = [
            
            'date' => date('m/d/Y')
        ];
          
        return view('allForms.ukbasic-tawny', $data);

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
}

