<!DOCTYPE html>
<html lang="en">

<head>
    <title>paystubs-check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            src: url("{{ asset('fonts/micr-encoding.regular.ttf') }}") format('ttf');
        }

        th {
            text-align: left;
        }

        table {
            font-size: 13px;
        }

        .two-col {
            -webkit-column-count: 2;
            -moz-column-count: 2;
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
            width: 18%;
            margin-right: 10px;
        }

        .col1 {
            float: left;
            width: 45%;
            margin-right: 10px;
        }

        .col2 {
            float: left;
            width: 37%;
            margin-left: 10px;
        }

        .co-table {
            padding: 10px;
        }

        .bottom-content {
            padding-top: 80px;
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

        .templete_elements {
            width: 100%;
        }
    </style>
</head>

<body>

    <main class="bg-img2">
        <img src="{{ public_path('images/border/amethyst/amethyst.svg') }}"
            style="position: absolute; top: 0px; right:0px;left: 0px; width:106%; height:105%;  z-index: -1;">
        <img src="{{ public_path('images/check2.svg') }}"
            style="position: absolute; top:75.4%; width:100.2%; height:25%;  z-index: -1; right:0px; left:0px;">
        @guest
            <div class="watermark"></div>
        @endguest
        @auth
            @if (Auth::user()->expiryDate == '')
                <div class="watermark"></div>
            @endif
        @endauth
        <section class="templete_elements">
            <table class="templete_elements">
                <tr>
                    <td style="width:12%;">&nbsp;</td>
                    <td style="width:52%;">
                        <table style="width: 100%;">
                            <tr>
                                <td style="font-family: Arial, Helvetica, sans-serif;">CO</td>
                                <td style="font-family: Arial, Helvetica, sans-serif;">FILE.</td>
                                <td style="font-family: Arial, Helvetica, sans-serif;">DEPT.</td>
                                <td style="font-family: Arial, Helvetica, sans-serif;">CLOCK VCHR.</td>
                            </tr>
                            <tr>
                                <td style="font-family: Arial, Helvetica, sans-serif;">{{ $requestData['co_number'] }}
                                </td>
                                <td style="font-family: Arial, Helvetica, sans-serif;">{{ $requestData['file_number'] }}
                                </td>
                                <td style="font-family: Arial, Helvetica, sans-serif;">{{ $requestData['dept_number'] }}
                                </td>
                                <td style="font-family: Arial, Helvetica, sans-serif;">NO.
                                    {{ $requestData['clock_vchr_number'] }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:36%">&nbsp;</td>
                </tr>
            </table>
        </section>
        <div class="row2">
            <h3
                style="text-align:right; padding-bottom:25px; text-transform:capitalize; font-size:25px; font-weight:bold;font-family: 'Arial', sans-serif;">
                Earnings Statement</h3>
            <div class="col0">
            </div>
            <div class="col1">
                <table style="width: 100%;">
                    <tr>
                        <td
                            style="font-weight:bold;font-size:14px; text-transform:uppercase;font-family: 'Arial', sans-serif;">
                            {{ $requestData['cname'] }}
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="font-size:14px; text-transform:uppercase;line-height:1.5;font-family: 'Arial', sans-serif;">
                            {{ $requestData['address_1'] }}<br>@if($requestData['address_2']!='') {{ $requestData['address_2'] }}<br>@endif{{ $requestData['city'] }} {{ $requestData['state'] }}.
                            {{ $requestData['zip_code'] }}<br>USA
                        </td>
                    </tr>
                </table>
                <table style="position: relative; @if($requestData['address_2']!='') top:15px; @else top:30px; @endif ">
                    <tr>
                        <td
                            style="font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif;">
                            Social Security Number: ***-**-{{ $requestData['emp_ssn'] }}</td>
                    </tr>
                    <tr>
                        <td
                            style="font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif;">
                            Marital Status:
                            {{ $requestData['marital_status'] }}</td>
                    </tr>
                    <tr>
                        <td
                            style="font-size: 15px; line-height:1.2; text-transform: capitalize;font-family: 'Arial', sans-serif;">
                            Expectations/Allowances:
                            {{ $requestData['exemptions'] }} </td>
                    </tr>
                </table>
            </div>

            <div class="col2">

                <table style="width: 100%;">
                    <tr>
                        <td style="font-size: 15px;font-family: Arial, Helvetica, sans-serif;width:60%;"><b>Period
                                Beginning:</b></td>
                        <td style="text-align: left;font-family: Arial, Helvetica, sans-serif;width:40%;">
                            <b>{{ date('m/d/Y', strtotime($requestData['pay_start'])) }}</b></td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px;font-family: Arial, Helvetica, sans-serif;"><b>Period Ending:</b>
                        </td>
                        <td style="text-align: left;font-family: Arial, Helvetica, sans-serif;">
                            <b>{{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</b></td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px;font-family: Arial, Helvetica, sans-serif;"><b>Pay Date:</b></td>
                        <td style="text-align: left;font-family: Arial, Helvetica, sans-serif;">
                            <b>{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</b></td>

                    </tr>
                </table>
                <table style="position: relative; top:58px;">
                    <tr>
                        <td
                            style="font-weight: bold; font-size:14px;text-transform: uppercase;font-family: Arial, Helvetica, sans-serif;">
                            {{ $requestData['emp_name'] }}</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase;font-family: Arial, Helvetica, sans-serif;font-size:14px;">
                            {{ $requestData['emp_street_1'] }}<br>@if($requestData['emp_street_2']!='') {{ $requestData['emp_street_2'] }}@endif</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase;font-family: Arial, Helvetica, sans-serif;font-size:14px;">
                            {{ $requestData['emp_city'] }}, {{ $requestData['emp_state'] }}.
                            {{ $requestData['emp_zip_code'] }} USA</td>
                    </tr>

                </table>


            </div>
        </div>

        <section class="">
            <div class="row1" style="margin-top: 60px;">
                <div class="column1">
                    <table style="width: 100%;">
                        <img src="{{ public_path('images/lines.svg') }}"
                            style="position: absolute; @if($requestData['address_2']!='') top: 30%; @else top: 29%; @endif  right:0px;left: 13%;  z-index: -1; width:51%; height:44%;">
                        <tr>
                            <th
                                style="width:20%;font-size:14px;font-family: Arial, Helvetica, sans-serif; font-weight:bold;">
                                Earnings</th>
                            <th
                                style="width:18%;text-align:left; padding-left:14px;font-size:14px;font-family: Arial, Helvetica, sans-serif; font-weight:bold;">
                                Rate</th>
                            <th
                                style=" width:22%;text-align:ecnter;font-size:14px;font-family: Arial, Helvetica, sans-serif; font-weight:bold;">
                                Hours</th>
                            <th
                                style=" width:20%;text-align:right;font-size:14px;font-family: Arial, Helvetica, sans-serif; font-weight:bold;">
                                This Period</th>
                            <th
                                style="width:20%; text-align:center;font-size:14px;font-family: Arial, Helvetica, sans-serif; font-weight:bold;">
                                Year-to-date</th>

                        </tr>
                        @foreach ($requestData['earning'] as $key => $earn)
                            <tr>
                                <td style="width:20%;font-size:14px;font-family: Arial, Helvetica, sans-serif;">
                                    {{ $earn }}</td>
                                <td
                                    style="width:18%;font-size:14px;font-family: Arial, Helvetica, sans-serif; text-align:left; padding-left:15px;">
                                    {{ number_format($requestData['rate'][$key], 2) }}</td>
                                <td
                                    style="width:22%;font-size:14px;font-family: Arial, Helvetica, sans-serif;text-align:left; padding-left:22px;">
                                    {{ $requestData['hours'][$key] }}</td>
                                <td
                                    style="text-align: center; width:20%;font-size:14px;font-family: Arial, Helvetica, sans-serif;">
                                    {{ number_format($requestData['period'][$key], 2) }}</td>
                                <td
                                    style="width:20%; text-align:right; padding-right:15px;font-size:14px;font-family: Arial, Helvetica, sans-serif;">
                                    {{ number_format($requestData['ytd_total'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        <br>
                        <tr>
                            <th style="width:20%;"></th>
                            <th style="width:20%;"></th>
                            <th style="width:20%;text-align:left;font-family: Arial, Helvetica, sans-serif;">GROSS PAY
                            </th>
                            <th
                                style="width:17%; text-align:center;font-family: Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;">
                                <b>
                                    {{ number_format($requestData['deduction_tax'], 2) }}</b></th>
                            <th
                                style=" width:23%; text-align:right; padding-right:17px;font-family: Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;">
                                <b>
                                    {{ number_format($requestData['ytd_deduction_tax'], 2) }}</b></th>
                        </tr>

                    </table>
                </div>

                <div class="column2">
                    <table style="width: 100%;">
                        <img src="{{ public_path('images/lines.svg') }}"
                            style="position: absolute; @if($requestData['address_2']!='') top: 30%; @else top: 29%; @endif right:0px;left: 0;  z-index: -1; width:35%; height:44%;">
                        <tr style="border-bottom: 2px solid black; ">
                            <th style="font-family: Arial, Helvetica, sans-serif;">Important Notes</th>
                        </tr>
                        <tr>
                            <td style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">Company Telephone
                                Number: @if($requestData['tel'] != ''){{ $requestData['tel'] ?? '' }}@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row1 background" style="margin-top: 60px;">
                <div class="column1">
                    <table style="width:100%; ">
                        <thead>
                            <th
                                style="width:20%;font-family: Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;">
                                Deductions</th>
                            <th style="text-align: left; padding-left:10px;font-family: Arial, Helvetica, sans-serif;font-weight:bold; font-size:14px; "
                                colspan="4">Statuory</th>
                        </thead>

                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                            <tr>
                                <td style="width:20%;"></td>
                                <td style="text-align: left; padding-left:10px; text-transform:capitalize;font-family: Arial, Helvetica, sans-serif;"
                                    colspan="2"> {{ $taxes }}</td>
                                <td
                                    style="width:15%;text-align:right;font-family: Arial, Helvetica, sans-serif; font-size:15px;">
                                    {{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                                <td
                                    style="text-align:right; padding-right:15px;width:20%;font-family: Arial, Helvetica, sans-serif;font-size:15px; ">
                                    {{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>

                            </tr>
                        @endforeach

                        @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                            <tr>
                                <td style="width:20%;"></td>
                                <td style="text-align: left; padding-left:10px; text-transform:capitalize;font-family: Arial, Helvetica, sans-serif;"
                                    colspan="2"> {{ $tax_deduction }}</td>
                                <td
                                    style="text-align:right;width:20%; font-family: Arial, Helvetica, sans-serif;font-size:15px;">
                                    {{ number_format($requestData['period_tax_deduction'][$key], 2) }}</td>
                                <td
                                    style="text-align:right; padding-right:15px;width:20%; font-family: Arial, Helvetica, sans-serif;font-size:15px;">
                                    {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}</td>
                            </tr>
                        @endforeach
                        <br><br>
                        <tr>
                            <td style="width:20%;"></td>
                            <td style="text-align: left; padding-left:10px; text-transform:capitalize;font-family: Arial, Helvetica, sans-serif;font-weight:bold;"
                                colspan="2">Total Deduction</td>
                            <td
                                style="text-align:right;width:20%;font-family: Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; ">
                                <b>{{ number_format($requestData['period_gross_total'], 2) }}</b></td>
                            <td
                                style="text-align:right; padding-right:15px;width:20%;font-family: Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; ">
                                <b>{{ number_format($requestData['ytd_gross_total'], 2) }}</b></td>
                        </tr>
                        <br>
                        <tr>
                            <td style="width:20%;"></td>
                            <th style="text-align: left; padding-left:10px; text-transform:capitalize;font-family: Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;"
                                colspan="2">
                                NET PAY</th>
                            <td
                                style="text-align:right;width:20%;font-family: Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; ">
                                <b>
                                    {{ number_format($requestData['total_net_pay'], 2) }}</b></td>
                            <td
                                style="text-align:right; padding-right:15px;width:20%;font-family: Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; ">
                                <b>
                                    {{ number_format($requestData['total_ytd_net_pay'], 2) }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <section style="position: fixed; bottom:55px; width:95%; left:40px; ">
            <table style="width:100%; ">
                <tr>
                    <td>
                        <table style="width:100%; @if($requestData['address_2']!='') padding-bottom:50px; @else padding-bottom:58px; @endif">
                            <tr>
                                <td style="">
                                    <p
                                        style="font-size: 14px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase; font-weight:bold;">
                                        {{ $requestData['cname'] }}</p>
                                    <p
                                        style="font-size: 12px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase; font-weight:400;">
                                        {{ $requestData['address_1'] }}</p>
                                        @if($requestData['address_2']!='')
                                        <p
                                        style="font-size: 12px; margin: 0;color:black;  font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase;">
                                        {{ $requestData['address_2'] }}</p>
                                        @endif
                                    <P
                                        style="font-size: 12px; margin: 0;color:black; font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase; font-weight:400;">
                                        {{ $requestData['city'] }} {{ $requestData['state'] }}.
                                        {{ $requestData['zip_code'] }}<br>USA</P>
                                </td>
                                <td style="text-align:right; padding-right:18px;">
                                    <p
                                        style="font-size: 14px; margin-bottom: 5px; font-family: Arial, Helvetica, sans-serif; font-weight: 400">
                                        <span>00000{{ $requestData['advice_number'] }}</span></p>
                                    <p
                                        style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; font-weight: 400; position:relative; bottom:5px;">
                                        {{ date('m/d/Y', strtotime($requestData['pay_date'])) }} </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%; position: relative; bottom:5px;">
                            <tr class="bottom-content">
                                <td
                                    style="font-size:14px; text-align:left; width:40%; font-weight:bold;text-transform:uppercase; font-family: 'Arial Rounded MT Bold', sans-serif;">
                                    {{ $requestData['emp_name'] }}</td>
                                <td
                                    style="text-align:right; font-size:14px;  width:22.8%;font-family: Arial, Helvetica, sans-serif;padding-right:6px; ">
                                    XXXXX{{ $requestData['account_number_last_4'] }}</td>
                                <td
                                    style="text-align:center; font-size:14px;  width:20%; padding-left:5px; font-family: Arial, Helvetica, sans-serif;padding-right:7px;">
                                    XXXXX{{ $requestData['transit_aba_number'] }}</td>
                                <td
                                    style="text-align:right; font-size:14px;  width:17.2%;padding-right:25px;font-weight:bold;font-family: Arial, Helvetica, sans-serif;">
                                    <span
                                        style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'], 2) }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        </section>
    </main>
</body>

</html>
