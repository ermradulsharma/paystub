@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Admin 2FA Security Vault & Recovery Keys</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Configure Google Authenticator Two-Factor Authentication (TOTP) and generate emergency access recovery codes.</p>
        </div>
        <div>
            <span class="badge-clean {{ $is2FAEnabled == '1' ? 'active' : 'pending' }}">
                <i class="bi bi-shield-lock-fill me-1"></i> {{ $is2FAEnabled == '1' ? '2FA Active' : '2FA Inactive' }}
            </span>
        </div>
    </div>

    <div class="row g-3">
        <!-- Left Column: 2FA Toggle & Configuration -->
        <div class="col-lg-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <div class="card-icon-pill rose mb-0">
                            <i class="bi bi-phone-vibrate-fill"></i>
                        </div>
                        <div>
                            <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Google Authenticator (TOTP)</h4>
                            <small class="text-muted" style="font-size: 11px;">Enforce 6-digit dynamic OTP verification on login</small>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.security-2fa') }}" method="POST">
                    @csrf

                    <div class="p-3 mb-3" style="background: var(--light-bg-subtle); border-radius: 8px; border: 1px solid var(--light-border);">
                        <div class="form-check form-switch p-1">
                            <input class="form-check-input ms-0 me-3" type="checkbox" name="enable_2fa" id="enable2faSwitch" value="1" {{ $is2FAEnabled == '1' ? 'checked' : '' }} onchange="this.form.submit()">
                            <label class="form-check-label font-weight-bold" for="enable2faSwitch" style="font-size: 13px;">
                                {{ $is2FAEnabled == '1' ? 'Disable Two-Factor Authentication' : 'Enable Two-Factor Authentication (2FA)' }}
                            </label>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">2FA TOTP Secret Key</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control font-weight-bold" style="border-radius: 6px 0 0 6px; letter-spacing: 1px;" value="{{ $secretKey }}" readonly>
                                <button class="btn btn-outline-secondary" type="button" onclick="navigator.clipboard.writeText('{{ $secretKey }}'); alert('Secret key copied to clipboard!');">
                                    <i class="bi bi-clipboard"></i> Copy
                                </button>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Test 6-Digit Verification Code</label>
                            <input type="text" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="Enter 6-digit OTP code from app">
                        </div>

                        <div class="col-12 text-end border-top pt-3">
                            <button type="submit" class="btn btn-sm" style="background: var(--brand-rose); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 6px 24px;">
                                <i class="bi bi-shield-check me-1"></i> Update 2FA Security Vault
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Column: Emergency Recovery Keys -->
        <div class="col-lg-6">
            <div class="apple-card">
                <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                    <div class="card-icon-pill amber mb-0">
                        <i class="bi bi-key-fill"></i>
                    </div>
                    <div>
                        <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Emergency Access Recovery Codes</h4>
                        <small class="text-muted" style="font-size: 11px;">Store these 8 emergency backup keys in a safe offline location</small>
                    </div>
                </div>

                <div class="p-3 mb-3" style="background: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0; font-family: monospace; font-size: 12px;">
                    <div class="row g-2 text-center font-weight-bold" style="color: var(--light-text-main);">
                        <div class="col-6 p-2 bg-white rounded border">A98F-342B</div>
                        <div class="col-6 p-2 bg-white rounded border">C712-9810</div>
                        <div class="col-6 p-2 bg-white rounded border">E451-2294</div>
                        <div class="col-6 p-2 bg-white rounded border">F881-3091</div>
                        <div class="col-6 p-2 bg-white rounded border">G102-7741</div>
                        <div class="col-6 p-2 bg-white rounded border">H331-5612</div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="button" class="btn btn-sm btn-outline-dark" style="border-radius: 6px; font-weight: 600;" onclick="alert('Emergency recovery codes printed safely.');">
                        <i class="bi bi-printer me-1"></i> Print Recovery Keys
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
