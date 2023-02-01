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

        .earn {
            border-bottom: 1px solid red;
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
            <td></td>
            <td style="font-size:25px; font-weight:500;" class="table-data" rowspan="2"> {{ $requestData['cname'] }}
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
            <td>{{ $requestData['address_1'] }}</td>
            <td style="font-size: 14px;">Period Beginning: <b>10/13/2022</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td> {{ $requestData['address_2'] }}</td>
            <td style="font-size: 14px;">Period Ending:
                <b>12/13/2022</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td> {{ $requestData['city'] }}
                {{ $requestData['state'] }},
                {{ $requestData['zip_code'] }}</td>
            <td style="font-size: 14px;">Pay Date:
                <b> {{ date('m/d/y', strtotime($requestData['pay_date'])) }}</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>

            <td></td>
            <td>Taxable Marital Status:{{ $requestData['marital_status'] }}</td>
            <td><b>{{ $requestData['emp_name'] }}</b></td>
        </tr>
        <tr>
            <td></td>
            <td>Exemptions/Alowances:{{ $requestData['exemptions'] }}</td>
            <td><b> {{ $requestData['emp_street_1'] }}</br>
                    {{ $requestData['emp_street_2'] }}</b>

            </td>

        </tr>
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
            <td>Federal:1</td>
            <td><br>{{ $requestData['emp_city'] }}
                {{ $requestData['emp_state'] }}
                {{ $requestData['emp_zip_code'] }}</b></td>

        </tr>
        <tr>
            <td></td>
            <td>NY:1</td>
            <td>

            </td>

        </tr>
    </table>
    <section>
        <table class="table-data">
            <tr class="earn">
                <th style="border-bottom: 2px solid #000;" class="">EARNINGS</th>
                <th style="border-bottom: 2px solid #000;" class="">rate</th>
                <th style="border-bottom: 2px solid #000;" class="">hours</th>
                <th style="border-bottom: 2px solid #000;" class="">this period</th>
                <th style="border-bottom: 2px solid #000;" class="">year to date</th>
                <th style="border-bottom: 2px solid #000;" class="">other benifit and <br>information</th>
                <th style="border-bottom: 2px solid #000;" class="">this period</th>
                <th style="border-bottom: 2px solid #000;" class="">total to date</th>
            </tr>
            <tr>
                <td class="td">Regular</td>
                <td>22.00</td>
                <td>20.00</td>
                <td>440.00</td>
                <td>15600.80</td>
                <td>Company telephone </td>
                <td>number</td>
                <td> {{ $requestData['tel'] }}</td>
            </tr>
            <tr>
                <td class="td">Overtime</td>

            </tr>
            <tr>
                <td class="td">Holiday</td>

            </tr>
            <tr>
                <td class="td">Vocation</td>

            </tr>
            <tr>
                <td class="td">Sick</td>

            </tr>
            <tr colspan="7"></tr>

            <tr class="border_bottom">
                <td></td>
                <td style="font-size: 17px; text-align:left;" colspan="3">
                    <hr><b>Gross Pay</b>
                    <hr>
                </td>
                <td style="font-size: 17px; text-align:left;">
                    <hr><b>${{ $requestData['period_gross_total'] }}</b>
                    <hr>
                </td>
            </tr>
            <tr colspan="10"></tr>

        </table>
    </section>
    <section style="position: relative;">
        <section>
            <table class="table-data">
                <thead>
                    <th style="border-bottom: 2px solid #000;" class="">DEDUCTIONS</th>
                    <th style="border-bottom: 2px solid #000;" class="statutory">STATUTORY</th>
                </thead>
                @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td>{{ $taxes }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['taxes_rate'][$key] }}</td>

                    </tr>
                @endforeach

                @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td>{{ $tax_deduction }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}</td>

                    </tr>
                @endforeach

                <br>
                <thead style="border-bottom: 2px solid #000;">
                    <th></th>
                    <th class="td" colspan="3" style="border-top: 2px solid black;">OTHER</th>

                </thead>
                <tr>
                    <td colspan="7"></td>

                </tr>
                <tr>
                    <td colspan="7"></td>

                </tr>
                <tr>
                    <td style="text-align: left; font-size:17px; border-bottom:2px solid black;" colspan="2"><b>Net
                            Pay</b></td>

                    <td style="font-size:17px; border-bottom:2px solid black;">
                        <b>${{ $requestData['total_net_pay'] }}</b>
                    </td>
                </tr>
            </table>
        </section>
    </section>
    <table style="padding-top:30px; font-size:18px; font-weight:400;">
        <tr>
            <td>Your federal taxable wages this period are<br>
                $440.00</td>
        </tr>
    </table>
    <div class="container" style=" margin-top:50px; width:100%;">
        <div class="row" style="display: flex;justify-content: space-between;padding: 0px 14px;">
            <div style="width: 50%;float:left;">
                <h6 style="font-size: 17px; margin-bottom: 10px;"> {{ $requestData['cname'] }}</h6>
                <p style="font-size: 13px;">
                    {{ $requestData['address_1'] }}<br>{{ $requestData['address_2'] }}<br>{{ $requestData['city'] }}
                    {{ $requestData['state'] }},
                    {{ $requestData['zip_code'] }}</p>
            </div>
            <div style="width: 50%;float:right;text-align:right;">
                <h6 style="font-size: 14px; margin-bottom: 0;">Check Number: <span>00000422598</span>
                </h6>
                <p>
                    <span style="font-weight:800;">Pay Date:</span>
                    {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                </p>
            </div>
        </div>
        <table style="width: 100%; margin: 140px 0 0 auto; ">
            <tr style="border-bottom: 1px solid;">
                <td colspan="4"></td>
                <td>Deposite to the Account off</td>
                <td style="text-align: right;">Account number</td>
                <td style="text-align: right;">Amount</td>


            </tr>
            <td style="border-bottom: 1px solid black;" colspan="17"></td>
            <tr style="border-bottom: 1px solid;">
                <td colspan="4"></td>
                <td>{{ $requestData['emp_name'] }}</td>

                <td style="text-align: right;"colspan="">XXXX123</td>
                <td style="text-align: right;">${{ $requestData['total_ytd_net_pay'] }}</td>


            </tr>

        </table>



    </div>

</body>

</html>
