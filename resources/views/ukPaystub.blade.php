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
    <div class="container" style="max-width:1450px;">
        <form id="submit_form_paystubx_id" action="javascript:void()" method="get">
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
                                            <select name="basic_temp"
                                                class="form-control dropdown1 text-center bt_id small-font basicTemplate"
                                                style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Basic Templates --- </option>
                                                @foreach ($basicType as $data)
                                                    @if ($data->state == 'uk' && $data->type == 'basic')
                                                        <option value="{{ $data->title ?? '' }}"
                                                            data-src="{{ $data->images->file ?? '' }}"> {{ $data->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <i data-src="{{ $data->images->file ?? '' }}"
                                                class="fa fa-eye-slash basicTem uk-eye" style="font-size: 39px;"
                                                role="button"></i>
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
                                            <select name="advance_temp"
                                                class="form-control text-center dropdown1 at_id small-font advanceTemplate"
                                                style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Advance Templates --- </option>
                                                @foreach ($advanceType as $data)
                                                    @if ($data->state == 'uk' && $data->type == 'advance')
                                                        <option value="{{ $data->title ?? '' }}"
                                                            data-src="{{ $data->images->file ?? '' }}"> {{ $data->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <i data-src="{{ $data->images->file ?? '' }}"
                                                class="fa fa-eye-slash advanceTem uk-eye" role="button"
                                                style="font-size: 39px;" class=""></i>
                                        </div>
                                    </div>
                                    <div class=" mt-3 ">
                                        <button class="viewbtn"> <a href="{{ url('template-view') }}">Click to see Template
                                                Landscape view.This is not part of design</a></button>
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
                                        placeholder="Your Employer & Company Name" class="w-100 p-2 text-center"
                                        style="font-size:14px;">
                                </div>

                                <div class="col-md-6 mt-1">
                                    <label for="company_address" class="lable text-center">EMPLOYER (COMAPNY) ADDRESS
                                        <span style="color:red;">*</span></label>
                                    <input type="text" id="company_address" name="company_address"
                                        placeholder="5 Throgmorton St, London EC2N 2AD, United Kingdom"
                                        class="w-100 p-2 text-center" style="font-size:14px;">
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

                                <label for="cname" class="lable">EMPLOYEE NAME <span style="color:red;">*</span>
                                </label>
                                <input type="text" id="cname" name="cname" placeholder="Your Employer &amp; Company Name" class="w-100 p-2 text-center" style="font-size:14px;">
                            </div>

                            <div class="col-md-6 mt-1">
                                <label for="company_address" class="lable text-center">EMPLOYEE ADDRESS 1 <span style="color:red;">*</span></label>
                                <input type="text" id="company_address" name="company_address" placeholder="5 Throgmorton St, London EC2N 2AD, United Kingdom" class="w-100 p-2 text-center" style="font-size:14px;">
                            </div>

                            <div class="col-md-6 mt-1">

                                <label for="cname" class="lable">STREET ADDRESS 2</label>
                                <input type="text" id="cname" name="cname" placeholder="Your Employer &amp; Company Name" class="w-100 p-2 text-center" style="font-size:14px;">
                            </div>

                            <div class="col-md-6 mt-1">
                                <label for="company_address" class="lable text-center">POSTCODE<span style="color:red;">*</span></label>
                                <input type="text" id="company_address" name="company_address" placeholder="5 Throgmorton St, London EC2N 2AD, United Kingdom" class="w-100 p-2 text-center" style="font-size:14px;">
                            </div>


                        </div>
                        <div style="padding:0 !important;" class="row p-3">
                            <div class="col-lg-5" style="color: black; text-transform:uppercase;font-size:30px; font-weight:600;">
                                <p>Earning Statement</p>
                                <div style="border:3px solid #ff5722;" class=" pay-outer mb-3">
                                    <div class="ukpay-inner ">
                                        <div class="row">
                                            <div style="margin:0 !important;" class="col-md-4 mt-3 pl-0">
                                                <label for="cname" class="lable uk-lable ">Pay Start <span style="color:red;">*</span>
                                                </label>
                                                <input type="text" id="cname" name="cname" class="input-uk" value="12-11-2022" style="font-size:14px;">
                                            </div>
                                            <div style="margin:0 !important;" class="col-md-4 mt-3 pl-0">
                                                <label for="cname" class="lable uk-lable">Pay End <span style="color:red;">*</span>
                                                </label>
                                                <input type="text" id="cname" name="cname" class="input-uk" value="09-12-2022" style="font-size:14px;">
                                            </div>
                                            <div style="margin:0 !important;" class="col-md-4 mt-3 pl-0">
                                                <label for="cname" class="lable uk-lable">Pay Date <span style="color:red;">*</span>
                                                </label>
                                                <input type="text" id="cname" name="cname" class="input-uk" value="10-12-2022" style="font-size:14px;">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="ukpay-inner1">
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <label for="cname" class="lable uk-lable">Pay Type<span style="color:red;">*</span>
                                                    </label>
                                                    <input type="text" id="cname" name="cname" class="input-uk" value="2 Weekly" style="font-size:14px;">
                                                </div>
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <label for="cname" class="lable uk-lable">Payment Mehtod<span style="color:red;">*</span>
                                                    </label>
                                                    <input type="text" id="cname" name="cname" class="input-uk" value="BACS" style="font-size:14px;">
                                                </div>
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <label for="cname" class="lable uk-lable">Tax Code<span style="color:red;">*</span>
                                                    </label>
                                                    <input type="text" id="cname" name="cname" class="input-uk" value="1257L" style="font-size:14px;">
                                                </div>
                                                <div class="col-lg-8 mt-3 p-0">
                                                    <label for="cname" class="lable uk-lable">NI Number<span style="color:red;">*</span>
                                                    </label>
                                                    <input type="text" id="cname" name="cname" class="input-uk" value="SC 56 52 10 C" style="font-size:14px;">
                                                </div>
                                                <div class="col-lg-8 mt-3 p-0 mb-3">
                                                    <label for="cname" class="lable uk-lable">NI Table Letter<span style="color:red;">*</span> </label>
                                                    <input type="text" id="cname" name="cname" class="input-uk" value="A" style="font-size:14px;">
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-7" style="color: black; text-transform:uppercase;font-size:30px; font-weight:600;">
                                <p>Payments</p>
                                <div style="border:3px solid #ff5722;padding-bottom:62px;" class=" pay-outer">
                                    <div class="ukpay-inner ">
                                        <div class="row ">
                                            <div style="margin:0 !important;" class="col-md-4 mt-4 p-0">
                                                <p class="text-left how_p mb-0" style="font-size:18px; font-weight:300;">
                                                    Basic Pay <span class="redColor">*</span> <span> </span></p>
                                                <div class="text-center mt-2  d-flex">
                                                    <button type="button" class="hour_btn date_select">HOURLY</button>
                                                    <button type="button" class="salary_btn">SALARY</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-4"></div>

                                        </div>
                                        <div class="row">
                                            <div class=" col-lg-4 col-md-12 margin-bottom  mt-2  px-lg-2 px-0 ">
                                                <button type="button" class="statementbtn">EARNING</button>
                                                <div class="margin-bottom">
                                                    <input class="input-uk mt-4 mb-3 text-center" type="text" name="earning[]" value="Regular" id="earning_0" data-id="0">
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                            <div class=" col-lg-4 col-md-12 margin-bottom  mt-2  px-lg-2 px-0">
                                                <button type="button" class="statementbtn">RATE</button>
                                                <div class="margin-bottom">
                                                    <input type="text" name="rate[]" class="input-uk removeData mt-4 mb-3 text-center calculation rate" value="" id="rate_0" data-id="0">
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                            <div class=" col-lg-4 col-md-12 margin-bottom  mt-2  px-lg-2 px-0">
                                                <button type="button" class="statementbtn">HOUR</button>
                                                <div class="margin-bottom">
                                                    <input type="text" name="hours[]" class="input-uk removeData mt-4 mb-3 text-center hours calculation" value="" id="hours_0" data-id="0">
                                                </div>
                                                <div id="addEarning"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-xl-4 col-lg-7 col-md-4 mt-2 margin-bottom  px-lg-2 px-0">
                                                <button type="button" class="add_button input-uk" id="add_earning" style="font-size: 18px !important;"><i class="fa fa-plus-circle pr-2" style="font-size:24px;color:green"></i>Add Earnings</button>
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
                                                    <img src="http://127.0.0.1:8000/images/lock.png" style="top:19px !important;" class="earnbtn2">
                                                    <input class="input-uk text-center taxes" name="taxes[]" data-id="" data-value="" value="Income Tax">
                                                </div>

                                                <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                    <input type="text" name="taxes_rate[]" class="input-uk text-center manualTaxTotal" id="taxes_" value="" data-value="">
                                                </div>
                                                <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                    <img src="http://127.0.0.1:8000/images/lock.png" style="top:19px !important;" class="earnbtn2">
                                                    <input class="input-uk  text-center taxes" name="taxes[]" data-id="" data-value="" value="National Insurance">
                                                </div>

                                                <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                    <input type="text" name="taxes_rate[]" class="input-uk  text-center manualTaxTotal" id="taxes_" value="" data-value="">
                                                </div>
                                                <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                    <button style="background-color: #85b7bc; font-weight:300" type="button" class="netpaybtn net_pay">Total Deduction</button>
                                                </div>

                                                <div class="col-md-5 col-lg-5 mb-0 pb-0   px-lg-2 px-0">
                                                    <input type="text" name="taxes_rate[]" class="input-uk   text-center manualTaxTotal" id="taxes_" value="" data-value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5" style="color: black; text-transform:uppercase;font-size:30px; font-weight:600;">
                                <p class="top-heading">Total Year To Date</p>
                                <div style="border:3px solid #ff5722;" class=" pay-outer mb-3">
                                    <div class="ukpay-inner ">
                                        <div class="row">
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <img src="http://127.0.0.1:8000/images/lock.png" class="earnbtn2">
                                                <input class="input-uk text-center taxePays" name="taxes[]" data-id="" data-value="" value="Taxable Gross Pay ">
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <input type="text" name="taxes_rate[]" class="input-uk text-center manualTaxTotal" id="taxes_" value="" data-value="">
                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <img src="http://127.0.0.1:8000/images/lock.png" class="earnbtn2">
                                                <input class="input-uk  text-center taxes" name="taxes[]" data-id="" data-value="" value="Income Tax">
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <input type="text" name="taxes_rate[]" class="input-uk  text-center manualTaxTotal" id="taxes_" value="" data-value="">
                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <img src="http://127.0.0.1:8000/images/lock.png" class="earnbtn2">
                                                <input class="input-uk  text-center taxes" name="taxes[]" data-id="" data-value="" value="Employee NIC">
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <input type="text" name="taxes_rate[]" class="input-uk  text-center manualTaxTotal" id="taxes_" value="" data-value="">
                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <img src="http://127.0.0.1:8000/images/lock.png" class="earnbtn2">
                                                <input class="input-uk  text-center taxes" name="taxes[]" data-id="" data-value="" value="Employee NIC">
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <input type="text" name="taxes_rate[]" class="input-uk  text-center manualTaxTotal" id="taxes_" value="" data-value="">
                                            </div>
                                            <div class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">
                                                <button style="background-color:#0ec23b; font-weight:300" type="button" class="netpaybtn net_pay">Net Pay</button>
                                            </div>

                                            <div class="col-md-5 col-lg-5 mb-3  px-lg-2 px-0">
                                                <input type="text" name="taxes_rate[]" class="input-uk  text-center manualTaxTotal" id="taxes_" value="" data-value="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7" style="color: black; text-transform:uppercase;font-size:30px; font-weight:600;">
                                <p>Additional Information Here (Note)</p>
                                <div style="border:3px solid #ff5722;" class=" pay-outer mb-3">
                                    <div class="ukpay-inner ">
                                        <div class="row">
                                            <div style="padding-bottom:255px;" class="col-md-7 col-lg-7 mb-3  px-lg-2 px-0">

                                                <input style="color: #7c7370; border-color: #7c7370;" class="input-uk text-center note taxePays" name="taxes[]" data-id="" data-value="" value="Note here (optional) ">
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
        </div>
    </div>
    </form>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
    {{-- <script src="{{ asset('user') }}/js/calculations.js"></script> --}}
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
