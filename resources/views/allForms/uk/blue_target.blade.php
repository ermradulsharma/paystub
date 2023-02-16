<!DOCTYPE html>
<html lang="en">

<head>
    <title>uk pin blue</title>
</head>
<style>
    body {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th {
        background-color: #aeaee4;
        color: white;
        font-weight: 100 important !;
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

    .bold {
        font-weight: bold;
    }

    .l-align {
        text-align: left;
        padding-left: 10%;
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

</style>

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

        <section style="border:1px solid #0a2e7b; border-radius:10px; background-color:white;">
            <table style="">
                <tr style="border-bottom: 1px solid #0a2e7b; ">
                    <th style="border-right:1px solid #0a2e7b; border-radius:10px 0px 0px 0px;color: #302aa5;text-transform:uppercase;font-size:10px;"> Empolyee No.</th>
                    <th style="border-right:1px solid #0a2e7b;color: #302aa5;text-transform:uppercase;font-size:10px;"> Empolyee Name </th>
                    <th style="border-right:1px solid #0a2e7b;color: #302aa5;text-transform:uppercase;font-size:10px;"> Process Date</th>
                    <th style="border-radius:0px 10px 0px 0px;color: #302aa5;text-transform:uppercase;font-size:10px;"> National Insurance No.</th>
                </tr>
                <tr style="">
                    <td style="padding-top:10px; padding-bottom:10px; border-right:1px solid #0a2e7b;border-radius:0;" class="bold">007</td>
                    <td style="padding-top:10px; padding-bottom:10px; border-right:1px solid #0a2e7b;border-radius:0px 0px 0px0px;" class="bold">{{ $requestData['emp_name']}}</td>
                    <td style="padding-top:10px; padding-bottom:10px; border-right:1px solid #0a2e7b;border-radius:0;" class="bold">{{ date('d-F-Y', strtotime($requestData['pay_date'])) }}</td>
                    <td style="padding-top:10px; padding-bottom:10px; border-radius:0;" class="bold">PX 56 56 56 C
                    </td>
                </tr>
            </table>
            <div class="row">
                <div class="col1">
                    <table style="border-bottom:none;margin-bottom:0; width:100%;">
                        <tr style="border-bottom: 1px solid #0a2e7b; border-top: 1px solid #0a2e7b;">
                            <th class="l-align" style="color: #302aa5;text-transform:uppercase;font-size:10px;">Payment </th>
                            <th style="color: #302aa5;text-transform:uppercase;font-size:10px;">Units</th>
                            <th style="color: #302aa5;text-transform:uppercase;font-size:10px;">Rate</th>
                            <th style="border-right:1px solid #0a2e7b;color: #302aa5;text-transform:uppercase;font-size:10px;"> Amount</th>
                        </tr>
                        @foreach ($requestData['earning'] as $key => $earn)
                        <tr>
                            <td class="l-align">{{ $earn }}</td>
                            <td class="bold">{{ $requestData['hours'][$key] }}</td>
                            <td class="bold">{{ number_format($requestData['rate'][$key], 2) }}</td>
                            <td style="border-right:1px solid #0a2e7b" class="bold">{{ number_format($requestData['total'][$key], 2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="l-align"><b>Total Payments</b></td>
                            <td class="bold"></td>
                            <td class="bold"></td>
                            <td style="border-right:1px solid #0a2e7b" class="bold">{{ number_format($requestData['taxable_gross_pay'],2) }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col2">
                    <table style="border-bottom:none;margin-bottom:0; width:100%;">
                        <tr style="border-bottom: 1px solid #0a2e7b; border-top: 1px solid #0a2e7b;">
                            <th class="l-align" style="color: #302aa5;text-transform:uppercase;font-size:10px;"> Deductions</th>
                            <th style="border-right:1px solid #0a2e7b;color: #302aa5;text-transform:uppercase;font-size:10px;"> Amount</th>
                        </tr>
                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                        <tr>
                            <td class="l-align">{{ $taxes }}</td>
                            <td style="border-right:1px solid #0a2e7b" class="bold">{{ number_format($requestData['taxes_rate'][$key],2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="l-align"><b>Total Deduction</b></td>
                            <td style="border-right:1px solid #0a2e7b" class="bold">{{ number_format($requestData['deduction_tax'],2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>


            <table style="border-bottom:1px solid #0a2e7b ;">
                <thead style="border:1px solid #0a2e7b ; border-left:none; border-right:none; border-bottom:none;">
                    <th style="background-color: white !important; border-bottom:none !important;"></th>
                    <th style="color: #0a2e7b; font-size:10px;border-top:1px solid #0a2e7b ;border-left:1px solid #0a2e7b;"> THIS PERIOD</th>
                    <th style="color: #0a2e7b; font-size:10px;border-top:1px solid #0a2e7b; border-left:1px solid #0a2e7b; "> YEAR TO DATE</th>
                </thead>
                <tr>
                    <td>
                        <h6 style="padding-left:10px !important;text-align:left;font-size:15px; font-weight:800;padding:0px; margin:0px;">{{ $requestData['emp_name']}}</h6>
                        <p style="padding-left:10px !important;text-align:left;padding: 0px; margin:0px;">{{ $requestData['emp_street_1']}}</p>
                        <p style="padding-left:10px !important;text-align:left;padding:0px; margin:0px;">{{ $requestData['emp_street_2']}}</p>
                        <p style="padding-left:10px !important;text-align:left;padding:0px; margin:0px;">{{ $requestData['emp_zip_code']}}</p>
                    </td>
                    <td style="border: 1px solid #0a2e7b;">
                        <table>
                            <tr>
                                <td class="l-align" style="padding: 0px; margin:0px;">Total Payment</td>
                                <td style="padding: 0px; margin:0px;" class="bold">{{ number_format($requestData['taxable_gross_pay'],2) }}</td>
                            </tr>
                            <tr>
                                <td class="l-align" style="padding: 0px; margin:0px;">Total Deduction</td>
                                <td style="padding: 0px; margin:0px;" class="bold">{{ number_format($requestData['deduction_tax'],2) }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="border: 1px solid #0a2e7b; border-right:none;">
                        <table>
                            <tr>
                                <td class="l-align" style="padding: 0px; margin:0px;">Taxable Gross Pay</td>
                                <td style="padding: 0px; margin:0px;" class="bold">{{ number_format($requestData['taxable_gross_pay'],2) }}</td>
                            </tr>
                            <tr>
                                <td class="l-align" style="padding: 0px; margin:0px;">Income Tax</td>
                                <td style="padding: 0px; margin:0px;" class="bold">{{ number_format($requestData['income_tax'],2) }}</td>
                            </tr>
                            <tr>
                                <td class="l-align" style="padding: 0px; margin:0px;">Employee NIC</td>
                                <td style="padding: 0px; margin:0px;" class="bold">{{ number_format($requestData['employee_nic'],2) }}</td>
                            </tr>
                            <tr>
                                <td class="l-align" style="padding: 0px; margin:0px;">Employer NIC</td>
                                <td style="padding: 0px; margin:0px;" class="bold">{{ number_format($requestData['employer_nic'],2) }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td style="width:80%;">
                        <table>
                            <tr>
                                <td colspan="5" style="width:80%; text-align:left; font-size:14px; padding-left:5px;"><b>{{ $requestData['cname']}}, UK</b></td>
                            </tr>
                            <tr>
                                <td style=" padding-bottom:8px;width:12%;font-size:11px;">Tax code: {{ $requestData['tax_code']}} </td>
                                <td style=" padding-bottom:8px;width:12%;font-size:11px;">NI table: {{ $requestData['ni_table_letter']}} </td>
                                <td style=" padding-bottom:8px;width:12%;font-size:11px;">Dept: Defualt</td>
                                <td style=" padding-bottom:8px;width:20%;font-size:11px;">Tax Period: {{ date('F-Y', strtotime($requestData['pay_date']))}}</td>
                                <td style=" padding-bottom:8px;width:24%;font-size:11px;">Payment Method: {{ $requestData['payment_method']}}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:20%;text-align:right;"><button class="bold" style="text-align:right;border: 1px solid #0a2e7b; background-color:white; border-radius:7px; padding:10px 20px 8px 10px; width:130px; position: relative; "><span style="background-color:#302aa5; font-size:12px; font-weight:800; padding:10.5px 6px; border-radius:5px 0px 0px 5px; position: absolute; top:0px; left:0; color:white;">NET PAY:</span> {{ number_format($requestData['net_pay'],2)}}</button></td>
                </tr>
            </table>
        </section>
    </main>
</body>

</html>
