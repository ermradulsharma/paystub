<!-- ======= Minimalist Clean Light Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        
        <li class="sidebar-heading">Platform Core</li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard') ? '' : 'collapsed' }}" href="{{ url('admin/dashboard') }}">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Overview</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/analytics*') ? '' : 'collapsed' }}" href="{{ url('admin/analytics') }}">
                <i class="bi bi-graph-up-arrow"></i>
                <span>Analytics & Insights</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/revenue*') ? '' : 'collapsed' }}" href="{{ route('admin.revenue') }}">
                <i class="bi bi-currency-dollar"></i>
                <span>Revenue Telemetry</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/health*') ? '' : 'collapsed' }}" href="{{ url('admin/health') }}">
                <i class="bi bi-cpu-fill"></i>
                <span>System Telemetry</span>
            </a>
        </li>

        <li class="sidebar-heading mt-2">User & Billing</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/users*') ? '' : 'collapsed' }}" href="{{ url('admin/users') }}">
                <i class="bi bi-people-fill"></i>
                <span>Customers</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/payslips*') ? '' : 'collapsed' }}" href="{{ url('admin/payslips') }}">
                <i class="bi bi-file-earmark-pdf-fill"></i>
                <span>Payslips Log</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/subscriptions*') ? '' : 'collapsed' }}" href="{{ url('admin/subscriptions') }}">
                <i class="bi bi-credit-card-fill"></i>
                <span>Subscriptions</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/coupons*') ? '' : 'collapsed' }}" href="{{ url('admin/coupons') }}">
                <i class="bi bi-ticket-perforated-fill"></i>
                <span>Promo Coupons</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/plans*') ? '' : 'collapsed' }}" href="{{ url('admin/plans') }}">
                <i class="bi bi-tags-fill"></i>
                <span>Pricing Plans</span>
            </a>
        </li>

        <li class="sidebar-heading mt-2">Generator Config</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/template*') ? '' : 'collapsed' }}" href="{{ url('admin/template') }}">
                <i class="bi bi-layers-fill"></i>
                <span>Templates Library</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/pdf-customizer*') ? '' : 'collapsed' }}" href="{{ route('admin.pdf-customizer') }}">
                <i class="bi bi-palette-fill"></i>
                <span>PDF Customizer</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/watermarks*') ? '' : 'collapsed' }}" href="{{ url('admin/watermarks') }}">
                <i class="bi bi-shield-shaded"></i>
                <span>PDF Watermarks</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/deduction*') ? '' : 'collapsed' }}" href="{{ url('admin/deduction') }}">
                <i class="bi bi-percent"></i>
                <span>Tax Rules</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/state-taxes*') ? '' : 'collapsed' }}" href="{{ url('admin/state-taxes') }}">
                <i class="bi bi-globe-americas"></i>
                <span>US State Taxes</span>
            </a>
        </li>

        <li class="sidebar-heading mt-2">Administration</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/broadcast*') ? '' : 'collapsed' }}" href="{{ url('admin/broadcast') }}">
                <i class="bi bi-broadcast"></i>
                <span>System Broadcasts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/email-events*') ? '' : 'collapsed' }}" href="{{ route('admin.email-events') }}">
                <i class="bi bi-envelope-check-fill"></i>
                <span>Email Events</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/security-2fa*') ? '' : 'collapsed' }}" href="{{ route('admin.security-2fa') }}">
                <i class="bi bi-shield-lock-fill"></i>
                <span>2FA Security</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/languages*') ? '' : 'collapsed' }}" href="{{ url('admin/languages') }}">
                <i class="bi bi-translate"></i>
                <span>Languages</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/faqs*') ? '' : 'collapsed' }}" href="{{ url('admin/faqs') }}">
                <i class="bi bi-chat-dots-fill"></i>
                <span>FAQ & Helpdesk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/emails*') ? '' : 'collapsed' }}" href="{{ url('admin/emails') }}">
                <i class="bi bi-envelope-fill"></i>
                <span>Email Templates</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/audit-logs*') ? '' : 'collapsed' }}" href="{{ url('admin/audit-logs') }}">
                <i class="bi bi-shield-check"></i>
                <span>Security Trail</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/export*') ? '' : 'collapsed' }}" href="{{ url('admin/export') }}">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>CSV Exporter</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/profile*') ? '' : 'collapsed' }}" href="{{ route('admin.profile') }}">
                <i class="bi bi-person-circle"></i>
                <span>My Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/settings*') ? '' : 'collapsed' }}" href="{{ url('admin/settings') }}">
                <i class="bi bi-sliders"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>

</aside>