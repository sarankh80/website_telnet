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

$homePlate=asset("storage/home/services/home_plate.png");
$bizPlate=asset("storage/home/services/business_plate.png");

$homeIcon=asset("storage/home/services/home_icon.png");
$bizIcon=asset("storage/home/services/biz_icon.png");

@endphp
<script defer src="{{asset('js/filament/additional/views/services/services.js')}}"></script>
<nav class="sticky top-20 z-40 max-w-8xl h-10 mx-auto px-4 sm:px-6 lg:px-16 relative border-b border-white/10">
    <div class="absolute inset-0 bg-[#8fc74a] pointer-events-none z-0 "></div>
    <div class="relative z-10 flex items-center justify-center gap-2 sm:gap-6 h-full text-xs font-medium text-white">

        @foreach($serviceTypes as $st)
        <!-- Horizontal Nav Item -->
        <div class="relative group h-full flex items-center">
            <a href="{{ $st['url'] ?? '#' }}" class="h-full px-2 sm:px-4 rounded-xl flex items-center gap-1 sm:gap-2 hover:text-white hover:bg-[#5e872d] transition-colors duration-200 cursor-pointer">
                @if(!empty($st['icon']))
                <i class="{{ $st['icon'] }} text-xs sm:text-base"></i>
                @else
                <i class="fa-solid fa-layer-group text-xs sm:text-sm"></i>
                @endif
                <span class="text-[11px] sm:text-sm md:text-base font-semibold text-white whitespace-nowrap">{{ $st['name'] }}</span>
                <!-- Optional Arrow Indicator -->
                <i class="fa-solid fa-chevron-down text-[8px] sm:text-[10px] opacity-70 group-hover:rotate-180 transition-transform duration-300"></i>
            </a>

            <!-- Animated Dropdown Nav -->
            <div class="fixed left-0 right-0 top-[104px] sm:top-[112px] lg:top-[120px] z-50 w-screen bg-white border-b border-gray-200 shadow-xl text-gray-800 
                        opacity-0 invisible pointer-events-none translate-y-3 scale-[0.99]
                        group-hover:opacity-100 group-hover:visible group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:scale-100
                        transition-all duration-300 ease-out origin-top max-h-[80vh] overflow-y-auto">

                <!-- Inner Wrapper: Matches top nav's px-4 sm:px-6 lg:px-16 exactly -->
                <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-16 flex flex-col lg:flex-row max-h-[80vh] lg:max-h-[500px] lg:min-h-[300px]">

                    {{-- Left Sidebar --}}
                    <aside class="w-full lg:w-2/6 bg-slate-50 border-b lg:border-b-0 lg:border-r border-[#8fc74a] p-3 sm:p-4 flex flex-col gap-1">
                        <p class="type-nav text-left px-2 sm:px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 leading-relaxed">
                            {!! nl2br(e($st['desc'])) !!}
                        </p>
                    </aside>

                    {{-- Main Slider Content --}}
                    <main class="w-full lg:w-3/6 p-3 sm:p-4 bg-white overflow-y-auto order-last lg:order-none">
                        <div id="#" class="w-full h-40 sm:h-56 lg:h-full relative overflow-hidden flex-shrink-0">
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
                    <aside class="w-full lg:w-1/6 bg-slate-50 border-t lg:border-t-0 lg:border-l border-[#8fc74a] p-3 sm:p-4 flex flex-row lg:flex-col gap-1 overflow-x-auto">
                        @foreach($st['types'] as $type)
                        <button type="button"
                            onclick="showType(`{{ $type['name'] }}`)"
                            class="type-nav text-left px-3 py-2 rounded-lg text-xs sm:text-sm md:text-base font-medium whitespace-nowrap
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
            <div class="absolute inset-0 z-20 flex flex-col justify-end items-center text-center p-4 sm:p-6 pointer-events-none">
                <div class="pointer-events-auto max-w-4xl mx-auto flex flex-col items-center sm:items-start">

                    <h1 class="flex flex-col gap-2 w-full">
                        <!-- Primary Title Text -->
                        <span class="text-2xl sm:text-4xl md:text-5xl lg:text-7xl font-extrabold uppercase text-white leading-tight drop-shadow-md tracking-wide">
                            {{ __('app.internet.title') }}
                        </span>
                    </h1>

                    <!-- Feature Keywords -->
                    <div class="flex flex-wrap items-center justify-center gap-1.5 sm:gap-2.5 md:gap-3 pt-4 sm:pt-6 w-full">
                        <span class="inline-flex hover:cursor-pointer items-center gap-1.5 px-3 sm:px-5 md:px-8 py-1.5 sm:py-2 rounded-full text-xs sm:text-base md:text-lg lg:text-xl font-semibold text-white bg-[#F79633]/40 border border-[#F79633] backdrop-blur-md shadow-lg transition-all duration-200 hover:bg-[#F79633] hover:scale-110">
                            {{__('app.internet.fast')}}
                        </span>
                        <span class="inline-flex hover:cursor-pointer items-center gap-1.5 px-3 sm:px-5 md:px-8 py-1.5 sm:py-2 rounded-full text-xs sm:text-base md:text-lg lg:text-xl font-semibold text-white bg-[#F79633]/40 border border-[#F79633] backdrop-blur-md shadow-lg transition-all duration-200 hover:bg-[#F79633] hover:scale-110">
                            {{__('app.internet.reliable')}}
                        </span>
                        <span class="inline-flex hover:cursor-pointer items-center gap-1.5 px-3 sm:px-5 md:px-8 py-1.5 sm:py-2 rounded-full text-xs sm:text-base md:text-lg lg:text-xl font-semibold text-white bg-[#F79633]/40 border border-[#F79633] backdrop-blur-md shadow-lg transition-all duration-200 hover:bg-[#F79633] hover:scale-110">
                            {{__('app.internet.stable')}}
                        </span>
                        <span class="inline-flex hover:cursor-pointer items-center gap-1.5 px-3 sm:px-5 md:px-8 py-1.5 sm:py-2 rounded-full text-xs sm:text-base md:text-lg lg:text-xl font-semibold text-white bg-[#F79633]/40 border border-[#F79633] backdrop-blur-md shadow-lg transition-all duration-200 hover:bg-[#F79633] hover:scale-110">
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
        <button @click="nextSlide()" class="absolute left-2 sm:left-4 lg:left-6 top-1/2 -translate-y-1/2 bg-[#8fc74a]/30 hover:bg-[#8fc74a] hover:text-white transition backdrop-blur text-white w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 rounded-full z-30 flex items-center justify-center shadow-lg text-sm sm:text-base">❮</button>
        <button @click="nextSlide()" class="absolute right-2 sm:right-4 lg:right-6 top-1/2 -translate-y-1/2 bg-[#8fc74a]/30 hover:bg-[#8fc74a] hover:text-white transition backdrop-blur text-white w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 rounded-full z-30 flex items-center justify-center shadow-lg text-sm sm:text-base">❯</button>
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
<section class="relative overflow-hidden bg-white space-y-16 sm:space-y-24 lg:space-y-32">

    {{-- ambient network-grid backdrop --}}
    <div class="pointer-events-none absolute inset-0 opacity-[0.04] dark:opacity-[0.06]"
        style="background-image:linear-gradient(#8fc74a 1px,transparent 1px),linear-gradient(90deg,#8fc74a 1px,transparent 1px);background-size:40px 40px;">
    </div>

    {{-- =========================== HERO =========================== --}}
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10 lg:gap-14 items-center">

            {{-- Left: copy --}}
            <div data-aos="fade-up" class="order-2 lg:order-1">
                <span class="inline-flex items-center gap-2 rounded-full border border-brand-green/30 bg-brand-green/10 px-3 sm:px-4 py-1 sm:py-1.5 text-[10px] sm:text-xs font-semibold tracking-wide text-brand-green">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-green opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-green"></span>
                    </span>
                    {{ __('app.internet.capacity') ?? 'FIBER INTERNET · CAMBODIA' }}
                </span>

                <h1 class="mt-4 sm:mt-6 text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold leading-[1.15] sm:leading-[1.08] tracking-tight text-[#8fc74a]">
                    {{ __('app.internet.capacity_slogan') ?? '' }}
                </h1>

                <p class="mt-3 sm:mt-5 text-sm sm:text-base lg:text-lg leading-relaxed text-adaptive-muted max-w-xl">
                    {{ __('app.internet.capacity_slogan_desc') ?? 'Fiber-to-the-home speeds, honest pricing, and a network engineered for streaming, gaming, and working from anywhere in Cambodia.' }}
                </p>
                <div class="mt-6 sm:mt-10 grid grid-cols-2 gap-4 sm:gap-6 max-w-full">
                    <div>
                        <div class="flex items-center">
                            <span class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-brand-green">1</span>
                            <span class="text-base sm:text-lg lg:text-xl font-semibold ml-1 text-brand-green"> Tbps</span>
                        </div>
                        <p class="mt-1 text-[10px] sm:text-xs  font-semibold text-[#8fc74a]">
                            {{ __('app.internet.capacity_handle') ?? 'Max fiber speed' }}
                        </p>
                    </div>

                    <div>
                        <div class="flex items-center">
                            <span class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-brand-orange">99.99 %</span>
                        </div>
                        <p class="mt-1 text-[10px] sm:text-xs font-semibold text-[#F79633]">
                            {{ __('app.internet.cdn_slogan') ?? 'Network uptime' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="slider w-full md:col-span-1 h-[180px] sm:h-[260px] md:h-full relative overflow-hidden order-1 lg:order-2 rounded-2xl">
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
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 items-stretch max-w-7xl mx-auto min-h-0 lg:min-h-[500px] lg:h-[600px] px-4 sm:px-6 lg:px-0">
        <!-- Left Column: 50% Main Image -->
        <div class="w-full col-span-1 h-[220px] sm:h-[300px] lg:h-full rounded-2xl overflow-hidden shadow-xl shadow-[#8fc74a]/10 bg-gray-100 flex-shrink-0 transition-all duration-300 hover:scale-95 ease-out">
            <img src="{{$cdnImage}}" alt="Main Image" class="w-full h-full object-cover" />
        </div>

        <!-- Right Column: 50% Content & Images -->
        <div data-animate="fade-up" class="flex flex-col col-span-1 lg:col-span-2 justify-between h-full space-y-4 sm:space-y-6 overflow-hidden translate-y-0 lg:translate-y-8">
            <!-- Top: Text Content -->
            <div class="space-y-3 sm:space-y-4 flex-shrink-0">
                <span class="inline-flex items-center gap-2 rounded-full border border-brand-green/30 bg-brand-green/10 px-3 sm:px-4 py-1 sm:py-1.5 text-[10px] sm:text-xs font-semibold tracking-wide text-brand-green">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-green opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-green"></span>
                    </span>
                    {{ __('app.internet.cdn') ?? 'FIBER INTERNET · CAMBODIA' }}
                </span>
                <div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-[#F79633]">
                        {{ __('app.internet.cdn_slogan') ?? 'Network uptime' }}
                    </h2>
                    <p class="mt-2 sm:mt-3 text-sm sm:text-base lg:text-lg leading-relaxed text-adaptive-muted w-full sm:w-3/4">
                        {{ __('app.internet.cdn_slogan1') }}
                    </p>
                </div>
            </div>

            <!-- Bottom: 2-Column Split (25% overall width each) -->
            <div class="grid grid-cols-2 gap-3 sm:gap-4 flex-1 min-h-0">
                <div class="rounded-xl overflow-hidden shadow-md bg-gray-100 h-full min-h-[200px] transition-all duration-300 hover:scale-95 ease-out">
                    <img src="{{$socialImage}}" alt="Feature Image Right" class="w-full h-full object-cover" />
                </div>
                <div class="rounded-xl overflow-hidden h-full">
                    <span class="inline-flex items-center gap-1.5 sm:gap-2 rounded-full border border-brand-green/30 bg-[#F79633]/20 px-2.5 sm:px-4 py-1 sm:py-1.5 text-[9px] sm:text-xs font-semibold tracking-wide text-[#F79633]">
                        <span class="relative flex h-1.5 w-1.5 sm:h-2 sm:w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#F79633] opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-1.5 w-1.5 sm:h-2 sm:w-2 bg-[#F79633]"></span>
                        </span>
                        {{ __('app.internet.cdn_slogan3') ?? 'FIBER INTERNET · CAMBODIA' }}
                    </span>
                    <p class="px-1 sm:px-2 py-2 sm:py-4 text-xs sm:text-sm lg:text-base leading-relaxed text-adaptive-muted w-full">
                        {{ __('app.internet.cdn_slogan2') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-full relative overflow-hidden py-12 sm:py-20 lg:py-28">
    {{-- existing grid backdrop --}}
    <div class="pointer-events-none absolute inset-0 opacity-[0.04] dark:opacity-[0.06]"
        style="background-image:linear-gradient(#8fc74a 1px,transparent 1px),linear-gradient(90deg,#8fc74a 1px,transparent 1px);background-size:40px 40px;">
    </div>

    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-10 lg:gap-8 items-start">
            <div class="lg:col-span-6 lg:pl-4 px-0 sm:px-6 grid grid-cols-1 md:grid-cols-6 gap-4 sm:gap-6 items-start">
                <!-- Top Full Width (col-span-6) -->
                <div class="col-span-1 md:col-span-6 space-y-2">
                    <div class="flex items-center gap-3 sm:gap-4">
                        <h2 class="text-xl sm:text-3xl lg:text-4xl xl:text-5xl font-black tracking-tight text-[#8fc74a] pb-1">
                            {{__('app.internet.global')}}
                        </h2>
                    </div>
                </div>
                <!-- Middle Left Column (col-span-3) -->
                <div class="col-span-1 md:col-span-3 space-y-3">
                    <div class="text-left text-sm sm:text-base leading-relaxed text-adaptive-muted">
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-black tracking-tight text-[#F79633] pb-1">
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
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-black tracking-tight text-[#F79633] pb-1">
                            {{__('app.internet.globa2')}}
                        </h2>
                        <p class="text-xs sm:text-sm text-adaptive-muted text-justify">
                            {{__('app.internet.globa_desc2')}}
                        </p>
                    </div>
                </div>

                <!-- Bottom Full Width (col-span-6) -->
                <div class="col-span-1 md:col-span-3 pt-2">
                    <div class="p-3 sm:p-4 rounded-lg bg-black/5 dark:bg-white/5 ">
                        <h2 class="text-lg sm:text-xl lg:text-2xl font-black tracking-tight text-[#F79633] pb-1">
                            {{__('app.internet.globa3')}}
                        </h2>
                        <p class="text-xs sm:text-sm text-adaptive-muted text-justify">
                            {{__('app.internet.globa_desc3')}}
                        </p>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-6 relative lg:-ml-8 h-auto">
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

                    <div class="absolute bottom-4 sm:bottom-6 left-4 sm:left-6 right-4 sm:right-6">
                        <p id="routeCaption" class="text-white text-xs sm:text-sm lg:text-base font-semibold drop-shadow">
                            Tokyo landing station — primary international gateway
                        </p>
                    </div>
                </div>

                {{-- route path nav --}}
                <div id="routeNav" class="flex items-center gap-0 mt-4 sm:mt-6 pl-2">
                    <div class="flex items-center flex-1">
                        <button type="button" data-index="0" aria-label="Go to slide 1"
                            class="route-dot relative w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full shrink-0 transition-colors duration-300 bg-[#F79633]">
                            <span class="route-ring absolute -inset-1.5 rounded-full border border-[#F79633]/50"></span>
                        </button>
                        <div class="h-px flex-1 bg-[#8fc74a]/20"></div>
                    </div>
                    <div class="flex items-center flex-1">
                        <button type="button" data-index="1" aria-label="Go to slide 2"
                            class="route-dot relative w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full shrink-0 transition-colors duration-300 bg-[#8fc74a]/30 hover:bg-[#8fc74a]/60">
                            <span class="route-ring absolute -inset-1.5 rounded-full border border-transparent"></span>
                        </button>
                        <div class="h-px flex-1 bg-[#8fc74a]/20"></div>
                    </div>
                    <div class="flex items-center">
                        <button type="button" data-index="2" aria-label="Go to slide 3"
                            class="route-dot relative w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full shrink-0 transition-colors duration-300 bg-[#8fc74a]/30 hover:bg-[#8fc74a]/60">
                            <span class="route-ring absolute -inset-1.5 rounded-full border border-transparent"></span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="relative flex flex-col lg:flex-row w-full min-h-screen text-slate-800 font-sans pb-12 sm:pb-20">
    <div class="pointer-events-none absolute inset-0 opacity-[0.04] dark:opacity-[0.06]"
        style="background-image:linear-gradient(#8fc74a 1px,transparent 1px),linear-gradient(90deg,#8fc74a 1px,transparent 1px);background-size:40px 40px;">
    </div>

    <!-- Sidebar / Navigation -->
    <aside class="w-full lg:w-1/3 xl:w-1/4 border border-[#8fc74a]/50 shadow-[#8fc74a]/20 shadow-xl rounded-2xl mx-4 sm:mx-6 lg:mx-4 p-3 sm:p-4 flex flex-col shrink-0 h-max lg:max-h-[1200px] overflow-y-auto mb-4 sm:mb-6 lg:mb-0">
        <nav class="space-y-4 sm:space-y-6" aria-label="Service Categories">
            @foreach($serviceType as $st)
            <div class="space-y-2">
                <div class="flex items-center gap-2.5 px-2 py-1">
                    <span class="truncate text-sm sm:text-base font-bold text-slate-400">{{ $st->name }}</span>
                </div>
                @if($st->services->isNotEmpty())
                <div class="ml-2 space-y-1 border-l border-gray-200">
                    @foreach($st->services as $child)
                    <a href="{{ route('services.eachTypes', $child->id) }}"
                        class="group flex items-center justify-between w-full mx-2 px-3 py-2 rounded-r-lg text-xs sm:text-sm font-medium transition-all duration-200 ease-in-out {{ isset($sv) && $sv->id == $child->id ? 'border-l-2 border-[#8fc74a] bg-[#8fc74a]/10 text-[#8fc74a]' : 'text-slate-600 hover:text-[#8fc74a] hover:bg-[#8fc74a]/10' }} focus:outline-none focus:ring-2 focus:ring-[#8fc74a]/20 active:scale-[0.98]">
                        <span class="truncate">{{ $child->name_en }}</span>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="pl-1">
                    <a href="#service-{{ $st->id }}"
                        class="group flex items-center justify-between w-full px-3 py-2 rounded-xl border-l border-gray-200 text-xs sm:text-sm font-medium text-slate-600 hover:text-[#8fc74a] hover:bg-[#8fc74a]/10 transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-[#8fc74a]/20 active:scale-[0.98]">
                        <span class="truncate">{{ $st->name }}</span>
                        <svg class="w-3.5 h-3.5 text-slate-400 opacity-0 -translate-x-1 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                @endif
            </div>
            @endforeach
        </nav>
    </aside>

    <main class="w-full lg:w-2/3 xl:w-3/4 px-4 sm:px-6 space-y-8 overflow-y-auto">
        <!-- Header Section -->
        <header class="max-w-2xl">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#8fc74a] tracking-tight">
                {{ $isKm ? $sv->name_km : $sv->name_en }}
            </h1>
            <p class="text-slate-500 mt-2 text-sm sm:text-base leading-relaxed">
                {!! $isKm ? $sv->description_km : $sv->description_en !!}
            </p>
        </header>

        <!-- Hero / Feature Banner -->
        <div class="relative w-full rounded-3xl overflow-hidden shadow-2xl bg-slate-950 aspect-[16/9] sm:aspect-[21/9]">
            <div id="slides" class="flex transition-transform duration-700 ease-in-out h-full w-full">
                <div class="min-w-full h-full relative">
                    <img src="{{$homePlate}}" alt="Gigabit Speed Poster" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-tr from-slate-950 via-slate-950/40 to-transparent p-6 sm:p-10 flex flex-col justify-end">
                        <span class="inline-block w-fit px-3 py-1 rounded-full text-xs font-semibold bg-[#8fc74a]/20 text-[#8fc74a] border border-[#8fc74a]/30 backdrop-blur-md mb-2">
                            Ultra High Speed
                        </span>
                        <h2 class="text-xl sm:text-3xl font-extrabold text-white tracking-wide">Zero Latency Gaming Network</h2>
                    </div>
                </div>
                <div class="min-w-full h-full relative">
                    <img src="{{$bizPlate}}" alt="Work from Home Poster" class="w-full h-full object-cover opacity-60" />
                    <div class="absolute inset-0 bg-gradient-to-tr from-slate-950 via-slate-950/40 to-transparent p-6 sm:p-10 flex flex-col justify-end">
                        <span class="inline-block w-fit px-3 py-1 rounded-full text-xs font-semibold bg-[#F79633]/20 text-[#F79633] border border-[#F79633]/30 backdrop-blur-md mb-2">
                            Enterprise Grade
                        </span>
                        <h2 class="text-xl sm:text-3xl font-extrabold text-white tracking-wide">Uninterrupted Remote Productivity</h2>
                    </div>
                </div>
            </div>

            <!-- Carousel Navigation Controls -->
            <button onclick="moveSlide(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/30 backdrop-blur-md text-white p-2.5 rounded-2xl transition-all focus:outline-none border border-white/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button onclick="moveSlide(1)" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/30 backdrop-blur-md text-white p-2.5 rounded-2xl transition-all focus:outline-none border border-white/20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Pricing Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 py-6">
            @foreach($sv->tariff as $tr)
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200 shadow-3xl  hover:shadow-2xl hover:shadow-[#8fc74a]/10 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between relative group">

                <div>
                    <!-- Floating Icon & Header Section -->
                    <div class="flex items-center gap-4 pb-6 border-b border-slate-100">
                        <div class="w-20 h-20 rounded-2xl bg-slate-50 border border-slate-100 shadow-inner grid place-items-center shrink-0 group-hover:bg-[#8fc74a]/10 transition-colors duration-300">
                            <img src="{{asset('storage/'.$tr->services->image)}}" alt="Service Icon" class="max-w-full max-h-full object-contain">
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-[#8fc74a] group-hover:text-[#F79633] transition-colors duration-300">
                                {{ $isKm ? $tr->name_km : $tr->name_en }}
                            </h3>
                            <span class="text-xs text-slate-400">{{__('app.internet.local_s')}}</span><br>
                            <span class="text-xs text-slate-400">{{__('app.internet.global_s')}}</span>
                        </div>
                    </div>

                    <!-- Pricing Block -->
                    <div class="my-6">
                        <div class="flex items-baseline justify-center gap-1">
                            <span class="text-4xl sm:text-5xl font-black text-[#8fc74a] tracking-tight">
                                ${{ ($tr->price) >= 1 ? $tr->price : "XX" }}
                            </span>
                            <span class="text-slate-400 font-semibold text-sm">
                                {{ ($tr->term) >= 2 ? __('app.internet.terms') : __('app.internet.term') }}
                            </span>
                        </div>
                    </div>

                    <!-- Features List -->
                    <ul class="space-y-3.5 text-xs sm:text-sm text-slate-600 my-6">
                        <li class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#8fc74a]/15 text-[#8fc74a] grid place-items-center shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>Fiber Optic Technology 100% connectivity.</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#8fc74a]/15 text-[#8fc74a] grid place-items-center shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>High-speed broadband connectivity</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#8fc74a]/15 text-[#8fc74a] grid place-items-center shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>Stable and low-latency network performance</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#8fc74a]/15 text-[#8fc74a] grid place-items-center shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>Affordable monthly subscription</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#8fc74a]/15 text-[#8fc74a] grid place-items-center shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>PPPoE Connection stable access</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#8fc74a]/15 text-[#8fc74a] grid place-items-center shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>Suitable for streaming and online learning</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-5 h-5 rounded-full bg-[#8fc74a]/15 text-[#8fc74a] grid place-items-center shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span>Flexible bandwidth packages</span>
                        </li>
                    </ul>
                </div>

                <!-- CTA Action -->
                <button class="mt-4 w-full py-3.5 px-4 bg-[#8fc74a] hover:bg-[#F79633] text-white font-bold rounded-2xl transition-all duration-300 shadow-md hover:shadow-lg hover:shadow-[#8fc74a]/25 text-sm cursor-pointer active:scale-[0.98]">
                    Order Now
                </button>
            </div>
            @endforeach
        </div>
    </main>

    <script>
        let currentIdx = 0;

        function moveSlide(dir) {
            const slides = document.getElementById('slides');
            const total = slides.children.length;
            currentIdx = (currentIdx + dir + total) % total;
            slides.style.transform = `translateX(-${currentIdx*100}%)`;
        }
    </script>
</section>

<section>

    {{-- =========================== CTA BANNER =========================== --}}
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 sm:pb-20">
        <div class="rounded-2xl sm:rounded-3xl gradient-brand px-5 py-8 sm:px-14 sm:py-14 text-center overflow-hidden relative">
            <div class="absolute inset-0 opacity-10" style="background-image:radial-gradient(circle,#fff 1px,transparent 1px);background-size:22px 22px;"></div>
            <h3 class="relative text-lg sm:text-2xl lg:text-3xl font-extrabold text-white">
                {{ __('app.internet.order') ?? 'Is fiber available at your address?' }}
            </h3>
            <p class="relative mt-2 sm:mt-3 text-sm sm:text-base text-white/90 max-w-xl mx-auto">
                {{ __('app.internet.order_option') ?? 'Check your coverage in seconds and get connected this week.' }}
            </p>
            <a href="{{ route('coverage.check') ?? '#' }}"
                class="relative inline-flex mt-5 sm:mt-7 items-center gap-2 rounded-xl bg-white px-5 sm:px-7 py-3 sm:py-3.5 text-xs sm:text-sm font-bold text-brand-green shadow-lg transition-transform hover:scale-[1.03]">
                {{ __('app.internet.order_submit') ?? 'Check my coverage' }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

</section>
@endsection