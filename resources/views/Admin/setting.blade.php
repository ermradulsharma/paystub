@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">System Settings</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Configure Mail SMTP, PayPal Credentials, Account Password & Personal Details</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-shield-lock-fill me-1"></i> Secure Config
            </span>
        </div>
    </div>

    <div class="row g-3">
        {{-- SMTP Settings Card --}}
        <div class="col-lg-6 col-xl-4">
            <div class="apple-card">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="card-icon-pill indigo mb-0">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">SMTP Email Server</h4>
                </div>

                <form id="smtp" action="{{ route('settings') }}" method="POST">
                    @csrf
                    <input type="hidden" name="request_type" value="smtp">
                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Email Address</label>
                        <input type="email" name="smtp_email" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="Email"
                            value="{{ $smtp['email'] ?? '' }}" autocomplete="off">
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">SMTP Password</label>
                        <input type="password" id="smtp-password" name="smtp_password"
                            class="form-control form-control-sm show-password-sd" style="border-radius: 6px;" placeholder="Password"
                            value="{{ $smtp['password'] ?? '' }}" autocomplete="off">
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Mail Host</label>
                        <input type="text" name="smtp_host" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="smtp.gmail.com" value="{{ $smtp['host'] ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Mail Port</label>
                        <input type="text" name="smtp_port" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="587" value="{{ $smtp['port'] ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">From Address</label>
                        <input type="text" name="smtp_from_address" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="noreply@paystubx.com" value="{{ $smtp['from_address'] ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">From Name</label>
                        <input type="text" name="smtp_from_name" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="Paystub X" value="{{ $smtp['from_name'] ?? '' }}">
                    </div>

                    <button type="submit" class="btn btn-sm w-100" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                        Save SMTP Settings <i class="bi bi-send-fill ms-1"></i>
                    </button>
                </form>
            </div>
        </div>

        {{-- PayPal Configuration Card --}}
        <div class="col-lg-6 col-xl-4">
            <div class="apple-card">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="card-icon-pill emerald mb-0">
                        <i class="bi bi-paypal"></i>
                    </div>
                    <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">PayPal Gateway</h4>
                </div>

                <form id="paypal_configuration_form" action="{{ route('settings') }}" method="POST">
                    @csrf
                    <input type="hidden" name="request_type" value="paypal_configuration">

                    <div class="mb-2 p-2" style="background: var(--light-bg-subtle); border-radius: 6px; border: 1px solid var(--light-border);">
                        <label class="text-muted d-block mb-1" style="font-size: 11.5px; font-weight: 600;">Environment Mode</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="paypal_mode" id="paypal-sandbox" value="SandBox"
                                {{ (isset($currencyData['paypal_mode']) && $currencyData['paypal_mode'] == 'SandBox') ? 'checked' : '' }}>
                            <label class="form-check-label" for="paypal-sandbox" style="font-size: 12px;">Sandbox</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="paypal_mode" id="paypal-live" value="Live"
                                {{ (isset($currencyData['paypal_mode']) && $currencyData['paypal_mode'] == 'Live') ? 'checked' : '' }}>
                            <label class="form-check-label" for="paypal-live" style="font-size: 12px;">Production</label>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Client ID</label>
                        <input type="text" name="client_id" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="Enter Client ID" value="{{ $currencyData['client_id'] ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Client Secret</label>
                        <input type="password" name="client_secret" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="Enter Client Secret" value="{{ $currencyData['client_secret'] ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">App ID</label>
                        <input type="text" name="app_id" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="APP-80W284485P519543T" value="{{ $currencyData['app_id'] ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Default Currency</label>
                        <select name="currency" id="currency_dropdown" class="form-select form-select-sm" style="border-radius: 6px;">
                            <option value="">Select Currency</option>
                            @foreach ($currencies as $key => $currency)
                                <option value="{{ $currency }}" @if (isset($currencyData['currency']) && $currencyData['currency'] == $currency) selected @endif>
                                    {{ $currency }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-sm w-100" style="background: var(--brand-emerald); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                        Save PayPal Config <i class="bi bi-credit-card-fill ms-1"></i>
                    </button>
                </form>
            </div>
        </div>

        {{-- Personal Detail Card --}}
        <div class="col-lg-6 col-xl-4">
            <div class="apple-card">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="card-icon-pill indigo mb-0">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Personal Details</h4>
                </div>

                <form id="personal_detail" action="{{ route('settings') }}" method="POST">
                    @csrf
                    <input type="hidden" name="request_type" value="personal_info">
                    
                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">First Name</label>
                        <input type="text" name="first_name" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="First Name" value="{{ $userObj->first_name ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Last Name</label>
                        <input type="text" name="last_name" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="Last Name" value="{{ $userObj->last_name ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Account Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="admin@admin.com" value="{{ $userObj->email ?? '' }}">
                    </div>

                    <button type="submit" class="btn btn-sm w-100 mt-2" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                        Update Profile <i class="bi bi-person-check-fill ms-1"></i>
                    </button>
                </form>
            </div>
        </div>

        {{-- Change Password Card --}}
        <div class="col-lg-6 col-xl-4">
            <div class="apple-card">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="card-icon-pill amber mb-0">
                        <i class="bi bi-key-fill"></i>
                    </div>
                    <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Change Password</h4>
                </div>

                <form id="change-password-form" action="{{ route('settings') }}" method="POST">
                    @csrf
                    <input type="hidden" name="request_type" value="change_password">
                    
                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Current Password</label>
                        <input type="password" name="old_password" class="form-control form-control-sm show-password-sd" style="border-radius: 6px;"
                            placeholder="Current Password" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">New Password</label>
                        <input type="password" id="password" name="password" class="form-control form-control-sm show-password-sd" style="border-radius: 6px;"
                            placeholder="New Password" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-sm show-password-sd" style="border-radius: 6px;"
                            placeholder="Confirm Password" required>
                    </div>

                    <button type="submit" class="btn btn-sm w-100" style="background: var(--brand-amber); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                        Change Password <i class="bi bi-shield-lock ms-1"></i>
                    </button>
                </form>
            </div>
        </div>

        {{-- Push Notification Server Key Card --}}
        <div class="col-lg-6 col-xl-4">
            <div class="apple-card">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="card-icon-pill rose mb-0">
                        <i class="bi bi-bell-fill"></i>
                    </div>
                    <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Push Notification Key</h4>
                </div>

                <form id="change-password-form1" action="{{ route('settings') }}" method="POST">
                    @csrf
                    <input type="hidden" name="request_type" value="push_notification_server_key">
                    
                    <div class="mb-3">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Server API Key</label>
                        <textarea rows="4" name="push_notification_server_key" class="form-control form-control-sm" style="border-radius: 6px;"
                            placeholder="AAAA... Server Key">{{ $notification['push_notification_server_key'] ?? null }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-sm w-100" style="background: var(--brand-rose); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                        Save Push Key <i class="bi bi-check-lg ms-1"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
