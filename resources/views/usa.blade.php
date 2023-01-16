@extends('layouts.app')

@section('content')

<!-- Modal Start -->
<div class="modal fade" id="openEye" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
    <div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">
                    <h5>Company Info</h5>
                    <div class="row mb-3 ">
                        <div class="col-md-6 mt-1">
                            <label for="cname" class="lable">EMPLOYER (COMPANY) NAME <span class="redColor">*</span> </label>
                            <input type="text" id="cname" name="cname" placeholder="Your Employer & Company Name" class="w-100 p-2 text-center textInputFontSize">
                        </div>

                        <div class="col-md-6 mt-1">
                            <label for="tel" class="lable">EMPLOYER TELEPHONE NUMBER <span class="redColor">*</span> </label>
                            <input type="tel" id="tel" name="tel" placeholder="123-234-4565" class="w-100 p-2 text-center textInputFontSize">
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="address_1" class="lable">STREET ADDRESS 1 <span class="redColor">*</span> </label>
                            <input type="text" id="address_1" name="address_1" placeholder="Your Employer Address" class="w-100 p-2  textInputFontSize">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="address_2" class="lable">STREET ADDRESS 2 <span class="redColor">*</span> </label>
                            <input type="text" id="address_2" name="address_2" placeholder="Suite 101 or Apt 101 (optional)" class="w-100 p-2  textInputFontSize">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="city" class="lable">City <span class="redColor">*</span> </label>
                            <input type="text" id="city" name="city" placeholder="Your Employer City" class="w-100 p-2  textInputFontSize">
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="lable">State <span class="redColor">*</span> </label>
                            <input type="text" id="state" name="state" placeholder=" Choose Your Employer State" class="w-100 p-2   textInputFontSize">
                        </div>
                        <div class="col-md-4">
                            <label for="zip_code" class="lable">Zip Code <span class="redColor">*</span> </label>
                            <input type="text" id="zip_code" name="zip_code" placeholder=" Zip Code" class="w-100 p-2  textInputFontSize">
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
                    <div class="d-flex justify-content-between mb-3">
                        <div class="col-md-5 col-sm-12 m-auto  text-center" style="padding: -1px 35px;">
                            <h6 style="" class="base">BASIC TEMPLATES</h6>
                            <div class="mt-4">
                                {{-- <i class="fa fa-angle-down down"></i> --}}
                                <div class="input-group mmenu mb-3 text-center">
                                    <select class="form-control dropdown1 text-center bt_id" style="border-right:none">
                                        <option selected=""> --- Select Basic Templates --- </option>
                                        @foreach ($basicType as $data)
                                        <option value="{{$data->title ?? ''}}" data-src="{{$data->images->file ?? ''}}">
                                            {{$data->title}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <i data-src="{{$data->images->file ?? ''}}" class="fa fa-eye-slash basicTem" style="font-size: 39px;" role="button"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2  text-center sh">
                            <img src="images/hrpng.png" style="height: 200px;">
                        </div>
                        <div class="col-md-5 col-sm-12 mt-5 text-center">
                            <h6 style="margin-left:-23px;font-weight: 900;">ADVANCED TEMPLATES</h6>
                            <div class="mt-4">
                                {{-- <i class="fa fa-angle-down down1"></i> --}}
                                <div class="input-group mmenu mb-3">
                                    <select class="form-control text-center dropdown1 at_id" style="border-right:none">
                                        <option selected=""> --- Select Advance Template --- </option>
                                        @foreach ($advanceType as $data)
                                        <option value="{{$data->title ?? ''}}" data-src="{{$data->images->file ?? ''}}">
                                            {{$data->title ?? ''}}
                                        </option>
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
                            <label for="fname" class="lable">EMPLOYEE NAME <span class="redColor">*</span> </label>
                            <input type="text" id="fname" name="fname" placeholder="Your Full  Name" class="w-100 p-2  textInputFontSize">
                        </div>

                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYEE ID <span class="redColor">*</span> </label>
                            <input type="text" id="fname" name="fname" placeholder="Employer ID" class="w-100 p-2 r textInputFontSize">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYEE SSN last4 <span class="redColor">*</span> </label>
                            <input type="text" id="fname" name="fname" placeholder="1224" class="w-100 p-2  textInputFontSize">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="fname" class="lable">STREET 1 <span class="redColor">*</span></label>
                            <input type="text" id="fname" name="fname" placeholder="Your Address" class="w-100 p-2  textInputFontSize">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="fname" class="lable">STREET 2 <span class="redColor">*</span> </label>
                            <input type="text" id="fname" name="fname" placeholder="Suite 101 or Apt 101(optional)" class="w-100 p-2  textInputFontSize">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="fname" class="lable">City <span class="redColor">*</span> </label>
                            <input type="text" id="fname" name="fname" placeholder="Your City" class="w-100 p-2  textInputFontSize">
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">State <span class="redColor">*</span> </label>
                            <div class="dropdown ">
                                <select name="cars" id="cars" class=" dropdown11">
                                    <option selected> --- Select --- </option>
                                    <option value="saab">Saab</option>
                                    <option value="opel">Opel</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">Zip Code <span class="redColor">*</span> </label>
                            <input type="text" id="fname" name="fname" placeholder=" 1234" class="w-100 p-2  textInputFontSize">
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
                            <label for="fname" class="lable">SELECT YOUR STATE <span class="redColor">*</span> </label>
                            <div class="dropdown ">
                                <select name="cars" id="cars" class=" dropdown11">
                                    <option selected>Choose your State</option>
                                    <option value="saab">Saab</option>
                                    <option value="opel">Opel</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">AUTO CALCULATOR <span class="redColor">*</span> </label>
                            <select name="cars" id="cars" class="dropdown11 auto_calculate">
                                <option selected> --- Select Calculator --- </option>
                                <option value="on">ON</option>
                                <option value="off">OFF</option>
                            </select>
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="marital_status" class="lable">MARITAL STATUS <span class="redColor">*</span>
                            </label>
                            <select name="marital_status" id="marital_status" class="dropdown11 marital_status">
                                <option selected> --- Select Marital Status--- </option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="other">Prefered top not say</option>
                            </select>
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="time_period" class="lable">HOW DO YOU GET PAID <span class="redColor">*</span>
                            </label>
                            <select name="time_period" id="time_period" class="dropdown11 time_period">
                                <option selected> --- Select --- </option>
                                <option value="weekly">Weekly</option>
                                <option value="bi-weekly">Bi-Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="bi-monthly">Bi-Monthly</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">HOURLY <span class="redColor">*</span> </label>
                            <input type="text" id="fname" name="fname" placeholder="Hourly" class="w-100 p-2  textInputFontSize">
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">EMPLOYMENT TYPE <span class="redColor">*</span> </label>
                            <select name="cars" id="cars" class=" dropdown11">
                                <option selected> --- Select Employment Type --- </option>
                                <option value="saab">Temporary</option>
                                <option value="opel">Permanent</option>
                            </select>
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">EXEMPTIONS <span class="redColor">*</span> </label>
                            <select name="cars" id="cars" class=" dropdown11">
                                <option selected> --- Select Exemptions --- </option>
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

                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable" class="redColor">SELECT YOUR PREFERRED CURRENCY <span class="redColor">*</span> </label>
                            <input type="text" id="fname" name="fname" placeholder="$(USD)" class="w-100 p-2  textInputFontSize">
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
                            <label for="pay_start" class="lable">PAY START<span class="redColor">*</span> </label>
                            <input type="date" id="pay_start" name="pay_start" placeholder="12-11-2022" class="w-100 p-2 textInputFontSize pay_start" data-id="pay_start">
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="pay_end" class="lable">PAY END <span class="redColor">*</span> </label>
                            <input type="date" id="pay_end" name="pay_end" placeholder="12-17-2022" class="w-100 p-2 textInputFontSize pay_end" data-id="pay_end">
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="pay_date" class="lable">PAY DATE <span class="redColor">*</span> </label>
                            <input type="date" id="pay_date" name="pay_date" placeholder="12-19-2022" class="w-100 p-2 textInputFontSize pay_date" data-id="pay_date">
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
                            <input class="earnbtn text-center" type="text" value="Regular" id="earning_0" data-id="0" required>
                        </div>

                        <div class="col-md-2 ">
                            <input type="number" step="0.01" class="earnbtn text-center calculation" value="" id="rate_0" data-id="0" required>
                        </div>

                        <div class="col-md-2 ">
                            <input type="number" step="0.01" class="earnbtn text-center hours calculation" value="" id="hours_0" data-id="0" required>
                        </div>

                        <div class="col-md-2">
                            <input type="number" step="0.01" class="earnbtn text-center" value="" id="total_0" data-id="0" required>
                        </div>

                        <div class="col-md-2">
                            <input type="number" step="0.01" class="earnbtn text-center gross_total" value="" id="period_0" data-id="0" required>
                        </div>

                        <div class="col-md-2">
                            <input type="number" step="0.01" class="earnbtn text-center ytd_total" value="" id="ytd_total_0" data-id="0" required>
                        </div>
                    </div>
                    <div class="field_wrapper"> </div>

                    <div class="row mb-3">
                        <div class="col-md-2 mt-2 mb-5">
                            <button class="add_button earnbtn"><i class="fa fa-plus-circle pr-2" style="font-size:24px;color:green"></i>Add Earning</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <button class="createbtn ">DEDUCTIONS</button>
                        </div>
                    </div>

                    @foreach ($dedutions as $key => $item)
                    <div class="row mb-3 mt-4">
                        <div class="col-md-4 col-lg-3">
                            <i class="fa fa-lock earnbtn2"></i>
                            <input class="earnbtn text-center tax_{{$key+1}}" value="{{$item->title}}">
                        </div>
                        <div class="col-md-1 col-lg-1"></div>
                        <div class="col-md-2 col-lg-3"></div>
                        <div class="col-md-1 col-lg-1"></div>
                        <div class="col-md-2 col-lg-2">
                            <input type="number" step="0.01" class="earnbtn text-center" value="" />
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <input type="number" step="0.01" class="earnbtn text-center" value="" />
                        </div>
                    </div>
                    @endforeach
                    <div id="add_deduction" class="my-3">
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4 col-lg-3">
                            <button class="add_deduction earnbtn"><i class="fa fa-plus-circle pr-5" style="font-size:24px;color:green"></i>Add Deduction</button>
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
                            <input type="number" step="0.01" class="earnbtn deduction_tax text-center" value="" />
                        </div>
                        <div class="col-md-2">
                            <input type="number" step="0.01" class="earnbtn ytd_deduction_tax text-center" value="" />
                        </div>
                    </div>
                    <div class="row mb-3 mt-5">
                        <div class="col-md-4 col-lg-3">
                            <button class="netpaybtn">Net Pay</button>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2 col-lg-3"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <p class="p-0 m-0 text-center" style="font-family: serif;">Net Pay</p>
                            <input class="earnbtn text-center" value="">
                        </div>
                        <div class="col-md-2">
                            <p class="p-0 m-0 text-center" style="font-family: serif;">YTD Net pay</p>
                            <input class="earnbtn text-center" value="">
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
    <div class="mb-4 d-flex" style="justify-content: space-between;">
        <div class="text-left mt-1">
            <button class="previewbtn text-capitalize">Preview Your Paystub <i class="fa fa-eye" style="font-size: 30px; margin-left: 7px;"></i></button>
        </div>
        <div class="text-right mt-1">
            <button class="emailbtn text-capitalize" data-toggle="modal" data-target="#myModal"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.time_period').change(function() {
            dayCalculate();
        });
        $('.pay_start').change(function() {
            dayCalculate();
        });

        function dayCalculate() {
            var pay_start = $(".pay_start").val();
            var time_period = $(".time_period").val();
            var dt1 = new Date(pay_start);
            var month = dt1.getMonth() + 1;

            if (time_period == "weekly") {
                var day = dt1.getDate() + 6;
            }
            if (time_period == "bi-weekly") {
                var day = dt1.getDate() + 13;
            }
            if (time_period == "monthly") {
                var day = dt1.getDate() + 29;
            }
            if (time_period == "bi-monthly") {
                var day = dt1.getDate() + 61;
            }
            var output = dt1.getFullYear() + '-' + (('' + month).length < 2 ? '0' : '') + month + '-' + (('' + day).length < 2 ? '0' : '') + day;
            setTimeout(() => {
                $(".pay_end").val(output)
            }, 400);
        }

        $('.date_select').click(function() {
            var pay_start = $(".pay_start").val();
            var pay_end = $(".pay_end").val();

            if ((pay_start == "") || (pay_end == "")) {
                alert("Please enter two dates");
                return false
            }
            var dt1 = new Date(pay_start);
            var dt2 = new Date(pay_end);

            var mBetween = dt2.getTime() - dt1.getTime();
            var days = (mBetween / (1000 * 3600 * 24));
            var hour = ((days - 1) * 8);
            var result = Math.round(Math.abs(hour));
            $('.hours').val(result);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 12;
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var x = 1;
        var i = 1;

        $(addButton).click(function() {
            var fieldHTML =
                '<div class="row mb-3">' +
                '<div class="col-md-2 ">' +
                '<input  id="earning_' + i + '" data-id="' + i + '" class="earnbtn text-center" value="">' +
                '</div>' +
                '<div class="col-md-2 ">' +
                '<input type="number" step="0.01" id="rate_' + i + '" data-id="' + i + '" class="earnbtn calculation text-center" value="">' +
                '</div>' +
                '<div class="col-md-2 ">' +
                '<input type="number" step="0.01" id="hours_' + i + '" data-id="' + i + '" class="earnbtn calculation text-center hours" value="">' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="number" step="0.01" id="total_' + i + '" data-id="' + i + '" class="earnbtn text-center" value="">' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="number" step="0.01" id="period_' + i + '" data-id="' + i + '" class="earnbtn gross_total text-center" value="">' +
                '</div>' +
                '<div class="col-md-2 ">' +
                '<input type="number" step="0.01" id="ytd_total_' + i + '" data-id="' + i + '" class="earnbtn ytd_total text-center" value="">' +
                '</div>' +
                '</div>';
            if (x < maxField) {
                x++;
                $(wrapper).append(fieldHTML);
            }
            i++;
            $('.calculation').keyup(function() {
                var id = $(this).data('id');
                calculation(id);
            });
        });

        $('.calculation').keyup(function() {
            var id = $(this).data('id');
            calculation(id);
        });

        function calculation(id) {
            var rate = parseFloat($('#rate_' + id).val()).toFixed(2);
            var hours = parseFloat($('#hours_' + id).val()).toFixed(2);
            var total = rate * hours;
            var ytd_total = total * 52;
            $('#total_' + id).val(total);
            $('#period_' + id).val(total);
            $('#ytd_total_' + id).val(ytd_total);
            gross_total();
            // ytd_total();
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
        }
    });
</script>

<script>
    $(document).ready(function() {
        var maxField = 12;
        var addDeduction = $('.add_deduction');
        var wrapper = $('#add_deduction');
        var x = 1;
        var i = 1;
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
                '<input type="number" step="0.01" class="earnbtn text-center tax_deduction tax" value=""/>' +
                '</div>' +
                '<div class="col-md-2">' +
                '<input type="number" step="0.01" class="earnbtn text-center ytd_tax tax" value=""/>' +
                '</div>' +
                '</div>';
            if (x < maxField) {
                x++;
                $(wrapper).append(fieldHTML);
            }
            $('.tax_deduction').keyup(function() {
                var total = 0;
                $('.tax_deduction').each(function() {
                    total += parseFloat(this.value);
                });
                $(".deduction_tax").val(total);
            });

            $('.ytd_tax').keyup(function() {
                var ytd_tax = 0;
                $('.ytd_tax').each(function() {
                    ytd_tax += parseFloat(this.value);
                });
                $(".ytd_deduction_tax").val(ytd_tax);
            });
        });
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

@endsection