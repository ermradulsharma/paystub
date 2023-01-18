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
          
        //return view('allForms.Temp1', $data);
         
       
         $pdf = PDF::loadView('allForms.Temp1', $data);
         
         return $pdf->stream('W2Paystubx.pdf');
    
     
    }
    public function AdvanceBlueBoxUsaPDF()
    {
        $data = [
            
            'date' => date('m/d/Y')
        ];
          
        // return view('allForms.bluebox');
       
         $pdf = PDF::loadView('allForms.bluebox', $data);
         return $pdf->stream('BlueboxTemp.pdf');
    
     
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
}
