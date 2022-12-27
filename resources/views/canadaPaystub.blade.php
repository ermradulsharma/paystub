@extends('layouts.app')
@section('content')
<div>
    <div class="container" style="max-width: 1450px;">
        <h4>Choose Template</h4>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-3">
                        <div class="col-md-6 mt-4">
                            <h6>BASIC TEMPLATES</h6>
                            <div class="dropdown dropdown1">
                                <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown">Reddish
                                    Magenta
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu p-4">
                                    <li><a href="#">HTML</a></li>
                                    <li><a href="#">CSS</a></li>
                                    <li><a href="#">JavaScript</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6 mt-4">
                            <h6>ADVANCED TEMPLATES</h6>
                            <div class="dropdown dropdown1">
                                <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown">PT Pink
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu p-4">
                                    <li><a href="#">HTML</a></li>
                                    <li><a href="#">CSS</a></li>
                                    <li><a href="#">JavaScript</a></li>
                                </ul>
                            </div>
                            <div class="text-right mt-5 ">
                                <button class="viewbtn">Click to see Template Landscape view</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>
    <div class="container" style="max-width: 1450px;">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">
                    <h4>Company Info</h4>
                    <div class="row mb-3">
                        <div class="col-md-6 mt-4">
                            <label for="fname" class="lable">EMPLOYER (COMPANY) NAME *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 " style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="fname" class="lable">STREET ADDRESS 1 *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your address Employer"
                                class="w-100 p-2 " style="font-size:14px;"><br>
                        </div>

                    </div>

                    <div class="row mb-3">

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fname" class="lable">STREET ADDRESS 2 *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Suite 101 or apt 101 (Optional)"
                                class="w-100 p-2 " style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="fname" class="lable">City *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer City"
                                class="w-100 p-2 " style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">State*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Province" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">Postal Code *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="KIA OG9" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>







    <div class="container" style="max-width: 1450px;">
        <h4>Employee Info</h4>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-3">
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYER ID *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="employer Id"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">PAY START *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">PAY DATE *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="fname" class="lable">Check Number *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">
                            <label for="fname" class="lable">Currency *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">
                            <label for="fname" class="lable">EMPLOYEE NAME*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-3">
                            <label for="fname" class="lable">EMPLOYEE ADDRESS*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>

</div>






<div class="container" style="max-width: 1450px;">
    <div class="mb- d-flex" style="justify-content: space-between;">
        <h4>Earning statement</h4>
        <button class="createbtn mb-3">Preview Your Paystub</button>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class=" box-usa">

                <!-- <div class="row mb-3">
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">PAY START*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">PAY END *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">PAY DATE*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">HOW DO YOU GET PAID*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                            <div class="text-center mt-2">
                                <button CLASS="hourbtn">HOURLY</button> <button CLASS="salrybtn">SALARY</button>
                            </div>
                        </div>

                    </div> -->

                <div class="row mb-3">
                    <div class="col-lg-2 col-md-6 mb-2">
                        <button CLASS="statementbtn">EARNING</button>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-2">

                        <button CLASS="statementbtn">RATE</button>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-2">

                        <button CLASS="statementbtn">HOURS</button>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-2">

                        <button CLASS="statementbtn">TOTAL</button>
                    </div>
                    <div class="col-lg-2  col-md-6 mb-2">

                        <button CLASS="statementbtn">THIS PERIOD</button>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-2">

                        <button CLASS="statementbtn">YTD TOTAL</button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">

                        <input type="text" id="fname" name="fname" placeholder="Regular" class="w-100 p-2 "
                            style="font-size:14px;"><br>
                    </div>
                    <div class="col-md-2">

                        <input type="text" id="fname" name="fname" placeholder="25.00" class="w-100 p-2 "
                            style="font-size:14px;"><br>
                    </div>
                    <div class="col-md-2">

                        <input type="text" id="fname" name="fname" placeholder="40.00" class="w-100 p-2 "
                            style="font-size:14px;"><br>
                    </div>
                    <div class="col-md-2">

                        <input type="text" id="fname" name="fname" placeholder="1,000.00" class="w-100 p-2 "
                            style="font-size:14px;"><br>
                    </div>

                </div>

                <div class="row mb-3 mt-4">
                    <div class="col-md-3  mb-4 mt-4">

                        <button CLASS="earnbtn1"><i class="fa fa-plus-circle pr-2"
                                style="font-size:24px;color:white"></i>Add Earning</button>
                    </div>

                </div>

                <!-- <div class="row mb-3">
                        <div class="col-md-3">
                            <button class="createbtn mb-3">DEDUCTION</button>
                        </div>

                    </div> -->


                <div class="row mb-3">
                    <div class="col-md-3">

                        <button CLASS="earnbtn"><i class='fa fa-lock pr-5' style='font-size:24px'></i>CPP
                        </button>
                    </div>

                    <div class="col-md-3">

                        <button CLASS="earnbtn">325.50
                        </button>
                    </div>


                    <div class="col-md-3">

                        <button CLASS="earnbtn">15,000.58
                        </button>
                    </div>


                </div>


                <div class="row mb-3">
                    <div class="col-md-3">

                        <button CLASS="earnbtn"><i class='fa fa-lock pr-4' style='font-size:24px'></i>
                            EL</button>
                    </div>

                    <div class="col-md-3">

                        <button CLASS="earnbtn">25.50
                        </button>
                    </div>

                    <div class="col-md-3">

                        <button CLASS="earnbtn">15,000.58
                        </button>
                    </div>





                </div>


                <div class="row mb-3">
                    <div class="col-md-3">

                        <button CLASS="earnbtn"><i class='fa fa-lock pr-4' style='font-size:24px'></i>
                            INCOME TAX</button>
                    </div>



                    <div class="col-md-3">

                        <button CLASS="earnbtn">
                            325.50</button>
                    </div>
                    <div class="col-md-3">

                        <button CLASS="earnbtn">
                            15,000.58</button>
                    </div>

                </div>



                <div class="row mb-3">
                    <div class="col-md-3">

                        <button CLASS="earnbtn"><i class='fa fa-lock pr-4' style='font-size:24px'></i>
                            FEDRAL TAX</button>
                    </div>



                    <div class="col-md-3">

                        <button CLASS="earnbtn">
                            325.50</button>
                    </div>
                    <div class="col-md-3">

                        <button CLASS="earnbtn">
                            15,000.58</button>
                    </div>

                </div>


                <div class="row mb-3">
                    <div class="col-md-3">

                        <button CLASS="earnbtn"><i class='fa fa-lock pr-4' style='font-size:24px'></i>
                            LIFE INSURANCE</button>
                    </div>



                    <div class="col-md-3">

                        <button CLASS="earnbtn">
                            325.50</button>
                    </div>
                    <div class="col-md-3">

                        <button CLASS="earnbtn">
                            15,000.58</button>
                    </div>

                </div>


                <div class="row mb-3">
                    <div class="col-md-3">

                        <button CLASS="earnbtn"><i class='fa fa-lock pr-4' style='font-size:24px'></i>
                            CANADA SAVING BC</button>
                    </div>



                    <div class="col-md-3 mb-4">

                        <button CLASS="earnbtn">
                            325.50</button>
                    </div>
                    <div class="col-md-3">

                        <button CLASS="earnbtn">
                            15,000.58</button>
                    </div>

                </div>

                <div class="row mb-3 ">
                    <div class="col-md-3">

                        <button CLASS="earnbtn1"><i class="fa fa-plus-circle pr-2"
                                style="font-size:24px;color:white"></i>Add Deduction</button>
                    </div>

                    <div class="col-md-1">
                    </div>

                    <div class="col-md-1">
                    </div>
                    <div class="col-md-1">


                    </div>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">


                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2 col-md-6 mb-2">
                        <button CLASS="statementbtn">YTD GROSS</button>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-2">

                        <button CLASS="statementbtn">YTD EDUCATION</button>
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

                        <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                            style="font-size:14px;"><br>
                    </div>
                    <div class="col-md-2">

                        <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                            style="font-size:14px;"><br>
                    </div>
                    <div class="col-md-2">

                        <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                            style="font-size:14px;"><br>
                    </div>
                    <div class="col-md-2">

                        <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                            style="font-size:14px;"><br>
                    </div>
                    <div class="col-md-2">

                        <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                            style="font-size:14px;"><br>
                    </div>
                    <div class="col-md-2">

                        <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                            style="font-size:14px;"><br>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>




<div class="container" style="max-width: 1450px;">

    <div class="row mb-3">
        <div class="col-md-12">

            <div class="text-right mt-3 ">
                <button class="emailbtn" data-toggle="modal" data-target="#myModal"> <i class="fa fa-envelope mr-4"
                        style="font-size:24px"></i>EMAIL PAYSTUB <i class="fa fa-download ml-4"
                        style="font-size:24px"></i></button>
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

                        <button class="continue mt-3" data-toggle="modal" data-dismiss="modal" data-target="#myModal1">Continue</button>
                        <a href="#" style="text-decoration: none;color: #0000007a">
                            <p class="text-center mt-3" style="color: #0000007a;font-size: 13px;">Already have account?
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

    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
        Open modal
    </button>

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
                        <p style="color: #02030359;font-size: 14px;font-family: serif;" class="text-center">Enter the
                            Verification code to sent</p>

                        <input type="email" id="email" name="email" class="singup1 text-center"
                            placeholder="ABC@paystub.com">
                        <div style="color: red;font-size: 13px; font-family: serif;">
                            <i class="fa fa-exclamation-circle">
                                Verification code required
                            </i>
                        </div>
                        <p style="color: #0000004d; font-size: 11px;">Didn't receive an email</p>
                        <p style="color: #04050778;font-size: 12px; font-family: cursive;">Check Your Spam folder<spam style="color:red;"> Or </spam>resend code</p>
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

@endsection