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

    static function template($request)
    {
        if ($request->form_type == 'uk') {
            $earning = [];
            $rate = [];
            $hours = [];
            $total = [];
            $taxes = [];
            $taxes_rate = [];
            $requestData = $request->all();
            foreach ($request->earn ?? [] as $d) {
                $earning[] = $d['earning'];
                $rate[] = $d['rate'];
                $hours[] = $d['hours'];
                $total[] = $d['total'];
            }
            $requestData['earning'] = $earning;
            $requestData['rate'] = $rate;
            $requestData['hours'] = $hours;
            $requestData['total'] = $total;

            // ======== tax ========
            foreach ($request->tax ?? [] as $d) {
                $taxes[] = $d['taxes'];
                $taxes_rate[] = $d['taxes_rate'];
            }

            $requestData['taxes'] = $taxes;
            $requestData['taxes_rate'] = $taxes_rate;
            unset($requestData['earn']);
            unset($requestData['tax']);
        } else {
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
            foreach ($request->earn ?? [] as $d) {
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
            foreach ($request->tax ?? [] as $d) {
                $taxes[] = $d['taxes'];
                $taxes_rate[] = $d['taxes_rate'];
                $taxes_ytd[] = $d['taxes_ytd'];
            }

            $requestData['taxes'] = $taxes;
            $requestData['taxes_rate'] = $taxes_rate;
            $requestData['taxes_ytd'] = $taxes_ytd;

            // ======== Extra tax ========
            foreach ($request->extra_tax_deduction ?? [] as $d) {
                $tax_deduction[] = $d['tax_deduction'];
                $period_tax_deduction[] = $d['period_tax_deduction'];
                $ytd_tax_deduction[] = $d['ytd_tax_deduction'];
            }

            $requestData['tax_deduction'] = $tax_deduction;
            $requestData['period_tax_deduction'] = $period_tax_deduction;
            $requestData['ytd_tax_deduction'] = $ytd_tax_deduction;
            unset($requestData['earn']);
            unset($requestData['tax']);
            unset($requestData['extra_tax_deduction']);
        }

        return $requestData;
    }

    static function editFormData($data)
    {
        $earn = [];
        $tax = [];
        $extra_tax_deduction = [];

        foreach ($data->earning ?? [] as $key => $earning) {
            $arr = [];
            $arr['earning'] = $earning;
            $arr['rate'] = $data->rate[$key];
            $arr['hours'] = $data->hours[$key];
            $arr['total'] = $data->total[$key];
            $arr['period'] = $data->period[$key];
            $arr['ytd_total'] = $data->ytd_total[$key];
            $data->earn[] = $arr;
        }

        foreach ($data->taxes ?? [] as $key => $taxes) {
            $arr = [];
            $arr['taxes'] = $taxes;
            $arr['taxes_rate'] = $data->taxes_rate[$key];
            $arr['taxes_ytd'] = $data->taxes_ytd[$key];
            $data->tax[$key] = $arr;
        }


        foreach ($data->tax_deduction ?? [] as $key => $tax_deduction) {
            $arr = [];
            $arr['tax_deduction'] = $tax_deduction;
            $arr['period_tax_deduction'] = $data->period_tax_deduction[$key];
            $arr['ytd_tax_deduction'] = $data->ytd_tax_deduction[$key];
            $data->extra_tax_deduction[$key] = $arr;
        }

        unset($data->earning);
        unset($data->rate);
        unset($data->hours);
        unset($data->total);
        unset($data->period);
        unset($data->ytd_total);
        unset($data->taxes);
        unset($data->taxes_rate);
        unset($data->taxes_ytd);
        unset($data->tax_deduction);
        unset($data->period_tax_deduction);
        unset($data->ytd_tax_deduction);

        return $data;
    }
}
