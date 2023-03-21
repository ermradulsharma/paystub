<!DOCTYPE html>
<html lang="en">

<head>
    <title>uk pin blue</title>
</head>
<style>
    body {
        font-size: 13px;
        /* border-radius: 10px 0 0 0; */
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th {
        background-color: #050618;
        color: white;
        font-weight: 100 important !;

    }

    .bold {
        font-weight: bold;
    }

    td {
        text-align: center;
        border-radius: 10px 0 0 0;
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

    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .col1 {
        float: left;
        width: 60%;
    }

    .col2 {
        float: left;
        width: 40%;
    }

    .l-align {
        text-align: left;
        padding-left: 10%;
    }
</style>

<body>
    <main class="bg-img2"
        style="background-color: #b5b5bf; padding:30px 15px; border-top:2px dashed #050618; border-bottom:2px dashed #050618; border-left:3px solid #050618; border-right:3px solid #050618;">
        @guest
            <div class="watermark"></div>
        @endguest
        @auth
            @if (Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
                <div class="watermark"></div>
            @endif
        @endauth

        <section style="border:1px solid #3b4059; border-radius:10px;">
            <table>
                <tr>
                    <th style="border-right:1px solid #3b4059; border-radius:10px 0px 0px 0px;">Empolyee No.</th>
                    <th style="border-right:1px solid #3b4059">Empolyee </th>
                    <th style="border-right:1px solid #3b4059;">Date</th>
                    <th style="border-right:1px solid #3b4059;border-radius:0px 10px 0px 0px;">National Insurance No.
                    </th>
                </tr>
                <tr style="background-color:#b8baca;" class="bold">
                    <td style=" padding-top:8px; padding-bottom:8px;border-right:1px solid #3b4059;border-radius:0;">007
                    </td>
                    <td
                        style=" padding-top:8px; padding-bottom:8px;border-right:1px solid #3b4059;border-radius:0px 0px 0px0px;">
                        {{ $requestData['emp_name'] }}</td>
                    <td style=" padding-top:8px; padding-bottom:8px;border-right:1px solid #3b4059;border-radius:0;">
                        {{ date('d-F-Y', strtotime($requestData['pay_date'])) }}</td>
                    <td style=" padding-top:8px; padding-bottom:8px;border-right:1px solid #3b4059;border-radius:0;">
                        {{ $requestData['ni_number'] }}</td>
                </tr>
            </table>
            <div class="row">
                <div class="col1">
                    <table style="border-bottom:none;margin-bottom:0; width:100%;">
                        <tr style="border-bottom: 1px solid #3b4059; border-top: 1px solid #3b4059;">
                            <th class="l-align" style="color: white;font-size:10px;">Payment
                            </th>
                            <th style="color: white;font-size:10px;">Units</th>
                            <th style="color: white;font-size:10px;">Rate</th>
                            <th style="border-right:1px solid #3b4059;color:white;font-size:10px;"> Amount</th>
                        </tr>
                        @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td class="l-align" style="text-transform: capitalize;">{{ $earn }}</td>
                                <td class="bold" style="text-transform: capitalize;">{{ $requestData['hours'][$key] }}</td>
                                <td class="bold" style="text-transform: capitalize;">{{ number_format($requestData['rate'][$key], 2) }}</td>
                                <td style="border-right:1px solid #3b4059;text-transform: capitalize;" class="bold">
                                    {{ number_format($requestData['total'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="l-align"><b>Total Payments</b></td>
                            <td class="bold"></td>
                            <td class="bold"></td>
                            <td style="border-right:1px solid #3b4059;text-transform: capitalize;" class="bold">
                                {{ number_format($requestData['taxable_gross_pay'], 2) }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col2">
                    <table style="border-bottom:none;margin-bottom:0; width:100%;">
                        <tr style="border-bottom: 1px solid #3b4059; border-top: 1px solid #3b4059;">
                            <th class="l-align" style="color: white;font-size:10px;"> Deductions</th>
                            <th style="border-right:1px solid #3b4059;color: white;font-size:10px;"> Amount</th>
                        </tr>
                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                            <tr>
                                <td class="l-align">{{ $taxes }}</td>
                                <td style="border-right:1px solid #3b4059" class="bold">
                                    {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="l-align"><b>Total Payments</b></td>
                            <td style="border-right:1px solid #3b4059" class="bold">
                                {{ number_format($requestData['deduction_tax'], 2) }}</td>
                        </tr>
                    </table>
                </div>


            </div>
            <table
                style="padding-top: 0px;  width:100%;border-top:1px solid #3b4059 ; border-bottom:1px solid  #3b4059;">
                <tr>
                    <td
                        style="border-right:1px solid #3b4059; font-weight:500; text-align:left; padding-left:20px; border-radius:0;">
                        {{ $requestData['emp_name'] }} </td>
                    <th colspan="2" style="border-right:1px solid #3b4059">Total This Period</th>
                    <th colspan="2">Total Year to Date</th>
                    <th></th>
                </tr>
                <tr>
                    <td style="border-right:1px solid #3b4059;text-align:left; padding-left:20px;">
                        {{ $requestData['emp_street_1'] }}</td>
                    <td></td>
                    <td style="border-right:1px solid #3b4059"></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #3b4059;text-align:left; padding-left:20px;">
                        {{ $requestData['emp_street_2'] }}</td>
                    <td class="l-align">Total Payment</td>
                    <td class="bold" style="border-right:1px solid #3b4059">
                        {{ number_format($requestData['taxable_gross_pay'], 2) }}</td>
                    <td class="l-align">Total Gross Pay</td>
                    <td class="bold">{{ number_format($requestData['taxable_gross_pay'], 2) }}</td>
                </tr>
                <tr>
                    <td style="border-right:1px solid #3b4059;text-align:left; padding-left:20px;">
                        {{ $requestData['emp_zip_code'] }}</td>
                    <td class="l-align">Total Deduction</td>
                    <td class="bold" style="border-right:1px solid #3b4059">
                        {{ number_format($requestData['deduction_tax'], 2) }}</td>
                    <td class="l-align">Income Tax</td>
                    <td class="bold">{{ number_format($requestData['income_tax'], 2) }}</td>
                </tr>

            </table>
            <table>
                <tr>
                    <td style="width:80%;">
                        <table>
                            <tr>
                                <td colspan="5"
                                    style="width:80%; text-align:left; font-size:16px; padding-left:5px;">
                                    <b>{{ $requestData['cname'] }}, UK</b></td>
                            </tr>
                            <tr>
                                <td style=" padding-bottom:8px;font-size:13px;"><b>Tax Code:</b>
                                    {{ $requestData['tax_code'] }} </td>
                                <td style=" padding-bottom:8px;font-size:13px;"><b>NI Table:</b>
                                    {{ $requestData['ni_table_letter'] }} </td>
                                <td style=" padding-bottom:8px;font-size:13px;"><b>Dept:</b> Defualt</td>
                                <td style=" padding-bottom:8px;font-size:13px;"><b>Tax Period:</b>
                                    {{ date('F-Y', strtotime($requestData['pay_date'])) }}</td>
                                <td style=" padding-bottom:8px;font-size:13px;"><b>Payment Method:</b>
                                    {{ $requestData['payment_method'] }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:20%;text-align:right;"><button class="bold"
                            style="text-align:right;border: 1px solid #050618;; background-color:transparent; border-radius:7px; padding:17px 10px 17px 10px; width:130px; position: relative; "><span
                                style="background-color:#050618; font-size:12px; font-weight:800; padding:12px 12px; border-radius:5px 0px 0px 5px; position: absolute; top:0px; left:0; color:white;">NET<br>
                                PAY</span> <span style="font-size:15px;">{{ number_format($requestData['net_pay'], 2) }}</span></button></td>
                </tr>
            </table>

        </section>
    </main>
</body>

</html>
