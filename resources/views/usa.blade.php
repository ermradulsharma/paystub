@extends('layouts.app')

@section('content')
<div>

    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">
                    <h4>Company Info</h4>
                    <div class="row mb-3">
                        <div class="col-md-6 mt-4">
                            <label for="fname" class="lable">EMPLOYER (COMPANY) NAME *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="fname" class="lable">EMPLOYER TELEPHONE NUMBER *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="fname" class="lable">EMPLOYER (COMPANY) NAME *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 " style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="fname" class="lable">EMPLOYER (COMPANY) NAME *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
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
                            <input type="text" id="fname" name="fname" placeholder="Your Employer Sate"
                                class="w-100 p-2 " style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">Zip Code *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer Zip Code"
                                class="w-100 p-2 " style="font-size:14px;"><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="container">
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



    <div class="container">
        <h4>Employee Info</h4>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-3">
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYEE NAME *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Full  Name"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYER ID *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYEE SSN last4*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="1224" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="fname" class="lable">STREET 1 *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Address" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="fname" class="lable">STREET 2 *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Suite 101 or Apt 101(optional)"
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
                            <input type="text" id="fname" name="fname" placeholder="Your Employer Sate"
                                class="w-100 p-2 " style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">Zip Code *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer Zip Code"
                                class="w-100 p-2 " style="font-size:14px;"><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <h4>Employee Basic Info</h4>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-3">
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">SELECT YOUR STATE</label><br>
                            <div class="dropdown dropdown1">
                                <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown">usa
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu p-4">
                                    <li><a href="#">HTML</a></li>
                                    <li><a href="#">CSS</a></li>
                                    <li><a href="#">JavaScript</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">AUTO CALCULATOR*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="OFF" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">MARITAL STATUS*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="single"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">HOW DO YOU GET PAID*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Bi-Weekly"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">HOURLY *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Hourly"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">EMPLOYMENT TYPE *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Employee"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">EXEMPTIONS*</label><br>
                            <input type="text" id="fname" name="fname" placeholder="0" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable" style="color:red;">SELECT YOUR CURRENCY *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="$(USD)"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                    </div>




                </div>
            </div>
        </div>

    </div>




    <div class="container">
        <div class="mb- d-flex" style="justify-content: space-between;">
            <h4>Earning statement</h4>
            <button class="createbtn mb-3">Preview Your Paystub</button>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-3">
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

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <button CLASS="statementbtn">EARNING</button>
                        </div>
                        <div class="col-md-2">

                            <button CLASS="statementbtn">RATE</button>
                        </div>
                        <div class="col-md-2">

                            <button CLASS="statementbtn">HOURS</button>
                        </div>
                        <div class="col-md-2">

                            <button CLASS="statementbtn">TOTAL</button>
                        </div>
                        <div class="col-md-2">

                            <button CLASS="statementbtn">THIS PERIOD</button>
                        </div>
                        <div class="col-md-2">

                            <button CLASS="statementbtn">YTD TOTAL</button>
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
                            <input type="text" id="fname" name="fname" placeholder="Total Gross" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2">

                            <input type="text" id="fname" name="fname" placeholder="YTD Total Gross" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">

                            <button CLASS="earnbtn"><i class="fa fa-plus-circle pr-2"
                                    style="font-size:24px;color:green"></i>Add Earning</button>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <button class="createbtn mb-3">DEDUCTION</button>
                        </div>

                    </div>


                    <div class="row mb-3">
                        <div class="col-md-3">

                            <button CLASS="earnbtn"><i class='fa fa-lock pr-5' style='font-size:24px'></i>FICA
                                Medicare</button>
                        </div>

                        <div class="col-md-1">
                        </div>

                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">


                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-3">

                            <button CLASS="earnbtn"><i class='fa fa-lock pr-4' style='font-size:24px'></i>Social
                                Security Tax</button>
                        </div>

                        <div class="col-md-1">
                        </div>

                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">


                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-3">

                            <button CLASS="earnbtn"><i class='fa fa-lock pr-4' style='font-size:24px'></i>Federal Income
                                Tax</button>
                        </div>

                        <div class="col-md-1">
                        </div>

                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">


                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-3">

                            <button CLASS="earnbtn"><i class='fa fa-lock pr-5   ' style='font-size:24px'></i>State
                                Tax</button>
                        </div>

                        <div class="col-md-1">
                        </div>

                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">


                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">

                            <button CLASS="earnbtn"><i class="fa fa-plus-circle pr-2"
                                    style="font-size:24px;color:green"></i>Add Earning</button>
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
                        <div class="col-md-3">

                            <button CLASS="earnbtn">Taxes/ Deduction Total</button>
                        </div>

                        <div class="col-md-1">
                        </div>

                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">


                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>

                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-3">
                            <button CLASS="netpaybtn">Net Pay</button>
                        </div>

                        <div class="col-md-1">
                        </div>

                        <div class="col-md-1">
                        </div>
                        <div class="col-md-1">


                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                style="font-size:14px;"><br>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <div class="container">
       
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-3">
                      

                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">CO *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">FILE *</label><br>
                            <input type="text" id="fname" name="fname" placeholder=""
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">CLOCK VCHR *</label><br>
                            <input type="text" id="fname" name="fname" placeholder=""
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                

                  
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">Advice Number *</label><br>
                            <input type="text" id="fname" name="fname" placeholder=""
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">Acc.no Last 4 *</label><br>
                            <input type="text" id="fname" name="fname" placeholder=""
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">Transit ABA *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>
                       
                    </div>
                   




                </div>
                <div class="text-right mt-3 ">
                                <button class="emailbtn"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
                            </div>
            </div>
        </div>

    </div>









</div>




@endsection

