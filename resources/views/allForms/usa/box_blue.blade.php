<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    <style>
        body {
            color: #000;
            font-size: 14px;
        }

        .table {
            /* max-width: 1200px; */
            width: 100%;
        }

        .text {
            margin-right: 10px;
        }

        .employee-box {
            border: 2px solid #000;
        }

        .table-data tr {
            text-align: center;
        }

        .td {
            text-align: left !important;
            padding: 0px !important;
            margin: 0 !important;
        }

        .table-data th {
            padding: 0px 20px 0 0;
        }

        .statutory {
            text-align: left;
        }

        .row1::after {
            content: "";
            clear: both;
            display: table;
        }

        .column1 {
            float: left;
            width: 10%;
        }

        .column2 {
            float: left;
            width: 90%;
        }

        .heading {
            text-align: left;
        }

        .container {
            position: absolute;
            top: 55px;
            z-index: 3;
            height: 300px;
        }

        .bg-img2 {
            position: relative;
        }

        .bg-img2:before {
            position: absolute;
            background-image: url("http://44.202.105.74/images/side-bar.png");
            background-repeat: no-repeat;
            background-size: contain;
            width: 100%;
            height: 100%;
            content: "";
            right: 0px;
            top: 195px;
            left: 38px !important;
            ;
        }

        .bg-img {
            position: relative;
        }

        .bg-img::before {
            background-image: url('http://44.202.105.74/images/check2.png') !important;
            background-size: contain;
            background-repeat: no-repeat;
            content: "";
            top: 90px;
            left: 0px;
            right: 100px !important;
            position: absolute;
            z-index: -1;
            width: 700px;
            height: 100%;
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
            @if (Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
                <div class="watermark"></div>
            @endif
        @endauth
        <div class="row1">
            <div class="column1">
                <table style="width: 100%; margin:0px auto 0px 0px;">
                    <tr>
                        <td><img style="max-width: 70px;" src="http://44.202.105.74/images/barode.jpeg"></td>
                    </tr>
                </table>
            </div>

            <div class="column2">
                <table class="table">

                    <tr>
                        <td></td>
                        <td class="table-data" rowspan="2"> <button class="employee-box"
                                style=" border:1px solid black; border-radius:2px; padding:5px 10px 5px 5px;background-color:#88848445"><span
                                    class="text">EMPLOYEE ID: {{ $requestData['emp_id'] }}</span><span>SSN:
                                    {{ $requestData['emp_ssn'] }}</span> </button></td>
                        <td style="font-size:25px; font-weight:500;">Earnings Statement</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding:0px;font-size:18px;color: #555;">Marital Status:
                            <b style="text-transform: capitalize;"> <Span style="color: #000">{{ $requestData['marital_status'] }}</Span></b>
                            <br>
                            Exemptions/Alowances:<b style="color: #000">{{ $requestData['exemptions'] }}</b><br>
                            State: <b style="text-transform: capitalize;color: #000;">
                                {{ $requestData['emp_state'] }}</b>

                        </td>
                        <td style="font-size: 15px; text-transform: uppercase;padding:0px; font-weight:500; padding-bottom:30px;">
                                {{ $requestData['emp_name'] }}<br>{{ $requestData['emp_street_1'] }} <br>
                                {{ $requestData['emp_city'] }},
                                {{ $requestData['emp_zip_code'] }}

                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-weight: bold;font-size:18px;"> {{ $requestData['cname'] }}</td>
                        <td style="color: #555;font-size:15px;">PAY DATE: <b style="color: #000;font-size:15px;"> {{ date('m/d/y', strtotime($requestData['pay_date'])) }}</b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-transform: uppercase;font-size:16px;"><B>{{ $requestData['address_1'] }}</B></td>
                        <td style="color: #555; font-size:15px;">PEPORTING PERIOD: </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-transform: uppercase;font-size:16px; "> <b>{{ $requestData['city'] }},
                                {{ $requestData['zip_code'] }}</b></td>
                        <td style="border-bottom: 2px solid #000;">
                            <b style="font-size:15px;">{{ date('m/d/y', strtotime($requestData['pay_start'])) }}&nbsp; &nbsp; &nbsp;  - &nbsp; &nbsp; &nbsp;
                            {{ date('m/d/y', strtotime($requestData['pay_end'])) }}</b></td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                </table>
            </div>
        </div>
        <section style="padding-top:30px;">
            <table class="table-data" style="">
                <thead style="border-bottom: 2px solid black">
                    <th class="heading">EARNINGS</th>
                    <th class="">RATE</th>
                    <th class="">HOURS</th>
                    <th class="">CURRENT</th>
                    <th style="" class="">YTD</th>
                </thead>
                @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td style="text-align: left;">{{ $earn }}</td>
                        <td><b>{{ $requestData['rate'][$key] }}</b></td>
                        <td style="text-align:center;"><b>{{ $requestData['hours'][$key] }}</b></td>
                        <td><b>{{ number_format($requestData['period'][$key], 2) }}</b></td>
                        <td><b>{{ number_format($requestData['ytd_total'][$key], 2) }}</b></td>
                    </tr>
                @endforeach
                <br> <br>
                <tr>
                    <td></td>
                    <td colspan="3"
                        style="text-align: left; font-weight:bold; border:1px solid black;  background-color:#88848445;border-radius:2px; height:25px;">
                        &nbsp;Gross
                        Pay&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        {{ number_format($requestData['total_net_pay'], 2) }}</td>
                    <td style="">{{ number_format($requestData['total_ytd_net_pay'], 2) }}</td>
                </tr>
                <br> <br> <br> <br>
            </table>
        </section>
        <section style="position: relative; width:;100%;">
            <section>
                <table class="table-data">
                    <thead style="border-bottom:2px solid black;">
                        <th style="" class="">DEDUCTIONS</th>
                        <th style="" class="statutory">STATUTORY</th>
                        <th></th>
                        <th style="" class="">CURRENT</th>
                        <th style="" class="">YTD</th>
                    </thead>

                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                        <tr>
                            <td></td>
                            <td style="text-align: left;" colspan="2">{{ $taxes }}</td>
                            <td><b>{{ number_format($requestData['taxes_rate'][$key], 2) }}</b></td>
                            <td><b>{{ number_format($requestData['taxes_ytd'][$key], 2) }}</b></td>
                        </tr>
                    @endforeach

                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                        <tr>
                            <td></td>
                            <td style="text-align: left;" colspan="2">{{ $tax_deduction }}</td>
                            <td><b>{{ number_format($requestData['period_tax_deduction'][$key], 2) }}</b> </td>
                            <td><b>{{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</b> /td>
                        </tr>
                    @endforeach
                    <br>
                    <thead style="border-bottom: 2px solid #000;">
                        <th></th>
                        <th class="td" colspan="4">OTHER</th>
                    </thead>
                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                        <tr>
                            <td></td>
                            <td style="text-align: left;" colspan="2">{{ $tax_deduction }}</td>
                            <td><b>{{ number_format($requestData['period_tax_deduction'][$key], 2) }}</b> </td>
                            <td><b>{{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</b> </td>
                        </tr>
                    @endforeach

                    <br> <br> <br>

                    <tr>
                        <td></td>
                        <td colspan="3"
                            style="text-align: left;font-weight:bold; border:1px solid black;  background-color:#88848445; border-radius:2px; height:25px;">
                            &nbsp;Net
                            Pay&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{ number_format($requestData['total_net_pay'], 2) }} </td>
                        <td style="">{{ number_format($requestData['total_ytd_net_pay'], 2) }}</td>
                    </tr>
                </table>
            </section>
            <section style="position:absolute; top:7px; right:60px;">
                <table style="border:1px solid #000; padding:px;width:250px;">
                    <tr>
                        <th style="padding-left:8px;text-align: left;  ">YTD GROSS</th>
                        <td style="padding-right:8px;text-align: right;">
                            <b>{{ number_format($requestData['ytd_deduction_tax'], 2) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">YTD DEDUCTIONS</th>
                        <td style="padding-right:8px;text-align: right;">
                            <b>{{ number_format($requestData['ytd_gross_total'], 2) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">YTD NET PAY</th>
                        <td style="padding-right:8px;text-align: right;">
                            <b>{{ number_format($requestData['ytd_deduction_tax'], 2) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">GROSS PAY</th>
                        <td style="padding-right:8px;text-align: right;">
                            <b>{{ number_format($requestData['deduction_tax'], 2) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">DEDUCTIONS</th>
                        <td style="padding-right:8px;text-align: right;">
                            <b>{{ number_format($requestData['period_gross_total'], 2) }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">NET PAY</th>
                        <td style="padding-right:8px;text-align: right;">
                            <b>{{ number_format($requestData['total_net_pay'], 2) }}</b>
                        </td>
                    </tr>
                </table>
            </section>
        </section>
        <section class="bg-img">
            <div class="container" style=" margin-top:60px; width:95%; padding:0px 20px;">
                <div class="row" style="display: flex;justify-content: space-between;padding: 0px 14px;">
                    <div style="width: 50%;float:left; position: relative; top:35px;">
                        <p style="font-size: 13px; margin: 0; text-transform:uppercase;color:black;font-weight:500;"><b>{{ $requestData['cname'] }}</b></p>
                        <p style="font-size: 12px; margin: 0;text-transform:uppercase;color:black;font-weight:400;">{{ $requestData['address_1'] }}</p>
                        <P style="font-size: 12px; margin: 0;text-transform:uppercase;color:black;font-weight:400;">{{ $requestData['address_2'] }}</P>
                        <P style="font-size: 12px; margin: 0;text-transform:uppercase;color:black;font-weight:400;">{{ $requestData['city'] }}
                            {{ $requestData['state'] }},
                            {{ $requestData['zip_code'] }}
                        </P>
                    </div>
                    <div style="width: 50%;float:right;text-align:right; margin-top:4px;">
                        <h6 style="font-size: 14px; margin-bottom: 6px;font-weight:400;">
                            <span>00000{{ $requestData['advice_number'] }}</span>
                        </h6>
                        <p style="font-size: 13px; margin-top:-4px;padding-right:25px;">
                            <span style="font-weight:400;"></span>
                            {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                        </p>
                    </div>
                </div>
                <table style="width: 95%; margin: 160px auto 0px;">
                    <tr>
                        <td style="font-size:12px;text-align:left; width:55%; font-weight:bold;text-transform:uppercase; letter-spacing: -0.5px;">
                            {{ $requestData['emp_name'] }}</td>
                        <td style="text-align: right; font-size:12px; width:20%;">
                            XXXXX{{ $requestData['account_number_last_4'] }}</td>
                        <td></td>
                        <td style="text-align:right;font-size:12px; width:15%;">
                            XXXXX{{ $requestData['transit_aba_number'] }}</td>
                        <td style="text-align:right;font-size:12px; width:15%;">
                            <b>{{ number_format($requestData['total_net_pay'], 2) }}</b> </td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
</body>

</html>
