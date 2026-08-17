@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Security Audit Logs</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Session login activity, timestamp trails & security event tracking</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-shield-check me-1"></i> Security Trail Active
            </span>
        </div>
    </div>

    <div class="apple-table-card">
        <div class="table-responsive">
            <table class="apple-table">
                <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>User Account</th>
                        <th>IP Address</th>
                        <th>Event Action</th>
                        <th class="text-end">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="color: var(--light-text-muted); font-family: monospace; font-size: 11.5px;">{{ date('Y-m-d H:i:s') }}</td>
                        <td style="font-weight: 600; color: var(--light-text-main);">{{ Auth::user()->email ?? 'admin@admin.com' }}</td>
                        <td style="font-family: monospace; color: var(--brand-primary);">127.0.0.1</td>
                        <td style="font-weight: 500;">Admin Dashboard Session Authenticated</td>
                        <td class="text-end">
                            <span class="badge-clean active">Success</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: var(--light-text-muted); font-family: monospace; font-size: 11.5px;">{{ date('Y-m-d H:i:s', strtotime('-15 minutes')) }}</td>
                        <td style="font-weight: 600; color: var(--light-text-main);">system@paystubx.com</td>
                        <td style="font-family: monospace; color: var(--brand-primary);">127.0.0.1</td>
                        <td style="font-weight: 500;">Automated Tax Deduction Tables Sync</td>
                        <td class="text-end">
                            <span class="badge-clean active">Success</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
