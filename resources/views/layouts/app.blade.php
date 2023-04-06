<!doctype html>
<html lang="en">

<head>
    <title> PAYSTUB X </title>
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;800&family=Public+Sans:wght@300&display=swap">

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
        <ul class="nav nav-justified navbar" style="max-width: 1445px;">
            <li class="nav-item"> <a href="{{ route('welcome') }}"><img class="mr-3 mt-5"
                        src="{{ asset('images/Paystub X.webp') }}" style="width: 222px;"></a> </li>
            <li class="nav-item ml-3 "> <a
                    class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('usa*') ? 'active' : '' }} "
                    href="{{ route('usa.payStub') }}">USA</a> </li>
            <li class="nav-item ml-3"> <a
                    class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('canada*') ? 'active' : '' }}"
                    href="{{ route('canada') }}">CANADA</a> </li>
            <li class="nav-item ml-3"> <a
                    class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('uk*') ? 'active' : '' }}"
                    href="{{ route('uk') }}">UK</a> </li>
            <li class="nav-item ml-3"> <a
                    class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('global*') ? 'active' : '' }}"
                    href="{{ route('global') }}">GLOBAL</a> </li>
            <li class="nav-item ml-3"> <a
                    class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('w2form*') ? 'active' : '' }}"
                    href="{{ route('w2form') }}" style="width: 143px !important;">W-2 FORM</a> </li>
            <li class="nav-item d-flex justify-content-center align-items-baseline " style="margin-top:45px;">
                @guest
                {{-- <a class="btn btn-lg py-2 w-100 mt-5 btn-danger login registerBtn"
                    href="javascript:void(0);">LOGIN</a>
                <div class="d-none logoutDiv">
                    <a class="btn btn-lg py-2 w-100 mt-5 btn-logout btn-danger "
                        style="width: 120px !important;padding: 6px 0 !important;" href="javascript:void(0);"><i
                            class="fa fa-sign-out"></i>Log out</a>
                </div> --}}

                    <div class="user-icon"><a style="position: relative; z-index:1;"><img style="width: 35px;" src="{{ asset('images/profile1.png')}}"></a></div>
                    <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"> Hi Mike Bitch<span style="padding-left:5px; "><i
                                style="" class='fa fa-angle-down'></i></span></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#">Order History</a>
                        <a href="#">My Account</a>
                    </div>

                </div>
                <div class="logout"> <a><img style="width: 22px;" src="{{ asset('images/logout01.png')}}"></a></div>

                @else


                    {{-- <a class="btn btn-lg py-2 w-100 mt-5 btn-logout btn-danger "
                        style="width: 120px !important;padding: 6px 0 !important;" href="javascript:void(0);"><i
                            class="fa fa-sign-out"></i> Log out</a> --}}


                    @endguest
            </li>
        </ul>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="{{ url('/') }}"><img class="mr-3 mt-5 toggle-logo" src="{{ asset('images/Paystub X.webp') }}"
                style="width: 222px;"></a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('usa*') ? 'active' : '' }} "
            href="{{ route('usa.payStub') }}">USA</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('canada*') ? 'active' : '' }}"
            href="{{ route('canada') }}">CANADA</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('uk*') ? 'active' : '' }}"
            href="{{ route('uk') }}">UK</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('globle*') ? 'active' : '' }}"
            href="{{ route('global') }}">GLOBEL</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('w2form*') ? 'active' : '' }}"
            href="{{ route('w2form') }}">W-2 FORM</a>
            {{-- <a class=""> <div class="user-icon"><a style="position: relative; z-index:1;"><img style="width: 35px;" src="images/profile1.png"></a></div>
            <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"> Hi Mike Bitch<span style="padding-left:5px; "><i
                        style="" class='fa fa-angle-down'></i></span></button>
            <div id="myDropdown" class="dropdown-content">
                <a href="#">Order History</a>
                <a href="#">My Account</a>
            </div>

        </div>
        <div class="logout"> <a><img style="width: 21px;" src="images/logout01.png"></a></div></a> --}}
    </div>
    <div class="openbtn">
        <div class=" pt-4 d-flex justify-content-between" style="display:flex !important">
            <a href="{{ url('/') }}"><img class="mr-3 mt-5 toggle-logo" src="{{ asset('images/Paystub X.webp') }}"
                    style="width: 222px;"></a>
            <span style="font-size:30px;cursor:pointer; padding-right:10px;" class="" onclick="openNav()">&#9776;</span>
        </div>
    </div>

    @yield('content')

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
                <div class="modal-body">
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
                    <h6 class="text-center" style="color: #457bbe;" style="text-transform:capitalize;">Sign Up Using
                        Email</h6>
                    <p class="text-center"></p>
                    <form id="sendOTPForm" action="{{ url('sendOtp') }}" method="POST" class="text-center">
                        @csrf
                        <div class="px-lg-5">
                            <input type="email" id="email" name="email" class="form-control formm  py-4"
                                placeholder="Email *">
                        </div>
                        <button class="previewbtn mt-5" type="submit">Continue</button>
                    </form>
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
                <div class="modal-body">
                    <h2 class="text-center" style="color: #457bbe;">Admin Login</h2>
                    <p class="text-center"></p>

                    <form id="adminLogin" action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="px-lg-5">
                            <div class="form-group">
                                <label class="text-left">Email</label>
                                <input type="email" id="login_email" name="email" class="form-control formm  py-4"
                                    placeholder="Email *" readonly>
                            </div>
                            <div class="form-group">
                                <label class="text-left">Password</label>
                                <input type="password" id="password" name="password" class="form-control formm  py-4"
                                    placeholder="Password *">
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="previewbtn mt-4 mb-3" type="submit">Continue</button>
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
                        <p class="resend-otp"><a id="resendOtpButton" class="pointer-disable" style=""
                                href="JavaScript:void(0);" disabled>Resend OTP </a><i
                                class="fa fa-clock-o clock"></i><span id="resendTimeOut">30</span></p>

                        <form id="loginOtp" action="{{ url('loginWithOtp') }}" method="POST" class="text-center">
                            @csrf
                            <div class="px-lg-5">
                                <input type="hidden" id="hidden_email" name="email" class="d-none">
                                <input type="text" id="Verificationcode" name="code" class="form-control formm py-4"
                                    placeholder="Verification Code *">
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
                <div class="modal-body">
                    <h5 class="text-center" style="text-transform:capitalize;">Are you sure? You want to logout</h5>
                    <div class=" text-center mt-4">
                        {{-- <h5 style="color: #457bbe;" class="mt-4 text-center">Almost There!</h5> --}}

                        <form id="loginOtp" action="{{ route('logout') }}" method="POST" class="text-center">
                            @csrf

                            <button class="previewbtn mt-5" type="submit">Yes</button>
                            <button class="previewbtn mt-5 bottom-close" type="button">NO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <div class="mt-3 foot "
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
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-facebook   fbicon "
                                    aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-instagram ml-2 socialicon"
                                    aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-twitter ml-2 socialicon"
                                    aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-linkedin ml-2 socialicon"
                                    aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-youtube ml-2 socialicon"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3 ">
                    <p class="text-white footer-text">COPYRIGHT © 2022 PaystubX, ALL RIGHTS RESERVED.</p>
                    <div class="container justify-content-center m-auto text-center">
                        <a href="{{ url('/') }}"><img class="footimg" src="{{ asset('images/satisfaction.webp') }}"></a>
                    </div>
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
        $('.inputdatepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "mm/dd/yyyy",
        }).datepicker('setDate', 'today');

        $("#resendOtpButton").click(function() {
            var email = $('#hidden_email').val();
            startTimer();
            $.ajax({
            url: "{{route('sendOtp')}}?email="+email,
            success:function(data){
                console.log('data',data);
                    if($.isEmptyObject(data.error)){
                        toastr.success(data.message);

                    }else{
                        printErrorMsg(data.error);
                    }
            }
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
</body>

</html>
