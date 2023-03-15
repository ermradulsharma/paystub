@php
    $petani = DB::table('templates')->pluck('color_code');
@endphp
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


        .section_2 {
            background: #b62ebd;
            color: white;
            padding: 15px 15px 30px;
            overflow: hidden;
            margin-top: 10px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            text-align: left;

        }

        .heading1 {
            margin-top: 20px;
            border-top: 1px solid #5b615d;
            border-bottom: 1px solid #5b615d;
            text-align: left;
            font-size: 14px;
            color: #5b615d;
            padding-top: 8px;
            padding-bottom: 8px;
            font-weight: 600;
        }


        .heading2 {
            margin-top: 20px;
            border-top: 1px solid #5b615d;
            /* border-bottom: 1px solid black; */
            text-align: left;
            font-size: 14px;
            color: #555555;
        }


        .tax-align-l {
            text-align: left;
        }

        .tax-align-c {
            text-align: center;
        }

        .tax-align-r {
            text-align: right;
            padding-right: 10px;

        }

        #color {
            color: #555555;
        }
        .data{
            font-size: 14px;
            padding-bottom: 10px;
        }

        .data:nth-child(2) {
            background-color: #edededc4;
        }

        .tablesection {
            padding-top: 25px;
        }

        p {
            font-size: 16px;
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

        }

        .address {
            text-transform: uppercase;
        }
    </style>
    <style>
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

        <section class="invoiceborder">
            <table>
                <tr>
                    <td style="padding-left: 31px;padding-top:0px; padding-bottom:0;font-size:17px;text-transform:uppercase;"> <b>{{ $requestData['cname'] }}</b></td>

                </tr>
                <tr>
                    <td class="address" style="padding-left: 31px;font-size:16px;text-transform:uppercase; font-weight:400;line-height:1.5; color:#000;letter-spacing:-0.5px;padding-top:0; padding-bottom:0;">
                        {{ $requestData['address_1'] }} <br>
                        {{ $requestData['city'] }}, {{ $requestData['zip_code'] }}<br> USA
                    </td>
                    <td style="font-weight:600; font-size:18px;line-height:1.9;vertical-align: center;" class="earning">Earnings Statement</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="">
                        <p class="earning"style="font-size:13px; margin-top:-40px;"> Pay Period: {{ date('M d, Y', strtotime($requestData['pay_start'])) }} to
                            {{ date('M d, Y', strtotime($requestData['pay_end'])) }} <br> Pay Date:
                            {{ date('M d, Y', strtotime($requestData['pay_date'])) }}
                        </p>
                    </td>

                </tr>
            </table>
            <section class="section_2">
                <table>
                    <tr>
                        <td  style="width: 40%;"><p style="font-size:14px;font-weight:400;">SSN: XXX-XX-{{ $requestData['emp_ssn'] }}</p><p style="padding: 0; margin:0;font-weight:400; font-size:14px;">Stub No: {{ $requestData['stub_no'] }}</p></td>
                        <td class="earning" style="width: 60%;font-weight:400 !important;padding-bottom:0px !important;padding-top:0px !important;margin:0px;font-size:16px;">{{ $requestData['emp_name'] }}<br>Emp.ID.{{ $requestData['emp_id'] }} <br>
                            {{ $requestData['emp_street_1'] }},
                            {{ $requestData['emp_city'] }}
                            {{ $requestData['emp_zip_code'] }}</td>
                    </tr>
                </table>
            </section>
            <section class="tablesection">
                <table>
                    <tr>
                        <td class="heading1 tax-align-left" style="padding-left: 18px;">Earnings</td>
                        <td class="heading1"> Rate</td>
                        <td class="heading1">Hours</td>
                        <td class="heading1" style="padding-left: 45px; text-align:right;">This Period</td>
                        <td class="heading1 tax-align-r">YTD</td>
                    </tr>
                    @foreach ($requestData['earning'] as $key => $earn)
                        <tr>
                            <td class="heading2 tax-align-l" style="padding-left: 18px;">{{ $earn }}</td>
                            <td class="heading2">{{ $requestData['currency'] }}
                                {{ number_format($requestData['rate'][$key], 2) }} </td>
                            <td class="heading2">{{ number_format($requestData['hours'][$key], 2) }}</td>
                            <td class="heading2" style="padding-left: 45px;text-align:right;">{{ $requestData['currency'] }}
                                {{ number_format($requestData['period'][$key], 2) }} </td>
                            <td class="heading2 tax-align-r">{{ $requestData['currency'] }}
                                {{ number_format($requestData['ytd_total'][$key], 2) }} </td>
                        </tr>
                    @endforeach
                    <br>
                    <br>
                    <tfoot class="tfooter" style="background:#b62ebd;">
                        <tr style=" color:white; height:20%;">
                            <th colspan="3"></th>
                            <th class="tax-align-c" style="font-weight: 100; height: 45px; text-align:right; padding-right: 0px;font-size:13px">
                                {{ $requestData['currency'] }}
                                {{ number_format($requestData['period_gross_total'], 2) }} </th>
                            <th class="tax-align-r" style="font-weight: 100; height: 47px;font-size:13px">
                                {{ $requestData['currency'] }} {{ number_format($requestData['ytd_gross_total'], 2) }}
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </section>
            <section class="tablesection">
                <table class="heading">
                    <tr>
                        <td class="heading1" style="padding-left: 18px;">Taxes / Deductions</td>
                        <td class="heading1"> Type</td>
                        <td class="heading1 tax-align-r">This Period</td>
                        <td class="heading1 tax-align-r">YTD</td>
                    </tr>
                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                        <tr>
                            <td></td>
                            <td class="data" id="color" style="line-height:1.6">{{ $taxes }}</td>
                            <td class="tax-align-r" style="font-size:13px;" id="color">{{ $requestData['currency'] }}
                                {{ number_format($requestData['taxes_rate'][$key], 2) }} </td>
                            <td class="tax-align-r" id="color" style="line-height:1.6;font-size:13px;">
                                {{ $requestData['currency'] }} {{ number_format($requestData['taxes_ytd'][$key], 2) }}
                            </td>
                        </tr>
                    @endforeach
                    @if (count($requestData['tax_deduction'] ?? []) > 0)
                        <tr>
                            <td></td>
                            <td class="data" style="line-height:1.6"> <strong>Employer Taxes </strong> </td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                            <tr>
                                <td></td>
                                <td class="data" id="color" style="line-height:1.6">{{ $tax_deduction }}</td>
                                <td class="tax-align-r" id="color">{{ $requestData['currency'] }}
                                    {{ number_format($requestData['period_tax_deduction'][$key], 2) }} </td>
                                <td class="tax-align-r" id="color" style="line-height:1.6">
                                    {{ $requestData['currency'] }}
                                    {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }} </td>
                            </tr>
                        @endforeach
                    @endif
                    <tfoot class="tfooter " style="background:#b62ebd; line-height:1.6;">
                        <tr style="color:white;">
                            <th colspan="2" style="height: 47px; padding-left: 18px;font-size:13px;">Net Pay</th>
                            <th class="tax-align-r" style="height: 47px; font-weight: 100;font-size:13px;">
                                {{ $requestData['currency'] }} {{ number_format($requestData['total_net_pay'], 2) }}
                            </th>
                            <th class="tax-align-r" style="height: 47px; font-weight: 100;font-size:13px;">
                                {{ $requestData['currency'] }}
                                {{ number_format($requestData['total_ytd_net_pay'], 2) }} </th>
                        </tr>
                    </tfoot>
                </table>
                <p style="margin-top:20px;">Your Taxes and deductions for this period are
                    {{ $requestData['currency'] }} {{ number_format($requestData['deduction_tax'], 2) }}. </p>
            </section>
        </section>
    </main>
</body>

</html>
