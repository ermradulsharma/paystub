<!DOCTYPE html>
<html lang="en">

<head>
    <title>pt_green Document</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200&display=swap');
        @import url('https://fonts.cdnfonts.com/css/arial-2');
        @import url('https://fonts.cdnfonts.com/css/arial-mt');
        @import url('https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Arimo:ital@1&display=swap');
        @font-face {
            font-family: Arial, Helvetica, sans-serif;
            font-family: 'Arial MT', sans-serif;
            font-family: 'Arial MT Narrow', sans-serif;
            font-family: 'Arial Rounded MT', sans-serif;
            font-family: 'Arial Rounded MT Bold', sans-serif;
            font-family: 'ArialMT', sans-serif;
            font-family: 'Arial MT Black', sans-serif;
            font-family: 'Maven Pro', sans-serif;
            font-family: 'Arimo', sans-serif;
        }
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-family: 'Arial MT', sans-serif;
            font-family: 'Arial MT Narrow', sans-serif;
            font-family: 'Arial Rounded MT', sans-serif;
            font-family: 'Arial Rounded MT Bold', sans-serif;
            font-family: 'ArialMT', sans-serif;
            font-family: 'Arial MT Black', sans-serif;
            font-family: 'Maven Pro', sans-serif;
            font-family: 'Arimo', sans-serif;
        }

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



        th {
            background-color: #43407a;
            color: white;
        }

        .hadding {
            background-color: #43407a;
            text-align: center;
            padding: 4px;
            font-size: 9px;
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
        .border-bottom{
            border-bottom: 1px solid #fff;
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
                    <h6 style="font-size: 14px; margin-bottom: 0;text-transform:uppercase;"> {{ $requestData['cname'] }}</h6>
                    <p style="font-size: 14px; margin: 0;text-transform:uppercase;"> {{ $requestData['address_1'] }}<br>{{ $requestData['city'] }} <br>{{ $requestData['state'] }}, {{ $requestData['zip_code'] }}</p>
                </div>
                <div style="width:40%;float:right;">
                    <h6 style="font-size: 16px; margin-bottom: 0; padding-left:12%;text-transform:capitalize;">Advice Number: <span style="font-size: 13px;text-transform:uppercase;">00000{{ $requestData['advice_number'] }}</span> </h6>
                    <br>
                    <br>
                    <P style="font-size: 14px;margin: 0; text-align:right; padding-right:25%;"><span style="font-weight:800;padding-right:20px;">Check Number:</span> 1775 </P>
                    <P style="font-size: 14px;margin: 0;  text-align:right;  padding-right:25%;margin-top:10px;"> <span style="font-weight:800; padding-right:20px;">Date:</span><b>{{ date('m/d/y', strtotime($requestData['pay_date'])) }}</b> </P>
                </div>
            </div>
            <div style="width: 100%; margin: 30px auto 0;font-size: 15px; padding: 0 0px 0px 0px;">
                <div style="padding: 0px 20px;">
                    <span>Pay To:<b style="text-transform:uppercase; padding-left:10px;font-size:13px;"> {{ $requestData['emp_name'] }} </b></span>
                    <span style="margin: 0; float:right; font-weight:bold;">Amount</span>
                    <span style="margin: 0; float:right; padding-left:10px; margin-right: 11px;">Transit ABA</span>
                    <span style="margin: 0; float:right; padding-left:10px; margin-right: 11px;">Account Number</span>
                    <hr style="margin-top: 10px;">
                    <span style="margin: 0; float:right; margin-left: 20px;font-weight:bold; font-size:16px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ $requestData['total_net_pay'] }}</span>
                    <span style="margin: 0; float:right; margin-left: 30px;">XXXXX{{ $requestData['transit_aba_number'] }}</span>
                    <span style="margin: 0; float:right; margin-left: 30px; ">XXXXXX{{ $requestData['account_number_last_4'] }}</span>
                </div>
            </div>
            <div
                style="width: 50%;margin: 0px 0 0 100px; padding:0px 30px;">
                <div style="padding:50px 0px 19px;">
                    <b> <p style="margin: 0px 0 0 0; font-size: 12px; font-weight:bold; text-transform:uppercase; font-family: Arial, Helvetica, sans-serif;"> {{ $requestData['emp_name'] }} </p> </b>
                    <P style="margin: 0px 0 0 0; font-size:  12px;text-transform:uppercase;font-family: Arial, Helvetica, sans-serif;"> {{ $requestData['address_1'] }} </P>
                    <p style="margin: 0px 0 0 0;font-size: 12px;text-transform:uppercase;font-family: Arial, Helvetica, sans-serif;">{{ $requestData['address_2'] }} <br>{{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }} </p>
                </div>
            </div>
            <div style="width: 100%;  background-color: #43407a; text-align: center; color: aliceblue; font-size: 12px;">
                <p style="margin: 0;">THE FACE OF THIS DOCUMNET HAS A COLOURED BACKGROUND-NOT A WHITE BACKGROUND</p>
            </div>
        </div>

        <table class="top">
            <td colspan="" style="border: 1px solid white;text-align: center; color: #43407a;">----DETATCH ALONG PERFORMATION-----------</td>
            <td style="border: 1px solid white; text-align: center; color: #43407a;">KEEP LOWER PART FOR YOUR RECODE</td>
        </table>
        <table class="top">
            <tr>
                <th style="border-right:1px solid white;" colspan="" class="hadding">EMPLOYEE NAME</th>
                <th style="border-right:1px solid white;" class="hadding">COMPANY NAME</th>
                <th style="border-right:1px solid white;" class="hadding">CLIENT NO.</th>
                <th style="border-right:1px solid white;" class="hadding">EMP NO.</th>
                <th style="border-right:1px solid white;" class="hadding">SOCIAL SECURITY NO.</th>
                <th style="border-right:1px solid white;" class="hadding">CHECK DATE</th>
                <th class="hadding">CHECK NO.</th>
            </tr>

            <tr>
                <td style="font-size:13px;text-align:center; font-weight:bold"> {{ $requestData['emp_name'] }}</td>
                <td style="border-right: 1px solid #43407a; border-left: 1px solid #43407a;font-size:13px;text-align:center; font-weight:bold"> {{ $requestData['cname'] }} </td>
                <td style="font-size:13px;text-align:center; font-weight:bold">{{ $requestData['emp_ssn'] }} </td>
                <td style="border-right: 1px solid #43407a; border-left: 1px solid #43407a;font-size:13px;text-align:center; font-weight:bold"> {{ $requestData['emp_id'] }} </td>
                <td style="font-size:13px;text-align:center; font-weight:bold">{{ $requestData['emp_ssn'] }} </td>
                <td style="border-right: 1px solid #43407a; border-left: 1px solid #43407a;font-size:13px;text-align:center; font-weight:bold "> {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
                <td style="font-size:13px;text-align:center; font-weight:bold">1877</td>

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
            <tr class="border-bottom" style="background-color: #ffff;">
                <td style="color: #43407a;border-right: 1px solid #43407a; text-align:center;font-size:12px; font-weight:bold;">THIS CHECK</td>
                <td style="font-size:13px;text-align:center; font-weight:bold"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['period_gross_total'], 2) }}</td>
                <td style=" border-right: 1px solid #43407a; border-left: 1px solid #43407a;font-size:13px;text-align:center; font-weight:bold "> 0.00</td>
                <td style="font-size:13px;text-align:center; font-weight:bold"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['deduction_tax'], 2) }}</td>
                <td style=" border-right: 1px solid #43407a; border-left: 1px solid #43407a; font-size:13px;text-align:center; font-weight:bold">0.00</td>
                <td style="font-size:13px;text-align:center; font-weight:bold"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'], 2) }}</td>
                <td style=" border-right: 1px solid #43407a; border-left: 1px solid #43407a;font-size:13px;text-align:center; font-weight:bold "> 0.00</td>
                <td style="font-size:13px;text-align:center; font-weight:bold"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'], 2) }}</td>
                <td style="border-left: 1px solid #43407a;font-size:13px;text-align:center; font-weight:bold "><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>2,500.00</td>
            </tr>
            <tr>
                <td style="color: #43407a;border-right: 1px solid #43407a;text-align:center;font-size:12px; font-weight:bold;">YEAR-TO-DATE</td>
                <td style="font-size:13px;text-align:center; font-weight:bold"> <span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['ytd_gross_total'], 2) }}</td>
                <td style="border-right: 1px solid #43407a; border-left: 1px solid #43407a;font-size:13px;text-align:center; font-weight:bold"> 0.00</td>
                <td style="font-size:13px;text-align:center; font-weight:bold"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['ytd_deduction_tax'], 2) }}</td>
                <td style=" border-right: 1px solid #43407a; border-left: 1px solid #43407a;font-size:13px;text-align:center; font-weight:bold">0.00</td>
                <td style="font-size:13px;text-align:center; font-weight:bold"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_ytd_net_pay'], 2) }}</td>
                <td style="border-right: 1px solid #43407a; border-left: 1px solid #43407a;font-size:13px;text-align:center; font-weight:bold"> 0.00</td>
                <td style="font-size:13px;text-align:center; font-weight:bold"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_ytd_net_pay'], 2) }}</td>
                <td style="border-left: 1px solid #43407a;font-size:13px;text-align:center; font-weight:bold"> <span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>2,500.00</td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="font-size:12px; font-weight:bold;padding-left:15px;"> {{ $requestData['emp_street_1'] }}, {{ $requestData['emp_street_2'] }}
                    {{ $requestData['emp_city'] }} {{ $requestData['emp_state'] }},
                    {{ $requestData['emp_zip_code'] }} </td>
                <td style="font-size:12px; font-weight:bold"><b>Pay Period: {{ date('m/d/y', strtotime($requestData['pay_start'])) }}</b></td>
                <td style="font-size:12px; font-weight:bold"><b>{{ date('l m/d/y', strtotime($requestData['pay_end'])) }}</b></td>
            </tr>
        </table>

        <section>
            <div></div>
            <div class="row roww">
                <div class="col1">
                    <table style="width: 100%;">
                        <thead style="border-top:none;border-left:none; border-right:none; color:#43407a;" id="backcolor">
                            <td style="border-right:1px solid  #43407a;font-size:10px; font-weight:bold; text-align:center; ">WAGES</td>
                            <td style="border-right:1px solid  #43407a;font-size:10px; font-weight:bold; text-align:center;">HOURS</td>
                            <td style="border-right:1px solid  #43407a;font-size:10px; font-weight:bold; text-align:center;">RATE</td>
                            <td style="border-right:1px solid  #43407a;font-size:10px; font-weight:bold; text-align:center;">AMOUNT<br>THIS CHECK</td>
                            <td style="font-weight:bold; font-size:10px; text-align:center;">AMOUNT<br>YEAR-TO-DATE</td>
                        </thead>
                        <tbody>
                            @foreach ($requestData['earning'] as $key => $earn)
                                <tr style="border: none;">
                                    <td style="font-size:12px; width:20%; font-weight:bold; text-align:left;padding-left:20px; text-transform:capitalize;">{{ $earn }}</td>
                                    <td style="font-size:12px; width:20%; font-weight:bold; text-align:right; padding-right:20px;">{{ number_format($requestData['hours'][$key], 2) }}</td>
                                    <td style="font-size:12px; width:20%; font-weight:bold; text-align:right; padding-right:20px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['rate'][$key], 2) }} </td>
                                    <td style="font-size:12px; width:20%; font-weight:bold; text-align:right; padding-right:20px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['period'][$key], 2) }}</td>
                                    <td style="font-size:12px; width:20%; font-weight:bold; text-align:right; padding-right:20px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['ytd_total'][$key], 2) }}</td>
                                </tr>
                            @endforeach
                            <tr style="border: none;">
                                <td colspan="3" style="text-align:left;font-size:12px; font-weight:bold; text-align:left; padding-left:20px;">Total Wages</td>
                                <td style="font-size:12px; font-weight:bold; text-align:right; padding-right:20px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['period_gross_total'], 2) }}</td>
                                <td style="font-size:12px; font-weight:bold; text-align:right; padding-right:20px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['ytd_gross_total'], 2) }}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <div class="col2">
                    <table style="width: 100%;">
                        <thead style="border-top:none;color:#43407a;border-left:none;" id="backcolor">
                            <td style="font-size:10px; font-weight:bold; text-align:center; border-right:1px solid  #43407a;">DEDUCTIONS & TAXES</td>
                            <td style="font-size:10px; font-weight:bold; text-align:center; border-right:1px solid  #43407a;">AMOUNT<br>THIS CHECK</td>
                            <td style="border-right: none !important; border-collapse: collapse;font-size:10px; font-weight:bold; text-align:center;">AMOUNT<br>YEAR-TO-DATE </td>
                        </thead>

                        <tbody style=" ">
                            @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                                <tr style="border:none;">
                                    <td style="font-size:12px;width:40%; font-weight:bold; text-align:left; padding-left:20px;">{{ $taxes }}</td>
                                    <td style="font-size:12px; width:30%; font-weight:bold; text-align:right; padding-right:12px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span> {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                                    <td style="font-size:12px; width:30%; font-weight:bold; text-align:right; padding-right:12px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span> {{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>
                                </tr>
                            @endforeach

                            @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                                <tr style="border:none;">
                                    <td style="font-size:12px; width:30%; font-weight:bold; text-align:left; padding-left:20px;">{{ $tax_deduction }}</td>
                                    <td style="font-size:12px; width:30%; font-weight:bold; text-align:center; padding-right:12px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span> {{ number_format($requestData['period_tax_deduction'][$key], 2) }} </td>
                                    <td style="font-size:12px; width:30%; font-weight:bold; text-align:center;padding-right:12px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>  {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</td>
                                </tr>
                            @endforeach
                            <tr style="border:none;">
                                <td style="font-size:12px; font-weight:bold; text-align:left; padding-left:20px;">Total Taxes</td>
                                <td style="font-size:12px; font-weight:bold; text-align:right; padding-right:12px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['deduction_tax'], 2) }}  </td>
                                <td style="font-size:12px; font-weight:bold; text-align:right; padding-right:12px;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['ytd_deduction_tax'], 2) }}
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
