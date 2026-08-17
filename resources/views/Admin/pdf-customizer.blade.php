@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Paystub PDF Customizer & Live Branding Engine</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Customize paystub header colors, watermark text, QR security codes, and corporate branding with real-time preview.</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-file-earmark-pdf-fill me-1"></i> DomPDF 2.0 Engine
            </span>
        </div>
    </div>

    <!-- Workspace Grid -->
    <div class="row g-3">
        <!-- Left Column: Branding Controls -->
        <div class="col-lg-6">
            <div class="apple-card">
                <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                    <div class="card-icon-pill indigo mb-0">
                        <i class="bi bi-palette-fill"></i>
                    </div>
                    <div>
                        <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">PDF Branding & Color Controls</h4>
                        <small class="text-muted" style="font-size: 11px;">Configure paystub visual themes and security elements</small>
                    </div>
                </div>

                <form action="{{ route('admin.pdf-customizer') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Header Accent Color</label>
                            <div class="d-flex align-items-center gap-2">
                                <input type="color" name="accent_color" class="form-control form-control-color p-1" style="width: 42px; height: 32px; border-radius: 6px;" value="{{ $pdfBranding['accent_color'] }}" onchange="document.getElementById('pdfHeaderBanner').style.background = this.value;">
                                <input type="text" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $pdfBranding['accent_color'] }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Typography Font Family</label>
                            <select name="font_family" class="form-select form-select-sm" style="border-radius: 6px;">
                                <option value="Helvetica" {{ $pdfBranding['font_family'] == 'Helvetica' ? 'selected' : '' }}>Helvetica (Clean Standard)</option>
                                <option value="Times-Roman" {{ $pdfBranding['font_family'] == 'Times-Roman' ? 'selected' : '' }}>Times Roman (Classic Legal)</option>
                                <option value="Courier" {{ $pdfBranding['font_family'] == 'Courier' ? 'selected' : '' }}>Courier (Monospace Accounting)</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Watermark Security Text</label>
                            <input type="text" name="watermark_text" class="form-control form-control-sm" style="border-radius: 6px;" value="{{ $pdfBranding['watermark_text'] }}" oninput="document.getElementById('pdfWatermarkText').innerText = this.value;" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Paper Orientation</label>
                            <select name="paper_orientation" class="form-select form-select-sm" style="border-radius: 6px;">
                                <option value="portrait" {{ $pdfBranding['paper_orientation'] == 'portrait' ? 'selected' : '' }}>Portrait (Standard Vertical)</option>
                                <option value="landscape" {{ $pdfBranding['paper_orientation'] == 'landscape' ? 'selected' : '' }}>Landscape (Horizontal)</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch p-2 mb-2" style="background: var(--light-bg-subtle); border-radius: 6px; border: 1px solid var(--light-border);">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="show_company_stamp" id="showStamp" value="1" {{ $pdfBranding['show_company_stamp'] == '1' ? 'checked' : '' }}>
                                <label class="form-check-label font-weight-bold" for="showStamp" style="font-size: 12px;">Display Digital Corporate Seal & Stamp</label>
                            </div>

                            <div class="form-check form-switch p-2" style="background: var(--light-bg-subtle); border-radius: 6px; border: 1px solid var(--light-border);">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="show_qr_code" id="showQr" value="1" {{ $pdfBranding['show_qr_code'] == '1' ? 'checked' : '' }}>
                                <label class="form-check-label font-weight-bold" for="showQr" style="font-size: 12px;">Embed Verification Security QR Code</label>
                            </div>
                        </div>

                        <div class="col-12 text-end mt-3 border-top pt-3">
                            <button type="submit" class="btn btn-sm" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 6px 24px;">
                                <i class="bi bi-save me-1"></i> Save PDF Branding Controls
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Column: Live Real-Time Previewer -->
        <div class="col-lg-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <div class="card-icon-pill emerald mb-0">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                        <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Live Paystub PDF Preview</h4>
                    </div>
                    <span class="badge-clean active">Interactive Canvas</span>
                </div>

                <!-- Simulated PDF Sheet -->
                <div id="pdfSheet" class="p-4 position-relative" style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); min-height: 420px; font-family: sans-serif;">
                    
                    <!-- Watermark Overlay -->
                    <div id="pdfWatermarkText" class="position-absolute top-50 start-50 translate-middle text-muted opacity-10 font-weight-bold text-uppercase pointer-events-none" style="font-size: 32px; letter-spacing: 4px; transform: translate(-50%, -50%) rotate(-30deg); white-space: nowrap; user-select: none;">
                        {{ $pdfBranding['watermark_text'] }}
                    </div>

                    <!-- Header Banner -->
                    <div id="pdfHeaderBanner" class="p-3 text-white rounded mb-3 d-flex align-items-center justify-content-between" style="background: {{ $pdfBranding['accent_color'] }};">
                        <div>
                            <h5 class="mb-0 text-white font-weight-bold" style="font-size: 15px;">PAYSTUB STATEMENT</h5>
                            <small style="opacity: 0.85; font-size: 10.5px;">Pay Period: Aug 01, 2026 - Aug 15, 2026</small>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-white text-dark font-weight-bold" style="font-size: 10px;">EARNINGS CONFIRMED</span>
                        </div>
                    </div>

                    <!-- Company & Employee Info -->
                    <div class="row g-2 mb-3" style="font-size: 11px;">
                        <div class="col-6">
                            <strong class="text-muted d-block uppercase" style="font-size: 9.5px;">EMPLOYER:</strong>
                            <div class="font-weight-bold">PaystubX Technologies Inc.</div>
                            <div class="text-muted">100 Enterprise Way, Suite 400, NY</div>
                        </div>
                        <div class="col-6 text-end">
                            <strong class="text-muted d-block uppercase" style="font-size: 9.5px;">EMPLOYEE:</strong>
                            <div class="font-weight-bold">Johnathan Doe</div>
                            <div class="text-muted">ID: #EMP-89421</div>
                        </div>
                    </div>

                    <!-- Table Preview -->
                    <table class="table table-sm table-bordered mb-3" style="font-size: 11px;">
                        <thead class="bg-light">
                            <tr>
                                <th>Earnings Category</th>
                                <th>Rate ($)</th>
                                <th>Hours</th>
                                <th class="text-end">Current ($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Regular Base Salary</td>
                                <td>$45.00</td>
                                <td>80.00</td>
                                <td class="text-end font-weight-bold">$3,600.00</td>
                            </tr>
                            <tr>
                                <td>Federal Tax Withholding</td>
                                <td>12.0%</td>
                                <td>-</td>
                                <td class="text-end text-danger">-$432.00</td>
                            </tr>
                            <tr class="table-active">
                                <td colspan="3" class="font-weight-bold">NET TAKE HOME PAY:</td>
                                <td class="text-end font-weight-bold text-success" style="font-size: 13px;">$3,168.00</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Security Stamps -->
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top" style="font-size: 10px;">
                        <div class="text-muted">Generated via DomPDF 2.0 Secure Engine</div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-qr-code text-primary" style="font-size: 20px;"></i>
                            <span class="badge bg-success text-white">IRS COMPLIANT</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
