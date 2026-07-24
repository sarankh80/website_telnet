<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth dark">

<head>
    @include('layouts.head')
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">
    <script src="{{asset('js/filament/tailwind.js')}}"></script>
    <style>
        .gradient-brand {
            background: linear-gradient(to right, #8FC74A, #F79633);
        }
    </style>
</head>

<body class="section-bg-primary text-adaptive-main antialiased selection:bg-brand-green selection:text-white">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('components.service-modal')
    @stack('scripts')
</body>

</html>