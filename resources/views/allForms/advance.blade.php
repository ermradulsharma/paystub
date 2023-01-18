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
            border: 1px solid black;
            border-collapse: collapse;
        }

        .hadding,
        .hadding {
            padding: 5px;
            text-align: left;
        }
    </style>

</head>

<body>

    <section class="invoiceborder">
        <table>
            <tr>
                <th style="padding-left: 31px;font-size: 27px;">Paystubx, INC</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>


            <tr>
                <td class="address" style="padding-left: 31px;">

                    4722 Park Avenue <br>
                    Sacramento, CA 95817
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
                        January 1, 2023
                    </p>
                </td>

            </tr>


        </table>




        <section class="section_2">
            <table>
                <tr>
                    <th style="
    font-weight: 100;
">Pay One Thousand Six Hundred Seventy-six And One Cents</th>
                    <th class="earning">$ 1,676.01</th>
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


        <section style="padding-top: 16px;">
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <td colspan="4" style=" padding-top: 22px;">
                                Pay to the order of
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col">

                    <table>
                        <tr>
                            <td >
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
            </div>
        </section>


        <section>

            <table>
                <tr>
                    <th colspan="4" style="padding-top: 41px;">Company Intormation</th>

                </tr>


                <tr>
                    <td colspan="4" class="address" style="padding-left: 11px;">

                        Paystubx, INC <br>
                        4722 Park Avenue Sacramento, CA 95817 <br>
                        916-455-960/
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
                    <td>Gary Stingley <br>
                        3368 Hillview Drive <br>
                        Santa Rosa, CA 95407</td>
                    <td>XXX-XX-0891</td>
                    <td>1588455</td>
                    <td>12/16/2023</td>
                    <td>12/29/2023</td>
                    <td>01/01/2023</td>

                </tr>



            </table>
        </section>
        <section class="tablesection">
            <table class="heading">
                <tr>
                    <th class="heading1">Earnings</th>
                    <th class="heading1"> Rate</th>

                    <th class="heading1">Hours</th>
                    <th class="heading1">Current</th>
                    <th class="heading1">Year to date</th>
                    <th class="heading1">Deductions</th>
                    <th class="heading1">Current</th>
                    <th class="heading1">Year to date</th>
                </tr>
                <tr>
                    <td>Regular Earnings
                        Overtime</td>
                    <td>57.69</td>
                    <td>40.00</td>
                    <td>2,307.69</td>

                    <td>

                        2.307.69
                    </td>
                    <td class="data">
                        <p>
                            Fica - Medicare <br>
                            Fica - Social Security <br>
                            Federal Tax <br>
                            State Tax
                        </p>
                    </td>
                    <td>

                        335.10 <br>
                        99.27 <br>
                        20.77 <br>
                        143.08

                    </td>
                    <td>

                        335.10 <br>
                        99.27 <br>
                        20.77 <br>
                        143.08
                    </td>

                </tr>




                <tr>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>



                <tfoot class="tfooter " style="background: #5ae4f8; color:white">

                    <tr>
                        <th style="
    background: #264FAB;
">Gross Earninas</th>
                        <th class="section" style="font-weight: 100;"></th>
                        <th class="section" style="font-weight: 100;"></th>
                        <th class="section" style="font-weight: 100;">$4000.00</th>
                        <th class="section" style=" font-weight: 100;">$20000.00</th>
                        <th style="
    background: #264FAB;
" class="section" style=" font-weight: 100;">$20000.00</th>
                        <th class="section" style=" font-weight: 100;">$20000.00</th>
                        <th class="section" style=" font-weight: 100;">$20000.00</th>
                    </tr>
                </tfoot>
            </table>

        
                
           
                
        </section>

    </section>

    <table  class="tabl3" style="width:30%;float: right;">

<tr>
    <th class="hadding" style="
    background: #264FAB;
    color:white;
"> Check No</th>
    <td class="hadding section" style="
    text-align: right;
">2023558</td>

<tr>

<tr>
    <th class="hadding " style="
    background: #264FAB;
    color:white;
"> Net Pav</th>
    <td class="hadding section" style="
    text-align: right;
">$ 1.676.01</td>
</tr>
<tr>
    <th class="hadding" style="
    background: #264FAB;
    color:white;
"> YTD Net Pav</th>
    <td class="hadding section" style="
    text-align: right;
">2023558</td>
</tr>



</table>
</body>

</html>