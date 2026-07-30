@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden py-4 lg:py-6 section-bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-8 space-y-6 text-center lg:text-left">

                <h1 class="text-3xl sm:text-5xl font-black leading-tight tracking-normal text-adaptive-main lg:leading-snug">
                    <span>{{ __('app.hero.title') }}</span>
                    <span class="text-transparent bg-clip-text gradient-brand">{{ __('app.hero.highlight') }}</span>
                </h1>

                <p class="text-adaptive-muted text-justify !text-gray-500 text-base sm:text-lg max-w-3xl font-semibold font-bold !dark:text-[#8fc74a] ">
                    {{ __('app.hero.desc') }}
                </p>
                <br>
                <p class="text-adaptive-muted text-justify !text-gray-500 text-base sm:text-lg max-w-3xl font-semibold font-bold !dark:text-[#8fc74a]"> {{ __('app.hero.desc1') }}</p>
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                    <button onclick="openModal('serviceModal')"
                        class="gradient-brand hover:from-brand-green-hover hover:to-brand-orange-hover text-white font-bold px-7 py-3.5 rounded-xl shadow-lg shadow-brand-green/20 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                        <span>{{ __('app.hero.cta_primary') }}</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                    <a href="{{route('services')}}"
                        class="glass-card hover:-translate-y-0.5 transition text-adaptive-main font-semibold px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 transition flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-brand-orange"></i>
                        <span>{{ __('app.hero.cta_secondary') }}</span>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5"></div>
        </div>
    </div>
</section>
<div class="text-center max-w-3xl mx-auto mb-4">
    <H2 class=" sm:text-3xl font-extrabold text-center text-transparent bg-clip-text gradient-brand">
        {{ __('app.hero.difference') }}
    </H2>
</div>
{{-- ===== SERVICES SECTION — visible, image-based cards ===== --}}
<section id="services" class="py-8 section-bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
        $isKm = app()->getLocale() === 'km';
        $serviceCards = [
        ['image' => '/images/High_Speed.png', 'badge' => 'High Speed', 'badge_km' => 'ល្បឿនលឿន', 'desc_en' => 'Provide high-speed, reliable and stable internet connectivity.', 'desc_km' => 'ផ្តល់ការតភ្ជាប់អ៊ីនធឺណិតល្បឿនលឿន ជឿជាក់ និងស្ថិតស្ថេរ។'],
        ['image' => '/images/Scalable.png', 'badge' => 'Scalable', 'badge_km' => 'មានសក្តានុពលក្នុងការពង្រីក', 'desc_en' => 'Build scalable and secure network infrastructure across Cambodia.', 'desc_km' => 'សាងសង់ហេដ្ឋារចនាសម្ព័ន្ធបណ្តាញអាចពង្រីក និងមានសុវត្ថិភាពទូទាំងកម្ពុជា។'],
        ['image' => '/images/Hot_Service.png', 'badge' => 'Best Experience', 'badge_km' => 'បទពិសោធន៍ល្អបំផុតសម្រាប់អតិថិជន', 'desc_en' => 'Deliver excellent customer experience and innovative ICT.', 'desc_km' => 'ផ្តល់បទពិសោធន៍អតិថិជនដ៏ល្អ និង ICT ប្រកបដោយភាពច្នៃប្រឌិត។'],
        ['image' => '/images/Reliable.png', 'badge' => 'Reliable', 'badge_km' => 'ផ្តល់ឲ្យអតថិជននូវទំនុកចិត្តខ្ពស់', 'desc_en' => 'Maintain high standards of customer support and service reliability.', 'desc_km' => 'រក្សាស្តង់ដារខ្ពស់នៃការគាំទ្រអតិថិជន និងការជឿជាក់លើសេវាកម្ម។'],
        ['image' => '/images/Quality.png', 'badge' => 'Quality & Saving', 'badge_km' => 'គុណភាពល្អនិង​ សន្សំសំចៃ', 'desc_en' => 'Offering high quality, prompt service and selling what you need.', 'desc_km' => 'ផ្តល់ការេវាកម្មគុណភាពខ្ពស់ ឆ្លើយតបរហ័ស និងលក់តែអ្វីដែលអ្នកត្រូវការ។'],
        ['image' => '/images/Contribute.png', 'badge' => 'Contribute', 'badge_km' => 'រួមចំណែកសំខាន់ក្នុងការអភិវឌ្ឍន៍សង្គម', 'desc_en' => "Contribute to Cambodia's digital transformation.", 'desc_km' => 'រួមចំណែកក្នុងការផ្លាស់ប្តូរឌីជីថលរបស់ប្រទេសកម្ពុជា។'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($serviceCards as $card)
            <div class="glass-card glass-card-hover p-6 rounded-2xl relative">
                <div class="w-full h-24 rounded-xl flex items-center justify-center mb-4">
                    <img src="{{ $card['image'] }}" alt="{{ $card['badge'] }}" class="h-24 w-auto object-contain">
                </div>
                <div class="w-full flex justify-center">
                    <span class="text-md text-center font-bold text-brand-green bg-brand-green/10 px-2.5 py-1 rounded-md">
                        {{ $isKm ? $card['badge_km'] : $card['badge'] }}
                    </span>
                </div>
                <h3 class="text-md text-center font-semibold text-[#777] mt-2">
                    {{ $isKm ? $card['desc_km'] : $card['desc_en'] }}
                </h3>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="text-center w-full max-w-3xl mx-auto mb-12">
    <H2 class="w-full sm:text-3xl font-extrabold text-center text-transparent bg-clip-text gradient-brand">
        {{ __('app.hero.core-product') }}
    </H2>
</div>
<section id="core-product" class="py-8 section-bg-primary relative text-white overflow-hidden">

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
                            <img src="{{ asset('images/'.$slug->image) }}" alt="IP Transit Icon" class="w-10 h-10 object-contain" />
                        </div>
                        <h3 class="text-xl tracking-wide text-[#8fc74a] font-bold bg-brand-green/10 px-2.5 py-1/2 rounded">{{$currentLocale==="en"?$slug->name:$slug->name_km}} </h3>
                    </div>
                    <p class="text-gray-500 text-justify text-sm font-semibold mb-1 line-clamp-3 max-w-prose">
                        {{ $currentLocale==="en"?$slug->desc:$slug->desc_km}}
                    </p>
                    <a href="#" class="text-blue-600 underline hover:font-bold text-sm transition-colors">{{__('app.hero.readmore')}} &gt;&gt;</a>
                </div>
            </div>

            <!-- Duplicate your product cards here (up to 18, 27, etc.) -->
            <!-- Ensure each card includes the class "product-card" -->
            @endforeach
        </div>

        <!-- Custom Pagination Controls -->
        <div class="mt-12 flex items-center justify-center space-x-2">
            <button id="prev-btn" class="px-4 py-1 rounded-lg bg-gray-500 text-white font-medium hover:bg-gray-700 disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                &laquo; Previoes
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
    <!-- <p class="text-slate-400 text-sm sm:text-base">
        {{__('app.coverage.label')}}
    </p> -->
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
            <div
                x-show="distance !== null"
                x-cloak
                class="mt-3 p-3 bg-slate-50 border border-slate-200 rounded-lg text-sm">
                <div class="flex justify-between items-center">
                    <span class="text-slate-500">
                        Distance to nearest branch
                    </span>

                    <strong
                        class="text-[#8FC74A]"
                        x-text="distance != null ? distance.toFixed(2) + ' km' : ''"></strong>
                </div>
            </div>
            <div
                class="mt-4 flex flex-wrap items-center gap-2 text-xs text-slate-400"
                x-show="presetRegions.length > 0">
                <span class="text-lg font-bold text-[#8FC74A]">
                    Popular regions:
                </span>

                <template
                    x-for="branch in presetRegions"
                    :key="branch.id || branch.name_en">
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
                            <span class="font-semibold text-[#8FC74A]">---</span>
                        </li>
                        <li class="flex justify-between pb-2 border-b border-slate-700/50">
                            <span class="text-gray-400 font-bold">Network Uptime</span>
                            <span class="font-semibold text-[#8FC74A]">---</span>
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

            /* =========================================================
             * STATE
             * ========================================================= */

            searchQuery: '',
            searchedLocation: '',
            isLoading: false,

            status: null,
            distance: null,
            nearestBranch: null,

            totalZones: '---',

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

            /*
             * Coverage radius
             * 40 KM from branch
             */
            coverageKm: 40,


            /* =========================================================
             * INITIALIZE
             * ========================================================= */

            init() {

                this.$nextTick(() => {
                    this.initMap();
                });

                this.$el.addEventListener(
                    'alpine:destroy',
                    () => this.destroyMap()
                );
            },


            /* =========================================================
             * INITIALIZE MAP
             * ========================================================= */

            initMap() {

                const el = this.$refs.mapEl;

                if (!el) return;


                /*
                 * Remove previous map
                 */
                if (this.map) {

                    this.map.remove();

                    this.map = null;
                }


                /*
                 * Prevent Leaflet duplicate initialization
                 */
                if (el._leaflet_id) {

                    el._leaflet_id = null;

                    el.innerHTML = '';
                }


                /*
                 * Create map
                 *
                 * scrollWheelZoom: true
                 * allows mouse wheel zoom
                 */
                this.map = L.map(el, {

                    scrollWheelZoom: true,

                    zoomControl: true,

                    doubleClickZoom: true,

                    dragging: true,

                    touchZoom: true

                }).setView(
                    this.defaultCenter,
                    this.defaultZoom
                );


                /* =====================================================
                 * SEARCH ICON
                 * ===================================================== */

                this.searchIcon = L.icon({

                    iconUrl: '{{ asset("images/MAP.png") }}',

                    shadowUrl: '{{ asset("images/marker-shadow.png") }}',

                    iconSize: [30, 50],

                    iconAnchor: [15, 50],

                    popupAnchor: [0, -50]

                });


                /* =====================================================
                 * BASE MAPS
                 * ===================================================== */

                const osm = L.tileLayer(

                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

                    {
                        maxZoom: 19,

                        attribution: '&copy; OpenStreetMap contributors'
                    }

                );


                const googleStreet = L.tileLayer(

                    'https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',

                    {
                        maxZoom: 20,

                        attribution: '&copy; Google'
                    }

                );


                const googleSatellite = L.tileLayer(

                    'https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',

                    {
                        maxZoom: 20,

                        attribution: '&copy; Google'
                    }

                );


                const googleHybrid = L.tileLayer(

                    'https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',

                    {
                        maxZoom: 20,

                        attribution: '&copy; Google'
                    }

                );


                /*
                 * Default map
                 */
                osm.addTo(this.map);


                /* =====================================================
                 * COVERAGE MARKERS
                 * ===================================================== */

                this.markers =
                    L.markerClusterGroup();


                this.map.addLayer(
                    this.markers
                );


                /* =====================================================
                 * COVERAGE ZONES
                 * ===================================================== */

                this.branchZones =
                    L.layerGroup();


                this.map.addLayer(
                    this.branchZones
                );


                /* =====================================================
                 * LAYER CONTROL
                 * ===================================================== */

                this.layerControl =
                    L.control.layers(

                        {

                            'OpenStreetMap': osm,

                            'Google Streets': googleStreet,

                            'Google Satellite': googleSatellite,

                            'Google Hybrid': googleHybrid

                        },

                        {

                            'Coverage Markers': this.markers,

                            '40 KM Coverage Zones': this.branchZones

                        },

                        {

                            collapsed: true,

                            position: 'topright'

                        }

                    ).addTo(this.map);


                /* =====================================================
                 * LOAD DATA
                 * ===================================================== */

                this.loadMarkers();
            },


            /* =========================================================
             * DESTROY MAP
             * ========================================================= */

            destroyMap() {

                if (this.map) {

                    this.map.remove();
                }

                this.map = null;

                this.markers = null;

                this.branchZones = null;

                this.searchMarker = null;

                this.layerControl = null;

                this.allMarkers = [];

            },


            /* =========================================================
             * BRANCH POPUP
             * ========================================================= */

            createBranchPopup(item) {

                const name =
                    item.name_en ||
                    item.name ||
                    'Unknown Location';


                const status =
                    item.status ||
                    'Unknown';


                const isAvailable =
                    status.toLowerCase() ===
                    'available';


                const lat =
                    parseFloat(item.lat);


                const lng =
                    parseFloat(item.lng);


                return `

                <div class="coverage-popup">

                    <!-- HEADER -->

                    <div class="coverage-popup-header">

                        <div class="coverage-popup-title">

                            ${name}

                        </div>


                        <div class="
                            coverage-status
                            ${isAvailable
                                ? 'available'
                                : 'unavailable'}
                        ">

                            <span
                                class="coverage-status-dot"
                            ></span>

                            ${status}

                        </div>

                    </div>


                    <!-- BODY -->

                    <div class="coverage-popup-body">

                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Latitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${
                                    lat != null && !isNaN(lat)
                                        ? lat.toFixed(6)
                                        : '-'
                                }
                            </span>

                        </div>


                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Longitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${
                                    lng != null && !isNaN(lng)
                                        ? lng.toFixed(6)
                                        : '-'
                                }
                            </span>

                        </div>

                    </div>


                    <!-- FOOTER -->

                    <div class="coverage-popup-footer">

                        <div class="coverage-radius">

                            <div
                                class="coverage-radius-icon"
                            >
                                ◉
                            </div>


                            <div>

                                <div
                                    style="
                                        font-weight:600;
                                        color:#334155;
                                    "
                                >
                                    Coverage Zone
                                </div>

                                <div>
                                    ${this.coverageKm}
                                    km radius
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            `;
            },


            /* =========================================================
             * COVERAGE ZONE POPUP
             * ========================================================= */

            createZonePopup(branch) {

                return `

                <div class="coverage-popup">

                    <!-- HEADER -->

                    <div class="coverage-popup-header">

                        <div class="coverage-popup-title">

                            ${branch.name_en}

                        </div>


                        <div
                            class="
                                coverage-status
                                available
                            "
                        >

                            <span
                                class="
                                    coverage-status-dot
                                "
                            ></span>

                            Coverage

                        </div>

                    </div>


                    <!-- BODY -->

                    <div class="coverage-popup-body">

                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Coverage Radius
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${this.coverageKm} km
                            </span>

                        </div>


                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Coverage Area
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${this.coverageKm * 2}
                                ×
                                ${this.coverageKm * 2}
                                km
                            </span>

                        </div>


                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Branch Latitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${branch.lat != null ? branch.lat.toFixed(6) : '-'}
                            </span>

                        </div>


                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Branch Longitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${branch.lng != null ? branch.lng.toFixed(6) : '-'}
                            </span>

                        </div>

                    </div>


                    <!-- FOOTER -->

                    <div class="coverage-popup-footer">

                        <div class="coverage-radius">

                            <div
                                class="coverage-radius-icon"
                            >
                                ◉
                            </div>


                            <div>

                                <div
                                    style="
                                        font-weight:600;
                                        color:#334155;
                                    "
                                >
                                    TELNET Coverage Zone
                                </div>

                                <div>
                                    Service coverage
                                    around this branch
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            `;
            },


            /* =========================================================
             * SEARCH RESULT POPUP
             * ========================================================= */

            createSearchPopup(
                lat,
                lng,
                name,
                nearest
            ) {

                const insideCoverage =
                    nearest &&
                    nearest.distance <=
                    this.coverageKm;


                return `

                <div class="coverage-popup">

                    <!-- HEADER -->

                    <div class="coverage-popup-header">

                        <div class="coverage-popup-title">

                            ${name || 'Selected Location'}

                        </div>


                        <div class="
                            coverage-status
                            ${
                                insideCoverage
                                    ? 'available'
                                    : 'unavailable'
                            }
                        ">

                            <span
                                class="
                                    coverage-status-dot
                                "
                            ></span>

                            ${
                                insideCoverage
                                    ? 'Covered'
                                    : 'Not Covered'
                            }

                        </div>

                    </div>


                    <!-- LOCATION -->

                    <div class="coverage-popup-body">

                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Latitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${lat != null && !isNaN(lat) ? lat.toFixed(6) : '-'}
                            </span>

                        </div>


                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Longitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${lng != null && !isNaN(lng) ? lng.toFixed(6) : '-'}
                            </span>

                        </div>


                        ${
                            nearest
                                ? `

                                    <div
                                        class="
                                            coverage-info-row
                                        "
                                    >

                                        <span
                                            class="
                                                coverage-info-label
                                            "
                                        >
                                            Nearest Branch
                                        </span>

                                        <span
                                            class="
                                                coverage-info-value
                                            "
                                        >
                                            ${nearest.name_en}
                                        </span>

                                    </div>


                                    <div
                                        class="
                                            coverage-info-row
                                        "
                                    >

                                        <span
                                            class="
                                                coverage-info-label
                                            "
                                        >
                                            Distance
                                        </span>

                                        <span
                                            class="
                                                coverage-info-value
                                                ${
                                                    insideCoverage
                                                        ? 'distance-good'
                                                        : 'distance-bad'
                                                }
                                            "
                                        >
                                            ${nearest.distance != null ? nearest.distance.toFixed(2) : '-'}
                                            km
                                        </span>

                                    </div>

                                `
                                : ''
                        }

                    </div>


                    <!-- COVERAGE RESULT -->

                    <div
                        class="
                            coverage-result
                            ${
                                insideCoverage
                                    ? 'coverage-result-good'
                                    : 'coverage-result-bad'
                            }
                        "
                    >

                        <div
                            class="
                                coverage-result-icon
                            "
                        >
                            ${
                                insideCoverage
                                    ? '✓'
                                    : '!'
                            }
                        </div>


                        <div>

                            <div
                                class="
                                    coverage-result-title
                                "
                            >
                                ${
                                    insideCoverage
                                        ? 'Service Available'
                                        : 'Outside Coverage'
                                }
                            </div>


                            <div
                                class="
                                    coverage-result-text
                                "
                            >
                                ${
                                    insideCoverage
                                        ? `
                                            This location is
                                            within the
                                            ${this.coverageKm} km
                                            coverage zone.
                                        `
                                        : `
                                            This location is
                                            outside the nearest
                                            ${this.coverageKm} km
                                            coverage zone.
                                        `
                                }
                            </div>

                        </div>

                    </div>

                </div>

            `;
            },


            /* =========================================================
             * LOAD MARKERS
             * ========================================================= */

            loadMarkers() {

                $('#spinner')
                    .removeClass('hidden');


                $.get(
                        '{{ route("coverage.data") }}'
                    )

                    .done(response => {

                        if (!this.map)
                            return;


                        /*
                         * Clear old data
                         */

                        this.markers
                            .clearLayers();


                        this.branchZones
                            .clearLayers();


                        this.allMarkers = [];


                        /*
                         * Branch data
                         */

                        const branches =
                            response.branches ||
                            response.data || [];


                        /*
                         * Popular regions
                         */

                        this.presetRegions =
                            branches

                            .filter(item =>
                                item.lat != null &&
                                item.lng != null
                            )

                            .map(item => ({

                                id: item.id,

                                name_en: item.name_en ||
                                    item.name ||
                                    '',

                                name_km: item.name_km ||
                                    '',

                                lat: parseFloat(
                                    item.lat
                                ),

                                lng: parseFloat(
                                    item.lng
                                ),

                                status: item.status ||
                                    null

                            }))

                            .filter(item =>
                                !isNaN(item.lat) &&
                                !isNaN(item.lng)
                            );


                        /* =================================================
                         * ICONS
                         * ================================================= */

                        const activeIcon =
                            L.icon({

                                iconUrl: '{{ asset("images/MAP.png") }}',

                                shadowUrl: '{{ asset("images/marker-shadow.png") }}',

                                iconSize: [30, 50],

                                iconAnchor: [15, 50],

                                popupAnchor: [0, -50]

                            });


                        const inactiveIcon =
                            L.icon({

                                iconUrl: '{{ asset("images/MAP_INACTIVE.png") }}',

                                shadowUrl: '{{ asset("images/marker-shadow.png") }}',

                                iconSize: [30, 50],

                                iconAnchor: [15, 50],

                                popupAnchor: [0, -50]

                            });


                        /* =================================================
                         * COVERAGE DATA
                         * ================================================= */

                        const coverageData =
                            response.data || [];


                        coverageData.forEach(item => {

                            const lat =
                                parseFloat(
                                    item.lat
                                );


                            const lng =
                                parseFloat(
                                    item.lng
                                );


                            if (
                                isNaN(lat) ||
                                isNaN(lng)
                            ) {
                                return;
                            }


                            const name =
                                item.name_en ||
                                item.name ||
                                '';


                            const status =
                                item.status ||
                                'Unknown';


                            /*
                             * Marker
                             */

                            const marker =
                                L.marker(

                                    [lat, lng],

                                    {

                                        icon: status ===
                                            'Available'

                                            ?
                                            activeIcon

                                            :
                                            inactiveIcon

                                    }

                                );


                            marker.regionName =
                                name;


                            marker.regionStatus =
                                status;


                            /*
                             * Popup
                             */

                            marker.bindPopup(

                                this.createBranchPopup(
                                    item
                                ),

                                {

                                    className: 'coverage-popup-container',

                                    maxWidth: 340,

                                    minWidth: 260,

                                    closeButton: true,

                                    autoPan: true

                                }

                            );


                            /*
                             * Add marker
                             */

                            this.markers
                                .addLayer(
                                    marker
                                );


                            this.allMarkers
                                .push(
                                    marker
                                );

                        });


                        /*
                         * Create branch zones
                         */

                        this.createBranchZones();


                        /*
                         * Total
                         */

                        if (
                            response.total != null
                        ) {

                            this.totalZones =
                                response.total;

                        }

                    })

                    .fail(xhr => {

                        console.error(
                            'Coverage data error:',
                            xhr.responseJSON ||
                            xhr
                        );

                    })

                    .always(() => {

                        $('#spinner')
                            .addClass('hidden');

                    });

            },


            /* =========================================================
             * CREATE 40 KM COVERAGE ZONES
             * ========================================================= */

            createBranchZones() {

                if (!this.branchZones)
                    return;


                this.branchZones
                    .clearLayers();


                const km =
                    this.coverageKm;


                this.presetRegions
                    .forEach(branch => {

                        const lat =
                            branch.lat;


                        const lng =
                            branch.lng;


                        /*
                         * Latitude
                         */

                        const latOffset =
                            km / 111;


                        /*
                         * Longitude
                         */

                        const lngOffset =
                            km /
                            (
                                111 *
                                Math.cos(
                                    lat *
                                    Math.PI /
                                    180
                                )
                            );


                        /*
                         * Square bounds
                         */

                        const bounds = [

                            [

                                lat -
                                latOffset,

                                lng -
                                lngOffset

                            ],

                            [

                                lat +
                                latOffset,

                                lng +
                                lngOffset

                            ]

                        ];


                        /*
                         * Draw square
                         */

                        const zone =
                            L.rectangle(

                                bounds,

                                {

                                    color: '#8FC74A',

                                    weight: 2,

                                    opacity: 0.7,

                                    fillColor: '#8FC74A',

                                    fillOpacity: 0.08,

                                    dashArray: '8, 6'

                                }

                            );


                        /*
                         * Zone popup
                         */

                        zone.bindPopup(

                            this.createZonePopup(
                                branch
                            ),

                            {

                                className: 'coverage-popup-container',

                                maxWidth: 340,

                                minWidth: 260

                            }

                        );


                        this.branchZones
                            .addLayer(
                                zone
                            );

                    });

            },


            /* =========================================================
             * PARSE LAT / LNG
             * ========================================================= */

            parseLatLng(value) {

                const match =
                    value
                    .trim()
                    .match(
                        /^(-?\d+(?:\.\d+)?)\s*[, ]\s*(-?\d+(?:\.\d+)?)$/
                    );


                if (!match)
                    return null;


                const lat =
                    parseFloat(
                        match[1]
                    );


                const lng =
                    parseFloat(
                        match[2]
                    );


                if (

                    isNaN(lat) ||

                    isNaN(lng) ||

                    lat < -90 ||

                    lat > 90 ||

                    lng < -180 ||

                    lng > 180

                ) {

                    return null;

                }


                return {
                    lat,
                    lng
                };

            },


            /* =========================================================
             * DISTANCE
             * ========================================================= */

            calculateDistance(
                lat1,
                lng1,
                lat2,
                lng2
            ) {

                const R =
                    6371;


                const dLat =
                    (
                        lat2 -
                        lat1
                    ) *
                    Math.PI /
                    180;


                const dLng =
                    (
                        lng2 -
                        lng1
                    ) *
                    Math.PI /
                    180;


                const a =

                    Math.sin(
                        dLat / 2
                    ) ** 2

                    +

                    Math.cos(
                        lat1 *
                        Math.PI /
                        180
                    )

                    *

                    Math.cos(
                        lat2 *
                        Math.PI /
                        180
                    )

                    *

                    Math.sin(
                        dLng / 2
                    ) ** 2;


                return (

                    R *

                    2 *

                    Math.atan2(

                        Math.sqrt(a),

                        Math.sqrt(
                            1 - a
                        )

                    )

                );

            },


            /* =========================================================
             * FIND NEAREST BRANCH
             * ========================================================= */

            findNearestBranch(
                lat,
                lng
            ) {

                if (
                    !this.presetRegions.length
                ) {

                    return null;

                }


                let nearest =
                    null;


                let shortest =
                    Infinity;


                this.presetRegions
                    .forEach(branch => {

                        const distance =
                            this.calculateDistance(

                                lat,

                                lng,

                                branch.lat,

                                branch.lng

                            );


                        if (
                            distance <
                            shortest
                        ) {

                            shortest =
                                distance;


                            nearest = {

                                ...branch,

                                distance

                            };

                        }

                    });


                return nearest;

            },


            /* =========================================================
             * MOVE TO COORDINATES
             * ========================================================= */

            flyToCoordinates(
                lat,
                lng,
                name = null,
                status = null
            ) {

                if (!this.map)
                    return;


                lat =
                    parseFloat(lat);


                lng =
                    parseFloat(lng);


                if (

                    isNaN(lat) ||

                    isNaN(lng)

                ) {

                    return;

                }


                /*
                 * Zoom to location
                 */

                this.map.flyTo(

                    [lat, lng],

                    12,

                    {

                        duration: 0.75

                    }

                );


                this.searchedLocation =
                    name ||
                    `${lat}, ${lng}`;


                this.status =
                    status ||
                    null;


                /*
                 * Find nearest branch
                 */

                const nearest =
                    this.findNearestBranch(
                        lat,
                        lng
                    );


                this.nearestBranch =
                    nearest;


                this.distance =
                    nearest ?
                    nearest.distance :
                    null;


                /*
                 * Remove previous
                 * search pointer
                 */

                if (
                    this.searchMarker
                ) {

                    this.map.removeLayer(
                        this.searchMarker
                    );


                    this.searchMarker =
                        null;

                }


                /*
                 * Create new pointer
                 */

                this.searchMarker =
                    L.marker(

                        [lat, lng],

                        {

                            icon: this.searchIcon,

                            zIndexOffset: 1000

                        }

                    )


                    .addTo(
                        this.map
                    );


                /*
                 * Search popup
                 */

                this.searchMarker
                    .bindPopup(

                        this.createSearchPopup(

                            lat,

                            lng,

                            name,

                            nearest

                        ),

                        {

                            className: 'coverage-popup-container',

                            maxWidth: 360,

                            minWidth: 280,

                            closeButton: true,

                            autoPan: true

                        }

                    )

                    .openPopup();

            },


            /* =========================================================
             * SELECT POPULAR BRANCH
             * ========================================================= */

            selectRegion(branch) {

                if (!branch)
                    return;


                this.searchQuery =
                    branch.name_en;


                this.flyToCoordinates(

                    branch.lat,

                    branch.lng,

                    branch.name_en,

                    branch.status

                );

            },


            /* =========================================================
             * SEARCH EXISTING MARKER
             * ========================================================= */

            flyToRegionByName(name) {

                if (!name)
                    return;


                const marker =
                    this.allMarkers.find(

                        marker =>

                        marker.regionName &&

                        marker.regionName
                        .toLowerCase() ===

                        name.toLowerCase()

                    );


                if (marker) {

                    const position =
                        marker.getLatLng();


                    this.flyToCoordinates(

                        position.lat,

                        position.lng,

                        marker.regionName,

                        marker.regionStatus

                    );

                } else {

                    this.checkCoverage(
                        name
                    );

                }

            },


            /* =========================================================
             * MAIN SEARCH
             * ========================================================= */

            checkCoverage(
                query = null
            ) {

                const term = (

                    query ||

                    this.searchQuery ||

                    ''

                ).trim();


                if (!term)
                    return;


                /*
                 * Search lat,lng first
                 */

                const coords =
                    this.parseLatLng(
                        term
                    );


                if (coords) {

                    this.isLoading =
                        true;


                    this.status =
                        null;


                    this.flyToCoordinates(

                        coords.lat,

                        coords.lng,

                        `${coords.lat}, ${coords.lng}`

                    );


                    this.isLoading =
                        false;


                    return;

                }


                /*
                 * Search location
                 */

                this.isLoading =
                    true;


                this.status =
                    null;


                $.get(

                        '{{ route("coverage.check") }}',

                        {

                            keyword: term

                        }

                    )

                    .done(response => {

                        this.searchedLocation =
                            response.name ||
                            term;


                        this.status =
                            response.status ||
                            null;


                        if (

                            response.lat !=
                            null &&

                            response.lng !=
                            null

                        ) {

                            this.flyToCoordinates(

                                response.lat,

                                response.lng,

                                response.name ||
                                term,

                                response.status

                            );

                        }

                    })

                    .fail(xhr => {

                        alert(

                            xhr.responseJSON?.message ||

                            'An unexpected error occurred.'

                        );

                    })

                    .always(() => {

                        this.isLoading =
                            false;

                    });

            },


            /* =========================================================
             * RESET
             * ========================================================= */

            resetMap() {

                this.searchQuery =
                    '';


                this.searchedLocation =
                    '';


                this.status =
                    null;


                this.distance =
                    null;


                this.nearestBranch =
                    null;


                /*
                 * Remove search marker
                 */

                if (
                    this.searchMarker
                ) {

                    this.map.removeLayer(

                        this.searchMarker

                    );


                    this.searchMarker =
                        null;

                }


                /*
                 * Close popup
                 */

                this.map.closePopup();


                /*
                 * Return to Cambodia
                 */

                this.map.flyTo(

                    this.defaultCenter,

                    this.defaultZoom,

                    {

                        duration: 0.75

                    }

                );

            }

        };
    }
</script>
<section id="support" class="py-16 section-bg-primary hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title label="06. ការគាំទ្រ និងប្រព័ន្ធ ២៤/៧" title="កម្រិតការឡើងនៃបញ្ហា (Escalation Level Matrix)" subtitle="ក្រុមការងារជំនាញត្រៀមខ្លួនដោះស្រាយបញ្ហារហ័ស ២៤ ម៉ោង" labelColor="text-brand-green" />
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $isKm = app()->getLocale() === 'km';
            $levels = [
            ['color'=>'green','level'=>'Level 1','tk'=>'ក្រុមការងារ NOC 24/7','te'=>'NOC Team 24/7','dk'=>'ទទួលសំបុត្រ (Ticket) វិភាគ និងដោះស្រាយពីចម្ងាយ','de'=>'Receive tickets, analyze, and resolve remotely','phone'=>'097 513 5135','email'=>'noc@telnet.com.kh'],
            ['color'=>'orange','level'=>'Level 2','tk'=>'ប្រធានផ្នែក NOC','te'=>'NOC Department Head','dk'=>'លោក នី សាវណ្ណ (Mr. Ny Savann)','de'=>'Mr. Ny Savann','phone'=>'088 891 6667','email'=>'ny.savann@telnet.com.kh'],
            ['color'=>'green','level'=>'Level 3','tk'=>'ប្រតិបត្តិការ និងនាយក','te'=>'Operations & Director','dk'=>'លោក ណេត សុគន្ធធារិទ្ធ (Mr. Neth Sokunthearith)','de'=>'Mr. Neth Sokunthearith','phone'=>'081 687 697','email'=>'neth.sokunthearith@telnet.com.kh'],
            ]; @endphp
            @foreach($levels as $i => $lvl)
            <div class="glass-card p-6 rounded-2xl border-t-4 {{ $lvl['color']==='green' ? 'border-t-brand-green' : 'border-t-brand-orange' }} relative">
                <span class="text-xs font-bold {{ $lvl['color']==='green' ? 'text-brand-green bg-brand-green/10' : 'text-brand-orange bg-brand-orange/10' }} px-2.5 py-1 rounded">
                    កម្រិតទ{{ ['ី១','ី២','ី៣'][$i] }} ({{ $lvl['level'] }})
                </span>
                <h3 class="text-lg font-bold text-adaptive-main mt-3">{{ $isKm ? $lvl['tk'] : $lvl['te'] }}</h3>
                <p class="text-xs text-adaptive-muted mt-1">{{ $isKm ? $lvl['dk'] : $lvl['de'] }}</p>
                <div class="mt-6 space-y-3 text-xs">
                    <a href="tel:{{ preg_replace('/\s+/','',$lvl['phone']) }}" class="flex items-center gap-3 p-3 bg-slate-100 dark:bg-slate-900 rounded-xl hover:bg-slate-200 dark:hover:bg-slate-800 transition">
                        <i class="fa-solid fa-phone text-{{ $lvl['color']==='green' ? 'brand-green' : 'brand-orange' }} text-base"></i>
                        <div><span class="text-adaptive-muted block text-[10px]">លេខទូរស័ព្ទ:</span><span class="font-bold text-adaptive-main text-sm">{{ $lvl['phone'] }}</span></div>
                    </a>
                    <a href="mailto:{{ $lvl['email'] }}" class="flex items-center gap-3 p-3 bg-slate-100 dark:bg-slate-900 rounded-xl hover:bg-slate-200 dark:hover:bg-slate-800 transition">
                        <i class="fa-solid fa-envelope text-{{ $lvl['color']==='green' ? 'brand-green' : 'brand-orange' }} text-base"></i>
                        <div><span class="text-adaptive-muted block text-[10px]">អ៊ីមែល:</span><span class="font-bold text-adaptive-main text-xs">{{ $lvl['email'] }}</span></div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CTA SECTION — visible ===== --}}
<section class="py-16 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-2xl sm:text-4xl font-extrabold text-adaptive-main">
            {{ __('app.cta.title') }}
        </h2>
        <p class="text-adaptive-muted text-sm max-w-2xl mx-auto">
            {{ __('app.cta.desc') }}
        </p>
        <div class="flex justify-center gap-4 flex-wrap">
            <button onclick="openModal('serviceModal')"
                class="gradient-brand hover:from-brand-green-hover hover:to-brand-orange-hover text-white font-bold px-8 py-4 rounded-xl shadow-lg shadow-brand-green/20 text-sm transition">
                <i class="fa-solid fa-paper-plane mr-2"></i>
                {{ __('app.cta.btn') }}
            </button>
        </div>
    </div>
</section>

@endsection