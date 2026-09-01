@extends('layouts.app')
@php $isKm = app()->getLocale() === 'km'; @endphp
@section('title', $isKm ? 'អាជីវកម្ម — TELNET CO., LTD.' : 'Business Solutions — TELNET CO., LTD.')

@section('content')
@php
$bizImage=asset("storage/home/business/business1.png");

@endphp

<section class="relative overflow-hidden py-16 lg:py-24 min-h-[90vh] flex items-start">
    <!-- Background Layer -->
    <div class="absolute inset-0 z-0">
        <!-- Background Image -->
        <img
            src="{{ $bizImage }}"
            alt="Business Connectivity Background"
            class="absolute inset-0 w-full h-full object-cover object-center wallpaper-infinite" />
        <!-- Bottom Brand Gradient -->
        <!-- <div class="gradient-b-to-t business absolute inset-0 pointer-events-none"></div> -->
        <!-- Brand Accent Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-brand-green/20 via-transparent to-brand-orange/20 pointer-events-none"></div>
    </div>
    <!-- Content Container -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-16 relative z-10 w-full">
        <div class="max-w-5xl space-y-5">
            <!-- Label -->
            <span class="inline-block text-xs font-bold text-brand-orange bg-brand-orange/20 px-3 border border-orange-300 py-1 rounded-full uppercase tracking-widest backdrop-blur-sm">
                {{ $isKm ? 'ដំណោះស្រាយសហគ្រាស' : 'Enterprise Solutions' }}
            </span>
            <!-- Heading -->
            <h1 class="w-full text-5xl sm:text-7xl font-black uppercase text-[#8fc74a] leading-tight">
                {{ $isKm ? 'ដំណោះស្រាយអ៊ីនធឺណិត' : 'Business Cooperate' }}<br>
            </h1>
            <!-- Description -->
            <p class="text-[#F79633] text-base sm:text-lg leading-relaxed max-w-3xl">
                {{ $isKm
                    ? 'ធេលណេត ផ្តល់ដំណោះស្រាយអ៊ីនធឺណិតកាបូបអុបទិកដែលអាចទុកចិត្ត លឿន និងមានសុវត្ថិភាព ដែលត្រូវបានរចនាឡើងសម្រាប់អាជីវកម្ម SME សហគ្រាស និងស្ថាប័នរដ្ឋាភិបាល។'
                    : 'TELNET delivers reliable, high-speed fiber optic internet solutions designed for SMEs, enterprises, and government institutions backed by 24/7 NOC support and guaranteed SLA.' }}
            </p>
            <!-- Buttons -->
            <div class="flex flex-wrap gap-3 pt-2">
                <button
                    onclick="openModal('serviceModal')"
                    class="gradient-brand text-white font-bold px-7 py-3.5 rounded-xl shadow-lg shadow-[#8fc74a] transition hover:-translate-y-0.5 flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane text-sm"></i>

                    <span>
                        {{ $isKm ? 'ស្នើសុំសេវា' : 'Request a Quote' }}
                    </span>
                </button>
                <a target="_blank"
                    href="{{$telegramLink??'https://t.me/NOC_Hotline'}}"
                    class="gradient-brand text-white font-bold px-7 py-3.5 rounded-xl shadow-lg shadow-[#8fc74a] transition hover:-translate-y-0.5 flex items-center gap-2">
                    <i class="fa-solid fa-headset text-sm"></i>
                    <span>
                        {{ $isKm ? 'ទំនាក់ទំនងក្រុម' : 'Talk to Sales' }}
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="slugs" class="py-8 section-bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="px-4">
            <h2 class="text-2xl sm:text-3xl font-semibold capitalize border-b-2 border-[#8fc74a] text-[#8fc74a] pb-4 mb-2">
                {{ __('app.business.hook') }}
            </h2>
            <p class="text-sm  rounded-md  text-justify line-clamp-6 !leading-relaxed">
                {{ __('app.business.hook_desc') }}
            </p>
        </div>
        <br>
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div>
                <h2 class="text-2xl sm:text-3xl font-semibold uppercase text-[#8fc74a] pb-4 mb-2">
                    {{ __('app.business.business') }}
                </h2>
            </div>
            <!-- 3-Column Grid Container -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($slugs as $sl)
                <div class="flex flex-col rounded-xl overflow-hidden shadow-sm border border-slate-200/100 bg-white hover:shadow transition group">
                    <!-- 1. Top Image Banner -->
                    <div class="w-full h-36 sm:h-56 overflow-hidden bg-slate-100 relative ">
                        <a href="">
                            <img loading="lazy"
                                src="{{asset('storage/'.$sl->image??'')}}"
                                alt="{{$sl->image}}"
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
                                            {{ $isKm ? $sl->name_km : $sl->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 flex items-center  flex-wrap">
                                <span class="text-sm  rounded-md  text-justify line-clamp-6 !leading-relaxed ">
                                    {!! $isKm ? $sl->desc_km : $sl->desc !!}
                                </span>
                            </div>
                        </div>
                    </a>
                    <div class="flex justify-center px-4 pb-4">
                        <button
                            class="text-sm bg-[#8fc74a] text-white font-bold px-8 p-2 rounded-xl transition hover:-translate-y-0.5 flex items-center gap-2">
                            <span class="uppercase">
                                {{__('app.business.readmore')}}
                            </span>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="bg-slate-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="mb-8 max-w-2xl text-base space-y-4">
            <h2 class="text-2xl sm:text-3xl font-extrabold uppercase text-[#8fc74a]">{{__('app.business.payment.sub_title')}}</h2>
            <p class="mt-1 text-sm  text-[#444]">{{__('app.business.payment.desc')}}</p>
        </div>

        <!-- Payment Options Group -->
        <div class="space-y-4" x-data="{ method: 'cash' }">

            <!-- Option 1: Cash on Delivery / Cash Payment -->
            <label
                :class="method === 'cash' ? 'border-[#8fc74a] ring-[#8fc74a]/20 bg-emerald-50/10' : 'border-slate-200 bg-white hover:border-slate-300'"
                class="relative flex flex-col p-5 rounded-xl border cursor-pointer transition-all shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <input
                            type="radio"
                            name="payment_method"
                            value="cash"
                            x-model="method"
                            class="h-5 w-5 text-emerald-600 border-slate-300 focus:ring-emerald-500">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-slate-100 rounded-lg text-slate-700">
                                <!-- Cash Icon -->
                                <svg class="w-8 h-8  text-[#444]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-base font-semibold text-slate-900">{{__('app.business.payment.cash.title')}}</span>
                                <span class="block text-sm text-slate-500">{{__('app.business.payment.cash.desc')}}</span>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Extra details section when selected -->
                <div x-show="method === 'cash'" x-cloak class="mt-4 pt-4 border-t border-slate-200 text-sm text-slate-600 pl-9">
                    <p class="mb-3 font-medium text-slate-700">{{__('app.business.payment.cash.require')}}</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                        <!-- Branch Select -->
                        <div class="col-span-1">
                            <label for="cash_branch" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">
                                {{__('app.business.payment.cash.branch')}}
                            </label>
                            <select name="branch" id="cash_branch" class="select2 w-full rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">{{__('app.career.branch_filter')}}</option>
                                {!! $branches !!}
                            </select>
                        </div>

                        <!-- CID Input -->
                        <div class="col-span-1">
                            <label for="cid" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">
                                {{__('app.business.payment.cash.cid')}}
                            </label>
                            <input type="text" id="cid" name="cid"
                                placeholder=" {{__('app.business.payment.cash.cid')}}"
                                class="w-full bg-white px-2 p-1 rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <!-- CID Input -->
                        <div class="col-span-1">
                            <label for="cid" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">
                                {{__('app.business.payment.cash.aid')}}
                            </label>
                            <input type="text" id="aid" name="aid"
                                placeholder=" {{__('app.business.payment.cash.aid')}}"
                                class="w-full bg-white px-2 py-1 rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <!-- phone Input -->
                        <div class="col-span-1">
                            <label for="phone" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">
                                {{__('app.business.payment.cash.phone')}}
                            </label>
                            <input type="text" id="phone" name="phone"
                                placeholder=" {{__('app.business.payment.cash.phone')}}"
                                class="w-full bg-white px-2 py-1 rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <!-- contact Input -->
                        <div class="col-span-1">
                            <label for="contact" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">
                                {{__('app.business.payment.cash.contact')}}
                            </label>
                            <input type="text" id="contact" name="contact"
                                placeholder=" {{__('app.business.payment.cash.contact')}}"
                                class="w-full bg-white px-2 py-1 rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <!-- address Input -->
                        <div class="col-span-1">
                            <label for="address" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">
                                {{__('app.business.payment.cash.address')}}
                            </label>
                            <input type="text" id="address" name="address"
                                placeholder=" {{__('app.business.payment.cash.address')}}"
                                class="w-full bg-white px-2 py-1 rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>
                </div>
            </label>

            <label
                :class="method === 'bank_transfer' ? 'border-[#8fc74a] ring-[#8fc74a] bg-emerald-50/10' : 'border-slate-200 bg-white hover:border-slate-300'"
                class="relative flex flex-col p-5 rounded-xl border cursor-pointer transition-all shadow-sm"
                x-data="{
                            selectedBankId: null,
                            copied: false,
                            banks: {{ $paymentMethods->keyBy('id')->toJson() }},
                            init() {
                                // Set default selected bank to the first entry if available
                                const bankKeys = Object.keys(this.banks);
                                if (bankKeys.length > 0) {
                                    this.selectedBankId = bankKeys[0];
                                }
                            },
                            get currentBank() {
                                return this.banks[this.selectedBankId] || {};
                            },
                            copyAccount() {
                                if (!this.currentBank.account_id) return;
                                navigator.clipboard.writeText(this.currentBank.account_id);
                                this.copied = true;
                                setTimeout(() => this.copied = false, 2000);
                            }
                        }">

                <!-- Top Selector Row -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <input
                            type="radio"
                            name="payment_method"
                            value="bank_transfer"
                            x-model="method"
                            class="h-5 w-5 text-emerald-600 border-slate-300 focus:ring-emerald-500">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-slate-100 rounded-lg text-slate-700">
                                <svg class="w-8 h-8 text-[#8fc74a]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="none">
                                    <rect x="12" y="5" width="30" height="54" rx="5" stroke="#444" stroke-width="3" />
                                    <rect x="17" y="11" width="20" height="35" rx="2" fill="#444" opacity="0.12" />
                                    <circle cx="27" cy="52" r="2" fill="#444" />
                                    <rect x="29" y="25" width="28" height="19" rx="3" fill="white" stroke="#444" stroke-width="3" />
                                    <path d="M31 31H55" stroke="#444" stroke-width="3" />
                                    <path d="M33 37H41" stroke="#444" stroke-width="2" stroke-linecap="round" />
                                    <path d="M45 37H51" stroke="#444" stroke-width="2" stroke-linecap="round" />
                                    <circle cx="49" cy="48" r="8" fill="#444" />
                                    <path d="M45 48L48 51L54 45" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <span class="block text-base font-semibold text-slate-900">{{ __('app.business.payment.mobile_app.title') }}</span>
                                <span class="block text-sm text-slate-500">{{ __('app.business.payment.mobile_app.desc') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expanded Details Section -->
                <div x-show="method === 'bank_transfer'" x-cloak class="mt-4 pt-4 border-t border-slate-100 text-sm text-slate-600 pl-0 sm:pl-9">

                    <!-- Bank Option Tabs -->
                    <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">{{ __('app.business.payment.mobile_app.require') }}</span>
                    <div class="grid grid-cols-2 sm:grid-cols-5 gap-2 mb-4">
                        <template x-for="(bank, id) in banks" :key="id">
                            <button type="button"
                                @click.prevent="selectedBankId = id"
                                :class="selectedBankId == id ? 'border-[#8fc74a] bg-[#8fc74a] text-white font-extrabold' : 'border-slate-200 bg-white text-slate-600 hover:bg-slate-50'"
                                class="px-3 py-2 border rounded-lg text-md font-extrabold text-center transition-colors">
                                <span x-text="bank.short_name || bank.fullname"></span>
                            </button>
                        </template>
                    </div>

                    <!-- Bank Info Card + Dynamic QR Code Display -->
                    <div x-show="selectedBankId && currentBank"
                        class="bg-slate-50 p-6 rounded-xl border border-slate-200 grid grid-cols-1 md:grid-cols-3 gap-6 items-start">

                        <!-- Bank Details Column -->
                        <div class="text-base md:text-lg space-y-2 w-full text-slate-700 col-span-2">
                            <div class="flex justify-between border-b border-slate-200/60 pb-1.5">
                                <span class="text-slate-400">{{ __('app.business.payment.mobile_app.bank') }}:</span>
                                <strong class="font-semibold text-slate-800" x-text="currentBank.fullname"></strong>
                            </div>
                            <div class="flex justify-between border-b border-slate-200/60 pb-1.5">
                                <span class="text-slate-400">{{ __('app.business.payment.mobile_app.acc_name') }}:</span>
                                <span class="text-slate-700 font-medium" x-text="currentBank.account_name"></span>
                            </div>
                            <div class="flex justify-between items-center border-b border-slate-200/60 pb-1.5">
                                <span class="text-slate-400">{{ __('app.business.payment.mobile_app.acc_id') }}:</span>
                                <div class="flex items-center gap-2">
                                    <span class="text-slate-900 font-bold tracking-wide" x-text="currentBank.account_id"></span>
                                    <button type="button" @click.prevent="copyAccount()" class="text-emerald-600 hover:text-emerald-700 text-xs font-medium underline focus:outline-none">
                                        <span x-text="copied ? 'Copied!' : 'Copy'"></span>
                                    </button>
                                </div>
                            </div>
                            <div x-show="currentBank.bank_code" class="flex justify-between pb-1">
                                <span class="text-slate-400">{{ __('app.business.payment.mobile_app.bank_code') }}:</span>
                                <span class="text-slate-700 font-medium" x-text="currentBank.bank_code"></span>
                            </div>
                        </div>

                        <!-- Centered QR Code Column -->
                        <div class="flex justify-center w-full">
                            <div class="w-full max-w-xs flex flex-col items-center justify-center px-4 py-8 bg-white rounded-xl  shadow-lg">
                                <img :src="'{{ asset('storage') }}/' + currentBank.qr_code"
                                    :alt="(currentBank.short_name || 'Bank') + ' QR Code'"
                                    class="w-full h-full md:w-56 md:h-64 rounded-lg object-cover">

                                <span class="text-md font-semibold text-slate-500 mt-2 tracking-wide uppercase">
                                    {{ __('app.business.payment.mobile_app.scan') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </label>

            <!-- Option 2: Cheque Payment -->
            <label
                :class="method === 'cheque' ? 'border-[#8fc74a] ring-[#8fc74a] bg-emerald-50/10' : 'border-slate-200 bg-white hover:border-slate-300'"
                class="relative flex flex-col p-5 rounded-xl border cursor-pointer transition-all shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <input
                            type="radio"
                            name="payment_method"
                            value="cheque"
                            x-model="method"
                            class="h-5 w-5 text-emerald-600 border-slate-300 focus:ring-emerald-500">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-slate-100 rounded-lg text-slate-700">
                                <!-- Cheque Icon -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-base font-semibold text-slate-900">Cheque Payment</span>
                                <span class="block text-sm text-slate-500">Subject to clearance before processing order.</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Extra Cheque details inputs -->
                <div x-show="method === 'cheque'" x-cloak class="mt-4 pt-4 border-t border-slate-100 space-y-3 pl-9">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Cheque Number</label>
                            <input type="text" placeholder="e.g. CHQ-008921" class="w-full text-sm rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Bank Name</label>
                            <input type="text" placeholder="e.g. Commercial Bank" class="w-full text-sm rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-500">
                        </div>
                    </div>
                </div>
            </label>



            <!-- Option 4: Credit / Debit Card / QR -->
            <label
                :class="method === 'card' ? 'border-[#8fc74a] ring-[#8fc74a] bg-emerald-50/10' : 'border-slate-200 bg-white hover:border-slate-300'"
                class="relative flex flex-col p-5 rounded-xl border cursor-pointer transition-all shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <input
                            type="radio"
                            name="payment_method"
                            value="card"
                            x-model="method"
                            class="h-5 w-5 text-emerald-600 border-slate-300 focus:ring-emerald-500">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-slate-100 rounded-lg text-slate-700">
                                <!-- Credit Card Icon -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-base font-semibold text-slate-900">Credit / Debit Card / QR Code</span>
                                <span class="block text-sm text-slate-500">Instant online payment processing.</span>
                            </div>
                        </div>
                    </div>

                </div>
            </label>

        </div>

        <!-- Confirm Action -->
        <div class="mt-8 flex justify-end">
            <button type="button" class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white font-medium text-sm rounded-xl transition-colors shadow-sm focus:outline-none focus focus:ring-slate-900 focus:ring-offset-2">
                Proceed with Payment
            </button>
        </div>

    </div>
</section>

{{-- Corporate Clients --}}
@if($corporates->count())
<section class="py-14 border-t border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-adaptive-main mb-2">
                {{ $isKm ? 'អតិថិជនសហស្ថាប័នរបស់យើង' : 'Our Corporate Clients' }}
            </h2>
            <p class="text-adaptive-muted text-sm">
                {{ $isKm ? 'ស្ថាប័នដែលទុកចិត្តលើ ធេលណេត' : 'Trusted by leading organisations across Cambodia' }}
            </p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @foreach($corporates as $corp)
            <div class="glass-card p-4 rounded-xl flex flex-col items-center justify-center gap-2 text-center hover:border-brand-green/40 transition border border-transparent">
                @if($corp->logo)
                <img src="{{ Storage::url($corp->logo) }}" alt="{{ $corp->getName() }}"
                    class="h-12 w-auto object-contain max-w-[100px]">
                @else
                <div class="w-12 h-12 rounded-lg bg-brand-green/10 flex items-center justify-center">
                    <i class="fa-solid fa-building text-brand-green"></i>
                </div>
                @endif
                <p class="text-xs font-semibold text-adaptive-muted leading-tight">{{ $corp->getName() }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Stats strip --}}
<section class="py-10 border-y border-gray-200 dark:border-gray-800">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            @php
            $stats = [
            ['num'=>'100+', 'label_en'=>'Corporate Clients', 'label_km'=>'អតិថិជនសហស្ថាប័ន'],
            ['num'=>'99.9%', 'label_en'=>'Network Uptime SLA', 'label_km'=>'SLA ហ្វូបណ្តាញ'],
            ['num'=>'24/7', 'label_en'=>'NOC Support', 'label_km'=>'ការគាំទ្រ NOC'],
            ['num'=>'12+', 'label_en'=>'PoPs Nationwide', 'label_km'=>'PoP ទូទាំងប្រទេស'],
            ];
            @endphp
            @foreach($stats as $s)
            <div>
                <div class="text-2xl sm:text-3xl font-black text-transparent bg-clip-text gradient-brand">{{ $s['num'] }}</div>
                <div class="text-xs text-adaptive-muted mt-1 font-semibold">{{ $isKm ? $s['label_km'] : $s['label_en'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16">
    <div class="max-w-3xl mx-auto px-4 text-center space-y-5">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-adaptive-main">
            {{ $isKm ? 'ត្រៀមខ្លួនដំឡើងការតភ្ជាប់ Business ហើយឬ?' : 'Ready to upgrade your business connectivity?' }}
        </h2>
        <p class="text-adaptive-muted text-sm max-w-xl mx-auto">
            {{ $isKm
                ? 'ក្រុមការលក់របស់យើងនឹងចែករំលែកដំណោះស្រាយដែលត្រូវគ្នានឹងតម្រូវការអាជីវកម្មរបស់អ្នក ក្នុងរយៈពេល ២៤ ម៉ោង។'
                : 'Our enterprise sales team will respond within 24 hours with a solution tailored to your specific business needs.' }}
        </p>
        <div class="flex flex-wrap justify-center gap-3">
            <button onclick="openModal('serviceModal')"
                class="gradient-brand text-white font-bold px-8 py-3.5 rounded-xl shadow-lg transition hover:-translate-y-0.5 flex items-center gap-2">
                <i class="fa-solid fa-paper-plane text-sm"></i>
                <span>{{ $isKm ? 'ស្នើសុំតម្លៃ' : 'Get a Quote' }}</span>
            </button>
            <a href="tel:0975135135"
                class="glass-card text-adaptive-main font-semibold px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 transition hover:-translate-y-0.5 flex items-center gap-2">
                <i class="fa-solid fa-phone text-brand-orange"></i>
                <span>097 513 5135</span>
            </a>
        </div>
    </div>
</section>
@include('layouts.scrollBar')
@endsection