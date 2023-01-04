`@extends('layouts.app')
@section('content')




<div>
    <div class="container mt-2" style="max-width:1450px;">
        <h5>Choose Template</h5>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="d-flex justify-content-between mb-3">
                        <div class="col-md-5 m-auto " style="padding: 0 35px;">
                            <h6 style="margin-left:70px;font-weight: 900;">BASIC TEMPLATES</h6>
                            <div class="mt-4">
                                <i class="fa fa-angle-down down"></i>
                                <div class="input-group mmenu mb-3">
                                    <select name="cars" id="cars" style="" class="form-control dropdown1"
                                        style="border-right:none">
                                        <option value="volvo">Reddish Magneta </option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                    <i onclick="myFunction(this)" class="fa fa-eye" style="font-size: 39px;margin-left: 6px;"></i>


                                </div>
                            </div>
                        </div>

                        <div class="col-md-2  text-center sh">
                            <!-- <div style="height:240px;-webkit-box-shadow: 9px 0 4px -4px #999, 0px 0 4px -4px #999;">

                            </div> -->
                            <img src="images/hrpng.png" style="height: 200px;">
                        </div>


                        <div class="col-md-5 mt-5 text-center">
                            <h6 style="margin-left:-23px;font-weight: 900;">ADVANCED TEMPLATES</h6>
                            <div class="mt-4">
                                <i class="fa fa-angle-down down1"></i>
                                <div class="input-group mmenu mb-3" style="margin: auto;">
                                    <select name="cars" id="cars" style="" class="form-control dropdown1"
                                        style="border-right:none">
                                        <option value="volvo">Reddish Magneta </option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                    <i onclick="myFunction(this)" class="fa fa-eye" style="font-size: 39px;margin-left: 6px;"></i>


                                </div>


                            </div>
                            <div class=" mt-3  float-right">
                                <button class="viewbtn"><a href="{{url('template-view')}}">Click to see Template Landscape view.</a></button>
                            </div>

                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>
    <div class="container" style="max-width: 1450px;">
        <h5>Company Info</h5>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-3">
                        <div class="col-md-6 mt-1">
                            <label for="fname" class="lable">EMPLOYER (COMPANY) NAME <spam style="color:red;">
                                    <spam style="color:red;">
                                        <spam style="color:red;">
                                            <spam style="color:red;">*<spam>
                                                    <spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-6 mt-1">
                            <label for="fname" class="lable text-center">EMPLOYER (COMAPNY) ADDRESS <spam
                                    style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname"
                                placeholder="5 Throgmorton St, London EC2N 2AD, United Kingdom"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                    </div>


                </div>
            </div>
        </div>

    </div>







    <div class="container" style="max-width: 1450px;">
        <div class="mb- d-flex" style="justify-content: space-between;">
            <h5>Employee info</h5>

        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-3">
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYEE NAME <spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Full  Name"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYER ADDRESS 1 <spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="
 5 Throgmorton St,
London" class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">POSTCODE <spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="1224" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>

                    </div>
                    <h5 class="mt-5 mb-2">EARNINGS STATEMENT</h5>
                    <div class="row mb-3">
                        <div class="col-md-4 ">
                            <label for="fname" class="lable">PAY START <spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname1" name="fname" placeholder="2-20-2023" class="w-100 p-2
                                 " style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-4 ">
                            <label for="fname" class="lable text-center"> PAY DATE <spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="12-12-2023" class="w-100 p-2
                            " style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4 ">
                            <label for="fname" class="lable">PAY END <spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="2-20-2023" class="w-100 p-2
                            r" style="font-size:14px;"><br>
                        </div>

                    </div>


                    <div class="row mb-3">
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">Pay Type<spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname1" name="fname" placeholder="2-20-2023" class="w-100 p-2
                                 " style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable text-center"> Payment method <spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="12-12-2023" class="w-100 p-2
                            " style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">Tax Code <spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="2-20-2023" class="w-100 p-2
                            r" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">NI Number<spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="2-20-2023" class="w-100 p-2
                            r" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">NI Table Letter<spam style="color:red;">
                                    <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="2-20-2023" class="w-100 p-2
                            r" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-2">
                            <p class="text-center mb-0" style="font-size:18px;">How do you get paid<spam
                                    style="color:red;">
                                    <spam style="color:red;">*<spam>
                                            <spam>
                            </p>

                            <div class="text-center mt-2  d-flex">
                                <button CLASS="hourbtn mr-2">HOURLY</button> <button CLASS="salrybtn">SALARY</button>
                            </div>
                        </div>

                    </div>

                    <h5 class="mt-5">PAYMENTS</h5>
                    <div class="row ">


                    </div>


                    <div class="row ">
                        <div class="col-md-2 ">
                            <button CLASS="statementbtn">EARNING</button>
                        </div>
                        <div class="col-md-2 ">

                            <button CLASS="statementbtn">RATE</button>
                        </div>
                        <div class="col-md-2 ">

                            <button CLASS="statementbtn">HOURS</button>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-md-2 ">


                            <input type="text" id="fname1" name="fname" placeholder="Regular" class="w-100 p-2 mt-2
                                 " style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-2">


                            <input type="text" id="fname" name="fname" placeholder="25.00" class="w-100 p-2 mt-2
                            " style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-">


                            <input type="text" id="fname" name="fname" placeholder="50" class="w-100 p-2 mt-2
                            r" style="font-size:14px;"><br>
                        </div>

                    </div>
                    <div class="row mb-3">

                        <div class="col-md-2 mt-2 mb-5">

                            <button CLASS="earnbtn"><i class="fa fa-plus-circle pr-2"
                                    style="font-size:24px;color:green"></i>Add Earning</button>
                        </div>

                    </div>
                    <div Class="row">
                        <div class="col-lg-6">
                            <h5>Deductions</h5>
                            <div class="row mb-3 ">

                                <div class="col-md-6">

                                
                            <i class="fa fa-lock earnbtn2"></i>
                            <input class="earnbtn text-center" type="text" value="FICA Medicare">
                       
                                </div>
                                <div class="col-md-4 ">
                                    <input CLASS="earnbtn text-center" value="556.80"></input>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">

                                <i class="fa fa-lock earnbtn2"></i>
                            <input class="earnbtn text-center" type="text" value="National Insurence">
                       
                                </div>
                                
                                <div class="col-md-4 ">
                                    <input CLASS="earnbtn text-center" value="556.80"></input>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-md-6">
                                    <button class="createbtn2 "> Total Deductions</button>

                                </div>
                                <div class="col-md-4">

                                    <input CLASS="earnbtn text-center" value=" 7,247.29">
                                       </input>
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
                                    <input CLASS="earnbtn text-center" value="1,309.90"></input>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">

                                <i class="fa fa-lock earnbtn2"></i>
                            <input class="earnbtn text-center" type="text" value="Income Tax">
                                </div>
                                <div class="col-md-4 ">
                                    <input CLASS="earnbtn text-center" value="1,058.94"></input>
                                </div>

                            </div>


                            <div class="row mb-3">

                                <div class="col-md-6">
                                
                                <i class="fa fa-lock earnbtn2"></i>
                            <input class="earnbtn text-center" type="text" value="Employee NIC">

                                </div>
                                <div class="col-md-4">

                                    <input CLASS="earnbtn text-center" value="4,058.94">
                                 </input>
                                </div>


                            </div>

                            <div class="row mb-5">

                                <div class="col-md-6">
                                <i class="fa fa-lock earnbtn2"></i>
                            <input class="earnbtn text-center" type="text" value="Employee NIC">


                                </div>
                                <div class="col-md-4">

                                    <input CLASS="earnbtn text-center" value="  6,058.94">
                                  </input>
                                </div>
                                

                            </div>

                             <div class="row">

                                <div class="col-md-6">
                                <input CLASS="earnbtn text-center" value="NET PAY">
                                    </input>

                                </div>
                                <div class="col-md-4">

                                    <button CLASS="emailbtn2 text-center">
                                    6,058.94</button>
                                </div>
                                

                            </div>


                        </div>
                    </div>



                    <h5 class="mt-4">Additional Information Here (Note)</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <textarea id="w3review" name="w3review" rows="4" cols="60" placeholder="Note Here (Optional)" class="p-2"></textarea>
                        </div>

                    </div>



                </div>



            </div>
        </div>
        <div class="mb- d-flex" style="justify-content: space-between;">



<div class="text-left mt-1 ">
    <button class="previewbtn">
        Preview Your Paystub <i class="fa fa-eye"
            style="font-size: 30px; margin-left: 7px;"></i></button>
</div>
<div class="text-right mt-1 mb-4 ">
    <button class="emailbtn" data-toggle="modal" data-target="#myModal"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL
        PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
</div>
</div>

    </div>

</div>






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
                    <p style="color: #04050778;font-size: 12px; font-family: cursive;">Check Your Spam folder<spam
                            style="color:red;"> Or </spam>resend code</p>
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


@endsection

<script>
    
    function myFunction(x) {
      x.classList.toggle("fa-eye-slash");
    }
    </script>