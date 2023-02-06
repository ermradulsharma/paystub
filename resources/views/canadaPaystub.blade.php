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
<div class="container" style="max-width:1450px;">
    <form id="usa_paystubx" action="{{ route('canada.templates') }}" method="post">
        @csrf
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
                                    <div class="input-group mmenu mb-3">
                                        <select class="form-control dropdown1 bt_id" style="border-right:none">
                                            <option selected=""> --- Select Basic Templates --- </option>
                                            @foreach ($basicType as $data)
                                            @if($data->state == 'canada' && $data->type == 'basic')
                                            <option value="{{$data->title}}" data-src="{{$data->images->file}}">{{$data->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <i class="fa fa-eye-slash basicTem flash-icon" data-target="#openEye" data-toggle="modal"></i>
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
                                        <select class="form-control dropdown1 at_id" style="border-right:none">
                                            <option selected=""> --- Select Advance Template --- </option>
                                            @foreach ($advanceType as $data)
                                            @if($data->state == 'canada' && $data->type == 'advance')
                                            <option value="{{$data->title}}" data-src="{{$data->images->file}}">{{$data->title}}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <i class="fa fa-eye-slash advanceTem flash-icon" data-target="#openEye" data-toggle="modal"></i>
                                    </div>
                                </div>
                                <div class=" mt-3 ">
                                    <button class="viewbtn">
                                        <a href="{{url('template-view')}}">Click to see Template Landscape view.This is not
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
                    <h5>Company Info</h5>
                    <div class=" box-usa">
                        <div class="row mb-3 ">
                            <div class="col-md-6 mt-1">
                                <div>
                                    <label for="cname" class="lable">EMPLOYER (COMPANY) NAME <span class="redColor">*</span>
                                    </label>
                                    <input type="text" id="cname" name="cname" placeholder="Your Employer & Company Name" class="w-100 p-2 text-center textInputFontSize">
                                </div>
                            </div>
                        </div>
                        <div id="map" hidden></div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label for="address_1" class="lable">STREET ADDRESS 1 <span class="redColor">*</span>
                                    </label>
                                    <input type="text" id="address_1" name="address_1" placeholder="Your Employer Address" class="w-100 p-2  textInputFontSize">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label for="address_2" class="lable">STREET ADDRESS 2 <span class="redColor">*</span>
                                    </label>
                                    <input type="text" id="address_2" name="address_2" placeholder="Suite 101 or Apt 101 (optional)" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div>
                                    <label for="city" class="lable">City <span class="redColor">*</span> </label>
                                    <input type="text" id="city" name="city" placeholder="Your Employer City" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label for="state" class="lable">Province <span class="redColor">*</span> </label>
                                    <div class="dropdown ">
                                        <select name="state" id="state" class="state dropdown11">
                                            <option value=""> --- Select --- </option>
                                            @foreach ($stateTaxes as $stateTax)
                                            <option value="{{ $stateTax->state }}">{{ $stateTax->state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label for="zip_code" class="lable">Postal Code <span class="redColor">*</span>
                                    </label>
                                    <input type="text" id="zip_code" name="zip_code" placeholder=" Zip Code" class="w-100 p-2  textInputFontSize">
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
                <div class="col-md-12">
                    <div class=" box-usa">
                        <div class="row mb-3">
                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="emp_name" class="lable">EMPLOYEE ID <span class="redColor">*</span> </label>
                                    <input type="text" id="emp_name" name="emp_name" placeholder="Your Full  Name" class="w-100 p-2  textInputFontSize">
                                </div>
                            </div>

                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="emp_id" class="lable">PAY START <span class="redColor">*</span>
                                    </label>
                                    <input type="text" id="emp_id" name="emp_id" placeholder="Employer ID" class="w-100 p-2 r textInputFontSize">
                                </div>

                            </div>
                            <div class="col-md-4 mt-4">
                                <div>
                                    <label for="emp_ssn" class="lable">PAY DATE <span class="redColor">*</span> </label>
                                    <input type="text" id="emp_ssn" name="emp_ssn" placeholder="1224" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div>
                                    <label for="emp_city" class="lable">CHECK NUMBER <span class="redColor">*</span>
                                    </label>
                                    <input type="text" id="emp_city" name="emp_city" placeholder="Your City" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label for="currency" class="lable" class="redColor">SELECT YOUR PREFERRED CURRENCY <span class="redColor">*</span> </label>
                                    <select name="currency" id="currency" class=" dropdown11">
                                        <option value=""> --- Select currency --- </option>
                                        <option value="$">Dollar $</option>
                                        <option value="€">Euro €</option>
                                        <option value="£">Pound £</option>
                                        <option value="¥">Yen ¥</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label for="emp_zip_code" class="lable">EMPLOYER NAME <span class="redColor">*</span>
                                    </label>
                                    <input type="text" id="emp_zip_code" name="emp_zip_code" placeholder=" 1234" class="w-100 p-2  textInputFontSize">
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label for="emp_street_2" class="lable">EMPLOYER ADDRESS <span class="redColor">*</span>
                                    </label>
                                    <input type="text" id="emp_street_2" name="emp_street_2" placeholder="Suite 101 or Apt 101(optional)" class="w-100 p-2  textInputFontSize">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="mb- d-flex " style="justify-content: space-between;">
                <h5>Earning statement</h5>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">
                        <div class="row mb-3 pt-4">
                            <div class="col-lg-1 col-md-6 mb-2 pr-0">
                                <button CLASS="statementbtn">INCOME</button>
                            </div>
                            <div class="col-lg-1 col-md-6 mb-2 pr-0">
                                <button CLASS="statementbtn">RATE</button>
                            </div>
                            <div class="col-lg-2 col-md-6 mb-2 pr-0">
                                <button CLASS="statementbtn">HOURS</button>
                            </div>
                            <div class="col-lg-2 col-md-6 mb-2 pr-0">
                                <button CLASS="statementbtn"> CURRENT TOTAL</button>
                            </div>
                            <div class="col-lg-2  col-md-6 mb-2 pr-0">
                                <button CLASS="statementbtn">DEDUCTION</button>
                            </div>
                            <div class="col-lg-2 col-md-6 mb-2 pr-0">
                                <button CLASS="statementbtn">CURRENT TOTAL</button>
                            </div>
                            <div class="col-lg-2 col-md-6 mb-2 pr-0">
                                <button CLASS="statementbtn">YTD TOTAL</button>
                            </div>
                        </div>

                        <div class="row mb-3 mt-2">
                            <div class="col-lg-6 ">
                                <div class=" m-auto d-inline-flex">
                                    <div class="col-lg-2 mt-2 p-0 bg-danger">
                                        <input class="earnbtn text-center " type="text" value="Regular">
                                    </div>
                                    <div class="col-lg-2 mt-2 ">
                                        <input class="earnbtn text-center " type="text" value="67.09">
                                    </div>

                                    <div class="col-lg-4 mt-2 pr-0">
                                        <input class="earnbtn text-center " type="text" value="455.90">
                                    </div>
                                    <div class="col-lg-4 mt-2 p-0">
                                        <input class="earnbtn text-center ml-3 " type="text" value="455.90">
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3 p-0">
                                    <button class="earnbtn1"><i class="fa fa-plus-circle pr-2" style="font-size: 24px;color: #0ec23b;padding-top: 0px;"></i>Add Earning</button>
                                </div>

                            </div>

                            <div class="col-lg-6 p-0 ">
                                @foreach ($dedutions as $item)
                                <div class="d-inline-flex m-auto ">
                                    <div class="col-lg-4 mt-2 ml-2 p-0">
                                        <div class="d-flex">
                                            <div class="col-lg-1">
                                                <img src="http://127.0.0.1:8000/images/lock.png" class="earnbtn2">
                                            </div>
                                            <div class="col-lg-11">
                                                <input class="earnbtn text-center taxes" name="taxes[]" data-id="0" data-value="1.46" value="FICA - Medicare">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mt-2 p-0 ml-3">
                                        <input class="earnbtn text-center " value="">
                                        </input>
                                    </div>

                                    <div class="col-lg-4 mt-2 p-0 ml-3">
                                        <input class="earnbtn text-center " value="">
                                        </input>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-3 align-item-start">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-3"></div>
                            <div class=" col-lg-3 mt-1 ">
                                <button class="earnbtn1"><i class="fa fa-plus-circle pr-2" style="font-size: 24px; color: #0ec23b; padding-top: 0px;"></i>Add Deductions</button>
                            </div>
                        </div>
                        <div class="row mb-3 mt-5">
                            <div class="col-lg-2 col-md-6 mb-2">
                                <button CLASS="statementbtn">YTD GROSS</button>
                            </div>
                            <div class="col-lg-2 col-md-6 mb-2">

                                <button CLASS="statementbtn">YTD EDUCATIONS</button>
                            </div>
                            <div class="col-lg-2 col-md-6 mb-2">

                                <button CLASS="statementbtn">YTD NET PAY</button>
                            </div>
                            <div class="col-lg-2 col-md-6 mb-2">

                                <button CLASS="statementbtn">CURRENT TOTAL</button>
                            </div>
                            <div class="col-lg-2 col-md-6 mb-2">

                                <button CLASS="statementbtn">DEDUCTIONS</button>
                            </div>
                            <div class="col-lg-2 col-md-6 mb-2">

                                <button CLASS="statementbtn">NET PAY</button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <input CLASS="earnbtn text-center" value="00.00">
                            </div>
                            <div class="col-md-2">
                                <input CLASS="earnbtn text-center" value="00.00">
                            </div>
                            <div class="col-md-2">
                                <input CLASS="earnbtn text-center" value="00.00">
                            </div>
                            <div class="col-md-2">
                                <input CLASS="earnbtn text-center" value="00.00">
                            </div>
                            <div class="col-md-2">
                                <input CLASS="earnbtn text-center" value="00.00">
                            </div>
                            <div class="col-md-2">
                                <input CLASS="earnbtn text-center" value="00.00">
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
                            <button class="previewbtn text-capitalize viewTempTemplate"> Preview Your Paystub <i class="fa fa-eye" style="font-size: 30px; margin-left: 7px;"></i></button>
                        </div>
                        <div class="text-right mt-1 ">
                            <button class="emailbtn " data-toggle="modal" data-target="#myModal"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('user') }}/js/calculations.js"></script>
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
