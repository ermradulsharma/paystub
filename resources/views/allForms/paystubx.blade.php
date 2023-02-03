<!DOCTYPE html>
<html lang="en">

<head>
    <title>paystubs-check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    th {
        text-align: left;
    }

    table {
        font-size: 13px;
    }

    .two-col {
        -webkit-column-count: 2;
        /* Chrome, Safari, Opera */
        -moz-column-count: 2;
        /* Firefox */
        column-count: 2;
    }

    .row1::after {
        content: "";
        clear: both;
        display: table;
    }

    .column1 {
        float: left;
        width: 70%;
    }

    .column2 {
        float: left;
        width: 20%;
    }

    .row2::after {
        content: "";
        clear: both;
        display: table;
    }

    .col0 {
        float: left;
        width: 27%;
        margin-right: 10px;
    }

    .col1 {
        float: left;
        width: 38%;
        margin-right: 10px;
    }

    .col2 {
        float: left;
        width: 35%;
        margin-left: 10px;
    }

    .co-table {
        padding: 10px;
    }
</style>

<body>

    <table class="co-table">
        <tr>
            <td></td>
            <td style="padding-right: 20px;">CO</td>
            <td style="padding-right: 20px;">FILE</td>
            <td style="padding-right: 20px;">DEPT.</td>
            <td style="padding-right: 20px;">CLOCK VCHR</td>
        </tr>
        <tr>
            <td></td>
            <td>{{ $requestData['co_number'] }}</td>
            <td>{{ $requestData['file_number'] }}</td>
            <td>201094</td>
            <td style="padding-right: 10px;">{{ $requestData['clock_vchr_number'] }}</td>
        </tr>
    </table>



    <div class="row2">
        <h3 style="text-align: right;">Earnings Statement</h3>
        <div class="col0">
        </div>
        <div class="col1">
            <table style="width: 100%;">
                <tr>
                    <td style="font-weight:800;font-size:16px;">{{ $requestData['cname'] }}</td>
                </tr>
                <tr>
                    <td>{{ $requestData['address_1'] }}</br>{{ $requestData['address_1'] }}</br>{{ $requestData['city'] }}
                        {{ $requestData['state'] }},
                        {{ $requestData['zip_code'] }}</td>
                </tr></br></br></br>
                <tr>
                    <td>Social Security Number:{{ $requestData['emp_ssn'] }}
                    </td>
                </tr>
                <tr>

                    <td>Marital Status:{{ $requestData['marital_status'] }}
                    </td>

                </tr>

                <tr>
                    <td>Expectations/Allowances:0</td>
                </tr>
            </table>
        </div>

        <div class="col2">

            <table style="width: 100%;">
                <tr>
                    <td><b>Period
                            Beginning:&nbsp;&nbsp;&nbsp;&nbsp;{{ date('m/d/Y', strtotime($requestData['pay_start'])) }}</b>
                    </td>
                </tr>
                <tr>
                    <td><b>Period
                            Ending:&nbsp;&nbsp;&nbsp;&nbsp;{{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</b>
                    </td>
                </tr>
                <tr>
                    <td><b>Pay
                            Date:&nbsp;&nbsp;&nbsp;&nbsp;{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</b>
                    </td>
                </tr></br></br></br>
                <tr>
                    <td style="font-weight: 800; font-size:16px;">{{ $requestData['emp_name'] }}</td>

                </tr>
                <tr>
                    <td> {{ $requestData['emp_street_1'] }},{{ $requestData['emp_city'] }}</br>
                        {{ $requestData['emp_state'] }},
                        {{ $requestData['emp_zip_code'] }},USA</td>
                </tr>
            </table>

        </div>
    </div>

    <section>
        <div class="row1" style="margin-top: 60px;">
            <div class="column1">
                <table style="width: 100%;">
                    <tr>
                        <th>Earning</th>
                        <th style="width: 15%;">Rate</th>
                        <th>Hours</th>
                        <th>This Period</th>
                        <th>Year-to-date</th>

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
                    </br>
                    <tr>
                        <th colspan="3" style="text-align:right; padding-right:25px;">GROSS PAY</th>
                        <td>{{ $requestData['currency'] }} {{ $requestData['deduction_tax'] }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['ytd_deduction_tax'] }}</td>
                    </tr>

                </table>
            </div>

            <div class="column2">
                <table style="width: 100%;">
                    <tr style="border-bottom: 2px solid black;">
                        <th>Important Notes</th>
                    </tr>
                    <tr>
                        <td>Companv Telephone Number:{{ $requestData['tel'] }}</td>
                    </tr>
                </table>
            </div>
        </div>


    </section>







    <table style="width:100%;margin-top:30px;">
        <thead>
            <th>Deductions</th>
            <th colspan="3">Statuory</th>
        </thead>

        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
            <tr>
                <td></td>
                <td style="text-align: left;">{{ $taxes }}</td>
                <td>{{ $requestData['currency'] }} {{ $requestData['taxes_rate'][$key] }}</td>
                <td>{{ $requestData['currency'] }} {{ $requestData['taxes_ytd'][$key] }}</td>
            </tr>
        @endforeach

        @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
            <tr>
                <td></td>
                <td style="text-align: left;">{{ $tax_deduction }}</td>
                <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}</td>
                <td>{{ $requestData['currency'] }} {{ $requestData['ytd_tax_deduction'][$key] }}</td>
            </tr>
        @endforeach
        </br></br>
        <tr>
            <td></td>
            <td>Total Deduction</td>
            <td>{{ $requestData['currency'] }} {{ $requestData['period_gross_total'] }}</td>
            <td>{{ $requestData['currency'] }} {{ $requestData['ytd_gross_total'] }}</td>
        </tr>
        </br>
        <tr>
            <td></td>
            <th>Net Pay</th>
            <td>{{ $requestData['currency'] }}
                {{ $requestData['total_net_pay'] }}</td>
            <td>{{ $requestData['currency'] }}
                {{ $requestData['total_ytd_net_pay'] }}</td>
        </tr>

    </table>



    <table class="container" style=" margin-top:100px;padding: 0 0px 0px 0px;width:100%; ">
        <div class="row" style="display: flex; display: flex;justify-content: space-between;padding: 0px 14px;">
            <div style="width: 50%;float:left;">
                <h6 style="font-size: 17px; margin-bottom: 0;">{{ $requestData['cname'] }}</h6>
                <p style="font-size: 10px; margin: 0;"> {{ $requestData['emp_street_1'] }},</p>
                <P style="font-size: 10px; margin: 0;"> {{ $requestData['emp_street_2'] }}</P>
                <P style="font-size: 10px; margin: 0;"> {{ $requestData['emp_city'] }}
                    {{ $requestData['emp_state'] }},
                    {{ $requestData['emp_zip_code'] }}</P>
                <p style="font-size: 10px;">Pay To: <span style="font-weight:800;">
                        {{ $requestData['emp_name'] }}</span>
                </p>
            </div>
            <div style="width: 50%;float:right">
                <h6 style="font-size: 17px; margin-bottom: 0;">Advice Number:
                    <span>{{ $requestData['advice_number'] }}</span>
                </h6>
                <br>
                <br>
                <P style="font-size: 10px;margin: 0;">
                    <span style="font-weight:800;">Check Nuumber:</span> {{ $requestData['account_number_last_4'] }}
                </P>
                <P style="font-size: 10px;margin: 0;">
                    <span style="font-weight:800;">Date:</span>
                    {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                </P>
            </div>
        </div>



    </table>


    <table style="width: 100%; margin: 100px 0 0 auto;">
        <tr style="border-bottom: 1px solid black;">
            <td colspan="4"></td>
            <td style="">Deposite to the Account off</td>
            <td style="text-align: right;">Amount</td>
            <td style="text-align: right;">Transit ABA </td>
            <td style="text-align: right;">Account number</td>
        </tr>

        <tr>
            <td colspan="4"></td>
            <td style="">{{ $requestData['emp_name'] }}</td>
            <td style="text-align: right;">{{ $requestData['total_net_pay'] }}</td>
            <td style="text-align: right;">{{ $requestData['transit_aba_number'] }}</td>
            <td style="text-align: right;">{{ $requestData['account_number_last_4'] }}</td>
        </tr>
    </table>
</body>

</html>
