`@extends('layouts.app')
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
<!-- Modal End -->
<div class="container" style="max-width:1450px;">
    <form id="usa_paystubx" action="{{ route('uk.templates') }}" method="post" data-action="{{ route('usaStoreData') }}">
    <div >
        <h5>Choose Template</h5>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="col-md-5 col-sm-12 m-auto  text-center" style="padding: -1px 35px;">
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
                                <div class="input-group mmenu mb-3" style="margin: auto;">
                                    <select name="advance_temp" class="form-control text-center dropdown1 at_id small-font advanceTemplate" style="margin-right:10px; font-size:18px;">
                                        <option value=""> --- Select Advance Templates --- </option>
                                        @foreach ($advanceType as $data)
                                        @if($data->state == 'uk' && $data->type == 'advance')
                                        <option value="{{$data->title ?? ''}}" data-src="{{$data->images->file ?? ''}}"> {{$data->name}} </option>
                                        @endif
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
        <h5>Company Info</h5>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">
                    <div class="row mb-3">
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
        <div class="mb- d-flex" style="justify-content: space-between;">
            <h5>Employee info</h5>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">
                    <div class="row mb-3">
                        <div class="col-md-6 mt-4">
                            <label for="emp_name" class="lable">EMPLOYEE NAME <span style="color:red;">*</span></label>
                            <input type="text" id="emp_name" name="emp_name" placeholder="Your Full  Name" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="emp_zip_code" class="lable">POST CODE <span style="color:red;">*</span></label>
                            <input type="number" id="emp_zip_code" name="emp_zip_code" placeholder="1224" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 mt-4">
                            <label for="emp_street_1" class="lable">EMPLOYER ADDRESS 1 <span style="color:red;">*</span></label>
                            <input type="text" id="emp_street_1" name="emp_street_1" placeholder="5 Throgmorton St,London" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="emp_street_2" class="lable">STREET ADDRESS 2 <span style="color:red;">*</span></label>
                            <input type="text" id="emp_street_2" name="emp_street_2" placeholder="5 Throgmorton St,London" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>
                    </div>
                    <h5 class="mt-5 mb-2">EARNINGS STATEMENT</h5>
                    <div class="row mb-3">
                        <div class="col-md-4 ">
                            <label for="pay_start" class="lable">PAY START <span style="color:red;">*</span></label>
                            <input type="date" id="pay_start" name="pay_start" placeholder="2-20-2023" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>

                        <div class="col-md-4 ">
                            <label for="pay_date" class="lable text-center"> PAY DATE <span style="color:red;">*</span></label>
                            <input type="date" id="pay_date" name="pay_date" placeholder="12-12-2023" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>
                        <div class="col-md-4 ">
                            <label for="pay_end" class="lable">PAY END <span style="color:red;">*</span></label>
                            <input type="date" id="pay_end" name="pay_end" placeholder="2-20-2023" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-lg-2 col-md-4 mt-4">
                            <label for="fname" class="lable">Pay Type <span style="color:red;">*</span></label>
                            <input type="text" id="fname1" name="fname" placeholder="2-20-2023" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>

                        <div class="col-lg-2 col-md-4 mt-4">
                            <label for="fname" class="lable text-center"> Payment method
                                <span style="color:red;">*</span></label>
                            <input type="text" id="fname" name="fname" placeholder="12-12-2023" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>
                        <div class="col-lg-2 col-md-4 mt-4">
                            <label for="fname" class="lable">Tax Code <span style="color:red;">*</span></label>
                            <input type="text" id="fname" name="fname" placeholder="2-20-2023" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>
                        <div class="col-lg-2 col-md-4 mt-4">
                            <label for="fname" class="lable">NI Number <span style="color:red;">*</span></label>
                            <input type="text" id="fname" name="fname" placeholder="2-20-2023" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>
                        <div class="col-lg-2 col-md-4 mt-4">
                            <label for="fname" class="lable">NI Table Lette <span style="color:red;">*</span></label>
                            <input type="text" id="fname" name="fname" placeholder="2-20-2023" class="w-100 p-2 text-center" style="font-size:14px;">
                        </div>
                        <div class="col-lg-2 col-md-4 mt-2">
                            <p class="text-center mb-0 ukpaystubtext">How do you get paid<span style="color:red;">*</span> </p>
                            <div class="text-center mt-2  d-flex justifycenter ">
                                <button class="hourbtn mr-2">HOURLY</button>
                                <button class="salrybtn">SALARY</button>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-5">PAYMENTS</h5>
                    <div class="row ">
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
                    </div>
                    <div class="row ">
                        <div class="col-md-2 ">
                            <input type="text" id="fname1" name="fname" placeholder="Regular" class="w-100 p-2 mt-2 " style="font-size:14px;">
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="fname" name="fname" placeholder="25.00" class="w-100 p-2 mt-2" style="font-size:14px;">
                        </div>
                        <div class="col-md-2 mt-">
                            <input type="text" id="fname" name="fname" placeholder="50" class="w-100 p-2 mt-2 r" style="font-size:14px;">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-2 col-md-4 mt-2 mb-5">
                            <button class="earnbtn"><i class="fa fa-plus-circle pr-2" style="font-size:24px;color:green"></i>Add Earning</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Deductions</h5>
                            <div class="row mb-3 ">
                                <div class="col-md-6">
                                    <i class="fa fa-lock earnbtn2"></i>
                                    <input class="earnbtn text-center" type="text" value="FICA Medicare">
                                </div>
                                <div class="col-md-4 ">
                                    <input class="earnbtn text-center" value="556.80"></input>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <i class="fa fa-lock earnbtn2"></i>
                                    <input class="earnbtn text-center" type="text" value="National Insurence">
                                </div>

                                <div class="col-md-4 ">
                                    <input class="earnbtn text-center" value="556.80"></input>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="createbtn2 "> Total Deductions</button>
                                </div>
                                <div class="col-md-4">
                                    <input class="earnbtn text-center" value=" 7,247.29">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <h5>TOTAL YEAR TO DATE</h5>
                            <div class="row mb-3 ">
                                <div class="col-md-6">
                                    <i class="fa fa-lock earnbtn2"></i>
                                    <input class="earnbtn text-center" type="text" value="Taxable Gross Pay">
                                </div>
                                <div class="col-md-4 ">
                                    <input class="earnbtn text-center" value="1,309.90"></input>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <i class="fa fa-lock earnbtn2"></i>
                                    <input class="earnbtn text-center" type="text" value="Income Tax">
                                </div>
                                <div class="col-md-4 ">
                                    <input class="earnbtn text-center" value="1,058.94"></input>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <i class="fa fa-lock earnbtn2"></i>
                                    <input class="earnbtn text-center" type="text" value="Employee NIC">
                                </div>
                                <div class="col-md-4">
                                    <input class="earnbtn text-center" value="4,058.94">
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <i class="fa fa-lock earnbtn2"></i>
                                    <input class="earnbtn text-center" type="text" value="Employee NIC">
                                </div>
                                <div class="col-md-4">
                                    <input class="earnbtn text-center" value="  6,058.94">
                                    </input>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <input class="earnbtn text-center" value="NET PAY">
                                </div>
                                <div class="col-md-4">
                                    <button class="emailbtn2 text-center">6,058.94</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-4">Additional Information Here (Note)</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <textarea id="w3review" name="w3review" rows="4" cols="60" placeholder="Note Here (Optional)" class="p-2 textarea"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb- d-flex" style="justify-content: space-between;">
            <div class="text-left mt-1 ">
                <button class="previewbtn"> Preview Your Paystub <i class="fa fa-eye" style="font-size: 30px; margin-left: 7px;"></i></button>
            </div>
            <div class="text-right mt-1 mb-4 ">
                <button class="emailbtn" data-toggle="modal" data-target="#myModal"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
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
