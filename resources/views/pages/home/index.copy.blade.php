@extends('layouts.app')

@section('content')
<section class="w-full border h-[400px] lg:h-screen relative overflow-hidden">
    <!-- Background Image -->
    <img src="{{asset('images/home/bgImage/BgImage1.png')}}" alt="Hero Image" class="w-full h-full object-cover" />

    <!-- Content Container -->
    <div class="absolute inset-0 flex flex-col justify-start items-center text-center px-4 z-10 mt-24">
        <h1 class="flex flex-col gap-2 max-w-4xl">
            <!-- Line 1: Primary Color (#8fc74a) -->
            <span class="text-2xl sm:text-4xl md:text-5xl font-semibold uppercase tracking-wider text-[#8fc74a]">
                {{ __('app.hero.title') }}
            </span>

            <!-- Line 2: Secondary Color (#F79633) -->
            <span class="text-4xl sm:text-6xl md:text-7xl font-black text-[#F79633] leading-tight">
                {{ __('app.hero.highlight') }}
            </span>
        </h1>
    </div>
</section>
<section class="relative overflow-hidden pt-12 lg:pt-12 section-bg-primary">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-8 space-y-6 text-center lg:text-left">


                <h1 class="text-3xl sm:text-5xl font-black leading-tight tracking-normal text-adaptive-main lg:leading-snug">
                    <span>{{ __('app.hero.title') }}</span>
                    <span class="text-transparent bg-clip-text gradient-brand">{{ __('app.hero.highlight') }}</span>
                </h1>

                <div class="space-y-3">
                    <p class="text-[#444] dark:text-[#444] text-justify text-md leading-[1.5] max-w-3xl">
                        {{ __('app.hero.desc') }}
                    </p>
                    <p class="text-[#444] dark:text-[#444] text-justify text-md leading-[1.5] max-w-3xl">
                        {{ __('app.hero.desc1') }}
                    </p>
                </div>

                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                    <button onclick="openModal('serviceModal')"
                        class="gradient-brand hover:from-brand-green-hover hover:to-brand-orange-hover text-white font-bold px-7 py-3.5 rounded-xl shadow-lg shadow-brand-green/20 transition-all duration-200 hover:-translate-y-0.5 flex items-center gap-2">
                        <span>{{ __('app.hero.cta_primary') }}</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                    <a href="{{route('services')}}"
                        class="glass-card text-adaptive-main font-semibold px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 transition-all duration-200 hover:-translate-y-0.5 flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-brand-orange"></i>
                        <span>{{ __('app.hero.cta_secondary') }}</span>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5"></div>
        </div>
    </div>
</section>

<div class="text-center max-w-3xl mx-auto py-8">
    <h2 class="text-2xl sm:text-3xl font-extrabold text-center text-transparent bg-clip-text gradient-brand">
        {{ __('app.hero.difference') }}
    </h2>
</div>
{{-- ===== SERVICES SECTION — visible, image-based cards ===== --}}
<section id="services" class="py-8 section-bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
        $isKm = app()->getLocale() === 'km';
        $serviceCards = [
        ['image' => '/images/home/mission/High_Speed.png', 'badge' => 'High Speed', 'badge_km' => 'ល្បឿនលឿន', 'desc_en' => 'Experience lightning-fast internet connectivity designed for seamless streaming, business productivity, and everyday digital experiences with stable speeds, advanced technology, and reliable performance that keeps you connected anytime, anywhere.', 'desc_km' => 'ទទួលបានបទពិសោធន៍នៃការតភ្ជាប់អ៊ីនធឺណិតដែលមានល្បឿនលឿនបំផុត ដែលត្រូវបានរចនាឡើងសម្រាប់ការផ្សាយវីដេអូ (streaming) ប្រកបដោយភាពរលូន ការបង្កើនផលិតភាពការងារ និងសកម្មភាពឌីជីថលប្រចាំថ្ងៃ។ ជាមួយនឹងល្បឿនដ៏នឹងនរ បច្ចេកវិទ្យាទំនើប និងដំណើរការប្រកបដោយគុណភាពខ្ពស់ សេវាកម្មនេះធានាថាអ្នកអាចរក្សាការតភ្ជាប់បានគ្រប់ពេលវេលា និងគ្រប់ទីកន្លែង។'],
        ['image' => '/images/home/mission/Scalable.png', 'badge' => 'Scalable', 'badge_km' => 'មានសក្តានុពលក្នុងការពង្រីក', 'desc_en' => 'Building a future-ready network infrastructure that grows with your needs, providing flexible, secure, and high-performance solutions to support businesses, organizations, and communities with reliable connectivity and innovation.', 'desc_km' => 'ការកសាងហេដ្ឋារចនាសម្ព័ន្ធបណ្តាញដែលត្រៀមខ្លួនរួចជាស្រេចសម្រាប់អនាគត និងអាចពង្រីកបានស្របតាមតម្រូវការរបស់អ្នក ព្រមទាំងផ្តល់ជូននូវដំណោះស្រាយដែលមានភាពបត់បែន សុវត្ថិភាព និងប្រសិទ្ធភាពខ្ពស់ ដើម្បីគាំទ្រដល់អាជីវកម្ម អង្គភាព និងសហគមន៍ តាមរយៈការតភ្ជាប់ប្រកបដោយទំនុកចិត្ត និងនវានុវត្តន៍'],
        ['image' => '/images/home/mission/Experience.png', 'badge' => 'Best Experience', 'badge_km' => 'បទពិសោធន៍ល្អបំផុតសម្រាប់អតិថិជន', 'desc_en' => 'Our dedicated hotline service and professional customer support team are always ready to assist, ensuring quick solutions, friendly guidance, and a smooth experience whenever you need help.', 'desc_km' => 'សេវាកម្មទូរស័ព្ទបន្ទាន់ (Hotline) និងក្រុមការងារជំនាញផ្នែកសេវាបម្រើអតិថិជនរបស់យើង តែងតែត្រៀមខ្លួនជានិច្ចដើម្បីផ្តល់ជំនួយ ដោយធានាបាននូវដំណោះស្រាយរហ័ស ការណែនាំប្រកបដោយភាពរួសរាយរាក់ទាក់ និងបទពិសោធន៍ដ៏រលូន នៅពេលណាដែលលោកអ្នកត្រូវការជំនួយ។'],
        ['image' => '/images/home/mission/Reliable.png', 'badge' => 'Reliable', 'badge_km' => 'ផ្តល់ឲ្យអតថិជននូវទំនុកចិត្តខ្ពស់', 'desc_en' => 'Delivering dependable network operations through advanced monitoring, proactive maintenance, and modern technology to ensure continuous availability, strong performance, and uninterrupted connectivity for every customer.', 'desc_km' => 'ផ្តល់ជូននូវប្រតិបត្តិការបណ្តាញប្រកបដោយភាពជឿជាក់ តាមរយៈការត្រួតពិនិត្យកម្រិតខ្ពស់ ការថែទាំបែបបង្ការ និងបច្ចេកវិទ្យាទំនើប ដើម្បីធានាបាននូវលទ្ធភាពប្រើប្រាស់ជាប្រចាំ សមត្ថភាពដំណើរការដ៏រឹងមាំ និងការតភ្ជាប់ដែលមិនមានការរំខានសម្រាប់អតិថិជនគ្រប់រូប។'],
        ['image' => '/images/home/mission/QualityAndSave.png', 'badge' => 'Quality & Saving', 'badge_km' => 'គុណភាពល្អនិង​ សន្សំសំចៃ', 'desc_en' => 'Providing exceptional customer service through trust, dedication, and personalized solutions, ensuring every customer receives professional support, reliable assistance, and a satisfying experience throughout their digital journey.', 'desc_km' => 'ផ្តល់សេវាកម្មអតិថិជនដ៏ល្អឥតខ្ចោះតាមរយៈការកសាងទំនុកចិត្ត ការយកចិត្តទុកដាក់ខ្ពស់ និងដំណោះស្រាយដែលត្រូវបានរៀបចំឡើងស្របតាមតម្រូវការជាក់លាក់របស់អតិថិជនម្នាក់ៗ ដោយធានាថាអតិថិជនទាំងអស់ទទួលបានការគាំទ្រប្រកបដោយវិជ្ជាជីវៈ ការជួយជ្រោមជ្រែងដែលអាចទុកចិត្តបាន និងបទពិសោធន៍ដ៏ពេញចិត្តពេញមួយដំណើរការនៃការប្រើប្រាស់សេវាកម្មឌីជីថលរបស់ពួកគេ។'],
        ['image' => '/images/home/mission/Contribute.png', 'badge' => 'Contribute', 'badge_km' => 'រួមចំណែកសំខាន់ក្នុងការអភិវឌ្ឍន៍សង្គម', 'desc_en' => "Committed to creating a better-connected society by supporting communities, promoting digital access, and using technology to empower people, businesses, and organizations for a brighter and smarter future.", 'desc_km' => 'ប្តេជ្ញាចិត្តក្នុងការកសាងសង្គមដែលមានការតភ្ជាប់កាន់តែប្រសើរឡើង តាមរយៈការគាំទ្រសហគមន៍ ការលើកកម្ពស់លទ្ធភាពទទួលបានសេវាឌីជីថល និងការប្រើប្រាស់បច្ចេកវិទ្យាដើម្បីពង្រឹងសមត្ថភាពប្រជាជន អាជីវកម្ម និងស្ថាប័ននានា ឆ្ពោះទៅរកអនាគតដ៏ភ្លឺស្វាង និងឆ្លាតវៃ។'],
        ];
        @endphp

        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- 3-Column Grid Container -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($serviceCards as $re)
                <div class="flex flex-col rounded-xl overflow-hidden shadow-sm border border-slate-200/100 bg-white hover:shadow transition group">
                    <!-- 1. Top Image Banner -->
                    <div class="w-full h-32 sm:h-56 overflow-hidden bg-slate-100 relative ">
                        <a href="">
                            <img loading="lazy"
                                src="{{asset($re['image'])}}"
                                alt=""
                                class="w-full shrink-0 h-full object-cover group-hover:scale-105 transition duration-300" />
                        </a>
                    </div>
                    <a
                        href=""
                        class="p-4 relative flex flex-col justify-between flex-1 cursor-pointer transition ">

                        <div>
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex items-start space-x-3 min-w-0">
                                    <div class="min-w-0">
                                        <div class="font-bold text-xl text-[#8fc74a] group-hover:text-[#8fc74a] transition truncate uppercase ">
                                            {{ $isKm ? $re['badge_km'] : $re['badge'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 flex items-center  flex-wrap">
                                <span class="text-sm  rounded-md  text-justify !leading-relaxed ">
                                    {{ $isKm ? $re['desc_km'] : $re['desc_en'] }}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<div class="text-center w-full max-w-3xl mx-auto py-8">
    <h2 class="w-full text-2xl sm:text-3xl font-extrabold text-center text-transparent bg-clip-text gradient-brand">
        {{ __('app.hero.core-product') }}
    </h2>
</div>
<section id="core-product" class="py-8 section-bg-primary relative overflow-hidden">

    <!-- Subtle Background Tech Glow -->
    <div class="absolute inset-0 bg-radial from-blue-900/30 via-transparent to-transparent pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

        <!-- 3-Column Responsive Grid -->
        <div id="card-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-12">
            @foreach($servicesSlugs as $slug)
            <!-- Item 1 -->
            <div class="product-card flex items-start space-x-4 p-2 rounded-2xl ">
                <div>
                    <div class="flex items-center space-x-1 mb-2">
                        <div class="flex-shrink-0">
                            <img src="{{ Storage::url($slug->image) }}" alt="IP Transit Icon" class="w-10 h-10 object-contain" />
                        </div>
                        <h3 class="text-xl tracking-wide text-[#8fc74a] font-bold bg-brand-green/10 px-2.5 py-1/2 rounded">{{$currentLocale==="en"?$slug->name:$slug->name_km}} </h3>
                    </div>
                    <div class="text-[#444] text-justify text-sm  mb-1 line-clamp-4 max-w-prose">
                        {!! $currentLocale==="en"?$slug->desc:$slug->desc_km !!}
                    </div>
                    <a href="#" class="text-[#F79633] underline hover:font-bold text-sm transition-colors">{{__('app.hero.readmore')}} &gt;&gt;</a>
                </div>
            </div>

            <!-- Duplicate your product cards here (up to 18, 27, etc.) -->
            <!-- Ensure each card includes the class "product-card" -->
            @endforeach
        </div>

        <!-- Custom Pagination Controls -->
        <div class="mt-12 flex items-center justify-center space-x-2">
            <button id="prev-btn" class="px-4 py-1 rounded-lg bg-gray-500 text-white font-medium hover:bg-gray-700 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                &laquo; Previous
            </button>

            <!-- Dynamic Page Numbers Container -->
            <div id="pagination-numbers" class="flex items-center space-x-2"></div>

            <button id="next-btn" class="px-4 py-1 rounded-lg bg-gray-500 text-white font-medium hover:bg-gray-700 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                Next &raquo;
            </button>
        </div>

    </div>
</section>
<div class="text-center space-y-1 max-w-2xl mx-auto pt-8">
    <h2 class="sm:text-3xl font-extrabold text-center text-transparent bg-clip-text gradient-brand">
        {{__('app.coverage.available')}}
    </h2>
</div>

<section id="coverage" class="py-16 px-4 sm:px-6 lg:px-8 font-sans text-slate-100">
    <div class="max-w-7xl mx-auto space-y-8 " x-data="coverageChecker()" x-init="init()">
        <!-- Search & Control Card -->
        <div class="bg-white backdrop-blur-md border border-orange-300 rounded-xl p-4 sm:p-6 shadow-md">
            <form @submit.prevent="checkCoverage()" class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        x-model="searchQuery"
                        placeholder="Enter City, District, Zip Code, or Lat,Lng..."
                        class="w-full pl-10 pr-4 py-1 border border-gray-200 rounded-lg text-black placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-[#8FC74A] focus:border-transparent transition-all text-sm" />
                </div>

                <button
                    type="submit"
                    class="bg-[#8FC74A] hover:bg-[#7db53d] text-white  px-6 py-1 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2 text-sm shrink-0"
                    :disabled="isLoading">
                    <template x-if="!isLoading">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <span>CHECK LOCATION</span>
                        </div>
                    </template>
                    <button
                        type="button"
                        @click="resetMap()"
                        class="bg-slate-600 hover:bg-slate-700 text-white  px-5 py-1 rounded-lg transition text-sm">
                        RESET
                    </button>
                    <template x-if="isLoading">
                        <span class="inline-block animate-spin border-2 border-slate-950 border-t-transparent rounded-full w-4 h-4"></span>
                    </template>
                </button>
            </form>
            <div x-show="distance !== null" x-cloak class="mt-3 p-3 bg-slate-50 border border-slate-200 rounded-lg text-sm">
                <div class="flex justify-between items-center">
                    <span class="text-slate-500">Distance to nearest branch</span>
                    <strong class="text-[#8FC74A]" x-text="distance != null ? distance.toFixed(2) + ' km' : ''"></strong>
                </div>
            </div>
            <div class="mt-4 flex flex-wrap items-center gap-2 text-xs text-slate-400" x-show="presetRegions.length > 0">
                <span class="text-lg font-bold text-[#8FC74A]">Popular regions:</span>
                <template x-for="branch in presetRegions" :key="branch.id || branch.name_en">
                    <button
                        type="button"
                        @click="selectRegion(branch)"
                        class="px-2.5 py-2 bg-gray-500 hover:bg-[#8FC74A] rounded shadow-md text-white text-md transition transform hover:-translate-y-0.5"
                        x-text="branch.name_en"></button>
                </template>
            </div>

            <!-- Result Banner -->
            <div x-show="status !== null" x-cloak class="mt-4 pt-4 border-t border-slate-700/60">
                <div x-show="status === 'available'" class="p-3 bg-[#8FC74A]/10 border border-[#8FC74A]/40 rounded-lg flex items-center justify-between text-[#8FC74A] text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#8FC74A] animate-pulse"></span>
                        <span>Great news! High-speed service is fully active in <strong x-text="searchedLocation" class="text-[#8FC74A] bold"></strong>.</span>
                    </div>
                    <span class="text-xs bg-[#8FC74A]/20 text-[#8FC74A] px-2 py-0.5 rounded font-mono font-medium">Ready</span>
                </div>

                <div x-show="status === 'planned'" class="p-3 bg-amber-500/10 border border-amber-500/30 rounded-lg flex items-center justify-between text-amber-400 text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                        <span>Expansion scheduled! Coverage is coming soon to <strong x-text="searchedLocation" class="text-white"></strong>.</span>
                    </div>
                    <span class="text-xs bg-amber-500/20 px-2 py-0.5 rounded font-mono font-medium">Q3 2026</span>
                </div>

                <div x-show="status === 'unavailable'" class="p-3 bg-rose-500/10 border border-rose-500/30 rounded-lg flex items-center justify-between text-rose-400 text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                        <span>Service is currently unavailable in <strong x-text="searchedLocation" class="text-white"></strong>.</span>
                    </div>
                    <button class="text-xs underline hover:text-rose-300 font-medium">Request Expansion</button>
                </div>
            </div>
        </div>

        <!-- Map & Legend Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- Real Leaflet Map, markers loaded from a route -->
            <div class="lg:col-span-3 border border-orange-200 shadow rounded-xl overflow-hidden relative min-h-[500px]">
                <div id="coverage-map" x-ref="mapEl" class="absolute inset-0 z-0"></div>

                <!-- Loading Spinner -->
                <div id="spinner" class="hidden absolute inset-0 bg-white/60 flex items-center justify-center z-[500]">
                    <span class="inline-block animate-spin border-4 border-[#8FC74A] border-t-transparent rounded-full w-8 h-8"></span>
                </div>

                <!-- Floating Quick Map Legend -->
                <div class="absolute bottom-4 left-4 bg-white backdrop-blur-md border border-green-400 rounded-lg p-3 text-xs space-y-2 z-[400] shadow-lg">
                    <div class="font-semibold text-gray-400 mb-1">Coverage Status</div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded bg-[#8FC74A] border border-[#8FC74A]/80"></span>
                        <span class="text-gray-400">Active Service</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded bg-amber-500/60 border border-amber-400"></span>
                        <span class="text-gray-400">Planned Expansion</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded bg-slate-600/40 border border-slate-500"></span>
                        <span class="text-slate-400">Under Review</span>
                    </div>
                </div>
            </div>

            <!-- Side Stats & Details -->
            <div class="space-y-4">
                <div class="bg-white border border-orange-200 rounded-xl p-4">
                    <h3 class="text-sm font-semibold text-[#8fc74a] mb-3">Network Highlights</h3>
                    <ul class="space-y-3 text-xs text-slate-300">
                        <li class="flex justify-between pb-2 border-b border-slate-700/50">
                            <span class="text-gray-400 font-bold">Avg. Latency</span>
                            <span class="font-semibold text-[#8FC74A]" x-text="avgLatency">---</span>
                        </li>
                        <li class="flex justify-between pb-2 border-b border-slate-700/50">
                            <span class="text-gray-400 font-bold">Network Uptime</span>
                            <span class="font-semibold text-[#8FC74A]" x-text="networkUptime">---</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400 font-bold">Total Covered Zones</span>
                            <span class="font-semibold text-[#8FC74A]" x-text="totalZones">---</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white border border-gray-300 shadow-lg rounded-xl p-4 text-xs space-y-2">
                    <div class="font-semibold text-[#8FC74A]">Need Custom Deployment?</div>
                    <p class="text-slate-300">
                        For dedicated business lines or unlisted regions, submit a direct inquiry to our infrastructure team.
                    </p>
                    <a href="#" class="inline-block text-[#8FC74A] font-semibold hover:underline pt-1">Contact Infrastructure →</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function coverageChecker() {
        return {

            /* ================= STATE ================= */

            searchQuery: '',
            searchedLocation: '',
            isLoading: false,

            status: null,
            distance: null,
            nearestBranch: null,

            totalZones: '---',
            avgLatency: '---',
            networkUptime: '---',

            presetRegions: [],

            map: null,
            markers: null,
            branchZones: null,
            searchMarker: null,
            allMarkers: [],
            layerControl: null,
            searchIcon: null,

            defaultCenter: [12.5657, 104.9910],
            defaultZoom: 7,

            /* Coverage radius: 40 KM from branch */
            coverageKm: 40,


            /* ================= INITIALIZE ================= */

            init() {
                this.$nextTick(() => this.initMap());
                this.$el.addEventListener('alpine:destroy', () => this.destroyMap());
            },


            /* ================= INITIALIZE MAP ================= */

            initMap() {
                const el = this.$refs.mapEl;
                if (!el) return;

                /* Remove previous map */
                if (this.map) {
                    this.map.remove();
                    this.map = null;
                }

                /* Prevent Leaflet duplicate initialization */
                if (el._leaflet_id) {
                    el._leaflet_id = null;
                    el.innerHTML = '';
                }

                /*
                 * Create map
                 * scrollWheelZoom: 'center' keeps zoom anchored to the map
                 * center instead of the cursor, so scrolling near a marker
                 * or popup no longer makes the map jump/conflict with it.
                 * zoomSnap/zoomDelta/wheelPxPerZoomLevel soften each
                 * scroll step so zooming feels smoother and less abrupt.
                 */
                this.map = L.map(el, {
                    scrollWheelZoom: 'center',
                    zoomSnap: 0.5,
                    zoomDelta: 0.5,
                    wheelPxPerZoomLevel: 100,
                    zoomControl: true,
                    doubleClickZoom: true,
                    dragging: true,
                    touchZoom: true
                }).setView(this.defaultCenter, this.defaultZoom);


                /* SEARCH ICON */
                this.searchIcon = L.icon({
                    iconUrl: '{{ asset("images/map/MAP.png") }}',
                    shadowUrl: '{{ asset("images/map/marker-shadow.png") }}',
                    iconSize: [30, 50],
                    iconAnchor: [15, 50],
                    popupAnchor: [0, -50]
                });


                /* BASE MAPS */
                const osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; OpenStreetMap contributors'
                });

                const googleStreet = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    attribution: '&copy; Google'
                });

                const googleSatellite = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    attribution: '&copy; Google'
                });

                const googleHybrid = L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    attribution: '&copy; Google'
                });

                /* Default map */
                osm.addTo(this.map);


                /* COVERAGE MARKERS */
                this.markers = L.markerClusterGroup();
                this.map.addLayer(this.markers);


                /* COVERAGE ZONES */
                this.branchZones = L.layerGroup();
                this.map.addLayer(this.branchZones);


                /* LAYER CONTROL */
                this.layerControl = L.control.layers({
                    'OpenStreetMap': osm,
                    'Google Streets': googleStreet,
                    'Google Satellite': googleSatellite,
                    'Google Hybrid': googleHybrid
                }, {
                    'Coverage Markers': this.markers,
                    '40 KM Coverage Zones': this.branchZones
                }, {
                    collapsed: true,
                    position: 'topright'
                }).addTo(this.map);


                /* LOAD DATA */
                this.loadMarkers();
            },


            /* ================= DESTROY MAP ================= */

            destroyMap() {
                if (this.map) this.map.remove();
                this.map = null;
                this.markers = null;
                this.branchZones = null;
                this.searchMarker = null;
                this.layerControl = null;
                this.allMarkers = [];
            },


            /* ================= BRANCH POPUP ================= */

            createBranchPopup(item) {
                const name = item.name_en || item.name || 'Unknown Location';
                const status = item.status || 'Unknown';
                const isAvailable = status.toLowerCase() === 'available';
                const lat = parseFloat(item.lat);
                const lng = parseFloat(item.lng);

                return `
                <div class="coverage-popup">
                    <div class="coverage-popup-header">
                        <div class="coverage-popup-title">${name}</div>
                        <div class="coverage-status ${isAvailable ? 'available' : 'unavailable'}">
                            <span class="coverage-status-dot"></span>
                            ${status}
                        </div>
                    </div>
                    <div class="coverage-popup-body">
                        <div class="coverage-info-row">
                            <span class="coverage-info-label">Latitude</span>
                            <span class="coverage-info-value">${lat != null && !isNaN(lat) ? lat.toFixed(6) : '-'}</span>
                        </div>
                        <div class="coverage-info-row">
                            <span class="coverage-info-label">Longitude</span>
                            <span class="coverage-info-value">${lng != null && !isNaN(lng) ? lng.toFixed(6) : '-'}</span>
                        </div>
                    </div>
                    <div class="coverage-popup-footer">
                        <div class="coverage-radius">
                            <div class="coverage-radius-icon">◉</div>
                            <div>
                                <div style="font-weight:600;color:#334155;">Coverage Zone</div>
                                <div>${this.coverageKm} km radius</div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            },


            /* ================= COVERAGE ZONE POPUP ================= */

            createZonePopup(branch) {
                return `
                <div class="coverage-popup">
                    <div class="coverage-popup-header">
                        <div class="coverage-popup-title">${branch.name_en}</div>
                        <div class="coverage-status available">
                            <span class="coverage-status-dot"></span>
                            Coverage
                        </div>
                    </div>
                    <div class="coverage-popup-body">
                        <div class="coverage-info-row">
                            <span class="coverage-info-label">Coverage Radius</span>
                            <span class="coverage-info-value">${this.coverageKm} km</span>
                        </div>
                        <div class="coverage-info-row">
                            <span class="coverage-info-label">Coverage Area</span>
                            <span class="coverage-info-value">${this.coverageKm * 2} × ${this.coverageKm * 2} km</span>
                        </div>
                        <div class="coverage-info-row">
                            <span class="coverage-info-label">Branch Latitude</span>
                            <span class="coverage-info-value">${branch.lat != null ? branch.lat.toFixed(6) : '-'}</span>
                        </div>
                        <div class="coverage-info-row">
                            <span class="coverage-info-label">Branch Longitude</span>
                            <span class="coverage-info-value">${branch.lng != null ? branch.lng.toFixed(6) : '-'}</span>
                        </div>
                    </div>
                    <div class="coverage-popup-footer">
                        <div class="coverage-radius">
                            <div class="coverage-radius-icon">◉</div>
                            <div>
                                <div style="font-weight:600;color:#334155;">TELNET Coverage Zone</div>
                                <div>Service coverage around this branch</div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            },


            /* ================= SEARCH RESULT POPUP ================= */

            createSearchPopup(lat, lng, name, nearest) {
                const insideCoverage = nearest && nearest.distance <= this.coverageKm;

                return `
                <div class="coverage-popup">
                    <div class="coverage-popup-header">
                        <div class="coverage-popup-title">${name || 'Selected Location'}</div>
                        <div class="coverage-status ${insideCoverage ? 'available' : 'unavailable'}">
                            <span class="coverage-status-dot"></span>
                            ${insideCoverage ? 'Covered' : 'Not Covered'}
                        </div>
                    </div>
                    <div class="coverage-popup-body">
                        <div class="coverage-info-row">
                            <span class="coverage-info-label">Latitude</span>
                            <span class="coverage-info-value">${lat != null && !isNaN(lat) ? lat.toFixed(6) : '-'}</span>
                        </div>
                        <div class="coverage-info-row">
                            <span class="coverage-info-label">Longitude</span>
                            <span class="coverage-info-value">${lng != null && !isNaN(lng) ? lng.toFixed(6) : '-'}</span>
                        </div>
                        ${nearest ? `
                            <div class="coverage-info-row">
                                <span class="coverage-info-label">Nearest Branch</span>
                                <span class="coverage-info-value">${nearest.name_en}</span>
                            </div>
                            <div class="coverage-info-row">
                                <span class="coverage-info-label">Distance</span>
                                <span class="coverage-info-value ${insideCoverage ? 'distance-good' : 'distance-bad'}">
                                    ${nearest.distance != null ? nearest.distance.toFixed(2) : '-'} km
                                </span>
                            </div>
                        ` : ''}
                    </div>
                    <div class="coverage-result ${insideCoverage ? 'coverage-result-good' : 'coverage-result-bad'}">
                        <div class="coverage-result-icon">${insideCoverage ? '✓' : '!'}</div>
                        <div>
                            <div class="coverage-result-title">${insideCoverage ? 'Service Available' : 'Outside Coverage'}</div>
                            <div class="coverage-result-text">
                                ${insideCoverage
                                    ? `This location is within the ${this.coverageKm} km coverage zone.`
                                    : `This location is outside the nearest ${this.coverageKm} km coverage zone.`}
                            </div>
                        </div>
                    </div>
                </div>
            `;
            },


            /* ================= LOAD MARKERS ================= */

            loadMarkers() {
                $('#spinner').removeClass('hidden');

                $.get('{{ route("coverage.data") }}')

                    .done(response => {
                        if (!this.map) return;

                        /* Clear old data */
                        this.markers.clearLayers();
                        this.branchZones.clearLayers();
                        this.allMarkers = [];

                        /* Branch data */
                        const branches = response.branches || response.data || [];

                        /* Popular regions (now also carries avg_latency / uptime) */
                        this.presetRegions = branches
                            .filter(item => item.lat != null && item.lng != null)
                            .map(item => ({
                                id: item.id,
                                name_en: item.name_en || item.name || '',
                                name_km: item.name_km || '',
                                lat: parseFloat(item.lat),
                                lng: parseFloat(item.lng),
                                status: item.status || null,
                                avg_latency: item.avg_latency ?? null,
                                uptime: item.uptime ?? null
                            }))
                            .filter(item => !isNaN(item.lat) && !isNaN(item.lng));


                        /* ICONS */
                        const activeIcon = L.icon({
                            iconUrl: '{{ asset("images/map/MAP.png") }}',
                            shadowUrl: '{{ asset("images/map/marker-shadow.png") }}',
                            iconSize: [30, 50],
                            iconAnchor: [15, 50],
                            popupAnchor: [0, -50]
                        });

                        const inactiveIcon = L.icon({
                            iconUrl: '{{ asset("images/map/MAP_INACTIVE.png") }}',
                            shadowUrl: '{{ asset("images/map/marker-shadow.png") }}',
                            iconSize: [30, 50],
                            iconAnchor: [15, 50],
                            popupAnchor: [0, -50]
                        });


                        /* COVERAGE DATA */
                        const coverageData = response.data || [];

                        coverageData.forEach(item => {
                            const lat = parseFloat(item.lat);
                            const lng = parseFloat(item.lng);
                            if (isNaN(lat) || isNaN(lng)) return;

                            const name = item.name_en || item.name || '';
                            const status = item.status || 'Unknown';

                            /* Marker */
                            const marker = L.marker([lat, lng], {
                                icon: status === 'Available' ? activeIcon : inactiveIcon
                            });

                            marker.regionName = name;
                            marker.regionStatus = status;

                            /* Popup */
                            marker.bindPopup(this.createBranchPopup(item), {
                                className: 'coverage-popup-container',
                                maxWidth: 340,
                                minWidth: 260,
                                closeButton: true,
                                autoPan: true
                            });

                            /* Add marker */
                            this.markers.addLayer(marker);
                            this.allMarkers.push(marker);
                        });

                        /* Create branch zones */
                        this.createBranchZones();

                        /* Total */
                        if (response.total != null) {
                            this.totalZones = response.total;
                        }
                    })

                    .fail(xhr => {
                        console.error('Coverage data error:', xhr.responseJSON || xhr);
                    })

                    .always(() => {
                        $('#spinner').addClass('hidden');
                    });
            },


            /* ================= CREATE 40 KM COVERAGE ZONES ================= */

            createBranchZones() {
                if (!this.branchZones) return;

                this.branchZones.clearLayers();

                const km = this.coverageKm;

                this.presetRegions.forEach(branch => {
                    const lat = branch.lat;
                    const lng = branch.lng;

                    /* Latitude / Longitude offsets */
                    const latOffset = km / 111;
                    const lngOffset = km / (111 * Math.cos(lat * Math.PI / 180));

                    /* Square bounds */
                    const bounds = [
                        [lat - latOffset, lng - lngOffset],
                        [lat + latOffset, lng + lngOffset]
                    ];

                    /* Draw square */
                    const zone = L.rectangle(bounds, {
                        color: '#8FC74A',
                        weight: 2,
                        opacity: 0.7,
                        fillColor: '#8FC74A',
                        fillOpacity: 0.08,
                        dashArray: '8, 6'
                    });

                    /* Zone popup */
                    zone.bindPopup(this.createZonePopup(branch), {
                        className: 'coverage-popup-container',
                        maxWidth: 340,
                        minWidth: 260
                    });

                    this.branchZones.addLayer(zone);
                });
            },


            /* ================= PARSE LAT / LNG ================= */

            parseLatLng(value) {
                const match = value.trim().match(/^(-?\d+(?:\.\d+)?)\s*[, ]\s*(-?\d+(?:\.\d+)?)$/);
                if (!match) return null;

                const lat = parseFloat(match[1]);
                const lng = parseFloat(match[2]);

                if (isNaN(lat) || isNaN(lng) || lat < -90 || lat > 90 || lng < -180 || lng > 180) {
                    return null;
                }

                return {
                    lat,
                    lng
                };
            },


            /* ================= DISTANCE ================= */

            calculateDistance(lat1, lng1, lat2, lng2) {
                const R = 6371;
                const dLat = (lat2 - lat1) * Math.PI / 180;
                const dLng = (lng2 - lng1) * Math.PI / 180;

                const a =
                    Math.sin(dLat / 2) ** 2 +
                    Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * Math.sin(dLng / 2) ** 2;

                return R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            },


            /* ================= FIND NEAREST BRANCH ================= */

            findNearestBranch(lat, lng) {
                if (!this.presetRegions.length) return null;

                let nearest = null;
                let shortest = Infinity;

                this.presetRegions.forEach(branch => {
                    const distance = this.calculateDistance(lat, lng, branch.lat, branch.lng);

                    if (distance < shortest) {
                        shortest = distance;
                        nearest = {
                            ...branch,
                            distance
                        };
                    }
                });

                return nearest;
            },


            /* ================= MOVE TO COORDINATES ================= */

            flyToCoordinates(lat, lng, name = null, status = null) {
                if (!this.map) return;

                lat = parseFloat(lat);
                lng = parseFloat(lng);
                if (isNaN(lat) || isNaN(lng)) return;

                /* Zoom to location */
                this.map.flyTo([lat, lng], 12, {
                    duration: 0.75
                });

                this.searchedLocation = name || `${lat}, ${lng}`;
                this.status = status || null;

                /* Find nearest branch */
                const nearest = this.findNearestBranch(lat, lng);
                this.nearestBranch = nearest;
                this.distance = nearest ? nearest.distance : null;

                /* Update Network Highlights from nearest branch model data */
                this.avgLatency = nearest?.avg_latency != null ? `${nearest.avg_latency} ms` : '---';
                this.networkUptime = nearest?.uptime != null ? `${nearest.uptime}%` : '---';

                /* Remove previous search pointer */
                if (this.searchMarker) {
                    this.map.removeLayer(this.searchMarker);
                    this.searchMarker = null;
                }

                /* Create new pointer */
                this.searchMarker = L.marker([lat, lng], {
                    icon: this.searchIcon,
                    zIndexOffset: 1000
                }).addTo(this.map);

                /* Search popup */
                this.searchMarker
                    .bindPopup(this.createSearchPopup(lat, lng, name, nearest), {
                        className: 'coverage-popup-container',
                        maxWidth: 360,
                        minWidth: 280,
                        closeButton: true,
                        autoPan: true
                    })
                    .openPopup();
            },


            /* ================= SELECT POPULAR BRANCH ================= */

            selectRegion(branch) {
                if (!branch) return;

                this.searchQuery = branch.name_en;
                this.flyToCoordinates(branch.lat, branch.lng, branch.name_en, branch.status);
            },


            /* ================= SEARCH EXISTING MARKER ================= */

            flyToRegionByName(name) {
                if (!name) return;

                const marker = this.allMarkers.find(
                    marker => marker.regionName && marker.regionName.toLowerCase() === name.toLowerCase()
                );

                if (marker) {
                    const position = marker.getLatLng();
                    this.flyToCoordinates(position.lat, position.lng, marker.regionName, marker.regionStatus);
                } else {
                    this.checkCoverage(name);
                }
            },


            /* ================= MAIN SEARCH ================= */

            checkCoverage(query = null) {
                const term = (query || this.searchQuery || '').trim();
                if (!term) return;

                /* Search lat,lng first */
                const coords = this.parseLatLng(term);

                if (coords) {
                    this.isLoading = true;
                    this.status = null;

                    this.flyToCoordinates(coords.lat, coords.lng, `${coords.lat}, ${coords.lng}`);

                    this.isLoading = false;
                    return;
                }

                /* Search location */
                this.isLoading = true;
                this.status = null;

                $.get('{{ route("coverage.check") }}', {
                        keyword: term
                    })

                    .done(response => {
                        this.searchedLocation = response.name || term;
                        this.status = response.status || null;

                        /* Update Network Highlights directly from the search response */
                        this.avgLatency = response.avg_latency != null ? `${response.avg_latency} ms` : '---';
                        this.networkUptime = response.uptime != null ? `${response.uptime}%` : '---';

                        if (response.lat != null && response.lng != null) {
                            this.flyToCoordinates(response.lat, response.lng, response.name || term, response.status);
                        }
                    })

                    .fail(xhr => {
                        alert(xhr.responseJSON?.message || 'An unexpected error occurred.');
                    })

                    .always(() => {
                        this.isLoading = false;
                    });
            },


            /* ================= RESET ================= */

            resetMap() {
                this.searchQuery = '';
                this.searchedLocation = '';
                this.status = null;
                this.distance = null;
                this.nearestBranch = null;
                this.avgLatency = '---';
                this.networkUptime = '---';

                /* Remove search marker */
                if (this.searchMarker) {
                    this.map.removeLayer(this.searchMarker);
                    this.searchMarker = null;
                }

                /* Close popup */
                this.map.closePopup();

                /* Return to Cambodia */
                this.map.flyTo(this.defaultCenter, this.defaultZoom, {
                    duration: 0.75
                });
            }

        };
    }
</script>

<section class="py-8 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-2xl sm:text-4xl font-extrabold  text-transparent bg-clip-text gradient-brand">
            {{ __('app.support.title') }}
        </h2>
        <p class="text-adaptive-muted text-sm max-w-2xl mx-auto">
            {{ __('app.support.desc') }}
        </p>
    </div>
</section>

<section id="support" class="relative overflow-hidden py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-2">

            {{-- =====================================================
                 LEFT : SUPPORT INFORMATION
            ====================================================== --}}
            <div class="space-y-5">

                {{-- Customer Service --}}
                <div class="group rounded-2xl border border-slate-200 bg-white  p-6
                            shadow-sm transition duration-300
                            hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex items-start gap-5">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center
                                    rounded-xl bg-green-50 text-green-600
                                    transition group-hover:bg-green-600 group-hover:text-white">

                            <svg class="h-7 w-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                            </svg>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-slate-900">
                                {{ __('app.support.service') }}
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                {{ __('For general inquiries, billing, and customer assistance.') }}
                            </p>

                            <div class="mt-4 space-y-2">

                                <a href="tel:+85512345678"
                                    class="flex items-center gap-2 text-sm font-semibold
                                          text-green-600 transition hover:text-green-700">
                                    <svg class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                                    </svg>
                                    012 345 678
                                </a>

                                <a href="mailto:support@telnet.com.kh"
                                    class="flex items-center gap-2 text-sm text-slate-500
                                          transition hover:text-green-600">
                                    <svg class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    support@telnet.com.kh
                                </a>

                            </div>
                        </div>
                    </div>
                </div>


                {{-- NOC --}}
                <div class="group rounded-2xl border border-slate-200 bg-white p-6
                            shadow-sm transition duration-300
                            hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex items-start gap-5">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center
                                    rounded-xl bg-orange-50 text-orange-500
                                    transition group-hover:bg-orange-500 group-hover:text-white">

                            <svg class="h-7 w-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 5h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M9 9h6v6H9V9z" />
                            </svg>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-slate-900">
                                {{ __('app.support.noc') }}
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                {{ __('For network incidents, connectivity issues, and technical support.') }}
                            </p>

                            <div class="mt-4 space-y-2">

                                <a href="tel:+85512345678"
                                    class="flex items-center gap-2 text-sm font-semibold
                                          text-orange-500 transition hover:text-orange-600">
                                    <svg class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                                    </svg>
                                    012 345 678
                                </a>

                                <a href="mailto:noc@telnet.com.kh"
                                    class="flex items-center gap-2 text-sm text-slate-500
                                          transition hover:text-orange-500">
                                    <svg class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    noc@telnet.com.kh
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="group rounded-2xl border border-slate-200 bg-white  p-6
                            shadow-sm transition duration-300
                            hover:-translate-y-1 hover:shadow-lg">

                    <div class="flex items-start gap-5">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center
                                    rounded-xl bg-slate-100 text-slate-700
                                    transition group-hover:bg-slate-800 group-hover:text-white">

                            <svg class="h-7 w-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M16 11c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3z" />
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3z" />
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M2 19c0-2.21 2.69-4 6-4s6 1.79 6 4M14 15c.62-.64 1.53-1 2.5-1 2.49 0 4.5 1.34 4.5 3" />
                            </svg>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-slate-900">
                                {{ __('app.support.sale') }}
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                {{ __('For new services, business solutions, and partnership inquiries.') }}
                            </p>

                            <div class="mt-4 space-y-2">

                                <a href="tel:+85512345678"
                                    class="flex items-center gap-2 text-sm font-semibold
                                          text-slate-700 transition hover:text-green-600">
                                    <svg class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                                    </svg>
                                    012 345 678
                                </a>

                                <a href="mailto:sales@telnet.com.kh"
                                    class="flex items-center gap-2 text-sm text-slate-500
                                          transition hover:text-green-600">
                                    <svg class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    sales@telnet.com.kh
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


            {{-- =====================================================
                 RIGHT : CONTACT FORM
            ====================================================== --}}
            <div class="rounded-3xl border border-slate-200 bg-white p-6
                        shadow-xl sm:p-8 ">

                <div class="mb-8">
                    <h3 class="mt-2 text-2xl font-bold text-slate-900 sm:text-3xl">
                        {{ __('app.support.send') }}
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-500">
                        {{ __('Have a question or need assistance? Send us your information and our team will get back to you.') }}
                    </p>
                </div>


                <form action="{{ route('contact.store') }}"
                    method="POST"
                    class="space-y-5">

                    @csrf

                    {{-- Full Name --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            {{ __('app.support.fullname') }}
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="{{ __('app.support.fullname_holder') }}"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50
                                   px-4 py-3 text-sm text-slate-900
                                   placeholder-slate-400 outline-none transition
                                   focus:border-green-500 focus:bg-white
                                   focus:ring-2 focus:ring-green-500/20">
                    </div>


                    {{-- Email + Phone --}}
                    <div class="grid gap-5 sm:grid-cols-2">

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">
                                {{ __('app.support.email') }}
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="{{__('app.support.email_holder')}}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50
                                       px-4 py-3 text-sm text-slate-900
                                       placeholder-slate-400 outline-none transition
                                       focus:border-green-500 focus:bg-white
                                       focus:ring-2 focus:ring-green-500/20">
                        </div>


                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">
                                {{ __('app.support.phone') }}
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="  {{ __('app.support.phone_holder') }}"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50
                                       px-4 py-3 text-sm text-slate-900
                                       placeholder-slate-400 outline-none transition
                                       focus:border-green-500 focus:bg-white
                                       focus:ring-2 focus:ring-green-500/20">
                        </div>

                    </div>


                    {{-- Support Type --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            {{ __('app.support.tikect_type') }}
                        </label>

                        <select
                            name="type"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50
                                   px-4 py-3 text-sm text-slate-900 outline-none transition
                                   focus:border-green-500 focus:bg-white
                                   focus:ring-2 focus:ring-green-500/20">

                            <option value="">
                                {{ __('app.support.select') }}
                            </option>

                            <option value="customer_service">
                                {{ __('app.support.t_care') }}
                            </option>

                            <option value="noc">
                                {{ __('app.support.t_noc') }}
                            </option>

                            <option value="sales">
                                {{ __('app.support.t_sale') }}
                            </option>
                            <option value="sales">
                                {{ __('app.support.t_bill') }}
                            </option>

                        </select>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            {{ __('app.support.t_desc') }}
                        </label>

                        <textarea
                            name="message"
                            rows="5"
                            required
                            placeholder="{{ __('app.support.t_desc_holder') }}"
                            class="w-full resize-none rounded-xl border border-slate-200
                                   bg-slate-50 px-4 py-3 text-sm text-slate-900
                                   placeholder-slate-400 outline-none transition
                                   focus:border-green-500 focus:bg-white
                                   focus:ring-2 focus:ring-green-500/20">{{ old('message') }}</textarea>
                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="group flex w-full items-center justify-center gap-3
                               rounded-xl bg-gradient-to-r from-green-500 to-green-600
                               px-5 py-3.5 text-sm font-bold text-white
                               shadow-lg shadow-green-600/20
                               transition duration-300
                               hover:-translate-y-0.5
                               hover:from-green-600 hover:to-green-700
                               hover:shadow-green-600/30">

                        {{ __('app.support.send') }}

                        <svg class="h-5 w-5 transition-transform duration-300
                                    group-hover:translate-x-1"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>

                    </button>

                </form>

            </div>

        </div>
    </div>
</section>

@include('layouts.scrollBar')

@endsection