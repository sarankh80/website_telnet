@extends('layouts.app')
@section('title', 'សេវាកម្មស្នូល — TELNET CO., LTD.')
@section('content')

@php $isKm = app()->getLocale() === 'km';
$serviceTypes = [
[
"id" => 1,
"name" => "Home Packages",
"name_km" => "Home Packages",
"images" => asset('storage/home/serviceTypes/home.png'),
"icon"=>"fa fa-home",
"services" => [
[
"id" => 1,
"name" => "Home-S",
"bandwidth" => 10,
"price_month" => 16
],
[
"id" => 2,
"name" => "Home-M",
"bandwidth" => 20,
"price_month" => 29
],
[
"id" => 3,
"name" => "Home-L",
"bandwidth" => 30,
"price_month" => 41
],
]
],
[
"id" => 2,
"name" => "Business Packages",
"name_km" => "Business Packages",
"images" => asset('storage/home/serviceTypes/biz.png'),
"icon"=>"fa fa-industry",
"services" => [
[
"id" => 4,
"name" => "Business-S",
"bandwidth" => 10,
"price_month" => 48
],
[
"id" => 5,
"name" => "Business-M",
"bandwidth" => 20,
"price_month" => 96
],
[
"id" => 6,
"name" => "Business-L",
"bandwidth" => 30,
"price_month" => 150
],
]
],
[
"id" => 3,
"name" => "Dedicated Package",
"name_km" => "Dedicated Package",
"images" => asset('storage/home/serviceTypes/dia.png'),
"icon"=>"fa fa-globe",
"services" => [
[
"id" => 4,
"name" => "Dedicated-S",
"bandwidth" => 10,
"price_month" => 120
],
[
"id" => 5,
"name" => "Dedicated-M",
"bandwidth" => 20,
"price_month" => 240
],
[
"id" => 6,
"name" => "Dedicated-L",
"bandwidth" => 30,
"price_month" => 360
],
]
],
];


@endphp

<nav class="sticky top-20 z-40 max-w-8xl h-10 mx-auto px-4 sm:px-6 lg:px-16 relative border-b border-white/10">

    <!-- Chamfered Background Layer -->
    <div class="absolute inset-0 bg-[#8fc74a] pointer-events-none z-0"></div>

    <!-- Interactive Links Layer -->
    <div class="relative z-10 flex items-center justify-center gap-2 sm:gap-6 h-full text-xs font-medium text-white">

        @foreach($serviceTypes as $st)
        <!-- Child Item 1: Home Packages -->
        <div class="relative group h-full flex items-center">
            <a href="{{ $st['url'] ?? '#' }}" class="h-full px-3 flex items-center gap-2 hover:text-white/80 transition-colors duration-200 cursor-pointer">
                {{-- Dynamic Icon or Image --}}
                @if(!empty($st['icon']))
                <i class="{{ $st['icon'] }} text-base"></i>
                @elseif(!empty($st['images']))
                <img class="h-5 w-5 object-contain" loading="lazy" src="{{ $st['images'] }}" alt="{{ $st['name'] }}">
                @else
                <i class="fa-solid fa-layer-group text-sm"></i>
                @endif

                <span class="text-sm font-medium text-white">{{ $st['name'] }}</span>
                <i class="fa-solid fa-chevron-down text-[8px] opacity-70 group-hover:rotate-180 transition-transform duration-200"></i>
            </a>

            <div class="fixed left-0 right-0 top-[120px] hidden group-hover:block z-50 w-screen bg-white border-b border-gray-200 shadow-xl text-gray-800 transition-all duration-200">
                <div class="max-w-7xl mx-auto p-4 sm:p-6 grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 sm:gap-6">
                    @foreach($st["services"] as $s)
                    <div class="fixed left-0 right-0 top-[120px] hidden group-hover:block z-50 w-screen bg-white border-b border-gray-200 shadow-xl text-gray-800 transition-all duration-200">
                        <div class="max-w-7xl mx-auto p-4 sm:p-6 grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 sm:gap-6">
                            @foreach($st["services"] as $s)
                            <a href="#model-s" class="group/card block">
                                <!-- Green outer container: reduced padding to p-1 (4px) to make the green border thin -->
                                <div class="relative w-full max-w-[280px] sm:max-w-xs mx-auto rounded-[1.25rem] sm:rounded-[1.5rem] overflow-hidden  p-1 shadow-lg transition-all duration-300 group-hover/card:-translate-y-1 group-hover/card:shadow-xl">
                                    <div class="absolute -top-6 -right-6 w-16 sm:w-16 h-12 sm:h-14 rounded-full bg-white/10"></div>
                                    <div class="absolute top-4 right-10 w-2.5 sm:w-3 h-2.5 sm:h-3 rounded-full bg-white/20"></div>

                                    <div class="relative h-full rounded-[1rem] sm:rounded-[1.2rem] bg-white flex flex-col items-center pt-0 overflow-visible">
                                        <!-- Title Badge -->
                                        <div class="relative -mt-1 px-4 sm:px-6 py-1 sm:py-1 min-w-[100px] sm:min-w-[130px] rounded-b-xl sm:rounded-b-2xl bg-[#F79633] text-white text-center shadow-md z-20">
                                            <div class="flex items-center justify-center gap-1.5">
                                                <span class="text-sm sm:text-lg font-semibold whitespace-nowrap">{{ $s['name'] }}</span>
                                            </div>
                                        </div>

                                        <!-- Bandwidth Section (Reduced vertical padding) -->
                                        <div class="flex-1 flex flex-col items-center justify-center py-0.5 sm:py-2">
                                            <!-- Mbps above bandwidth -->

                                            <div class="flex items-baseline justify-center leading-none">
                                                <!-- Text stroke size reduced to 0.75px / 1px -->
                                                <span class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight text-[#8fc74a] drop-shadow-sm">
                                                    {{ $s['bandwidth'] }}
                                                </span>
                                            </div>
                                            <span class="text-base sm:text-xl font-medium text-[#8fc74a] -mb-1">Mbps</span>
                                        </div>

                                        <!-- Price Badge -->
                                        <div class="mb-3 sm:mb-4 px-4 sm:px-7 py-1.5 sm:py-2 rounded-lg sm:rounded-xl bg-[#8fc74a] text-white shadow-sm flex items-baseline gap-1">
                                            <span class="text-lg sm:text-2xl font-semibold">{{ $s['price_month'] ?? '16' }}</span>
                                            <span class="text-sm sm:text-lg opacity-90">{{ $s['unit'] ?? 'USD/month' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</nav>
<section class="w-full border h-auto md:h-[400px] lg:h-[70vh] relative overflow-hidden flex flex-col md:flex-row">

    <!-- Right Side: Content Container (100% on mobile, 30% on desktop) -->
    <div class="w-full md:w-[30%] h-auto md:h-full flex flex-col justify-center bg-gradient-to-br from-brand-green/10 via-transparent to-brand-orange/10 items-center text-center p-6 z-10 bg-white border-t md:border-t-0 md:border-l flex-grow">
        <h1 class="flex flex-col gap-2 w-full max-w-xs md:max-w-full">
            <!-- Line 1: Primary Title Text -->
            <span class="text-xl sm:text-2xl md:text-2xl lg:text-8xl font-bold uppercase text-[#8fc74a] leading-tight">
                {{ __('app.internet.title') }}
            </span>
        </h1>

        <!-- Feature Keywords -->
        <div class="flex flex-wrap items-center justify-center gap-2.5 pt-6 w-full max-w-xs md:max-w-full">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xl font-semibold  text-[#F79633] border border-[#8fc74a]/30 shadow-xs transition-all duration-200 hover:scale-105">
                {{__('app.internet.fast')}}
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xl font-semibold bg-[#F79633]/10 text-[#F79633] border border-[#F79633]/30 shadow-xs transition-all duration-200 hover:scale-105">
                {{__('app.internet.reliable')}}
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xl font-semibold  text-[#F79633] border border-[#8fc74a]/30 shadow-xs transition-all duration-200 hover:scale-105">
                {{__('app.internet.stable')}}
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xl font-semibold bg-[#F79633]/10 text-[#F79633] border border-[#F79633]/30 shadow-xs transition-all duration-200 hover:scale-105">
                {{__('app.internet.scalable')}}
            </span>
        </div>
    </div>

    <!-- Left Side: Image Container (100% on mobile, 70% on desktop) -->
    <div class="w-full md:w-[70%] h-[200px] sm:h-[260px] md:h-full relative overflow-hidden flex-shrink-0 opacity-80">
        <img src="{{asset('storage/home/services/home.png')}}"
            alt="Hero Image"
            class="w-full h-full object-cover opacity-90 wallpaper-infinite" />
        <!-- Overlay for subtle contrast -->
        <div class="absolute inset-0 bg-black/10 z-0"></div>
    </div>

</section>
<section class="py-12 section-bg-primary border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-adaptive-muted mb-4">
            <a href="{{ route('home') }}" class="hover:text-brand-green transition">{{ __('app.nav.home') }}</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span>{{ $isKm ? 'សេវាកម្មស្នូល' : 'Core Products & Services' }}</span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-black text-adaptive-main mb-3">
            {{ $isKm ? 'ផលិតផល និងសេវាកម្មស្នូល' : 'Core Products & Services' }}
        </h1>
        <p class="text-adaptive-muted text-sm max-w-2xl">
            {{ $isKm
                ? 'ដំណោះស្រាយតភ្ជាប់អ៊ីនធឺណិត និងព័ត៌មានវិទ្យា ដែលឆ្លើយតបគ្រប់តម្រូវការ'
                : 'Internet connectivity and ICT solutions that meet every need' }}
        </p>
    </div>
</section>

<section class="py-16 section-bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
        $serviceCards = [
        ['image'=>'/images/High_Speed.png', 'badge'=>'High Speed', 'badge_km'=>'ល្បឿនខ្ពស់', 'desc_en'=>'Provide high-speed, reliable and stable internet connectivity.', 'desc_km'=>'ផ្តល់ការតភ្ជាប់អ៊ីនធឺណិតល្បឿនលឿន ជឿជាក់ និងស្ថិតស្ថេរ។'],
        ['image'=>'/images/Scalable.png', 'badge'=>'Scalable', 'badge_km'=>'អាចពង្រីកបាន', 'desc_en'=>'Build scalable and secure network infrastructure across Cambodia.', 'desc_km'=>'សាងសង់ហេដ្ឋារចនាសម្ព័ន្ធបណ្តាញអាចពង្រីក និងមានសុវត្ថិភាពទូទាំងកម្ពុជា។'],
        ['image'=>'/images/Hot_Service.png', 'badge'=>'Best Experience', 'badge_km'=>'បទពិសោធន៍ល្អបំផុត','desc_en'=>'Deliver excellent customer experience and innovative ICT.', 'desc_km'=>'ផ្តល់បទពិសោធន៍អតិថិជនដ៏ល្អ និង ICT ប្រកបដោយភាពច្នៃប្រឌិត។'],
        ['image'=>'/images/Reliable.png', 'badge'=>'Reliable', 'badge_km'=>'ជឿជាក់', 'desc_en'=>'Maintain high standards of customer support and service reliability.','desc_km'=>'រក្សាស្តង់ដារខ្ពស់នៃការគាំទ្រអតិថិជន និងការជឿជាក់លើសេវាកម្ម។'],
        ['image'=>'/images/Quality.png', 'badge'=>'Quality & Saving', 'badge_km'=>'គុណភាព & សន្សំ', 'desc_en'=>'Offering high quality, prompt service and selling what you need.', 'desc_km'=>'ផ្តល់ការេវាកម្មគុណភាពខ្ពស់ ឆ្លើយតបរហ័ស និងលក់តែអ្វីដែលអ្នកត្រូវការ។'],
        ['image'=>'/images/Contribute.png', 'badge'=>'Contribute', 'badge_km'=>'រួមចំណែក', 'desc_en'=>"Contribute to Cambodia's digital transformation.", 'desc_km'=>'រួមចំណែកក្នុងការផ្លាស់ប្តូរឌីជីថលរបស់ប្រទេសកម្ពុជា។'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach($serviceCards as $card)
            <div class="glass-card glass-card-hover p-6 rounded-2xl">
                <div class="w-full h-28 flex items-center justify-center mb-4">
                    <img src="{{ $card['image'] }}" alt="{{ $card['badge'] }}" class="h-24 w-auto object-contain">
                </div>
                <div class="w-full flex justify-center mb-2">
                    <span class="font-bold text-brand-green bg-brand-green/10 px-3 py-1 rounded-md text-sm">
                        {{ $isKm ? $card['badge_km'] : $card['badge'] }}
                    </span>
                </div>
                <p class="text-center font-bold text-[#777] mt-2 text-sm leading-relaxed">
                    {{ $isKm ? $card['desc_km'] : $card['desc_en'] }}
                </p>
            </div>
            @endforeach
        </div>

        {{-- DB services detail --}}
        @if($services->count())
        <div class="border-t border-gray-200 dark:border-gray-800 pt-12">
            <h2 class="text-2xl font-bold text-adaptive-main mb-8 text-center">
                {{ $isKm ? 'ប្រភេទសេវាកម្មលម្អិត' : 'Service Details' }}
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $service)
                <div class="glass-card p-6 rounded-2xl glass-card-hover">
                    <div class="w-12 h-12 rounded-xl {{ $service->color === 'green' ? 'bg-brand-green/10 text-brand-green' : 'bg-brand-orange/10 text-brand-orange' }} flex items-center justify-center text-xl mb-4">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    <span class="text-xs font-bold {{ $service->color === 'green' ? 'text-brand-green bg-brand-green/10' : 'text-brand-orange bg-brand-orange/10' }} px-2.5 py-1 rounded-md">
                        {{ $service->getBadge() }}
                    </span>
                    <h3 class="text-lg font-bold text-adaptive-main mt-3 mb-2">{{ $service->getName() }}</h3>
                    <p class="text-adaptive-muted text-sm leading-relaxed">{{ $service->getDescription() }}</p>
                    <button onclick="openModal('serviceModal')"
                        class="mt-4 text-xs font-bold {{ $service->color === 'green' ? 'text-brand-green' : 'text-brand-orange' }} flex items-center gap-1 hover:gap-2 transition-all">
                        <span>{{ $isKm ? 'សាកសួរព័ត៌មាន' : 'Inquire Now' }}</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

<section class="py-14 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20 border-y border-gray-200 dark:border-gray-800">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-5">
        <h2 class="text-2xl font-extrabold text-adaptive-main">
            {{ $isKm ? 'ចាប់អារម្មណ៍ចង់ប្រើសេវាកម្មមែនទេ?' : 'Interested in our services?' }}
        </h2>
        <button onclick="openModal('serviceModal')"
            class="inline-flex items-center gap-2 gradient-brand text-white font-bold px-8 py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5">
            <i class="fa-solid fa-paper-plane"></i>
            <span>{{ $isKm ? 'ស្នើសុំភ្ជាប់សេវាអ៊ីនធឺណិត' : 'Request Internet Service' }}</span>
        </button>
    </div>
</section>

@endsection