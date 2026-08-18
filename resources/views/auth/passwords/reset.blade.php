@extends('layouts.resetPwd')

@section('content')
<div class="container py-4 w-100">
    <div class="row justify-content-center w-100 m-0">
        <div class="col-md-6 col-lg-5">
            <div class="card auth-card-elevated overflow-hidden border-0">
                <div class="card-header border-0 text-center py-4 px-4" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                    <h4 class="font-weight-bold text-white mb-1" style="font-size: 1.35rem; letter-spacing: -0.3px;">{{ __('Set New Password') }}</h4>
                    <p class="text-white-50 mb-0 small">{{ __('Please enter your new password to regain access') }}</p>
                </div>

                <div class="card-body p-4 p-sm-5 bg-white">
                    <form method="POST" action="{{ route('password.update', $data['token'] ?? '') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $data['token'] ?? '' }}">
                        <input type="hidden" value="user-password" name="type">

                        <div class="form-group mb-3 text-left position-relative">
                            <label for="new_password" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">{{ __('New Password') }} <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input type="password" name="password" id="new_password" class="form-control py-3 px-3 shadow-none show-password-sd" placeholder="New Password" required autocomplete="new-password" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc; padding-right: 42px;">
                                <i class="fa fa-eye-slash eye-icon new-toggle-password position-absolute" style="right: 14px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #94a3b8; font-size: 0.95rem;"></i>
                            </div>
                        </div>

                        <div class="form-group mb-4 text-left position-relative">
                            <label for="confirm_password" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input type="password" name="password_confirmation" id="confirm_password" class="form-control py-3 px-3 shadow-none show-password-sd" placeholder="Confirm Password" required autocomplete="new-password" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc; padding-right: 42px;">
                                <i class="fa fa-eye-slash eye-icon confirm-toggle-password position-absolute" style="right: 14px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #94a3b8; font-size: 0.95rem;"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block py-3 text-white font-weight-bold shadow-md" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 12px; font-size: 0.95rem; letter-spacing: 0.3px;">
                            {{ __('Update Password') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
