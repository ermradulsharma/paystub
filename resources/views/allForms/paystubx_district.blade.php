<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 100px 100px;

            padding-top: 30px;
        }

        .grid-container>div {

            text-align: center;
            /* padding: 20px 0; */
            font-size: 30px;
        }


        .gridcontainer {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 100px;
            gap: 10px;
            padding: 10px;
        }

        .gridcontainer>div {

            text-align: center;
            padding: 20px 0;
            font-size: 22px;
        }

        .invoiceborder {
            /* border: 1px solid black; */
            /* padding-left: 20px; */
            padding-top: 20px;
            padding-bottom: 20px;
            /* padding-right: 20px; */
            /* border-width:20px */
            /* margin: 200px 200px 200px 200px; */
        }

        .section_2 {

            background: #D8E3F7;
            color: black;
            height: 62px;
            overflow: hidden;
            padding-top: 15px;
        }

        /* .text1 {
            margin-right: 69%;

            font-size: 20px;
        }

        .text2 {
            margin-left: 69%;
            font-size: 20px;


        } */

        table {

            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }


        th {
            text-align: left;
            padding: 8px;
        }

        .heading1 {
            margin-top: 20px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            background-color: #264FAB;
            color: white;
            text-align: left;
            /* padding: 8px; */
        }

        .data:nth-child(6) {
            background-color: #edededc4;
            padding: 10px;
        }

        .tablesection {
            /* padding: 26px; */
            padding-top: 25px;
            /* height: 90px; */
            /* overflow: hidden; */
        }

        p {
            font-size: 18px;
            font-family: none;
            margin-top: -2px;
        }

        .tfooter {
            margin-bottom: 20px;
        }

        .info {

            margin-top: 20px;
        }

        .earning {
            text-align: right;
            padding-right: 22px;
        }

        .row {
            display: flex;
        }

        .col {
            display: inline-block;

        }

        .section {
            background: #D8E3F7;
        }

        .data:nth-child(2) {
            background-color: #edededc4;
        }

        .tabl3,
        .hadding,
        .hadding {

            border-collapse: collapse;
        }

        .hadding,
        .hadding {
            padding: 5px;
            text-align: left;
        }

        thead {
            background-color: #264fab;
            color: white;
            border: 1px solid black;

        }
    </style>

</head>

<body>

    <section class="invoiceborder">
        <table>
            <tr>
                <th style="padding-left: 31px;font-size: 27px;"> {{ $requestData['cname'] }}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>


            <tr>
                <td class="address" style="padding-left: 31px;">

                    {{ $requestData['address_1'] }}
                    {{ $requestData['address_2'] }}
                    {{ $requestData['city'] }}</br>
                    {{ $requestData['state'] }},
                    {{ $requestData['zip_code'] }}

                </td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th class="earning"></th>
            </tr>
            <tr>
                <td></td>

                <td></td>
                <td></td>
                <td></td>
                <td>
                    <p class="earning">
                        {{ date('l m/d/y', strtotime($requestData['pay_date'])) }}
                    </p>
                </td>

            </tr>


        </table>




        <section class="section_2">
            <table>
                <tr>
                    <th style="font-weight: 100;">Pay One Thousand Six Hundred Seventy-six And One Cents</th>
                    <th class="earning">${{ $requestData['total_ytd_net_pay'] }}</th>
                </tr>
                <tr>
                    <td style=" padding: 9px;">
                        <!-- Stub no: 1112 -->
                    </td>
                    <td class="earning">
                        This is not a check
                    </td>
                </tr>
            </table>
        </section>


        <section style="padding-top: 16px; width:400px;">
            <table>
                <tr>
                    <td>Pay to the order of</td>
                    <td>{{ $requestData['emp_street_1'] }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        {{ $requestData['emp_street_2'] }}
                    </td>

                </tr>

                <tr>
                    <td></td>
                    <td> {{ $requestData['emp_city'] }}
                        {{ $requestData['emp_state'] }}
                        {{ $requestData['emp_zip_code'] }}</td>
                </tr>
            </table>


            <!-- <div class="row">

                <div class="col">

                    <table>
                        <tr>
                        <td>Pay to the order of</td>
                            <td>
                                Gary Stingley <br>
                                3368 Hillview Drive <br>
                                Santa Rosa, CA 95407
                            </td>
                            <td></td>
                            <td></td>
                            <td>

                            </td>
                            <td></td>
                        </tr>

                    </table>
                </div>
            </div> -->
        </section>


        <section>

            <table>
                <tr>
                    <th colspan="4" style="padding-top: 41px;">Company Intormation</th>

                </tr>


                <tr>
                    <td colspan="4" class="address" style="padding-left: 11px;">
                        {{ $requestData['cname'] }} <br>
                        {{ $requestData['address_1'] }}</br>
                        {{ $requestData['address_2'] }}</br>
                        {{ $requestData['city'] }}
                        {{ $requestData['state'] }},
                        {{ $requestData['zip_code'] }} <br>
                        {{ $requestData['tel'] }}
                    </td>
                </tr>

                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th class="earning"></th>
                </tr>
                <tr>
                    <td></td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <p class="earning" style="
    color: #0000b6;
">
                            Earnings Statement
                        </p>
                    </td>

                </tr>


            </table>
        </section>

        <section class="tablesection">
            <table>
                <tr>
                    <th class="heading1">Employee Information</th>
                    <th class="heading1"> Social Sec.</th>
                    <th class="heading1">EmployeeID</th>
                    <th class="heading1">Start Date</th>
                    <th class="heading1">End Date</th>
                    <th class="heading1">Check Date</th>

                </tr>
                <tr>
                    <td> {{ $requestData['emp_street_1'] }}</br>
                        {{ $requestData['emp_street_2'] }}</br>{{ $requestData['emp_city'] }}
                        {{ $requestData['emp_state'] }},
                        {{ $requestData['emp_zip_code'] }}</td>
                    <td> {{ $requestData['emp_ssn'] }}</td>
                    <td> {{ $requestData['emp_id'] }}</td>
                    <td> {{ date('m/d/y', strtotime($requestData['pay_start'])) }}
                    </td>
                    <td>{{ date('m/d/y', strtotime($requestData['pay_end'])) }}</td>
                    <td> {{ date('m/d/y', strtotime($requestData['pay_date'])) }}</td>

                </tr>



            </table>
        </section>
        <section>
            <table style="width: 60%; float:left;">
                <thead style="border-right: none;">


                    <th class="heading1">Earnings</th>
                    <th class="heading1"> Rate</th>

                    <th class="heading1">Hours</th>
                    <th class="heading1">Current</th>
                    <th class="heading1">Year to date</th>


                </thead>
                @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td>{{ $earn }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['rate'][$key] }}</td>
                        <td>{{ $requestData['hours'][$key] }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['period'][$key] }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['ytd_total'][$key] }}</td>
                    </tr>
                @endforeach


            </table>

            <table style="width: 40%; float:right;">
                <thead style="border-left: none;">

                    <th class="heading1">Deductions</th>
                    <th class="heading1">Current</th>
                    <th class="heading1">Year to date</th>

                </thead>
                @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                    <tr>
                        <td style="background-color:#f4f2f2;">{{ $taxes }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['taxes_rate'][$key] }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['taxes_ytd'][$key] }}</td>
                    </tr>
                @endforeach

                @foreach ($requestData['tax_deduction'] ?? [] as $key => $tax_deduction)
                    <tr>
                        <td style="background-color:#f4f2f2;">{{ $tax_deduction }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['period_tax_deduction'][$key] }}</td>
                        <td>{{ $requestData['currency'] }} {{ $requestData['ytd_tax_deduction'][$key] }}</td>
                    </tr>
                @endforeach


            </table>

        </section>
        <table class="tfooter " style="background: #5ae4f8; color:white">
            <tr>
                <th style="background: #264FAB;">Gross Earnings</th>

                <th class="section" style="font-weight: 100;">${{ $requestData['period_gross_total'] }}</th>
                <th class="section" style=" font-weight: 100;">${{ $requestData['ytd_gross_total'] }}</th>
                <th style="background: #264FAB;"class="section" style=" font-weight: 100;">Gross Deduction</th>
                <th class="section" style=" font-weight: 100;">${{ $requestData['deduction_tax'] }}</th>
                <th class="section" style=" font-weight: 100;">${{ $requestData['ytd_deduction_tax'] }}</th>
            </tr>
        </table>
    </section>

    <table class="tabl3" style="width:30%;float: right;">

        <tr style="">
            <th class="hadding" style="
                background: #264FAB;
                color:white;
            ">
                Check No.</th>
            <td class="hadding section" style="
                    text-align: right;
                ">2023558</td>

        <tr>

        <tr style="border-top: 2px solid white;">
            <th class="hadding "
                style="
                background: #264FAB;
                color:white;
            "> Net Pay</th>
            <td class="hadding section" style="
                text-align: right;
            ">
                {{ $requestData['total_net_pay'] }}</td>
        </tr>
        <tr style="border-top: 2px solid white;">
            <th class="hadding"
                style="
                    background: #264FAB;
                    color:white;
                "> YTD
                Net Pay</th>
            <td class="hadding section" style="
                    text-align: right;
                ">
                {{ $requestData['total_ytd_net_pay'] }}</td>
        </tr>



    </table>
</body>

</html>
