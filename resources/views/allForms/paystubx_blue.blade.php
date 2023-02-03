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
            /* border: 2px solid #464646; */
            border-collapse: collapse;
        }

        .regularborder {
            border-left: 2.4px solid black;
            border-right: none;
            border-top: none;
            border-bottom: none;
            position: relative;
            right: 5.1px;
}


        th {
            font-size: 13px;
            color: white;
        }

        td {
            font-size: 15px;
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
            padding: 5px 3px;
        }

        #colourborder {
            background-color: #264fab;
            border:none;
            border-right:2px solid#464646;
            border-left:2px solid#464646;
            height: 35px;

        }

        #fica {
            font-size: 13px;
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
                <th class="padding" style="text-align:center;" colspan="2"> EMPLOYEE ID </th>
                <th class="padding" style="text-align:center;"colspan="3"> PERIOD ENDING </th>
                <th class="padding"style="text-align:center;"> PAY DATE </th>
                <th class="padding"style="text-align:center;" colspan="2">CHECK NUMBER</th>
            </thead>
            <tr>
                <td class="padding" id="colsborder" colspan="2"
                    style="border:2px solid  #464646; text-align:center; border-top:none; border-bottom:none; padding:8px 0px !important;">{{ $requestData['emp_id'] }}</td>
                <td class="padding" style="border:2px solid  #464646; text-align:center; border-top:none; border-bottom:none;" colspan="3">
                    {{ date('M d, Y', strtotime($requestData['pay_start'])) }} -
                    {{ date('M d, Y', strtotime($requestData['pay_end'])) }}</td>
                <td class="padding" style="border:2px solid  #464646; text-align:center;border-top:none; border-bottom:none;">
                    {{ date('M d, Y', strtotime($requestData['pay_date'])) }}</td>
                <td class="padding" colspan="2" style="border:2px solid  #464646; text-align:center;border-top:none; border-bottom:none;">254236</td>
            </tr>
            <thead id="colourborder">
                <th class="padding"style="text-align: center;">INCOME</th>
                <th style="text-align: center;" class="padding">RATE</th>
                <th style="text-align: center;" class="padding">HOURS</th>
                <th style="text-align: center;" class="padding">CURRENT TOTAL</th>
                <th style="text-align: center;" class="padding">DEDUCTION</th>
                <th style="text-align: center;" class="padding">CURRENT TOTAL</th>
                <th style="text-align: center;" class="padding" colspan="2">YEAR TO DATE</th>
            </thead>
        </table>

        <section style="width: 100%; background-color:#dce6f1; border:2px solid  #464646; border-top:none; border-bottom:none;">
            <table style="width:50%; float: left; border:none;">
                <tbody>

                    @foreach ($requestData['earning'] as $key => $earn)
                        <tr>
                            <td style="width:120px;text-transform: uppercase; text-align:center;" id="fica">{{ $earn }}</td>
                            <td style="text-align: center;">{{ $requestData['currency'] }}
                                {{ $requestData['rate'][$key] }}</td>
                            <td style="text-align: center;">{{ $requestData['hours'][$key] }}</td>
                            <td style="text-align: center;">{{ $requestData['currency'] }}
                                {{ $requestData['total'][$key] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table style="width:50%; float: right;" class="regularborder">
                <tbody>
                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                        <tr>

                            <td style="text-transform: uppercase; width:155px; font-size:13px; text-align:center;" class="data">
                                {{ $taxes }}</td>
                            <td style="text-align: center;">{{ $requestData['currency'] }}
                                {{ $requestData['taxes_rate'][$key] }}</td>
                            <td style="text-align:center;">{{ $requestData['currency'] }}
                                {{ $requestData['taxes_ytd'][$key] }}</td>
                        </tr>
                    @endforeach

                    @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                        <tr>

                            <td style="text-transform: uppercase; width:125px; font-size:13px; text-align:center;"class="data">
                                {{ $tax_deduction }}</td>

                            <td style="text-align: center;">{{ $requestData['currency'] }}
                                {{ $requestData['period_tax_deduction'][$key] }}
                            </td>
                            <td style="text-align:center;">{{ $requestData['currency'] }}
                                {{ $requestData['ytd_tax_deduction'][$key] }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>



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
                    <td id="cols" class="head2">{{ $requestData['ytd_gross_total'] }}</td>
                    <td id="cols" class="head2">{{ $requestData['ytd_deduction_tax'] }}</td>
                    <td id="cols" class="head2">{{ $requestData['total_ytd_net_pay'] }}</td>
                    <td id="cols" class="head2">{{ $requestData['period_gross_total'] }}</td>
                    <td id="cols" class="head2">{{ $requestData['deduction_tax'] }}</td>
                    <td id="cols" class="head2" style="border-right: none !important;">{{ $requestData['total_net_pay'] }}</td>
                </tr>
            </table>

        </section>

    </div>

</body>

</html>
