@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">System Settings Hub</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Vercel & Linear style centralized configuration engine and platform security vault.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge-clean active">
                <i class="bi bi-shield-lock-fill me-1"></i> System Vault v2.4
            </span>
        </div>
    </div>

    <!-- Vercel / Linear Style Split Settings Hub -->
    <div class="row g-3">
        
        <!-- Left Sub-Sidebar Menu (Col-md-3) -->
        <div class="col-lg-3 col-md-4">
            <div class="apple-card p-2" style="background: #ffffff; border: 1px solid var(--light-border); border-radius: 12px;">
                <div class="px-2 py-1 text-muted" style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;">Platform Config</div>
                <div class="nav flex-column nav-pills gap-1 mt-1" id="vercelSettingsTabs" role="tablist">
                    
                    <button class="nav-link active text-start d-flex align-items-center justify-content-between py-2 px-3" id="v-brand-tab" data-bs-toggle="pill" data-bs-target="#v-brand" type="button" role="tab" style="font-size: 12.5px; font-weight: 600; border-radius: 8px;">
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-building" style="font-size: 14px; color: var(--brand-primary);"></i> Company & Brand</span>
                        <i class="bi bi-chevron-right text-muted" style="font-size: 10px;"></i>
                    </button>

                    <button class="nav-link text-start d-flex align-items-center justify-content-between py-2 px-3" id="v-tax-tab" data-bs-toggle="pill" data-bs-target="#v-tax" type="button" role="tab" style="font-size: 12.5px; font-weight: 600; border-radius: 8px;">
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-percent" style="font-size: 14px; color: var(--brand-emerald);"></i> Tax Calculation Rules</span>
                        <i class="bi bi-chevron-right text-muted" style="font-size: 10px;"></i>
                    </button>

                    <button class="nav-link text-start d-flex align-items-center justify-content-between py-2 px-3" id="v-pdf-tab" data-bs-toggle="pill" data-bs-target="#v-pdf" type="button" role="tab" style="font-size: 12.5px; font-weight: 600; border-radius: 8px;">
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-file-earmark-pdf-fill" style="font-size: 14px; color: var(--brand-amber);"></i> PDF Engine & Watermarks</span>
                        <i class="bi bi-chevron-right text-muted" style="font-size: 10px;"></i>
                    </button>

                    <button class="nav-link text-start d-flex align-items-center justify-content-between py-2 px-3" id="v-sec-tab" data-bs-toggle="pill" data-bs-target="#v-sec" type="button" role="tab" style="font-size: 12.5px; font-weight: 600; border-radius: 8px;">
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-shield-check" style="font-size: 14px; color: var(--brand-rose);"></i> Security & Access</span>
                        <i class="bi bi-chevron-right text-muted" style="font-size: 10px;"></i>
                    </button>

                    <div class="px-2 py-1 mt-2 text-muted" style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;">Integrations & Credentials</div>

                    <button class="nav-link text-start d-flex align-items-center justify-content-between py-2 px-3" id="v-smtp-tab" data-bs-toggle="pill" data-bs-target="#v-smtp" type="button" role="tab" style="font-size: 12.5px; font-weight: 600; border-radius: 8px;">
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-envelope-fill" style="font-size: 14px; color: var(--brand-primary);"></i> SMTP Mail Server</span>
                        <i class="bi bi-chevron-right text-muted" style="font-size: 10px;"></i>
                    </button>

                    <button class="nav-link text-start d-flex align-items-center justify-content-between py-2 px-3" id="v-paypal-tab" data-bs-toggle="pill" data-bs-target="#v-paypal" type="button" role="tab" style="font-size: 12.5px; font-weight: 600; border-radius: 8px;">
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-paypal" style="font-size: 14px; color: var(--brand-emerald);"></i> PayPal Payment Gateway</span>
                        <i class="bi bi-chevron-right text-muted" style="font-size: 10px;"></i>
                    </button>

                    <button class="nav-link text-start d-flex align-items-center justify-content-between py-2 px-3" id="v-push-tab" data-bs-toggle="pill" data-bs-target="#v-push" type="button" role="tab" style="font-size: 12.5px; font-weight: 600; border-radius: 8px;">
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-bell-fill" style="font-size: 14px; color: var(--brand-rose);"></i> Push Notifications</span>
                        <i class="bi bi-chevron-right text-muted" style="font-size: 10px;"></i>
                    </button>

                    <div class="px-2 py-1 mt-2 text-muted" style="font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;">Personal Account</div>

                    <button class="nav-link text-start d-flex align-items-center justify-content-between py-2 px-3" id="v-profile-tab" data-bs-toggle="pill" data-bs-target="#v-profile" type="button" role="tab" style="font-size: 12.5px; font-weight: 600; border-radius: 8px;">
                        <span class="d-flex align-items-center gap-2"><i class="bi bi-person-badge-fill" style="font-size: 14px; color: var(--brand-amber);"></i> Admin Profile & Password</span>
                        <i class="bi bi-chevron-right text-muted" style="font-size: 10px;"></i>
                    </button>

                </div>
            </div>
        </div>

        <!-- Right Main Configuration Panel (Col-md-9) -->
        <div class="col-lg-9 col-md-8">
            <div class="tab-content" id="vercelSettingsContent">

                <!-- 1. Company & Brand Identity -->
                <div class="tab-pane fade show active" id="v-brand" role="tabpanel">
                    <div class="apple-card" style="background: #ffffff; border: 1px solid var(--light-border); border-radius: 12px;">
                        <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
                            <div>
                                <h3 class="mb-1" style="font-size: 16px; font-weight: 700; color: var(--light-text-main);">Company & Brand Identity</h3>
                                <p class="text-muted mb-0" style="font-size: 12px;">Configure public organization details, legal tax EIN, and customer support channels.</p>
                            </div>
                            <span class="badge-clean active">Public Profile</span>
                        </div>

                        <form action="{{ route('admin.settings') }}" method="POST">
                            @csrf
                            <input type="hidden" name="request_type" value="site_info">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Platform / Company Legal Name</label>
                                    <input type="text" name="company_name" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $siteInfo['company_name'] ?? 'PaystubX Technologies Inc.' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Tax Employer Identification (EIN / Tax ID)</label>
                                    <input type="text" name="tax_id" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $siteInfo['tax_id'] ?? 'XX-XXXXXXX' }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Customer Support Email</label>
                                    <input type="email" name="support_email" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $siteInfo['support_email'] ?? 'support@paystubx.com' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Customer Support Phone</label>
                                    <input type="text" name="support_phone" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $siteInfo['support_phone'] ?? '+1 (800) 555-0199' }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Official Corporate Address</label>
                                    <textarea rows="3" name="company_address" class="form-control form-control-sm" style="border-radius: 6px;">{{ $siteInfo['company_address'] ?? '100 Enterprise Way, Suite 400, New York, NY 10001' }}</textarea>
                                </div>

                                <div class="col-12 text-end pt-3 border-top mt-3">
                                    <button type="submit" class="btn btn-sm" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 6px 24px;">
                                        Save Organization Details
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 2. Tax Calculation Rules -->
                <div class="tab-pane fade" id="v-tax" role="tabpanel">
                    <div class="apple-card" style="background: #ffffff; border: 1px solid var(--light-border); border-radius: 12px;">
                        <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
                            <div>
                                <h3 class="mb-1" style="font-size: 16px; font-weight: 700; color: var(--light-text-main);">Tax & Deduction Calculation Rules</h3>
                                <p class="text-muted mb-0" style="font-size: 12px;">Configure default statutory federal tax withholding rates, Medicare, Social Security, and currency symbols.</p>
                            </div>
                            <span class="badge-clean active">IRS Compliant</span>
                        </div>

                        <form action="{{ route('admin.settings') }}" method="POST">
                            @csrf
                            <input type="hidden" name="request_type" value="tax_engine">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Social Security Tax Rate (%)</label>
                                    <input type="text" name="ss_rate" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $taxEngine['ss_rate'] ?? '6.2' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Medicare Tax Rate (%)</label>
                                    <input type="text" name="medicare_rate" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $taxEngine['medicare_rate'] ?? '1.45' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Default Federal Tax Withholding (%)</label>
                                    <input type="text" name="federal_rate" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $taxEngine['federal_rate'] ?? '12.0' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Default Currency Symbol</label>
                                    <input type="text" name="currency_symbol" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $taxEngine['currency_symbol'] ?? '$' }}" required>
                                </div>

                                <div class="col-12">
                                    <div class="form-check form-switch p-3" style="background: var(--light-bg-subtle); border-radius: 8px; border: 1px solid var(--light-border);">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" name="auto_rounding" id="vAutoRounding" value="1" {{ ($taxEngine['auto_rounding'] ?? '1') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="vAutoRounding" style="font-size: 12.5px;">Enable Automatic Cents Rounding (Round to 2 Decimals)</label>
                                    </div>
                                </div>

                                <div class="col-12 text-end pt-3 border-top mt-3">
                                    <button type="submit" class="btn btn-sm" style="background: var(--brand-emerald); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 6px 24px;">
                                        Save Tax Calculation Rules
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 3. PDF Engine & Watermarks -->
                <div class="tab-pane fade" id="v-pdf" role="tabpanel">
                    <div class="apple-card" style="background: #ffffff; border: 1px solid var(--light-border); border-radius: 12px;">
                        <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
                            <div>
                                <h3 class="mb-1" style="font-size: 16px; font-weight: 700; color: var(--light-text-main);">PDF Rendering & Watermark Engine</h3>
                                <p class="text-muted mb-0" style="font-size: 12px;">Configure default paper format sizing, security watermark opacity, and automated PDF email delivery.</p>
                            </div>
                            <span class="badge-clean active">DomPDF 2.0</span>
                        </div>

                        <form action="{{ route('admin.settings') }}" method="POST">
                            @csrf
                            <input type="hidden" name="request_type" value="pdf_engine">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Paper Format Sizing</label>
                                    <select name="paper_size" class="form-select form-select-sm" style="border-radius: 6px;">
                                        <option value="letter" {{ ($pdfEngine['paper_size'] ?? '') == 'letter' ? 'selected' : '' }}>US Letter (8.5" x 11")</option>
                                        <option value="a4" {{ ($pdfEngine['paper_size'] ?? '') == 'a4' ? 'selected' : '' }}>A4 Standard (8.27" x 11.69")</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Security Watermark Opacity</label>
                                    <select name="watermark_opacity" class="form-select form-select-sm" style="border-radius: 6px;">
                                        <option value="15" {{ ($pdfEngine['watermark_opacity'] ?? '') == '15' ? 'selected' : '' }}>15% Opacity (Subtle)</option>
                                        <option value="30" {{ ($pdfEngine['watermark_opacity'] ?? '') == '30' ? 'selected' : '' }}>30% Opacity (Standard)</option>
                                        <option value="50" {{ ($pdfEngine['watermark_opacity'] ?? '') == '50' ? 'selected' : '' }}>50% Opacity (High Security)</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <div class="form-check form-switch p-3 mb-2" style="background: var(--light-bg-subtle); border-radius: 8px; border: 1px solid var(--light-border);">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" name="auto_email_pdf" id="vAutoEmailPdf" value="1" {{ ($pdfEngine['auto_email_pdf'] ?? '1') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="vAutoEmailPdf" style="font-size: 12.5px;">Auto-Email Generated Paystub PDF Copy to Customer</label>
                                    </div>

                                    <div class="form-check form-switch p-3" style="background: var(--light-bg-subtle); border-radius: 8px; border: 1px solid var(--light-border);">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" name="qr_verification" id="vQrVerification" value="1" {{ ($pdfEngine['qr_verification'] ?? '1') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="vQrVerification" style="font-size: 12.5px;">Embed Digital Verification Security QR Code on PDF Footer</label>
                                    </div>
                                </div>

                                <div class="col-12 text-end pt-3 border-top mt-3">
                                    <button type="submit" class="btn btn-sm" style="background: var(--brand-amber); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 6px 24px;">
                                        Save PDF Rendering Engine
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 4. Security & Access -->
                <div class="tab-pane fade" id="v-sec" role="tabpanel">
                    <div class="apple-card" style="background: #ffffff; border: 1px solid var(--light-border); border-radius: 12px;">
                        <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
                            <div>
                                <h3 class="mb-1" style="font-size: 16px; font-weight: 700; color: var(--light-text-main);">Security & Access Control Settings</h3>
                                <p class="text-muted mb-0" style="font-size: 12px;">Session idle timeouts, HTTPS SSL force redirection, and security audit event logging.</p>
                            </div>
                            <span class="badge-clean active">Shield Active</span>
                        </div>

                        <form action="{{ route('admin.settings') }}" method="POST">
                            @csrf
                            <input type="hidden" name="request_type" value="security_config">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Idle Session Timeout (Minutes)</label>
                                    <input type="number" name="session_timeout" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $securityConfig['session_timeout'] ?? '120' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Max Failed Login Attempts</label>
                                    <input type="number" name="max_login_attempts" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $securityConfig['max_login_attempts'] ?? '5' }}" required>
                                </div>

                                <div class="col-12">
                                    <div class="form-check form-switch p-3 mb-2" style="background: var(--light-bg-subtle); border-radius: 8px; border: 1px solid var(--light-border);">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" name="force_https" id="vForceHttps" value="1" {{ ($securityConfig['force_https'] ?? '1') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="vForceHttps" style="font-size: 12.5px;">Force HTTPS SSL Redirection across Platform</label>
                                    </div>

                                    <div class="form-check form-switch p-3" style="background: var(--light-bg-subtle); border-radius: 8px; border: 1px solid var(--light-border);">
                                        <input class="form-check-input ms-0 me-2" type="checkbox" name="enable_audit_log" id="vEnableAuditLog" value="1" {{ ($securityConfig['enable_audit_log'] ?? '1') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="vEnableAuditLog" style="font-size: 12.5px;">Enable Real-time Security Event Audit Logging</label>
                                    </div>
                                </div>

                                <div class="col-12 text-end pt-3 border-top mt-3">
                                    <button type="submit" class="btn btn-sm" style="background: var(--brand-rose); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 6px 24px;">
                                        Save Security Controls
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 5. SMTP Mail Server -->
                <div class="tab-pane fade" id="v-smtp" role="tabpanel">
                    <div class="apple-card" style="background: #ffffff; border: 1px solid var(--light-border); border-radius: 12px;">
                        <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
                            <div>
                                <h3 class="mb-1" style="font-size: 16px; font-weight: 700; color: var(--light-text-main);">SMTP Mail Server Credentials</h3>
                                <p class="text-muted mb-0" style="font-size: 12px;">Configure outgoing transactional email server settings, ports, and encrypted credentials.</p>
                            </div>
                            <span class="badge-clean active">TLS Encrypted</span>
                        </div>

                        <form action="{{ route('admin.settings') }}" method="POST">
                            @csrf
                            <input type="hidden" name="request_type" value="smtp">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">SMTP Email / Username</label>
                                    <input type="email" name="smtp_email" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="smtp@domain.com" value="{{ $smtp['email'] ?? '' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">SMTP Password</label>
                                    <input type="password" name="smtp_password" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="••••••••••••" value="{{ $smtp['password'] ?? '' }}" required>
                                </div>

                                <div class="col-md-8">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Mail Host</label>
                                    <input type="text" name="smtp_host" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="smtp.gmail.com" value="{{ $smtp['host'] ?? '' }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Mail Port</label>
                                    <input type="text" name="smtp_port" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="587" value="{{ $smtp['port'] ?? '' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">From Address</label>
                                    <input type="text" name="smtp_from_address" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="noreply@paystubx.com" value="{{ $smtp['from_address'] ?? '' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">From Name</label>
                                    <input type="text" name="smtp_from_name" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="Paystub X" value="{{ $smtp['from_name'] ?? '' }}" required>
                                </div>

                                <div class="col-12 text-end pt-3 border-top mt-3">
                                    <button type="submit" class="btn btn-sm" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 6px 24px;">
                                        Save SMTP Credentials
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 6. PayPal Gateway -->
                <div class="tab-pane fade" id="v-paypal" role="tabpanel">
                    <div class="apple-card" style="background: #ffffff; border: 1px solid var(--light-border); border-radius: 12px;">
                        <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
                            <div>
                                <h3 class="mb-1" style="font-size: 16px; font-weight: 700; color: var(--light-text-main);">PayPal Gateway Configuration</h3>
                                <p class="text-muted mb-0" style="font-size: 12px;">Configure PayPal API v2 credentials, sandbox environment mode, and default checkout currency.</p>
                            </div>
                            <span class="badge-clean active">API v2 Ready</span>
                        </div>

                        <form action="{{ route('admin.settings') }}" method="POST">
                            @csrf
                            <input type="hidden" name="request_type" value="paypal_configuration">

                            <div class="mb-3 p-3" style="background: var(--light-bg-subtle); border-radius: 8px; border: 1px solid var(--light-border);">
                                <label class="text-muted d-block mb-2" style="font-size: 12px; font-weight: 600;">PayPal Environment Mode</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paypal_mode" id="v-paypal-sandbox" value="SandBox" {{ (isset($currencyData['paypal_mode']) && $currencyData['paypal_mode'] == 'SandBox') ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="v-paypal-sandbox" style="font-size: 12.5px;">Sandbox (Testing)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paypal_mode" id="v-paypal-live" value="Live" {{ (isset($currencyData['paypal_mode']) && $currencyData['paypal_mode'] == 'Live') ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="v-paypal-live" style="font-size: 12.5px; color: var(--brand-emerald);">Production (Live Payments)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Client ID</label>
                                    <input type="text" name="client_id" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="Enter Client ID" value="{{ $currencyData['client_id'] ?? '' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Client Secret</label>
                                    <input type="password" name="client_secret" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="Enter Client Secret" value="{{ $currencyData['client_secret'] ?? '' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">App ID</label>
                                    <input type="text" name="app_id" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="APP-80W284485P519543T" value="{{ $currencyData['app_id'] ?? '' }}" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Default Currency</label>
                                    <select name="currency" class="form-select form-select-sm" style="border-radius: 6px;" required>
                                        <option value="">Select Currency</option>
                                        @foreach ($currencies as $key => $currency)
                                            <option value="{{ $currency }}" @if (isset($currencyData['currency']) && $currencyData['currency'] == $currency) selected @endif>
                                                {{ $currency }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 text-end pt-3 border-top mt-3">
                                    <button type="submit" class="btn btn-sm" style="background: var(--brand-emerald); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 6px 24px;">
                                        Save PayPal Configuration
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 7. Push Notifications -->
                <div class="tab-pane fade" id="v-push" role="tabpanel">
                    <div class="apple-card" style="background: #ffffff; border: 1px solid var(--light-border); border-radius: 12px;">
                        <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
                            <div>
                                <h3 class="mb-1" style="font-size: 16px; font-weight: 700; color: var(--light-text-main);">Push Notification Server API Key</h3>
                                <p class="text-muted mb-0" style="font-size: 12px;">Configure Firebase Cloud Messaging (FCM) server key for browser push alerts.</p>
                            </div>
                            <span class="badge-clean active">FCM Engine</span>
                        </div>

                        <form action="{{ route('admin.settings') }}" method="POST">
                            @csrf
                            <input type="hidden" name="request_type" value="push_notification_server_key">

                            <div class="mb-3">
                                <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">FCM Server API Key</label>
                                <textarea rows="4" name="push_notification_server_key" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="AAAA... FCM Server API Key" required>{{ $notification['push_notification_server_key'] ?? null }}</textarea>
                            </div>

                            <div class="text-end pt-3 border-top mt-3">
                                <button type="submit" class="btn btn-sm" style="background: var(--brand-rose); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 6px 24px;">
                                    Save Push Server Key
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 8. Admin Profile & Password -->
                <div class="tab-pane fade" id="v-profile" role="tabpanel">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="apple-card" style="background: #ffffff; border: 1px solid var(--light-border); border-radius: 12px;">
                                <div class="d-flex align-items-center gap-2 pb-3 mb-3 border-bottom">
                                    <div class="card-icon-pill indigo mb-0">
                                        <i class="bi bi-person-badge-fill"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Admin Personal Profile</h4>
                                        <small class="text-muted" style="font-size: 11px;">Update name & email address</small>
                                    </div>
                                </div>

                                <form action="{{ route('admin.settings') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="request_type" value="personal_info">

                                    <div class="mb-2">
                                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">First Name</label>
                                        <input type="text" name="first_name" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $userObj->first_name ?? '' }}" required>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Last Name</label>
                                        <input type="text" name="last_name" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $userObj->last_name ?? '' }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Account Email</label>
                                        <input type="email" name="email" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $userObj->email ?? '' }}" required>
                                    </div>

                                    <button type="submit" class="btn btn-sm w-100" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                                        Update Profile Details
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="apple-card" style="background: #ffffff; border: 1px solid var(--light-border); border-radius: 12px;">
                                <div class="d-flex align-items-center gap-2 pb-3 mb-3 border-bottom">
                                    <div class="card-icon-pill amber mb-0">
                                        <i class="bi bi-key-fill"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Change Security Password</h4>
                                        <small class="text-muted" style="font-size: 11px;">Update login access password</small>
                                    </div>
                                </div>

                                <form action="{{ route('admin.settings') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="request_type" value="change_password">

                                    <div class="mb-2">
                                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Current Password</label>
                                        <input type="password" name="old_password" class="form-control form-control-sm" style="border-radius: 6px;" required>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">New Password</label>
                                        <input type="password" name="password" class="form-control form-control-sm" style="border-radius: 6px;" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Confirm New Password</label>
                                        <input type="password" name="password_confirmation" class="form-control form-control-sm" style="border-radius: 6px;" required>
                                    </div>

                                    <button type="submit" class="btn btn-sm w-100" style="background: var(--brand-amber); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                                        Change Security Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>
@endsection
