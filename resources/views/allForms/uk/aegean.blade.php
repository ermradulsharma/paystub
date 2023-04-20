<!DOCTYPE html>
<html lang="en">

<head>
    <title>Uk Basic tawny</title>


    <style>
 @import url('https://fonts.cdnfonts.com/css/myriad-pro');
 @font-face{
    font-family: 'Myriad Pro', sans-serif;
 }
        * {
            padding: 0px;
            margin: 0px;
        }

        td {
            font-size: 15px;
        }

        th {
            font-size: 13px;
        }

        .watermark {
            position: absolute;
            width: 100%;
            height: 700px;
            top: 50px;
            left: 0px;
            right: 0;
            background-image: url("http://44.202.105.74/user/water.png");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .bg-img2 {
            position: relative;
        }

    </style>
</head>

<body>
    <main class="bg-img2">
        @guest
        <div class="watermark"></div>
        @endguest
        @auth
        @if(Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
        <div class="watermark"></div>
        @endif
        @endauth

        <section style="width: 100%; background-color: #deecff; padding-top:30px;padding-bottom:60px;">
            <section style="width: 100%; margin-top:20px;">
                <table style="width: 99%; border:3px solid #0054ff; padding:5px; margin-left:5px; margin-right:5px; border-radius:7px;background: white;">
                    <thead>
                        <tr>
                            <th style="font-size:22px;font-weight:bold;text-transform: capitalize;font-family: 'Myriad Pro', sans-serif;"><b>{{ $requestData['cname'] ?? '' }}</b> </th>
                        </tr>
                        <tr>
                            <th style="text-transform: capitalize;font-size:16px; font-weight:bold;font-family: 'Myriad Pro', sans-serif;"> {{ $requestData['company_address'] ?? '' }}, United Kingdom </th>
                        </tr>
                    </thead>
                </table>
            </section>

            <section style="width:100%;">
                <table style="width: 29.3%; float:left; border:3px solid #0054ff; border-radius:7px; margin-top:150px; height:120px;margin-left:20px;position: relative; right:14px; padding-top:10px; margin-bottom:300px;background: white;">
                    <thead>
                        <tr>
                            <th style="text-align: left; font-size:20px;font-weight:bold; text-transform:capitalize;font-family: 'Myriad Pro', sans-serif; padding-left:10px;"><B>{{ $requestData['emp_name'] }}</B></th>
                        </tr>
                        <tr>
                            <td style="font-size:14px; text-transform:uppercase;font-family: 'Myriad Pro', sans-serif;padding-left:10px;">{{ $requestData['emp_street_1'] }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:14px; text-transform:uppercase;font-family: 'Myriad Pro', sans-serif;padding-left:10px;">{{ $requestData['emp_street_2'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td style="font-size:14px; text-transform:uppercase;font-family: 'Myriad Pro', sans-serif;padding-left:10px;">{{ $requestData['emp_zip_code'] }}</td>
                        </tr>
                    </thead>
                </table>


                <table style="width: 34%; float:right;  border:3px solid #0054ff; border-radius:7px; margin-top:10px; margin-left:6px;margin-right:6px;height:359px; background: white;padding-left:10px;">
                    <thead>
                        <tr>
                            <th style="font-size: 18px; text-align:right; padding-right:20px;font-family: 'Myriad Pro', sans-serif;"><b>Payments</b></th>
                        </tr>
                        @foreach ($requestData['earning'] as $key => $earn)
                        <tr>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;">{{ $earn }}</td>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;"><b>{{ number_format($requestData['total'][$key], 2) }}</b></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;"><b>Total Payments</b></td>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;"><b>{{ number_format($requestData['taxable_gross_pay'],2) }}</b></td>
                        </tr>
                        <br>
                        <tr>
                            <th style="font-size: 18px; text-align:right; padding-right:20px;font-family: 'Myriad Pro', sans-serif;"><b>Deductions</b></th>
                        </tr>
                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                        <tr>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;">{{ $taxes }}</td>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;"><b>{{ number_format($requestData['taxes_rate'][$key],2) }}</b></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;"><b>Total Deductions</b></td>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;"><b>{{ $requestData['deduction_tax'] }}</b></td>
                        </tr>
                    </thead>
                </table>

                <table style="width: 34%; float:right; border:3px solid #0054ff; border-radius:7px; margin-top:10px;margin-bottom:20px; padding-left:10px; height:200px; background: white;">
                    <thead>
                        <tr>
                            <td style="font-size: 16px;font-family: 'Myriad Pro', sans-serif;">Pay Period</td>
                            <td style="font-size: 15px;text-transform: capitalize;font-family: 'Myriad Pro', sans-serif;"><b>wk 39</b></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;font-family: 'Myriad Pro', sans-serif;">Pay Date</td>
                            <td style="font-size: 15px;text-transform: capitalize;font-family: 'Myriad Pro', sans-serif;"><b>{{ date('d-F-Y', strtotime($requestData['pay_date'])) }}</b></td>
                        </tr>
                        <tr>
                            <td style="font-size: 15px;text-transform: capitalize;font-family: 'Myriad Pro', sans-serif;">Pay Type</td>
                            <td style="font-size: 15px;text-transform: capitalize;font-family: 'Myriad Pro', sans-serif;"><b>{{ $requestData['pay_type'] }}</b></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;font-family: 'Myriad Pro', sans-serif;">Payment Method</td>
                            <td style="font-size: 15px;text-transform:uppercase;font-family: 'Myriad Pro', sans-serif;"><b>{{ $requestData['payment_method'] }}</b></td>
                        </tr>
                       <br>

                        <tr>
                            <td style="font-size: 16px;font-family: 'Myriad Pro', sans-serif;">Tax Code</td>
                            <td style="font-size: 15px;text-transform:uppercase;font-family: 'Myriad Pro', sans-serif;"><b>{{ $requestData['tax_code'] }}</b></td>
                        </tr>

                        <tr>
                            <td style="font-size: 16px;font-family: 'Myriad Pro', sans-serif;">NI Number</td>
                            <td style="font-size: 15px;text-transform:uppercase;font-family: 'Myriad Pro', sans-serif;"><b>{{ $requestData['ni_number'] }}</b></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;font-family: 'Myriad Pro', sans-serif;">NI Table Letter</td>
                            <td style="font-size: 15px;text-transform:uppercase;font-family: 'Myriad Pro', sans-serif;"><b>{{ $requestData['ni_table_letter'] }}</b></td>
                        </tr>

                    </thead>
                </table>
            </section>

            <section style="width: 100%;">
                <table style="width: 30%; margin-top:300px; height:60px; ">
                    <thead style="margin-top:20px;">
                        <tr>
                            <td style="text-align: center; font-size: 9.5px;font-family: 'Myriad Pro', sans-serif; ">1.25% Uplifts in NICs funds NHS, Health & Social Care</td>
                        </tr>
                    </thead>
                </table>
                <table style="width: 34%;  float:right; border:3px solid #0054ff; border-radius:7px; margin-top: -138px; height:150px;background: white;padding-left:10px;">
                    <thead>
                        <tr>
                            <th style="font-size:18px;text-transform: capitalize; text-align:right; font-family: 'Myriad Pro', sans-serif;"><b>Year To Date</b></th>
                        </tr>
                        <tr>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;">Taxable Gross Pay</td>
                            <td style="text-align: right; font-size:16px; padding-right:10px;font-family: 'Myriad Pro', sans-serif;"><b>{{ number_format($requestData['taxable_gross_pay'],2) }}</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;">Income Tax</td>
                            <td style="text-align: right; font-size:16px; padding-right:10px;font-family: 'Myriad Pro', sans-serif;"><b>{{ number_format($requestData['income_tax'],2) }}</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;">Employee NIC</td>
                            <td style="text-align: right; font-size:16px; padding-right:10px;font-family: 'Myriad Pro', sans-serif;"><b>{{ number_format($requestData['employee_nic'],2) }}</b></td>
                        </tr>
                        <tr>
                            <td style="font-size:16px;font-family: 'Myriad Pro', sans-serif;">Employer NIC</td>
                            <td style="text-align: right; font-size:16px; padding-right:10px;font-family: 'Myriad Pro', sans-serif;"><b>{{ number_format($requestData['employer_nic'],2) }}</b></td>
                        </tr>
                    </thead>
                </table>
            </section>
            <section style="width: 100%;">
                <table style="width:65%; border:3px solid #0054ff; border-radius:7px;margin-top:25px; margin-left:6px;background: white;">
                    <thead style="text-align:left; border-radius:7px;">
                        <td style="padding: 15px;font-size:22px;text-transform: capitalize;padding: 12px 10px;font-family: 'Myriad Pro', sans-serif;">Additional Information Here (Note)</td>
                    </thead>
                </table>

                <table style="width:33%; float:right; border:3px solid #0054ff; border-radius:7px; text-align: left;margin-top: -62px; margin-right: 5px;background: white;">
                    <thead style="">
                        <th style="text-align:left;padding: 12px 10px; font-size:22px;font-weight:bold;font-family: 'Myriad Pro', sans-serif;"><b>Net Pay</b></th>
                        <th style="font-size:22px;font-weight:bold;font-family: 'Myriad Pro', sans-serif;"><b>{{ number_format($requestData['net_pay'],2) }}</b></th>
                    </thead>
                </table>
            </section>
        </section>
    </main>
</body>
</html>
