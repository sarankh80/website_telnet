<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth dark">
<head>
    @include('layouts.head')
    @stack('styles')
</head>
<body class="dark section-bg-primary text-adaptive-main antialiased selection:bg-brand-green selection:text-white">

    @include('layouts.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    @include('components.service-modal')

    @stack('scripts')
</body>
</html>
