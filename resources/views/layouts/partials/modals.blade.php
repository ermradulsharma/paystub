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
                        <button class="btn flex-fill py-2.5 font-weight-semibold shadow-sm text-white" type="submit" style="background: #ef4444; border: 1px solid #ef4444; border-radius: 12px; color: #ffffff; font-size: 0.9rem;">{{ __('Yes, Logout') }}</button>
                        <button class="btn flex-fill py-2.5 font-weight-semibold shadow-sm bottom-close" type="button" style="background: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 12px; color: #475569; font-size: 0.9rem;">{{ __('Cancel') }}</button>
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
