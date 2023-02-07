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
            background: #a4ba31;
            color: white;
            padding: 20px 0px;
            overflow: hidden;
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
            top: 170px;
            left: 30px !important;;
        }

        .bg-img {
            position: relative;
        }

        .bg-img::before {
            background-image: url('http://44.202.105.74/images/check.jpg') !important;
            background-size: contain;
            background-repeat: no-repeat;
            content: "";
            top: 50px;
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
    </style>
</head>

<body>
    <main class="bg-img2">
        <section class="invoiceborder">

            <table>
                <tr>
                    <th style="padding-left: 31px;"> {{ $requestData['cname'] }}</th>
                    <th></th>

                </tr>
                <tr>
                    <td class="address" style="padding-left: 31px;">
                        {{ $requestData['address_1'] }} <br>
                        {{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}
                        USA

                    </td>
                    <td style="font-weight:600; font-size:18px;" class="earning">Earning statement</td>

                </tr>


                <tr>
                    <td></td>

                    <td>
                        <p class="earning"> pay period: {{ date('M d, Y', strtotime($requestData['pay_start'])) }} to
                            {{ date('M d, Y', strtotime($requestData['pay_end'])) }} <br> pay date:
                            {{ date('M d, Y', strtotime($requestData['pay_date'])) }}</p>
                    </td>

                </tr>
            </table>
            <section class="section_2">
                <table>
                    <tr>
                        <th>SSN: XXX-XX-{{ $requestData['emp_ssn'] }}</th>
                        <th class="earning">{{ $requestData['emp_name'] }}</th>
                    </tr>
                    <tr>
                        <td style=" padding: 9px;">
                            Stub no: 1112
                        </td>
                        <td class="earning">
                            Emp Id :{{ $requestData['emp_id'] }} <br>
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
                        <th class="heading1">Earnings</th>
                        <th class="heading1">Rate</th>
                        <th class="heading1">Hours</th>
                        <th class="heading1">This Period</th>
                        <th class="heading1">YTD</th>
                    </tr>
                    @foreach ($requestData['earning'] as $key => $earn)
                        <tr>
                            <td>{{ $earn }}</td>
                            <td>{{ $requestData['currency'] }} {{ $requestData['rate'][$key] }}</td>
                            <td>{{ $requestData['hours'][$key] }}</td>
                            <td>{{ $requestData['currency'] }} {{ $requestData['period'][$key] }}</td>
                            <td>{{ $requestData['currency'] }} {{ $requestData['ytd_total'][$key] }}</td>
                        </tr>
                    @endforeach

                    <tr style="padding-top: -200px;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tfoot class="tfooter" style="background:#a4ba31; color:white">
                        <tr>
                            <th colspan="3"></th>
                            <th style="font-weight: 100;">{{ $requestData['currency'] }}
                                {{ $requestData['period_gross_total'] }}</th>
                            <th style=" font-weight: 100;">{{ $requestData['currency'] }}
                                {{ $requestData['ytd_gross_total'] }}</th>
                        </tr>
                    </tfoot>
                </table>
            </section>
            <section class="tablesection">
                <table class="heading">
                    <tr>
                        <th class="heading1">Taxes / Deduction</th>
                        <th class="heading1"> Type</th>
                        <th class="heading1">This Period</th>
                        <th class="heading1">YTD</th>
                    </tr>
                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                        <tr>
                            <td></td>
                            <td class="data">{{ $taxes }}</td>
                            <td>{{ $requestData['currency'] }} {{ $requestData['taxes_rate'][$key] }}</td>
                            <td>{{ $requestData['currency'] }} {{ $requestData['taxes_ytd'][$key] }}</td>
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
                                <td class="data">{{ $tax_deduction }}</td>
                                <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}</td>
                                <td>{{ $requestData['currency'] }} {{ $requestData['ytd_tax_deduction'][$key] }}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tfoot class="tfooter " style="background:#a4ba31; color:white">
                        <tr>
                            <th colspan="2">Net Pay</th>
                            <th style="font-weight: 100;">{{ $requestData['currency'] }}
                                {{ $requestData['total_net_pay'] }}</th>
                            <th style=" font-weight: 100;">{{ $requestData['currency'] }}
                                {{ $requestData['total_ytd_net_pay'] }}</th>
                        </tr>
                    </tfoot>
                </table>
                <p style="margin-top:30px;">Your Taxes and deductions for this period are {{ $requestData['currency'] }}
                    {{ $requestData['deduction_tax'] }}</p>
            </section>
            <section class="bg-img">
                <div class="container" style=" margin-top:70px; width:95%; padding:0px 20px;">
                    <div class="row" style="display: flex;justify-content: space-between;padding: 0px 14px;">
                        <div style="width: 50%;float:left;">
                            <h6 style="font-size: 17px; margin-bottom: 10px;">{{ $requestData['cname'] }}</h6>
                            <p style="font-size: 13px; margin: 0;">{{ $requestData['address_1'] }}</p>
                            <P style="font-size: 13px; margin: 0;">{{ $requestData['address_2'] }}</P>
                            <P style="font-size: 13px; margin: 0;">{{ $requestData['city'] }}
                                {{ $requestData['state'] }},
                                {{ $requestData['zip_code'] }}</P>
                        </div>
                        <div style="width: 50%;float:right;text-align:right; margin-top:4px;">
                            <h6 style="font-size: 14px; margin-bottom: 6px;"> <span>00000422598</span>
                            </h6>
                            <p>
                                <span style="font-weight:800;"></span>
                                {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                            </p>
                        </div>
                    </div>
                    <table style="width: 90%; margin: 160px auto 0px;">
                        <tr style="">
                            <td colspan="4"></td>
                            <td></td>
                            <td style="text-align: right;"></td>
                            <td style="text-align: right;"> </td>
                            <td style="text-align: right;"> </td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td style="font-size:14px;">{{ $requestData['emp_name'] }}</td>
                            <td style="text-align: right; font-size:13px;">XX567</td>
                            <td style="text-align: right;font-size:13px;">XXX567</td>
                            <td style="text-align: right;font-size:13px;">12345</td>
                        </tr>
                    </table>
                </div>
            </section>


        </section>
    </main>

</body>

</html>
