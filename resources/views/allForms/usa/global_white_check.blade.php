<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global White Check</title>
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Arimo:ital@1&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        @import url('https://fonts.cdnfonts.com/css/roman-new-times');
        @import url('https://fonts.cdnfonts.com/css/times');
        @import url('https://fonts.cdnfonts.com/css/arial-2');
        @import url('https://fonts.cdnfonts.com/css/arial-mt');

        @font-face {
            font-family: 'Arial, Helvetica', sans-serif;
            font-family: 'Arial MT', sans-serif;
            font-family: 'Arial MT Narrow', sans-serif;
            font-family: 'Arial Rounded MT', sans-serif;
            font-family: 'Arial Rounded MT Bold', sans-serif;
            font-family: 'ArialMT', sans-serif;
            font-family: 'Arial MT Black', sans-serif;
            font-family: 'Maven Pro', sans-serif;
            font-family: 'Arimo', sans-serif;
            font-family: 'Times New Roman', sans-serif;
            font-family: 'PT Sans Narrow', sans-serif;
            font-family: 'Poppins', sans-serif;
            font-family: 'MICR', sans-serif;
            src: url("{{asset('fonts/micr-encoding.regular.ttf')}}") format('ttf');
        }
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
            border-bottom: 3px solid black;
        }

        .borderbottam {
            border-bottom: 3px solid black;
        }

        .bg-img {
            position: relative;
        }

        .bg-img::before {
            background-image: url("images/global-white.png");
            background-size: contain;
            background-repeat: no-repeat;
            content: "";
            top: 40px;
            left: 100px;
            right: 0px;
            position: absolute;
            z-index: -1;
            max-width: 600px;
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
                <td style="font-size: 16px; margin: 0;color:black;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase;padding-left:100px;font-weight:400;"
                    class="table-data" rowspan="2">
                    <b style="font-size:23px; font-weight:bold;">{{ $requestData['cname'] }}</b><br>{{ $requestData['address_1'] }}<br>{{ $requestData['state'] }}<br>{{ $requestData['city'] }},
                    {{ $requestData['zip_code'] }} </td>
                    <td style="padding-left:40px; margin-right:auto; text-align:right;">
                    <p style="font-size:26px; font-weight:bold;text-align:right; padding-right:0px;font-family: 'Arial', sans-serif;">Earnings Statement</p>
                    <p style="font-size:18px;color:#555;font-family: Arial, Helvetica, sans-serif; font-weight:400;">Period Beginning:
                        &nbsp;{{ date('m/d/Y', strtotime($requestData['pay_start'])) }}<br>Period Ending:
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date('m/d/Y', strtotime($requestData['pay_end'])) }}
                        <br>Pay Date:
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}
                    </p>
                </td>

            </tr>
        </table>

        <table style="width:100%; padding-bottom:60px; padding-left:100px;">
            <tr>
                <td style="width:50%;font-family: Arial, Helvetica, sans-serif; font-weight:400;">Taxable Marital
                    Status:&nbsp;&nbsp;&nbsp;{{ $requestData['marital_status'] }}<br>Exemptions/Alowances:&nbsp;
                    {{ $requestData['exemptions'] }}<br><span style="text-align: center;padding-left:42px;">Federal:
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        1</span><br><span style="padding-left:46px;">NY:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;1</span>

                </td>
                <td style="font-size:16px; width:50%; padding-left:100px;font-family: Arial, Helvetica, sans-serif; font-weight:bold;">
                    <b>{{ $requestData['emp_name'] }}<br>{{ $requestData['emp_city'] }}<br>
                        {{ $requestData['emp_state'] }}
                        {{ $requestData['emp_zip_code'] }}</b></td>
            </tr>
        </table>

        <section>
            <div class="row" style="width: 100%;">
                <div class="column1">
                    <table class="tablealign">
                        <thead style="font-size:15px; ">
                            <th style="text-align: left;width:21%;font-size:18px;font-family: Arial, Helvetica, sans-serif; font-weight:bold; ">Earnings</th>
                            <th style="text-align: center;margin-left:2px;width:18%;font-family: Arial, Helvetica, sans-serif; font-weight:bold;font-size:14px;">rate</th>
                            <th style="text-align: center;margin-left:2px;width:22%;font-family: Arial, Helvetica, sans-serif; font-weight:bold;font-size:14px;">hours</th>
                            <th style="width:18%;text-align:center;font-family: Arial, Helvetica, sans-serif; font-weight:bold;font-size:14px;">this period</th>
                            <th style="width:5px; height:1px; margin-top:5px; border:none;"></th>
                            <th style=" margin-left:2px;width:21%;font-family: Arial, Helvetica, sans-serif; font-weight:bold;font-size:14px;">year to date</th>
                        </thead>
                        <tbody style="font-size:13px;">
                            @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td style="text-align: left;font-size:15px;font-family: Arial, Helvetica, sans-serif;">{{ $earn }}</td>
                                <td style="text-align: rightfont-size:15px;font-family: Arial, Helvetica, sans-serif;">{{ number_format($requestData['rate'][$key],2) }}</td>
                                <td style="text-align: center;font-size:15px;font-family: Arial, Helvetica, sans-serif;">{{ number_format($requestData['hours'][$key],2) }}</td>
                                <td style="text-align: center;font-size:15px;font-family: Arial, Helvetica, sans-serif;"> {{ number_format($requestData['total'][$key],2) }} </td>
                                <td></td>
                                <td style="font-size:15px;font-family: Arial, Helvetica, sans-serif;"> {{ number_format($requestData['ytd_total'][$key],2) }} </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <br>

                        <tr>
                            <td></td>
                            <td style="text-align: left; font-size:15px; border-bottom:3px solid black; border-top:3px solid black;font-family: Arial, Helvetica, sans-serif;" colspan="2"><b>Gross Pay</b></td>
                            <td style="font-size:15px; border-bottom:3px solid black; border-top:3px solid black;text-align:right;font-family: Arial, Helvetica, sans-serif;">
                                <b>{{ $requestData['currency'] }}{{ number_format($requestData['total_net_pay'],2) }}</b>
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="column2" style="padding: 2px;">
                    <table class="tablealign">
                        <tr>
                            <td colspan="3" style="text-align: left;font-family: Arial, Helvetica, sans-serif;">Other Benefits and</td>
                        </tr>
                        <tr>
                            <td class="borderbottam" style="font-weight: bold;text-align:left;font-family: Arial, Helvetica, sans-serif;">Information</td>
                            <td class="borderbottam"style="font-weight: bold;font-family: Arial, Helvetica, sans-serif;">this period</td>
                            <th style="width:5px; height:1px; margin-top:5px; border:none;"></th>
                            <td class="borderbottam"style="font-weight: bold;font-family: Arial, Helvetica, sans-serif;">total to date</td>
                        </tr>
                        <tr>

                            <td colspan="4" style="font-size: 12px; text-align:left;font-family: Arial, Helvetica, sans-serif;">Company Telephone Number:{{ $requestData['tel'] }} </td>

                        </tr>
                    </table>
                </div>

            </div>
        </section>

        <section style="margin-top:30px;">
            <table class="table-data" style="width: 48%;">
                <tr style="font-size:15px;">
                    <td style="border-bottom: 3px solid #000;text-align:left;font-family: Arial, Helvetica, sans-serif;"><b>Deductions</b></td>
                    <td style="border-bottom: 3px solid #000; text-align:left;font-family: Arial, Helvetica, sans-serif;" colspan="3"><b>Statutory</b></td>
                </tr>
                @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                <tr>
                    <td></td>
                    <td colspan="2" style="text-align: left; font-size:15px;font-family: Arial, Helvetica, sans-serif; ">{{ $taxes }}</td>
                    <td style="text-align: right;font-size:15px;font-family: Arial, Helvetica, sans-serif;"> {{ number_format($requestData['taxes_rate'][$key],2) }} </td>
                </tr>
                @endforeach

                @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                <tr>
                    <td></td>
                    <td style="text-align: left; padding-right:25px;font-size:15px;font-family: Arial, Helvetica, sans-serif;">{{ $tax_deduction }}</td>
                    <td style="text-align: right;font-size:15px;font-family: Arial, Helvetica, sans-serif;"> {{ number_format($requestData['period_tax_deduction'][$key],2) }}</td>
                </tr>
                @endforeach

                <br>
                <tr>
                    <td></td>
                    <td style="text-align: left; font-size:15px; border-bottom:3px solid black;font-family: Arial, Helvetica, sans-serif; " colspan="2"><b>Other</b></td>
                    <td style="font-size:15px; border-bottom:3px solid black;"></td>
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
                    <td style="text-align: left; font-size:15px; border-bottom:3px solid black; border-top:3px solid black;font-family: Arial, Helvetica, sans-serif;" colspan="2"><b>Net Pay</b></td>
                    <td style="font-size:15px; border-bottom:3px solid black; border-top:3px solid black;font-family: Arial, Helvetica, sans-serif;"><span
                        style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'],2) }} </td>
                </tr>
            </table>
        </section>

        <section>
            <div class="row" style="width: 100%; margin-top:7%;">
                <div style="width: 80%;">
                    <table class="tablealign">
                        <tr style="font-size:15px;">
                            <td style="width:17%"></td>
                            <td style="text-align:left;font-family: Arial, Helvetica, sans-serif;">Your federal taxable wages this period are <br> <span
                                style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'],2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <section class="bg-img">
            <div class="container" style=" margin-top:10px; width:100%; padding:0px 20px;">
                <div class="row" style="display: flex;justify-content: space-between;padding: 0px 14px;">
                    <div style="width: 50%; float:left; position: relative; top:45px; right:0px; left:70px;">
                        <p style="font-size: 14px; margin: 0;color:black;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase;font-weight:400;">{{ $requestData['cname'] }}</p>
                        <p style="font-size: 14px; margin: 0;color:black;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase;font-weight:400;">{{ $requestData['address_1'] }} </p>
                        <P style="font-size: 14px; margin: 0;color:black;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase;font-weight:400;">{{ $requestData['address_2'] }} </P>
                        <P style="font-size: 14px; margin: 0;color:black;font-family: Arial, Helvetica, sans-serif; text-transform:uppercase;font-weight:400;">{{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }} </P>
                    </div>
                    <div style="width: 50%;float:right;text-align:right;">
                        <h6 style="font-size: 14px; margin-bottom: 2px; text-align:center; left:40px; position: relative;  top:31px;font-weight:400;"> <span>0000000000</span> </h6>
                        <h6 style="font-size: 14px; text-align:center; left:40px; position: relative; font-weight:400;"> <span>{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</span> </h6>
                        {{-- <p style="text-align:center; position: relative; left:40px; top:17px;font-size: 14px;"> <span style="font-weight:800; "></span><span style="">{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</span> </p> --}}
                    </div>
                </div>
                <table>
                    <tr>
                        <td style="width:10%;"></td>
                        <td style="font-size:15px; padding-top:40px; width:50%;padding-left:10px; font-weight:bold;font-family: Arial, Helvetica, sans-serif;">{{ $requestData['emp_name'] }}</td>
                        <td style="font-size:15px; width:23%;padding-top:40px !important; text-align:left;font-family: Arial, Helvetica, sans-serif;padding-left:18px;"> XXXXX<b>{{ $requestData['account_number_last_4'] }}</b></td>
                        <td style="font-size:15px; width:17%;padding-top:40px; text-align:right; padding-right:25px;font-family: Arial, Helvetica, sans-serif;"><b><span
                            style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'], 2) }}</b></td>
                    </tr>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
