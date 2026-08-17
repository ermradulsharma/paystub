@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Registered Users</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Manage customer accounts, roles & login credentials</p>
        </div>
        <div>
            <a href="{{ url('admin/export?type=users') }}" class="btn btn-sm" style="background: #ffffff; border: 1px solid var(--light-border); color: var(--light-text-sub); border-radius: 6px; font-weight: 600; font-size: 12px;">
                <i class="bi bi-download me-1"></i> Export Users CSV
            </a>
        </div>
    </div>

    <div class="apple-table-card">
        <div class="table-responsive">
            <table class="apple-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email Address</th>
                        <th>User Role</th>
                        <th>Created Date</th>
                        <th class="text-end">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $key => $user)
                    <tr>
                        <td style="font-weight: 600; color: var(--light-text-muted);">{{ $key + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="width: 24px; height: 24px; border-radius: 50%; background: var(--brand-primary-light); color: var(--brand-primary); display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700;">
                                    {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                </div>
                                <span style="font-weight: 600; color: var(--light-text-main);">{{ $user->name ?? 'N/A' }}</span>
                            </div>
                        </td>
                        <td style="color: var(--light-text-muted);">{{ $user->email }}</td>
                        <td>
                            <span class="badge" style="background: var(--light-bg-subtle); color: var(--light-text-sub); border: 1px solid var(--light-border); border-radius: 4px; padding: 2px 6px; font-size: 10px;">
                                {{ $user->role_id == 1 ? 'Administrator' : 'Customer' }}
                            </span>
                        </td>
                        <td style="color: var(--light-text-muted); font-size: 12px;">{{ date('d M Y', strtotime($user->created_at)) }}</td>
                        <td class="text-end">
                            <span class="badge-clean active">
                                Active
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">No user records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
