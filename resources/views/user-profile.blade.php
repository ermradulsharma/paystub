@extends('layouts.app')
@section('content')
    <style>
        .my-account:before {
            position: absolute;
            top: 50%;
            background-image: url('../images/user-profile-active.png');
            width: 20px;
            height: 20px;
            content: "";
            background-repeat: no-repeat;
            background-size: contain;
            transform: translatey(-50%);
            left: 12px;

        }

        .address-book:before {
            position: absolute;
            top: 50%;
            background-image: url('../images/icons/address-book.png');
            width: 20px;
            height: 20px;
            content: "";
            background-repeat: no-repeat;
            background-size: contain;
            transform: translatey(-50%);
            left: 12px;

        }

        div#v-pills-tab a {
            position: relative;
            padding-left: 45px;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
            background-color: #fff;
            color: black;
        }

        .address-book {
            background-color: #fff;
            color: black !important;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
        }

        .my-account {
            color: black !important;
        }

        button.add-btn {
            position: absolute;
            right: 16px;
            background: #0c2f5b;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 7.5px 15px;
        }


        .address-b.active {
            color: #fff !important;
        }

        .address-b {
            color: #0c2f5b;
        }

        .address-b:hover {
            color: #0c2f5b;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {

            background-color: #0c2f5b;
        }

        a#pills-profile-tab {
            background: #dddddd96;
            margin-left: 10px;
        }

        a#pills-profile-tab.active {
            background-color: #0c2f5b;
        }



        .select-box {
            text-align: left;
            font-size: 16px;
            border: 1px solid#000;
        }
    </style>
    <section class="user-profile">
        <div class="container" style="padding: 0;">
            <div class="row">
                <div class="col-lg-2" style="padding: 0; height:95vh; border-right:1px solid #ddd;">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link  my-account {{ Request::get('tab') !=2 ? 'active':''}}" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">My Account</a>
                        <a class="nav-link  address-book {{ Request::get('tab')==2 ? 'active':''}}" id="v-pills-profile-tab" data-toggle="pill"
                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">Address
                            Book</a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="tab-content" style="padding-top: 20px;" id="v-pills-tabContent">
                        <div class="tab-pane fade {{ Request::get('tab') !=2 ? 'show active':''}}" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab" style="display:flex;">
                            <div class="col-lg-6 col-md-6" style="padding: 0;">
                                <div class="right-side-bar">
                                    <h4 style="color:#012c63; line-height:26px;">{{ __('User Profile') }}</h4>
                                    <P style="color:#333!important;font-weight:500;">
                                        {{ __('Manage your profile, security, and language
                                                                            preferences.') }}
                                    </P>
                                    <div class="profile-outer">
                                        <div class="d-flex">
                                            <div class="profile-icon-outer">
                                                <i class="fa fa-user user"></i>
                                            </div>

                                            <div class="edit-icon">
                                                <img class="username" style="width: 15px;" data-name="{{ $userObj->name ?? '' }}" src={{ asset('images/pen-solid.svg') }}>
                                            </div>
                                        </div>
                                        <div class="profile-outer">
                                            <div class="d-flex">
                                                <div class="profile-icon-outer">
                                                    <i class="fa fa-envelope profile-icon"></i>
                                                </div>
                                                <div class="user-center-text">
                                                    <h6 style="padding: 0; margin:0px;color: #5a5858;">{{ __('Email Address') }}</h6>
                                                    <p style="padding:0px;margin:0px;">{{ $userObj->email ?? '' }}</p>
                                                </div>
                                            </div>

                                            <div class="edit-icon">
                                                <img class="username2" data-email="{{ $userObj->email ?? '' }}" style="width: 15px;" src={{ asset('images/pen-solid.svg') }}>
                                            </div>
                                        </div>
                                        <div class="profile-outer">
                                            <div class="d-flex">
                                                <div class="profile-icon-outer">
                                                    <i class="fa fa-lock lock"></i>
                                                </div>
                                                <div class="user-center-text">
                                                    <h6 style="padding: 0; margin:0px;color: #5a5858;">{{ __('Password') }}</h6>
                                                    <p style="padding:0px;margin:0px;">{{ '*********' }}</p>
                                                </div>
                                            </div>

                                            <div class="edit-icon">
                                                <img class="username3" style="width: 15px;" src="{{ asset('images/pen-solid.svg') }}">
                                            </div>
                                        </div>
                                        <div class="profile-outer">
                                            <div class="d-flex trash-account">
                                                <div class="profile-icon-outer" style="background-color:red;">
                                                    <i class="fa fa-trash-o trash"></i>
                                                </div>
                                                <div class="user-center-text">
                                                    <button style="padding: 7px 15px; margin:0px;color: #fff;background-color:red; border-radius:5px;border:none; ">Delete Account</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 member-plan">
                                    @if (!empty($subcriptionData))
                                        <h4>{{__('Premium Member Plan')}}</h4>
                                        @if ($subcriptionData->expiry_date > \Carbon\Carbon::now())
                                            <p>{{ $subcriptionData->plan->name ?? '' }} {{__('until')}} {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subcriptionData->expiry_date)->format('d/m/Y') }}</p>
                                        @else
                                            <p>{{__('Plan expired')}}</p>
                                            <button class="renew-btn">{{__('RENEW')}}</button>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ Request::get('tab') ==2 ? 'show active':''}}" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" style="">
                                    <a class="nav-link address-b active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">EMPLOYER</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link address-b" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">EMPLOYEE</a>
                                </li>
                                <button class="add-btn addressBook">Add New Address</button>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"  
                                    aria-labelledby="pills-home-tab">
                                    <table class="table" style="border:1px solid #ddd;">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Company Name</th>
                                                <th scope="col">Address1</th>
                                                <th scope="col">Address2</th>
                                                <th scope="col">City</th>
                                                <th scope="col">State</th>
                                                <th scope="col">Zip Code</th>
                                            </tr>
                                        </thead>
                                        <tbody id="employerTab">
                                            <tr style="border:1px solid #ddd;">
                                                <th scope="row">1</th>
                                                <td>Mark22</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>otto</td>
                                                <td>@mdo</td>
                                                <td>1234</td>
                                                <td style="padding-right:0; padding-left:0;"><img style="width:22px;" src="images/icons/edit-icon.png"></td>
                                                <td style="padding-right:0; padding-left:0;"><img style="width:20px;" src="images/icons/del-icon.png"></td>
                                            </tr>

                                            {{-- <tr style="border:1px solid #ddd;">
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                                <td>otto</td>
                                                <td>@mdo</td>
                                                <td>1234</td>
                                                <td style="padding-right:0; padding-left:0;"><img style="width:22px;"
                                                        src="images/icons/edit-icon.png"></td>
                                                <td style="padding-right:0; padding-left:0;"><img style="width:20px;"
                                                        src="images/icons/del-icon.png"></td>
                                            </tr> --}}
                                            
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <table class="table" style="border:1px solid #ddd;">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Employee Name</th>
                                                <th scope="col">Address1</th>
                                                <th scope="col">Address2</th>
                                                <th scope="col">City</th>
                                                <th scope="col">State</th>
                                                <th scope="col">Zip Code</th>
                                            </tr>
                                        </thead>
                                        <tbody id="employeeTab">
                                            {{-- <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>1234</td>
                                                <td style="padding-right:0; padding-left:0;"><img style="width:22px;"
                                                        src="images/icons/edit-icon.png"></td>
                                                <td style="padding-right:0; padding-left:0;"><img style="width:20px;"
                                                        src="images/icons/del-icon.png"></td>
                                            </tr> --}}
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="addressBook">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title" style="text-transform: capitalize;color:#fff;">Address Book</h4>
                    <button type="button" style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body pb-4 px-0" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                    <div class="new-address-model">
                        <div class="container" style="padding: 0">
                            <div class="row" style="padding: 0;">
                                <div class="col-lg-12"style="padding: 0;">
                                    <form id="addressForm" action="{{route('store.address')}}" method="post" style="padding-top:20px;" class="form-horizontal" role="form">
                                        @csrf
                                        <div class="row">
                                            <label for="inputFullName" id="nameLabel" style="font-weight:bold;"
                                                class="col-sm-12 control-label">EMPLOYER (COMPANY) NAME *</label>
                                            <div class="col-sm-12">
                                                <input style="font-size:16px;" type="text" class="form-control"
                                                    id="inputFullName" name="fullName" placeholder="Full Employer (Company) Name">
                                            </div>
                                        </div>
                                        <input type="hidden" id="adress-type" name="type" value="employer">
                                        <input type="hidden" id="adress-type" name="addressId" >
                                        <div class="form-group">
                                            <p class="col-sm-offset-2 col-sm-12 help-block" style="font-weight: bold;margin-top:10px; margin-bottom:5px;">STREET ADDRESS 1 *
                                            </p>
                                            <div class="col-sm-12">
                                                <input style="font-size:16px;" type="text" class="form-control"
                                                    id="inputAddressLine1" name="addressLine1"
                                                    placeholder="Street Address 1">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <p class="col-sm-offset-2 col-sm-12 help-block"
                                                style="font-weight:bold;margin-bottom:5px;">STREET ADDRESS 2 
                                            </p>
                                            <div class="col-sm-12">
                                                <input style="font-size:16px;" type="text" class="form-control"
                                                    id="inputAddressLine2" name="addressLine2"
                                                    placeholder="Street Address 2 (Optional)">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputCityTown" style="font-weight:bold;" class="col-sm-12 control-label">City</label>
                                            <div class="col-sm-12">
                                                <input style="font-size:16px;" type="text" class="form-control"
                                                    id="inputCityTown" name="cityName" placeholder="City">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="selectCountry" style="font-weight:bold;" class="col-sm-12 control-label">State</label>
                                            <div class="col-sm-12">
                                                <select class="form-control select-box" id="selectCountry"
                                                    name="stateName">
                                                    <option value="" selected="selected">Select</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputZipPostalCode" style="font-weight:bold;" class="col-sm-12 control-label">Zip Code</label>
                                            <div class="col-sm-12">
                                                <input style="font-size:16px;" type="text" class="form-control"
                                                    id="inputZipPostalCode" name="zipCode"
                                                    placeholder="Zip-Code">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="display: inline-block;">
                    <div class="d-flex justify-content-between pt-2">
                        <button class="btn-secondary" data-bs-dismiss="modal"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                        <button class="btn-danger" id="store-address"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userName">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title" style="text-transform: capitalize;color:#fff;">Change Contact Name</h4>
                    <button type="button"
                        style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body pb-4" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                    <form id="userNameForm" method="post" action="{{ route('store.details') }}">
                        @csrf
                        <input type="hidden" value="user-name" name="type">
                        <label class="label-text" for="css">Contact Name<span style="color:red;">*</span></label>
                        <input class="contact-box" type="text" name="uname" id="user-name"
                            placeholder="Contact Name">
                    </form>
                </div>
                <div class="modal-footer" style="display: inline-block;">
                    <div class="d-flex justify-content-between pt-2">
                        <button class="btn-secondary" data-bs-dismiss="modal"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                        <button class="btn-danger" id="store-name"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;">Save</button>
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
                    <form id="userEmailForm" method="post" action="{{ route('store.details') }}">
                        @csrf
                        <input type="hidden" value="user-email" name="type">
                        <div class="contact-box-outer">
                            <label class="label-text" for="css">Password<span style="color:red;">*</span></label>
                            <input class="contact-box" type="password" placeholder="Password" name="password">
                            <i id="eye-icon_00" class="fa fa-eye-slash eye-icon show-password" data-id="00"></i>
                        </div>
                        <label class="label-text" for="css">Email Address<span style="color:red;">*</span></label>
                        <input class="contact-box" type="text" id="user-email" placeholder="Email Address"
                            name="email">
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
                    <h5 class="text-center" style="text-transform:capitalize;">{{ __('Verify your Email Address') }}</h5>
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

                        <form id="loginOtp" action="{{ route('store.details') }}" method="POST" class="text-center">
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
                    <form id="passwordUpdate" method="post" action="{{ route('store.details') }}">
                        @csrf
                        <input type="hidden" value="user-password" name="type">

                        <div class="contact-box-outer">
                            <div class="contact-box-outer">
                                <label class="label-text" for="css">Password<span
                                        style="color:red;">*</span></label>
                                <input class="contact-box" type="password" placeholder="Current Password"
                                    name="currentPassword">
                                <i id="eye-icon_00" toggle="#password-field"
                                    class="fa fa-eye-slash eye-icon show-password" data-id="02"></i>
                            </div>
                        </div>

                        <div class="contact-box-outer">
                            <label class="label-text" for="css">New Password<span
                                    style="color:red;">*</span></label>
                            <input class="contact-box" type="password" placeholder="New Password" name="password"
                                class="form-control show-password-sd" id="new_password" required>
                            <i id="eye-icon_03" toggle="#password-field" class="fa fa-eye-slash eye-icon show-password"
                                data-id="02"></i>
                        </div>
                        <div class="contact-box-outer">
                            <label class="label-text" for="css">Confirm Password<span
                                    style="color:red;">*</span></label>
                            <input class="contact-box" type="password" placeholder="Confirm Password"
                                name="password_confirmation" class="form-control show-password-sd" id="confirm_password"
                                required>
                            <i id="eye-icon_03" toggle="#password-field" class="fa fa-eye-slash eye-icon show-password"
                                data-id="02"></i>
                        </div>
                    </form>
                    <div class="d-flex justify-content-between pt-2">
                        <button class="btn-secondary" data-bs-dismiss="modal"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                        <button class="btn-danger" id="store-password"
                            style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;">Save</button>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="modal fade trashModal" id="deleteAcModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title"><img src="{{ asset('/') }}images/Paystub X.webp" class="icon"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding-bottom:30px;">
                    <h5 class="text-center" style="text-transform:capitalize;">Do you want to delete your account?</h5>
                    <div class=" text-center mt-4">
                        {{-- <h5 style="color: #457bbe;" class="mt-4 text-center">Almost There!</h5> --}}
                        <form id="loginOtp" action="{{ route('delete.account') }}" method="POST" class="text-center">
                            @csrf

                            <button class="previewbtn" type="submit">Yes</button>
                            <button class="previewbtn bottom-close" type="button">NO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('script')
    <script>
        $(document).ready(function(){
            getAddressBook();
        });

        $(".username").click(function() {
            var name = $(this).data('name');
            $('#user-name').val(name);
            $("#userName").modal("show");
        });

        $("#store-name").click(function(e) {
            submitUserData($('#userNameForm')[0]);
        });

        $(".username2").click(function() {
            $("#userName2").modal("show");
        });

        $("#store-email").click(function(e) {
            //submitUserData($('#userEmailForm')[0],".username2","#userName2");
            var form = $('#userEmailForm')[0];
            $.ajax({
                type: 'POST',
                url: form.action,
                data: $(form).serialize(),
                success: function(data) {
                    console.log('data', data);
                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.message);
                        $("#userName2").modal("hide");
                        $('#hidden_email').val(data.email);
                        $("#otpModal").modal("show");
                        startTimer();
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        $("#verify-email").click(function(e) {
            submitUserData($('#loginOtp')[0]);
        });

        $(".username3").click(function() {
            $("#userName3").modal("show");
        });

        $(".trash-account").click(function() {
            $("#deleteAcModal").modal("show");
        });

        $("#store-password").click(function(e) {
            submitUserData($('#passwordUpdate')[0]);
        });

        $("#resendOtpButton").click(function() {
            var email = $('#hidden_email').val();
            startTimer();
            $.ajax({
                url: "{{ route('sendOtp') }}?email=" + email,
                success: function(data) {
                    console.log('data', data);
                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.message);

                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        $(document).on('click', '.show-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $(this).prev('input');
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });

        $(document).on('click', '#pills-profile-tab', function() {
            $("#adress-type").val('employee');
            $('#nameLabel').text('').text('EMPLOYEE NAME *');
            $('#inputFullName').attr('placeholder','Full Employee Name');
            getAddressBook();
        });

        $(document).on('click', '#pills-home-tab', function() {
            $("#adress-type").val('employer');
            $('#nameLabel').text('').text('EMPLOYER (COMPANY) NAME *');
            $('#inputFullName').attr('placeholder','Full Employer (Company) Name');
            getAddressBook();
        });

        $("#store-address").click(function(e) {
            submitUserData($('#addressForm')[0]);
        });

        $(document).on('click', '.btn-edit',function(e) {
            var recordId = $(this).data('record');
            console.log('btn-edit-',recordId);
            $.ajax({
                url: "{{route('get.address')}}?record="+recordId,
                datatype: "json",
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        console.log('record-number-',data);
                        $('#addressForm input[name=addressId]').val(data.addressObj.id);
                        $('#addressForm input[name=fullName]').val(data.addressObj.name);
                        $('#addressForm input[name=type]').val(data.addressObj.type);
                        $('#addressForm input[name=addressLine1]').val(data.addressObj.address_1);
                        $('#addressForm input[name=addressLine2]').val(data.addressObj.address_2);
                        $('#addressForm input[name=cityName]').val(data.addressObj.city);
                        $('#addressForm input[name=stateName]').val(data.addressObj.state);
                        $('#addressForm input[name=zipCode]').val(data.addressObj.zip_code);
                        $('#addressBook').modal('show');
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        function submitUserData(form) {
            $.ajax({
                type: 'POST',
                url: form.action,
                data: $(form).serialize(),
                success: function(data) {
                    console.log('data', data);
                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.message);
                        if(data.pageReload == 'no'){
                            form.reset();
                            getAddressBook();
                            $('#addressBook').modal('hide');
                            return false;
                        }
                        location.reload(true);
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

        }

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
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

        $(".addressBook").click(function() {
            $("#addressBook").modal("show");
        });

        function getAddressBook(){
            var type = $("#adress-type").val();
            $.ajax({
                url: "{{route('fetch.address')}}?type="+type,
                datatype: "html",
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('.tab-pane.fade.show.active').find('tbody').html('').html(data);
                        // $('#employerTab').html('').html(data);
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });
        }
    </script>
@endsection
