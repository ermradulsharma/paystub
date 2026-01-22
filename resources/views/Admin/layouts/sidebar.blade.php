<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{request()->is('admin/dashboard') ? '' : 'collapsed'}}" href="{{url('admin/dashboard')}}">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->is('admin/template') ? '' : 'collapsed'}}" href="{{url('admin/template')}}">
                <i class="bi bi-layers-fill"></i>
                <span>Template Library</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->is('admin/deduction') ? '' : 'collapsed'}}" href="{{url('admin/deduction')}}">
                <i class="bi bi-percent"></i>
                <span>Tax Rules</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->is('admin/settings') ? '' : 'collapsed'}}" href="{{url('admin/settings')}}">
                <i class="bi bi-gear-fill"></i>
                <span>System Settings</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->