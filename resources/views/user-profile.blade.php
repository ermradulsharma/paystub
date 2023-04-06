@extends('layouts.app')
@section('content')
    <section class="user-profile">
        <div class="container" style="padding: 0;">
            <div class="row">
                <div class="col-lg-3 col-md-3" style="padding: 0;border-right:1px solid #ddd;height:95vh;">
                    <div class="col-lg-12 col-md-12" style="padding: 0;">
                        <div class="left-sidebar">
                            <div class="row hover" style="padding: 10px 0px;border-bottom:1px solid #ddd;">
                                <div class="col-lg-2">
                                    <img src="images/my-account.png">
                                </div>
                                <div class="col-lg-10">
                                    <div class="user-text">
                                        <h4>My Account</h4>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12" style="padding: 0; ">
                        <div class="left-sidebar">
                            <div class="row hover" style="padding: 10px 0px;border-bottom:1px solid #ddd;">
                                <div class="col-lg-2">
                                    <img src="images/user-profile-active.png">
                                </div>
                                <div class="col-lg-10">
                                    <div class="user-text">
                                        <h4 style="color:#0f4386">User Profile</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9" style="padding: 0;">
                    <div class="right-side-bar">
                        <h4 style="color:#012c63; line-height:26px;">User Profile</h4>
                        <P style="color:#333!important;font-weight:500;">Manage your profile, security, and language
                            preferences.</P>
                        <div class="profile-outer">
                            <div class="d-flex">
                                <div class="profile-icon-outer">
                                    <i class="fa fa-envelope profile-icon"></i>
                                </div>
                                <div class="user-center-text">
                                    <h6 style="padding: 0; margin:0px;color: #5a5858;">Contact Name</h6>
                                    <p style="padding:0px;margin:0px;">{{ $userObj->name ?? '' }}</p>
                                </div>
                            </div>

                            <div class="edit-icon">
                                <img class="username" style="width: 15px;" data-name ="{{ $userObj->name ?? '' }}" src="images/pen-solid.svg">
                            </div>
                        </div>
                        <div class="profile-outer">
                            <div class="d-flex">
                                <div class="profile-icon-outer">
                                    <i class="fa fa-envelope profile-icon"></i>
                                </div>
                                <div class="user-center-text">
                                    <h6 style="padding: 0; margin:0px;color: #5a5858;">Email Address</h6>
                                    <p style="padding:0px;margin:0px;">{{ $userObj->email ?? '' }}</p>
                                </div>
                            </div>

                            <div class="edit-icon">
                                <img class="username2" data-email ="{{ $userObj->email ?? '' }}" style="width: 15px;" src="images/pen-solid.svg">
                            </div>
                        </div>
                        <div class="profile-outer">
                            <div class="d-flex">
                                <div class="profile-icon-outer">
                                    <i class="fa fa-lock lock"></i>
                                </div>
                                <div class="user-center-text">
                                    <h6 style="padding: 0; margin:0px;color: #5a5858;">Password</h6>
                                    <p style="padding:0px;margin:0px;">{{ '*********' }}</p>
                                </div>
                            </div>

                            <div class="edit-icon">
                                <img class="username3" style="width: 15px;" src="images/pen-solid.svg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="userName">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title" style="text-transform: capitalize;color:#fff;">Change Contact Name</h4>
                    <button type="button"
                        style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body pb-4" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                    <form id="userNameForm" method="post" action="{{route('store.details')}}">
                        @csrf
                        <input type="hidden" value="user-name" name="type">
                        <label class="label-text" for="css">Contact Name<span style="color:red;">*</span></label>
                        <input class="contact-box" type="text" name="uname" id="user-name" placeholder="Contact Name">
                    </form>
                </div>
                <div class="modal-footer" style="display: inline-block;">
                    <div class="d-flex justify-content-between pt-2">
                        <button class="btn-secondary" data-bs-dismiss="modal"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                        <button class="btn-danger" id="store-name"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;" >Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="userName2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title" style="text-transform: capitalize;color:#fff;">Change Email Address</h4>
                    <button type="button"
                        style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body pb-4" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                    <p class="mail-text">Enter the Password set for the account and proceed to set a new email address.</p>
                    <form id="userEmailForm" method="post" action="{{route('store.details')}}">
                        @csrf
                        <input type="hidden" value="user-email" name="type">
                        {{-- <div class="contact-box-outer">
                            <label class="label-text" for="css">Password<span style="color:red;">*</span></label>
                            <input class="contact-box" type="text" placeholder="Password" name="password">
                            <i id="eye-icon_00" class="fa fa-eye-slash eye-icon" data-id="00"></i>
                        </div> --}}
                        <label class="label-text" for="css">Email Address<span style="color:red;">*</span></label>
                        <input class="contact-box" type="text" id="user-email" placeholder="Email Address" name="email">
                    </form>
                </div>
                <div class="modal-footer" style="display: inline-block;">
                    <div class="d-flex justify-content-between pt-2">
                        <button class="btn-secondary" data-bs-dismiss="modal"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                        <button class="btn-danger" id="store-email"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;">Save</button>
                    </div>
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
                            <p class="resend-otp"><a id="resendOtpButton"class="pointer-disable" style="" href="JavaScript:void(0);" disabled>Resend  OTP </a><i class="fa fa-clock-o clock"></i><span id="resendTimeOut">30</span></p>

                        <form id="loginOtp" action="{{route('store.details')}}" method="POST" class="text-center">
                            @csrf
                            <input type="hidden" value="verify-email" name="type">
                            <div class="px-lg-5">
                                <input type="hidden" id="hidden_email" name="email" class="d-none">
                                <input type="text" id="Verificationcode" name="code"
                                    class="form-control formm py-4" placeholder="Verification Code *">
                            </div>
                        </form>
                        <button class="previewbtn mt-5" id="verify-email">Verify</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userName3">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title" style="text-transform: capitalize;color:#fff;">Change Password</h4>
                    <button type="button"
                        style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body pb-4" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                    <p class="mail-text">Set a new password for your account.</p>
                    <form id='passwordUpdate' action={{ route('changePassword') }} method="POST">
                        @csrf
                        <input type="hidden" name="updatepassword" id="updatepassword" value="updatepassword">
                        <!-- <div class="contact-box-outer">
                            <label class="label-text" for="css">Current Password<span
                                    style="color:red;">*</span></label>
                            <input class="contact-box" type="text" placeholder="Current Password"
                                name="current_password" id="current_password">
                            <i id="eye-icon_01" class="fa fa-eye-slash eye-icon" data-id="01" data-src="01"></i>
                        </div> -->
                        <div class="contact-box-outer">
                            <label class="label-text" for="css">New Password<span
                                    style="color:red;">*</span></label>
                            <input class="contact-box" type="text" placeholder="New Password" name="new_password"
                                id="new_password"class="form-control show-password-sd" placeholder="Current Password"
                                                required>
                            <i id="eye-icon_02" class="fa fa-eye-slash eye-icon" data-id="02"></i>
                        </div>
                        <div class="contact-box-outer">
                            <label class="label-text" for="css">Confirm Password<span
                                    style="color:red;">*</span></label>
                            <input class="contact-box" type="text" placeholder="Confirm Password"
                                name="confirm_password" class="form-control show-password-sd" id="confirm_password"required>
                            <i id="eye-icon_03" class="fa fa-eye-slash eye-icon" src="eye-icon" data-id="03"></i>
                        </div>
                        {{-- <div class="modal-footer" style="display: inline-block;"> --}}
                        <div class="d-flex justify-content-between pt-2">
                            <button class="btn-secondary" data-bs-dismiss="modal"
                                style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                            <button type="submit" class="btn-danger passwordButton"
                                style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;">Save</button>
                        </div>
                        {{-- </div> --}}
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(".username").click(function() {
            var name = $(this).data('name');
            $('#user-name').val(name);
            $("#userName").modal("show");
        });

        $("#store-name").click(function(e){
            submitUserData($('#userNameForm')[0]);
        });

        $(".username2").click(function() {
            var email = $(this).data('email');
            $('#user-email').val(email);
            $("#userName2").modal("show");
        });

        $("#store-email").click(function(e){
            //submitUserData($('#userEmailForm')[0],".username2","#userName2");
            var form = $('#userEmailForm')[0] ;
            $.ajax({
            type:'POST',
            url: form.action,
            data: $(form).serialize(),
            success:function(data){
                console.log('data',data);
                    if($.isEmptyObject(data.error)){
                        toastr.success(data.message);
                        $("#userName2").modal("hide");
                        $('#hidden_email').val(data.email);
                        $("#otpModal").modal("show");
                        startTimer();
                    }else{
                        printErrorMsg(data.error);
                    }
            }
            });
        });

        $("#verify-email").click(function(e){
            submitUserData($('#loginOtp')[0]);
        });

        $(".username3").click(function() {
            $("#userName3").modal("show");
        });

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





        function submitUserData(form){
            console.log('method-',form.method);
            $.ajax({
            type:'POST',
            url: form.action,
            data: $(form).serialize(),
            success:function(data){
                console.log('data',data);
                    if($.isEmptyObject(data.error)){
                        // alert(data.message);
                        toastr.success(data.message);
                        location.reload(true);
                    }else{
                        printErrorMsg(data.error);
                    }
            }
            });

        }


        function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
                toastr.error(value);
            });
        }

        $('.eye-icon').click(function() {
            var id = $(this).data('id');
            var clr = $(this).attr('src');
            if (clr = 'eye-icon') {
                $("#eye-icon_" + id).removeClass("fa fa-eye-slash eye-icon");
                $("#eye-icon_" + id).addClass("fa fa-eye eye-icon");
            } else {
                $("#eye-icon_" + id).addClass("fa fa-eye-slash eye-icon");
                $("#eye-icon_" + id).removeClass("fa fa-eye eye-icon");
            }

        });

    </script>
@endsection
