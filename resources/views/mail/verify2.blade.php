<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.cdnfonts.com/css/myriad-pro');

        @font-face {
            font-family: 'Myriad Pro', sans-serif;
        }

        body {
            font-family: 'Myriad Pro', sans-serif;

        }

        .email-verification {
            padding: 10px;
            background-color: #eaeaea;

        }

        .logo {
            width: 100%;
            max-width: 80px;
            padding: 20px 70px;
            border: 2px solid #f26e20;
            background-color: #fff;
        }

        .footer-section {
            padding-top: 15px;
            background-color: #eaeaea;
        }

        table {
            width: 100%;
        }

        ul li {
            list-style: none;
        }

        ul.social-icons {
            padding: 0px 0px 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        ul.social-icons li {
            margin-right: 10px;
        }

        ul.social-icons li:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
    <main style=" max-width: 500px;margin:50px auto;background-color:#4472c4;padding:35px 20px;">
        <section class="email-verification">
            <table style="background-color:#fff;padding:10px 20px;">
                <tr>
                    <td style="text-align: center; position: relative; bottom:60px;"><img class="logo"
                            src="images/Paystub X.webp"></td>
                </tr>
                <tr>
                    <td style="text-align: center"><img src="images/laptop.png"></td>
                </tr>
                <tr>
                    <td style="color:#676767;font-weight:bold;padding-bottom:15px; padding-top:10px;font-size:15px;">Your
                        Paystubx E-Mail Verification</td>
                </tr>
                <tr>
                    <td style="font-size: 12px; color:rgba(86, 86,86,0.9); padding-bottom:15px;">You are one step closing to
                        accessing Paystub Acccount! Please enter the code below to confirm your email
                        address.</td>
                </tr>
                <tr>
                    <td style="letter-spacing: 4px; text-align:center;padding-bottom:15px;"><span
                            style="border:1px solid rgba(86, 86,86,0.6); ;padding:3px 6px;">{{$user_data['otp']}}</span></td>

                </tr>
                <tr>
                    <td style="color: rgba(86, 86,86,0.9); text-align:center;padding-bottom:20px;">This code expires in 24
                        hours.</td>
                </tr>
                <tr>
                    <td style="font-size: 12px; color:rgba(86, 86,86,0.9); padding-bottom:15px;">Use the verification code
                        provided to start using your paystubx account.if to did not make this request, please ignore this
                        email.</td>
                </tr>
                <tr>
                    <td style="color:rgba(86, 86,86,0.9); font-size:14px; ">Welcome,</td>
                </tr>
                <tr>
                    <td style="font-size: 14px;color:rgba(86, 86,86,0.9);"><b style="color: #000;">Paystub<span
                                style="color: red;">X</span></b> Support</td>
                </tr>
                <tr>
                    <td style="font-size: 14px; color:#4472c4;">support@paystubx.com</td>
                </tr>
            </table>
        </section>
        <section class="footer-section">
            <div class="footer-content">
                <p style="text-align: center;padding:0;">Create Pay stubs on the go!</p>
            </div>
            <div class="row" style="display: flex; justify-content:center;">
                <img style="max-width: 100px; height:30px; margin-right:10px;" src="images/1app.png">
                <img style="max-width: 100px; height:30px;" src="images/1google.png">
            </div>
            <div class="footer-content">
                <p style="text-align: center">Follow us on social media</p>
            </div>
            <ul class="social-icons">
                <li><a><img src="images/icons/fb.png"></a></li>
                <li><a><img src="images/icons/in.png"></a></li>
                <li><a><img src="images/icons/instagram.png"></a></li>
                <li><a><img src="images/icons/pin.png"></a></li>
                <li><a><img src="images/icons/twitter.png"></a></li>
                <li><a><img src="images/icons/youtube.png"></a></li>
            </ul>

        </section>
    </main>
</body>
</html>


