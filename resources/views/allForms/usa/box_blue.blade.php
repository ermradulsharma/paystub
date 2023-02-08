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
            width: 100%;
        }

        .text {
            margin-right: 10px;
        }

        .employee-box {
            border: 2px solid #000;
        }

        .table-data tr {
            text-align: center;
        }

        .td {
            text-align: left !important;
            padding: 0px !important;
            margin: 0 !important;
        }

        .table-data th {
            padding: 0px 20px 0 0;
        }

        .statutory {
            text-align: left;
        }

        .row1::after {
            content: "";
            clear: both;
            display: table;
        }

        .column1 {
            float: left;
            width: 10%;
        }

        .column2 {
            float: left;
            width: 90%;
        }

        .heading {
            text-align: left;
        }

        .container {
            position: absolute;
            top: 55px;
            z-index: 3;
            height: 300px;
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
            top: 195px;
            left: 38px !important;
            ;
        }

        .bg-img {
            position: relative;
        }

        .bg-img::before {
            background-image: url('http://44.202.105.74/images/check.jpg') !important;
            background-size: contain;
            background-repeat: no-repeat;
            content: "";
            top: 60px;
            left: 0px;
            right: 100px !important;
            position: absolute;
            z-index: -1;
            width: 700px;
            height: 100%;
        }
    </style>
    <style>
        #watermark {
            position: fixed;
            top: 10cm;
            bottom: 0cm;
            left: 3cm;
            width: 500px;
            height: 400px;
            z-index: -1000;
        }
    </style>
</head>

<body>
    <div id="watermark">
        {{-- <img src="http://44.202.105.74/user/water.png" height="100%" width="100%" /> --}}
        <img src="http://44.202.105.74/user/water.png" height="100%" width="100%" />
    </div>
    <main class="bg-img2">
        <div class="row1">
            <div class="column1">
                <table style="width: 100%; margin:0px auto 0px 0px;">
                    <tr>
                        <td><img style="max-width: 70px;" src="http://44.202.105.74/images/barode.jpeg"></td>
                    </tr>
                </table>
            </div>

            <div class="column2">
                <table class="table">

                    <tr>
                        <td></td>
                        <td class="table-data" rowspan="2"> <button class="employee-box" style=" border:1px solid black; border-radius:2px; padding:5px 10px 5px 5px;background-color:#88848445"><span class="text">EMPLOYEE ID: {{ $requestData['emp_id'] }}</span><span>SSN: {{ $requestData['emp_ssn'] }}</span> </button></td>
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
                        <td>Marital Status: <b style="text-transform: lowercase; padding:0px;"> {{ $requestData['marital_status'] }}</b> </td>
                        <td style="font-size: 14px; text-transform: uppercase;padding:0px;"> {{ $requestData['emp_name'] }} </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Exemptions/Alowances:<b>{{ $requestData['exemptions'] }}</b></td>
                        <td style="font-size: 14px;"> {{ $requestData['emp_street_1'] }} </br> {{ $requestData['emp_city'] }} </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>State:<b> {{ $requestData['emp_state'] }}</b></td>
                        <td style="font-size: 14px;"> {{ $requestData['emp_state'] }}, {{ $requestData['emp_zip_code'] }} </td>
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
                        <td><B>{{ $requestData['address_1'] }}</B></td>
                        <td>PEPORTING PERIOD: </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> <b>{{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}</b></td>
                        <td style="border-bottom: 2px solid #000;"> </b>{{ date('m/d/y', strtotime($requestData['pay_start'])) }} - {{ date('m/d/y', strtotime($requestData['pay_end'])) }}</b></td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                </table>
            </div>
        </div>
        <section>
            <table class="table-data" style="">
                <thead style="border-bottom: 2px solid black">
                    <th class="heading">EARNINGS</th>
                    <th class="">RATE</th>
                    <th class="">HOURS</th>
                    <th class="">CURRENT</th>
                    <th style="" class="">YTD</th>
                </thead>
                @foreach ($requestData['earning'] as $key => $earn)
                <tr>
                    <td style="text-align: left;">{{ $earn }}</td>
                    <td><b>{{ $requestData['rate'][$key] }}</b></td>
                    <td style="text-align:center;"><b>{{ $requestData['hours'][$key] }}</b></td>
                    <td><b>{{ $requestData['period'][$key] }}</b></td>
                    <td><b>{{ $requestData['ytd_total'][$key] }}</b></td>
                </tr>
                @endforeach
                </br> </br>
                <tr>
                    <td></td>
                    <td colspan="3" style="text-align: left; font-weight:bold; border:1px solid black;  background-color:#88848445;border-radius:2px; height:25px;">
                        &nbsp;Gross
                        Pay&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        {{ $requestData['total_net_pay'] }}
                    </td>
                    <td style="">{{ $requestData['total_ytd_net_pay'] }}</td>
                </tr>


                </br> </br> </br> </br>

            </table>
        </section>
        <section style="position: relative; width:;100%;">
            <section>
                <table class="table-data">
                    <thead style="border-bottom:2px solid black;">
                        <th style="" class="">DEDUCTIONS</th>
                        <th style="" class="statutory">STATUTORY</th>
                        <th></th>
                        <th style="" class="">CURRENT</th>
                        <th style="" class="">YTD</th>
                    </thead>

                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td></td>
                        <td style="text-align: left;" colspan="2">{{ $taxes }}</td>
                        <td><b>{{ $requestData['taxes_rate'][$key] }}</b></td>
                        <td><b>{{ $requestData['taxes_ytd'][$key] }}</b></td>
                    </tr>
                    @endforeach

                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td></td>
                        <td style="text-align: left;" colspan="2">{{ $tax_deduction }}</td>
                        <td><b>{{ $requestData['period_tax_deduction'][$key] }}</b>
                        </td>
                        <td><b>{{ $requestData['ytd_tax_deduction'][$key] }}</b>
                        </td>
                    </tr>
                    @endforeach
                    <br>
                    <thead style="border-bottom: 2px solid #000;">
                        <th></th>
                        <th class="td" colspan="4">OTHER</th>
                    </thead>
                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td></td>
                        <td style="text-align: left;" colspan="2">{{ $tax_deduction }}</td>
                        <td><b>{{ $requestData['period_tax_deduction'][$key] }}</b>
                        </td>
                        <td><b>{{ $requestData['ytd_tax_deduction'][$key] }}</b>
                        </td>
                    </tr>
                    @endforeach

                    </br> </br> </br>

                    <tr>
                        <td></td>
                        <td colspan="3" style="text-align: left;font-weight:bold; border:1px solid black;  background-color:#88848445; border-radius:2px; height:25px;">
                            &nbsp;Net
                            Pay&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{ $requestData['total_net_pay'] }}
                        </td>
                        <td style="">{{ $requestData['total_ytd_net_pay'] }}</td>
                    </tr>
                </table>
            </section>
            <section style="position:absolute; top:7px; right:60px;">
                <table style="border:1px solid #000; padding:px;width:250px;">
                    <tr>
                        <th style="padding-left:8px;text-align: left;  ">YTD GROSS</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ $requestData['ytd_deduction_tax'] }}</b></td>


                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">YTD DEDUCTIONS</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ $requestData['ytd_gross_total'] }}</b></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">YTD NET PAY</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ $requestData['ytd_deduction_tax'] }}</b></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">GROSS PAY</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ $requestData['deduction_tax'] }}</b></td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">DEDUCTIONS</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ $requestData['period_gross_total'] }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid black;" colspan="2"></td>
                    </tr>
                    <tr>
                        <th style="padding-left:8px;text-align: left;">NET PAY</th>
                        <td style="padding-right:8px;text-align: right;"><b>{{ $requestData['total_net_pay'] }}</b></td>
                        </td>
                    </tr>

                </table>
            </section>
        </section>
        <section class="bg-img">
            <div class="container" style=" margin-top:40px; width:100%;">
                <div class="row" style="display: flex;justify-content: space-between;padding: 0px 14px;">
                    <div style="width: 50%;float:left;position: relative; left:20px;">
                        <h6 style="font-size: 17px; margin-bottom: 10px;">{{ $requestData['emp_name'] }}</h6>
                        <p style="font-size: 13px; margin: 0;"> {{ $requestData['emp_street_1'] }}VD</p>
                        <P style="font-size: 13px; margin: 0;">{{ $requestData['emp_city'] }}</P>
                        <P style="font-size: 13px; margin: 0;">{{ $requestData['emp_state'] }},
                            {{ $requestData['emp_zip_code'] }}
                        </P>
                    </div>
                    <div style="width: 50%;float:right;text-align:right;position: relative; right:20px;">
                        <h6 style="font-size: 14px; margin-bottom: 0;">
                            <span style="">{{ $requestData['advice_number'] }}</span>
                        </h6>
                        <p>
                            <span style="font-weight:800;"></span>
                            {{ date('m/d/y', strtotime($requestData['pay_date'])) }}
                        </p>
                    </div>
                </div>
                <table style="width: 95%; margin: 140px  auto 0px; padding:0px 20px;">
                    <tr style="">
                        <td colspan="4"></td>
                        <td style="text-align: right;" colspan="6"></td>


                    </tr>
                    <td colspan="17"></td>
                    <tr>
                        <td style="font-size:14px;text-align:left;  width:55%;">{{ $requestData['emp_name'] }}</td>
                        <td style="text-align: center; font-size:13px; width:15%;">XXXXX534</td>
                        <td style="text-align: center;font-size:13px; width:15%;">XXXXX534</td>
                        <td style="text-align: right;font-size:13px; width:15%;">XXXXX534</td>
                    </tr>
                </table>
            </div>
        </section>
    </main>




</body>

</html>
