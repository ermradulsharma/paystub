<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class ValidationService
{

    public function usa($request)
    {
        $response['status'] = 200;
        $response['success'] = true;

        if ($request->form_type == "usa" || $request->form_type == "global") {
            $rules = [
                'advance_temp' => 'required_without:basic_temp',
                'basic_temp' => 'required_without:advance_temp',
                'cname' => 'required',
                'tel' => 'required',
                'address_1' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip_code' => 'required',
                'emp_name' => 'required',
                'emp_id' => 'required',
                'emp_street_1' => 'required',
                'emp_city' => 'required',
                'emp_state' => 'required',
                'emp_zip_code' => 'required',
                'emp_your_state' => 'required',
                'auto_cal' => 'required',
                'marital_status' => 'required',
                'time_period' => 'required',
                'hourly' => 'required',
                'emp_type' => 'required',
                'exemptions' => 'required',
                'currency' => 'required',
                'pay_start' => 'required',
                'pay_end' => 'required',
                'pay_date' => 'required',
                'earning' => 'required|array',
                'rate' => 'required|array',
                'hours' => 'required|array',
                'total' => 'required|array',
                'period' => 'required|array',
                'taxes' => 'required|array',
                'taxes_rate' => 'required|array',
                'taxes_ytd' => 'required|array',
                'total_net_pay' => 'required',
                'total_ytd_net_pay' => 'required'
            ];

            $messages = [
                'advance_temp.required_without' => 'Please select either advance template or basic template.',
                'basic_temp.required_without' => 'Please select either advance template or basic template.',
                'cname' => 'The Name cannot be empty',
                'tel' => 'The Mobile number cannot be empty',
                'address_1' => 'The STREET ADDRESS 1 cannot be empty',
                'city' => 'The City cannot be empty',
                'state' => 'The State cannot be empty',
                'zip_code' => 'The Zip Code cannot be empty',
                'emp_name' => 'The Employee name cannot be empty',
                'emp_id' => 'The Employee id cannot be empty',
                'emp_street_1' => 'The Employee STREET 1 cannot be empty',
                'emp_city' => 'The Employee city cannot be empty',
                'emp_state' => 'The Employee state cannot be empty',
                'emp_zip_code' => 'The Employee zip code cannot be empty',
                'emp_your_state' => 'The SELECT YOUR STATE cannot be empty',
                'auto_cal' => 'The AUTO CALCULATOR cannot be empty',
                'marital_status' => 'The MARITAL STATUS cannot be empty',
                'time_period' => 'The HOW DO YOU GET PAID cannot be empty',
                'hourly' => 'The HOURLY cannot be empty',
                'emp_type' => 'The EMPLOYMENT TYPE cannot be empty',
                'exemptions' => 'The EXEMPTIONS cannot be empty',
                'currency' => 'The SELECT YOUR PREFERRED CURRENCY cannot be empty',
                'pay_start' => 'The PAY START cannot be empty',
                'pay_end' => 'The PAY END cannot be empty',
                'pay_date' => 'The PAY DATE cannot be empty',
                'earning' => 'The EARNING cannot be empty',
                'rate' => 'The RATE be empty',
                'hours' => 'The HOURS be empty',
                'total' => 'The TOTAL cannot be empty',
                'period' => 'The PERIOD cannot be empty',
                'taxes' => 'The Taxes cannot be empty',
                'taxes_rate' => 'The Taxes Rate cannot be empty',
                'taxes_ytd' => 'The Taxes YTD cannot be empty',
                'total_net_pay' => 'The TOTAL NET PAY cannot be empty',
                'total_ytd_net_pay' => 'The TOTAL YTD NET PAY cannot be empty'
            ];
        } elseif ($request->form_type == "canada") {
            $rules = [
                'advance_temp' => 'required_without:basic_temp',
                'basic_temp' => 'required_without:advance_temp',
                'cname' => 'required',
                'address_1' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip_code' => 'required',
                'emp_name' => 'required',
                'emp_id' => 'required',
                'emp_address' => 'required',
                'currency' => 'required',
                'pay_start' => 'required',
                'pay_end' => 'required',
                'pay_date' => 'required',
                'earning' => 'required|array',
                'rate' => 'required|array',
                'hours' => 'required|array',
                'total' => 'required|array',
                'taxes' => 'required|array',
                'taxes_rate' => 'required|array',
                'taxes_ytd' => 'required|array',
            ];

            $messages = [
                'advance_temp.required_without' => 'Please select either advance template or basic template.',
                'basic_temp.required_without' => 'Please select either advance template or basic template.',
                'cname' => 'The Name cannot be empty',
                'address_1' => 'The STREET ADDRESS 1 cannot be empty',
                'city' => 'The City cannot be empty',
                'state' => 'The State cannot be empty',
                'zip_code' => 'The Zip Code cannot be empty',
                'emp_name' => 'The Employee name cannot be empty',
                'emp_id' => 'The Employee id cannot be empty',
                'emp_address' => 'The Employee STREET 1 cannot be empty',
                'currency' => 'The SELECT YOUR PREFERRED CURRENCY cannot be empty',
                'pay_start' => 'The PAY START cannot be empty',
                'pay_end' => 'The PAY END cannot be empty',
                'pay_date' => 'The PAY DATE cannot be empty',
                'earning' => 'The EARNING cannot be empty',
                'rate' => 'The RATE be empty',
                'hours' => 'The HOURS be empty',
                'total' => 'The TOTAL cannot be empty',
                'taxes' => 'The Taxes cannot be empty',
                'taxes_rate' => 'The Taxes Rate cannot be empty',
                'taxes_ytd' => 'The Taxes YTD cannot be empty',
            ];
        } elseif ($request->form_type == "uk") {
            $rules = [
                'advance_temp' => 'required_without:basic_temp',
                'basic_temp' => 'required_without:advance_temp',
                'cname' => 'required',
                'address_1' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip_code' => 'required',
                'emp_name' => 'required',
                'emp_id' => 'required',
                'emp_address' => 'required',
                'currency' => 'required',
                'pay_start' => 'required',
                'pay_date' => 'required',
                'earning' => 'required|array',
                'rate' => 'required|array',
                'hours' => 'required|array',
                'total' => 'required|array',
            ];

            $messages = [
                'advance_temp.required_without' => 'Please select either advance template or basic template.',
                'basic_temp.required_without' => 'Please select either advance template or basic template.',
                'cname' => 'The Name cannot be empty',
                'address_1' => 'The STREET ADDRESS 1 cannot be empty',
                'city' => 'The City cannot be empty',
                'state' => 'The State cannot be empty',
                'zip_code' => 'The Zip Code cannot be empty',
                'emp_name' => 'The Employee name cannot be empty',
                'emp_id' => 'The Employee id cannot be empty',
                'emp_address' => 'The Employee STREET 1 cannot be empty',
                'currency' => 'The SELECT YOUR PREFERRED CURRENCY cannot be empty',
                'pay_start' => 'The PAY START cannot be empty',
                'pay_date' => 'The PAY DATE cannot be empty',
                'earning' => 'The EARNING cannot be empty',
                'rate' => 'The RATE be empty',
                'hours' => 'The HOURS be empty',
                'total' => 'The TOTAL cannot be empty',
            ];
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            $response['status'] = 301;
            $response['success'] = false;
        }
        return $response;
    }
}
