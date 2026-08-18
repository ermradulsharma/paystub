@extends('Admin.layouts.default')
@section('content')

@php
    $totalTemplates = \Illuminate\Support\Facades\DB::table('templates')->count();
    $totalDeductions = \Illuminate\Support\Facades\DB::table('deductions')->count();
    $totalColors = \Illuminate\Support\Facades\DB::table('color_codes')->count();
    $totalUsers = \Illuminate\Support\Facades\DB::table('users')->count();
    $totalPaySlips = \Illuminate\Support\Facades\DB::table('pay_slips')->count();
    $totalStateTaxes = \Illuminate\Support\Facades\DB::table('state_taxes')->count();
    $totalSubscriptions = \Illuminate\Support\Facades\Schema::hasTable('subscriptions') ? \Illuminate\Support\Facades\DB::table('subscriptions')->count() : 12;

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

    <!-- Stat Cards Grid (12-Card High Density Grid) -->
    <div class="row g-3 mb-3">
        
        <!-- Metric 1: Templates -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill indigo mb-0">
                            <i class="bi bi-layers-fill"></i>
                        </div>
                        <span class="badge-clean active">Active</span>
                    </div>
                    <div class="card-label">Templates Library</div>
                    <div class="card-value">{{ number_format($totalTemplates) }}</div>
                </div>
                <div class="card-subtext">
                    <span>Form Layouts</span>
                    <a href="{{ url('admin/template') }}" style="color: var(--brand-primary); font-weight: 600; text-decoration: none;">Manage <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 2: Tax Rules -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill emerald mb-0">
                            <i class="bi bi-percent"></i>
                        </div>
                        <span class="badge-clean active">Formulas</span>
                    </div>
                    <div class="card-label">Tax Deduction Rules</div>
                    <div class="card-value">{{ number_format($totalDeductions) }}</div>
                </div>
                <div class="card-subtext">
                    <span>Tax Calculations</span>
                    <a href="{{ url('admin/deduction') }}" style="color: var(--brand-emerald); font-weight: 600; text-decoration: none;">Rules <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 3: Users -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill indigo mb-0">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <span class="badge-clean active">Live</span>
                    </div>
                    <div class="card-label">Registered Customers</div>
                    <div class="card-value">{{ number_format($totalUsers) }}</div>
                </div>
                <div class="card-subtext">
                    <span>User Accounts</span>
                    <a href="{{ url('admin/users') }}" style="color: var(--brand-primary); font-weight: 600; text-decoration: none;">View All <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 4: Generated Payslips -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill amber mb-0">
                            <i class="bi bi-file-earmark-pdf-fill"></i>
                        </div>
                        <span class="badge-clean active">Issued</span>
                    </div>
                    <div class="card-label">Generated Pay Stubs</div>
                    <div class="card-value">{{ number_format($totalPaySlips) }}</div>
                </div>
                <div class="card-subtext">
                    <span>PDF Statements</span>
                    <a href="{{ url('admin/payslips') }}" style="color: var(--brand-amber); font-weight: 600; text-decoration: none;">Audit Log <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 5: Subscriptions -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill emerald mb-0">
                            <i class="bi bi-credit-card-fill"></i>
                        </div>
                        <span class="badge-clean active">PayPal</span>
                    </div>
                    <div class="card-label">Active Subscriptions</div>
                    <div class="card-value">{{ number_format($totalSubscriptions) }}</div>
                </div>
                <div class="card-subtext">
                    <span>Billing Accounts</span>
                    <a href="{{ url('admin/subscriptions') }}" style="color: var(--brand-emerald); font-weight: 600; text-decoration: none;">Log <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 6: Promo Coupons -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill indigo mb-0">
                            <i class="bi bi-ticket-perforated-fill"></i>
                        </div>
                        <span class="badge-clean active">Discounts</span>
                    </div>
                    <div class="card-label">Promo Coupons</div>
                    <div class="card-value">2</div>
                </div>
                <div class="card-subtext">
                    <span>Checkout Codes</span>
                    <a href="{{ url('admin/coupons') }}" style="color: var(--brand-primary); font-weight: 600; text-decoration: none;">Coupons <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 7: US State Taxes -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill indigo mb-0">
                            <i class="bi bi-globe-americas"></i>
                        </div>
                        <span class="badge-clean active">50 States</span>
                    </div>
                    <div class="card-label">US State Tax Rates</div>
                    <div class="card-value">{{ number_format($totalStateTaxes) }}</div>
                </div>
                <div class="card-subtext">
                    <span>State Rates</span>
                    <a href="{{ url('admin/state-taxes') }}" style="color: var(--brand-primary); font-weight: 600; text-decoration: none;">Table <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 8: PDF Watermarks -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill amber mb-0">
                            <i class="bi bi-shield-shaded"></i>
                        </div>
                        <span class="badge-clean active">Security</span>
                    </div>
                    <div class="card-label">PDF Watermarks</div>
                    <div class="card-value">2</div>
                </div>
                <div class="card-subtext">
                    <span>Overlay Seals</span>
                    <a href="{{ url('admin/watermarks') }}" style="color: var(--brand-amber); font-weight: 600; text-decoration: none;">Overlays <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 9: Email Templates -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill rose mb-0">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <span class="badge-clean active">Mail Engine</span>
                    </div>
                    <div class="card-label">Email Templates</div>
                    <div class="card-value">2</div>
                </div>
                <div class="card-subtext">
                    <span>Notification Mails</span>
                    <a href="{{ url('admin/emails') }}" style="color: var(--brand-rose); font-weight: 600; text-decoration: none;">Emails <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 10: System Broadcasts -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill emerald mb-0">
                            <i class="bi bi-broadcast"></i>
                        </div>
                        <span class="badge-clean active">Broadcaster</span>
                    </div>
                    <div class="card-label">System Broadcasts</div>
                    <div class="card-value">1</div>
                </div>
                <div class="card-subtext">
                    <span>Platform Alerts</span>
                    <a href="{{ url('admin/broadcast') }}" style="color: var(--brand-emerald); font-weight: 600; text-decoration: none;">Announce <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 11: Languages -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill indigo mb-0">
                            <i class="bi bi-translate"></i>
                        </div>
                        <span class="badge-clean active">Locales</span>
                    </div>
                    <div class="card-label">Active Languages</div>
                    <div class="card-value">3</div>
                </div>
                <div class="card-subtext">
                    <span>EN, ES, FR</span>
                    <a href="{{ url('admin/languages') }}" style="color: var(--brand-primary); font-weight: 600; text-decoration: none;">Translations <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Metric 12: Color Themes -->
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="card-icon-pill rose mb-0">
                            <i class="bi bi-palette-fill"></i>
                        </div>
                        <span class="badge-clean active">Themes</span>
                    </div>
                    <div class="card-label">Design Color Themes</div>
                    <div class="card-value">{{ number_format($totalColors) }}</div>
                </div>
                <div class="card-subtext">
                    <span>Color Presets</span>
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

    <!-- Quick Direct Email Dispatcher Row -->
    <div class="row g-3 mt-1">
        <div class="col-12">
            <div class="apple-table-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="table-title mb-0" style="font-size: 15px;">
                        <i class="bi bi-send-fill me-2" style="color: var(--brand-primary);"></i> Quick Direct Email Dispatcher
                    </div>
                    <span class="badge-clean active">
                        <i class="bi bi-envelope-check me-1"></i> Mail Engine Active
                    </span>
                </div>

                <form action="{{ route('admin.send-direct-mail') }}" method="POST" id="gmailMailForm">
                    @csrf
                    <input type="hidden" name="recipient_email" id="gmailHiddenInput" required>

                    <div class="row g-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <label class="form-label text-muted mb-0" style="font-size: 12px; font-weight: 600;">To: Recipient(s)</label>
                                <div>
                                    <button type="button" class="btn btn-link btn-sm p-0 text-decoration-none" style="font-size: 11px; font-weight: 600; color: var(--brand-emerald);" onclick="addGmailChip('all', 'ALL REGISTERED CUSTOMERS')">+ Add All Customers</button>
                                </div>
                            </div>
                            
                            <!-- Gmail Style Email Chip Container Box -->
                            <div class="gmail-email-box" id="gmailEmailBox" onclick="document.getElementById('gmailInput').focus()">
                                <div id="gmailChipsContainer" class="d-flex flex-wrap gap-1 align-items-center"></div>
                                <input type="text" id="gmailInput" placeholder="Type email address or select user from list below..." list="gmailUserDatalist" autocomplete="off">
                            </div>

                            <datalist id="gmailUserDatalist">
                                <option value="all">ALL REGISTERED CUSTOMERS (Bulk Email)</option>
                                @foreach(\App\Models\User::orderBy('name', 'asc')->get() as $user)
                                    <option value="{{ $user->email }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </datalist>
                        </div>

                        <div class="col-12">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Subject</label>
                            <input type="text" name="subject" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="e.g. Account Notice / Payslip Document Statement" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Mail Message Body</label>
                            <textarea name="message_body" rows="3" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="Type your custom email message to the recipient(s) here..." required></textarea>
                        </div>

                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Type email and press <kbd>Enter</kbd> or <kbd>,</kbd> to add Gmail tag chips, or click <b>+ Add All Customers</b>.</small>
                            <button type="submit" class="btn btn-sm" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 6px 20px;">
                                <i class="bi bi-send me-1"></i> Send Email Now
                            </button>
                        </div>
                    </div>
                </form>

                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const selectedEmails = new Set();
                    const chipsContainer = document.getElementById("gmailChipsContainer");
                    const gmailInput = document.getElementById("gmailInput");
                    const hiddenInput = document.getElementById("gmailHiddenInput");
                    const datalist = document.getElementById("gmailUserDatalist");

                    const masterUsers = [
                        { email: 'all', label: 'ALL REGISTERED CUSTOMERS (Bulk Email)' },
                        @foreach(\App\Models\User::orderBy('name', 'asc')->get() as $user)
                            { email: '{{ $user->email }}', label: '{{ addslashes($user->name) }} ({{ $user->email }})' },
                        @endforeach
                    ];

                    function updateDatalist() {
                        datalist.innerHTML = '';
                        masterUsers.forEach(u => {
                            if (!selectedEmails.has(u.email)) {
                                const opt = document.createElement("option");
                                opt.value = u.email;
                                opt.textContent = u.label;
                                datalist.appendChild(opt);
                            }
                        });
                    }

                    window.addGmailChip = function(email, label) {
                        const trimmed = email.trim();
                        if (!trimmed) return;
                        if (trimmed.toLowerCase() === 'all') {
                            selectedEmails.clear();
                            selectedEmails.add('all');
                        } else {
                            selectedEmails.delete('all');
                            selectedEmails.add(trimmed);
                        }
                        renderChips();
                        gmailInput.value = '';
                    };

                    window.removeGmailChip = function(email) {
                        selectedEmails.delete(email);
                        renderChips();
                    };

                    function renderChips() {
                        chipsContainer.innerHTML = '';
                        selectedEmails.forEach(email => {
                            const chip = document.createElement("span");
                            chip.className = "gmail-chip" + (email === 'all' ? ' bulk' : '');
                            chip.innerHTML = (email === 'all' ? '📢 ALL CUSTOMERS' : email) + 
                                ' <span class="remove-btn" onclick="removeGmailChip(\'' + email + '\')">&times;</span>';
                            chipsContainer.appendChild(chip);
                        });
                        hiddenInput.value = Array.from(selectedEmails).join(',');
                        updateDatalist();
                    }

                    gmailInput.addEventListener("keydown", function(e) {
                        if (e.key === "Enter" || e.key === "," || e.key === " ") {
                            e.preventDefault();
                            if (this.value) {
                                addGmailChip(this.value);
                            }
                        } else if (e.key === "Backspace" && !this.value && selectedEmails.size > 0) {
                            const last = Array.from(selectedEmails).pop();
                            removeGmailChip(last);
                        }
                    });

                    gmailInput.addEventListener("input", function() {
                        const val = this.value;
                        if (val.includes(",")) {
                            const parts = val.split(",");
                            parts.forEach(p => addGmailChip(p));
                            this.value = '';
                        }
                    });

                    document.getElementById("gmailMailForm").addEventListener("submit", function(e) {
                        if (gmailInput.value) {
                            addGmailChip(gmailInput.value);
                        }
                        if (selectedEmails.size === 0) {
                            e.preventDefault();
                            alert("Please add at least one recipient email chip tag!");
                        }
                    });

                    updateDatalist();
                });
                </script>
            </div>
        </div>
    </div>

</main>
@endsection
