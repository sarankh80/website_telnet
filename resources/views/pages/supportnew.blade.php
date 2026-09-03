@extends('layouts.app')
@section('title', 'ក្រុមការងារ & គាំទ្រ — TELNET CO., LTD.')

@section('content')

@php
$isKm = app()->getLocale() === 'km';

$serviceImage = asset('storage/home/support/saleSupport.png');
$serviceSupportIcon = asset('storage/home/support/serviceSupportIcon.png');

$nocImage = asset('storage/home/support/nocService.png');
$nocImage2 = asset('storage/home/support/nocSupportDiagram.png');
$nocSupportIcon = asset('storage/home/support/nocSupportIcon.png');

$tseLevel = asset('storage/home/support/tse.png');
$nocLevel = asset('storage/home/support/noc.png');
$noc1Level = asset('storage/home/support/noc1.png');

$saleImage = asset('storage/home/support/saleSupport.png');
$saleSupportIcon = asset('storage/home/support/saleSupportIcon.png');
@endphp

{{-- ============================= HERO ============================= --}}
<section class="relative h-[85vh] min-h-[500px] py-16 sm:py-20 border-none overflow-hidden bg-slate-100 flex items-end">
    <img src="{{ asset('storage/home/support/custoemrService1.png') }}"
        alt="Support & Leadership Background"
        class="absolute inset-0 w-full h-full object-cover blur-xs">

    <div class="absolute inset-0 bg-[linear-gradient(to_top_left,rgba(143,199,74,0.85)_0%,rgba(143,199,74,0.55)_25%,rgba(143,199,74,0.2)_65%,transparent_75%)]"></div>

    <div class="relative w-full px-4 sm:px-6 lg:px-8 flex justify-end">
        <div class="flex flex-col items-end text-right max-w-3xl ml-auto">
            <h1 class="text-2xl sm:text-3xl lg:text-5xl font-black text-white mb-1 uppercase tracking-tight leading-none drop-shadow-md">
                {{ __('app.support.title_hero') }}
            </h1>
            <h1 class="text-3xl sm:text-5xl lg:text-7xl font-black text-white uppercase mb-4 tracking-tight leading-none drop-shadow-md">
                {{ __('app.support.title_hero_1') }}
            </h1>
            <p class="text-white text-sm sm:text-base lg:text-lg max-w-lg text-justify drop-shadow">
                {{ __('app.support.commit') }}
            </p>
        </div>
    </div>
</section>

{{-- ============================= INTRO ============================= --}}
<section class="mx-4 sm:mx-6 md:mx-8 mt-10 mb-6">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl sm:text-3xl font-semibold capitalize border-b-2 border-[#8fc74a] text-[#8fc74a] pb-4 mb-3">
            {{ __('app.support.hook') }}
        </h2>
        <p class="text-sm text-[#444] max-w-4xl text-justify !leading-relaxed">
            {{ __('app.support.hook_desc') }}
        </p>
    </div>
</section>

{{-- ===================== SUPPORT CHANNELS (Service / Sales) ===================== --}}
<section class="mx-4 sm:mx-6 md:mx-8 mb-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6">

        {{-- Banner image --}}
        <div data-animate="fade-up" class="lg:col-span-4 min-h-[280px] rounded-2xl overflow-hidden shadow-xl shadow-[#8fc74a]/20 opacity-0 translate-y-8 transition-all duration-300 hover:scale-[0.98] ease-out">
            <img src="{{ $serviceImage }}" alt="Customer Service" class="w-full h-full object-cover">
        </div>

        <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-6">

            {{-- Customer Service --}}
            <div data-animate="fade-up" class="bg-white p-6 md:p-8 rounded-2xl shadow-xl shadow-[#8fc74a]/20 flex flex-col justify-center opacity-0 translate-y-8 transition-all duration-300 hover:scale-[0.98] ease-out">
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ $serviceSupportIcon }}" class="h-12 w-12 object-cover" alt="{{ __('app.support.service') }}">
                    <h3 class="text-2xl font-bold text-[#8fc74a] uppercase">{{ __('app.support.service') }}</h3>
                </div>

                <h4 class="text-lg font-semibold text-[#F79633] mb-2">{{ __('app.support.service_slogan1') }}</h4>
                <p class="leading-relaxed text-sm text-gray-600 mb-4">{{ __('app.support.service_desc1') }}</p>

                <div class="mt-auto pt-4 border-t border-slate-100 space-y-1">
                    <a href="tel:+855975135135" class="flex items-center gap-2 text-lg font-semibold text-[#F79633] transition hover:text-[#8fc74a]">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                        </svg>
                        +855 97 513 5135
                    </a>
                    <a href="mailto:support@telnet.com.kh" class="flex items-center gap-2 text-sm text-slate-500 transition hover:text-[#8fc74a] break-all">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        support@telnet.com.kh
                    </a>
                </div>
            </div>

            {{-- Sales Support --}}
            <div data-animate="fade-up" class="bg-white p-6 md:p-8 rounded-2xl shadow-xl shadow-[#8fc74a]/20 flex flex-col justify-center opacity-0 translate-y-8 transition-all duration-300 hover:scale-[0.98] ease-out">
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ $saleSupportIcon }}" class="h-12 w-12 object-cover" alt="{{ __('app.support.sale') }}">
                    <h3 class="text-2xl font-bold text-[#8fc74a] uppercase">{{ __('app.support.sale') }}</h3>
                </div>

                <h4 class="text-lg font-semibold text-[#F79633] mb-2">{{ __('app.support.sale_slogan1') }}</h4>
                <p class="leading-relaxed text-sm text-gray-600 mb-4">{{ __('app.support.sale_desc1') }}</p>

                <div class="mt-auto pt-4 border-t border-slate-100 space-y-1">
                    <a href="tel:+855975135135" class="flex items-center gap-2 text-lg font-semibold text-[#F79633] transition hover:text-[#8fc74a]">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                        </svg>
                        +855 97 513 5135
                    </a>
                    <a href="mailto:support@telnet.com.kh" class="flex items-center gap-2 text-sm text-slate-500 transition hover:text-[#8fc74a] break-all">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        support@telnet.com.kh
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================= NOC SECTION ============================= --}}
<section class="mx-4 sm:mx-6 md:mx-8 mb-12 bg-[#8fc74a]/5 rounded-2xl py-10 px-4 sm:px-6 md:px-8">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6">

        {{-- Banner + note --}}
        <div class="lg:col-span-5 flex flex-col gap-5">
            <div data-animate="fade-left" class="rounded-2xl overflow-hidden shadow-xl shadow-[#8fc74a]/20 min-h-[260px] opacity-0 -translate-x-8 transition-all duration-300 hover:scale-[0.98] ease-out">
                <img src="{{ $nocImage }}" alt="NOC Support" class="w-full h-full object-cover">
            </div>
            <div data-animate="fade-up" class="p-2 opacity-0 translate-y-8 transition-all duration-300">
                <h2 class="text-4xl sm:text-5xl font-bold text-[#8fc74a] leading-tight">
                    {{ __('app.support.direct_to') }}
                </h2>
                <p class="text-base font-semibold text-[#F79633] mt-2">
                    {{ __('app.support.direct_to_desc') }}
                </p>
            </div>
        </div>

        <div class="lg:col-span-7 flex flex-col gap-6">

            {{-- NOC info card --}}
            <div data-animate="fade-up" class="bg-white p-6 rounded-2xl shadow-xl shadow-[#8fc74a]/20 opacity-0 translate-y-8 transition-all duration-300 hover:scale-[0.98] ease-out">
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ $nocSupportIcon }}" class="h-10 w-10 object-cover" alt="{{ __('app.support.noc') }}">
                    <h3 class="text-2xl font-bold text-[#8fc74a] uppercase">{{ __('app.support.noc') }}</h3>
                </div>

                <h4 class="text-lg font-semibold text-[#F79633] mb-1">{{ __('app.support.noc_slogan2') }}</h4>
                <p class="leading-relaxed text-sm text-gray-600 mb-4">{{ __('app.support.noc_desc2') }}</p>

                <div class="pt-4 border-t border-slate-100 space-y-1">
                    <a href="tel:+855975135135" class="flex items-center gap-2 text-base font-semibold text-[#F79633] hover:text-[#8fc74a]">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                        </svg>
                        +855 97 513 5135
                    </a>
                    <a href="mailto:noc@telnet.com.kh" class="flex items-center gap-2 text-sm text-gray-500 hover:text-[#8fc74a] break-all">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        noc@telnet.com.kh
                    </a>
                </div>
            </div>

            {{-- Escalation levels: horizontal timeline (visible, no fixed height, mobile-first) --}}
            <div data-animate="fade-up" class="bg-white p-6 rounded-2xl shadow-xl shadow-[#8fc74a]/20 opacity-0 translate-y-8 transition-all duration-300">
                <h4 class="text-sm font-bold uppercase tracking-wider text-slate-400 mb-6">
                    {{ $isKm ? 'ដំណាក់កាលឆ្លើយតប' : 'Escalation Path' }}
                </h4>

                <div class="relative flex flex-col md:flex-row md:items-start gap-8 md:gap-4">
                    {{-- connecting line: vertical on mobile, horizontal on desktop --}}
                    <div class="absolute left-8 top-8 bottom-8 w-0.5 bg-[#F79633]/40 md:left-0 md:right-0 md:top-8 md:bottom-auto md:h-0.5 md:w-auto"></div>

                    {{-- Level 1 --}}
                    <div class="relative z-10 flex md:flex-col items-center gap-4 md:gap-3 md:flex-1 md:text-center">
                        <div class="w-16 h-16 rounded-full border-4 border-[#8fc74a] bg-white flex-shrink-0 overflow-hidden shadow-md">
                            <img src="{{ $tseLevel }}" alt="NOC Team" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-[#F79633]">1<sup>st</sup> Level</p>
                            <h5 class="text-base font-extrabold text-[#8fc74a]">NOC TEAM</h5>
                            <a href="tel:0975135135" class="block text-xs text-slate-600 hover:text-[#F79633]">0975135135</a>
                            <a href="mailto:noc@telnet.com.kh" class="block text-xs text-slate-500 hover:text-[#F79633] break-all">noc@telnet.com.kh</a>
                        </div>
                    </div>

                    {{-- Level 2 --}}
                    <div class="relative z-10 flex md:flex-col items-center gap-4 md:gap-3 md:flex-1 md:text-center">
                        <div class="w-16 h-16 rounded-full border-4 border-[#8fc74a] bg-white flex-shrink-0 overflow-hidden shadow-md">
                            <img src="{{ $nocLevel }}" alt="Head of NOC" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-[#F79633]">2<sup>nd</sup> Level</p>
                            <h5 class="text-base font-extrabold text-[#8fc74a]">HEAD OF NOC</h5>
                            <a href="tel:0888916667" class="block text-xs text-slate-600 hover:text-[#F79633]">0888916667</a>
                            <a href="mailto:ny.savann@telnet.com.kh" class="block text-xs text-slate-500 hover:text-[#F79633] break-all">ny.savann@telnet.com.kh</a>
                        </div>
                    </div>

                    {{-- Level 3 --}}
                    <div class="relative z-10 flex md:flex-col items-center gap-4 md:gap-3 md:flex-1 md:text-center">
                        <div class="w-16 h-16 rounded-full border-4 border-[#8fc74a] bg-white flex-shrink-0 overflow-hidden shadow-md">
                            <img src="{{ $noc1Level }}" alt="Operation & Director" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-[#F79633]">3<sup>rd</sup> Level</p>
                            <h5 class="text-base font-extrabold text-[#8fc74a]">OPERATIONS DIRECTOR</h5>
                            <a href="tel:081687697" class="block text-xs text-slate-600 hover:text-[#F79633]">081687697</a>
                            <a href="mailto:neth.sokunthearith@telnet.com.kh" class="block text-xs text-slate-500 hover:text-[#F79633] break-all">neth.sokunthearith@telnet.com.kh</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================= BRANCHES ============================= --}}
<section class="mx-4 sm:mx-6 md:mx-8 mb-12">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-[#8fc74a]">{{ __('app.support.branches') }}</h2>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($branches as $branch)
            <div class="group relative rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#8fc74a]/30 hover:shadow-lg hover:shadow-[#8fc74a]/10">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#8fc74a]/10 text-[#8fc74a] transition-colors duration-300 group-hover:bg-[#8fc74a]/20 group-hover:text-white">
                        <svg class="w-8 h-8 text-[#F79633]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="2" width="16" height="20" rx="2"></rect>
                            <rect x="7" y="5" width="3" height="3" rx="0.5"></rect>
                            <rect x="14" y="5" width="3" height="3" rx="0.5"></rect>
                            <rect x="7" y="10" width="3" height="3" rx="0.5"></rect>
                            <rect x="14" y="10" width="3" height="3" rx="0.5"></rect>
                            <path d="M10 22v-5h4v5"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#8fc74a] leading-snug">
                        {{ $isKm ? $branch->name_km : $branch->name_en }}
                    </h3>
                </div>

                <p class="mt-3 text-sm text-slate-500 leading-relaxed">
                    {{ $isKm ? $branch->address_km : $branch->address_en }}
                </p>

                <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-[#8fc74a]">
                    <span>{{ $isKm ? 'ទិសដៅផ្លូវ' : 'Get Directions' }}</span>
                    <i class="fa-solid fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
                </div>
            </div>
            @endforeach

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm hover:shadow-md transition">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#F79633]/10 text-[#F79633] mb-4">
                    <i class="fa-solid fa-clock text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900">{{ $isKm ? 'ម៉ោងធ្វើការធម្មតា' : 'Business Hours' }}</h3>
                <ul class="mt-2 space-y-1 text-sm text-slate-500">
                    <li class="flex justify-between"><span>Mon - Fri:</span> <span class="font-medium text-slate-700">8:00 AM - 5:00 PM</span></li>
                    <li class="flex justify-between"><span>Saturday:</span> <span class="font-medium text-slate-700">8:00 AM - 12:00 PM</span></li>
                    <li class="flex justify-between"><span>Sunday:</span> <span class="font-medium text-[#F79633]">NOC Emergency Only</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ============================= CONTACT / REQUEST FORM (single, toggled) ============================= --}}
<section class="mx-4 sm:mx-6 md:mx-8 mb-12">
    <div class="mx-auto max-w-7xl rounded-2xl border border-slate-200 shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-5">

        {{-- Left: context + hotlines --}}
        <div class="lg:col-span-2 bg-[#8fc74a]/5 p-6 sm:p-8 flex flex-col justify-center">
            <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1 text-xs font-semibold text-[#8fc74a] w-max">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#8fc74a] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#8fc74a]"></span>
                </span>
                {{ $isKm ? 'ការឃ្លាំមើលបណ្តាញផ្ទាល់ ២៤/៧' : 'Live 24/7/365 Monitoring' }}
            </span>

            <h2 class="mt-4 text-[#8fc74a] text-2xl sm:text-3xl font-extrabold tracking-tight">
                {{ __('app.support.send') }}
            </h2>
            <p class="mt-2 text-sm text-slate-500 leading-relaxed">
                {{ $isKm ? 'សម្រាប់សំណួរទូទៅ សូមប្រើទម្រង់នេះ។ សម្រាប់បញ្ហាបណ្តាញបន្ទាន់ សូមប្តូរទៅផ្ទាំង "ជំនួយបន្ទាន់"។' : 'Use this form for general questions. For a network outage, switch to the Emergency tab for faster routing.' }}
            </p>

            <div class="mt-6 pt-6 border-t border-slate-200 space-y-3">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                    {{ $isKm ? 'ឬទាក់ទងមកកាន់ hotline ផ្ទាល់' : 'Or Call Hotlines Directly:' }}
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="tel:+855975135135" class="inline-flex items-center gap-2 text-xs font-bold text-slate-700 bg-white hover:bg-[#8fc74a]/10 hover:text-[#8fc74a] px-3 py-2 rounded-lg transition shadow-sm">
                        <i class="fa-solid fa-phone text-[#F79633]"></i>
                        <span>Kh / En: +855 97 513 5135</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Right: toggled form --}}
        <div class="lg:col-span-3 bg-white p-6 sm:p-8">

            {{-- Tabs --}}
            <div class="flex gap-2 mb-6 border-b border-slate-100">
                <button type="button" id="tab-general"
                    class="support-tab active px-4 py-2 text-sm font-semibold rounded-t-lg text-[#8fc74a] border-b-2 border-[#8fc74a]">
                    {{ $isKm ? 'សំណើទូទៅ' : 'General Inquiry' }}
                </button>
                <button type="button" id="tab-emergency"
                    class="support-tab px-4 py-2 text-sm font-semibold rounded-t-lg text-slate-400 border-b-2 border-transparent">
                    {{ $isKm ? 'ជំនួយបន្ទាន់' : 'Emergency Support' }}
                </button>
            </div>

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                @csrf
                <input type="hidden" name="request_type" id="request_type" value="general">

                {{-- Shared: Full Name --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">{{ __('app.support.fullname') }}</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        placeholder="{{ __('app.support.fullname_holder') }}"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder-slate-400 outline-none transition focus:border-[#8fc74a] focus:ring-2 focus:ring-[#8fc74a]/20">
                </div>

                {{-- General-only: Email + Type --}}
                <div id="general-fields" class="space-y-5">
                    <div class="grid gap-5 grid-cols-1 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">{{ __('app.support.email') }}</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="{{ __('app.support.email_holder') }}"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder-slate-400 outline-none transition focus:border-[#8fc74a] focus:ring-2 focus:ring-[#8fc74a]/20">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">{{ __('app.support.tikect_type') }}</label>
                            <select name="type" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-[#8fc74a] focus:ring-2 focus:ring-[#8fc74a]/20">
                                <option value="">{{ __('app.support.select') }}</option>
                                <option value="customer_service">{{ __('app.support.t_care') }}</option>
                                <option value="noc">{{ __('app.support.t_noc') }}</option>
                                <option value="sales">{{ __('app.support.t_sale') }}</option>
                                <option value="billing">{{ __('app.support.t_bill') }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Emergency-only: Customer ID + Address --}}
                <div id="emergency-fields" class="space-y-5 hidden">
                    <div class="grid gap-5 grid-cols-1 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">
                                {{ $isKm ? 'អត្តលេខអតិថិជន' : 'Customer ID' }}
                            </label>
                            <input type="text" name="customer_id" placeholder="e.g., CID-10293"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder-slate-400 outline-none transition focus:border-[#F79633] focus:ring-2 focus:ring-[#F79633]/20">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">
                                {{ $isKm ? 'ភាសាដែលចង់បាន' : 'Preferred Language' }}
                            </label>
                            <select name="language" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-[#F79633] focus:ring-2 focus:ring-[#F79633]/20">
                                <option value="km">{{ $isKm ? 'ភាសាខ្មែរ' : 'Khmer' }}</option>
                                <option value="en" selected>{{ $isKm ? 'អង់គ្លេស' : 'English' }}</option>
                                <option value="zh">{{ $isKm ? 'ចិន (中文)' : 'Chinese (中文)' }}</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            {{ $isKm ? 'អាសយដ្ឋានសេវាកម្ម' : 'Service Address / Location' }}
                        </label>
                        <textarea name="address" rows="2"
                            placeholder="{{ $isKm ? 'ផ្ទះលេខ, ផ្លូវ, ខណ្ឌ/ស្រុក, រាជធានី/ខេត្ត...' : 'House No, St No, Sangkat, Khan, City...' }}"
                            class="w-full resize-none rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder-slate-400 outline-none transition focus:border-[#F79633] focus:ring-2 focus:ring-[#F79633]/20"></textarea>
                    </div>
                </div>

                {{-- Shared: Phone --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">{{ __('app.support.phone') }}</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" required
                        placeholder="{{ __('app.support.phone_holder') }}"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder-slate-400 outline-none transition focus:border-[#8fc74a] focus:ring-2 focus:ring-[#8fc74a]/20">
                </div>

                {{-- Shared: Message --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700" id="message-label">{{ __('app.support.t_desc') }}</label>
                    <textarea name="message" rows="4" required
                        placeholder="{{ __('app.support.t_desc_holder') }}"
                        class="w-full resize-none rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder-slate-400 outline-none transition focus:border-[#8fc74a] focus:ring-2 focus:ring-[#8fc74a]/20">{{ old('message') }}</textarea>
                </div>

                <button type="submit" id="submit-btn"
                    class="group flex w-full items-center justify-center gap-3 rounded-xl bg-[#8fc74a] px-5 py-3.5 text-sm sm:text-md font-bold text-white shadow-lg shadow-[#8fc74a]/20 transition duration-300 hover:-translate-y-0.5 hover:bg-[#8fc74a]/90">
                    <span id="submit-label">{{ __('app.support.send') }}</span>
                    <svg class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</section>

{{-- ============================= FAQ (vanilla JS accordion) ============================= --}}
<section class="mx-4 sm:mx-6 md:mx-8 mb-16">
    <div class="mx-auto max-w-7xl rounded-2xl border border-slate-200 bg-white p-6 sm:p-10 shadow-sm">
        <div class="mb-8 text-center sm:text-left">
            <h2 class="text-2xl font-bold text-slate-900">
                {{ $isKm ? 'សំណួរដែលសួរញឹកញាប់ (FAQ)' : 'Frequently Asked Questions' }}
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                {{ $isKm ? 'ចម្លើយរហ័សចំពោះសំណួរទូទៅអំពីការគាំទ្រ និងសេវាកម្ម' : 'Quick answers to common queries regarding support tickets and network response.' }}
            </p>
        </div>

        <div class="faq-accordion space-y-4">

            @php
            $faqs = [
            [
            'q_km' => 'តើខ្ញុំអាចទាក់ទងសេវាបម្រើអតិថិជនតាមរបៀបណា?',
            'q_en' => 'How can I contact customer service?',
            'a_km' => 'អ្នកអាចទាក់ទងក្រុមការងារបម្រើអតិថិជនតាមរយៈទូរស័ព្ទ អ៊ីមែល ឬបណ្តាញទំនាក់ទំនងផ្លូវការរបស់យើង។ ក្រុមការងាររបស់យើងរីករាយក្នុងការជួយដោះស្រាយសំណួរ និងសំណើរបស់អ្នក។',
            'a_en' => 'You can contact our customer service team by phone, email, or our official communication channels. Our team is ready to assist with your questions, requests, and service needs.',
            ],
            [
            'q_km' => 'តើគុណភាពសេវា (QoS) របស់អ៊ីនធឺណិតត្រូវបានធានាយ៉ាងដូចម្តេច?',
            'q_en' => 'How is Internet Quality of Service (QoS) maintained?',
            'a_km' => 'យើងប្រើប្រាស់បណ្តាញដែលមានស្ថេរភាព ប្រព័ន្ធត្រួតពិនិត្យបណ្តាញ និងការគ្រប់គ្រង Traffic ដើម្បីរក្សាគុណភាព និងប្រសិទ្ធភាពសេវាអ៊ីនធឺណិត។',
            'a_en' => 'We maintain service quality through reliable network infrastructure, continuous network monitoring, traffic management, and proactive performance optimization.',
            ],
            [
            'q_km' => 'តើខ្ញុំអាចបង់ថ្លៃសេវាអ៊ីនធឺណិតតាមវិធីណាខ្លះ?',
            'q_en' => 'What payment methods are available?',
            'a_km' => 'អតិថិជនអាចបង់ថ្លៃសេវាតាមវិធីដែលក្រុមហ៊ុនបានផ្តល់ជូន ដូចជា ធនាគារ Mobile Banking និងបណ្តាញទូទាត់ដែលបានគាំទ្រ។ សូមរក្សាទុកបង្កាន់ដៃសម្រាប់ជាឯកសារយោង។',
            'a_en' => 'Customers can pay their Internet service fees through our supported payment channels, including banking, mobile banking, and other available payment methods. Please keep your payment receipt for reference.',
            ],
            [
            'q_km' => 'តើលក្ខខណ្ឌបង់ថ្លៃសេវាប្រចាំខែមានអ្វីខ្លះ?',
            'q_en' => 'What are the monthly payment terms?',
            'a_km' => 'អតិថិជនត្រូវបង់ថ្លៃសេវាតាមកាលកំណត់ដែលបានបញ្ជាក់ក្នុងវិក្កយបត្រ ឬកិច្ចសន្យាសេវា។ ការយឺតយ៉ាវក្នុងការទូទាត់អាចបណ្តាលឱ្យសេវាត្រូវបានផ្អាកតាមលក្ខខណ្ឌរបស់ក្រុមហ៊ុន។',
            'a_en' => 'Customers are required to pay their monthly service fees according to the due date stated on the invoice or service agreement. Late payment may result in service suspension according to the applicable terms.',
            ],
            [
            'q_km' => 'តើខ្ញុំគួរធ្វើអ្វី ប្រសិនបើអ៊ីនធឺណិតមានបញ្ហា?',
            'q_en' => 'What should I do if my Internet connection has a problem?',
            'a_km' => 'សូមពិនិត្យ Router/ONT និងការតភ្ជាប់ខ្សែជាមុនសិន។ ប្រសិនបើបញ្ហានៅតែបន្ត សូមទាក់ទងក្រុមការងារ Technical Support ដើម្បីធ្វើការត្រួតពិនិត្យ និងដោះស្រាយបញ្ហា។',
            'a_en' => 'Please check your router/ONT and cable connections first. If the issue continues, contact our Technical Support team so we can investigate and resolve the problem.',
            ],
            [
            'q_km' => 'តើក្រុមហ៊ុនមានដំណោះស្រាយបណ្តាញសម្រាប់អាជីវកម្មដែរឬទេ?',
            'q_en' => 'Do you provide network solutions for businesses?',
            'a_km' => 'មាន។ យើងផ្តល់ជូនដំណោះស្រាយបណ្តាញសម្រាប់អាជីវកម្ម និងសហគ្រាស ដូចជា Dedicated Internet, Business Internet, Network Connectivity, Data Services និងដំណោះស្រាយ ICT តាមតម្រូវការ។',
            'a_en' => 'Yes. We provide business and enterprise network solutions including Dedicated Internet, Business Internet, Network Connectivity, Data Services, and customized ICT solutions based on your requirements.',
            ],
            [
            'q_km' => 'តើការដំឡើងសេវាអ៊ីនធឺណិតត្រូវចំណាយពេលប៉ុន្មាន?',
            'q_en' => 'How long does Internet installation take?',
            'a_km' => 'រយៈពេលដំឡើងអាស្រ័យលើទីតាំង ស្ថានភាពបណ្តាញ និងប្រភេទសេវាដែលបានជ្រើសរើស។ ក្រុមការងាររបស់យើងនឹងបញ្ជាក់កាលវិភាគដំឡើងបន្ទាប់ពីការត្រួតពិនិត្យលទ្ធភាពសេវា។',
            'a_en' => 'Installation time depends on your location, network availability, and selected service package. Our team will confirm the installation schedule after checking service feasibility.',
            ],
            [
            'q_km' => 'តើខ្ញុំអាចប្តូរ ឬ Upgrade កញ្ចប់សេវារបស់ខ្ញុំបានទេ?',
            'q_en' => 'Can I change or upgrade my Internet package?',
            'a_km' => 'បាន។ អ្នកអាចស្នើសុំប្តូរ ឬ Upgrade កញ្ចប់សេវារបស់អ្នកទៅកាន់កញ្ចប់ដែលសមស្របជាងមុន។ សូមទាក់ទងក្រុមការងារបម្រើអតិថិជន ដើម្បីពិនិត្យលក្ខខណ្ឌ និងលទ្ធភាពសេវា។',
            'a_en' => 'Yes. You can request to change or upgrade your current package to better match your needs. Contact our customer service team to check the available packages and applicable terms.',
            ],
            ];
            @endphp

            @foreach($faqs as $i => $faq)
            <div class="faq-item rounded-xl border border-[#8fc74a]/20 bg-white overflow-hidden">
                <button type="button" class="faq-trigger flex w-full items-center justify-between p-4 text-left font-semibold text-slate-800 transition hover:bg-[#8fc74a]/5">
                    <span>{{ $isKm ? $faq['q_km'] : $faq['q_en'] }}</span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200 faq-icon"></i>
                </button>
                <div class="faq-panel hidden p-4 pt-0 text-sm text-slate-600 leading-relaxed">
                    {{ $isKm ? $faq['a_km'] : $faq['a_en'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= SCRIPTS (vanilla JS) ============================= --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // --- FAQ accordion (replaces Alpine x-data/x-show/x-collapse) ---
        document.querySelectorAll('.faq-item').forEach(function(item) {
            var trigger = item.querySelector('.faq-trigger');
            var panel = item.querySelector('.faq-panel');
            var icon = item.querySelector('.faq-icon');

            trigger.addEventListener('click', function() {
                var isOpen = !panel.classList.contains('hidden');

                document.querySelectorAll('.faq-panel').forEach(function(p) {
                    p.classList.add('hidden');
                });
                document.querySelectorAll('.faq-icon').forEach(function(ic) {
                    ic.classList.remove('rotate-180');
                });

                if (!isOpen) {
                    panel.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                }
            });
        });

        // --- General / Emergency tab toggle ---
        var tabGeneral = document.getElementById('tab-general');
        var tabEmergency = document.getElementById('tab-emergency');
        var generalFields = document.getElementById('general-fields');
        var emergencyFields = document.getElementById('emergency-fields');
        var requestType = document.getElementById('request_type');
        var messageLabel = document.getElementById('message-label');
        var submitLabel = document.getElementById('submit-label');

        var labels = {
            general: {
                message: @json(__('app.support.t_desc')),
                submit: @json(__('app.support.send'))
            },
            emergency: {
                message: @json($isKm ? 'រាយរាប់ពីបញ្ហា' : 'Describe the Issue'),
                submit: @json($isKm ? 'ផ្ញើសំណើបន្ទាន់' : 'Request Emergency Help')
            }
        };

        function setTab(mode) {
            var isGeneral = mode === 'general';

            tabGeneral.classList.toggle('active', isGeneral);
            tabGeneral.classList.toggle('text-[#8fc74a]', isGeneral);
            tabGeneral.classList.toggle('border-[#8fc74a]', isGeneral);
            tabGeneral.classList.toggle('text-slate-400', !isGeneral);
            tabGeneral.classList.toggle('border-transparent', !isGeneral);

            tabEmergency.classList.toggle('active', !isGeneral);
            tabEmergency.classList.toggle('text-[#F79633]', !isGeneral);
            tabEmergency.classList.toggle('border-[#F79633]', !isGeneral);
            tabEmergency.classList.toggle('text-slate-400', isGeneral);
            tabEmergency.classList.toggle('border-transparent', isGeneral);

            generalFields.classList.toggle('hidden', !isGeneral);
            emergencyFields.classList.toggle('hidden', isGeneral);

            requestType.value = mode;
            messageLabel.textContent = labels[mode].message;
            submitLabel.textContent = labels[mode].submit;
        }

        tabGeneral.addEventListener('click', function() {
            setTab('general');
        });
        tabEmergency.addEventListener('click', function() {
            setTab('emergency');
        });
    });
</script>

@endsection