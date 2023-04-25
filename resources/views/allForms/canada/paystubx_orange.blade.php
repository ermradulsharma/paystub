<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Paystub_blue</title>

    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
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
            font-size: 16px;
            padding-top: 10px;
            color: black;
            font-weight: 500;
            border-right: 2px solid #464646;
        }

        .head2 {
            border-right: 2px solid #464646;
            padding: 5px 0 2.2em 0;
        }

        .padding {
            font-size: 11px;
            padding: 10px 0px 10px 0px;
        }

        #colourborder {
            background-color: #fba401;
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

        .column {
            width: 15%;
            padding: 5px;
            float: left;
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
    </style>
</head>

<body>
    <main class="bg-img2">
        @guest
            <div class="watermark"></div>
            <div class="watermark2"></div>
        @endguest
        @auth
            @php
                $date = \Carbon\Carbon::now();
            @endphp
            @if (Auth::user()->device_type == 'website')
                @if(Auth::user()->canada_expiry_date <= $date || !isset($requestData['watermark']))
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
        <div style="max-width: 100%; margin: auto; padding: 10px 10px; bordar-top:2px solid red">
            <table style="width:100%; border-left:2px solid#464646; border-right:2px solid#464646;">
                <thead style="border:none !important;color:white; background-color:darkgrey; ">
                    <th style="font-size: 16px;text-align: left;padding-left: 25px;">{{ $requestData['cname'] }}</th>
                    <th
                        style="font-size: 20px;padding-top:10px;text-align: right;padding-right: 12px;padding-bottom: none;">
                        Earnings Statement</th>
                </thead>
                <tr style="color:white; background-color:darkgrey; ">
                    <td style="font-size: 16px;padding-left: 24px;padding-bottom: 12px; " colspan="2">
                        {{ $requestData['address_1'] }}, @if($requestData['address_2'] != '')<br>
                        {{ $requestData['address_2'] }} @endif</br>{{ $requestData['city'] }}
                        {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}, CA
                    </td>
                </tr>
            </table>
            <table style="width:100%; border-left:2px solid#464646; border-right:2px solid#464646;">
                <thead style="border-top:none; border-left:2px solid#464646;height:35px;">
                    <th class="padding" colspan="2" style="text-align: left; padding-left:20px; color:black;">
                        {{ $requestData['emp_name'] }}
                    </th>
                    <td class="padding" colspan="6" style="text-align: center; border-right:2px solid #464646;">
                        {{ $requestData['emp_address'] }}
                    </td>
                </thead>
                <thead id="colourborder">
                    <th class="padding" style="text-align:center;  text-align: left; padding-left:20px;" colspan="2">
                        EMPLOYEE ID </th>
                    <th class="padding" style="text-align:center; " colspan="3"> PERIOD ENDING </th>
                    <th class="padding" style="text-align:center; "> PAY DATE </th>
                    <th class="padding" style="text-align:center; " colspan="2">CHECK NUMBER</th>
                </thead>
                <tr>
                    <td class="padding" id="colsborder" colspan="2"
                        style="border:2px solid  #464646; text-align: left; padding-left:20px; border-top:none; border-bottom:none;">
                        {{ $requestData['emp_id'] }}
                    </td>
                    <td class="padding"
                        style="border:2px solid  #464646; text-align:center; border-top:none; border-bottom:none;"
                        colspan="3"> {{ date('m/d/Y', strtotime($requestData['pay_start'])) }}</td>
                    <td class="padding"
                        style="border:2px solid  #464646; text-align:center;border-top:none; border-bottom:none;">
                        {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}
                    </td>
                    <td class="padding" colspan="2"
                        style="border:2px solid  #464646; text-align:center;border-top:none; border-bottom:none;">
                        {{ $requestData['check_no'] ?? '' }}
                    </td>
                </tr>
            </table>
            <section>
                <div class="row" style=" background-color: #fcdcac ; border-left:2px solid#464646;">
                    <div class="column1">
                        <table class="colortable" style="width:100%;">
                            <thead id="colourborder">
                                <th class="padding" style="text-align: left; padding-left:20px;">INCOME</th>
                                <th class="padding" style="text-align:left;">RATE</th>
                                <th class="padding" style="">HOURS</th>
                                <th class="padding" style="">CURRENT TOTAL</th>
                            </thead>
                            <tbody>
                                @foreach ($requestData['earning'] as $key => $earn)
                                    <tr>
                                        <td id="fica" style="padding:left 20px;"> {{ $earn }}</td>
                                        <td> @if($requestData['rate'][$key] != 0.00) {{ number_format($requestData['rate'][$key], 2) ?? '' }}@endif</td>
                                        <td>{{ $requestData['hours'][$key] }}.00</td>
                                        <td style="text-align: right; padding-right:4px;">{{ $requestData['currency'] }}
                                            {{ number_format($requestData['total'][$key], 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="column2">
                        <table class="colortable" style="width:100%; border-right:2px solid#464646;">
                            <thead id="colourborder">
                                <th class="padding" style="text-align: center; ">DEDUCTION</th>
                                <th class="padding" style="">CURRENT TOTAL</th>
                                <th class="padding" style="">YEAR TO DATE</th>
                            </thead>
                            <tbody id="borderleft">
                                @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                                    <tr>
                                        <td id="fica" style="">{{ $taxes }}</td>
                                        <td style="text-align: center;">{{ $requestData['currency'] }}
                                            {{ number_format($requestData['taxes_rate'][$key], 2) }}
                                        </td>
                                        <td style="text-align: center;">{{ $requestData['currency'] }}
                                            {{ number_format($requestData['taxes_ytd'][$key], 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                                    <tr>
                                        <td id="fica" style="padding:left 10px">{{ $tax_deduction }}</td>
                                        <td style="text-align: center;">{{ $requestData['currency'] }}
                                            {{ number_format($requestData['period_tax_deduction'][$key], 2) }}
                                        </td>
                                        <td style="text-align: center;">{{ $requestData['currency'] }}
                                            {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" style=" border:2px solid#464646; ">
                    <div class="column1">
                        <table id="bottomtable" style="width:100%; background-color:white;">
                            <tr class="">
                                <th id="cols" class="head1">YTD GROSS</th>
                                <th id="cols" class="head1">YTD EDUCATION</th>
                                <th id="cols" class="head1">YTD NET PAY</th>
                            </tr>
                            <tr class=" ytd">
                                <td id="cols" class="head2">
                                    {{ number_format($requestData['ytd_gross_total'], 2) }}
                                </td>
                                <td id="cols" class="head2">
                                    {{ number_format($requestData['ytd_deduction_tax'], 2) }}
                                </td>
                                <td id="cols" class="head2">
                                    {{ number_format($requestData['total_ytd_net_pay'], 2) }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="column2">
                        <table id="bottomtable" style="width:100%; background-color:white;">
                            <tr class="">
                                <th id="cols" class="head1">CURRENT TOTAL</th>
                                <th id="cols" class="head1">DEDUCTION</th>
                                <th id="cols" class="head1" style="border-right: none !important; ">NET PAY</th>
                            </tr>
                            <tr class=" ytd">
                                <td id="cols" class="head2">
                                    {{ number_format($requestData['period_gross_total'], 2) }}
                                </td>
                                <td id="cols" class="head2">
                                    {{ number_format($requestData['deduction_tax'], 2) }}
                                </td>
                                <td id="cols" class="head2" style="border-right: none !important;">
                                    {{ $requestData['currency'] }} {{ number_format($requestData['total_net_pay'], 2) }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>
