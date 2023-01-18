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
          
        $pdf = PDF::loadView('allForms.Temp1', $data);   
       // return view('allForms.Temp1', $data);
        return $pdf->stream('Paystubx.pdf');


  
    
     
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

  
}
