<!doctype html>
<html lang="en">

<head>
    <title>PAYSTUB X </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;800&family=Public+Sans:wght@300&display=swap">


    <!-- Responsive CSS Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/newstyle.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/user-dashboard.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        select,
        select option {
            text-transform: capitalize
        }
    </style>
    @yield('style')
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://apis.google.com/js/api:client.js" async defer></script>
</head>

<body>
    <div class="container" style="max-width:1500px">
        <ul class="nav nav-justified navbar">
            <li class="nav-item">
                <a href="{{ route('welcome') }}">
                    <img class="mr-3 mt-5" src="{{ asset('images/Paystub X.webp') }}" style="width: 222px;">
                </a>
            </li>
            <li class="nav-item ml-3 ">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('usa*') ? 'active' : '' }} " href="{{ route('usa.payStub') }}">USA</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('canada*') ? 'active' : '' }}" href="{{ route('canada') }}">CANADA</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('uk*') ? 'active' : '' }}" href="{{ route('uk') }}">UK</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('global*') ? 'active' : '' }}" href="{{ route('global') }}">GLOBAL</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('w2form*') ? 'active' : '' }}" href="{{ route('w2form') }}" style="width: 143px !important;">W-2 FORM</a>
            </li>
            <li class="nav-item d-flex justify-content-center ml-3 " style="margin-top:5px;">
                @guest
                    <a class="btn btn-lg py-2 w-100 btn-danger login registerBtn " style="margin-top:42px;" href="javascript:void(0);">LOGIN</a>
                    <div class="container d-none logoutDiv">
                        <div class="user-icon"><img src="{{ asset('images/profile1.png') }}"></div>
                        <div class="logout btn-logout">
                            <a><img src="{{ asset('images/logout01.png') }}"></a>
                        </div>
                        <div class="dropbtn">
                            <button class="btn btn-default dropdown-toggle navright-btn authUserName" type="button" id="menu1" data-toggle="dropdown">Hi {{ Auth::user()->name ?? '' }}<span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('invoiceList') }}">Order History</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}">My Account</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Address Book</a></li>
                            </ul>
                        </div>
                    </div>
                @endguest

                @auth
                    <div class="container" style="margin-top:10px;">
                        <div class="user-icon"><img src="{{ asset('images/profile1.png') }}"></div>
                        <div class="logout btn-logout"><a><img src="{{ asset('images/logout01.png') }}"></a></div>
                        <div class="dropbtn">
                            <button class="btn btn-default dropdown-toggle navright-btn authUserName" type="button" id="menu1" data-toggle="dropdown">Hi {{ Auth::user()->name ?? '' }}<span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('invoiceList') }}">Order History</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}">My Account</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}?tab=2">Address Book</a></li>
                            </ul>
                        </div>
                    </div>
                @endauth
            </li>
        </ul>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="{{ url('/') }}"><img class="mr-3 mt-5 toggle-logo" src="{{ asset('images/Paystub X.webp') }}" style="width: 222px;"></a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('usa*') ? 'active' : '' }} " href="{{ route('usa.payStub') }}">USA</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('canada*') ? 'active' : '' }}" href="{{ route('canada') }}">CANADA</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('uk*') ? 'active' : '' }}" href="{{ route('uk') }}">UK</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('globle*') ? 'active' : '' }}" href="{{ route('global') }}">GLOBEL</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('w2form*') ? 'active' : '' }}" href="{{ route('w2form') }}">W-2 FORM</a>
        @guest
            <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn login registerBtn" style="background-color:#d3230c; border-radius:15px; font-size:20px;" href="#">Login</a>
        @endguest
        @auth
            <a class="btn btn-lg  w-100  navbtn nav-btn btn-logout logout" style="background-color:#d3230c; border-radius:15px;font-size:20px;max-width:150px; margin-left:10px !important;position: relative; top:0; " href="#">Log Out</a>
        @endauth
    </div>

    <div class="openbtn">
        <div class=" pt-4 d-flex justify-content-between" style="display:flex !important">
            <a href="{{ url('/') }}"><img class="mr-3 mt-5 toggle-logo"
                    src="{{ asset('images/Paystub X.webp') }}" style="width: 222px;"></a>
            <span style="font-size:30px;cursor:pointer; padding-right:10px;" class=""
                onclick="openNav()">&#9776;</span>
        </div>
    </div>

    @yield('content')

    <!-- Start Footer Section -->
    <div class="footerSection">
        <div class="container" style="max-width:1550px; margin:0 auto; padding:0px 20px;">
            <div class=" row py-5 justify-content-center" style="margin:0 auto;">
                <div class="col-lg-3 text-center m-auto">
                    <div class="container justify-content-center text-left">
                        <div class="flex-row">
                            <div style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;"
                                class="foot">
                                <a class="w-100 footbtn font" href="{{ url('terms') }}"
                                    style="text-transform:capitalize;">Terms & Conditions</a>
                            </div>
                            <div class="mt-3 foot"
                                style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;">
                                <a class="w-100 footbtn font" href="{{ url('privacy') }}"
                                    style="text-transform:capitalize;">Privacy Policy</a>
                            </div>
                            <div class="mt-3 foot "
                                style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;">
                                <a class="w-100 footbtn font" href="{{ url('refund') }}"
                                    style="text-transform:capitalize;">Refund Policy</a>
                            </div>
                            <div class="mt-3 foot"
                                style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center;">
                                <a class="w-100 footbtn font" href="{{ url('contact') }}"
                                    style="text-transform:capitalize;">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12 text-center" style="margin-top:15px;">
                    <div class="container  justify-content-center">
                        <div class="container footer-icons">
                            <a href="https://www.facebook.com/paystubx" target="_blank"><i
                                    class="fa fa-facebook   fbicon " aria-hidden="true"></i></a>
                            <a href="https://instagram.com/paystubx?igshid=YmMyMTA2M2Y=" target="_blank"><i
                                    class="fa fa-instagram ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/paystubx" target="_blank"><i
                                    class="fa fa-twitter ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i
                                    class="fa fa-linkedin ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.youtube.com/channel/UCL3EF3eYo2OqcsPHfszXMzw" target="_blank"><i
                                    class="fa fa-youtube ml-2 socialicon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3 ">
                    <p class="text-white footer-text">COPYRIGHT © 2022 PaystubX, ALL RIGHTS RESERVED.</p>
                    <div class="container justify-content-center m-auto text-center">
                        <a href="{{ url('/') }}"><img class="footimg"
                                src="{{ asset('images/satisfaction.webp') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title"><img src="{{ asset('images/Paystub X.webp') }}" class="icon"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="padding-bottom:30px;">
                    <div class="google-btn mt-4" style="text-align: -webkit-center; text-align: -moz-center;">
                        <div id="g_id_onload"
                            data-client_id="802702825376-57405b5o70d0l41mkh9q8ta86ig71rkb.apps.googleusercontent.com"
                            data-callback="handleCredentialResponse" data-dismiss="modal" data-ux_mode="popup"
                            data-auto_prompt="false">
                        </div>
                        <div class="g_id_signin" data-dismiss="modal" data-type="standard" data-shape="rectangular"
                            data-theme="filled_blue" data-text="signin_with" data-size="large"
                            data-logo_alignment="left"></div>
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <img src="{{ asset('images/Group 3.png') }}" style="width:130px;">
                    </div>
                    <h6 class="text-center" style="color: #457bbe;" style="text-transform:capitalize;">
                        {{ __('Sign Up Using Email') }}</h6>
                    <p class="text-center"></p>
                    <form id="sendOTPForm" action="{{ url('sendOtp') }}" method="POST" class="text-center">
                        @csrf
                        <div class="px-lg-5">
                            <input type="email" id="email" name="email" class="form-control formm  py-4"
                                placeholder="Email *">
                        </div>
                        <button class="previewbtn mt-4 px-3" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="forgotPasswordModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title" style="text-transform: capitalize;color:#fff;">
                        {{ __('Forgot Your Password') }}</h4>
                    <button type="button"
                        style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body pb-4" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                    <p class="mail-text">
                        {{ __("Please enter your registered email address, and we'll send you a link to reset your password.") }}
                    </p>
                    <form id="forgotPassword" method="post" action="{{ route('forgot.password') }}">
                        @csrf
                        <label class="label-text" for="css">{{ __('Email Address') }}<span
                                style="color:red;">*</span></label>
                        <input class="contact-box" type="text" id="user-email" placeholder="Email Address"
                            name="email">
                    </form>
                </div>
                <div class="modal-footer" style="display: inline-block;">
                    <div class="d-flex justify-content-between pt-2">
                        <a style="color: red;" id="backToSignin"
                            href="JavaScript:void(0);">{{ __('Back to Sign in') }}</a>
                        <button class="btn-danger" onclick="$('#forgotPassword').submit();"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;">{{ __('Send Password Reset Link') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginPasswordModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title"><img src="{{ asset('images/Paystub X.webp') }}" class="icon"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="padding-bottom:30px;">
                    <h2 class="text-center" style="color: #457bbe;">Login</h2>
                    <p class="text-center"></p>

                    <form id="adminLogin" action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="px-lg-5">
                            <div class="form-group">
                                <label class="text-left">Email</label>
                                <input type="email" id="login_email" name="email"
                                    class="form-control formm  py-4" placeholder="Email *" readonly>
                            </div>
                            <div class="form-group">
                                <label class="text-left">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control formm  py-4" placeholder="Password *">
                            </div>
                        </div>
                        <p class="resend-otp">
                            <a id="forgotPasswordButton" href="JavaScript:void(0);">Forgot Password?</a>
                        </p>
                        <div class="text-center">
                            <button class="previewbtn continue " type="submit">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade otpModal" id="otpModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title"><img src="{{ asset('/') }}images/Paystub X.webp" class="icon"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h5 class="text-center" style="text-transform:capitalize;">Verify your Email Address</h5>
                    <div class=" text-center mt-4">
                        <div class="mail">
                            <img src="https://cdn4.iconfinder.com/data/icons/social-media-logos-6/512/112-gmail_email_mail-512.png"
                                class="mailpic">
                        </div>

                        <h5 style="color: #457bbe;" class="mt-4 text-center">Almost There!</h5>
                        <p style="color: #000;font-size: 14px;font-family: serif; text-transform:capitalize; margin-bottom:0px;"
                            class="text-center">Enter the verification code sent to you</p>
                        <span style="color: #02030359;font-size: 10px;font-family: serif; text-transform:capitalize;"
                            class="text-center">Check spam if not found in inbox</span>
                        <p class="resend-otp" style="padding-top:10px;">
                            <a id="resendOtpButton" class="pointer-disable" style=""
                                href="JavaScript:void(0);" disabled>Resend OTP </a>
                            <i class="fa fa-clock-o clock"></i>
                            <span id="resendTimeOut">30</span>
                        </p>

                        <form id="loginOtp" action="{{ url('loginWithOtp') }}" method="POST" class="text-center">
                            @csrf
                            <div class="px-lg-5">
                                <input type="hidden" id="hidden_email" name="email" class="d-none">
                                <input type="text" id="Verificationcode" name="code"
                                    class="form-control formm py-4" placeholder="Verification Code *">
                            </div>
                            <button class="previewbtn mt-5" type="submit">Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade logoutModal" id="logoutModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title"><img src="{{ asset('/') }}images/Paystub X.webp" class="icon"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" style="padding-bottom: 30px;">
                    <h5 class="text-center" style="text-transform:capitalize;">Do you want to logout?</h5>
                    <div class=" text-center mt-4">
                        {{-- <h5 style="color: #457bbe;" class="mt-4 text-center">Almost There!</h5> --}}

                        <form id="loginOtp" action="{{ route('logout') }}" method="POST" class="text-center">
                            @csrf

                            <button class="previewbtn " type="submit">Yes</button>
                            <button class="previewbtn  bottom-close" type="button">NO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setName">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title" style="text-transform: capitalize;color:#fff;">Set My Account</h4>
                    <button type="button" style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body pb-4" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                    <form id="userNameForm" method="post" action="{{ route('profile-setup') }}">
                        @csrf
                        <input type="hidden" value="setup-account" name="type">
                        <label class="label-text" for="css">First Name<span style="color:red;">*</span></label>
                        <input class="contact-box" type="text" name="uname" id="user-name" placeholder="First Name">
                        <div class="contact-box-outer">
                            <label class="label-text" for="css">New Password<span style="color:red;">*</span></label>
                            <input class="contact-box" type="password" placeholder="New Password" name="password" class="form-control show-password-sd" id="new_password" required>
                            <i id="eye-icon_03" toggle="#password-field" class="fa fa-eye-slash eye-icon new-toggle-password" data-id="02"></i>
                        </div>
                        <div class="contact-box-outer">
                            <label class="label-text" for="css">Confirm Password<span style="color:red;">*</span></label>
                            <input class="contact-box" type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control show-password-sd" id="confirm_password" required>
                            <i id="eye-icon_03" toggle="#password-field" class="fa fa-eye-slash eye-icon confirm-toggle-password" data-id="02"></i>
                        </div>
                        {{-- <div class="modal-footer" style="display: inline-block;"> --}}
                        <div class="d-flex justify-content-between pt-3">
                            <button class="btn-secondary" data-bs-dismiss="modal" style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                            <button class="btn-danger" id="set-name" style="border-radius:20px; border:none; font-size:12px; padding:5px 15px; position:relative; right:26px;" type="submit">Save</button>
                        </div>
                        {{-- </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- End Footer Section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script>
        //
    </script>
    <script>
        $(document).ready(function() {
            $('#forgotPasswordButton').click(function() {
                $("#loginPasswordModal").modal("hide");
                $("#forgotPasswordModal").modal("show");
            });

            $('#backToSignin').click(function() {
                $("#forgotPasswordModal").modal("hide");
                $("#loginPasswordModal").modal("show");
            });

            $('.inputdatepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: "mm/dd/yyyy",
            }).datepicker('setDate', 'today');

            $("#resendOtpButton").click(function() {
                var email = $('#hidden_email').val();
                startTimer();
                $.ajax({
                    url: "{{ route('sendOtp') }}?email=" + email,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            toastr.success(data.message);
                        } else {
                            printErrorMsg(data.error);
                        }
                    }
                });
            });

            $(document).on('click', '.confirm-toggle-password', function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $("#confirm_password");
                input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type',
                    'password')
            });

            $(document).on('click', '.new-toggle-password', function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $("#new_password");
                input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type',
                    'password')
            });
        });
    </script>
    <script src="{{ asset('user') }}/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    @yield('script')
    @yield('checked')

    <style>
        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 9999;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 5s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #loaderDiv {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            background: #00000054;
            z-index: 999;
        }
    </style>

    <div id="loaderDiv" style="display: none;">
        <div id="loader"></div>
    </div>

    @if ($errors->first())
        <script>
            toastr.error('{{ $errors->first() }}');
        </script>
    @endif

    @if (Session::has('message'))
        <script>
            toastr.success("{{ Session::get('message') }}");
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif

    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {

                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            (function($) {
                var toggle = '[data-toggle="droppanel"]';

                function clearMenus(e) {
                    var panel = $(e.data).not(e.exclude);
                    var $ddMenu = panel.find(".dropdown-menu");
                    $ddMenu.slideUp();
                }

                function toggleMenu(e) {
                    var $this = $(this),
                        $parent, selector;
                    if ($this.is('.disabled, :disabled')) return;
                    selector = $this.attr('data-target');
                    if (!selector) {
                        selector = $this.attr('href');
                        selector = selector && selector.replace(/.*(?=#[^\s]*$)/, ''); //strip for ie7
                    }
                    $parent = $(selector);
                    $parent.length || ($parent = $this.parent());
                    var $ddMenu = $parent.find(".dropdown-menu");
                    $ddMenu.slideToggle(function(evt) {
                        if ($(this).css("display") == "block") {
                            $('html').trigger({
                                type: 'click',
                                exclude: $parent
                            });
                            $parent.addClass('open');
                            $(this).css("display", "");
                            $parent.trigger({
                                type: 'droppanel.show',
                                panel: $parent
                            });
                        } else {
                            $parent.removeClass('open');
                        }
                    });

                    return false;
                }
                $('html').on('click.dropdown.data-api', null, '.droppanel', clearMenus);
                $('body').on('click.dropdown', '.droppanel', function(e) {
                        e.stopPropagation();
                    })
                    .on('click.dropdown.data-api', toggle, toggleMenu);
            }(jQuery));

        });
    </script>
</body>

</html>
