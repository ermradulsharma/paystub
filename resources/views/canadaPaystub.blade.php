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
<div>
    <div class="container" style="max-width:1450px;">
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
                                        <option value="{{$data->title}}" data-src="{{$data->images->file}}">
                                            {{$data->title}}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <i class="fa fa-eye-slash basicTem" data-target="#openEye" data-toggle="modal"
                                        style="font-size: 39px;"></i>
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
                                <div class="input-group mmenu mb-3" style="margin: auto;">
                                    <select class="form-control dropdown1 at_id" style="border-right:none">
                                        <option selected=""> --- Select Advance Template --- </option>
                                        @foreach ($advanceType as $data)
                                        @if($data->state == 'canada' && $data->type == 'advance')
                                        <option value="{{$data->title}}" data-src="{{$data->images->file}}">
                                            {{$data->title}}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <i class="fa fa-eye-slash advanceTem" data-target="#openEye" data-toggle="modal"
                                        style="font-size: 39px;"></i>
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







    <div class="container" style="max-width: 1450px;">
        <div class="mb- d-flex " style="justify-content: space-between;">
            <h5>Earning statement</h5>

        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <!-- <div class="row mb-3">
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">PAY START<spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2
                             text-center"
                                style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">PAY END <spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2
                             text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">PAY DATE<spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2
                             text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">HOW DO YOU GET PAID<spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2
                             text-center"
                                style="font-size:14px;"><br>
                            <div class="text-center mt-2">
                                <button CLASS="hourbtn">HOURLY</button> <button CLASS="salrybtn">SALARY</button>
                            </div>
                        </div>

                    </div> -->

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

                                <div class="col-lg-2 mt-2 p-0">
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
                        </div>

                        <div class="col-lg-6 p-0 ">
                            @foreach ($dedutions as $item)
                            <div class="d-inline-flex m-auto ">

                                <div class="col-lg-4 mt-2 ml-2 p-0">
                                    <i class="fa fa-lock earnbtn2"></i>
                                    <input class="earnbtn text-center " type="text" value="{{$item->title}}">
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

                        <div class="col-lg-3 mt-1">

                            <button class="earnbtn1"><i class="fa fa-plus-circle pr-2" style="font-size: 24px;
                           color: #0ec23b;padding-top: 0px;"></i>Add Earning</button>

                        </div>
                        <div class="col-lg-3"></div>

                        <div class=" col-md-3 mb-3 mt-1 ">
                            <button class="earnbtn1"><i class="fa fa-plus-circle pr-2" style="font-size: 24px;
                          color: #0ec23b;
                           padding-top: 0px;"></i>Add Deductions</button>
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
                            </input>
                        </div>
                        <div class="col-md-2">


                            <input CLASS="earnbtn text-center" value="00.00">
                            </input>
                        </div>
                        <div class="col-md-2">


                            <input CLASS="earnbtn text-center" value="00.00">
                            </input>
                        </div>
                        <div class="col-md-2">


                            <input CLASS="earnbtn text-center" value="00.00">
                            </input>
                        </div>
                        <div class="col-md-2">


                            <input CLASS="earnbtn text-center" value="00.00">
                            </input>
                        </div>
                        <div class="col-md-2">


                            <input CLASS="earnbtn text-center" value="00.00">
                            </input>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>




    <div class="container" style="max-width: 1450px;">

        <div class="row mb-3">
            <div class="col-md-12">

                <div class="mb- d-flex" style="justify-content: space-between;">



                    <div class="text-left mt-1 ">
                        <button class="previewbtn">
                            Preview Your Paystub <i class="fa fa-eye"
                                style="font-size: 30px; margin-left: 7px;"></i></button>
                    </div>
                    <div class="text-right mt-1 ">
                        <button class="emailbtn " data-toggle="modal" data-target="#myModal"> <i
                                class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL
                            PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
                    </div>
                </div>

            </div>
        </div>

    </div>





    <div class="container" style="max-width: 1450px;">

        <!-- Button to Open the Modal -->


        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" style="background: #115caecf;">
                        <h4 class="modal-title"><img src="images/Paystub X.webp" class="icon"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="google-btn mt-4">
                            <div class="google-icon-wrapper">
                                <img class="google-icon"
                                    src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                            </div>
                            <p class="btn-text"><b>Sign up with google</b></p>
                        </div>

                        <div class="text-center mt-4 mb-4">
                            <img src="images/Group 3.png" style="width:130px;">
                        </div>
                        <h6 class="text-center" style="color: #457bbe;">Sign Up Using Email</h6>
                        <p class="text-center">

                            <input type="email" id="email" name="email" class="singup" placeholder="Email *"> <br><br>

                            <button class="continue mt-3" data-toggle="modal" data-dismiss="modal"
                                data-target="#myModal1">Continue</button>
                            <a href="#" style="text-decoration: none;color: #0000007a">
                                <p class="text-center mt-3" style="color: #0000007a;font-size: 13px;">Already have
                                    account?
                                    <u style="color:red;">
                                        <spam style="color:red;">Sign In</spam>
                                    </u>
                                </p>
                            </a>
                    </div>
                    </p>

                    <!-- Modal footer -->
                    <div class="modal-footer" style="background: #457bbed9;">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    </div>

                </div>
            </div>
        </div>

    </div>



    <div class="container" style="max-width: 1450px;">



        <div class="modal fade" id="myModal1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" style="background: #115caecf;">
                        <h4 class="modal-title"><img src="images/Paystub X.webp" class="icon"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5 class="text-center">Verify your Email Address</h5>
                        <div class=" text-center mt-4">
                            <div class="mail">
                                <img src="images/email(3).png" class="mailpic">
                            </div>

                            <h5 style="color: #457bbe;" class="mt-4 text-center">Almost There!</h5>
                            <p style="color: #02030359;font-size: 14px;font-family: serif;" class="text-center">Enter
                                the
                                Verification code to sent</p>

                            <input type="email" id="email" name="email" class="singup1 text-center"
                                placeholder="ABC@paystub.com">
                            <div style="color: red;font-size: 13px; font-family: serif;">
                                <i class="fa fa-exclamation-circle">
                                    Verification code required
                                </i>
                            </div>
                            <p style="color: #0000004d; font-size: 11px;">Didn't receive an email</p>
                            <p style="color: #04050778;font-size: 12px; font-family: cursive;">Check Your Spam folder
                                <spam style="color:red;"> Or </spam>resend code
                            </p>
                            <button class="continue mt-3" data-toggle="modal" data-target="myModal">verify</button>
                        </div>







                    </div>
                    </p>

                    <!-- Modal footer -->
                    <div class="modal-footer" style="background: #457bbed9;">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
</div>

</div>













</div>

<script>
    $('.basicTem').click(function() {
      var imageattr = $('option:selected', '.bt_id').attr('data-src');
         $('.setImage').attr('src', imageattr);
    });

    $('.advanceTem').click(function() {
        var imageattr = $('option:selected', '.at_id').attr('data-src');
         $('.setImage').attr('src', imageattr);
    });


</script>
@endsection
