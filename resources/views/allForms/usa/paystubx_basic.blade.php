<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Paystubx Template</title>
    <style>
        .infomation {
            border: 2px solid darkgrey;
            border-top: none;
        }

        .bodertop {
            border: 1px solid black;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            border: 2px solid darkgrey;
            border-top: none;
        }

        .hiddden {
            visibility: hidden;
        }

        .main {
            display: inline-flexbox;

        }

        .section_2 {
            padding-top: 5px;
            background: #a9a9a9;
            color: white;
            height: 35px;
        }

        .earning {
            text-align: right;
            font-size: 20px;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .col1 {
            float: left;
            width: 40%;
        }

        .col2 {
            float: left;
            width: 60%;
        }

        .row1::after {
            content: "";
            clear: both;
            display: table;
        }

        .tablewidth {
            width: 100%;
            text-align: center;
        }

        .column1 {
            float: left;
            width: 60%;
        }

        .column2 {
            float: left;
            width: 40%;
        }

        .hadding {
            font-size: 12px;
            text-transform: uppercase;
        }

        td {
            font-size: 13px;
        }

        .main {
            display: inline-flexbox;

        }

        .section_2 {
            padding-top: 5px;
            background: #a9a9a9;
            color: white;
            height: 35px;
        }

        .earning {
            text-align: right;

            font-size: 20px;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .col1 {
            float: left;
            width: 50%;

        }

        .col2 {
            float: left;
            width: 50%;
        }

        .row1::after {
            content: "";
            clear: both;
            display: table;
        }

        .column1 {
            float: left;
            width: 60%;
        }

        .column2 {
            float: left;
            width: 40%;
        }

        .tablewidth {
            width: 100%;
            text-align: center;
        }

        td {
            font-size: 13px;

        }

        th {
            font-size: 14px;
        }

        .bg-img2 {
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
    <div class="section_2">
        <table style="width: 100%;">
            <thead style="background-color: #a9a9a9;">
                <th style="text-align:left;font-size:16px;">#767767</th>
                <th style="text-align:right; padding-right:20px; font-size:larger; text-transform: uppercase; font-weight:900"> Earning Statement </th>
            </thead>
        </table>
    </div>

    <section class="infomation">
        <div class="row">
            <div class="col1">
                <table>
                    <tr>
                        <td style="font-size: 14px;"><b>{{ $requestData['cname'] }}</b></td>
                    </tr>
                    <tr>
                        <td>{{ $requestData['address_1'] }},</br>{{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}, USA </td>
                    </tr>
                    <tr>
                        <td style="margin-top: 10px;"><span style="font-weight: 500;">Marital Status: </span>{{ $requestData['marital_status'] }} </td>
                    </tr>
                    <tr>
                        <td> <span style="font-weight: 500;">Exemptions: </span> {{ $requestData['exemptions'] }}</td>
                    </tr>
                </table>
            </div>

            <div class="col2">
                <table>
                    <tr>
                        <td> <span style="font-weight: 500;">Pay Period:</span> <span> {{ date('m/d/Y', strtotime($requestData['pay_start'])) }} - {{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</span></td>
                    </tr>

                    <tr>
                        <td> <span style="font-weight: 500;">Pay Date:</span><span> {{ date('m/d/Y', strtotime($requestData['pay_date'])) }} </span></td>
                    </tr>
                    <tr>
                        <td><span style="font-weight: 500;">Employee #: </span> <span> {{ $requestData['emp_id'] }}</span></td>
                    </tr>
                    <tr>
                        <td> {{ $requestData['emp_street_1'] }}, </br> {{ $requestData['emp_city'] }} {{ $requestData['emp_state'] }},{{ $requestData['emp_zip_code'] }}, USA </td>
                    </tr>

                    <tr>
                        <td><span style="font-weight: 500;">Social Security#:</span> <span> ***-**-{{ $requestData['emp_ssn'] }}</span></td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- <section class="infomation">
            <div class="row">
                <div class="col1">
                    <table>
                        <tr>
                            <td style="font-size: 14px;"><b>{{ $requestData['cname'] }}</b></td>
                        </tr>
                        <tr>
                            <td>{{ $requestData['address_1'] }},</br>{{ $requestData['city'] }}
                                {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}, USA </td>
                        </tr>
                        <tr>
                            <td style="margin-top: 10px;"><span style="font-weight: 500;">Marital Status:
                                </span>{{ $requestData['marital_status'] }} </td>
                        </tr>
                        <tr>
                            <td> <span style="font-weight: 500;">Exemptions: </span> {{ $requestData['exemptions'] }}
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col2">
                    <table>
                        <tr>
                            <td> <span style="font-weight: 500;">Pay Period:</span> <span>
                                    {{ date('m/d/Y', strtotime($requestData['pay_start'])) }} -
                                    {{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</span></td>
                        </tr>

                        <tr>
                            <td> <span style="font-weight: 500;">Pay Date:</span><span>
                                    {{ date('m/d/Y', strtotime($requestData['pay_date'])) }} </span></td>
                        </tr>
                        <tr>
                            <td><span style="font-weight: 500;">Employee #: </span> <span>
                                    {{ $requestData['emp_id'] }}</span></td>
                        </tr>
                        <tr>
                            <td> {{ $requestData['emp_street_1'] }}, </br> {{ $requestData['emp_city'] }}
                                {{ $requestData['emp_state'] }},{{ $requestData['emp_zip_code'] }}, USA </td>
                        </tr>

                        <tr>
                            <td><span style="font-weight: 500;">Social Security#:</span> <span>
                                    ***-**-{{ $requestData['emp_ssn'] }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section> --}}


        <section class="infomation">
            <div class="row1">
                <div class="column1">
                    <table class="tablewidth">
                        <thead>
                            <th class="hadding" style="text-align: left;">EARNINGS</th>
                            <th class="hadding">RATE</th>
                            <th class="hadding">HOURS</th>
                            <th class="hadding">TOTAL</th>
                            <th class="hadding">YTD TOTAL</th>

                        </thead>
                        <tbody>
                            @foreach ($requestData['earning'] as $key => $earn)
                                <tr>
                                    <td style="text-align: left;">{{ $earn }}</td>
                                    <td>{{ $requestData['rate'][$key] }}</td>
                                    <td style="text-align:center;">{{ $requestData['hours'][$key] }}</td>
                                    <td>{{ number_format($requestData['period'][$key], 2) }}</td>
                                    <td>{{ number_format($requestData['ytd_total'][$key], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="column2">
                    <table class="tablewidth">
                        <thead>
                            <th class="hadding" style="text-align: left;">DEDUCTIONS</th>
                            <th class="hadding" style="text-align: center;"">TOTAL</th>
                            <th class=" hadding">YTD TOTAL</th>
                        </thead>
                        <tbody>
                            @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                                <tr>
                                    <td style="text-align: left;">{{ $taxes }}</td>
                                    <td>{{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                                    <td>{{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>
                                </tr>
                            @endforeach

                            @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                                <tr>
                                    <td style="text-align: left;">{{ $tax_deduction }}</td>
                                    <td>{{ number_format($requestData['period_tax_deduction'][$key], 2) }}</td>
                                    <td>{{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</td>
                                </tr>
                            @endforeach
                            <br>
                            <tr>
                                <td class="hadding" style="text-align: left; font-weight:800;">DEDUCTION TOTAL</td>
                                <td>{{ number_format($requestData['period_gross_total'], 2) }}</td>
                                <td>{{ number_format($requestData['ytd_gross_total'], 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row1">
                <div class="column1">
                    <table class="tablewidth">
                        <tbody>
                            <tr>
                                <td style="width:100px"></td>
                                <th colspan="2" style="text-align: center;">GROSS PAY </th>
                                <td style="text-align: center;">{{ number_format($requestData['deduction_tax'], 2) }}
                                </td>
                                <td style="text-align: center;">
                                    {{ number_format($requestData['ytd_deduction_tax'], 2) }}
                                </td>
                            </tr>
                            <br>
                        </tbody>
                    </table>
                </div>
                <div class="column2">
                    <table class="tablewidth">
                        <tr>
                            <td style="width:60px"></td>
                            <th class="hadding" style="text-align: left; font-weight:800;">Net Pay</th>
                            <td style="text-align: right;">{{ number_format($requestData['total_net_pay'], 2) }}</td>
                            <td style="text-align: center;">{{ number_format($requestData['total_ytd_net_pay'], 2) }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </main>

</body>

</html>
