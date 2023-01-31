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
        padding-top: 20px;
        padding-bottom: 20px;
        
    }
    .bg-img {
        position: relative;
    }
    .bg-img:before {
        background: url("{{ asset('assets/img/check.png') }}")  !important;
        background-repeat: no-repeat !important;
        background-size: contain !important;
        height: 100%;
        width: 100%;    
        content:"";
        top: 200px;
        left: 0px;
        right: 0;
        position:absolute;

    }
    .container {
    position: absolute;
    bottom: 0;
}

    .section_2 {

        background: #5AA6BA;
        color: white;
        height: 90px;
        overflow: hidden;
    }
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

        text-align: left;
        /* padding: 8px; */
    }

    .data:nth-child(2) {
        background-color: #edededc4;
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
    </style>

</head>

<body>
    <main class="bg-img">
    <section class="invoiceborder">
        <table>
            <tr>
                <th style="padding-left: 31px;"> qwertyui</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td class="address" style="padding-left: 31px;">
                    5528 Austin HWY <br>
                    jamaica NY 11433 <br>
                    USA

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
                <th class="earning">Earning statement</th>
            </tr>
            <tr>
                <td></td>

                <td></td>
                <td></td>
                <td></td>
                <td>
                    <p class="earning"> pay period: Jan 01, 2021 toJan 07, 2021 <br> pay date: Jan 31, 2021
                    </p>
                </td>

            </tr>


        </table>
        <section class="section_2">
            <table>
                <tr>
                    <th>SSN: XXX-XX-1236</th>
                    <th class="earning">Ezra moore</th>
                </tr>
                <tr>
                    <td style=" padding: 9px;">
                        Stub no: 1112
                    </td>
                    <td class="earning">
                        Emp Id :11562 <br>
                        1234 heaven rd ,houston Tx 75011
                    </td>
                </tr>
            </table>
        </section>
        <section class="tablesection">
            <table>
                <tr>
                    <th class="heading1">Earnings</th>
                    <th class="heading1"> Rate</th>
                    <th class="heading1">Hours</th>
                    <th class="heading1">This Period</th>
                    <th class="heading1">YTD</th>
                </tr>
                <tr>
                    <td>Regular earning</td>
                    <td>$100.00</td>
                    <td>40</td>
                    <td>$4000.00</td>
                    <td>$20000.00</td>

                </tr>
                <tr>
                    <td>Regular earning</td>
                    <td>$100.00</td>
                    <td>40</td>
                    <td>$4000.00</td>
                    <td>$20000.00</td>
                </tr>

                <tr style="padding-top: -200px;">

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tfoot class="tfooter" style="background:#5AA6BA; color:white">
                    <tr>
                        <th colspan="3"></th>
                        <th style="font-weight: 100;">$4000.00</th>
                        <th style=" font-weight: 100;">$20000.00</th>
                    </tr>
                </tfoot>
            </table>
        </section>
        <section class="tablesection">
            <table class="heading">
                <tr>
                    <th class="heading1">Taxes / Deduction</th>
                    <th class="heading1"> Type</th>

                    <th class="heading1">This Period</th>
                    <th class="heading1">YTD</th>
                </tr>
                <tr>
                    <td></td>
                    <td class="data">
                        <p style="word-spacing: normal;">
                            Federal withholding
                        </p>
                        <p>FICA - Social security</p>
                        <p>FICA - Medicare</p>
                        <p>State withholding</p>
                        <p>
                            <b>
                                Epmloyeer Taxes
                            </b>
                        </p>
                        <p>
                            FUTA
                        </p>
                        <p>
                            SUTA
                        </p>
                    </td>
                    <td>

                        <p>
                            $400.00
                        </p>
                        <p>
                            $400.00
                        </p>
                        <p>
                            $400.00
                        </p>
                        <p>
                            $400.00
                        </p>

                        <br>

                        <p>
                            $400.00
                        </p>
                        <p>
                            $400.00
                        </p>
                    </td>
                    <td>

                        <p>
                            $400.00
                        </p>
                        <p>
                            $400.00
                        </p>
                        <p>
                            $400.00
                        </p>
                        <p>
                            $400.00
                        </p>

                        <br>

                        <p>
                            $400.00
                        </p>
                        <p>
                            $400.00
                        </p>



                    </td>

                </tr>




                <tr>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>



                <tfoot class="tfooter " style="background:#5AA6BA; color:white">

                    <tr>
                        <th colspan="2">Net Pay</th>
                        <th style="font-weight: 100;">$4000.00</th>
                        <th style=" font-weight: 100;">$20000.00</th>
                    </tr>
                </tfoot>
            </table>
  <p>
            Your Taxes and deductions for this period are $5454.54
        </p>

        </section>




        <div class="container" style=" margin-top:100px; width:100%; border:1px solid black;">
            <div class="row" style="display: flex;justify-content: space-between;padding: 0px 14px;">
                <div style="width: 50%;float:left;">
                    <h6 style="font-size: 17px; margin-bottom: 10px;">Paystubs Company, INC</h6>
                    <p style="font-size: 13px; margin: 0;">55 NORTHERN BLVD</p>
                    <P style="font-size: 13px; margin: 0;">SUIT 206</P>
                    <P style="font-size: 13px; margin: 0;">GREAT NECK, FAIRFIELD 45014</P>
                </div>
                <div style="width: 50%;float:right;text-align:right;">
                    <h6 style="font-size: 14px; margin-bottom: 0;">Advice Number: <span>00000422598</span>
                    </h6>
                    <p>
                        <span style="font-weight:800;">Pay Day:</span> 04/04/20
                    </p>
                </div>
            </div>
            <table style="width: 100%; margin: 140px 0 0 auto;">
                <tr style="border-bottom: 1px solid;">
                    <td colspan="4"></td>
                    <td>Deposite to the Account off</td>
                    <td style="text-align: right;">Account Number</td>
                    <td style="text-align: right;">Transit ABA </td>
                    <td style="text-align: right;">Amount   </td>
                </tr>

                <tr>
                    <td colspan="4"></td>
                    <td>Erza Moore</td>
                    <td style="text-align: right;">XX567</td>
                    <td style="text-align: right;">XXX567</td>
                    <td style="text-align: right;"></td>
                </tr>
            </table>
        </div>
    </section>
</main>
</body>

</html>
