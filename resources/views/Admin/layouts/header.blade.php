<!-- ======= Compact Minimalist Light Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-2">
        <i class="bi bi-list toggle-sidebar-btn me-1"></i>
        <a href="{{ url('admin/dashboard') }}" class="logo d-flex align-items-center gap-2">
            <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX" style="max-height: 24px;">
            <span class="header-brand-badge">ADMIN</span>
        </a>
    </div>

    <!-- Center Search Bar Pill (Compact) -->
    <div class="d-none d-md-flex align-items-center">
        <div class="header-search-pill" onclick="document.querySelector('.header-search-pill input')?.focus();">
            <i class="bi bi-search" style="font-size: 12px; color: var(--light-text-muted);"></i>
            <span style="font-size: 12.5px;">Quick search...</span>
            <kbd class="ms-auto">⌘ K</kbd>
        </div>
    </div>

    <!-- Right Controls (Compact) -->
    <div class="d-flex align-items-center gap-2">
        <div class="d-none d-lg-flex align-items-center gap-15 px-2 py-05" style="background: var(--brand-emerald-light); border: 1px solid rgba(5, 150, 105, 0.2); border-radius: 99px; font-size: 11px; color: var(--brand-emerald); font-weight: 600; padding: 2px 8px;">
            <span style="width: 6px; height: 6px; background: var(--brand-emerald); border-radius: 50%;"></span>
            <span>Online</span>
        </div>

        <a href="{{ url('/') }}" target="_blank" class="btn btn-sm d-none d-sm-flex align-items-center gap-1" style="background: #ffffff; border: 1px solid var(--light-border); color: var(--light-text-sub); border-radius: 8px; font-size: 12px; font-weight: 600; padding: 4px 10px; box-shadow: var(--shadow-subtle);">
            <i class="bi bi-globe"></i> Website
        </a>

        <!-- Profile Dropdown -->
        <div class="dropdown">
            <div class="nav-profile-pill" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 2px 10px 2px 2px;">
                <img src="{{ Auth::user()->profile ?? asset('images/profile1.png') }}" alt="Profile" style="width: 26px; height: 26px;">
                <span class="d-none d-md-inline" style="font-size: 12.5px; font-weight: 600; color: var(--light-text-main);">{{ Auth::user()->name ?? 'Admin' }}</span>
                <i class="bi bi-chevron-down text-muted" style="font-size: 10px;"></i>
            </div>

            <ul class="dropdown-menu dropdown-menu-end profile">
                <li class="dropdown-header">
                    <h6>{{ Auth::user()->name ?? 'Administrator' }}</h6>
                    <span>{{ Auth::user()->email ?? '' }}</span>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('admin/settings') }}">
                        <i class="bi bi-sliders"></i> System Settings
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ url('admin/health') }}">
                        <i class="bi bi-cpu"></i> Server Health
                    </a>
                </li>
                <li><hr class="dropdown-divider" style="border-color: var(--light-border-subtle); margin: 4px 0;"></li>
                <li>
                    <a class="dropdown-item text-danger" href="javascript:void(0);"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-1"></i> Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>