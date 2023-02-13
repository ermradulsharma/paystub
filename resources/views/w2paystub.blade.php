@extends('layouts.app')
@section('content')
    <section class="w2-form">
        <div></div>

        <div class="container-fluid p-4 mt-2" style="background-color: #fb5e5efa; ">

            <div class="container" style="max-width:1450px;">
                <div class="text-left ">
                    <h1 style="color:white;">Form W-2</h1>
                    <p style="color:white; font-size:30px;">Start entering the Form W-2 information and e-file the return.
                        It’s super simple. Fill, Submit &
                        Download.</p>
                </div>

                <div style="text-align: -webkit-right;" class="mb-4">
                    <a class="btn btn-lg  mt-5 p-2 btn-danger Generate " href="{{ route('welcome') }}">Select W-2 Year</a>
                </div>
            </div>

            <div class="container bg-light  redcon" style="max-width:1450px;">
                <div clas="recipt-box">
                    <div class="rec-box-border">
                        <div style="border-bottom:2px solid red;" class="row">
                            <div class="w2-form-number">
                                <p style="padding: 0; margin:0;">2222</p>
                            </div>
                            <div class="checkbox-outer">
                                <p style="padding: 0; margin:0;">Void</p>
                                <div class="checkbox">
                                </div>
                            </div>
                            <div class="input-feild-outer">
                                <p style="font-size: 16px; font-weight:800;padding: 0; margin:0;" class="color-red">a
                                    Employee's Social Security number</p>
                                <input style="text-align: center" type="text" placeholder="Please Enter">
                            </div>
                            <div class="left-text">
                                <p style="padding: 0; margin:0;" class="w2p">For offical use only <i class="fa fa-play"
                                        aria-hidden="true"></i></p>
                                <p style="padding: 0; margin:0;" class="w2p">OMB No. 1545-0008</p>
                            </div>

                        </div>
                        <div class="w2form-box-outer">
                            <div class="w2form-left-box">
                                <div class="input-box border-none">
                                    <p style="padding: 0; margin:0;" class="color-red"><b>b</b> Employer Identifcation
                                        number (EIN)</p>
                                    <input class="input" type="text" placeholder="Please Enter">
                                </div>
                                <div style="" class=" textarea-w2 textarea-outer">
                                    <p style="margin:0; padding:0px;" class="color-red"><b>c</b> Employer Identifcation
                                        number (EIN)</p>
                                    <textarea class="w2-textarea" style="padding-left:10px;" id="w3review" name="w3review" rows="5" cols="80"
                                        placeholder="Please Enter"></textarea>
                                </div>
                                <div class="input-box border-none ">
                                    <p style="margin:0; padding:0px;" class="color-red"><b>d</b> Control Nmuber</p>
                                    <input class="input" style="text-align: left;margin:0px;padding-left:10px !important;"
                                        type="text" placeholder="Please Enter">
                                </div>
                                <div class="inputbox-outer">
                                    <div class="input-box  width">
                                        <p style="margin:0; padding:0px;" class="color-red"><b>e</b> Employee's First Name
                                            and Initial</p>
                                        <input class="input"
                                            style="text-align: left;margin:0px; padding-left:10px !important;"
                                            type="text" placeholder="Please Enter">
                                    </div>
                                    <div style="margin-right:0px !important;" class="input-box  width ">
                                        <p style="margin:0; padding:0px;" class="color-red"> Last Name</p>
                                        <input class="input"
                                            style="text-align: left;margin:0px; padding-left:10px !important;"
                                            type="text" placeholder="Please Enter">
                                    </div>
                                    <div class="text">
                                        <p style="margin:0; padding:0px;" class="color-red"> Suff.</p>
                                    </div>
                                </div>
                                <div class="bottom-textarea">
                                    <textarea class="w2-textarea" style="padding-left:10px;" id="w3review" name="w3review" rows="6" cols="83"
                                        placeholder="Please Enter"></textarea>
                                    <p style="font-weight: 600; margin:0" class="color-red"><b>f</b> Employee's address and
                                        zip code</p>
                                </div>



                            </div>
                            <div class="w2form-right-box">
                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>1</b> Wages, Tips, other
                                            compensation</p>
                                        <input class="input" type="text" placeholder="Please Enter">

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>2</b> Wages, Tips, other
                                            compensation</p>
                                        <input class="input" type="text" placeholder="Please Enter">

                                    </div>
                                </div>
                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>3</b> Wages, Tips, other
                                            compensation</p>
                                        <input class="input" type="text" placeholder="Please Enter">

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>4 </b> Wages, Tips, other
                                            compensation
                                        </p>
                                        <input class="input" type="text" placeholder="Please Enter">

                                    </div>
                                </div>

                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>5</b> Wages, Tips, other
                                            compensation</p>
                                        <input class="input" type="text" placeholder="Please Enter">

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>6 </b> Wages, Tips, other
                                            compensation
                                        </p>
                                        <input class="input" type="text" placeholder="Please Enter">

                                    </div>
                                </div>
                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>7</b> Wages, Tips, other
                                            compensation
                                        </p>
                                        <input class="input" type="text" placeholder="Please Enter">

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>8 </b> Wages, Tips, other
                                            compensation
                                        </p>
                                        <input class="input" type="text" placeholder="Please Enter">

                                    </div>
                                </div>
                                <div style="" class="input-box2-outer">
                                    <div style="" class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>9</b></p>

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>10 </b> Wages, Tips, other
                                            compensation
                                        </p>
                                        <input class="input" type="text" placeholder="Please Enter">

                                    </div>
                                </div>
                                <div class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>11</b> Wages, Tips, other
                                            compensation
                                        </p>
                                        <input class="input" type="text" placeholder="Please Enter">

                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>12a </b> Wages, Tips, other
                                            compensation</p>
                                        <div class="pie-box-outer">
                                            <span><img style="width:9px;" src="{{ asset('images/code.png') }}"></span>
                                            <input class="pie-box input" type="text" placeholder="PIE">
                                            <input class="input-pie-box input" type="text" placeholder="Please Enter">
                                        </div>


                                    </div>
                                </div>
                                <div class="input-box2-outer">
                                    <div class="inputbox2
                            ">
                                        <div style="width:10% !important;" class="checkbox-inner">
                                            <p style="padding:0; margin:0px;line-height:1.2;" class="color-red">
                                                <b>13</b>
                                            </p>
                                        </div>
                                        <div class="display">

                                            <div class="checkbox-inner">
                                                <p class="checkbox-sqaure"><input type="checkbox" id="vehicle1"
                                                        name="vehicle1" value="Bike"></p>
                                                <p style="padding:0; margin:0px; font-size:12px;line-height:1.2;"
                                                    class="color-red"><b style="font-size: 10px;">Statury employee</b></p>

                                            </div>
                                            <div class="checkbox-inner">
                                                <p class="checkbox-sqaure"><input type="checkbox" id="vehicle1"
                                                        name="vehicle1" value="Bike"></p>
                                                <p style="padding:0; margin:0px;font-size:12px;line-height:1.2;"
                                                    class="color-red"><b style="font-size: 10px;">Retirement plan</b></p>

                                            </div>
                                            <div class="checkbox-inner">
                                                <p class="checkbox-sqaure"><input type="checkbox" id="vehicle1"
                                                        name="vehicle1" value="Bike"></p>
                                                <p style="padding:0; margin:0px;font-size:12px;line-height:1.2;"
                                                    class="color-red"><b style="font-size: 10px;">This party sick pay</b>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>12b </b> </p>
                                        <div class="pie-box-outer">
                                            <span><img style="width:9px;" src="{{ asset('images/code.png') }}"></span>
                                            <input class="pie-box input" type="text" placeholder="PIE">
                                            <input class="input-pie-box input" type="text" placeholder="Please Enter">
                                        </div>


                                    </div>
                                </div>
                                <div style="border-bottom:none !important;" class="input-box2-outer">
                                    <div class="inputbox2">
                                        <p style="padding:0; margin:0px;" class="color-red"><b>14</b> Wages, Tips, other
                                            compensation
                                        </p>
                                        <textarea class="bottom-textarea1" style="padding-left:10px;" id="w3review" name="w3review" rows="5"
                                            cols="80" placeholder="Please Enter"></textarea>

                                    </div>
                                    <div class="inputbox2">
                                        <div class="input-box2-inner">
                                            <p style="padding:0; margin:0px;" class="color-red"><b>12c </b> </p>
                                            <div class="pie-box-outer">
                                                <span><img style="width:9px;" src="{{ asset('images/code.png') }}"></span>
                                                <input class="pie-box input" type="text" placeholder="PIE">
                                                <input class="input-pie-box input" type="text"
                                                    placeholder="Please Enter">
                                            </div>

                                        </div>
                                        <div class="input-box2-inner">
                                            <p style="padding:0; margin:0px;" class="color-red"><b>12d </b></p>
                                            <div class="pie-box-outer">
                                                <span><img style="width:9px;" src="{{ asset('images/code.png') }}"></span>
                                                <input class="pie-box input" type="text" placeholder="PIE">
                                                <input class="input-pie-box input" type="text"
                                                    placeholder="Please Enter">
                                            </div>

                                        </div>


                                    </div>

                                </div>



                            </div>
                        </div>
                        <div class="bottom-box-outer">
                            <div class=" bottom-box-inner1">
                                <p style="padding:0; margin:0px;" class="color-red"><b>15 </b>State
                                </p>

                                <select class="select-box" name="cars" id="cars">
                                    <option value="volvo">Alaska</option>
                                    <option value="saab">Ahemdabad</option>
                                    <option value="opel">Alaska</option>
                                    <option value="audi">Gujrat</option>
                                </select>


                            </div>
                            <div class=" bottom-box-inner2">
                                <p style="padding:0; margin:0px;" class="color-red"><b></b>Employess's state id number
                                </p>
                                <input style="border:1px solid black; text-align:center;" class="input" type="text"
                                    placeholder="Please Enter">

                            </div>
                            <div class=" bottom-box-inner3">
                                <p style="padding:0; margin:0px;" class="color-red"><b>16 </b> State Wages, Tips etc;
                                </p>
                                <input style="border:1px solid black;" class="input" type="text"
                                    placeholder="Please Enter">

                            </div>
                            <div class=" bottom-box-inner4">
                                <p style="padding:0; margin:0px;" class="color-red"><b>17 </b>State income tax
                                </p>
                                <input style="border:1px solid black;" class="input" type="text"
                                    placeholder="Please Enter">

                            </div>
                            <div class=" bottom-box-inner5">
                                <p style="padding:0; margin:0px;" class="color-red"><b>18 </b> Local Wages, Tips etc</p>
                                <input style="border:1px solid black;" class="input" type="text"
                                    placeholder="Please Enter">

                            </div>
                            <div class=" bottom-box-inner6">
                                <p style="padding:0; margin:0px;" class="color-red"><b>19 </b> Local Income Tax
                                </p>
                                <input style="border:1px solid black;" class="input" type="text"
                                    placeholder="Please Enter">

                            </div>
                            <div class=" bottom-box-inner7">
                                <p style="padding:0; margin:0px;" class="color-red"><b>20 </b> Locality Name
                                </p>
                                <input style="border:1px solid black;" class="input" type="text"
                                    placeholder="Please Enter">

                            </div>


                        </div>
                    </div>



                    <div class="container" style="max-width: 1452px;">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="w2p">Form<span style="font-size: 47px;">W-2</span>
                                    <span style="font-size: 26px;">Wage and Tax Statement</span>
                                </p>
                                <p class="w2p">
                                    <span style="font-size: 18px; font-weight: 900;">Copy A-For Social Security
                                        Administration.</span>
                                    <span style="font-weight: 500; font-size: 17px;"> Send this entire page with Form
                                        W-3 to
                                        the Social Security Administration; photocopies are<b> not</b>
                                        acceptable.</span>
                                </p>
                            </div>

                            <div class="col-md-2">
                                <p style="text-align: center;font-size: 54px; font-weight: 800;font-family: emoji;">2022
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="w2p" style="font-weight: 400; font-size: 16px;">Department of treasury -
                                    Internal
                                    revenue service</p>
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
            <div class="d-flex" style="justify-content: space-between; max-width:1450px; margin:0 auto;">



                <div class="text-left mt-4 ">
                    <a class="previewbtn btn btn-block" style="text-decoration:none;" href="{{ 'preview-pdf' }}"
                        target="_blank">Preview Below Check <i class="fa fa-eye"
                            style="font-size: 30px; margin-left: 7px;"></i> </a>


                </div>
                <div class="text-right mt-4 ">
                    <a class="emailbtn  btn btn-block" style="text-decoration:none;" target="_blank"
                        href="{{ 'generate-pdf' }}"> Download
                        <i class="fa fa-download ml-4" style="font-size:24px"></i> </a>
                </div>
            </div>
        </div>



    </section>
@endsection
