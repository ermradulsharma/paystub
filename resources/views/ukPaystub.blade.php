`@extends('layouts.app')
@section('content')



<div>
    <div class="container" style="max-width:1450px;">
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
                                    <i class="fa fa-eye" style="font-size: 39px;margin-left: 6px;"></i>


                                </div>
                            </div>
                        </div>

                        <div class="col-md-1 text-center">
                            <div style="height:240px;-webkit-box-shadow: 9px 0 4px -4px #999, 0px 0 4px -4px #999;">

                            </div>
                        </div>

                        <div class="col-md-5 mt-5 text-center">
                            <h6 style="margin-left:-23px;font-weight: 900;">BASIC TEMPLATES</h6>
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
                                    <i class="fa fa-eye" style="font-size: 39px;margin-left: 6px;"></i>


                                </div>


                            </div>
                            <div class=" mt-3  float-right">
                                <button class="viewbtn">Click to see Template Landscape view.</button>
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

                                    <button CLASS="earnbtn"><i class='fa fa-lock pr-5'
                                            style='font-size:24px; color:black;'></i>Income Tax
                                    </button>
                                </div>
                                <div class="col-md-4 ">
                                    <button CLASS="earnbtn text-center">556.80</button>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">

                                    <button CLASS="earnbtn"><i class='fa fa-lock pr-5'
                                            style='font-size:24px; color:black;'></i>National Insurence
                                    </button>
                                </div>
                                <div class="col-md-4 ">
                                    <button CLASS="earnbtn text-center">556.80</button>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-md-6">
                                    <button class="createbtn2 "> Total Deductions</button>

                                </div>
                                <div class="col-md-4">

                                    <button CLASS="earnbtn text-center">
                                        7,247.29</button>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-6">
                            <h5>TOTAL YEAR TO DATE</h5>
                            <div class="row mb-3 ">

                                <div class="col-md-6">

                                    <button CLASS="earnbtn"><i class='fa fa-lock pr-5'
                                            style='font-size:24px; color:black;'></i>Taxable Gross Pay
                                    </button>
                                </div>
                                <div class="col-md-4 ">
                                    <button CLASS="earnbtn text-center">1,309.90</button>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">

                                    <button CLASS="earnbtn"><i class='fa fa-lock pr-5'
                                            style='font-size:24px; color:black;'></i>Income Tax
                                    </button>
                                </div>
                                <div class="col-md-4 ">
                                    <button CLASS="earnbtn text-center">1,058.94</button>
                                </div>

                            </div>


                            <div class="row mb-3">

                                <div class="col-md-6">
                                <button CLASS="earnbtn"><i class='fa fa-lock pr-5'
                                            style='font-size:24px; color:black;'></i>Employee NIC
                                    </button>

                                </div>
                                <div class="col-md-4">

                                    <button CLASS="earnbtn text-center">
                                    4,058.94</button>
                                </div>


                            </div>

                            <div class="row mb-5">

                                <div class="col-md-6">
                                <button CLASS="earnbtn"><i class='fa fa-lock pr-5'
                                            style='font-size:24px; color:black;'></i>Employee NIC
                                    </button>

                                </div>
                                <div class="col-md-4">

                                    <button CLASS="earnbtn text-center">
                                    6,058.94</button>
                                </div>
                                

                            </div>

                             <div class="row">

                                <div class="col-md-6">
                                <button CLASS="earnbtn text-center">NET PAY
                                    </button>

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
    <button class="emailbtn"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL
        PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
</div>
</div>

    </div>

</div>



























</div>


@endsection