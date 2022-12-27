@extends('layouts.app')
@section('content')



<div>
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
    <div class="container" style="max-width: 1450px;">
    <h5>Company Info</h5>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">
              
                    <div class="row mb-3">
                        <div class="col-md-6 mt-1">
                            <label for="fname" class="lable">EMPLOYER (COMPANY) NAME <spam
                                        style="color:red;">
                                        <spam style="color:red;"><spam
                                        style="color:red;">
                                        <spam style="color:red;">*<spam><spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-6 mt-1">
                            <label for="fname" class="lable">EMPLOYER (COMAPNY) ADDRESS <spam
                                        style="color:red;">
                                        <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>

                    </div>


                </div>
            </div>
        </div>

    </div>







    <div class="container" style="max-width: 1450px;">
    <div class="mb- d-flex" style="justify-content: space-between;">
            <h5>Employee info</h5>
            <button class="createbtn mb-3">Preview Your Paystub</button>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class=" box-usa">

                    <div class="row mb-3">
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYEE NAME <spam
                                        style="color:red;">
                                        <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Full  Name"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>

                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">EMPLOYER ADDRESS 1 <spam
                                        style="color:red;">
                                        <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">POSTCODE <spam
                                        style="color:red;">
                                        <spam style="color:red;">*<spam></label><br>
                            <input type="text" id="fname" name="fname" placeholder="1224" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>

                    </div>
                    <h5>Year to Date</h5>
                    <div class="row">
                        <div class=" box-usa1 col-lg-7">


                            <table>
                                <tr>
                                    <th>Pay Period</th>
                                    <th>Pay Date</th>
                                    <th>Pay Type</th>
                                    <th>Tax Code</th>
                                    <th>NI Number</th>
                                    <th>NI Table Letter </th>
                                </tr>
                                <tr>
                                    <td>Wk 39</td>
                                    <td>15-apr-2023</td>
                                    <td>2-Weely</td>
                                    <td>1224L</td>
                                    <td>SC 35 256 C</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>Wk 39</td>
                                    <td>15-apr-2023</td>
                                    <td>2-Weely</td>
                                    <td>1224L</td>
                                    <td>SC 35 256 C</td>
                                    <td>A</td>
                                </tr>

                            </table>

                        </div>
                        <div class=" box-usa1 col-lg-4">


                            <table>
                                <tr>
                                    <th>Taxable Gross Pay</th>
                                    <th>Income Tax</th>
                                    <th>Employee NIC</th>
                                    <th>Employer NIC</th>

                                </tr>
                                <tr>
                                    <td>3,373.23</td>
                                    <td>1,234.34</td>
                                    <td>267.34</td>
                                    <td>678.04</td>

                                </tr>
                                <tr>
                                    <td>3,373.23</td>
                                    <td>1,234.34</td>
                                    <td>267.34</td>
                                    <td>678.04</td>

                                </tr>
                            </table>

                        </div>
                    </div>
                    <h5 class=" mt-4">Payment</h5>
                    <div class="row">

                        <div class=" box-usa1 col-lg-5">



                            <table>
                                <tr>
                                    <th>Basic Pay</th>
                                    <th>Total payment </th>
                                </tr>
                                <tr>
                                    <td>38,763.7</td>
                                    <td>38,763.7</td>
                                </tr>
                                <tr>
                                    <td>38,763.7</td>
                                    <td>38,763.7</td>
                                </tr>

                            </table>

                        </div>

                        <div class=" box-usa1 col-lg-5">

                            <h5 class="text-center">Deduction</h5>
                            <table>
                                <tr>
                                    <th>Basic Pay</th>
                                    <th>NAtional Insurance </th>
                                    <th>Total Deduction</th>
                                </tr>
                                <tr>
                                    <td>38,763.7</td>
                                    <td>22,763.7</td>
                                    <td>38,763.7</td>
                                </tr>
                                <tr>
                                    <td>38,763.7</td>
                                    <td>78,763.7</td>
                                    <td>56,763.7</td>
                                </tr>

                            </table>

                        </div>
                    </div>
                    <h5 class="mt-4">Net Pay</h5>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" id="fname" name="fname" placeholder=" NET PAY :  98239"
                                class="w-100 p-3"><br>
                        </div>

                    </div>
                    <h5 class="mt-4">Additional Note Here</h5>
                    <div class="row">
                        <div class="col-lg-4">
                        <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                        </div>

                    </div>



                </div>



            </div>
        </div>
        <div class="text-right mt-3  mb-3">
                <button class="emailbtn"> <i class="fa fa-envelope mr-4" style="font-size:24px"></i>EMAIL PAYSTUB <i
                        class="fa fa-download ml-4" style="font-size:24px"></i></button>
            </div>

    </div>
    
</div>



























</div>


@endsection