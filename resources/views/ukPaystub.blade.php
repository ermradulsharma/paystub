@extends('layouts.app')
@section('content')



<div>
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
                            <label for="fname" class="lable">EMPLOYER (COMAPNY) ADDRESS *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>

                    </div>


                </div>
            </div>
        </div>

    </div>







    <div class="container">
    <div class="mb- d-flex" style="justify-content: space-between;">
            <h4>Employee info</h4>
            <button class="createbtn mb-3">Preview Your Paystub</button>
        </div>
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
                            <label for="fname" class="lable">EMPLOYER ADDRESS 1 *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="Your Employer & Company Name"
                                class="w-100 p-2 text-center" style="font-size:14px;"><br>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="fname" class="lable">POSTCODE *</label><br>
                            <input type="text" id="fname" name="fname" placeholder="1224" class="w-100 p-2 text-center"
                                style="font-size:14px;"><br>
                        </div>

                    </div>
                    <h4>Year to Date</h4>
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
                    <h4 class=" mt-4">Payment</h4>
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

                            <h4 class="text-center">Deduction</h4>
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
                    <h4 class="mt-4">Net Pay</h4>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" id="fname" name="fname" placeholder=" NET PAY :  98239"
                                class="w-100 p-3"><br>
                        </div>

                    </div>
                    <h4 class="mt-4">Additional Note Here</h4>
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