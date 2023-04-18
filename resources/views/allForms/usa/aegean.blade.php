<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aegean</title>
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

        .invoiceborder {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .section_2 {
            background: #587193;
            color: white;
            padding: 15px 15px;
            overflow: hidden;
            margin-top: 10px;
        }

        table {
            font-family: 'arial', sans-serif;
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
            padding-top: 60px;

        }
    </style>
</head>

<body>
    <main class="bg-img2">
        <img src="{{ public_path('images/border/agean/agean.svg') }}"
            style="position: absolute; top: 0px; right:0px;left: 0px; width:106.50%; height:105%;  z-index: -1;">
        <img src="{{ public_path('images/check2.svg') }}"
            style="position: absolute; top:75.8%; width:100.79%; height:25%;  z-index: -1; right:0px; left:0px;">
        @guest
        <div class="watermark"></div>
        @endguest
        @auth
        @if(Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
        <div class="watermark"></div>
        @endif
        @endauth
        <section class="invoiceborder" style="width:100%;">
            <table>
                <tr>
                    <td
                        style="padding-top:0px; padding-bottom:0; font-size:21px; text-transform:capitalize;font-family: Arial, Helvetica, sans-serif; font-weight:bold ">
                        {{ $requestData['cname'] }}</td>
                </tr>
                <tr>
                    <td class="address"
                        style="font-size:14px; text-transform:uppercase; line-height:1.4; color:#000;  padding-top:0; padding-bottom:0;  font-family: 'Arial Rounded MT Bold', sans-serif;">
                        {{ $requestData['address_1'] }}<br>@if($requestData['address_2']!='') {{
                        $requestData['address_2'] }}<br>@endif{{ $requestData['city'] }} {{ $requestData['state'] }}.
                        {{$requestData['zip_code'] }}<br>USA</td>
                    <td style=" font-size:20px;font-family: Arial, Helvetica, sans-serif;  font-weight:bold;color:#010202;"
                        class="earning">Earnings Statement</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p class="earning"
                            style="font-size:13px; @if($requestData['address_2']!='') margin-top:-35px; @else margin-top:-25px; @endif  font-family: 'Maven Pro', sans-serif;  padding-top:10px; line-height:1.5;">
                            Pay Period: {{ date('M d, Y', strtotime($requestData['pay_start'])) }} to {{ date('M d, Y',
                            strtotime($requestData['pay_date'])) }} </p>
                    </td>
                </tr>
            </table>
            <section class="section_2">
                @if($requestData['emp_street_2'] != '')
                <table>
                    <tr>
                        <td style="width: 40%;">
                            <p style="font-size:14px;font-weight:400; font-family: 'Arial', sans-serif;position: relative; bottom:20px;">SSN: XXX-XX-{{ $requestData['emp_ssn'] }}</p>
                            <p style="padding: 0; margin:0;font-weight:400; font-size:14px; font-family: 'Arial', sans-serif;position: relative; top:25px;"> Stub No: {{ $requestData['stub_no'] }}</p>
                        </td>
                        <td class="earning" style="width: 60%;font-weight:400 !important;padding-bottom:0px !important; padding-top:0px !important; margin:0px; font-size:16px; font-family: Arial, Helvetica, sans-serif; color:#f7f0f9;text-transform:capitalize; ">{{ $requestData['emp_name'] }} <br>Emp.ID. {{ $requestData['emp_id'] }} <br> {{ $requestData['emp_street_1'] }}<br>{{$requestData['emp_street_2'] }}<br>{{ $requestData['emp_city'] }}, {{ $requestData['emp_state'] }} {{ $requestData['emp_zip_code'] }}</td>
                    </tr>
                </table>
                @else
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
                        $requestData['emp_street_1'] }}, {{ $requestData['emp_city'] }}, {{
                        $requestData['emp_state'] }} {{ $requestData['emp_zip_code'] }}</td>
                    </tr>
                </table>
                @endif
            </section>
            <section class="tablesection">
                <table style="width: 100%;">
                    <tr>
                        <td class="heading1">Earnings</td>
                        <td class="heading1" id="color" style="padding-left:10px;color:#5b7393;">Rate</td>
                        <td colspan="2" class="heading1">Hours</td>
                        <td class="heading1" id="alignR">This Period</td>
                        <td class="heading1" id="alignR">YTD</td>
                    </tr>
                    @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td id="color" style="font-size:15px;color:#587193;text-transform:capitalize;">{{ $earn }}</td>
                        <td id="color" style="font-size:15px;color:#000 !important;">@if($requestData['rate'][$key] != 0.00)<span style="font-family: 'DejaVu Sans', sans-serif;padding-left:1px;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['rate'][$key], 2) }}@endif</td>
                        <td colspan="2" id="" style="color:#000; font-size:15px; padding-right:20px" class="alignl">@if($requestData['hours'][$key] != 0.00){{ number_format($requestData['hours'][$key],2) }}@endif</td>
                        <td id="color" style="font-size:15px; color:#000;" class="alignR"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['period'][$key], 2) }}</td>
                        <td id="color" class="alignR" style="font-size:15px; color:#000;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{number_format($requestData['ytd_total'][$key], 2) }}</td>
                    </tr>
                    @endforeach

                    <tr style="padding-top: -200px;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tfoot class="tfooter" style="background:#587193; color:white">
                        <tr>
                            <td colspan="4"></td>
                            <td style="font-size:15px;padding:7px 0px;  text-align:right;font-weight:400;" id=""><span
                                    style="font-family: 'DejaVu Sans', sans-serif;text-align:right;">{{
                                    $requestData['currency'] }}</span>{{
                                number_format($requestData['period_gross_total'], 2) }}</td>
                            <td style="" id="alignR" style="font-size:15px; font-weight:400;"><span
                                    style="font-family: 'DejaVu Sans', sans-serif;text-align:right;">{{
                                    $requestData['currency'] }}</span>{{ number_format($requestData['ytd_gross_total'],
                                2) }}</td>
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
                        <td class="data" id="color" style="font-size:15px;  color:#000;">{{ $taxes }} </td>
                        <td id="color" class="alignR" style="font-size:15px;  color:#000;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                        <td id="color" class="alignR" style="font-size:15px;  color:#000;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{ number_format($requestData['taxes_ytd'][$key], 2) }}</td>
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
                        <td style="text-transform: capitalize;font-size:16px; color:#000;" class="data" id="color">{{ $tax_deduction }}</td>
                        <td id="color" class="alignR" style="font-size:16px; color:#000; font-family: Arial, Helvetica, sans-serif;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{number_format($requestData['period_tax_deduction'][$key], 2) }}</td>
                        <td id="color" class="alignR" style="font-size:16px; color:#000; font-family: Arial, Helvetica, sans-serif;"><span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{number_format($requestData['ytd_tax_deduction'][$key], 2) }} </td>
                    </tr>
                    @endforeach
                    @endif
                    <tfoot class="tfooter " style="background:#587193; color:white">
                        <tr>
                            <td colspan="2" style="font-weight:bold;font-size:15px; padding:10px;">Net Pay</td>
                            <td style="font-weight:bold;font-size:15px;" id="alignR"><span
                                    style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency']
                                    }}</span>{{ number_format($requestData['total_net_pay'], 2) }} </td>
                            <td style=" font-weight:bold;font-size:15px;" id="alignR"><span
                                    style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency']
                                    }}</span>{{ number_format($requestData['total_ytd_net_pay'], 2) }} </th>
                        </tr>
                    </tfoot>
                </table>
                <p style="margin-top:25px; color:#587193; font-size:14px;font-family: Arial, Helvetica, sans-serif; ">
                    Your taxes and deductions for this period are <span style="color: #555555"> <span
                            style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency'] }}</span>{{
                        number_format($requestData['deduction_tax'], 2) }}</span></p>
            </section>
        </section>
        <section style="position: fixed; bottom:55px; width:95%; left:40px;">
            <table>
                <tr>
                    <td>
                        <table
                            style="width:100%; @if($requestData['address_2']!='') padding-bottom:47px; @else padding-bottom:55px; @endif">
                            <tr>
                                <td style="">
                                    <p
                                        style="font-size: 14px; margin: 0;color:black;  font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:capitalize;font-weight:bold;">
                                        {{ $requestData['cname'] }}</p>
                                    <p
                                        style="font-size: 12px; margin: 0;color:black;  font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase;">
                                        {{ $requestData['address_1'] }}</p>
                                    @if($requestData['address_2']!='')
                                    <p
                                        style="font-size: 12px; margin: 0;color:black;  font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase;">
                                        {{ $requestData['address_2'] }}</p>
                                    @endif
                                    <P
                                        style="font-size: 12px; margin: 0;color:black;  font-family: 'Arial Rounded MT Bold', sans-serif; text-transform:uppercase;">
                                        {{ $requestData['city'] }} {{ $requestData['state'] }}. {{
                                        $requestData['zip_code'] }}<br>USA</P>
                                </td>
                                <td style="text-align:right;padding-right:20px;">
                                    <p
                                        style="font-size: 14px; margin-bottom: 5px; font-family: Arial, Helvetica, sans-serif; font-weight: 400">
                                        <span>00000{{ $requestData['advice_number'] }}</span></p>
                                    <p style="font-size: 14px; font-family: Arial, Helvetica, sans-serif; font-weight: 400; position: relative;   @if($requestData['address_2'] !='' ) bottom:3px; @else bottom:1px;  @endif">
                                        {{ date('m/d/Y', strtotime($requestData['pay_date'])) }} </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%; position: relative; ">
                            <tr class="bottom-content">
                                <td
                                    style="font-size:14px; text-align:left; width:40%; font-weight:bold;text-transform:uppercase;">
                                    {{ $requestData['emp_name'] }}</td>
                                <td style="text-align:right; font-size:14px;  width:22.7%; "> XXXXX{{
                                    $requestData['account_number_last_4'] }}</td>
                                <td style="text-align:center; font-size:14px;  width:20%; padding-left:2px; "> XXXXX{{
                                    $requestData['transit_aba_number'] }}</td>
                                <td
                                    style="text-align:right; font-size:14px;  width:17.3%;padding-right:20px;font-weight:bold;">
                                    <span style="font-family: 'DejaVu Sans', sans-serif;">{{ $requestData['currency']
                                        }}</span>{{ number_format($requestData['total_net_pay'], 2) }} </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </section>
    </main>

</body>

</html>
