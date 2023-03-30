<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed " href="{{('dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed {{request()->is('template') ? 'active' : ''}} " href="{{('template')}}">
                <i class="bi bi-card-image"></i>
                <span>Template</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link collapsed {{request()->is('color') ? 'active' : ''}}" href="{{('color')}}">
                <i class="bi bi-brush-fill"></i>
                <span>Colors</span>
            </a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link collapsed {{request()->is('deduction') ? 'active' : ''}}" href="{{('deduction')}}">
                <i class="bi bi-dash-circle-fill"></i>
                <span>Deduction</span>
            </a>
        </li>


    </ul>

</aside><!-- End Sidebar-->
