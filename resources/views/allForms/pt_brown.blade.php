<!DOCTYPE html>
<html lang="en">

<head>

    <title>pt_green Document</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 10px;
    }

    th,
    td {
        text-align: left;
        padding: 2px;
    }

    .bb {
        border: 1px solid red;
    }

    th {
        background-color: #793b5b;
        color: white;
    }

    .hadding {
        background-color: #793b5b;
        font-size: 9px;
        padding: 4px;
    }

    .top {
        margin-top: 80px;

    }

    th,
    tr {
        border: 1px solid #afaec5;
        border-collapse: collapse;
    }

    thead {
        border: 2px solid #afaec5;
    }

    #backcolor {
        background-color: #793b5b47;

    }

    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .roww {
        border: 1px solid #793b5b47;
    }

    .col1 {
        float: left;
        width: 60%;
    }
;
    .col2 {
        float: left;
        width: 40%;
    }
    .container {
        background-image: url('http://44.202.105.74/images/bg-brown.jpeg') !important;
        background-size:cover;
        background-repeat:no-repeat;
        width:100%;
        position: relative;
    }
    .container:before {
        content:"";
        position: absolute;
        top:0;
        left: 0;
        right: 0;
        background-image: url('http://44.202.105.74/images/watermark.png') !important;
        /* background-image: url('http://44.202.105.74/images/bg-blue.jpeg') !important;
        background-image: url('http://44.202.105.74/images/bg-green.jpeg') !important; */
    }
</style>

<body>




    <div class="container"
        style="border-right: 1px solid   #793b5b; margin: auto;border-top: 1px solid   #793b5b; border-left: 1px solid   #793b5b; border-bottom:none;padding: 0 0px 0px 0px;">
        <div class="row" style="display: flex; display: flex;justify-content: space-between;padding: 0px 14px;">
            <div style="width: 60%;float:left; padding-left:40px;">
                <h6 style="font-size: 17px; margin-bottom: 0;"> {{ $requestData['cname'] }}</h6>
                <p style="font-size: 14px; margin: 0;"> {{ $requestData['address_1'] }}
                    {{ $requestData['address_2'] }}</br>{{ $requestData['city'] }}
                    {{ $requestData['state'] }},
                    {{ $requestData['zip_code'] }}</p>


            </div>
            <div style="width: 40%;float:right">
                <h6 style="font-size: 15px; margin-bottom: 0;">Advice Number: <span>00000422598</span>
                </h6>
                <br>
                <P style="font-size: 14px;margin: 0;">
                    <span style="font-weight:800;">Check Nuumber:</span> 1775
                </P>
                <P style="font-size: 14px;margin: 0;">
                    <span style="font-weight:800;">Date:</span>
                    {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                </P>
            </div>
        </div>
        <!-- <div style="width: 50%; display: flex; justify-content: flex-end;justify-content: space-between;margin: 1000px 0 0 auto; FONT-SIZE: 15px; margin-top:0;padding: 0 0px;">

            <span style="margin: 0;">Account Number</span>


            <span style="margin: 0;">Transit ABA</span>


            <span style="margin: 0;">Amount</span>

        </div> -->

        <div
            style="width: 90%; margin: 30px auto 0px;font-size: 15px;padding: 0 30px;">
           <span style="padding-bottom:20px;">Pay To:<b>Ezra Moore</b></span>
            <span style="margin: 0; float:right;">Amount</span>


            <span style="margin: 0; float:right; padding-left:10px; margin-right: 11px;">Transit ABA</span>


            <span style="margin: 0; float:right;padding-left:10px; margin-right: 11px;">Account Number</span>
            <hr style="margin-top: 5px;">

            <span
                style="margin: 0;float:right; margin-right: 23px; ">{{ $requestData['currency'] }}{{ $requestData['total_net_pay'] }}XXX</span>


            <span style="margin: 0;float:right; margin-right: 40px;">{{ $requestData['transit_aba_number'] }}XX</span>


            <span style="margin: 0;float:right; margin-right: 40px;">{{ $requestData['account_number_last_4'] }}XXXX</span>

        </div>
        <div
            style="width: 50%;FONT-SIZE: 17px; margin: 0px 0 0 150px;">
            <div style="padding:40px 0px 20px;">
                <b>
                    <p style="margin: 0px 0 0 0; font-size: 12px; font-weight:500;">{{ $requestData['emp_name'] }}</p>
                </b>
                <P style="margin: 0px 0 0 0; font-size:  13px;">282 65 AVE</P>
                <p style="margin: 0px 0 0 0;font-size: 13px;">{{ $requestData['address_1'] }}
                    {{ $requestData['city'] }}
                    {{ $requestData['state'] }},
                    {{ $requestData['zip_code'] }}</p>
            </div>
        </div>
        <div style="width: 100%;  background-color: #793b5b; text-align: center; color: aliceblue; font-size: 14px;">
            <p style="margin: 0;">THE FACE OF THIS DOCUMNET HAS A COLOURED BACKGROUND-NOT A WHITE BACKGROUND</p>
        </div>
    </div>

    <table class="top">
        <td colspan="" style="border: 1px solid white;text-align: center; color: #793b5b;">----DETATCH ALONG
            PERFORMATION-----------</td>



        <td style="border: 1px solid white; text-align: center; color: #793b5b;">----KEEP LOWER PART FOR YOUR
            RECODE-----------</td>

    </table>


    <table class="top">
        <tr>
            <th colspan="" class="hadding">EMPLOYEE NAME</th>
            <th class="hadding">COMPANY NAME</th>
            <th class="hadding">CLIENT NO.</th>
            <th class="hadding">EMP NO.</th>
            <th class="hadding">SOCIAL SECURITY NO.</th>
            <th class="hadding">CHECK DATE</th>
            <th class="hadding">CHECK NO.</th>



        </tr>

        <tr>
            <td> {{ $requestData['emp_name'] }}</td>
            <td
                style="
                border-right: 1px solid #afaec5;
                border-left: 1px solid #afaec5;
            ">
                {{ $requestData['cname'] }}</td>
            <td>{{ $requestData['emp_ssn'] }} </td>
            <td
                style="
                border-right: 1px solid #afaec5;
                border-left: 1px solid #afaec5;
            ">
                {{ $requestData['emp_id'] }}</td>
            <td>{{ $requestData['emp_ssn'] }} </td>
            <td
                style="
                border-right: 1px solid #afaec5;
                border-left: 1px solid #afaec5;
            ">
                {{ date('m d, Y', strtotime($requestData['pay_date'])) }}</td>
            <td>1877</td>

        </tr>
    </table>

    <table>
        <tr>
            <th class="hadding" style="colspan: 3;"></th>
            <th class="hadding">GROSS PAY</th>
            <th class="hadding">TIPS & NON-PAY</th>
            <th class="hadding">TAXES</th>
            <th class="hadding">DEDUCTIONS</th>
            <th class="hadding">NET PAY AFTER TAX</th>
            <th class="hadding">DR.DEPOSITE</th>
            <th class="hadding">CHECK AMT.</th>
            <th class="hadding">FED.TAXABLE</th>
        </tr>
        <tr style="background-color: #f2f2f2;">
            <td style="color: #545464;border-right: 1px solid #afaec5;">THIS CHECK</td>
            <td>{{ $requestData['currency'] }}{{ $requestData['period_gross_total'] }}</td>
            <td
                style="
                border-right: 1px solid #afaec5;
                border-left: 1px solid #afaec5;
            ">
                0.00</td>
            <td>{{ $requestData['currency'] }}{{ $requestData['deduction_tax'] }}</td>
            <td
                style="
                border-right: 1px solid #afaec5;
                border-left: 1px solid #afaec5;
            ">
                0.00</td>
            <td>{{ $requestData['currency'] }}{{ $requestData['total_net_pay'] }}</td>
            <td
                style="
                border-right: 1px solid #afaec5;
                border-left: 1px solid #afaec5;
            ">
                0.00</td>
            <td>{{ $requestData['currency'] }}{{ $requestData['total_net_pay'] }}</td>
            <td style="border-left: 1px solid #afaec5;
            ">{{ $requestData['currency'] }}2,500.00</td>
        </tr>

        <tr>
            <td style="color: #545464;border-right: 1px solid #afaec5;">YEAR-TO-DATE</td>
            <td> {{ $requestData['currency'] }}{{ $requestData['ytd_gross_total'] }}</td>
            <td
                style="
                border-right: 1px solid #afaec5;
                border-left: 1px solid #afaec5;
            ">
                0.00</td>
            <td>{{ $requestData['currency'] }}{{ $requestData['ytd_deduction_tax'] }}</td>
            <td
                style="
                border-right: 1px solid #afaec5;
                border-left: 1px solid #afaec5;
            ">
                0.00</td>
            <td>{{ $requestData['currency'] }}{{ $requestData['total_ytd_net_pay'] }}</td>
            <td
                style="
                border-right: 1px solid #afaec5;
                border-left: 1px solid #afaec5;
            ">
                0.00</td>
            <td>{{ $requestData['currency'] }}{{ $requestData['total_ytd_net_pay'] }}</td>
            <td style="
                border-left: 1px solid #afaec5;
            ">
                {{ $requestData['currency'] }}2,500.00</td>
        </tr>
    </table>
    <table>
        <tr>

            <td> {{ $requestData['emp_street_1'] }},
                {{ $requestData['emp_street_2'] }} {{ $requestData['emp_city'] }}
                {{ $requestData['emp_state'] }},
                {{ $requestData['emp_zip_code'] }}</td>


            <td><b>Pay Period: {{ date('m/d/y', strtotime($requestData['pay_start'])) }}</b></td>
            <td><b>{{ date('l m/d/y', strtotime($requestData['pay_end'])) }}</b></td>
        </tr>
    </table>

    <section>
        <div></div>



        <div class="row roww">
            <div class="col1">
                <table style="width: 100%;">
                    <thead id="backcolor">
                        <td style="font-size:9px; border-right:1px solid  #afaec5;">WAGES</td>
                        <td style="border-right:1px solid  #afaec5;">RATE</td>
                        <td style="font-size:9px;">HOURS</td>
                        <td style="font-size:9px;"> AMOUNT <br>THIS CHECK</td>
                        <td style="font-size:9px;">AMOUNT<br> YEAR-TO-DATE</td>
                    </thead>
                    <tbody>
                        @foreach ($requestData['earning'] as $key => $earn)
                            <tr style="border: none;">
                                <td>{{ $earn }}</td>
                                <td>{{ $requestData['currency'] }}{{ $requestData['rate'][$key] }}</td>
                                <td>{{ $requestData['hours'][$key] }}</td>
                                <td>{{ $requestData['currency'] }} {{ $requestData['period'][$key] }}</td>
                                <td>{{ $requestData['currency'] }} {{ $requestData['ytd_total'][$key] }}</td>
                            </tr>
                        @endforeach
                        <tr style="border: none;">
                            <td colspan="3" style="text-align:left;">Total Wages</td>
                            <td>{{ $requestData['currency'] }}{{ $requestData['period_gross_total'] }}</td>
                            <td>{{ $requestData['currency'] }}{{ $requestData['ytd_gross_total'] }}</td>

                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="col2">
                <table style="width: 100%;">


                    <thead id="backcolor">
                        <td style="font-size:9px;">DEDUCTIONS & TAXES</td>
                        <td style="font-size:9px;">AMOUNT<br>THIS CHECK</td>
                        <td style="border-right: none !important;   border-collapse: collapse;font-size:9px;">AMOUNT
                            <br>YEAR-TO-DATE
                        </td>
                    </thead>

                    <tbody style="border-left: 2px solid #afaec5; ">
                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                            <tr style="border:none;">
                                <td>{{ $taxes }}</td>
                                <td>{{ $requestData['currency'] }} {{ $requestData['taxes_rate'][$key] }}</td>
                                <td>{{ $requestData['currency'] }}
                                    {{ $requestData['taxes_ytd'][$key] }}</td>
                            </tr>
                        @endforeach

                        @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                            <tr style="border:none;">
                                <td>{{ $tax_deduction }}</td>
                                <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}
                                </td>
                                <td>{{ $requestData['currency'] }}
                                    {{ $requestData['ytd_tax_deduction'][$key] }}</td>
                            </tr>
                        @endforeach
                        <tr style="border:none;">
                            <td>Total Taxes</td>
                            <td>{{ $requestData['currency'] }}{{ $requestData['deduction_tax'] }}</td>
                            <td>{{ $requestData['currency'] }}{{ $requestData['ytd_deduction_tax'] }}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>



    </section>





</body>

</html>
