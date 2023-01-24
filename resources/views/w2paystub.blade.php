@extends('layouts.app')
@section('content')

<div>
    <div class="container-fluid p-4 mt-2" style="background-color: #fb5e5efa; ">

        <div class="container" style="max-width:1450px;">
            <div class="text-left ">
                <h1 style="color:white;">Form W-2</h1>
                <p style="color:white; font-size:30px;">Start entering the Form W-2 information and e-file the return.
                    It’s super simple. Fill, Submit &
                    Download.</p>
            </div>

            <div style="text-align: -webkit-right;" class="mb-4">
                <a class="btn btn-lg  mt-5 p-2 btn-danger Generate " href="{{url('usa')}}">Select W-2 Year</a>
            </div>

            <div class="container bg-light  redcon" style="max-width:1450px;">
                <div clas="recipt-box">
                    <div class="rec-box-border">
                        <div class="row">

                            <div class="col-md-2" style="border-right:1px solid red;">
                                <div class="form-no">
                                    <h5>22222</h5>
                                </div>
                            </div>
                            <div class="col-md-2" style="border-right:2px solid red;">
                                <label for="vehicle1" class="w2p box-p"> VOID</label>
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="tickbox">
                            </div>
                            <div class="col-md-4 pt-2" style="border-right: 5px solid red; border-left: 3px solid red;">
                                <p class="w2p">a Employee's social security number</p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2 mb-3"><br>
                            </div>
                            <div class="col-md-4 pt-3">
                                <p class="w2p">For offical use only   <i class="fa fa-play" aria-hidden="true"></i></p>
                                <p class="w2p">OMB No. 1545-0008</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div clas="recipt-box">
                    <div class="rec-box-border">
                        <div class="row">

                            <div class="col-md-6 mt-3 ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="w2p">b  Employer Identification Number (EIN)</p>
                                        <input type="text" id="fname" name="fname" placeholder="enter text"
                                            class=" p-2 w-100 p-2"><br>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="w2p ">d  Control Number</p>
                                        <input type="text" id="fname" name="fname" placeholder="enter text"
                                            class="w-100 p-2 p-2"><br>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <p class="w2p">c  Employer's Name, Address, Zipcode </p>
                                        <textarea id="w3review" name="w3review" rows="4" cols="30" placeholder="Please Enter"
                                            class="w-100"></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row ">

                                    <div class="col-md-6 mt-3">
                                        <p class="w2p">e  Employee's First Name & Initial</p>
                                        <input type="text" id="fname" name="fname" placeholder="enter text"
                                            class="w-100 p-2"><br>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <p class="w2p">Last Name</p>
                                        <input type="text" id="fname" name="fname" placeholder="enter text"
                                            class="w-100 p-2"><br>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <p class="w2p">f  Employee's Name, Address, Zipcode </p>
                                        <textarea id="w3review" name="w3review" rows="4" cols="30" placeholder="Please Enter"
                                            class="w-100"></textarea>
                                    </div>

                                </div>

                            </div>
                        </div>




                        <div class="row mt-3">
                            <div class="col-md-3">
                                <p class="w2p">1  Wages, Tips, Other compensation </p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>
                            <div class="col-md-3">
                                <p class="w2p">2  Fedral Income Tax Field</p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>

                            <div class="col-md-3">
                                <p class="w2p">3  Social Security Wages </p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>

                            <div class="col-md-3">
                                <p class="w2p">4  Social Security tax withheld</p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <p class="w2p">5  Medicare Wages & tips</p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>
                            <div class="col-md-3">
                                <p class="w2p">6  Medicare tax withheld</p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>

                            <div class="col-md-3">
                                <p class="w2p">7  Social Security tips </p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>

                            <div class="col-md-3">
                                <p class="w2p">8  Allocated tips</p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <p class="w2p">9  Disabled</p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>
                            <div class="col-md-4">
                                <p class="w2p">10  Dependent care benefits</p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>

                            <div class="col-md-4">
                                <p class="w2p">11  Nonqualified plans</p>
                                <input type="text" id="fname" name="fname" placeholder="enter text"
                                    class="w-100 p-2"><br>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <p class="w2p">12a  See Instructions box  12</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">PIE</span>
                                    <input type="text" class="form-control" placeholder="Please Enter" name="usrname">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="w2p">12b </p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">PIE</span>
                                    <input type="text" class="form-control" placeholder="Please Enter" name="usrname">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <p class="w2p">12c </p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">PIE</span>
                                    <input type="text" class="form-control" placeholder="Please Enter" name="usrname">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <p class="w2p">12d </p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">PIE</span>
                                    <input type="text" class="form-control" placeholder="Please Enter" name="usrname">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6 mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1 " class="w2p"> Statutory Employee</label><br>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1" class="w2p"> Retirement Plan</label><br>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <label for="vehicle1" class="w2p"> Third-party Sick Pay</label><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <p class="w2p">14  Other </p>
                                <textarea id="w3review" name="w3review" rows="4" cols="30" placeholder="Please Enter"
                                    style="width:100%;"></textarea>
                            </div>
                        </div>



                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="fname" class="lable w2p">15  State <spam style="color:red;">
                                        <spam style="color:red;">
                                            <spam>
                                                <spam></label><br>
                                <div class="dropdown ">
                                    <form action="/action_page.php">

                                        <select name="cars" id="cars" class=" dropdown11">
                                            <option selected>Choose your state</option>
                                            <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="fname" class="lable w2p">Employer's State ID Number<spam style="color:red;">
                                        <spam style="color:red;">
                                            <spam>
                                                <spam></label><br>

                                <input type="text" class="form-control" placeholder="Please Enter" name="usrname">
                            </div>

                            <div class="col-md-3">
                                <label for="fname" class="lable w2p">16   State wages, tips, etc.<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>

                                <input type="text" class="form-control" placeholder="Please Enter" name="usrname">
                            </div>

                            <div class="col-md-3">
                                <label for="fname" class="lable w2p">17  State Income Tax<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>

                                <input type="text" class="form-control" placeholder="Please Enter" name="usrname">
                            </div>
                        </div>



                        <div class="row mt-4">
                            <div class="col-md-4">
                                <label for="fname" class="lable w2p">18  Local Wages Tips etc<spam style="color:red;">
                                        <spam style="color:red;">
                                            <spam>
                                                <spam></label><br>

                                <input type="text" class="form-control" placeholder="Please Enter" name="usrname">

                            </div>
                            <div class="col-md-4">
                                <label for="fname" class="lable w2p">19  Local Income Tax<spam style="color:red;">
                                        <spam style="color:red;">
                                            <spam>
                                                <spam></label><br>

                                <input type="text" class="form-control" placeholder="Please Enter" name="usrname">

                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="fname" class="lable w2p">20  Localitiy Name<spam style="color:red;">
                                        <spam style="color:red;">*<spam>
                                                <spam></label><br>

                                <input type="text" class="form-control" placeholder="Please Enter" name="usrname">
                            </div>



                        </div>
                    </div>
                </div>

                <div class="container" style="max-width: 1452px;">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="w2p">Form<spam style="font-size: 47px;">W-2</spam>
                                <spam style="font-size: 26px;">Wage and Tax Statement</spam>
                            </p>
                            <p class="w2p">
                                <spam style="font-size: 18px; font-weight: 900;">Copy A-For Social Security
                                    Administration.</spam>
                                <spam style="font-weight: 500; font-size: 17px;"> Send this entire page with Form W-3 to
                                    the Social Security Administration; photocopies are<b> not</b>
                                    acceptable.</spam>
                            </p>
                        </div>

                        <div class="col-md-2">
                            <p style="text-align: center;font-size: 54px; font-weight: 800;font-family: emoji;">2022</p>
                        </div>
                        <div class="col-md-4">
                            <p class="w2p" style="font-weight: 400; font-size: 16px;">Department of treasury - Internal
                                revenue service</p>
                            <p class="w2p" style="font-size: 18px;">For Privacy Act & Paperwork Reduction </p>
                            <p class="w2p" style="font-size: 18px;">Act Notice, See the Seprate Instructions.</p><br>
                            <p class="w2p" style="text-align: right;font-size: 15px;">Cat.No. 10134D</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="w2p"style="font-size:x-large;">Do Not Cut, Fold Or Staple Form on This Page </h3>
                        </div>

                    </div>
                </div>



            </div>


            <div class="d-flex" style="justify-content: space-between;">



                <div class="text-left mt-4 ">
               <a  class="previewbtn btn btn-block" style="text-decoration:none;" href="{{'preview-pdf'}}" target="_blank">Preview Below Check <i class="fa fa-eye"
                            style="font-size: 30px; margin-left: 7px;"></i> </a>
                  
                     
                </div>
                <div class="text-right mt-4 ">
                    <a  class="emailbtn  btn btn-block"  style="text-decoration:none;" target="_blank" href="{{'generate-pdf'}}"> Download 
                        <i class="fa fa-download ml-4" style="font-size:24px"></i> </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background-color: #6d8507;
              background-image: linear-gradient(135deg, #6d8507 0%, #faaa63 50%, #c9c6ff 100%);">
        <div class="row py-4" style="max-width :1450px;">
            <div class="container">
                <div class="col-lg-5">
                    <p class="m-1" style="font-weight: 300;">Department of the Treasury—Internal Revenue Service</p>
                    <p class="m-1" style="font-weight: 300;">For Privacy Act and Paperwork Reduction</p>
                    <p class="m-1" style="font-weight: 300;"> Act Notice, see the separate instructions.</p>
                </div>

            </div>

        </div>

    </div>


</div>





@endsection