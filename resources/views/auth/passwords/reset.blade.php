@extends('layouts.resetPwd')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;color:#002d72; font-size:20px;background-color:#fff; border-bottom:none;">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update',$data['token']) }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $data['token'] }}">



                        @csrf
                        <input type="hidden" value="user-password" name="type">
                        <div class="contact-box-outer">
                            <label class="label-text" for="css">New Password<span
                                    style="color:red;">*</span></label>
                                    <input class="contact-box" type="password" placeholder="New Password"
                                    name="password" class="form-control show-password-sd" id="new_password"required>
                                <i id="eye-icon_03" toggle="#password-field" class="fa fa-eye-slash eye-icon new-toggle-password" data-id="02"></i>
                        </div>
                        <div class="contact-box-outer">
                            <label class="label-text" for="css">Confirm Password<span
                                    style="color:red;">*</span></label>
                                    <input class="contact-box" type="password" placeholder="Confirm Password"
                                    name="password_confirmation" class="form-control show-password-sd" id="confirm_password"required>
                                <i id="eye-icon_03" toggle="#password-field" class="fa fa-eye-slash eye-icon confirm-toggle-password" data-id="02"></i>
                        </div>

                        <div class="row mb-0">
                            <div class=" mt-4" style="
                                width: 100%;
                                display: flex;
                                justify-content: center;
                            ">
                                <button type="submit" class="btn btn-danger" style="border-radius: 50px;background-color:#fc280b; font-size:16px; padding:4px 15px;">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








