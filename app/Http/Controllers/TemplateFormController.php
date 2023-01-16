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
}
