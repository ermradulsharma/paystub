<!DOCTYPE html>
<html>

<head>
    <title>W2-FORM</title>
</head>
<style>
    .w2p {
        margin: 0;
        color: red;
        font-weight: 700;
        font-size: 12px;
    }

    table {
        width: 100%;
    }

    input {
        height: 20px;
    }

    .watermark {
        position: absolute;
        width: 100%;
        height: 700px;
        top: 50px;
        left: 0px;
        right: 0;
        background-image: url("http://44.202.105.74/user/watermark.png");
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<body>

    <section style=" border:2px solid red; padding-bottom:20px; position:relative;">
        <div class="watermark">
        </div>
        <table style="border-bottom:3px solid red;">
            <tr>

                <td style="width: 15%;border-right:1px solid red; padding-left:20px; font-weight:bold;">22222

                </td>

                <td class="" style="border-right:5px solid red; width:20%; text-align:center;">
                    <label style="padding-right:20px; position:relative; bottom:10px;" for="vehicle1" class="w2p box-p">
                        VOID</label>
                    <input
                        style="width: 25px; height:25px; border:1px solid grey; border-radius:2px;position:relative; top:6px;"
                        type="text">
                </td>
                <td class="" style="border-right: 5px solid red;  width:40%;padding-left:17px;">
                    <p class="w2p">a Employee's social security number</p>
                    <input style="height: 20px; color:grey;" type="text" id="fname" name="fname"
                        placeholder="enter text" class="w-100 p-2 mb-3"><br>
                </td>
                <td class="" style="width:25%; padding-left:20px;">
                    <p class="w2p">For offical use only <i class="fa fa-play" aria-hidden="true"></i></p>
                    <p class="w2p">OMB No. 1545-0008</p>
                </td>
            </tr>
        </table>

        <table>
            <tr>

                <td style="width:25%;">
                    <p class="w2p">b Employer Identification Number (EIN)</p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=" "><br>
                </td>
                <td style="width:25%;">
                    <p class="w2p ">d Control Number</p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
                <td style="width:25%;">
                    <p class="w2p">e Employee's First Name &amp; Initial</p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
                <td style="width:25%;">
                    <p class="w2p">Last Name</p>
                    <input style="width:94%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width:50%;">
                    <p class="w2p">c Employer's Name, Address, Zipcode </p>
                    <textarea id="w3review" name="w3review" rows="4" cols="30" placeholder="Please Enter" class="w-100"></textarea>
                </td>

                <td style="width:50%;">
                    <p class="w2p">f Employee's Name, Address, Zipcode </p>
                    <textarea id="w3review" name="w3review" rows="4" cols="30" placeholder="Please Enter" class="w-100"></textarea>
                </td>

            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 25%">
                    <p class="w2p">1 Wages, Tips, Other compensation </p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
                <td style="width: 25%">
                    <p class="w2p">2 Fedral Income Tax Field</p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>

                <td style="width: 25%">
                    <p class="w2p">3 Social Security Wages </p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>

                <td style="width: 25%">
                    <p class="w2p">4 Social Security tax withheld</p>
                    <input style="width:94%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
            </tr>
            <tr>
                <td style="width: 25%">
                    <p class="w2p">5 Medicare Wages &amp; tips</p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
                <td style="width: 25%">
                    <p class="w2p">6 Medicare tax withheld</p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>

                <td style="width: 25%">
                    <p class="w2p">7 Social Security tips </p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>

                <td style="width: 25%">
                    <p class="w2p">8 Allocated tips</p>
                    <input style="width:94%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
            </tr>
        </table>
        <table>
            <tr style="width: 100%;">
                <td style="width: 33.33%">
                    <p class="w2p">9 Disabled</p>
                    <input style="width:95%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
                <td style="width: 33.33%">
                    <p class="w2p">10 Dependent care benefits</p>
                    <input style="width:95%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>

                <td style="width: 33.33%">
                    <p class="w2p">11 Nonqualified plans</p>
                    <input style="width:95%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>

            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 25%; position: relative;">
                    <p class="w2p">12a See Instructions box 12</p>
                    <span
                        style=" color:black;font-size:11px;padding:5px;position: absolute; top:17.7px; background-color:#D3D3D3; border:1px solid azure; border-radius:3px;"
                        class="input-group-text">PIE</span>
                    <input style="width:93%;" type="text" id="fname" name="fname"
                        placeholder="enter text">

                </td>
                <td style="width: 25%;position: relative;">
                    <p class="w2p">12b </p>

                    <span
                        style=" color:black;font-size:11px;padding:5px;position: absolute; top:17.7px; background-color:#D3D3D3; border:1px solid azure; border-radius:3px;"
                        class="input-group-text">PIE</span>
                    <input style="width:93%;" type="text" id="fname" name="fname"
                        placeholder="enter text">
                </td>

                <td style="width: 25%;position: relative;">
                    <p class="w2p">12c </p>

                    <span
                        style=" color:black;font-size:11px;padding:5px;position: absolute; top:17.7px; background-color:#D3D3D3; border:1px solid azure; border-radius:3px;"
                        class="input-group-text">PIE</span>
                    <input style="width:93%;" type="text" id="fname" name="fname"
                        placeholder="enter text">

                </td>

                <td style="width: 25%;position: relative;">
                    <p class="w2p">12d </p>

                    <span
                        style=" color:black;font-size:11px;padding:5px;position: absolute; top:17.7px; background-color:#D3D3D3; border:1px solid azure; border-radius:3px;"
                        class="input-group-text">PIE</span>
                    <input style="width:93%;" type="text" id="fname" name="fname"
                        placeholder="enter text">

                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 17%">
                    <input style="position: relative; top:4px;" type="checkbox" id="vehicle1" name="vehicle1"
                        value="Bike">
                    <label style="font-size: 10px;" for="vehicle1 " class="w2p"> Statutory Employee</label><br>
                </td>
                <td style="width: 17%">
                    <input style="position: relative; top:4px;" type="checkbox" id="vehicle1" name="vehicle1"
                        value="Bike">
                    <label style="font-size: 10px; for="vehicle1" class="w2p"> Retirement Plan</label><br>
                </td>
                <td style="width: 17%">
                    <input style="position: relative; top:4px;" type="checkbox" id="vehicle1" name="vehicle1"
                        value="Bike">
                    <label style="font-size: 10px;" for="vehicle1" class="w2p"> Third-party Sick Pay</label><br>
                </td>
                <td style="width: 40%">
                    <p class="w2p">14 Other </p>
                    <textarea style="width:96%;" id="w3review" name="w3review" rows="4" cols="30"
                        placeholder="Please Enter"></textarea>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 25%">
                    <p class="w2p">15 State</p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
                <td style="width: 25%">
                    <p class="w2p">Employer's State ID Number</p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>

                <td style="width: 25%">
                    <p class="w2p">16 State wages, tips, etc.</p>
                    <input style="width:93%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>

                <td style="width: 25%">
                    <p class="w2p">17 State Income Tax</p>
                    <input style="width:94%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
            </tr>
        </table>
        <table>
            <tr style="width: 100%;">
                <td style="width: 33.33%">
                    <p class="w2p">18 Local Wages Tips etc</p>
                    <input style="width:95%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>
                <td style="width: 33.33%">
                    <p class="w2p">19 Local Income Tax</p>
                    <input style="width:95%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
                </td>

                <td style="width: 33.33%">
                    <p class="w2p">20 Localitiy Name</p>
                    <input style="width:95%;" type="text" id="fname" name="fname" placeholder="enter text"
                        class=""><br>
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
                <h3 class="w2p" style="font-size:20px; text-align:center;">Do Not Cut, Fold Or Staple Form on This
                    Page </h3>
            </td>
        </tr>
    </table>
</body>

</html>
