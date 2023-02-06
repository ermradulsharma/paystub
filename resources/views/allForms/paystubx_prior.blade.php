<!DOCTYPE html>
<html lang="en">

<head>
    <title>paystubs-prior</title>
</head>
<style>
    @font-face {
    font-family: 'MICR';
    src: url('FONT/MICR-Plain.woff2') format('woff2'),
        url('FONT/MICR-Plain.woff') format('woff');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}

    table {
        border-collapse: collapse;
        width: 100%;
    }

    td {
        padding: 3px;
        font-size: 12px;
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
        width: 55%;
        padding-right: 10px;
        margin-right: 20px;

    }

    .column2 {
        float: left;
        width: 38%;

        padding-left: 5px;
    }

    .row2::after {
        content: "";
        clear: both;
        display: table;
    }

    .col1 {
        float: left;
        width: 45%;
        padding-right: 5px;
    }

    .col2 {
        float: left;
        width: 50%;
        padding-left: 5px;
    }

    .shrapdana {
        max-width: 100%;
    }
</style>

<body>

    <table style="width:100%;">
        <tr style="width:100%;">
        <td style="padding-left:90px;padding-top:0px; font-weight:800;"> {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}<td>
            <td style="font-size:14px;">No: {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
        </tr>
        <tr>
            <td style="padding-left:90px; padding-top:0px; font-weight:800; "> {{ $requestData['address_1'] }} {{ $requestData['city'] }}</td>
            <td></td>
        </tr>
        <tr>
            <td style="padding-left:90px;padding-top:0px; font-weight:800;"> {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}<td>
            <td style="font-size:14px;">Date: {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
        </tr>
        <tr>
            @php
            $digit = Terbilang::make((int) $requestData['total_net_pay']);
            $word = $digit;
            @endphp
            @php
            $n = $requestData['total_net_pay'];
            [$whole, $decimal] = sscanf($n, '%d.%d');
            @endphp
            
            <td style="font-size:13px;" colspan="">
                <h5> Pay To The <br>Order Of <span style="border-bottom: 1px solid black;  padding-left:90px; text-align:center; margin:auto;  height:20px">{{ $requestData['emp_name'] ?? '' }}</span></h5>
                <span style="border-bottom: 1px solid black;  padding-left:90px;">{{ $word }} and {{ (int) $decimal }}/100 </span>
                
            </td>
      
       
            <td style="font-size:14px; padding-left:90px;">Date: {{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
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
                <td colspan="3" style="padding-top:30px; font-size:20px; text-align:right; font-family: cursive;">
                    98745687T58T43098584598</td>
            </tr>
        </table>
    </div>
    </br>
    </br>
    </br>

    <div class="row2">
        <div class="col1">
            <table style="width:100%;">
                <tr>
                    <td style="font-weight: bold;">{{ $requestData['cname'] ?? '' }}</td>
                    <td style="font-weight: bold;">{{ $requestData['emp_name'] }}</td>

                </tr>
                <tr>

                    <td>{{ $requestData['address_1'] }}</br>{{ $requestData['city'] }}
                        {{ $requestData['state'] }},
                        {{ $requestData['zip_code'] }}</td>
                    <td>{{ $requestData['emp_street_1'] }}</br>{{ $requestData['emp_city'] }}
                        {{ $requestData['emp_state'] }},
                        {{ $requestData['emp_zip_code'] }}</td>

                </tr>
                <tr>
                    <td colspan="2" style="font-size:11px;">{{ $requestData['tel'] }}</td>

                </tr>
            </table>
        </div>

        <div class="col2">
            <table style="width:100%;">
                <tr>
                    <td>SSN</td>
                    <td>{{ $requestData['emp_ssn'] }}</td>
                    <td>Period Beginning</td>
                    <td>{{ date('m/d/Y', strtotime($requestData['pay_start'])) }}</td>
                </tr>
                <tr>
                    <td>Gross Pay</td>
                    <td>{{ $requestData['currency'] }} {{ $requestData['deduction_tax'] }}</td>
                    <td>Period Ending</td>
                    <td>{{ date('m/d/Y', strtotime($requestData['pay_end'])) }}</td>
                </tr>
                <tr>
                    <td>Net Pay</td>
                    <td>{{ $requestData['currency'] }}
                        {{ $requestData['total_net_pay'] }}</td>
                    <td>Check Date</td>
                    <td>{{ date('m/d/Y', strtotime($requestData['pay_date'])) }}</td>
                </tr>
                <tr>
                    <td>Filling Status</td>
                    <td></td>
                    <td>Check No</td>
                    <td>{{ $requestData['account_number_last_4'] }}</td>
                </tr>
            </table>
        </div>
    </div>
    </br>
    <div class="row1">
        <div class="column1">
            <table style="width:100%;">
                <tr style="border-top: 1px solid; border-bottom:1px solid;">
                    <td>Earning</td>
                    <td>Hours/Rate</td>
                    <td>Amount</td>
                    <td>YTD Amt</td>
                </tr>
                <tbody>
                    @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td> {{ $earn }}</td>
                        <td>{{ $requestData['hours'][$key] }}</td>
                        <td>{{ $requestData['currency'] ?? '' }}
                            {{ $requestData['period'][$key] ?? '' }}</td>
                        <td>{{ $requestData['currency'] ?? '' }}
                            {{ $requestData['ytd_total'][$key] ?? '' }}</td>

                    </tr>
                    @endforeach
                    <tr style="border-top: 1px solid black;">
                        <td colspan="2">GROSS PAY </td>
                        <td>{{ $requestData['deduction_tax'] }}</td>
                        <td>{{ $requestData['ytd_deduction_tax'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="column2">
            <table style="width: 100%;">
                <tr style="border-top: 1px solid; border-bottom:1px solid;">
                    <td>Taxes/Deductions</td>
                    <td>Amount</td>
                    <td>YTD Amt</td>

                </tr>
                <tbody>
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
                        <td>Net Pay</td>
                        <td>{{ $requestData['currency'] }}{{ $requestData['total_net_pay'] }}</td>
                        <td>{{ $requestData['total_ytd_net_pay'] }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <table>

        </table>
    </div>

</body>

</html>
