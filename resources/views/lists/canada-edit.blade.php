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
        width: 14%;
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
            width: 28% !important;
        }

        .address_book_1 {
            width: 23% !important;
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
<div class="modal fade" id="tempViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="container" style="max-width: 1450px;">
    <form id="submit_form_paystubx_id" action="javascript:void()" method="get">
        @php($invoice = json_decode($invoiceData->data ?? '[]'))
        <input type="hidden" name="invoice_id" value="{{ $invoiceData->id ?? 0 }}">
        <input type="hidden" name="form_type" value="{{ $invoice->form_type ?? 'usa' }}" hidden>
        @csrf
        <input type="hidden" name="form_type" value="canada" hidden>
        <div>
            <h5 class="box-h5">Choose Your Template</h5>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="box-usa">
                        <div class="d-flex justify-content-center flex w-100 ">
                            <div class="col-md-5 col-lg-6 col-sm-12 my-lg-5 my-auto text-center">
                                <h6 class="base">BASIC TEMPLATES</h6>
                                <div class="mt-3">
                                    <div class="input-group mmenu mb-3 text-center">
                                        <select name="basic_temp" id="basic_temp" class="form-control dropdown1 text-center bt_id small-font basicTemplate direction-left-canada-edit" style="margin-right:10px; font-size:18px;">
                                            <option value=""> --- Select Basic Templates --- </option>
                                            @foreach ($basicType as $data)
                                            <option value="{{ $data->title ?? '' }}" data-src="{{ $data->images->file ?? '' }}" data-status="{{ $data->template_element }}" {{ $invoice->basic_temp == $data->title ? 'selected' : '' }}> {{ $data->name }} </option>
                                            @endforeach
                                        </select>
                                        <i class="fa fa-eye-slash basicTem uk-eye" role="button"></i>
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
                                            <select name="advance_temp" id="advance_temp" class="form-control text-center at_id dropdown1 advanceTemplate" style="margin-right:10px;">
                                                <option value=""> --- Select Advance Template --- </option>
                                                @foreach ($advanceType as $data)
                                                <option value="{{ $data->title ?? '' }}" data-src="{{ $data->images->file ?? '' }}" data-status="{{ $data->template_element }}" {{ $invoice->advance_temp == $data->title ? 'selected' : '' }}> {{ $data->name ?? '' }} </option>
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
            <div class="row mb-3">
                <div class="col-md-12">
                    <h5 class="box-h5">Company Info</h5>
                    <div class=" box-usa">
                        <div class="row justify-content py-3">
                            {{-- <img class="address-book" src="{{ asset('images/address-book.png') }}" alt="" height="30px;">
                            <select id="employerAddressCanada" class="address_book add_address address input-box-font select-dropdown" data-type="employer">
                                <option data-name="" value="">Select Address</option>
                                @foreach ($employerList ?? [] as $key => $employer)
                                <option data-name="{{ $employer->name }}" data-address1="{{ $employer->address_1 }}" data-address2="{{ $employer->address_2 }}" data-city="{{ $employer->city }}" data-state="{{ $employer->state }}" data-zip="{{ $employer->zip_code }}" data-tel="{{ $employer->tel }}" value="{{ $employer->name }}"> {{ $employer->name }} </option>
                                @endforeach
                                <option data-name="" value="add_address">Add New Address</option>
                            </select> --}}
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-md-6 mt-1">
                                <div>
                                    <label for="cname" class="lable">EMPLOYER (COMPANY) NAME <span class="redColor">*</span> </label>
                                    <input type="text" id="cname" name="cname" value="{{ $invoice->cname ?? null }}" placeholder="Your Employer & Company Name" class="w-100 p-2 textInputFontSize removeDiv">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div>
                                    <label for="address_1" class="lable">STREET ADDRESS 1 <span class="redColor">*</span> </label>
                                    <input type="text" id="address_1" name="address_1" value="{{ $invoice->address_1 ?? null }}" placeholder="Your Employer Address" class="w-100 p-2  textInputFontSize removeDiv">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div>
                                    <label for="address_2" class="lable">STREET ADDRESS 2</label>
                                    <input type="text" id="address_2" name="address_2" value="{{ $invoice->address_2 ?? null }}" placeholder="Suite 101 or Apt 101 (optional)" class="w-100 p-2  textInputFontSize">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div>
                                    <label for="city" class="lable">City <span class="redColor">*</span> </label>
                                    <input type="text" id="city" name="city" value="{{ $invoice->city ?? null }}" placeholder="Your Employer City" class="w-100 p-2  textInputFontSize removeDiv">
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div>
                                    <label for="state" class="lable">Province <span class="redColor">*</span></label>
                                    <div class="dropdown ">
                                        <select name="state" id="emp_state" class="state dropdown11 tax_rate removeDiv  select-dropdown">
                                            <option value="">Select</option>
                                            @foreach ($stateTaxes as $stateTax)
                                            <option value="{{ $stateTax->state_code }}" data-tax="{{ $stateTax->rate }}" {{ $invoice->state == $stateTax->state_code ? 'selected' : '' }}>{{ $stateTax->state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <label for="zip_code" class="lable">Postal Code <span class="redColor">*</span></label>
                                    <input type="text" id="zip_code" name="zip_code" value="{{ $invoice->zip_code ?? null }}" placeholder=" Zip Code" class="w-100 p-2  textInputFontSize removeDiv">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <h5 class="box-h5">Employee Basic Info</h5>
                    <div class=" box-usa">
                        <div class="row justify-content py-3">
                            {{-- <img class="address-book" src="{{ asset('images/address-book.png') }}" alt="" height="30px;">
                            <select id="employeeAddressCanada" class="address_book_1 add_address address input-box-font select-dropdown" data-type="employee">
                                <option data-name="" value="">Select Address</option>
                                @foreach ($employeeList ?? [] as $key => $employee)
                                <option data-name="{{ $employee->name }}" data-address1="{{ $employee->address_1 }}" data-address2="{{ $employee->address_2 }}" data-city="{{ $employee->city }}" data-state="{{ $employee->state }}" data-zip="{{ $employee->zip_code }}" data-emp_id="{{ $employee->emp_id }}" data-emp_ssn="{{ $employee->emp_ssn }}" value="{{ $employee->name }}"> {{ $employee->name }}</option>
                                @endforeach
                                <option data-name="" value="add_address_1">Add New Address</option>
                            </select> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="emp_id" class="lable">EMPLOYEE ID <span class="redColor">*</span> </label>
                                    <input type="text" id="emp_id" name="emp_id" value="{{ $invoice->emp_id ?? null }}" placeholder="Employee id" class="w-100 p-2  textInputFontSize removeDiv" maxlength="5" minlength="5" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="row">
                                    <div class="col-6 px-0">
                                        <div>
                                            <label for="pay_start" class="lable">PAY START <span class="redColor">*</span></label>
                                            <input style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;" type="text" id="pay_start" name="pay_start" placeholder="MM/DD/YYYY" class="w-100 p-2 input-box-font removeDiv pay_start datepicker inputdatepicker removeDiv" data-id="pay_start" value="{{ $invoice->pay_start ?? null }}">
                                        </div>
                                    </div>
                                    <div class="col-6 px-0">
                                        <div>
                                            <label for="emp_id" class="lable"> <span class="redColor"></span></label>
                                            <input style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;" type="text" id="pay_end" name="pay_end" placeholder="MM/DD/YYYY" class="w-100 p-2 input-box-font removeDiv pay_start datepicker inputdatepicker removeDiv" data-id="pay_end" value="{{ $invoice->pay_end ?? null }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="pay_date" class="lable">PAY DATE <span class="redColor">*</span></label>
                                    <input type="text" id="pay_date" name="pay_date" value="{{ $invoice->pay_date ?? null }}" placeholder="12-19-2022" class="w-100 p-2 textInputFontSize pay_date datepicker inputdatepicker removeDiv" data-id="pay_date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="check_number" class="lable">CHECK NUMBER <span class="redColor">*</span></label>
                                    <input type="text" id="check_number" name="check_number" value="{{ $invoice->check_number ?? null }}" placeholder="Check Number" class="w-100 p-2  textInputFontSize removeDiv" maxlength="5" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                </div>
                            </div>
                            <div class="col-md-2 mt-4">
                                <div>
                                    <label for="currency" class="lable" class="redColor">CURRENCY <span class="redColor">*</span> </label>
                                    <select name="currency" id="currency" class=" dropdown11 removeDiv  select-dropdown">
                                        @foreach ($currencies as $currency)
                                        <option value="{{ $currency->symbol }}" {{ $invoice->currency == $currency->symbol ? 'selected' : '' }}>{{ $currency->symbol }} ({{ $currency->name }}) </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="emp_name" class="lable">EMPLOYER NAME <span class="redColor">*</span></label>
                                    <input type="text" id="emp_name" name="emp_name" value="{{ $invoice->emp_name ?? null }}" placeholder="Employee name" class="w-100 p-2  textInputFontSize removeDiv">
                                </div>

                            </div>
                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="emp_address" class="lable">EMPLOYER ADDRESS <span class="redColor">*</span> </label>
                                    <input type="text" id="emp_address" name="emp_address" value="{{ $invoice->emp_address ?? null }}" placeholder="Suite 101 or Apt 101(optional)" class="w-100 p-2  textInputFontSize removeDiv">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex " style="justify-content: space-between;">
                <h5 class="box-h5">Earning statement</h5>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">
                        <div class="row mb-3 pt-4 justify-content-center">
                            <div class="col-lg-7 pr-lg-0 px-0 mb-3">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 mb-3 pr-lg-0 addincomeKey">
                                        <button type="button" class="statementbtn">INCOME</button>
                                        @foreach ($invoice->earning ?? [] as $key => $earning)
                                        <input class="earnbtn mt-3 text-center incomeKey" data-id="0{{ $key }}55" id="earning{{$key}}55" name="earning[]" type="text" value="{{ $earning }}">
                                        @endforeach
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-3 pr-lg-0 addrateKey">
                                        <button type="button" class="statementbtn">RATE</button>
                                        @foreach ($invoice->rate ?? [] as $key => $rate)
                                        <input class="earnbtn mt-3 text-center rateKey" type="number" id="rate_000{{ $key }}55" name="rate[]" type="text" value="{{ $rate }}">
                                        @endforeach
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-3 pr-lg-0 addhoursKey">
                                        <button type="button" class="statementbtn">HOURS</button>
                                        @foreach ($invoice->hours ?? [] as $key => $hours)
                                        <input class="earnbtn mt-3 text-center hoursKey" type="number" id="hours_000{{ $key }}55" name="hours[]" type="text" value="{{ $hours }}">
                                        @endforeach
                                    </div>
                                    <div class="col-lg-3 col-md-3 mb-3 pr-lg-0 addcurrentTotal">
                                        <button type="button" class="statementbtn"> CURRENT TOTAL</button>
                                        @foreach ($invoice->total ?? [] as $key => $total)
                                        <input class="earnbtn mt-3 text-center currentTotal" id="total_000{{$key}}55" readonly id="total_0{{ $key }}" name="total[]" type="text" value="{{ $total }}">
                                        @if($key >0)
                                        <button type="button" class="cross-btn-canadas removebtn-canada" data-ref="{{$key}}55" id="removebtn{{$key}}55">
                                            <span>x</span></button>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-lg-12">
                                        <button type="button" class="btnCommon addEarningField"><i class="fa fa-plus-circle pr-2" style="font-size: 22px;color: #0ec23b;padding-top: 0px;"></i>Add Earning</button>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-5 pl-0">
                                <div class="row">
                                    <div class="col-lg-4 mb-4 col-md-4 pr-0 addtaxes">
                                        <button type="button" class="statementbtn">DEDUCTION</button>
                                        @foreach ($deduction as $key => $item)
                                        <div class="d-flex mt-3" id="other_Tax_{{ $key }}">
                                            <img src="{{ asset('images/lock.png') }}" class="earnbtn3 lock" data-id="{{ $key }}" id="{{ $key }}" data-src="{{ asset('images/openPadlock.png') }}">
                                            <input type="text" class="earnbtn text-center taxes" name="taxes[]" value="{{ $invoice->taxes[$key] ?? null }}" data-id="00{{ $key }}" data-value="{{ $item->price }}" id="taxe_{{ $key }}" readonly>
                                        </div>
                                        @endforeach
                                        @foreach ($invoice->tax_deduction ?? [] as $key => $tax_deduction)
                                        <div class="d-flex mt-3" id="other_Tax_{{ $key }}66">
                                            <img src="../images/lock.png" class="earnbtn3 lock" data-id="{{ $key }}" id="{{ $key }}" data-src="{{ asset('images/openPadlock.png') }}">
                                            <input type="text" class="earnbtn text-center other_taxes" name="tax_deduction[]" value="{{ $tax_deduction }}" id="taxe_{{ $key }}" data-id="000{{ $key }}">
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-4 mb-4 col-md-4 pr-0 addtaxes_rate">
                                        <button type="button" class="statementbtn">CURRENT TOTAL</button>
                                        @foreach ($deduction as $key => $item)
                                        <input type="text" class="earnbtn text-center mt-3" name="taxes_rate[]" value="{{ $invoice->taxes_rate[$key] ?? null }}" id="tax_total_00{{ $key }}">
                                        @endforeach
                                        @foreach ($invoice->period_tax_deduction ?? [] as $key => $period_tax_deduction)
                                        <input type="text" class="earnbtn text-center mt-3" name="period_tax_deduction[]" value="{{ $period_tax_deduction }}" id="tax_{{ $key }}66">
                                        @endforeach
                                    </div>
                                    <div class="col-lg-4 mb-4 col-md-4 pr-0 addtaxes_ytd">
                                        <button type="button" class="statementbtn">YTD TOTAL</button>
                                        @foreach ($deduction as $key => $item)
                                        <input type="text" class="earnbtn text-center mt-3" name="taxes_ytd[]" value="{{ $invoice->taxes_ytd[$key] ?? null }}" id="tax_ytd_00{{ $key }}">
                                        @endforeach
                                        @foreach ($invoice->ytd_tax_deduction ?? [] as $key => $ytd_tax_deduction)
                                        <input type="text" class="earnbtn text-center mt-3" name="ytd_tax_deduction[]" value="{{ $ytd_tax_deduction }}" id="ytd_{{ $key }}66">

                                        <button type="button" class="cross-btn-canadas removebtn-canada2" data-ref="{{ $key }}66" id="removebtn_uk{{ $key }}66"><span>x</span></button>

                                        @endforeach
                                    </div>
                                </div>
                                <div class=" row my-2">
                                    <div class="col-lg-12">
                                        <button type="button" class="btnCommon addTaxField"><i class="fa fa-plus-circle pr-2" style="font-size: 22px;color: #0ec23b;padding-top: 0px;"></i>Add Deductions</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 mt-4 mt-lg-5">
                            <div class="col-lg-2 col-md-2 pr-md-0 mb-2">
                                <button type="button" class="statementbtn">YTD GROSS</button>
                                <input class="earnbtn text-center mt-3" id="ytd_gross" name="ytd_gross_total" value="{{ $invoice->ytd_gross_total ?? null }}">
                            </div>
                            <div class="col-lg-2 col-md-2 pr-md-0 mb-2">
                                <button type="button" class="statementbtn">YTD DEDUCATIONS</button>
                                <input class="earnbtn text-center mt-3" id="ytd_deducations" name="ytd_deduction_tax" value="{{ $invoice->ytd_deduction_tax ?? null }}">
                            </div>
                            <div class="col-lg-2 col-md-2 pr-md-0 mb-2">
                                <button type="button" class="statementbtn">YTD NET PAY</button>
                                <input class="earnbtn text-center mt-3" id="ytd_net_pay" name="total_ytd_net_pay" value="{{ $invoice->total_ytd_net_pay ?? null }}">
                            </div>
                            <div class="col-lg-2 col-md-2 pr-md-0 mb-2">
                                <button type="button" class="statementbtn">CURRENT TOTAL</button>
                                <input class="earnbtn text-center mt-3" id="current_total" name="period_gross_total" value="{{ $invoice->period_gross_total ?? null }}">
                            </div>
                            <div class="col-lg-2 col-md-2 pr-md-0 mb-2">
                                <button type="button" class="statementbtn">DEDUCTIONS</button>
                                <input class="earnbtn text-center mt-3" id="deductions" name="deduction_tax" value="{{ $invoice->deduction_tax ?? null }}">
                            </div>
                            <div class="col-lg-2 col-md-2 mb-2">
                                <button type="button" class="statementbtn">NET PAY</button>
                                <input class="earnbtn text-center mt-3" id="net_pay" name="total_net_pay" value="{{ $invoice->total_net_pay ?? null }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 text-center">
                <div class="d-flex flex-wrap justify-content-between">
                    <button class="previewbtn text-capitalize viewTempTemplate mb-3 w-sm-100" type="button" id="button1">Preview Your Paystub <i class="fa fa-eye" style="font-size: 30px; margin-left: 7px;"></i></button>
                    <button type="button" class="emailbtn text-capitalize sendMailButton mb-3 w-sm-100"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
                </div>
            </div>
        </div>

        <input type="hidden" name="alltotal" id="alltotal" value="{{ $invoice->period_gross_total ?? 0 }}">
        <input type="hidden" name="alltotalYtd" id="alltotalYtd" value="{{ $invoice->ytd_gross_total ?? 0 }}">
        <input type="hidden" name="allDeductiontotal" id="allDeductiontotal" value="{{ $invoice->deduction_tax ?? 0 }}">
        <input type="hidden" name="allDeductionYTDtotal" id="allDeductionYTDtotal" value="{{ $invoice->ytd_deduction_tax ?? 0 }}">
        <input type="hidden" name="tax_total_other" id="tax_total_other" alue="{{ $invoice->tax_total_other ?? 0 }}">
        <input type="hidden" name="tax_ytd_other" id="tax_ytd_other" value="{{ $invoice->tax_ytd_other ?? 0 }}">
        <input type="hidden" name="days_number" id="days_number" value="{{ $invoice->days_number ?? 0 }}">
    </form>
</div>
@endsection
@section('script')
<script src="{{ asset('user') }}/js/canada.js"></script>
<script>
    $(document).ready(function() {
        $("#pay_start").datepicker("setDate", "{{ $invoice->pay_start ?? 'today' }}");
        $("#pay_end").datepicker("setDate", "{{ $invoice->pay_end ?? 'today' }}");
        $("#pay_date").datepicker("setDate", "{{ $invoice->pay_date ?? 'today' }}");
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

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDpavHXELJMJvIHifFPN6tBBiFSXKGpy2g"> </script>
<script>
    var searchInput = 'address_1';
    $(document).ready(function() {
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            types: ['geocode'],
            componentRestrictions: {
                country: "CA"
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
                            i].short_name;
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
            $("#address_1").val(obj.street_number + ', ' + obj.route);
            $('#emp_street_1').css('border-color', 'gray');
            $('.0_address_1').remove();
        }
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
    var searchInput_1 = 'emp_address';
    $(document).ready(function() {
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput_1)), {
            componentRestrictions: {
                country: "CA"
            },
            types: ["address"],
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var near_place = autocomplete.getPlace();
            if (near_place && near_place.address_components.length > 0) {
                var obj = near_place.formatted_address;
                setEmpLocation(obj);
            }
        });
    });

    function setEmpLocation(obj) {
        var obj = obj;
        var add = obj.replace(/[,]/g, '', "Canada", "");
        var add_1 = add.replace("Canada", "");
        $("#emp_address").val(add_1);
    }
</script>
@endsection