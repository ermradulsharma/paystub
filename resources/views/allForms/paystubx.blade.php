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
        width: 30%;
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

    .bg-img {
        position: relative;
    }

    .bg-img:before {
        background: url('http://44.202.105.74/images/check.jpg') !important;
        background-repeat: no-repeat !important;
        background-size: contain !important;
        height: 100%;
        width: 700px;
        content: "";
        top: 180px;
        left: 0px;
        right: 0px;
        position: absolute;
        z-index: -1;

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
        right: 0;
        top: 150px;
        left: 33px;
    }
    .background:before{
        background: url('http://44.202.105.74/images/bg-lines1.png') !important;
        background-repeat: no-repeat;
        background-size: contain;
        width:100%;
        max-width: 700px;
        height: 400px;
        content: "";
        position: absolute;
        top:0;
        left: 0px;
        right: 0;

    }
    .background{
        position: relative;
    }
</style>

<body>
    <main class="bg-img2">
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
            <h3 style="text-align: left; max-width:215px; margin:0 0 0 auto; padding-bottom:25px; font-size:23px;">
                Earnings
                Statement</h3>
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

        <section class="">
            <div class="row1 background" style="margin-top: 60px;">
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
                            <td><b>{{ $requestData['currency'] }} {{ $requestData['deduction_tax'] }}</b></td>
                            <td><b>{{ $requestData['currency'] }} {{ $requestData['ytd_deduction_tax'] }}</b></td>
                        </tr>

                    </table>
                </div>

                <div class="column2">
                    <table style="width: 100%;">
                        <tr style="border-bottom: 2px solid black;">
                            <th>Important Notes</th>
                        </tr>
                        <tr>
                            <td>Company Telephone Number:{{ $requestData['tel'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>


        </section>
        <table style="width:65%;margin-top:30px;">
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
                <td><b>{{ $requestData['currency'] }} {{ $requestData['period_gross_total'] }}</b></td>
                <td><b>{{ $requestData['currency'] }} {{ $requestData['ytd_gross_total'] }}</b></td>
            </tr>
            </br>
            <tr>
                <td></td>
                <th>NET PAY</th>
                <td><b>{{ $requestData['currency'] }}
                        {{ $requestData['total_net_pay'] }}</b></td>
                <td><b>{{ $requestData['currency'] }}
                        {{ $requestData['total_ytd_net_pay'] }}</b></td>
            </tr>

        </table>
        <section class="bg-img">
            <table class="container" style=" margin-top:230px;padding: 0 0px 0px 0px;width:100%; ">
                <div class="row"
                    style="display: flex; display: flex;justify-content: space-between;padding: 0px 14px;">
                    <div style="width: 50%;float:left;padding-left:30px;">
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
                    <div style="width: 50%;float:right;padding-bottom: 10px;">
                        <h6 style="font-size: 17px; ">
                            <span>{{ $requestData['advice_number'] }}</span>
                        </h6>
                        <br>
                        <br>
                        <P style="font-size: 10px;margin: 0;">
                            <span style="font-weight:800;">Check Nuumber:</span>
                            {{ $requestData['account_number_last_4'] }}
                        </P>
                        <P style="font-size: 10px;margin: 0;">
                            <span style="font-weight:800;">Date:</span>
                            {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                        </P>
                    </div>
                </div>
            </table>
            <table style="width: 100%; margin: 120px 0 0 auto;">
                <tr style="">
                    <td colspan="4"></td>
                    <td style=""></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;"></td>
                </tr>

                <tr>
                    <td colspan="4"></td>
                    <td style="padding-left:30px;">{{ $requestData['emp_name'] }}</td>
                    <td style="text-align: left;">{{ $requestData['total_net_pay'] }}</td>
                    <td style="text-align: left;">{{ $requestData['transit_aba_number'] }}</td>
                    <td style="text-align: left;">{{ $requestData['account_number_last_4'] }}</td>
                </tr>
            </table>
        </section>
    </main>




</body>

</html>
