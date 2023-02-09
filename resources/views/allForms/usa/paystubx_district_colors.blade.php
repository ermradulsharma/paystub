<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 100px 100px;

            padding-top: 30px;
        }

        .grid-container>div {

            text-align: center;
            /* padding: 20px 0; */
            font-size: 30px;
        }


        .gridcontainer {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 100px;
            gap: 10px;
            padding: 10px;
        }

        .gridcontainer>div {

            text-align: center;
            padding: 20px 0;
            font-size: 22px;
        }

        .invoiceborder {
            /* border: 1px solid black; */
            /* padding-left: 20px; */
            padding-top: 20px;
            padding-bottom: 20px;
            /* padding-right: 20px; */
            /* border-width:20px */
            /* margin: 200px 200px 200px 200px; */
        }

        .section_2 {

            background: #D8E3F7;
            color: black;
            height: 62px;
            overflow: hidden;
            padding-top: 15px;
        }

        /* .text1 {
            margin-right: 69%;

            font-size: 20px;
        }

        .text2 {
            margin-left: 69%;
            font-size: 20px;


        } */

        table {

            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }


        th {
            text-align: left;
            padding: 8px;
        }

        .heading1 {
            margin-top: 10px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            background-color: #264FAB;
            color: white;
            text-align: left;
            font-size: 12px;
            /* padding: 8px; */
        }

        .data:nth-child(6) {
            background-color: #edededc4;
            padding: ;
        }

        .tablesection {
            /* padding: 26px; */
            padding-top: 25px;
            /* height: 90px; */
            /* overflow: hidden; */
        }

        p {
            font-size: 18px;
            font-family: none;
            margin-top: -2px;
        }

        .tfooter {
            margin-bottom: 20px;
        }

        .info {

            margin-top: 20px;
        }

        .earning {
            text-align: right;
            padding-right: 22px;
        }

        .row {
            display: flex;
        }

        .col {
            display: inline-block;

        }

        .section {
            background: #D8E3F7;
        }

        .data:nth-child(2) {
            background-color: #edededc4;
        }

        .tabl3,
        .hadding,
        .hadding {

            border-collapse: collapse;
        }

        .hadding,
        .hadding {
            padding: 5px;
            text-align: left;
        }

        thead {
            background-color: #264fab;
            color: white;
            border: 1px solid black;

        }

        .row::after {
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

        .row1::after {
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
            width: 30%;
            margin-left: 28%;
            margin-top: 15%;

        }

        td {
            font-size: 13px;
            padding: 3px;
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
        .bg-img2{
            position: relative;
        }
    </style>
</head>

<body>
    <main class="bg-img2">
        @guest
        <div class="watermark"></div>
        @endguest
        <section class="invoiceborder">
            <table>
                <tr>
                    <th style="padding-left: 13px;font-size: 20px;"> {{ $requestData['cname'] }}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td class="address" style="padding-left: 14px;"> {{ $requestData['address_1'] }} {{ $requestData['address_2'] }} {{ $requestData['city'] }} </br> {{ $requestData['state'] }}, {{ $requestData['zip_code'] }} </td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <th colspan="5" class="earning"></th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <p class="earning" style="font-size: 16px"> {{ date('F d, Y', strtotime($requestData['pay_date'])) }} </p> </td>
                </tr>
            </table>
            @php
            $digit = Terbilang::make($requestData['total_net_pay']);
            $word = $digit;
            @endphp
            @php
            $n = $requestData['total_net_pay'];
            [$whole, $decimal] = sscanf($n, '%d.%d');
            $digit_1 = Terbilang::make($decimal);
            @endphp
            <section class="section_2">
                <table>
                    <tr>
                        <td style="font-size:19px; font-weight:400; text-transform: capitalize;">Pay {{ $word }} and {{ $digit_1 }} cents</td>
                        <th class="earning">{{ $requestData['currency'] }} {{ number_format($requestData['total_net_pay'],2) }}</th>
                    </tr>
                    <tr>
                        <td style=" padding: 9px;">
                            <!-- Stub no: 1112 -->
                        </td>
                        <td class="earning">
                            This is not a check
                        </td>
                    </tr>
                </table>
            </section>
            <section style="padding-top: 16px; width:400px;">
                <table>
                    <tr>
                        <td>Pay to the order of</td>
                        <td>{{ $requestData['emp_street_1'] }}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> {{ $requestData['emp_street_2'] }} </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td> {{ $requestData['emp_city'] }} {{ $requestData['emp_state'] }} {{ $requestData['emp_zip_code'] }} </td>
                    </tr>
                </table>
            </section>
            <section>
                <div class="row1">
                    <div class="col1">
                        <table style="width:100%;">
                            <tr>
                                <th colspan="4" style="padding-top: 41px;">Company Intormation</th>
                            </tr>


                            <tr>
                                <td colspan="4" class="address" style="padding-left: 11px;"> {{ $requestData['cname'] }} <br> {{ $requestData['address_1'] }} </br> {{ $requestData['address_2'] }} </br> {{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }} <br> {{ $requestData['tel'] }} </td>
                            </tr>

                        </table>
                    </div>

                    <div class="col2">
                        <table style="width:100%;">
                            <tr>
                                <td style="color:#0000b6; font-size:16px;"> Earnings Statement
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="tablesection">
                <table>
                    <tr>
                        <th class="heading1 padding:0;">Employee Information</th>
                        <th class="heading1"> Social Sec.</th>
                        <th class="heading1">EmployeeID</th>
                        <th class="heading1">Start Date</th>
                        <th class="heading1">End Date</th>
                        <th class="heading1">Check Date</th>

                    </tr>
                    <tr>
                        <td> {{ $requestData['emp_street_1'] }}</br> {{ $requestData['emp_street_2'] }}</br>{{ $requestData['emp_city'] }} {{ $requestData['emp_state'] }}, {{ $requestData['emp_zip_code'] }} </td>
                        <td> {{ $requestData['emp_ssn'] }}</td>
                        <td> {{ $requestData['emp_id'] }}</td>
                        <td> {{ date('m/d/Y', strtotime($requestData['pay_start'])) }} </td>
                        <td>{{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</td>
                        <td> {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
                    </tr>
                </table>
            </section>
            <div class="row">
                <div class="column1">
                    <table>
                        <thead style="border-right: none;">
                            <th class="heading1">Earnings</th>
                            <th class="heading1"> Rate</th>
                            <th class="heading1">Hours</th>
                            <th class="heading1">Current</th>
                            <th class="heading1">Year to date</th>
                        </thead>
                        @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td>{{ $earn }}</td>
                                <td>{{ number_format($requestData['rate'][$key],2) }}</td>
                                <td>{{ number_format($requestData['hours'][$key],2) }}</td>
                                <td>{{ number_format($requestData['period'][$key],2) }}</td>
                                <td style="text-align:center;">{{ number_format($requestData['ytd_total'][$key],2) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="column2">
                    <table>
                        <thead style="border-left: none;">
                            <th class="heading1">Deductions</th>
                            <th class="heading1">Current</th>
                            <th class="heading1">Year to date</th>
                        </thead>
                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                            <tr>
                                <td style="background-color:#f4f2f2;">{{ $taxes }}</td>
                                <td>{{ number_format($requestData['taxes_rate'][$key],2) }}</td>
                                <td style="text-align:center;">{{ number_format($requestData['taxes_ytd'][$key],2) }}</td>
                            </tr>
                        @endforeach

                        @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                            <tr>
                                <td style="background-color:#f4f2f2;">{{ $tax_deduction }}</td>
                                <td>{{ number_format($requestData['period_tax_deduction'][$key],2) }}</td>
                                <td style="text-align:center;">{{ number_format($requestData['ytd_tax_deduction'][$key],2) }}</td>
                            </tr>
                        @endforeach


                    </table>
                </div>
            </div>
            <table class="tfooter " style="background-color: #5ae4f8; color:white; width:100%;">
                <tr>
                    <td style="background: #264FAB; width:140px; padding-left:15px; padding-right:15px; text-align:center;"> Gross Earnings</td>
                    <td class="section" style="color:black;text-align:right;">{{ number_format($requestData['period_gross_total'],2) }}</td>
                    <td class="section" style="color:black;text-align:right;">{{ number_format($requestData['ytd_gross_total'],2) }}</td>

                    <td class="section" style="background-color: #264FAB; width:130px;padding-left:15px; padding-right:15px; text-align:center; margin-left:10px;"> Gross Deduction</td>
                    <td class="section" style="color:black; text-align:right; width:50px;"> {{ number_format($requestData['deduction_tax'],2) }} </td>
                    <td class="section" style="color:black;text-align:center;">{{ number_format($requestData['ytd_deduction_tax'],2) }}
                    </td>
                </tr>
            </table>
            <table class="tabl3" style="width:30%;float: right;">
                <tr style="">
                    <th class="hadding" style=" background: #264FAB; color:white; "> Check No.</th>
                    <td class="hadding section" style=" text-align: right;">000000 </td>
                <tr>

                <tr style="border-top: 2px solid white;">
                    <th class="hadding " style=" background: #264FAB; color:white; "> Net Pay </th>
                    <td class="hadding section" style="text-align: right;"> {{ $requestData['currency'] }} {{ number_format($requestData['total_net_pay'],2) }} </td>
                </tr>
                <tr style="border-top: 2px solid white;">
                    <th class="hadding" style=" background: #264FAB; color:white;"> YTD Net Pay</th>
                    <td class="hadding section" style="text-align: right;"> {{ $requestData['currency'] }} {{ number_format($requestData['total_ytd_net_pay'],2) }} </td>
                </tr>
            </table>
        </section>
    </main>
</body>
</html>
