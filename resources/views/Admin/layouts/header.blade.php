<!-- ======= Compact Minimalist Light Header ======= -->
@php
    $adminUser = Auth::user();
    $adminImg = $adminUser->image ?? ($adminUser->profile ?? asset('images/profile1.png'));
    if ($adminImg && !str_starts_with($adminImg, 'http') && !str_starts_with($adminImg, 'images/')) {
        $adminImg = asset($adminImg);
    }
@endphp

<header id="header" class="header fixed-top d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-2">
        <a href="{{ url('admin/dashboard') }}" class="logo d-flex align-items-center gap-2">
            <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX" style="max-height: 20px;">
        </a>
        <i class="bi bi-list toggle-sidebar-btn me-1"></i>
    </div>

    <!-- Center Search Bar Pill (Compact) -->
    <div class="d-none d-md-flex align-items-center">
        <div class="header-search-pill" onclick="document.querySelector('.header-search-pill input')?.focus();">
            <i class="bi bi-search" style="font-size: 11px; color: var(--light-text-muted);"></i>
            <span style="font-size: 11.5px;">Quick search telemetry...</span>
            <kbd class="ms-auto">⌘ K</kbd>
        </div>
    </div>

    <!-- Right Controls (Compact) -->
    <div class="d-flex align-items-center gap-2">
        <div class="d-none d-lg-flex align-items-center gap-1" style="background: var(--brand-emerald-light); border: 1px solid rgba(5, 150, 105, 0.2); border-radius: 99px; font-size: 10.5px; color: var(--brand-emerald); font-weight: 600; padding: 2px 8px;">
            <span style="width: 6px; height: 6px; background: var(--brand-emerald); border-radius: 50%;"></span>
            <span>Online</span>
        </div>

        <a href="{{ url('/') }}" target="_blank" class="btn btn-sm d-none d-sm-flex align-items-center gap-1" style="background: #ffffff; border: 1px solid var(--light-border); color: var(--light-text-sub); border-radius: 6px; font-size: 11.5px; font-weight: 600; padding: 3px 8px; box-shadow: var(--shadow-subtle);">
            <i class="bi bi-globe"></i> Website
        </a>

        <!-- Redesigned Apple/Stripe Profile Dropdown (User Model Dynamic) -->
        <div class="dropdown">
            <div class="nav-profile-pill" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ $adminImg }}" alt="{{ $adminUser->name ?? 'Admin' }}" style="width: 24px; height: 24px; border-radius: 50%; object-fit: cover;">
                <span class="d-none d-md-inline" style="font-size: 12px; font-weight: 600; color: var(--light-text-main);">{{ $adminUser->name ?? 'Admin' }}</span>
                <i class="bi bi-chevron-down text-muted" style="font-size: 9px;"></i>
            </div>

            <ul class="dropdown-menu dropdown-menu-end profile">
                <!-- Dropdown Card Header with User Model Info -->
                <li class="dropdown-header">
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <img src="{{ $adminImg }}" alt="{{ $adminUser->name ?? 'Admin' }}" style="width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 1.5px solid var(--brand-primary-border);">
                        <div>
                            <div class="d-flex align-items-center gap-1">
                                <h6 class="mb-0" style="font-size: 13px; font-weight: 700;">{{ $adminUser->name ?: (($adminUser->first_name ?? 'Admin') . ' ' . ($adminUser->last_name ?? '')) }}</h6>
                                <span class="badge" style="background: var(--brand-primary-light); color: var(--brand-primary); border: 1px solid var(--brand-primary-border); font-size: 8px; padding: 1px 4px; border-radius: 3px;">
                                    {{ ($adminUser->role_id ?? 1) == 1 ? '👑 SUPER ADMIN' : 'USER' }}
                                </span>
                            </div>
                            <span style="font-size: 11px; color: var(--light-text-muted); display: block;">{{ $adminUser->email ?? 'admin@paystubx.com' }}</span>
                            @if(!empty($adminUser->mobile))
                                <span style="font-size: 10px; color: var(--brand-emerald); font-weight: 600;">📞 {{ $adminUser->mobile }}</span>
                            @endif
                        </div>
                    </div>
                </li>

                <!-- Action Items -->
                <li>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                        <i class="bi bi-person-circle"></i> My Profile & Account
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('admin/settings') }}">
                        <i class="bi bi-sliders"></i> System Settings Hub
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('admin/health') }}">
                        <i class="bi bi-cpu-fill"></i> Server Telemetry
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('admin/audit-logs') }}">
                        <i class="bi bi-shield-check"></i> Security Audit Trail
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('admin/export') }}">
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i> CSV Data Exporter
                    </a>
                </li>

                <li><hr class="dropdown-divider" style="border-color: var(--light-border-subtle); margin: 4px 0;"></li>

                <!-- Sign Out Item -->
                <li>
                    <a class="dropdown-item text-danger font-weight-bold" href="javascript:void(0);"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
