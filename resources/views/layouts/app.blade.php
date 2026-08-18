<!doctype html>
<html lang="en">

<head>
    <title>PAYSTUB X </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FontAwesome 4.7.0 CSS  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@400;600&family=Outfit:wght@100;200;300;800&family=Public+Sans:wght@300&display=swap">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


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
    <script>
        window.initAutocomplete = window.initAutocomplete || function() {
            // Global fallback for pages without custom Google Places autocompletion
        };
    </script>
</head>

<body>
    <div class="container modern-paystubx-header" style="max-width:1500px">
        <nav class="navbar navbar-expand-lg navbar-light p-0 w-100">
            <a class="navbar-brand m-0" href="{{ route('welcome') }}">
                <img class="header-logo" src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo">
            </a>
            <button class="navbar-toggler border-0 p-2 shadow-none" type="button" data-toggle="collapse" data-target="#paystubxNav" aria-controls="paystubxNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars text-dark" style="font-size: 1.4rem;"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end mt-3 mt-lg-0" id="paystubxNav">
                <ul class="nav-items d-flex align-items-center gap-2 m-0 p-0" style="gap: 15px;">
                    <li class="nav-item"><a class="btn navbtn {{ request()->is('usa*') ? 'active' : '' }}" href="{{ route('usa.payStub') }}">USA</a></li>
                    <li class="nav-item"><a class="btn navbtn {{ request()->is('canada*') ? 'active' : '' }}" href="{{ route('canada') }}">CANADA</a></li>
                    <li class="nav-item"><a class="btn navbtn {{ request()->is('uk*') ? 'active' : '' }}" href="{{ route('uk') }}">UK</a></li>
                    <li class="nav-item"><a class="btn navbtn {{ request()->is('global*') ? 'active' : '' }}" href="{{ route('global') }}">GLOBAL</a></li>
                    <li class="nav-item"><a class="btn navbtn {{ request()->is('w2form*') ? 'active' : '' }}" href="{{ route('w2form') }}">W-2 FORM</a></li>
                    <li class="nav-item">
                        @guest
                            <a class="btn login registerBtn login-header-btn" href="javascript:void(0);"><i class="fa fa-sign-in mr-1.5"></i> LOGIN</a>
                            <div class="d-none logoutDiv">
                                <div class="user-pill-wrapper">
                                    <div class="user-avatar-badge"><i class="fa fa-user"></i></div>
                                    <div class="dropbtn">
                                        <button class="btn btn-default dropdown-toggle navright-btn authUserName" type="button" id="menu1" data-toggle="dropdown">Hi {{ Auth::user()->name ?? '' }} <i class="fa fa-angle-down ml-1"></i></button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('invoiceList') }}"><i class="fa fa-history mr-2" style="color: #4f46e5;"></i> Order History</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}"><i class="fa fa-user mr-2" style="color: #3b82f6;"></i> My Account</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}?tab=2"><i class="fa fa-address-book mr-2" style="color: #10b981;"></i> Address Book</a></li>
                                        </ul>
                                    </div>
                                    <div class="logout btn-logout logout-icon-btn" title="Logout"><i class="fa fa-power-off"></i></div>
                                </div>
                            </div>
                        @endguest
                        @auth
                            <div class="user-pill-wrapper">
                                <div class="user-avatar-badge">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</div>
                                <div class="dropbtn">
                                    <button class="btn btn-default dropdown-toggle navright-btn authUserName" type="button" id="menu1" data-toggle="dropdown">Hi {{ Auth::user()->name ?? '' }} <i class="fa fa-angle-down ml-1"></i></button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('invoiceList') }}"><i class="fa fa-history mr-2" style="color: #4f46e5;"></i> Order History</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}"><i class="fa fa-user mr-2" style="color: #3b82f6;"></i> My Account</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}?tab=2"><i class="fa fa-address-book mr-2" style="color: #10b981;"></i> Address Book</a></li>
                                    </ul>
                                </div>
                                <div class="logout btn-logout logout-icon-btn" title="Logout"><i class="fa fa-power-off"></i></div>
                            </div>
                        @endauth
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @yield('content')

    <!-- Start Footer Section -->
    <div class="footerSection">
        <div class="container" style="max-width:1550px; margin:0 auto; padding:0px 20px;">
            <div class=" row py-5 justify-content-center" style="margin:0 auto;">
                <div class="col-lg-3 text-center m-auto">
                    <div class="container justify-content-center text-left">
                        <div class="flex-row">
                            <div style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;" class="foot"><a class="w-100 footbtn font" href="{{ url('terms') }}" style="text-transform:capitalize;">Terms & Conditions</a></div>
                            <div class="mt-3 foot" style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;"><a class="w-100 footbtn font" href="{{ url('privacy') }}" style="text-transform:capitalize;">Privacy Policy</a></div>
                            <div class="mt-3 foot "  style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;"><a class="w-100 footbtn font" href="{{ url('refund') }}" style="text-transform:capitalize;">Refund Policy</a></div>
                            <div class="mt-3 foot" style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center;"><a class="w-100 footbtn font" href="{{ url('contact') }}" style="text-transform:capitalize;">Contact Us</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12 text-center" style="margin-top:15px;">
                    <div class="container  justify-content-center">
                        <div class="container footer-icons">
                            <a href="https://www.facebook.com/paystubx" target="_blank"><i class="fa fa-facebook   fbicon " aria-hidden="true"></i></a>
                            <a href="https://instagram.com/paystubx?igshid=YmMyMTA2M2Y=" target="_blank"><i class="fa fa-instagram ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/paystubx" target="_blank"><i class="fa fa-twitter ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.youtube.com/channel/UCL3EF3eYo2OqcsPHfszXMzw" target="_blank"><i class="fa fa-youtube ml-2 socialicon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3 ">
                    <p class="text-white footer-text">COPYRIGHT © 2022 PaystubX, ALL RIGHTS RESERVED.</p>
                    <div class="container justify-content-center m-auto text-center"><a href="{{ url('/') }}"><img class="footimg" src="{{ asset('images/satisfaction.webp') }}"></a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <!-- The Redesigned Login Modal (Apple / Stripe / Vercel UX) -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div class="modal-content" style="border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 24px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);">
                <!-- Modal Header -->
                <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%); position: relative;">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 26px; width: auto;">
                        </div>
                        <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" aria-label="Close" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; text-shadow: none; line-height: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-4 p-sm-5" style="background-color: #ffffff;">
                    <div class="text-center mb-4">
                        <h4 class="font-weight-bold text-dark mb-1" style="color: #0f172a; font-size: 1.35rem; letter-spacing: -0.3px;">{{ __('Welcome Back') }}</h4>
                        <p class="text-muted mb-0" style="font-size: 0.875rem; color: #64748b;">{{ __('Sign in or create an account to manage paystubs') }}</p>
                    </div>

                    <!-- Google Socialite OAuth SSO -->
                    <div class="google-btn-wrapper mb-4 text-center">
                        <a href="{{ route('login.google') }}" class="btn btn-block py-2.5 px-4 font-weight-semibold shadow-sm d-flex align-items-center justify-content-center" style="border: 1px solid #cbd5e1; border-radius: 12px; background: #ffffff; color: #334155; font-size: 0.925rem; transition: all 0.2s ease;">
                            <svg class="mr-2" width="18" height="18" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>
                            {{ __('Sign in with Google') }}
                        </a>
                    </div>

                    <!-- Divider -->
                    <div class="d-flex align-items-center my-4">
                        <div class="flex-grow-1" style="height: 1px; background-color: #e2e8f0;"></div>
                        <span class="px-3 text-uppercase font-weight-bold" style="font-size: 0.725rem; letter-spacing: 1px; color: #94a3b8;">{{ __('Or with email') }}</span>
                        <div class="flex-grow-1" style="height: 1px; background-color: #e2e8f0;"></div>
                    </div>

                    <!-- Email OTP Form -->
                    <form id="sendOTPForm" action="{{ url('sendOtp') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3 text-left">
                            <label for="email" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">{{ __('Email Address') }}</label>
                            <div class="position-relative">
                                <input type="email" id="email" name="email" class="form-control py-3 px-3 shadow-none" placeholder="name@example.com" required autocomplete="email" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc; transition: all 0.2s ease;">
                            </div>
                        </div>

                        <button class="btn btn-block py-3 mt-4 text-white font-weight-bold shadow-md" type="submit" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 12px; font-size: 0.95rem; letter-spacing: 0.3px; transition: transform 0.15s ease, box-shadow 0.15s ease;">
                            {{ __('Continue with Email') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Redesigned Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div class="modal-content" style="border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 24px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);">
                <!-- Modal Header -->
                <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 26px; width: auto;">
                        </div>
                        <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" aria-label="Close" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; text-shadow: none; line-height: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-4 p-sm-5" style="background-color: #ffffff;">
                    <div class="text-center mb-4">
                        <h4 class="font-weight-bold text-dark mb-1" style="color: #0f172a; font-size: 1.35rem; letter-spacing: -0.3px;">{{ __('Reset Password') }}</h4>
                        <p class="text-muted mb-0" style="font-size: 0.875rem; color: #64748b;">{{ __("Enter your registered email address and we'll send you a password reset link.") }}</p>
                    </div>

                    <form id="forgotPassword" method="post" action="{{ route('forgot.password') }}">
                        @csrf
                        <div class="form-group mb-4 text-left">
                            <label for="user-email" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">{{ __('Email Address') }} <span style="color: #ef4444;">*</span></label>
                            <input class="form-control py-3 px-3 shadow-none" type="email" id="user-email" placeholder="name@example.com" name="email" required style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc;">
                        </div>

                        <button class="btn btn-block py-3 text-white font-weight-bold shadow-md mb-3" type="submit" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 12px; font-size: 0.95rem; letter-spacing: 0.3px;">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </form>

                    <div class="text-center mt-3 pt-2 border-top">
                        <a id="backToSignin" href="JavaScript:void(0);" class="font-weight-semibold" style="color: #4f46e5; font-size: 0.875rem; text-decoration: none;">
                            <i class="fa fa-arrow-left mr-1"></i> {{ __('Back to Sign In') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Redesigned Login Password Modal -->
    <div class="modal fade" id="loginPasswordModal" tabindex="-1" aria-labelledby="loginPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div class="modal-content" style="border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 24px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);">
                <!-- Modal Header -->
                <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 26px; width: auto;">
                        </div>
                        <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" aria-label="Close" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; text-shadow: none; line-height: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-4 p-sm-5" style="background-color: #ffffff;">
                    <div class="text-center mb-4">
                        <h4 class="font-weight-bold text-dark mb-1" style="color: #0f172a; font-size: 1.35rem; letter-spacing: -0.3px;">{{ __('Enter Password') }}</h4>
                        <p class="text-muted mb-0" style="font-size: 0.875rem; color: #64748b;">{{ __('Enter your password to access your account') }}</p>
                    </div>

                    <form id="adminLogin" action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3 text-left">
                            <label for="login_email" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">{{ __('Email Address') }}</label>
                            <input type="email" id="login_email" name="email" class="form-control py-3 px-3 shadow-none" placeholder="Email" readonly autocomplete="username" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #64748b; background-color: #f1f5f9;">
                        </div>

                        <div class="form-group mb-2 text-left">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label for="password" class="font-weight-semibold mb-0" style="font-size: 0.825rem; color: #475569; font-weight: 600;">{{ __('Password') }}</label>
                                <a id="forgotPasswordButton" href="JavaScript:void(0);" class="font-weight-semibold" style="color: #4f46e5; font-size: 0.8rem; text-decoration: none;">{{ __('Forgot Password?') }}</a>
                            </div>
                            <input type="password" id="password" name="password" class="form-control py-3 px-3 shadow-none" placeholder="Enter your password" required autocomplete="current-password" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc;">
                        </div>

                        <button class="btn btn-block py-3 mt-4 text-white font-weight-bold shadow-md" type="submit" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 12px; font-size: 0.95rem; letter-spacing: 0.3px;">
                            {{ __('Sign In') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Redesigned OTP Verification Modal -->
    <div class="modal fade otpModal" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div class="modal-content" style="border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 24px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);">
                <!-- Modal Header -->
                <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 26px; width: auto;">
                        </div>
                        <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" aria-label="Close" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; text-shadow: none; line-height: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-4 p-sm-5 text-center" style="background-color: #ffffff;">
                    <div class="mb-3 d-inline-flex align-items-center justify-content-center" style="width: 56px; height: 56px; border-radius: 16px; background: #e0e7ff; color: #4f46e5;">
                        <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    
                    <h4 class="font-weight-bold text-dark mb-1" style="color: #0f172a; font-size: 1.35rem; letter-spacing: -0.3px;">{{ __('Verify Email Address') }}</h4>
                    <p class="text-muted mb-1" style="font-size: 0.875rem; color: #64748b;">{{ __('Enter the 6-digit verification code sent to your email') }}</p>
                    <span class="d-block text-muted mb-3" style="font-size: 0.775rem; color: #94a3b8;">{{ __('(Check your spam folder if not found in inbox)') }}</span>

                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <a id="resendOtpButton" class="pointer-disable font-weight-semibold mr-2" href="JavaScript:void(0);" style="color: #4f46e5; font-size: 0.85rem; text-decoration: none;" disabled>{{ __('Resend Code') }}</a>
                        <span class="badge px-2.5 py-1" style="background-color: #f1f5f9; color: #475569; font-size: 0.8rem; border-radius: 8px;">
                            <i class="fa fa-clock-o mr-1"></i><span id="resendTimeOut">30</span>s
                        </span>
                    </div>

                    <form id="loginOtp" action="{{ url('loginWithOtp') }}" method="POST" data-action="{{ route("profile-setup") }}">
                        @csrf
                        <input type="hidden" id="formType" name="type">
                        <input type="hidden" id="hidden_email" name="email">
                        
                        <div class="form-group mb-4">
                            <input type="text" id="Verificationcode" name="code" class="form-control text-center py-3 px-3 shadow-none font-weight-bold" placeholder="000000" maxlength="6" required style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 1.35rem; letter-spacing: 6px; color: #0f172a; background-color: #f8fafc;">
                        </div>

                        <button class="btn btn-block py-3 text-white font-weight-bold shadow-md" type="submit" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 12px; font-size: 0.95rem; letter-spacing: 0.3px;">
                            {{ __('Verify & Continue') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Redesigned Logout Confirmation Modal -->
    <div class="modal fade logoutModal" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content" style="border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 24px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);">
                <!-- Modal Header -->
                <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 26px; width: auto;">
                        </div>
                        <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" aria-label="Close" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; text-shadow: none; line-height: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-4 text-center" style="background-color: #ffffff;">
                    <div class="mb-3 d-inline-flex align-items-center justify-content-center" style="width: 56px; height: 56px; border-radius: 16px; background: #fee2e2; color: #ef4444;">
                        <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </div>

                    <h4 class="font-weight-bold text-dark mb-1" style="color: #0f172a; font-size: 1.25rem; letter-spacing: -0.3px;">{{ __('Sign Out of PaystubX?') }}</h4>
                    <p class="text-muted mb-4" style="font-size: 0.875rem; color: #64748b;">{{ __('Are you sure you want to end your active session?') }}</p>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="d-flex align-items-center justify-content-center" style="gap: 12px;">
                            <button class="btn flex-fill py-2.5 font-weight-bold text-white shadow-sm" type="submit" style="background: #ef4444; border: none; border-radius: 12px; font-size: 0.9rem;">
                                {{ __('Yes, Logout') }}
                            </button>
                            <button class="btn flex-fill py-2.5 bottom-close font-weight-semibold shadow-sm" type="button" style="background: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 12px; color: #475569; font-size: 0.9rem;">
                                {{ __('Cancel') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Redesigned Account Setup Modal -->
    <div class="modal fade" id="setName" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);">
                <!-- Modal Header -->
                <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 26px; width: auto;">
                        </div>
                        <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; text-shadow: none; line-height: 1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-4 p-sm-5" style="background-color: #ffffff;">
                    <div class="text-center mb-4">
                        <h4 class="font-weight-bold text-dark mb-1" style="color: #0f172a; font-size: 1.35rem; letter-spacing: -0.3px;">{{ __('Set Up Account') }}</h4>
                        <p class="text-muted mb-0" style="font-size: 0.875rem; color: #64748b;">{{ __('Enter your name and set a password to complete your profile') }}</p>
                    </div>

                    <form id="userNameForm" method="post" action="{{ route('profile-setup') }}">
                        @csrf
                        <input type="hidden" value="setup-account" name="type">

                        <div class="form-group mb-3 text-left">
                            <label for="user-name" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">{{ __('First Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="uname" id="user-name" class="form-control py-3 px-3 shadow-none" placeholder="First Name" autocomplete="given-name" required style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc;">
                        </div>

                        <div class="form-group mb-3 text-left position-relative">
                            <label for="new_password" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">{{ __('New Password') }} <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input type="password" name="password" id="new_password" class="form-control py-3 px-3 shadow-none show-password-sd" placeholder="New Password" required autocomplete="new-password" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc; padding-right: 42px;">
                                <i id="eye-icon_03" toggle="#password-field" class="fa fa-eye-slash eye-icon new-toggle-password position-absolute" data-id="02" style="right: 14px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #94a3b8; font-size: 0.95rem;"></i>
                            </div>
                        </div>

                        <div class="form-group mb-4 text-left position-relative">
                            <label for="confirm_password" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input type="password" name="password_confirmation" id="confirm_password" class="form-control py-3 px-3 shadow-none show-password-sd" placeholder="Confirm Password" required autocomplete="new-password" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc; padding-right: 42px;">
                                <i id="eye-icon_03" toggle="#password-field" class="fa fa-eye-slash eye-icon confirm-toggle-password position-absolute" data-id="02" style="right: 14px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #94a3b8; font-size: 0.95rem;"></i>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-2">
                            <button type="button" class="btn btn-light py-2.5 px-4 font-weight-semibold" data-dismiss="modal" data-bs-dismiss="modal" style="border-radius: 12px; border: 1px solid #cbd5e1; font-size: 0.875rem; color: #475569; background-color: #f8fafc;">
                                {{ __('Cancel') }}
                            </button>
                            <button type="submit" id="set-name" class="btn text-white font-weight-bold py-2.5 px-4 shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 12px; font-size: 0.875rem; letter-spacing: 0.2px;">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Footer Section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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
                var formType = $('#formType').val();
                startTimer();
                $.ajax({
                    url: "{{ route('sendOtp') }}?email=" + email + "&formType="+formType,
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
    <script>
        $(document).ready(function() {
            $('.add_address').change(function() {
                var type = $('.add_address').data('type');
                // var value = $('option:selected', '.address').attr('value');
                var value = $(this).val();
                var userId = {{ Auth::check() == true ? 'true' : 'false' }};

                if (value == 'add_address') {
                    if (userId == true) {
                        window.location.href = "{{ route('profile') }}?tab=2&emp=1";
                    } else {
                        if (userAuth) {
                            window.location.href = "{{ route('profile') }}?tab=2&emp=1";
                        } else {
                            $(this).val('');
                            $("#loginModal").modal("show");
                        }
                    }

                } else if (value == 'add_address_1') {
                    if (userId == true) {
                        window.location.href = "{{ route('profile') }}?tab=2&emp=2";
                    } else {
                        if (userAuth) {
                            window.location.href = "{{ route('profile') }}?tab=2&emp=2";
                        } else {
                            $(this).val('');
                            $("#loginModal").modal("show");
                        }
                    }

                }
                return false;
            });
        });
    </script>
    <script src="{{ asset('user') }}/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key={{ env('GOOGLE_MAPS_API_KEY', 'AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao') }}&loading=async&callback=initAutocomplete" async defer></script>
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

    <script>
        $(document).ready(function() {
            function phoneMask() {
                var num = $(this).val();
                if (/^[a-zA-Z0-9]{6,}$/.test(num)) {
                    let result = num.replace(/.{3}/g, '$& ');
                    $(this).val(result.toUpperCase().trim());
                }
                return false;
            }
        });
    </script>
</body>

</html>
