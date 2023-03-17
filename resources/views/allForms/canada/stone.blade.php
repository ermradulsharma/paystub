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
            color: #4a4a4a;
            font-weight: 500;
            border-right: 3px solid #8a898a;
        }

        .head2 {
            border-right: 3px solid #8a898a;
            padding: 5px 0 2.2em 0;
            font-size:15px;

        }

        .padding {
            font-size: 11px;
            padding: 10px 0px 10px 0px;
        }

        #colourborder {
            background-color: #58a2bf;
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
            border-right: 3px solid #8a898a;
        }

        .ytd_total {
            border: 3px solid #58a2bf;
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
            top: -110px;
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
        <div style="max-width: 100%; margin: auto; padding: 10px 10px;">
            <table style="width:100%; border-left:3px solid #8a898a; border-right:3px solid #8a898a;background-color:darkgray;color:white;">
                <tr>
                    <td style="font-size: 17px;text-align: left;padding-left: 25px;padding-top:5px; padding-bottom:5px;"><b style="text-transform: uppercase">{{ $requestData['cname'] }}</b><br>{{ $requestData['address_1'] }}{{ $requestData['city'] }}{{ $requestData['state'] }}, {{ $requestData['zip_code'] }}, CA</td>
                    <td
                        style="font-size: 20px;padding:10px 12px 8px 10px;text-transform:uppercase;">
                        Earnings Statement</td>
                </tr>
            </table>
            <table style="width:100%; border-left:3px solid #8a898a; border-right:3px solid #8a898a;">
                <thead style="border-top:none; border-left:2px solid #8a898a;height:35px;">
                    <th class="padding" colspan="2" style="text-align: left; padding-left:20px; color:black;font-size:16px;">
                        {{ $requestData['emp_name'] }}
                    </th>
                    <td class="padding" colspan="6" style="text-align: left; border-right:3px solid #8a898a;font-size:16px;">
                        {{ $requestData['emp_address'] }}
                    </td>
                </thead>
                <thead id="colourborder">
                    <th class="padding" style="text-align:center;font-size:13px;  text-align: left; padding-left:20px;" colspan="2">
                        EMPLOYEE ID </th>
                    <th class="padding" style="text-align:center;font-size:13px; " colspan="3"> PERIOD ENDING </th>
                    <th class="padding" style="text-align:center; font-size:13px;"> PAY DATE </th>
                    <th class="padding" style="text-align:center;font-size:13px; " colspan="2">CHECK NUMBER</th>
                </thead>
                <tr>
                    <td class="padding" id="colsborder" colspan="2"
                        style="border:3px solid #8a898a; text-align: left; padding-left:20px; border-top:none; text-transform:capitalize; border-bottom:none;font-size:15px;">
                        {{ $requestData['emp_id'] }}
                    </td>
                    <td class="padding"
                        style="border:3px solid #8a898a; text-align:center; border-top:none; border-bottom:none;font-size:15px;"
                        colspan="3"> {{ date('m/d/Y', strtotime($requestData['pay_start'])) }}&nbsp;&nbsp;-&nbsp;&nbsp;{{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</td>
                    <td class="padding"
                        style="border:3px solid #8a898a; text-align:center;border-top:none; border-bottom:none;font-size:15px;">
                        {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}
                    </td>
                    <td class="padding" colspan="2"
                        style="border:3px solid #8a898a; text-align:center;border-top:none; border-bottom:none;font-size:15px;">254236
                    </td>
                </tr>
            </table>
            <section>
                <div class="row"
                    style=" background-color:#c5dee7; border-left:2px solid #8a898a;border-right:3px solid#8a898a;">
                    <div class="column1">
                        <table class="colortable" style="width:100%;">
                            <thead id="colourborder" style="">
                                <th class="padding" style="text-align: left; padding-left:20px;font-size:13px;">INCOME</th>
                                <th class="padding" style="text-align:left;font-size:13px;">RATE</th>
                                <th class="padding" style="font-size:13px;">HOURS</th>
                                <th class="padding" style="font-size:13px;border-right:3px solid#58a2bf;">CURRENT TOTAL</th>
                            </thead>
                            <tbody style="">
                                @foreach ($requestData['earning'] as $key => $earn)
                                    <tr style="">
                                        <td id="fica" style="padding:left 20px;font-size:15px;"> {{ $earn }}</td>
                                        <td style="font-size:15px;"> {{ number_format($requestData['rate'][$key], 2) }}</td>
                                        <td style="text-align: center;font-size:15px;">{{ $requestData['hours'][$key] }}.00</td>
                                        <td style="text-align: center;font-size:15px; ">{{ $requestData['currency'] }}
                                            {{ number_format($requestData['total'][$key], 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="column2">
                        <table class="colortable" style="width:100%;">
                            <thead id="colourborder">
                                <th class="padding" style="text-align: center;font-size:13px;border-left:3px solid #58a2bf; ">DEDUCTION</th>
                                <th class="padding" style="font-size:13px;">CURRENT TOTAL</th>
                                <th class="padding" style="font-size:13px;">YEAR TO DATE</th>
                            </thead>
                            <tbody id="" style=" border-left:3px solid #8a898a;font-size:15px;">
                                @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                                    <tr>
                                        <td style="font-size:15px; padding-left:15px;" id="fica">{{ $taxes }}</td>
                                        <td style="text-align: center;font-size:15px;">{{ $requestData['currency'] }}
                                            {{ number_format($requestData['taxes_rate'][$key], 2) }}
                                        </td>
                                        <td style="text-align: center;font-size:15px;">{{ $requestData['currency'] }}
                                            {{ number_format($requestData['taxes_ytd'][$key], 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                                    <tr>
                                        <td id="fica" style="padding:left 10px;font-size:15px;">{{ $tax_deduction }}</td>
                                        <td style="text-align: center;font-size:15px;">{{ $requestData['currency'] }}
                                            {{ number_format($requestData['period_tax_deduction'][$key], 2) }}
                                        </td>
                                        <td style="text-align: center;font-size:15px;">{{ $requestData['currency'] }}
                                            {{ number_format($requestData['ytd_tax_deduction'][$key], 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" style=" border:3px solid #8a898a; ">
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
                                <th id="cols" class="head1" style="border-right: none !im#8a898a; ">NET PAY
                                </th>
                            </tr>
                            <tr class=" ytd">
                                <td id="cols" class="head2">
                                    {{ number_format($requestData['period_gross_total'], 2) }}
                                </td>
                                <td id="cols" class="head2">
                                    {{ number_format($requestData['deduction_tax'], 2) }}
                                </td>
                                <td id="cols" class="head2" style="border-right: none !im#8a898a;">
                                    {{ $requestData['currency'] }}
                                    {{ number_format($requestData['total_net_pay'], 2) }}
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
