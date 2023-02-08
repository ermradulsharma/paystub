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
            width: 50%;
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
            background-image: url("images/transparent-bg2.png");
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
    </style>
    <style>
        #watermark {
            position: fixed;
            bottom: 10cm;
            left: 3cm;
            width: 500px;
            height: 400px;
            z-index: -1000;
        }
    </style>
</head>

<body>
    <div id="watermark">
        <img src="http://44.202.105.74/user/img.png" height="100%" width="100%" />
    </div>
    <main class="">
        <table class="table" style="width: 100%;">

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
                    {{ $requestData['zip_code'] }}
                </td>
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
                    {{ $requestData['emp_zip_code'] }}</b>
                </td>

            </tr>
            <tr>
                <td></td>
                <td>NY:1</td>
                <td>

                </td>

            </tr>
        </table>



        <section>
            <div class="row" style="width: 100%;">
                <div class="column1">
                    <table class="tablealign">
                        <thead style="font-size:14px;">
                            <th style="text-align: left; ">Earnings</th>
                            <th>rate</th>
                            <th>hours</th>
                            <th style=" margin-left:2px;">this period</th>
                            <th style=" margin-left:2px;">year to date</th>
                        </thead>
                        <tbody style="font-size:13px;">

                            @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td style="text-align: left;">{{ $earn }}</td>
                                <td>
                                    {{ $requestData['rate'][$key] }}
                                </td>
                                <td style="text-align: center;">{{ $requestData['hours'][$key] }}</td>
                                <td>
                                    {{ $requestData['total'][$key] }}
                                </td>
                                <td>
                                    {{ $requestData['ytd_total'][$key] }}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tr>
                            <td style="text-align:right; font-size:14px; border-bottom:2px solid black; border-top:2px solid black;" colspan="3"><b>Gross
                                    Pay</b></td>

                            <td style="font-size:14px; border-bottom:2px solid black;border-top:2px solid black; text-align: right;">
                                <b>{{ $requestData['currency'] }}{{ $requestData['total_net_pay'] }}</b>
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
                            <td class="borderbottam" style="font-weight: bold;">Information</td>
                            <td class="borderbottam">this period</td>
                            <td class="borderbottam">total to date</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-size: 12px; text-align:left;">Company Telephone Number:
                                {{ $requestData['tel'] }}
                            </td>

                        </tr>



                    </table>
                </div>

            </div>
        </section>

        <section style="margin-top:30px;">
            <section>
                <table class="table-data" style="width: 50%;">
                    <thead style="font-size:14px;">

                        <th style="border-bottom: 2px solid #000;">DEDUCTIONS</th>
                        <th style="border-bottom: 2px solid #000; text-align:center;" colspan="" class="">
                            STATUTORY</th>
                        <th class="sat" style="border-bottom: 2px solid #000; text-align:right; width: 40%"></th>
                    </thead>
                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td></td>
                        <td style="text-align: left;  ">{{ $taxes }}</td>
                        <td style="text-align: right;">
                            {{ $requestData['taxes_rate'][$key] }}
                        </td>

                    </tr>
                    @endforeach

                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td></td>
                        <td style="text-align: left; padding-right:25px;">{{ $tax_deduction }}</td>
                        <td style="text-align: right;">
                            {{ $requestData['period_tax_deduction'][$key] }}
                        </td>

                    </tr>
                    @endforeach

                    <br>
                    <thead style="border-bottom: 2px solid #000;">
                        <th></th>
                        <th class="td" colspan="3" style="border-bottom: 2px solid black; margin-bottom:30px;">OTHER
                        </th>

                    </thead>
                    <tr>
                        <td colspan="7"></td>

                    </tr>
                    <tr>
                        <td colspan="7"></td>

                    </tr>
                    <br>
                    <br>
                    <tr>
                        <td style="text-align: left; font-size:14px; border-bottom:2px solid black; border-top:2px solid black;" colspan="3"><b>Net
                                Pay</b></td>

                        <td style="font-size:14px; border-bottom:2px solid black; border-top:2px solid black;">
                            <b>{{ $requestData['currency'] }}{{ $requestData['total_net_pay'] }}</b>
                        </td>
                    </tr>
                </table>
                <table style="padding-top:30px; font-size:14px; font-weight:100;">
                    <tr>
                        <td>Your federal taxable wages this period are<br>
                            {{ $requestData['currency'] }}440.00
                        </td>
                    </tr>
                </table>
            </section>
        </section>
        <section class="bg-img">
            <div class="container" style=" margin-top:10px; width:100%; padding:0px 20px;">
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
                        <h6 style="font-size: 14px; margin-bottom: 6px;"> <span>00000422598</span>
                        </h6>
                        <p>
                            <span style="font-weight:800;"></span>
                            {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
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
                        <td style="font-size:14px; width:55%; text-align:left;">{{ $requestData['emp_name'] }}</td>
                        <td style="text-align: left; font-size:13px; width:25%;">XX567</td>
                        <td style="text-align: right;font-size:13px; width:17%;">12345</td>
                    </tr>
                </table>
            </div>
        </section>


    </main>


</body>

</html>