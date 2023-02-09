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

        .invoiceborder {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .section_2 {
            background: #587193;
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
            padding: 8px;
        }

        .heading1 {
            margin-top: 20px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            text-align: left;
            color: #5b615d;
            padding-top: 8px;
            padding-bottom: 8px;
        }

        #color {
            color: #555555;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .data:nth-child(2) {
            background-color: #edededc4;
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

        .bg-img2 {
            position: relative;
        }

        .bg-img2:before {
            position: absolute;
            background-image: url("images/side-bar.png");
            background-repeat: no-repeat;
            background-size: contain;
            width: 100%;
            height: 100%;
            content: "";
            right: 0px;
            top: 200px;
            left: 30px !important;

        }

        .bg-img {
            position: relative;
        }

        .bg-img::before {
            background-image: url('http://44.202.105.74/images/check.jpg') !important;
            background-size: contain;
            background-repeat: no-repeat;
            content: "";
            top: 40px;
            left: 0px;
            right: 100px !important;
            position: absolute;
            z-index: -1;
            width: 700px;
            height: 100%;
        }

        .container {
            position: absolute;
            top: 0px;
            z-index: 3;
            height: 300px;
        }

        #alignR {
            text-align: right
        }

        .alignR {
            text-align: right
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
                    <th style="padding-left: 31px;"> {{ $requestData['cname'] }}</th>
                    <th></th>
                </tr>
                <tr>
                    <td class="address" style="padding-left: 31px;">
                        {{ $requestData['address_1'] }} <br>
                        {{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}, USA
                    </td>
                    <td style="font-weight:600; font-size:18px;" class="earning">Earning Statement</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p class="earning"> pay period: {{ date('M d, Y', strtotime($requestData['pay_start'])) }} to
                            {{ date('M d, Y', strtotime($requestData['pay_end'])) }} <br> pay date:
                            {{ date('M d, Y', strtotime($requestData['pay_date'])) }}
                        </p>
                    </td>

                </tr>
            </table>
            <section class="section_2">
                <table>
                    <tr>
                        <th style="width: 40%;">SSN: XXX-XX-{{ $requestData['emp_ssn'] }}</th>
                        <th class="earning" style="width: 60%;">{{ $requestData['emp_name'] }}</th>
                    </tr>
                    <tr>
                        <td style=" padding: 9px;"> Stub no: 1112 </td>
                        <td class="earning"> Emp Id :{{ $requestData['emp_id'] }} <br>
                            {{ $requestData['emp_street_1'] }},{{ $requestData['emp_street_2'] }}
                            {{ $requestData['emp_city'] }} {{ $requestData['emp_state'] }}
                            {{ $requestData['emp_zip_code'] }}
                        </td>
                    </tr>
                </table>
            </section>
            <section class="tablesection">
                <table>
                    <tr>
                        <td class="heading1">Earnings</td>
                        <td class="heading1">Rate</td>
                        <td colspan="2" class="heading1">Hours</td>
                        <td class="heading1" id="alignR">This Period</td>
                        <td class="heading1" id="alignR">YTD</td>
                    </tr>
                    @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td id="color">{{ $earn }}</td>
                        <td id="color">{{ $requestData['currency'] }}
                            {{ number_format($requestData['rate'][$key],2) }}
                        </td>
                        <td colspan="2" id="color">{{ $requestData['hours'][$key] }}</td>
                        <td id="color" class="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['period'][$key],2) }} </td>
                        <td id="color" class="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['ytd_total'][$key],2) }} </td>
                    </tr>
                    @endforeach

                    <tr style="padding-top: -200px;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tfoot class="tfooter" style="background:#587193; color:white">
                        <tr>
                            <th colspan="4"></th>
                            <th style="font-weight: 100;" id="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['period_gross_total'],2) }}</th>
                            <th style=" font-weight: 100;" id="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['ytd_gross_total'],2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </section>
            <section class="tablesection">
                <table class="heading">
                    <tr>
                        <td class="heading1">Taxes / Deduction</td>
                        <td class="heading1"> Type</td>
                        <td class="heading1" id="alignR">This Period</td>
                        <td class="heading1" id="alignR">YTD</td>
                    </tr>
                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td></td>
                        <td class="data" id="color">{{ $taxes }}</td>
                        <td id="color" class="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['taxes_rate'][$key],2) }}</td>
                        <td id="color" class="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['taxes_ytd'][$key],2) }}</td>
                    </tr>
                    @endforeach
                    @if (count($requestData['tax_deduction'] ?? []) > 0)
                    <tr>
                        <td></td>
                        <td class="data"> <strong>Employer Taxes </strong> </td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td></td>
                        <td class="data" id="color">{{ $tax_deduction }}</td>
                        <td id="color" class="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['period_tax_deduction'][$key],2) }}</td>
                        <td id="color" class="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['ytd_tax_deduction'][$key],2) }} </td>
                    </tr>
                    @endforeach
                    @endif
                    <tfoot class="tfooter " style="background:#587193; color:white">
                        <tr>
                            <th colspan="2">Net Pay</th>
                            <th style="font-weight: 100;" id="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['total_net_pay'],2) }} </th>
                            <th style=" font-weight: 100;" id="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['total_ytd_net_pay'],2) }} </th>
                        </tr>
                    </tfoot>
                </table>
                <p style="margin-top:25px; color:#555555;">Your Taxes and deductions for this period are {{ $requestData['currency'] }} {{ number_format($requestData['deduction_tax'],2) }} </p>
            </section>

            <section class="bg-img">
                <div class="container" style=" margin-top:60px; width:95%; padding:0px 20px;">
                    <div class="row" style="display: flex;justify-content: space-between;padding: 0px 14px;">
                        <div style="width: 50%;float:left;">
                            <h6 style="font-size: 17px; margin-bottom: 10px;">{{ $requestData['cname'] }}</h6>
                            <p style="font-size: 13px; margin: 0;">{{ $requestData['address_1'] }}</p>
                            <P style="font-size: 13px; margin: 0;">{{ $requestData['address_2'] }}</P>
                            <P style="font-size: 13px; margin: 0;">{{ $requestData['city'] }}
                                {{ $requestData['state'] }},
                                {{ $requestData['zip_code'] }}
                            </P>
                        </div>
                        <div style="width: 50%;float:right;text-align:right; margin-top:4px;">
                            <h6 style="font-size: 14px; margin-bottom: 6px;">
                                <span>{{ $requestData['advice_number'] }}</span>
                            </h6>
                            <p>
                                <span style="font-weight:800;"></span>
                                {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                            </p>
                        </div>
                    </div>
                    <table style="width: 95%; margin: 160px auto 0px;">
                        <tr style="">
                            <td colspan="4"></td>
                            <td></td>
                            <td style="text-align: right;"></td>
                            <td style="text-align: right;"> </td>
                            <td style="text-align: right;"> </td>
                        </tr>

                        <tr>
                            <td style="font-size:14px;text-align:left;  width:55%;">{{ $requestData['emp_name'] }}</td>
                            <td style="text-align: center; font-size:13px; width:15%;"> XXXXX{{ $requestData['account_number_last_4'] }}</td>
                            <td style="text-align: center;font-size:13px; width:15%;"> XXXXX{{ $requestData['transit_aba_number'] }}</td>
                            <td style="text-align: right;font-size:13px; width:15%;"> {{ number_format($requestData['total_net_pay'],2) }} </td>
                        </tr>
                    </table>
                </div>
            </section>
        </section>
    </main>

</body>

</html>
