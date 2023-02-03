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
            padding:15px 15px 30px;
            overflow: hidden;
            margin-top:10px;
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

        }
    </style>
</head>

<body>
    <section class="invoiceborder">
        <table>
            <tr>
                <th style="font-size:30px; padding:0px;"> {{ $requestData['cname'] }}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th class="earning" style="font-size:25px; padding:0;">Earning statement</th>
            </tr>
            <tr>
                <td class="address" style="font-size:23px; padding:0px;line-height:1.2;">
                    {{ $requestData['address_1'] }} <br>
                    {{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }} <br>
                    USA

                </td>
                <td></td>
                <td></td>
                <td></td>
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
                <tr style=" color:white;">
                    <th style="padding:0 !important;">SSN: XXX-XX-{{ $requestData['emp_ssn'] }}</th>
                    <th class="earning"style="padding:0; font-weight:400;">{{ $requestData['emp_name'] }}</th>
                </tr>
                <tr style="color:white">
                    <td style=" padding: 0px;">
                        Stub no: 1112
                    </td>
                    <td class="earning" style="padding:0;">
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
                    <th class="heading1"> Rate</th>
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

                <tfoot class="tfooter" style="background:#b62ebd;">
                    <tr style=" color:white; height:50px;">
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
                        <td class="data" style="background-color:rgba(212, 212, 208,0.3);">{{ $taxes }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['taxes_rate'][$key] }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['taxes_ytd'][$key] }}</td>
                    </tr>
                @endforeach
                @if (count($requestData['tax_deduction'] ?? []) > 0)
                    <tr>
                        <td></td>
                        <td class="data" style="background-color:rgba(212, 212, 208,0.3);"> <strong>Employer Taxes </strong> </td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                        <tr>
                            <td></td>
                            <td class="data" style="background-color:rgba(212, 212, 208,0.3);">{{ $tax_deduction }}</td>
                            <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}</td>
                            <td>{{ $requestData['currency'] }} {{ $requestData['ytd_tax_deduction'][$key] }}</td>
                        </tr>
                    @endforeach
                @endif
                <tfoot class="tfooter " style="background:#b62ebd;">
                    <tr style="color:white; height:50px;">
                        <th colspan="2">Net Pay</th>
                        <th style="font-weight: 100;">{{ $requestData['currency'] }}
                            {{ $requestData['total_net_pay'] }}</th>
                        <th style=" font-weight: 100;">{{ $requestData['currency'] }}
                            {{ $requestData['total_ytd_net_pay'] }}</th>
                    </tr>
                </tfoot>
            </table>
            <p style="margin-top:10px;">Your Taxes and deductions for this period are {{ $requestData['currency'] }}
                {{ $requestData['deduction_tax'] }}</p>
        </section>


    </section>
</body>

</html>
