@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Generated Payslips Log</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Audit generated pay stubs, form layout types & reference codes</p>
        </div>
        <div>
            <a href="{{ url('admin/export?type=payslips') }}" class="btn btn-sm" style="background: #ffffff; border: 1px solid var(--light-border); color: var(--light-text-sub); border-radius: 6px; font-weight: 600; font-size: 12px;">
                <i class="bi bi-download me-1"></i> Export Payslips CSV
            </a>
        </div>
    </div>

    <div class="apple-table-card">
        <div class="table-responsive">
            <table class="apple-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Reference Code</th>
                        <th>Paystub Title</th>
                        <th>Form Type</th>
                        <th>Created Date</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payslips as $key => $slip)
                    <tr>
                        <td style="font-weight: 600; color: var(--light-text-muted);">{{ $key + 1 }}</td>
                        <td style="font-weight: 700; color: var(--brand-emerald); font-family: monospace;">{{ $slip->reference ?? 'PS-'.rand(1000,9999) }}</td>
                        <td style="font-weight: 600; color: var(--light-text-main);">{{ Str::limit($slip->title ?? 'Paystub Document', 28) }}</td>
                        <td>
                            <span class="badge" style="background: var(--brand-emerald-light); color: var(--brand-emerald); border: 1px solid rgba(5,150,105,0.2); border-radius: 4px; padding: 2px 6px; font-size: 10px; text-transform: uppercase;">
                                {{ $slip->type ?? 'USA' }}
                            </span>
                        </td>
                        <td style="color: var(--light-text-muted); font-size: 12px;">{{ date('d M Y', strtotime($slip->created_at ?? 'now')) }}</td>
                        <td class="text-end">
                            <span class="badge-clean active">Generated</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">No generated payslips found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
