@extends('layouts.app')
@section('title', 'សេវាកម្មស្នូល — TELNET CO., LTD.')
@section('content')

@php $isKm = app()->getLocale() === 'km';
$serviceTypes = [
[
"id" => 1,
"name" => "Household",
"name_km" => "FTTH-Package",
"images" => asset('storage/home/serviceTypes/home.png'),
"icon" => "fa fa-home",
"desc" => "FTTH-Home Package Internet Services designed to deliver services for home users, small households and residential customers.
Features:
- Fiber Optic Technology 100% connectivity.
- High-speed broadband connectivity
- Stable and low-latency network performance
- Affordable monthly subscription
- PPPoE Connection stable access via Point-to-Point
- Suitable for browsing, streaming, and online learning
- Flexible bandwidth packages",
"types" => [
[
"name" => "Home-Package",
"services" => [
[
"id" => 1,
"name" => "Home-S",
"bandwidth" => 10,
"price_month" => 16
],
[
"id" => 2,
"name" => "Home-M",
"bandwidth" => 20,
"price_month" => 29
],
[
"id" => 3,
"name" => "Home-L",
"bandwidth" => 30,
"price_month" => 41
],
[
"id" => 3,
"name" => "Home-L",
"bandwidth" => 30,
"price_month" => 41
],
[
"id" => 3,
"name" => "Home-L",
"bandwidth" => 30,
"price_month" => 41
],
[
"id" => 1,
"name" => "Home-S",
"bandwidth" => 10,
"price_month" => 16
],
[
"id" => 2,
"name" => "Home-M",
"bandwidth" => 20,
"price_month" => 29
],
[
"id" => 3,
"name" => "Home-L",
"bandwidth" => 30,
"price_month" => 41
],
[
"id" => 1,
"name" => "Home-S",
"bandwidth" => 10,
"price_month" => 16
],
[
"id" => 2,
"name" => "Home-M",
"bandwidth" => 20,
"price_month" => 29
],
[
"id" => 3,
"name" => "Home-L",
"bandwidth" => 30,
"price_month" => 41
]
],
],
[
"name" => "TN-Plan",
"services" => [
[
"id" => 1,
"name" => "TN-Plan-S",
"bandwidth" => 10,
"price_month" => 16
],
[
"id" => 2,
"name" => "TN-Plan-M",
"bandwidth" => 20,
"price_month" => 29
],
[
"id" => 3,
"name" => "TN-Plan-L",
"bandwidth" => 30,
"price_month" => 41
]
],
],
]
],
[
"id" => 2,
"name" => "Corporate Business",
"name_km" => "FTTB-Package",
"images" => asset('storage/home/serviceTypes/business.png'),
"icon" => "fa fa-industry",
"desc"=> "Business Packages are designed to deliver high speed with fiber optic communication for:
Business, Special Economic Zone and other Cooperate Business.
- Fiber Optic 100% connectivity.
- Fiber Optic Underground & Overhead.
- Stable and Refable speed.
- Added value high speed Youtube, Facebook.
- Symmetric upload/download speeds.",
"types" => [
[
"name" => "Biz",
"services" => [
[
"id" => 4,
"name" => "Business-S",
"bandwidth" => 10,
"price_month" => 48
],
[
"id" => 5,
"name" => "Business-M",
"bandwidth" => 20,
"price_month" => 96
],
[
"id" => 6,
"name" => "Business-L",
"bandwidth" => 30,
"price_month" => 150
],

]
],
[
"name" => "SME",
"services" => [
[
"id" => 4,
"name" => "SME-S",
"bandwidth" => 10,
"price_month" => 48
],
[
"id" => 5,
"name" => "SME-M",
"bandwidth" => 20,
"price_month" => 96
],
[
"id" => 6,
"name" => "SME-L",
"bandwidth" => 30,
"price_month" => 150
],

]
],
]
],
[
"id" => 3,
"name" => "Dedicated",
"name_km" => "FTTX-Packages",
"images" => asset('storage/home/serviceTypes/enterprise.png'),
"icon" => "fa fa-globe",
"desc"=> "Dedicated Internet Packages are designed to deliver high speed with fiber optic communication for:
Enterprises Business, Special Economic Zone, Large Corporations and Casino Online to fulfill ultimate speed, reliability and security.
- Fiber Optic 100% connectivity.
- Fiber Optic Underground & Overhead.
- Stable and Refable speed.
- Added value high speed Youtube, Facebook.
- Symmetric upload/download speeds.",
"types" => [
[
"name" => "DIA",
"services" => [
[
"id" => 4,
"name" => "Dedicated-S",
"bandwidth" => 10,
"price_month" => 120
],
[
"id" => 5,
"name" => "Dedicated-M",
"bandwidth" => 20,
"price_month" => 240
],
[
"id" => 6,
"name" => "Dedicated-L",
"bandwidth" => 30,
"price_month" => 360
],
]
],
[
"name" => "Dedicated-Global",
"services" => [
[
"id" => 4,
"name" => "Dedicated-Global-S",
"bandwidth" => 10,
"price_month" => 120
],
[
"id" => 5,
"name" => "Dedicated-Global-M",
"bandwidth" => 20,
"price_month" => 240
],
[
"id" => 6,
"name" => "Dedicated-Global-L",
"bandwidth" => 30,
"price_month" => 360
],
]
],
[
"name" => "Dedicated-Premuim",
"services" => [
[
"id" => 4,
"name" => "Dedicated-Premuim-S",
"bandwidth" => 10,
"price_month" => 120
],
[
"id" => 5,
"name" => "Dedicated-Premuim-M",
"bandwidth" => 20,
"price_month" => 240
],
[
"id" => 6,
"name" => "Dedicated-Premuim-L",
"bandwidth" => 30,
"price_month" => 360
],
]
],
]
],
];
$images = [
[
"id" => 1,
"image" => asset('storage/home/services/bgImage1.png'),
],
[
"id" => 2,
"image" => asset('storage/home/services/bgImage2.png'),
],
[
"id" => 3,
"image" => asset('storage/home/services/bgImage3.png'),
],
[
"id" => 4,
"image" => asset('storage/home/services/bgImage4.png'),
],
];

$capacityImage=asset('storage/home/services/bgImage4.png');
$cdnImage=asset("storage/home/services/cdn.png");
$wifiImage=asset("storage/home/services/wifi.png");
$socialImage=asset("storage/home/services/social.png");
$internetIcon=asset("storage/home/services/InternetIcon.gif");

@endphp
<script defer src="{{asset('js/filament/additional/views/services/services.js')}}"></script>
<nav class="sticky top-20 z-40 max-w-8xl h-10 mx-auto px-4 sm:px-6 lg:px-16 relative border-b border-white/10">
    <div class="absolute inset-0 bg-[#8fc74a] pointer-events-none z-0 "></div>
    <div class="relative z-10 flex items-center justify-center gap-2 sm:gap-6 h-full text-xs font-medium text-white">

        @foreach($serviceTypes as $st)
        <!-- Horizontal Nav Item -->
        <div class="relative group h-full flex items-center">
            <a href="{{ $st['url'] ?? '#' }}" class="h-full px-4 rounded-xl flex items-center gap-2 hover:text-white hover:bg-[#5e872d] transition-colors duration-200 cursor-pointer">
                @if(!empty($st['icon']))
                <i class="{{ $st['icon'] }} text-base"></i>
                @else
                <i class="fa-solid fa-layer-group text-sm"></i>
                @endif
                <span class="text-base font-semibold text-white">{{ $st['name'] }}</span>
                <!-- Optional Arrow Indicator -->
                <i class="fa-solid fa-chevron-down text-[10px] opacity-70 group-hover:rotate-180 transition-transform duration-300"></i>
            </a>

            <!-- Animated Dropdown Nav -->
            <div class="fixed left-0 right-0 top-[120px] z-50 w-screen bg-white border-b border-gray-200 shadow-xl text-gray-800 
                        opacity-0 invisible pointer-events-none translate-y-3 scale-[0.99]
                        group-hover:opacity-100 group-hover:visible group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:scale-100
                        transition-all duration-300 ease-out origin-top">

                <!-- Inner Wrapper: Matches top nav's px-4 sm:px-6 lg:px-16 exactly -->
                <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-16 flex max-h-[500px] min-h-[300px]">

                    {{-- Left Sidebar --}}
                    <aside class="w-2/6 bg-slate-50 border-r border-[#8fc74a] p-4 flex flex-col gap-1">
                        <p class="type-nav text-left px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 leading-relaxed">
                            {!! nl2br(e($st['desc'])) !!}
                        </p>
                    </aside>

                    {{-- Main Slider Content --}}
                    <main class="w-3/6 p-4 bg-white overflow-y-auto">
                        <div id="#" class="w-full h-full relative overflow-hidden flex-shrink-0">
                            <div class="slide absolute inset-0 transition-opacity duration-1000">
                                <div class="w-full h-full overflow-hidden">
                                    <img src="{{$st['images']}}" class="w-full h-full object-cover wallpaper-infinite">
                                </div>
                            </div>
                            <button id="prevSlide" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 transition backdrop-blur text-[#8fc74a] w-6 h-6 rounded-full z-20">❮</button>
                            <button id="nextSlide" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 transition backdrop-blur text-[#8fc74a] w-6 h-6 rounded-full z-20">❯</button>
                            <div id="dots" class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2 z-20"></div>
                        </div>
                    </main>

                    {{-- Right Navigation Buttons --}}
                    <aside class="w-1/6 bg-slate-50 border-l border-[#8fc74a] p-4 flex flex-col gap-1">
                        @foreach($st['types'] as $type)
                        <button type="button"
                            onclick="showType(`{{ $type['name'] }}`)"
                            class="type-nav text-left px-3 py-2 rounded-lg text-sm sm:text-base font-medium
                                   text-gray-700 hover:bg-[#8fc74a]/10 hover:text-[#8fc74a] transition-all duration-150">
                            {{ $type['name'] }}
                        </button>
                        @endforeach
                    </aside>

                </div>
            </div>
        </div>
        @endforeach

    </div>
</nav>
<section class="w-full h-[50vh] sm:h-[60vh] md:h-[80vh] lg:h-[90vh] relative overflow-hidden ">

    <div x-data="tileSlider({{ json_encode($images) }})" class="relative grid grid-cols-1 md:grid-cols-2 w-full h-full">
        <!-- Tile 1 (Left / Large) -->
        <div class="relative overflow-hidden shadow-lg gradient-b-to-t">
            <template x-for="(image, index) in images" :key="index">
                <div x-show="currentIndexes[0] === index"
                    x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 scale-105"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-1000"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute inset-0 w-full h-full">
                    <img :src="image.image" class="w-full h-full object-cover wallpaper-infinite">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/20 to-transparent"></div>
                </div>
            </template>
            <!-- Text Overlay Container (Positioned On Top of Image) -->
            <div class="absolute inset-0 z-20 flex flex-col justify-end items-center text-center p-6 pointer-events-none">
                <div class="pointer-events-auto max-w-4xl mx-auto flex flex-col items-start">

                    <h1 class="flex flex-col gap-2 w-full">
                        <!-- Primary Title Text -->
                        <span class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold uppercase text-white leading-tight drop-shadow-md tracking-wide">
                            {{ __('app.internet.title') }}
                        </span>
                    </h1>

                    <!-- Feature Keywords -->
                    <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 pt-6 w-full">
                        <span class="inline-flex hover:cursor-pointer items-center gap-1.5 px-8 py-2 rounded-full text-base sm:text-lg md:text-xl font-semibold text-white bg-[#F79633]/40 border border-[#F79633] backdrop-blur-md shadow-lg transition-all duration-200 hover:bg-[#F79633] hover:scale-110">
                            {{__('app.internet.fast')}}
                        </span>
                        <span class="inline-flex hover:cursor-pointer items-center gap-1.5 px-8 py-2 rounded-full text-base sm:text-lg md:text-xl font-semibold text-white bg-[#F79633]/40 border border-[#F79633] backdrop-blur-md shadow-lg transition-all duration-200 hover:bg-[#F79633] hover:scale-110">
                            {{__('app.internet.reliable')}}
                        </span>
                        <span class="inline-flex hover:cursor-pointer items-center gap-1.5 px-8 py-2 rounded-full text-base sm:text-lg md:text-xl font-semibold text-white bg-[#F79633]/40 border border-[#F79633] backdrop-blur-md shadow-lg transition-all duration-200 hover:bg-[#F79633] hover:scale-110">
                            {{__('app.internet.stable')}}
                        </span>
                        <span class="inline-flex hover:cursor-pointer items-center gap-1.5 px-8 py-2 rounded-full text-base sm:text-lg md:text-xl font-semibold text-white bg-[#F79633]/40 border border-[#F79633] backdrop-blur-md shadow-lg transition-all duration-200 hover:bg-[#F79633] hover:scale-110">
                            {{__('app.internet.scalable')}}
                        </span>
                    </div>

                </div>
            </div>
        </div>

        <!-- Right Column (Tile 2 & Tile 3 Split) -->
        <div class="grid grid-rows-2 h-full">
            <!-- Tile 2 (Top Right) -->
            <div class="relative overflow-hidden  shadow-lg">
                <template x-for="(image, index) in images" :key="index">
                    <div x-show="currentIndexes[1] === index"
                        x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-1000"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute inset-0 w-full h-full">
                        <img :src="image.image" class="w-full h-full object-cover wallpaper-infinite">
                        <div class="absolute inset-0 "></div>
                    </div>
                </template>
            </div>

            <!-- Tile 3 (Bottom Right) -->
            <div class="relative overflow-hidden shadow-lg ">
                <template x-for="(image, index) in images" :key="index">
                    <div x-show="currentIndexes[2] === index"
                        x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-1000"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute inset-0 w-full h-full">
                        <img :src="image.image" class="w-full h-full object-cover wallpaper-infinite">
                        <div class="absolute inset-0 "></div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Navigation Controls -->
        <button @click="nextSlide()" class="absolute left-4 sm:left-6 top-1/2 -translate-y-1/2 bg-[#8fc74a]/30 hover:bg-[#8fc74a] hover:text-white transition backdrop-blur text-white w-10 h-10 sm:w-12 sm:h-12 rounded-full z-30 flex items-center justify-center shadow-lg">❮</button>
        <button @click="nextSlide()" class="absolute right-4 sm:right-6 top-1/2 -translate-y-1/2 bg-[#8fc74a]/30 hover:bg-[#8fc74a] hover:text-white transition backdrop-blur text-white w-10 h-10 sm:w-12 sm:h-12 rounded-full z-30 flex items-center justify-center shadow-lg">❯</button>
    </div>
</section>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('tileSlider', (images) => ({
            images: images,
            currentIndexes: [0, 1, 2],
            timer: null,

            init() {
                // Automatically swap images every 4 seconds
                this.timer = setInterval(() => {
                    this.nextSlide();
                }, 4000);
            },

            nextSlide() {
                if (this.images.length < 3) return;

                // Pick a random tile position (0, 1, or 2) to change
                const tileToSwap = Math.floor(Math.random() * 3);

                // Get array of image indices not currently displayed anywhere on screen
                const availableIndices = this.images
                    .map((_, idx) => idx)
                    .filter(idx => !this.currentIndexes.includes(idx));

                if (availableIndices.length === 0) return;

                // Pick a random new image from available ones
                const randomIndex = availableIndices[Math.floor(Math.random() * availableIndices.length)];

                // Update only that targeted tile so it fades smoothly
                this.currentIndexes[tileToSwap] = randomIndex;
            }
        }))
    })
</script>
<section class="relative overflow-hidden bg-white space-y-32">

    {{-- ambient network-grid backdrop --}}
    <div class="pointer-events-none absolute inset-0 opacity-[0.04] dark:opacity-[0.06]"
        style="background-image:linear-gradient(#8fc74a 1px,transparent 1px),linear-gradient(90deg,#8fc74a 1px,transparent 1px);background-size:40px 40px;">
    </div>

    {{-- =========================== HERO =========================== --}}
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 ">
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-10 items-center">

            {{-- Left: copy --}}
            <div data-aos="fade-up">
                <span class="inline-flex items-center gap-2 rounded-full border border-brand-green/30 bg-brand-green/10 px-4 py-1.5 text-xs font-semibold tracking-wide text-brand-green">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-green opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-green"></span>
                    </span>
                    {{ __('app.internet.capacity') ?? 'FIBER INTERNET · CAMBODIA' }}
                </span>

                <h1 class="mt-6 text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-[1.08] tracking-tight text-[#8fc74a]">
                    {{ __('app.internet.capacity_slogan') ?? '' }}
                </h1>

                <p class="mt-5 text-lg leading-relaxed text-adaptive-muted max-w-xl">
                    {{ __('app.internet.capacity_slogan_desc') ?? 'Fiber-to-the-home speeds, honest pricing, and a network engineered for streaming, gaming, and working from anywhere in Cambodia.' }}
                </p>
                <div class="mt-10 grid grid-cols-2 gap-6 max-w-full">
                    <div>
                        <div class="flex items-center">
                            <span class="text-4xl font-extrabold text-brand-green">1</span>
                            <span class="text-xl font-semibold ml-1 text-brand-green"> Tbps</span>
                        </div>
                        <p class="mt-1 text-xs  font-semibold text-[#8fc74a]">
                            {{ __('app.internet.capacity_handle') ?? 'Max fiber speed' }}
                        </p>
                    </div>

                    <div>
                        <div class="flex items-center">
                            <span class="text-4xl font-extrabold text-brand-orange">99.99 %</span>
                        </div>
                        <p class="mt-1 text-xs font-semibold text-[#F79633]">
                            {{ __('app.internet.cdn_slogan') ?? 'Network uptime' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="slider w-full md:col-span-1 h-[200px] sm:h-[260px] md:h-full relative overflow-hidden order-1 md:order-2 rounded-2xl">
                <div class="slide absolute inset-0 transition-opacity duration-1000">
                    <div class="w-full h-full overflow-hidden">
                        <img
                            src="{{$wifiImage  }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="absolute inset-0"></div>
                </div>
            </div>

        </div>
    </div>
    <!-- Peering -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch max-w-7xl mx-auto min-h-[500px] lg:h-[500px]">
        <!-- Left Column: 50% Main Image -->
        <div class="w-full col-span-1 h-[400px] lg:h-full rounded-2xl overflow-hidden shadow-xl shadow-[#8fc74a]/10 bg-gray-100 flex-shrink-0 transition-all duration-300 hover:scale-95 ease-out">
            <img src="{{$cdnImage}}" alt="Main Image" class="w-full h-full object-cover" />
        </div>

        <!-- Right Column: 50% Content & Images -->
        <div data-animate="fade-up" class="flex flex-col col-span-2 justify-between h-full space-y-6 overflow-hidden translate-y-8">
            <!-- Top: Text Content -->
            <div class="space-y-4 flex-shrink-0">
                <span class="inline-flex items-center gap-2 rounded-full border border-brand-green/30 bg-brand-green/10 px-4 py-1.5 text-xs font-semibold tracking-wide text-brand-green">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-green opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-green"></span>
                    </span>
                    {{ __('app.internet.cdn') ?? 'FIBER INTERNET · CAMBODIA' }}
                </span>
                <div>
                    <h2 class="text-3xl sm:text-5xl font-extrabold text-[#F79633]">
                        {{ __('app.internet.cdn_slogan') ?? 'Network uptime' }}
                    </h2>
                    <p class="mt-3 text-base sm:text-lg leading-relaxed text-adaptive-muted w-3/4">
                        {{ __('app.internet.cdn_slogan1') }}
                    </p>
                </div>
            </div>

            <!-- Bottom: 2-Column Split (25% overall width each) -->
            <div class="grid grid-cols-2 gap-4 flex-1 min-h-0">
                <div class="rounded-xl overflow-hidden shadow-md bg-gray-100 h-full  transition-all duration-300 hover:scale-95 ease-out">
                    <img src="{{$socialImage}}" alt="Feature Image Right" class="w-full h-full object-cover" />
                </div>
                <div class="rounded-xl overflow-hidden h-full">
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-green/30 bg-[#F79633]/20 px-4 py-1.5 text-xs font-semibold tracking-wide text-[#F79633]">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#F79633] opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-[#F79633]"></span>
                        </span>
                        {{ __('app.internet.cdn_slogan3') ?? 'FIBER INTERNET · CAMBODIA' }}
                    </span>
                    <p class="px-2 py-4 text-base sm:text-lg leading-relaxed text-adaptive-muted w-full">
                        {{ __('app.internet.cdn_slogan2') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-full relative overflow-hidden py-20 lg:py-28">
    {{-- existing grid backdrop --}}
    <div class="pointer-events-none absolute inset-0 opacity-[0.04] dark:opacity-[0.06]"
        style="background-image:linear-gradient(#8fc74a 1px,transparent 1px),linear-gradient(90deg,#8fc74a 1px,transparent 1px);background-size:40px 40px;">
    </div>

    <div class="max-w-8xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-start">
            <div class="lg:col-span-6 lg:pl-4 px-6 grid grid-cols-1 md:grid-cols-6 gap-6 items-start">
                <!-- Top Full Width (col-span-6) -->
                <div class="col-span-1 md:col-span-6 space-y-2">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <h2 class="text-2xl sm:text-4xl lg:text-5xl font-black tracking-tight text-[#8fc74a] pb-1">
                            {{__('app.internet.global')}}
                        </h2>
                    </div>
                </div>
                <!-- Middle Left Column (col-span-3) -->
                <div class="col-span-1 md:col-span-3 space-y-3">
                    <div class="text-left text-sm sm:text-base leading-relaxed text-adaptive-muted">
                        <h2 class="text-xl sm:text-xl lg:text-2xl font-black tracking-tight text-[#F79633] pb-1">
                            {{__('app.internet.globa1')}}
                        </h2>
                        <p class="text-xs sm:text-sm text-adaptive-muted text-justify">
                            {{__('app.internet.globa_desc1')}}
                        </p>
                    </div>
                </div>

                <!-- Middle Right Column (col-span-3) -->
                <div class="col-span-1 md:col-span-3 space-y-3">
                    <div class="text-left text-sm sm:text-base leading-relaxed text-adaptive-muted">
                        <h2 class="text-xl sm:text-xl lg:text-2xl font-black tracking-tight text-[#F79633] pb-1">
                            {{__('app.internet.globa2')}}
                        </h2>
                        <p class="text-xs sm:text-sm text-adaptive-muted text-justify">
                            {{__('app.internet.globa_desc2')}}
                        </p>
                    </div>
                </div>

                <!-- Bottom Full Width (col-span-6) -->
                <div class="col-span-1 md:col-span-3 pt-2">
                    <div class="p-4 rounded-lg bg-black/5 dark:bg-white/5 ">
                        <h2 class="text-xl sm:text-xl lg:text-2xl font-black tracking-tight text-[#F79633] pb-1">
                            {{__('app.internet.globa3')}}
                        </h2>
                        <p class="text-xs sm:text-sm text-adaptive-muted text-justify">
                            {{__('app.internet.globa_desc3')}}
                        </p>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-6 relative lg:-ml-8 h-1/2">
                <div id="routeSlideshow" class="relative aspect-[4/3] sm:aspect-[16/10] overflow-hidden bg-black/5 dark:bg-white/5"
                    style="clip-path: polygon(0 0, 100% 0, 100% 100%, 8% 100%, 0 88%);">

                    <img src="{{ $cdnImage}}"
                        alt="Tokyo landing station — primary international gateway"
                        data-caption="Tokyo landing station — primary international gateway"
                        class="route-slide absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-100">

                    <img src="{{ $socialImage }}"
                        alt="Singapore transit hub — regional peering exchange"
                        data-caption="Singapore transit hub — regional peering exchange"
                        class="route-slide absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0">

                    <img src="{{ $wifiImage }}"
                        alt="Hong Kong backup route — automatic failover in under 2 seconds"
                        data-caption="Hong Kong backup route — automatic failover in under 2 seconds"
                        class="route-slide absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0">

                    <div class="absolute bottom-6 left-6 right-6">
                        <p id="routeCaption" class="text-white text-sm sm:text-base font-semibold drop-shadow">
                            Tokyo landing station — primary international gateway
                        </p>
                    </div>
                </div>

                {{-- route path nav --}}
                <div id="routeNav" class="flex items-center gap-0 mt-6 pl-2">
                    <div class="flex items-center flex-1">
                        <button type="button" data-index="0" aria-label="Go to slide 1"
                            class="route-dot relative w-3 h-3 rounded-full shrink-0 transition-colors duration-300 bg-[#F79633]">
                            <span class="route-ring absolute -inset-1.5 rounded-full border border-[#F79633]/50"></span>
                        </button>
                        <div class="h-px flex-1 bg-[#8fc74a]/20"></div>
                    </div>
                    <div class="flex items-center flex-1">
                        <button type="button" data-index="1" aria-label="Go to slide 2"
                            class="route-dot relative w-3 h-3 rounded-full shrink-0 transition-colors duration-300 bg-[#8fc74a]/30 hover:bg-[#8fc74a]/60">
                            <span class="route-ring absolute -inset-1.5 rounded-full border border-transparent"></span>
                        </button>
                        <div class="h-px flex-1 bg-[#8fc74a]/20"></div>
                    </div>
                    <div class="flex items-center">
                        <button type="button" data-index="2" aria-label="Go to slide 3"
                            class="route-dot relative w-3 h-3 rounded-full shrink-0 transition-colors duration-300 bg-[#8fc74a]/30 hover:bg-[#8fc74a]/60">
                            <span class="route-ring absolute -inset-1.5 rounded-full border border-transparent"></span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="w-full max-w-7xl mx-auto bg-slate-100  border-slate-200 rounded-3xl shadow py-2 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex items-center justify-center">
        <nav class="hidden lg:flex items-center space-x-1 xl:space-x-1 text-xs xl:text-sm font-semibold text-adaptive-muted whitespace-nowrap">
            @php
            $navLinks = [
            [
            'route' => 'home',
            'label' => __('app.nav.home'),
            'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>'
            ],
            [
            'route' => 'home',
            'label' => __('app.nav.home_broadband'),
            'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>'
            ],
            [
            'route' => 'home',
            'label' => __('app.nav.dedicated_internet'),
            'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>'
            ],
            [
            'route' => 'home',
            'label' => __('app.nav.managed_network'),
            'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
            </svg>'
            ],
            ];
            @endphp

            @foreach($navLinks as $link)
            @php $active = request()->routeIs($link['route']); @endphp
            <a href="{{ route($link['route']) }}"
                class="nav-link-pill text-slate-500 px-3 py-2 rounded-lg hover:text-brand-green hover:bg-brand-green/5 transition flex items-center gap-1.5 {{ $active ? 'text-brand-green active bg-brand-green/5' : '' }}">
                {!! $link['icon'] !!}
                <span class="text-[0.95rem]">{!! $link['label'] !!}</span>
            </a>
            @endforeach
        </nav>
    </div>
</section>

<section class="w-full relative overflow-hidden py-20 lg:py-28">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch max-w-7xl mx-auto min-h-[500px] lg:h-[500px]">
        <div id="plans" class="relative col-span-3 max-w-7xl mx-auto px-6 lg:px-8 pb-24">
            <div class="text-center max-w-2xl mx-auto mb-12 hidden">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-adaptive-main">
                    {{ __('app.internet.plan_slogan') ?? 'Pick your speed' }}
                </h2>
                <p class="mt-2 text-adaptive-muted">{{ __('app.internet.plan_slogan') ?? 'Switch or upgrade anytime, no lock-in fees.' }}</p>
            </div>

            @php
            $plans = [
            ['name' => 'Basic', 'speed' => '50', 'price' => '$15', 'popular' => false],
            ['name' => 'Family', 'speed' => '200', 'price' => '$28', 'popular' => true],
            ['name' => 'Pro', 'speed' => '500', 'price' => '$45', 'popular' => false],
            ['name' => 'Standard', 'speed' => '100', 'price' => '$20', 'popular' => false],
            ['name' => 'Business', 'speed' => '800', 'price' => '$65', 'popular' => true],
            ['name' => 'Ultra', 'speed' => '1000','price' => '$80', 'popular' => false],
            ];

            $features = [
            __('app.internet.feature_unlimited') ?? 'Unlimited data',
            __('app.internet.feature_install') ?? 'Free installation',
            __('app.internet.feature_support') ?? '24/7 support line',
            ];

            $popularLabel = __('app.internet.popular') ?? 'Most Popular';
            $chooseLabel = __('app.internet.choose_plan') ?? 'Choose plan';
            @endphp

            <div
                x-data="planCarousel({{ Illuminate\Support\Js::from($plans) }}, 3)"
                x-init="init()"
                class="relative">
                {{-- viewport --}}
                <div class="overflow-hidden">
                    <div
                        class="flex transition-transform duration-500 ease-in-out"
                        :style="`transform: translateX(-${page * 100}%)`">
                        <template x-for="(chunk, i) in pages" :key="i">
                            <div class="grid md:grid-cols-3 gap-6 items-start w-full shrink-0 px-1">
                                <template x-for="plan in chunk" :key="plan.name">
                                    <div
                                        class="relative rounded-2xl p-8 border transition-transform duration-300 hover:-translate-y-1"
                                        :class="plan.popular
                                ? 'border-brand-orange bg-white dark:bg-white/5 shadow-2xl scale-105'
                                : 'border-black/10 bg-white'">
                                        <span
                                            x-show="plan.popular"
                                            class="absolute -top-3 left-1/2 -translate-x-1/2 rounded-full bg-brand-orange px-3 py-1 text-xs font-bold text-white shadow">{{ $popularLabel }}</span>

                                        <h3 class="text-sm font-semibold uppercase tracking-wide text-adaptive-muted" x-text="plan.name"></h3>

                                        <div class="mt-3 flex items-baseline gap-1">
                                            <span class="text-4xl font-extrabold text-adaptive-main" x-text="plan.price"></span>
                                            <span class="text-sm text-adaptive-muted">/mo</span>
                                        </div>

                                        <p class="mt-2 text-sm text-adaptive-muted">
                                            <span x-text="plan.speed"></span> Mbps download
                                        </p>

                                        <ul class="mt-6 space-y-3 text-sm text-adaptive-main">
                                            @foreach ($features as $feature)
                                            <li class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-brand-green shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                {{ $feature }}
                                            </li>
                                            @endforeach
                                        </ul>

                                        <a
                                            href="#"
                                            class="mt-8 block text-center rounded-xl px-5 py-3 text-sm font-semibold transition-colors"
                                            :class="plan.popular
                                    ? 'gradient-brand text-white hover:opacity-90'
                                    : 'border border-black/10 dark:border-white/15 text-adaptive-main hover:border-brand-green/50 hover:text-brand-green'">{{ $chooseLabel }}</a>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- prev / next arrows --}}
                <button
                    @click="prev()"
                    x-show="pages.length > 1"
                    class="absolute top-1/2 -left-4 -translate-y-1/2 w-10 h-10 rounded-full bg-white dark:bg-white/10 border border-black/10 dark:border-white/15 shadow flex items-center justify-center text-adaptive-main hover:text-brand-green disabled:opacity-30"
                    :disabled="page === 0">‹</button>

                <button
                    @click="next()"
                    x-show="pages.length > 1"
                    class="absolute top-1/2 -right-4 -translate-y-1/2 w-10 h-10 rounded-full bg-white dark:bg-white/10 border border-black/10 dark:border-white/15 shadow flex items-center justify-center text-adaptive-main hover:text-brand-green disabled:opacity-30"
                    :disabled="page === pages.length - 1">›</button>

                {{-- dots --}}
                <div class="mt-6 flex justify-center gap-2" x-show="pages.length > 1">
                    <template x-for="(chunk, i) in pages" :key="i">
                        <button
                            @click="page = i"
                            class="w-2.5 h-2.5 rounded-full transition-colors"
                            :class="page === i ? 'bg-brand-orange' : 'bg-black/15 dark:bg-white/20'"></button>
                    </template>
                </div>
            </div>

            <script>
                function planCarousel(plans, perPage) {
                    return {
                        plans,
                        perPage,
                        page: 0,
                        pages: [],
                        init() {
                            this.pages = [];
                            for (let i = 0; i < this.plans.length; i += this.perPage) {
                                this.pages.push(this.plans.slice(i, i + this.perPage));
                            }
                        },
                        next() {
                            if (this.page < this.pages.length - 1) this.page++;
                        },
                        prev() {
                            if (this.page > 0) this.page--;
                        },
                    };
                }
            </script>
        </div>
    </div>
</section>
<section>

    {{-- =========================== CTA BANNER =========================== --}}
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 pb-20">
        <div class="rounded-3xl gradient-brand px-8 py-12 sm:px-14 sm:py-14 text-center overflow-hidden relative">
            <div class="absolute inset-0 opacity-10" style="background-image:radial-gradient(circle,#fff 1px,transparent 1px);background-size:22px 22px;"></div>
            <h3 class="relative text-2xl sm:text-3xl font-extrabold text-white">
                {{ __('app.internet.cta_banner_title') ?? 'Is fiber available at your address?' }}
            </h3>
            <p class="relative mt-3 text-white/90 max-w-xl mx-auto">
                {{ __('app.internet.cta_banner_subtitle') ?? 'Check your coverage in seconds and get connected this week.' }}
            </p>
            <a href="{{ route('coverage.check') ?? '#' }}"
                class="relative inline-flex mt-7 items-center gap-2 rounded-xl bg-white px-7 py-3.5 text-sm font-bold text-brand-green shadow-lg transition-transform hover:scale-[1.03]">
                {{ __('app.internet.cta_banner_button') ?? 'Check my coverage' }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

</section>
<section class="py-14 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-5">
        <h2 class="text-2xl font-extrabold text-adaptive-main">
            {{ $isKm ? 'ចាប់អារម្មណ៍ចង់ប្រើសេវាកម្មមែនទេ?' : 'Interested in our services?' }}
        </h2>
        <button onclick="openModal('serviceModal')"
            class="inline-flex items-center gap-2 gradient-brand text-white font-bold px-8 py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5">
            <i class="fa-solid fa-paper-plane"></i>
            <span>{{ $isKm ? 'ស្នើសុំភ្ជាប់សេវាអ៊ីនធឺណិត' : 'Request Internet Service' }}</span>
        </button>
    </div>
</section>

@endsection