<!DOCTYPE html>
<html lang="en">

<head>
    <title>paystubs-prior</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    td {

        font-size: 13px;
        padding: 6px;
    }

    th {
        font-size: 13px;
    }
</style>

<body>

    <table style="width: 100%;">
        <tr style="">
            <td style="font-size:38px; font-weight:800; padding-left:90px;">{{ $requestData['cname'] }}</td>
            <td></td>
            <td style="font-size:18px; padding-right:90px;font-weight:800;">No: {{ $requestData['emp_ssn'] }}</td>
        </tr>
        <tr>   <br>
             
            <td style="padding-left:90px; padding-top:0px; font-weight:800;">  
            {{ $requestData['address_1'] }}
            <!-- 1701 leagacy Dr Ste 470 -->
        </td>
        </tr>
        <tr>
            <td style="padding-left:90px;padding-top:0px; font-weight:800;"> 
            {{ $requestData['city'] }} {{ $requestData['state'] }}, {{ $requestData['zip_code'] }}
            <!-- Frisco, TX 75034 -->
            <td>
            <td style="font-size:18px;">Date: 12/13/2023</td>
        </tr>
        <tr style="padding-top:4px;">

            <td style="font-size: 23px;"    >
                <h5>
                    Pay TO The <br>Order Of <span style="border-bottom: 1px solid black;  padding-left:90px;   height:20px">{{$requestData['emp_name']}}</span>
                </h5>
                <span style="border-bottom: 1px solid black;  padding-left:90px;">Seven Thousand One Hundred Forty-Five and 63/100</span>
            </td>
            <td style="
    font-size: 22px;
">$ **7.145.63</td>
        
    </table>


    <table style="width: 100%;padding-top:60px;margin-top: 30px;">

        <tr>
            
            <td style="font-size:18px;">Memo: </td>
            <td colspan="2" style="
    font-size: 24px;
    font-family: sans-serif;
">FOR RECORDS PURPOSES ONLY</td>
            <td>-----------------------------------------------------------------------------------------------------</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-top:30px;text-align: center;">98745687T58T43098584598</td>
        </tr>
    </table>


    <table style="width: 100%; padding: top 40px; margin-top: 30px;">
        <tr style="">
            <td style="font-weight: 800; font-size:14px; margin-top:200px;">
            <!-- Paystubs -->
            {{ $requestData['cname'] }}
        </td>
            <td style="font-weight: 800;">{{ $requestData['emp_name'] }}</td>
            <td>SSN</td>
            <td>XXX-XX-{{ $requestData['emp_ssn'] }}</td>
            <td>Period Beginning</td>
            <td>11/12/202</td>
        </tr>
        <tr>
            <td style="margin: 0; padding:0;"> {{ $requestData['address_1'] }}</td>
            <td style="margin: 0; padding:0;">{{ $requestData['emp_street_1'] }}</td>
            <td>Gross Pay</td>
            <td>$9.928.00</td>
            <td>Period Ending</td>
            <td>11/12/202</td>
        </tr>
        <tr>
            <td>{{ $requestData['address_2'] }}</td>
            <td>{{ $requestData['emp_street_1'] }}</td>
            <td>Net Pay</td>
            <td>$7.928.00</td>
            <td>Check Date</td>
            <td>11/25/202</td>
        </tr>
        <tr>
            <td>{{ $requestData['tel'] }}</td>
            <td></td>
            <td>Filling Status</td>
            <td>$3.00</td>
            <td>Check No</td>
            <td>12345</td>
        </tr>
    </table>



    <table style="width: 100%;">
        <tr style="border-top: 1px solid; border-bottom:1px solid;">
            <td>Earning</td>
            <td>Hours/Rate</td>
            <td>Amount</td>
            <td>YTD Amt</td>
            <td>Taxes/Deductions</td>
            <td>Amount</td>
            <td>YTD Amt</td>
        </tr>
        <tr>
            <td>Salary</td>
            <td></td>
            <td>$9.28.00</td>
            <td>$567.28.00</td>
            <td>Fed Income Tax</td>
            <td>$9.28.00</td>
            <td>$567.28.00</td>
        </tr>

        <tr>
            <td>Regular Hourly Pay</td>
            <td>0.00</td>
            <td>$0.00</td>
            <td>$0.00</td>
            <td> Social Security Tax</td>
            <td>$0.00</td>
            <td>$567.28.00</td>
        </tr>
        <tr>
            <td>Overtime Hourly Pay</td>
            <td>0.00</td>
            <td>$0.00</td>
            <td>$0.00</td>
            <td>Medicare Tax</td>
            <td>$162.67</td>
            <td>$567.28.00</td>
        </tr>

        <tr>
            <td>Sick Hourly Pay</td>
            <td>0.00</td>
            <td>$0.00</td>
            <td>$2.890.00</td>
            <td>State Income Tax</td>
            <td>$0.00</td>
            <td>$0.00</td>
        </tr>

        <tr>
            <td>Vacation Hourly Pay</td>
            <td>0.00</td>
            <td>$0.00</td>
            <td>$9.890.00</td>
            <td>Local Income Tax</td>
            <td>$0.00</td>
            <td>$0.00</td>
        </tr>

        <tr>
            <td>Mileage</td>
            <td></td>
            <td>$0.00</td>
            <td>$0.00</td>
            <td>Health Insurance</td>
            <td>$67.80</td>
            <td>$89.9870</td>
        </tr>
        <tr>
            <td>Bonus</td>
            <td></td>
            <td>$0.00</td>
            <td>$0.00</td>
            <td>401K</td>
            <td>$67.80</td>
            <td>$89.9870</td>
        </tr>

        <tr style="width: 100%; border-top:1px solid;">
            <td>Gross Pay</td>
            <td></td>
            <td>$9.5670</td>
            <td>$9.5670</td>
            <td>Pre Tax Dental</td>
            <td>$27.89</td>
            <td>$71.98</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Accl Deatd Dismemb</td>
            <td>$2.89</td>
            <td>$71.58</td>
        </tr>

        <tr style="border-top: 1px solid;">
            <td colspan="1"></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Net Pay</td>
            <td>$7.143.90</td>
            <td>$155.678.80</td>
        </tr>
    </table>

</body>

</html>