@extends('layouts.app')
@section('style_edit')
{{-- <style>
    .address_book {
        width: 35%;
        position: relative;
        left: 10px;
        background-color: white;
        border: 1px solid #000;
        padding: 0px 5px;
    }

    .address_book_1 {
        width: 35%;
        position: relative;
        left: 10px;
        background-color: white;
        border: 1px solid #000;
        padding: 0px 5px;
    }

    .address-book {
        position: relative;
        left: 7px;
        height: 40px;
    }

    #basic_temp {
        text-align: -webkit-center !important;
    }

    @media(max-width:425px) {
        .address-book {
            height: 32px;
        }

    }

    @media(max-width:768px min-width: 426px) {
        .address_book_1 {
            width: 28% !important;
        }
    }



    @media(max-width:1024px) {
        .address_book {
            width: 28%;
        }

        .address_book_1 {
            width: 28%;
        }

    }
</style> --}}
@endsection
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
                    <embed src="" type="" id="tempView" allowtransparency="false" style="background-color : transparent;" frameborder="0" width="100%" height="800">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <div class="container" style="max-width:1450px;">
        <form id="submit_form_paystubx_id" action="javascript:void()" method="get">
            @php($invoice = json_decode($invoiceData->data ?? '[]'))
            <input type="hidden" name="invoice_id" value="{{ $invoiceData->id ?? 0 }}">
            <input type="hidden" name="form_type" value="{{ $invoice->form_type ?? 'usa' }}" hidden>
            @csrf
            <input type="hidden" name="form_type" value="uk" hidden>
            <div>
                <h5 class="box-h5">Choose Template</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class=" box-usa py-5">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="col-md-5 col-sm-12 m-auto  text-center" style="padding: -1px 35px;">
                                    <h6 style="" class="base">BASIC TEMPLATES</h6>
                                    <div class="mt-4">
                                        <div class="input-group mmenu mb-3">
                                            <select name="basic_temp" class="form-control dropdown1 text-center bt_id small-font basicTemplate direction-left-canada-edit" style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Basic Templates --- </option>
                                                @foreach ($basicType as $data)
                                                    <option value="{{ $data->title ?? '' }}" data-src="{{ $data->images->file ?? '' }}" {{ $invoice->basic_temp == $data->title ? 'selected' : '' }}>{{ $data->name }} </option>
                                                @endforeach
                                            </select>
                                            <i data-src="{{ $data->images->file ?? '' }}" class="fa fa-eye-slash basicTem uk-eye" style="font-size: 39px;" role="button"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2  text-center sh" hidden>
                                    <img src="images/hrpng.png" style="height: 200px;">
                                </div>

                                <div class="col-md-5 col-sm-12 mt-5 text-center" hidden>
                                    <h6 style="margin-left:-23px;font-weight: 900;" class="add">ADVANCED TEMPLATES</h6>
                                    <div class="mt-4">
                                        <div class="input-group mmenu mb-3" style="margin: auto;">
                                            <select name="advance_temp" class="form-control text-center dropdown1 at_id small-font advanceTemplate" style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Advance Templates --- </option>
                                                @foreach ($advanceType as $data)
                                                    <option value="{{ $data->title ?? '' }}" data-src="{{ $data->images->file ?? '' }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                            <i data-src="{{ $data->images->file ?? '' }}" class="fa fa-eye-slash advanceTem uk-eye" role="button" style="font-size: 39px;" class=""></i>
                                        </div>
                                    </div>
                                    <div class="mt-3 ">
                                        <button class="viewbtn"> <a href="{{ url('template-view') }}">Click to see Template Landscape view.This is not part of design</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h5 class="box-h5">Company Info</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class=" box-usa">
                            <div class="row mb-3" style="align-items: end;">
                                <div class="row justify-content py-3">

                                    {{-- <img class="address-book" src="{{ asset('images/address-book.png') }}" alt="" height="30px;">
                                    <select id="employerAddressUnited" class="address_book add_address address input-box-font select-dropdown" data-type="employer">
                                        <option data-name="" value="">Select Address</option>
                                            @foreach ($employerList ?? [] as $key => $employer)
                                                <option data-name="{{ $employer->name }}" data-address1="{{ $employer->address_1 }}" data-address2="{{ $employer->address_2 }}" data-city="{{ $employer->city }}" data-state="{{ $employer->state }}" data-zip="{{ $employer->zip_code }}" data-tel="{{ $employer->tel }}" value="{{ $employer->name }}"> {{ $employer->name }}</option>
                                            @endforeach
                                        <option data-name="" value="add_address">Add New Address</option>
                                    </select> --}}
                                </div>
                                <div class="col-md-6 mt-1">
                                    <label for="cname" class="lable">EMPLOYER (COMPANY) NAME <span style="color:red;">*</span> </label>
                                    <input type="text" id="cname" name="cname" placeholder="Your Employer & Company Name" class="w-100 p-2" style="font-size:14px;" value="{{ $invoice->cname ?? null }}">
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="company_address" class="lable">EMPLOYER (COMAPNY) ADDRESS <span
                                            style="color:red;">*</span></label>
                                    <input type="text" id="company_address" name="company_address"
                                        placeholder="5 Throgmorton St, London EC2N 2AD, United Kingdom" class="w-100 p-2"
                                        style="font-size:14px;" value="{{ $invoice->company_address ?? null }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h5 class="box-h5">Employee Info</h5>
                <div class="col-md-12">
                    <div class=" box-usa">
                        <div class="row justify-content py-3">

                            {{-- <img class="address-book" src="{{ asset('images/address-book.png') }}" alt="" height="30px;">
                            <select id="employeeAddressUnited" class="address_book_1 add_address address input-box-font select-dropdown" data-type="employee">
                                <option data-name="" value="">Select Address</option>
                                @foreach ($employeeList ?? [] as $key => $employee)
                                    <option data-name="{{ $employee->name }}" data-address1="{{ $employee->address_1 }}" data-address2="{{ $employee->address_2 }}" data-city="{{ $employee->city }}" data-state="{{ $employee->state }}" data-zip="{{ $employee->zip_code }}" data-emp_id="{{ $employee->emp_id }}" data-emp_ssn="{{ $employee->emp_ssn }}" value="{{ $employee->name }}"> {{ $employee->name }}</option>
                                @endforeach
                                <option data-name="" value="add_address_1">Add New Address</option>
                            </select> --}}
                        </div>
                        <div class="row mb-3" style="align-items: end;">
                            <div class="col-md-6 mt-1">
                                <label for="emp_name" class="lable">EMPLOYEE NAME <span style="color:red;">*</span>
                                </label>
                                <input type="text" id="emp_name" value="{{ $invoice->emp_name ?? null }}" name="emp_name" placeholder="Your Employer &amp; Company Name" class="w-100 p-2" style="font-size:14px;">
                            </div>

                            <div class="col-md-6 mt-1">
                                <label for="emp_street_1" class="lable">EMPLOYEE ADDRESS 1 <span style="color:red;">*</span></label>
                                <input type="text" id="emp_street_1" value="{{ $invoice->emp_street_1 ?? null }}" name="emp_street_1" placeholder="5 Throgmorton St, London EC2N 2AD, United Kingdom" class="w-100 p-2" style="font-size:14px;">
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="emp_street_2" class="lable">STREET ADDRESS 2</label>
                                <input type="text" id="emp_street_2" value="{{ $invoice->emp_street_2 ?? null }}" name="emp_street_2" placeholder="Your Employer &amp; Company Name" class="w-100 p-2" style="font-size:14px;">
                            </div>

                            <div class="col-md-6 mt-1">
                                <label for="emp_zip_code" class="lable">POSTCODE<span style="color:red;">*</span></label>
                                <input type="text" id="emp_zip_code" value="{{ $invoice->emp_zip_code ?? null }}" name="emp_zip_code" placeholder="5 Throgmorton St, London EC2N 2AD, United Kingdom" class="w-100 p-2" style="font-size:14px;">
                            </div>
                        </div>
                        <div style="padding:0 !important;" class="row p-3">
                            <div class="col-lg-5" style="color: black; text-transform:uppercase;font-size:30px; font-weight:600;">
                                <p class="top-heading">Earning Statement</p>
                                <div style="border:3px solid #ff5722;" class=" pay-outer mb-3">
                                    <div class="ukpay-inner ">
                                        <div class="row">
                                            <div style="margin:0 !important;" class="col-md-4 mt-3 pl-0 padding-0">
                                                <div>
                                                    <label for="pay_start" class="lable uk-lable ">Pay Start <span style="color:red;">*</span> </label>
                                                    <input style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;" type="text" id="pay_start" name="pay_start" placeholder="12-11-2022" class="input-uk removeDiv pay_start datepicker inputdatepicker" data-id="pay_start" @if ($invoice->pay_end != '') value="{{ $invoice->pay_end ?? ''}}"  @else value="<?php echo date('m/d/Y'); ?>" @endif>
                                                </div>

                                            </div>
                                            <div style="margin:0 !important;" class="col-md-4 mt-3 pl-0 padding-0">
                                                <div>
                                                    <label for="pay_end" class="lable uk-lable">Pay End <span style="color:red;">*</span> </label>
                                                    <input style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;" type="text" id="pay_end" name="pay_end" placeholder="12-11-2022" class="input-uk removeDiv pay_end datepicker inputdatepicker" data-id="pay_end" @if ($invoice->pay_end != '') value="{{ $invoice->pay_end ?? ''}}"  @else value="<?php echo date('m/d/Y'); ?>" @endif>
                                                </div>

                                            </div>
                                            <div style="margin:0 !important;" class="col-md-4 mt-3 pl-0 padding-0">
                                                <div>
                                                    <label for="pay_date" class="lable uk-lable">Pay Date <span style="color:red;">*</span> </label>
                                                    <input style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;" type="text" id="pay_date" name="pay_date" placeholder="12-11-2022" class="input-uk removeDiv pay_date datepicker inputdatepicker" data-id="pay_date" @if ($invoice->pay_end != '') value="{{ $invoice->pay_end ?? ''}}"  @else value="<?php echo date('m/d/Y'); ?>" @endif>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="ukpay-inner1">
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <div>
                                                        <label for="pay_type" class="lable uk-lable">Pay Type<span style="color:red;">*</span> </label>
                                                        <input type="text" id="pay_type" value="{{ $invoice->pay_type ?? null }}" name="pay_type" class="input-uk removeDiv" placeholder="2 Weekly" style="font-size:14px;">
                                                    </div>

                                                </div>
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <div>
                                                        <label for="payment_method" class="lable uk-lable">Payment Mehtod<span style="color:red;">*</span> </label>
                                                        <input type="text" id="payment_method" value="{{ $invoice->payment_method ?? null }}" name="payment_method" class="input-uk removeDiv" placeholder="BACIS" style="font-size:14px; text-transform:uppercase">
                                                    </div>

                                                </div>
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <div>
                                                        <label for="tax_code" class="lable uk-lable">Tax Code<span style="color:red;">*</span> </label>
                                                        <input type="text" id="tax_code" value="{{ $invoice->tax_code ?? null }}" name="tax_code" class="input-uk removeDiv" placeholder="1257L" style="font-size:14px; text-transform:uppercase">
                                                    </div>

                                                </div>
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <div>
                                                        <label for="ni_number" class="lable uk-lable">NI Number<span style="color:red;">*</span> </label>
                                                        <input type="text" id="ni_number" value="{{ $invoice->ni_number ?? null }}" name="ni_number" class="input-uk removeDiv" placeholder="SC 56 52 10 C" style="font-size:14px; text-transform:uppercase">
                                                    </div>

                                                </div>
                                                <div class="col-lg-8 mt-3 p-0 mb-3">
                                                    <div>
                                                        <label for="ni_table_letter" class="lable uk-lable">NI Table Letter<span style="color:red;">*</span> </label>
                                                        <input type="text" id="ni_table_letter" value="{{ $invoice->ni_table_letter ?? null }}" name="ni_table_letter" class="input-uk removeDiv" placeholder="A" style="font-size:14px; text-transform:uppercase">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7"
                                style="color: black; text-transform:uppercase;font-size:30px; font-weight:600;">
                                <p class="top-heading">Payments</p>
                                <div style="border:3px solid #ff5722;padding-bottom:62px;" class=" pay-outer">
                                    <div class="ukpay-inner ">
                                        <div class="row ">
                                            <div style="margin:0 !important;" class="col-md-4 mt-4 p-0">
                                                <p class="text-left how_p mb-0" style="font-size:18px; font-weight:300;">Basic Pay <span class="redColor">*</span> <span> </span></p>
                                                <div class="text-center mt-2  d-flex">
                                                    <button type="button" class="hour_btn date_select">HOURLY</button>
                                                    <button type="button" class="salary_btn">SALARY</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                        <div class="row">
                                            <div
                                                class=" col-lg-4 col-md-12 margin-bottom  mt-2  px-lg-2 px-0 addincomeKey">
                                                <button type="button" class="statementbtn">EARNING</button>
                                                <div class="margin-bottom">
                                                    @foreach ($invoice->earning ?? [] as $key => $earning)
                                                        <input class="earnbtn mt-3 text-center incomeKey" data-id="000" name="earning[]" type="text" value="{{ $earning }}">
                                                    @endforeach
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                            <div class=" col-lg-4 col-md-12 margin-bottom  mt-2  px-lg-2 px-0 addrateKey">
                                                <button type="button" class="statementbtn">RATE</button>
                                                <div class="margin-bottom">
                                                    @foreach ($invoice->rate ?? [] as $key => $rate)
                                                        <input class="earnbtn mt-3 text-center rateKey" type="number" id="rate_000" name="rate[]" type="text" value="{{ $rate }}">
                                                    @endforeach
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                            <div class=" col-lg-4 col-md-12 margin-bottom  mt-2  px-lg-2 px-0 addhoursKey">
                                                <button type="button" class="statementbtn">HOUR</button>
                                                <div class="margin-bottom">
                                                    @foreach ($invoice->hours ?? [] as $key => $hours)
                                                        <input class="earnbtn mt-3 text-center hoursKey" type="number" id="hours_000" name="hours[]" type="text" value="{{ $hours }}">
                                                    @endforeach
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                            <div class=" col-lg-4 col-md-12 margin-bottom  mt-2  px-lg-2 px-0 addcurrentTotal" hidden>
                                                <button type="button" class="statementbtn">Current Total</button>
                                                <div class="margin-bottom">
                                                    @foreach ($invoice->total ?? [] as $key => $total)
                                                        <input class="earnbtn mt-3 text-center currentTotal" type="number" id="total_000" name="total[]" type="text" value="{{ $total }}">
                                                    @endforeach
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div
                                            class="col-xl-4 col-lg-7 col-md-4 mt-2 margin-bottom  px-lg-2 px-0 center-btn">
                                            <button type="button" class="btnCommon addEarningField uk-add-btn"> <i class="fa fa-plus-circle pr-2" style="font-size: 22px;color: #0ec23b;padding-top: 0px;"></i>Add Earning</button>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="ukpay-inner ">
                                        <div class="row mt-5">
                                            <div class="col-md-4 col-lg-7  px-lg-2 px-0">
                                                <!-- <button type="button" class="createbtn w-100 py-0">DEDUCTIONS</button> -->
                                                <h3 style="font-weight: 300 !important;">DEDUCTION</h3>
                                            </div>
                                        </div>
                                        <div class="ukpay-inner ">
                                            <div class="row">

                                                <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                    @foreach ($deduction as $key => $item)
                                                        <img src="{{ asset('images/lock.png') }}" style="" class="earnbtn2 lockuk">
                                                        <input class="input-uk text-center taxes" name="taxes[]" data-id="00{{ $key }}" data-value="{{ $item->price }}" value="{{ $invoice->taxes[$key] ?? null }}">
                                                    @endforeach
                                                </div>
                                                <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                    @foreach ($deduction as $key => $tax_deduction)
                                                        <input class="input-uk text-center" readonly name="taxes_rate[]" id="tax_total_00{{ $key }}" value="{{ $invoice->taxes_rate[$key] ?? null }}">
                                                    @endforeach
                                                </div>

                                                {{-- <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                @foreach ($deduction as $key => $item)
                                                <input class="earnbtn mt-3 text-center currentTotal" readonly
                                                    id="total_000" name="total[]" type="text" value="">
                                                @endforeach
                                            </div> --}}
                                                <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                    <button style="background-color: #85b7bc; font-weight:300" type="button" class="netpaybtn net_pay">Total Deduction</button>
                                                </div>

                                                <div class="col-md-5 col-lg-5 mb-0 pb-0   px-lg-2 px-0">
                                                    <input type="text" name="deduction_tax" class="input-uk text-center" id="deductions" value="{{ $invoice->deduction_tax ?? null }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5"
                                style="color: black; text-transform:uppercase;font-size:30px; font-weight:600;">
                                <p class="top-heading">Total Year To Date</p>
                                <div style="border:3px solid #ff5722;" class=" pay-outer mb-3">
                                    <div class="ukpay-inner ">
                                        <div class="row">
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <div>
                                                    <img src="{{ asset('images/lock.png') }}" class="earnbtn2 lockuk">
                                                <input class="input-uk text-center" value="Taxable Gross Pay ">
                                                </div>

                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <div>
                                                    <input type="text" name="taxable_gross_pay" class="input-uk text-center" id="current_total" readonly value="{{ $invoice->taxable_gross_pay ?? null }}">
                                                </div>

                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <div>
                                                    <img src="{{ asset('images/lock.png') }}" class="earnbtn2 lockuk">
                                                <input class="input-uk text-center" value="Income Tax">
                                                </div>

                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <div>
                                                    <input type="text" name="income_tax" class="input-uk  text-center" id="income_tax" value="{{ $invoice->income_tax ?? null }}" data-value="">
                                                </div>

                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <div>
                                                    <img src="{{ asset('images/lock.png') }}" class="earnbtn2 lockuk">
                                                <input class="input-uk  text-center" value="Employee NIC">
                                                </div>

                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <div>
                                                    <input type="text" name="employee_nic" class="input-uk  text-center" id="employee_nic" value="{{ $invoice->employee_nic ?? null }}" data-value="">
                                                </div>

                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <img src="{{ asset('images/lock.png') }}" class="earnbtn2 lockuk">
                                                <input class="input-uk  text-center" value="Employee NIC">
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <div>
                                                    <input type="text" name="employer_nic" class="input-uk  text-center" id="employee_nic" value="{{ $invoice->employer_nic ?? null }}" data-value="">
                                                </div>

                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <button style="background-color:#0ec23b; font-weight:300" type="button" class="netpaybtn net_pay">Net Pay</button>
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <div>
                                                    <input type="text" name="net_pay" class="input-uk text-center" id="net_pay" readonly value="{{ $invoice->net_pay ?? null }}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7"
                                style="color: black; text-transform:uppercase;font-size:30px; font-weight:600;">
                                <p class="top-heading">Additional Information Here (Note)</p>
                                <div style="border:3px solid #ff5722;" class=" pay-outer mb-3">
                                    <div class="ukpay-inner ">
                                        <div class="row">
                                            <div style="padding-bottom:255px;" class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <input style="color: #7c7370; border-color: #7c7370;" class="input-uk text-center note" value="Note here (optional) ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div style="padding:0;" class="col-12 text-center">
                            <div class="d-flex flex-wrap justify-content-between">
                                <button class="previewbtn text-capitalize viewTempTemplate mb-3 w-sm-100" type="button" id="button1">Preview Your Paystub <i class="fa fa-eye" style="font-size: 30px; margin-left: 7px;"></i></button>
                                <button type="button" class="emailbtn text-capitalize sendMailButton mb-3 w-sm-100"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $( "#pay_start" ).datepicker("setDate","{{$invoice->pay_start ?? 'today'}}");
        $( "#pay_end" ).datepicker("setDate","{{$invoice->pay_end ?? 'today'}}");
        $( "#pay_date" ).datepicker("setDate","{{$invoice->pay_date ?? 'today'}}");
    });
</script>
    <script>
        $(document).ready(function() {
            $('.advanceTemplate').change(function() {
                $('option:selected', '.basicTemplate').prop("selected", false);
            });
            $('.basicTemplate').change(function() {
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
        var searchInput = 'company_address';

        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['address'],
                componentRestrictions: {
                    country: "UK"
                }
            });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();

                if (near_place && near_place.address_components.length > 0) {
                    var obj = near_place.formatted_address;
                    // for (var i = 0; i < near_place.address_components.length; i++) {
                    //     for (var j = 0; j < near_place.address_components[i].types.length; j++) {
                    //         obj[near_place.address_components[i].types[j]] = near_place.address_components[i].long_name;
                    //     }
                    // }
                    setLocation(obj);
                }
            });
        });

        function setLocation(obj) {
            var obj = obj;
            var add = obj.replace("UK", "");
            $("#company_address").val(add);
        }
    </script>
    <script>
        var searchInput_1 = 'emp_street_1';
        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput_1)), {
                types: ['geocode'],
                componentRestrictions: {
                    country: "UK"
                }
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();
                console.log(near_place);
                if (near_place && near_place.address_components.length > 0) {
                    var obj = [];
                    for (var i = 0; i < near_place.address_components.length; i++) {
                        for (var j = 0; j < near_place.address_components[i].types.length; j++) {
                            obj[near_place.address_components[i].types[j]] = near_place.address_components[
                                i].long_name;
                        }
                    }
                    setEmpLocation(obj);
                    console.log(obj);
                }
            });
        });

        function setEmpLocation(obj) {
            if (obj.premise == undefined && obj.street_number == undefined && obj.route == undefined) {
                $("#emp_street_1").val('');
                $('#emp_street_1').css('border-color', 'gray');
                $('.0_emp_street_1').remove();
            } else if (obj.premise != undefined && obj.street_number == undefined && obj.route == undefined) {
                $("#emp_street_1").val(obj.premise);
                $('#emp_street_1').css('border-color', 'gray');
                $('.0_emp_street_1').remove();

            } else if (obj.premise != undefined && obj.street_number != undefined && obj.route == undefined) {
                $("#emp_street_1").val(obj.premise + ', ' + obj.street_number);
                $('#emp_street_1').css('border-color', 'gray');
                $('.0_emp_street_1').remove();

            } else if (obj.premise != undefined && obj.street_number != undefined && obj.route != undefined) {
                $("#emp_street_1").val(obj.premise + ', ' + obj.street_number + ' ' + obj.route);
                $('#emp_street_1').css('border-color', 'gray');
                $('.0_emp_street_1').remove();
            } else {
                $("#emp_street_1").val('');
            }

            if (obj.postal_code != undefined) {
                $("#city").val(obj.postal_town);
            } else {
                $("#city").val('');
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
        $('#emp_zip_code').mask('ANA NAA');
    </script>
    <script src="{{ asset('user') }}/js/dist/jquery-input-mask-phone-number.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tel').usPhoneFormat({
                format: '123-456-7890',
            });
        });
    </script>
    <script src="{{ asset('user') }}/js/uk.js"></script>
    <script>
        $(document).ready(function() {
            $("#pay_start").datepicker("setDate", "{{ $invoice->pay_start ?? 'today' }}");
            $("#pay_end").datepicker("setDate", "{{ $invoice->pay_end ?? 'today' }}");
            $("#pay_date").datepicker("setDate", "{{ $invoice->pay_date ?? 'today' }}");

            $('#tel').keyup(function() {
                var mobileNumber = this.value.replace(/\D/g, ''); // here you get what the end-user typed
                mobileNumber = (mobileNumber.replace(/[^\d]/g, ''));
                this.value = ("" + mobileNumber.substring(0, 3) + " " + mobileNumber.substring(3, 6) + " " +
                    mobileNumber.substring(6, 10));
            });
        });
    </script>
@endsection
