<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paystubs Prior</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        @font-face {
            font-family: 'Poppins', sans-serif;
        }

        @font-face {
            font-family: 'MICR', sans-serif;
            src: url("{{asset('fonts/micr-encoding.regular.ttf')}}") format('ttf');
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            padding: 3px;
            font-size: 12px;
        }

        th {
            font-size: 13px;
        }

        .row1::after {
            content: "";
            clear: both;
            display: table;
        }

        .column1 {
            float: left;
            width: 55%;
            padding-right: 10px;
            margin-right: 20px;

        }

        .column2 {
            float: left;
            width: 38%;

            padding-left: 5px;
        }

        .row2::after {
            content: "";
            clear: both;
            display: table;
        }

        .col1 {
            float: left;
            width: 45%;
            padding-right: 5px;
        }

        .col2 {
            float: left;
            width: 50%;
            padding-left: 5px;
        }

        .shrapdana {
            max-width: 100%;
        }

        .border-line {
            position: relative;
        }

        .border-line:before {
            position: absolute;
            content: "";
            top: 180px;
            left: 80px;
            right: 0;
            background-image: url("images/border-line.png");
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            max-width: 550px;
            height: 1px;
            margin: 0 auto;

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
        <table style="width:100%;">
            <tr style="width:100%;">
                <td style=" padding-left:50px; padding-top:0px; padding-bottom:0px; padding-right:0px; font-weight:bold; font-size:25px; font-family: 'Poppins', sans-serif;"> {{ $requestData['cname'] }}</td>
                <td></td>
                <td style="font-size:14px;text-align:right;"><b>No: 17658</b></td>
            </tr>
            <tr>
                <td style="padding-left:50px; padding-top:0px; padding-bottom:30px; padding-right:0px; font-size:14px; font-family: 'Poppins', sans-serif;"> {{ $requestData['address_1'] }} {{ $requestData['city'] }} <br> {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}</td>
                <td></td>
                <td style="font-size:14px; text-align:right; width:250px; font-family: 'Poppins', sans-serif;">Date <span style="padding-left:5px;">{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</span> </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            @php
                $digit = Terbilang::make((int) $requestData['total_net_pay']);
                $word = $digit;
            @endphp
            @php
                $n = $requestData['total_net_pay'];
                [$whole, $decimal] = sscanf($n, '%d.%d');
            @endphp
        </table>

        <table>
            <table class="table1 " style="width:100%;">
                <tr class="border-line" style="width:100%;">
                    <td style=" width:100%;font-size:15px; font-weight:500;">Pay To The<br> Order Of </td>
                    <td style=" font-size:16px;text-align:left; width:100%; margin:0 auto; font-family: 'Poppins', sans-serif; font-weight:bold; ">  <b>{{ $requestData['emp_name'] ?? '' }}</b></td>
                    <td style="width:100%; text-align:right; margin-top:20px;font-size:14px;"><b>{{ $requestData['currency'] ?? '' }} **{{ number_format($requestData['total_net_pay'], 2) }}</b></td>
                </tr>
            </table>
            <table style="border-bottom:1.5px solid black; width:88%; margin-top:0px;">
                <tr>
                    <td style="width:100%;font-size:16px; text-align:center; margin-top:0px;font-size:16px; text-transform: capitalize; font-family: 'Poppins', sans-serif;"> {{ $word }} and {{ (int) $decimal }}/100</td>
                </tr>
            </table>
        </table>
        <div class="shrapdana">
            <table style="padding-top:60px;margin-top: 30px;">
                <tr>
                    <td style="font-size:16px; padding-right:30px;">Memo: </td>
                    <td colspan="2" style="font-size: 23px; letter-spacing: -1.5px; padding-right:50px; font-family: 'Amiri', serif; ">FOR RECORDS PURPOSES ONLY</td>
                    <td>----------------------------------------------------------------</td>
                </tr>
                <tr class="micrcode">
                    <td class="micrcode" colspan="3" style="padding-top:30px; font-size:20px; text-align:right; letter-spacing:3px;">"98745687T58T43098584598"</td>
                </tr>
            </table>
        </div>
        <br>
        <br>
        <br>

        <div class="row2">
            <div class="col1">
                <table style="width:100%;">
                    <tr>
                        <td style="font-weight: bold; font-family: 'Poppins', sans-serif;"> {{ $requestData['cname'] ?? '' }}</td>
                        <td style="font-weight: bold; font-family: 'Poppins', sans-serif;"> {{ $requestData['emp_name'] }}</td>
                    </tr>
                    <tr>
                        <td style="font-size:13px;">{{ $requestData['address_1'] }}<br>{{ $requestData['city'] }}  {{ $requestData['state'] }}, {{ $requestData['zip_code'] }} </td>
                        <td style="font-size:13px;"> {{ $requestData['emp_street_1'] }}<br>{{ $requestData['emp_city'] }} {{ $requestData['emp_state'] }}, {{ $requestData['emp_zip_code'] }} </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="font-size:11px;">{{ $requestData['tel'] }}</td>
                    </tr>
                </table>
            </div>

            <div class="col2">
                <table style="width:100%;">
                    <tr>
                        <td style="font-size:13px;">SSN</td>
                        <td style="font-size:13px;">{{ $requestData['emp_ssn'] }}</td>
                        <td style="font-size:13px;">Period Beginning</td>
                        <td style="font-size:13px;">{{ date('m/d/Y', strtotime($requestData['pay_start'])) }}</td>
                    </tr>
                    <tr>
                        <td style="font-size:13px;">Gross Pay</td>
                        <td style="font-size:13px;">{{ $requestData['currency'] }} {{ number_format($requestData['deduction_tax'], 2) }}</td>
                        <td style="font-size:13px;">Period Ending</td>
                        <td style="font-size:13px;">{{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</td>
                    </tr>
                    <tr>
                        <td style="font-size:13px;">Net Pay</td>
                        <td style="font-size:13px;">{{ $requestData['currency'] }} {{ $requestData['total_net_pay'] }}</td>
                        <td style="font-size:13px;">Check Date</td>
                        <td style="font-size:13px;">{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
                    </tr>
                    <tr>
                        <td style="font-size:13px;">Filling Status</td>
                        <td style="font-size:13px;">{{ $requestData['currency'] }} {{ number_format($requestData['deduction_tax'], 2) }}</td>
                        <td style="font-size:13px;">Check No</td>
                        <td style="font-size:13px;">{{ $requestData['account_number_last_4'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="row1">
            <div class="column1">
                <table style="width:100%;">
                    <tr style="border-top: 1px solid; border-bottom:1px solid;">
                        <td style="font-size: 14px;">Earnings</td>
                        <td style="font-size: 14px;">Hours/Rate</td>
                        <td style="font-size: 14px;">Amount</td>
                        <td style="font-size: 14px;">YTD Amt</td>
                    </tr>
                    <tbody>
                        @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td style="text-transform: capitalize; font-size:13px;"> {{ $earn }}</td>
                                <td style="font-size:13px;">{{ $requestData['hours'][$key] }}</td>
                                <td style="font-size:13px;">{{ $requestData['currency'] ?? '' }} {{ number_format($requestData['period'][$key] ?? 0, 2) }}</td>
                                <td style="font-size:13px;">{{ $requestData['currency'] ?? '' }} {{ number_format($requestData['ytd_total'][$key] ?? 0, 2) }} </td>
                            </tr>
                        @endforeach
                        <tr style="border-top: 1px solid black;">
                            <td style="font-size: 14px;" colspan="2">Gross Pay </td>
                            <td style="font-size:13px;"> {{ $requestData['currency'] }}{{ number_format($requestData['deduction_tax'], 2) }}</td>
                            <td style="font-size:13px;"> {{ $requestData['currency'] }}{{ number_format($requestData['ytd_deduction_tax'], 2) }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="column2">
                <table style="width: 100%;">
                    <tr style="border-top: 1px solid; border-bottom:1px solid;">
                        <td style="font-size: 14px;">Taxes/Deductions</td>
                        <td style="font-size: 14px;">Amount</td>
                        <td style="font-size: 14px;">YTD Amt</td>
                    </tr>
                    <tbody>
                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                            <tr>
                                <td style="text-align: left;font-size:13px;">{{ $taxes }}</td>
                                <td style="font-size:13px;">{{ $requestData['currency'] }} {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                                <td style="font-size:13px;">{{ $requestData['currency'] }} {{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>
                            </tr>
                        @endforeach

                        @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                            <tr>
                                <td style="text-align: left;">{{ $tax_deduction }}</td>
                                <td>{{ $requestData['currency'] }} {{ number_format($requestData['period_tax_deduction'][$key], 2) }}</td>
                                <td>{{ $requestData['currency'] }} {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr style="border-top: 1px solid black;">
                            <td style="font-size: 14px;">Net Pay</td>
                            <td style="font-size:13px;">{{ $requestData['currency'] }} {{ number_format($requestData['total_net_pay'], 2) }}</td>
                            <td style="font-size:13px;">{{ $requestData['currency'] }} {{ number_format($requestData['total_ytd_net_pay'], 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
