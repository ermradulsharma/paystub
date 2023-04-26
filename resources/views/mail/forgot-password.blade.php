<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>New Account Email Template</title>
    <script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>
    <meta name="description" content="New Account Email Template.">
    <style type="text/css">
        a:hover {
            text-decoration: underline !important;
        }

        @import url('https://fonts.cdnfonts.com/css/myriad-pro');

        @font-face {
            font-family: 'Myriad Pro', sans-serif;
        }

        body {
            font-family: 'Myriad Pro', sans-serif;

        }

        ul li {
            list-style: none;
        }

        .reset-button {
            padding: 6px 25px;
            background: #fd280a;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            text-decoration: none;
            display: inline-block;

        }
        .social-icons {
            width: 100%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            text-align: center;
            max-width: 190px;
        }


        .social-icons li {
            margin-left: 0px !important;
            margin-right: 8px;
        }

        .reset-button:hover {
            text-decoration: none !important;
        }
        @media(max-width:425px) {

            .bottom-icon {
                margin-right: 5px;
            }

            .bottom-icon:last-child {
                margin-right: 0px !important;
            }




        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #fff;" leftmargin="0">
    <section style="max-width: 700px; margin:0 auto;">

        <!-- 100% body table -->
        <table style="background-color: #f2f3f8; max-width:670px; margin:30px auto;padding-top:30px;" width="100%" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td style="text-align:center;padding-bottom:10px;">
                    <a style="max-width:200px;" target="_blank">
                        <img style="display: flex; margin: 0 auto;" width="200px;" src="{{asset('images/mail-logo.png')}}" title="logo" alt="logo">
                    </a>
                </td>
            </tr>
            <tr>
                <td style="height:15px;">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table width="95%" align="center" cellpadding="0" cellspacing="0"
                        style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                        <tr>
                            <td style="padding:0 20px;">
                                <h3 style="text-align: left;color:#686767; font-size:15px;">Hi
                                    {{ ucfirst($user_data['name'] ?? 'User') }}</h3>
                                <p
                                    style="font-size:13px; color:rgba(86, 86,86,0.9); margin:8px 0 0; line-height:24px;text-align:left;padding-bottom:25px;">
                                    We received a request to reset the password for your Paystubx account. Please click
                                    the button below to reset it. This password reset is valid only for the next 24
                                    hours. </p>
                                <p style="padding-bottom: 15px;color:#fff;"><a style="color:#fff !important;"
                                        href="{{ $user_data['link'] }}" class="reset-button" style="">Reset
                                        Password</a></p>
                                <p
                                    style="font-size:13px; color:rgba(86, 86,86,0.9); margin:8px 0 0; line-height:24px;text-align:left;padding-bottom:25px;">
                                    If you did not make this request, Please ignore this email.
                                </p>
                                <p
                                    style="padding: 0; margin:0;text-align:left;color:rgba(86, 86,86,0.9);line-height:1.7;">
                                    Thank you,</p>
                                <p
                                    style="padding: 0;margin:0;font-size: 14px;color:rgba(86, 86,86,0.9); text-align:left;line-height:1.7;">
                                    <b style="color: #004188;">Paystub<span style="color: red;">x </span></b></p>
                                <p
                                    style="padding: 0;margin:0;text-align:left;font-size: 14px; color:#0074bf;line-height:1.7;">
                                    <a href="mailto:support@paystubx.com">support@paystubx.com</a></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:40px;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="height:20px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <p style="font-size:13px;text-align: center;margin:0;padding:0 0 15px;color:rgba(86, 86,86,0.9)">
                        Create Pay stubs on the go! </p>
                        <p style="text-align: center;padding:0;margin:0;">
                            <a href="https://apps.apple.com/us/app/paystubx-paystub-maker/id1658931100" target="_blank"><img style="max-width: 100px; height:30px; margin-right:10px;" src="{{asset('images/1app.png')}}"></a>
                            <a href="https://play.google.com/store/apps/details?id=com.paystubx" target="_blank"><img style="max-width: 100px; height:30px;" src="{{asset('images/1google.png')}}"></a>
                        </p>
                    <p style="text-align: center;color:rgba(86, 86,86,0.9);font-size:13px;">Follow us on social media
                    </p>
                    <ul class="social-icons">
                        <li class="bottom-icon"><a target="_blank" href="https://www.facebook.com/paystubx"><img src="{{asset('images/icons/facebook.png')}}" height="35px" width="35px"></a></li>
                        <li class="bottom-icon"><a target="_blank" href="https://instagram.com/paystubx?igshid=YmMyMTA2M2Y="><img src="{{asset('images/icons/instagram.png')}}" height="35px" width="35px"></a></li>
                        <li class="bottom-icon"><a target="_blank" href="https://twitter.com/paystubx"><img src="{{asset('images/icons/twitter.png')}}" height="35px" width="35px"></a></li>
                        <li class="bottom-icon"><a target="_blank" href=" https://www.youtube.com/channel/UCL3EF3eYo2OqcsPHfszXMzw"><img src="{{asset('images/icons/youtube.png')}}" height="35px" width="35px"></a></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td style="">&nbsp;</td>
            </tr>
        </table>
        <!--/100% body table-->

    </section>

</body>

</html>
