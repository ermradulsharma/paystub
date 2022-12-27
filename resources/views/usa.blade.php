@extends('layouts.app')

@section('content')
<div>


    <div class="container" style="max-width:1450px;">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">
                    <h5>Company Info</h5>
                    <div class="row mb-3 ">
                        <div class="col-md-6 mt-1">
                            <label for="fname" class="lable">EMPLOYER (COMPANY) NAME <spam style="color:red;">
                                    <spam style="color:red;">*<spam>
                                            <spam></label>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 text-center" style="font-size:16px;"><br>
                        </div>

                        <div class="col-md-6 mt-1">
                            <label for="fname" class="lable">EMPLOYER TELEPHONE NUMBER<spam style="color:red;">
                                    <spam style="color:red;">*<spam>
                                            <spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 text-center" style="font-size:16px;"><br>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="fname" class="lable">STREET ADDRESS 1 <spam style="color:red;">
                                    <spam style="color:red;">*<spam>
                                            <spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer Address"
                                class="w-100 p-2 " style="font-size:16px;"><br>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="fname" class="lable">STREET ADDRESS 2 <spam style="color:red;">
                                    <spam style="color:red;">*<spam>
                                            <spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Suite 101 or Apt 101 (optional)"
                                class="w-100 p-2 " style="font-size:16px;"><br>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="fname" class="lable">City <spam style="color:red;">
                                    <spam style="color:red;">*<spam>
                                            <spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer City"
                                class="w-100 p-2 " style="font-size:16px;"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">State<spam style="color:red;">
                                    <spam style="color:red;">*<spam>
                                            <spam></label><br>
                                            
                                            <input type="text" id="fname" name="fname" placeholder="Your Employer Sate"
                                class="w-100 p-2  " style="font-size:16px;"><br>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="lable">Zip Code <spam style="color:red;">
                                    <spam style="color:red;">*<spam>
                                            <spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer Zip Code"
                                class="w-100 p-2 " style="font-size:16px;"><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div class="container" style="max-width:1450px;">
        <h5>Choose Template</h5>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-3">
                        <div class="col-md-6 mt-4 " style="border-right: 1px solid #00000024; padding-left: 35px;">
                            <h6>BASIC TEMPLATES</h6>
                            <div class="dropdown ">
                                <form action="/action_page.php">

                                    <select name="cars" id="cars" style="" class="p- dropdown1">
                                        <option value="volvo">Reddish Magneta  <i class="fa fa-caret-down"></i></option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                    <i class="fa fa-eye" style="font-size: 42px;"></i>   
                                </form>
                              
                            </div>
                           



                        </div>
                        <div class="col-md-6 mt-4 text-center">
                            <h6>ADVANCED TEMPLATES</h6>
                            <div class="dropdown ">
                                <form action="/action_page.php">
                               
                                    <select name="cars" id="cars" class=" dropdown1">
                                        <option value="volvo">PT Pink<i class="fa fa-angle-down"></i> </option> 
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                    <i class="fa fa-eye" style="font-size: 42px;"></i>   
                                </form>
                            </div>
                            <div class=" mt-3 ">
                                <button class="viewbtn">Click to see Template Landscape view..This is not part of design</button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
</div>


        <div class="container" style="max-width:1450px;">
            <h5>Employee Info</h5>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">

                        <div class="row mb-3">
                            <div class="col-md-4 mt-4">
                                <label for="fname" class="lable">EMPLOYEE NAME <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="Your Full  Name"
                                    class="w-100 p-2 text-center" style="font-size:16px;"><br>
                            </div>

                            <div class="col-md-4 mt-4">
                                <label for="fname" class="lable">EMPLOYER ID <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                    class="w-100 p-2 text-center" style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="fname" class="lable">EMPLOYEE SSN last4<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="1224"
                                    class="w-100 p-2 text-center" style="font-size:16px;"><br>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="fname" class="lable">STREET 1 <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam> </label><br>
                                <input type="text" id="fname" name="fname" placeholder="Your Address" class="w-100 p-2 "
                                    style="font-size:16px;"><br>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="fname" class="lable">STREET 2 <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="Suite 101 or Apt 101(optional)"
                                    class="w-100 p-2 " style="font-size:16px;"><br>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="fname" class="lable">City <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="Your Employer City"
                                    class="w-100 p-2 " style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-4">
                                <label for="fname" class="lable">State <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="Your Employer Sate"
                                    class="w-100 p-2 " style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-4">
                                <label for="fname" class="lable">Zip Code <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="Your Employer Zip Code"
                                    class="w-100 p-2 " style="font-size:16px;"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container" style="max-width:1450px;">
            <h5>Employee Basic Info</h5>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">

                        <div class="row mb-3">
                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">SELECT YOUR STATE <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                                <div class="dropdown ">
                                <form action="/action_page.php">

                                    <select name="cars" id="cars"  class=" dropdown11">
                                        <option value="volvo">usa</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                </form>
                            </div>
                            </div>

                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">AUTO CALCULATOR<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="OFF"
                                    class="w-100 p-2 text-center" style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">MARITAL STATUS<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="single"
                                    class="w-100 p-2 text-center" style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">HOW DO YOU GET PAID<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="Bi-Weekly"
                                    class="w-100 p-2 text-center" style="font-size:16px;"><br>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">HOURLY <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="Hourly"
                                    class="w-100 p-2 text-center" style="font-size:16px;"><br>
                            </div>

                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">EMPLOYMENT TYPE <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="Employee"
                                    class="w-100 p-2 text-center" style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">EXEMPTIONS<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="0" class="w-100 p-2 text-center"
                                    style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable" style="color:red;">SELECT YOUR CURRENCY <spam
                                        style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="$(USD)"
                                    class="w-100 p-2 text-center" style="font-size:16px;"><br>
                            </div>

                        </div>




                    </div>
                </div>
            </div>

        </div>




        <div class="container" style="max-width:1450px;">
            <div class="mb- d-flex" style="justify-content: space-between;">
                <h5>Earning statement</h5>
                <button class="createbtn mb-3">Preview Your Paystub</button>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">

                        <div class="row mb-3">
                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">PAY START<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                    style="font-size:16px;"><br>
                            </div>

                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">PAY END <spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                    style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">PAY DATE<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                    style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-3 mt-4">
                                <label for="fname" class="lable">HOW DO YOU GET PAID<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                    style="font-size:16px;"><br>
                                <div class="text-center mt-2">
                                    <button CLASS="hourbtn">HOURLY</button> <button CLASS="salrybtn">SALARY</button>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 mb-3">
                                <button CLASS="statementbtn">EARNING</button>
                            </div>
                            <div class="col-md-2 mb-3">

                                <button CLASS="statementbtn">RATE</button>
                            </div>
                            <div class="col-md-2 mb-3">

                                <button CLASS="statementbtn">HOURS</button>
                            </div>
                            <div class="col-md-2 mb-3">

                                <button CLASS="statementbtn">TOTAL</button>
                            </div>
                            <div class="col-md-2 mb-3">

                                <button CLASS="statementbtn">THIS PERIOD</button>
                            </div>
                            <div class="col-md-2 mb-3">

                                <button CLASS="statementbtn">YTD TOTAL</button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2">

                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                    style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-2">

                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                    style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-2">

                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                    style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-2">

                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                    style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-2">
                                <input type="text" id="fname" name="fname" placeholder="Total Gross" class="w-100 p-2 "
                                    style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-2">

                                <input type="text" id="fname" name="fname" placeholder="YTD Total Gross"
                                    class="w-100 p-2 " style="font-size:16px;"><br>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 mt-2 mb-5">

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
                            <p class="p-0 m-0" style="font-family: serif;"> Tap on Padlock to change text</p>
                                <button CLASS="earnbtn"><i class='fa fa-lock pr-5' style='font-size:24px'></i>FICA
                                    Medicare</button>
                            </div>

                            <div class="col-md-1">
                            </div>

                            <div class="col-md-3">
                            </div>
                            <div class="col-md-1">


                            </div>
                            <div class="col-md-2">
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                    style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-2">

                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                    style="font-size:16px;"><br>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-3">

                                <button CLASS="earnbtn"><i class='fa fa-lock pr-5' style='font-size:24px'></i>Social
                                    Security Tax</button>
                            </div>

                            <div class="col-md-1">
                            </div>

                            <div class="col-md-3">
                            </div>
                            <div class="col-md-1">


                            </div>
                            <div class="col-md-2">
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                    style="font-size:16px;"><br>
                            </div>
                            <div class="col-md-2">

                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 "
                                    style="font-size:16px;"><br>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-3">

                                <button CLASS="earnbtn"><i class='fa fa-lock pr-5' style='font-size:24px'></i>Federal
                                    Income
                                    Tax</button>
                            </div>

                            <div class="col-md-1">
                            </div>

                            <div class="col-md-3">
                            </div>
                            <div class="col-md-1">


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


                        <div class="row mb-3">
                            <div class="col-md-3">

                                <button CLASS="earnbtn"><i class='fa fa-lock pr-5   ' style='font-size:24px'></i>State
                                    Tax</button>
                            </div>

                            <div class="col-md-1">
                            </div>

                            <div class="col-md-3">
                            </div>
                            <div class="col-md-1">


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

                        <div class="row mb-3">
                            <div class="col-md-3">

                                <button CLASS="earnbtn"><i class="fa fa-plus-circle pr-5"
                                        style="font-size:24px;color:green"></i>Add Deduction</button>
                                     
                            </div>

                            <div class="col-md-1">
                            </div>

                            <div class="col-md-3">
                            </div>
                            <div class="col-md-1">


                            </div>

                            <div class="col-md-3">

                            </div>
                            <div class="col-md-3">


                            </div>
                        </div>

                        <div class="row mb-3 mt-4">
                            <div class="col-md-3">

                                <button CLASS="earnbtn">Taxes/ Deduction Total</button>
                            </div>

                            <div class="col-md-1">
                            </div>

                            <div class="col-md-3">
                            </div>
                            <div class="col-md-1">


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


                        <div class="row mb-3 mt-5">
                            <div class="col-md-3">
                                <button CLASS="netpaybtn">Net Pay</button>
                            </div>

                            <div class="col-md-1">
                            </div>

                            <div class="col-md-3">
                            </div>
                            <div class="col-md-1">


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




        <div class="container" style="max-width:1450px;">

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class=" box-usa">

                        <div class="row mb-3">


                            <div class="col-md-2 mt-4">
                                <label for="fname" class="lable">CO <spam style="color:red;">*<spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                    style="font-size:14px;"><br>
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="fname" class="lable">FILE <spam style="color:red;">*<spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                    style="font-size:14px;"><br>
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="fname" class="lable">CLOCK VCHR <spam style="color:red;">*<spam></label><br>
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                    style="font-size:14px;"><br>
                            </div>




                            <div class="col-md-2 mt-4">
                                <label for="fname" class="lable">Advice Number <spam style="color:red;">*<spam>
                                            </label><br>
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                    style="font-size:14px;"><br>
                            </div>

                            <div class="col-md-2 mt-4">
                                <label for="fname" class="lable">Acc.no Last 4 <spam style="color:red;">*<spam>
                                            </label><br>
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                    style="font-size:14px;"><br>
                            </div>
                            <div class="col-md-2 mt-4">
                                <label for="fname" class="lable">Transit ABA <spam style="color:red;">*<spam>
                                            </label><br>
                                <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                    style="font-size:14px;"><br>
                            </div>

                        </div>





                    </div>
                    <div class="text-right mt-3 ">
                        <button class="emailbtn"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL
                            PAYSTUB <i class="fa fa-download ml-4" style="font-size:24px"></i></button>
                    </div>
                </div>
            </div>

        </div>









    </div>




    @endsection