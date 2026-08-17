@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Subscriptions & Transactions Log</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Track customer PayPal transactions, subscription plans & expiration dates</p>
        </div>
        <div>
            <a href="{{ url('admin/export?type=subscriptions') }}" class="btn btn-sm" style="background: #ffffff; border: 1px solid var(--light-border); color: var(--light-text-sub); border-radius: 6px; font-weight: 600; font-size: 12px;">
                <i class="bi bi-download me-1"></i> Export Subscriptions CSV
            </a>
        </div>
    </div>

    <div class="apple-table-card">
        <div class="table-responsive">
            <table class="apple-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User ID</th>
                        <th>PayPal Txn ID</th>
                        <th>Country</th>
                        <th>Start Date</th>
                        <th>Expiry Date</th>
                        <th class="text-end">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscriptions as $key => $sub)
                    <tr>
                        <td style="font-weight: 600; color: var(--light-text-muted);">{{ $key + 1 }}</td>
                        <td style="font-weight: 600; color: var(--light-text-main);">User #{{ $sub->user_id }}</td>
                        <td style="font-family: monospace; color: var(--brand-primary);">{{ $sub->transaction_id ?? 'PAYID-'.rand(100000,999999) }}</td>
                        <td>
                            <span class="badge" style="background: var(--brand-primary-light); color: var(--brand-primary); border: 1px solid var(--brand-primary-border); border-radius: 4px; padding: 2px 6px; font-size: 10px; text-transform: uppercase;">
                                {{ $sub->country ?? 'GLOBAL' }}
                            </span>
                        </td>
                        <td style="color: var(--light-text-muted); font-size: 12px;">{{ date('d M Y', strtotime($sub->start_date ?? 'now')) }}</td>
                        <td style="color: var(--light-text-muted); font-size: 12px;">{{ date('d M Y', strtotime($sub->expiry_date ?? '+30 days')) }}</td>
                        <td class="text-end">
                            <span class="badge-clean active">
                                Active
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-3">No active subscription logs found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
