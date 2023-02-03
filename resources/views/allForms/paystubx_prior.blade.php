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

    .shrapdana {
        max-width: 100%;
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
            @php
            $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
            $word = $digit->format((int)$requestData['total_net_pay']);
            @endphp
            @php
            $n = $requestData['total_net_pay'];
            list($whole, $decimal) = sscanf($n, '%d.%d');
            @endphp
            <td style="font-size:13px;">
                <h5>
                    Pay TO The <br>Order Of <span style="border-bottom: 1px solid black;  padding-left:90px; text-align:center; margin:auto;  height:20px">{{ $requestData['emp_name'] ?? '' }}</span>
                </h5>
                <span style="border-bottom: 1px solid black;  padding-left:90px;">{{$word}} and {{ (int)$decimal }}/100 </span>
            </td>
            <td>{{ $requestData['currency'] ?? '' }} **{{ $requestData['total_net_pay'] }} </td>
        </tr>
    </table>



    <div class="shrapdana">
        <table style="padding-top:60px;margin-top: 30px;">

            <tr>

                <td style="font-size:18px;">Memo: </td>
                <td colspan="2" style="font-size: 22px;">FOR RECORDS PURPOSES ONLY</td>
                <td>-----------------------------------------------------------------</td>
            </tr>
            <tr>

                <td style="padding-top:30px; font-family: cursive;">98745687T58T43098584598</td>
            </tr>
        </table>
        <table style=" padding: top 40px; text-align:left; ">
            <tr>
                <td style="font-weight: 800; font-size:13px; margin-top:200px;"> {{ $requestData['cname'] ?? '' }}</td>
                <td style="font-weight: 800;">sharp, Dana</td>
                <td>SSN</td>
                <td style="font-size: 12px;">XXX-XX-{{ $requestData['emp_ssn'] ?? '' }}</td>
                <td style="font-size: 12px;">Period Beginning</td>
                <td style="font-size: 12px;"> {{ $requestData['pay_start'] ?? '' }}</td>

            </tr>
            <tr>
                <td style="margin: 0; padding:0; font-size:12px;">{{ $requestData['address_1'] ?? '' }}</td>
                <td style="margin: 0; padding:0; font-size:12px;">3773 Rockdale Dr</td>
                <td>Gross Pay</td>
                <td style="font-size:12px;">{{ $requestData['currency'] ?? '' }} {{ $requestData['period_gross_total'] ?? '' }}</td>
                <td style="font-size:12px;">Period Ending</td>
                <td style="font-size:12px;"> {{ $requestData['pay_end'] ?? '' }}</td>
            </tr>
            <tr>
                <td style="font-size:12px;"> {{ $requestData['city'] ?? '' }}, {{ $requestData['state'] ?? '' }},
                    {{ $requestData['zip_code'] ?? '' }}
                </td>
                <td style="font-size: 12px;">Dallas, TX750220</td>
                <td style="font-size: 12px;">Net Pay</td>
                <td style="font-size: 12px;">{{ $requestData['currency'] ?? '' }} {{ $requestData['total_net_pay'] ?? '' }}</td>
                <td style="font-size: 12px;">Check Date</td>
                <td style="font-size: 12px;"> {{ $requestData['pay_date'] }}</td>
            </tr>
            <tr>
                <td style="font-size: 12px;">{{ $requestData['tel'] ?? '' }}</td>
                <td style="font-size: 12px;"></td>
                <td style="font-size: 12px;">Filling Status</td>
                <td style="font-size: 12px;">$3.00</td>
                <td style="font-size: 12px;">Check No</td>
                <td style="font-size: 12px;">12345</td>
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
                    <td>YTD Amt</td>

                </tr>
                @foreach ($requestData['earning'] as $key => $earn)
                <tr>
                    <td style="font-size: 12px;"> {{ $earn }}</td>
                    <td style="font-size: 12px; text-align:center;">{{ $requestData['hours'][$key] }}</td>
                    <td style="font-size: 12px;">{{ $requestData['currency'] ?? '' }} {{ $requestData['period'][$key] ?? '' }}</td>
                    <td style="font-size: 12px;">{{ $requestData['currency'] ?? '' }} {{ $requestData['ytd_total'][$key] ?? '' }}</td>
                    <td style="font-size: 12px;">{{ $requestData['currency'] ?? '' }} {{ $requestData['ytd_total'][$key] ?? '' }}</td>
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
                    <td>YTD Amt</td>

                </tr>
                @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                <tr>
                    <td style="text-align: left;">{{ $taxes }}</td>
                    <td>{{ $requestData['currency'] }} {{ $requestData['taxes_rate'][$key] }}</td>
                    <td>{{ $requestData['currency'] }} {{ $requestData['taxes_ytd'][$key] }}</td>
                </tr>
                @endforeach

                @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                <tr>
                    <td style="text-align: left;">{{ $tax_deduction }}</td>
                    <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}</td>
                    <td>{{ $requestData['currency'] }} {{ $requestData['ytd_tax_deduction'][$key] }}</td>

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
