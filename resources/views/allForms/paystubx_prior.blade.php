<!DOCTYPE html>
<html lang="en">

<head>
    <title>paystubs-prior</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    td {

        font-size: 13px;
    }

    th {
        font-size: 13px;
    }

    .row1::after {
        content: "";
        clear: both;
        display: table;
    }

    .column1 {
        float: left;
        width: 58%;
        padding-right: 5px;
    }

    .column2 {
        float: left;
        width: 38%;

        padding-left: 5px;
    }

    .rowonly {
        width: 100%;
        margin: 0px;
        padding: 0px;
    }
</style>

<body>

    <table style="width:100%;">
        <tr style="">
            <td style="font-size:25px; font-weight:800; padding-left:90px;">{{ $requestData['cname'] ?? '' }}</td>
            <td></td>
            <td style="font-size:18px; padding-right:30px;font-weight:800;">No: {{ $requestData['emp_ssn'] ?? '' }}</td>
        </tr>
        <tr>
            <td style="padding-left:90px; padding-top:0px; font-weight:800;"> {{ $requestData['address_1'] }} <br>
                {{ $requestData['city'] }}
            </td>
        </tr>
        <tr>
            <td style="padding-left:90px;padding-top:0px; font-weight:800;"> {{ $requestData['state'] }},
                {{ $requestData['zip_code'] }}
            <td>
            <td style="font-size:18px;">Date: {{ date('m/d/y', strtotime($requestData['pay_date'])) }}</td>
        </tr>
        <tr style="padding-top:4px;">

            <td style="font-size:13px;">
                <h5>
                    Pay TO The <br>Order Of <span
                        style="border-bottom: 1px solid black;  padding-left:90px; text-align:center; margin:auto;  height:20px">{{ $requestData['emp_name'] ?? '' }}</span>
                </h5>
                <span style="border-bottom: 1px solid black;  padding-left:90px;">Seven Thousand One Hundred Forty-Five
                    and 63/100</span>
            </td>
            <td>
                $ **7.145.63
            </td>
        </tr>
    </table>


    <table style="width: 100%;padding-top:60px;margin-top: 30px;">

        <tr>

            <td style="font-size:18px;">Memo: </td>
            <td colspan="2" style="font-size: 15px;">FOR RECORDS PURPOSES ONLY</td>
            <td>-----------------------------------------------------------------</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-top:30px;text-align: center;">98745687T58T43098584598</td>
        </tr>
    </table>

    <div class="rowonly">
        <table style="width:100%; padding-top:40px; text-align:left;">
            <tr>
                <td style="font-weight:bold;">
                    {{ $requestData['cname'] ?? '' }}</td>
                <td style="font-weight:bold;">sharp, Dana</td>
                <td>SSN</td>
                <td>XXX-XX-{{ $requestData['emp_ssn'] ?? '' }}</td>
                <td>Period Beginning</td>
                <td> {{ $requestData['pay_start'] ?? '' }}</td>

            </tr>

        </table>
    </div>
    <div class="row1">
        <div class="column1">
            <table style="width: 100%;">
                <tr style="border-top: 1px solid; border-bottom:1px solid;">
                    <td>Earning</td>
                    <td>Hours/Rate</td>
                    <td>Amount</td>
                    <td>YTD Amt</td>

                </tr>
                @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td> {{ $earn }}</td>
                        <td>{{ $requestData['hours'][$key] }}</td>
                        <td>{{ $requestData['currency'] ?? '' }} {{ $requestData['period'][$key] ?? '' }}</td>
                        <td>{{ $requestData['currency'] ?? '' }} {{ $requestData['ytd_total'][$key] ?? '' }}</td>
                    </tr>
                @endforeach
                <tr style="border-top: 1px solid black;">
                    <td colspan="2" style="font-weight: bold;">GROSS PAY </td>
                    <td>{{ $requestData['deduction_tax'] }}</td>
                    <td>{{ $requestData['ytd_deduction_tax'] }}</td>
                </tr>

            </table>
        </div>
        <div class="column2">
            <table style="width: 100%;">
                <tr style="border-top: 1px solid; border-bottom:1px solid;">
                    <td>Taxes/Deductions</td>
                    <td>Amount</td>

                </tr>
                @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td style="text-align: left;">{{ $taxes }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['taxes_rate'][$key] }}</td>
                    </tr>
                @endforeach

                @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td style="text-align: left;">{{ $tax_deduction }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}
                        </td>
                    </tr>
                @endforeach
                <tr style="border-top: 1px solid black;">
                    <td style="font-weight: bold;">Net Pay</td>
                    <td>{{ $requestData['total_net_pay'] }}</td>
                </tr>
            </table>

        </div>
        <table>

        </table>
    </div>







</body>

</html>
