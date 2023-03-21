<!DOCTYPE html>
<html lang="en">

<head>
    <title>Uk pin #6166b1</title>
</head>
<style>
    body {
        color: black;
    }

    td {
        font-size: 15px;
    }

    th {
        font-size: 14px;
    }

    .center {
        text-align: center;
    }

    table.std {
        margin-top: 0.2cm;
        border: 0.03cm solid #4a50b2;
        border-spacing: 0;
        border-radius: 15px 15px 15px 15px;
        font-size: 10pt;

    }

    table.std thead {
        text-align: left;
        background-color: #4a50b2;
        height: 25px;
        color: white;
    }

    table.std thead tr th:first-child {

        border-radius: 15px 15px 0px 0px;
    }

    table.ltd {
        margin-top: 0.2cm;
        border: 0.03cm solid #4a50b2;
        border-spacing: 0;
        border-radius: 15px 15px 15px 15px;
        font-size: 10pt;
        height: ;
    }

    table.ltd thead {
        text-align: left;
        background-color: #4a50b2;
        height: ;
        color: white;
    }

    table.ltd thead tr th:first-child {

        border-radius: 15px 0px 0px 0px;
    }

    table.ltd thead tr th:last-child {

        border-radius: 0px 15px 0px 0px;
    }

    table.ltd thead tr th {
        text-align: center;
        padding: 0px 10px;
    }

    table.ltd tr td {
        text-align: center;
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

<body>
    <main class="bg-img2">
        @guest
            <div class="watermark"></div>
        @endguest
        @auth
            @if (Auth::user()->expiryDate == '' || !isset($requestData['watermark']))
                <div class="watermark"></div>
            @endif
        @endauth

        <section>
            <table style="width:100%; height:px;" class="ltd">
                <thead>
                    <tr>
                        <th style="border-right:1px solid #6166b1;">Employee No</th>
                        <th style="border-right:1px solid #6166b1;">Employee Name </th>
                        <th style="border-right:1px solid #6166b1;">Process Date </th>
                        <th> National Insurance Number</th>
                    </tr>
                </thead>
                <tr>
                    <td class="center" style="border-right:1px solid #6166b1;font-size:18px;color:#6f6f6f;text-transform:capitalize;">12345</td>
                    <td class="center" style="border-right:1px solid #6166b1;font-size:18px;color:#6f6f6f;text-transform:capitalize;">{{ $requestData['emp_name'] }}</td>
                    <td class="center" style="border-right:1px solid #6166b1;font-size:18px;color:#6f6f6f;text-transform:capitalize;">
                        {{ date('d/m/Y', strtotime($requestData['pay_date'])) }}</td>
                    <td class="center" style="font-size:18px;color:#6f6f6f;text-transform:capitalize;">{{ $requestData['ni_number'] }}</td>
                </tr>
            </table>
        </section>

        <section style="margin-top:1px;">
            <table style="width:59.8%; float:left; height:200px; background-color:#f4f4fc;" class="ltd">
                <thead>
                    <tr>
                        <th>Payments</th>
                        <th>Units</th>
                        <th>Rate</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                @foreach ($requestData['earning'] as $key => $earn)
                    <tr>
                        <td class="l-align" style="font-size:18px;color:#6f6f6f;text-transform:capitalize;">{{ $earn }}</td>
                        <td class="bold" style="font-size:18px;color:#6f6f6f;text-transform:capitalize;">{{ $requestData['hours'][$key] }}</td>
                        <td class="bold" style="font-size:18px;color:#6f6f6f;text-transform:capitalize;">{{ number_format($requestData['rate'][$key], 2) }}</td>
                        <td style="border-right:1px solid #0a2e7b;font-size:18px;color:#6f6f6f;text-transform:capitalize;" class="bold">
                            {{ number_format($requestData['total'][$key], 2) }}</td>
                    </tr>
                @endforeach
            </table>

            <table style="width:39.8%; float:right; height:200px;background-color:#f4f4fc;" class="ltd">

                <thead>
                    <tr>
                        <th colspan="4">Deductions</th>
                        <th>Amount</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($requestData['taxes'] ?? [] as $key => $taxes)
                        <tr>
                            <td colspan="4" style="font-size:18px;color:#6f6f6f;text-transform:capitalize;">{{ $taxes }}</td>
                            <td style="font-size:18px;color:#6f6f6f;text-transform:capitalize;">{{ number_format($requestData['taxes_rate'][$key], 2) }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </section>

        <section style="margin-top:210px; padding-bottom:0.5px; ">
            <table
                style="width:40%; float:left; border:1px solid #4a50b2; border-radius:10px; height: 195px; margin-top:10px; padding-left:10px;">
                <tr>
                    <td style="font-size:18px; text-transform:capitalize;color:#6f6f6f;">{{ $requestData['emp_name'] }}</td>
                </tr>
                <tr>
                    <td style="font-size:18px; text-transform:capitalize;color:#6f6f6f;">{{ $requestData['emp_street_1'] }}</td>
                </tr>
                <tr>
                    <td style="font-size:18px; text-transform:capitalize;color:#6f6f6f;">{{ $requestData['emp_street_2'] ?? '' }}</td>
                </tr>
                <tr>
                    <td style="font-size:18px; text-transform:capitalize;color:#6f6f6f;">{{ $requestData['emp_zip_code'] }}</td>
                </tr>
            </table>

            <table class="std" style="float:right; width:29.5%;  height:200px; margin-left:4px;">
                <thead>
                    <tr>
                        <th colspan=2>Year to Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="left" style="padding-left:20px;font-size:18px;color:#6f6f6f;">Pay</td>
                        <td style="text-align:right;padding-right:20px;font-size:18px;color:#6f6f6f;">{{ number_format($requestData['taxable_gross_pay'], 2) }}</td>
                    </tr>
                    <tr>

                        <td class="left" style="padding-left:20px; font-size:18px;color:#6f6f6f;">Pay Tax</td>
                        <td style="text-align:right;padding-right:20px;font-size:18px;color:#6f6f6f;">{{ number_format($requestData['deduction_tax'], 2) }}</td>
                    </tr>
                </tbody>

                {{-- <tbody>
                    <tr>
                        <td class="center">Net insurance</td>
                        <td>23140</td>
                    </tr>
                    <tr>
                        <td class="center">EE Pension</td>
                        <td>23140</td>
                    </tr>
                </tbody>

                <tbody>
                    <tr>
                        <td class="center">EE Pension</td>
                        <td>23140</td>
                    </tr>
                </tbody> --}}
            </table>


            <table class="std" style="float:right; height:200px; width:29.5%;">
                <thead>
                    <tr>
                        <th colspan=2>This Period</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="left"style="padding-left:20px;font-size:18px;color:#6f6f6f;">Pay</td>
                        <td style="text-align:right;padding-right:20px;font-size:18px;color:#6f6f6f;">{{ number_format($requestData['taxable_gross_pay'], 2) }}</td>
                    </tr>
                    <tr>

                        <td class="left" style="padding-left:20px;font-size:18px;color:#6f6f6f;">Pay Tax</td>
                        <td style="text-align:right;padding-right:20px;font-size:18px;color:#6f6f6f;">{{ number_format($requestData['deduction_tax'], 2) }}</td>
                    </tr>
                </tbody>

                {{-- <tbody>
                    <tr>
                        <td class="center">Net insurance</td>
                        <td>23140</td>
                    </tr>
                    <tr>
                        <td class="center">EE Pension</td>
                        <td>23140</td>
                    </tr>
                </tbody>

                <tbody>
                    <tr>
                        <td class="center">EE Pension</td>
                        <td>23140</td>
                    </tr>
                </tbody> --}}
            </table>

        </section>

        <section style="width: 100%; margin-top:220px;">
            <table style="width:69.7%; border:1px solid #4a50b2; border-radius:10px;">
                <tr>
                    <td style=" padding:5px 10px;line-height:1.5;font-size:14px;color:#464646;">{{ $requestData['cname'] }},
                        {{ $requestData['company_address' ?? ''] }}, UK<br> Pay Method -
                        {{ $requestData['payment_method'] }} Tax Code - {{ $requestData['tax_code'] }} Pay Period -
                        {{ $requestData['pay_type'] }} P - 10</td>
                </tr>
            </table>

            <table
                style="width:29.5%; float:right; border:1px solid #4a50b2; border-radius:10px; margin-top:-55px; padding:13px 10px 13px 10px; background-color:#f4f4fc;">
                <tr>
                    <td style="color:#4a50b2; font-size:18px; font-weight:800;">Net Pay</td>
                    <td><b style="text-align: right; font-size:18px;">{{ number_format($requestData['net_pay'], 2) }}</b></td>
                </tr>
            </table>
        </section>
    </main>

</body>

</html>
