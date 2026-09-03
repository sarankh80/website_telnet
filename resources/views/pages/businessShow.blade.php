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
        <div>
            <h2 class="text-2xl sm:text-3xl font-semibold capitalize border-b-2 border-[#8fc74a] text-[#8fc74a] pb-4 mb-2">
                {{ __('app.business.hook') }}
            </h2>
            <p class="text-sm  rounded-md  text-justify line-clamp-6 !leading-relaxed">
                {{ __('app.business.hook_desc') }}
            </p>
        </div>
        <br>
        <div class="max-w-7xl mx-auto py-8">
            <div>
                <h2 class="text-2xl sm:text-3xl font-semibold uppercase text-[#8fc74a] pb-4 mb-2">
                    {{ $isKm?$slugs->name_km: $slugs->name }}
                </h2>
                <span class="!text-sm  rounded-md  text-justify line-clamp-6 !leading-relaxed">
                    {!! $isKm?$slugs->desc_km: $slugs->desc !!}
                </span>
            </div>
        </div>
        <div class="w-full max-w-7xl h-[500px] border border-gray-200">
            <img src="{{asset('storage/'.$slugs->image)}}" alt=""
                class="w-full h-full object-cover ">
        </div>
    </div>
</section>


<section class=" py-8 px-4 sm:px-6 lg:px-8 ">
    <div class="max-w-7xl mx-auto px-4 space-y-2">
        <span class="text-sm sm:text-md mx-4 text-[#F79633] font-semibold border-lg bg-[#F79633]/20 border border-[#F79633] px-4 py-1 rounded-2xl">{{ __('app.business.detail.hook')}}</span>
        <h2 class="text-2xl sm:text-5xl mx-4 uppercase font-extrabold text-[#F79633]">
            {{ __('app.business.detail.benifit')}}
        </h2>

    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-7xl mx-auto px-8 py-4">
        @if(count($slugs->benifit)>0)
        @foreach($slugs->benifit as $b)
        <div class="group p-6  hover:border-[#8fc74a] hover:shadow-xl hover:shadow-[#8fc74a]/30  transition-all duration-300">
            <div class="flex items-start gap-3.5 mb-3">
                <div class="flex-shrink-0 p-2 rounded-xl bg-emerald-50 text-[#8fc74a] group-hover:bg-[#8fc74a] group-hover:text-white transition-colors duration-300">
                    @if($b->icon){!! $b->icon !!}@else<i class="fa fa-check-circle text-xl" aria-hidden="true"></i> @endif
                </div>
                <h3 class="text-lg font-bold text-[#8fc74a] group-hover:text-[#8fc74a] transition-colors duration-300 pt-1 border-b-2 border-[#F79633]">
                    {{$isKm?$b->title_km:$b->title}}
                </h3>
            </div>
            <p class="text-slate-600 text-sm leading-relaxed pl-[44px]">
                {{$isKm?$b->desc_km:$b->desc}}
            </p>
        </div>
        @endforeach
        @endif
    </div>
</section>

{{-- Stats strip --}}
<section class="py-10 dark:border-gray-800">
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