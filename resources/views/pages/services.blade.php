@extends('layouts.app')
@section('title', 'សេវាកម្មស្នូល — TELNET CO., LTD.')
@section('content')

@php $isKm = app()->getLocale() === 'km';
$serviceTypes = [
[
"id" => 1,
"name" => "FTTH-Package",
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
"name" => "FTTB-Package",
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
"name" => "FTTX-Packages",
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
$images1=$images;
$capacityImage=asset('storage/home/services/bgImage4.png');
$cdnImage=asset("storage/home/services/cdn.png");
$socialImage=asset("storage/home/services/social.png");

@endphp

<nav class="sticky top-20 z-40 max-w-8xl h-16 mx-auto px-4 sm:px-6 lg:px-16 relative border-b border-white/10">
    <div class="absolute inset-0 bg-[#8fc74a] pointer-events-none z-0"></div>
    <div class="relative z-10 flex items-center justify-center gap-2 sm:gap-6 h-full text-xs font-medium text-white">

        @foreach($serviceTypes as $st)
        <!-- Horizental Nav as top -->
        <div class="relative group h-full flex items-center">
            <a href="{{ $st['url'] ?? '#' }}" class="h-full px-3 flex items-center gap-2 hover:text-white/80 hover:bg-[#F79633] transition-colors duration-200 cursor-pointer">
                @if(!empty($st['icon']))
                <i class="{{ $st['icon'] }} text-base"></i>
                @elseif(!empty($st['images']))
                <img class="h-5 w-5 object-contain" loading="lazy" src="{{ $st['images'] }}" alt="{{ $st['name'] }}">
                @else
                <i class="fa-solid fa-layer-group text-sm"></i>
                @endif
                <span class="text-base font-semibold text-white  ">{{ $st['name'] }}</span>
                <!-- <i class="fa-solid fa-chevron-down text-[8px] opacity-70 group-hover:rotate-180 transition-transform duration-200"></i> -->
            </a>
            <!-- Second nav -->
            <div class="fixed left-0 right-0 top-[140px] hidden group-hover:block z-50 w-screen bg-white border-b border-gray-200 shadow-xl text-gray-800 transition-all duration-200">
                <div class="max-w-7xl mx-auto flex max-h-[500px] min-h-[300px]">
                    {{-- Sidebar --}}
                    <aside class="w-2/6 bg-slate-50 border-r border-[#8fc74a] p-3 flex flex-col gap-1">
                        <p
                            class="type-nav text-left px-3 py-1.5 rounded-lg text-xs text-justify sm:text-sm 
                            text-gray-700 transition">
                            {!! nl2br(e($st['desc'])) !!}
                        </p>
                    </aside>
                    <main class="w-3/6 p-3 sm:p-4 bg-white overflow-y-auto">
                        <div id="#"
                            class="w-full  h-full  md:h-full relative overflow-hidden flex-shrink-0">
                            <div class="slide absolute inset-0 transition-opacity duration-1000">

                                <!-- Background with Dynamic Zoom Class Container -->
                                <div class="w-full h-full overflow-hidden">
                                    <img
                                        src="{{$st['images']}}"
                                        class="w-full h-full object-cover  wallpaper-infinite">
                                </div>
                            </div>
                            <button id="prevSlide" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 transition backdrop-blur text-[#8fc74a] w-6 h-6 rounded-full z-20">❮</button>
                            <button id="nextSlide" class="absolute right-2 top-1/2 -translate-y-1/2 bg-[white]/20 hover:bg-white/40 transition backdrop-blur text-[#8fc74a] w-6 h-6 rounded-full z-20">❯</button>
                            <div id="dots" class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2 z-20"></div>
                        </div>
                    </main>
                    <aside class="w-1/6 bg-slate-50 border-l border-[#8fc74a] p-3 flex flex-col gap-1">
                        @foreach($st['types'] as $type)
                        <button type="button"
                            onclick="showType(`{{ $type['name'] }}`)"
                            class="type-nav text-left px-3 py-1.5 rounded-lg text-sm sm:text-base font-medium
                                   text-gray-700 hover:bg-[#8fc74a]/10 hover:text-[#8fc74a] transition">
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
<script>
    function showType(type) {
        document.querySelectorAll('.type-content').forEach(el => {
            el.classList.add('hidden');
        });

        document.querySelector(`#type-${type}`)?.classList.remove('hidden');

        document.querySelectorAll('.type-nav').forEach(el => {
            el.classList.remove('bg-[#8fc74a]', 'text-white');
            el.classList.add('text-gray-700');
        });

        event.currentTarget.classList.add('bg-[#8fc74a]', 'text-white');
        event.currentTarget.classList.remove('text-gray-700');
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('.type-nav')?.click();
    });
</script>
<section class="w-full border h-auto md:h-[400px] lg:h-[70vh] relative flex flex-col md:flex-row max-w-full">

    <!-- Right Side: Content Container (100% on mobile, 30% on desktop) -->
    <div class="w-full md:w-[30%] h-auto md:h-full flex flex-col justify-center bg-gradient-to-br from-brand-green/10 via-transparent to-brand-orange/10 items-center text-center p-6 z-10 bg-white border-t md:border-t-0 md:border-l order-2 md:order-1">
        <h1 class="flex flex-col gap-2 w-full max-w-xs md:max-w-full">
            <!-- Line 1: Primary Title Text -->
            <span class="text-xl sm:text-2xl md:text-2xl lg:text-8xl font-bold uppercase text-[#8fc74a] leading-tight break-words">
                {{ __('app.internet.title') }}
            </span>
        </h1>

        <!-- Feature Keywords -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 pt-6 w-full max-w-xs md:max-w-full">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xl font-semibold text-[#F79633] border border-[#8fc74a]/30 shadow-xs transition-all duration-200 hover:scale-105">
                {{__('app.internet.fast')}}
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xl font-semibold bg-[#F79633]/10 text-[#F79633] border border-[#F79633]/30 shadow-xs transition-all duration-200 hover:scale-105">
                {{__('app.internet.reliable')}}
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xl font-semibold text-[#F79633] border border-[#8fc74a]/30 shadow-xs transition-all duration-200 hover:scale-105">
                {{__('app.internet.stable')}}
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xl font-semibold bg-[#F79633]/10 text-[#F79633] border border-[#F79633]/30 shadow-xs transition-all duration-200 hover:scale-105">
                {{__('app.internet.scalable')}}
            </span>
        </div>
    </div>

    <!-- Left/Main Side: Slider (100% on mobile, 70% on desktop) -->
    <div class="slider w-full md:w-[70%] h-[200px] sm:h-[260px] md:h-full relative overflow-hidden order-1 md:order-2">
        @foreach($images as $slug)
        <div class="slide absolute inset-0 transition-opacity duration-1000">
            <!-- Background with Dynamic Zoom Class Container -->
            <div class="w-full h-full overflow-hidden">
                <img
                    src="{{ $slug['image'] }}"
                    class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0"></div>
        </div>
        @endforeach

        <button class="prevSlide absolute left-5 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 transition backdrop-blur text-[#8fc74a] w-12 h-12 rounded-full z-20 flex items-center justify-center">❮</button>
        <button class="nextSlide absolute right-5 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 transition backdrop-blur text-[#8fc74a] w-12 h-12 rounded-full z-20 flex items-center justify-center">❯</button>
        <div class="dots absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2 z-20"></div>
    </div>

</section>
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
                <div class="mt-10 grid grid-cols-2 gap-6 max-w-md">
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

            <div class="slider w-full md:col-span-1 h-[200px] sm:h-[260px] md:h-full relative overflow-hidden order-1 md:order-2">
                @foreach($images1 as $slug)
                <div class="slide absolute inset-0 transition-opacity duration-1000">
                    <div class="w-full h-full overflow-hidden">
                        <img
                            src="{{ $slug['image'] }}"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="absolute inset-0"></div>
                </div>
                @endforeach

                <button class="prevSlide absolute left-5 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 transition backdrop-blur text-[#8fc74a] w-12 h-12 rounded-full z-20 flex items-center justify-center">
                    ❮
                </button>

                <button class="nextSlide absolute right-5 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 transition backdrop-blur text-[#8fc74a] w-12 h-12 rounded-full z-20 flex items-center justify-center">
                    ❯
                </button>

                <div class="dots absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2 z-20"></div>
            </div>

        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch max-w-7xl mx-auto min-h-[500px] lg:h-[500px]">
        <!-- Left Column: 50% Main Image -->
        <div class="w-full col-span-1 h-[400px] lg:h-full rounded-2xl overflow-hidden shadow-xl shadow-[#8fc74a]/10 bg-gray-100 flex-shrink-0 transition-all duration-300 hover:scale-95 ease-out">
            <img src="{{$cdnImage}}" alt="Main Image" class="w-full h-full object-cover" />
        </div>

        <!-- Right Column: 50% Content & Images -->
        <div data-animate="fade-up" class="flex flex-col col-span-2 justify-between h-full space-y-6 overflow-hidden ">
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
    <div id="plans" class="relative max-w-7xl mx-auto px-6 lg:px-8 pb-24">
        <div class="text-center max-w-2xl mx-auto mb-12">
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
        ['name' => 'Business', 'speed' => '800', 'price' => '$65', 'popular' => false],
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