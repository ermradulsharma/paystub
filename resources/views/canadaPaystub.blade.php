@extends('layouts.app')
@section('content')
    <!-- Modal Start -->
    <div class="modal fade" id="openEye" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header"style="position: relative; z-index:3;">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body watermark-bg">
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
                    <embed src="" type="" id="tempView" allowtransparency="false"
                        style="background-color : transparent;" frameborder="0" width="100%" height="800">
                    {{-- <iframe src="" id="tempView" allowtransparency="false" style="background-color : transparent;" frameborder="0" width="100%" height="800"></iframe> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="max-width: 1450px;">
        <form id="submit_form_paystubx_id" action="javascript:void()" method="get">
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
                                            <select name="basic_temp" id="basic_temp"
                                                class="form-control dropdown1 text-center bt_id small-font basicTemplate removeDiv"
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
                                                <select name="advance_temp"
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
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h5 class="box-h5">Company Info</h5>
                        <div class="box-usa">
                            <div class="row mb-3 mt-3">
                                <div class="col-md-6 mt-1">
                                    <div class="">
                                        <label for="cname" class="lable em-name">EMPLOYER (COMPANY) NAME <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="cname" name="cname"
                                            placeholder="Employer (Company) Name"
                                            class="input-c w-100  text-center input-box-font">
                                    </div>
                                </div>
                            </div>
                            <div id="map" hidden></div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div>
                                        <label for="address_1" class="lable">STREET ADDRESS 1 <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="address_1" name="address_1"
                                            placeholder="Street Address 1" class="w-100  input-box-font">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div>
                                        <label for="address_2" class="lable">STREET ADDRESS 2</label>
                                        <input type="text" id="address_2" name="address_2"
                                            placeholder="Street Address 2 (optional)" class="w-100  input-box-font">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div>
                                        <label for="city" class="lable">City <span class="redColor">*</span></label>
                                        <input type="text" id="city" name="city" placeholder="City"
                                            class="w-100  input-box-font">
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <label for="state" class="lable">Province <span class="redColor">*</span>
                                        </label>
                                        <div class="dropdown ">
                                            <select name="state" id="state" class="state dropdown11 tax_rate">
                                                <option value=""> --- Select State --- </option>
                                                @foreach ($stateTaxes as $stateTax)
                                                    <option value="{{ $stateTax->state }}"
                                                        data-tax="{{ $stateTax->rate }}">{{ $stateTax->state }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="d-none text-center error redColor">Please Select State</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <label for="zip_code" class="lable">Postal Code <span
                                                class="redColor">*</span></label>
                                        <input type="text" id="zip_code" name="zip_code" placeholder="Zip Code"
                                            class="w-100  input-box-font">
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
                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="emp_id" class="lable">EMPLOYEE ID <span
                                                class="redColor">*</span></label>
                                        <input type="text" id="emp_id" name="emp_id" placeholder="Employee Id"
                                            class="w-100  input-box-font">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div class="row">
                                        <div class="col-6 px-0">
                                            <div>
                                                <label for="pay_start" class="lable">PAY START <span
                                                        class="redColor">*</span></label>
                                                <input
                                                    style="color:#140303f5;border:1px solid #110303fe;padding:0px 6px !important; height:40px; appearance: none;"
                                                    type="text" id="pay_start" name="pay_start"
                                                    placeholder="MM/DD/YYYY"
                                                    class="w-100 p-2 input-box-font removeDiv pay_start datepicker inputdatepicker"
                                                    data-id="pay_start" value="<?php echo date('m/d/Y'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-6 px-0">
                                            <div>
                                                <label for="pay_end" class="lable"> <span
                                                        class="redColor"></span></label>
                                                <input
                                                    style="color:#140303f5;border:1px solid #110303fe; padding:0px 6px !important; height:40px; appearance: none;"
                                                    type="text" id="pay_end" name="pay_end"
                                                    placeholder="MM/DD/YYYY"
                                                    class="w-100 p-2 input-box-font removeDiv pay_end datepicker inputdatepicker"
                                                    data-id="pay_end" value="<?php echo date('m/d/Y'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="pay_date" class="lable">PAY DATE <span
                                                class="redColor">*</span></label>
                                        <input
                                            style="color:#140303f5;padding:0px 6px !important; height:40px; appearance: none; border:1px solid #110303fe;"
                                            type="text" id="pay_date" name="pay_date" placeholder="MM/DD/YYYY"
                                            class="w-100 p-2 input-box-font removeDiv pay_date datepicker inputdatepicker"
                                            data-id="pay_date" value="<?php echo date('m/d/Y'); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="check_number" class="lable">CHECK NUMBER <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="check_number" name="check_number"
                                            placeholder="Check Number" class="w-100  removeDiv input-box-font">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 mt-4">
                                    <div>
                                        <label for="currency" class="lable" class="redColor">CURRENCY <span
                                                class="redColor">*</span> </label>
                                        <select name="currency" id="currency" class="dropdown11 removeDiv">
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency->symbol }}">{{ $currency->symbol }}
                                                    ({{ $currency->name }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="emp_name" class="lable">EMPLOYEE NAME <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="emp_name" name="emp_name" placeholder="Employee name"
                                            class="w-100  input-box-font removeDiv">
                                    </div>

                                </div>
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="emp_address" class="lable">EMPLOYEE ADDRESS <span
                                                class="redColor">*</span> </label>
                                        <input type="text" id="emp_address" name="emp_address"
                                            placeholder="Employee Address" class="w-100 removeDiv input-box-font">
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
                                            <input class="earnbtn mt-3 text-center incomeKey" data-id="000"
                                                name="earning[]" type="text" value="Regular">
                                        </div>
                                        <div class="col-lg-3 col-md-3 mb-3 pr-lg-0 addrateKey">
                                            <button type="button" class="statementbtn">RATE</button>
                                            <input class="earnbtn mt-3 text-center rateKey" type="number" id="rate_000"
                                                name="rate[]" type="text" value="">
                                        </div>
                                        <div class="col-lg-3 col-md-3 mb-3 pr-lg-0 addhoursKey">
                                            <button type="button" class="statementbtn">HOURS</button>
                                            <input class="earnbtn mt-3 text-center hoursKey" type="number"
                                                id="hours_000" name="hours[]" type="text" value="">
                                        </div>
                                        <div class="col-lg-3 col-md-3 mb-3 pr-lg-0 addcurrentTotal">
                                            <button type="button" class="statementbtn"> CURRENT TOTAL</button>
                                            <input class="earnbtn mt-3 text-center currentTotal" readonly id="total_000"
                                                name="total[]" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-lg-12 center-btn">
                                            <button type="button" class="btnCommon addEarningField"> <i
                                                    class="fa fa-plus-circle pr-2"
                                                    style="font-size: 22px;color: #0ec23b;padding-top: 0px;"></i>Add
                                                Earning</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 pl-0">
                                    <div class="row">
                                        <div class="col-lg-4 mb-4 col-md-4 pr-0 addtaxes">
                                            <button type="button" class="statementbtn">DEDUCTION</button>
                                            @foreach ($deduction as $key => $item)
                                                <div class="d-flex mt-3">
                                                    <img src="{{ asset('images/lock.png') }}" class="earnbtn3">
                                                    <input class="earnbtn text-center taxes" name="taxes[]"
                                                        data-id="00{{ $key }}" data-value="{{ $item->price }}"
                                                        value="{{ $item->title }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4 mb-4 col-md-4 pr-0 addtaxes_rate">
                                            <button type="button" class="statementbtn">CURRENT TOTAL</button>
                                            @foreach ($deduction as $key => $item)
                                                <input class="earnbtn text-center mt-3" readonly name="taxes_rate[]"
                                                    id="tax_total_00{{ $key }}">
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4 mb-4 col-md-4 pr-0 addtaxes_ytd">
                                            <button type="button" class="statementbtn">YTD TOTAL</button>
                                            @foreach ($deduction as $key => $item)
                                                <input class="earnbtn text-center mt-3" readonly name="taxes_ytd[]"
                                                    id="tax_ytd_00{{ $key }}">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-lg-12 center-btn">
                                            <button type="button" class="btnCommon addTaxField">
                                                <i class="fa fa-plus-circle pr-2"
                                                    style="font-size: 22px;color: #0ec23b;padding-top: 0px;"></i>Add
                                                Deductions</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 mt-4 mt-lg-5">
                                <div class="col-lg-2 col-md-2 pr-md-0 mb-2">
                                    <button type="button" class="statementbtn">YTD GROSS</button>
                                    <input class="earnbtn text-center mt-3" id="ytd_gross" name="ytd_gross_total">
                                </div>
                                <div class="col-lg-2 col-md-2 pr-md-0 mb-2">
                                    <button type="button" class="statementbtn">YTD DEDUCATIONS</button>
                                    <input class="earnbtn text-center mt-3" id="ytd_deducations"
                                        name="ytd_deduction_tax">
                                </div>
                                <div class="col-lg-2 col-md-2 pr-md-0 mb-2">
                                    <button type="button" class="statementbtn">YTD NET PAY</button>
                                    <input class="earnbtn text-center mt-3" id="ytd_net_pay" name="total_ytd_net_pay">
                                </div>
                                <div class="col-lg-2 col-md-2 pr-md-0 mb-2">
                                    <button type="button" class="statementbtn">CURRENT TOTAL</button>
                                    <input class="earnbtn text-center mt-3" id="current_total" name="period_gross_total">
                                </div>
                                <div class="col-lg-2 col-md-2 pr-md-0 mb-2">
                                    <button type="button" class="statementbtn">DEDUCTIONS</button>
                                    <input class="earnbtn text-center mt-3" id="deductions" name="deduction_tax">
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2">
                                    <button type="button" class="statementbtn">NET PAY</button>
                                    <input class="earnbtn text-center mt-3" id="net_pay" name="total_net_pay">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center canada-btn-outer">
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
            <!-- hidden values -->
            <input type="hidden" name="days_number" hidden id="days_number">
            <!-- //hidden values -->
        </form>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>

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
                    country: "CA"
                }
            });


            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();
                if (near_place && near_place.address_components.length > 0) {
                    var obj = [];
                    for (var i = 0; i < near_place.address_components.length; i++) {
                        for (var j = 0; j < near_place.address_components[i].types.length; j++) {
                            obj[near_place.address_components[i].types[j]] = near_place.address_components[
                                i].long_name;
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
            if (obj.neighborhood != undefined) {
                $("#address_2").val(obj.neighborhood);
                $('#address_2').css('border-color', 'gray');
                $('.0_address_2').remove();
            } else {
                $("#address_2").val('');
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
                types: ['geocode'],
                componentRestrictions: {
                    country: "CA"
                }
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();
                if (near_place && near_place.address_components.length > 0) {
                    var obj = [];
                    for (var i = 0; i < near_place.address_components.length; i++) {
                        for (var j = 0; j < near_place.address_components[i].types.length; j++) {
                            obj[near_place.address_components[i].types[j]] = near_place.address_components[
                                i].long_name;
                        }
                    }
                    setEmpLocation(obj);
                }
            });
        });

        function setEmpLocation(obj) {
            /* console.log('obj', obj);
            $("#emp_address").val(obj);
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
                $("#emp_street_1").val(obj.street_number + ', ' + obj.route);
                $('#emp_street_1').css('border-color', 'gray');
                $('.0_emp_street_1').remove();
            }

            if (obj.neighborhood != undefined) {
                $("#emp_street_2").val(obj.neighborhood);
                $('#emp_street_2').css('border-color', 'gray');
                $(".0_emp_street_2").remove();
            } else {
                $("#emp_street_2").val('');
            }
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
            } */
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

    <script src="{{ asset('user') }}/js/canada.js"></script>
@endsection
