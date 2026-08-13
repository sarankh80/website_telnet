@extends('layouts.app')
@section('title', 'ក្រុមហ៊ុន​យើង​ខ្ញុំ — TELNET CO., LTD.')
@section('content')
@php
$bgImage=asset('storage/home/about/background.png');
$strategy=asset('storage/home/about/bs.png');
$vision=asset('storage/home/about/vision.png');
$mission=asset('storage/home/about/mission/mission.png');

$reliable=asset('storage/home/about/coreValue/reliable.png');
$customer=asset('storage/home/about/coreValue/customerFirst.png');
$operation=asset('storage/home/about/coreValue/operation.png');
$lifelong=asset('storage/home/about/coreValue/longlifeLearn.png');
$therightTeam=asset('storage/home/about/coreValue/theRightTeam.png');
$positive=asset('storage/home/about/coreValue/positiveAttitude.png');
$innovation=asset('storage/home/about/coreValue/innovation.png');
$community=asset('storage/home/about/coreValue/communityDevelop.png');

@endphp
<section class="w-full pb-8 top-0 backdrop-blur-md bg-[#8fc74a]/5">
    <!-- COMPANY PROFILE SECTION -->
    <!-- 'core_relaible' => 'Deliver Reliable Connectivity',
    'core_customer' => 'Customer-First Commitment',
    'core_operation' => 'Operational & Technical Excellence',
    'core_longlifeLearn' => 'Lifelong LearningS',
    'core_therightteam' => 'Professional The Right Team',
    'core_positive' => 'Integrity & Positive Attitude',
    'core_innovation' => 'Innovation & Technology Leadership',
    'core_community' => 'Community & National Development', -->
    <div class="w-full min-h-[60vh] md:h-[70vh]">
        <div class="w-full gradient-l-to-r h-full relative overflow-hidden flex-shrink-0 bg-white">
            <div class="slide absolute inset-0 transition-opacity duration-1000">
                <div class="w-full h-full overflow-hidden absolute">
                    <img src="{{$bgImage}}"
                        class="w-full h-full object-cover wallpaper-infinite">
                </div>
            </div>
            <div class="absolute inset-0 p-6 sm:p-12 md:py-16 md:px-16 flex flex-col justify-left items-start">
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold text-[#8fc74a] mb-4 md:mb-8">
                    {{ __('app.about.company_profile') }}
                </h1>
                <div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3 space-y-4">
                    <p class="text-[#444] text-left sm:text-justify text-base sm:text-md leading-relaxed">
                        {{ __('app.about.desc_1') }}
                    </p>
                    <p class="text-[#444] text-left sm:text-justify text-base sm:text-md leading-relaxed">
                        {{ __('app.about.desc_2') }}
                    </p>
                    <p class="text-[#444] text-left sm:text-justify text-base sm:text-md leading-relaxed">
                        {{ __('app.about.desc_3') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- COMPANY STRATEGY SECTION -->
    <div class="w-full min-h-[60vh] md:h-[70vh]">
        <div class="min-w-7xl gradient-tr-to-bl h-full relative overflow-hidden flex-shrink-0 bg-white">
            <div class="slide absolute inset-0 transition-opacity duration-1000">
                <div class="w-full h-full overflow-hidden absolute">
                    <img
                        src="{{$strategy}}"
                        class="w-full px-8 md:px-48 h-full object-cover opacity-60 wallpaper-infinite">
                </div>
            </div>
            <div class="absolute inset-0 p-6 sm:p-12 md:py-16 md:px-40 flex flex-col items-start justify-left">
                <div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3 ml-auto text-left">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#8fc74a] mb-4 md:mb-8">
                        {{ __('app.about.company_strategy') }}
                    </h1>
                    <div>
                        <p class="text-[#444] text-justify text-base sm:text-md leading-relaxed mb-2">
                            {{ __('app.about.strategy_overview') }}
                        </p>
                        <p class="text-[#444] text-justify text-base sm:text-md leading-relaxed mb-2">
                            {{ __('app.about.strategy_overview_1') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN BODY CONTENT -->
    <div class="grid grid-cols-1 lg:grid-cols-2 max-w-8xl mx-auto items-start px-4 sm:px-6 lg:px-8">
        <div class="my-6 lg:col-span-2">
            <h3 class="text-2xl text-center sm:text-3xl md:text-4xl text-[#8fc74a] font-bold">{{ __('app.about.vision_title') }}</h3>
        </div>
        <!-- SECTION 1: VISION -->
        <div class="lg:col-span-2 max-w-4xl mx-auto items-start flex flex-col md:flex-row gap-6 md:gap-12 w-full">
            <div class="shrink-0 w-24 h-24 sm:w-48 sm:h-48 md:w-72 md:h-72 rounded-2xl flex items-center justify-center md:-mt-8">
                <img src="{{ $vision }}" alt="Vision" class="w-full h-full object-contain ">
            </div>
            <div class="flex-1 min-w-0 mb-4 md:mb-8 text-center md:text-left">
                <p class="text-[#444] text-left sm:text-justify text-sm sm:text-lg leading-[1.5] mb-2">{{ __('app.about.vision_desc') }}</p>
            </div>
        </div>
    </div>
    <!-- SECTION 2: MISSION GRID -->
    <div class="w-full lg:grid-cols-2 max-w-7xl mx-auto rounded-lg overflow-hidden flex flex-col gap-6 md:gap-0">
        <!-- Row 1 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0">
            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>

            <!-- High Speed -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center">
                <div class="w-20 h-20 mb-4 flex items-center justify-center">
                    <img src="{{asset('storage/High_Speed.png') }}" alt="High Speed" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_highspeed') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify">
                    {{ __('app.about.mission_highspeed_desc') }}
                </p>
            </div>

            <!-- Scalable -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center">
                <div class="w-20 h-20 mb-4 flex items-center justify-center">
                    <img src="{{ asset('storage/Scalable.png') }}" alt="Scalable" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_scalable') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify">
                    {{ __('app.about.mission_scalable_desc') }}
                </p>
            </div>

            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>
        </div>

        <!-- Row 2 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0">
            <!-- Hot Service -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center">
                <div class="w-20 h-20 mb-4 flex items-center justify-center">
                    <img src="{{ asset('storage/Hot_Service.png') }}" alt="Hot Service" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_hotservice') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify">
                    {{ __('app.about.mission_hotservice_desc') }}
                </p>
            </div>

            <!-- CENTER IMAGE CONTAINER -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center order-first md:order-none">
                <div class="w-36 h-36 md:w-64 md:h-64 mb-4 flex items-center justify-center rounded-full ">
                    <img src="{{$mission }}" alt="Mission Center" class="max-w-full max-h-full object-contain ">
                </div>
                <strong class="block text-transparent bg-clip-text gradient-brand text-2xl md:text-3xl font-bold w-full mb-1">
                    {{ __('app.about.mission_title') }}
                </strong>
            </div>

            <!-- Quality -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center">
                <div class="w-20 h-20 mb-4 flex items-center justify-center">
                    <img src="{{ asset('storage/Quality.png') }}" alt="Quality" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_quality') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify">
                    {{ __('app.about.mission_quality_desc') }}
                </p>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0">
            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>

            <!-- Reliable -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center">
                <div class="w-20 h-20 mb-4 flex items-center justify-center">
                    <img src="{{ asset('storage/Reliable.png') }}" alt="Reliable" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_reliable') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify">
                    {{ __('app.about.mission_reliable_desc') }}
                </p>
            </div>

            <!-- Contribute -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center">
                <div class="w-20 h-20 mb-4 flex items-center justify-center">
                    <img src="{{ asset('storage/Contribute.png') }}" alt="Contribute" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_contribute') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify">
                    {{ __('app.about.mission_contribute_desc') }}
                </p>
            </div>

            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-6 gap-6 py-8 max-w-7xl mx-auto items-center">
        <!-- Header Spanning All 6 Columns -->
        <div class="col-span-1 md:col-span-6 mb-8">
            <h3 class="text-2xl text-center sm:text-3xl md:text-4xl text-[#8fc74a] font-bold">
                {{ __('app.about.core_value') }}
            </h3>
        </div>

        <!-- Content Spanning 2 Columns -->
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-24 h-24">
                <img src="{{$reliable}}" alt="{{$reliable}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.core_relaible') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-24 h-24">
                <img src="{{$customer}}" alt="{{$customer}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.core_customer') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-24 h-24">
                <img src="{{$operation}}" alt="{{$operation}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.core_operation') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-24 h-24">
                <img src="{{$lifelong}}" alt="{{$lifelong}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.core_longlifeLearn') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-24 h-24">
                <img src="{{$therightTeam}}" alt="{{$therightTeam}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.core_therightteam') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-24 h-24">
                <img src="{{$positive}}" alt="{{$positive}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.core_positive') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-3 flex flex-col space-y-1 items-center">
            <div class="w-24 h-24">
                <img src="{{$innovation}}" alt="{{$innovation}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.core_innovation') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-3 flex flex-col space-y-1 items-center">
            <div class="w-24 h-24">
                <img src="{{$community}}" alt="{{$community}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.core_community') }}
                </strong>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-14 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20 hidden">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-5">
        <h2 class="text-2xl font-extrabold text-adaptive-main">{{ __('app.about.connect_cta') }}</h2>
        <button onclick="openModal('serviceModal')"
            class="inline-flex items-center gap-2 gradient-brand text-white font-bold px-8 py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5">
            <i class="fa-solid fa-paper-plane"></i>
            <span>{{ __('app.about.request_internet') }}</span>
        </button>
    </div>
</section>

@endsection