<!DOCTYPE html>
<html lang="en">

<head>
    <title>paystubs-check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            width: 65%;
        }

        .column2 {
            float: left;
            width: 35%;
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
            top: 120px;
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
            top: 200px;
            left: 38px;
        }

        .background:before {
            background-image: url("images/bg-lines1.png");
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            max-width: 700px;
            content: "";
            position: absolute;
            padding: 140px 0px;
            top: -20px;
            left: 100px;
            right: 0;

        }

        .background {
            position: relative;
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
            @if (Auth::user()->expiryDate == '')
                <div class="watermark"></div>
            @endif
        @endauth
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
                            {{ $requestData['zip_code'] }}
                        </td>
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
                                Date:&nbsp;&nbsp;&nbsp;&nbsp;<span
                                    style="text-align:right;">{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</span></b>
                        </td>
                    </tr></br></br></br>
                    <tr>
                        <td style="font-weight: 800; font-size:16px;">{{ $requestData['emp_name'] }}</td>

                    </tr>
                    <tr>
                        <td> {{ $requestData['emp_street_1'] }},{{ $requestData['emp_city'] }}</br>
                            {{ $requestData['emp_state'] }},
                            {{ $requestData['emp_zip_code'] }},USA
                        </td>
                    </tr>
                </table>

            </div>
        </div>

        <section class="">
            <div class="row1 background" style="margin-top: 60px;">
                <div class="column1">
                    <table style="width: 100%;">
                        <tr>
                            <th style="width:20%;">Earning</th>
                            <th style="width:20%;text-align:left; padding-left:15px;">Rate</th>
                            <th style=" width:20%;text-align:right;">Hours</th>
                            <th style=" width:17%;text-align:right;">This Period</th>
                            <th style="width:23%; text-align:center;">Year-to-date</th>

                        </tr>
                        @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td style="width:20%;">{{ $earn }}</td>
                                <td style=" width:20%; text-align:left; padding-left:15px;">
                                    {{ number_format($requestData['rate'][$key], 2) }}</td>
                                <td style=" width:20%;text-align:right;">
                                    {{ number_format($requestData['hours'][$key], 2) }}</td>
                                <td style="text-align: right; width:17%;">
                                    {{ number_format($requestData['period'][$key], 2) }}</td>
                                <td style=" width:23%; text-align:right; padding-right:15px;">
                                    {{ number_format($requestData['ytd_total'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        </br>
                        <tr>
                            <th style=" width:20%;"></th>
                            <th style=" width:20%;"></th>
                            <th style="width:20%;text-align:right;">GROSS PAY</th>
                            <th style="width:17%; text-align:right;"><b>
                                    {{ number_format($requestData['deduction_tax'], 2) }}</b></th>
                            <th style=" width:23%; text-align:right; padding-right:15px;"><b>
                                    {{ number_format($requestData['ytd_deduction_tax'], 2) }}</b></th>
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

            <div class="row1 background" style="margin-top: 60px;">
                <div class="column1">
                    <table style="width:100%; ">
                        <thead>
                            <th style="width:20%;">Deductions</th>
                            <th style="width:20%; text-align:left; padding-left:15px;" colspan="">Statuory</th>
                            <th style="width:20%;"></th>
                            <th style="width:20%;"></th>
                            <th style="width:20%;"></th>

                        </thead>

                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                            <tr>
                                <td style="width:20%;"></td>
                                <td style="width:25%; text-align:left; padding-left:15px;" colspan="">
                                    {{ $taxes }}</td>
                                <td style="width:20%;"></td>
                                <td style="width:15%;text-align:right;">
                                    {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                                <td style="text-align:right; padding-right:15px;width:20%; ">
                                    {{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>

                            </tr>
                        @endforeach

                        @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                            <tr>
                                <td style="width:20%;"></td>
                                <td style="width:20%;text-align:left; padding-left:15px;" colspan="">
                                    {{ $tax_deduction }}</td>
                                <td style="width:20%;"></td>
                                <td style="text-align:right;width:20%; ">
                                    {{ number_format($requestData['period_tax_deduction'][$key], 2) }}</td>
                                <td style="text-align:right; padding-right:15px;width:20%; ">
                                    {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        </br></br>
                        <tr>
                            <td style="width:20%;"></td>
                            <td style="width:20%; text-align:center;" colspan="">Total Deduction</td>
                            <td style="width:20%;"></td>
                            <td style="text-align:right;width:20%; "><b>
                                    {{ number_format($requestData['period_gross_total'], 2) }}</b></td>
                            <td style="text-align:right; padding-right:15px;width:20%; "><b>
                                    {{ number_format($requestData['ytd_gross_total'], 2) }}</b></td>
                        </tr>
                        </br>
                        <tr>
                            <td style="width:20%;"></td>
                            <th style="width:20%; text-align:left; padding-left:15px;" colspan="">NET PAY</th>
                            <th style="width:20%;"></th>
                            <td style="text-align:right;width:20%; "><b>
                                    {{ number_format($requestData['total_net_pay'], 2) }}</b></td>
                            <td style="text-align:right; padding-right:15px;width:20%; "><b>
                                    {{ number_format($requestData['total_ytd_net_pay'], 2) }}</b></td>
                        </tr>

                    </table>
                </div>
            </div>
        </section>

        <section class="bg-img">
            <table class="container"
                style=" margin-top:60px;padding: 0 0px 0px 0px;width:100%; position: absolute; top:100px; ">
                <div class="row"
                    style="display: flex; display: flex;justify-content: space-between;padding: 0px 14px;">
                    <div style="width: 50%;float:left;padding-left:30px;">
                        <h6 style="font-size: 17px; margin-bottom: 0;">{{ $requestData['cname'] }}</h6>
                        <p style="font-size: 10px; margin: 0;"> {{ $requestData['emp_street_1'] }},</p>
                        <P style="font-size: 10px; margin: 0;"> {{ $requestData['emp_street_2'] }}</P>
                        <P style="font-size: 10px; margin: 0;"> {{ $requestData['emp_city'] }}
                            {{ $requestData['emp_state'] }},
                            {{ $requestData['emp_zip_code'] }}
                        </P>
                        <p style="font-size: 10px;">Pay To: <span style="font-weight:800;">
                                {{ $requestData['emp_name'] }}</span>
                        </p>
                    </div>
                    <div style="width: 50%;float:right;padding-bottom: 10px;">
                        <h6 style="font-size: 17px; ">
                            <p style="text-align:right;margin-right:80px;">{{ $requestData['advice_number'] }}</p>
                            {{-- <p style="text-align:right;margin-right:60px;">
                                {{ date('m/d/y', strtotime($requestData['pay_date'])) }}</p> --}}
                        </h6>

                        </br>
                        </br>
                        {{-- <P style="font-size: 10px;margin: 0;">
                            <span style="font-weight:800;">Check Nuumber:</span>
                            {{ $requestData['account_number_last_4'] }}
                        </P> --}}
                        <P style="font-size: 10px;margin: 0;">
                            <span style="font-weight:800;">Date:</span>
                            {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                        </P>
                    </div>
                </div>
            </table>
            <table style="width: 90%; margin: 0px auto 0; position: absolute; top:300px;">
                <tr style="">

                    <td style=""></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;"></td>

                </tr>

                <tr>
                    <td style="font-size:14px;text-align:left;  width:55%;">{{ $requestData['emp_name'] }}</td>
                    <td style="text-align: center; font-size:13px; width:15%;">
                        XXXXX{{ $requestData['account_number_last_4'] }}</td>
                    <td style="text-align: center;font-size:13px; width:15%;">
                        XXXXX{{ $requestData['transit_aba_number'] }}</td>
                    <td style="text-align: right;font-size:13px; width:15%;">{{ $requestData['currency'] }}
                        {{ number_format($requestData['total_net_pay'], 2) }} </td>
                    </td>
                </tr>
            </table>
        </section>
    </main>
</body>

</html>
