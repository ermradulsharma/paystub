<!DOCTYPE html>
<html lang="en">

<head>
    <title>paystubs-check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200&display=swap');
       @import url('https://fonts.cdnfonts.com/css/arial-2');
       @font-face {
            font-family: 'Arial', sans-serif;
           font-weight:400;
       }
   </style>
    <style>
        th {
            text-align: left;
        }

        table {
            font-size: 13px;
        }

        .two-col {
            -webkit-column-count: 2;
            -moz-column-count: 2;
            column-count: 2;
        }

        .row1::after {
            content: "";
            clear: both;
            display: table;
        }

        .column1 {
            float: left;
            width: 65%;
        }

        .column2 {
            float: left;
            width: 35%;
        }

        .row2::after {
            content: "";
            clear: both;
            display: table;
        }

        .col0 {
            float: left;
            width: 27%;
            margin-right: 10px;
        }

        .col1 {
            float: left;
            width: 38%;
            margin-right: 10px;
        }

        .col2 {
            float: left;
            width: 35%;
            margin-left: 10px;
        }

        .co-table {
            padding: 10px;
        }

        .sidebar {
            background-image: url("images/right.png");
            background-repeat: no-repeat;
            background-size: contain;
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 5;
            left:102%;
            top: 50px;

        }
        .bottom{
            background-image: url("images/bottom.png");
            background-repeat: no-repeat;
            background-size: contain;
            width: 100%;
            height: 100%;
            position:fixed;
            z-index: 5;
            left:13px;
            top:101%;

        }

        .check {
            position: absolute;
            content: "";
            top: 78.5%;
            right: 0;
            left: 13px;
            background-image: url('images/check2.png') !important;
            background-size: contain;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .bottom-content {
            padding-top: 80px;
        }


        .background:before {
            background-image: url("images/bg-lines1.png");
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            max-width: 700px;
            content: "";
            position: absolute;
            padding: 140px 0px;
            top: -20px;
            left: 100px;
            right: 0;

        }

        .background {
            position: relative;
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

        .templete_elements {
            width: 100%;
        }
    </style>
</head>

<body>

    <main class="bg-img2">
        <div class="sidebar"></div>
        <div class="bottom"></div>
        <div class="check"></div>
        @guest
            <div class="watermark"></div>
        @endguest
        @auth
            @if (Auth::user()->expiryDate == '')
                <div class="watermark"></div>
            @endif
        @endauth
        <section class="templete_elements">
            <table class="templete_elements">
                <tr>
                    <td style="width:12%;">&nbsp;</td>
                    <td style="width:52%;">
                        <table style="width: 100%;">
                            <tr>
                                <td>CO1.</td>
                                <td>FILE</td>
                                <td>DEPT.</td>
                                <td>CLOCK</td>
                                <td>NUMBER</td>
                            </tr>
                            <tr>
                                <td>{{ $requestData['co_number'] }}</td>
                                <td>{{ $requestData['file_number'] }}</td>
                                <td>00000</td>
                                <td>{{ $requestData['clock_vchr_number'] }}</td>
                                <td>{{ $requestData['advice_number'] }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:36%">&nbsp;</td>
                </tr>
            </table>
        </section>



        <div class="row2">
            <h3 style="text-align: left; max-width:215px; margin:0 0 0 auto; padding-bottom:25px; font-size:23px;">
                Earnings Statement</h3>
            <div class="col0">
            </div>
            <div class="col1">
                <table style="width: 100%;padding-bottom:25px;">
                    <tr>
                        <td style="font-weight:800;font-size:14px; text-transform:uppercase">{{ $requestData['cname'] }}
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:14px; text-transform:uppercase;line-height:1.5;">
                            {{ $requestData['address_1'] }}<br>{{ $requestData['city'] }},
                            {{ $requestData['zip_code'] }}<br> USA
                        </td>
                    </tr>
                </table>
                <table style="position: relative; top:30px;">
                    <tr>
                        <td style="font-size: 18px; line-height:1.2; text-transform: capitalize;">Social Security
                            Number:{{ $requestData['emp_ssn'] }}<br> Marital Status:
                            {{ $requestData['marital_status'] }}<br> Expectations/Allowances:
                            {{ $requestData['exemptions'] }} </td>
                    </tr>
                </table>
            </div>

            <div class="col2">

                <table style="width: 100%;">
                    <tr>
                        <td style="font-size: 15px;"><b>Period Beginning:&nbsp;&nbsp;&nbsp;&nbsp;<span
                                    style="text-align: right;">{{ date('m/d/Y', strtotime($requestData['pay_start'])) }}</span></b>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px;"><b>Period
                                Ending:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                    style="text-align: right;"> {{ date('m/d/Y', strtotime($requestData['pay_end'])) }}
                                </span></b></td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px;"><b>Pay
                                Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span
                                    style="text-align:right;">{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</span></b>
                        </td>
                    </tr><br><br><br>
                    <table style="position: relative; top:30px;">
                    <tr>
                        <td style="font-weight: 800; font-size:16px;text-transform: uppercase">
                            {{ $requestData['emp_name'] }}</td>

                    </tr>
                    <tr>
                        <td style="text-transform: uppercase">
                            {{ $requestData['emp_street_1'] }},{{ $requestData['emp_city'] }}<br>
                            {{ $requestData['emp_zip_code'] }},USA </td>
                    </tr>
                </table>
                </table>

            </div>
        </div>

        <section class="">
            <div class="row1 background" style="margin-top: 60px;">
                <div class="column1">
                    <table style="width: 100%;">
                        <tr>
                            <th style="width:20%;">Earning</th>
                            <th style="width:20%;text-align:left; padding-left:15px;">Rate</th>
                            <th style=" width:20%;text-align:right;">Hours</th>
                            <th style=" width:17%;text-align:right;">This Period</th>
                            <th style="width:23%; text-align:center;">Year-to-date</th>

                        </tr>
                        @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td style="width:20%;">{{ $earn }}</td>
                                <td style="width:20%; text-align:left; padding-left:15px;">
                                    {{ number_format($requestData['rate'][$key], 2) }}</td>
                                <td style="width:20%;text-align:right;">
                                    {{ number_format($requestData['hours'][$key], 2) }}</td>
                                <td style="text-align: right; width:17%;">
                                    {{ number_format($requestData['period'][$key], 2) }}</td>
                                <td style="width:23%; text-align:right; padding-right:15px;">
                                    {{ number_format($requestData['ytd_total'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        <br>
                        <tr>
                            <th style="width:20%;"></th>
                            <th style="width:20%;"></th>
                            <th style="width:20%;text-align:right;">GROSS PAY</th>
                            <th style="width:17%; text-align:right;"><b>
                                    {{ number_format($requestData['deduction_tax'], 2) }}</b></th>
                            <th style=" width:23%; text-align:right; padding-right:15px;"><b>
                                    {{ number_format($requestData['ytd_deduction_tax'], 2) }}</b></th>
                        </tr>

                    </table>
                </div>

                <div class="column2">
                    <table style="width: 100%;">
                        <tr style="border-bottom: 2px solid black;">
                            <th>Important Notes</th>
                        </tr>
                        <tr>
                            <td>Company Telephone Number:{{ $requestData['tel'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row1 background" style="margin-top: 60px;">
                <div class="column1">
                    <table style="width:100%; ">
                        <thead>
                            <th style="width:20%;">Deductions</th>
                            <th style="text-align: left; padding-left:10px;" colspan="4">Statuory</th>
                        </thead>

                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                            <tr>
                                <td style="width:20%;"></td>
                                <td style="text-align: left; padding-left:10px; text-transform:capitalize;"
                                    colspan="2"> {{ $taxes }}</td>
                                <td style="width:15%;text-align:right;">
                                    {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                                <td style="text-align:right; padding-right:15px;width:20%; ">
                                    {{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>

                            </tr>
                        @endforeach

                        @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                            <tr>
                                <td style="width:20%;"></td>
                                <td style="text-align: left; padding-left:10px; text-transform:capitalize;"
                                    colspan="2"> {{ $tax_deduction }}</td>
                                <td style="text-align:right;width:20%; ">
                                    {{ number_format($requestData['period_tax_deduction'][$key], 2) }}</td>
                                <td style="text-align:right; padding-right:15px;width:20%; ">
                                    {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        <br><br>
                        <tr>
                            <td style="width:20%;"></td>
                            <td style="text-align: left; padding-left:10px; text-transform:capitalize;" colspan="2">
                                Total Deduction</td>
                            <td style="text-align:right;width:20%; "><b>
                                    {{ number_format($requestData['period_gross_total'], 2) }}</b></td>
                            <td style="text-align:right; padding-right:15px;width:20%; "><b>
                                    {{ number_format($requestData['ytd_gross_total'], 2) }}</b></td>
                        </tr>
                        <br>
                        <tr>
                            <td style="width:20%;"></td>
                            <th style="text-align: left; padding-left:10px; text-transform:capitalize;" colspan="2">
                                NET PAY</th>
                            <td style="text-align:right;width:20%; "><b>
                                    {{ number_format($requestData['total_net_pay'], 2) }}</b></td>
                            <td style="text-align:right; padding-right:15px;width:20%; "><b>
                                    {{ number_format($requestData['total_ytd_net_pay'], 2) }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <section style="position: fixed; bottom:15px; width:95%; left:60px;padding-top:20px;">
            <table>
                <tr style="">
                    <td>
                        <table style="width:95%; padding-bottom:72px;">
                            <tr>
                                <td style=" padding-top:20px;">
                                    <p
                                        style="font-size: 11px; margin: 0; text-transform:uppercase;color:black;font-weight:500;">
                                        {{
                                        $requestData['cname'] }}</p>
                                    <p
                                        style="font-size: 11px; margin: 0;text-transform:uppercase;color:black;font-weight:500;">
                                        {{
                                        $requestData['address_1'] }}</p>
                                    <P
                                        style="font-size: 11px; margin: 0;text-transform:uppercase;color:black;font-weight:500;">
                                        {{
                                        $requestData['address_2'] }}</P>
                                    <P
                                        style="font-size: 11px; margin: 0;text-transform:uppercase;color:black;font-weight:500;">
                                        {{
                                        $requestData['city'] }}
                                        {{ $requestData['state'] }},
                                        {{ $requestData['zip_code'] }}
                                    </P>
                                </td>
                                <td style="padding-top:35px; text-align:right;padding-left:460px;">
                                    <p style="font-size: 13px; margin-bottom: 6px;font-weight:400;">
                                        <span>00000{{ $requestData['advice_number'] }}</span>
                                    </p>
                                    <p style="font-size: 13px;">
                                        <span style="font-weight:400;"></span>
                                        {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="">
                    <td>
                        <table style="width:95%;">
                            <tr class="bottom-content">
                                <td
                                    style="font-size:12px;text-align:left; width:55%; font-weight:bold;text-transform:uppercase; letter-spacing: -1px;">
                                    {{ $requestData['emp_name'] }}</td>
                                <td style=" text-align:center;font-size:12px;padding-left:0px; width:15%;">
                                    XXXXX{{ $requestData['account_number_last_4'] }}</td>
                                <td style="text-align:right ;font-size:12px; width:15%;">
                                    XXXXX{{ $requestData['transit_aba_number'] }}</td>
                                <td style="text-align:right;font-size:12px; padding-right:10px; width:15%; ">
                                    {{ number_format($requestData['total_net_pay'], 2) }} </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        </section>
    </main>
</body>

</html>
