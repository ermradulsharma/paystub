<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>New Account Email Template</title>
    <script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>
    <meta name="description" content="New Account Email Template.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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



        .social-icons {
            width: 100%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            text-align: center;
            max-width: 242px;
        }


        .social-icons li {
            margin-left: 0px !important;
            margin-right: 8px;
        }

        @media(max-width:425px) {
            .otp-code {
                width: 100%;
            }

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
        <tr>
            <td style="text-align:center;padding-bottom:10px;">
                <a style="" target="_blank"><img width="200px" src="{{asset('images/mail-logo.png')}}" title="logo"
                        alt="logo"></a>
            </td>
        </tr>
        <!-- 100% body table -->
        <table style="background-color: #f2f3f8; max-width:670px; margin:30px auto;" width="100%" align="center"
            cellpadding="0" cellspacing="0">

            <tr>
                <td style="height:15px;">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table width="95%" align="center" cellpadding="0" cellspacing="0"
                        style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                        <tr>
                            <td style="padding:0 20px;">
                                <p style="text-align: center;"><img style="text-align: center;padding-top:15px;"
                                        src="{{asset('images/laptop.png')}}"></p>
                                <h3 style="text-align: left;color:#686767; font-size:15px;">Your Paystubx
                                    E-Mail Verification</h3>
                                <p
                                    style="font-size:13px; color:rgba(86, 86,86,0.9); margin:8px 0 0; line-height:24px;text-align:left;padding-bottom:25px;">
                                    You are one step closer to
                                    accessing Paystubx Acccount! Please enter the code below to confirm your
                                    email
                                    address.
                                </p>


                                <p class="otp-code"
                                    style="letter-spacing: 5px; padding:4px 5px;border:1px solid rgba(86, 86,86,0.5);width:100px; margin:0 auto;text-align:center;">
                                    {{$user_data['otp'] ?? '123456'}}</p>


                                <p style="text-align: center;color:rgba(86, 86,86,0.9);font-size:13px; margin-top:10px;">This code
                                    expires
                                    in 24
                                    hours.</p>
                                <p
                                    style="font-size:13px; color:rgba(86, 86,86,0.9); margin:8px 0 0; line-height:24px;text-align:left;padding-bottom:25px;">
                                    Use the verification code
                                    provided to start using your paystubx account. If you did not make this
                                    request, please ignore this
                                    email.
                                </p>
                                <p
                                    style="padding: 0; margin:0;text-align:left;color:rgba(86, 86,86,0.9);line-height:1.7;">
                                    Welcome,</p>
                                <p
                                    style="padding: 0;margin:0;font-size: 14px;color:rgba(86, 86,86,0.9); text-align:left;line-height:1.7;">
                                    <b style="color: #000;">Paystub<SPAN style="color: red;">X </SPAN></b>Support
                                </p>
                                <p
                                    style="padding: 0;margin:0;text-align:left;font-size: 14px; color:#4472c4;line-height:1.7;">
                                    <a href="mailto:support@paystubx.com">support@paystubx.com</a>
                                </p>
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
                        <a href="https://www.google.com/" target="_blank"><img style="max-width: 100px; height:30px; margin-right:10px;"
                            src="{{asset('images/1app.png')}}"></a>
                        <a href="https://www.google.com/" target="_blank"><img style="max-width: 100px; height:30px;" src="{{asset('images/1google.png')}}"></a>
                    </p>
                    <p style="text-align: center;color:rgba(86, 86,86,0.9);font-size:13px;">Follow us on social media
                    </p>
                    <ul class="social-icons">
                        <li class="bottom-icon"><a target="_blank" href="https://instagram.com/paystubx?igshid=YmMyMTA2M2Y=" ><img
                                    src="{{asset('images/icons/facebook.png')}}" height="35px" width="35px"></a>
                        </li>
                        <li class="bottom-icon"><a target="_blank"  href="https://www.facebook.com/paystubx"><img
                                    src="{{asset('images/icons/instagram.png')}}" height="35px" width="35px"></a></li>
                        <li class="bottom-icon"><a  target="_blank" href="https://twitter.com/paystubx"><img
                                    src="{{asset('images/icons/twitter.png')}}" height="35px" width="35px"></a></li>
                        <li class="bottom-icon"><a target="_blank"  href=" https://www.youtube.com/channel/UCL3EF3eYo2OqcsPHfszXMzw"><img
                                    src="{{asset('images/icons/youtube.png')}}" height="35px" width="35px"></a></li>
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
