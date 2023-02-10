<!DOCTYPE html>
<html lang="en">

<head>
    <title>pt_green Document</title>
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
            background-color: #43407a;
            color: white;
        }

        .hadding {
            background-color: #43407a;
            font-size: 9px;
            padding: 4px;
        }

        .top {
            margin-top: 80px;

        }

        th,
        tr {
            border: 1px solid #43407a;
            border-collapse: collapse;
        }

        thead {
            border: 1px solid #43407a;
        }

        #backcolor {
            background-color: #e0ddf0;

        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .roww {
            border: 1px solid #43407a;
        }

        .col1 {
            float: left;
            width: 60%;
        }

        .col2 {
            float: left;
            width: 40%;
            border-left: 1px solid #43407a;

        }

        .container {
            background-image: url("images/texture-blue.png");
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            background-position: top;
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

        .bg-img2 {
            position: relative;
        }
    </style>
</head>


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
        <div class="container"
            style="border-right: 1px solid   #43407a; margin: auto;border-top: 1px solid   #43407a; border-left: 1px solid   #43407a; border-bottom:none;padding: 0 0px 0px 0px;">
            <div class="row" style="display: flex; display: flex;justify-content: space-between;padding: 0px 14px;">
                <div style="width: 60%;float:left;">
                    <h6 style="font-size: 17px; margin-bottom: 0;"> {{ $requestData['cname'] }}</h6>
                    <p style="font-size: 14px; margin: 0;"> {{ $requestData['address_1'] }}
                        {{ $requestData['address_2'] }}</br>{{ $requestData['city'] }} {{ $requestData['state'] }},
                        {{ $requestData['zip_code'] }}</p>
                </div>
                <div style="width:40%;float:right;">
                    <h6 style="font-size: 15px; margin-bottom: 0; padding-left:12%;">Advice Number:
                        <span>XXXXX{{ $requestData['advice_number'] }}</span>
                    </h6>
                    <br>
                    <br>
                    <P style="font-size: 14px;margin: 0; text-align:right; padding-right:10%;">
                        <span style="font-weight:800;">Check Number:</span> 1775
                    </P>

                    <P style="font-size: 14px;margin: 0;  text-align:right; padding-right:10%;margin-top:10px;"> <span
                            style="font-weight:800;">Date:</span>
                        {{ date('m/d/y', strtotime($requestData['pay_date'])) }} </P>
                </div>
            </div>
            <div style="width: 100%; margin: 30px auto 0;font-size: 15px; padding: 0 0px 0px 0px;">
                <div style="padding: 0px 20px;">
                    <span>Pay to:<b> {{ $requestData['emp_name'] }} </b></span>
                    <span style="margin: 0; float:right;font-weight:bold;">Amount</span>
                    <span style="margin: 0; float:right; padding-left:10px; margin-right: 11px;">Transit ABA</span>
                    <span style="margin: 0; float:right;padding-left:10px; margin-right: 11px;">Account Number</span>
                    <hr style="margin-top: 10px;">
                    <span
                        style="margin: 0;float:right;margin-left: 20px;font-weight:bold; ">{{ $requestData['currency'] }}{{ $requestData['total_net_pay'] }}</span>


                    <span
                        style="margin: 0;float:right; margin-left: 30px;">XXXXX{{ $requestData['transit_aba_number'] }}</span>


                    <span
                        style="margin: 0;float:right; margin-right: 30px; ">XXXXXX{{ $requestData['account_number_last_4'] }}</span>
                </div>
            </div>
            <div
                style="width: 50%; display: flex; justify-content: flex-end;justify-content: space-between; FONT-SIZE: 17px; margin: 0px 0 0 151px; padding:0px 30px;">
                <div style="margin-bottom: 19px;">
                    <b>
                        <p style="margin: 0px 0 0 0; font-size: 12px; font-weight:500;"> {{ $requestData['emp_name'] }}
                        </p>
                    </b>
                    <P style="margin: 0px 0 0 0; font-size:  12px;"> {{ $requestData['address_1'] }} </P>
                    <p style="margin: 0px 0 0 0;font-size: 12px;">{{ $requestData['address_2'] }}
                        </br>{{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}
                    </p>
                </div>
            </div>
            <div
                style="width: 100%;  background-color: #43407a; text-align: center; color: aliceblue; font-size: 12px;">
                <p style="margin: 0;">THE FACE OF THIS DOCUMNET HAS A COLOURED BACKGROUND-NOT A WHITE BACKGROUND</p>
            </div>
        </div>

        <table class="top">
            <td colspan="" style="border: 1px solid white;text-align: center; color: #43407a;">----DETATCH ALONG
                PERFORMATION-----------</td>
            <td style="border: 1px solid white; text-align: center; color: #43407a;">----KEEP LOWER PART FOR YOUR
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
                <td style="border-right: 1px solid #43407a; border-left: 1px solid #43407a;">
                    {{ $requestData['cname'] }}
                </td>
                <td>{{ $requestData['emp_ssn'] }} </td>
                <td style="border-right: 1px solid #43407a; border-left: 1px solid #43407a;">
                    {{ $requestData['emp_id'] }}
                </td>
                <td>{{ $requestData['emp_ssn'] }} </td>
                <td style="border-right: 1px solid #43407a; border-left: 1px solid #43407a; ">
                    {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
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
                <td style="color: #43407a;border-right: 1px solid #43407a; text-align:center;">THIS CHECK</td>
                <td>{{ $requestData['currency'] }}{{ number_format($requestData['period_gross_total'], 2) }}</td>
                <td style=" border-right: 1px solid #43407a; border-left: 1px solid #43407a; "> 0.00</td>
                <td>{{ $requestData['currency'] }}{{ number_format($requestData['deduction_tax'], 2) }}</td>
                <td style=" border-right: 1px solid #43407a; border-left: 1px solid #43407a; ">0.00</td>
                <td>{{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'], 2) }}</td>
                <td style=" border-right: 1px solid #43407a; border-left: 1px solid #43407a; "> 0.00</td>
                <td>{{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'], 2) }}</td>
                <td style="border-left: 1px solid #43407a; ">{{ $requestData['currency'] }}2,500.00</td>
            </tr>

            <tr>
                <td style="color: #43407a;border-right: 1px solid #43407a;text-align:center;">YEAR-TO-DATE</td>
                <td> {{ $requestData['currency'] }}{{ number_format($requestData['ytd_gross_total'], 2) }}</td>
                <td style="border-right: 1px solid #43407a; border-left: 1px solid #43407a;"> 0.00</td>
                <td>{{ $requestData['currency'] }}{{ number_format($requestData['ytd_deduction_tax'], 2) }}</td>
                <td style=" border-right: 1px solid #43407a; border-left: 1px solid #43407a;">0.00</td>
                <td>{{ $requestData['currency'] }}{{ number_format($requestData['total_ytd_net_pay'], 2) }}</td>
                <td style="border-right: 1px solid #43407a; border-left: 1px solid #43407a;"> 0.00</td>
                <td>{{ $requestData['currency'] }}{{ number_format($requestData['total_ytd_net_pay'], 2) }}</td>
                <td style="border-left: 1px solid #43407a;"> {{ $requestData['currency'] }}2,500.00</td>
            </tr>
        </table>
        <table>
            <tr>
                <td> {{ $requestData['emp_street_1'] }}, {{ $requestData['emp_street_2'] }}
                    {{ $requestData['emp_city'] }} {{ $requestData['emp_state'] }},
                    {{ $requestData['emp_zip_code'] }} </td>
                <td><b>Pay Period: {{ date('m/d/y', strtotime($requestData['pay_start'])) }}</b></td>
                <td><b>{{ date('l m/d/y', strtotime($requestData['pay_end'])) }}</b></td>
            </tr>
        </table>

        <section>
            <div></div>
            <div class="row roww">
                <div class="col1">
                    <table style="width: 100%;">
                        <thead style="border-top:none;border-left:none; border-right:none; color:#43407a;"
                            id="backcolor">
                            <td style="font-size:9px; border-right:1px solid  #43407a; ">WAGES</td>
                            <td style="font-size:9px; border-right:1px solid  #43407a;">HOURS</td>
                            <td style="border-right:1px solid  #43407a;">RATE</td>
                            <td style="font-size:9px; border-right:1px solid  #43407a;"> AMOUNT <br>THIS CHECK</td>
                            <td style="font-size:9px;">AMOUNT<br> YEAR-TO-DATE</td>
                        </thead>
                        <tbody>
                            @foreach ($requestData['earning'] as $key => $earn)
                                <tr style="border: none;">
                                    <td>{{ $earn }}</td>
                                    <td>{{ number_format($requestData['hours'][$key], 2) }}</td>
                                    <td>{{ $requestData['currency'] }}{{ number_format($requestData['rate'][$key], 2) }}
                                    </td>
                                    <td>{{ $requestData['currency'] }}
                                        {{ number_format($requestData['period'][$key], 2) }}</td>
                                    <td>{{ $requestData['currency'] }}
                                        {{ number_format($requestData['ytd_total'][$key], 2) }}</td>
                                </tr>
                            @endforeach
                            <tr style="border: none;">
                                <td colspan="3" style="text-align:left;">Total Wages</td>
                                <td>{{ $requestData['currency'] }}{{ number_format($requestData['period_gross_total'], 2) }}
                                </td>
                                <td>{{ $requestData['currency'] }}{{ number_format($requestData['ytd_gross_total'], 2) }}
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <div class="col2">
                    <table style="width: 100%;">
                        <thead style="border-top:none;color:#43407a;border-left:none;" id="backcolor">
                            <td style="font-size:9px; border-right:1px solid  #43407a;">DEDUCTIONS & TAXES</td>
                            <td style="font-size:9px; border-right:1px solid  #43407a;  ">AMOUNT<br>THIS CHECK</td>
                            <td style="border-right: none !important;   border-collapse: collapse;font-size:9px;">
                                AMOUNT<br>YEAR-TO-DATE
                            </td>
                        </thead>

                        <tbody style=" ">
                            @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                                <tr style="border:none;">
                                    <td>{{ $taxes }}</td>
                                    <td>{{ $requestData['currency'] }}
                                        {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                                    <td>{{ $requestData['currency'] }}
                                        {{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>
                                </tr>
                            @endforeach

                            @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                                <tr style="border:none;">
                                    <td>{{ $tax_deduction }}</td>
                                    <td>{{ $requestData['currency'] }}
                                        {{ number_format($requestData['period_tax_deduction'][$key], 2) }} </td>
                                    <td>{{ $requestData['currency'] }}
                                        {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</td>
                                </tr>
                            @endforeach
                            <tr style="border:none;">
                                <td>Total Taxes</td>
                                <td>{{ $requestData['currency'] }}{{ number_format($requestData['deduction_tax'], 2) }}
                                </td>
                                <td>{{ $requestData['currency'] }}{{ number_format($requestData['ytd_deduction_tax'], 2) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

</body>

</html>
