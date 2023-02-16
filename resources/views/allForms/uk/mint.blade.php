<!DOCTYPE html>
<html lang="en">

<head>
    <title>Uk Basic tawny</title>

    <style>
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

        <section style="width: 100%; background-color: #dfffeb; padding-top:30px;padding-bottom:60px;">
            <section style="width: 100%; margin-top:20px;">
                <table style="width: 99%; border:1px solid #00ff43; padding:5px; margin-left:5px; margin-right:5px; border-radius:7px;background: white;">
                    <thead>
                        <tr>
                            <th style="font-size:16px"><b>{{ $requestData['cname'] }}</b>
                            </th>
                        </tr>
                        <tr>
                            <th> {{ $requestData['company_address'] }}, United Kingdom </th>
                        </tr>
                    </thead>
                </table>
            </section>

            <section style="width:100%;">
                <table style="width: 27%; float:left; border:1px solid #00ff43; border-radius:7px; margin-top:150px; height:120px;margin-left:20px;padding-left:20px; padding-top:10px; margin-bottom:300px;background: white;">
                    <thead>
                        <tr>
                            <th style="text-align: left; font-size:15px;"><B>{{ $requestData['emp_name'] }}</B></th>
                        </tr>
                        <tr>
                            <td>{{ $requestData['emp_street_1'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $requestData['emp_street_2'] }}</td>
                        </tr>
                        <tr>
                            <td>{{ $requestData['emp_zip_code'] }}</td>
                        </tr>
                    </thead>

                </table>


                <table style="width: 34%; float:right;  border:1px solid #00ff43; border-radius:7px; margin-top:10px; margin-left:6px;margin-right:6px;height:359px; background: white;padding-left:10px;">
                    <thead>
                        <tr>
                            <th style="font-size: 15px; text-align:center;"><b>Payments</b></th>
                        </tr>
                        @foreach ($requestData['earning'] as $key => $earn)
                        <tr>
                            <td>{{ $earn }}</td>
                            <td>{{ number_format($requestData['total'][$key], 2) }}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td><b>Total Payment</b></td>
                            <td><b>{{ number_format($requestData['taxable_gross_pay'],2) }}</b></td>
                        </tr>
                        <tr>
                            <th style="font-size: 15px; text-align:center;"><b>Deductions</b></th>
                        </tr>
                        @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                        <tr>
                            <td>{{ $taxes }}</td>
                            <td>{{ number_format($requestData['taxes_rate'][$key],2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td><b>Total Deductions</b></td>
                            <td><b>{{ number_format($requestData['deduction_tax'],2) }}</b></td>
                        </tr>
                    </thead>
                </table>

                <table style="width: 34%; float:right; border:1px solid #00ff43; border-radius:7px; margin-top:10px;margin-bottom:20px; padding-left:10px; height:200px; background: white;">
                    <thead>
                        <tr>
                            <td>Pay Period</td>
                            <td><b>wk 39</b></td>
                        </tr>
                        <tr>
                            <td>Pay Date</td>
                            <td><b>{{ date('d-F-Y', strtotime($requestData['pay_date'])) }}</b></td>
                        </tr>
                        <tr>
                            <td>Pay Type</td>
                            <td><b>{{ $requestData['pay_type'] }}</b></td>
                        </tr>
                        <tr>
                            <td>Payment Method</td>
                            <td><b>{{ $requestData['payment_method'] }}</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Tax Code</td>
                            <td><b>{{ $requestData['tax_code'] }}</b></td>
                        </tr>

                        <tr>
                            <td>NI Number</td>
                            <td><b>{{ $requestData['ni_number'] }}</b></td>
                        </tr>
                        <tr>
                            <td>NI Table Letter</td>
                            <td><b>{{ $requestData['ni_table_letter'] }}</b></td>
                        </tr>

                    </thead>
                </table>
            </section>

            <section style="width: 100%;">

                <table style="width: 30%; margin-top:300px; height:60px; ">
                    <thead style="margin-top:20px;">
                        <tr>
                            <td style="text-align: center; font-size: 10px; ">1.25% Uplifts in NICs funds NHS, Health & Social Care</td>
                        </tr>
                    </thead>
                </table>




                <table style="width: 34%;  float:right; border:1px solid #00ff43; border-radius:7px; margin-top: -145px; height:150px;background: white;padding-left:10px;">
                    <thead>
                        <tr>
                            <th style="font-size:15px;"><b>Year To Date</b></th>
                        </tr>
                        <tr>
                            <td>Taxable Gross Pay</td>
                            <td style="text-align: right;"><b>{{ number_format($requestData['taxable_gross_pay'],2) }}</b></td>
                        </tr>
                        <tr>
                            <td>Income Tax</td>
                            <td style="text-align: right;"><b>{{ number_format($requestData['income_tax'],2) }}</b></td>
                        </tr>
                        <tr>
                            <td>Employee NIC</td>
                            <td style="text-align: right;"><b>{{ number_format($requestData['employee_nic'],2) }}</b></td>
                        </tr>
                        <tr>
                            <td>Employee NIC</td>
                            <td style="text-align: right;"><b>{{ number_format($requestData['employer_nic'],2) }}</b></td>
                        </tr>
                    </thead>
                </table>

            </section>


            <section style="width: 100%;">
                <table style="width:60%; border:1px solid #00ff43; border-radius:7px;margin-top:13px; margin-left:35px;background: white;">
                    <thead style="text-align:left; border-radius:7px;">
                        <td style="padding: 15px;">Additional Information Here (Note)</td>
                    </thead>
                </table>

                <table style="width:34%; float:right; border:1px solid #00ff43; border-radius:7px; text-align: left;margin-top: -52px; margin-right: 5px;background: white;">
                    <thead style="">
                        <th style="text-align:left;padding: 16px 10px; font-size:15px;"><b>Net Pay</b></th>
                        <th style="font-size:16px;"><b>{{ number_format($requestData['net_pay'],2) }}</b></th>
                    </thead>
                </table>
            </section>
        </section>
    </main>
</body>

</html>
