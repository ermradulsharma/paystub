<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200&display=swap');
        @import url('https://fonts.cdnfonts.com/css/arial-2');
        @import url('https://fonts.cdnfonts.com/css/arial-mt');
        @import url('https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Arimo:ital@1&display=swap');

        @font-face {
            font-family: Arial, Helvetica, sans-serif;
            font-family: 'Arial MT', sans-serif;
            font-family: 'Arial MT Narrow', sans-serif;
            font-family: 'Arial Rounded MT', sans-serif;
            font-family: 'Arial Rounded MT Bold', sans-serif;
            font-family: 'ArialMT', sans-serif;
            font-family: 'Arial MT Black', sans-serif;
            font-family: 'Maven Pro', sans-serif;
            font-family: 'Arimo', sans-serif;
        }

        .invoiceborder {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .section_2 {
            background: #3071bd;
            color: white;
            padding: 15px 15px;
            overflow: hidden;
            margin-top: 10px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            text-align: left;
            padding: 8px;
        }

        .heading1 {
            margin-top: 20px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            text-align: left;
            color: #5b7393;
            padding-top: 8px;
            padding-bottom: 8px;
            font-size: 14px;
            font-weight: 400;
        }

        #color {
            color: #555555;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .data:nth-child(2) {
            background-color: #edededc4;
        }

        .tablesection {
            padding-top: 25px;
        }

        p {
            font-size: 18px;
            font-family: none;
            margin-top: -2px;
        }

        .tfooter {
            margin-bottom: 20px;
        }

        .info {
            margin-top: 20px;
        }

        .earning {
            text-align: right;
            padding-right: 22px;
        }

        .bg-img2 {
            position: relative;
        }

        .container {
            position: absolute;
            top: 0px;
            z-index: 3;
            height: 300px;
        }

        #alignR {
            text-align: right
        }

        .alignR {
            text-align: right
        }

        .sidebar {
            background-image: url("images/long1.png");
            background-repeat: no-repeat;
            background-size: contain;
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 5;
            left:102%;
            top: 50px;

        }
        .bottom{
            background-image: url("images/bottom-white0.png");
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 4%;
            position:fixed;
            z-index: 5;
            left:13px;
            top:101%;

        }

        .check {
            position: absolute;
            content: "";
            top: 78.5%;
            right: 0;
            left: 13px;
            background-image: url('images/check2.png') !important;
            background-size: contain;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
            z-index: -1;
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

        .bottom-content {
            padding-top: 80px;
        }
    </style>
</head>

<body>

    <main class="bg-img2">
        <div class="sidebar"></div>
        <div class="bottom"></div>
        <div class="check"></div>
        @guest
            <div class="watermark"></div>
        @endguest
        @auth
            @if (Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
                <div class="watermark"></div>
            @endif
        @endauth
        <section class="invoiceborder">
            <table>
                <tr>
                    <td style="padding-top:0px; padding-bottom:0; font-size:21px; text-transform:capitalize;font-family: Arial, Helvetica, sans-serif; font-weight:bold ">{{ $requestData['cname'] }} </td>
                </tr>
                <tr>
                    <td class="address" style="font-size:14px; text-transform:uppercase; line-height:1.2; color:#000;  padding-top:0; padding-bottom:0; font-family: 'Source Sans Pro', 'Arial', sans-serif; font-weight:bold">{{ $requestData['address_1'] }} <br> {{ $requestData['city'] }} {{ $requestData['state'] }}. {{ $requestData['zip_code'] }}<br> USA</td>
                    <td style=" font-size:20px; vertical-align: center; font-family: Arial, Helvetica, sans-serif;  font-weight:bold;" class="earning">Earnings Statement</td>
                </tr>
                <tr>
                    <td></td>
                    <td><p class="earning" style="font-size:13px; margin-top:-30px;  font-family: 'Maven Pro', sans-serif;  padding-top:4px; line-height:1.5;">Pay Period: {{ date('M d, Y', strtotime($requestData['pay_start'])) }} to {{ date('M d, Y', strtotime($requestData['pay_end'])) }} <br> Pay Date: {{ date('M d, Y', strtotime($requestData['pay_date'])) }} </p> </td>
                </tr>
            </table>
            <section class="section_2">
                <table>
                    <tr>
                        <td style="width: 40%;"> <p style="font-size:16px;font-weight:400; font-family: Arial, Helvetica, sans-serif; ">SSN: XXX-XX-{{$requestData['emp_ssn'] }}</p> <p style="padding: 0; margin:0;font-weight:400; font-size:16px; font-family: Arial, Helvetica, sans-serif; ">Stub No: {{ $requestData['stub_no'] }}</p></td>
                        <td class="earning" style="width: 60%;font-weight:400 !important;padding-bottom:0px !important; padding-top:0px !important; margin:0px; font-size:16px; font-family: Arial, Helvetica, sans-serif;">{{ $requestData['emp_name'] }} <br>Emp.ID. {{ $requestData['emp_id'] }} <br> {{ $requestData['emp_street_1'] }}, {{ $requestData['emp_city'] }}, {{ $requestData['emp_state'] }} {{ $requestData['emp_zip_code'] }}</td>
                    </tr>
                </table>
            </section>
            <section class="tablesection">
                <table>
                    <tr>
                        <td class="heading1">Earnings</td>
                        <td class="heading1" id="color">Rate</td>
                        <td class="heading1" colspan="2">Hours</td>
                        <td class="heading1" id="alignR">This Period</td>
                        <td class="heading1" id="alignR">YTD</td>
                    </tr>
                    @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td id="color" style="font-size:15px;">{{ $earn }}</td>
                        <td id="color" style="font-size:13px color:#000;">{{ $requestData['currency'] }} {{ number_format($requestData['rate'][$key], 2) }} </td>
                        <td id="color" style="font-size:13px color:#000;" colspan="2">{{ $requestData['hours'][$key] }}</td>
                        <td id="color" style="font-size:13px color:#000;" class="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['period'][$key], 2) }} </td>
                        <td id="color" style="font-size:13px color:#000;" class="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['ytd_total'][$key], 2) }} </td>
                    </tr>
                    @endforeach

                    <tr style="padding-top: -200px;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tfoot class="tfooter" style="background:#3071bd; color:white">
                        <tr>
                            <th colspan="4"></th>
                            <th style="font-weight: 400; font-size:15px" id="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['period_gross_total'], 2) }}</th>
                            <th style="font-weight: 400; font-size:15px" id="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['ytd_gross_total'], 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </section>
            <section class="tablesection">
                <table class="heading">
                    <tr>
                        <td class="heading1">Taxes / Deductions</td>
                        <td class="heading1"> Type</td>
                        <td class="heading1" id="alignR">This Period</td>
                        <td class="heading1" id="alignR">YTD</td>
                    </tr>
                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td></td>
                        <td class="data" id="color" style="font-size:15px; font-family: Arial, Helvetica, sans-serif; color:#000;">{{ $taxes }}</td>
                        <td id="color" class="alignR" style="font-size:15px; font-family: Arial, Helvetica, sans-serif; color:#000;">{{ $requestData['currency'] }} {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                        <td id="color" class="alignR" style="font-size:15px; font-family: Arial, Helvetica, sans-serif; color:#000;">{{ $requestData['currency'] }} {{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>
                    </tr>
                    @endforeach
                    @if (count($requestData['tax_deduction'] ?? []) > 0)
                    <tr>
                        <td></td>
                        <td class="data"> <strong>Employer Taxes </strong> </td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td></td>
                        <td class="data" id="color">{{ $tax_deduction }}</td>
                        <td id="color" class="alignR" style="font-size:15px; font-family: Arial, Helvetica, sans-serif;">{{ $requestData['currency'] }} {{ number_format($requestData['period_tax_deduction'][$key], 2) }}</td>
                        <td id="color" class="alignR" style="font-size:15px; font-family: Arial, Helvetica, sans-serif;">{{ $requestData['currency'] }} {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }} </td>
                    </tr>
                    @endforeach
                    @endif
                    <tfoot class="tfooter " style="background:#3071bd; color:white">
                        <tr>
                            <th colspan="2" style="font-weight: 400 !important;font-size:13px">Net Pay</th>
                            <th style="font-weight: 400 !important;font-size:13px" id="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['total_net_pay'], 2) }} </th>
                            <th style=" font-weight: 400 !important;font-size:13px" id="alignR">{{ $requestData['currency'] }} {{ number_format($requestData['total_ytd_net_pay'], 2) }} </th>
                        </tr>
                    </tfoot>
                </table>
                <p style="margin-top:25px; color:#555555; font-size:14px;font-family: Arial, Helvetica, sans-serif; ">Your taxes and deductions for this period are<span style="color: #555555"> {{ $requestData['currency'] }}{{ number_format($requestData['deduction_tax'], 2) }}</span></p>
            </section>
        </section>
        <section style="position: fixed; bottom:15px; width:95%; left:60px;padding-top:20px;">
            <table>
                <tr>
                    <td>
                        <table style="width:95%; padding-bottom:72px;">
                            <tr>
                                <td style="padding-top:20px;">
                                    <p style="font-size: 14px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:capitalize; font-weight:bold;"> {{ $requestData['cname'] }}</p>
                                    <p style="font-size: 12px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase; font-weight:bold;"> {{ $requestData['address_1'] }}</p>
                                    <P style="font-size: 12px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase; font-weight:bold;"> {{ $requestData['address_2'] }}</P>
                                    <P style="font-size: 12px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase; font-weight:bold;"> {{ $requestData['city'] }} {{ $requestData['state'] }}. {{ $requestData['zip_code'] }}  </P>
                                </td>
                                <td style="padding-top:30px; text-align:right; position: relative; left:22px;">
                                    <p style="font-size: 14px; margin-bottom: 5px; font-family: Arial, Helvetica, sans-serif; font-weight: 400"> <span>00000{{ $requestData['advice_number'] }}</span></p>
                                    <p style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; font-weight: 400">{{ date('m/d/Y', strtotime($requestData['pay_date'])) }} </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:95%;">
                            <tr class="bottom-content">
                                <td style="font-size:14px; text-align:left; width:55%; font-weight:bold;text-transform:uppercase; letter-spacing: -1px;"> {{ $requestData['emp_name'] }}</td>
                                <td style="text-align:center; font-size:14px; padding-left:0px; width:15%;"> XXXXX{{ $requestData['account_number_last_4'] }}</td>
                                <td style="text-align:right; font-size:14px;  width:15%;">  XXXXX{{ $requestData['transit_aba_number'] }}</td>
                                <td style="text-align:right; font-size:14px;  padding-right:10px; width:15%; "> {{ number_format($requestData['total_net_pay'], 2) }} </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        </section>
    </main>
</body>

</html>
