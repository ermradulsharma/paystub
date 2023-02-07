globalwhitecheck usa

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

        table {
            width: 100%;
        }


        .col1 {
            float: left;
            width: 30%;
        }

        .col2 {
            float: left;
            width: 50%;
            margin-left: 25%;


        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .colum1 {
            float: left;
            width: 50%;
        }

        .colum2 {
            float: left;
            width: 50%;
        }

        /* Clearfix (clear floats) */
        .row1::after {
            content: "";
            clear: both;
            display: table;

        }

        .co1 {
            float: left;
            width: 50%;
        }

        .co2 {
            float: left;
            width: 40%;
        }

        /* Clearfix (clear floats) */
        .row2::after {
            content: "";
            clear: both;
            display: table;
        }

        .div1 {

            margin-top: 4%;
        }

        .row {
            /* border: 1px solid black; */
        }
    </style>
</head>

<body>
    <main>

        <div>
            <table>
                <tr>
                    <td colspan="2" style="text-align: right;">
                        Date:{{ date('m/d/y', strtotime($requestData['pay_date'])) }}</td>
                </tr>
                <tr>
                    <td>****This is not a check. *****Advice of deposit only****</td>
                    <td style="text-align: center;">0.00</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">***NON-NECOTTARTE*!</td>
                </tr>
                <tr>
                    <td colspan="2"> {{ $requestData['emp_name'] }}</td>
                </tr>
                <tr>
                    <td colspan="2">{{ $requestData['emp_address'] }} </td>
                </tr>
            </table>

        </div>

        <h4>Memo</h4>

        <div class="row">
            <div class="col1">
                <table>
                    <tr>
                        <th style="text-align: left;">EMPLOYER</th>
                    </tr>
                    <tr>
                        <td> {{ $requestData['address_1'] }}</td>
                    </tr>
                    </br> </br>
                    <tr>
                        <th>EMPLOYEE</th>
                    </tr>
                    <tr>
                        <td>{{ $requestData['emp_address'] }}</td>
                    </tr>
                </table>
            </div>
            <div class="col2">
                <table>
                    <tr>
                        <th colspan="3" style="text-align: left;">PAY PERIOD</th>
                    </tr>
                    <tr>
                        <td>Period Beginning:</td>
                        <td style="text-align:left;">

                            {{ date('m/d/y', strtotime($requestData['pay_start'])) }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Period Ending:</td>
                        <td style="text-align:left;">
                            {{-- {{ date('m/d/y', strtotime($requestData['pay_end'])) }} --}}
                        </td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>Pay Date:</td>
                        <td style="text-align:left;">

                            {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                        </td>
                        <td></td>

                    </tr>

                </table>
            </div>
        </div>

        <div class="div1">
            <table>
                <tr>
                    <td colspna="2"style="text-align: left;">BENEFITS</td>
                    <td>Accurued</td>
                    <td>Used</td>
                    <td>Available</td>
                    <td>NET PAY:</td>
                    <td colspan="2" style="text-align: right;">
                        {{-- {{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'], 2) }} --}}
                    </td>
                </tr>
                <tr>
                    <td colspna="2">Vacation</td>
                    <td>3.20</td>
                    <td>0.00</td>
                    <td>28.16</td>
                    <td>Acc#....5788</td>
                    <td colspan="2" style="text-align: right;">
                        {{-- {{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'], 2) }} --}}
                    </td>
                </tr>
            </table>
        </div>

        <h4>Memo:</h4>
        {{-- 
        <div class="row1">
            <div class="colum1">
                <table>
                    <thead>
                        <th>PAY</th>
                        <th>Hours</th>
                        <th>Rate</th>
                        <th>Current</th>
                        <th>YTD</th>
                    </thead>
                    <tr>
                        @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td style="text-align: left;">{{ $earn }}</td>
                        <td style="text-align:center;">{{ $requestData['hours'][$key] }}</td>
                        <td>{{ $requestData['rate'][$key] }}</td>
                        <td>{{ number_format($requestData['period'][$key], 2) }}</td>
                        <td>{{ number_format($requestData['ytd_total'][$key], 2) }}</td>
                    </tr>
                    @endforeach
                    </tr>
                </table>

            </div>
            <div class="colum2">
                <table>
                    <thead>
                        <th>DEDUCTIONS</th>
                        <th>Current</th>
                        <th>YTD</th>

                    </thead>

                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                        <tr>
                            <td style="text-align: left;">{{ $taxes }}</td>
                            <td>{{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                            <td>{{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>
                        </tr>
                    @endforeach




                </table>

            </div>
        </div>

        <div class="row2">
            <div class="co1">
                <table>
                    <thead>
                        <th>TAXES</th>
                        <th>Current</th>
                        <th>YTD</th>
                    </thead>
                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                        <tr>
                            <td style="text-align: left;">{{ $tax_deduction }}</td>
                            <td>{{ number_format($requestData['period_tax_deduction'][$key], 2) }}</td>
                            <td>{{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
            <div class="co2">
                <table>
                    <thead>
                        <th>SUMMARY</th>
                        <th>Current</th>
                        <th>YTD</th>

                    </thead>
                    <tr>
                        <td>Total Pay</td>
                        <td>{{ $requestData['currency'] }}{{ number_format($requestData['deduction_tax'], 2) }}</td>
                        <td>{{ $requestData['currency'] }}{{ number_format($requestData['ytd_deduction_tax'], 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Taxes</td>
                        <td>{{ $requestData['currency'] }}{{ number_format($requestData['period_gross_total'], 2) }}
                        </td>
                        <td>{{ $requestData['currency'] }}{{ number_format($requestData['ytd_gross_total'], 2) }}</td>
                    </tr>
                    <tr>
                        <td>Deductions</td>
                        <td>{{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'], 2) }}</td>
                        <td>{{ $requestData['currency'] }}{{ number_format($requestData['total_ytd_net_pay'], 2) }}
                        </td>
                    </tr>
                </table>
                <tr>
                    <td>Net Pay</td>
                    <td>{{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'], 2) }}</td>
                </tr>
            </div>
        </div> --}}


    </main>


</body>

</html>
