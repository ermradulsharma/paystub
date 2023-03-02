<?php

namespace App\Services;

use App\Models\Template;
use Illuminate\Support\Facades\Validator;

class ValidationService
{

    public function usa($request)
    {

        $response['status'] = 200;
        $response['success'] = true;

        if ($request->form_type == "usa" || $request->form_type == "global") {
            // $temp = Template::where('title', $request->advance_temp)->where('template_element', true)->first();

            $rules = [
                'cname' => 'required',
                'tel' => 'required',
                'address_1' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip_code' => 'required',
                'advance_temp' => 'required_without:basic_temp',
                'basic_temp' => 'required_without:advance_temp',
                'emp_name' => 'required',
                'emp_street_1' => 'required',
                'emp_city' => 'required',
                'emp_state' => 'required',
                'emp_zip_code' => 'required',
                'emp_your_state' => 'required',
                'auto_cal' => 'required',
                'marital_status' => 'required',
                'time_period' => 'required',
                // 'hourly' => 'required',
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
                'total_ytd_net_pay' => 'required',
                'co_number' => "required_if:advance_temp,lapis,olive,reddish,wood,pt_blue,pt_brown,pt_green,box_blue,global_white_check,paystubx_check,aegean,amethyst",
                'file_number' => "required_if:advance_temp,lapis,olive,reddish,wood,pt_blue,pt_brown,pt_green,box_blue,global_white_check,paystubx_check,aegean,amethyst",
                'clock_vchr_number' => "required_if:advance_temp,lapis,olive,reddish,wood,pt_blue,pt_brown,pt_green,box_blue,global_white_check,paystubx_check,aegean,amethyst",
                'advice_number' => "required_if:advance_temp,lapis,olive,reddish,wood,pt_blue,pt_brown,pt_green,box_blue,global_white_check,paystubx_check,aegean,amethyst",
                'account_number_last_4' => "required_if:advance_temp,lapis,olive,reddish,wood,pt_blue,pt_brown,pt_green,box_blue,global_white_check,paystubx_check,aegean,amethyst",
                'transit_aba_number' => "required_if:advance_temp,lapis,olive,reddish,wood,pt_blue,pt_brown,pt_green,box_blue,global_white_check,paystubx_check,aegean,amethyst",
            ];

            $messages = [
                'cname' => 'Employer(Company) Name cannot be empty',
                'tel' => 'Employer(Company) Mobile number cannot be empty',
                'address_1' => 'Employer(Company) Street Address 1 cannot be empty',
                'city' => 'Employer(Company) City cannot be empty',
                'state' => 'Employer(Company) State cannot be empty',
                'zip_code' => 'Employer(Company) Zip Code cannot be empty',
                'basic_temp.required_without' => 'Please select either advance template or basic template.',
                'advance_temp.required_without' => 'Please select either advance template or basic template.',
                'emp_name' => 'Employee name cannot be empty',
                'emp_street_1' => 'Employee Street Address 1 cannot be empty',
                'emp_city' => 'Employee city cannot be empty',
                'emp_state' => 'Employee state cannot be empty',
                'emp_zip_code' => 'Employee zip code cannot be empty',
                'emp_your_state' => 'Please SELECT YOUR STATE',
                'auto_cal' => 'AUTO CALCULATOR cannot be empty',
                'marital_status' => 'MARITAL STATUS cannot be empty',
                'time_period' => 'HOW DO YOU GET PAID cannot be empty',
                // 'hourly' => 'HOURLY cannot be empty',
                'pay_start' => 'PAY START cannot be empty',
                'pay_end' => 'PAY END cannot be empty',
                'pay_date' => 'PAY DATE cannot be empty',
                'earning' => 'EARNING cannot be empty',
                'rate' => 'RATE be empty',
                'hours' => 'HOURS be empty',
                'total' => 'TOTAL cannot be empty',
                'period' => 'PERIOD cannot be empty',
                'taxes' => 'Taxes cannot be empty',
                'taxes_rate' => 'Taxes Rate cannot be empty',
                'taxes_ytd' => 'Taxes YTD cannot be empty',
                'total_net_pay' => 'TOTAL NET PAY cannot be empty',
                'total_ytd_net_pay' => 'TOTAL YTD NET PAY cannot be empty',
                'co_number'  => 'CO number cannot be empty',
                'file_number'  => 'FILE number cannot be empty',
                'clock_vchr_number'  => 'CLOCK VCHR number cannot be empty',
                'advice_number'  => 'ADVICE number cannot be empty',
                'account_number_last_4.required'  => 'ACCOUNT LAST 4 number cannot be empty',
                'transit_aba_number'  => 'TRANSIT ABA number cannot be empty',
                'account_number_last_4.min' => 'You have to fill  min 4 digit numbers',
                'account_number_last_4.max' => 'You can not fill  more than  4 digit numbers',
            ];
        } elseif ($request->form_type == "canada") {
            $rules = [
                'basic_temp' => 'required',
                'cname' => 'required',
                'address_1' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip_code' => 'required',
                'emp_name' => 'required',
                'emp_id' => 'required',
                'currency' => 'required',
                'pay_start' => 'required',
                'pay_end' => 'required',
                'pay_date' => 'required',
                'earning' => 'required|array',
                'rate' => 'required|array',
                'hours' => 'required|array',
                'total' => 'required|array',
                'check_number' => 'required',
            ];

            $messages = [
                'basic_temp' => 'Please select template.',
                'cname' => 'Name cannot be empty',
                'address_1' => 'STREET ADDRESS 1 cannot be empty',
                'city' => 'City cannot be empty',
                'state' => 'State cannot be empty',
                'zip_code' => 'Zip Code cannot be empty',
                'emp_name' => 'Employee name cannot be empty',
                'emp_id' => 'Employee id cannot be empty',
                'currency' => 'Please SELECT YOUR PREFERRED CURRENCY cannot be empty',
                'pay_start' => 'PAY START cannot be empty',
                'pay_end' => 'PAY END cannot be empty',
                'pay_date' => 'PAY DATE cannot be empty',
                'earning' => 'EARNING cannot be empty',
                'rate' => 'RATE be empty',
                'hours' => 'HOURS be empty',
                'total' => 'TOTAL cannot be empty',
                'check_number' => 'Check number cannot be empty',
            ];
        } elseif ($request->form_type == "uk") {
            $rules = [
                'basic_temp' => 'required',
                'cname' => 'required',
                'company_address' => 'required',
                'emp_zip_code' => 'required',
                'emp_name' => 'required',
                'emp_street_1' => 'required',
                'pay_start' => 'required',
                'pay_end' => 'required',
                'pay_date' => 'required',
                'pay_type' => 'required',
                'payment_method' => 'required',
                'tax_code' => 'required',
                'ni_number' => 'required',
                'ni_table_letter' => 'required',
                'earning' => 'required|array',
                'rate' => 'required|array',
                'hours' => 'required|array',
            ];

            $messages = [
                'basic_temp' => 'Please select template.',
                'cname' => 'Name cannot be empty',
                'company_address' => 'STREET ADDRESS 1 cannot be empty',
                'emp_zip_code' => 'Zip Code cannot be empty',
                'emp_name' => 'Employee name cannot be empty',
                'emp_street_1' => 'Employee STREET 1 cannot be empty',
                'pay_start' => 'PAY START cannot be empty',
                'pay_end' => 'PAY END cannot be empty',
                'pay_type' => 'PAY TYPE cannot be empty',
                'pay_date' => 'PAY DATE cannot be empty',
                'payment_method' => 'PAYMENT METHOD cannot be empty',
                'tax_code' => 'TAX CODE cannot be empty',
                'ni_number' => 'NI NUMBER cannot be empty',
                'ni_table_letter' => 'NI TABLE LETTER cannot be empty',
                'earning' => 'EARNING cannot be empty',
                'rate' => 'RATE be empty',
                'hours' => 'HOURS be empty',
            ];
        } elseif ($request->form_type == "w2form") {
            $rules = [
                'form_type' => 'required',
            ];

            $messages = [
                'form_type' => 'Form type is required',
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
