<!DOCTYPE html>
<html lang="en">

<head>
    <title>uk pin blue</title>
</head>
<style>
     @import url('https://fonts.cdnfonts.com/css/myriad-pro');
 @font-face{
    font-family: 'Myriad Pro', sans-serif;
 }
    body {
        font-size: 13px;
        font-family: 'Myriad Pro', sans-serif;
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
    <main class="bg-img2" style="background-color: #aeaee4; padding:30px 15px 15px;">
        @guest
            <div class="watermark"></div>
        @endguest
        @auth
            @if (Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
                <div class="watermark"></div>
            @endif
        @endauth

        <section style="border:1px solid #0a2e7b; border-radius:10px; background-color:white; ">
            <table style="">
                <tr style="border-bottom: 1px solid #0a2e7b; ">
                    <th
                        style="border-right:1px solid #0a2e7b; border-radius:10px 0px 0px 0px;color: #302aa5;text-transform:uppercase;font-size:10px;">
                        Empolyee No.</th>
                    <th style="border-right:1px solid #0a2e7b;color: #302aa5;text-transform:uppercase;font-size:10px;">
                        Empolyee Name </th>
                    <th style="border-right:1px solid #0a2e7b;color: #302aa5;text-transform:uppercase;font-size:10px;">
                        Process Date</th>
                    <th style="border-radius:0px 10px 0px 0px;color: #302aa5;text-transform:uppercase;font-size:10px;">
                        National Insurance No.</th>
                </tr>
                <tr style="">
                    <td style="padding-top:10px; padding-bottom:10px; border-right:1px solid #0a2e7b;border-radius:0;font-size:15px;text-transform:uppercase;"
                        class="bold">007</td>
                    <td style="padding-top:10px; padding-bottom:10px; border-right:1px solid #0a2e7b;border-radius:0px 0px 0px0px;font-size:15px;text-transform:capitalize;"
                        class="bold">{{ $requestData['emp_name'] }}</td>
                    <td style="padding-top:10px; padding-bottom:10px; border-right:1px solid #0a2e7b;border-radius:0;font-size:15px;"
                        class="bold">{{ date('d-F-Y', strtotime($requestData['pay_date'])) }}</td>
                    <td style="padding-top:10px; padding-bottom:10px; border-radius:0;font-size:15px;text-transform:uppercase;"
                        class="bold">{{ $requestData['ni_number'] }}</td>
                </tr>
            </table>
            <div class="row">
                <div class="col1" style="padding:0px;">
                    <table style="border-bottom:none;margin-bottom:0; width:100%;">
                        <tr style="border-bottom: 1px solid #0a2e7b; border-top: 1px solid #0a2e7b;">
                            <th class="l-align" style="color: #302aa5;text-transform:uppercase;font-size:10px;">Payment
                            </th>
                            <th style="color: #302aa5;text-transform:uppercase;font-size:10px;">Units</th>
                            <th style="color: #302aa5;text-transform:uppercase;font-size:10px;">Rate</th>
                            <th style="color: #302aa5;text-transform:uppercase;font-size:10px;"> Amount</th>
                        </tr>
                        @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td class="l-align" style="font-weight:bold;font-size:16px;text-transform:capitalize;">
                                    {{ $earn }}</td>
                                <td class="bold"style="font-size:15px;">{{ $requestData['hours'][$key] }}</td>
                                <td class="bold" style="font-size:15px;">
                                    @if($requestData['rate'][$key] != 0.00) {{ number_format($requestData['rate'][$key], 2) ?? '' }}@endif</td>
                                <td style="" style="font-size:15px;" class="bold">
                                    {{ number_format($requestData['total'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="l-align" style="font-weight:bold;font-size:16px;text-transform:capitalize;"><b>Total Payments</b></td>
                            <td class="bold"></td>
                            <td class="bold"></td>
                            <td class="bold" style="font-size:15px;">{{ number_format($requestData['taxable_gross_pay'], 2) }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col2" style="border-left:1px solid #0a2e7b">
                    <table style="border-bottom:none;margin-bottom:0; width:100%;">
                        <tr style="border-bottom: 1px solid #0a2e7b; border-top: 1px solid #0a2e7b;">
                            <th class="l-align" style="color: #302aa5;text-transform:uppercase;font-size:10px;">
                                Deductions</th>
                            <th
                                style="border-right:1px solid #0a2e7b;color: #302aa5;text-transform:uppercase;font-size:10px;">
                                Amount</th>
                        </tr>
                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                            <tr>
                                <td class="l-align"style="font-size:15px;">{{ $taxes }}</td>
                                <td style="border-right:1px solid #0a2e7b;font-size:15px" class="bold">
                                    {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="l-align"style="font-size:15px;"><b>Total Deductions</b></td>
                            <td style="border-right:1px solid #0a2e7b;font-size:15px" class="bold">
                                {{ number_format($requestData['deduction_tax'], 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <table style="border-bottom:1px solid #0a2e7b ;">
                <thead style="border:1px solid #0a2e7b ; border-left:none; border-right:none; border-bottom:none;">
                    <th style="background-color:#fff; border-bottom:none !important;"></th>
                    <th
                        style="color: #0a2e7b; font-size:10px;border-top:1px solid #0a2e7b ;border-left:1px solid #0a2e7b;">
                        THIS PERIOD</th>
                    <th
                        style="color: #0a2e7b; font-size:10px;border-top:1px solid #0a2e7b; border-left:1px solid #0a2e7b; ">
                        YEAR TO DATE</th>
                </thead>
                <tr>
                    <td style="border-right:1px solid #3b4059;border-top-left-radius:0px; ">
                        <table style="position: relative; bottom:30px;">
                            <tr>
                                <td> <h6
                                    style="padding-left:10px !important;text-align:left;font-size:15px; font-weight:bold;padding:0px; margin:0px;text-transform:capitalize;font-size:15px;">
                                    {{ $requestData['emp_name'] }}</h6>
                                <p
                                    style="padding-left:10px !important;text-align:left;padding: 0px; margin:0px;text-transform:capitalize;font-size:15px;">
                                    {{ $requestData['emp_street_1'] }}</p>
                                <p
                                    style="padding-left:10px !important;text-align:left;padding:0px; margin:0px;text-transform:capitalize;font-size:15px;">
                                    {{ $requestData['emp_street_2'] }}</p>
                                <p
                                    style="padding-left:10px !important;text-align:left;padding:0px; margin:0px;text-transform:capitalize;font-size:15px;">
                                    {{ $requestData['emp_zip_code'] }}</p></td>
                            </tr>
                        </table>

                    </td>

                        <table style="padding-top:10px;">
                            <tr>
                                <td class="l-align"
                                    style="padding-left: 10px; margin:0px;text-transform:capitalize;font-size:15px;">
                                    Total Payments</td>
                                <td style="padding: 0px; margin:0px;text-transform:capitalize;font-size:15px;"
                                    class="bold">{{ number_format($requestData['taxable_gross_pay'], 2) }}</td>
                            </tr>
                            <tr>
                                <td class="l-align"
                                    style="padding-left: 10px;margin:0px;text-transform:capitalize;font-size:15px;">
                                    Total Deductions</td>
                                <td style="padding: 0px; margin:0px;text-transform:capitalize;font-size:15px;"
                                    class="bold">{{ number_format($requestData['deduction_tax'], 2) }}</td>
                            </tr>
                        </table>

                    <td style="border: 1px solid #0a2e7b; border-right:none;">
                        <table style="padding-top:10px;padding-bottom:20px;">
                            <tr>
                                <td class="l-align"
                                    style="padding-left: 10px; margin:0px;text-transform:capitalize;font-size:15px;">
                                    Taxable Gross Pay</td>
                                <td style="padding: 0px; margin:0px;text-transform:capitalize;font-size:15px;"
                                    class="bold">{{ number_format($requestData['taxable_gross_pay'], 2) }}</td>
                            </tr>
                            <tr>
                                <td class="l-align"
                                    style="padding-left: 10px; margin:0px;text-transform:capitalize;font-size:15px;">
                                    Income Tax</td>
                                <td style="padding: 0px; margin:0px;text-transform:capitalize;font-size:15px;"
                                    class="bold">{{ number_format($requestData['income_tax'], 2) }}</td>
                            </tr>
                            <tr>
                                <td class="l-align"
                                    style="padding-left: 10px;margin:0px;text-transform:capitalize;font-size:15px;">
                                    Employee NIC</td>
                                <td style="padding: 0px; margin:0px;text-transform:capitalize;font-size:15px;"
                                    class="bold">{{ number_format($requestData['employee_nic'], 2) }}</td>
                            </tr>
                            <tr>
                                <td class="l-align"
                                    style="padding-left: 10px; margin:0px;text-transform:capitalize;font-size:15px;">
                                    Employer NIC</td>
                                <td style="padding: 0px; margin:0px;text-transform:capitalize;font-size:15px;"
                                    class="bold">{{ number_format($requestData['employer_nic'], 2) }}</td>
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
                                <td colspan="5"
                                    style="width:80%; text-align:left; font-size:16px; padding-left:5px;text-transform:capitalize;">
                                    <b>{{ $requestData['cname'] }}, {{ $requestData['company_address'] ?? '' }}</b></td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:8px;font-size:11px;padding-left:5px;text-align:left;"><b>Tax Code: <br></b><span style="text-transform:capitalize;"></span>{{ $requestData['tax_code'] }}</td>

                                <td style=" padding-bottom:8px;font-size:11px;padding-left:5px;text-align:left;text"><b>NI Table: <br></b>
                                    <span style="text-transform:uppercase;">{{ $requestData['ni_table_letter'] }} </span></td>
                                <td style=" padding-bottom:8px;font-size:11px;padding-left:5px;text-align:left;"><b>Dept: <br></b> Defualt</td>
                                <td style=" padding-bottom:8px;font-size:11px;padding-left:5px;text-align:left;"><b>Tax Period:<br></b>
                                    <Span style="text-transform:capitalize;"></Span>{{ date('F-Y', strtotime($requestData['pay_date'])) }}</td>
                                <td style=" padding-bottom:8px;font-size:11px;padding-left:5px;text-align:left;"><b>Payment Method:<br></b>
                                    <span style="text-transform:uppercase;">{{ $requestData['payment_method'] }}</span></td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:30%;text-align:right; ;border-radius:8px 0px 0px 8px;"><button class="bold"
                            style="text-align:right;border:3px solid  #302aa5; background-color:white; border-radius:7px; padding:20px 50px 20px 50px; width:130px; position: relative; "><span
                                style="background-color:#302aa5; font-size:15px; font-weight:400; padding:23px 12px 20px 12px; border-radius:8px 0px 0px 8px; position: absolute; top:-1.5px; left:-1.5; color:white;font-family: 'Myriad Pro', sans-serif;">NET
                                PAY</span> <span style="font-size:15px;font-family: 'Myriad Pro', sans-serif;position: relative; left:38px;">{{ number_format($requestData['net_pay'], 2) }}</span></button></td>
                </tr>
            </table>
        </section>
    </main>
</body>

</html>
