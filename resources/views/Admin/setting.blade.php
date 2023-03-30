@extends('Admin.layouts.default')
@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <div class="pageTitle">
        <h1>Settings</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        {{-- ******************************************************* SMTP ******************************************************* --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex align-items-center">SMTP</h4>
                            </div>

                            <div class="card-body">
                                <form id="smtp" action="{{ route('settings') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="request_type" value="smtp">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" name="smtp_email" class="form-control" placeholder="Email" value="{{ $smtp['email'] ?? '' }}" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" id="smtp-password" name="smtp_password" class="form-control show-password-sd" placeholder="Password" value="{{ $smtp['password'] ?? '' }}" autocomplete="off">
                                        <div style="margin-top: 3px;">
                                            <span>
                                                <input type="checkbox" class="show-password-checkbox">
                                            </span>
                                            <span style="margin-left: 3px;">Show Password</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Mail Host:</label>
                                        <input type="text" name="smtp_host" class="form-control" placeholder="Mail Host" value="{{ $smtp['host'] ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Mail Port:</label>
                                        <input type="text" name="smtp_port" class="form-control" placeholder="Mail Port" value="{{ $smtp['port'] ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label>From Address:</label>
                                        <input type="text" name="smtp_from_address" class="form-control" placeholder="From Address" value="{{ $smtp['from_address'] ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label>From Name:</label>
                                        <input type="text" name="smtp_from_name" class="form-control" placeholder="From Name" value="{{ $smtp['from_name'] ?? '' }}">
                                    </div>

                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex align-items-center">Paypal Configuration</h4>
                            </div>
                            <div class="card-body">
                                <form id="paypal_configuration_form" action="{{ route('settings') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="request_type" value="paypal_configuration">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paypal_mode" id="paypal-sandbox" value="SandBox" {{(isset($currencyData['paypal_mode']) && $currencyData['paypal_mode'] =='SandBox' ? 'checked' : '')}}>
                                        <label class="form-check-label" for="paypal-sandbox">SandBox</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paypal_mode" id="paypal-live" value="Live" {{(isset($currencyData['paypal_mode']) && $currencyData['paypal_mode'] =='Live' ? 'checked' : '')}}>
                                        <label class="form-check-label" for="paypal-live">Production</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Client ID:</label>
                                        <input type="text" name="client_id" class="form-control" placeholder="Enter Client ID" value="{{($currencyData['client_id'] ?? '')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Client Secret:</label>
                                        <input type="text" name="client_secret" class="form-control" placeholder="Enter Client secret" value="{{($currencyData['client_secret'] ?? '')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>App ID:</label>
                                        <input type="text" name="app_id" class="form-control" placeholder="Enter App ID" value="{{($currencyData['app_id'] ?? '')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Currency:</label>
                                        <select name="currency" id="currency_dropdown" class="form-control">
                                            <option value="">Select Currency</option>
                                            @foreach ($currencies as $key => $currency)
                                                <option value="{{$currency}}" @if(isset($currencyData['currency']) && $currencyData['currency'] == $currency) selected @endif>{{$currency}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex align-items-center">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <form id="change-password-form" action="{{ route('settings') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="request_type" value="change_password">
                                    <div class="form-group">
                                        <label>Current Password:</label>
                                        <input type="password" name="old_password" class="form-control show-password-sd" placeholder="Current Password" required>
                                        <div style="margin-top: 3px;">
                                            <span>
                                                <input type="checkbox" class="show-password-checkbox">
                                            </span>
                                            <span style="margin-left: 3px;">Show Password</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password:</label>
                                        <input type="password" id="password" name="password" class="form-control show-password-sd" placeholder="New Password" required>
                                        <div style="margin-top: 3px;">
                                            <span>
                                                <input type="checkbox" class="show-password-checkbox">
                                            </span>
                                            <span style="margin-left: 3px;">Show Password</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password:</label>
                                        <input type="password" name="password_confirmation" class="form-control show-password-sd" placeholder="Confirm Password" required>
                                        <div style="margin-top: 3px;">
                                            <span>
                                                <input type="checkbox" class="show-password-checkbox">
                                            </span>
                                            <span style="margin-left: 3px;">Show Password</span>
                                        </div>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex align-items-center">Personal Detail</h4>
                            </div>
                            <div class="card-body">
                                <form id="personal_detail" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="request_type" value="personal_info">
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $userObj->first_name ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $userObj->last_name ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $userObj->email ?? '' }}">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Image:</label>
                                        <input type="file" name="image" class="form-control h-auto">
                                    </div>
                                    <div class="form-group">
                                        <div class="d-inline-block mb-3">
                                            <img class="img-fluid rounded-circle" src="{{ \Auth::user()->image ?? '' }}" width="150" height="150" alt="">
                                        </div>
                                    </div> --}}
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="d-flex align-items-center">Push Notification Server Key</h4>
                            </div>
                            <div class="card-body">
                                <form id="change-password-form1" action="{{ route('settings') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="request_type" value="push_notification_server_key">
                                    <div class="form-group">
                                        <label>Server Key:</label>
                                        <textarea rows="3" name="push_notification_server_key" class="form-control" placeholder="Server Key">{{ $notification['push_notification_server_key'] ?? null }}</textarea>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
@endsection


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> --}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $( document ).ready(function() {
        $('input[type=radio][name=paypal_mode]').change(function() {
            $('input[name=client_id]').val('');
            $('input[name=client_secret]').val('');
            $('input[name=app_id]').val('');
            $('#currency_dropdown').prop('selectedIndex',0);

        });

        $(".show-password-checkbox").on("change", function() {
            var x = $(this).parent("span").parent("div").siblings(".show-password-sd");
            if ($(x).attr("type") == "password") {
                $(x).prop("type", "text")
            } else {
                $(x).prop("type", "password")
            }
        });
    });
</script>

