<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
</head>

<body class="app-ambient-bg text-slate-800 antialiased overflow-x-hidden">
    <!-- Background Ambient Glowing Orbs -->
    <div class="ambient-glow-orb-1"></div>

    <!-- 1. Header Navigation Navbar Bar (Login Button Hidden) -->
    @include('layouts.partials.header', ['hideLogin' => true])

    <!-- Main Password Reset Form Wrapper (Vertically Centered) -->
    <main class="main-app-wrapper py-5 d-flex align-items-center justify-content-center" style="min-height: 90vh; position: relative; z-index: 1;">
        @yield('content')
    </main>

    <!-- Global Scripts & Notification Handlers -->
    @include('layouts.partials.scripts')
</body>

</html>
