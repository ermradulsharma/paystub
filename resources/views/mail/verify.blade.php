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
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #fff;" leftmargin="0">
    <section style="max-width: 700px; margin:0 auto;">
        <tr>
            <td style="text-align:center;padding-bottom:10px;">
                <a style="" target="_blank"><img width="200px"
                        src="{{asset('images/mail-logo.png')}}" title="logo" alt="logo"></a>
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
                                        src="images/laptop.png"></p>
                                <h3 style="text-align: left;color:#686767; font-size:15px;">Your Paystubx
                                    E-Mail Verification</h3>
                                <p
                                    style="font-size:13px; color:rgba(86, 86,86,0.9); margin:8px 0 0; line-height:24px;text-align:left;padding-bottom:25px;">
                                    Your one step closing to
                                    accessing Paystub Acccount! Please enter the code below to confirm your
                                    email
                                    address.
                                </p>


                                <p
                                    style="letter-spacing: 10px; padding:4px 8px;border:1px solid rgba(86, 86,86,0.5);width:120px; margin:0 auto;">
                                    {{$user_data['otp']}}

                                </p>

                                <p style="text-align: center;color:rgba(86, 86,86,0.9);font-size:13px;">This code expires
                                    in 24
                                    hours.</p>
                                <p
                                    style="font-size:13px; color:rgba(86, 86,86,0.9); margin:8px 0 0; line-height:24px;text-align:left;padding-bottom:25px;">
                                    Use the verification code
                                    provided to start using your paystubx account.if to did not make this
                                    request, please ignore this
                                    email.
                                </p>
                                <p style="padding: 0; margin:0;text-align:left;color:rgba(86, 86,86,0.9);line-height:1.5;">
                                    Welcome,</p>
                                <p
                                    style="padding: 0;margin:0;font-size: 14px;color:rgba(86, 86,86,0.9); text-align:left;line-height:1.5;">
                                    <b style="color: #000;">Paystub<SPAN style="color: red;">X</SPAN></b>Support
                                </p>
                                <p
                                    style="padding: 0;margin:0;text-align:left;font-size: 14px; color:#4472c4;line-height:1.5;">
                                    Support@Paystubx.com</p>
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
                        <img style="max-width: 100px; height:30px; margin-right:10px;" src="{{asset('images/1app.png')}}">
                        <img style="max-width: 100px; height:30px;" src="{{asset('images/1google.png')}}">
                    </p>
                    <p style="text-align: center;color:rgba(86, 86,86,0.9);font-size:13px;">Follow us on social media</p>
                    <ul class="social-icons" style="width:48%; margin:0 auto;">
                        <li style="float: left; margin-left:0px;"><a href="https://www.google.com/"><img style="width: 30px;"
                                    src="{{asset('images/icons/facebook.png')}}"></a>
                        </li>
                        <li style="float: left;"><a href="https://www.google.com/"><img style="width: 30px;"
                                    src="{{asset('images/icons/linkdin.png')}}"></a>
                        </li>
                        <li style="float: left;"><a href="https://www.google.com/"><img style="width: 30px;"
                                    src="{{asset('images/icons/instagram.png')}}"></a></li>
                        <li style="float: left;"><a href="https://www.google.com/"><img style="width: 30px;"
                                    src="{{asset('images/icons/pintrest.png')}}"></a>
                        </li>
                        <li style="float: left;"><a href="https://www.google.com/"><img style="width: 30px;"
                                    src="{{asset('images/icons/twitter.png')}}"></a></li>
                        <li style="float: left;"><a href="https://www.google.com/"><img style="width: 30px;"
                                    src="{{asset('images/icons/youtube.png')}}"></a></li>
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
