@extends('layouts.app')
@section('title', 'ក្រុមហ៊ុន​យើង​ខ្ញុំ — TELNET CO., LTD.')

@section('content')
{{-- Company Overview --}}
<section class="relative overflow-hidden py-8 lg:py-16 section-bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-12 gap-12 items-top">
            <div class="lg:col-span-4 min-h-36 w-full border border-[#F79633] shadow-lg rounded rounded-xl">
                <img src="" alt="">
            </div>
            <div class="lg:col-span-8 space-y-6 text-center lg:text-left">
                <h1 class="text-3xl font-bold bg-clip-text gradient-brand sm:text-5xl leading-tight tracking-normal text-adaptive-main lg:leading-snug">
                    <span class="text-transparent bg-clip-text gradient-brand">{{ __('app.about.ceo_message') }}</span>
                </h1>
                <p class="text-adaptive-muted !text-[#777] text-base sm:text-lg max-w-2xl leading-relaxed">
                    {{ __('app.hero.desc') }}
                </p>
            </div>
        </div>
    </div>
</section>
<section class="py-16 section-bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <fieldset class="shadow-xl relative bg-white w-full mx-auto mb-12 rounded-2xl border border-gray-200  backdrop-blur-md p-6 sm:p-8 shadow-sm transition-all duration-300 hover:shadow-md hover:border-[#F79633] dark:hover:border-[#F79633]">
            <!-- Styled Legend / Badge -->
            <legend class="px-4 py-1 mx-auto rounded-full border border-gray-200 bg-[#8fc74a] shadow-xs">
                <p class="text-xl sm:text-2xl font-extrabold text-center text-transparent bg-clip-text text-white tracking-wide">
                    {{ __('app.about.company_background') }}
                </p>
            </legend>

            <div class="text-left flex flex-col items-center">
                <p class="text-[#F79633] text-base sm:text-lg leading-relaxed mt-2">{{ __('app.about.desc_1') }}</p><br>
                <p class="text-[#F79633] text-base sm:text-lg leading-relaxed mt-2">{{ __('app.about.desc_2') }}</p><br>
                <p class="text-[#F79633] text-base sm:text-lg leading-relaxed mt-2">{{ __('app.about.desc_3') }}</p>
            </div>
        </fieldset>
        <div class="text-center max-w-3xl mx-auto mb-12">
            <p class="text-3xl sm:text-3xl font-extrabold text-center text-transparent bg-clip-text gradient-brand">
                {{ __('app.about.company_profile') }}
            </p>
            <img class="w-full" src="{{asset('storage/line.png')}}" alt="">
        </div>

        <div class="flex flex-col lg:flex-row gap-6">

            {{-- LEFT COLUMN: Vision + Mission stacked --}}
            <div class="w-full lg:w-1/2 flex flex-col gap-6">

                {{-- Vision --}}
                <div class="relative [clip-path:polygon(5rem_0,100%_0,100%_100%,calc(100%-8rem)_100%,0_100%,0_5rem)] bg-[#8fc74a] dark:bg-[#8fc74a] p-[1px]">
                    <div class="glass-card shadow-lg p-6 relative overflow-hidden flex flex-col sm:flex-row items-start sm:items-top gap-5 sm:gap-4 [clip-path:polygon(5rem_0,100%_0,100%_100%,calc(100%-8rem)_100%,0_100%,0_5rem)] h-full">
                        <!-- Left Element: White Background Container with Image -->
                        <div class="shrink-0 w-16 h-16 sm:w-64 sm:h-64 rounded-2xl flex items-center justify-center">
                            <img src="{{ asset('storage/OUR VISION.png') }}" alt="Vision" class="w-full h-full object-contain">
                        </div>

                        <!-- Right Element: Content -->
                        <div class="flex-1 min-w-0">
                            <div class="mb-2">
                                <h3 class="text-2xl text-[#8fc74a] font-bold">{{ __('app.about.vision_title') }}</h3>
                                <p class="text-md text-[#F79633] font-bold mt-0.5">{{ __('app.about.vision_subtitle') }}</p>
                            </div>
                            <p class="text-adaptive-muted text-md leading-relaxed text-justify">{{ __('app.about.vision_desc') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Mission --}}
                <div class="relative [clip-path:polygon(0_0,100%_0,100%_7rem,100%_100%,5rem_100%,0_calc(100%-5rem))] bg-[#8fc74a] dark:bg-[#8fc74a] p-[1px]">
                    <div class="glass-card shadow-2xl p-6 relative overflow-hidden flex flex-col sm:flex-row items-start sm:items-center gap-5 sm:gap-6 [clip-path:polygon(0_0,100%_0,100%_7rem,100%_100%,5rem_100%,0_calc(100%-5rem))] h-full">
                        <!-- Left Image Container with Sub Icon on the Bottom Right -->
                        <div class="relative shrink-0 w-16 h-16 sm:w-64 sm:h-64 rounded-2xl flex items-center justify-center p-3">
                            <!-- Main Image -->
                            <img src="{{ asset('storage/Mission.png') }}" alt="Mission" class="w-full h-full object-contain">
                        </div>

                        <!-- Right Element: Content & List -->
                        <div class="flex-1 min-w-0">
                            <div class="mb-3">
                                <h3 class="text-xl font-bold text-[#8fc74a]">{{ __('app.about.mission_title') }}</h3>
                                <p class="text-xs text-[#F79633] font-bold mt-0.5">{{ __('app.about.mission_subtitle') }}</p>
                            </div>

                            <ul class="text-adaptive-muted text-md space-y-2.5">
                                @foreach([
                                __('app.about.mission_item_1'),
                                __('app.about.mission_item_2'),
                                __('app.about.mission_item_3'),
                                __('app.about.mission_item_4'),
                                ] as $item)
                                <li class="flex items-start gap-2">
                                    <i class="fa-solid fa-circle-check text-brand-orange mt-1 flex-shrink-0 text-xs"></i>
                                    <span>{{ $item }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT COLUMN: Core Values --}}
            <div class="w-full lg:w-1/2 relative [clip-path:polygon(0_0,calc(100%-5rem)_0,100%_5rem,100%_calc(100%-5rem),calc(100%-5rem)_100%,0_100%)] bg-[#8fc74a] dark:bg-[#8fc74a] p-[1px]">
                <div class="glass-card justify-center shadow-2xl p-6 relative overflow-hidden [clip-path:polygon(0_0,calc(100%-5rem)_0,100%_5rem,100%_calc(100%-5rem),calc(100%-5rem)_100%,0_100%)] h-full w-full flex flex-col md:flex-row items-center gap-6 md:gap-12">

                    <!-- Left Central Badge: "CORE VALUE" -->
                    <div class="relative z-10 flex-shrink-0 w-36 h-36 md:w-44 md:h-44 rounded-full border-4 border-[#8fc74a] bg-white flex flex-col items-center justify-center p-4 text-center shadow-lg">
                        <span class="text-[#8fc74a] font-black text-xl md:text-2xl uppercase tracking-wider leading-tight">Core</span>
                        <span class="text-[#F79633] font-black text-xl md:text-2xl uppercase tracking-wider leading-tight">Value</span>
                    </div>

                    <!-- Right Side Items Container with Connecting Lines overlay -->
                    <div class="relative flex-1 flex flex-col gap-3 w-full">

                        <!-- Dynamic Connecting Lines SVG Overlay (visible on desktop md+) -->
                        <svg class="hidden md:block absolute -left-12 top-0 w-12 h-full pointer-events-none z-0"
                            preserveAspectRatio="none"
                            viewBox="0 0 48 400"
                            fill="none"
                            stroke="#8fc74a"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <!-- Branch 1 (Top) -->
                            <path d="M 0 200 L 16 200 L 32 25 L 48 25" />
                            <!-- Branch 2 -->
                            <path d="M 0 200 L 16 200 L 32 75 L 48 75" />
                            <!-- Branch 3 -->
                            <path d="M 0 200 L 16 200 L 32 125 L 48 125" />
                            <!-- Branch 4 -->
                            <path d="M 0 200 L 16 200 L 32 175 L 48 175" />
                            <!-- Branch 5 -->
                            <path d="M 0 200 L 16 200 L 32 225 L 48 225" />
                            <!-- Branch 6 -->
                            <path d="M 0 200 L 16 200 L 32 275 L 48 275" />
                            <!-- Branch 7 -->
                            <path d="M 0 200 L 16 200 L 32 325 L 48 325" />
                            <!-- Branch 8 (Bottom) -->
                            <path d="M 0 200 L 16 200 L 32 375 L 48 375" />
                        </svg>

                        <!-- Item 1 -->
                        <div class="relative z-10 flex items-center bg-white dark:bg-white border border-[#F79633] rounded-r-2xl rounded-l-full shadow-md pr-4 py-1.5 transition-transform hover:translate-x-1">
                            <div class="w-12 h-12 rounded-full border border-[#F79633] bg-emerald-50 dark:bg-white flex items-center justify-center flex-shrink-0 -ml-1 text-[#8fc74a]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-bold text-[#8fc74a] text-sm md:text-base">Deliver Reliable Connectivity</span>
                        </div>

                        <!-- Item 2 -->
                        <div class="relative z-10 flex items-center bg-white dark:bg-white border border-[#F79633] rounded-r-2xl rounded-l-full shadow-md pr-4 py-1.5 transition-transform hover:translate-x-1">
                            <div class="w-12 h-12 rounded-full border border-[#F79633] bg-emerald-50 dark:bg-white flex items-center justify-center flex-shrink-0 -ml-1 text-[#8fc74a]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-bold text-[#8fc74a] text-sm md:text-base">Customer-First Commitment</span>
                        </div>

                        <!-- Item 3 -->
                        <div class="relative z-10 flex items-center bg-white dark:bg-white border border-[#F79633] rounded-r-2xl rounded-l-full shadow-md pr-4 py-1.5 transition-transform hover:translate-x-1">
                            <div class="w-12 h-12 rounded-full border border-[#F79633] bg-emerald-50 dark:bg-white flex items-center justify-center flex-shrink-0 -ml-1 text-[#8fc74a]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-bold text-[#8fc74a] text-sm md:text-base">Operational & Technical Excellence</span>
                        </div>

                        <!-- Item 4 -->
                        <div class="relative z-10 flex items-center bg-white dark:bg-white border border-[#F79633] rounded-r-2xl rounded-l-full shadow-md pr-4 py-1.5 transition-transform hover:translate-x-1">
                            <div class="w-12 h-12 rounded-full border border-[#F79633] bg-emerald-50 dark:bg-white flex items-center justify-center flex-shrink-0 -ml-1 text-[#8fc74a]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-bold text-[#8fc74a] text-sm md:text-base">Innovation & Technology Leadership</span>
                        </div>

                        <!-- Item 5 -->
                        <div class="relative z-10 flex items-center bg-white dark:bg-white border border-[#F79633] rounded-r-2xl rounded-l-full shadow-md pr-4 py-1.5 transition-transform hover:translate-x-1">
                            <div class="w-12 h-12 rounded-full border border-[#F79633] bg-emerald-50 dark:bg-white flex items-center justify-center flex-shrink-0 -ml-1 text-[#8fc74a]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-bold text-[#8fc74a] text-sm md:text-base">Professional The Right Team</span>
                        </div>

                        <!-- Item 6 -->
                        <div class="relative z-10 flex items-center bg-white dark:bg-white border border-[#F79633] rounded-r-2xl rounded-l-full shadow-md pr-4 py-1.5 transition-transform hover:translate-x-1">
                            <div class="w-12 h-12 rounded-full border border-[#F79633] bg-emerald-50 dark:bg-white flex items-center justify-center flex-shrink-0 -ml-1 text-[#8fc74a]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-bold text-[#8fc74a] text-sm md:text-base">Integrity & Positive Attitude</span>
                        </div>

                        <!-- Item 7 -->
                        <div class="relative z-10 flex items-center bg-white dark:bg-white border border-[#F79633] rounded-r-2xl rounded-l-full shadow-md pr-4 py-1.5 transition-transform hover:translate-x-1">
                            <div class="w-12 h-12 rounded-full border border-[#F79633] bg-emerald-50 dark:bg-white flex items-center justify-center flex-shrink-0 -ml-1 text-[#8fc74a]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-bold text-[#8fc74a] text-sm md:text-base">Lifelong Learning</span>
                        </div>

                        <!-- Item 8 -->
                        <div class="relative z-10 flex items-center bg-white dark:bg-white border border-[#F79633] rounded-r-2xl rounded-l-full shadow-md pr-4 py-1.5 transition-transform hover:translate-x-1">
                            <div class="w-12 h-12 rounded-full border border-[#F79633] bg-emerald-50 dark:bg-white flex items-center justify-center flex-shrink-0 -ml-1 text-[#8fc74a]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-bold text-[#8fc74a] text-sm md:text-base">Community & National Development</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        {{-- Core Values --}}
        <div>
            <h3 class="text-center text-lg font-bold text-adaptive-main mb-8">{{ __('app.about.values_title') }}</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @php
                $isKm = app()->getLocale() === 'km';
                $coreValues = [
                ['icon'=>'fa-network-wired','color'=>'brand-green', 'km'=>'1. ការតភ្ជាប់ដែលអាចទុកចិត្តបាន','en'=>'1. Reliable Connectivity', 'dk'=>'ផ្តល់សេវាអ៉ីនធឺណិតដែលមានស្ថេរភាពឥតរអាក់រអួល។', 'de'=>'Ensure seamless, stable internet service for all users.'],
                ['icon'=>'fa-user-gear', 'color'=>'brand-orange','km'=>'2. អតិថិជនជាចម្បង', 'en'=>'2. Customer First', 'dk'=>'ការប្តេជ្ញាចិត្តខ្ពស់ក្នុងការបម្រើតម្រូវការរបស់អតិថិជន។', 'de'=>'Dedicated commitment to serving every customer need.'],
                ['icon'=>'fa-award', 'color'=>'brand-green', 'km'=>'3. ភាពឆ្នើមផ្នែកប្រតិបត្តិការ', 'en'=>'3. Operational Excellence', 'dk'=>'រក្សាស្តង់ដារបច្ចេកទេស និងប្រតិបត្តិការកម្រិតខ្ពស់។', 'de'=>'Maintain rigorous technical and operational standards.'],
                ['icon'=>'fa-lightbulb', 'color'=>'brand-orange','km'=>'4. នវានុវត្តន៍បច្ចេកវិទ្យា', 'en'=>'4. Technological Innovation', 'dk'=>'ដឹកនាំក្នុងការប្រើប្រាស់បច្ចេកវិទ្យាឌីជីថលថ្មីៗ។', 'de'=>'Lead the adoption of modern digital tech solutions.'],
                ['icon'=>'fa-users', 'color'=>'brand-green', 'km'=>'5. ក្រុមការងារមានវិជ្ជាជីវៈ', 'en'=>'5. Professional Team', 'dk'=>'សមត្ថភាពខ្ពស់ និងការសហការគ្នាយ៉ាងជិតស្និទ្ធ។', 'de'=>'High competence and close team collaboration.'],
                ['icon'=>'fa-shield-heart', 'color'=>'brand-orange','km'=>'6. សុចរិតភាព និងឥរិយាបថ', 'en'=>'6. Integrity & Ethics', 'dk'=>'ប្រកាន់ខ្ជាប់នូវភាពស្មោះត្រង់ និងឥរិយាបថវិជ្ជមាន។', 'de'=>'Uphold honesty and positive professional ethics.'],
                ['icon'=>'fa-graduation-cap','color'=>'brand-green','km'=>'7. ការរៀនសូត្រពេញមួយជីវិត', 'en'=>'7. Lifelong Learning', 'dk'=>'អភិវឌ្ឍចំណេះដឹង និងជំនាញបច្ចេកទេសជាប្រចាំ។', 'de'=>'Continuously develop knowledge and technical skills.'],
                ['icon'=>'fa-building-flag','color'=>'brand-orange','km'=>'8. អភិវឌ្ឍសហគមន៍ និងជាតិ', 'en'=>'8. Community & Nation Building','dk'=>'ចូលរួមចំណែកក្នុងការអភិវឌ្ឍសង្គម និងសេដ្ឋកិច្ចឌីជីថល។', 'de'=>'Contribute to social development and digital economy.'],
                ]; @endphp
                @foreach($coreValues as $val)
                <div class="glass-card p-5 rounded-xl border border-gray-200 dark:border-gray-800 glass-card-hover">
                    <div class="text-{{ $val['color'] }} text-2xl mb-3"><i class="fa-solid {{ $val['icon'] }}"></i></div>
                    <h4 class="font-bold text-adaptive-main text-sm mb-1">{{ $isKm ? $val['km'] : $val['en'] }}</h4>
                    <p class="text-xs text-adaptive-muted">{{ $isKm ? $val['dk'] : $val['de'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-14 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20 ">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-5">
        <h2 class="text-2xl font-extrabold text-adaptive-main">{{ __('app.about.connect_cta') }}</h2>
        <button onclick="openModal('serviceModal')"
            class="inline-flex items-center gap-2 gradient-brand text-white font-bold px-8 py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5">
            <i class="fa-solid fa-paper-plane"></i>
            <span>{{ __('app.about.request_internet') }}</span>
        </button>
    </div>
</section>

{{-- ── Job Openings ─────────────────────────────────────────────────── --}}
<section class="py-16 section-bg-primary" id="jobs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-transparent bg-clip-text gradient-brand">
                {{ app()->getLocale() === 'km' ? 'ឱកាសការងារ' : 'Job Openings' }}
            </h2>
            <img class="w-48 mx-auto mt-1" src="{{ asset('storage/line.png') }}" alt="">
        </div>

        @if($careers->isEmpty())
            <div class="text-center py-12 text-adaptive-muted">
                <i class="fa-solid fa-briefcase text-4xl mb-4 text-brand-green/40 block"></i>
                <p class="text-lg">{{ app()->getLocale() === 'km' ? 'មិនមានតំណែងបើកចំហរពេលនេះ' : 'No open positions at the moment.' }}</p>
                <p class="text-sm mt-2">{{ app()->getLocale() === 'km' ? 'ផ្ញើ CV របស់អ្នកខាងក្រោម' : 'Send us your CV below and we\'ll be in touch.' }}</p>
            </div>
        @else
            <div class="grid gap-4 lg:grid-cols-2 mb-12">
                @foreach($careers as $job)
                    @php
                        $isKm = app()->getLocale() === 'km';
                        $typeColor = match($job->type) {
                            'full-time'  => 'bg-brand-green/10 text-brand-green border-brand-green/20',
                            'part-time'  => 'bg-sky-500/10 text-sky-600 border-sky-200',
                            'contract'   => 'bg-orange-400/10 text-brand-orange border-brand-orange/20',
                            'internship' => 'bg-violet-500/10 text-violet-600 border-violet-200',
                            default      => 'bg-gray-100 text-gray-600 border-gray-200',
                        };
                        $typeLabel = match($job->type) {
                            'full-time'  => $isKm ? 'ពេញម៉ោង' : 'Full-Time',
                            'part-time'  => $isKm ? 'កន្លះម៉ោង' : 'Part-Time',
                            'contract'   => $isKm ? 'កិច្ចសន្យា' : 'Contract',
                            'internship' => $isKm ? 'ហាត់ការ' : 'Internship',
                            default      => $job->type,
                        };
                    @endphp
                    <div class="glass-card rounded-2xl border border-gray-200 dark:border-gray-700 p-6 hover:shadow-lg transition-all duration-300 hover:border-brand-green/40"
                         x-data="{ open: false }">
                        <div class="flex items-start justify-between gap-3 mb-3">
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold text-adaptive-main">
                                    {{ $isKm ? $job->title_km : $job->title }}
                                </h3>
                                @if($isKm ? $job->department_km : $job->department)
                                    <p class="text-sm text-adaptive-muted mt-0.5">
                                        {{ $isKm ? $job->department_km : $job->department }}
                                    </p>
                                @endif
                            </div>
                            <span class="flex-shrink-0 px-2.5 py-1 text-xs font-semibold rounded-full border {{ $typeColor }}">
                                {{ $typeLabel }}
                            </span>
                        </div>

                        <div class="flex flex-wrap gap-4 text-xs text-adaptive-muted mb-4">
                            @if($isKm ? $job->location_km : $job->location)
                                <span class="flex items-center gap-1">
                                    <i class="fa-solid fa-location-dot text-brand-orange"></i>
                                    {{ $isKm ? $job->location_km : $job->location }}
                                </span>
                            @endif
                            @if($job->deadline)
                                <span class="flex items-center gap-1">
                                    <i class="fa-solid fa-calendar text-brand-green"></i>
                                    {{ $isKm ? 'ថ្ងៃផុតកំណត់' : 'Deadline' }}: {{ $job->deadline->format('d M Y') }}
                                </span>
                            @endif
                        </div>

                        @if($isKm ? $job->description_km : $job->description)
                            <div x-show="open" x-collapse class="prose prose-sm max-w-none text-adaptive-muted mb-4 text-sm leading-relaxed">
                                {!! $isKm ? $job->description_km : $job->description !!}
                            </div>
                            @if($isKm ? $job->requirements_km : $job->requirements)
                                <div x-show="open" x-collapse class="prose prose-sm max-w-none text-adaptive-muted mb-4 text-sm leading-relaxed border-t border-gray-200 dark:border-gray-700 pt-3 mt-3">
                                    <p class="font-semibold text-adaptive-main text-xs uppercase tracking-wide mb-2">
                                        {{ $isKm ? 'លក្ខខណ្ឌ' : 'Requirements' }}
                                    </p>
                                    {!! $isKm ? $job->requirements_km : $job->requirements !!}
                                </div>
                            @endif
                        @endif

                        <div class="flex items-center justify-between pt-2 border-t border-gray-100 dark:border-gray-800">
                            @if($isKm ? $job->description_km : $job->description)
                                <button @click="open = !open"
                                        class="text-xs text-brand-green hover:text-[#7ab534] font-medium flex items-center gap-1 transition">
                                    <span x-text="open ? '{{ $isKm ? 'បិទ' : 'Show less' }}' : '{{ $isKm ? 'មើលលម្អិត' : 'View details' }}'"></span>
                                    <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                                </button>
                            @else
                                <span></span>
                            @endif
                            <a href="#apply?job={{ $job->id }}"
                               onclick="document.getElementById('apply').scrollIntoView({behavior:'smooth'}); document.getElementById('career_id').value='{{ $job->id }}'"
                               class="px-4 py-2 gradient-brand text-white text-xs font-semibold rounded-lg shadow transition hover:-translate-y-0.5">
                                {{ $isKm ? 'ដាក់ពាក្យ' : 'Apply Now' }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Application Form --}}
        <div id="apply" class="max-w-2xl mx-auto">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-adaptive-main">
                    {{ app()->getLocale() === 'km' ? 'ដាក់ពាក្យ / បញ្ជូន CV' : 'Apply / Send Your CV' }}
                </h3>
                <p class="text-sm text-adaptive-muted mt-1">
                    {{ app()->getLocale() === 'km' ? 'បំពេញព័ត៌មានខាងក្រោម ហើយបណ្ណូបសំព័ន្ធ CV (PDF/DOC)' : 'Fill in your details and attach your CV (PDF or DOC).' }}
                </p>
            </div>

            @if(session('apply_success'))
                <div class="mb-6 flex items-start gap-3 p-4 bg-brand-green/10 border border-brand-green/30 rounded-xl text-brand-green">
                    <i class="fa-solid fa-circle-check text-xl flex-shrink-0 mt-0.5"></i>
                    <div>
                        <p class="font-semibold">{{ app()->getLocale() === 'km' ? 'សំណើរត្រូវបានផ្ញើ!' : 'Application submitted!' }}</p>
                        <p class="text-sm mt-0.5 text-brand-green/80">{{ app()->getLocale() === 'km' ? 'យើងនឹងទំនាក់ទំនងមកអ្នក។' : 'We\'ll review it and get back to you.' }}</p>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-600 text-sm space-y-1">
                    @foreach($errors->all() as $e)<p>• {{ $e }}</p>@endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('career.apply') }}" enctype="multipart/form-data"
                  class="glass-card rounded-2xl border border-gray-200 dark:border-gray-700 p-6 sm:p-8 space-y-5 shadow-lg">
                @csrf

                <input type="hidden" name="career_id" id="career_id" value="{{ old('career_id') }}">

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-adaptive-main mb-1.5">
                            {{ app()->getLocale() === 'km' ? 'ឈ្មោះពេញ *' : 'Full Name *' }}
                        </label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" required
                               class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-card
                                      px-4 py-2.5 text-sm text-adaptive-main focus:outline-none focus:ring-2 focus:ring-brand-green/40 focus:border-brand-green transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-adaptive-main mb-1.5">
                            {{ app()->getLocale() === 'km' ? 'អ៊ីម៉ែល *' : 'Email *' }}
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-card
                                      px-4 py-2.5 text-sm text-adaptive-main focus:outline-none focus:ring-2 focus:ring-brand-green/40 focus:border-brand-green transition">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-adaptive-main mb-1.5">
                            {{ app()->getLocale() === 'km' ? 'លេខទូរស័ព្ទ' : 'Phone' }}
                        </label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+855 ..."
                               class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-card
                                      px-4 py-2.5 text-sm text-adaptive-main focus:outline-none focus:ring-2 focus:ring-brand-green/40 focus:border-brand-green transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-adaptive-main mb-1.5">
                            {{ app()->getLocale() === 'km' ? 'តំណែងដែលចង់បាន' : 'Position Applied For' }}
                        </label>
                        <input type="text" name="position" value="{{ old('position') }}"
                               placeholder="{{ app()->getLocale() === 'km' ? 'ឧ. វិស្វករបណ្តាញ' : 'e.g. Network Engineer' }}"
                               class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-card
                                      px-4 py-2.5 text-sm text-adaptive-main focus:outline-none focus:ring-2 focus:ring-brand-green/40 focus:border-brand-green transition">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-adaptive-main mb-1.5">
                        {{ app()->getLocale() === 'km' ? 'សំណេរបន្ថែម' : 'Cover Letter' }}
                    </label>
                    <textarea name="cover_letter" rows="4"
                              placeholder="{{ app()->getLocale() === 'km' ? 'ពណ៌នាខ្លួនឯង...' : 'Tell us about yourself and why you\'re a great fit...' }}"
                              class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-dark-card
                                     px-4 py-2.5 text-sm text-adaptive-main focus:outline-none focus:ring-2 focus:ring-brand-green/40 focus:border-brand-green transition resize-none">{{ old('cover_letter') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-adaptive-main mb-1.5">
                        {{ app()->getLocale() === 'km' ? 'ឯកសារ CV *' : 'CV / Resume *' }}
                    </label>
                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-600
                                  rounded-xl cursor-pointer hover:border-brand-green/60 bg-gray-50 dark:bg-dark-card transition-colors">
                        <div class="flex flex-col items-center gap-2 pointer-events-none" id="cv-label">
                            <i class="fa-solid fa-cloud-arrow-up text-2xl text-brand-green/60"></i>
                            <p class="text-sm text-adaptive-muted">
                                {{ app()->getLocale() === 'km' ? 'ចុចដើម្បីជ្រើសរើសឯកសារ' : 'Click to upload' }}
                                <span class="text-xs">(PDF, DOC, DOCX — max 5 MB)</span>
                            </p>
                        </div>
                        <input type="file" name="cv" accept=".pdf,.doc,.docx" required class="hidden"
                               onchange="document.getElementById('cv-label').innerHTML='<i class=\'fa-solid fa-file-check text-2xl text-brand-green\'></i><p class=\'text-sm font-medium text-brand-green mt-1\'>' + this.files[0].name + '</p>'">
                    </label>
                </div>

                <button type="submit"
                        class="w-full gradient-brand text-white font-bold py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i>
                    {{ app()->getLocale() === 'km' ? 'ផ្ញើពាក្យសុំ' : 'Submit Application' }}
                </button>
            </form>
        </div>
    </div>
</section>

@endsection
