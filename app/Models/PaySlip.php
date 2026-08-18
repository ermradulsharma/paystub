<?php

namespace App\Models;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PaySlip extends Model
{
    use HasFactory;

    public function getPdfAttribute($pdf = null)
    {
        return asset('uploads/mailData/'.$pdf);
    }

    protected $appends = ['membership'];

    public function getMembershipAttribute()
    {
        $subcription = Subscription::where(['user_id' => Auth::id(), 'country' => $this->type, 'device_type' => 'website'])->whereDate('expiry_date', '>=', Carbon::now())->first();
        if ($subcription) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function generatePDF($request)
    {
        $requestData = $request->all();
        // if (!array_key_exists('watermark', $requestData)) {
        //     $requestData += array('watermark' => 'no');
        // }
        if (isset($requestData['form_type']) && $requestData['form_type'] == 'w2form') {
            $pageName = 'w2form';
        } else {
            $pageName = $requestData['advance_temp'] ?? $requestData['basic_temp'] ?? 'paystubx_basic';
        }
        $path = public_path().'/uploads/mailData';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $invoiceData['requestData'] = $requestData;

        $pdf = PDF::loadView('allForms/'.($requestData['form_type'] ?? 'usa').'/'.$pageName, $invoiceData)->setPaper('a4', 'portrait')->set_option('isRemoteEnabled', true);
        $fileName = date('_d_m_Y_h_i_s').'.pdf';
        $pdf->save($path.'/'.$fileName);

        $slip = new w2formPdf;
        $slip->reference = 'PayStubx-'.rand(100000, 999999);
        $slip->data = json_encode($requestData);
        $slip->title = $requestData['cname'] ?? '';
        $slip->pdf = $fileName;
        if ($slip->save()) {
            $response['pdf'] = asset('/uploads/mailData/'.$fileName);
            $response['status'] = 200;
        }

        return $response;
    }
}
