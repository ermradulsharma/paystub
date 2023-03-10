@extends('layouts.app')
@section('content')
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
    <div class="container" style="max-width:1450px;">
        <form id="submit_form_paystubx_id" action="javascript:void()" method="get">
            @csrf
            <input type="hidden" name="form_type" value="uk" hidden>
            <div>
                <h5 class="box-h5">Choose Template</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="box-usa">
                            <div class="d-flex justify-content-center flex w-100 ">
                                <div class="col-md-5 col-lg-6 col-sm-12 my-lg-5 my-auto text-center">
                                    <h6 class="base">BASIC TEMPLATES</h6>
                                    <div class="mt-3">
                                        <div class="input-group mmenu mb-3 text-center">
                                            <select name="basic_temp" id="basic_temp"
                                                class="form-control dropdown1 text-center bt_id small-font basicTemplate"
                                                style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Basic Templates --- </option>
                                                @foreach ($basicType as $data)
                                                    <option value="{{ $data->title ?? '' }}"
                                                        data-src="{{ $data->images->file ?? '' }}"
                                                        data-status="{{ $data->template_element }}"> {{ $data->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-eye-slash basicTem uk-eye" style="font-size: 39px;"
                                                role="button"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center sh" hidden>
                                    <img src="{{ asset('user/line.png') }}" style="height: 200px;">
                                </div>
                                <div class="col-md-5 col-lg-6 col-sm-12 pt-3 mt-lg-5  my-auto text-center" hidden>
                                    <div class="pr-lg-3">
                                        <h6 class="base">ADVANCED TEMPLATES</h6>
                                        <div class="mt-3">
                                            <div class="input-group mmenu mb-3">
                                                <select name="advance_temp" id="advance_temp"
                                                    class="form-control text-center at_id dropdown1 advanceTemplate"
                                                    style="margin-right:10px;">
                                                    <option value=""> --- Select Advance Template --- </option>
                                                    @foreach ($advanceType as $data)
                                                        <option value="{{ $data->title ?? '' }}"
                                                            data-src="{{ $data->images->file ?? '' }}"
                                                            data-status="{{ $data->template_element }}">
                                                            {{ $data->name ?? '' }} </option>
                                                    @endforeach
                                                </select>
                                                <i class="fa fa-eye-slash advanceTem uk-eye" role="button"></i>
                                            </div>
                                        </div>
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
                                <div class="col-md-6 mt-1">
                                    <label for="cname" class="lable">EMPLOYER (COMPANY) NAME <span
                                            style="color:red;">*</span> </label>
                                    <input type="text" id="cname" name="cname"
                                        placeholder="Employer (Company) Name" class="w-100 input-box-font text-center"
                                        style="font-size:14px;">
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="company_address" class="lable text-center uk-paystub-text">EMPLOYER
                                        (COMAPNY) ADDRESS <span style="color:red;">*</span></label>
                                    <input type="text" id="company_address" name="company_address"
                                        placeholder="Employer (Company) Address" class="w-100 input-box-font text-center"
                                        style="font-size:14px;">
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
                        <div class="row mb-3" style="align-items: end;">
                            <div class="col-md-6 mt-1">
                                <label for="emp_name" class="lable">EMPLOYEE NAME <span style="color:red;">*</span>
                                </label>
                                <input type="text" id="emp_name" name="emp_name" placeholder="Employee Name"
                                    class="w-100 input-box-font text-center" style="font-size:14px;">
                            </div>

                            <div class="col-md-6 mt-1">
                                <label for="emp_street_1" class="lable text-center uk-paystub-text">EMPLOYEE ADDRESS 1
                                    <span style="color:red;">*</span></label>
                                <input type="text" id="emp_street_1" name="emp_street_1"
                                    placeholder="Employee Street Address 1" class="w-100 input-box-font text-center"
                                    style="font-size:14px;">
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="emp_street_2" class="lable">STREET ADDRESS 2</label>
                                <input type="text" id="emp_street_2" name="emp_street_2"
                                    placeholder="Employee Street Address 2" class="w-100 input-box-font text-center"
                                    style="font-size:14px;">
                            </div>

                            <div class="col-md-6 mt-1">
                                <label for="emp_zip_code" class="lable text-center uk-paystub-text">Postal Code<span
                                        style="color:red;">*</span></label>
                                <input type="text" id="emp_zip_code" name="emp_zip_code" placeholder="123456"
                                    class="w-100 input-box-font text-center" style="font-size:14px;">
                            </div>
                        </div>
                        <div style="padding:0 !important;" class="row p-3">
                            <div class="col-lg-5"
                                style="color: black; text-transform:uppercase;font-size:30px; font-weight:600;">
                                <p class="top-heading">Earning Statement</p>
                                <div style="border:3px solid #ff5722;" class=" pay-outer mb-3">
                                    <div class="ukpay-inner ">
                                        <div class="row">
                                            <div style="margin:0 !important;" class="col-md-4 mt-3 pl-0 padding-0">
                                                <label for="pay_start" class="lable uk-lable ">Pay Start <span
                                                        style="color:red;">*</span> </label>
                                                <input
                                                    style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;"
                                                    type="text" id="pay_start" name="pay_start"
                                                    placeholder="12-11-2022"
                                                    class="input-uk removeDiv pay_start datepicker inputdatepicker"
                                                    data-id="pay_start" value="<?php echo date('m/d/Y'); ?>">
                                            </div>
                                            <div style="margin:0 !important;" class="col-md-4 mt-3 pl-0 padding-0">
                                                <label for="pay_end" class="lable uk-lable">Pay End <span
                                                        style="color:red;">*</span> </label>
                                                <input
                                                    style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;"
                                                    type="text" id="pay_end" name="pay_end"
                                                    placeholder="12-11-2022"
                                                    class="input-uk removeDiv pay_start datepicker inputdatepicker"
                                                    data-id="pay_start" value="<?php echo date('m/d/Y'); ?>">
                                            </div>
                                            <div style="margin:0 !important;" class="col-md-4 mt-3 pl-0 padding-0">
                                                <label for="pay_date" class="lable uk-lable">Pay Date <span
                                                        style="color:red;">*</span> </label>
                                                <input
                                                    style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;"
                                                    type="text" id="pay_date" name="pay_date"
                                                    placeholder="12-11-2022"
                                                    class="input-uk removeDiv pay_start datepicker inputdatepicker"
                                                    data-id="pay_start" value="<?php echo date('m/d/Y'); ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="ukpay-inner1">
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <label for="pay_type" class="lable uk-lable">Pay Type<span
                                                            style="color:red;">*</span> </label>
                                                    <input type="text" id="pay_type" name="pay_type"
                                                        class="input-uk" placeholder="2 Weekly" style="font-size:14px;">
                                                </div>
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <label for="payment_method" class="lable uk-lable">Payment Mehtod<span
                                                            style="color:red;">*</span> </label>
                                                    <input type="text" id="payment_method" name="payment_method"
                                                        class="input-uk" placeholder="BACS" style="font-size:14px;">
                                                </div>
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <label for="tax_code" class="lable uk-lable">Tax Code<span
                                                            style="color:red;">*</span> </label>
                                                    <input type="text" id="tax_code" name="tax_code"
                                                        class="input-uk" placeholder="1257L" style="font-size:14px;">
                                                </div>
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <label for="ni_number" class="lable uk-lable">NI Number<span
                                                            style="color:red;">*</span> </label>
                                                    <input type="text" id="ni_number" name="ni_number"
                                                        class="input-uk" placeholder="SC 56 52 10 C"
                                                        style="font-size:14px;">
                                                </div>
                                                <div class="col-lg-8 mt-3 p-0 mb-3">
                                                    <label for="ni_table_letter" class="lable uk-lable">NI Table
                                                        Letter<span style="color:red;">*</span> </label>
                                                    <input type="text" id="ni_table_letter" name="ni_table_letter"
                                                        class="input-uk" placeholder="A" style="font-size:14px;">
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
                                                <p class="text-left how_p mb-0" style="font-size:18px; font-weight:300;">  Basic Pay <span class="redColor">*</span> <span> </span></p>
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
                                                    <input class="earnbtn mt-3 text-center incomeKey" data-id="000" name="earning[]" type="text" value="Regular">
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                            <div class=" col-lg-4 col-md-12 margin-bottom  mt-2  px-lg-2 px-0 addrateKey">
                                                <button type="button" class="statementbtn">RATE</button>
                                                <div class="margin-bottom">
                                                    <input class="earnbtn mt-3 text-center rateKey" type="number" id="rate_000" name="rate[]" type="text" value="">
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                            <div class=" col-lg-4 col-md-12 margin-bottom  mt-2  px-lg-2 px-0 addhoursKey">
                                                <button type="button" class="statementbtn">HOUR</button>
                                                <div class="margin-bottom">
                                                    <input class="earnbtn mt-3 text-center hoursKey" type="number" id="hours_000" name="hours[]" type="text" value="">
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                            <div class=" col-lg-4 col-md-12 margin-bottom  mt-2  px-lg-2 px-0 addcurrentTotal" hidden>
                                                <button type="button" class="statementbtn">Current Total</button>
                                                <div class="margin-bottom">
                                                    <input class="earnbtn mt-3 text-center currentTotal" type="number" id="total_000" name="total[]" type="text" value="">
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div
                                                class="col-xl-4 col-lg-7 col-md-4 mt-2 margin-bottom  px-lg-2 px-0 center-btn">
                                                <button type="button" class="btnCommon addEarningField"> <i class="fa fa-plus-circle pr-2" style="font-size: 22px;color: #0ec23b;padding-top: 0px;"></i>Add Earning</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ukpay-inner ">
                                        <div class="row mt-5">
                                            <div class="col-md-4 col-lg-7  px-lg-2 px-0">
                                                <h3 class="uk-text" style="font-weight: 300 !important;">DEDUCTION</h3>
                                            </div>
                                        </div>
                                        <div class="ukpay-inner ">
                                            <div class="row">
                                                @foreach ($deduction as $key => $item)
                                                    <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                        <img src="{{ asset('images/lock.png') }}" class="earnbtn2 lockuk lock-uk lock" data-id="{{ $key }}" id="{{ $key }}">
                                                        <input class="input-uk text-center uk-texs taxes"  id="taxe_{{ $key }}" name="taxes[]" data-id="00{{ $key }}" data-value="{{ $item->price }}" value="{{ $item->title }}" readonly>
                                                        {{-- @endforeach --}}
                                                    </div>
                                                    <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0 ">
                                                        {{--  @foreach ($deduction as $key => $item) --}}
                                                        <input class="input-uk text-center uk-texs" readonly
                                                            name="taxes_rate[]" id="tax_total_00{{ $key }}">

                                                    </div>
                                                @endforeach
                                                <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                    <button style="background-color: #85b7bc; font-weight:300"
                                                        type="button" class="netpaybtn net_pay">Total Deduction</button>
                                                </div>

                                                <div class="col-md-5 col-lg-5 mb-0 pb-0   px-lg-2 px-0">
                                                    <input type="text" name="deduction_tax"
                                                        class="input-uk text-center uk-texs" id="deductions">
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
                                                <img src="{{ asset('images/lock.png') }}" class="earnbtn2 lockuk lock" data-id="0">
                                                <input class="input-uk text-center uk-texs" value="Taxable Gross Pay" id="taxe_0" readonly>
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <input type="text" name="taxable_gross_pay" class="input-uk text-center uk-texs" id="current_total" readonly>
                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <img src="{{ asset('images/lock.png') }}" class="earnbtn2 lockuk lock" id="1">
                                                <input class="input-uk text-center uk-texs" value="Income Tax" id="taxe_1" readonly>
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <input type="text" name="income_tax" class="input-uk  text-center uk-texs" id="income_tax" value="">
                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <img src="{{ asset('images/lock.png') }}" class="earnbtn2 lockuk lock" id="2">
                                                <input class="input-uk  text-center uk-texs" value="Employee NIC" id="taxe_2" readonly>
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <input type="text" name="employee_nic" class="input-uk  text-center uk-texs" id="employee_nic" value="">
                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <img src="{{ asset('images/lock.png') }}" class="earnbtn2 lockuk lock" id="3">
                                                <input class="input-uk  text-center uk-texs" value="Employee NIC" id="taxe_3" readonly>
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <input type="text" name="employer_nic" class="input-uk  text-center uk-texs" id="employee_nic" value="">
                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <button style="background-color:#0ec23b; font-weight:300" type="button" class="netpaybtn net_pay">Net Pay</button>
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <input type="text" name="net_pay" class="input-uk text-center uk-texs" id="net_pay" readonly>
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
                                            <div style="padding-bottom:255px;"
                                                class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <input style="color: #7c7370; border-color: #7c7370;"
                                                    class="input-uk text-center uk-texs note" name="note"
                                                    placeholder="Note here (optional) ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div style="padding:0;" class="col-12 text-center uk-bottom-btn">
                            <div class="d-flex flex-wrap justify-content-between canada-btn-inner">
                                <button class="previewbtn text-capitalize viewTempTemplate mb-3 w-sm-100" type="button"
                                    id="button1">Preview Your Paystub <i class="fa fa-eye"
                                        style="font-size: 30px; margin-left: 7px;"></i></button>
                                <button type="button" class="emailbtn text-capitalize sendMailButton mb-3 w-sm-100"> <i
                                        class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i
                                        class="fa fa-download ml-4" style="font-size:24px"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="{{ asset('user') }}/js/uk.js"></script>
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
@endsection
