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
                {{-- <iframe src="" id="tempView" allowtransparency="false" style="background-color : transparent;" frameborder="0" width="100%" height="800"></iframe> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
<div class="container" style="max-width:1450px;">
    <form id="submit_form_paystubx_id" action="javascript:void()" method="get">
        @csrf
        <input type="hidden" name="form_type" value="uk" hidden>
        <div class="mb-4">
            <h5 class="box-h5 px-0">Choose Template</h5>
            <div class="row mb-3">
                <div class="col-md-12 px-0">
                    <div class="box-usa">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-5 col-sm-12 text-center py-4 py-lg-5">
                                <h6 style="" class="base">BASIC TEMPLATES</h6>
                                <div class="mt-4">
                                    <div class="input-group mmenu mb-3">
                                        <select name="basic_temp" class="form-control dropdown1 text-center bt_id small-font basicTemplate" style="margin-right:10px; font-size:18px;">
                                            <option value=""> --- Select Basic Templates --- </option>
                                            @foreach ($basicType as $data)
                                            @if($data->state == 'uk' && $data->type == 'basic')
                                            <option value="{{$data->title ?? ''}}" data-src="{{$data->images->file ?? ''}}"> {{$data->name}} </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <i data-src="{{$data->images->file ?? ''}}" class="fa fa-eye-slash basicTem uk-eye" style="font-size: 39px;" role="button"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-md-2  text-center sh" hidden>
                                <img src="images/hrpng.png" style="height: 200px;">
                            </div>

                            <div class="col-md-5 col-sm-12 mt-5 text-center" hidden>
                                <h6 style="margin-left:-23px;font-weight: 900;" class="add">ADVANCED TEMPLATES</h6>
                                <div class="mt-4">
                                    <div class="input-group mmenu mb-3" style="margin: auto;">
                                        <select name="advance_temp" class="form-control text-center dropdown1 at_id small-font advanceTemplate" style="margin-right:10px; font-size:18px;">
                                            <option value=""> --- Select Advance Templates --- </option>
                                            @foreach ($advanceType as $data)
                                            @if($data->state == 'uk' && $data->type == 'advance')
                                            <option value="{{$data->title ?? ''}}" data-src="{{$data->images->file ?? ''}}"> {{$data->name}} </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <i data-src="{{$data->images->file ?? ''}}" class="fa fa-eye-slash advanceTem uk-eye" role="button" style="font-size: 39px;" class=""></i>
                                    </div>
                                </div>
                                <div class=" mt-3 ">
                                    <button class="viewbtn"> <a href="{{url('template-view')}}">Click to see Template
                                            Landscape view.This is not part of design</a></button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <h5 class="box-h5  px-0">Company Info</h5>
            <div class="row mb-3">
                <div class="col-md-12 px-0">
                    <div class=" box-usa">
                        <div class="row mb-3" style="align-items: end;">
                            <div class="col-md-6 mt-1">

                                <label for="cname" class="lable">EMPLOYER (COMPANY) NAME <span style="color:red;">*</span> </label>
                                <input type="text" id="cname" name="cname" placeholder="Your Employer & Company Name" class="w-100 p-2 text-center" style="font-size:14px;">
                            </div>

                            <div class="col-md-6 mt-1">
                                <label for="company_address" class="lable text-center">EMPLOYER (COMAPNY) ADDRESS <span style="color:red;">*</span></label>
                                <input type="text" id="company_address" name="company_address" placeholder="5 Throgmorton St, London EC2N 2AD, United Kingdom" class="w-100 p-2 text-center" style="font-size:14px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h5 class="box-h5 px-0">Employee Info</h5>
            <div class="col-md-12 px-0">
                <div class="box-usa">
                    <div class="row mb-3" style="align-items: end;">
                        <div class="col-md-6 mt-1">

                            <label for="emp_name" class="lable">EMPLOYEE NAME <span style="color:red;">*</span> </label>
                            <input type="text" id="emp_name" name="emp_name" placeholder="Your Employer & Company Name" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>

                        <div class="col-md-6 mt-1">
                            <label for="emp_address" class="lable text-center">EMPLOYEE ADDRESS 1 <span style="color:red;">*</span></label>
                            <input type="text" id="emp_address" name="emp_address" placeholder="5 Throgmorton St, London EC2N 2AD, United Kingdom" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>

                        <div class="col-md-6 mt-1">

                            <label for="emp_address2" class="lable">STREET ADDRESS 2</label>
                            <input type="text" id="emp_address2" name="emp_address2" placeholder="Your Employer & Company Name" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>

                        <div class="col-md-6 mt-1">
                            <label for="zip_code" class="lable text-center">POSTCODE<span style="color:red;">*</span></label>
                            <input type="text" id="zip_code" name="zip_code" placeholder="5 Throgmorton St, London EC2N 2AD, United Kingdom" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-lg-5 mb-3 px-0">
                            <h2 class="font-weight-bold">EARNINGS STATEMENT</h2>
                            <div class="ukpay-inner pay-outer" style="border:3px solid #ff5722;">
                                <div class="row">
                                    <div class="col-md-4 mt-3 px-0 pr-lg-3 px-md-1">
                                        <label for="pay_start" class="lable uk-lable ">Pay Start <span style="color:red;">*</span></label>
                                        <input type="text" id="pay_start" name="pay_start" class="input-uk" value="12-11-2022" class="w-100 p-2 text-center" style="font-size:14px;">
                                    </div>
                                    <div class="col-md-4 mt-3 px-0 pr-lg-3 pr-md-1">
                                        <label for="pay_end" class="lable uk-lable">Pay End <span style="color:red;">*</span>
                                        </label>
                                        <input type="text" id="pay_end" name="pay_end" class="input-uk" value="09-12-2022" class="w-100 p-2 text-center" style="font-size:14px;">
                                    </div>
                                    <div class="col-md-4 mt-3 px-0 pr-md-1">
                                        <label for="pay_date" class="lable uk-lable">Pay Date <span style="color:red;">*</span>
                                        </label>
                                        <input type="text" id="pay_date" name="pay_date" class="input-uk" value="10-12-2022" class="w-100 p-2 text-center" style="font-size:14px;">
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="ukpay-inner1">
                                        <div class="col-md-8 mt-3 px-0 px-lg-2 px-md-1">
                                            <label for="cname" class="lable uk-lable my-2">Pay Type<span style="color:red;">*</span></label>
                                            <select name="time_period" id="time_period" class="dropdown11 time_period input-uk" style="color: #000ef5;">
                                                <option value=""> --- Select --- </option>
                                                <option value="weekly">Weekly</option>
                                                <option value="bi-weekly">Bi-Weekly</option>
                                                <option value="monthly">Monthly</option>
                                                <option value="bi-monthly">Bi-Monthly</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mt-3 px-0 px-lg-2 px-md-1">
                                            <label for="payment_method" class="lable uk-lable my-2">Payment Mehtod<span style="color:red;">*</span></label>
                                            <input type="text" id="payment_method" name="payment_method" class="input-uk" value="BACS" class="w-100 p-2 text-center" style="font-size:14px;">
                                        </div>
                                        <div class="col-md-8 mt-3 px-0 px-lg-2 px-md-1">
                                            <label for="tax_code" class="lable uk-lable my-2">Tax Code<span style="color:red;">*</span></label>
                                            <input type="text" id="tax_code" name="tax_code" class="input-uk" value="1257L" class="w-100 p-2 text-center" style="font-size:14px;">
                                        </div>
                                        <div class="col-md-8 mt-3 px-0 px-lg-2 px-md-1">
                                            <label for="ni_number" class="lable uk-lable my-2">NI Number<span style="color:red;">*</span></label>
                                            <input type="text" id="ni_number" name="ni_number" class="input-uk" value="SC 56 52 10 C" class="w-100 p-2 text-center" style="font-size:14px;">
                                        </div>
                                        <div class="col-md-8 mt-3 px-0 px-lg-2 px-md-1 mb-3">
                                            <label for="ni_table_letter" class="lable uk-lable my-2">NI Table Letter<span style="color:red;">*</span> </label>
                                            <input type="text" id="ni_table_letter" name="ni_table_letter" class="input-uk" value="A" class="w-100 p-2 text-center" style="font-size:14px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6 px-0">
                            <h2 class="font-weight-bold">PAYMENTS</h2>
                            <div class="ukpay-inner pay-outer" style="border:3px solid #ff5722;">
                                <div class="row mb-5">
                                    <div class="col-md-6 mt-4 px-0">
                                        <p class="text-left how_p mb-0" style="font-size:18px;">Basic Pay <span class="redColor">*</span> <span> </p>
                                        <div class="mt-2 d-flex justify-content-between">
                                            <button type="button" class="hour_btn date_select px-5">HOURLY</button>
                                            <button type="button" class="salary_btn px-5">SALARY</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 margin-bottom px-0 pr-lg-2 pr-md-2 addincomeKey">
                                        <button type="button" class="statementbtn">EARNING</button>
                                        <input class="input-uk incomeKey mt-4 text-center" type="text" name="earning[]" value="Regular" id="earning_0" data-id="0">
                                    </div>
                                    <div class="col-lg-3 col-md-3 margin-bottom px-0 pr-lg-2 pr-md-2 addrateKey">
                                        <button type="button" class="statementbtn">RATE</button>
                                        <input type="text" name="rate[]" class="input-uk rateKey removeData mt-4 text-center calculation rate" value="" id="rate_0" data-id="0">
                                    </div>
                                    <div class="col-lg-3 col-md-3 margin-bottom px-0 addhoursKey">
                                        <button type="button" class="statementbtn">HOUR</button>
                                        <input type="text" name="hours[]" class="input-uk hoursKey removeData mt-4 text-center hours calculation" value="" id="hours_0" data-id="0">
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-xl-4 col-lg-7 col-md-4 mt-2 margin-bottom px-0 pr-lg-2 pr-md-2">
                                            <button type="button" class="btnCommon addEarningField" style="font-size: 18px !important;"><i class="fa fa-plus-circle pr-2" style="font-size:24px;color:green"></i>Add Earnings</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="row mt-4">
                                        <div class="col-md-4 col-lg-7  px-lg-2 px-0">
                                            <!-- <button type="button" class="createbtn w-100 py-0">DEDUCTIONS</button> -->
                                            <h3>DEDUCTION</h3>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-5 mb-4 px-0 pr-lg-2 pr-md-2">
                                                <img src="{{ asset('images/lock.png') }}" class="earnbtn2">
                                                <input class="input-uk text-center taxes" name="taxes[]" data-id="00" data-value="" value="Income Tax" data-value="">
                                            </div>

                                            <div class="col-md-3 mb-4 px-0 pr-lg-2 pr-md-2">
                                                <input type="text" name="taxes_rate[]" class="input-uk text-center manualTaxTotal" id="taxes_rate_00" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mb-4 px-0 pr-lg-2 pr-md-2">
                                                <img src="{{ asset('images/lock.png') }}" class="earnbtn2">
                                                <input class="input-uk  text-center taxes" name="taxes[]" data-id="01" data-value="" value="National Insurance" data-value="">
                                            </div>

                                            <div class="col-md-3 mb-4 px-0 pr-lg-2 pr-md-2">
                                                <input type="text" name="taxes_rate[]" class="input-uk text-center manualTaxTotal" id="taxes_01" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mb-4 px-0 pr-lg-2 pr-md-2">
                                                <button type="button" class="netpaybtn net_pay">Total Deductions</button>
                                            </div>
                                            <div class="col-md-3 mb-0 px-0 pr-lg-2 pr-md-2">
                                                <input type="text" name="taxes_rate_total[]" class="input-uk text-center taxes_rate_total" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-5 px-0">
                            <h2 class="font-weight-bold">TOTAL YEAR TO DATE</h2>
                            <div class="ukpay-inner pay-outer" style="border:3px solid #ff5722;">
                                <div class="row mt-2">
                                    <div class="col-md-8 mb-3 px-0 pr-lg-2 pr-md-2">
                                        <img src="{{ asset('images/lock.png') }}" class="earnbtn2">
                                        <input class="input-uk text-center" name="" value="Taxable Gross Pay">
                                    </div>

                                    <div class="col-md-4 mb-3 px-lg-2 px-0">
                                        <input type="text" name="period_gross_total" class="input-uk text-center period_gross_total" id="period_gross_total" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb-3 px-0 pr-lg-2 pr-md-2">
                                        <img src="{{ asset('images/lock.png') }}" class="earnbtn2">
                                        <input class="input-uk text-center" value="Income Tax">
                                    </div>

                                    <div class="col-md-4 mb-3 px-lg-2 px-0">
                                        <input type="text" name="deduction_tax[]" class="input-uk  text-center manualTaxTotal" id="deduction_tax" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb-3 px-0 pr-lg-2 pr-md-2">
                                        <img src="{{ asset('images/lock.png') }}" class="earnbtn2">
                                        <input class="input-uk  text-center taxes" value="Employee NIC">
                                    </div>

                                    <div class="col-md-4 mb-3 px-lg-2 px-0">
                                        <input type="text" name="employee_nic" class="input-uk text-center employee_nic" id="employee_nic" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb-3 px-0 pr-lg-2 pr-md-2">
                                        <img src="{{ asset('images/lock.png') }}" class="earnbtn2">
                                        <input class="input-uk  text-center" value="Employer NIC">
                                    </div>
                                    <div class="col-md-4 mb-3 px-lg-2 px-0">
                                        <input type="text" name="employer_nic" class="input-uk  text-center employer_nic" id="employer_nic" />
                                    </div>

                                </div>
                                <div class="row my-5">
                                    <div class="col-md-8 mb-4 px-0 pr-lg-2 pr-md-2">
                                        <button type="button" class="input-uk">Net Pay</button>
                                    </div>
                                    <div class="col-md-4 mb-0 px-2">
                                        <input type="text" name="net_pay" class="emailbtn w-100 text-center font-weight-bold" id="net_pay" value="1500.56" style="background: linear-gradient(to bottom, rgb(32 173 7) 0%, rgb(41 177 7) 48%, rgb(40 193 11) 50%, rgb(37 153 0) 99%);padding:4px 0px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6 mt-5 px-0">
                            <h2 class="font-weight-bold">Additional Information Here <small>(Note)</small></h2>
                            <div class="ukpay-inner pay-outer w-100" style="border:3px solid #ff5722;height:410px;">
                                <textarea name="" id="" class="w-100 h-100"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col-12 text-center">
                <div class="d-flex flex-wrap justify-content-between">
                    <button class="previewbtn text-capitalize viewTempTemplate mb-3 w-sm-100" type="button" id="button1">Preview Your Paystub <i class="fa fa-eye" style="font-size: 30px; margin-left: 7px;"></i></button>
                    <button type="button" class="emailbtn text-capitalize sendMailButton mb-3 w-sm-100"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('user') }}/js/uk.js"></script>
<script>
    $(document).ready(function() {
        $('.advanceTemplate').change(function() {
            $('option:selected', '.basicTemplate').prop("selected", false);
        });
        $('.basicTemplate').change(function() {
            $('option:selected', '.advanceTemplate').prop("selected", false);
        });

        $('#tel').keyup(function() {
            var mobileNumber = this.value.replace(/\D/g, ''); // here you get what the end-user typed
            mobileNumber = (mobileNumber.replace(/[^\d]/g, ''));
            this.value = ("" + mobileNumber.substring(0, 3) + " " + mobileNumber.substring(3, 6) + " " +
                mobileNumber.substring(6, 10));
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