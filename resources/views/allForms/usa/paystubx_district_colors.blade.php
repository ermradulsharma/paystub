<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Arimo:ital@1&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        @import url('https://fonts.cdnfonts.com/css/roman-new-times');
        @import url('https://fonts.cdnfonts.com/css/times');
        @import url('https://fonts.cdnfonts.com/css/arial-2');
        @import url('https://fonts.cdnfonts.com/css/arial-mt');

        @font-face {
            font-family: 'Arial, Helvetica', sans-serif;
            font-family: 'Arial MT', sans-serif;
            font-family: 'Arial MT Narrow', sans-serif;
            font-family: 'Arial Rounded MT', sans-serif;
            font-family: 'Arial Rounded MT Bold', sans-serif;
            font-family: 'ArialMT', sans-serif;
            font-family: 'Arial MT Black', sans-serif;
            font-family: 'Maven Pro', sans-serif;
            font-family: 'Arimo', sans-serif;
            font-family: 'Times New Roman', sans-serif;
            font-family: 'PT Sans Narrow', sans-serif;
            font-family: 'Poppins', sans-serif;
            font-family: 'MICR', sans-serif;
            src: url("{{ asset('fonts/micr-encoding.regular.ttf') }}") format('ttf');
        }

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
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .section_2 {

            background: #D8E3F7;
            color: black;
            height: 65px;
            overflow: hidden;
            padding: 15px;
        }

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
        }

        .data:nth-child(6) {
            background-color: #edededc4;
            padding: ;
        }

        .tablesection {
            padding-top: 25px;
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
        <section class="invoiceborder">
            <table>
                <tr>
                    <th style="padding-left: 13px;font-size: 20px;"></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td class="address"
                        style="text-transform:none;  color:#000;letter-spacing:-0.5px;text-transform:capitalize;">
                        <p
                            style="padding: 0; margin:0; font-size:30px;font-family: Arial, Helvetica, sans-serif; font-weight:400;">
                            {{ $requestData['cname'] }}</p>

                        <p
                            style="padding: 0; margin:0;font-size:22px; font-weight:400;font-family: Arial, Helvetica, sans-serif;line-height:1;">
                            {{ $requestData['address_1'] }}<br>@if($requestData['address_2']!='') {{ $requestData['address_2'] }}<br>@endif
                            {{ $requestData['city'] }}, {{ $requestData['state'] }} {{ $requestData['zip_code'] }}</p>
                    </td>

                </tr>
                <tr>
                    <th colspan="5" class="earning"></th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <p class="earning"
                            style="font-size: 16px;font-weight:400;font-family: Arial, Helvetica, sans-serif;">
                            {{ date('F d, Y', strtotime($requestData['pay_date'])) }} </p>
                    </td>
                </tr>
            </table>
            @php
                // $digit = Terbilang::make($requestData['total_net_pay']);
                // $word = $digit;
                $word = getCurrency($requestData['total_net_pay']);

                // $n = $requestData['total_net_pay'];
                // [$whole, $decimal] = sscanf($n, '%d.%d');
                // $digit_1 = getCurrency($decimal); // Terbilang::make($decimal);
        @endphp
            <section class="section_2">
                <table style="width:100%">
                    <tr>
                        <td style="text-align:left; padding-left:5px; font-size:17px; font-weight:400; text-transform: capitalize; width:77%;"
                            rowspan="2">Pay {{ $word }}</td>
                        <th style="font-weight:400;" class="earning">{{ $requestData['currency'] }}
                            {{ number_format($requestData['total_net_pay'], 2) }}</th>
                    </tr>
                    <tr>
                        <td style="font-size:15px; color:#515c6b;text-align:right;" class="earning"> This is not a check
                        </td>
                    </tr>
                </table>
            </section>
            <section style="padding-top: 16px; width:400px;">
                <table>
                    <tr>
                        <td style="color: #515c6b;  vertical-align:top;">
                            <p style="font-size:18px;font-family: Arial, Helvetica, sans-serif;">Pay to the order of</p>
                        </td>
                        <td style="text-transform: capitalize;font-size:20px; color:#1a1a1a;">
                            <p style="font-family: Arial, Helvetica, sans-serif;">{{ $requestData['emp_name'] }} <br>
                                {{ $requestData['emp_street_1'] }}<br>@if($requestData['emp_street_2']!='') {{ $requestData['emp_street_2'] }}<br>@endif{{ $requestData['emp_city'] }},
                                {{ $requestData['emp_state'] }} {{ $requestData['emp_zip_code'] }} </p>
                        </td>
                    </tr>
                </table>
            </section>
            <section>
                <div class="row1">
                    <div class="col1">
                        <table style="width:100%; position: relative; top:30px; padding-bottom:10px;">
                            <tr>
                                <th colspan="4"
                                    style="padding-top: 41px;font-family: Arial, Helvetica, sans-serif;font-size:13px;">
                                    Company Information</th>
                            </tr>
                            <tr>
                                <td colspan="4" class="address"
                                    style="padding-left: 11px; text-transform:capitalize;font-family: Arial, Helvetica, sans-serif;">
                                    {{ $requestData['cname'] }} <br> {{ $requestData['address_1'] }}<br>@if($requestData['address_2']!='') {{ $requestData['address_2'] }}<br>@endif
                                    {{ $requestData['city'] }}, {{ $requestData['state'] }}
                                    {{ $requestData['zip_code'] }} @if ($requestData['tel'] != "")
                                        <br> {{ $requestData['tel'] }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col2">
                        <table style="width:100%;">
                            <tr>
                                <td
                                    style="color:#1c3d86; font-size:16px; font-weight:bold;font-family: Arial, Helvetica, sans-serif;">
                                    Earnings Statement</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <section class="tablesection">
                <table style="padding:0; ">
                    <tr>
                        <th class="heading1 padding:0;">Employee Information</th>
                        <th class="heading1"> Social Sec.ID</th>
                        <th class="heading1">EmployeeID</th>
                        <th class="heading1">Start Date</th>
                        <th class="heading1">End Date</th>
                        <th class="heading1">Check Date</th>

                    </tr>
                    <tr>
                        <td style="text-transform:capitalize;padding:10px 0px;">{{ $requestData['emp_name'] }}<br>{{ $requestData['emp_street_1'] }}<br>@if($requestData['emp_street_2']!='') {{ $requestData['emp_street_2'] }}<br>@endif{{ $requestData['emp_city'] }}, {{ $requestData['emp_zip_code'] }} </td>
                        <td style="vertical-align:top; padding:10px 0px;"> XXX-XX-{{$requestData['emp_ssn']}}</td>
                        <td style="vertical-align:top; padding:10px 0px;text-align:center;"> {{ $requestData['emp_id'] }}</td>
                        <td style="vertical-align:top; padding:10px 0px;">
                            {{ date('m/d/Y', strtotime($requestData['pay_start'])) }} </td>
                        <td style="vertical-align:top; padding:10px 0px;">
                            {{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</td>
                        <td style="vertical-align:top; padding:10px 0px;">
                            {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
                    </tr>
                </table>
            </section>
            <div class="row">
                <div class="column1">
                    <table>
                        <thead style="border-right: none;">
                            <th class="heading1">Earnings</th>
                            <th class="heading1">Rate</th>
                            <th class="heading1">Hours</th>
                            <th class="heading1">Current</th>
                            <th class="heading1">Year to date</th>
                        </thead>
                        @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td>{{ $earn }}</td>
                                <td>{{ number_format($requestData['rate'][$key], 2) }}</td>
                                <td>{{ number_format($requestData['hours'][$key], 2) }}</td>
                                <td>{{ number_format($requestData['period'][$key], 2) }}</td>
                                <td style="text-align:center;">{{ number_format($requestData['ytd_total'][$key], 2) }}
                                </td>
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
                                <td style=" text-align:center;">
                                    {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                                <td style="text-align:center;">{{ number_format($requestData['taxes_ytd'][$key], 2) }}
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                            <tr>
                                <td style="background-color:#f4f2f2;">{{ $tax_deduction }}</td>
                                <td style="text-align:right;">
                                    {{ number_format($requestData['period_tax_deduction'][$key], 2) }}</td>
                                <td style="text-align:right;">
                                    {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <table class="tfooter " style="background-color: #5ae4f8; color:white; width:100%;">
                <tr>
                    <td
                        style="background: #264FAB; width:140px; padding-left:15px; padding-right:15px; text-align:left;">
                        Gross Earnings</td>
                    <td class="section" style="color:black;padding-left:56px;">
                        {{ number_format($requestData['period_gross_total'], 2) }}</td>
                    <td class="section" style="color:black;text-align:right; padding-right:13px; ">
                        {{ number_format($requestData['ytd_gross_total'], 2) }}</td>
                    <td class="section"
                        style="background-color: #264FAB; width:105px;padding-left:15px; padding-right:15px; text-align:center; margin-left:10px;">
                        Gross Deductions</td>
                    <td class="section" style="color:black;width:67px; text-align:right;">
                        {{ number_format($requestData['deduction_tax'], 2) }} </td>
                    <td class="section" style="color:black;width:67px;text-align:right;padding-right:22px; ">
                        {{ number_format($requestData['ytd_deduction_tax'], 2) }} </td>
                </tr>
            </table>
            <table class="tabl3" style="width:30%;float: right;">
                <tr style="">
                    <td class="hadding" style=" background: #264FAB; color:white;text-align:center; "> Check No.</td>
                    <td class="hadding section" style=" text-align: right;">{{ $requestData['check_no'] ?? '' }}</td>
                <tr>

                <tr style="border-top: 2px solid white;">
                    <td class="hadding " style=" background: #264FAB; color:white; text-align:center;"> Net Pay </td>
                    <td class="hadding section" style="text-align: right;"> {{ $requestData['currency'] }}
                        {{ number_format($requestData['total_net_pay'], 2) }} </td>
                </tr>
                <tr style="border-top: 2px solid white;">
                    <td class="hadding" style=" background: #264FAB; color:white;text-align:center;"> YTD Net Pay</td>
                    <td class="hadding section" style="text-align: right;"> {{ $requestData['currency'] }}
                        {{ number_format($requestData['total_ytd_net_pay'], 2) }} </td>
                </tr>
            </table>
        </section>
    </main>
</body>

</html>
