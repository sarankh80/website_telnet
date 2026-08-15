@extends('layouts.app')
@section('title', 'ក្រុមហ៊ុន​យើង​ខ្ញុំ — TELNET CO., LTD.')
@section('content')
@php
$bgImage=asset('storage/home/about/background.png');
$strategy=asset('storage/home/about/bs1.png');
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
    <!-- COMPANY PROFILE SECTION -->
    <div class="w-full min-h-[60vh] md:h-[70vh] bg-white">
        <div class="w-full gradient-l-to-r h-full relative overflow-hidden flex flex-col md:block">
            <!-- BACKGROUND IMAGE -->
            <div class="slide absolute inset-0 transition-opacity duration-1000">
                <div class="w-full h-full overflow-hidden">
                    <img src="{{$bgImage}}"
                        alt="{{ __('app.about.company_profile') }}"
                        class="w-full h-full py-2 object-cover wallpaper-infinite opacity-30 md:opacity-100">
                </div>
            </div>

            <!-- CONTENT OVERLAY -->
            <div class="relative md:absolute inset-0 p-6 sm:p-10 md:py-16 md:px-16 flex flex-col justify-left items-start z-10 my-auto">
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold uppercase text-[#8fc74a] mb-4 md:mb-8">
                    {{ __('app.about.company_profile') }}
                </h1>

                <div class="w-full sm:w-4/5 md:w-1/2 lg:w-1/3 space-y-3 sm:space-y-4">
                    <p class="text-[#444] text-left sm:text-justify text-sm sm:text-base leading-relaxed">
                        {{ __('app.about.desc_1') }}
                    </p>
                    <p class="text-[#444] text-left sm:text-justify text-sm sm:text-base leading-relaxed">
                        {{ __('app.about.desc_2') }}
                    </p>
                    <p class="text-[#444] text-left sm:text-justify text-sm sm:text-base leading-relaxed">
                        {{ __('app.about.desc_3') }}
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- COMPANY STRATEGY SECTION -->
    <div class="w-full min-h-[300px] md:h-[400px] bg-white">
        <div class="max-w-8xl mx-auto h-full p-6 sm:p-6 md:py-8 md:px-24 flex flex-col md:flex-row items-stretch justify-between gap-8 md:gap-12">

            <!-- LEFT: IMAGE CONTAINER (ALIGNED TO BOTTOM) -->
            <div class="w-full md:w-3/5 h-64 md:h-full flex-shrink-0 relative overflow-hidden flex flex-col justify-end">
                <img
                    src="{{$strategy}}"
                    class="w-full h-full object-contain py-4 opacity-40 wallpaper-infinite"
                    alt="{{ __('app.about.company_strategy') }}">
            </div>

            <!-- RIGHT: TEXT CONTENT (ALIGNED TO TOP) -->
            <div class="w-full md:w-2/5 flex flex-col items-start justify-start text-left">
                <h1 class="text-2xl uppercase sm:text-3xl md:text-4xl font-extrabold text-[#8fc74a] mb-4 md:mb-8">
                    {{ __('app.about.company_strategy') }}
                </h1>
                <div class="space-y-4">
                    <p class="text-[#444] text-justify text-base sm:text-md leading-relaxed">
                        {{ __('app.about.strategy_overview') }}
                    </p>
                    <p class="text-[#444] text-justify text-base sm:text-md leading-relaxed">
                        {{ __('app.about.strategy_overview_1') }}
                    </p>
                </div>
            </div>

        </div>
    </div>
    <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- SECTION 1: VISION -->
        <div class="flex flex-col md:flex-row items-start gap-6 md:gap-12 w-full my-6">

            <!-- Left: Header + Text Description -->
            <div class="flex-1 min-w-0 text-left">
                <h3 class="text-2xl sm:text-3xl md:text-4xl text-[#8fc74a] font-bold mb-4">
                    {{ __('app.about.vision_title') }}
                </h3>
                <p class="text-[#444] text-sm sm:text-lg leading-relaxed">
                    {{ __('app.about.vision_desc') }}
                </p>
            </div>

            <!-- Right: Vision Image -->
            <div class="shrink-0 w-16 h-16 sm:w-48 sm:h-48 md:w-72 md:h-72 rounded-2xl flex items-start justify-center self-start md:self-start">
                <img src="{{ $vision }}" alt="Vision" class="w-full h-full object-contain">
            </div>

        </div>
    </div>
    <!-- SECTION 1: Mission -->
    <div class="grid grid-cols-1 lg:grid-cols-2 max-w-8xl mx-auto items-start px-4 sm:px-6 lg:px-8 hidden">
        <div class="my-6 lg:col-span-2">
            <h3 class="text-2xl text-center sm:text-3xl md:text-4xl text-[#8fc74a] font-bold">{{ __('app.about.mission_title') }}</h3>
        </div>
    </div>

    <div class="w-full lg:grid-cols-6 items-center mx-auto rounded-lg overflow-hidden flex flex-col gap-6 md:gap-0 hidden">
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 max-w-7xl">

            <!-- High speed -->
            <div class="w-full md:w-1/2 p-4 font-medium flex flex-col items-center justify-start relative ">
                <div class="flex items-start gap-4 w-full pb-3 mb-3">
                    <div class="w-20 h-20 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('storage/home/about/mission/highspeed.png') }}" alt="Scalable" class="max-w-full max-h-full object-contain">
                    </div>
                    <strong class="text-[#8fc74a] font-bold text-base uppercase tracking-wide">
                        {{ __('app.about.mission_highspeed') }}
                    </strong>
                </div>
                <!-- <div class="mx-4 mb-4 h-[1px] w-full border border-[#8fc74a]"></div> -->
                <p class="text-[#666] text-sm text-left text-justify hidden">
                    {{ __('app.about.mission_highspeed_desc') }}
                </p>
            </div>

            <!-- Scalable Card -->
            <div class="w-full md:w-1/2 p-4 font-medium flex flex-col items-center justify-start relative ">
                <div class="flex items-start gap-4 w-full pb-3 mb-3">
                    <div class="w-20 h-20 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('storage/home/about/mission/scalable.png') }}" alt="Scalable" class="max-w-full max-h-full object-contain">
                    </div>
                    <strong class="text-[#8fc74a] font-bold text-base uppercase tracking-wide">
                        {{ __('app.about.mission_scalable') }}
                    </strong>
                </div>
                <!-- <div class="mx-4 mb-4 h-[1px] w-full border border-[#8fc74a]"></div> -->
                <p class="text-[#666] text-sm text-left text-justify hidden">
                    {{ __('app.about.mission_scalable_desc') }}
                </p>
            </div>

            <!-- Hot Service Card -->
            <div class="w-full md:w-1/2 p-4 font-medium flex flex-col items-center justify-start border-t md:border-t-0 relative ">
                <div class="flex items-start gap-4 w-full pb-3 mb-3">
                    <div class="w-20 h-20 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('storage/home/about/mission/hotService.png') }}" alt="Hot Service" class="max-w-full max-h-full object-contain">
                    </div>
                    <strong class="text-[#8fc74a] font-bold text-base uppercase tracking-wide">
                        {{ __('app.about.mission_hotservice') }}
                    </strong>
                </div>
                <!-- <div class="mx-4 mb-4 h-[1px] w-full border border-[#8fc74a]"></div> -->
                <p class="text-[#666] text-sm text-left text-justify hidden">
                    {{ __('app.about.mission_hotservice_desc') }}
                </p>
            </div>

        </div>
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 max-w-7xl">

            <!-- Quality Card -->
            <div class="w-full md:w-1/2 p-4 font-medium flex flex-col items-center justify-start relative">
                <div class="flex items-start gap-4 w-full pb-3 mb-3">
                    <div class="w-20 h-20 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('storage/home/about/mission/quality.png') }}" alt="Scalable" class="max-w-full max-h-full object-contain">
                    </div>
                    <strong class="text-[#8fc74a] font-bold text-base uppercase tracking-wide">
                        {{ __('app.about.mission_quality') }}
                    </strong>
                </div>
                <!-- <div class="mx-4 mb-4 h-[1px] w-full border border-[#8fc74a]"></div> -->
                <p class="text-[#666] text-sm text-left text-justify hidden">
                    {{ __('app.about.mission_quality_desc') }}
                </p>
            </div>

            <!-- Reliable Card -->
            <div class="w-full md:w-1/2 p-4 font-medium flex flex-col items-center justify-start relative ">
                <div class="flex items-start gap-4 w-full pb-3 mb-3">
                    <div class="w-20 h-20 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('storage/home/about/mission/reliable.png') }}" alt="Scalable" class="max-w-full max-h-full object-contain">
                    </div>
                    <strong class="text-[#8fc74a] font-bold text-base uppercase tracking-wide">
                        {{ __('app.about.mission_reliable') }}
                    </strong>
                </div>
                <!-- <div class="mx-4 mb-4 h-[1px] w-full border border-[#8fc74a]"></div> -->
                <p class="text-[#666] text-sm text-left text-justify hidden">
                    {{ __('app.about.mission_reliable_desc') }}
                </p>
            </div>

            <!-- Contribute Card -->
            <div class="w-full md:w-1/2 p-4 font-medium flex flex-col items-center justify-start border-t md:border-t-0 relative ">
                <div class="flex items-start gap-4 w-full pb-3 mb-3">
                    <div class="w-20 h-20 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('storage/home/about/mission/contribute.png') }}" alt="Hot Service" class="max-w-full max-h-full object-contain">
                    </div>
                    <strong class="text-[#8fc74a] font-bold text-base uppercase tracking-wide">
                        {{ __('app.about.mission_contribute') }}
                    </strong>
                </div>
                <!-- <div class="mx-4 mb-4 h-[1px] w-full border border-[#8fc74a]"></div> -->
                <p class="text-[#666] text-sm text-left text-justify hidden">
                    {{ __('app.about.mission_contribute_desc') }}
                </p>
            </div>

        </div>
    </div>


    <div class="w-full max-w-7xl mx-auto rounded-lg overflow-hidden flex flex-col gap-6 md:gap-0 relative py-8 hidden">

        <!-- SVG CONNECTOR LINES OVERLAY -->
        <svg class="hidden md:block absolute inset-0 w-full h-full pointer-events-none z-0" xmlns="http://www.w3.org/2000/svg">
            <g stroke="#8fc74a" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">

                <!-- 1. Center -> High Speed (Top-Left): "|" then "\" -->
                <line x1="45%" y1="42%" x2="45%" y2="30%" />
                <line x1="45%" y1="30%" x2="35.5%" y2="23%" />

                <!-- 2. Center -> Scalable (Top-Right): "|" then "/" -->
                <line x1="55%" y1="42%" x2="55%" y2="30%" />
                <line x1="55%" y1="30%" x2="64.5%" y2="23%" />

                <!-- 3. Center -> Hot Service (Middle-Left) -->
                <line x1="42%" y1="50%" x2="22%" y2="50%" />

                <!-- 4. Center -> Quality (Middle-Right) -->
                <line x1="58%" y1="50%" x2="78%" y2="50%" />

                <!-- 5. Center -> Reliable (Bottom-Left): "|" then "/" -->
                <line x1="45%" y1="58%" x2="45%" y2="70%" />
                <line x1="45%" y1="70%" x2="35.5%" y2="77%" />

                <!-- 6. Center -> Contribute (Bottom-Right): "|" then "\" -->
                <line x1="55%" y1="58%" x2="55%" y2="70%" />
                <line x1="55%" y1="70%" x2="64.5%" y2="77%" />

            </g>
        </svg>

        <!-- Row 1 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 z-10">
            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>

            <!-- High Speed (1) -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/highspeed.png') }}" alt="High Speed" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_highspeed') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_highspeed_desc') }}
                </p>
            </div>

            <!-- Scalable (2) -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/scalable.png') }}" alt="Scalable" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_scalable') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_scalable_desc') }}
                </p>
            </div>

            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>
        </div>

        <!-- Row 2 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 z-10">
            <!-- Hot Service (3) -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/hotService.png') }}" alt="Hot Service" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_hotservice') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_hotservice_desc') }}
                </p>
            </div>

            <!-- CENTER IMAGE CONTAINER -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center order-first md:order-none relative z-20">
                <div class="w-36 h-36 md:w-64 md:h-64 mb-4 flex items-center justify-center rounded-full bg-white relative">
                    <img src="{{ $mission }}" alt="Mission Center" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] text-2xl md:text-3xl font-bold w-full mb-1 uppercase">
                    {{ __('app.about.mission_title') }}
                </strong>
            </div>

            <!-- Quality (4) -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/quality.png') }}" alt="Quality" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_quality') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_quality_desc') }}
                </p>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 z-10">
            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>

            <!-- Reliable (5) -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/reliable.png') }}" alt="Reliable" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_reliable') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_reliable_desc') }}
                </p>
            </div>

            <!-- Contribute (6) -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/contribute.png') }}" alt="Contribute" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_contribute') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_contribute_desc') }}
                </p>
            </div>

            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center min-h-[14rem]"></div>
        </div>
    </div>
    <div class="w-full max-w-7xl mx-auto rounded-lg overflow-hidden flex flex-col gap-6 md:gap-0 relative py-8 ">

        <!-- SVG CONNECTOR LINES OVERLAY -->
        <svg class="hidden md:block absolute inset-0 w-full h-full pointer-events-none z-0" xmlns="http://www.w3.org/2000/svg">
            <g stroke="#8fc74a" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">

                <!-- Top bar: connects High Speed (left) to Scalable (right) -->
                <line x1="20%" y1="12%" x2="82%" y2="12%" />

                <!-- Vertical trunk: from top bar down through center, to bottom bar -->
                <line x1="50%" y1="12%" x2="50%" y2="85%" />

                <!-- Middle row: Center -> Hot Service (left) -->
                <line x1="42%" y1="50%" x2="22%" y2="50%" />

                <!-- Middle row: Center -> Quality (right) -->
                <line x1="58%" y1="50%" x2="78%" y2="50%" />

                <!-- Bottom bar: connects Reliable (left) to Contribute (right) -->
                <line x1="20%" y1="85%" x2="82%" y2="85%" />

            </g>
        </svg>

        <!-- Row 1 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 z-10">


            <!-- High Speed (1) -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">

                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_highspeed') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_highspeed_desc') }}
                </p>
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/highspeed.png') }}" alt="High Speed" class="max-w-full max-h-full object-contain">
                </div>
            </div>
            <div class="hidden md:flex md:w-2/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>
            <!-- Scalable (2) -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">

                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_scalable') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_scalable_desc') }}
                </p>
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/scalable.png') }}" alt="Scalable" class="max-w-full max-h-full object-contain">
                </div>
            </div>


        </div>

        <!-- Row 2 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 z-10">
            <!-- Hot Service (3) -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/hotService.png') }}" alt="Hot Service" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_hotservice') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_hotservice_desc') }}
                </p>
            </div>

            <!-- CENTER IMAGE CONTAINER -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center order-first md:order-none relative z-20">
                <div class="w-36 h-36 md:w-48 md:h-48 mb-4 flex items-center justify-center rounded-full bg-white relative">
                    <img src="{{ $mission }}" alt="Mission Center" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] text-2xl md:text-3xl font-bold w-full mb-1 uppercase">
                    {{ __('app.about.mission_title') }}
                </strong>
            </div>

            <!-- Quality (4) -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/quality.png') }}" alt="Quality" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_quality') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_quality_desc') }}
                </p>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 z-10">


            <!-- Reliable (5) -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/reliable.png') }}" alt="Reliable" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_reliable') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_reliable_desc') }}
                </p>
            </div>
            <div class="hidden md:flex md:w-2/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>
            <!-- Contribute (6) -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10 border border-[#8fc74a]/20 shadow-sm">
                    <img src="{{ asset('storage/home/about/mission/contribute.png') }}" alt="Contribute" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_contribute') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_contribute_desc') }}
                </p>
            </div>
        </div>
    </div>

    <div class="w-full lg:grid-cols-2 max-w-7xl mx-auto rounded-lg overflow-hidden flex flex-col gap-6 md:gap-0 relative hidden">

        <!-- BACKGROUND CONNECTING LINES FOR DESKTOP -->
        <div class="hidden md:block absolute inset-0 pointer-events-none z-0">
            <!-- Top-Left Line (Center to High Speed) -->
            <div class="absolute w-[30%] h-[2px] bg-gradient-to-r from-transparent via-[#8fc74a] to-[#8fc74a] top-[28%] left-[20%] -rotate-12 origin-right"></div>

            <!-- Top-Right Line (Center to Scalable) -->
            <div class="absolute w-[30%] h-[2px] bg-gradient-to-l from-transparent via-[#8fc74a] to-[#8fc74a] top-[28%] right-[20%] rotate-12 origin-left"></div>

            <!-- Middle-Left Line (Center to Hot Service) -->
            <div class="absolute w-[22%] h-[2px] bg-[#8fc74a] top-[50%] left-[14%] -translate-y-1/2"></div>

            <!-- Middle-Right Line (Center to Quality) -->
            <div class="absolute w-[22%] h-[2px] bg-[#8fc74a] top-[50%] right-[14%] -translate-y-1/2"></div>

            <!-- Bottom-Left Line (Center to Reliable) -->
            <div class="absolute w-[30%] h-[2px] bg-gradient-to-r from-transparent via-[#8fc74a] to-[#8fc74a] bottom-[28%] left-[20%] rotate-12 origin-right"></div>

            <!-- Bottom-Right Line (Center to Contribute) -->
            <div class="absolute w-[30%] h-[2px] bg-gradient-to-l from-transparent via-[#8fc74a] to-[#8fc74a] bottom-[28%] right-[20%] -rotate-12 origin-left"></div>
        </div>

        <!-- Row 1 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 z-10">
            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>

            <!-- High Speed -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10">
                    <img src="{{ asset('storage/home/about/mission/highspeed.png') }}" alt="High Speed" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_highspeed') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_highspeed_desc') }}
                </p>
            </div>

            <!-- Scalable -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10">
                    <img src="{{ asset('storage/home/about/mission/scalable.png') }}" alt="Scalable" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_scalable') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_scalable_desc') }}
                </p>
            </div>

            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>
        </div>

        <!-- Row 2 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 z-10">
            <!-- Hot Service -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10">
                    <img src="{{ asset('storage/home/about/mission/hotService.png') }}" alt="Hot Service" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_hotservice') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_hotservice_desc') }}
                </p>
            </div>

            <!-- CENTER IMAGE CONTAINER -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center order-first md:order-none relative z-20">
                <div class="w-36 h-36 md:w-64 md:h-64 mb-4 flex items-center justify-center rounded-full bg-white relative">
                    <img src="{{ $mission }}" alt="Mission Center" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] text-2xl md:text-3xl font-bold w-full mb-1">
                    {{ __('app.about.mission_title') }}
                </strong>
            </div>

            <!-- Quality -->
            <div class="w-full md:w-1/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10">
                    <img src="{{ asset('storage/home/about/mission/quality.png') }}" alt="Quality" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_quality') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_quality_desc') }}
                </p>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="flex flex-col md:flex-row w-full gap-4 md:gap-0 z-10">
            <div class="hidden md:flex md:w-1/4 p-2 text-center font-medium flex-col items-center justify-center min-h-[14rem]"></div>

            <!-- Reliable -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10">
                    <img src="{{ asset('storage/home/about/mission/reliable.png') }}" alt="Reliable" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_reliable') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
                    {{ __('app.about.mission_reliable_desc') }}
                </p>
            </div>

            <!-- Contribute -->
            <div class="w-full md:w-2/4 p-2 text-center font-medium flex flex-col items-center justify-center relative">
                <div class="w-20 h-20 mb-4 flex items-center justify-center bg-white rounded-full relative z-10">
                    <img src="{{ asset('storage/home/about/mission/contribute.png') }}" alt="Contribute" class="max-w-full max-h-full object-contain">
                </div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase">
                    {{ __('app.about.mission_contribute') }}
                </strong>
                <p class="text-[#666] text-xs text-center sm:text-justify hidden">
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
            <div class="w-16 h-16 ">
                <img src="{{$reliable}}" alt="{{$reliable}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase border-b-[1.5px] border-[#8fc74a]">
                    {{ __('app.about.core_relaible') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-16 h-16">
                <img src="{{$customer}}" alt="{{$customer}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase border-b-[1.5px] border-[#8fc74a]">
                    {{ __('app.about.core_customer') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-16 h-16">
                <img src="{{$operation}}" alt="{{$operation}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase border-b-[1.5px] border-[#8fc74a]">
                    {{ __('app.about.core_operation') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-3 flex flex-col space-y-1 items-center">
            <div class="w-16 h-16">
                <img src="{{$innovation}}" alt="{{$innovation}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase border-b-[1.5px] border-[#8fc74a]">
                    {{ __('app.about.core_innovation') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-3 flex flex-col space-y-1 items-center">
            <div class="w-16 h-16">
                <img src="{{$community}}" alt="{{$community}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase border-b-[1.5px] border-[#8fc74a]">
                    {{ __('app.about.core_community') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-16 h-16">
                <img src="{{$lifelong}}" alt="{{$lifelong}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase border-b-[1.5px] border-[#8fc74a]">
                    {{ __('app.about.core_longlifeLearn') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-16 h-16">
                <img src="{{$therightTeam}}" alt="{{$therightTeam}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase border-b-[1.5px] border-[#8fc74a]">
                    {{ __('app.about.core_therightteam') }}
                </strong>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2 flex flex-col space-y-1 items-center">
            <div class="w-16 h-16">
                <img src="{{$positive}}" alt="{{$positive}}" class="hover:scale-105 w-full h-full object-contain">
            </div>
            <div>
                <strong class="block text-[#8fc74a] font-bold w-full text-base mb-1 uppercase border-b-[1.5px] border-[#8fc74a]">
                    {{ __('app.about.core_positive') }}
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