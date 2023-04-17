@php
$petani = DB::table('templates')->pluck('color_code');
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

        .grid-container {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 100px 100px;
            padding-top: 30px;
        }

        .grid-container>div {
            text-align: center;
            font-size: 30px;
        }

        .gridcontainer {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 100px;
            gap: 10px;
            padding: 10px;
        }

        .gridcontainer>div {
            text-align: center;
            padding: 20px 0;
            font-size: 22px;
        }


        .section_2 {
            background: #2dbdab;
            color: white;
            padding: 15px 15px 30px;
            overflow: hidden;
            margin-top: 10px;

        }

        table {

            border-collapse: collapse;
            font-family: 'Arial', sans-serif;
            width: 100%;
        }

        th {
            text-align: left;
            font-family: 'Arial', sans-serif;

        }

        .heading1 {
            margin-top: 20px;
            border-top: 1px solid #5b615d;
            border-bottom: 1px solid #5b615d;
            text-align: left;
            font-size: 14px;
            color: #5b615d;
            padding-top: 8px;
            padding-bottom: 8px;
            font-family: 'Arial', sans-serif;
            font-weight: bold;

        }


        .heading2 {
            margin-top: 20px;
            font-size: 14px;
            color: #555555;
            font-family: 'Arial', sans-serif;



        }


        .tax-align-l {
            text-align: left;
        }

        .tax-align-c {
            text-align: center;
        }

        .tax-align-r {
            text-align: right;
            padding-right: 10px;

        }

        #color {
            color: #555555;
        }

        .data {
            font-size: 14px;
            padding-bottom: 10px;
        }

        .data:nth-child(2) {
            background-color: #edededc4;
        }

        .tablesection {
            padding-top: 25px;
        }

        p {
            font-size: 16px;
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

        }

        .address {
            text-transform: uppercase;
        }
    </style>
    <style>
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
    </style>
</head>

<body>
    <main class="bg-img2">
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
                    <td
                        style="padding-top:0px; padding-bottom:0; font-size:25px; text-transform:capitalize;font-family: Arial, Helvetica, sans-serif; font-weight:bold ">
                        {{ $requestData['cname'] }}
                    </td>
                </tr>
                <tr>
                    <td class="address"
                        style="font-size:18px; text-transform:uppercase; line-height:1.4; color:#000;  padding-top:0; padding-bottom:0;  font-family: 'Arial Rounded MT Bold', sans-serif;">
                        {{ $requestData['address_1'] }}<br>@if($requestData['address_2']!='') {{ $requestData['address_2'] }}<br>@endif  {{ $requestData['city'] }} {{ $requestData['state'] }}. {{
                        $requestData['zip_code'] }}<br> USA</td>
                    <td style=" font-size:20px;font-family: Arial, Helvetica, sans-serif;  font-weight:bold;color:#010202;"
                        class="earning">Earnings Statement</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p class="earning"
                        style="font-size:13px;position:relative; @if($requestData['address_2']!='') bottom:48px; @else bottom:35px; @endif  font-family: 'Maven Pro', sans-serif;  padding-top:10px; line-height:1.5;">
                        Pay Period: {{ date('M d, Y', strtotime($requestData['pay_start'])) }} to {{ date('M d, Y',
                        strtotime($requestData['pay_end'])) }}<br>Pay Date: {{ date('M d, Y',
                        strtotime($requestData['pay_date'])) }} </p>
                    </td>
                </tr>
            </table>
            <section class="section_2" style="position: relative; bottom:30px;">
                <table>
                    <tr>
                        <td style="width: 40%;">
                            <p style="font-size:14px;font-weight:400; font-family: 'Arial', sans-serif;">SSN: XXX-XX-{{
                                $requestData['emp_ssn'] }}</p>
                            <p
                                style="padding: 0; margin:0;font-weight:400; font-size:14px; font-family: 'Arial', sans-serif;">
                                Stub No: {{ $requestData['stub_no'] }}</p>
                        </td>
                        <td class="earning"
                        style="width: 60%;font-weight:400 !important;padding-bottom:0px !important; padding-top:0px !important; margin:0px; font-size:16px; font-family: Arial, Helvetica, sans-serif; color:#f7f0f9;text-transform:capitalize; ">
                        {{ $requestData['emp_name'] }} <br>Emp.ID. {{ $requestData['emp_id'] }} <br> {{
                        $requestData['emp_street_1'] }},@if($requestData['emp_street_2'] != '') {{$requestData['emp_street_2'] }},@endif {{ $requestData['emp_city'] }}, {{
                        $requestData['emp_state'] }} {{ $requestData['emp_zip_code'] }}</td>
                    </tr>
                </table>
            </section>
            <section class="tablesection" style="position: relative; bottom:30px;">
                <table>
                    <tr>
                        <td class="heading1 tax-align-left" style="padding-left: 18px;width:20%;">Earnings</td>
                        <td class="heading1" style="color: #000;width:15%;padding-left:13px;color:black;"> Rate</td>
                        <td class="heading1" style="text-align:right;width:15%;padding-right:30px;">Hours</td>
                        <td class="heading1" style="padding-right:18px; text-align:right;width:30%;">This Period</td>
                        <td class="heading1 tax-align-r" style="width:20%;">YTD</td>
                    </tr>
                    @foreach ($requestData['earning'] as $key => $earn)
                        <tr>
                            <td class="heading2 tax-align-l" style="padding-left: 18px;text-transform:capitalize;">  {{ $earn }}</td>
                            <td class="heading2" style="color: #000; font-family: DejaVu Sans, sans-serif;"><span style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{ $requestData['currency'] }}</span>@if($requestData['rate'][$key] != 0.00) {{ number_format($requestData['rate'][$key], 2) ?? '' }}@endif </td>
                            <td class="heading2" style="color: #000;text-align:center; padding-right:10px;"> {{ number_format($requestData['hours'][$key], 2) }}</td>
                            <td class="heading2" style="padding-right:20px;text-align:right;color: #000; font-family: DejaVu Sans, sans-serif;">  <span style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['period'][$key], 2) }} </td>
                            <td class="heading2 tax-align-r" style="color: #000; font-family: DejaVu Sans, sans-serif;"><span style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['ytd_total'][$key], 2) }} </td>
                        </tr>
                    @endforeach
                    <br>
                    <br>
                    <tfoot class="tfooter" style="background:#2dbdab;">
                        <tr style=" color:white; height:20%;">
                            <th colspan="3"></th>
                            <th class="tax-align-c"
                                style="font-weight: 400; height: 45px; text-align:right; padding-right: 0px;font-size:14px; font-family: 'Arial', sans-serif; font-family: DejaVu Sans, sans-serif;">
                                <span style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{
                                    $requestData['currency'] }}</span>{{
                                number_format($requestData['period_gross_total'], 2) }} </th>
                            <th class="tax-align-r"
                                style="font-weight: 400; height: 47px;font-size:14px; font-family: 'Arial', sans-serif; font-family: DejaVu Sans, sans-serif;">
                                <span style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{
                                    $requestData['currency'] }}</span>{{ number_format($requestData['ytd_gross_total'],
                                2) }} </th>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section class="tablesection" style="position: relative; bottom:30px;">
                <table class="heading">
                    <tr>
                        <td class="heading1" style="padding-left: 18px; font-family: 'Arial', sans-serif;">Taxes /
                            Deductions</td>
                        <td class="heading1"> Type</td>
                        <td class="heading1 tax-align-r" style=" font-family: 'Arial', sans-serif;">This Period</td>
                        <td class="heading1 tax-align-r">YTD</td>
                    </tr>
                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td></td>
                        <td class="data" id="color" style="line-height:1.6">{{ $taxes }}</td>
                        <td class="tax-align-r heading2"
                            style=" font-family: DejaVu Sans, sans-serif;font-family: 'Poppins', sans-serif;"
                            id="color"> <span style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{
                                $requestData['currency'] }}</span>{{ number_format($requestData['taxes_rate'][$key], 2)
                            }} </td>
                        <td class="tax-align-r heading2" id="color"
                            style="line-height:1.6;font-family: 'Poppins', sans-serif;font-family: DejaVu Sans, sans-serif;">
                            <span style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{
                                $requestData['currency'] }}</span>{{ number_format($requestData['taxes_ytd'][$key], 2)
                            }} </td>
                    </tr>
                    @endforeach
                    @if (count($requestData['tax_deduction'] ?? []) > 0)
                    <tr>
                        <td></td>
                        <td class="data" style="line-height:1.6; font-family: 'Arial', sans-serif;">
                            <strong>Employer Taxes </strong>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td></td>
                        <td class="data" id="color" style="line-height:1.6; font-family: 'Arial', sans-serif;">{{
                            $tax_deduction }} </td>
                        <td class="tax-align-r heading2" id="color"
                            style="font-family: DejaVu Sans, sans-serif;font-family: 'Poppins', sans-serif;"><span
                                style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{
                                $requestData['currency'] }}</span>{{
                            number_format($requestData['period_tax_deduction'][$key], 2) }} </td>
                        <td class="tax-align-r heading2" id="color"
                            style="line-height:1.6; font-family: 'Poppins', sans-serif;font-family: DejaVu Sans, sans-serif;">
                            <span style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{
                                $requestData['currency'] }}</span>{{
                            number_format($requestData['ytd_tax_deduction'][$key], 2) }} </td>
                    </tr>
                    @endforeach
                    @endif
                    <tfoot class="tfooter " style="background:#2dbdab; line-height:1.6;">
                        <tr style="color:white;">
                            <th colspan="2"
                                style="height: 47px; padding-left: 18px;font-size:13px; font-family: 'Arial', sans-serif;">
                                Net Pay</th>
                            <th class="tax-align-r"
                                style="height: 47px; font-weight: bold;font-size:13px; font-family: 'Arial', sans-serif; font-family: DejaVu Sans, sans-serif;">
                                <span style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{
                                    $requestData['currency'] }}</span>{{ number_format($requestData['total_net_pay'], 2)
                                }}</th>
                            <th class="tax-align-r"
                                style="height: 47px; font-weight: bold;font-size:13px; font-family: 'Arial', sans-serif; font-family: DejaVu Sans, sans-serif;">
                                <span style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{
                                    $requestData['currency'] }}</span>{{
                                number_format($requestData['total_ytd_net_pay'], 2) }} </th>
                        </tr>
                    </tfoot>
                </table>
                <p style="margin-top:25px; color:#555; font-size:14px;font-family: Arial, Helvetica, sans-serif; ">
                    Your taxes and deductions for this period are<span style="color: #555555"> <span
                            style="font-family: 'DejaVu Sans', sans-serif; padding-right:1px;">{{
                            $requestData['currency'] }}</span>{{
                        number_format($requestData['deduction_tax'], 2) }}</span></p>
            </section>
    </main>
</body>

</html>
