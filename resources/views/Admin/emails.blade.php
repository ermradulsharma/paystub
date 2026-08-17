@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Email Templates Manager</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Configure automated notification mail headers, footers & transactional email subjects</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-envelope-check me-1"></i> Mail Engine Active
            </span>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="apple-card">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="card-icon-pill indigo mb-0">
                        <i class="bi bi-envelope-heart-fill"></i>
                    </div>
                    <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Welcome & OTP Email Template</h4>
                </div>

                <div class="mb-2">
                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Email Subject Line</label>
                    <input type="text" class="form-control form-control-sm" style="border-radius: 6px;" value="Verify E-mail - PaystubX">
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Email Footer Text</label>
                    <textarea rows="3" class="form-control form-control-sm" style="border-radius: 6px;">Thanks for choosing PaystubX Team. If you did not request this OTP, please ignore.</textarea>
                </div>

                <button class="btn btn-sm w-100" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                    Update Template <i class="bi bi-check-lg ms-1"></i>
                </button>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="apple-card">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="card-icon-pill emerald mb-0">
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                    </div>
                    <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Payslip Delivery Email</h4>
                </div>

                <div class="mb-2">
                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Email Subject Line</label>
                    <input type="text" class="form-control form-control-sm" style="border-radius: 6px;" value="Your Paystub Document PDF - PaystubX">
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Email Body Note</label>
                    <textarea rows="3" class="form-control form-control-sm" style="border-radius: 6px;">Please find your generated pay stub attached to this email. Keep this document safe.</textarea>
                </div>

                <button class="btn btn-sm w-100" style="background: var(--brand-emerald); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                    Update Template <i class="bi bi-check-lg ms-1"></i>
                </button>
            </div>
        </div>
    </div>
</main>
@endsection
