<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paystubx Modern</title>
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

        .text {
            margin-right: 10px;

        }

        .employee-box {
            border: 1px solid #000;
            background-image: linear-gradient(#fff, rgba(0, 0, 0, 0.3));
        }

        .tds tr {
            text-align: right;

        }

        .right {
            text-align: right;

        }

        .td {
            text-align: left !important;
        }

        td {
            font-size: 12px;
        }

        th {
            font-size: 13px;
        }

        .table-data th {
            padding: 0px 20px 0 0;
        }

        .statutory {
            text-align: left;
        }

        .center {
            text-align: center !important;
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
            width: 35%;
            margin-left: 5%;
        }

        .tds {
            border-collapse: collapse;
        }

        .borderback {
            border-top: 2px solid black;
            border-bottom: 2px solid black;
            background-color: #98919145;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;

        }

        .col1 {
            float: left;
            width: 40%;
            margin-left: 80px;

        }

        .col2 {
            float: left;
            width: 40%;
            margin-left: 15%;
            margin-top: 6%;

        }

        .row0::after {
            content: "";
            clear: both;
            display: table;

        }

        .cols1 {
            float: left;
            width: 50%;
            margin-left: 15%;
            margin-top: 4%;
        }

        .cols2 {
            float: left;
            width: 40%;
        }

        .table1 {
            width: 28%;
            margin-left: 14%;
        }

        .table1 td {
            font-size: 10px;
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

        .watermark2 {
            position: absolute;
            width: 100%;
            height: 700px;
            top: 200px;
            left: 0px;
            right: 0px;
            background-image: url("images/final-watermark.png");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .bg-img2 {
            position: relative;
        }

        .info{
            width: 100%;
        }
        .templete_elements{
            width: 100%;
        }
        .emploayer_info{
            width: 100%;
        }
        .emploayer_earning{
            width: 100%;
        }
    </style>
</head>

<body>
    <main class="bg-img2">
        @guest
            <div class="watermark"></div>
            <div class="watermark2"></div>
        @endguest
        @auth
            @php
                $date = \Carbon\Carbon::now();
            @endphp
            @if(Auth::user()->device_type == '')
                @if(Auth::user()->usa_expiry_date <= $date || !isset($requestData['watermark']) || Auth::user()->usa_expiry_date == '')
                    <div class="watermark"></div>
                    <div class="watermark2"></div>
                @endif
            @endif
            @if (Auth::user()->device_type == 'website')
                @if(Auth::user()->usa_expiry_date <= $date || !isset($requestData['watermark']))
                    <div class="watermark"></div>
                    <div class="watermark2"></div>
                @endif
            @endif
            @if (Auth::user()->device_type == 'iOS')
                @if(Auth::user()->expiryDate <= $date || !isset($requestData['watermark']))
                    <div class="watermark"></div>
                    <div class="watermark2"></div>
                @endif
            @endif
            @if (Auth::user()->device_type == 'android')
                @if(Auth::user()->expiryDate <= $date || !isset($requestData['watermark']))
                    <div class="watermark"></div>
                    <div class="watermark2"></div>
                @endif
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
                                <td style="font-family: Arial, Helvetica, sans-serif;">{{ $requestData['dept_number'] }}
                                <td>{{ $requestData['clock_vchr_number'] }}</td>
                                <td>{{ $requestData['advice_number'] }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:36%">&nbsp;</td>
                </tr>
            </table>
        </section>

        <section class="info">
            <table class="info" style="position:relative; top:15px;">
                <tr>
                    <td style="width:12%;"></td>
                    <td style="width:52%;">
                        <table class="info_1">
                            <tr><td style="text-transform:uppercase; font-size:10px;"> {{ $requestData['cname'] }} </td></tr>
                            <tr><td style="text-transform:uppercase; font-size:10px;"> {{ $requestData['address_1'] }}</td></tr>
                            @if($requestData['address_2'] != '')
                            <tr><td style="text-transform:uppercase; font-size:10px;">{{ $requestData['address_2'] }} </td></tr>
                            @endif
                            <tr><td style="text-transform:uppercase; font-size:10px;">{{ $requestData['city'] }}, {{ $requestData['state'] }} {{ $requestData['zip_code'] }} </td></tr>
                        </table>
                    </td>
                    <td style="width:36%;">
                        <table class="info_2" style="position: relative; bottom:20px;">
                            <tr style=" padding:0;"><td style="" colspan="2"><h3 style="font-size:25px;position: relative; top:25px;">Earnings Statement</h3></td></tr>
                            <tr>
                                <td style="font-size:13px; color:#555;">Period Start:</td>
                                <td style="font-size:13px; color:#555;">{{ date('m/d/Y', strtotime($requestData['pay_start'])) }}</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px; color:#555; width:30%; text-align:left">Period Ending:</td>
                                <td style="font-size:13px; color:#555;">{{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px; color:#555; width:28%; text-align:left">Pay Date:</td>
                                <td style="font-size:13px; color:#555;">{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </section>

        <section class="emploayer_info"style="position:relative; bottom:0px;">
            <table class="emploayer_info">
                <tr>
                    <td style="width:12%;">&nbsp;</td>
                    <td style="width:52%;">
                        <table class="emploayer_info_1" style="position:relative; bottom:10px;">
                            <tr><td>Texable Marital Status: {{ $requestData['marital_status'] }} </td></tr>
                            <tr><td> Examptions/Allowances:{{ $requestData['exemptions'] }} </td></tr>
                            <tr><td>Federal:0 </td></tr>
                        </table>
                    </td>
                    <td style="width:36%;">
                        <table class="emploayer_info_2">
                            <tr><td></td></tr>
                            <tr>
                                <td style="font-size:13px; color:#555;text-transform:capitalize;">{{ $requestData['emp_name'] }}</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px; color:#555; width:30%; text-align:left">{{ $requestData['emp_street_1'] }}</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px; color:#555; width:28%; text-align:left">{{ $requestData['emp_city'] }},  {{ $requestData['emp_state'] }} {{ $requestData['emp_zip_code'] }}</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px; color:#555; width:28%; text-align:left">***-**-{{ $requestData['emp_ssn'] }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </section>

        <section class="emploayer_earning">
            <table  able class="emploayer_earning">
                <tr>
                    <td style="width:60%;">
                        <table class="tds emploayer_earning">
                            <tr style="border-bottom:2px solid black;">
                                <td style="text-align: left; font-size:16px; width:20%;"><b>Earning</b></td>
                                <td style="text-align: left; font-size:14px;position: relative; right:20px;"><b>Rate</b></td>
                                <td><b>Hours</b></td>
                                <td><b>This Period</b></td>
                                <td><b>Year-to-date</b></td>
                            </tr>
                            @php
                                $totalHours = 0;
                                $totalRate = 0;
                            @endphp
                            @foreach ($requestData['earning'] as $key => $earn)
                                @php
                                    $totalHours = $requestData['hours'][0];
                                    $totalRate = $requestData['rate'][0];
                                @endphp
                                <tr>
                                    <td style="text-align:left;text-transform:capitalize;width:20%;">{{ $earn }} </td>
                                    <td style="text-align: left;">{{ number_format($requestData['rate'][$key], 2) ?? '' }} </td>
                                    <td>{{ number_format($requestData['hours'][$key], 2) ?? '' }} </td>
                                    <td>{{ number_format($requestData['period'][$key], 2) }} </td>
                                    <td>{{ number_format($requestData['ytd_total'][$key], 2) }} </td>
                                </tr>
                            @endforeach
                            <br>
                            <tr>
                                <td></td>
                                <td colspan="2" class="borderback" style="text-align:left; padding-left:10px;"><b>Gross Pay</b></td>
                                <td class="borderback"> <b> {{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'], 2) }}</b></td>
                                <td><b>{{ number_format($requestData['total_ytd_net_pay'], 2) }}</b></td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:4%;">&nbsp;</td>
                    <td style="width:36%;">
                        <table style="emploayer_earning text-align:left; position:relative; top:18px;">
                            <tr>
                                <td><b>Important Notes</b></td>
                            </tr>
                            <tr>
                                <td>EFFECTIVE THIS PAY PERIOD - REGULAR</td>
                            </tr>
                            <tr>
                                <td>CURRENT PAY RATE IS: {{ $requestData['currency'] }}
                                    @if ($totalRate != 0 && $totalHours != 0)
                                        {{ number_format($totalRate / $totalHours, 2) }}
                                    @else
                                        {{ 0 }}
                                    @endif PER HOUR</td>
                            </tr>
                            <tr>
                                <td style="text-transform: uppercase;">Company Telephone Number:&nbsp;@if($requestData['tel'] != ''){{ $requestData['tel'] ?? '' }}@endif </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </section>

        <br>

        <section class="emploayer_earning">
            <table class="emploayer_earning">
                <tr>
                    <td style="width:60%;">
                        <table class="tds emploayer_earning">
                            <tr style="border-bottom:2px solid black;">
                                <td style="text-align: left; width:20%;"><b>Deductions</b></td>
                                <td style="text-align: left; padding-left:10px;" colspan="4"><b>Statutory</b></td>
                            </tr>
                            @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                                <tr>
                                    <td></td>
                                    <td colspan="2" style="text-align: left; padding-left:10px; text-transform:capitalize;">{{ $taxes }}</td>
                                    <td>{{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                                    <td>{{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>
                                </tr>
                            @endforeach

                            @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                                <tr>
                                    <td></td>
                                    <td style="text-align: left; padding-left:10px; text-transform:capitalize;">{{ $tax_deduction }}</td>
                                    <td>{{ number_format($requestData['period_tax_deduction'][$key], 2) }}</td>
                                    <td>{{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="td" colspan="2" style="padding-left:10px;">Total deduction</td>
                                <td class="right">{{ number_format($requestData['period_gross_total'], 2) }}</td>
                                <td class="right">{{ number_format($requestData['ytd_gross_total'], 2) }}</td>
                            </tr>
                            <br>
                            <tr>
                                <td></td>
                                <td colspan="2" class="borderback" style="text-align:left; padding-left:10px;"><b>Net Pay</b></td>
                                <td class="borderback"> <b> {{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'], 2) }}</b></td>
                                <td><b>{{ number_format($requestData['total_ytd_net_pay'], 2) }}</b></td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:4%;">&nbsp;</td>
                    <td style="width:36%;"></td>
                </tr>
            </table>
        </section>

        <section>
            <table style="padding-top:10px;font-weight:bold; margin:0 auto 0 200px; text-align:center; width:50%;">
                <tr>
                    <td>*Excluded from federal taxable wages</td>
                </tr>
            </table>
        </section>

        <br>

        <div class="container" style=" margin-top:50px; width:100%;">
            <div class="row">
                <div class="col1">
                    <table style="width:100%;padding-left:50px;">
                        <tr>
                            <td style="text-transform: uppercase; font-size:10px;"> {{ $requestData['cname'] }}<br>
                                {{ $requestData['address_1'] }}{!! addressTwo($requestData, true) !!}<br>
                                {{ $requestData['city'] }} {{ $requestData['state'] }},
                                {{ $requestData['zip_code'] }} </td>
                        </tr>
                    </table>
                </div>
                <div class="col2" style="text-align:right;">
                    <table style="width:100%;">
                        <tr>
                            <td><b>Payroll check #:&nbsp;&nbsp;</b>09985178967</span> </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Pay Day:&nbsp;&nbsp;</b> <Span
                                    style="padding-left:45px;">{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</Span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            @php
                $digit = Terbilang::make($requestData['total_net_pay']);
                $word = $digit;
            @endphp
            @php
                $n = $requestData['total_net_pay'];
                [$whole, $decimal] = sscanf($n, '%d.%d');
                $digit_1 = Terbilang::make($decimal);
            @endphp
            <table style="width: 100%; margin:auto;">
                <tr style="border-bottom: 1px solid;">
                    <td></td>
                    <td style="padding: 0;">Pay to the<br>order off:</td>
                    <td style="padding: 0;text-transform:capitalize;"> {{ $requestData['emp_name'] }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td>This amount:</td>
                    <td
                        style="padding: 3px 170px 3px 0px; border-left:none; text-transform:capitalize;  background-color: #98919145; border-right:2px solid #000; border-top:2px solid #000; border-bottom:2px solid #000; font-size:12px:">
                        {{ $word }} and {{ $digit_1 }} cents</td>
                    <td colspan="2" style=" text-align: right;">
                        {{ number_format($requestData['total_net_pay'], 2) }} </td>
                </tr>
            </table>

            <br><br>

            <table style="float: right; margin-right:50px; font-size:11px;">
                <tr>
                    <td>VOID</td>
                    <td>VOID</td>
                    <td>VOID</td>
                    <td style="padding-left: 100px;">AUTHORIZED SIGNATURE<br>VOID AFTER 90 DAYS</td>
                </tr>
            </table>

            <br> <br> <br>

            <table style="width:100%;">
                <tr>
                    <td
                        style="font-size:14px; text-align:right; letter-spacing:1.5px; font-weight:bold; padding-right:15px;">
                        DIRECT DEPOSIT - DO NOT CASH - THIS IS NOT A CHECK</td>
                </tr>
                <br>
                <tr>
                    <td style="text-align:center; font-size:11px; ">
                        <li style="list-style-type: square;margin-left:200px;">01235446 0005764948947474898</li>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left;">Natona, Ran<br>DO NOT CASH<br>RECORD ONLY</td>
                </tr>
            </table>
        </div>
    </main>
</body>

</html>
