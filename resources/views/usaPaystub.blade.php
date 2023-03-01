@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('user') }}/css/bootstrap-datepicker.min.css">
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
    </div>
    <!-- Modal End -->
    <!-- Modal Start -->
    <div class="modal fade" id="tempViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="" type="" id="tempView" allowtransparency="false"
                        style="background-color : transparent;" frameborder="0" width="100%" height="800">
                    {{-- <iframe src="" id="tempView" allowtransparency="false" style="background-color : transparent;" frameborder="0" width="100%" height="800"></iframe> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <div class="container mt-2 px-0" style="max-width:1450px;">
        <form id="submit_form_paystubx_id" action="javascript:void()" method="get">
            @csrf
            <input type="hidden" name="form_type" value="usa" hidden>
            <div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class=" box-usa">
                            <h5 class="box-h5">Company Info</h5>
                            <div class="row mb-3 ">
                                <div class="col-md-6 mt-1">
                                    <div>
                                        <label for="cname" class="lable">EMPLOYER (COMPANY) NAME <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="cname" name="cname"
                                            placeholder="Employer(Company) Name"
                                            class="w-100 p-2 text-center input-box-font">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <div>
                                        <label for="tel" class="lable">EMPLOYER TELEPHONE NUMBER <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="tel" name="tel" placeholder="xxx-xxx-xxxx"
                                            class="w-100 p-2 text-center input-box-font third-phone">
                                    </div>
                                </div>

                            </div>
                            <div id="map" hidden></div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <label for="address_1" class="lable">STREET ADDRESS 1 <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="address_1" name="address_1"
                                            placeholder="Company Street Address 1" class="w-100 p-2  input-box-font">
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <label for="address_2" class="lable">STREET ADDRESS 2 </label>
                                        <input type="text" id="address_2" name="address_2"
                                            placeholder="Company Street Address 2 (optional)"
                                            class="w-100 p-2  input-box-font">
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div>
                                        <label for="city" class="lable">City <span class="redColor">*</span> </label>
                                        <input type="text" id="city" name="city" placeholder="City"
                                            class="w-100   input-box-font">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="state" class="lable">State <span class="redColor">*</span>
                                        </label>
                                        <div class="dropdown ">
                                            <select name="state" id="state" class="state dropdown11">
                                                <option value=""> --- Select State --- </option>
                                                @foreach ($stateTaxes as $stateTax)
                                                    <option value="{{ $stateTax->state }}">{{ $stateTax->state }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="zip_code" class="lable">Zip Code <span class="redColor">*</span>
                                        </label>
                                        <input type="text" id="zip_code" name="zip_code" placeholder=" Zip Code"
                                            class="w-100 input-box-font zip_code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h5 class="box-h5">Choose Your Template</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class=" box-usa">
                            <div class="d-flex justify-content-between mb-3 flex w-100">
                                <div class="col-md-5 col-lg-6 col-sm-10 mt-5  text-center margin-left">
                                    <h6 style="" class="base">BASIC TEMPLATES</h6>
                                    <div class="mt-4">
                                        <div class="input-group mmenu mb-3 text-center">
                                            <select name="basic_temp"
                                                class="form-control dropdown1 text-center bt_id small-font basicTemplate"
                                                style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Basic Templates --- </option>
                                                @foreach ($basicType as $data)
                                                    <option value="{{ $data->title ?? '' }}"
                                                        data-src="{{ $data->images->file ?? '' }}"
                                                        data-status="{{ $data->template_element }}">
                                                        {{ $data->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <i data-src="{{ $data->images->file ?? '' }}"
                                                class="fa fa-eye-slash basicTem uk-eye" style="font-size: 39px;"
                                                role="button"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center sh">
                                    <img src="{{ asset('images/hrpng.png') }}" style="height: 200px;">
                                </div>
                                <div class="col-md-5 col-lg-6 col-sm-10 mt-5 text-center margin-right">
                                    <h6 style="margin-left:-23px;font-weight: 900;">ADVANCED TEMPLATES</h6>
                                    <div class="mt-4">
                                        <div class="input-group mmenu mb-3">
                                            <select name="advance_temp"
                                                class="form-control text-center dropdown1 at_id small-font advanceTemplate"
                                                style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Advance Template --- </option>
                                                @foreach ($advanceType as $data)
                                                    <option value="{{ $data->title ?? '' }}"
                                                        data-src="{{ $data->images->file ?? '' }}"
                                                        data-status="{{ $data->template_element }}">
                                                        {{ $data->name ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <i data-src="{{ $data->images->file ?? '' }}"
                                                class="fa fa-eye-slash advanceTem uk-eye" role="button"
                                                style="font-size: 39px;"></i>
                                        </div>
                                    </div>
                                    <div class=" mt-3 ">
                                        <button class="viewbtn"> <a href="{{ url('template-view') }}">Click to see
                                                Template Landscape view.This is not part of design</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h5 class="box-h5">Employee Info</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class=" box-usa">
                            <div class="row mb-3">
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="emp_name" class="lable">EMPLOYEE NAME <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="emp_name" name="emp_name" placeholder="Employee Name"
                                            class="w-100  input-box-font">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="emp_id" class="lable">EMPLOYEE ID </label>
                                        <input type="text" id="emp_id" name="emp_id" placeholder="Employer ID"
                                            class="w-100 r input-box-font">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="emp_ssn" class="lable">EMPLOYEE SSN Last 4 <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="emp_ssn" name="emp_ssn"
                                            placeholder="SSN (Last 4 digits)" class="w-100 input-box-font" maxlength="4"
                                            minlength="4"
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <label for="emp_street_1" class="lable">STREET ADDRESS 1 <span
                                                class="redColor">*</span></label>
                                        <input type="text" id="emp_street_1" name="emp_street_1"
                                            placeholder="Employee Street Address 1" class="w-100  input-box-font">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <label for="emp_street_2" class="lable">STREET ADDRESS 2
                                        </label>
                                        <input type="text" id="emp_street_2" name="emp_street_2"
                                            placeholder="Employee Street Address 2 (optional)"
                                            class="w-100  input-box-font">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div>
                                        <label for="emp_city" class="lable">City <span class="redColor">*</span>
                                        </label>
                                        <input type="text" id="emp_city" name="emp_city" placeholder="City"
                                            class="w-100   input-box-font">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="emp_state" class="lable">State <span class="redColor">*</span>
                                        </label>
                                        <div class="dropdown ">
                                            <select name="emp_state" id="emp_state" class=" dropdown11 ">
                                                <div>
                                                    <option class="ff" style="color: #757575;" value=""
                                                        data-tax="null"> --- Select State --- </option>
                                                </div>
                                                @foreach ($stateTaxes as $stateTax)
                                                    <option value="{{ $stateTax->state }}"
                                                        data-tax="{{ $stateTax->rate }}">{{ $stateTax->state }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="emp_zip_code" class="lable">Zip Code <span
                                                class="redColor">*</span></label>
                                        <input type="text" id="emp_zip_code" name="emp_zip_code"
                                            placeholder="Zip Code" class="w-100  input-box-font">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h5 class="box-h5">Employee Basic Info</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class=" box-usa">
                            <div class="row mb-3">
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="emp_your_state" class="lable">SELECT YOUR STATE <span
                                                class="redColor">*</span> </label>
                                        <div class="dropdown ">
                                            <select name="emp_your_state" id="emp_your_state"
                                                class=" dropdown11 tax_rate">
                                                {{-- <option value="">Choose your State</option> --}}
                                                @foreach ($stateTaxes as $stateTax)
                                                    <option value="{{ $stateTax->state }}"
                                                        data-tax="{{ $stateTax->rate }}">{{ $stateTax->state }}</option>
                                                @endforeach
                                            </select>
                                            <span class="d-none text-center error redColor">Please Select State</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="auto_cal" class="lable">AUTO CALCULATOR <span
                                                class="redColor">*</span> </label>
                                        <select name="auto_cal" id="auto_cal" class="dropdown11 auto_calculate">
                                            {{-- <option value=""> --- Select Calculator --- </option> --}}
                                            <option value="on">ON</option>
                                            <option value="off">OFF</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="marital_status" class="lable">MARITAL STATUS <span
                                                class="redColor">*</span> </label>
                                        <select name="marital_status" id="marital_status"
                                            class="dropdown11 marital_status">
                                            {{-- <option value=""> --- Select Marital Status--- </option> --}}
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="other">Prefered top not say</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="time_period" class="lable">HOW DO YOU GET PAID <span
                                                class="redColor">*</span> </label>
                                        <select name="time_period" id="time_period" class="dropdown11 time_period">
                                            {{-- <option value=""> --- Select --- </option> --}}
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
                                        <label for="hourly" class="lable">HOURLY <span class="redColor">*</span>
                                        </label>
                                        <input type="text" step="0.5" id="hourly" name="hourly"
                                            placeholder="Hourly" class="w-100   input-box-font hourly" value="">
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="emp_type" class="lable">EMPLOYMENT TYPE </label>
                                        <select name="emp_type" id="emp_type" class=" dropdown11">
                                            {{-- <option value=""> --- Select Employment Type --- </option> --}}
                                            <option value="Temporary">Temporary</option>
                                            <option value="Permanent">Permanent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="exemptions" class="lable">EXEMPTIONS
                                        </label>
                                        <select name="exemptions" id="exemptions" class=" dropdown11 exemptions">
                                            {{-- <option value=""> --- Select Exemptions --- </option> --}}
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="currency" class="lable" class="redColor" style="color: red;">SELECT
                                            YOUR PREFERRED
                                            CURRENCY </label>
                                        <select name="currency" id="currency" class=" dropdown11">
                                            {{-- <option value=""> --- Select currency --- </option> --}}
                                            <option value="$">Dollar $</option>
                                            <option value="€">Euro €</option>
                                            <option value="£">Pound £</option>
                                            <option value="¥">Yen ¥</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="mb- d-flex" style="justify-content: space-between;">
                    <h5 class="box-h5">Earning Statement</h5>
                </div>
                <div class="row mb1">
                    <div class="col-md-12">
                        <div class=" box-usa">
                            <div class="row mb-3">
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="pay_start" class="lable">PAY START<span class="redColor">*</span>
                                        </label>
                                        <input
                                            style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;"
                                            type="text" id="pay_start" name="pay_start" placeholder="12-11-2022"
                                            class="w-100 p-2 input-box-font pay_start datepicker inputdatepicker"
                                            data-id="pay_start" value="<?php echo date('m-d-Y'); ?>">
                                    </div>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="pay_end" class="lable">PAY END <span class="redColor">*</span>
                                        </label>
                                        <input
                                            style="color:#140303f5;border:1px solid #110303fe; padding:0px 6px !important; height:40px; appearance: none;"
                                            type="text" id="pay_end" name="pay_end" placeholder="12-17-2022"
                                            class="w-100 p-2 input-box-font pay_end datepicker inputdatepicker"
                                            data-id="pay_end" value="<?php echo date('m-d-Y'); ?>">
                                    </div>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="pay_date" class="lable">PAY DATE <span class="redColor">*</span>
                                        </label>
                                        <input
                                            style="color:#140303f5;padding:0px 6px !important; height:40px; appearance: none; border:1px solid #110303fe;"
                                            type="text" id="pay_date" name="pay_date" placeholder="12-19-2022"
                                            class="w-100 p-2 input-box-font pay_date datepicker inputdatepicker"
                                            data-id="pay_date" value="<?php echo date('m-d-Y'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <p class="text-center how_p mb-0" style="font-size:18px;">How do you get paid <span
                                            class="redColor">*</span> <span> </p>
                                    <div class="text-center mt-2  d-flex justify-content-center">
                                        <button type="button" class="hour_btn date_select">HOURLY</button>
                                        <button type="button" class="salary_btn">SALARY</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class=" col-lg-2 col-md-2 margin-bottom  mt-2">
                                    <button type="button" class="statementbtn">EARNING</button>
                                    <div class="margin-bottom">
                                        <input class="earnbtn mt-4 mb-3 text-center" type="text" name="earning[]"
                                            value="Regular" id="earning_0" data-id="0">
                                    </div>
                                    <div id="addEarning"></div>
                                </div>
                                <div class="col-lg-2  col-md-2 margin-bottom mt-2  ">
                                    <button type="button" class="statementbtn">RATE</button>
                                    <div class="margin-bottom">
                                        <input type="text" name="rate[]"
                                            class="earnbtn removeData mt-4 mb-3 text-center calculation rate"
                                            value="" id="rate_0" data-id="0">
                                    </div>
                                    <div id="addRate"></div>
                                </div>
                                <div class=" col-lg-2  col-md-2 margin-bottom mt-2  ">
                                    <button type="button" class="statementbtn">HOURS</button>
                                    <div class="margin-bottom">
                                        <input type="text" name="hours[]"
                                            class="earnbtn removeData mt-4 mb-3 text-center hours calculation"
                                            value="" id="hours_0" data-id="0">
                                    </div>
                                    <div id="addHours"></div>
                                </div>
                                <div class=" col-lg-2 col-md-2 margin-bottom mt-2  ">
                                    <button type="button" class="statementbtn">TOTAL</button>
                                    <div class="margin-bottom">
                                        <input type="text" name="total[]" class="earnbtn mt-4 mb-3 text-center total"
                                            value="" id="total_0" data-id="0" readonly="true">
                                    </div>
                                    <div id="addTotal"></div>
                                </div>
                                <div class=" col-lg-2  col-md-2 margin-bottom mt-2">
                                    <div class="margin-bottom">
                                        <button type="button" class="statementbtn">THIS PERIOD</button>
                                        <p class="p-0 m-0 text-center" style="font-family: serif;font-size: 14px;"> Total
                                            Gross </p>
                                    </div>
                                    <div class="margin-bottom" style="padding-top: 2px;">
                                        <input type="text" name="period[]"
                                            class="earnbtn  mb-3 text-center gross_total" value="" id="period_0"
                                            data-id="0">
                                    </div>
                                    <div id="addGrossTotal"></div>
                                </div>
                                <div class=" col-lg-2  col-md-2 margin-bottom mt-2  ">
                                    <div class="margin-bottom">
                                        <button type="button" class="statementbtn">YTD TOTAL</button>
                                        <p class="p-0 m-0 text-center usap" style="font-family: serif;font-size:14px;">YTD
                                            Total Gross</p>
                                    </div>
                                    <div class="margin-bottom" style="padding-top: 2px;">
                                        <input type="text" name="ytd_total[]"
                                            class="earnbtn  mb-3 text-center ytd_total" value="" id="ytd_total_0"
                                            data-id="0">
                                    </div>
                                    <div id="addYtdTotal"></div>
                                </div>
                            </div>
                            <div class=" col-lg-2 col-md-2 margin-bottom">
                                <input type="text" name="period_gross_total"
                                    class="earnbtn text-center period_gross_total" value="" id="period_gross_total"
                                    hidden>
                            </div>
                            <div class=" col-lg-2 col-md-2 margin-bottom">
                                <input type="text" name="ytd_gross_total" class="earnbtn text-center ytd_gross_total"
                                    value="" id="ytd_gross_total" hidden>
                            </div>

                            <div class="row mb-3">
                                <div class="col-xl-2 col-lg-3 col-md-4 mt-2 margin-bottom">
                                    <button type="button" class="add_button earnbtn" type="add_earning"
                                        id="add_earning" style="font-size: 18px !important;"><i
                                            class="fa fa-plus-circle pr-2" style="font-size:24px;color:green"></i>Add
                                        Earning</button>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-4 col-lg-3">
                                    <button type="button" class="createbtn w-100 py-0">DEDUCTIONS</button>
                                    <p style="margin: 0;">Tap On padlocak to change text</p>
                                </div>
                            </div>
                            @foreach ($deduction as $key => $item)
                                <div class="row">
                                    <div class="col-md-4 col-lg-3 mb-3">
                                        <img src="{{ asset('images/lock.png') }}" class="earnbtn2 lock">
                                        <input class="earnbtn text-center taxes" name="taxes[]"
                                            data-id="{{ $key }}" data-value="{{ $item->price }}"
                                            value="{{ $item->title }}" data-value="{{ $item->title }}"
                                            data-text="{{ $item->type }}">
                                    </div>
                                    <div class="col-md-1 col-lg-1"></div>
                                    <div class="col-md-2 col-lg-3"></div>
                                    <div class="col-md-1 col-lg-1"></div>
                                    <div class="col-md-2 col-lg-2 mb-3">
                                        <input type="text" name="taxes_rate[]"
                                            class="earnbtn text-center manualTaxTotal" id="taxes_{{ $key }}"
                                            value="" data-value="" />
                                    </div>
                                    <div class="col-md-2 col-lg-2 mb-3">
                                        <input type="text" name="taxes_ytd[]"
                                            class="earnbtn text-center manualTaxTotal" id="taxes_ytd_{{ $key }}"
                                            value="" data-value="" />
                                    </div>
                                </div>
                            @endforeach
                            <div id="add_deduction" class="mb-3"></div>
                            <div class=" col-lg-2 col-md-2 margin-bottom">
                                <input type="text" name="deduction_period_tax"
                                    class="earnbtn text-center deduction_period_tax" value=""
                                    id="deduction_period_tax" hidden>
                                <input type="text" name="deduction_period_tax_other"
                                    class="earnbtn text-center deduction_period_tax_other" value=""
                                    id="deduction_period_tax_other" hidden>
                            </div>
                            <div class=" col-lg-2 col-md-2 margin-bottom">
                                <input type="text" name="" class="earnbtn text-center ytd_deduction_period_tax"
                                    value="" id="ytd_deduction_period_tax" hidden>
                                <input type="text" name=""
                                    class="earnbtn text-center ytd_deduction_period_tax_other" value=""
                                    id="ytd_deduction_period_tax_other" hidden>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-4 col-lg-3">
                                    <button type="button" class="add_deduction earnbtn"
                                        style="font-size: 18px !important;"><i class="fa fa-plus-circle pr-lg-5 pr-2"
                                            style="font-size:24px;color:green"></i>Add Deduction</button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <p class="p-0 m-0 text-center d-none d-lg-block" style="font-family: serif;">&nbsp;
                                    </p>
                                    <input class="earnbtn text-center mb-2" type="button" value="Taxes/Deduction Tax">
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2 col-lg-3"></div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2 mb-2">
                                    <p class="p-0 m-0 text-center" style="font-family: serif;">Current Gross</p>
                                    <input type="text" name="deduction_tax" class="earnbtn deduction_tax text-center"
                                        value="" />
                                </div>
                                <div class="col-md-2 mb-2">
                                    <p class="p-0 m-0 text-center" style="font-family: serif;">YTD Gross</p>
                                    <input type="text" name="ytd_deduction_tax"
                                        class="earnbtn ytd_deduction_tax text-center" value="" />
                                </div>
                            </div>
                            <div class="row mb-3 mt-5">
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <p class="p-0 m-0 text-center" style="font-family: serif;">&nbsp;</p>
                                    <button type="button" class="netpaybtn net_pay">Net Pay</button>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2 col-lg-3"></div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2 mb-2">
                                    <p class="p-0 m-0 text-center" style="font-family: serif;">Net Pay</p>
                                    <input name="total_net_pay" class="earnbtn text-center total_net_pay" value="">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <p class="p-0 m-0 text-center" style="font-family: serif;">YTD Net pay</p>
                                    <input name="total_ytd_net_pay" class="earnbtn text-center total_ytd_net_pay"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tempElemant d-none">
                <h5 class="box-h5">Template Elements</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class=" box-usa">
                            <div class="row mb-3">
                                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                                    <p class="p-0 m-0 " style="font-family: serif;">CO<span class="redColor">*</span></p>
                                    <input name="co_number" class="earnbtn text-center " value="">
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                                    <p class="p-0 m-0" style="font-family: serif;">FILE.<span class="redColor">*</span>
                                    </p>
                                    <input name="file_number" class="earnbtn text-center " value="">
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                                    <p class="p-0 m-0 " style="font-family: serif;">CLOCK VCHR.<span
                                            class="redColor">*</span>
                                    </p>
                                    <input name="clock_vchr_number" class="earnbtn text-center " value="">
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                                    <p class="p-0 m-0 " style="font-family: serif;">Advice Number:<span
                                            class="redColor">*</span></p>
                                    <input name="advice_number" class="earnbtn text-center " value="">
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                                    <p class="p-0 m-0 " style="font-family: serif;">Account Number LAST<span
                                            class="redColor">*</span></p>
                                    <input name="account_number_last_4" class="earnbtn text-center " value="">
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 mb-2">
                                    <p class="p-0 m-0 " style="font-family: serif;">Transit ABA<span
                                            class="redColor">*</span>
                                    </p>
                                    <input name="transit_aba_number" class="earnbtn text-center " value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="days_number" id="days_number" value="0" hidden>
            <div class="row mt-3">
                <div class="col-12 text-center usa-btn">
                    <div class="d-flex flex-wrap justify-content-between usa-btn-inner">
                        <button class="previewbtn text-capitalize viewTempTemplate mb-3 w-sm-100" type="button"
                            id="button1">Preview Your Paystub <i class="fa fa-eye"
                                style="font-size: 30px; margin-left: 7px;"></i></button>
                        <button type="button" class="emailbtn text-capitalize sendMailButton mb-3 w-sm-100"> <i
                                class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i
                                class="fa fa-download ml-4" style="font-size:24px"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="{{ asset('user') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>
    <script>
        $('.inputdatepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
        }).datepicker('setDate', 'today');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('user') }}/js/calculations.js"></script>
    <script src="{{ asset('user') }}/js/javaformula.js"></script>
    <script src="{{ asset('user') }}/js/federal.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="{{ asset('user') }}/js/dist/jquery-input-mask-phone-number.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tel').usPhoneFormat({
                format: 'xxx-xxx-xxxx',
            });
        });
    </script>
    <script>
        $('#zip_code').mask('00000-9999');
        $('#emp_zip_code').mask('00000-9999');
    </script>
    <script>
        $(document).ready(function() {
            $('.advanceTemplate').change(function() {
                var status = $('option:selected', '.at_id').attr('data-status');
                if (status == 1) {
                    $(".tempElemant").removeClass("d-none");
                } else {
                    $(".tempElemant").addClass("d-none");
                }
                $('option:selected', '.basicTemplate').prop("selected", false);
            });
            $('.basicTemplate').change(function() {
                var status = $('option:selected', '.bt_id').attr('data-status');
                if (status == 1) {
                    $(".tempElemant").removeClass("d-none");
                } else {
                    $(".tempElemant").addClass("d-none");
                }
                $('option:selected', '.advanceTemplate').prop("selected", false);
            });

            /* $('#tel').keyup(function() {
                var mobileNumber = this.value.replace(/\D/g, ''); // here you get what the end-user typed
                mobileNumber = (mobileNumber.replace(/[^\d]/g, ''));
                this.value = ("" + mobileNumber.substring(0, 3) + "-" + mobileNumber.substring(3, 6) + "-" +
                    mobileNumber.substring(6, 10));
            }); */
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.basicTem').click(function() {
                var imageattr = $('option:selected', '.bt_id').attr('data-src');
                console.log('imageattr', imageattr);
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
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.basicTem').click(function() {
                var imageattr = $('option:selected', '.bt_id').attr('data-src');
                console.log('imageattr', imageattr);
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
        });
    </script>
@endsection
