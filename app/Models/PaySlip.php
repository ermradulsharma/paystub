<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDF;
use File;
use Illuminate\Support\Facades\Auth;

class PaySlip extends Model
{
    use HasFactory;

    public function getPdfAttribute($pdf = null)
    {
        return asset('uploads/mailData/' . $pdf);
    }

    protected $appends = ['membership'];

    public function getMembershipAttribute()
    {
       $subcription =  Subcription::where(['user_id' => Auth::id(), 'country' => $this->form_type])->whereDate('expiry_date', '>=' ,Carbon::now())->first();
       if($subcription){
            return 1;
       }else{
            return 0;
       }
    }

    static function generatePDF($request)
    {
        $requestData = $request->all();
        if ($requestData['form_type'] == "w2form") {
            $pageName = "w2form";
        }
        $path = public_path() . '/uploads/mailData';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $invoiceData['requestData'] = $requestData;
        $pdf = PDF::loadView('allForms/' . $request->form_type . '/' . $pageName, $invoiceData)->setPaper('a4', 'portrait');
        $fileName =  date('_d_m_Y_h_i_s') . '.pdf';
        $pdf->save($path . '/' . $fileName);

        $slip = new w2formPdf;
        $slip->reference = "PayStubx-" . rand(100000, 999999);
        $slip->data = json_encode($requestData);
        $slip->title = $requestData['cname'] ?? "";
        $slip->pdf = $fileName;
        if ($slip->save()) {
            $response['pdf'] = asset('/uploads/mailData/' . $fileName);
            $response['status'] = 200;
        }

        return $response;
    }
}
