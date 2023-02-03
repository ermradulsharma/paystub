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
            font-size: 12px;
            color: white;
        }
        td {
            font-size: 11px;
            padding: 2px;
        }
        #cols {
            /* border-right: 2px solid #464646; */
            border-collapse: collapse;
            text-align: center;
        }
        .head1 {
            padding-top: 5px;
            color: black;
        }
        .head2 {
            /* padding-bottom: 10px; */
        }
        .padding {
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
            width: 54%;
        }
        .column2 {
            float: left;
            width: 46%;
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

        .colortable {

        }

        #borderleft {
            border-left: 2px solid black;
        }
    </style>
</head>

<body>
    <div style="max-width: 100%; margin: auto; padding: 0px 20px;">
        <table style="width:100%; border:none;border-left:2px solid#464646;border-right:2px solid#464646;">
            <thead style="border:none !important;color:white; background-color:darkgrey; ">
                <th style="font-size: 16px;text-align: left;padding-left: 25px;">{{ $requestData['cname'] }}</th>
                <th
                    style="font-size: 20px;padding-top:10px;text-align: right;padding-right: 12px;padding-bottom: none;">
                    Earnings Statement</th>
            </thead>
            <tr style="color:white; background-color:darkgrey; ">
                <td style="font-size: 16px;padding-left: 24px;padding-bottom: 12px; " colspan="2">
                    {{ $requestData['address_1'] }},{{ $requestData['address_2'] }}</br>{{ $requestData['city'] }}
                    {{ $requestData['state'] }},
                    {{ $requestData['zip_code'] }}USA</td>
            </tr>
        </table>
        <table style="width:100%; border-top:none;">

            <thead style="border-top:none; border-left:2px solid#464646;height:35px;">
                <th class="padding" colspan="2" style="text-align: center; color:black;">
                    {{ $requestData['emp_name'] }}
                </th>
                <td class="padding" colspan="6" style="text-align: center; border-right:2px solid #464646;">
                    {{ $requestData['emp_street_1'] }},{{ $requestData['emp_street_2'] }}{{ $requestData['emp_city'] }}
                    {{ $requestData['emp_state'] }}, {{ $requestData['emp_zip_code'] }}
                </td>
            </thead>
            <thead id="colourborder">
                <th class="padding" style="text-align:center; font-size:11px;" colspan="2"> EMPLOYEE ID </th>
                <th class="padding" style="text-align:center; font-size:11px;"colspan="3"> PERIOD ENDING </th>
                <th class="padding"style="text-align:center; font-size:11px;"> PAY DATE </th>
                <th class="padding"style="text-align:center; font-size:11px;" colspan="2">CHECK NUMBER</th>
            </thead>
            <tr>
                <td class="padding" id="colsborder" colspan="2"
                    style="border:2px solid  #464646; text-align:center; border-top:none; border-bottom:none; padding:8px 0px !important;">
                    {{ $requestData['emp_id'] }}</td>
                <td class="padding"
                    style="border:2px solid  #464646; text-align:center; border-top:none; border-bottom:none;"
                    colspan="3">
                    {{ date('M d, Y', strtotime($requestData['pay_start'])) }} -
                    {{ date('M d, Y', strtotime($requestData['pay_end'])) }}</td>
                <td class="padding"
                    style="border:2px solid  #464646; text-align:center;border-top:none; border-bottom:none;">
                    {{ date('M d, Y', strtotime($requestData['pay_date'])) }}</td>
                <td class="padding" colspan="2"
                    style="border:2px solid  #464646; text-align:center;border-top:none; border-bottom:none;">254236
                </td>
            </tr>
        </table>


        <section style="border: 1px solid black;">
            <div class="row"style=" background-color: #dce6f1; ">
                <div class="column1" >
                    <table class="colortable">
                        <thead id="colourborder">
                            <th class="padding" style="text-align: left;padding-left:20px; font-size:11px;">INCOME</th>
                            <th class="padding" style="font-size:11px;text-align:left;">RATE</th>
                            <th class="padding" style="font-size:11px;">HOURS</th>
                            <th class="padding" style="font-size:11px;">CURRENT TOTAL</th>
                        </thead>
                        <tbody >
                            @foreach ($requestData['earning'] as $key => $earn)
                                <tr >
                                    <td id="fica"style="padding:left 20px;">
                                        {{ $earn }}</td>
                                    <td>{{ $requestData['currency'] }}
                                        {{ $requestData['rate'][$key] }}</td>
                                    <td style="text-align: center;">{{ $requestData['hours'][$key] }}</td>
                                    <td style="text-align: center;">{{ $requestData['currency'] }}
                                        {{ $requestData['total'][$key] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="column2">
                    <table class="colortable">
                        <thead id="colourborder">
                            <th class="padding" style="text-align: center;padding-left:4px; font-size:11px;">DEDUCTION</th>
                            <th class="padding" style="padding-right:2px; font-size:11px;" >CURRENT TOTAL</th>
                            <th class="padding" style="font-size:11px;">YEAR TO DATE</th>
                        </thead>
                        <tbody id="borderleft">
                            @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                                <tr>
                                    <td id="fica" style="padding:left 10px;">{{ $taxes }}</td>
                                    <td style="text-align: center;padding:left 10px;">{{ $requestData['currency'] }}
                                        {{ $requestData['taxes_rate'][$key] }}</td>
                                    <td style="text-align: center;padding:left 10px;">{{ $requestData['currency'] }}
                                        {{ $requestData['taxes_ytd'][$key] }}</td>
                                </tr>
                            @endforeach
                            @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                                <tr>
                                    <td id="fica"style="padding:left 10px" >{{ $tax_deduction }}</td>
                                    <td style="text-align: center;">{{ $requestData['currency'] }}
                                        {{ $requestData['period_tax_deduction'][$key] }}
                                    </td>
                                    <td style="text-align: center;">{{ $requestData['currency'] }}
                                        {{ $requestData['ytd_tax_deduction'][$key] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <table id="bottomtable"
                style="width:100%; border:2px solid  #464646; background-color:white;border-left:none;border-right:none !important; background-color:red;">
                <tr class="">
                    <th id="cols" class="head1">YTD GROSS</th>
                    <th id="cols" class="head1">YTD EDUCATION</th>
                    <th id="cols" class="head1" style="width:145px;"> YTD<BR>NET PAY</th>
                    <th id="cols" class="head1">CURRENT TOTAL</th>
                    <th id="cols" class="head1">DEDUCTION</th>
                    <th id="cols" class="head1" style="border-right:none;">NET PAY</th>
                </tr>
                <tr class="ytd">
                    <td id="cols" class="head2">{{ $requestData['currency'] }} {{ $requestData['ytd_gross_total'] }}</td>
                    <td id="cols" class="head2">{{ $requestData['currency'] }} {{ $requestData['ytd_deduction_tax'] }}</td>
                    <td id="cols" class="head2">{{ $requestData['currency'] }} {{ $requestData['total_ytd_net_pay'] }}</td>
                    <td id="cols" class="head2">{{ $requestData['currency'] }} {{ $requestData['period_gross_total'] }}</td>
                    <td id="cols" class="head2">{{ $requestData['currency'] }} {{ $requestData['deduction_tax'] }}</td>
                    <td id="cols" class="head2" style="border-right: none !important;">
                        {{ $requestData['currency'] }} {{ $requestData['total_net_pay'] }}</td>
                </tr>
            </table>
        </section>


</body>

</html>
