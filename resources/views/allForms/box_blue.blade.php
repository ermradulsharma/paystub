<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    <style>
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

        .table-data th {
            padding: 0px 20px 0 0;
        }

        .statutory {
            text-align: left;
        }
    </style>
</head>

<body>
    <table class="table">

        <tr>
            <td>barcode</td>
            <td class="table-data" rowspan="2">
                <button class="employee-box" style=" border:1px solid 000; padding:5px 10px 5px 5px;"><span
                        class="text">EMPLOYEE ID:
                        {{ $requestData['emp_id'] }}</span><span>SSN: {{ $requestData['emp_ssn'] }}</span>
                </button>
            </td>
            <td style="font-size:25px; font-weight:500;">Earnings Statement</td>
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
            <td>Marital Status: <b style="text-transform: uppercase;"> {{ $requestData['marital_status'] }}</b></td>
            <td style="font-size: 14px; text-transform: uppercase;">{{ $requestData['emp_name'] }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td>Exemptions/Alowances:<b>{{ $requestData['exemptions'] }}</b></td>
            <td style="font-size: 14px;"> {{ $requestData['emp_street_1'] }} </br> {{ $requestData['emp_city'] }}

            </td>
        </tr>
        <tr>
            <td></td>
            <td>State:<b> {{ $requestData['emp_state'] }}</b></td>
            <td style="font-size: 14px;"> {{ $requestData['emp_state'] }}, {{ $requestData['emp_zip_code'] }}</td>
        </tr>
        <tr>
            <td colspan="6"></td>

        </tr>
        <tr>

            <td></td>
            <td style="font-weight: bold;"> {{ $requestData['cname'] }}</td>
            <td>PAY DATE: <b> {{ date('m/d/y', strtotime($requestData['pay_date'])) }}</b></td>
        </tr>
        <tr>
            <td></td>
            <td>{{ $requestData['address_1'] }}</td>
            <td>PEPORTING PERIOD:

            </td>

        </tr>
        <tr>
            <td></td>
            <td> {{ $requestData['city'] }}
                {{ $requestData['state'] }},
                {{ $requestData['zip_code'] }}</td>
            <td style="border-bottom: 2px solid #000;"><b>{{ date('m/d/y', strtotime($requestData['pay_start'])) }} -
                    {{ date('m/d/y', strtotime($requestData['pay_end'])) }}</b></td>

        </tr>
        <tr>
            <td colspan="7"></td>

        </tr>
        <tr>
            <td colspan="7"></td>
        </tr>
    </table>
    <section>
        <table class="table-data">
            <tr style="border-bottom: 1px solid red;">
                <th style="border-bottom: 2px solid #000;" class="">EARNINGS</th>
                <th style="border-bottom: 2px solid #000;" class="">RATE</th>
                <th style="border-bottom: 2px solid #000;" class="">HOURS</th>
                <th style="border-bottom: 2px solid #000;" class="">CURRENT</th>
                <th style="border-bottom: 2px solid #000;" class="">YTD</th>
            </tr>

            @foreach ($requestData['earning'] as $key => $earn)
                <tr>
                    <td style="text-align: left;">{{ $earn }}</td>
                    <td>{{ $requestData['currency'] }} {{ $requestData['rate'][$key] }}</td>
                    <td style="text-align:center;">{{ $requestData['hours'][$key] }}</td>
                    <td>{{ $requestData['currency'] }} {{ $requestData['period'][$key] }}</td>
                    <td>{{ $requestData['currency'] }} {{ $requestData['ytd_total'][$key] }}</td>
                </tr>
            @endforeach
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td>Gross Pay</td>
                <td></td>
                <td>{{ $requestData['deduction_tax'] }}</td>
                <td>{{ $requestData['ytd_deduction_tax'] }}</td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
        </table>
    </section>
    <section style="position: relative;">
        <section>
            <table class="table-data">
                <thead>
                    <th style="border-bottom: 2px solid #000;" class="">DEDUCTIONS</th>
                    <th style="border-bottom: 2px solid #000;" class="statutory">STATUTORY</th>
                    <th style="border-bottom: 2px solid #000;" class="">CURRENT</th>
                    <th style="border-bottom: 2px solid #000;" class="">YTD</th>
                </thead>

                @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td style="text-align: left;" colspan="2">{{ $taxes }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['taxes_rate'][$key] }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['taxes_ytd'][$key] }}</td>
                    </tr>
                @endforeach

                @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td style="text-align: left;" colspan="2">{{ $tax_deduction }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}
                        </td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['ytd_tax_deduction'][$key] }}</td>
                    </tr>
                @endforeach
                <br>
                <thead style="border-bottom: 2px solid #000;">
                    <th></th>
                    <th class="td" colspan="4">OTHER</th>
                </thead>
                @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td style="text-align: left;" colspan="2">{{ $tax_deduction }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}
                        </td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['ytd_tax_deduction'][$key] }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td
                        style="text-align: left;  border-top:2px solid black; border-bottom:2px solid black ;border-left:1px solid black; background-color:#98919145;">
                        Net Pay</td>
                    <td
                        style="border-top:2px solid black; border-bottom:2px solid black ;  background-color:#98919145;">
                        {{ $requestData['total_net_pay'] }}</td>
                    <td style="">{{ $requestData['total_ytd_net_pay'] }}</td>
                </tr>
            </table>
        </section>
        <section style="position:absolute; top:18px; right:0;">
            <table style="border:1px solid #000; padding:px;">
                <tr>
                    <th style="text-align: left;  ">YTD GROSS</th>
                    <td style="padding:0">{{ $requestData['ytd_deduction_tax'] }}</td>


                </tr>
                <td style="border-bottom: 1px solid black;" colspan="17"></td>
                <tr>
                    <th style="text-align: left;">YTD DEDUCTIONS</th>
                    <td style="padding: 10px;">{{ $requestData['ytd_gross_total'] }}</td>
                </tr>
                <td style="border-bottom: 1px solid black;" colspan="17"></td>
                <tr>
                    <th style="text-align: left;">YTD NET PAY</th>
                    <td style="padding: 10px;">{{ $requestData['ytd_deduction_tax'] }}</td>
                </tr>
                <td style="border-bottom: 1px solid black;" colspan="17"></td>
                <tr>
                    <th style="text-align: left;">GROSS PAY</th>
                    <td style="padding: 10px;">{{ $requestData['deduction_tax'] }}</td>
                </tr>
                <td style="border-bottom: 1px solid black;" colspan="17"></td>
                <tr>
                    <th style="text-align: left;">DEDUCTIONS</th>
                    <td style="padding: 10px;">{{ $requestData['period_gross_total'] }}</td>
                </tr>
                <td style="border-bottom: 1px solid black;" colspan="17"></td>
                <tr>
                    <th style="text-align: left;">NET PAY</th>
                    <td style="padding: 10px 0 0;">{{ $requestData['total_net_pay'] }}</td>
                    </td>
                </tr>

            </table>
        </section>
    </section>
    <div class="container" style=" margin-top:100px; width:100%;">
        <div class="row" style="display: flex;justify-content: space-between;padding: 0px 14px;">
            <div style="width: 50%;float:left;">
                <h6 style="font-size: 17px; margin-bottom: 10px;">{{ $requestData['emp_name'] }}</h6>
                <p style="font-size: 13px; margin: 0;"> {{ $requestData['emp_street_1'] }}VD</p>
                <P style="font-size: 13px; margin: 0;">{{ $requestData['emp_city'] }}</P>
                <P style="font-size: 13px; margin: 0;">{{ $requestData['emp_state'] }},
                    {{ $requestData['emp_zip_code'] }}</P>
            </div>
            <div style="width: 50%;float:right;text-align:right;">
                <h6 style="font-size: 14px; margin-bottom: 0;">Advice Number:
                    <span>{{ $requestData['advice_number'] }}</span>
                </h6>
                <p>
                    <span style="font-weight:800;">Pay Day:</span>
                    {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                </p>
            </div>
        </div>
        <table style="width: 100%; margin: 140px 0 0 auto;">
            <tr style="border-bottom: 1px solid;">
                <td colspan="4"></td>
                <td>Deposite to the Account off</td>
                <td style="text-align: right;">Account number</td>
                <td style="text-align: right;">Transit ABA </td>
                <td style="text-align: right;">Amount</td>
            </tr>
            <td style="border-bottom: 1px solid black;" colspan="17"></td>
            <tr>
                <td colspan="4"></td>
                <td>{{ $requestData['emp_name'] }}</td>
                <td style="text-align: right;">{{ $requestData['account_number_last_4'] }}</td>
                <td style="text-align: right;">{{ $requestData['transit_aba_number'] }}</td>
                <td style="text-align: right;">{{ $requestData['total_net_pay'] }}</td>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
