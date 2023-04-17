@extends('layouts.app')

@section('content')
<style>
    .address_book {
        width: 14%;
        position: relative;
        left: 10px;
        top: -3px;
    }

    .address_book_1 {
        width: 14%;
        position: relative;
        left: 10px;
        top: -3px;
    }

    .address-book {
        position: relative;
        left: 7px;
    }
</style>

    <link rel="stylesheet" href="{{ asset('user') }}/css/bootstrap-datepicker.min.css">
    <!-- Modal Start -->
    <div class="modal fade" id="openEye" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content" style="position:relative;">
                <div class="modal-header" style="position: relative; z-index:3;">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body watermark-bg">
                    <img src="" class="setImage w-100">
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
                    {{-- <iframe src="" id="tempView" allowtransparency="false" style="background-color : transparent;"
                    frameborder="0" width="100%" height="800"></iframe> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <div class="container mt-2" style="max-width:1450px;">
        <form id="submit_form_paystubx_id" action="javascript:void()" method="get">
            @php($invoice = json_decode($invoiceData->data ?? '[]'))
            <input type="hidden" name="invoice_id" value="{{ $invoiceData->id ?? 0 }}">
            <input type="hidden" name="form_type" value="{{ $invoice->form_type ?? 'usa' }}" hidden>
            @csrf
            <div>
                <div class="row mb-3">
                    <div class="col-md-12 px-0">
                        <div class="box-usa">
                            <div class="row justify-content py-3">
                                <h5 class="box-h5">Company Info</h5>
                                <img class="address-book" src="{{ asset('images/address-book.png') }}" alt=""
                                    height="30px;">
                                <select id="employerAddress" class="address_book add_address address" data-type="employer">
                                    <option data-name="{{ $invoice->cname ?? '' }}" data-address1="{{ $invoice->address_1 ?? '' }}"
                                        data-address2="{{ $invoice->address_2 ?? '' }}" data-city="{{  $invoice->city ?? '' }}"
                                        data-state="{{ $invoice->state ?? '' }}" data-zip="{{ $invoice->zip_code ?? '' }}" value="">Select Address</option>

                                    @foreach ($employerList ?? [] as $key => $employer)
                                        <option data-name="{{ $employer->name }}" data-address1="{{ $employer->address_1 }}"
                                            data-address2="{{ $employer->address_2 }}" data-city="{{ $employer->city }}"
                                            data-state="{{ $employer->state }}" data-zip="{{ $employer->zip_code }}"
                                            value="{{ $employer->name }}">{{ $employer->name }}</option>
                                    @endforeach
                                    <option data-name="" value="add_address">Add New Address</option>
                                </select>
                            </div>

                            <div class="row mb-3 ">
                                <div class="col-md-6 mt-1">
                                    <div>
                                        <label for="cname" class="lable">EMPLOYER (COMPANY) NAME <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="cname" name="cname"
                                            value="{{ $invoice->cname ?? '' }}" placeholder="Your Employer & Company Name"
                                            class="w-100 p-2 textInputFontSize removeDiv">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-1">
                                    <div>
                                        <label for="tel" class="lable">EMPLOYER TELEPHONE NUMBER <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="tel" name="tel" placeholder="xxx-xxx-xxxx"
                                            maxlength="10" minlength="10" value="{{ $invoice->tel ?? '' }}"
                                            class="w-100 p-2 text-center input-box-font removeDiv third-phone">
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
                                            value="{{ $invoice->address_1 ?? '' }}" placeholder="Your Employer Address"
                                            class="w-100 p-2  textInputFontSize removeDiv">
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <label for="address_2" class="lable">STREET ADDRESS 2 <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="address_2" name="address_2"
                                            value="{{ $invoice->address_2 ?? '' }}"
                                            placeholder="Suite 101 or Apt 101 (optional)"
                                            class="w-100 p-2  textInputFontSize">
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div>
                                        <label for="city" class="lable">City <span class="redColor">*</span>
                                        </label>
                                        <input type="text" id="city" name="city"
                                            value="{{ $invoice->city ?? '' }}" placeholder="Your Employer City"
                                            class="w-100 p-2  textInputFontSize removeDiv">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="state" class="lable">State <span class="redColor">*</span>
                                        </label>
                                        <div class="dropdown ">
                                            <select name="state" value="{{ $invoice->state ?? '' }}" id="state"
                                                class="state dropdown11 removeDiv">
                                                <option value=""> --- Select --- </option>
                                                @foreach ($stateTaxes as $stateTax)
                                                    <option value="{{ $stateTax->state_code }}"
                                                        {{ $invoice->state == $stateTax->state_code ? 'selected' : '' }}>
                                                        {{ $stateTax->state }}</option>
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
                                            class="w-100 input-box-font removeDiv zip_code"
                                            value="{{ $invoice->zip_code ?? '' }}">
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
                    <div class="col-md-12 px-0">
                        <div class=" box-usa">
                            <div class="d-flex justify-content-between mb-3 flex w-100">
                                <div class="col-md-5 col-lg-6 col-sm-12 mt-5  text-center">
                                    <h6 style="" class="base">BASIC TEMPLATES</h6>
                                    <div class="mt-4">
                                        <div class="input-group mmenu mb-3 text-center">
                                            <select name="basic_temp" id="basic_temp"
                                                class="form-control dropdown1 text-center bt_id small-font basicTemplate removeDiv"
                                                style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Basic Templates --- </option>
                                                @foreach ($basicType as $basic_temp)
                                                    <option value="{{ $basic_temp->title ?? '' }}"
                                                        {{ $invoice->basic_temp == $basic_temp->title ? 'selected' : '' }}
                                                        data-src="{{ $basic_temp->images->file ?? '' }}"
                                                        data-status="{{ $basic_temp->template_element }}"
                                                        data-stub="{{ $basic_temp->stub_no }}"
                                                        data-clock="{{ $basic_temp->co_no }}">
                                                        {{ $basic_temp->name }} </option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-eye-slash basicTem" style="font-size: 39px;"
                                                role="button"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center sh">
                                    <img src="{{ asset('images/hrpng.png') }}" style="height: 200px;">
                                </div>
                                <div class="col-md-5 col-lg-6 col-sm-12 mt-5 text-center">
                                    <h6 style="margin-left:-23px;font-weight: 900;">ADVANCED TEMPLATES</h6>
                                    <div class="mt-4">
                                        <div class="input-group mmenu mb-3">
                                            <select name="advance_temp" id="advance_temp"
                                                class="form-control text-center dropdown1 at_id small-font advanceTemplate removeDiv"
                                                style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Advance Template --- </option>
                                                @foreach ($advanceType as $advance_temp)
                                                    <option value="{{ $advance_temp->title ?? '' }}"
                                                        {{ $invoice->advance_temp == $advance_temp->title ? 'selected' : '' }}
                                                        data-src="{{ $advance_temp->images->file ?? '' }}"
                                                        data-status="{{ $advance_temp->template_element ? true : false }}"
                                                        data-stub="{{ $advance_temp->stub_no }}"
                                                        data-clock="{{ $advance_temp->co_no }}"
                                                        data-check="{{ $advance_temp->check_no }}">
                                                        {{ $advance_temp->name ?? '' }} </option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-eye-slash advanceTem" role="button"
                                                style="font-size: 39px;"></i>
                                        </div>
                                    </div>
                                    {{-- <div class=" mt-3 ">
                                    <button class="viewbtn"> <a href="{{ url('template-view') }}">Click to see
                                            Template Landscape view.This is not part of design</a></button>
                                </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>

                <div class="row mb-3">
                    <div class="col-md-12 px-0">
                        <div class=" box-usa">
                            <div class="row justify-content py-3">
                                <h5 class="box-h5">Employee Info</h5>
                                <img class="address-book" src="{{ asset('images/address-book.png') }}" alt=""
                                    height="30px;">
                                <select id="employeeAddress" class="address_book_1 add_address address"
                                    data-type="employee">
                                    <option data-name="{{ $invoice->emp_name ?? '' }}"
                                        data-address1="{{ $invoice->emp_street_1 ?? '' }}"
                                        data-address2="{{ $invoice->emp_street_2 ?? '' }}"
                                        data-city="{{ $invoice->emp_city ?? '' }}" data-state="{{ $invoice->emp_state ?? '' }}"
                                        data-zip="{{ $invoice->emp_zip_code ?? '' }}" value="">Select Address</option>
                                        @foreach ($employeeList ?? [] as $key => $employee)
                                            <option data-name="{{ $employee->name }}"
                                                data-address1="{{ $employee->address_1 }}"
                                                data-address2="{{ $employee->address_2 }}"
                                                data-city="{{ $employee->city }}" data-state="{{ $employee->state }}"
                                                data-zip="{{ $employee->zip_code }}" value="{{ $employee->name }}">
                                                {{ $employee->name }}</option>
                                        @endforeach
                                    <option data-name="" value="add_address_1">Add New Address</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="emp_name" class="lable">EMPLOYEE NAME <span
                                                class="redColor">*</span>
                                        </label>
                                        <input type="text" id="emp_name" name="emp_name" placeholder="Employee Name"
                                            class="w-100  input-box-font removeDiv"
                                            value="{{ $invoice->emp_name ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="emp_id" class="lable">EMPLOYEE ID </label>
                                        <input type="text" id="emp_id" name="emp_id" placeholder="Employer ID"
                                            class="w-100 r input-box-font removeDiv"
                                            value="{{ $invoice->emp_id ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="emp_ssn" class="lable">EMPLOYEE SSN Last 4 <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="emp_ssn" name="emp_ssn"
                                            placeholder="SSN (Last 4 digits)" class="w-100 input-box-font removeDiv"
                                            value="{{ $invoice->emp_ssn ?? '' }}" maxlength="4" minlength="4"
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
                                            placeholder="Employee Street Address 1"
                                            class="w-100  input-box-font removeDiv"
                                            value="{{ $invoice->emp_street_1 ?? '' }}">
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
                                            class="w-100  input-box-font" value="{{ $invoice->emp_street_2 ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 stubxc">
                                    <div>
                                        <label for="emp_city" class="lable">City <span class="redColor">*</span>
                                        </label>
                                        <input type="text" id="emp_city" name="emp_city" placeholder="City"
                                            class="w-100   input-box-font removeDiv"
                                            value="{{ $invoice->emp_city ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 stubxc">
                                    <div>
                                        <label for="emp_state" class="lable">State <span class="redColor">*</span>
                                        </label>
                                        <div class="dropdown ">
                                            <select name="emp_state" id="emp_state" class=" dropdown11 removeDiv">
                                                <div>
                                                    <option class="ff" style="color: #757575;" value=""
                                                        data-tax="null"> ---
                                                        Select State --- </option>
                                                </div>
                                                @foreach ($stateTaxes as $stateTax)
                                                    <option value="{{ $stateTax->state_code }}"
                                                        {{ $invoice->emp_state == $stateTax->state_code ? 'selected' : '' }}
                                                        data-tax="{{ $stateTax->rate }}">{{ $stateTax->state }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 stubxc">
                                    <div>
                                        <label for="emp_zip_code" class="lable">Zip Code <span
                                                class="redColor">*</span></label>
                                        <input type="text" id="emp_zip_code" name="emp_zip_code"
                                            placeholder="Zip Code" class="w-100  input-box-font removeDiv"
                                            value="{{ $invoice->emp_zip_code ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 stubxc stubxcv d-none">
                                    <div>
                                        <label for="stub_no" class="lable">Stub No <span
                                                class="redColor">*</span></label>
                                        <input type="text" id="stub_no" name="stub_no"
                                            class="w-100  input-box-font removeDiv" placeholder="1234" maxlength="6"
                                            minlength="4"
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                            value="{{ $invoice->stub_no ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 stubxc checkxcv d-none">
                                    <div>
                                        <label for="check_no" class="lable">Check No <span
                                                class="redColor">*</span></label>
                                        <input type="text" id="check_no" name="check_no"
                                            class="w-100  input-box-font removeDiv" placeholder="123456789" maxlength="9"
                                            minlength="6"
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                            value="{{ $invoice->check_no ?? '' }}">
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
                    <div class="col-md-12 px-0">
                        <div class=" box-usa">
                            <div class="row mb-3">
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="emp_your_state" class="lable">SELECT YOUR STATE <span
                                                class="redColor">*</span> </label>
                                        <div class="dropdown ">
                                            <select name="emp_your_state" id="emp_your_state"
                                                class=" dropdown11 tax_rate removeDiv">
                                                <option value="">Choose your State</option>
                                                @foreach ($stateTaxes as $stateTax)
                                                    <option value="{{ $stateTax->state_code }}"
                                                        {{ $invoice->emp_your_state == $stateTax->state_code ? 'selected' : '' }}
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
                                                class="redColor">*</span>
                                        </label>
                                        <select name="auto_cal" id="auto_cal"
                                            class="dropdown11 auto_calculate removeDiv">
                                            <option value=""> --- Select Calculator --- </option>
                                            <option value="on" {{ $invoice->auto_cal == 'on' ? 'selected' : '' }}>ON
                                            </option>
                                            <option value="off" {{ $invoice->auto_cal == 'off' ? 'selected' : '' }}>OFF
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="marital_status" class="lable">MARITAL STATUS <span
                                                class="redColor">*</span> </label>
                                        <select name="marital_status" id="marital_status"
                                            class="dropdown11 marital_status removeDiv">
                                            <option value=""> --- Select Marital Status--- </option>
                                            <option value="single"
                                                {{ $invoice->marital_status == 'single' ? 'selected' : '' }}>Single
                                            </option>
                                            <option value="married"
                                                {{ $invoice->marital_status == 'married' ? 'selected' : '' }}>
                                                Married
                                            </option>
                                            <option value="other"
                                                {{ $invoice->marital_status == 'other' ? 'selected' : '' }}>Prefered top
                                                not say</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="time_period" class="lable">HOW DO YOU GET PAID <span
                                                class="redColor">*</span> </label>
                                        <select name="time_period" id="time_period"
                                            class="dropdown11 time_period removeDiv">
                                            <option value=""> --- Select --- </option>
                                            <option value="weekly"
                                                {{ $invoice->time_period == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                            <option value="bi-weekly"
                                                {{ $invoice->time_period == 'bi-weekly' ? 'selected' : '' }}>
                                                Bi-Weekly
                                            </option>
                                            <option value="monthly"
                                                {{ $invoice->time_period == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                            <option value="bi-monthly"
                                                {{ $invoice->time_period == 'bi-monthly' ? 'selected' : '' }}>
                                                Bi-Monthly
                                            </option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="hourly" class="lable">Rate / Unit <span class="redColor">*</span>
                                        </label>
                                        <input type="text" step="0.5" id="hourly" name="hourly"
                                            value="{{ $invoice->hourly ?? '' }}" placeholder="Wage"
                                            class="w-100 p-2  textInputFontSize hourly">
                                    </div>

                                </div>

                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="emp_type" class="lable">EMPLOYMENT TYPE<span
                                                class="redColor">*</span>
                                        </label>
                                        <select name="emp_type" id="emp_type" class=" dropdown11 removeDiv">
                                            <option value=""> --- Select Employment Type --- </option>
                                            <option value="Temporary"
                                                {{ $invoice->emp_type == 'Temporary' ? 'selected' : '' }}>Temporary
                                            </option>
                                            <option value="Permanent"
                                                {{ $invoice->emp_type == 'Permanent' ? 'selected' : '' }}>Permanent
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="exemptions" class="lable">EXEMPTIONS <span class="redColor">*</span>
                                        </label>
                                        <select name="exemptions" id="exemptions"
                                            class=" dropdown11 exemptions removeDiv">
                                            <option value=""> --- Select Exemptions --- </option>
                                            <option value="0" {{ $invoice->exemptions == '0' ? 'selected' : '' }}>0
                                            </option>
                                            <option value="1" {{ $invoice->exemptions == '1' ? 'selected' : '' }}>1
                                            </option>
                                            <option value="2" {{ $invoice->exemptions == '2' ? 'selected' : '' }}>2
                                            </option>
                                            <option value="3" {{ $invoice->exemptions == '3' ? 'selected' : '' }}>3
                                            </option>
                                            <option value="4" {{ $invoice->exemptions == '4' ? 'selected' : '' }}>4
                                            </option>
                                            <option value="5" {{ $invoice->exemptions == '5' ? 'selected' : '' }}>5
                                            </option>
                                            <option value="6" {{ $invoice->exemptions == '6' ? 'selected' : '' }}>6
                                            </option>
                                            <option value="7" {{ $invoice->exemptions == '7' ? 'selected' : '' }}>7
                                            </option>
                                            <option value="8" {{ $invoice->exemptions == '8' ? 'selected' : '' }}>8
                                            </option>
                                            <option value="9" {{ $invoice->exemptions == '9' ? 'selected' : '' }}>9
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="currency" class="lable" class="redColor">SELECT YOUR PREFERRED
                                            CURRENCY <span class="redColor">*</span> </label>
                                        <select name="currency" id="currency" class=" dropdown11">
                                            <option value=""> --- Select currency --- </option>
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency->symbol }}"
                                                    {{ $invoice->currency == $currency->symbol ? 'selected' : '' }}>
                                                    {{ $currency->symbol }}
                                                    ({{ $currency->name }})
                                                </option>
                                            @endforeach
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
                    <h5>Earning statement</h5>
                </div>
                <div class="row mb1">
                    <div class="col-md-12 px-0">
                        <div class=" box-usa">
                            <div class="row mb-3">
                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="pay_start" class="lable">PAY START<span class="redColor">*</span>
                                        </label>
                                        <input
                                            style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;"
                                            type="text" id="pay_start" name="pay_start" placeholder="12-11-2022"
                                            class="w-100 p-2 input-box-font removeDiv pay_start datepicker inputdatepicker"
                                            data-id="pay_start"
                                            @if ($invoice->pay_start != '') value="{{ $invoice->pay_start }}" @else value="
                                    <?php echo date('m/d/Y'); ?>" @endif>
                                    </div>

                                </div>

                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="pay_end" class="lable">PAY END <span class="redColor">*</span>
                                        </label>
                                        <input
                                            style="color:#140303f5;border:1px solid #110303fe; padding:0px 6px !important; height:40px; appearance: none;"
                                            type="text" id="pay_end" name="pay_end" placeholder="12-17-2022"
                                            class="w-100 p-2 input-box-font removeDiv pay_end datepicker inputdatepicker"
                                            data-id="pay_end"
                                            @if ($invoice->pay_end != '') value="{{ $invoice->pay_end }}"
                                    @else value="
                                    <?php echo date('m/d/Y'); ?>" @endif>
                                    </div>

                                </div>

                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="pay_date" class="lable">PAY DATE <span class="redColor">*</span>
                                        </label>
                                        <input
                                            style="color:#140303f5;padding:0px 6px !important; height:40px; appearance: none; border:1px solid #110303fe;"
                                            type="text" id="pay_date" name="pay_date" placeholder="12-19-2022"
                                            class="w-100 p-2 input-box-font removeDiv pay_date datepicker inputdatepicker"
                                            data-id="pay_date"
                                            @if ($invoice->pay_date != '') value="{{ $invoice->pay_date }}" @else value="
                                    <?php echo date('m/d/Y'); ?>" @endif>
                                    </div>

                                </div>

                                <div class="col-md-3 mt-4">
                                    <div>
                                        <label for="how_to_paid" class="lable"
                                            style="text-align: center !important; display: block;">How do you get paid<span
                                                class="redColor">*</span></label>
                                        <div class="text-center d-flex justify-content-center">
                                            <button type="button" class="hour_btn date_select">HOURLY</button>
                                            <button type="button" class="salary_btn">SALARY</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- =============================== -->
                            <div class="row ">
                                <div class=" col-lg-2 col-md-2 margin-bottom  mt-2">
                                    <button type="button" class="statementbtn">EARNING</button>
                                    @foreach ($invoice->earning ?? [] as $key => $earning)
                                        <div class="margin-bottom mb-3">
                                            <input class="earnbtn {{ $key == 0 ? 'mt-4' : '' }} text-center"
                                                type="text" name="earning[]" value="{{ $earning ?? null }}"
                                                id="earning_00{{ $key }}" data-id="00{{ $key }}">
                                        </div>
                                    @endforeach
                                    <div id="addEarning"></div>
                                </div>
                                <div class="col-lg-2  col-md-2 margin-bottom mt-2  ">
                                    <button type="button" class="statementbtn">RATE</button>
                                    @foreach ($invoice->rate ?? [] as $key => $rate)
                                        <div class="margin-bottom mb-3">
                                            <input type="text" name="rate[]"
                                                class="earnbtn {{ $key == 0 ? 'mt-4 removeData' : '' }} text-center calculation rate"
                                                value="{{ $rate ?? null }}" id="rate_00{{ $key }}"
                                                data-id="00{{ $key }}">
                                        </div>
                                    @endforeach
                                    <div id="addRate"></div>
                                </div>
                                <div class=" col-lg-2  col-md-2 margin-bottom mt-2  ">
                                    <button type="button" class="statementbtn">HOURS</button>
                                    @foreach ($invoice->hours ?? [] as $key => $hours)
                                        <div class="margin-bottom mb-3">
                                            <input type="text" name="hours[]"
                                                class="earnbtn {{ $key == 0 ? 'mt-4 removeData' : '' }} text-center hours calculation"
                                                value="{{ $hours ?? null }}" id="hours_00{{ $key }}"
                                                data-id="00{{ $key }}">
                                        </div>
                                    @endforeach
                                    <div id="addHours"></div>
                                </div>
                                <div class=" col-lg-2 col-md-2 margin-bottom mt-2  ">
                                    <button type="button" class="statementbtn">TOTAL</button>
                                    @foreach ($invoice->total ?? [] as $key => $total)
                                        <div class="margin-bottom mb-3">
                                            <input type="text" name="total[]"
                                                class="earnbtn {{ $key == 0 ? 'mt-4' : '' }} text-center total"
                                                value="{{ $total ?? null }}" id="total_00{{ $key }}"
                                                data-id="00{{ $key }}" readonly="true">
                                        </div>
                                    @endforeach
                                    <div id="addTotal"></div>
                                </div>
                                <div class=" col-lg-2  col-md-2 margin-bottom mt-2">
                                    <div class="margin-bottom">
                                        <button type="button" class="statementbtn">THIS PERIOD</button>
                                        <p class="p-0 m-0 text-center" style="font-family: serif;font-size: 14px;"> Total
                                            Gross </p>
                                    </div>
                                    @foreach ($invoice->period ?? [] as $key => $period)
                                        <div class="margin-bottom mb-3"
                                            style="padding-top: {{ $key == 0 ? '2px' : '' }}">
                                            <input type="text" name="period[]"
                                                class="earnbtn  text-center gross_total" value="{{ $period ?? null }}"
                                                id="period_00{{ $key }}" data-id="00{{ $key }}">
                                        </div>
                                    @endforeach
                                    <div id="addGrossTotal"></div>
                                </div>
                                <div class=" col-lg-2  col-md-2 margin-bottom mt-2  ">
                                    <div class="margin-bottom">
                                        <button type="button" class="statementbtn">YTD TOTAL</button>
                                        <p class="p-0 m-0 text-center usap" style="font-family: serif;font-size:14px;">YTD
                                            Total Gross</p>
                                    </div>
                                    @foreach ($invoice->ytd_total ?? [] as $key => $ytd_total)
                                        <div class="margin-bottom mb-3"
                                            style="padding-top: {{ $key == 0 ? '2px' : '' }}">
                                            <input type="text" name="ytd_total[]"
                                                class="earnbtn  text-center ytd_total" value="{{ $ytd_total ?? null }}"
                                                id="ytd_total_00{{ $key }}" data-id="00{{ $key }}">
                                        </div>
                                    @endforeach
                                    <div id="addYtdTotal"></div>
                                </div>
                            </div>
                            <!-- //============================= -->

                            <div class="d-none">
                                <input type="text" name="period_gross_total"
                                    value="{{ $invoice->period_gross_total ?? '' }}"
                                    class="earnbtn text-center period_gross_total" value="" id="period_gross_total"
                                    hidden>
                                <input type="text" name="ytd_gross_total"
                                    value="{{ $invoice->ytd_gross_total ?? '' }}"
                                    class="earnbtn text-center ytd_gross_total" value="" id="ytd_gross_total"
                                    hidden>
                            </div>

                            <div class="row mb-3">
                                <div class="col-xl-2 col-lg-3 col-md-4 mt-2 margin-bottom">
                                    <button type="button" class="add_button earnbtn" type="add_earning"
                                        id="add_earning" style="font-size: 18px !important;"><i
                                            class="fa fa-plus-circle pr-2" style="font-size:24px;color:green"></i>Add
                                        Earning</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <button type="button" class="createbtn ">DEDUCTIONS</button>
                                    <p class="p-0 m-0 text-left font-weight-bold" style="font-family: serif;">Tap on
                                        padlock to change text</p>
                                </div>
                            </div>
                            <div class="mt-1">

                                @foreach ($deduction as $key => $item)
                                    @php(@$deduction_period_tax += $invoice->taxes_rate[$key] ?? 0)
                                    @php(@$ytd_deduction_period_tax += $invoice->taxes_rate[$key] ?? 0)
                                    <div class="row">
                                        <div class="col-md-4 col-lg-3 mb-3">
                                            <img src="{{ asset('images/lock.png') }}" class="earnbtn2">
                                            <input readonly class="earnbtn text-center taxes" name="taxes[]"
                                                data-id="00{{ $key }}" data-value="{{ $item->price }}"
                                                value="{{ $item->title }}">
                                        </div>
                                        <div class="col-md-1 col-lg-1"></div>
                                        <div class="col-md-2 col-lg-3"></div>
                                        <div class="col-md-1 col-lg-1"></div>
                                        <div class="col-md-2 col-lg-2 mb-3">
                                            <input type="text" name="taxes_rate[]"
                                                value="{{ $invoice->taxes_rate[$key] ?? 0 }}"
                                                class="earnbtn text-center manualTaxTotal"
                                                id="taxes_00{{ $key }}" />
                                        </div>
                                        <div class="col-md-2 col-lg-2 mb-3">
                                            <input type="text" name="taxes_ytd[]"
                                                value="{{ $invoice->taxes_ytd[$key] ?? 0 }}"
                                                class="earnbtn text-center manualTaxTotal"
                                                id="taxes_ytd_00{{ $key }}" />
                                        </div>
                                    </div>
                                @endforeach

                                @foreach ($invoice->tax_deduction ?? [] as $key => $tax_deduction)
                                    @php(@$deduction_period_tax_other += $invoice->period_tax_deduction[$key] ?? 0)
                                    @php(@$ytd_deduction_period_tax_other += $invoice->ytd_tax_deduction[$key] ?? 0)
                                    <div class="row">
                                        <div class="col-md-4 col-lg-3 mb-3"><img src="{{ asset('images/lock.png') }}"
                                                class="earnbtn2"><input name="tax_deduction[]"
                                                value="{{ $tax_deduction ?? '' }}"
                                                class="earnbtn text-center tax_deduction_00{{ $key + 1 }} tax_deduction_00{{ $key + 1 }} "
                                                data-id="00{{ $key + 1 }}" type="text"></div>
                                        <div class="col-md-1 col-lg-1"></div>
                                        <div class="col-md-2 col-lg-3"></div>
                                        <div class="col-md-1 col-lg-1"></div>
                                        <div class="col-md-2 col-lg-2 mb-3"><input type="text"
                                                name="period_tax_deduction[]"
                                                value="{{ $invoice->period_tax_deduction[$key] ?? 0 }}"
                                                class="earnbtn text-center tax_deduction tax"
                                                id="taxes_000{{ $key + 1 }}" data-id="00{{ $key + 1 }}">
                                        </div>
                                        <div class="col-md-2 col-lg-2 mb-3"><input type="text"
                                                name="ytd_tax_deduction[]"
                                                value="{{ $invoice->ytd_tax_deduction[$key] ?? 0 }}"
                                                class="earnbtn text-center ytd_tax tax add_ytd_deduction"
                                                id="taxes_ytd_000{{ $key + 1 }}" data-id="00{{ $key + 1 }}">
                                        </div>
                                    </div>
                                @endforeach
                                <div id="add_deduction">
                                </div>
                                <div class="d-none">
                                    <input type="text" name="" class="earnbtn text-center deduction_period_tax"
                                        value="{{ $deduction_period_tax ?? 0 }}" id="deduction_period_tax" hidden>
                                    <input type="text" name=""
                                        class="earnbtn text-center deduction_period_tax_other"
                                        value="{{ $deduction_period_tax_other ?? 0 }}" id="deduction_period_tax_other"
                                        hidden>
                                    <input type="text" name=""
                                        class="earnbtn text-center ytd_deduction_period_tax"
                                        value="{{ $ytd_deduction_period_tax ?? 0 }}" id="ytd_deduction_period_tax"
                                        hidden>
                                    <input type="text" name=""
                                        class="earnbtn text-center ytd_deduction_period_tax_other"
                                        value="{{ $ytd_deduction_period_tax_other ?? 0 }}"
                                        id="ytd_deduction_period_tax_other" hidden>
                                </div>
                            </div>
                            <div class="my-3">
                                <div class="row my-3">
                                    <div class="col-md-4 col-lg-3">
                                        <button type="button" class="add_deduction earnbtn" type="add_deduction"
                                            style="font-size: 18px !important;"><i class="fa fa-plus-circle pr-5"
                                                style="font-size:24px;color:green"></i>Add Deduction</button>
                                    </div>

                                    <div class="col-md-1"></div>
                                    <div class="col-md-2 col-lg-3"></div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 col-lg-3 mb-2">
                                        <p class="p-0 m-0 text-center d-none d-lg-block" style="font-family: serif;">
                                            &nbsp;</p>
                                        <input class="earnbtn text-center" type="button" value="Taxes/Deduction Tax">
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2 col-lg-3"></div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2 mb-2">
                                        <p class="p-0 m-0 text-center" style="font-family: serif;">Current Gross</p>
                                        <input type="text" name="deduction_tax"
                                            value="{{ $invoice->deduction_tax ?? '' }}"
                                            class="earnbtn deduction_tax text-center" />
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <p class="p-0 m-0 text-center" style="font-family: serif;">YTD Gross</p>
                                        <input type="text" name="ytd_deduction_tax"
                                            value="{{ $invoice->ytd_deduction_tax ?? '' }}"
                                            class="earnbtn ytd_deduction_tax text-center" />
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
                                        <input name="total_net_pay" value="{{ $invoice->total_net_pay ?? '' }}"
                                            class="earnbtn text-center total_net_pay">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <p class="p-0 m-0 text-center" style="font-family: serif;">YTD Net pay</p>
                                        <input name="total_ytd_net_pay" value="{{ $invoice->total_ytd_net_pay ?? '' }}"
                                            class="earnbtn text-center total_ytd_net_pay">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tempElemant d-none">
                    <h5>Template Elements</h5>
                    <div class="row mb-3">
                        <div class="col-md-12 px-0">
                            <div class=" box-usa">
                                <div class="row mb-3">
                                    <div class="col-lg-2 col-md-4 col-sm-6 mb-2 advicex advicexv d-none">
                                        <p class="p-0 m-0 " style="font-family: serif;">CO<span class="redColor">*</span>
                                        </p>
                                        <input class="earnbtn text-center " value="{{ $invoice->co_number ?? '' }}" name="co_number" placeholder="MP5">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 mb-2 advicex advicexv d-none">
                                        <div>
                                            <p class="p-0 m-0 " style="font-family: serif;">DEPT.<span
                                                    class="redColor">*</span></p>
                                            <input type="text" name="dept_number" id="dept_number"
                                                class="earnbtn removeDiv text-center" maxlength="6" minlength="4"
                                                placeholder="123456"
                                                onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                                value="{{ $invoice->dept_number ?? '' }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6 mb-2 advicex advicexv d-none">
                                        <p class="p-0 m-0" style="font-family: serif;">FILE.<span
                                                class="redColor">*</span>
                                        </p>
                                        <input class="earnbtn text-center " value="{{ $invoice->file_number ?? '' }}" name="file_number" placeholder="123456">
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6 mb-2 advicex advicexv d-none">
                                        <p class="p-0 m-0 " style="font-family: serif;">CLOCK VCHR.<span
                                                class="redColor">*</span>
                                        </p>
                                        <input class="earnbtn text-center "
                                            value="{{ $invoice->clock_vchr_number ?? '' }}" name="clock_vchr_number"
                                            maxlength="6" minlength="4" placeholder="1234"
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6 mb-2 advicex">
                                        <p class="p-0 m-0 " style="font-family: serif;">Advice Number:<span
                                                class="redColor">*</span></p>
                                        <input class="earnbtn text-center " value="{{ $invoice->advice_number ?? '' }}"
                                            name="advice_number" placeholder="123456" maxlength="6" minlength="4"
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6 mb-2 advicex">
                                        <p class="p-0 m-0 " style="font-family: serif;">Account Number LAST<span
                                                class="redColor">*</span></p>
                                        <input class="earnbtn text-center "
                                            value="{{ $invoice->account_number_last_4 ?? '' }}"
                                            name="account_number_last_4" placeholder="1234" maxlength="4"
                                            minlength="4"
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-6 mb-2 advicex">
                                        <p class="p-0 m-0 " style="font-family: serif;">Transit ABA<span
                                                class="redColor">*</span>
                                        </p>
                                        <input class="earnbtn text-center "
                                            value="{{ $invoice->transit_aba_number ?? '' }}" name="transit_aba_number"
                                            placeholder="1234" maxlength="4" minlength="4"
                                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="days_number" id="days_number" value="{{ $invoice->days_number ?? 0 }}"
                    hidden>
                <div class="row mt-3">
                    <div class="col-12 text-center px-0">
                        <div class="d-flex flex-wrap justify-content-between">
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
<script>
    $(document).ready(function() {
        $('.add_address').change(function() {
            var value = $(this).val();
            if (value == 'add_address') {
                window.location.href = "{{ route('profile') }}?tab=2&emp=1";
            } else if (value == 'add_address_1') {
                window.location.href = "{{ route('profile') }}?tab=2&emp=2";
            }
            return false;
        });
    });
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
    <script>
        $(function() {
            var value = $('select#basic_temp option:selected').val();
            var value_2 = $('select#advance_temp option:selected').val();
            if (value != '') {
                var status = $('select#basic_temp option:selected').attr('data-status');
                var stub = $('select#basic_temp option:selected').data('stub');
                var check = $('select#advance_temp option:selected').data('check');

                if (stub == 1 && check == 0) {
                        $('.stubxc').each(function() {

                            $(".checkxcv").addClass("d-none");
                            $(".stubxc").removeClass("col-md-4");
                            $(".stubxcv").removeClass("d-none");
                            $(".stubxc").addClass("col-md-3");
                        });
                    }
                    if (stub == 0  && check == 1) {
                        $('.stubxc').each(function() {
                            $(".stubxc").addClass("col-md-3");
                            $(".stubxcv").addClass("d-none");
                            $(".stubxc").removeClass("col-md-4");
                            $(".checkxcv").removeClass("d-none");
                        });
                    }
                    if (stub == 0 && check == 0) {
                        $('.stubxc').each(function() {
                            $(".stubxc").addClass("col-md-4");
                            $(".stubxcv").addClass("d-none");
                            $(".checkxcv").addClass("d-none");
                            $(".stubxc").removeClass("col-md-3");
                        });
                    }
                if (status == 1) {
                    $(".tempElemant").removeClass("d-none");
                } else {
                    $(".tempElemant").addClass("d-none");
                }
            } else {
                $('.stubxc').each(function() {
                    $(".stubxc").addClass("col-md-4");
                    $(".stubxcv").addClass("d-none");
                    $(".stubxc").removeClass("col-md-3");
                });
                $(".tempElemant").addClass("d-none");
            }

            if (value_2 != '') {
                var status = $('select#advance_temp option:selected').attr('data-status');
                var stub = $('select#advance_temp option:selected').data('stub');
                var check = $('select#advance_temp option:selected').data('check');

                if (stub == 1 && check == 0) {
                        $('.stubxc').each(function() {

                            $(".checkxcv").addClass("d-none");
                            $(".stubxc").removeClass("col-md-4");
                            $(".stubxcv").removeClass("d-none");
                            $(".stubxc").addClass("col-md-3");
                        });
                    }
                    if (stub == 0  && check == 1) {
                        $('.stubxc').each(function() {
                            $(".stubxc").addClass("col-md-3");
                            $(".stubxcv").addClass("d-none");
                            $(".stubxc").removeClass("col-md-4");
                            $(".checkxcv").removeClass("d-none");
                        });
                    }
                    if (stub == 0 && check == 0) {
                        $('.stubxc').each(function() {
                            $(".stubxc").addClass("col-md-4");
                            $(".stubxcv").addClass("d-none");
                            $(".checkxcv").addClass("d-none");
                            $(".stubxc").removeClass("col-md-3");
                        });
                    }
                if (status == 1) {
                    $(".tempElemant").removeClass("d-none");
                    var clock = $('select#advance_temp option:selected').data('clock');
                    if (clock == 1) {
                        $('.advicex').each(function() {
                            $(".advicex").removeClass("col-lg-4 col-md-4 col-sm-6");
                            $(".advicexv").removeClass("d-none");
                            $(".advicex").addClass("col-lg-2 col-md-4 col-sm-6");
                        });
                    }
                    if (clock == 0) {
                        $('.advicex').each(function() {
                            $(".advicex").addClass("col-lg-4 col-md-4 col-sm-6");
                            $(".advicexv").addClass("d-none");
                            $(".advicex").removeClass("col-lg-2 col-md-4 col-sm-6");
                        });
                    }

                } else {
                    $(".tempElemant").addClass("d-none");
                }
            } else {
                $('.stubxc').each(function() {
                    $(".stubxc").addClass("col-md-4");
                    $(".stubxcv").addClass("d-none");
                    $(".stubxc").removeClass("col-md-3");
                });
                $(".tempElemant").addClass("d-none");
            }

        });
    </script>
    <script>
        $(document).ready(function() {

            $('.advanceTemplate').change(function() {
                var value = $('option:selected', '.at_id').attr('value');
                if (value != '') {
                    var status = $('option:selected', '.at_id').attr('data-status');
                    var stub = $('option:selected', '.at_id').data('stub');
                    var check = $('option:selected', '.at_id').data('check');

                    if (stub == 1 && check == 0) {
                        $('.stubxc').each(function() {

                            $(".checkxcv").addClass("d-none");
                            $(".stubxc").removeClass("col-md-4");
                            $(".stubxcv").removeClass("d-none");
                            $(".stubxc").addClass("col-md-3");
                        });
                    }
                    if (stub == 0  && check == 1) {
                        $('.stubxc').each(function() {
                            $(".stubxc").addClass("col-md-3");
                            $(".stubxcv").addClass("d-none");
                            $(".stubxc").removeClass("col-md-4");
                            $(".checkxcv").removeClass("d-none");
                        });
                    }
                    if (stub == 0 && check == 0) {
                        $('.stubxc').each(function() {
                            $(".stubxc").addClass("col-md-4");
                            $(".stubxcv").addClass("d-none");
                            $(".checkxcv").addClass("d-none");
                            $(".stubxc").removeClass("col-md-3");
                        });
                    }
                    if (status == 1) {
                        $(".tempElemant").removeClass("d-none");
                        var clock = $('option:selected', '.at_id').data('clock');
                        if (clock == 1) {
                            $('.advicex').each(function() {
                                $(".advicex").removeClass("col-lg-4 col-md-4 col-sm-6");
                                $(".advicexv").removeClass("d-none");
                                $(".advicex").addClass("col-lg-2 col-md-4 col-sm-6");
                            });
                        }
                        if (clock == 0) {
                            $('.advicex').each(function() {
                                $(".advicex").addClass("col-lg-4 col-md-4 col-sm-6");
                                $(".advicexv").addClass("d-none");
                                $(".advicex").removeClass("col-lg-2 col-md-4 col-sm-6");
                            });
                        }

                    } else {
                        $(".tempElemant").addClass("d-none");
                    }
                } else {
                    $('.stubxc').each(function() {
                        $(".stubxc").addClass("col-md-4");
                        $(".stubxcv").addClass("d-none");
                        $(".stubxc").removeClass("col-md-3");
                    });
                    $(".tempElemant").addClass("d-none");
                }
                $('option:selected', '.basicTemplate').prop("selected", false);
            });

            $('.basicTemplate').change(function() {
                var value = $('option:selected', '.bt_id').attr('value');
                if (value != '') {
                    var status = $('option:selected', '.bt_id').attr('data-status');
                    var stub = $('option:selected', '.bt_id').data('stub');
                    if (stub == 1) {
                        $('.stubxc').each(function() {
                            $(".stubxc").removeClass("col-md-4");
                            $(".stubxcv").removeClass("d-none");
                            $(".stubxc").addClass("col-md-3");
                        });
                    }
                    if (stub == 0) {
                        $('.stubxc').each(function() {
                            $(".stubxc").addClass("col-md-4");
                            $(".stubxcv").addClass("d-none");
                            $(".stubxc").removeClass("col-md-3");
                        });
                    }
                    if (status == 1) {
                        $(".tempElemant").removeClass("d-none");
                    } else {
                        $(".tempElemant").addClass("d-none");
                    }
                } else {
                    $('.stubxc').each(function() {
                        $(".stubxc").addClass("col-md-4");
                        $(".stubxcv").addClass("d-none");
                        $(".stubxc").removeClass("col-md-3");
                    });
                    $(".tempElemant").addClass("d-none");
                }

                $('option:selected', '.advanceTemplate').prop("selected", false);
            });

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
        });
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDpavHXELJMJvIHifFPN6tBBiFSXKGpy2g">
    </script>
    <script>
        var searchInput = 'address_1';

        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode'],
                componentRestrictions: {
                    country: "USA"
                }
            });


            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();
                if (near_place && near_place.address_components.length > 0) {
                    var obj = [];
                    for (var i = 0; i < near_place.address_components.length; i++) {
                        for (var j = 0; j < near_place.address_components[i].types.length; j++) {
                            obj[near_place.address_components[i].types[j]] = near_place.address_components[
                                i].short_name;
                            // if(near_place.address_components[i].types['0'] == 'administrative_area_level_1'){
                            //     $('#state').val(near_place.address_components[i].long_name);
                            // }

                        }
                    }
                    setLocation(obj);
                }
            });
        });

        function setLocation(obj) {
            if (obj.street_number == undefined && obj.route == undefined) {
                $("#address_1").val('');
            } else if (obj.street_number == undefined) {
                $("#address_1").val(obj.route);
                $('#address_1').css('border-color', 'gray');
                $('.0_address_1').remove();
            } else if (obj.route == undefined) {
                $("#address_1").val(obj.street_number);
                $('#emp_street_1').css('border-color', 'gray');
                $('.0_address_1').remove();
            } else {
                $("#address_1").val(obj.street_number + ' ' + obj.route);
                $('#emp_street_1').css('border-color', 'gray');
                $('.0_address_1').remove();
            }
            // if (obj.neighborhood != undefined) {
            //     $("#address_2").val(obj.neighborhood);
            //     $('#address_2').css('border-color', 'gray');
            //     $('.0_address_2').remove();
            // } else {
            //     $("#address_2").val('');
            // }
            if (obj.locality != undefined) {
                $("#city").val(obj.locality);
                $('#city').css('border-color', 'gray');
                $('.0_city').remove();
            } else {
                $("#city").val('');
            }
            if (obj.administrative_area_level_1 != undefined) {
                $("#state").val(obj.administrative_area_level_1);
                $('#state').css('border-color', 'gray');
                $('.0_state').remove();
            } else {
                $("#state").val('');
            }
            if (obj.postal_code != undefined) {
                $("#zip_code").val(obj.postal_code);
                $('#zip_code').css('border-color', 'gray');
                $('.0_zip_code').remove();
            } else {
                $("#zip_code").val('');
            }
        }
    </script>
    <script>
        var searchInput_1 = 'emp_street_1';
        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput_1)), {
                types: ['geocode'],
                componentRestrictions: {
                    country: "USA"
                }
            });


            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();
                if (near_place && near_place.address_components.length > 0) {
                    var obj = [];
                    for (var i = 0; i < near_place.address_components.length; i++) {
                        for (var j = 0; j < near_place.address_components[i].types.length; j++) {
                            obj[near_place.address_components[i].types[j]] = near_place.address_components[
                                i].short_name;
                            //     if(near_place.address_components[i].types['0'] == 'administrative_area_level_1'){
                            //     $('#emp_state').val(near_place.address_components[i].long_name);
                            // }
                        }
                    }
                    setEmpLocation(obj);
                }
            });
        });

        function setEmpLocation(obj) {
            if (obj.street_number == undefined && obj.route == undefined) {
                $("#emp_street_1").val('');
            } else if (obj.street_number == undefined) {
                $("#emp_street_1").val(obj.route);
                $('#emp_street_1').css('border-color', 'gray');
                $('.0_emp_street_1').remove();
            } else if (obj.route == undefined) {
                $("#emp_street_1").val(obj.route);
                $('#emp_street_1').css('border-color', 'gray');
                $('.0_emp_street_1').remove();
            } else {
                $("#emp_street_1").val(obj.street_number + ' ' + obj.route);
                $('#emp_street_1').css('border-color', 'gray');
                $('.0_emp_street_1').remove();
            }

            // if (obj.neighborhood != undefined) {
            //     $("#emp_street_2").val(obj.neighborhood);
            //     $('#emp_street_2').css('border-color', 'gray');
            //     $(".0_emp_street_2").remove();
            // } else {
            //     $("#emp_street_2").val('');
            // }
            if (obj.locality != undefined) {
                $("#emp_city").val(obj.locality);
                $('#emp_city').css('border-color', 'gray');
                $(".0_emp_city").remove();
            } else {
                $("#emp_city").val('');
            }
            if (obj.administrative_area_level_1 != undefined) {
                $("#emp_state").val(obj.administrative_area_level_1);
                $('#emp_state').css('border-color', 'gray');
                $(".0_emp_state").remove();
            } else {
                $("#emp_state").val('');
            }
            if (obj.postal_code != undefined) {
                $("#emp_zip_code").val(obj.postal_code);
                $('#emp_zip_code').css('border-color', 'gray');
                $(".0_emp_zip_code").remove();
            } else {
                $("#emp_zip_code").val('');
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $('#zip_code').mask('00000-9999');
        $('#emp_zip_code').mask('00000-9999');
    </script>
    <script src="{{ asset('user') }}/js/dist/jquery-input-mask-phone-number.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tel').usPhoneFormat({
                format: 'xxx-xxx-xxxx',
            });
        });
    </script>
    <script src="{{ asset('user') }}/js/calculations.js"></script>
    <script src="{{ asset('user') }}/js/javaformula.js"></script>
    <script src="{{ asset('user') }}/js/federal.js"></script>
@endsection
