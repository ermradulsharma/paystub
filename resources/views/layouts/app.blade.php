<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>

<body class="bg-slate-50 text-slate-800 antialiased">

    <!-- 1. Header Navigation Navbar Bar -->
    @include('layouts.partials.header')

    <!-- 2. Main Application Content Container -->
    <main class="main-app-wrapper" style="min-height: 80vh;">
        @yield('content')
    </main>

    <!-- 3. Enterprise Professional Footer Section -->
    @include('layouts.partials.footer')

    <!-- 4. Authentication & Global Action Modals -->
    @include('layouts.partials.modals')

    <!-- 5. Global Scripts & Notification Handlers -->
    @include('layouts.partials.scripts')

</body>

</html>
