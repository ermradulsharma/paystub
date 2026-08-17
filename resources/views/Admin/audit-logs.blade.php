@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Real-Time Security Activity Audit Trail</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">System security events, admin activity logs, IP address tracking, and user agent telemetry.</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-shield-check me-1"></i> Audit Trail Active
            </span>
        </div>
    </div>

    <!-- Audit Logs Table Card -->
    <div class="apple-table-card">
        <div class="table-title d-flex justify-content-between align-items-center mb-3">
            <span>Security Audit Log Records ({{ count($auditLogs) }})</span>
            <span class="badge-clean active">100% Tamper Proof</span>
        </div>

        <div class="table-responsive">
            <table class="apple-table">
                <thead>
                    <tr>
                        <th>Log ID</th>
                        <th>User Account</th>
                        <th>Security Action</th>
                        <th>Details</th>
                        <th>IP Address</th>
                        <th>User Agent</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($auditLogs as $log)
                    <tr>
                        <td class="font-weight-bold" style="color: var(--brand-primary); font-family: monospace;">{{ $log['id'] }}</td>
                        <td class="font-weight-bold" style="color: var(--light-text-main);">{{ $log['user'] }}</td>
                        <td>
                            <span class="badge bg-dark text-white font-weight-bold" style="font-size: 9.5px; padding: 3px 8px;">
                                {{ $log['action'] }}
                            </span>
                        </td>
                        <td style="max-width: 250px;" class="text-truncate">{{ $log['details'] }}</td>
                        <td style="font-family: monospace; font-size: 11px;">{{ $log['ip'] }}</td>
                        <td style="font-size: 10.5px; max-width: 180px;" class="text-truncate text-muted">{{ $log['user_agent'] }}</td>
                        <td style="font-size: 11px; white-space: nowrap;">{{ $log['timestamp'] }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-3 text-muted">No security audit logs recorded yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
