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
        font-size: 10px;
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
        height: 478px;
        border-bottom: 2px solid red;
        width: 100%;

    }

</style>

<body>
    <main class="bg-img2">
        <section style=" border:2px solid red;">
            <div class="watermark">
            </div>
            <table style="border-bottom:3px solid red;">
                <tr>

                    <td
                        style="width: 15%;border-right:1px solid red; padding-left:20px; font-weight:bold; font-size:15px; color:black;">
                        22222

                    </td>

                    <td class="" style=" width:23%; text-align:center;">
                        <label style="padding-right:20px; position:relative; bottom:10px; font-size:15px;" for="vehicle1"
                            class="w2p box-p">
                            VOID</label>
                        <input
                            style="width: 25px; height:25px; border:1px solid grey; border-radius:2px;position:relative; top:6px;"
                            type="text">
                    </td>
                    <td class="" style="border: 3px solid red;  width:37%;padding-left:17px;">
                        <p style="font-size:15px;text-align:center;" class="w2p">a Employee's social security number
                        </p>
                        <input
                            style="height: 20px; color:grey; display:flex; justify-content:center; max-width:170px; margin:0 auto;"
                            type="text" id="fname" name="fname" placeholder="enter text"
                            class="w-100 p-2 mb-3">

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
                        <td class="width-small"><b>b</b> Employer Identification Number (EIN)</td>

                    </tr>
                    <thead style="border-bottom:2px solid red; width:100%;">
                        <input style="height: 20px; color:grey; width:100%;" type="text" id="fname" name="fname"
                            placeholder="enter text" class="w-100 p-2 mb-3">
                    </thead>
                    <tr>
                        <td><b>c</b> Employer's Name, Address, Zipcode</td>
                    </tr>
                    <thead style="border-bottom:2px solid red; width:100%; ">
                        <td style="">
                            <textarea style="height:150px !important;" name="company_address" class="w2-textarea" style="padding-left:10px;" id="w3review" name="w3review"
                                rows="5" cols="80" placeholder="Please Enter"></textarea>
                        </td>
                    </thead>
                    <thead style=" width:100%">
                        <td><b>d</b> Control Number</td>

                    </thead>
                    <thead style="border-bottom:2px solid red; width:100%;">
                        <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                            placeholder="enter text" class="w-100 p-2 mb-3">
                    </thead>
                    <thead style="width:100%;  border-top:2px solid red;">
                        <td style="width:40%;">
                            <p><b>e </b>Employee's First Name Initial</p>
                            <input style="height: 20px; color:grey; width:140px; " type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                        <td style="width:40%;">
                            <p>Last Name</p>
                            <input style="height: 20px; color:grey; width:140px; " type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                        <td style="width:20%;">
                            <p>Suff.</p>
                            <input style="border:none;height: 20px;width:20px; " type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>



                    </thead>
                    <tr>
                        <td style="">
                            <textarea class="textarea" name="company_address" class="w2-textarea" style="padding-left:10px;" id="w3review"
                                name="w3review" rows="5" cols="80" placeholder="Please Enter"></textarea>
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
                            <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                        <td>
                            <p><b>2 </b>Fedral Income Tax Field</p>
                            <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red;">
                            <p><b>3</b>Social Security Wages </p>
                            <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                        <td>
                            <p><b>4 </b> Social Security tax withheld</p>
                            <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red;">
                            <p><b>5</b> Medicare Wages &amp; tips </p>
                            <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                        <td>
                            <p><b>6 </b>Medicare tax withheld</p>
                            <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red;">
                            <p><b>7</b> Social Security tips </p>
                            <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                        <td>
                            <p><b>8 </b> Allocated tips</p>
                            <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red; ">
                        <td
                            style="border-right:2px solid red;background-color:pink;padding:10px 0px; position:relative;">
                            <p style="position: absolute; top:10px;left:0px;"><b
                                    style="background-color:white; padding:10px;">9</b></p>

                        </td>
                        <td>
                            <p><b>10 </b> Dependent care benefits</p>
                            <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red;">
                            <p><b>11</b> Nonqualified plans</p>
                            <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                                placeholder="enter text" class="w-100 p-2 mb-3">
                        </td>
                        <td style="position: relative;">
                            <p><b>12a </b>See Instructions box 12</p>
                            <span style="position:absolute; top:15px; z-index:2;"><img style="width:7px !important;"
                                    src="images/code.png"></span>
                            <div style=" margin-left:20px;"><span
                                    style="background-color: #8080801f; color:black; font-size:12px; border:1px solid #8080801f; padding:4.5px; position: absolute; top:15.5px; left:13px; z-index:2;">PIE</span><input
                                    style="" style=" position:relative; left:-9px;height: 20px; color:grey;"
                                    type="text" id="fname" name="fname" placeholder="enter text"
                                    class="">
                            </div>

                        </td>
                    </thead>
                    <thead style="border-bottom:2px solid red;">
                        <td style="border-right:2px solid red; padding-bottom:25px;">
                            <p><b>13</b></p>
                            <div style="float:left;">
                                <p>statury employee</p><input class="checkbox-sqaure" type="checkbox" id="vehicle1"
                                    name="statury_emp" value="Bike">
                            </div>
                            <div style="float: right;">
                                <p>Retirement plan</p><input class="checkbox-sqaure" type="checkbox" id="vehicle1"
                                    name="statury_emp" value="Bike">
                            </div>
                            <div style=" padding-bottom:10px;position: relative; top:30px;">
                                <p>Third party sick pay</p><input class="checkbox-sqaure" type="checkbox"
                                    id="vehicle1" name="statury_emp" value="Bike">
                            </div>

                        </td>
                        <td style="margin:0; padding:0;position: relative;">
                            <p style=""><b>12b </b></p>
                            <span style="position:absolute; top:35px; z-index:2;"><img style="width:7px !important;"
                                    src="images/code.png"></span>
                            <div style=" margin-left:20px;"><span
                                    style="background-color: #8080801f; color:black; font-size:12px; border:1px solid #8080801f; padding:4.5px; position: absolute; top:15.5px; left:13px; z-index:2;">PIE</span><input
                                    style="" style=" position:relative; left:-9px;height: 20px; color:grey;"
                                    type="text" id="fname" name="fname" placeholder="enter text"
                                    class="">
                            </div>

                        </td>
                    </thead>
                    <thead style="">
                        <td style="border-right:2px solid red;">
                            <p><b>14 </b>Other</p>
                            {{-- <textarea name="company_address" class="w2-textarea" style="padding-left:10px;" id="w3review" name="w3review"
                                rows="5" cols="80" placeholder="Please Enter"></textarea> --}}
                            <div style="height: 95px;border:1px solid grey"></div>

                        </td>
                        <td style="margin:0; padding:0;position: relative;">
                            <p style=""><b>12c </b></p>
                            <span style="position:absolute; top:20px; z-index:2;"><img style="width:7px !important;"
                                    src="images/code.png"></span>
                            <div style=" margin-left:20px;"><span
                                    style="background-color: #8080801f; color:black; font-size:12px; border:1px solid #8080801f; padding:4.5px; position: absolute; top:15.5px; left:13px; z-index:2;">PIE</span><input
                                    style="" style=" position:relative; left:-9px;height: 20px; color:grey;"
                                    type="text" id="fname" name="fname" placeholder="enter text"
                                    class="">
                            </div>
                            <div style="position: relative; border-top:2px solid red; border-bottom:2px solid red;">
                                <p style=""><b>12d</b></p>
                                <span style="position:absolute; top:15px; z-index:2;"><img
                                        style="width:7px !important;" src="images/code.png"></span>
                                <div style=" margin-left:20px;"><span
                                        style="background-color: #8080801f; color:black; font-size:12px; border:1px solid #8080801f; padding:4.5px; position: absolute; top:15.5px; left:13px; z-index:2;">PIE</span><input
                                        style="" style=" position:relative; left:-9px;height: 20px; color:grey;"
                                        type="text" id="fname" name="fname" placeholder="enter text"
                                        class="">
                                </div>
                            </div>
                            <div style="background-color:pink; padding:15px;">

                            </div>
                        </td>
                    </thead>
                </table>
            </section>
            <table style="border-bottom:2px dashed red;">
                <tr>
                    <td style="border-right:2px solid red; ">
                        <p><b>15 </b> State</p>
                        <input style="height: 20px; color:grey; width:30px;" type="text" id="fname"
                            name="fname" placeholder="enter text" class="w-100 p-2 mb-3">
                    </td>
                    <td style="border-right:2px solid red; ">
                        <p>Employee's state id number</p>
                        <input style="height: 20px; color:grey; width:140px;" type="text" id="fname"
                            name="fname" placeholder="enter text" class="w-100 p-2 mb-3">
                    </td>
                    <td style="border-right:2px solid red; ">
                        <p><b>16 </b>State,wages tips</p>
                        <input style="height: 20px; color:grey; width:100px;" type="text" id="fname"
                            name="fname" placeholder="enter text" class="w-100 p-2 mb-3">
                    </td>
                    <td style="border-right:2px solid red; ">
                        <p><b>17 </b>State income tax</p>
                        <input style="height: 20px; color:grey;width:80px;" type="text" id="fname"
                            name="fname" placeholder="enter text" class="w-100 p-2 mb-3">
                    </td>
                    <td style="border-right:2px solid red;width:14%;">
                        <p><b>18 </b>Local, wages, tips</p>
                        <input style="height: 20px; color:grey;width:80px;" type="text" id="fname"
                            name="fname" placeholder="enter text" class="w-100 p-2 mb-3">
                    </td>
                    <td style="border-right:2px solid red;">
                        <p><b>19 </b>Local income tax</p>
                        <input style="height: 20px; color:grey;width:80px;" type="text" id="fname"
                            name="fname" placeholder="enter text" class="w-100 p-2 mb-3">
                    </td>
                    <td style="">
                        <p><b>20 </b>Locality Name</p>
                        <input style="height: 20px; color:grey;width:80px;" type="text" id="fname"
                            name="fname" placeholder="enter text" class="w-100 p-2 mb-3">
                    </td>
                </tr>
            </table>
            <table style="">
                <tr>
                    <td style="border-right:2px solid red; padding:20px 0px; width:38px;">

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
