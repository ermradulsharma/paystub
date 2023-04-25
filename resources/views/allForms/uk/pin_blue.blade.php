<!DOCTYPE html>
<html lang="en">

<head>
    <title>uk pin blue</title>
</head>
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

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th {
        background-color: #050618;
        color: #c2c6d4;
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

    .watermark2 {
            position: absolute;
            width: 100%;
            height: 700px;
            top: 250px;
            left: 0px;
            right: 0;
            background-image: url("images/final-water.png");
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
            <div class="watermark2"></div>
        @endguest
        @auth
            @php
                $date = \Carbon\Carbon::now();
            @endphp
            @if (Auth::user()->device_type == 'website')
                @if(Auth::user()->uk_expiry_date <= $date || !isset($requestData['watermark']))
                    <div class="watermark"></div>
                    <div class="watermark2"></div>
                @endif
            @endif
            @if (Auth::user()->device_type == 'iOS')
                @if(Auth::user()->expiryDate <= $date || !isset($requestData['watermark']))
                    <div class="watermark"></div>
                    <div class="watermark2"></div>
                @endif
            @endif
            @if (Auth::user()->device_type == 'android')
                @if(Auth::user()->expiryDate <= $date || !isset($requestData['watermark']))
                    <div class="watermark"></div>
                    <div class="watermark2"></div>
                @endif
            @endif
        @endauth

        <section style="border:1px solid #3b4059; border-radius:10px;">
            <table>
                <tr>
                    <th style="border-right:1px solid #3b4059; border-radius:10px 0px 0px 0px; font-size:12px;">Empolyee No.</th>
                    <th style="border-right:1px solid #3b4059;font-size:12px;">Empolyee </th>
                    <th style="border-right:1px solid #3b4059;font-size:12px;">Date</th>
                    <th style="border-right:1px solid #3b4059;border-radius:0px 10px 0px 0px;font-size:12px;">National Insurance No.
                    </th>
                </tr>
                <tr style="background-color:#b8baca;" class="bold">
                    <td style=" padding-top:8px; padding-bottom:8px;border-right:1px solid #3b4059;border-radius:0;">007
                    </td>
                    <td
                        style=" padding-top:8px; padding-bottom:8px;border-right:1px solid #3b4059;border-radius:0px 0px 0px0px;text-transform:capitalize;">
                        {{ $requestData['emp_name'] }}</td>
                    <td style=" padding-top:8px; padding-bottom:8px;border-right:1px solid #3b4059;border-radius:0;">
                        {{ date('d-F-Y', strtotime($requestData['pay_date'])) }}</td>
                    <td style=" padding-top:8px; padding-bottom:8px;border-right:1px solid #3b4059;border-radius:0; text-transform:uppercase;">
                        {{ $requestData['ni_number'] }}</td>
                </tr>
            </table>
            <div class="row">
                <div class="col1">
                    <table style="border-bottom:none;margin-bottom:0; width:100%;">
                        <tr style="border-bottom: 1px solid #3b4059; border-top: 1px solid #3b4059;">
                            <th class="l-align" style="color: #c2c6d4;font-size:11px;">Payment
                            </th>
                            <th style="color: #c2c6d4;font-size:11px;">Units</th>
                            <th style="color: #c2c6d4;font-size:11px;">Rate</th>
                            <th style="border-right:1px solid #3b4059;color:#c2c6d4;font-size:11px;"> Amount</th>
                        </tr>
                        @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td class="l-align" style="text-transform: capitalize;">{{ $earn }}</td>
                                <td class="bold" style="text-transform: capitalize;">{{ $requestData['hours'][$key] }}</td>
                                <td class="bold" style="text-transform: capitalize;">@if($requestData['rate'][$key] != 0.00) {{ number_format($requestData['rate'][$key], 2) ?? '' }}@endif</td>
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
                            <th class="l-align" style="color: #c2c6d4;font-size:11px;"> Deductions</th>
                            <th style="border-right:1px solid #3b4059;color: #c2c6d4;font-size:11px;"> Amount</th>
                        </tr>
                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                            <tr>
                                <td class="l-align">{{ $taxes }}</td>
                                <td style="border-right:1px solid #3b4059" class="bold">
                                    {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="l-align"><b>Total Deductions</b></td>
                            <td style="border-right:1px solid #3b4059" class="bold">
                                {{ number_format($requestData['deduction_tax'], 2) }}</td>
                        </tr>
                    </table>
                </div>


            </div>
            <table style="border-bottom:1px solid #3b4059 ;">
                <thead style="border:1px solid #3b4059 ; border-left:none; border-right:none; border-bottom:none;">
                    <th style="background-color: #9494a5; border-bottom:none !important;"></th>
                    <th
                        style="color: #c2c6d4; font-size:10px;border-top:1px solid #3b4059 ;border-left:1px solid #3b4059;text-transform:capitalize;">
                       Total This period</th>
                    <th
                        style="color: #c2c6d4; font-size:10px;border-top:1px solid #3b4059; border-left:1px solid #3b4059;text-transform:capitalize;">
                        Total year to date</th>
                </thead>
                <tr>
                    <td style="border-right:1px solid #3b4059;background-color: #9494a5; border-top-left-radius:0px; ">
                        <table style="position: relative; bottom:18px;">
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

                        <table>
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

                    <td style="border: 1px solid #3b4059; border-right:none;">
                        <table>
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
                        style="text-align:right;border:1px solid  #050618; background-color:transparent; border-radius:7px; padding:20px 50px 20px 50px; width:130px; position: relative; "><span
                            style="background-color:#050618; font-size:15px; font-weight:400; padding:23px 12px 20px 12px; border-radius:8px 0px 0px 8px; position: absolute; top:-1.5px; left:-1.5; color:white;font-family: 'Myriad Pro', sans-serif;">NET
                            PAY</span> <span style="font-size:15px;font-family: 'Myriad Pro', sans-serif;position: relative; left:38px;">{{ number_format($requestData['net_pay'], 2) }}</span></button></td>
                </tr>
            </table>

        </section>
    </main>
</body>

</html>
