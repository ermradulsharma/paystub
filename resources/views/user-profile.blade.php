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

        .renewBtn {
            background-color: #fcc700;
            color: #000;
            font-weight: bold;
            font-size: 18px;
            border-radius: 15px;
            border: 1px solid #000;
            padding: 3px 15px;
            margin-top: 5px;
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
            transition: all 0.3s ease-in-out;
        }

        .address-book:hover {
            background-color: #dddddd96 !important;

        }

        .my-account {
            color: black !important;
            transition: all 0.3s ease-in-out;
        }

        .my-account:hover {
            background-color: #dddddd96 !important;
        }

        button.add-btn {
            position: absolute;
            right: 5px;
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


        .modal {
            z-index: 1001 !important;
        }

        .modal-backdrop {
            z-index: 1000 !important;
        }

        .pac-container {
            z-index: 1055 !important;
        }

        .add-new-btn {
            max-width: 28px;
            display: none;
            position: absolute;
            right: 5px;
        }

        .add-new-btn img {
            width: 100%;
        }

        .left-side-border {
            height: 95vh;
        }

        .editicon {
            width: 22px;
            margin-right: 10px;
        }

        .dlticon {
            width: 20px;
        }

        .table thead th {
            text-transform: capitalize;
            border-bottom: none !important;
        }

        .table td {
            text-transform: capitalize;
        }

        .member-pln-inner {
            border-radius: 20px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.14);
            padding: 30px 20px;
            width: 100%;
            max-width: 300px;
            margin: 0 auto 30px;
        }

        @media(max-width:768px) {
            .table thead th {
                font-size: 12px;
            }

            .left-side-border {
                height: 100%;
            }
        }

        @media(max-width:425px) {
            button.add-btn {
                display: none;
            }

            .editicon {
                width: 12px;
                margin-right: 10px;

            }

            .dlticon {
                width: 10px;
                margin-right: 8px;
            }

            .add-new-btn {
                display: block;
                right: 12px;
            }

            a#pills-home-tab {
                font-size: 10px;
            }

            a#pills-profile-tab {
                font-size: 10px;
            }

            .table thead th {
                font-size: 8px;
                padding: 10px 3px;
                vertical-align: baseline;
            }

            .table td {
                font-size: 8px;
                padding: 10px 3px;
                vertical-align: baseline;
            }

            input.contact-box {
                width: 90%;
            }


        }
    </style>
    <section class="user-profile">
        <div class="container" style="padding: 0px;">
            <div class="row">
                <div class="col-lg-2 left-side-border" style="padding: 0px; border-right:1px solid #ddd;">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link  my-account {{ Request::get('tab') != 2 ? 'active' : '' }}" id="v-pills-home-tab"
                            data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">My Account</a>
                        <a class="nav-link  address-book {{ Request::get('tab') == 2 ? 'active' : '' }}"
                            id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                            aria-controls="v-pills-profile" aria-selected="false">Address Book</a>
                    </div>
                </div>
                <div class="col-lg-10" style="padding: 0px 3px;">
                    <div class="tab-content" style="padding-top: 20px;" id="v-pills-tabContent">
                        <div class="tab-pane fade {{ Request::get('tab') != 2 ? 'show active' : '' }}" id="v-pills-home"
                            role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6" style="padding: 0;">
                                    <div class="right-side-bar">
                                        <h4 style="color:#012c63; line-height:26px;">{{ __('User Profile') }}</h4>
                                        <P style="color:#333!important;font-weight:500;">
                                            {{ __('Manage your profile, security, and language preferences.') }}</P>
                                        <div class="profile-outer">
                                            <div class="d-flex input-left">
                                                <div class="profile-icon-outer">
                                                    <i class="fa fa-user user"></i>
                                                </div>
                                                <div class="user-center-text">
                                                    <h6 style="padding: 0; margin:0px;color: #5a5858;">
                                                        {{ __('Contact Name') }}</h6>
                                                    <p style="padding:0px;margin:0px;">{{ $userObj->name ?? '' }}</p>
                                                </div>
                                            </div>

                                            <div class="edit-icon">
                                                <img class="username" style="width: 15px;"
                                                    data-name="{{ $userObj->name ?? '' }}"
                                                    src={{ asset('images/pen-solid.svg') }}>
                                            </div>
                                        </div>
                                        <div class="profile-outer">
                                            <div class="d-flex input-left">
                                                <div class="profile-icon-outer">
                                                    <i class="fa fa-envelope profile-icon"></i>
                                                </div>
                                                <div class="user-center-text">
                                                    <h6 style="padding: 0; margin:0px;color: #5a5858;">
                                                        {{ __('Email Address') }}</h6>
                                                    <p style="padding:0px;margin:0px;">{{ $userObj->email ?? '' }}</p>
                                                </div>
                                            </div>

                                            <div class="edit-icon">
                                                <img class="changeUserEmail" data-email="{{ $userObj->email ?? '' }}"
                                                    style="width: 15px;" src={{ asset('images/pen-solid.svg') }}>
                                            </div>
                                        </div>
                                        <div class="profile-outer">
                                            <div class="d-flex input-left">
                                                <div class="profile-icon-outer">
                                                    <i class="fa fa-lock lock"></i>
                                                </div>
                                                <div class="user-center-text">
                                                    <h6 style="padding: 0; margin:0px;color: #5a5858;">
                                                        {{ __('Password') }}</h6>
                                                    <p style="padding:0px;margin:0px;">{{ '*********' }}</p>
                                                </div>
                                            </div>

                                            <div class="edit-icon">
                                                <img class="username3" style="width: 15px;"
                                                    src="{{ asset('images/pen-solid.svg') }}">
                                            </div>
                                        </div>
                                        <div class="profile-outer">

                                            <div class="d-flex trash-account" data-route="{{ route('delete.account') }}">
                                                <div class="profile-icon-outer" style="background-color:red;">
                                                    <i class="fa fa-trash-o trash"></i>
                                                </div>
                                                <div class="user-center-text">
                                                    <button
                                                        style="padding: 7px 15px; margin:0px;color: #fff;background-color:red; border-radius:5px;border:none; ">Delete
                                                        Account</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 member-plan">
                                    @if (!empty($subcriptionData))
                                        @if(count($subcriptionData)>0)
                                            <h4>{{ __('Premium Member Plan') }}</h4>
                                            @foreach ($subcriptionData as $subcription)
                                                <div class="member-pln-inner">
                                                    {{-- @if($subcription->expiry_date > \Carbon\Carbon::now()) --}}
                                                        @if ($subcription->country == 'canada')
                                                            @if ($subcription->expiry_date > \Carbon\Carbon::now())
                                                                <p>{{ $subcription->plan->name ?? '' }} {{ __('until') }} {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subcription->expiry_date)->format('m/d/Y') }}<span style="text-transform: uppercase;">({{ $subcription->country }})</span></p>
                                                            @else
                                                                <p>{{ __('Plan expired') }}</p>
                                                                <a class="renew-btn renewBtn" href="{{ route('prizing', ['id' => $subcription->id]) }}" type="btn">{{ __('RENEW') }}</a>
                                                            @endif
                                                        @elseif ($subcription->country == 'usa')
                                                            @if ($subcription->expiry_date > \Carbon\Carbon::now())
                                                                <p>{{ $subcription->plan->name ?? '' }} {{ __('until') }} {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subcription->expiry_date)->format('m/d/Y') }}<span style="text-transform: uppercase;">({{ $subcription->country }})</span></p>
                                                            @else
                                                                <p>{{ __('Plan expired') }}</p>
                                                                <a class="renew-btn renewBtn" href="{{ route('prizing', ['id' => $subcription->id]) }}" type="btn">{{ __('RENEW') }}</a>
                                                            @endif
                                                        @elseif ($subcription->country == 'uk')
                                                            @if ($subcription->expiry_date > \Carbon\Carbon::now())
                                                                <p>{{ $subcription->plan->name ?? '' }} {{ __('until') }} {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subcription->expiry_date)->format('m/d/Y') }}<span style="text-transform: uppercase;">({{ $subcription->country }})</span></p>
                                                            @else
                                                                <p>{{ __('Plan expired') }}</p>
                                                                <a class="renew-btn renewBtn" href="{{ route('prizing', ['id' => $subcription->id]) }}" type="btn">{{ __('RENEW') }}</a>
                                                            @endif
                                                        @endif
                                                    {{-- @endif --}}
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ Request::get('tab') == 2 ? 'show active' : '' }}" id="v-pills-profile"
                            role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" style="">
                                    <a class="nav-link address-b {{ Request::get('emp') != 2 ? 'active' : '' }}"
                                        id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                        aria-controls="pills-home" aria-selected="true">EMPLOYER</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link address-b {{ Request::get('emp') == 2 ? 'active' : '' }}"
                                        id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">{{ __('EMPLOYEE') }}</a>
                                </li>
                                <button class="add-btn addressBook" id="addNewAddress"
                                    data-emptype="{{ Request::get('emp') == 2 ? 'employee' : 'employer' }}">Add New
                                    Address</button>
                                <div class="add-new-btn addressBook" id="addNewAddress2"
                                    data-emptype="{{ Request::get('emp') == 2 ? 'employee' : 'employer' }}"><img
                                        src="images/icons/add-new.png"></div>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="address-tab tab-pane fade {{ Request::get('emp') != 2 ? 'show active' : '' }}"
                                    id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div id="employerTab">
                                        <table class="table" style="border:1px solid #ddd;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Employer (Company) Name</th>
                                                    <th scope="col">Street Address 1</th>
                                                    <th scope="col">Street Address 2</th>
                                                    <th scope="col">City</th>
                                                    <th scope="col">State</th>
                                                    <th scope="col">Zip Code</th>
                                                    <th scope="col">Telephone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr style="border:1px solid #ddd;">
                                                <td scope="row">1</td>
                                                <td>Mark22</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
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
                                </div>
                                <div class="address-tab tab-pane fade {{ Request::get('emp') == 2 ? ' show active' : '' }}"
                                    id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div id="employeeTab">
                                        <table class="table" style="border:1px solid #ddd;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Employee Name</th>
                                                    <th scope="col">Street Address 1</th>
                                                    <th scope="col">Street Address 2</th>
                                                    <th scope="col">City</th>
                                                    <th scope="col">State</th>
                                                    <th scope="col">Zip Code</th>

                                                </tr>
                                            </thead>
                                            <tbody>
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
        </div>
    </section>

    <div class="modal fade" id="addressBook">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title" style="text-transform: capitalize;color:#fff;">Address Book</h4>
                    <button type="button"
                        style="border: none; background-color:transparent; color:#fff;font-size:20px;padding:0;"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body pb-4 px-0" style="box-shadow: 0 0 8px rgba(0,0,0,.14);padding-top:0;">
                    <div class="new-address-model">
                        <div class="container" style="padding: 0">
                            <div class="row" style="padding: 0;">
                                <div class="col-lg-12" style="padding: 0;">
                                    <form id="addressForm" action="{{ route('store.address') }}" method="post"
                                        style="padding-top:20px;" class="form-horizontal" role="form">
                                        @csrf
                                        <div class="row">
                                            <label for="inputFullName" id="nameLabel" style="font-weight:bold;"
                                                class="col-sm-12 control-label">EMPLOYER (COMPANY) NAME *</label>
                                            <div class="col-sm-12">
                                                <input style="font-size:16px;" type="text" class="form-control"
                                                    id="inputFullName" name="fullName"
                                                    placeholder="Full Employer (Company) Name">
                                            </div>
                                        </div>
                                        <input type="hidden" id="adress-type" name="type" value="employer">
                                        <input type="hidden" id="adress-type" name="addressId">
                                        <div class="form-group">
                                            <p class="col-sm-offset-2 col-sm-12 help-block"
                                                style="font-weight: bold;margin-top:10px; margin-bottom:5px;">STREET
                                                ADDRESS 1 * </p>
                                            <div class="col-sm-12">
                                                <input style="font-size:16px;" type="text" class="form-control"
                                                    id="inputAddressLine1" name="addressLine1"
                                                    placeholder="Street Address 1">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <p class="col-sm-offset-2 col-sm-12 help-block"
                                                style="font-weight:bold;margin-bottom:5px;">STREET ADDRESS 2</p>
                                            <div class="col-sm-12">
                                                <input style="font-size:16px;" type="text" class="form-control"
                                                    id="inputAddressLine2" name="addressLine2"
                                                    placeholder="Street Address 2 (Optional)">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputCityTown" style="font-weight:bold;"
                                                class="col-sm-12 control-label">City</label>
                                            <div class="col-sm-12">
                                                <input style="font-size:16px;" type="text" class="form-control"
                                                    id="inputCityTown" name="cityName" placeholder="City">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="selectState" style="font-weight:bold;"
                                                class="col-sm-12 control-label">State</label>
                                            <div class="col-sm-12">

                                                <select class="form-control select-box" id="selectState"
                                                    name="stateName">
                                                    <option value="" selected="selected">Select</option>
                                                    @if (count($stateList) > 0)
                                                        @foreach ($stateList as $state)
                                                            <option value="{{ $state->state_code }}">{{ $state->state }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputZipPostalCode" style="font-weight:bold;"
                                                class="col-sm-12 control-label">Zip Code</label>
                                            <div class="col-sm-12">
                                                <input style="font-size:16px;" type="text" minlength="4"
                                                    maxlength="6" class="form-control" id="inputZipPostalCode"
                                                    name="zipCode" placeholder="Zip-Code">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="tel" style="font-weight:bold;" id="tel-phone-title"
                                                class="col-sm-12 control-label">Employer Telephone</label>
                                            <div class="col-sm-12">
                                                <input type="text" id="tel" name="tel"
                                                    placeholder="123-456-7890 (optional)" maxlength="10" minlength="10"
                                                    class="w-100 p-2 text-center input-box-font third-phone">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="tel" style="font-weight:bold;" id="emp_id_title"
                                                class="col-sm-12 control-label">EMPLOYEE ID</label>
                                            <div class="col-sm-12">
                                                <input type="text" id="emp_id" name="emp_id" placeholder="12345"
                                                    maxlength="5" minlength="5"
                                                    class="w-100 p-2 text-center input-box-font third-phone">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="tel" style="font-weight:bold;" id="emp_ssn_title"
                                                class="col-sm-12 control-label">EMPLOYEE SSN Last 4</label>
                                            <div class="col-sm-12">
                                                <input type="text" id="emp_ssn" name="emp_ssn" placeholder="1234"
                                                    maxlength="4" minlength="4"
                                                    class="w-100 p-2 text-center input-box-font third-phone">
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
                    <form id="userNameForm1" method="post" action="{{ route('store.details') }}">
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

    <div class="modal fade" id="changeUserEmail">
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
                    <form id="changeUserEmail_1" method="post" action="">
                        @csrf
                        <input type="hidden" value="user-email" name="type">
                        <div class="contact-box-outer">
                            <label class="label-text" for="css">Password<span style="color:red;">*</span></label>
                            <input class="contact-box" type="password" placeholder="Password" name="password">
                            <i id="eye-icon_00" toggle="#password-field" class="fa fa-eye-slash eye-icon show-password"
                                data-id="02"></i>
                        </div>
                        <div class="contact-box-outer">
                            <label class="label-text" for="css">Email Address<span
                                    style="color:red;">*</span></label>
                            <input class="contact-box" type="text" id="user-email" placeholder="Email Address"
                                name="email">
                        </div>
                        <div class="d-flex justify-content-between pt-3">
                            <button class="btn-secondary" data-bs-dismiss="modal"
                                style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                            <button class="btn-danger"
                                style="border-radius:20px; border:none;font-size:12px; padding:5px 15px; position:relative; right:26px;"
                                type="submit">Save</button>
                        </div>
                    </form>
                </div>
                {{-- <div class="modal-footer" style="display: inline-block;">
                <div class="d-flex justify-content-between pt-2">
                    <button class="btn-secondary" data-bs-dismiss="modal"
                        style="border-radius:20px; border:none;font-size:12px; padding:5px 10px;">Cancel</button>
                    <button class="btn-danger" id="changeUserEmail"
                        style="border-radius:20px; border:none;font-size:12px; padding:5px 15px;">Save</button>
                </div>
            </div> --}}
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
                            lass="text-center">Enter the verification code sent to you</p>
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
                    <h5 class="text-center delete-msg" style="text-transform:capitalize;">Do you want to delete your
                        account?</h5>
                    <div class=" text-center mt-4">
                        {{-- <h5 style="color: #457bbe;" class="mt-4 text-center">Almost There!</h5> --}}
                        <form id="deleteItem" action="{{ route('delete.account') }}" method="POST"
                            class="text-center">
                            @csrf
                        </form>
                        <button class="previewbtn delete-item">Yes</button>
                        <button class="previewbtn bottom-close" type="button">NO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    <script>
        $(document).ready(function() {
            getAddressBook();

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                getAddressBook(page);
            });
        });

        $(".changeUserEmail").click(function() {
            $("#changeUserEmail").modal("show");

        });

        $("#changeUserEmail").on("submit", function() {
            $.ajax({
                type: 'POST',
                url: '{{ route('profile-setup') }}',
                data: $("#changeUserEmail_1").serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("#changeUserEmail").modal("hide");
                    toastr.success(response.message);
                    $("#userName2").modal("hide");
                    $('#hidden_email').val(response.email);
                    $("#otpModal").modal("show");
                    startTimer();
                },
                error: function(err) {
                    error = err.responseJSON;
                    toastr.error(error.message);
                },
            });
            return false;
        });

        $(".username").click(function() {
            var name = $(this).data('name');
            $('#user-name').val(name);
            $("#userName").modal("show");
        });

        $("#store-name").click(function(e) {
            submitUserData($('#userNameForm1')[0]);
        });

        $("#verify-email").click(function(e) {
            submitUserData($('#loginOtp')[0]);
        });

        $(".username3").click(function() {
            $("#userName3").modal("show");
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

                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.message);

                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });
        });

        $("#store-address").click(function(e) {
            submitUserData($('#addressForm')[0]);
        });

        $(document).on('click', '.btn-edit', function(e) {
            var recordId = $(this).data('record');

            $.ajax({
                url: "{{ route('get.address') }}?record=" + recordId,
                datatype: "json",
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $('#addressForm input[name=addressId]').val(data.addressObj.id);
                        $('#addressForm input[name=fullName]').val(data.addressObj.name);
                        $('#addressForm input[name=type]').val(data.addressObj.type);
                        $('#addressForm input[name=addressLine1]').val(data.addressObj.address_1);
                        $('#addressForm input[name=addressLine2]').val(data.addressObj.address_2);
                        $('#addressForm input[name=cityName]').val(data.addressObj.city);
                        $('#addressForm select[name="stateName"]').val(data.addressObj.state);
                        $('#addressForm input[name=zipCode]').val(data.addressObj.zip_code);
                        if (data.addressObj.type == 'employer') {
                            $('#addressForm input[name=tel]').val(data.addressObj.tel);
                        }
                        if (data.addressObj.type == 'employee') {
                            $('#addressForm input[name=emp_id]').val(data.addressObj.emp_id);
                            $('#addressForm input[name=emp_ssn]').val(data.addressObj.emp_ssn);
                        }
                        openAddressModal('no');
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });
        });

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

        $(document).on('click', '.show-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $(this).prev('input');
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });

        $(document).on('click', '#pills-profile-tab', function() {
            $("#addNewAddress").attr('data-emptype', 'employee');
            getAddressBook();
        });

        $(document).on('click', '#pills-home-tab', function() {
            $("#addNewAddress").attr('data-emptype', 'employer');
            getAddressBook();
        });

        $("#addNewAddress").click(function() {

            openAddressModal();
        });

        $(document).on('click', '#pills-profile-tab', function() {
            $("#addNewAddress2").attr('data-emptype', 'employee');
            getAddressBook();
        });

        $(document).on('click', '#pills-home-tab', function() {
            $("#addNewAddress2").attr('data-emptype', 'employer');
            getAddressBook();
        });

        $("#addNewAddress2").click(function() {
            openAddressModal();
        });

        $(document).on('click', '.delete-item', function(e) {
            submitUserData($('#deleteItem')[0]);
            $('#deleteAcModal').modal('hide');
        });

        $(document).on('click', '.btn-delete-add', function(e) {
            $('.delete-msg').text('Do you want to delete address?');
            var url = $(this).data('route');
            $('#deleteItem').attr('action', url);
            $('#deleteAcModal').modal('show');
        });

        $(".trash-account").click(function() {
            $('.delete-msg').text('Do you want to delete your account?');
            var url = $(this).data('route');
            $('#deleteItem').attr('action', url);
            $("#deleteAcModal").modal("show");
        });

        function openAddressModal(clear = 'yes') {
            if (clear == 'yes') {
                $('#addressForm').find("input[type=text], select").val("");
                $('#addressForm').find("input[name=addressId]").val("");
            }
            var popType = $("#addNewAddress").attr('data-emptype');
            if (popType == 'employee') {
                $("#adress-type").val('employee');
                $('#nameLabel').text('').text('EMPLOYEE NAME *');
                $('#inputFullName').attr('placeholder', 'Full Employee Name');
                $('#tel-phone-title').text('').text('Employee Telephone');
                $('#tel-phone-title').closest("div").addClass('d-none');
            } else if (popType == 'employer') {
                $("#adress-type").val('employer');
                $('#nameLabel').text('').text('EMPLOYER (COMPANY) NAME *');
                $('#inputFullName').attr('placeholder', 'Full Employer (Company) Name');
                $('#tel-phone-title').text('').text('Employer Telephone');
                $('#tel-phone-title').closest("div").removeClass('d-none');
                $('#emp_ssn_title').closest("div").addClass('d-none')
                $('#emp_id_title').closest("div").addClass('d-none')

            }
            $("#addressBook").modal("show");
        }

        function getAddressBook(page = 1) {
            var type = $("#addNewAddress").attr('data-emptype');
            url = "{{ route('fetch.address') }}?page=" + page + "&type=" + type;
            $.ajax({
                url: url,
                datatype: "html",
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        // $('.tab-pane.fade.show.active').find('tbody').html('').html(data);
                        // $('.address-tab.tab-pane.fade.show.active').find('div').html('').html(data);
                        $('#' + type + 'Tab').html('').html(data);
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });
        }

        function submitUserData(form) {
            $.ajax({
                type: 'POST',
                url: form.action,
                data: $(form).serialize(),
                success: function(data) {
                    console.log('data', data);
                    if ($.isEmptyObject(data.error)) {
                        toastr.success(data.message);
                        if (data.pageReload == 'no') {
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
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDpavHXELJMJvIHifFPN6tBBiFSXKGpy2g&callback=Function.prototype">
    </script>
    <script>
        var searchInput = 'inputAddressLine1';

        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode'],
                componentRestrictions: {
                    country: "USA"
                }
            });


            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();
                if (near_place && near_place.address_components.length > 0) {
                    var obj = [];
                    for (var i = 0; i < near_place.address_components.length; i++) {
                        for (var j = 0; j < near_place.address_components[i].types.length; j++) {
                            obj[near_place.address_components[i].types[j]] = near_place.address_components[
                                i].short_name;
                            // if(near_place.address_components[i].types['0'] == 'administrative_area_level_1'){
                            //     $('#state').val(near_place.address_components[i].long_name);
                            // }

                        }
                    }

                    setLocation(obj);

                }
            });
        });

        function setLocation(obj) {
            if (obj.street_number == undefined && obj.route == undefined) {
                $("#inputAddressLine1").val('');
            } else if (obj.street_number == undefined) {
                $("#inputAddressLine1").val(obj.route);
                $('#inputAddressLine1').css('border-color', 'gray');
                $('.0_address_1').remove();
            } else if (obj.route == undefined) {
                $("#inputAddressLine1").val(obj.street_number);
                $('#inputAddressLine1').css('border-color', 'gray');
                $('.0_address_1').remove();
            } else {
                $("#inputAddressLine1").val(obj.street_number + ' ' + obj.route);
                $('#inputAddressLine1').css('border-color', 'gray');
                $('.0_address_1').remove();
            }
            /* if (obj.neighborhood != undefined) {
                $("#address_2").val(obj.neighborhood);
                $('#address_2').css('border-color', 'gray');
                $('.0_address_2').remove();
            } else {
                $("#address_2").val('');
            } */
            if (obj.locality != undefined) {
                $("#inputCityTown").val(obj.locality);
                $('#inputCityTown').css('border-color', 'gray');
                $('.0_city').remove();
            } else {
                $("#city").val('');
            }
            if (obj.administrative_area_level_1 != undefined) {
                $("#selectState").val(obj.administrative_area_level_1);
                $('#selectState').css('border-color', 'gray');
                $('.0_state').remove();
            } else {
                $("#state").val('');
            }
            if (obj.postal_code != undefined) {
                $("#inputZipPostalCode").val(obj.postal_code);
                $('#inputZipPostalCode').css('border-color', 'gray');
                $('.0_zip_code').remove();
            } else {
                $("#zip_code").val('');
            }
            // inputAddressLine1  inputAddressLine2  inputCityTown  selectState  inputZipPostalCode
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="{{ asset('user') }}/js/dist/jquery-input-mask-phone-number.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#inputZipPostalCode').mask('00000-9999');
            $('#tel').mask('000-000-9999');
            // $('#tel').usPhoneFormat({
            //     format: '123-456-7890',
            // });
        });
        $(document).ajaxStart(function() {
            $("#loaderDiv").css("display", "block");
        });

        $(document).ajaxComplete(function() {
            $("#loaderDiv").css("display", "none");
        });
    </script>
@endsection
