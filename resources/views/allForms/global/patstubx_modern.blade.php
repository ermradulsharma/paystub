<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            color: #000;
            font-size: 14px;
        }

        .text {
            margin-right: 10px;

        }

        .employee-box {
            border: 1px solid #000;
            background-image: linear-gradient(#fff, rgba(0, 0, 0, 0.3));
        }

        .tds tr {
            text-align: right;

        }

        .right {
            text-align: right;

        }

        .td {
            text-align: left !important;
        }

        td {
            font-size: 12px;
        }

        th {
            font-size: 13px;
        }

        .table-data th {
            padding: 0px 20px 0 0;
        }

        .statutory {
            text-align: left;
        }

        .center {
            text-align: center !important;
        }

        .row1::after {
            content: "";
            clear: both;
            display: table;
        }

        .column1 {
            float: left;
            width: 60%;
        }

        .column2 {
            float: left;
            width: 35%;
            margin-left: 5%;
        }

        .tds {
            border-collapse: collapse;
        }

        .borderback {
            border-top: 2px solid black;
            border-bottom: 2px solid black;
            background-color: #98919145;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;

        }

        .col1 {
            float: left;
            width: 40%;
            margin-left: 20%;

        }

        .col2 {
            float: left;
            width: 40%;
            margin-left: 15%;
            margin-top: 6%;

        }

        .row0::after {
            content: "";
            clear: both;
            display: table;

        }

        .cols1 {
            float: left;
            width: 50%;
            margin-left: 15%;
            margin-top: 4%;
        }

        .cols2 {
            float: left;
            width: 40%;
        }

        .table1 {
            width: 28%;
            margin-left: 14%;
        }

        .table1 td {
            font-size: 10px;
        }
    </style>
</head>

<body>

    <table class="table1">
        <tr>

            <td>CO1.</td>
            <td>FILE</td>
            <td>DEPT.</td>
            <td>CLOCK</td>
            <td>NUMBER</td>
        </tr>
        <tr>

            <td>SBINC</td>
            <td>12536</td>
            <td>08575</td>
            <td>00983</td>
            <td>89733</td>
        </tr>
    </table>

    <div class="row0">
        <div class="cols1">
            <table style="width:100%;">
                <tr>
                    <td>
                        Paystub United
                    </td>
                </tr>
                <tr>
                    <td>
                        company Address
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Texable Marital Status:</b>1
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Examptions/Allowances:</b>F
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Federal:</b>
                    </td>
                </tr>

            </table>
        </div>
        <div class="cols2">
            <h3>Earnings Statement</h3>
            <table style="width:100%;">
                <tr>
                    <td><b>Period Start:</b>23/12/2023</td>
                </tr>
                <tr>
                    <td><b>Period Start:</b>23/12/2023</td>
                </tr>
                <tr>
                    <td><b>Pay Ending:</b>23/12/2023</td>
                </tr>
                <tr>
                    <td>emp Address</br>zipCode</td>
                </tr>
                <tr>
                    <td>********-3333</td>
                </tr>

            </table>
        </div>
    </div>


    <section class="">
        <div class="row1 " style="margin-top: 60px;">
            <div class="column1">
                <table style="width: 100%;" class="tds">
                    <tr>
                        <td style="text-align: left;"><b>Earning</b></td>
                        <td><b>Rate</b></td>
                        <td><b>Hours</b></td>
                        <td><b>This Period</b></td>
                        <td><b>Year-to-date</b></td>

                    </tr>
                    {{-- @foreach ($requestData['earning'] as $key => $earn) --}}
                    <tr>
                        <td>REGULAR
                            {{-- {{ $earn }} --}}
                        </td>
                        <td>5000
                            {{-- {{ $requestData['rate'][$key] }} --}}
                        </td>
                        <td>34
                            {{-- {{ $requestData['hours'][$key] }} --}}
                        </td>
                        <td>353.45
                            {{-- {{ $requestData['period'][$key] }} --}}
                        </td>
                        <td>4534.5
                            {{-- {{ $requestData['ytd_total'][$key] }} --}}
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                    </br>
                    <tr>
                        <td></td>
                        <td colspan="2" class="borderback"<b>GROSS
                            PAY</b>
                        </td>
                        <td class="borderback">
                            <b> $45456
                                {{-- {{ $requestData['currency'] }}{{ $requestData['deduction_tax'] }} --}}
                            </b>
                        </td>
                        <td><b> 54455
                                {{-- {{ $requestData['ytd_deduction_tax'] }} --}}
                            </b></td>
                    </tr>

                </table>
            </div>

            <div class="column2">
                <table style="width:100%; text-align:left;">
                    <tr>
                        <td><b>Important Notes</b></td>
                    </tr>
                    <tr>
                        <td>EFFECTIVE THIS PAY PERIOD - REGUIAR</td>
                    </tr>
                    <tr>
                        <td>CURRENT PAY RATE IS: $15.00 PER HOUF</td>
                    </tr>
                    <tr>
                        <td>Company Telephone Number:2345678902
                            {{-- {{ $requestData['tel'] }} --}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>


    </section>

    </br></br>

    <section>

        <table style="width:60%;" class="tds">
            <thead>
                <th class="">Deductions</th>
                <th class="statutory">statutory</th>
            </thead>
            <td style="border-top:2px solid black;" colspan="16"></td>

            <tr>
                <td></td>
                <td class="td" colspan="2">Garnish</td>

                <td class="right">27.28</td>
                <td class="right">27.28</td>
            </tr>

            <tr>
                <td></td>
                <td class="td" colspan="2">Total deduction</td>
                <td class="right">27.28</td>
                <td class="right">27.28</td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" class="borderback" style="text-align:left;"><b>Net Pay</b></td>

                <td class="borderback">
                    <b>251.80</b>
                </td>

                <td><b>5669.58</b></td>
            </tr>

        </table>


    </section>

    <section>
        <table style="padding-top:10px;font-weight:bold; margin:0 auto 0 200px; text-align:center; width:50%;">
            <tr>
                <td>*Excluded from federal taxable wages</td>
            </tr>
        </table>
    </section>


    </br> </br> </br> </br> </br>

    <div class="container" style=" margin-top:50px; width:100%;">
        <div class="row">
            <div class="col1">
                <table style="width:100%;">
                    <tr>
                        <td><b>Paystubx United</b><br>1234 Heavan Rd<br>Suit 101<br>lvring, Houston 75011</td>
                    </tr>
                </table>
            </div>
            <div class="col2" style="text-align:right;">
                <table style="width:100%;">
                    <tr>
                        <td><b>Payroll check #:</b>09985178967</span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Pay Day:</b>04/04/23
                        </td>
                    </tr>

                </table>

            </div>
        </div>

        <table style="width: 100%; margin:auto;">
            <tr style="border-bottom: 1px solid;">
                <td></td>
                <td>Pay to the order off:</td>
                <td>Joe Milkom</td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td>This amount:</td>
                <td
                    style="padding: 3px 80px 3px 0px; border-left:none;  background-color: #98919145; border-right:2px solid #000; border-top:2px solid #000; border-bottom:2px solid #000; font-size:10px:">
                    Four
                    hundered seavnty two dollar fourty seavan cents</td>

                <td colspan="2" style=" text-align: right;">472.47</td>
            </tr>
        </table>

        </br></br>

        <table style="float: right; margin-right:130px; font-size:11px;">
            <tr>
                <td>VOID</td>
                <td>VOID</td>
                <td>VOID</td>
                <td style="padding-left: 70px;">AUTHORIZED SIGNATURE<br>VOID AFTER 90 DAYS</td>
            </tr>
        </table>

        </br> </br> </br>

        <table style="width:100%;">
            <tr>
                <td
                    style="font-size:14px; text-align:right; letter-spacing:1.5px; font-weight:bold; padding-right:15px;">
                    DIRECT DEPOSIT -
                    DO
                    NOT CASH - THIS IS
                    NOT A CHECK</td>
            </tr>
            </br>
            <tr>
                <td style="text-align:center; font-size:11px;">
                    <li style="list-style-type: square;">01235446 0005764948947474898</li>
                </td>
            </tr>

            <tr>
                <td style="text-align:left;">Natona, Ran<br>DO NOT CASH<br>RECORD ONLY</td>
            </tr>
        </table>


    </div>

</body>

</html>
