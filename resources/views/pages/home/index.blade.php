@extends('layouts.app')
@section('content')
<section class="w-full border h-[400px] lg:h-[60vh] relative overflow-hidden">
    <!-- Background Image -->
    <img src="{{asset('storage/home/bgImage/BgImage1.png')}}" alt="Hero Image" class="w-full h-full object-cover wallpaper-infinite opacity-90" />

    <!-- Content Container -->
    <div class="absolute inset-0 flex flex-col justify-start items-center text-center px-4 z-10 mt-24">
        <h1 class="flex flex-col gap-2 max-w-6xl">
            <!-- Line 1: Primary Color (#8fc74a) -->
            <span class="text-2xl sm:text-4xl md:text-5xl font-bold uppercase text-[#8fc74a] leading-tight">
                {{ __('app.hero.title') }}

            </span>
            <span class="text-4xl sm:text-6xl md:text-4xl font-black text-[#F79633] leading-tight">
                {{ __('app.hero.highlight') }}
            </span>
            <!-- Line 2: Secondary Color (#F79633) -->

        </h1>
        <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-12">
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
</section>
<section class="relative overflow-hidden pt-8 pb-12 lg:pb-16 section-bg-primary">
    <!-- Outer Card with Fixed Desktop Height -->
    <div class="backdrop-blur-md bg-[#8fc74a]/5 max-w-8xl mx-8 px-4 sm:px-6 lg:px-8 relative z-10  py-8 rounded-lg lg:h-[700px]">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start h-full ">
            <!-- LEFT COLUMN: Text Description -->
            <div class="lg:col-span-4 space-y-6 text-left flex flex-col">
                <div class="space-y-4 i">
                    <h1 class="text-4xl text-center font-bold text-[#8FC74A]">{{__('app.hero.slogan')}}</h1>
                    <h1 class="text-4xl text-center font-bold text-[#8FC74A]">{{__('app.hero.slogan_1')}}</h1>
                    <p class="text-[#444] text-base sm:text-md leading-relaxed text-justify">
                        {{ __('app.hero.desc') }}
                    </p>
                    <p class="text-[#444] text-base sm:text-md leading-relaxed text-justify">
                        {{ __('app.hero.desc1') }}
                    </p>
                    <p class="text-[#444] text-base sm:text-md leading-relaxed text-justify">
                        {{ __('app.hero.desc2') }}
                    </p>
                </div>
            </div>

            <!-- RIGHT COLUMN: 3-Image Collage Grid -->
            <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-4 h-full min-h-0">

                <!-- Left sub-column: 2 Stacked Equal-Height Images -->
                <div class="flex flex-col gap-4 h-full min-h-0">
                    <!-- img1 (Top - 50% height minus gap) -->
                    <div class="relative overflow-hidden shadow-md flex-1 min-h-0 rounded-tl-2xl group">
                        <img loading="lazy"
                            src="{{ asset('storage/home/heroImage/HomeInternet.png') }}"
                            alt="Home Internet"
                            class="w-full h-full object-cover group-hover:scale-105 opacity-90 transition-transform duration-300" />
                        <!-- Gradient Overlay for readability -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex flex-col justify-end items-start p-4">
                            <h3 class="text-white font-bold text-lg sm:text-xl drop-shadow-md">
                                {{__('app.hero.home')}}
                            </h3>
                            <p class="text-white text-sm sm:text-sm drop-shadow-md">
                                {{__('app.hero.home_slogan')}}
                            </p>
                        </div>
                    </div>

                    <!-- img2 (Bottom - 50% height minus gap) -->
                    <div class="relative overflow-hidden shadow-md flex-1 min-h-0 rounded-bl-2xl group">
                        <img loading="lazy"
                            src="{{ asset('storage/home/heroImage/BusinessInternet.png') }}"
                            alt="Business Internet"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                        <!-- Gradient Overlay for readability -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex flex-col justify-end items-start p-4">
                            <h3 class="text-white font-bold text-lg sm:text-xl drop-shadow-md">
                                {{__('app.hero.biz')}}
                            </h3>
                            <p class="text-white text-sm sm:text-sm drop-shadow-md">
                                {{__('app.hero.biz_slogan')}}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right sub-column: Full Height Image -->
                <div class="relative overflow-hidden shadow-md h-full min-h-0 rounded-tr-xl rounded-br-2xl group">
                    <img loading="lazy"
                        src="{{ asset('storage/home/heroImage/DedicatedInternet.png') }}"
                        alt="Dedicated Internet"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                    <!-- Gradient Overlay for readability -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex flex-col justify-end items-start p-4">
                        <h3 class="text-white font-bold text-xl sm:text-xl drop-shadow-md drop-shadow-[0_1.2px_1.2px_rgba(143,199,74,0.8)]">
                            {{__('app.hero.enterprise')}}
                        </h3>
                        <p class="text-white text-sm sm:text-sm drop-shadow-md">
                            {{__('app.hero.enterprise_slogan')}}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<div class="text-center max-w-3xl mx-auto">
    <h2 class="text-2xl sm:text-4xl font-extrabold text-center  bg-clip-text text-[#8fc74a] gradient-brand">
        {{ __('app.hero.difference') }}
    </h2>
</div>
{{-- ===== SERVICES SECTION — visible, image-based cards ===== --}}
<section id="services" class="py-8 section-bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
        $isKm = app()->getLocale() === 'km';
        $serviceCards = [
        ['image' => asset('storage/home/mission/High_Speed.png'), 'badge' => 'High Speed', 'badge_km' => 'ល្បឿនលឿន', 'desc_en' => 'Experience lightning-fast internet connectivity designed for seamless streaming, business productivity, and everyday digital experiences with stable speeds, advanced technology, and reliable performance that keeps you connected anytime, anywhere.', 'desc_km' => 'ទទួលបានបទពិសោធន៍នៃការតភ្ជាប់អ៊ីនធឺណិតដែលមានល្បឿនលឿនបំផុត ដែលត្រូវបានរចនាឡើងសម្រាប់ការផ្សាយវីដេអូ (streaming) ប្រកបដោយភាពរលូន ការបង្កើនផលិតភាពការងារ និងសកម្មភាពឌីជីថលប្រចាំថ្ងៃ។ ជាមួយនឹងល្បឿនដ៏នឹងនរ បច្ចេកវិទ្យាទំនើប និងដំណើរការប្រកបដោយគុណភាពខ្ពស់ សេវាកម្មនេះធានាថាអ្នកអាចរក្សាការតភ្ជាប់បានគ្រប់ពេលវេលា និងគ្រប់ទីកន្លែង។'],
        ['image' => asset('storage/home/mission/Scalable.png'), 'badge' => 'Scalable', 'badge_km' => 'មានសក្តានុពលក្នុងការពង្រីក', 'desc_en' => 'Building a future-ready network infrastructure that grows with your needs, providing flexible, secure, and high-performance solutions to support businesses, organizations, and communities with reliable connectivity and innovation.', 'desc_km' => 'ការកសាងហេដ្ឋារចនាសម្ព័ន្ធបណ្តាញដែលត្រៀមខ្លួនរួចជាស្រេចសម្រាប់អនាគត និងអាចពង្រីកបានស្របតាមតម្រូវការរបស់អ្នក ព្រមទាំងផ្តល់ជូននូវដំណោះស្រាយដែលមានភាពបត់បែន សុវត្ថិភាព និងប្រសិទ្ធភាពខ្ពស់ ដើម្បីគាំទ្រដល់អាជីវកម្ម អង្គភាព និងសហគមន៍ តាមរយៈការតភ្ជាប់ប្រកបដោយទំនុកចិត្ត និងនវានុវត្តន៍'],
        ['image' => asset('storage/home/mission/Experience.png'), 'badge' => 'Best Experience', 'badge_km' => 'បទពិសោធន៍ល្អបំផុតសម្រាប់អតិថិជន', 'desc_en' => 'Our dedicated hotline service and professional customer support team are always ready to assist, ensuring quick solutions, friendly guidance, and a smooth experience whenever you need help.', 'desc_km' => 'សេវាកម្មទូរស័ព្ទបន្ទាន់ (Hotline) និងក្រុមការងារជំនាញផ្នែកសេវាបម្រើអតិថិជនរបស់យើង តែងតែត្រៀមខ្លួនជានិច្ចដើម្បីផ្តល់ជំនួយ ដោយធានាបាននូវដំណោះស្រាយរហ័ស ការណែនាំប្រកបដោយភាពរួសរាយរាក់ទាក់ និងបទពិសោធន៍ដ៏រលូន នៅពេលណាដែលលោកអ្នកត្រូវការជំនួយ។'],
        ['image' => asset('storage/home/mission/Reliable.png'), 'badge' => 'Reliable', 'badge_km' => 'ផ្តល់ឲ្យអតថិជននូវទំនុកចិត្តខ្ពស់', 'desc_en' => 'Delivering dependable network operations through advanced monitoring, proactive maintenance, and modern technology to ensure continuous availability, strong performance, and uninterrupted connectivity for every customer.', 'desc_km' => 'ផ្តល់ជូននូវប្រតិបត្តិការបណ្តាញប្រកបដោយភាពជឿជាក់ តាមរយៈការត្រួតពិនិត្យកម្រិតខ្ពស់ ការថែទាំបែបបង្ការ និងបច្ចេកវិទ្យាទំនើប ដើម្បីធានាបាននូវលទ្ធភាពប្រើប្រាស់ជាប្រចាំ សមត្ថភាពដំណើរការដ៏រឹងមាំ និងការតភ្ជាប់ដែលមិនមានការរំខានសម្រាប់អតិថិជនគ្រប់រូប។'],
        ['image' => asset('storage/home/mission/QualityAndSave.png'), 'badge' => 'Quality & Saving', 'badge_km' => 'គុណភាពល្អនិង​ សន្សំសំចៃ', 'desc_en' => 'Providing exceptional customer service through trust, dedication, and personalized solutions, ensuring every customer receives professional support, reliable assistance, and a satisfying experience throughout their digital journey.', 'desc_km' => 'ផ្តល់សេវាកម្មអតិថិជនដ៏ល្អឥតខ្ចោះតាមរយៈការកសាងទំនុកចិត្ត ការយកចិត្តទុកដាក់ខ្ពស់ និងដំណោះស្រាយដែលត្រូវបានរៀបចំឡើងស្របតាមតម្រូវការជាក់លាក់របស់អតិថិជនម្នាក់ៗ ដោយធានាថាអតិថិជនទាំងអស់ទទួលបានការគាំទ្រប្រកបដោយវិជ្ជាជីវៈ ការជួយជ្រោមជ្រែងដែលអាចទុកចិត្តបាន និងបទពិសោធន៍ដ៏ពេញចិត្តពេញមួយដំណើរការនៃការប្រើប្រាស់សេវាកម្មឌីជីថលរបស់ពួកគេ។'],
        ['image' => asset('storage/home/mission/Contribute.png'), 'badge' => 'Contribute', 'badge_km' => 'រួមចំណែកសំខាន់ក្នុងការអភិវឌ្ឍន៍សង្គម', 'desc_en' => "Committed to creating a better-connected society by supporting communities, promoting digital access, and using technology to empower people, businesses, and organizations for a brighter and smarter future.", 'desc_km' => 'ប្តេជ្ញាចិត្តក្នុងការកសាងសង្គមដែលមានការតភ្ជាប់កាន់តែប្រសើរឡើង តាមរយៈការគាំទ្រសហគមន៍ ការលើកកម្ពស់លទ្ធភាពទទួលបានសេវាឌីជីថល និងការប្រើប្រាស់បច្ចេកវិទ្យាដើម្បីពង្រឹងសមត្ថភាពប្រជាជន អាជីវកម្ម និងស្ថាប័ននានា ឆ្ពោះទៅរកអនាគតដ៏ភ្លឺស្វាង និងឆ្លាតវៃ។'],
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
                                        <div class="font-bold text-xl  bg-clip-text text-[#8fc74a] transition truncate uppercase ">
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
<section id="core-product" class="py-8 bg-gradient-to-br from-brand-green/10 via-transparent to-brand-orange/10 section-bg-primary relative overflow-hidden hidden">
    <!-- Container using Tailwind Grid -->
    <div class="max-w-8xl  px-4 ">
        <div class="grid grid-cols-1 md:grid-cols-10 items-start gap-6 bg-[#8fc74a]/5 rounded-2xl">
            <!-- Left Section (30% on Desktop -> 3 cols out of 10) -->
            <!-- Change 1: Added relative positioning and padding/height for content spacing -->
            <div class="md:col-span-4 text-center md:text-left relative h-[700px] flex flex-col justify-end p-6 overflow-hidden rounded-lg">

                <!-- Change 2: Absolute positioning, object-fit for background behavior, and z-index to place it behind -->
                <img src="{{asset('storage/home/heroImage/NetworkSolution.png')}}" alt=""
                    class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105">

                <!-- Change 3: Added z-index to keep text above the image and adjust text colors for contrast -->
                <h2 class="text-2xl sm:text-5xl lg:text-3xl font-extrabold text-white bg-clip-text gradient-brand relative z-10">
                    {{ __('app.hero.core-product') }}
                </h2>
            </div>

            <!-- Right Section (70% on Desktop -> 7 cols out of 10) -->
            <div class="md:col-span-6 text-center md:text-left">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

                    <!-- 3-Column Responsive Grid -->
                    <div id="card-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-12 gap-y-12">
                        @foreach($servicesSlugs as $slug)
                        <!-- Item 1 -->
                        <div class="product-card flex items-start space-x-4 p-2 rounded-2xl ">
                            <div>
                                <div class="flex items-center space-x-1 mb-2">
                                    <div class="flex-shrink-0">
                                        <img src="{{ Storage::url($slug->image) }}" alt="IP Transit Icon" class="w-10 h-10 object-contain" />
                                    </div>
                                    <h3 class="text-xl tracking-wide text-[#8fc74a] font-bold bg-brand-green/20 px-2.5 py-1/2 rounded-full">{{$currentLocale==="en"?$slug->name:$slug->name_km}} </h3>
                                </div>
                                <div class="text-[#444] text-justify text-sm  mb-1 line-clamp-7 max-w-prose">
                                    {!! $currentLocale==="en"?$slug->desc:$slug->desc_km !!}
                                </div>
                                <a href="#" class="text-[#F79633] underline hover:font-bold text-sm transition-colors">{{__('app.hero.readmore')}} &gt;&gt;</a>
                            </div>
                        </div>
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
            </div>

        </div>
    </div>
</section>
<section class="p-10 bg-[#8fc74a]/5">
    <div class="max-w-8xl mx-auto px-6">
        <div class="grid lg:grid-cols-12 gap-8 items-start">
            <!-- LEFT : 30% -->
            <div class="lg:col-span-4">
                <h2 class="text-4xl font-bold mt-4 text-[#F79633]">
                    {{ __('app.hero.core-product') }}
                </h2>
                <p class="mt-6 text-gray-600 leading-relaxed text-justify">
                    {{__('app.hero.core-product_desc')}}
                </p>
                <a href="{{route('business')}}"
                    class="inline-block font-semibold mr-2 text-lg mt-8 bg-[#F79633] text-white px-6 py-2 rounded-xl shadow-xl hover:scale-105 hover:bg-[#F79633]">
                    {{__('app.controls.buttons.learn_more')}}
                </a>
                <a href="#"
                    class="inline-block  font-semibold text-lg mt-8 bg-[#8fc74a] text-white px-6 py-2 rounded-xl shadow-xl hover:scale-105 hover:bg-[#8fc74a]">
                    {{__('app.controls.buttons.connect_us')}}
                </a>
            </div>

            <!-- RIGHT : 70% -->
            <div class="lg:col-span-8">
                <div
                    class="slider relative h-[600px] rounded-xl overflow-hidden shadow-2xl">
                    @foreach($servicesSlugs as $index => $slug)
                    <div class="slide absolute inset-0 transition-opacity duration-1000
                        {{ $index == 0 ? 'opacity-100 active' : 'opacity-0 pointer-events-none' }}">

                        <!-- Background with Dynamic Zoom Class Container -->
                        <div class="w-full h-full overflow-hidden">
                            <img
                                src="{{ Storage::url($slug->image) }}"
                                class="slide-img w-full h-full object-cover transform transition-transform duration-[7000ms] ease-out scale-100">
                        </div>

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/30"></div>

                        <!-- Content -->
                        <div class="absolute bottom-0 left-0 p-10 text-white w-full text-justify z-10">
                            <h3 class="text-4xl font-bold mb-4">
                                {{ $currentLocale=="en" ? $slug->name : $slug->name_km }}
                            </h3>
                            <div class="line-clamp-4 text-gray-200">
                                {!! $currentLocale=="en" ? $slug->desc : $slug->desc_km !!}
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Controls -->
                    <button class="prevSlide absolute left-5 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 transition backdrop-blur text-white w-12 h-12 rounded-full z-20">❮</button>
                    <button class="nextSlide absolute right-5 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 transition backdrop-blur text-white w-12 h-12 rounded-full z-20">❯</button>
                    <div class="dots absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2 z-20"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="text-center space-y-1 max-w-2xl mx-auto pt-8">
    <h2 class="sm:text-4xl font-extrabold text-center  text-[#8FC74A]">
        {{__('app.coverage.available')}}
    </h2>
</div>
<section id="coverage" class="py-8 px-4 sm:px-6 lg:px-8 font-sans text-slate-100 ">
    <div class="max-w-7xl mx-auto space-y-8 border-b border-[#8fc74a]/20 pb-10" x-data="coverageChecker()" x-init="init()">
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
                            <span>{{__('app.coverage.check')}}</span>
                        </div>
                    </template>
                    <button
                        type="button"
                        @click="resetMap()"
                        class="bg-slate-600 hover:bg-slate-700 text-white  px-5 py-1 rounded-lg transition text-sm">
                        {{__('app.coverage.reset')}}
                    </button>
                    <template x-if="isLoading">
                        <span class="inline-block animate-spin border-2 border-slate-950 border-t-transparent rounded-full w-4 h-4"></span>
                    </template>
                </button>
            </form>
            <div x-show="distance !== null" x-cloak class="mt-3 p-3 bg-slate-50 border border-slate-200 rounded-lg text-sm">
                <div class="flex justify-between items-center">
                    <span class="text-slate-500">{{__('app.coverage.nearest')}}</span>
                    <strong class="text-[#8FC74A]" x-text="distance != null ? distance.toFixed(2) + ' km' : ''"></strong>
                </div>
            </div>
            <div class="mt-4 flex flex-wrap items-center gap-2 text-base text-slate-400" x-show="presetRegions.length > 0">
                <span class="text-lg font-bold text-[#8FC74A]">{{__('app.coverage.branches')}}</span>
                <template x-for="branch in presetRegions" :key="branch.id || branch.name_en">
                    <button
                        type="button"
                        @click="selectRegion(branch)"
                        class="px-2.5 py-1 hover:bg-[#F79633] bg-[#8FC74A] rounded-lg text-md uppercase shadow-md text-white transition duration-300 transform hover:scale-95"
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
                    <h3 class="text-sm font-semibold text-[#8fc74a] mb-3">{{__('app.coverage.hightlight')}}</h3>
                    <ul class="space-y-3 text-xs text-slate-300">
                        <li class="flex justify-between pb-2 border-b border-slate-700/50">
                            <span class="text-gray-400 font-bold">{{__('app.coverage.letency')}}</span>
                            <span class="font-semibold text-[#8FC74A]" x-text="avgLatency">---</span>
                        </li>
                        <li class="flex justify-between pb-2 border-b border-slate-700/50">
                            <span class="text-gray-400 font-bold">{{__('app.coverage.uptime')}}</span>
                            <span class="font-semibold text-[#8FC74A]" x-text="networkUptime">---</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400 font-bold">{{__('app.coverage.totalzone')}}</span>
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
            defaultZoom: 8,

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
@php
$reviewInfos = [
[
"title" => "",
"review_types" => "Customer Service",
"desc" => "The customer support response time was under 3 minutes when we hit a deadline issue. They did not just answer with a macro—they actually looked into our logs and provided a custom code patch directly.",
"fullname" => "Sarah Jenkins",
"posts" => "Head of Operations at TechFlow",
"industry_type" => "ICT/Solution Software",
"industry_name" => "រោងពុម្ព នាគរាជ",
"image" => asset('storage/partner/Neakreach.jpg'),
"review_rated" => 4,
"pin"=>1,
"created_at" => now(),
],
[
"title" => "",
"review_types" => "Service Quality",
"desc" => "Their team completely redesigned our enterprise network infrastructure and improved both reliability and performance. The implementation was smooth, professional, and completed with minimal disruption to our daily operations.",
"fullname" => "Michael Anderson",
"posts" => "IT Director at GlobalCore",
"industry_type" => "Enterprise & Technology",
"industry_name" => "GLOBALCORE",
"image" => asset('storage/partner/TRC.png'),
"review_rated" => 5,
"pin"=>1,
"created_at" => now(),
],
[
"title" => "",
"review_types" => "Service Quality",
"desc" => "We needed a reliable fiber connection between multiple business locations, and their solution delivered exactly what we needed. The connection has been stable, fast, and significantly improved communication between our offices.",
"fullname" => "David Wilson",
"posts" => "Network Manager at MetroLink",
"industry_type" => "Telecommunications",
"industry_name" => "METROLINK",
"review_rated" => 5,
"pin"=>0,
"created_at" => now(),
],

[
"title" => "",
"review_types" => "Service Quality",
"desc" => "Reliable connectivity is critical for our business, and their team understood that from day one. The service has been consistent, and whenever we have questions, their technical team responds quickly and professionally.",
"fullname" => "James Mitchell",
"posts" => "Technology Manager at SmartTrade",
"industry_type" => "Retail & Distribution",
"industry_name" => "SMARTTRADE",
"image" => asset('storage/partner/EZEPROMO.png'),
"review_rated" => 4,
"pin"=>1,
"created_at" => now(),
],

[
"title" => "",
"review_types" => "Customer Service",
"desc" => "What impressed us most was how quickly their technical team identified the root cause of our issue. They explained the solution clearly, fixed the problem efficiently, and followed up afterward to make sure everything was working properly.",
"fullname" => "Olivia Bennett",
"posts" => "IT Administrator at BrightPath",
"industry_type" => "Education & Services",
"industry_name" => "BRIGHTPATH",
"review_rated" => 5,
"pin"=>0,
"created_at" => now(),
],
];
usort($reviewInfos, function ($a, $b) {
return ($b['pin'] ?? 0) <=> ($a['pin'] ?? 0);});
    @endphp
    <section class="max-w-8xl mx-auto space-y-5 sm:space-y-2 px-4 sm:px-6 md:px-10 lg:px-24 xl:px-40 2xl:px-56 hidden">

        <!-- 1. Header & Aggregate Metrics -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 sm:gap-8 border-b border-[#8fc74a]/20 sm:pb-10">
            <div class="max-w-3xl space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#8fc74a]/10 border border-[#8fc74a]/30 text-xs font-medium text-[#8fc74a]">
                    <span class="w-2 h-2 rounded-full bg-[#8fc74a] animate-pulse"></span>
                    {{__('app.review.slogan')}}
                </div>

                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold tracking-tight text-[#F79633]">
                    {{__('app.review.title')}}
                </h2>

                <p class="text-gray-600 text-sm sm:text-base md:text-lg">
                    {{__('app.review.desc')}}
                </p>
            </div>

            <!-- Rating Overview Card -->
            <div class="w-full lg:w-auto bg-white border border-[#8fc74a]/30 rounded-2xl p-4 sm:p-5 flex items-center flex-wrap sm:flex-nowrap gap-4 sm:gap-6 shadow-xl shadow-[#8fc74a]/10 shrink-0">
                <div class="text-center">
                    <span class="text-3xl sm:text-4xl font-black text-[#8fc74a]">4.9</span>

                    <div class="flex text-[#F79633] text-sm mt-1 justify-center">
                        ★ ★ ★ ★ ★
                    </div>

                    <p class="text-xs text-gray-500 mt-1">
                        Out of 5 Stars
                    </p>
                </div>

                <div class="h-12 w-px bg-[#8fc74a]/20 hidden sm:block"></div>

                <div class="space-y-1 min-w-0">
                    <p class="text-sm font-semibold text-[#F79633]">
                        99.4% Satisfaction Rate
                    </p>

                    <p class="text-xs text-gray-500">
                        Based on 1,280+ verified reviews
                    </p>

                    <div class="flex items-center gap-2 sm:gap-3 text-xs text-gray-500 pt-1 flex-wrap">
                        <span>Trustpilot</span>
                        •
                        <span>G2 Crowd</span>
                        •
                        <span>Capterra</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Dynamic Category Filter Tabs -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div
                class="flex items-center gap-2 overflow-x-auto pb-2 -mx-4 px-4 sm:mx-0 sm:px-0 scrollbar-none"
                id="filter-container">

                <button
                    onclick="filterFeedback('all')"
                    data-filter="all"
                    class="filter-btn active shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-sm font-semibold transition-all bg-[#8fc74a] text-white shadow-lg shadow-[#8fc74a]/20 hover:bg-[#8fc74a]/90">
                    {{__('app.review.all')}}
                </button>

                <button
                    onclick="filterFeedback('support')"
                    data-filter="support"
                    class="filter-btn shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-sm font-medium transition-all bg-white text-[#8fc74a] hover:bg-[#8fc74a]/10 border border-[#8fc74a]/30">
                    {{__('app.review.services')}}
                </button>

                <button
                    onclick="filterFeedback('performance')"
                    data-filter="performance"
                    class="filter-btn shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-sm font-medium transition-all bg-white text-[#F79633] hover:bg-[#F79633]/10 border border-[#F79633]/30">
                    {{__('app.review.care')}}
                </button>

                <button
                    onclick="filterFeedback('features')"
                    data-filter="features"
                    class="filter-btn shrink-0 whitespace-nowrap px-4 py-2 rounded-xl text-sm font-medium transition-all bg-white text-[#8fc74a] hover:bg-[#8fc74a]/10 border border-[#8fc74a]/30">
                    {{__('app.review.operation')}}
                </button>
            </div>

            <!-- Action Button -->
            <button
                class="w-full sm:w-auto shrink-0 inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-semibold bg-[#F79633] hover:bg-[#F79633]/90 rounded-xl transition-all shadow-lg shadow-[#F79633]/20">
                <svg
                    class="w-4 h-4 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2.5"
                        d="M12 4v16m8-8H4"></path>
                </svg>

                <span class="text-white font-bold">
                    {{__('app.review.write')}}
                </span>
            </button>
        </div>

        <!-- 3. Dynamic Feedback Grid -->
        <div
            id="feedback-grid"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6 border-b border-[#8fc74a]/20 pb-8 sm:pb-10">
            @foreach ($reviewInfos as $review)
            <div class="{{ ($review['pin'] ?? 0) == 1 ? 'sm:col-span-2' : 'col-span-1' }} hover:scale-[0.98] bg-white border border-[#8fc74a]/40 hover:border-[#8fc74a] rounded-2xl p-4 sm:p-6 shadow-xl hover:shadow-[#8fc74a]/15 transition-all duration-300 flex flex-col justify-between">
                @if($review['pin']==1)
                <div class="flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left gap-4 sm:gap-6 p-2 sm:p-6 rounded-2xl transition-all duration-300 hover:shadow-md">
                    <!-- Left: Image / Avatar Block -->
                    <div class="shrink-0">
                        <div class="relative w-24 h-24 sm:w-28 sm:h-28 md:w-40 md:h-40">
                            <div class="absolute inset-0 rounded-full bg-[#8fc74a]/20 scale-110"></div>
                            <img src="{{ $review['image'] ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=120' }}" alt="{{ $review['fullname'] }}" class="relative w-full h-full rounded-full object-cover ring-4 ring-white shadow-md group-hover:ring-[#8fc74a]/30 transition-all duration-300" />

                        </div>
                    </div>

                    <!-- Right: Text & Meta Content Block -->
                    <div class="flex-1 min-w-0 pt-1 w-full">
                        <!-- Tag & Rating Stars Row -->
                        <div class="flex items-center justify-center sm:justify-between gap-2 mb-2 flex-wrap">
                            <div class="flex items-center gap-0.5 text-[#F79633] text-sm">
                                @for ($i = 0; $i < ($review['rating'] ?? 5); $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" /></svg>
                                    @endfor
                            </div>
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-[#8fc74a]/15 text-[#8fc74a] border border-[#8fc74a]/30">
                                {{ $review['review_types'] }}
                            </span>
                        </div>

                        <!-- Review Body -->
                        <p class="text-gray-700 text-sm sm:text-base md:text-sm leading-relaxed font-medium mb-4 break-words">
                            "{{ $review['desc'] }}"
                        </p>

                        <!-- Divider -->
                        <div class="h-px w-full bg-gray-100 mb-3"></div>

                        <!-- User Information Footer -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs">
                            <div>
                                <h4 class="text-[#F79633] text-base sm:text-lg font-bold leading-tight">
                                    {{ $review['fullname'] ?? 'Jane Doe' }}
                                </h4>
                                <p class="text-gray-500 text-sm sm:text-md mt-0.5">
                                    {{ $review['posts'] ?? 'Verified Customer' }}
                                </p>
                            </div>

                            <!-- Optional Verification Badge / Date -->
                            <span class="inline-flex items-center justify-center sm:justify-start gap-1 text-[11px] font-semibold text-[#8fc74a]">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Verified Purchase
                            </span>
                        </div>
                    </div>
                </div>
                @else
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <div class="flex items-center gap-1 text-[#F79633] text-sm">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="{{ $i <= ($review['review_rated'] ?? 0) ? 'text-[#F79633]' : 'text-gray-300' }}">
                            ★
                            </span>
                            @endfor
                    </div>

                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-[#8fc74a]/15 text-[#8fc74a] border border-[#8fc74a]/30">
                        {{ $review['review_types'] }}
                    </span>
                </div>

                <p class="text-gray-700 {{ ($review['pin'] ?? 0) == 1 ? 'text-md' : 'text-sm sm:text-xs' }} leading-relaxed font-medium mt-4 break-words">
                    "{{ $review['desc'] }}"
                </p>

                <div class="mt-6 pt-6 border-t border-[#8fc74a]/20 flex flex-col items-start justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                        <img
                            src="{{ $review['image'] ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=120' }}"
                            alt="{{ $review['fullname'] }}"
                            class="w-11 h-11 rounded-full object-cover ring-2 ring-[#8fc74a] shrink-0" />

                        <div class="min-w-0">
                            <h4 class="text-sm font-semibold text-[#F79633] truncate">
                                {{ $review['fullname'] }}
                            </h4>

                            <p class="text-xs text-gray-500 truncate">
                                {{ $review['posts'] }}
                            </p>
                        </div>
                    </div>

                    <span class="text-xs text-gray-400">
                        {{ \Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}
                    </span>
                </div>
                @endif
            </div>
            @endforeach

        </div>
    </section>
    <section class="space-y-8 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <h2 class="text-2xl mt-4 sm:text-4xl font-extrabold  text-[#8FC74A]">
                {{ __('app.support.title') }}
            </h2>
            <p class="text-adaptive-muted text-sm max-w-2xl mx-auto">
                {{ __('app.support.desc') }}
            </p>
        </div>
    </section>
    <section id="support" class="relative overflow-hidden m-4 sm:m-6 md:m-8 p-4 sm:p-3 md:p-4 py-5 sm:py-6 md:py-7 rounded-xl bg-[#8fc74a]/5">
        <div class="mx-auto max-w-7xl backdrop-blur-md">
            <div class="grid gap-6 sm:gap-8 lg:grid-cols-1">
                <!-- <div class="space-y-4 sm:space-y-5">
                    <div class="group rounded-2xl border border-slate-200 bg-white p-4 sm:p-6
                            shadow-sm transition duration-300
                            hover:-translate-y-1 hover:shadow-lg">

                        <div class="flex flex-col sm:flex-row items-center sm:items-center gap-4 sm:gap-5 text-center sm:text-left">

                            <div class="flex h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 shrink-0 items-center justify-center
                                    rounded-xl bg-[#8fc74a]/10 text-[#F79633]
                                    transition group-hover:bg-[#8fc74a] group-hover:text-white">

                                <img src="{{asset('storage/home/support/customerCare.png')}}"
                                    alt=" {{ __('app.support.service') }}"
                                    class="object-contain w-full">
                            </div>

                            <div class="flex-1 min-w-0">
                                <h3 class="!text-xl font-bold text-[#8fc74a]">
                                    {{ __('app.support.service') }}
                                </h3>

                                <p class="mt-1 text-sm leading-6 text-slate-500">
                                    {{ __('app.support.t_care_desc') }}
                                </p>

                                <div class="mt-4 space-y-2 flex flex-col items-center sm:items-start">

                                    <a href="tel:+85512345678"
                                        class="flex items-center gap-2 text-sm font-semibold
                                          text-[#F79633] transition hover:text-[#8fc74a]">
                                        <svg class="h-4 w-4 shrink-0"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                                        </svg>
                                        +855 97 513 5135
                                    </a>

                                    <a href="mailto:support@telnet.com.kh"
                                        class="flex items-center gap-2 text-sm text-slate-500
                                          transition hover:text-[#8fc74a] break-all">
                                        <svg class="h-4 w-4 shrink-0"
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
                    <div class="group rounded-2xl border border-slate-200 bg-white p-4 sm:p-6
                            shadow-sm transition duration-300
                            hover:-translate-y-1 hover:shadow-lg">
                        <div class="flex flex-col sm:flex-row items-center sm:items-center gap-4 sm:gap-5 text-center sm:text-left">
                            <div class="flex h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 shrink-0 items-center justify-center
                                    rounded-xl bg-[#F79633]/10 text-[#F79633]
                                    transition group-hover:bg-[#F79633] group-hover:text-white">

                                <img src="{{asset('storage/home/support/nocSupport.png')}}"
                                    alt=" {{ __('app.support.service') }}"
                                    class="object-contain w-full">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold text-[#8fc74a]">
                                    {{ __('app.support.noc') }}
                                </h3>

                                <p class="mt-1 text-sm leading-6 text-slate-500">
                                    {{ __('app.support.t_noc_desc') }}
                                </p>

                                <div class="mt-4 space-y-2 flex flex-col items-center sm:items-start">

                                    <a href="tel:+85512345678"
                                        class="flex items-center gap-2 text-sm font-semibold
                                          text-[#F79633] transition hover:text-[#8fc74a]">
                                        <svg class="h-4 w-4 shrink-0"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                                        </svg>
                                        +855 97 513 5135
                                    </a>

                                    <a href="mailto:noc@telnet.com.kh"
                                        class="flex items-center gap-2 text-sm text-slate-500
                                          transition hover:text-[#8fc74a] break-all">
                                        <svg class="h-4 w-4 shrink-0"
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
                    <div class="group rounded-2xl border border-slate-200 bg-white p-4 sm:p-6
                            shadow-sm transition duration-300
                            hover:-translate-y-1 hover:shadow-lg">

                        <div class="flex flex-col sm:flex-row items-center sm:items-center gap-4 sm:gap-5 text-center sm:text-left">

                            <div class="flex h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 shrink-0 items-center justify-center
                                    rounded-xl bg-[#F79633]/10 text-[#F79633]
                                    transition group-hover:bg-[#F79633] group-hover:text-white">

                                <img src="{{asset('storage/home/support/salesSupport.png')}}"
                                    alt=" {{ __('app.support.service') }}"
                                    class="object-contain w-full">
                            </div>

                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold text-[#8fc74a]">
                                    {{ __('app.support.sale') }}
                                </h3>

                                <p class="mt-1 text-sm leading-6 text-slate-500">
                                    {{ __('app.support.t_sale_desc') }}
                                </p>

                                <div class="mt-4 space-y-2 flex flex-col items-center sm:items-start">

                                    <a href="tel:+85512345678"
                                        class="flex items-center gap-2 text-sm font-semibold
                                          text-[#F79633] transition hover:text-[#8fc74a]">
                                        <svg class="h-4 w-4 shrink-0"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                                        </svg>
                                        +855 97 513 5135
                                    </a>

                                    <a href="mailto:noc@telnet.com.kh"
                                        class="flex items-center gap-2 text-sm text-slate-500
                                          transition hover:text-[#8fc74a] break-all">
                                        <svg class="h-4 w-4 shrink-0"
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

                </div> -->

                <div class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6 md:p-8
                        shadow-xl">

                    <div class="mb-6 sm:mb-8">
                        <h3 class="mt-2 text-xl sm:text-3xl font-bold text-slate-900 md:text-3xl">
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
                                   focus:border-[#8fc74a] focus:bg-white
                                   focus:ring-2 focus:ring-[#8fc74a]/20">
                        </div>


                        {{-- Email + Phone --}}
                        <div class="grid gap-5 grid-cols-1 sm:grid-cols-2">

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
                                       focus:border-[#8fc74a] focus:bg-white
                                       focus:ring-2 focus:ring-[#8fc74a]/20">
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
                                       focus:border-[#8fc74a] focus:bg-white
                                       focus:ring-2 focus:ring-[#8fc74a]/20">
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
                                   focus:border-[#8fc74a] focus:bg-white
                                   focus:ring-2 focus:ring-[#8fc74a]/20">

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
                                   focus:border-[#8fc74a] focus:bg-white
                                   focus:ring-2 focus:ring-[#8fc74a]/20">{{ old('message') }}</textarea>
                        </div>


                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="group flex w-full items-center justify-center gap-3
                               rounded-xl bg-[#8fc74a]
                               px-5 py-3.5 text-sm sm:text-md font-bold text-white
                               shadow-lg shadow-[#8fc74a]/20
                               transition duration-300
                               hover:-translate-y-0.5
                               hover:bg-[#8fc74a]/90
                               hover:shadow-[#8fc74a]/30">

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