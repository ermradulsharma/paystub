<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
</head>

<body>
    <!-- 1. Header Navigation Navbar Bar -->
    @include('layouts.partials.header')

    <!-- 2. Main Body Content Yield -->
    @yield('content')

    <!-- 3. Enterprise Professional Footer Section -->
    @include('layouts.partials.footer')

    <!-- 4. Authentication & Global Action Modals -->
    @include('layouts.partials.modals')

    <!-- 5. Global Scripts & Notification Handlers -->
    @include('layouts.partials.scripts')
</body>

</html>
