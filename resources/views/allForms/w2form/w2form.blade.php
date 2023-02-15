<!DOCTYPE html>
<html>

<head>
    <title>W2-FORM</title>
</head>
<style>
    table {
        width: 100%;
    }

    input {
        height: 20px;
    }

    td {
        font-size: 12px;
        color: red;
    }

    .watermark {
        position: absolute;
        width: 100%;
        height: 700px;
        top: 50px;
        left: 0px;
        right: 0;
        background-image: url("http://44.202.105.74/user/water.png");
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }

    p {
        margin: 0 !important;
        padding: 0 !important;
    }

    .left-table {
        width: 50% !important;
        float: left;


    }

    .left-table td {
        width: 160px;

    }

    .right-table {
        width: 50% !important;
        float: right;
        border-left: 2px solid red;

    }

    input {
        max-width: 140px;
        width: 100%;
    }

    .table-outer {
        height: 430px;
        border-bottom: 2px solid red;
        width: 100%;

    }

    .bottom-number {
        font-size: 16px;
        color: black;
        font-weight: 700;
        padding-bottom: 10px !important;

    }


    .bg-img2 {
        position: relative;
    }

</style>

<body>
    <main class="bg-img2">
        @guest
        <div class="watermark"></div>
        @endguest
        @auth
        @if(Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
        <div class="watermark"></div>
        @endif
        @endauth
        <section style=" border:2px solid red;">
            <div class="watermark">
            </div>
            <table style="border-bottom:3px solid red;">
                <tr>
                    <td style="width: 15%;border-right:1px solid red; padding-left:20px; font-weight:bold; font-size:15px; color:black;"> 22222 </td>

                    <td class="" style=" width:23%; text-align:center;">
                        <label style="padding-right:20px; position:relative; bottom:10px; font-size:15px;" for="vehicle1" class="w2p box-p"> VOID</label>
                        <input style="width: 25px; height:25px; border:1px solid grey; border-radius:2px;position:relative; top:6px;" type="text">
                    </td>
                    <td class="" style="border: 3px solid red;  width:37%;padding-left:17px;">
                        <p style="font-size:15px;text-align:center;" class="w2p"><b>a</b> Employee's social security number </p>
                        <p class="bottom-number">{{ $requestData['company_ssn'] }}</p>
                    </td>
                    <td class="" style="width:25%; padding-left:20px; font-size:15px;">
                        <p class="w2p">For offical use only <i class="fa fa-play" aria-hidden="true"></i></p>
                        <p class="w2p">OMB No. 1545-0008</p>
                    </td>
                </tr>
            </table>
            <section class="table-outer">
                <table class="left-table" style="">
                    <tr style=" width:100%;">
                        <td colspan="3" class="width-small"><b>b</b> Employer Identification Number (EIN)</td>
                    </tr>
                    <tr style="border-bottom:2px solid red; width:100%;">
                        <td style="border-bottom:2px solid red;" colspan="3">
                            <p class="bottom-number">{{ $requestData['company_in'] }}</p>
                        </td>

                    </tr>
                    <tr>
                        <td><b>c</b> Employer's Name, Address, Zipcode</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 2px solid red" colspan="3">
                            <p style="" class="bottom-number">{{ $requestData['company_in'] }}<br>{{ $requestData['company_address'] }}</p>
                        </td>
                    </tr>
                    <thead style=" width:100%">
                        <td><b>d</b> Control Number</td>
                    </thead>
                    <thead style="border-bottom:2px solid red; width:100%;">
                        <p class="bottom-number">{{ $requestData['control_number'] }}</p>
                    </thead>
                    <thead style="width:100%;  border-top:2px solid red;">
                        <td style="width:40%; border-right:2px solid red">
                            <p><b>e </b>Employee's First Name Initial</p>
                            <p class="bottom-number">{{ $requestData['emp_first_name'] }}</p>
                        </td>
                        <td style="width:40%;border-right:2px solid red">
                            <p>Last Name</p>
                            <p class="bottom-number">{{ $requestData['emp_last_name'] }}</p>
                        </td>
                        <td style="width:20%;">
                            <p>Suff.</p>
                            <input style="border:none;height: 20px;width:20px; " type="text" id="fname" name="fname" placeholder="enter text" class="w-100 ">
                        </td>
                    </thead>
                    <tr>
                        <td style="border-top:2px dashed red;" colspan="3">
                            <p style="padding-top:15px !important;" class="bottom-number">{{ $requestData['emp_address'] }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td><b>f</b> Employee's Address, Zipcode</td>
                    </tr>
                </table>
                <table class="right-table">
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red;">
                            <p><b>1</b>Wages, Tips, Other compensation </p>
                            <p class="bottom-number">{{ number_format($requestData['wages'],2) }}</p>
                        </td>
                        <td>
                            <p><b>2 </b>Fedral Income Tax Field</p>
                            <<p class="bottom-number">{{ number_format($requestData['federal_tax'],2) }}</p>
                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red;">
                            <p><b>3</b>Social Security Wages </p>
                            <p class="bottom-number">{{ number_format($requestData['ss_wages'],2) }}</p>
                        </td>
                        <td>
                            <p><b>4 </b> Social Security tax withheld</p>
                            <p class="bottom-number">{{ number_format($requestData['ss_tax'],2) }}</p>
                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red;">
                            <p><b>5</b> Medicare Wages &amp; tips </p>
                            <p class="bottom-number">{{ number_format($requestData['medicare_wages'],2) }}</p>
                        </td>
                        <td>
                            <p><b>6 </b>Medicare tax withheld</p>
                            <p class="bottom-number">{{ number_format($requestData['medicare_tax'],2) }}</p>
                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red;">
                            <p><b>7</b> Social Security tips </p>
                            <p class="bottom-number">{{ $requestData['ss_tips'] }}</p>
                        </td>
                        <td>
                            <p><b>8 </b> Allocated tips</p>
                            <p class="bottom-number">{{ $requestData['allocated_tips'] }}</p>
                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red; ">
                        <td style="border-right:2px solid red;">
                            <p style=""><b>9 </b> Verification code</p>
                            <p class="bottom-number">{{ $requestData['medicare_tax'] }}</p>
                        </td>
                        <td>
                            <p><b>10 </b> Dependent care benefits</p>
                            <p class="bottom-number">{{ $requestData['dependent_care'] }}</p>
                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red;">
                            <p><b>11</b> Nonqualified plans</p>
                            <p class="bottom-number">{{ $requestData['nonqualified'] }}</p>
                        </td>
                        <td style="position: relative;">
                            <p><b>12a </b>See Instructions box 12</p>
                            <span style="position:absolute; top:15px; z-index:2;"><img style="width:5px !important;" src="images/code.png"></span>
                            <div style=" margin-left:20px;"><span style="font-size: 16px; color:black;">{{ $requestData['pie_1'] }}</span>&nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-size: 16px; color:black;" class="bottom-number">{{ number_format($requestData['instructions_box_1'],2) }}</span>
                            </div>

                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red; ">
                            <p><b>13</b></p>
                            <div style="">
                                <input class="checkbox-sqaure" type="checkbox" id="vehicle1" name="statury_emp" value="Bike">
                                <p style="float: left; position:relative; left:20px; top:2px;">statury employee</p>
                            </div>
                            <div style="">

                                <input class="checkbox-sqaure" type="checkbox" id="vehicle1" name="statury_emp" value="Bike">
                                <p style="float: left;position:relative; left:20px; top:2px;">Retirement plan</p>
                            </div>
                            <div style="  ">

                                <input style="" class="checkbox-sqaure" type="checkbox" id="vehicle1" name="statury_emp" value="Bike">
                                <p style="float: left;position:relative; left:20px; top:2px;">Third party sick pay</p>
                            </div>

                        </td>
                        <td style="margin:0; padding:0;position: relative;">
                            <p style=""><b>12b </b></p>
                            <span style="position:absolute; top:40px; z-index:2;"><img style="width:6px !important;" src="images/code.png"></span>
                            <div style=" margin-left:20px;"><span style="font-size: 16px; color:black;">{{ $requestData['pie_2'] }}</span>&nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-size: 16px; color:black;" class="bottom-number">{{ number_format($requestData['instructions_box_2'],2) }}</span>
                            </div>

                        </td>
                    </thead>
                    <tr style="">
                        <td style="border-right:2px solid red;">
                            <p><b>14 </b>Other</p>
                            <textarea style="height: 15%;" name="text" id="" cols="30" rows="10"></textarea>

                        </td>
                        <td style="margin:0; padding:0;position: relative;">
                            <p style=""><b>12c </b></p>
                            <span style="position:absolute; top:15px; z-index:2;"><img style="width:5px !important;" src="images/code.png"></span>
                            <div style="padding-bottom:10px; margin-left:20px;"><span style="font-size: 16px; color:black;">{{ $requestData['pie_3'] }}</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp;<span style="font-size: 16px; color:black;" class="bottom-number">{{ number_format($requestData['instructions_box_3'],2) }}</span>
                            </div>
                            <div style="position: relative; border-top:2px solid red; border-bottom:2px solid red;">
                                <p style=""><b>12d</b></p>
                                <span style="position:absolute; top:15px; z-index:2;"><img style="width:5px !important;" src="images/code.png"></span>
                                <div style="padding-bottom:10px; margin-left:20px;"><span style="font-size: 16px; color:black;">{{ $requestData['pie_4'] }}</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;<span style="font-size: 16px; color:black;" class="bottom-number">{{ number_format($requestData['instructions_box_4'],2) }}</span>
                                </div>
                            </div>
                            <div style="background-color:pink; padding:15px;">

                            </div>
                        </td>
                    </tr>
                </table>
            </section>
            <table style="border-bottom:2px dashed red;">
                <tr>
                    <td style="border-right:2px solid red; width:62px; ">
                        <p><b>15 </b> State</p>
                        <p style="font-size: 13px;" class="bottom-number">{{ $requestData['state'] }}</p>
                    </td>
                    <td style="border-right:2px solid red; width:137px; ">
                        <p>Employee's state id number</p>
                        <p style="font-size: 13px;" class="bottom-number">{{ $requestData['employee_state_id'] }}</p>
                    </td>
                    <td style="border-right:2px solid red; width:98px; ">
                        <p><b>16 </b>State,wages tips</p>
                        <p style="font-size: 13px;" class="bottom-number">{{ number_format($requestData['state_wages'],2) }}</p>
                    </td>
                    <td style="border-right:2px solid red; width:80px; ">
                        <p><b>17 </b>State income tax</p>
                        <p style="font-size: 13px;" class="bottom-number">{{ number_format($requestData['state_income_tax'],2) }}</p>
                    </td>
                    <td style="border-right:2px solid red;width:80px;">
                        <p><b>18 </b>Local, wages, tips</p>
                        <p style="font-size: 13px;" class="bottom-number">{{ number_format($requestData['local_wages'],2) }}</p>
                    </td>
                    <td style="border-right:2px solid red; width:80px;">
                        <p><b>19 </b>Local income tax</p>
                        <p style="font-size: 13px;" class="bottom-number">{{ number_format($requestData['local_income_tax'],2) }}</p>
                    </td>
                    <td style=" width:82px;">
                        <p><b>20 </b>Locality Name</p>
                        <p style="font-size: 13px;" class="bottom-number">CLEVELAND</p>
                    </td>
                </tr>
            </table>
            <table style="">
                <tr>
                    <td style="border-right:2px solid red; padding:20px 0px; width:62px;">

                    </td>
                    <td style="border-right:2px solid red; width:137px; ">

                    </td>
                    <td style="border-right:2px solid red; width:98px; ">

                    </td>
                    <td style="border-right:2px solid red; width:80px ">
                    </td>
                    <td style="border-right:2px solid red;width:80px;">

                    </td>
                    <td style="border-right:2px solid red; width:82px">

                    </td>
                    <td style="width:80px;">

                    </td>
                </tr>
            </table>

        </section>


        <table style="margin-top:20px;">
            <tr>
                <td style="width:40%;text-align:left;">
                    <p class="w2p">Form<span style="font-size: 25px;">W-2</span>
                        <span style="font-size: 18px;">Wage and Tax Statement</span>
                    </p>
                    <p class="w2p">
                        <span style="font-size: 14px; font-weight: 900;">Copy A-For Social Security
                            Administration.</span>
                        <span style="font-weight: 400; font-size: 14px;"> Send this entire page with Form W-3 to
                            the Social Security Administration; photocopies are<b> not</b>
                            acceptable.</span>
                    </p>
                </td>

                <td style="width:20%;">
                    <p style="text-align: center;font-size: 30px; font-weight: 800;font-family: emoji;">2022</p>
                </td>
                <td style="width:40%">
                    <p class="w2p" style="font-weight: 400; font-size: 15px;">Department of treasury - Internal
                        revenue service</p>
                    <p class="w2p" style="font-size: 14px;">For Privacy Act &amp; Paperwork Reduction </p>
                    <p class="w2p" style="font-size: 14px;">Act Notice, See the Seprate Instructions.</p><br>
                    <p class="w2p" style="text-align: right;font-size: 15px;">Cat.No. 10134D</p>
                </td>
            </tr>

        </table>
        <table style="margin-top: 20px;">
            <tr>
                <td style="width: 100%; margin:0 auto;">
                    <h3 class="w2p" style="font-size:20px; text-align:center;">Do Not Cut, Fold Or Staple Form on
                        This
                        Page </h3>
                </td>
            </tr>
        </table>
    </main>


</body>

</html>
