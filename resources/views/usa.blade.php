@extends('layouts.app')

@section('content')
<!-- Modal Start -->
<div class="modal fade" id="openEye" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src=" " class="setImage w-100">
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
<div class="container mt-2" style="max-width:1450px;">
    <form id="usa_paystubx" action="" method="post">
        @csrf
        <div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">
                        <h5>Company Info</h5>
                        <div class="row mb-3 ">
                            <div class="col-md-6 mt-1">
                                <div>
                                    <label for="cname" class="lable">EMPLOYER (COMPANY) NAME <span class="redColor">*</span> </label>
                                    <input type="text" id="cname" name="cname" placeholder="Your Employer & Company Name" class="w-100 p-2 text-center textInputFontSize">
                                </div>
                            </div>

                            <div class="col-md-6 mt-1">
                                <div>
                                    <label for="tel" class="lable">EMPLOYER TELEPHONE NUMBER <span class="redColor">*</span> </label>
                                    <input type="tel" id="tel" name="tel" placeholder="123-234-4565" class="w-100 p-2 text-center textInputFontSize">
                                </div>
                            </div>

                        </div>
                        <div id="map" hidden></div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label for="address_1" class="lable">STREET ADDRESS 1 <span class="redColor">*</span> </label>
                                    <input type="text" id="address_1" name="address_1" placeholder="Your Employer Address" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label for="address_2" class="lable">STREET ADDRESS 2 <span class="redColor">*</span> </label>
                                    <input type="text" id="address_2" name="address_2" placeholder="Suite 101 or Apt 101 (optional)" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div>
                                    <label for="city" class="lable">City <span class="redColor">*</span> </label>
                                    <input type="text" id="city" name="city" placeholder="Your Employer City" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label for="state" class="lable">State <span class="redColor">*</span> </label>
                                    <div class="dropdown ">
                                        <select name="state" id="state" class="state dropdown11">
                                            <option> --- Select --- </option>
                                            @foreach ($stateTaxes as $stateTax )
                                            <option value="{{ $stateTax->state }}">{{ $stateTax->state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label for="zip_code" class="lable">Zip Code <span class="redColor">*</span> </label>
                                    <input type="text" id="zip_code" name="zip_code" placeholder=" Zip Code" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h5>Choose Template</h5>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">
                        <div class="d-flex justify-content-between mb-3 flex">
                            <div class="col-md-5 col-lg-6 col-sm-12 mt-5  text-center">
                                <h6 style="" class="base">BASIC TEMPLATES</h6>
                                <div class="mt-4">
                                    <div class="input-group mmenu mb-3 text-center">
                                        <select name="basic_temp" class="form-control dropdown1 text-center bt_id small-font" style="margin-right:10px; font-size:18px;">
                                            <option> --- Select Basic Templates --- </option>
                                            @foreach ($basicType as $data)
                                            @if($data->state == 'usa' && $data->type == 'basic')
                                            <option value="{{$data->title ?? ''}}" data-src="{{$data->images->file ?? ''}}">
                                                {{$data->title}}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <i data-src="{{$data->images->file ?? ''}}" class="fa fa-eye-slash basicTem" style="font-size: 39px;" role="button"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center sh">
                                <img src="images/hrpng.png" style="height: 200px;">
                            </div>
                            <div class="col-md-5 col-lg-6 col-sm-12 mt-5 text-center">
                                <h6 style="margin-left:-23px;font-weight: 900;">ADVANCED TEMPLATES</h6>
                                <div class="mt-4">
                                    <div class="input-group mmenu mb-3">
                                        <select name="advance_temp" class="form-control text-center dropdown1 at_id small-font" style="margin-right:10px; font-size:18px;">
                                            <option> --- Select Advance Template --- </option>
                                            @foreach ($advanceType as $data)
                                            @if($data->state == 'usa' && $data->type == 'advance')
                                            <option value="{{$data->title ?? ''}}" data-src="{{$data->images->file ?? ''}}">
                                                {{$data->title ?? ''}}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <i data-src="{{$data->images->file ?? ''}}" class="fa fa-eye-slash advanceTem" role="button" style="font-size: 39px;"></i>
                                    </div>
                                </div>
                                <div class=" mt-3 ">
                                    <button class="viewbtn"> <a href="{{url('template-view')}}">Click to see Template Landscape view.This is not part of design</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h5>Employee Info</h5>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">
                        <div class="row mb-3">
                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="emp_name" class="lable">EMPLOYEE NAME <span class="redColor">*</span> </label>
                                    <input type="text" id="emp_name" name="emp_name" placeholder="Your Full  Name" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>

                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="emp_id" class="lable">EMPLOYEE ID <span class="redColor">*</span> </label>
                                    <input type="text" id="emp_id" name="emp_id" placeholder="Employer ID" class="w-100 p-2 r textInputFontSize">
                                </div>

                            </div>
                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="emp_ssn" class="lable">EMPLOYEE SSN last4 <span class="redColor">*</span> </label>
                                    <input type="text" id="emp_ssn" name="emp_ssn" placeholder="1224" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label for="emp_street_1" class="lable">STREET 1 <span class="redColor">*</span></label>
                                    <input type="text" id="emp_street_1" name="emp_street_1" placeholder="Your Address" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label for="emp_street_2" class="lable">STREET 2 <span class="redColor">*</span> </label>
                                    <input type="text" id="emp_street_2" name="emp_street_2" placeholder="Suite 101 or Apt 101(optional)" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div>
                                    <label for="emp_city" class="lable">City <span class="redColor">*</span> </label>
                                    <input type="text" id="emp_city" name="emp_city" placeholder="Your City" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label for="emp_state" class="lable">State <span class="redColor">*</span> </label>
                                    <div class="dropdown ">
                                        <select name="emp_state" id="emp_state" class=" dropdown11 tax_rate">
                                            <option value="" data-tax=""> --- Select --- </option>
                                            @foreach ($stateTaxes as $stateTax )
                                            <option value="{{ $stateTax->state }}" data-tax="{{ $stateTax->rate }}">{{ $stateTax->state }}</option>
                                            @endforeach
                                        </select>
                                        <span class="d-none text-center redColor">Please Select State</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label for="emp_zip_code" class="lable">Zip Code <span class="redColor">*</span> </label>
                                    <input type="text" id="emp_zip_code" name="emp_zip_code" placeholder=" 1234" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h5>Employee Basic Info</h5>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">
                        <div class="row mb-3">
                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="emp_your_state" class="lable">SELECT YOUR STATE <span class="redColor">*</span> </label>
                                    <div class="dropdown ">
                                        <select name="emp_your_state" id="emp_your_state" class=" dropdown11">
                                            <option>Choose your State</option>
                                            @foreach ($stateTaxes as $stateTax )
                                            <option value="{{ $stateTax->state }}" data-tax="{{ $stateTax->rate }}">{{ $stateTax->state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="auto_cal" class="lable">AUTO CALCULATOR <span class="redColor">*</span> </label>
                                    <select name="auto_cal" id="auto_cal" class="dropdown11 auto_calculate">
                                        <option> --- Select Calculator --- </option>
                                        <option value="on">ON</option>
                                        <option value="off">OFF</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="marital_status" class="lable">MARITAL STATUS <span class="redColor">*</span> </label>
                                    <select name="marital_status" id="marital_status" class="dropdown11 marital_status">
                                        <option> --- Select Marital Status--- </option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="other">Prefered top not say</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="time_period" class="lable">HOW DO YOU GET PAID <span class="redColor">*</span> </label>
                                    <select name="time_period" id="time_period" class="dropdown11 time_period">
                                        <option> --- Select --- </option>
                                        <option value="weekly">Weekly</option>
                                        <option value="bi-weekly">Bi-Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="bi-monthly">Bi-Monthly</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="hourly" class="lable">HOURLY <span class="redColor">*</span> </label>
                                    <input type="text" step="0.5" id="hourly" name="hourly" placeholder="Hourly" class="w-100 p-2  textInputFontSize hourly" value="">
                                </div>

                            </div>

                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="emp_type" class="lable">EMPLOYMENT TYPE <span class="redColor">*</span> </label>
                                    <select name="emp_type" id="emp_type" class=" dropdown11">
                                        <option> --- Select Employment Type --- </option>
                                        <option value="saab">Temporary</option>
                                        <option value="opel">Permanent</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="exemptions" class="lable">EXEMPTIONS <span class="redColor">*</span> </label>
                                    <select name="exemptions" id="exemptions" class=" dropdown11">
                                        <option> --- Select Exemptions --- </option>
                                        <option value="saab">0</option>
                                        <option value="opel">1</option>
                                        <option value="opel">2</option>
                                        <option value="opel">3</option>
                                        <option value="opel">4</option>
                                        <option value="opel">5</option>
                                        <option value="opel">6</option>
                                        <option value="opel">7</option>
                                        <option value="opel">8</option>
                                        <option value="opel">9</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="currency" class="lable" class="redColor">SELECT YOUR PREFERRED CURRENCY <span class="redColor">*</span> </label>
                                    <input type="text" id="currency" name="currency" placeholder="$(USD)" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="mb- d-flex" style="justify-content: space-between;">
                <h5>Earning statement</h5>
            </div>
            <div class="row mb1">
                <div class="col-md-12">
                    <div class=" box-usa">
                        <div class="row mb-3">
                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="pay_start" class="lable">PAY START<span class="redColor">*</span> </label>
                                    <input type="date" id="pay_start" name="pay_start" placeholder="12-11-2022" class="w-100 p-2 textInputFontSize pay_start datepicker" data-id="pay_start">
                                </div>

                            </div>

                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="pay_end" class="lable">PAY END <span class="redColor">*</span> </label>
                                    <input type="date" id="pay_end" name="pay_end" placeholder="12-17-2022" class="w-100 p-2 textInputFontSize pay_end" data-id="pay_end">
                                </div>

                            </div>

                            <div class="col-md-3 mt-4">
                                <div>
                                    <label for="pay_date" class="lable">PAY DATE <span class="redColor">*</span> </label>
                                    <input type="date" id="pay_date" name="pay_date" placeholder="12-19-2022" class="w-100 p-2 textInputFontSize pay_date" data-id="pay_date">
                                </div>

                            </div>

                            <div class="col-md-3 mt-4">
                                <p class="text-center mb-0" style="font-size:18px;">How do you get paid <span class="redColor">*</span> <span> </p>
                                <div class="text-center mt-2  d-flex justify-content-center">
                                    <button class="hourbtn date_select">HOURLY</button> <button class="salrybtn">SALARY</button>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-2 ">
                                <button class="statementbtn">EARNING</button>
                            </div>
                            <div class="col-md-2 ">
                                <button class="statementbtn">RATE</button>
                            </div>
                            <div class="col-md-2 ">
                                <button class="statementbtn">HOURS</button>
                            </div>
                            <div class="col-md-2 ">
                                <button class="statementbtn">TOTAL</button>
                            </div>
                            <div class="col-md-2">
                                <button class="statementbtn">THIS PERIOD</button>
                                <p class="p-0 m-0 text-center" style="font-family: serif;font-size: 14px;"> Total Gross </p>
                            </div>
                            <div class="col-md-2 ">
                                <button class="statementbtn">YTD TOTAL</button>
                                <p class="p-0 m-0 text-center" style="font-family: serif;font-size:14px;">YTD Total Gross</p>
                            </div>
                        </div>

                        <div class="row mb-3 mt-">
                            <div class="col-md-2">
                                <div>
                                    <input class="earnbtn text-center" type="text" name="earning_0" value="Regular" id="earning_0" data-id="0">
                                </div>

                            </div>

                            <div class="col-md-2 ">
                                <div>
                                    <input type="text" name="rate_0" class="earnbtn text-center calculation" value="" id="rate_0" data-id="0">
                                </div>

                            </div>

                            <div class="col-md-2 ">
                                <div>
                                    <input type="text" name="hours_0" class="earnbtn text-center hours calculation" value="" id="hours_0" data-id="0">
                                </div>

                            </div>

                            <div class="col-md-2">
                                <div>
                                    <input type="text" name="total_0" class="earnbtn text-center" value="" id="total_0" data-id="0">
                                </div>

                            </div>

                            <div class="col-md-2">
                                <div>
                                    <input type="text" name="period_0" class="earnbtn text-center gross_total" value="" id="period_0" data-id="0">
                                </div>

                            </div>

                            <div class="col-md-2">
                                <div>
                                    <input type="text" name="ytd_total_0" class="earnbtn text-center ytd_total" value="" id="ytd_total_0" data-id="0">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <input type="text" name="" class="earnbtn text-center period_gross_total" value="" id="period_gross_total" hidden>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="" class="earnbtn text-center ytd_gross_total" value="" id="ytd_gross_total" hidden>
                        </div>
                        <div class="field_wrapper"> </div>

                        <div class="row mb-3">
                            <div class="col-md-2 mt-2 mb-5">
                                <button class="add_button earnbtn" type="add_earning" id="add_earning"><i class="fa fa-plus-circle pr-2" style="font-size:24px;color:green"></i>Add Earning</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <button class="createbtn ">DEDUCTIONS</button>
                            </div>
                        </div>

                        @foreach ($deduction as $key => $item)
                        <div class="row mb-3 mt-4">
                            <div class="col-md-4 col-lg-3">
                                <img src="images/lock.png">
                                <input class="earnbtn text-center taxes" data-id="{{$key}}" data-value="{{ $item->price }}" value="{{$item->title}}">
                            </div>
                            <div class="col-md-1 col-lg-1"></div>
                            <div class="col-md-2 col-lg-3"></div>
                            <div class="col-md-1 col-lg-1"></div>
                            <div class="col-md-2 col-lg-2">
                                <input type="text" name="taxes_{{$key}}" class="earnbtn text-center" id="taxes_{{$key}}" value="" />
                            </div>
                            <div class="col-md-2 col-lg-2">
                                <input type="text" name="taxes_ytd_{{$key}}" class="earnbtn text-center" id="taxes_ytd_{{$key}}" value="" />
                            </div>
                        </div>
                        @endforeach
                        <div id="add_deduction" class="my-3">
                        </div>
                        <div class="row my-3">
                            <div class="col-md-4 col-lg-3">
                                <button class="add_deduction earnbtn" type="add_deduction" id="add_deduction"><i class="fa fa-plus-circle pr-5" style="font-size:24px;color:green"></i>Add Deduction</button>
                            </div>

                            <div class="col-md-1"></div>
                            <div class="col-md-2 col-lg-3"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-3">
                                <input class="earnbtn text-center" type="text" value="Taxes/Deduction Tax">
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2 col-lg-3"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <input type="text" name="deduction_tax" class="earnbtn deduction_tax text-center" value="" />
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="ytd_deduction_tax" class="earnbtn ytd_deduction_tax text-center" value="" />
                            </div>
                        </div>
                        <div class="row mb-3 mt-5">
                            <div class="col-md-4 col-lg-3">
                                <button class="netpaybtn net_pay">Net Pay</button>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2 col-lg-3"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <p class="p-0 m-0 text-center" style="font-family: serif;">Net Pay</p>
                                <input class="earnbtn text-center total_net_pay" value="">
                            </div>
                            <div class="col-md-2">
                                <p class="p-0 m-0 text-center" style="font-family: serif;">YTD Net pay</p>
                                <input class="earnbtn text-center total_ytd_net_pay" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h5>Template Elements</h5>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">
                        <div class="row mb-3">
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <p class="p-0 m-0 " style="font-family: serif;">CO<span class="redColor">*</span></p>
                                <input class="earnbtn text-center " value=""></input>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <p class="p-0 m-0 text-center" style="font-family: serif;">FILE.<span class="redColor">*</span></p>
                                <input class="earnbtn text-center " value=""></input>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <p class="p-0 m-0 " style="font-family: serif;">CLOCK VCHR.<span class="redColor">*</span>
                                </p>
                                <input class="earnbtn text-center " value=""></input>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <p class="p-0 m-0 " style="font-family: serif;">Advice Number:<span class="redColor">*</span></p>
                                <input class="earnbtn text-center " value=""></input>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <p class="p-0 m-0 " style="font-family: serif;">Account Number LAST<span class="redColor">*</span></p>
                                <input class="earnbtn text-center " value=""></input>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <p class="p-0 m-0 " style="font-family: serif;">Transit ABA<span class="redColor">*</span>
                                </p>
                                <input class="earnbtn text-center " value=""></input>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <div class="mb-4 d-flex" style="justify-content: space-between; align-items: center;">
                <div class="text-left mt-1">
                    <button class="previewbtn text-capitalize" type="submit" id="button1">Preview Your Paystub <i class="fa fa-eye" style="font-size: 30px; margin-left: 7px;"></i></button>
                </div>
                <div class="text-right mt-1" style="margin-right:30px;">
                    <button class="emailbtn text-capitalize" data-toggle="modal" data-target="#myModal"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>

<script>
    var days_number;
    $(document).ready(function() {
        $('.tax_rate').change(function() {
            var tax_rate = $('.tax_rate').find(":selected").data('tax');
            if (tax_rate == '') {
                $("span").removeClass("d-none");
                $('.tax_rate').focus();
            }
            console.log('tax_rate', tax_rate);
        });

        $('.time_period').change(function() {
            var tax_rate = $('.tax_rate').find(":selected").data('tax');
            var pay_start = new Date($('.pay_start').val());
            var pay_start_1 = $('.pay_start').val();
            if (pay_start != "" && pay_start != 'Invalid Date') {
                alert("qwertyuiop")
                dayCalculate();
            } else {
                //
            }
            if (tax_rate == '') {
                $("span").removeClass("d-none");
                $('.tax_rate').focus();
            }
            console.log('pay_start', pay_start);
            console.log('pay_start_1', pay_start_1);
        });

        $('.hourly').keyup(function() {
            var id = $(this).val();
            $('#rate_0').val(parseFloat(id).toFixed(2));
        });

        $('.pay_date').change(function() {
            var pay_start = new Date($(".pay_start").val());
            var date = pay_start.getDate();
            var month = pay_start.getMonth() + 1;
            var year = pay_start.getFullYear();
            var pay_start_1 = year + '-' + (('' + month).length < 2 ? '0' : '') + month + '-' + (('' + date).length < 2 ? '0' : '') + date;

            var pay_end = new Date($(".pay_end").val());
            var date = pay_end.getDate();
            var month = pay_end.getMonth() + 1;
            var year = pay_end.getFullYear();
            var pay_end_1 = year + '-' + (('' + month).length < 2 ? '0' : '') + month + '-' + (('' + date).length < 2 ? '0' : '') + date;

            var pay_date = new Date($(".pay_date").val());
            var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var day = pay_date.getDay();
            var day_name = weekday[pay_date.getDay()];

            var date = pay_date.getDate();
            var month = pay_date.getMonth() + 1;
            var year = pay_date.getFullYear();
            var pay_date_1 = year + '-' + (('' + month).length < 2 ? '0' : '') + month + '-' + (('' + date).length < 2 ? '0' : '') + date;

            if (pay_date_1 <= pay_end_1) {
                $('#ytd_total_0').val(parseFloat(0).toFixed(2));

            } else {


                var time_period = $(".time_period").val();
                var dt3 = new Date(pay_start_1);
                var dt2 = new Date(pay_end_1);
                var dt1 = new Date(pay_date_1);
                var mBetween = dt1.getTime() - dt3.getTime();
                var days = (mBetween / (1000 * 3600 * 24));
                if (time_period == "weekly") {
                    days_number = days / 7;
                }
                if (time_period == "bi-weekly") {
                    days_number = days / 14;
                }
                if (time_period == "monthly") {
                    days_number = days / 30;
                }
                if (time_period == "bi-monthly") {
                    days_number = days / 61;
                }
                var hours = $('#hours_0').val();
                if (hours == '' && hours == 0) {
                    $('#total_0').val(parseFloat(0).toFixed(2));
                    $('#period_0').val(parseFloat(0).toFixed(2));
                    $('#ytd_total_0').val(parseFloat(0).toFixed(2));
                    // return false;
                } else {
                    calculation(0);
                }
                console.log('hours', hours);
            }
        });

        $('.pay_start').change(function() {
            dayCalculate();
        });

        function dayCalculate() {
            var pay_start = new Date($('.pay_start').val());
            var day = pay_start.getDate();
            var month = pay_start.getMonth() + 1;
            var year = pay_start.getFullYear();
            var pay_start_1 = year + '-' + (('' + month).length < 2 ? '0' : '') + month + '-' + (('' + day).length < 2 ? '0' : '') + day;

            var time_period = $(".time_period").val();


            if (time_period == "weekly") {
                var dt1 = new Date(pay_start);
                var newDate = moment(dt1).add(1, 'weeks').format('YYYY-MM-DD');
            }
            if (time_period == "bi-weekly") {
                var dt1 = new Date(pay_start);
                var newDate = moment(dt1).add(2, 'weeks').format('YYYY-MM-DD');
            }
            if (time_period == "monthly") {
                var dt1 = new Date(pay_start);
                var newDate = moment(dt1).add(1, 'months').format('YYYY-MM-DD');
            }
            if (time_period == "bi-monthly") {
                var dt1 = new Date(pay_start);
                var newDate = moment(dt1).add(2, 'months').format('YYYY-MM-DD');
            }

            if (pay_start == '') {
                $('#rate_0').val(parseFloat(0).toFixed(2));
                $('#total_0').val(parseFloat(0).toFixed(2));
                $('#period_0').val(parseFloat(0).toFixed(2));
                $('#ytd_total_0').val(parseFloat(0).toFixed(2));
            }

            var newDate_1 = moment(newDate).subtract(1, 'days').format('YYYY-MM-DD');
            setTimeout(() => {
                $(".pay_end").val(newDate_1)
            }, 400);
        }

        var maxField = 12;
        var addButton = $('#add_earning');
        var wrapper_1 = $('.field_wrapper');
        var addDeduction = $('.add_deduction');
        var wrapper_2 = $('#add_deduction');
        var net_pay = $('.net_pay');
        var x = 1;
        var i = 1;

        $(addButton).click(function() {
            var fieldHTML =
                '<div class="row mb-3">' +
                '<div class="col-md-2 ">' +
                '<input  id="earning_' + i + '" data-id="' + i + '" class="earnbtn text-center" value="">' +
                '</div>' +
                '<div class="col-md-2 ">' +
                '<input type="text" id="rate_' + i + '" data-id="' + i + '" class="earnbtn calculation text-center" value="">' +
                '</div>' +
                '<div class="col-md-2 ">' +
                '<input type="text" id="hours_' + i + '" data-id="' + i + '" class="earnbtn calculation text-center hours" value="">' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="text" id="total_' + i + '" data-id="' + i + '" class="earnbtn text-center" value="">' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="text" id="period_' + i + '" data-id="' + i + '" class="earnbtn gross_total text-center" value="">' +
                '</div>' +
                '<div class="col-md-2 ">' +
                '<input type="text" id="ytd_total_' + i + '" data-id="' + i + '" class="earnbtn ytd_total text-center" value="">' +
                '</div>' +
                '</div>';
            if (x < maxField) {
                x++;
                $(wrapper_1).append(fieldHTML);
            }
            i++;

            $('.calculation').keyup(function() {
                var id = $(this).data('id');
                setTimeout(function() {
                    calculation(id);
                }, 300);
            });
            return false;
        });

        $(addDeduction).click(function() {
            var fieldHTML =
                '<div class="row mb-3">' +
                '<div class="col-md-3">' +
                '<i class="fa fa-lock earnbtn2"></i>' +
                '<input class="earnbtn text-center" type="text" value="">' +
                '</div>' +
                '<div class="col-md-1"> </div>' +
                '<div class="col-md-3"> </div>' +
                '<div class="col-md-1"> </div>' +
                '<div class="col-md-2">' +
                '<input type="text" class="earnbtn text-center tax_deduction tax" value=""/>' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="text" class="earnbtn text-center ytd_tax tax" value=""/>' +
                '</div>' +
                '</div>';
            if (x < maxField) {
                x++;
                $(wrapper_2).append(fieldHTML);
            }


            $('.tax_deduction').keyup(function() {
                var value = $(this).val();
                tax_deduction(value);
            });

            $('.ytd_tax').keyup(function() {
                var ytd_tax = 0;
                $('.ytd_tax').each(function() {
                    ytd_tax += parseFloat(this.value);
                });
                setTimeout(function() {
                    $(".ytd_deduction_tax").val(ytd_tax);
                }, 300);

            });
            return false;
        });

        $('.calculation').keyup(function() {
            var id = $(this).data('id');
            setTimeout(function() {
                calculation(id);
            }, 300);


        });

        function calculation(id) {
            var rate = parseFloat($('#rate_' + id).val()).toFixed(2);
            var hours = parseFloat($('#hours_' + id).val()).toFixed(2);
            var total = rate * hours;
            var ytd_total = total * parseInt(days_number);
            setTimeout(function() {
                $('#total_' + id).val(parseFloat(total).toFixed(2));
                $('#period_' + id).val(parseFloat(total).toFixed(2));
                $('#ytd_total_' + id).val(parseFloat(ytd_total).toFixed(2));
                gross_total();
            }, 300);
        }

        function gross_total() {
            var total = 0;
            $('.gross_total').each(function() {
                total += parseFloat(this.value);
            });
            var ytd_total = 0;
            $('.ytd_total').each(function() {
                ytd_total += parseFloat(this.value);
            });

            setTimeout(function() {
                $("#period_gross_total").val(parseFloat(total).toFixed(2));
                $("#ytd_gross_total").val(parseFloat(ytd_total).toFixed(2));
                default_tax();
            }, 300);
        }

        function default_tax() {
            var period_gross_total = $("#period_gross_total").val();
            var ytd_gross_total = $("#ytd_gross_total").val();
            var tax_state = $('option:selected', '.tax_rate').attr('data-tax');
            period_deduction_tax = 0;
            period_ytd_deduction_tax = 0;
            var time = 200;
            $('.taxes').each(function() {
                var taxes_ids = $(this).data('id');
                var taxes_values = $(this).data('value');
                var tax_name = $(this).val();

                if (tax_name == 'State Tax') {
                    taxes_values = parseFloat(tax_state).toFixed(2);
                }
                period_tax_price = parseFloat(period_gross_total).toFixed(2) * (taxes_values / 100);
                period_ytd_tax_price = parseFloat(ytd_gross_total).toFixed(2) * (taxes_values / 100);

                $('#taxes_' + taxes_ids).val(parseFloat(period_tax_price).toFixed(2));
                $('#taxes_ytd_' + taxes_ids).val(parseFloat(period_ytd_tax_price).toFixed(2));

                period_deduction_tax += period_tax_price;
                period_ytd_deduction_tax += period_ytd_tax_price
                setTimeout(function() {
                    $(".deduction_tax").val(parseFloat(period_deduction_tax).toFixed(2));
                    $(".ytd_deduction_tax").val(parseFloat(period_ytd_deduction_tax).toFixed(2));

                }, 200);
                time += 200;
            });
            setTimeout(() => {
                netPay();
            }, time);

        }

        function tax_deduction(value) {
            var tax_total = $(".deduction_tax").val();
            console.log(value);
            if (value == '') {
                value = 0;
            }
            var taxes = parseFloat(tax_total) + parseFloat(value);
            $(".deduction_tax").val(parseFloat(taxes).toFixed(2));
        }

        function netPay() {
            var period_gross_total = $("#period_gross_total").val();
            var ytd_gross_total = $("#ytd_gross_total").val();
            var deduction_tax = $(".deduction_tax").val();
            var ytd_deduction_tax = $(".ytd_deduction_tax").val();

            var total_net_pay = parseFloat(period_gross_total) - parseFloat(deduction_tax);
            var total_ytd_net_pay = parseFloat(ytd_gross_total) - parseFloat(ytd_deduction_tax);
            setTimeout(function() {
                $(".total_net_pay").val(parseFloat(total_net_pay).toFixed(2));
                $(".total_ytd_net_pay").val(parseFloat(total_ytd_net_pay).toFixed(2));
            }, 300);
        }
    });

</script>

<script>
    $('.basicTem').click(function() {
        var imageattr = $('option:selected', '.bt_id').attr('data-src');
        $('.setImage').attr('src', imageattr);
        if (imageattr != null && imageattr != undefined) {
            $('#openEye').modal('show');
        }
    });

    $('.advanceTem').click(function() {
        var imageattr = $('option:selected', '.at_id').attr('data-src');
        $('.setImage').attr('src', imageattr);
        if (imageattr != null && imageattr != undefined) {
            $('#openEye').modal('show');
        }

    });

</script>

<script>
    $(document).ready(function() {
        $('#button1').click(function() {
            $("#usa_paystubx").validate({
                rules: {
                    cname: {
                        required: true
                    , }
                    , tel: {
                        required: true
                    , }
                    , address_1: {
                        required: true
                    , }
                    , address_2: {
                        required: true
                    , }
                    , city: {
                        required: true
                    , }
                    , emp_name: {
                        required: true
                    , }
                    , emp_id: {
                        required: true
                    , }
                    , emp_ssn: {
                        required: true
                    , }
                    , emp_street_1: {
                        required: true
                    , }
                    , emp_street_2: {
                        required: true
                    , }
                    , emp_city: {
                        required: true
                    , }
                    , state: {
                        required: true
                    , }
                    , emp_state: {
                        required: true
                    , }
                , }
                , messages: {
                    cname: {
                        required: "This field is requierd."
                    }
                    , tel: {
                        required: "This field is requierd."
                    }
                    , address_1: {
                        required: "This field is requierd."
                    }
                    , address_2: {
                        required: "This field is requierd."
                    }
                    , city: {
                        required: "This field is requierd."
                    }
                    , emp_name: {
                        required: "This field is requierd."
                    }
                    , emp_id: {
                        required: "This field is requierd."
                    }
                    , emp_ssn: {
                        required: "This field is requierd."
                    }
                    , emp_street_1: {
                        required: "This field is requierd."
                    }
                    , emp_street_2: {
                        required: "This field is requierd."
                    }
                    , emp_city: {
                        required: "This field is requierd."
                    }
                    , state: {
                        required: "This field is requierd."
                    }
                    , emp_state: {
                        required: "This field is requierd."
                    }
                , }
                , debug: false
                , errorElement: 'small'
                , errorPlacement: function(error, element) {
                    console.log(error);
                    error.insertAfter(element.parent().parent().children('div'));
                }
                , errorClass: 'error text-danger'
                , submitHandler: function(form) {
                    console.log(form.validator);
                    //form.submit();
                    $.ajax({
                        url: "{{ route('template') }}"
                        , type: 'post'
                        , data: $('#usa_paystubx').serialize()
                        , success: function(response) {
                            console.log('response ', response);
                        }
                        , error: function(err) {
                            data = err.responseJSON;
                            console.log('err ', data);
                            Swal.fire({
                                icon: 'warning'
                                , title: data.message
                                , showCancelButton: false
                                , showConfirmButton: true
                            });
                        }
                    });
                    return false;
                }
            });
        });
    });

</script>
@endsection
