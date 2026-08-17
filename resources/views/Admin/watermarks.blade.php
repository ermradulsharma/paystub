@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">PDF Watermark Manager</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Upload and toggle custom PDF background watermark overlays for payslip generation</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-file-earmark-image-fill me-1"></i> Watermarks Active
            </span>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="apple-card">
                <div class="card-icon-pill indigo mb-2">
                    <i class="bi bi-shield-shaded"></i>
                </div>
                <div class="card-label">Sample Watermark</div>
                <div class="card-value" style="font-size: 18px; color: var(--light-text-main);">"SAMPLE COPY"</div>
                <div class="card-subtext mb-3">
                    <span>Applied to unpaid preview paystub PDFs to prevent unauthorized usage.</span>
                </div>
                <button class="btn btn-sm w-100" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600;">Configure Overlay</button>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="apple-card">
                <div class="card-icon-pill emerald mb-2">
                    <i class="bi bi-patch-check-fill"></i>
                </div>
                <div class="card-label">Official Seal Watermark</div>
                <div class="card-value" style="font-size: 18px; color: var(--brand-emerald);">"OFFICIAL PAYSTUB"</div>
                <div class="card-subtext mb-3">
                    <span>Subtle official security watermark embedded into final customer PDF downloads.</span>
                </div>
                <button class="btn btn-sm w-100" style="background: var(--brand-emerald); color: #fff; border: none; border-radius: 6px; font-weight: 600;">Configure Overlay</button>
            </div>
        </div>
    </div>
</main>
@endsection
