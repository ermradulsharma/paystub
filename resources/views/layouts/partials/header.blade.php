<!-- Modern Responsive Header Navbar -->
<div class="container modern-paystubx-header" style="max-width:1500px">
    <nav class="navbar navbar-expand-lg navbar-light p-0 w-100">
        <a class="navbar-brand m-0" href="{{ route('welcome') }}">
            <img class="header-logo" src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo">
        </a>
        <button class="navbar-toggler border-0 p-2 shadow-none" type="button" data-toggle="collapse" data-target="#paystubxNav" aria-controls="paystubxNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars text-dark" style="font-size: 1.4rem;"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-end mt-3 mt-lg-0" id="paystubxNav">
            <ul class="nav-items d-flex align-items-center gap-2 m-0 p-0" style="gap: 15px;">
                <li class="nav-item"><a class="btn navbtn {{ request()->is('usa*') ? 'active' : '' }}" href="{{ route('usa.payStub') }}">USA</a></li>
                <li class="nav-item"><a class="btn navbtn {{ request()->is('canada*') ? 'active' : '' }}" href="{{ route('canada') }}">CANADA</a></li>
                <li class="nav-item"><a class="btn navbtn {{ request()->is('uk*') ? 'active' : '' }}" href="{{ route('uk') }}">UK</a></li>
                <li class="nav-item"><a class="btn navbtn {{ request()->is('global*') ? 'active' : '' }}" href="{{ route('global') }}">GLOBAL</a></li>
                <li class="nav-item"><a class="btn navbtn {{ request()->is('w2form*') ? 'active' : '' }}" href="{{ route('w2form') }}">W-2 FORM</a></li>
                <li class="nav-item">
                    @guest
                        <a class="btn login registerBtn login-header-btn" href="javascript:void(0);">LOGIN <i class="fa fa-sign-in mx-2"></i></a>
                        <div class="d-none logoutDiv">
                            <div class="user-pill-wrapper">
                                <div class="user-avatar-badge user-avatar-initial"><i class="fa fa-user"></i></div>
                                <div class="dropbtn">
                                    <button class="btn btn-default dropdown-toggle navright-btn authUserName" type="button" id="menu1" data-toggle="dropdown">Hi {{ Auth::user()->name ?? '' }} <i class="fa fa-angle-down ml-1"></i></button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('invoiceList') }}"><i class="fa fa-history mr-2" style="color: #4f46e5;"></i> Order History</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}"><i class="fa fa-user mr-2" style="color: #3b82f6;"></i> My Account</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}?tab=2"><i class="fa fa-address-book mr-2" style="color: #10b981;"></i> Address Book</a></li>
                                    </ul>
                                </div>
                                <div class="logout btn-logout logout-icon-btn" title="Logout"><i class="fa fa-power-off"></i></div>
                            </div>
                        </div>
                    @endguest
                    @auth
                        <div class="user-pill-wrapper">
                            <div class="user-avatar-badge user-avatar-initial">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</div>
                            <div class="dropbtn">
                                <button class="btn btn-default dropdown-toggle navright-btn authUserName" type="button" id="menu1" data-toggle="dropdown">Hi {{ Auth::user()->name ?? '' }} <i class="fa fa-angle-down ml-1"></i></button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('invoiceList') }}"><i class="fa fa-history mr-2" style="color: #4f46e5;"></i> Order History</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}"><i class="fa fa-user mr-2" style="color: #3b82f6;"></i> My Account</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('profile') }}?tab=2"><i class="fa fa-address-book mr-2" style="color: #10b981;"></i> Address Book</a></li>
                                </ul>
                            </div>
                            <div class="logout btn-logout logout-icon-btn" title="Logout"><i class="fa fa-power-off"></i></div>
                        </div>
                    @endauth
                </li>
            </ul>
        </div>
    </nav>
</div>
