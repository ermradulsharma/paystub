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
            border: 1px solid #464646;
            border-collapse: collapse;
        }

        #regular {
            border-bottom: none;
        }

        th {
            font-size: 13px;
        }

        td {
            font-size: 15px;
            padding: 2px;
        }

        #cols {
            border-right: 1px solid #464646;
            border-collapse: collapse;
            text-align: center;
        }

        .head1 {
            padding-top: 5px;
        }

        .head2 {
            padding-bottom: 10px;
        }

        .padding {
            padding: 5px 3px;
        }

        #colourborder {
            background-color: #264fab;
        }

        #fica {
            font-size: 14px;
        }

    </style>
</head>

<body>
    <div style="max-width: 100%; margin: auto; padding: 0px 20px;">
        <table style="width:100%;">
            <thead style="border:none;color:white; background-color:darkgrey;">
                <th style="font-size: 16px;text-align: left;padding-left: 25px;">BankApp</th>
                <th style="font-size: 20px;padding-top:10px;text-align: right;padding-right: 12px;padding-bottom: none;">
                    Earnings Statement</th>

            </thead>
            <tr style="color:white; background-color:darkgrey; ">
                <td style="font-size: 16px;padding-left: 24px;padding-bottom: 12px; " colspan="2">255 Esters Rd,
                    Fairfield, OH 45014</td>
            </tr>
        </table>
        <table style="width:100%;">

            <thead>
                <th class="padding" colspan="2" style="text-align: center;">
                    MIKE MOOR
                </th>
                <td class="padding" colspan="6" style="text-align: center; border-right:1px solid black;">
                    255 Esters Rd, Fairfield, OH 45014
                </td>


            </thead>
            <thead id="colourborder">
                <th class="padding" colspan="2"> EMPLOYEE ID </th>
                <th class="padding" colspan="3"> PERIOD ENDING </th>
                <th class="padding"> PAY DATE </th>
                <th class="padding">CHECK NUMBER</th>
            </thead>
            <tr>
                <td class="padding" id="colsborder" colspan="2" style="border:2px solid  #464646; text-align:center;">575785</td>
                <td class="padding" style="border:2px solid  #464646; text-align:center;" colspan="3">23/1/2023 - 24/1/2023</td>
                <td class="padding" style="border:2px solid  #464646; text-align:center;">25/1/2023</td>
                <td class="padding" style="border:2px solid  #464646; text-align:center;">254236</td>
            </tr>
            <thead id="colourborder">
                <th class="padding">INCOME</th>
                <th class="padding" >RATE</th>
                <th class="padding">HOURS</th>
                <th class="padding">CURRENT TOTAL</th>
                <th class="padding">DEDUCTION</th>
                <th class="padding">CURRENT TOTAL</th>
                <th class="padding" colspan="2">YEAR TO DATE</th>
            </thead>
        </table>

        <section style="width: 100%; background-color:#dce6f1; border:1px solid  #464646;">
            <table id="regular" style="width:50%; float: left;">
                <tbody>

                    <tr>
                        <td style="" id="fica">Regular</td>
                        <td style="">50.00</td>

                        <td style="">45.00</td>
                        <td style="">$ 2250.00</td>


                    </tr>
                    <tr>
                        <td id="fica" style="">Overtime</td>
                        <td style="text-align:left;">50.00</td>

                        <td>45.00</td>
                        <td>$ 2250.00</td>


                    </tr>
                    <tr>
                        <td id="fica">Vacation</td>
                        <td>50.00</td>

                        <td>45.00</td>
                        <td>$ 2250.00</td>


                    </tr>
                </tbody>
            </table>

            <table style="width:50%; float: right;  ">
                <tbody>

                    <tr>
                        <td style="text-transform: uppercase; width:14px; font-size:13px;">fica-medicare</td>
                        <td>50.00</td>
                        <td>45.00</td>
                    </tr>
                    <tr>
                        <td style="text-transform: uppercase;" id="fica">fica-social</td>
                        <td>50.00</td>
                        <td>45.00</td>

                    </tr>
                    <tr>
                        <td style="text-transform: uppercase;" id="fica">federa-tax</td>
                        <td>50.00</td>
                        <td>45.00</td>

                    </tr>
                    <tr>
                        <td style="text-transform: uppercase;" id="fica">state-tax</td>
                        <td>50.00</td>
                        <td>45.00</td>

                    </tr>
                    <tr>
                        <td style="text-transform: uppercase;" id="fica">life-insurance</td>
                        <td>50.00</td>
                        <td>45.00</td>

                    </tr>
                    <tr>
                        <td style="text-transform: uppercase;" id="fica">Canadasavingb</td>
                        <td>50.00</td>
                        <td>45.00</td>

                    </tr>
                </tbody>
            </table>



            <table id="bottomtable" style="width:100%; margin-top:135px; border:1px solid  #464646; background-color:white;">
                <tr class="">
                    <th id="cols" class="head1">YTD GROSS</th>
                    <th id="cols" class="head1">YTD EDUCATION</th>
<<<<<<< HEAD
                    <th id="cols" class="head1"> YTD<BR>NET PAY</th>
=======
                    <th id="cols" class="head1">NET PAY</th>
>>>>>>> dc01a9fda6cc84051e16eb3c79c51ee84422ed1a
                    <th id="cols" class="head1">CURRENT TOTAL</th>
                    <th id="cols" class="head1">DEDUCTION</th>
                    <th id="cols" class="head1">NET PAY</th>
                </tr>

                <tr class="ytd">
                    <td id="cols" class="head2">39,565</td>
                    <td id="cols" class="head2">23,455</td>
                    <td id="cols" class="head2">53,454</td>
                    <td id="cols" class="head2">34,533</td>
                    <td id="cols" class="head2">23,455</td>
                    <td id="cols" class="head2">56,664</td>
                </tr>
            </table>

        </section>





    </div>










</body>

</html>