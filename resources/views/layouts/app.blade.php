<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">

<head>
    @include('layouts.head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $metaDescription ?? \App\Models\Setting::get('seo_description_en', 'TELNET CO., LTD - High-speed fiber internet & ICT solutions in Cambodia.') }}">
    <title>{{ $title ?? \App\Models\Setting::get('seo_title_km', 'TELNET CO., LTD. - អ្នកផ្តល់សេវាអ៉ីនធឺណិត (ISP)') }}</title>
    <link href="{{asset('css/filament/font/kontumruy.css')}}" rel="stylesheet">
    @php
    $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    @endphp
    <link rel="stylesheet" href="{{ asset('build/' . $manifest['resources/css/app.css']['file']) }}">
    <script type="module" src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('storage/favicon.ico')}}">
    <script src="{{asset('js/filament/tailwind.js')}}"></script>
    <script defer src="{{asset('js/filament/additional/coreProduct.pagination.js')}}"></script>
    <script defer src="{{asset('js/filament/additional/progressBar.js')}}"></script>
    <script defer src="{{asset('js/filament/additional/slideShow.js')}}"></script>
    <link href="{{asset('css/filament/custome.css')}}" rel="stylesheet">
    <link href="{{asset('css/filament/map/ActivityMap.css')}}" rel="stylesheet">
    <link href="{{asset('css/filament/map/ActivityMapMarker.css')}}" rel="stylesheet">
    <script src="{{asset('js/filament/map/leaflet.js')}}"></script>
    <script src="{{asset('js/filament/map/leaflet.markercluster.js')}}"></script>
    <script src="{{asset('js/filament/map/loadingMap.js')}}"></script>
    <script src="{{asset('js/filament/jquery.min.js')}}"></script>
    <style>
        .gradient-brand {
            background: linear-gradient(to right, #8FC74A, #F79633);
        }

        /* Changed duration from 20s to 8s for faster motion */
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: infinite-scroll 8s linear infinite;
        }

        .marquee-box {
            display: flex;
            white-space: nowrap;
            animation: marquee 30s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .partner-slider {

            overflow: hidden;

            width: 100%;

            position: relative;
        }

        .partner-track {

            display: flex;

            align-items: center;

            width: max-content;

            will-change: transform;
        }

        .partner-item {
            width: 180px;
            height: 90px;
            margin-right: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: rgba(255, 255, 255, .05);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .08);
            transition: .35s;
        }

        .partner-item:hover {

            transform: translateY(-6px);

            border-color: #8FC74A;

            box-shadow: 0 15px 35px rgba(143, 199, 74, .18);
        }

        .partner-item img {

            max-width: 120px;

            max-height: 55px;

            object-fit: contain;
        }
    </style>
</head>

<body class="light text-adaptive-main antialiased selection:bg-brand-green selection:text-white bg-gradient-to-br from-brand-green/10 via-transparent to-brand-orange/10">
    @include('layouts.progressBar')
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('components.service-modal')
    @stack('scripts')
</body>
<script>
    const track = document.querySelector('.partner-track');
    if (track) {

        // Clone until the track is wider than twice the viewport
        while (track.scrollWidth < window.innerWidth * 2) {
            track.innerHTML += track.innerHTML;
        }

        let x = 0;
        const speed = 0.6; // pixels per frame

        function animate() {

            x -= speed;

            if (Math.abs(x) >= track.scrollWidth / 2) {
                x = 0;
            }

            track.style.transform = `translate3d(${x}px,0,0)`;

            requestAnimationFrame(animate);
        }

        animate();
    } // end if(track)
</script>

</html>