<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Paystubx Template</title>



    <style>
    .infomation {
        border: 2px solid darkgrey;
        border-top: none;
    }


    .bodertop {
        border: 1px solid black;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        border: 2px solid darkgrey;
        border-top: none;
    }


    .hiddden {
        visibility: hidden;
    }

    .main {
        display: inline-flexbox;

    }

    .section_2 {
        padding-top: 5px;
        background: #a9a9a9;
        color: white;
        height: 35px;
    }





    .earning {
        text-align: right;

        font-size: 20px;
    }

    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .col1 {
        float: left;
        width: 40%;
    }

    .col2 {
        float: left;
        width: 60%;
    }

    .row1::after {
        content: "";
        clear: both;
        display: table;
    }
    .tablewidth{
        width:100%;
        text-align: center;
    }

    .column1 {
        float: left;
        width: 60%;
    }

    .column2 {
        float: left;
        width: 40%;
    }

    .hadding {
        
        font-size: 12px;
        text-transform:uppercase;
    }

    td {
        font-size: 13px;
       
    }

    th {
        font-size: 14px;
    }
    </style>
</head>

<body>


    <div class="section_2">
        <table style="width: 100%;">
            <thead style="background-color: #a9a9a9;">
                <th style="text-align:left;">#767767</th>

                <th style="text-align:right; padding-right:20px; font-size:larger;">

                    Earning Statement</th>

            </thead>
        </table>
    </div>

    <section class="infomation">
        <div class="row">
            <div class="col1">
                <table>

                    <tr>
                        <td style="font-size: 14px;"><b>{{ $requestData['cname'] }}</b></td>


                    </tr>
                    <tr>

                        <td>
                            {{ $requestData['address_1'] }},</br>
                            {{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}USA
                        </td>

                    </tr>


                    <tr>
                        <td  style="margin-top: 10px;"><span style="font-weight: 500;">Marital Status: </span>
                            {{ $requestData['marital_status'] }} </td>


                    </tr>

                    <tr>
                        <td> <span style="font-weight: 500;">Exemptions: </span> {{ $requestData['exemptions'] }}
                        </td>


                    </tr>

                </table>
            </div>

            <div class="col2">

                <table>

                    <tr>
                        <td> <span style="font-weight: 500;">Pay Period: <span>{{ $requestData['pay_start'] }} -
                                    {{ $requestData['pay_end'] }}</span>
                        </td>



                    </tr>

                    <tr>
                        <td><b>Pay Date: <span>{{ $requestData['pay_date'] }} </span></b> </td>



                    </tr>




                    <tr>
                        <td><b>Employee #: </b> <span> {{ $requestData['emp_id'] }}</span></td>



                    </tr>


                    <tr>

                        <td>
                            {{ $requestData['emp_street_1'] }}, </br>
                            {{ $requestData['emp_city'] }}
                            {{ $requestData['emp_state'] }},{{ $requestData['emp_zip_code'] }}USA
                        </td>

                    </tr>

                    <tr>
                        <td><b>Social Security#:</b> <span>{{ $requestData['emp_ssn'] }}</span></td>
                    </tr>

                </table>
            </div>




        </div>
    </section>


    <section class="infomation">
        <div class="row1">
            <div class="column1">
                <table class="tablewidth">
                    <thead>

                        <th class="hadding" style="text-align: left;">EARNINGS</th>
                        <th class="hadding">RATE</th>
                        <th class="hadding">HOURS</th>
                        <th class="hadding">TOTAL</th>
                        <th class="hadding">YTD TOTAL</th>

                    </thead>
                    <tbody>

        
                    @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td style="text-align: left;">{{ $earn }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['rate'][$key] }}</td>
                        <td style="text-align:center;">{{ $requestData['hours'][$key] }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['period'][$key] }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['ytd_total'][$key] }}</td>
                    </tr>
                    @endforeach
                    </tbody>




                </table>
            </div>
            <div class="column2">
                <table class="tablewidth">
                    <thead >

                        <th class="hadding" style="text-align: left;">DEDUCTIONS</th>
                        <th class="hadding">TOTAL</th>
                        <th class="hadding">YTD TOTAL</th>

                    </thead>
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

                    </tbody>
                </table>
            </div>
        </div>

        <table style="width:100%;">
            <tr>
                <th colspan="4" style="text-align: right;">DEDUCTION TOTAL</th>
                <td style="text-align: right;">{{ $requestData['period_gross_total'] }}</td>
                <td style="text-align: center;">{{ $requestData['ytd_gross_total'] }}</td>
            </tr>

            <tr>
                <th style="text-align: right;">GROSS PAY </th>
                <td style="text-align: right;">{{ $requestData['deduction_tax'] }}</td>
                <td style="text-align: right;">{{ $requestData['ytd_deduction_tax'] }}</td>

                <th style="text-align: right;" >Net Pay</th>
                <td style="text-align: right;">{{ $requestData['total_net_pay'] }}</td>
                <td style="text-align: center;">{{ $requestData['total_ytd_net_pay'] }}</td>
            </tr>

        </table>
    </section>














</body>

</html>