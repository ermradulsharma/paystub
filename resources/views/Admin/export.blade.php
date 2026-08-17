@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Bulk Data Export System</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Export system database records to CSV spreadsheets for accounting & reporting</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-file-earmark-spreadsheet-fill me-1"></i> CSV Exporter Ready
            </span>
        </div>
    </div>

    <div class="row g-3">
        {{-- Export Users --}}
        <div class="col-lg-4">
            <div class="apple-card text-center">
                <div class="card-icon-pill indigo mx-auto mb-2">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h4 style="font-size: 16px; font-weight: 700; color: var(--light-text-main);">Registered Users</h4>
                <p class="text-muted" style="font-size: 12.5px;">Export all registered customer names, email addresses, roles, and signup timestamps.</p>
                <a href="{{ url('admin/export?type=users') }}" class="btn btn-sm w-100 mt-2" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                    <i class="bi bi-download me-1"></i> Export Users CSV
                </a>
            </div>
        </div>

        {{-- Export Payslips --}}
        <div class="col-lg-4">
            <div class="apple-card text-center">
                <div class="card-icon-pill emerald mx-auto mb-2">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                </div>
                <h4 style="font-size: 16px; font-weight: 700; color: var(--light-text-main);">Generated Payslips</h4>
                <p class="text-muted" style="font-size: 12.5px;">Export reference numbers, country form types, title names, and creation dates.</p>
                <a href="{{ url('admin/export?type=payslips') }}" class="btn btn-sm w-100 mt-2" style="background: var(--brand-emerald); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                    <i class="bi bi-download me-1"></i> Export Payslips CSV
                </a>
            </div>
        </div>

        {{-- Export Subscriptions --}}
        <div class="col-lg-4">
            <div class="apple-card text-center">
                <div class="card-icon-pill amber mx-auto mb-2">
                    <i class="bi bi-credit-card-fill"></i>
                </div>
                <h4 style="font-size: 16px; font-weight: 700; color: var(--light-text-main);">Subscriptions Log</h4>
                <p class="text-muted" style="font-size: 12.5px;">Export PayPal transaction IDs, subscription durations, start dates, and expiration dates.</p>
                <a href="{{ url('admin/export?type=subscriptions') }}" class="btn btn-sm w-100 mt-2" style="background: var(--brand-amber); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                    <i class="bi bi-download me-1"></i> Export Subscriptions CSV
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
