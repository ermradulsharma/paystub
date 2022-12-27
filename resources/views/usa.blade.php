@extends('layouts.app')

@section('content')
<div>
>

    <div class="container" style="max-width:1500px;">
        <div class="row mb-2">
            <div class="col-md-12">
                <div class=" box-usa">
                    <h4>Company Info</h4>
                    <div class="row mb-2">
                        <div class="col-md-6 mt-3">
                            <label for="fname" class="lable">EMPLOYER (COMPANY) NAME <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="fname" class="lable">EMPLOYER TELEPHONE NUMBER<spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>

                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label for="fname" class="lable">STREET ADDRESS 1 <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-1 " style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label for="fname" class="lable">STREET ADDRESS 2 <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-1 " style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="fname" class="lable">City <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer City"
                                class="w-100 p-1 " style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">State<spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer Sate"
                                class="w-100 p-1 " style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">Zip Code <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer Zip Code"
                                class="w-100 p-1 " style="font-size:14px;"><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="container" style="max-width:1500px;">
        <h4>Choose Template</h4>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-2">
                        <div class="col-md-6 mt-4 text-center"style="border-right: 1px solid #00000024">
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

                        <div class="col-md-6 mt-4 text-center" >
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



    <div class="container" style="max-width:1500px;">
        <h4>Employee Info</h4>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-2">
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYEE NAME <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Full  Name"
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYER ID <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYEE SSN last4<spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="1224" class="w-100 p-1 text-center"
                                style="font-size:14px;"><br>
                        </div>

                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label for="fname" class="lable">STREET 1 <spam style="color:red;"><spam style="color:red;">*<spam><spam> </label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Address" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label for="fname" class="lable">STREET 2 <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Suite 101 or Apt 101(optional)"
                                class="w-100 p-1 " style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="fname" class="lable">City <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer City"
                                class="w-100 p-1 " style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">State <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer Sate"
                                class="w-100 p-1 " style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">Zip Code <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer Zip Code"
                                class="w-100 p-1 " style="font-size:14px;"><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container" style="max-width:1500px;">
        <h4>Employee Basic Info</h4>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-2">
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">SELECT YOUR STATE <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
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
                            <label for="fname" class="lable">AUTO CALCULATOR<spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="OFF" class="w-100 p-1 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">MARITAL STATUS<spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="single"
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">HOW DO YOU GET PAID<spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Bi-Weekly"
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>

                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">HOURLY <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Hourly"
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">EMPLOYMENT TYPE <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Employee"
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">EXEMPTIONS<spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="0" class="w-100 p-1 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable" style="color:red;">SELECT YOUR CURRENCY <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="$(USD)"
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>

                    </div>




                </div>
            </div>
        </div>

    </div>




    <div class="container" style="max-width:1500px;">
        <div class="mb- d-flex" style="justify-content: space-between;">
            <h4>Earning statement</h4>
            <button class="createbtn mb-2">Preview Your Paystub</button>
        </div>
        <div class="row mb-2">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-2">
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">PAY START<spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 text-center"
                                style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">PAY END <spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">PAY DATE<spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3 mt-4">
                            <label for="fname" class="lable">HOW DO YOU GET PAID<spam style="color:red;"><spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 text-center"
                                style="font-size:14px;"><br>
                            <div class="text-center mt-2">
                                <button CLASS="hourbtn">HOURLY</button> <button CLASS="salrybtn">SALARY</button>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-2">
                        <div class="col-md-2 mb-2">
                            <button CLASS="statementbtn">EARNING</button>
                        </div>
                        <div class="col-md-2 mb-2">

                            <button CLASS="statementbtn">RATE</button>
                        </div>
                        <div class="col-md-2 mb-2">

                            <button CLASS="statementbtn">HOURS</button>
                        </div>
                        <div class="col-md-2 mb-2">

                            <button CLASS="statementbtn">TOTAL</button>
                        </div>
                        <div class="col-md-2 mb-2">

                            <button CLASS="statementbtn">THIS PERIOD</button>
                        </div>
                        <div class="col-md-2 mb-2">

                            <button CLASS="statementbtn">YTD TOTAL</button>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-2">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="fname" name="fname" placeholder="Total Gross" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2">

                            <input type="text" id="fname" name="fname" placeholder="YTD Total Gross" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3">

                            <button CLASS="earnbtn"><i class="fa fa-plus-circle pr-2"
                                    style="font-size:24px;color:green"></i>Add Earning</button>
                        </div>

                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3">
                            <button class="createbtn mb-2">DEDUCTION</button>
                        </div>

                    </div>


                    <div class="row mb-2">
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
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>


                    <div class="row mb-2">
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
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>


                    <div class="row mb-2">
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
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>


                    <div class="row mb-2">
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
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">

                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                    </div>

                    <div class="row mb-2">
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

                    <div class="row mb-2">
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
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>

                        </div>
                    </div>


                    <div class="row mb-2">
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
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 "
                                style="font-size:14px;"><br>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <div class="container" style="max-width:1500px;">
       
        <div class="row mb-2">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-2">
                      

                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">CO <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 text-center"
                                style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">FILE <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder=""
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">CLOCK VCHR <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder=""
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>

                

                  
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">Advice Number <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder=""
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">Acc.no Last 4 <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder=""
                                class="w-100 p-1 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="fname" class="lable">Transit ABA <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-1 text-center"
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

