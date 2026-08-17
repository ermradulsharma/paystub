@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Automated Email Event Triggers & Alerts</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Configure automated transactional email dispatch triggers for signups, PDF receipts, and subscription renewals.</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-envelope-check-fill me-1"></i> SMTP Auto-Dispatcher
            </span>
        </div>
    </div>

    <!-- Main Form Grid -->
    <form action="{{ route('admin.email-events') }}" method="POST">
        @csrf

        <div class="row g-3">
            
            <!-- Event 1: New Signup Welcome Email -->
            <div class="col-lg-6">
                <div class="apple-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-icon-pill indigo mb-0">
                                <i class="bi bi-person-check-fill"></i>
                            </div>
                            <div>
                                <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Signup Welcome Email</h4>
                                <small class="text-muted" style="font-size: 11px;">Triggered on new customer registration</small>
                            </div>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="signup_welcome" id="signupWelcome" value="1" {{ $events['signup_welcome'] == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="p-2.5" style="background: var(--light-bg-subtle); border-radius: 6px; font-size: 11.5px;">
                        <span class="text-muted d-block mb-1">Subject Template:</span>
                        <div class="font-weight-bold text-dark">"Welcome to PaystubX! Getting Started with Global Payroll"</div>
                    </div>
                </div>
            </div>

            <!-- Event 2: Paystub Generation Receipt -->
            <div class="col-lg-6">
                <div class="apple-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-icon-pill emerald mb-0">
                                <i class="bi bi-file-earmark-arrow-down-fill"></i>
                            </div>
                            <div>
                                <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Paystub PDF Delivery Receipt</h4>
                                <small class="text-muted" style="font-size: 11px;">Auto-attach PDF copy when customer generates paystub</small>
                            </div>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="paystub_receipt" id="paystubReceipt" value="1" {{ $events['paystub_receipt'] == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="p-2.5" style="background: var(--light-bg-subtle); border-radius: 6px; font-size: 11.5px;">
                        <span class="text-muted d-block mb-1">Subject Template:</span>
                        <div class="font-weight-bold text-dark">"Your Paystub Statement PDF (Order #{{rand(1000,9999)}}) is Ready"</div>
                    </div>
                </div>
            </div>

            <!-- Event 3: Subscription Renewal Reminder -->
            <div class="col-lg-6">
                <div class="apple-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-icon-pill amber mb-0">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <div>
                                <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Subscription Renewal Alert</h4>
                                <small class="text-muted" style="font-size: 11px;">Sent 3 days prior to recurring subscription charge</small>
                            </div>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="subscription_renewal" id="subRenewal" value="1" {{ $events['subscription_renewal'] == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="p-2.5" style="background: var(--light-bg-subtle); border-radius: 6px; font-size: 11.5px;">
                        <span class="text-muted d-block mb-1">Subject Template:</span>
                        <div class="font-weight-bold text-dark">"Upcoming Renewal Notice for PaystubX Enterprise Plan"</div>
                    </div>
                </div>
            </div>

            <!-- Event 4: Password Reset Security OTP -->
            <div class="col-lg-6">
                <div class="apple-card h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-icon-pill rose mb-0">
                                <i class="bi bi-shield-lock-fill"></i>
                            </div>
                            <div>
                                <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Password Reset Security OTP</h4>
                                <small class="text-muted" style="font-size: 11px;">Instant verification OTP code for password recovery</small>
                            </div>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="password_reset_otp" id="passOtp" value="1" {{ $events['password_reset_otp'] == '1' ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="p-2.5" style="background: var(--light-bg-subtle); border-radius: 6px; font-size: 11.5px;">
                        <span class="text-muted d-block mb-1">Subject Template:</span>
                        <div class="font-weight-bold text-dark">"Security Verification Code: [OTP_CODE] for PaystubX Account"</div>
                    </div>
                </div>
            </div>

            <div class="col-12 text-end mt-3">
                <button type="submit" class="btn btn-sm" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 8px 28px;">
                    <i class="bi bi-check-lg me-1"></i> Save Email Event Triggers
                </button>
            </div>
        </div>
    </form>
</main>
@endsection
