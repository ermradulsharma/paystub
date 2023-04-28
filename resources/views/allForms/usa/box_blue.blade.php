<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Box Blue</title>



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
            src: url("{{asset('fonts/micr-encoding.regular.ttf')}}") format('ttf');
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
            src: url("{{asset('fonts/micr-encoding.regular.ttf')}}") format('ttf');
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
            top: 250px;
            left: 0px;
            right: 0;
            background-image: url("images/final-watermark.png");
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
        <img src="{{ public_path('images/border/box_blue/box-blue.svg') }}" style="position: absolute; top: 0px; right:0px;left: 0px; width:106%; height:105%;  z-index: -1;">
        <img src="{{ public_path('images/check2.svg') }}" style="position: absolute; top:75.6%; width:100.20%; height:25%;  z-index: -1; right:0px; left:0px;">
        @guest
            <div class="watermark"></div>
            <div class="watermark2"></div>
        @endguest
        @auth
            @php
                $date = \Carbon\Carbon::now();
            @endphp
            @if (Auth::user()->device_type == 'website')
                @if(Auth::user()->usa_expiry_date <= $date || !isset($requestData['watermark']))
                    <div class="watermark"></div>
                    <div class="watermark2"></div>
                @endif
            @elseif (Auth::user()->expiryDate <= $date || !isset($requestData['watermark']))
                <div class="watermark"></div>
                <div class="watermark2"></div>
            @endif
        @endauth
        <section class="invoiceborder">
        <div class="row1">
            <div class="column1">
                <table style="width: 100%; margin:0px auto 0px 0px;">
                    <tr>
                        <td><img style="max-width: 70px;" src="images/barode.jpeg"></td>
                    </tr>
                </table>
            </div>

            <div class="column2">
                <table class="table">

                    <tr>
                        <td></td>
                        <td class="table-data" rowspan="2"> <button class="employee-box" style=" border:1px solid black; border-radius:2px; padding:5px 10px 5px 5px;background-color:#88848445"><span class="text">EMPLOYEE ID: {{ $requestData['emp_id'] }}</span><span>SSN: XXX-XX-{{ $requestData['emp_ssn'] }}</span> </button></td>
                        <td style="font-size:25px; font-weight:bold;font-family: 'Arial, Helvetica', sans-serif;">Earnings Statement</td>
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
                        <td style="padding:0px;font-size:18px;font-weight:400;color: #555;">Marital Status: <b style="text-transform: capitalize;"> <Span style="color: #000">{{ $requestData['marital_status'] }}</Span></b><br>Exemptions/Alowances:<b style="color: #000">{{ $requestData['exemptions'] }}</b><br> State: <b style="text-transform: capitalize;color: #000;"> {{ $requestData['emp_state'] }}</b></td>
                        <td style="font-size: 15px; text-transform: uppercase;padding:0px; font-weight:bold; font-family: 'Arial, Helvetica', sans-serif;padding-bottom:30px;">{{ $requestData['emp_name'] }}<br>{{ $requestData['emp_street_1'] }} @if($requestData['emp_street_2'] != ''){{ $requestData['emp_street_2'] }} @endif<br>{{ $requestData['emp_city'] }} {{ $requestData['emp_state'] }}. {{ $requestData['emp_zip_code'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-weight: bold;font-size:18px;text-transform:capitalize;"> {{ $requestData['cname'] }}</td>
                        <td style="color: #555;font-size:15px;">PAY DATE: <b style="color: #000;font-size:15px;"> {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-transform: uppercase;font-size:16px;"><B>{{ $requestData['address_1'] }}</B> </td>
                        <td style="color: #555; font-size:15px;">PEPORTING PERIOD: </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-transform: uppercase;font-size:16px; ">@if($requestData['address_2']!='')<B>{{ $requestData['address_2'] }}</B><br>@endif<b>{{ $requestData['city'] }}, {{ $requestData['state'] }} {{ $requestData['zip_code'] }}</b></td>
                        <td style=""><b @if($requestData['address_2']!='') style="font-size:15px;position: relative; bottom:10px;border-bottom: 2px solid #000;"@else style="font-size:15px;border-bottom: 2px solid #000;"@endif>{{ date('m/d/Y', strtotime($requestData['pay_start'])) }}&nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; &nbsp; {{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</b></td>
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
                    <th class="" style="padding-left:80%;">YTD</th>
                </thead>
                @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td style="text-align: left; text-transform:capitalize;">{{ $earn }}</td>
                        <td style="text-align:left;">@if($requestData['rate'][$key] != 0.00)<b>{{ $requestData['rate'][$key] }}</b>@endif</td>
                        <td style="text-align:center;">@if($requestData['hours'][$key] != 0.00)<b>{{ $requestData['hours'][$key] }}</b>@endif</td>
                        <td style="text-align: right; padding-right:22px;"><b>{{ number_format($requestData['period'][$key], 2) }}</b></td>
                        <td style="text-align:right;"><b>{{ number_format($requestData['ytd_total'][$key], 2) }}</b></td>
                    </tr>
                @endforeach
                <br> <br>
                <tr>
                    <td></td>
                    <td colspan="3" style="text-align: left; font-weight:bold; border:1px solid black;  background-color:#88848445;border-radius:2px; height:25px;"> &nbsp;Gross Pay&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ number_format($requestData['period_gross_total'], 2) }}</td>
                    <td style="text-align:right;"><b>{{ number_format($requestData['ytd_gross_total'], 2) }}</b></td>
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
                        <th style="text-align:right;" class="">CURRENT</th>
                        <th style="text-align:right;" class="">YTD</th>
                    </thead>

                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                        <tr>
                            <td></td>
                            <td style="text-align: left;" colspan="2">{{ $taxes }}</td>
                            <td style="text-align:right; padding-right:19px;"><b>{{ number_format($requestData['taxes_rate'][$key], 2) }}</b></td>
                            <td style="text-align: right;padding-right:18px;"><b>{{ number_format($requestData['taxes_ytd'][$key], 2) }}</b></td>
                        </tr>
                    @endforeach

                    <br>
                    @if (count($requestData['tax_deduction'] ?? []) > 0)
                        <thead>
                            <th></th>
                            <th style="border-bottom: 2px solid #000;" class="td" colspan="4">OTHER</th>
                        </thead>
                        @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                            <tr>
                                <td></td>
                                <td style="text-align: left;text-transform:capitalize;" colspan="2">{{ $tax_deduction }}</td>
                                <td style="text-align:right; padding-right:19px;"><b>{{ number_format($requestData['period_tax_deduction'][$key], 2) }}</b> </td>
                                <td style="text-align: right;padding-right:18px;"><b>{{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</b> </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td></td>
                        <td style="text-align: left;text-transform:capitalize;" colspan="2">Total Deductions</td>
                        <td style="text-align:right; padding-right:19px;"> {{ number_format($requestData['deduction_tax'], 2)}}</td>
                        <td style="text-align: right;padding-right:18px;">{{ number_format($requestData['ytd_deduction_tax'], 2)}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3" style="text-align: left;font-weight:bold; border:1px solid black;  background-color:#88848445; border-radius:2px; height:25px;">&nbsp;Net Pay&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ number_format($requestData['total_net_pay'], 2) }} </td>
                        <td style="text-align: right;padding-right:18px;"><b>{{ number_format($requestData['total_ytd_net_pay'], 2) }}</b></td>
                    </tr>
                </table>
            </section>
            <section style="position:absolute; top:7px; right:60px;">
                <table style="border:1px solid #000; padding:px;width:250px;">
                    <tr>
                        <th style="padding-left:8px;text-align: left;  ">YTD GROSS</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ number_format($requestData['ytd_gross_total'], 2) }}</b></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">YTD DEDUCTIONS</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ number_format($requestData['ytd_deduction_tax'], 2) }}</b></td>

                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">YTD NET PAY</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ number_format($requestData['total_ytd_net_pay'], 2) }}</b></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">GROSS PAY</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ number_format($requestData['period_gross_total'], 2) }}</b></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">DEDUCTIONS</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ number_format($requestData['deduction_tax'], 2) }}</b></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">NET PAY</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ number_format($requestData['total_net_pay'], 2) }}</b></td>
                    </tr>
                </table>
            </section>
        </section>
        </section>
        <section style="position: fixed; bottom:55px; width:95%; left:40px; padding-top:20px;">
            <table style="width:100%; padding-bottom:0px;">
                <tr>
                    <td>
                        <table style="width:100%; @if($requestData['address_2']!='') padding-bottom:50px; @else padding-bottom:52px; @endif">
                            <tr>
                                <td style="padding-top:20px;">
                                    <p style="font-size: 14px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:capitalize; font-weight:bold;"> {{ $requestData['cname'] }}</p>
                                    <p style="font-size: 12px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase; "> {{ $requestData['address_1'] }}</p>
                                    @if($requestData['address_2']!='')
                                        <p style="font-size: 12px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase; "> {{ $requestData['address_2'] }}</p>
                                    @endif
                                    <P style="font-size: 12px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase; "> {{ $requestData['city'] }} {{ $requestData['state'] }}. {{ $requestData['zip_code'] }}  </P>
                                </td>
                                <td style="padding-top:10px; text-align:right; padding-right:15px; ">
                                    <p style="font-size: 14px; margin-bottom: 5px; font-family: Arial, Helvetica, sans-serif; font-weight: 400;"> <span>00000{{ $requestData['advice_number'] }}</span></p>
                                    <p style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; font-weight: 400;margin-top:-3px;">{{ date('m/d/Y', strtotime($requestData['pay_date'])) }} </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%; position: relative; bottom:0px;">
                            <tr class="bottom-content">
                                <td style="font-size:14px; text-align:left; width:40%; font-weight:bold;text-transform:uppercase;font-family: 'Arial Rounded MT Bold', sans-serif;"> {{ $requestData['emp_name'] }}</td>
                                <td style="text-align:right; font-size:14px;  width:22.8%;padding-right:5px; "> XXXXX{{ $requestData['account_number_last_4'] }}</td>
                                <td style="text-align:right; font-size:14px;  width:20%; padding-right:25px; ">  XXXXX{{ $requestData['transit_aba_number'] }}</td>
                                <td style="text-align:right; font-size:14px;  width:17.2%;padding-right:22px;font-weight:bold;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'], 2) }} </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </section>
    </main>
</body>

</html>
