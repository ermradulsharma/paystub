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
        font-size: 15px;
    }


    .bodertop {
        width: 100%;
        display:flex;
        flex-wrap:wrap;
        border: 2px solid darkgrey;
        border-top:none;
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
        padding-right: 10px;
        font-size: 20px;
    }

    .row {
        display: flex;
    }

    .col {
        display: inline-block;
        float: right;
    }

    .hadding {
        padding-left: 20px;
        font-size: 12px;
        text-transform: uppercase;
    }

    .hadding1 {
        padding-left: 20px;
        font-size: 14px;
    }

    td {
        font-size: 16px;
    }

        th {
            font-size: 15px;
        }

    </style>
</head>

<body>
    <div class="section_2">
        <table style="width: 100%;">
            <thead style="background-color: #a9a9a9;">
                <th style="padding-left:20px;">#767767</th>

                <th style="text-align:right; padding-right:20px; font-size:larger;">

                    Earning Statement</th>

            </thead>
        </table>
    </div>

    <section class="infomation" style="margin-top: 15px;">
        <div class="row">
            <div class="col">
                <table style="margin-left: 26px;margin-top:12px;">

                    <tr>
                        <th style="font-size: 22px;" colspan="4">{{ $requestData['cname'] ?? "" }}</th>


                    </tr>
                    <tr>

                        <td colspan="4" style="font-size: 18px; margin-top:5px;">
                            {{ $requestData['address_1'] ?? "" }},</br>
                            {{ $requestData['address_2'] ?? "" }}
                            {{ $requestData['city'] ?? "" }} {{ $requestData['state'] ?? "" }}, {{ $requestData['zip_code'] ?? "" }}USA
                        </td>
                    </tr>
                    <tr>
                        <th style=" padding-top: 10px; " colspan="4">Marital Status: <span style="font-weight: 300;">
                                {{ $requestData['marital_status'] ?? "" }} </span> </th>


                    </tr>

                    <tr>
                        <th colspan="4">Exemptions: <span style="font-weight: 300;"> {{ $requestData['exemptions'] ?? "" }}
                            </span> </th>


                    </tr>


                    <tr>


                        <td colspan="3"></td>

                    </tr>
                </table>
            </div>


            <div class="col">

                <table style=" padding-top: 0px; padding-left: 70%;">

                    <tr>
                        <th style=" padding-top: 10px; ">Pay Period: <span style="font-weight: 300;">{{ $requestData['pay_start'] ?? "" }} -
                                {{ $requestData['pay_end'] ?? "" }}</span>
                        </th>
                        <th></th>
                        <th></th>
                        <th> </th>
                        <th></th>

                    </tr>

                    <tr>
                        <th>Pay Date: <span style="font-weight: 300;">{{ $requestData['pay_date'] ?? "" }} </span> </th>
                        <th></th>
                        <th></th>
                        <th> </th>
                        <th></th>

                    </tr>


                    <tr>


                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th>Employee #: <span style="font-weight: 300;"> {{ $requestData['emp_id'] ?? "" }}</span> </th>
                        <th> </th>
                        <th></th>
                        <th> </th>
                        <th></th>

                    </tr>


                    <tr>

                        <td>
                            {{ $requestData['emp_street_1'] ?? "" }}, </br>
                            {{ $requestData['emp_street_2'] ?? "" }}</br>
                            {{ $requestData['emp_city'] ?? "" }}
                            {{ $requestData['emp_state'] ?? "" }},{{ $requestData['emp_zip_code'] ?? "" }}USA
                        </td>
                        <td></td>

                        <td>

                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <th>Social Security#: <span style="font-weight:200;">{{ $requestData['emp_ssn'] ?? "" }}</span></th>
                    </tr>

                </table>
            </div>
        </div>
    </section>
    <section class="bodertop">
        <table style="width: 60%;">
            <thead>

                <th class="hadding">EARNINGS</th>
                <th class="hadding">RATE</th>
                <th class="hadding">HOURS</th>
                <th class="hadding">TOTAL</th>
                <th class="hadding">YTD TOTAL</th>

            </thead>
            @foreach ($requestData['earning'] ?? []as $key => $earn)
            <tr>
                <td>{{ $earn }}</td>
                <td>{{ $requestData['currency'] ?? "" }} {{ $requestData['rate'][$key] }}</td>
                <td>{{ $requestData['hours'][$key] }}</td>
                <td>{{ $requestData['currency'] ?? "" }} {{ $requestData['period'][$key] }}</td>
                <td>{{ $requestData['currency'] ?? "" }} {{ $requestData['ytd_total'][$key] }}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="3" style="text-align:center;">GROSS PAY</th>
                <td>{{ $requestData['period_gross_total'] ?? "" }}</td>
                <td>{{ $requestData['ytd_gross_total'] ?? "" }}</td>

            </tr>
        </table>

        <table style="width: 40%;">
            <thead>

                <th class="hadding">DEDUCTIONS</th>
                <th class="hadding">TOTAL</th>
                <th class="hadding">YTD TOTAL</th>

            </thead>
            @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
            <tr>
                <td class="data">{{ $taxes }}</td>
                <td>{{ $requestData['currency'] ?? "" }} {{ $requestData['taxes_rate'][$key] }}</td>
                <td>{{ $requestData['currency'] ?? "" }} {{ $requestData['taxes_ytd'][$key] }}</td>
            </tr>
            @endforeach

            @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
            <tr>
                <td class="data">{{ $tax_deduction }}</td>
<<<<<<< HEAD
                <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}</td>
                <td>{{ $requestData['currency'] }} {{ $requestData['ytd_tax_deduction'][$key] }}</td>
=======
                <td>{{ $requestData['currency'] ?? "" }} {{ $requestData['period_tax_deduction'][$key] }}</td>
            <tr>
                <th>DEDUCTION TOTAL</th>
                <td>{{ $requestData['ytd_deduction_tax'] ?? "" }}</td>
            </tr>
            <tr>
                <th>Net Pay</th>
                <td>{{ $requestData['total_net_pay'] ?? "" }}</td>
                <td>{{ $requestData['total_ytd_net_pay'] ?? "" }}</td>
            </tr>
        </table>

    </section>

















</body>

</html>
