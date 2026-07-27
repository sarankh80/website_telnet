@extends('layouts.app')
@section('title', 'សេវាកម្មស្នូល — TELNET CO., LTD.')
@section('content')

@php $isKm = app()->getLocale() === 'km'; @endphp

<nav class="sticky top-20 z-40 max-w-8xl h-10 mx-auto px-4 sm:px-6 lg:px-16 relative border-b border-white/10">

    <!-- Chamfered Background Layer -->
    <div class="absolute inset-0 gradient-brand lg:[clip-path:polygon(0_0,_100%_0,_100%_calc(100%-7rem),_calc(100%-12.6rem)_100%,_12.6rem_100%,_0_calc(100%-7rem))] pointer-events-none z-0"></div>

    <!-- Interactive Links Layer -->
    <div class="relative z-10 flex items-center justify-center gap-2 sm:gap-6 h-full text-xs font-medium text-white">

        <!-- Child Item 1: Home Packages -->
        <div class="relative group h-full flex items-center">
            <a href="#sub-link-1" class="h-full px-3 flex items-center gap-1.5 hover:text-white/80 transition-colors duration-200 cursor-pointer">
                <span class="!text-[1rem] font-medium !text-white">{{ $isKm ? 'កញ្ចប់សម្រាប់គេហដ្ឋាន' : 'Home Packages' }}</span>
                <i class="fa-solid fa-chevron-down text-[8px] opacity-70 group-hover:rotate-180 transition-transform duration-200"></i>
            </a>

            <div class="fixed left-0 right-0 top-[120px] hidden group-hover:block z-50 w-screen bg-white border-b border-gray-200 shadow-xl text-gray-800 transition-all duration-200">
                <div class="max-w-7xl mx-auto p-6 grid grid-cols-2 sm:grid-cols-4 gap-6">

                    <a href="#model-s" class="group/card p-4 rounded-2xl hover:bg-gray-50 transition flex flex-col items-center text-center border border-transparent hover:border-gray-100">
                        <img src="https://images.unsplash.com/photo-1617788138017-80ad40651399?w=500&auto=format&fit=crop&q=60" alt="Model S" class="w-full h-32 object-cover rounded-xl mb-3 shadow-sm group-hover/card:scale-[1.02] transition duration-300" />
                        <h4 class="font-bold text-sm text-gray-900 mb-0.5">Model S</h4>
                        <span class="text-[11px] text-brand-green font-semibold">Explore Specs</span>
                    </a>

                    <a href="#model-3" class="group/card p-4 rounded-2xl hover:bg-gray-50 transition flex flex-col items-center text-center border border-transparent hover:border-gray-100">
                        <img src="https://images.unsplash.com/photo-1560958089-b8a1929cea89?w=500&auto=format&fit=crop&q=60" alt="Model 3" class="w-full h-32 object-cover rounded-xl mb-3 shadow-sm group-hover/card:scale-[1.02] transition duration-300" />
                        <h4 class="font-bold text-sm text-gray-900 mb-0.5">Model 3</h4>
                        <span class="text-[11px] text-brand-green font-semibold">Order Now</span>
                    </a>

                    <a href="#model-x" class="group/card p-4 rounded-2xl hover:bg-gray-50 transition flex flex-col items-center text-center border border-transparent hover:border-gray-100">
                        <img src="https://images.unsplash.com/photo-1536700503339-1e4b06520771?w=500&auto=format&fit=crop&q=60" alt="Model X" class="w-full h-32 object-cover rounded-xl mb-3 shadow-sm group-hover/card:scale-[1.02] transition duration-300" />
                        <h4 class="font-bold text-sm text-gray-900 mb-0.5">Model X</h4>
                        <span class="text-[11px] text-brand-green font-semibold">Explore Specs</span>
                    </a>

                    <a href="#model-y" class="group/card p-4 rounded-2xl hover:bg-gray-50 transition flex flex-col items-center text-center border border-transparent hover:border-gray-100">
                        <img src="https://images.unsplash.com/photo-1571127236794-81c0137ce69e?w=500&auto=format&fit=crop&q=60" alt="Model Y" class="w-full h-32 object-cover rounded-xl mb-3 shadow-sm group-hover/card:scale-[1.02] transition duration-300" />
                        <h4 class="font-bold text-sm text-gray-900 mb-0.5">Model Y</h4>
                        <span class="text-[11px] text-brand-green font-semibold">Order Now</span>
                    </a>

                </div>
            </div>
        </div>

        <!-- Child Item 2: Business Packages -->
        <div class="relative group h-full flex items-center">
            <a href="#sub-link-2" class="h-full px-3 flex items-center gap-1.5 hover:text-white/80 transition-colors duration-200 cursor-pointer">
                <span class="!text-[1rem]">{{ $isKm ? 'កញ្ចប់សម្រាប់ពាណិជ្ជកម្ម' : 'Business Packages' }}</span>
                <i class="fa-solid fa-chevron-down text-[8px] opacity-70 group-hover:rotate-180 transition-transform duration-200"></i>
            </a>

            <div class="fixed left-0 right-0 top-[120px] hidden group-hover:block z-50 w-screen bg-white border-b border-gray-200 shadow-xl text-gray-800 transition-all duration-200">
                <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <a href="#support" class="group/card p-4 rounded-2xl hover:bg-green-50 transition flex flex-col items-center text-center border border-transparent hover:border-green-400">
                        <div class="w-full h-36 mb-3 rounded-xl bg-gray-50 flex items-center justify-center overflow-hidden shadow-sm">
                            <img src="IMAGE/IDC.png" alt="Support" class="max-w-full max-h-36 object-contain group-hover/card:scale-[1.02]" />
                        </div>
                        <h4 class="font-bold text-sm text-gray-900 mb-0.5">24/7 Enterprise Help</h4>
                        <p class="text-[11px] text-gray-500">Dedicated operational assistance and configuration support guides.</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Child Item 3: Dedicated Packages -->
        <div class="relative group h-full flex items-center">
            <a href="#sub-link-3" class="h-full px-3 flex items-center gap-1.5 hover:text-white/80 transition-colors duration-200 cursor-pointer">
                <span class="!text-[1rem]">{{ $isKm ? 'កញ្ចប់សម្រាប់' : 'Dedicated Packages' }}</span>
                <i class="fa-solid fa-chevron-down text-[8px] opacity-70 group-hover:rotate-180 transition-transform duration-200"></i>
            </a>

            <div class="fixed left-0 right-0 top-[120px] hidden group-hover:block z-50 w-screen bg-white border-b border-gray-200 shadow-xl text-gray-800 transition-all duration-200">
                <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <a href="#support" class="group/card p-4 rounded-2xl hover:bg-green-50 transition flex flex-col items-center text-center border border-transparent hover:border-green-400">
                        <div class="w-full h-36 mb-3 rounded-xl bg-gray-50 flex items-center justify-center overflow-hidden shadow-sm">
                            <img src="IMAGE/IDC.png" alt="Support" class="max-w-full max-h-36 object-contain group-hover/card:scale-[1.02]" />
                        </div>
                        <h4 class="font-bold text-sm text-gray-900 mb-0.5">24/7 Enterprise Help</h4>
                        <p class="text-[11px] text-gray-500">Dedicated operational assistance and configuration support guides.</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Child Item 4: Others -->
        <div class="relative group h-full flex items-center">
            <a href="#sub-link-4" class="h-full px-3 flex items-center gap-1.5 hover:text-white/80 transition-colors duration-200 cursor-pointer">
                <span class="!text-[1rem]">{{ $isKm ? 'សេវាកម្មផ្សេងទៀត' : 'Others' }}</span>
                <i class="fa-solid fa-chevron-down text-[8px] opacity-70 group-hover:rotate-180 transition-transform duration-200"></i>
            </a>

            <div class="fixed left-0 right-0 top-[120px] hidden group-hover:block z-50 w-screen bg-white border-b border-gray-200 shadow-xl text-gray-800 transition-all duration-200">
                <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <a href="#support" class="group/card p-4 rounded-2xl hover:bg-green-50 transition flex flex-col items-center text-center border border-transparent hover:border-green-400">
                        <div class="w-full h-36 mb-3 rounded-xl bg-gray-50 flex items-center justify-center overflow-hidden shadow-sm">
                            <img src="IMAGE/IDC.png" alt="Support" class="max-w-full max-h-36 object-contain group-hover/card:scale-[1.02] transition duration-300" />
                        </div>
                        <h4 class="font-bold text-sm text-gray-900 mb-0.5">24/7 Enterprise Help</h4>
                        <p class="text-[11px] text-gray-500">Dedicated operational assistance and configuration support guides.</p>
                    </a>

                    <a href="#support" class="group/card p-4 rounded-2xl hover:bg-green-50 transition flex flex-col items-center text-center border border-transparent hover:border-green-400">
                        <div class="w-full h-36 mb-3 rounded-xl bg-gray-50 flex items-center justify-center overflow-hidden shadow-sm">
                            <img src="IMAGE/OLT.png" alt="Support" class="max-w-full max-h-36 object-contain group-hover/card:scale-[1.02] transition duration-300" />
                        </div>
                        <h4 class="font-bold text-sm text-gray-900 mb-0.5">24/7 Enterprise Help</h4>
                        <p class="text-[11px] text-gray-500">Dedicated operational assistance and configuration support guides.</p>
                    </a>

                    <a href="#support" class="group/card p-4 rounded-2xl hover:bg-green-50 transition flex flex-col items-center text-center border border-transparent hover:border-green-400">
                        <div class="w-full h-36 mb-3 rounded-xl bg-gray-50 flex items-center justify-center overflow-hidden shadow-sm">
                            <img src="IMAGE/Conectivity.png" alt="Support" class="max-w-full max-h-36 object-contain group-hover/card:scale-[1.02] transition duration-300" />
                        </div>
                        <h4 class="font-bold text-sm text-gray-900 mb-0.5">24/7 Enterprise Help</h4>
                        <p class="text-[11px] text-gray-500">Dedicated operational assistance and configuration support guides.</p>
                    </a>

                    <a href="#support" class="group/card p-4 rounded-2xl hover:bg-green-50 transition flex flex-col items-center text-center border border-transparent hover:border-green-400">
                        <div class="w-full h-36 mb-3 rounded-xl bg-gray-50 flex items-center justify-center overflow-hidden shadow-sm">
                            <img src="IMAGE/ICT.png" alt="Support" class="max-w-full max-h-36 object-contain group-hover/card:scale-[1.02] transition duration-300" />
                        </div>
                        <h4 class="font-bold text-sm text-gray-900 mb-0.5">24/7 Enterprise Help</h4>
                        <p class="text-[11px] text-gray-500">Dedicated operational assistance and configuration support guides.</p>
                    </a>

                </div>
            </div>
        </div>

    </div>
</nav>
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
