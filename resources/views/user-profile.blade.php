@extends('layouts.app')
@section('content')
<section class="user-profile">
    <div class="container" style="padding: 0;">
        <div class="row">
            <div class="col-lg-3 col-md-3"style="padding: 0;border-right:1px solid #ddd;height:95vh;">
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
                    <P style="color:#333!important;font-weight:500;">Manage your profile, security, and language preferences.</P>
                    <div class="profile-outer">
                        <div class="d-flex">
                            <div class="profile-icon-outer">
                                <i class="fa fa-envelope profile-icon"></i>
                            </div>
                            <div class="user-center-text">
                                <h6 style="padding: 0; margin:0px;color: #5a5858;">Contact Name</h6>
                                <p style="padding:0px;margin:0px;">Mike Bitch</p>
                            </div>
                        </div>

                        <div class="edit-icon">
                           <img class="username" style="width: 15px;" src="images/pen-solid.svg">
                        </div>
                    </div>
                    <div class="profile-outer">
                        <div class="d-flex">
                            <div class="profile-icon-outer">
                                <i class="fa fa-envelope profile-icon"></i>
                            </div>
                            <div class="user-center-text">
                                <h6 style="padding: 0; margin:0px;color: #5a5858;">Email Address</h6>
                                <p style="padding:0px;margin:0px;">kgurwinder400@gmail.com</p>
                            </div>
                        </div>

                        <div class="edit-icon">
                           <img class="username2" style="width: 15px;" src="images/pen-solid.svg">
                        </div>
                    </div>
                    <div class="profile-outer">
                        <div class="d-flex">
                            <div class="profile-icon-outer">
                                <i class="fa fa-lock lock"></i>
                            </div>
                            <div class="user-center-text">
                                <h6 style="padding: 0; margin:0px;color: #5a5858;">Password</h6>
                                <p style="padding:0px;margin:0px;">*********</p>
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
                <button type="button" style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body pb-4" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                <form>
                    <label class="label-text" for="css">Contact Name</label>
                    <input class="contact-box" type="text" placeholder="Contact Name">

                </form>


            </div>
            <div class="modal-footer" style="display: inline-block;">
                <div class="d-flex justify-content-between pt-2">
                    <button class="btn-secondary"style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                    <button class="btn-danger"style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;">Save</button>
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
                <button type="button" style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body pb-4" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                <p class="mail-text">Enter the Password set for the account and proceed to set a new email  address.</p>
                <form>
                   <input class="contact-box" type="text" placeholder="Password*">
                   <input class="contact-box" type="text" placeholder="New Email Address*">

                </form>


            </div>
            <div class="modal-footer" style="display: inline-block;">
                <div class="d-flex justify-content-between pt-2">
                    <button class="btn-secondary"style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                    <button class="btn-danger"style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;">Save</button>
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
                <button type="button" style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body pb-4" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                <p class="mail-text">Set a new password for ypur account.</p>
                <form>
                   <input class="contact-box" type="text" placeholder="Current Password*">
                   <input class="contact-box" type="text" placeholder="New Password*">
                   <input class="contact-box" type="text" placeholder="Confirm Password*">

                </form>


            </div>
            <div class="modal-footer" style="display: inline-block;">
                <div class="d-flex justify-content-between pt-2">
                    <button class="btn-secondary"style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                    <button class="btn-danger"style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(".username").click(function () {
    $("#userName").modal("show");
});
</script>
<script>
    $(".username2").click(function () {
    $("#userName2").modal("show");
});
</script>
<script>
    $(".username3").click(function () {
    $("#userName3").modal("show");
});
</script>
@endsection
