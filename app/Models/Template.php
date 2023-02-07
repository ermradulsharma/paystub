<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    public function images()
    {
        return $this->morphOne(Image::class, 'module');
    }
    static function getTemplate($request)
    {
        $basic = Template::with('images')->where('state', $request->state)->where('type', 'basic')->get();
        $advance = Template::with('images')->where('state', $request->state)->where('type', 'advance')->get();
        $response['basic'] = $basic;
        $response['advance'] = $advance;
        $response['status'] = STATUS_OK;
        return $response;
    }

    static function template($request){
        $earning = [];
        $rate = [];
        $hours = [];
        $total = [];
        $period = [];
        $ytd_total = [];
        $taxes = [];
        $taxes_rate = [];
        $taxes_ytd = [];
        $tax_deduction = [];
        $period_tax_deduction = [];
        $ytd_tax_deduction = [];
        $requestData = $request->all();
        foreach($request->earn ?? [] as $d){
            $earning[] = $d['earning'];
            $rate[] = $d['rate'];
            $hours[] = $d['hours'];
            $total[] = $d['total'];
            $period[] = $d['period'];
            $ytd_total[] = $d['ytd_total'];
        }
        $requestData['earning'] = $earning;
        $requestData['rate'] = $rate;
        $requestData['hours'] = $hours;
        $requestData['total'] = $total;
        $requestData['period'] = $period;
        $requestData['ytd_total'] = $ytd_total;

        // ======== tax ========
        foreach($request->tax ?? [] as $d){
            $taxes[] = $d['taxes'];
            $taxes_rate[] = $d['taxes_rate'];
            $taxes_ytd[] = $d['taxes_ytd'];
        }

        $requestData['taxes'] = $taxes;
        $requestData['taxes_rate'] = $taxes_rate;
        $requestData['taxes_ytd'] = $taxes_ytd;

        // ======== Extra tax ========
        foreach($request->extra_tax_deduction ?? [] as $d){
            $tax_deduction[] = $d['tax_deduction'];
            $period_tax_deduction[] = $d['period_tax_deduction'];
            $ytd_tax_deduction[] = $d['ytd_tax_deduction'];
        }

        $requestData['tax_deduction'] = $tax_deduction;
        $requestData['period_tax_deduction'] = $period_tax_deduction;
        $requestData['ytd_tax_deduction'] = $ytd_tax_deduction;

        return $requestData;
    }
}
