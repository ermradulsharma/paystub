<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class ValidationService
{

    public function usa($request)
    {
        $response['status'] = 200;
        if ($request->form_type == "usa") {
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
                'emp_address' => 'The Employee address cannot be empty',
                'currency' => 'The SELECT YOUR PREFERRED CURRENCY cannot be empty',
                'pay_start' => 'The PAY START cannot be empty',
                'pay_date' => 'The PAY DATE cannot be empty',
                'earning' => 'The EARNING cannot be empty',
                'rate' => 'The RATE be empty',
                'hours' => 'The HOURS be empty',
                'total' => 'The TOTAL cannot be empty',
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
        }
        return $response;
    }
}
