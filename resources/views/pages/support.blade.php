@extends('layouts.app')
@section('title', 'ក្រុមការងារ & គាំទ្រ — TELNET CO., LTD.')

@section('content')

@php
$isKm = app()->getLocale() === 'km';
$serviceImage=asset("storage/home/support/saleSupport.png");
$serviceSupportIcon=asset("storage/home/support/serviceSupportIcon.png");

$nocImage=asset("storage/home/support/nocService.png");
$nocImage2=asset("storage/home/support/nocSupportDiagram.png");
$nocSupportIcon=asset('storage/home/support/nocSupportIcon.png');
$tseLevel=asset('storage/home/support/tse.png');
$nocLevel=asset('storage/home/support/noc.png');
$noc1Level=asset('storage/home/support/noc1.png');


$saleImage=asset("storage/home/support/saleSupport.png");
$saleSupportIcon=asset("storage/home/support/saleSupportIcon.png");
@endphp

<section class="relative h-[85vh] min-h-[500px] py-16 sm:py-20 border-none overflow-hidden bg-slate-100 flex items-end">

    {{-- Background Image --}}
    <img src="{{ asset('storage/home/support/custoemrService1.png') }}"
        alt="Support & Leadership Background"
        class="absolute inset-0 w-full h-full object-cover blur-xs">

    {{-- Bottom-right → Middle gradient --}}
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
<section class="mx-4 sm:mx-6 md:mx-8 my-8 bg-[#8fc74a]/5 py-8">
    <div class="grid grid-cols-1 md:grid-cols-10 mx-auto gap-6 max-w-7xl">
        <div data-animate="fade-up" class="md:col-span-6 hover:scale-95 bg-white p-6 md:p-8 rounded-2xl shadow-xl shadow-[#8fc74a]/20 flex flex-col justify-center opacity-0 translate-y-8 transition-all duration-300 hover:scale-95 ease-out">
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ $serviceSupportIcon }}" class="h-12 w-12 object-cover" alt="{{ __('app.support.service') }}">
                <h1 class="text-3xl font-bold text-[#8fc74a] uppercase">
                    {{ __('app.support.service') }}
                </h1>
            </div>
            <div class="space-y-5">
                <div>
                    <h2 class="text-xl font-semibold text-[#F79633] mb-2 w-max bg-[#]">
                        {{ __('app.support.service_slogan1') }}
                    </h2>
                    <p class="leading-relaxed text-sm text-gray-600">
                        {{ __('app.support.service_desc1') }}
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-[#F79633] mb-2 w-max px-4 rounded-full border border-[#F79633]/30 bg-[#F79633]/10">
                        {{ __('app.support.service_contacts') }}
                    </h2>
                    <div class="mt-4 space-y-1 flex flex-col items-center sm:items-start">
                        <a href="tel:+855975135135"
                            class="flex items-center gap-2 text-xl font-semibold text-[#F79633] transition hover:text-[#8fc74a]">
                            <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                            </svg>
                            +855 97 513 5135
                        </a>

                        <a href="mailto:support@telnet.com.kh"
                            class="flex items-center gap-2 text-xl text-slate-500 transition hover:text-[#8fc74a] break-all">
                            <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            support@telnet.com.kh
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div data-animate="fade-up" class="md:col-span-4 hover:scale-95 md:row-span-2 rounded-lg overflow-hidden min-h-[280px] opacity-0 translate-x-8 transition-all duration-300 hover:scale-95 ease-out">
            <img
                src="{{ $serviceImage }}"
                alt="Customer Service"
                class="w-full h-full object-cover">
        </div>

        <div data-animate="fade-up" class="md:col-span-6 hover:scale-95 bg-white p-6 md:p-8 rounded-2xl shadow-xl shadow-[#8fc74a]/20 flex flex-col justify-center opacity-0 translate-y-8 transition-all duration-300 hover:scale-95 ease-out">
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ $saleSupportIcon }}" class="h-12 w-12 object-cover" alt="{{ __('app.support.sale') }}">
                <h1 class="text-3xl font-bold text-[#8fc74a] uppercase">
                    {{ __('app.support.sale') }}
                </h1>
            </div>

            <div class="space-y-5">
                <div>
                    <h2 class="text-xl font-semibold text-[#F79633] mb-2 w-max bg-[#]">
                        {{ __('app.support.sale_slogan1') }}
                    </h2>
                    <p class="leading-relaxed text-sm text-gray-600">
                        {{ __('app.support.sale_desc1') }}
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-[#F79633] mb-2 w-max  px-4 rounded-full border border-[#F79633]/30 bg-[#F79633]/10">
                        {{ __('app.support.sale_contact') }}
                    </h2>
                    <div class="mt-4 space-y-1 flex flex-col items-center sm:items-start">
                        <a href="tel:+855975135135"
                            class="flex items-center gap-2 text-xl font-semibold text-[#F79633] transition hover:text-[#8fc74a]">
                            <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                            </svg>
                            +855 97 513 5135
                        </a>

                        <a href="mailto:support@telnet.com.kh"
                            class="flex items-center gap-2 text-xl text-slate-500 transition hover:text-[#8fc74a] break-all">
                            <svg class="h-6 w-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            noc@telnet.com.kh
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-10 gap-5 max-w-7xl mx-auto mt-6 md:h-[1100px]">

        <!-- LEFT: NOC IMAGE 70% + NOC NOTE 30% -->
        <div class="md:col-span-4 flex flex-col gap-5 min-h-0">

            <!-- NOC IMAGE -->
            <div
                data-animate="fade-left"
                class="flex-[7] min-h-0 rounded-2xl overflow-hidden shadow-xl shadow-[#8fc74a]/20 opacity-0 -translate-x-8 transition-all duration-300 hover:scale-[0.98] ease-out">
                <img
                    src="{{ $nocImage }}"
                    alt="NOC Support"
                    class="w-full h-full object-cover">
            </div>

            <!-- NOC NOTE -->
            <div
                data-animate="fade-up"
                class="flex-[3] min-h-0 p-5 md:p-6 flex flex-col justify-center opacity-0 translate-y-8">
                <div class="flex items-center gap-3 mb-3">

                    <h2 class="text-6xl font-bold text-[#8fc74a]">
                        {{ __('app.support.direct_to') }}
                    </h2>
                </div>

                <h3 class="text-lg font-semibold text-[#F79633] mb-1">
                    {{ __('app.support.direct_to_desc') }}
                </h3>
            </div>
        </div>

        <!-- RIGHT: NOC INFO 30% + SUPPORT LEVEL 70% -->
        <div class="md:col-span-6 flex flex-col gap-5 min-h-0">

            <!-- NOC INFO -->
            <div
                data-animate="fade-up"
                class="flex-[3] min-h-0 bg-white p-5 md:p-6 rounded-2xl shadow-xl shadow-[#8fc74a]/20 flex flex-col justify-center opacity-0 translate-y-8 transition-all duration-300 hover:scale-[0.98] ease-out">
                <div class="flex items-center gap-3 mb-3">
                    <img
                        src="{{ $nocSupportIcon }}"
                        class="h-10 w-10 object-cover"
                        alt="{{ __('app.support.noc') }}">
                    <h1 class="text-2xl font-bold text-[#8fc74a] uppercase">
                        {{ __('app.support.noc') }}
                    </h1>
                </div>

                <div class="space-y-3">
                    <div>
                        <h2 class="text-lg font-semibold text-[#F79633] mb-1">
                            {{ __('app.support.noc_slogan2') }}
                        </h2>
                        <p class="leading-relaxed text-sm text-gray-600">
                            {{ __('app.support.noc_desc2') }}
                        </p>
                    </div>

                    <div>
                        <h2 class="text-base font-semibold text-[#F79633] mb-2 w-max px-3 py-1 rounded-full border border-[#F79633]/30 bg-[#F79633]/10">
                            {{ __('app.support.noc_contacts') }}
                        </h2>
                        <div class="space-y-1">
                            <a
                                href="tel:+855975135135"
                                class="flex items-center gap-2 text-base font-semibold text-[#F79633] hover:text-[#8fc74a]">
                                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                                </svg>
                                +855 97 513 5135
                            </a>
                            <a
                                href="mailto:noc@telnet.com.kh"
                                class="flex items-center gap-2 text-base text-gray-500 hover:text-[#8fc74a] break-all">
                                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                noc@telnet.com.kh
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- SUPPORT LEVEL -->
            <div
                data-animate="fade-left"
                class="flex-[7] min-h-0 rounded-2xl md:pl-28 overflow-hidden bg-white p-5 md:p-6 shadow-xl shadow-[#8fc74a]/20 opacity-0 -translate-x-8 transition-all duration-300 hover:scale-[0.98] ease-out flex flex-col justify-center">
                <div class="relative flex flex-col justify-between h-full max-w-2xl mx-auto w-full py-3">

                    <!-- Connecting Line -->
                    <div class="absolute left-20 top-20 bottom-20 w-1 bg-[#F79633] -translate-x-1/2 z-0"></div>

                    <!-- LEVEL 1 -->
                    <div class="relative z-10 flex items-center gap-6">
                        <div class="w-40 h-40 rounded-full border-4 border-[#8fc74a] bg-white flex-shrink-0 overflow-hidden shadow-md">
                            <img
                                src="{{ $tseLevel ?? '' }}"
                                alt="NOC Team"
                                class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold text-[#8fc74a] tracking-wide">NOC TEAM</h3>
                            <p class="text-base font-semibold text-[#F79633]">1<sup class="text-xs">st</sup> Level</p>
                            <p class="text-base font-semibold text-[#F79633]">TEL: <a href="tel:081687697" class="hover:underline">0975135135</a></p>
                            <p class="text-base font-semibold text-[#F79633]">Email: <a href="mailto:noc@telnet.com.kh" class="hover:underline">noc@telnet.com.kh</a></p>
                        </div>
                    </div>

                    <!-- LEVEL 2 -->
                    <div class="relative z-10 flex items-center gap-6">
                        <div class="w-40 h-40 rounded-full border-4 border-[#8fc74a] bg-white flex-shrink-0 overflow-hidden shadow-md">
                            <img
                                src="{{ $nocLevel ?? '' }}"
                                alt="Head of NOC"
                                class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold text-[#8fc74a] tracking-wide">HEAD OF NOC</h3>
                            <p class="text-base font-semibold text-[#F79633]">2<sup class="text-xs">nd</sup> Level</p>
                            <p class="text-base font-semibold text-[#F79633]">TEL: <a href="tel:0888916667" class="hover:underline">0888916667</a></p>
                            <p class="text-base font-semibold text-[#F79633]">Email: <a href="mailto:ny.savann@telnet.com.kh" class="hover:underline">ny.savann@telnet.com.kh</a></p>
                        </div>
                    </div>

                    <!-- LEVEL 3 -->
                    <div class="relative z-10 flex items-center gap-6">
                        <div class="w-40 h-40 rounded-full border-4 border-[#8fc74a] bg-white flex-shrink-0 overflow-hidden shadow-md">
                            <img
                                src="{{ $noc1Level ?? '' }}"
                                alt="Operation & Director"
                                class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold text-[#8fc74a] tracking-wide">OPERATION & DIRECTOR</h3>
                            <p class="text-base font-semibold text-[#F79633]">3<sup class="text-xs">rd</sup> Level</p>
                            <p class="text-base font-semibold text-[#F79633]">TEL: <a href="tel:081687697" class="hover:underline">081687697</a></p>
                            <p class="text-base font-semibold text-[#F79633]">Email: <a href="mailto:neth.sokunthearith@telnet.com.kh" class="hover:underline">neth.sokunthearith@telnet.com.kh</a></p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
</section>

<section class="mx-4 sm:mx-6 md:mx-8 mb-12">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-[#8fc74a]">
                {{ __('app.support.branches') }}
            </h2>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($branches as $branch)
            <div class="group relative rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#8fc74a]/30 hover:shadow-lg hover:shadow-[#8fc74a]/10">
                <!-- Header: Icon & Title -->
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#8fc74a]/10 text-[#8fc74a] transition-colors duration-300 group-hover:bg-[#8fc74a]/20 group-hover:text-white">
                        <svg class="w-8 h-8 text-[#F79633]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Main Structure -->
                            <rect x="4" y="2" width="16" height="20" rx="2"></rect>
                            <!-- Windows / Departments Grid -->
                            <rect x="7" y="5" width="3" height="3" rx="0.5"></rect>
                            <rect x="14" y="5" width="3" height="3" rx="0.5"></rect>
                            <rect x="7" y="10" width="3" height="3" rx="0.5"></rect>
                            <rect x="14" y="10" width="3" height="3" rx="0.5"></rect>
                            <!-- Entrance Door -->
                            <path d="M10 22v-5h4v5"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#8fc74a] leading-snug">
                        {{ $isKm ? $branch->name_km : $branch->name_en }}
                    </h3>
                </div>

                <!-- Address directly under Name & Icon -->
                <p class="mt-3 text-sm text-slate-500 leading-relaxed">
                    {{ $isKm ? $branch->address_km : $branch->address_en }}
                </p>

                <!-- Action Footer -->
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
<section id="support" class="relative overflow-hidden m-4 sm:m-6 md:m-8 p-4 sm:p-6 md:p-8 py-10 sm:py-12 md:py-14 rounded-xl bg-[#8fc74a]/5 hidden">
    <div class="mx-auto max-w-7xl backdrop-blur-md">
        <div class="grid gap-6 sm:gap-8 lg:grid-cols-2">
            <div class="space-y-4 sm:space-y-5 hidden">
                <div class="group rounded-2xl border border-slate-200 bg-white p-4 sm:p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex flex-col sm:flex-row items-center sm:items-center gap-4 sm:gap-5 text-center sm:text-left">
                        <div class="flex h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 shrink-0 items-center justify-center rounded-xl bg-[#8fc74a]/10 text-[#F79633] transition group-hover:bg-[#8fc74a] group-hover:text-white">
                            <img src="{{ asset('storage/home/support/customerCare.png') }}"
                                alt="{{ __('app.support.service') }}"
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
                                <a href="tel:+855975135135"
                                    class="flex items-center gap-2 text-sm font-semibold text-[#F79633] transition hover:text-[#8fc74a]">
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                                    </svg>
                                    +855 97 513 5135
                                </a>

                                <a href="mailto:support@telnet.com.kh"
                                    class="flex items-center gap-2 text-sm text-slate-500 transition hover:text-[#8fc74a] break-all">
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    support@telnet.com.kh
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- NOC Support Card --}}
                <div class="group rounded-2xl border border-slate-200 bg-white p-4 sm:p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex flex-col sm:flex-row items-center sm:items-center gap-4 sm:gap-5 text-center sm:text-left">
                        <div class="flex h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 shrink-0 items-center justify-center rounded-xl bg-[#F79633]/10 text-[#F79633] transition group-hover:bg-[#F79633] group-hover:text-white">
                            <img src="{{ $nocSupportIcon }}"
                                alt="{{ __('app.support.noc') }}"
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
                                <a href="tel:+855975135135"
                                    class="flex items-center gap-2 text-sm font-semibold text-[#F79633] transition hover:text-[#8fc74a]">
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                                    </svg>
                                    +855 97 513 5135
                                </a>

                                <a href="mailto:noc@telnet.com.kh"
                                    class="flex items-center gap-2 text-sm text-slate-500 transition hover:text-[#8fc74a] break-all">
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    noc@telnet.com.kh
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sales Support Card --}}
                <div class="group rounded-2xl border border-slate-200 bg-white p-4 sm:p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex flex-col sm:flex-row items-center sm:items-center gap-4 sm:gap-5 text-center sm:text-left">
                        <div class="flex h-16 w-16 sm:h-20 sm:w-20 md:h-24 md:w-24 shrink-0 items-center justify-center rounded-xl bg-[#F79633]/10 text-[#F79633] transition group-hover:bg-[#F79633] group-hover:text-white">
                            <img src="{{ asset('storage/home/support/salesSupport.png') }}"
                                alt="{{ __('app.support.sale') }}"
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
                                <a href="tel:+855975135135"
                                    class="flex items-center gap-2 text-sm font-semibold text-[#F79633] transition hover:text-[#8fc74a]">
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.2l-2.12 1.06a11.05 11.05 0 005.46 5.46l1.06-2.12a1 1 0 011.2-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.16 21 3 14.84 3 7V5z" />
                                    </svg>
                                    +855 97 513 5135
                                </a>

                                <a href="mailto:noc@telnet.com.kh"
                                    class="flex items-center gap-2 text-sm text-slate-500 transition hover:text-[#8fc74a] break-all">
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    noc@telnet.com.kh
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- RIGHT COLUMN: CONTACT FORM --}}
            <div class="rounded-3xl border col-span-2 border-slate-200 bg-white p-5 sm:p-6 md:p-8 shadow-xl">

                <div class="mb-6 sm:mb-8">
                    <h3 class="mt-2 text-xl sm:text-2xl font-bold text-slate-900 md:text-3xl">
                        {{ __('app.support.send') }}
                    </h3>

                    <p class="mt-3 text-sm leading-6 text-slate-500">
                        {{ __('Have a question or need assistance? Send us your information and our team will get back to you.') }}
                    </p>
                </div>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf

                    {{-- Full Name --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            {{ __('app.support.fullname') }}
                        </label>
                        <input type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="{{ __('app.support.fullname_holder') }}"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder-slate-400 outline-none transition focus:border-[#8fc74a] focus:bg-white focus:ring-2 focus:ring-[#8fc74a]/20">
                    </div>

                    {{-- Email + Phone --}}
                    <div class="grid gap-5 grid-cols-1 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">
                                {{ __('app.support.email') }}
                            </label>
                            <input type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="{{ __('app.support.email_holder') }}"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder-slate-400 outline-none transition focus:border-[#8fc74a] focus:bg-white focus:ring-2 focus:ring-[#8fc74a]/20">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">
                                {{ __('app.support.phone') }}
                            </label>
                            <input type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="{{ __('app.support.phone_holder') }}"
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder-slate-400 outline-none transition focus:border-[#8fc74a] focus:bg-white focus:ring-2 focus:ring-[#8fc74a]/20">
                        </div>
                    </div>

                    {{-- Support Type --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            {{ __('app.support.tikect_type') }}
                        </label>
                        <select name="type"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-[#8fc74a] focus:bg-white focus:ring-2 focus:ring-[#8fc74a]/20">
                            <option value="">{{ __('app.support.select') }}</option>
                            <option value="customer_service">{{ __('app.support.t_care') }}</option>
                            <option value="noc">{{ __('app.support.t_noc') }}</option>
                            <option value="sales">{{ __('app.support.t_sale') }}</option>
                            <option value="billing">{{ __('app.support.t_bill') }}</option>
                        </select>
                    </div>

                    {{-- Description / Message --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            {{ __('app.support.t_desc') }}
                        </label>
                        <textarea name="message"
                            rows="5"
                            required
                            placeholder="{{ __('app.support.t_desc_holder') }}"
                            class="w-full resize-none rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder-slate-400 outline-none transition focus:border-[#8fc74a] focus:bg-white focus:ring-2 focus:ring-[#8fc74a]/20">{{ old('message') }}</textarea>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit"
                        class="group flex w-full items-center justify-center gap-3 rounded-xl bg-[#8fc74a] px-5 py-3.5 text-sm sm:text-md font-bold text-white shadow-lg shadow-[#8fc74a]/20 transition duration-300 hover:-translate-y-0.5 hover:bg-[#8fc74a]/90 hover:shadow-[#8fc74a]/30">
                        {{ __('app.support.send') }}
                        <svg class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>

                </form>

            </div>

        </div>
    </div>
</section>
<section class="mx-4 sm:mx-6 md:mx-8 mb-12">
    <div class="mx-auto max-w-7xl shadow-2xl border border-slate-200 rounded-2xl p-6 sm:p-10  relative overflow-hidden flex flex-col lg:flex-row items-start justify-between gap-8 ">

        <!-- Left Content Section -->
        <div class="relative z-10 max-w-xl text-slate-800 lg:sticky lg:top-6">
            <span class="inline-flex items-center gap-2 rounded-full bg-[#8fc74a]/10 px-3 py-1 text-xs font-semibold text-[#8fc74a]">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#8fc74a] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#8fc74a]"></span>
                </span>
                {{ $isKm ? 'ការឃ្លាំមើលបណ្តាញផ្ទាល់ ២៤/៧' : 'Live 24/7/365 Monitoring' }}
            </span>

            <h2 class="mt-4 text-[#8fc74a] text-2xl sm:text-3xl font-extrabold tracking-tight">
                {{ $isKm ? 'ត្រូវការជំនួយបន្ទាន់សម្រាប់បណ្តាញអុីនធឺណិត?' : 'Need Immediate Emergency Support?' }}
            </h2>

            <p class="mt-2 text-sm text-slate-500 leading-relaxed">
                {{ $isKm ? 'ក្រុមបច្ចេកទេស NOC របស់យើងកែប្រែនិងដោះស្រាយបញ្ហាបណ្តាញរបស់អ្នកជានិច្ចដោយមិនគិតថ្ងៃឈប់សម្រាក' : 'Our dedicated NOC engineers are active around the clock ensuring system availability and rapid response.' }}
            </p>

            <!-- Direct Contact Info Badges -->
            <div class="mt-6 pt-6 border-t border-slate-100 space-y-3">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                    {{ $isKm ? 'ឬទាក់ទងមកកាន់ hotline ផ្ទាល់' : 'Or Call Hotlines Directly:' }}
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="tel:+855975135135" class="inline-flex items-center gap-2 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-[#8fc74a]/10 hover:text-[#8fc74a] px-3 py-2 rounded-lg transition">
                        <i class="fa-solid fa-phone text-[#F79633]"></i>
                        <span>Kh / En: +855 97 513 5135</span>
                    </a>
                    <a href="tel:+855XXXXXXXX" class="inline-flex items-center gap-2 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-[#8fc74a]/10 hover:text-[#8fc74a] px-3 py-2 rounded-lg transition">
                        <i class="fa-solid fa-language text-[#8fc74a]"></i>
                        <span>中文: +855 XX XXX XXX</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Emergency Support Form Section -->
        <div class="relative z-10 w-full lg:max-w-md bg-slate-50 p-6 sm:p-8 rounded-xl border border-slate-200/80 shadow-inner">
            <h3 class="text-lg font-bold text-slate-800 mb-1 flex items-center gap-2">
                <i class="fa-solid fa-headset text-[#F79633]"></i>
                {{ $isKm ? 'ស្នើសុំជំនួយបច្ចេកទេស' : 'Submit Support Request' }}
            </h3>
            <p class="text-xs text-slate-500 mb-5">
                {{ $isKm ? 'សូមបំពេញព័ត៌មានខាងក្រោម ក្រុមការងារយើងនឹងទាក់ទងទៅវិញភ្លាមៗ' : 'Fill in your details below and our NOC team will respond shortly.' }}
            </p>

            <form action="" method="POST" class="space-y-4">
                @csrf

                <!-- Customer ID -->
                <div>
                    <label for="customer_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                        {{ $isKm ? 'អត្តលេខអតិថិជន (Customer ID)' : 'Customer ID' }} <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" id="customer_id" name="customer_id" required
                            placeholder="e.g., CID-10293"
                            class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-sm text-slate-800 placeholder-slate-400 focus:border-[#8fc74a] focus:outline-none focus:ring-2 focus:ring-[#8fc74a]/20 transition">
                    </div>
                </div>

                <!-- Contact Phone & Preferred Language -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            {{ $isKm ? 'លេខទូរស័ព្ទ' : 'Phone Number' }} <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" id="phone" name="phone" required
                            placeholder="097 XXX XXXX"
                            class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-sm text-slate-800 placeholder-slate-400 focus:border-[#8fc74a] focus:outline-none focus:ring-2 focus:ring-[#8fc74a]/20 transition">
                    </div>
                    <div>
                        <label for="language" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            {{ $isKm ? 'ភាសា' : 'Preferred Lang' }}
                        </label>
                        <select id="language" name="language"
                            class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-sm text-slate-800 focus:border-[#8fc74a] focus:outline-none focus:ring-2 focus:ring-[#8fc74a]/20 transition">
                            <option value="km">{{ $isKm ? 'ភាសាខ្មែរ' : 'Khmer' }}</option>
                            <option value="en" selected>{{ $isKm ? 'អង់គ្លេស' : 'English' }}</option>
                            <option value="zh">{{ $isKm ? 'ចិន (中文)' : 'Chinese (中文)' }}</option>
                        </select>
                    </div>
                </div>

                <!-- Service Address Info -->
                <div>
                    <label for="address" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                        {{ $isKm ? 'អាសយដ្ឋានសេវាកម្ម' : 'Service Address / Location' }} <span class="text-red-500">*</span>
                    </label>
                    <textarea id="address" name="address" rows="2" required
                        placeholder="{{ $isKm ? 'ផ្ទះលេខ, ផ្លូវ, ខណ្ឌ/ស្រុក, រាជធានី/ខេត្ត...' : 'House No, St No, Sangkat, Khan, City...' }}"
                        class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-sm text-slate-800 placeholder-slate-400 focus:border-[#8fc74a] focus:outline-none focus:ring-2 focus:ring-[#8fc74a]/20 transition resize-none"></textarea>
                </div>

                <!-- Issue Description (Optional) -->
                <div>
                    <label for="issue" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                        {{ $isKm ? 'រាយរាប់ពីបញ្ហា (ជម្រើស)' : 'Issue Details (Optional)' }}
                    </label>
                    <input type="text" id="issue" name="issue"
                        placeholder="{{ $isKm ? 'ឧទាហរណ៍៖ អ៊ីនធឺណិតដើរយឺត ឬដាច់...' : 'e.g., Fiber light red, No internet access' }}"
                        class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-sm text-slate-800 placeholder-slate-400 focus:border-[#8fc74a] focus:outline-none focus:ring-2 focus:ring-[#8fc74a]/20 transition">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 rounded-xl bg-[#F79633] px-6 py-3 font-bold text-white shadow-md transition duration-300 hover:bg-[#F79633]/90 hover:scale-[1.01] active:scale-[0.99] mt-2">
                    <i class="fa-solid fa-paper-plane text-sm"></i>
                    <span>{{ $isKm ? 'ផ្ញើសំណើបន្ទាន់' : 'Request Emergency Help' }}</span>
                </button>
            </form>
        </div>
    </div>
</section>


{{-- NEW SECTION 3: FREQUENTLY ASKED QUESTIONS (ACCORDION) --}}
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

        <div x-data="{ active: null }" class="space-y-4">

            {{-- Customer Service --}}
            <div class="rounded-xl border border-[#8fc74a]/20 bg-white overflow-hidden">
                <button @click="active = (active === 1 ? null : 1)"
                    class="flex w-full items-center justify-between p-4 text-left font-semibold text-slate-800 transition hover:bg-[#8fc74a]/5">
                    <span>
                        {{ $isKm
                    ? 'តើខ្ញុំអាចទាក់ទងសេវាបម្រើអតិថិជនតាមរបៀបណា?'
                    : 'How can I contact customer service?' }}
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': active === 1 }"></i>
                </button>

                <div x-show="active === 1" x-collapse
                    class="p-4 pt-0 text-sm text-slate-600 leading-relaxed">
                    {{ $isKm
                ? 'អ្នកអាចទាក់ទងក្រុមការងារបម្រើអតិថិជនតាមរយៈទូរស័ព្ទ អ៊ីមែល ឬបណ្តាញទំនាក់ទំនងផ្លូវការរបស់យើង។ ក្រុមការងាររបស់យើងរីករាយក្នុងការជួយដោះស្រាយសំណួរ និងសំណើរបស់អ្នក។'
                : 'You can contact our customer service team by phone, email, or our official communication channels. Our team is ready to assist with your questions, requests, and service needs.' }}
                </div>
            </div>


            {{-- QoS --}}
            <div class="rounded-xl border border-[#8fc74a]/20 bg-white overflow-hidden">
                <button @click="active = (active === 2 ? null : 2)"
                    class="flex w-full items-center justify-between p-4 text-left font-semibold text-slate-800 transition hover:bg-[#8fc74a]/5">
                    <span>
                        {{ $isKm
                    ? 'តើគុណភាពសេវា (QoS) របស់អ៊ីនធឺណិតត្រូវបានធានាយ៉ាងដូចម្តេច?'
                    : 'How is Internet Quality of Service (QoS) maintained?' }}
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': active === 2 }"></i>
                </button>

                <div x-show="active === 2" x-collapse
                    class="p-4 pt-0 text-sm text-slate-600 leading-relaxed">
                    {{ $isKm
                ? 'យើងប្រើប្រាស់បណ្តាញដែលមានស្ថេរភាព ប្រព័ន្ធត្រួតពិនិត្យបណ្តាញ និងការគ្រប់គ្រង Traffic ដើម្បីរក្សាគុណភាព និងប្រសិទ្ធភាពសេវាអ៊ីនធឺណិត។'
                : 'We maintain service quality through reliable network infrastructure, continuous network monitoring, traffic management, and proactive performance optimization.' }}
                </div>
            </div>


            {{-- Payment & Billing --}}
            <div class="rounded-xl border border-[#8fc74a]/20 bg-white overflow-hidden">
                <button @click="active = (active === 3 ? null : 3)"
                    class="flex w-full items-center justify-between p-4 text-left font-semibold text-slate-800 transition hover:bg-[#8fc74a]/5">
                    <span>
                        {{ $isKm
                    ? 'តើខ្ញុំអាចបង់ថ្លៃសេវាអ៊ីនធឺណិតតាមវិធីណាខ្លះ?'
                    : 'What payment methods are available?' }}
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': active === 3 }"></i>
                </button>

                <div x-show="active === 3" x-collapse
                    class="p-4 pt-0 text-sm text-slate-600 leading-relaxed">
                    {{ $isKm
                ? 'អតិថិជនអាចបង់ថ្លៃសេវាតាមវិធីដែលក្រុមហ៊ុនបានផ្តល់ជូន ដូចជា ធនាគារ Mobile Banking និងបណ្តាញទូទាត់ដែលបានគាំទ្រ។ សូមរក្សាទុកបង្កាន់ដៃសម្រាប់ជាឯកសារយោង។'
                : 'Customers can pay their Internet service fees through our supported payment channels, including banking, mobile banking, and other available payment methods. Please keep your payment receipt for reference.' }}
                </div>
            </div>


            {{-- Payment Term --}}
            <div class="rounded-xl border border-[#8fc74a]/20 bg-white overflow-hidden">
                <button @click="active = (active === 4 ? null : 4)"
                    class="flex w-full items-center justify-between p-4 text-left font-semibold text-slate-800 transition hover:bg-[#8fc74a]/5">
                    <span>
                        {{ $isKm
                    ? 'តើលក្ខខណ្ឌបង់ថ្លៃសេវាប្រចាំខែមានអ្វីខ្លះ?'
                    : 'What are the monthly payment terms?' }}
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': active === 4 }"></i>
                </button>

                <div x-show="active === 4" x-collapse
                    class="p-4 pt-0 text-sm text-slate-600 leading-relaxed">
                    {{ $isKm
                ? 'អតិថិជនត្រូវបង់ថ្លៃសេវាតាមកាលកំណត់ដែលបានបញ្ជាក់ក្នុងវិក្កយបត្រ ឬកិច្ចសន្យាសេវា។ ការយឺតយ៉ាវក្នុងការទូទាត់អាចបណ្តាលឱ្យសេវាត្រូវបានផ្អាកតាមលក្ខខណ្ឌរបស់ក្រុមហ៊ុន។'
                : 'Customers are required to pay their monthly service fees according to the due date stated on the invoice or service agreement. Late payment may result in service suspension according to the applicable terms.' }}
                </div>
            </div>


            {{-- Technical Support --}}
            <div class="rounded-xl border border-[#8fc74a]/20 bg-white overflow-hidden">
                <button @click="active = (active === 5 ? null : 5)"
                    class="flex w-full items-center justify-between p-4 text-left font-semibold text-slate-800 transition hover:bg-[#8fc74a]/5">
                    <span>
                        {{ $isKm
                    ? 'តើខ្ញុំគួរធ្វើអ្វី ប្រសិនបើអ៊ីនធឺណិតមានបញ្ហា?'
                    : 'What should I do if my Internet connection has a problem?' }}
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': active === 5 }"></i>
                </button>

                <div x-show="active === 5" x-collapse
                    class="p-4 pt-0 text-sm text-slate-600 leading-relaxed">
                    {{ $isKm
                ? 'សូមពិនិត្យ Router/ONT និងការតភ្ជាប់ខ្សែជាមុនសិន។ ប្រសិនបើបញ្ហានៅតែបន្ត សូមទាក់ទងក្រុមការងារ Technical Support ដើម្បីធ្វើការត្រួតពិនិត្យ និងដោះស្រាយបញ្ហា។'
                : 'Please check your router/ONT and cable connections first. If the issue continues, contact our Technical Support team so we can investigate and resolve the problem.' }}
                </div>
            </div>


            {{-- Technical Solution --}}
            <div class="rounded-xl border border-[#8fc74a]/20 bg-white overflow-hidden">
                <button @click="active = (active === 6 ? null : 6)"
                    class="flex w-full items-center justify-between p-4 text-left font-semibold text-slate-800 transition hover:bg-[#8fc74a]/5">
                    <span>
                        {{ $isKm
                    ? 'តើក្រុមហ៊ុនមានដំណោះស្រាយបណ្តាញសម្រាប់អាជីវកម្មដែរឬទេ?'
                    : 'Do you provide network solutions for businesses?' }}
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': active === 6 }"></i>
                </button>

                <div x-show="active === 6" x-collapse
                    class="p-4 pt-0 text-sm text-slate-600 leading-relaxed">
                    {{ $isKm
                ? 'មាន។ យើងផ្តល់ជូនដំណោះស្រាយបណ្តាញសម្រាប់អាជីវកម្ម និងសហគ្រាស ដូចជា Dedicated Internet, Business Internet, Network Connectivity, Data Services និងដំណោះស្រាយ ICT តាមតម្រូវការ។'
                : 'Yes. We provide business and enterprise network solutions including Dedicated Internet, Business Internet, Network Connectivity, Data Services, and customized ICT solutions based on your requirements.' }}
                </div>
            </div>


            {{-- Installation --}}
            <div class="rounded-xl border border-[#8fc74a]/20 bg-white overflow-hidden">
                <button @click="active = (active === 7 ? null : 7)"
                    class="flex w-full items-center justify-between p-4 text-left font-semibold text-slate-800 transition hover:bg-[#8fc74a]/5">
                    <span>
                        {{ $isKm
                    ? 'តើការដំឡើងសេវាអ៊ីនធឺណិតត្រូវចំណាយពេលប៉ុន្មាន?'
                    : 'How long does Internet installation take?' }}
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': active === 7 }"></i>
                </button>

                <div x-show="active === 7" x-collapse
                    class="p-4 pt-0 text-sm text-slate-600 leading-relaxed">
                    {{ $isKm
                ? 'រយៈពេលដំឡើងអាស្រ័យលើទីតាំង ស្ថានភាពបណ្តាញ និងប្រភេទសេវាដែលបានជ្រើសរើស។ ក្រុមការងាររបស់យើងនឹងបញ្ជាក់កាលវិភាគដំឡើងបន្ទាប់ពីការត្រួតពិនិត្យលទ្ធភាពសេវា។'
                : 'Installation time depends on your location, network availability, and selected service package. Our team will confirm the installation schedule after checking service feasibility.' }}
                </div>
            </div>


            {{-- General / Others --}}
            <div class="rounded-xl border border-[#8fc74a]/20 bg-white overflow-hidden">
                <button @click="active = (active === 8 ? null : 8)"
                    class="flex w-full items-center justify-between p-4 text-left font-semibold text-slate-800 transition hover:bg-[#8fc74a]/5">
                    <span>
                        {{ $isKm
                    ? 'តើខ្ញុំអាចប្តូរ ឬ Upgrade កញ្ចប់សេវារបស់ខ្ញុំបានទេ?'
                    : 'Can I change or upgrade my Internet package?' }}
                    </span>
                    <i class="fa-solid fa-chevron-down text-xs transition-transform duration-200"
                        :class="{ 'rotate-180': active === 8 }"></i>
                </button>

                <div x-show="active === 8" x-collapse
                    class="p-4 pt-0 text-sm text-slate-600 leading-relaxed">
                    {{ $isKm
                ? 'បាន។ អ្នកអាចស្នើសុំប្តូរ ឬ Upgrade កញ្ចប់សេវារបស់អ្នកទៅកាន់កញ្ចប់ដែលសមស្របជាងមុន។ សូមទាក់ទងក្រុមការងារបម្រើអតិថិជន ដើម្បីពិនិត្យលក្ខខណ្ឌ និងលទ្ធភាពសេវា។'
                : 'Yes. You can request to change or upgrade your current package to better match your needs. Contact our customer service team to check the available packages and applicable terms.' }}
                </div>
            </div>

        </div>
    </div>
</section>

@endsection