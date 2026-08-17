@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">System Broadcast & Live Announcement Engine</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Publish live platform alerts, maintenance notices, and promotional banners to customer dashboards.</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-broadcast me-1"></i> Broadcast Center Online
            </span>
        </div>
    </div>

    <!-- Workspace Grid: Left Form (Col-lg-5), Right History Table (Col-lg-7) -->
    <div class="row g-3">
        <!-- Left Column: New Announcement Form -->
        <div class="col-lg-5">
            <div class="apple-card">
                <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                    <div class="card-icon-pill indigo mb-0">
                        <i class="bi bi-megaphone-fill"></i>
                    </div>
                    <div>
                        <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Create Live Announcement</h4>
                        <small class="text-muted" style="font-size: 11px;">Configure headline, notice alert type, and target audience</small>
                    </div>
                </div>

                <form action="{{ route('admin.broadcast') }}" method="POST">
                    @csrf

                    <div class="mb-2.5">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Announcement Headline *</label>
                        <input type="text" name="headline" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="e.g. Scheduled Tax Engine Maintenance Alert" required>
                    </div>

                    <div class="row g-2 mb-2.5">
                        <div class="col-md-6">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Notice Type *</label>
                            <select name="notice_type" class="form-select form-select-sm" style="border-radius: 6px;" required>
                                <option value="Info">ℹ️ Informational (Blue)</option>
                                <option value="Warning">⚠️ System Warning (Amber)</option>
                                <option value="Maintenance">🚨 Urgent Maintenance (Red)</option>
                                <option value="Promotion">🎁 Feature Launch (Emerald)</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Target Audience *</label>
                            <select name="target_audience" class="form-select form-select-sm" style="border-radius: 6px;" required>
                                <option value="all">All Registered Customers</option>
                                <option value="subscribed">Active Subscribed Users Only</option>
                                <option value="usa">USA Region Customers</option>
                                <option value="uk">UK Region Customers</option>
                                <option value="canada">Canada Region Customers</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Announcement Message Body *</label>
                        <textarea rows="4" name="message_body" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="Write your broadcast announcement message details here..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-sm w-100" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 7px 16px;">
                        <i class="bi bi-send-fill me-1"></i> Publish Live System Broadcast
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Column: Broadcast History Ledger Table -->
        <div class="col-lg-7">
            <div class="apple-table-card">
                <div class="table-title d-flex justify-content-between align-items-center mb-3">
                    <span>Broadcast Announcements Ledger ({{ count($broadcasts) }})</span>
                    <span class="badge-clean active">Real-Time Sync</span>
                </div>

                <table class="apple-table">
                    <thead>
                        <tr>
                            <th>Broadcast ID</th>
                            <th>Headline</th>
                            <th>Type</th>
                            <th>Target</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($broadcasts as $b)
                        <tr>
                            <td class="font-weight-bold" style="color: var(--brand-primary);">{{ $b['id'] }}</td>
                            <td style="max-width: 220px;" class="text-truncate">
                                <div class="font-weight-bold" style="color: var(--light-text-main);">{{ $b['headline'] }}</div>
                                <small class="text-muted text-truncate d-block" style="font-size: 10.5px;">{{ $b['message_body'] }}</small>
                            </td>
                            <td>
                                <span class="badge {{ $b['notice_type'] == 'Maintenance' ? 'bg-danger' : ($b['notice_type'] == 'Warning' ? 'bg-warning text-dark' : ($b['notice_type'] == 'Promotion' ? 'bg-success' : 'bg-primary')) }}" style="font-size: 9px; padding: 2px 6px;">
                                    {{ strtoupper($b['notice_type']) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark font-weight-bold" style="font-size: 10px;">
                                    {{ strtoupper($b['target_audience']) }}
                                </span>
                            </td>
                            <td style="font-size: 11px;">{{ $b['created_at'] }}</td>
                            <td>
                                <span class="badge-clean {{ $b['status'] == 'Active' ? 'active' : '' }}" style="font-size: 9.5px;">
                                    {{ $b['status'] }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-3 text-muted">No broadcasts published yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
