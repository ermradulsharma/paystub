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

        /* .table-data th {
            padding: 0px 20px 0 0;
        } */

        .statutory {
            text-align: left;
        }

        .column1 {
            float: left;
            width: 60%;
        }

        .column2 {
            float: left;
            width: 40%;


        }

        .sat {
            column-width: 100px;
        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;

        }

        .tablealign {
            text-align: center;
            width: 100%;
        }

        th {
            border-bottom: 2px solid black;
        }

        .borderbottam {
            border-bottom: 2px solid black;
        }

        .bg-img {
            position: relative;
        }

        .bg-img::before {
            background-image: url("images/global-white2.png");
            background-size: contain;
            background-repeat: no-repeat;
            content: "";
            top: 40px;
            left: 0px;
            right: 30px;
            position: absolute;
            z-index: -1;
            max-width: 650px;
            height: 100%;
            margin: 0 auto;
            width: 100%;
        }

        .container {
            position: absolute;
            top: 0px;
            z-index: 3;
            height: 300px;
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
        @auth
        @if(Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
        <div class="watermark"></div>
        @endif
        @endauth
        <table class="table" style="width: 100%;">
            <tr>
                <td></td>
                <td style="font-size:18px; font-weight:400;padding:0px !important; margin:0px !impoprtant;text-transform:uppercase;line-height:1.3"
                    class="table-data" rowspan="2">
                    <b>{{ $requestData['cname'] }}</b><br>{{ $requestData['address_1'] }}<br>{{ $requestData['address_2'] }}<br>{{ $requestData['city'] }},
                    {{ $requestData['zip_code'] }} </td>
                <td>
                    <p style="font-size:25px; font-weight:500;">Earnings Statement</p>
                    <p style="font-size:18px;color:#555;">Period Beginning:
                        &nbsp;&nbsp;&nbsp;{{ date('m/d/Y', strtotime($requestData['pay_start'])) }}<br>Period Ending:
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date('m/d/Y', strtotime($requestData['pay_end'])) }}
                        <br>Pay Date:
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}
                    </p>
                </td>

            </tr>
        </table>
        <table style="width:100%; padding-bottom:60px;">
            <tr>
                <td style="width:50%;">Taxable Marital
                    Status:&nbsp;&nbsp;&nbsp;{{ $requestData['marital_status'] }}<br>Exemptions/Alowances:&nbsp;
                    {{ $requestData['exemptions'] }}<br><span style="text-align: center;padding-left:42px;">Federal:
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        1</span><br><span style="padding-left:46px;">NY:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;1</span>

                </td>
                <td style="font-size:16px; width:50%; padding-left:100px;">
                    <b>{{ $requestData['emp_name'] }}<br>{{ $requestData['emp_city'] }}<br>
                        {{ $requestData['emp_state'] }}
                        {{ $requestData['emp_zip_code'] }}</b></td>
            </tr>
        </table>
        <section>
            <div class="row" style="width: 100%;">
                <div class="column1">
                    <table class="tablealign">
                        <thead style="font-size:14px; ">
                            <th style="text-align: left;width:21%; ">Earnings</th>
                            <th style="text-align: right;margin-left:2px;width:19%;">rate</th>
                            <th style="text-align: center;margin-left:2px;width:23%;">hours</th>
                            <th style="width:17%;text-align:center;">this period</th>
                            <th style=" margin-left:2px;width:20%;">year to date</th>
                        </thead>
                        <tbody style="font-size:13px;">
                            @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td style="text-align: left;">{{ $earn }}</td>
                                <td style="text-align: right">{{ number_format($requestData['rate'][$key],2) }}</td>
                                <td style="text-align: center;">{{ number_format($requestData['hours'][$key],2) }}</td>
                                <td style="text-align: center;"> {{ number_format($requestData['total'][$key],2) }} </td>
                                <td> {{ number_format($requestData['ytd_total'][$key],2) }} </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <br>

                        <tr>
                            <td></td>
                            <td style="text-align: left; font-size:14px; border-bottom:2px solid black; border-top:2px solid black;" colspan="2"><b>Gross Pay</b></td>
                            <td style="font-size:14px; border-bottom:2px solid black; border-top:2px solid black;text-align:right;">
                                {{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'],2) }}
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="column2" style="padding: 2px;">
                    <table class="tablealign">
                        <tr>
                            <td colspan="3" style="text-align: left;">Other Benefits and</td>
                        </tr>
                        <tr>
                            <td class="borderbottam" style="font-weight: bold;text-align:left;">Information</td>
                            <td class="borderbottam">this period</td>
                            <td class="borderbottam">total to date</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-size: 12px; text-align:left;">Company Telephone Number: {{ $requestData['tel'] }} </td>
                        </tr>
                    </table>
                </div>

            </div>
        </section>

        <section style="margin-top:30px;">
            <section>
                <table class="table-data" style="width: 48%;">
                    <tr style="font-size:14px;">

                        <td style="" style="border-bottom: 2px solid #000;">Deductions</td>
                        <td style="border-bottom: 2px solid #000; text-align:left;" colspan="3" class=""> Statutory</td>

                    </tr>
                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td></td>
                        <td colspan="2" style="text-align: left;  ">{{ $taxes }}</td>
                        <td style="text-align: right;"> {{ number_format($requestData['taxes_rate'][$key],2) }} </td>

                    </tr>
                    @endforeach

                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td></td>
                        <td style="text-align: left; padding-right:25px;">{{ $tax_deduction }}</td>
                        <td style="text-align: right;"> {{ number_format($requestData['period_tax_deduction'][$key],2) }}
                        </td>

                    </tr>
                    @endforeach

                    <br>
                    <tr>
                        <td></td>
                        <td style="text-align: left; font-size:14px; border-bottom:2px solid black; " colspan="2"><b>Other</b></td>
                        <td style="font-size:14px; border-bottom:2px solid black;">

                        </td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td></td>
                        <td style="text-align: left; font-size:14px; border-bottom:2px solid black; border-top:2px solid black;" colspan="2"><b>Net Pay</b></td>
                        <td style="font-size:14px; border-bottom:2px solid black; border-top:2px solid black;">
                            {{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'],2) }}
                        </td>
                    </tr>
                </table>
                <table style="padding-top:30px; font-size:14px; font-weight:400;">
                    <tr>
                        <td>Your federal taxable wages this period are<br> {{ $requestData['currency'] }} {{ number_format($requestData['total_net_pay'],2) }}</td>
                    </tr>
                </table>
            </section>
        </section>
        <section class="bg-img">
            <div class="container" style=" margin-top:10px; width:100%; padding:0px 20px;">
                <div class="row" style="display: flex;justify-content: space-between;padding: 0px 14px;">
                    <div style="width: 50%;float:left; position: relative; top:40px;right:30px;">
                        <p style="font-size: 13px; margin-bottom:0px;text-transform:uppercase;">
                            {{ $requestData['cname'] }}</p>
                        <p style="font-size: 13px; margin: 0;text-transform:uppercase;">{{ $requestData['address_1'] }}
                        </p>
                        <P style="font-size: 13px; margin: 0;text-transform:uppercase;">{{ $requestData['address_2'] }}
                        </P>
                        <P style="font-size: 13px; margin: 0;text-transform:uppercase;">{{ $requestData['city'] }}
                            {{ $requestData['state'] }}, {{ $requestData['zip_code'] }} </P>
                    </div>
                    <div style="width: 50%;float:right;text-align:right; margin-top:4px;">
                        <h6
                            style="font-size: 14px; margin-bottom: 6px; text-align:left; position: relative; left:120px; top:31px">
                            <span>0000000000</span>
                        </h6>
                        <p style="text-align:left; position: relative; left:120px; top:22px"> <span
                                style="font-weight:800;"></span>{{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                        </p>
                    </div>
                </div>
                <table style="width: 95%; margin: 50px auto 0px;">
                    <tr style="">
                        <td colspan="4"></td>
                        <td></td>
                        <td style="text-align: right;"></td>
                        <td style="text-align: right;"> </td>
                    </tr>

                    <tr>
                        <td style="font-size:14px; width:55%; text-align:left;padding-top:24px;">
                            {{ $requestData['emp_name'] }}</td>
                        <td style=" font-size:13px; width:12%; padding-top:24px; position: absolute; right:30px;">
                            XXXXX{{ $requestData['account_number_last_4'] }}</td>
                        <td style="text-align: right;font-size:13px; width:25%;padding-top:24px; ">
                            {{ $requestData['currency'] }} {{ number_format($requestData['total_net_pay'], 2) }}</td>
                    </tr>
                </table>
            </div>
        </section>


    </main>


</body>

</html>
