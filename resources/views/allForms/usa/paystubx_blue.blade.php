<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Paystub_blue</title>


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

        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial, Helvetica', sans-serif;
        }

        table,
        thead,
        th #colsborder {
            border-collapse: collapse;
        }

        th {
            font-size: 15px;
            color: white;
        }

        td {
            font-size: 12px;
            padding: 2px;
        }

        #cols {
            border-collapse: collapse;
            text-align: center;
        }

        .head1 {
            font-size: 13px;
            padding-top: 10px;
            color: #464646;
            font-weight: 500;
            border-right: 2px solid #464646;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            padding-bottom: 0px;

        }

        .head2 {
            border-right: 2px solid #464646;
            padding: 5px 0 2.2em 0px;
            font-size: 14px;

        }

        .padding {
            font-size: 11px;
            padding: 10px 0px 10px 0px;
        }

        #colourborder {
            background-color: #264fab;

        }

        #fica {
            text-transform: uppercase;
        }

        .column1 {
            float: left;
            width: 50%;

        }

        .column2 {
            float: left;
            width: 50%;
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

        #borderleft {
            border-left: 2px solid #464646;
        }

        .ytd_total {
            border: 3px solid #464646;
        }
    </style>
    <style>
        .watermark {
            position: absolute;
            width: 100%;
            height: 700px;
            top: -100px;
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
        @if(Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
        <div class="watermark"></div>
        @endif
        @endauth
        <div style="max-width: 100%; margin: auto; padding: 10px 10px;">
            <table
                style="width:100%; border-left:2px solid#464646; border-right:2px solid#464646;background-color:darkgray;color:white;">
                <tr>
                    <td style="font-size: 18px;text-align: left;padding:10px 0px 10px 25px;text-transform:capitalize;"><span style="font-size: 18px;text-transform:capitalize;">{{ $requestData['cname'] }}</span><br>{{
                        $requestData['address_1']
                        }},<br>@if($requestData['address_2']!='') {{ $requestData['address_2'] }}<br>@endif {{ $requestData['city'] }}, {{ $requestData['state'] }} {{ $requestData['zip_code'] }}</td>
                    <td
                        style="font-size: 21px;text-align:right;padding:10px 12px 8px 10px;text-transform:uppercase;  font-family: 'Arial', sans-serif;font-weight:bold;">
                        Earnings Statement</td>
                </tr>
            </table>
            <table style="width:100%; border-left:2px solid#464646; border-right:2px solid#464646;">
                <thead style="border-top:none; border-left:2px solid#464646;height:35px;">
                    <td class="padding" colspan="2"
                        style="text-align: left; padding-left:20px; color:black;font-size:15px;text-transform:capitalize;">
                        <b>{{
                            $requestData['emp_name'] }} </b></td>
                    <td class="padding" colspan="6"
                        style="text-align: left; border-right:2px solid #464646;font-size:18px; color:#464646;font-family: 'Roboto', sans-serif;text-transform:capitalize;">
                        {{ $requestData['emp_street_1'] }},@if($requestData['emp_street_2']!='') {{ $requestData['emp_street_2'] }},@endif {{ $requestData['emp_city'] }}, {{ $requestData['emp_state']
                        }} {{ $requestData['emp_zip_code'] }} </td>
                </thead>
                <thead id="colourborder">
                    <th class="padding" style="text-align:center;  text-align: left; padding-left:20px; font-size:12px;"
                        colspan="2"> EMPLOYEE ID </th>
                    <th class="padding" style="text-align:center;font-size:12px; " colspan="3"> PERIOD ENDING </th>
                    <th class="padding" style="text-align:center;font-size:12px; "> PAY DATE </th>
                    <th class="padding" style="text-align:center; font-size:12px;" colspan="2">CHECK NUMBER</th>
                </thead>
                <tr>
                    <td class="padding" id="colsborder" colspan="2"
                        style="border:2px solid  #464646; text-align: left; padding-left:20px; border-top:none; border-bottom:none; font-size:14px;">
                        {{ $requestData['emp_id'] }} </td>
                    <td class="padding"
                        style="border:2px solid  #464646; text-align:center; border-top:none; border-bottom:none;font-size:14px;"
                        colspan="3"> {{ date('m/d/Y', strtotime($requestData['pay_start'])) }} - {{ date('m/d/Y',
                        strtotime($requestData['pay_end'])) }} </td>
                    <td class="padding"
                        style="border:2px solid  #464646; text-align:center;border-top:none; border-bottom:none;font-size:14px;">
                        {{ date('m/d/Y', strtotime($requestData['pay_date'])) }} </td>
                    <td class="padding" colspan="2"
                        style="border:2px solid  #464646; text-align:center;border-top:none; border-bottom:none;font-size:14px;">
                        {{ $requestData['check_no'] ?? '' }} </td>
                </tr>
            </table>
            <section>
                <div class="row" style=" background-color: #dce6f1; border-left:2px solid#464646;">
                    <div class="column1">
                        <table class="colortable" style="width:100%;">
                            <thead id="colourborder" style="border-right:2px solid #264fab;font-size:13px;">
                                <th class="padding"
                                    style="text-align: left; padding-left:20px;font-size:12px; width:20%;">INCOME</th>
                                <th class="padding" style="text-align:left;font-size:12px;width:20%;">RATE</th>
                                <th class="padding" style="text-align:left;font-size:12px;width:20%;padding-left:8px;">
                                    HOURS</th>
                                <th class="padding" style="text-align:center;font-size:12px;width:40%;">CURRENT TOTAL
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($requestData['earning'] as $key => $earn)
                                <tr>
                                    <td id="fica" style="padding:left 20px;font-size:13px;width:20%;"> {{ $earn }}</td>
                                    <td style="width:20%;"> {{ number_format($requestData['rate'][$key], 2) }}</td>
                                    <td style="text-align:center;font-size:13px;width:20%; ">
                                        {{number_format($requestData['hours'][$key], 2) }}</td>
                                    <td
                                        style="text-align:center; padding-right:4px;font-size:13px; font-family: DejaVu Sans, sans-serif;w">
                                        <span style="font-family: 'DejaVu Sans', sans-serif;">{{
                                            $requestData['currency'] }}</span>{{
                                        number_format($requestData['total'][$key], 2) }} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="column2">
                        <table class="colortable" style="width:100%; border-right:2px solid#464646;">
                            <thead id="colourborder" style="border-left:2px solid #264fab">
                                <th class="padding" style="text-align: center;font-size:12px;width:40%; ">DEDUCTIONS
                                </th>
                                <th class="padding" style="font-size:12px;width:30%;">CURRENT TOTAL</th>
                                <th class="padding" style="font-size:12px; width:30%;">YEAR TO DATE</th>
                            </thead>
                            <tbody id="borderleft">
                                @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                                <tr>
                                    <td id="fica" style="padding:left 8px;font-size:13px;width:40%;">{{ $taxes }}</td>
                                    <td
                                        style="text-align: center;font-size:13px; font-family: DejaVu Sans, sans-serif;width:30%;">
                                        <span style="font-family: 'DejaVu Sans', sans-serif;">{{
                                            $requestData['currency'] }}</span>{{
                                        number_format($requestData['taxes_rate'][$key], 2) }}
                                    </td>
                                    <td
                                        style="text-align: center;font-size:13px; font-family: DejaVu Sans, sans-serif;width:30%;">
                                        <span style="font-family: 'DejaVu Sans', sans-serif;">{{
                                            $requestData['currency'] }}</span>{{
                                        number_format($requestData['taxes_ytd'][$key], 2) }}
                                    </td>
                                </tr>
                                @endforeach
                                @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                                <tr>
                                    <td id="fica" style="padding:left 10px;">{{ $tax_deduction }}</td>
                                    <td style="text-align: center; font-family: DejaVu Sans, sans-serif;"><span
                                            style="font-family: 'DejaVu Sans', sans-serif;">{{
                                            $requestData['currency'] }}</span>{{
                                        number_format($requestData['period_tax_deduction'][$key], 2) }} </td>
                                    <td style="text-align: center; font-family: DejaVu Sans, sans-serif;"><span
                                            style="font-family: 'DejaVu Sans', sans-serif;">{{
                                            $requestData['currency'] }}</span>{{
                                        number_format($requestData['ytd_tax_deduction'][$key], 2) }} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" style=" border:3px solid#8a898a;  ">
                    <div class="column1" style="height: 80px;">
                        <table id="bottomtable" style="width:100%; background-color:white;">
                            <tr class="">
                                <td id="cols" class="head1">YTD GROSS</td>
                                <td id="cols" class="head1">YTD DEDUCTIONS</td>
                                <td id="cols" class="head1">YTD NET PAY
                                </td>
                            </tr>
                            <tr class=" ytd">
                                <td id="cols" class="head2">{{ number_format($requestData['ytd_gross_total'], 2) }}</td>
                                <td id="cols" class="head2">{{ number_format($requestData['ytd_deduction_tax'], 2) }}
                                </td>
                                <td id="cols" class="head2" style="font-family: DejaVu Sans, sans-serif;">{{
                                    number_format($requestData['total_ytd_net_pay'], 2) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="column2" style="height: 80px;border-bottom:2px solid #8a898a;">
                        <table id="bottomtable" style="width:100%; background-color:white;">
                            <tr class="">
                                <td id="cols" class="head1">CURRENT TOTAL</td>
                                <td id="cols" class="head1">DEDUCTIONS</td>
                                <td id="cols" class="head1" style="border-right: none !important; ">NET PAY
                                </td>
                            </tr>
                            <tr class=" ytd">
                                <td id="cols" class="head2">{{ number_format($requestData['period_gross_total'], 2) }}
                                </td>
                                <td id="cols" class="head2">{{ number_format($requestData['deduction_tax'], 2) }} </td>
                                <td id="cols" class="head2"
                                    style="border-right: none !important; font-family: DejaVu Sans, sans-serif;"><span
                                        style="font-family: 'DejaVu Sans', sans-serif;font-weight:bold;">{{
                                        $requestData['currency'] }}</span><b>{{
                                        number_format($requestData['total_net_pay'], 2) }}</b> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>
