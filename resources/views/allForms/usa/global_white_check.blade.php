<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global White Check</title>
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

        body {
            color: #000;
            font-size: 14px;
        }

        .table {
            /* max-width: 1200px; */
            margin: 0 auto;
            width: 100%;
        }

        .text {
            margin-right: 10px;

        }

        .employee-box {
            border: 1px solid #000;
            /* width:75%; */
            background-image: linear-gradient(#fff, rgba(0, 0, 0, 0.3));
        }

        .table-data tr {
            text-align: center;

        }

        .td {
            text-align: left !important;
        }

        /* .table-data th {
            padding: 0px 20px 0 0;
        } */

        .statutory {
            text-align: left;
        }

        .column1 {
            float: left;
            width: 60%;
        }

        .column2 {
            float: left;
            width: 40%;


        }

        .sat {
            column-width: 100px;
        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;

        }

        .tablealign {
            text-align: center;
            width: 100%;
        }

        th {
            border-bottom: 3px solid black;
        }

        .borderbottam {
            border-bottom: 3px solid black;
        }

        .bg-img {
            position: relative;
        }
        .container {
            position: absolute;
            top: 0px;
            z-index: 3;
            height: 300px;
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

        .row2::after {
            content: "";
            clear: both;
            display: table;
        }

        .col0 {
            float: left;
            width: 14%;
            margin-right: 10px;
        }

        .col1 {
            float: left;
            width: 45%;
            margin-right: 10px;
        }

        .col2 {
            float: left;
            width: 41%;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <main class="bg-img2">
        <img src="{{ public_path('images/form.svg') }}"
            style="position: absolute; top: 75%; right:0px;left: 0px; width:106.50%;   z-index: -1;">
        @guest
            <div class="watermark"></div>
        @endguest
        @auth
            @if (Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
                <div class="watermark"></div>
            @endif
        @endauth
        <section>
            <div class="row2" style="width:100%">
                <h3
                    style="text-align:right; text-transform:capitalize; font-size:27.5px; font-weight:bold;font-family: 'Arial', sans-serif;">
                    Earnings Statement</h3>
                <div class="col0">
                </div>
                <div class="col1">
                    <table style="width: 100%;">
                        <tr>
                            <td
                                style="font-weight:bold;font-size:18px; text-transform:uppercase;font-family: 'Arial', sans-serif;">
                                {{ $requestData['cname'] }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="font-size:16px; text-transform:uppercase;line-height:1;font-family: 'Arial', sans-serif;">
                                {{ $requestData['address_1'] }} {!! addressTwo($requestData,true) !!}<br>{{ $requestData['city'] }},
                                {{ $requestData['state'] }}
                                {{ $requestData['zip_code'] }}
                            </td>
                        </tr>
                    </table>
<br>
                    <table style="width: 100%;">
                        <tr>
                            <td style="font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif; width:40%">Taxable Marital Status:</td>
                            <td style="font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif;">1</td>
                        </tr>
                        <tr>
                            <td style="font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif;">Expectations/Allowances:</td>
                            <td style="text-aling:left;font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif;"> {{ $requestData['exemptions'] }} </td>
                        </tr>
                        <tr>
                            <td style="font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif; text-align:center;">Federal:</td>
                            <td style="font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif;">1 </td>
                        </tr>
                        <tr>
                            <td style="font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif; text-align:center;">NY:</td>
                            <td style="font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif;">1</td>
                        </tr>
                    </table>
                </div>

                <div class="col2">
                    <table style="width: 100%;">
                        <tr>
                            <td style="font-size:18px; font-family: 'Arial, Helvetica', sans-serif; font-weight:400; width:60%;">Period Beginning:</td>
                            <td style="text-align: left; font-size:18px; font-family: 'Arial, Helvetica', sans-serif; font-weight:400; width:40%;">{{ date('m/d/Y', strtotime($requestData['pay_start'])) }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:18px; font-family: 'Arial, Helvetica', sans-serif; font-weight:400; ">Period Ending:</td>
                            <td style="text-align: left; font-size:18px; font-family: 'Arial, Helvetica', sans-serif; font-weight:400; ">{{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:18px; font-family: 'Arial, Helvetica', sans-serif; font-weight:400; ">Pay Date:</td>
                            <td style="text-align: left; font-size:18px; font-family: 'Arial, Helvetica', sans-serif; font-weight:400; ">{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
                        </tr>
                    </table>
                        <br>
                    <table>
                        <tr>
                            <td style="font-weight: bold; font-size:14px;text-transform: capitalize;font-family: Arial, Helvetica, sans-serif;">{{ $requestData['emp_name'] }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;  text-transform: capitalize;font-family: Arial, Helvetica, sans-serif;font-size:14px;">{{ $requestData['emp_street_1'] }}</td>
                        </tr>
                        @if($requestData['emp_street_2'] != '')
                        <tr>
                            <td style="font-weight: bold;  text-transform: capitalize;font-family: Arial, Helvetica, sans-serif;font-size:14px;">{{ $requestData['emp_street_2'] }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td style="font-weight: bold;  text-transform: capitalize;font-family: Arial, Helvetica, sans-serif;font-size:14px;">{{ $requestData['emp_city'] }}, {{ $requestData['emp_state'] }} {{ $requestData['emp_zip_code'] }} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <br>
        <br>
        <section>
            <div class="row" style="width: 100%; ">
                <div class="column1">
                    <table class="tablealign">
                        <thead style="font-size:15px; ">
                            <th
                                style="text-align: left;width:21%;font-size:18px;font-family: Arial, Helvetica, sans-serif; font-weight:bold; ">
                                Earnings</th>
                            <th
                                style="text-align: center;margin-left:2px;width:18%;font-family: Arial, Helvetica, sans-serif; font-weight:bold;font-size:14px;">
                                rate</th>
                            <th
                                style="text-align: center;margin-left:2px;width:22%;font-family: Arial, Helvetica, sans-serif; font-weight:bold;font-size:14px;">
                                hours</th>
                            <th
                                style="width:18%;text-align:center;font-family: Arial, Helvetica, sans-serif; font-weight:bold;font-size:14px;">
                                this period</th>
                            <th style="width:5px; height:1px; margin-top:5px; border:none;"></th>
                            <th
                                style=" margin-left:2px;width:21%;font-family: Arial, Helvetica, sans-serif; font-weight:bold;font-size:14px;">
                                year to date</th>
                        </thead>
                        <tbody style="font-size:13px;">
                            @foreach ($requestData['earning'] as $key => $earn)
                                <tr>
                                    <td
                                        style="text-align: left;font-size:15px;font-family: Arial, Helvetica, sans-serif;">
                                        {{ $earn }}</td>
                                    <td
                                        style="text-align: rightfont-size:15px;font-family: Arial, Helvetica, sans-serif;">
                                        {{ number_format($requestData['rate'][$key], 2) }}</td>
                                    <td
                                        style="text-align: center;font-size:15px;font-family: Arial, Helvetica, sans-serif;">
                                        {{ number_format($requestData['hours'][$key], 2) }}</td>
                                    <td
                                        style="text-align: center;font-size:15px;font-family: Arial, Helvetica, sans-serif;">
                                        {{ number_format($requestData['total'][$key], 2) }} </td>
                                    <td></td>
                                    <td style="font-size:15px;font-family: Arial, Helvetica, sans-serif;">
                                        {{ number_format($requestData['ytd_total'][$key], 2) }} </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <br>

                        <tr>
                            <td></td>
                            <td style="text-align: left; font-size:15px; border-bottom:3px solid black; border-top:3px solid black;font-family: Arial, Helvetica, sans-serif;"
                                colspan="2"><b>Gross Pay</b></td>
                            <td
                                style="font-size:15px; border-bottom:3px solid black; border-top:3px solid black;text-align:right;font-family: Arial, Helvetica, sans-serif;">
                                <b>{{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'], 2) }}</b>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="column2" style="padding: 2px;">
                    <table class="tablealign">
                        <tr>
                            <td colspan="3" style="text-align: left;font-family: Arial, Helvetica, sans-serif;">Other
                                Benefits and</td>
                        </tr>
                        <tr>
                            <td class="borderbottam"
                                style="font-weight: bold;text-align:left;font-family: Arial, Helvetica, sans-serif;">
                                Information</td>
                            <td
                                class="borderbottam"style="font-weight: bold;font-family: Arial, Helvetica, sans-serif;">
                                this period</td>
                            <th style="width:5px; height:1px; margin-top:5px; border:none;"></th>
                            <td
                                class="borderbottam"style="font-weight: bold;font-family: Arial, Helvetica, sans-serif;">
                                total to date</td>
                        </tr>
                        <tr>

                            <td colspan="4"
                                style="font-size: 12px; text-align:left;font-family: Arial, Helvetica, sans-serif;">
                                Company Telephone Number:&nbsp;@if($requestData['tel'] != ''){{ $requestData['tel'] ?? '' }}@endif </td>

                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <section style="margin-top:30px;">
            <table class="table-data" style="width: 48%;">
                <tr style="font-size:15px;">
                    <td
                        style="border-bottom: 3px solid #000;text-align:left;font-family: Arial, Helvetica, sans-serif;">
                        <b>Deductions</b>
                    </td>
                    <td style="border-bottom: 3px solid #000; text-align:left;font-family: Arial, Helvetica, sans-serif;"
                        colspan="3"><b>Statutory</b></td>
                </tr>
                @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td></td>
                        <td colspan="2"
                            style="text-align: left; font-size:15px;font-family: Arial, Helvetica, sans-serif; ">
                            {{ $taxes }}</td>
                        <td style="text-align: right;font-size:15px;font-family: Arial, Helvetica, sans-serif;">
                            {{ number_format($requestData['taxes_rate'][$key], 2) }} </td>
                    </tr>
                @endforeach
                <br>
                <tr>
                    <td></td>
                    <td style="text-align: left; font-size:15px; border-bottom:3px solid black;font-family: Arial, Helvetica, sans-serif; "
                        colspan="2"><b>Other</b></td>
                    <td style="font-size:15px; border-bottom:3px solid black;"></td>
                </tr>
                @if (count($requestData['tax_deduction'] ?? []) > 0)
                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td></td>
                        <td colspan="2" style="text-align: left; font-size:15px;font-family: Arial, Helvetica, sans-serif; ">{{ $tax_deduction }}</td>
                        <td style="text-align: right;font-size:15px;font-family: Arial, Helvetica, sans-serif;">{{ number_format($requestData['period_tax_deduction'][$key], 2) }} </td>
                    </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="7"></td>
                </tr>
                <br>
                <br>
                <tr>
                    <td></td>
                    <td style="text-align: left; font-size:15px; border-bottom:3px solid black; border-top:3px solid black;font-family: Arial, Helvetica, sans-serif;"
                        colspan="2"><b>Net Pay</b></td>
                    <td
                        style="font-size:15px; border-bottom:3px solid black; border-top:3px solid black;font-family: Arial, Helvetica, sans-serif;">
                        <span
                            style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'], 2) }}
                    </td>
                </tr>
            </table>
        </section>

        <section>
            <div class="row" style="width: 100%; margin-top:7%;">
                <div style="width: 80%;">
                    <table class="tablealign">
                        <tr style="font-size:15px;">
                            <td style="width:17%"></td>
                            <td style="text-align:left;font-family: Arial, Helvetica, sans-serif;">Your federal taxable
                                wages this period are <br> <span
                                    style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'], 2) }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>


        <section class="bg-img">
            <div class="container" style=" margin-top:100px; width:100%; padding:0px 20px;">
                <div class="row" style="display: flex;justify-content: space-between;padding: 0px 14px;">
                    <div class="global-address" @if($requestData['address_2'] != '')style="width: 50%; float:left; position: relative; top:15px; right:0px; left:60px;" @else style="width: 50%; float:left; position: relative; top:30px; right:0px; left:60px;"@endif>
                        <p
                            style="font-size:15px; margin: 0;color:black;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase;font-weight:400;">
                            {{ $requestData['cname'] }}</p>
                        <p
                            style="font-size:15px; margin: 0;color:black;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase;font-weight:400;">{{ $requestData['address_1'] }}</p>
                            @if($requestData['address_2'] != '')<P style="font-size:15px; margin: 0;color:black;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase;font-weight:400;">{{ $requestData['address_2'] }} </P>@endif
                        <P
                            style="font-size:15px; margin: 0;color:black;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase;font-weight:400;">
                            {{ $requestData['city'] }}, {{ $requestData['state'] }} {{ $requestData['zip_code'] }}
                        </P>
                    </div>
                    <div style="width: 50%;float:right;">
                        <h6 @if($requestData['address_2'] != '')style="text-align:left; left:80px; position: relative;  top:23px;font-weight:400;font-size: 12px; "@else style="text-align:left; left:80px; position: relative;  top:40px;font-weight:400;font-size: 12px;"@endif>{{ $requestData['check_no'] }} </h6>
                        <h6 @if($requestData['address_2'] != '')style="font-size: 12px; text-align:left; bottom:4px; left:80px; position: relative; font-weight:400;"@else style="font-size: 12px; text-align:left; top:10px; left:80px; position: relative; font-weight:400;"@endif>{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</h6>
                    </div>
                </div>
                <table @if($requestData['address_2'] != '')style="margin-top:-12px;" @else style="" @endif>
                    <tr>
                        <td style="width:10%;"></td>
                        <td
                            style="font-size:15px; padding-top:40px; width:30%;padding-left:5px; font-weight:bold;font-family: Arial, Helvetica, sans-serif;text-transform:capitalize;">
                            {{ $requestData['emp_name'] }}</td>
                        <td
                            style="font-size:15px; width:40%;padding-top:40px !important; text-align:left;padding-left:60px;font-family: Arial, Helvetica, sans-serif;">
                            XXXXX<b>{{ $requestData['account_number_last_4'] }}</b></td>
                        <td
                            style="font-size:15px; width:20%;padding-top:40px; text-align:left;padding-left:37px;font-family: Arial, Helvetica, sans-serif;">
                            <b><span
                                    style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'], 2) }}</b>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
    <script>


    </script>
</body>

</html>
