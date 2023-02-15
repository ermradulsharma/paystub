@extends('layouts.app')
@section('content')
<!-- Modal Start -->
<div class="modal fade" id="tempViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <embed src="" type="" id="tempView" allowtransparency="false" style="background-color : transparent;" frameborder="0" width="100%" height="800">
                {{-- <iframe src="" id="tempView" allowtransparency="false" style="background-color : transparent;" frameborder="0" width="100%" height="800"></iframe> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
<section class="w2-form">
    <div></div>
    <div class="container-fluid p-4 mt-2" style="background-color: #fb5e5efa; ">
        <div class="container" style="max-width:1450px;">
            <div class="text-left ">
                <h1 style="color:white;">Form W-2</h1>
                <p style="color:white; font-size:30px;">Start entering the Form W-2 information and e-file the return. It’s super simple. Fill, Submit & Download.</p>
            </div>

                <div style="text-align: -webkit-right;" class="mb-4">
                    <a class="btn btn-lg  mt-5 p-2 btn-danger Generate " href="{{ route('welcome') }}">Select W-2 Year</a>
                </div>
            </div>
        </div>
        <form id="submit_form_paystubx_id" action="javascript:void()" method="get">
            @csrf
            <input type="hidden" name="form_type" value="w2form" hidden>
            <div class="container bg-light  redcon" style="max-width:1450px;">
                <div clas="recipt-box">
                    <div class="rec-box-border">
                        <div style="border-bottom:2px solid red;" class="row">
                            <div class="w2-form-number">
                                <p style="padding: 0; margin:0;">2222</p>
                            </div>
                            <div class="checkbox-outer">
                                <p style="padding: 0; margin:0;">Void</p>
                                <div class="checkbox"> </div>
                            </div>
                            <div class="input-feild-outer">
                                <p style="font-size: 16px; font-weight:800;padding: 0; margin:0;" class="color-red">a Employee's Social Security number</p>
                                <input name="company_ssn" style="text-align: center" type="number" placeholder="Please Enter">
                            </div>
                            <div class="left-text">
                                <p style="padding: 0; margin:0;" class="w2p">For offical use only <i class="fa fa-play" aria-hidden="true"></i></p>
                                <p style="padding: 0; margin:0;" class="w2p">OMB No. 1545-0008</p>
                            </div>
                        </div>
                        <div class="w2form-box-outer">
                            <div class="w2form-left-box">
                                <div class="input-box border-none">
                                    <p style="padding: 0; margin:0;" class="color-red"><b>b</b> Employer Identifcation number (EIN)</p>
                                    <input name="company_in" class="input" type="number" placeholder="Please Enter">
                                </div>
                                <div style="" class=" textarea-w2 textarea-outer">
                                    <p style="margin:0; padding:0px;margin-left:10px !important;" class="color-red"><b>c</b> Employer's name, address, and Zip code</p>
                                    <textarea name="company_address" class="w2-textarea" style="padding-left:10px;" id="w3review" name="w3review" rows="5" cols="80" placeholder="Please Enter"></textarea>
                                </div>
                                <div class="input-box border-none ">
                                    <p style="margin:0; padding:0px;" class="color-red"><b>d</b> Control Nmuber</p>
                                    <input name="control_number" class="input" style="text-align: left;margin:0px;padding-left:10px !important;" type="text" placeholder="Please Enter">
                                </div>
                                <div class="inputbox-outer">
                                    <div class="input-box  width">
                                        <p style="margin:0; padding:0px; margin-left:10px !important;" class="color-red"> <b>e</b> Employee's First Name and Initial </p>
                                        <input name="emp_first_name" class="input" style="text-align: left;margin:0px; padding-left:10px !important;margin-left:10px !important;" type="text" placeholder="Please Enter">
                                    </div>
                                    <div style="margin-left:10px !important;margin-right:0px !important;" class="input-box  width ">
                                        <p style="margin:0; padding:0px;" class="color-red"> Last Name</p>
                                        <input name="emp_last_name" class="input" style="text-align: left;margin:0px;  padding-left:10px !important;" type="text" placeholder="Please Enter">
                                    </div>
                                    <div class="text">
                                        <p style="margin:0; padding:0px;" class="color-red"> Suff.</p>
                                    </div>
                                </div>
                                <div class="bottom-textarea">
                                    <textarea name="emp_address" class="w2-textarea" style="padding-left:10px;" id="w3review" name="w3review" rows="6" cols="83" placeholder="Please Enter"></textarea>
                                    <p style="margin-left:10px !important;font-weight: 600; margin:0" class="color-red"> <b>f</b> Employee's address and zip code </p>
                                </div>
                            </div>
                            <div class="w2form-right-box">
                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>1</b> Wages, Tips, other compensation</p>
                                        <input name="wages" class="input" type="number" placeholder="Please Enter">

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>2</b> Federal income tax withheld</p>
                                        <input name="federal_tax" class="input" type="number" placeholder="Please Enter">
                                    </div>
                                </div>
                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>3</b> Social security wages</p>
                                        <input name="ss_wages" class="input" type="number" placeholder="Please Enter">

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>4 </b> Social security tax withheld</p>
                                        <input name="ss_tax" class="input" type="number" placeholder="Please Enter">
                                    </div>
                                </div>

                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>5</b> Medicare wages and tips</p>
                                        <input name="medicare_wages" class="input" type="number" placeholder="Please Enter">

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>6 </b> Medicare tax withheld</p>
                                        <input name="medicare_tax" class="input" type="number" placeholder="Please Enter">

                                    </div>
                                </div>
                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>7</b> Social security tips</p>
                                        <input name="ss_tips" class="input" type="number" placeholder="Please Enter">

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>8 </b> Allocted tips</p>
                                        <input name="allocated_tips" class="input" type="number" placeholder="Please Enter">

                                    </div>
                                </div>
                                <div style="" class="input-box2-outer">
                                    <div style="" class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>9</b></p>
                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>10 </b> Dependent care benefits</p>
                                        <input name="dependent_care" class="input" type="number" placeholder="Please Enter">

                                    </div>
                                </div>
                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>11</b> Nonqualified plans</p>
                                        <input name="nonqualified" class="input" type="number" placeholder="Please Enter">

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>12a </b> See instructions for box 12</p>
                                        <div class="pie-box-outer">
                                            <span><img style="width:9px;" src="{{ asset('images/code.png') }}"></span>
                                            <input name="pie_1" class="pie-box input" type="text" placeholder="PIE" pattern="[A-Za-z]{3}">
                                            <input name="instructions_box_1" class="input-pie-box input" type="number" placeholder="Please Enter">
                                        </div>


                                    </div>
                                </div>
                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <div style="width:100% !important;" class="checkbox-inner">
                                            <p style="padding:0; margin:0px;line-height:1.2; text-align:left !important;" class="color-red"> <b>13</b> </p>
                                        </div>
                                        <div class="display">
                                            <div class="checkbox-inner">
                                                <input class="checkbox-sqaure" type="checkbox" id="vehicle1" name="statutory_emp" value="Bike">
                                                <p style="padding:0; margin:0px; font-size:12px;line-height:1.2;" class="color-red"><b style="font-size: 10px;">Statutory employee</b></p>
                                            </div>
                                            <div class="checkbox-inner">
                                                <input class="checkbox-sqaure" type="checkbox" id="vehicle1" name="retirement_plan" value="Bike">
                                                <p style="padding:0; margin:0px; font-size:12px;line-height:1.2;" class="color-red"><b style="font-size: 10px;">Retirement plan</b></p>
                                            </div>
                                            <div class="checkbox-inner">
                                                <input class="checkbox-sqaure" type="checkbox" id="vehicle1" name="third_party_sick" value="Bike">
                                                <p style="padding:0; margin:0px; font-size:12px;line-height:1.2;" class="color-red"><b style="font-size: 10px;">Third party sick pay</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>12b </b> </p>
                                        <div class="pie-box-outer">
                                            <span><img style="width:9px;" src="{{ asset('images/code.png') }}"></span>
                                            <input name="pie_2" class="pie-box input" type="text" placeholder="PIE" pattern="[A-Za-z]{3}">
                                            <input name="instructions_box_2" class="input-pie-box input" type="number" placeholder="Please Enter">
                                        </div>


                                    </div>
                                </div>
                                <div style="border-bottom:none !important;" class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>14</b> Other </p>
                                        <textarea class="bottom-textarea1" style="padding-left:10px;" id="w3review" name="other" rows="5" cols="80" placeholder="Please Enter"></textarea>
                                    </div>
                                    <div class="inputbox2">
                                        <div class="input-box2-inner">
                                            <p style="padding:0; margin:0px;" class="color-red"><b>12c </b> </p>
                                            <div class="pie-box-outer">
                                                <span><img style="width:9px;" src="{{ asset('images/code.png') }}"></span>
                                                <input name="pie_3" class="pie-box input" type="text" placeholder="PIE" pattern="[A-Za-z]{3}">
                                                <input name="instructions_box_3" class="input-pie-box input" type="number" placeholder="Please Enter">
                                            </div>

                                        </div>
                                        <div class="input-box2-inner">
                                            <p style="padding:0; margin:0px;" class="color-red"><b>12d </b></p>
                                            <div class="pie-box-outer">
                                                <span><img style="width:9px;" src="{{ asset('images/code.png') }}"></span>
                                                <input name="pie_4" class="pie-box input" type="text" placeholder="PIE" pattern="[A-Za-z]{3}">
                                                <input name="instructions_box_4" class="input-pie-box input" type="number" placeholder="Please Enter">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bottom-outer">
                            <div class="bottom-box-outer">
                                <div class=" bottom-box-inner">
                                    <p style="padding:0; margin:0px;" class="color-red"><b>15 </b>State
                                    </p>

                                    <select class="select-box" name="state" id="cars">
                                        <option value="volvo">Alaska</option>
                                        <option value="saab">Ahemdabad</option>
                                        <option value="opel">Alaska</option>
                                        <option value="audi">Gujrat</option>
                                    </select>

                                </div>
                                <div class=" bottom-box-inner">
                                    <p style="padding:0; margin:0px;" class="color-red"><b></b>Employess's state id number
                                    </p>
                                    <input name="employee_state_id" style="border:1px solid black; text-align:center;"
                                        class="input" type="number" placeholder="Please Enter">
                                </div>
                                <div class=" bottom-box-inner">
                                    <p style="padding:0; margin:0px;" class="color-red"><b>16 </b> State Wages, tips etc.
                                    </p>
                                    <input name="state_wages" style="border:1px solid black;" class="input"
                                        type="number" placeholder="Please Enter">
                                </div>
                                <div class=" bottom-box-inner">
                                    <p style="padding:0; margin:0px;" class="color-red"><b>17 </b>State income tax </p>
                                    <input name="state_income_tax" style="border:1px solid black;" class="input"
                                        type="number" placeholder="Please Enter">
                                </div>
                            </div>
                            <div class="bottom-box-outer a ">
                                <div style="padding:25px 0px" class=" bottom-box-inner"> </div>
                                <div class=" bottom-box-inner"> </div>
                                <div class=" bottom-box-inner"> </div>
                                <div class=" bottom-box-inner"> </div>
                            </div>

                            <div class="bottom-box-outer">
                                <div class=" bottom-box-inner1">
                                    <p style="padding:0; margin:0px;" class="color-red"><b>18 </b> Local Wages, tips, etc.</p>
                                    <input name="local_wages" style="border:1px solid black;" class="input" type="number" placeholder="Please Enter">

                                </div>
                                <div class=" bottom-box-inner1">
                                    <p style="padding:0; margin:0px;" class="color-red"><b>19 </b> Local Income Tax </p>
                                    <input name="local_income_tax" style="border:1px solid black;" class="input" type="number" placeholder="Please Enter">
                                </div>
                                <div class=" bottom-box-inner1">
                                    <p style="padding:0; margin:0px;" class="color-red"><b>20 </b> Locality Name </p>
                                    <input name="locality_name" style="border:1px solid black;" class="input" type="text" placeholder="Please Enter">
                                </div>
                            </div>
                        </div>

                        <div class="bottom-outer">
                            <div class="bottom-box-outer b">
                                <div style="padding:25px 0px" class=" bottom-box-inner"> </div>
                                <div class=" bottom-box-inner"> </div>
                                <div class=" bottom-box-inner"> </div>
                                <div class=" bottom-box-inner"> </div>
                            </div>
                            <div class="bottom-box-outer">
                                <div style="padding: 25px 0px" class=" bottom-box-inner1"> </div>
                                <div class=" bottom-box-inner1"> </div>
                                <div class=" bottom-box-inner1"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="max-width: 1452px;">
                        <div class="row">
                            <div class=" col-md-6 padding">
                                <p class="w2p"> Form <span style="font-size: 47px;">W-2</span> <span style="font-size: 26px;"> Wage and Tax Statement</span> </p>
                                <p class="w2p">
                                    <span style="font-size: 18px; font-weight: 900;">Copy A-For Social Security Administration.</span>
                                    <span style="font-weight: 500; font-size: 17px;"> Send this entire page with Form W-3 to the Social Security Administration; photocopies are<b> not</b> acceptable.</span>
                                </p>
                            </div>

                            <div class="col-md-2">
                                <p style="text-align: center;font-size: 54px; font-weight: 800;font-family: emoji;">2022 </p>
                            </div>
                            <div class="col-md-4 padding">
                                <p class="w2p" style="font-weight: 400; font-size: 16px;">Department of treasury - Internal revenue service</p>
                                <p class="w2p" style="font-size: 18px;">For Privacy Act & Paperwork Reduction </p>
                                <p class="w2p" style="font-size: 18px;">Act Notice, See the Seprate Instructions.</p>
                                <br>
                                <p class="w2p" style="text-align: right;font-size: 15px;">Cat.No. 10134D</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="w2p" style="font-size:x-large;">Do Not Cut, Fold Or Staple Form on This Page
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="max-width:1450px; padding:0;">
                <div style="" class="row mt-3">
                    <div style="margin: 0; padding:0;" class="col-12 text-center">
                        <div class="d-flex flex-wrap justify-content-between">
                            <a class="previewbtn text-capitalize viewTempTemplate mb-3 w-sm-100" type="button" id="button1">Preview Below Check <i class="fa fa-eye" style="font-size: 30px; margin-left: 7px;"></i></a>
                            <a type="button" class="emailbtn text-capitalize sendMailButton mb-3 w-sm-100" target="_blank" href="{{ 'generate-pdf' }}"> Download <i class="fa fa-download ml-4" style="font-size:24px"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection
