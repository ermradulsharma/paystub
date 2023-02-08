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
    <div class="container" style="max-width: 1450px;">
        <form id="submit_form_paystubx_id" action="javascript:void()" method="get">
            @csrf
            <input type="hidden" name="form_type" value="canada" hidden>
            <div>
                <h5 class="box-h5">Choose Template</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class=" box-usa">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="col-md-5 col-sm-12 m-auto  text-center" style="padding: -1px 35px;">
                                    <h6 class="base">BASIC TEMPLATES</h6>
                                    <div class="mt-4">
                                        {{-- <i class="fa fa-angle-down down"></i> --}}
                                        <div class="input-group mmenu mb-3">
                                            <select name="basic_temp"
                                                class="form-control dropdown1 text-center bt_id small-font basicTemplate"
                                                style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Basic Templates --- </option>
                                                @foreach ($basicType as $data)
                                                    <option value="{{ $data->title }}"
                                                        data-src="{{ $data->images->file }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-eye-slash basicTem flash-icon" data-target="#openEye"
                                                data-toggle="modal"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2  text-center sh">
                                    <img src="images/hrpng.png" style="height: 200px;">
                                </div>

                                <div class="col-md-5 col-sm-12 mt-5 text-center">
                                    <h6 style="margin-left:-23px;font-weight: 900;" class="small">ADVANCED TEMPLATES</h6>
                                    <div class="mt-4">
                                        {{-- <i class="fa fa-angle-down down1"></i> --}}
                                        <div class="input-group mmenu mb-3" style="margin: auto;">
                                            <select name="advance_temp"
                                                class="form-control text-center dropdown1 at_id small-font advanceTemplate"
                                                style="margin-right:10px; font-size:18px;">
                                                <option value=""> --- Select Advance Template --- </option>
                                                @foreach ($advanceType as $data)
                                                    <option value="{{ $data->title }}"
                                                        data-src="{{ $data->images->file }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-eye-slash advanceTem flash-icon" data-target="#openEye"
                                                data-toggle="modal"></i>
                                        </div>
                                    </div>
                                    <div class=" mt-3 ">
                                        <button class="viewbtn">
                                            <a href="{{ url('template-view') }}">Click to see Template Landscape view.This
                                                is not
                                                part of design</a>
                                        </button>
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
                            <div class="row mb-3 ">
                                <div class="col-md-6 mt-1">
                                    <div>
                                        <label for="cname" class="lable">EMPLOYER (COMPANY) NAME <span
                                                class="redColor">*</span>
                                        </label>
                                        <input type="text" id="cname" name="cname"
                                            placeholder="Your Employer & Company Name"
                                            class="w-100 p-2 text-center textInputFontSize">
                                    </div>
                                </div>
                            </div>
                            <div id="map" hidden></div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <label for="address_1" class="lable">STREET ADDRESS 1 <span
                                                class="redColor">*</span>
                                        </label>
                                        <input type="text" id="address_1" name="address_1"
                                            placeholder="Your Employer Address" class="w-100 p-2  textInputFontSize">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <label for="address_2" class="lable">STREET ADDRESS 2 <span
                                                class="redColor">*</span>
                                        </label>
                                        <input type="text" id="address_2" name="address_2"
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
                                            placeholder="Your Employer City" class="w-100 p-2  textInputFontSize">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="state" class="lable">Province <span class="redColor">*</span>
                                        </label>
                                        <div class="dropdown ">
                                            <select name="state" id="emp_state" class="state dropdown11 tax_rate">
                                                <option value=""> --- Select --- </option>
                                                @foreach ($stateTaxes as $stateTax)
                                                    <option value="{{ $stateTax->state }}"
                                                        data-tax="{{ $stateTax->rate }}">{{ $stateTax->state }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="d-none text-center error redColor">Please Select State</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="zip_code" class="lable">Postal Code <span class="redColor">*</span>
                                        </label>
                                        <input type="text" id="zip_code" name="zip_code" placeholder=" Zip Code"
                                            class="w-100 p-2  textInputFontSize">
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
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="emp_id" class="lable">EMPLOYEE ID <span class="redColor">*</span>
                                        </label>
                                        <input type="text" id="emp_id" name="emp_id" placeholder="Employee id"
                                            class="w-100 p-2  textInputFontSize">
                                    </div>
                                </div>
                                <div class="basicpay">
                                    <div class="col-md-2 mt-4 pr-0">
                                        <div>
                                            <label for="pay_start" class="lable">PAY START <span
                                                    class="redColor">*</span></label>
                                            <input type="date" id="pay_start" name="pay_start"
                                                placeholder="12-11-2022"
                                                class="w-100 p-2 textInputFontSize pay_start datepicker"
                                                data-id="pay_start" style="border-right: none;">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-4 pl-0">
                                        <div>
                                            <label for="emp_id" class="lable"> <span class="redColor">*</span></label>
                                            <input type="date" id="pay_end" name="pay_end" placeholder=" "
                                                class="w-100 p-2 textInputFontSize pay_end" data-id="pay_end"
                                                style="border-left: none;" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <div>
                                        <label for="pay_date" class="lable">PAY DATE <span
                                                class="redColor">*</span></label>
                                        <input type="date" id="pay_date" name="pay_date" placeholder="12-19-2022"
                                            class="w-100 p-2 textInputFontSize pay_date" data-id="pay_date">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div>
                                        <label for="check_number" class="lable">CHECK NUMBER <span
                                                class="redColor">*</span>
                                        </label>
                                        <input type="text" id="check_number" name="check_number"
                                            placeholder="Check Number" class="w-100 p-2  textInputFontSize">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="currency" class="lable" class="redColor">SELECT YOUR PREFERRED
                                            CURRENCY <span class="redColor">*</span> </label>
                                        <select name="currency" id="currency" class=" dropdown11">
                                            <option value=""> --- Select currency --- </option>
                                            <option value="$">Dollar $</option>
                                            <option value="€">Euro €</option>
                                            <option value="£">Pound £</option>
                                            <option value="¥">Yen ¥</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div>
                                        <label for="emp_name" class="lable">EMPLOYER NAME <span
                                                class="redColor">*</span>
                                        </label>
                                        <input type="text" id="emp_name" name="emp_name" placeholder="Employee name"
                                            class="w-100 p-2  textInputFontSize">
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <label for="emp_address" class="lable">EMPLOYER ADDRESS <span
                                                class="redColor">*</span>
                                        </label>
                                        <input type="text" id="emp_address" name="emp_address"
                                            placeholder="Suite 101 or Apt 101(optional)"
                                            class="w-100 p-2  textInputFontSize">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="mb- d-flex " style="justify-content: space-between;">
                    <h5 class="box-h5">Earning statement</h5>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class=" box-usa">
                            <div class="row mb-3 pt-4">
                                <div class="col-lg-7">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 pr-0">
                                            <button type="button" CLASS="statementbtn">INCOME</button>
                                        </div>
                                        <div class="col-lg-2  col-md-2 pr-0">
                                            <button type="button" CLASS="statementbtn">RATE</button>
                                        </div>
                                        <div class="col-lg-4 col-md-4 pr-0">
                                            <button type="button" CLASS="statementbtn">HOURS</button>
                                        </div>
                                        <div class="col-lg-4 col-md-4 pr-0">
                                            <button type="button" CLASS="statementbtn"> CURRENT TOTAL</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2  col-md-2 mt-4 pr-0">
                                            <input class="earnbtn text-center incomeKey" data-id="000" name="earning[]"
                                                type="text" value="Regular">
                                        </div>
                                        <div class="col-lg-2 col-md-2 mt-4 pr-0">
                                            <input class="earnbtn text-center rateKey" type="number" id="rate_000"
                                                name="rate[]" type="text" value="">
                                        </div>
                                        <div class="col-lg-4 col-md-4 mt-4 pr-0">
                                            <input class="earnbtn text-center hoursKey" type="number" id="hours_000"
                                                name="hours[]" type="text" value="">
                                        </div>
                                        <div class="col-lg-4 col-md-4 mt-4 pr-0">
                                            <input class="earnbtn text-center" readonly id="total_000" name="total[]"
                                                type="text" value="">
                                        </div>
                                    </div>
                                    <div id="appendEarningField"></div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 mt-5">
                                            <button type="button" class="earnbtn1 py-2 w-100 addEarningField"
                                                style="font-size: 17px;font-weight: 600;">
                                                <i class="fa fa-plus-circle"
                                                    style="font-size: 22px;color: #0ec23b;padding-top: 0px;"></i>Add
                                                Earning</button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-5 ">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 pr-0">
                                            <button type="button" CLASS="statementbtn">DEDUCTION</button>
                                        </div>
                                        <div class="col-lg-4 col-md-4 pr-0">
                                            <button type="button" CLASS="statementbtn">CURRENT TOTAL</button>
                                        </div>
                                        <div class="col-lg-4 col-md-4 pr-0">
                                            <button type="button" CLASS="statementbtn">YTD TOTAL</button>
                                        </div>
                                    </div>
                                    @foreach ($dedutions as $key => $item)
                                        <div class="row">

                                            <div class="col-lg-4 px-0 mt-4 col-md-4">

                                                <div class="d-flex">
                                                    <img src="{{ asset('images/lock.png') }}" class="earnbtn3">
                                                    <input class="earnbtn text-center taxes" name="taxes[]"
                                                        data-id="00{{ $key }}" data-value="{{ $item->price }}"
                                                        value="{{ $item->title }}" data-value="{{ $item->title }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 pr-0 mt-4 col-md-4">
                                                <input class="earnbtn text-center" readonly name="taxes_rate[]"
                                                    id="tax_total_00{{ $key }}">
                                            </div>

                                            <div class="col-lg-4 pr-0 mt-4 col-md-4">
                                                <input class="earnbtn text-center" readonly name="taxes_ytd[]"
                                                    id="tax_ytd_00{{ $key }}">
                                            </div>
                                        </div>
                                    @endforeach
                                    <div id="appendTaxField"></div>
                                    <div class="row">
                                        <div class=" col-lg-4 col-md-4 mt-5  px-0">
                                            <button type="button" class="earnbtn addTaxField"
                                                style="font-size: 17px;font-weight: 600;"><i class="fa fa-plus-circle"
                                                    style="font-size: 22px;color: #0ec23b;padding-top: 0px;"></i>Add
                                                Deductions</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 mt-5">
                                <div class="col-lg-2 col-md-2 mb-2">
                                    <button type="button" CLASS="statementbtn">YTD GROSS</button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2">

                                    <button type="button" CLASS="statementbtn">YTD DEDUCATIONS</button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2">

                                    <button type="button" CLASS="statementbtn">YTD NET PAY</button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2">

                                    <button type="button" CLASS="statementbtn">CURRENT TOTAL</button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2">

                                    <button type="button" CLASS="statementbtn">DEDUCTIONS</button>
                                </div>
                                <div class="col-lg-2 col-md-2 mb-2">

                                    <button type="button" CLASS="statementbtn">NET PAY</button>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <input CLASS="earnbtn text-center" id="ytd_gross" name="ytd_gross_total">
                                </div>
                                <div class="col-md-2">
                                    <input CLASS="earnbtn text-center" id="ytd_deducations" name="ytd_deduction_tax">
                                </div>
                                <div class="col-md-2">
                                    <input CLASS="earnbtn text-center" id="ytd_net_pay" name="total_ytd_net_pay">
                                </div>
                                <div class="col-md-2">
                                    <input CLASS="earnbtn text-center" id="current_total" name="period_gross_total">
                                </div>
                                <div class="col-md-2">
                                    <input CLASS="earnbtn text-center" id="deductions" name="deduction_tax">
                                </div>
                                <div class="col-md-2">
                                    <input CLASS="earnbtn text-center" id="net_pay" name="total_net_pay">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="mb- d-flex" style="justify-content: space-between;">
                            <div class="text-left mt-1 ">
                                <button type="button" class="previewbtn viewTempTemplate">
                                    Preview Your Paystub <i class="fa fa-eye"
                                        style="font-size: 30px; margin-left: 7px;"></i></button>
                            </div>
                            <div class="text-right mt-1 ">
                                <button type="button" class="emailbtn sendMailButton" data-toggle="modal"
                                    data-target="#myModal"> <i class="fa fa-envelope mr-4"
                                        style="font-size:24px"></i>EMAIL
                                    PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- hidden values -->
    <input type="hidden" name="days_number" hidden id="days_number">
    <!-- //hidden values -->
    </form>
    </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('user') }}/js/canada.js"></script>
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
@endsection
