@extends('Admin.layouts.default')
@section('content')

@php
    $totalTemplates = \Illuminate\Support\Facades\DB::table('templates')->count();
    $totalDeductions = \Illuminate\Support\Facades\DB::table('deductions')->count();
    $totalColors = \Illuminate\Support\Facades\DB::table('color_codes')->count();
    $totalUsers = \Illuminate\Support\Facades\DB::table('users')->count();
    $totalPaySlips = \Illuminate\Support\Facades\DB::table('pay_slips')->count();
    $totalStateTaxes = \Illuminate\Support\Facades\DB::table('state_taxes')->count();

    $recentUsers = \Illuminate\Support\Facades\DB::table('users')->orderBy('id', 'desc')->take(5)->get();
    $recentPaySlips = \Illuminate\Support\Facades\DB::table('pay_slips')->orderBy('id', 'desc')->take(5)->get();
@endphp

<!-- Start Main Workspace -->
<main id="main" class="main">
    
    <!-- Page Header Section (Compact) -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Overview</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Real-time platform metrics, user registrations, and payslip generation telemetry.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ url('admin/export') }}" class="btn btn-sm d-flex align-items-center gap-1" style="background: #ffffff; border: 1px solid var(--light-border); color: var(--light-text-sub); border-radius: 6px; padding: 4px 12px; font-size: 12px; font-weight: 600; box-shadow: var(--shadow-subtle);">
                <i class="bi bi-download"></i> Export Data
            </a>
            <a href="{{ url('admin/settings') }}" class="btn btn-sm d-flex align-items-center gap-1" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; padding: 4px 14px; font-size: 12px; font-weight: 600;">
                <i class="bi bi-sliders"></i> Settings
            </a>
        </div>
    </div>

    <!-- Stat Cards Grid (Compact g-3) -->
    <div class="row g-3 mb-3">
        
        <!-- Metric 1: Templates -->
        <div class="col-xl-4 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill indigo mb-0">
                            <i class="bi bi-layers-fill"></i>
                        </div>
                        <span class="badge-clean active">
                            Active
                        </span>
                    </div>
                    <div class="card-label">Template Library</div>
                    <div class="card-value">{{ number_format($totalTemplates) }}</div>
                </div>
                <div class="card-subtext">
                    <span>Form Layouts Configured</span>
                    <a href="{{ url('admin/template') }}" style="color: var(--brand-primary); font-weight: 600; text-decoration: none;">Manage <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 2: Tax Rules -->
        <div class="col-xl-4 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill emerald mb-0">
                            <i class="bi bi-percent"></i>
                        </div>
                        <span class="badge-clean active">
                            Calculators
                        </span>
                    </div>
                    <div class="card-label">Tax Deduction Rules</div>
                    <div class="card-value">{{ number_format($totalDeductions) }}</div>
                </div>
                <div class="card-subtext">
                    <span>Automatic Deduction Formulas</span>
                    <a href="{{ url('admin/deduction') }}" style="color: var(--brand-emerald); font-weight: 600; text-decoration: none;">Rules <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 3: Users -->
        <div class="col-xl-4 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill indigo mb-0">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <span class="badge-clean active">
                            Live
                        </span>
                    </div>
                    <div class="card-label">Registered Customers</div>
                    <div class="card-value">{{ number_format($totalUsers) }}</div>
                </div>
                <div class="card-subtext">
                    <span>Total User Accounts</span>
                    <a href="{{ url('admin/users') }}" style="color: var(--brand-primary); font-weight: 600; text-decoration: none;">View All <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 4: Generated Payslips -->
        <div class="col-xl-4 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill amber mb-0">
                            <i class="bi bi-file-earmark-pdf-fill"></i>
                        </div>
                        <span class="badge-clean active">
                            Rendered
                        </span>
                    </div>
                    <div class="card-label">Generated Pay Stubs</div>
                    <div class="card-value">{{ number_format($totalPaySlips) }}</div>
                </div>
                <div class="card-subtext">
                    <span>PDF Statements Issued</span>
                    <a href="{{ url('admin/payslips') }}" style="color: var(--brand-amber); font-weight: 600; text-decoration: none;">Audit Log <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 5: US State Taxes -->
        <div class="col-xl-4 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill indigo mb-0">
                            <i class="bi bi-globe-americas"></i>
                        </div>
                        <span class="badge-clean active">
                            50 States
                        </span>
                    </div>
                    <div class="card-label">US State Tax Rates</div>
                    <div class="card-value">{{ number_format($totalStateTaxes) }}</div>
                </div>
                <div class="card-subtext">
                    <span>Jurisdiction Tax Rates</span>
                    <a href="{{ url('admin/state-taxes') }}" style="color: var(--brand-primary); font-weight: 600; text-decoration: none;">Table <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 6: Color Palettes -->
        <div class="col-xl-4 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill rose mb-0">
                            <i class="bi bi-palette-fill"></i>
                        </div>
                        <span class="badge-clean active">
                            Themes
                        </span>
                    </div>
                    <div class="card-label">Design Color Themes</div>
                    <div class="card-value">{{ number_format($totalColors) }}</div>
                </div>
                <div class="card-subtext">
                    <span>Styling Color Presets</span>
                    <span style="color: var(--brand-rose); font-weight: 600;">Active</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Data Tables Grid (Compact g-3) -->
    <div class="row g-3">
        
        <!-- Table 1: Recent Customers -->
        <div class="col-lg-6">
            <div class="apple-table-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="table-title mb-0" style="font-size: 14px;"><i class="bi bi-person-lines-fill me-1" style="color: var(--brand-primary);"></i> Recent Customers</div>
                    <a href="{{ url('admin/users') }}" style="color: var(--brand-primary); font-size: 12px; font-weight: 600; text-decoration: none;">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="apple-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentUsers as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="width: 24px; height: 24px; border-radius: 50%; background: var(--brand-primary-light); color: var(--brand-primary); display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700;">
                                            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                        </div>
                                        <span style="font-weight: 600; color: var(--light-text-main);">{{ $user->name ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td style="color: var(--light-text-muted); font-size: 12px;">{{ $user->email ?? '' }}</td>
                                <td>
                                    <span class="badge" style="background: var(--light-bg-subtle); color: var(--light-text-sub); border: 1px solid var(--light-border); border-radius: 4px; padding: 2px 6px; font-size: 10px;">
                                        {{ $user->role_id == 1 ? 'Admin' : 'Customer' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge-clean active">
                                        Verified
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">No users found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Table 2: Recent Issued Payslips -->
        <div class="col-lg-6">
            <div class="apple-table-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="table-title mb-0" style="font-size: 14px;"><i class="bi bi-file-earmark-pdf-fill me-1" style="color: var(--brand-emerald);"></i> Recent Issued Payslips</div>
                    <a href="{{ url('admin/payslips') }}" style="color: var(--brand-emerald); font-size: 12px; font-weight: 600; text-decoration: none;">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="apple-table">
                        <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentPaySlips as $slip)
                            <tr>
                                <td style="font-weight: 700; color: var(--brand-emerald); font-family: monospace; font-size: 12px;">{{ $slip->reference ?? 'PS-'.rand(1000,9999) }}</td>
                                <td style="color: var(--light-text-main); font-weight: 500;">{{ Str::limit($slip->title ?? 'Paystub Document', 20) }}</td>
                                <td>
                                    <span class="badge" style="background: var(--brand-emerald-light); color: var(--brand-emerald); border: 1px solid rgba(5,150,105,0.2); border-radius: 4px; padding: 2px 6px; font-size: 10px; text-transform: uppercase;">
                                        {{ $slip->type ?? 'USA' }}
                                    </span>
                                </td>
                                <td style="color: var(--light-text-muted); font-size: 12px;">{{ date('d M Y', strtotime($slip->created_at ?? 'now')) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">No payslips generated yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</main>
@endsection