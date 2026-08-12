@extends('layouts.app')
@php $isKm = app()->getLocale() === 'km'; @endphp
@section('title', $isKm ? 'អាជីវកម្ម — TELNET CO., LTD.' : 'Business Solutions — TELNET CO., LTD.')

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden py-16 lg:py-24">
    <div class="absolute inset-0 bg-gradient-to-br from-brand-green/10 via-transparent to-brand-orange/10 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex items-center gap-2 text-xs text-adaptive-muted mb-6">
            <a href="{{ route('home') }}" class="hover:text-brand-green transition">{{ __('app.nav.home') }}</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span class="text-brand-green">{{ __('app.nav.business') }}</span>
        </div>
        <div class="max-w-3xl space-y-5">
            <span class="inline-block text-xs font-bold text-brand-orange bg-brand-orange/10 px-3 py-1 rounded-full uppercase tracking-widest">
                {{ $isKm ? 'ដំណោះស្រាយសហគ្រាស' : 'Enterprise Solutions' }}
            </span>
            <h1 class="text-3xl sm:text-5xl font-black text-adaptive-main leading-tight">
                {{ $isKm ? 'ដំណោះស្រាយអ៊ីនធឺណិត' : 'Business Internet &' }}<br>
                <span class="text-transparent bg-clip-text gradient-brand">
                    {{ $isKm ? 'សម្រាប់អាជីវកម្ម' : 'Enterprise Connectivity' }}
                </span>
            </h1>
            <p class="text-adaptive-muted text-base sm:text-lg leading-relaxed max-w-2xl">
                {{ $isKm
                    ? 'ធេលណេត ផ្តល់ដំណោះស្រាយអ៊ីនធឺណិតកាបូបអុបទិកដែលអាចទុកចិត្ត លឿន និងមានសុវត្ថិភាព ដែលត្រូវបានរចនាឡើងសម្រាប់អាជីវកម្ម SME សហគ្រាស និងស្ថាប័នរដ្ឋាភិបាល។'
                    : 'TELNET delivers reliable, high-speed fiber optic internet solutions designed for SMEs, enterprises, and government institutions — backed by 24/7 NOC support and guaranteed SLA.' }}
            </p>
            <div class="flex flex-wrap gap-3 pt-2">
                <button onclick="openModal('serviceModal')"
                    class="gradient-brand text-white font-bold px-7 py-3.5 rounded-xl shadow-lg transition hover:-translate-y-0.5 flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane text-sm"></i>
                    <span>{{ $isKm ? 'ស្នើសុំសេវា' : 'Request a Quote' }}</span>
                </button>
                <a href="{{ route('support') }}"
                    class="glass-card text-adaptive-main font-semibold px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 transition hover:-translate-y-0.5 flex items-center gap-2">
                    <i class="fa-solid fa-headset text-brand-green"></i>
                    <span>{{ $isKm ? 'ទំនាក់ទំនងក្រុម' : 'Talk to Sales' }}</span>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Why TELNET for Business --}}
<section class="py-14 border-y border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-adaptive-main mb-2">
                {{ $isKm ? 'ហេតុអ្វីបានជាយើងជ្រើសរើស ធេលណេត?' : 'Why Businesses Choose TELNET?' }}
            </h2>
            <p class="text-adaptive-muted text-sm max-w-xl mx-auto">
                {{ $isKm ? 'ការប្តេជ្ញាចិត្តរបស់យើងចំពោះគុណភាព ល្បឿន និងការគាំទ្រ' : 'Our commitment to quality, speed and dedicated enterprise support' }}
            </p>
        </div>
        @php
        $features = [
            ['icon'=>'fa-bolt', 'color'=>'green', 'title_en'=>'Dedicated Bandwidth', 'title_km'=>'កម្រិតទំហំបណ្តាញផ្ទាល់', 'desc_en'=>'Guaranteed symmetric speeds with no congestion — your bandwidth is yours alone.', 'desc_km'=>'ល្បឿនស៊ីមេទ្រីដែលទទួលបានការធានា ដោយគ្មានការទប់ស្ទះ។'],
            ['icon'=>'fa-shield-halved', 'color'=>'orange', 'title_en'=>'SLA Guaranteed', 'title_km'=>'ការធានា SLA', 'desc_en'=>'99.9% uptime SLA with financial-backed guarantees and rapid fault response.', 'desc_km'=>'SLA ០១ ២ ০ ៩% ជាមួយការធានា និងការដោះស្រាយបញ្ហារហ័ស។'],
            ['icon'=>'fa-headset', 'color'=>'green', 'title_en'=>'24/7 NOC Support', 'title_km'=>'ការគាំទ្រ NOC ២៤/៧', 'desc_en'=>'Round-the-clock monitoring and dedicated enterprise technical support team.', 'desc_km'=>'ការត្រួតពិនិត្យ និងក្រុមជំនួយបច្ចេកទេសសហគ្រាស ២៤ ម៉ោង ៧ ថ្ងៃ។'],
            ['icon'=>'fa-network-wired', 'color'=>'orange', 'title_en'=>'Fiber Optic Infrastructure', 'title_km'=>'ហេដ្ឋារចនាសម្ព័ន្ធកាបូបអុបទិក', 'desc_en'=>'FTTH, FTTB, FTTX, FTTO — modern fiber directly to your premises.', 'desc_km'=>'FTTH, FTTB, FTTX, FTTO — កាបូបអុបទិកទំនើបផ្ទាល់ទៅកន្លែងរបស់អ្នក។'],
            ['icon'=>'fa-expand', 'color'=>'green', 'title_en'=>'Scalable Plans', 'title_km'=>'ផែនការអាចពង្រីកបាន', 'desc_en'=>'Easily upgrade bandwidth as your business grows — no infrastructure change needed.', 'desc_km'=>'ដំឡើងទំហំបណ្តាញបានយ៉ាងងាយ នៅពេលអាជីវកម្មរបស់អ្នករីកចម្រើន។'],
            ['icon'=>'fa-lock', 'color'=>'orange', 'title_en'=>'Enterprise Security', 'title_km'=>'សុវត្ថិភាពសហគ្រាស', 'desc_en'=>'Dedicated IP, firewall management, and VPN solutions to protect your data.', 'desc_km'=>'IP ផ្ទាល់ ការគ្រប់គ្រង firewall និង VPN ដើម្បីការពារទិន្នន័យរបស់អ្នក។'],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($features as $f)
            <div class="glass-card glass-card-hover p-6 rounded-2xl flex gap-4">
                <div class="w-11 h-11 rounded-xl flex-shrink-0 flex items-center justify-center
                    {{ $f['color'] === 'green' ? 'bg-brand-green/10 text-brand-green' : 'bg-brand-orange/10 text-brand-orange' }}">
                    <i class="fa-solid {{ $f['icon'] }} text-lg"></i>
                </div>
                <div>
                    <h3 class="font-bold text-adaptive-main text-sm mb-1">{{ $isKm ? $f['title_km'] : $f['title_en'] }}</h3>
                    <p class="text-adaptive-muted text-xs leading-relaxed">{{ $isKm ? $f['desc_km'] : $f['desc_en'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Service Packages --}}
<section class="py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-adaptive-main mb-2">
                {{ $isKm ? 'ប្រភេទសេវាកម្មអាជីវកម្ម' : 'Business Service Packages' }}
            </h2>
            <p class="text-adaptive-muted text-sm max-w-xl mx-auto">
                {{ $isKm ? 'ជ្រើសរើសសេវាកម្មដែលសមស្របជាមួយអាជីវកម្មរបស់អ្នក' : 'Choose the right connectivity solution for your business needs' }}
            </p>
        </div>

        @php
        $packages = [
            [
                'icon'     => 'fa-building',
                'color'    => 'green',
                'badge_en' => 'FTTB / FTTO',
                'badge_km' => 'FTTB / FTTO',
                'title_en' => 'Business Internet',
                'title_km' => 'អ៊ីនធឺណិតអាជីវកម្ម',
                'desc_en'  => 'High-speed fiber to the building or office. Ideal for SMEs needing stable, symmetric connectivity with SLA.',
                'desc_km'  => 'កាបូបអុបទិកល្បឿនខ្ពស់ទៅអគារ ឬការិយាល័យ។ សមល្អសម្រាប់ SME ដែលត្រូវការការតភ្ជាប់ស្ថិតស្ថេរ ជាមួយ SLA។',
                'features_en' => ['Symmetric download/upload speeds', 'Dedicated fiber line', 'Business SLA guarantee', '24/7 technical support'],
                'features_km' => ['ល្បឿនទាញយក/បញ្ជូនស្មើ', 'បណ្តាញកាបូបអុបទិកផ្ទាល់', 'ការធានា SLA អាជីវកម្ម', 'ការគាំទ្របច្ចេកទេស ២៤/៧'],
            ],
            [
                'icon'     => 'fa-server',
                'color'    => 'orange',
                'badge_en' => 'FTTX / Dedicated',
                'badge_km' => 'FTTX / Dedicated',
                'title_en' => 'Enterprise Dedicated',
                'title_km' => 'សហគ្រាស Dedicated',
                'desc_en'  => 'Fully dedicated fiber lines for enterprises needing maximum performance, security, and reliability.',
                'desc_km'  => 'បណ្តាញកាបូបអុបទិកផ្ទាល់ ១០០% សម្រាប់សហគ្រាសដែលត្រូវការประ​效率ខ្ពស់ សុវត្ថិភាព និងភាពជឿជាក់ ។',
                'features_en' => ['Fully dedicated bandwidth', 'Static IP addresses', 'BGP peering available', 'Priority NOC response'],
                'features_km' => ['ទំហំបណ្តាញ Dedicated ១០០%', 'អាសយដ្ឋាន IP ស្ថិរ', 'BGP peering អាចប្រើ', 'ការឆ្លើយតប NOC អាទិភាព'],
            ],
            [
                'icon'     => 'fa-database',
                'color'    => 'green',
                'badge_en' => 'IDC Services',
                'badge_km' => 'IDC Services',
                'title_en' => 'IDC / Data Center',
                'title_km' => 'IDC / មជ្ឈមណ្ឌលទិន្នន័យ',
                'desc_en'  => 'Co-location, rack hosting, and managed services in our secure, climate-controlled data center facility.',
                'desc_km'  => 'ការដំឡើងហេដ្ឋារចនាសម្ព័ន្ធ ការបង្ហោះ rack និងសេវាគ្រប់គ្រងនៅក្នុងមជ្ឈមណ្ឌលទិន្នន័យដែលមានសុវត្ថិភាព។',
                'features_en' => ['Rack & cage co-location', 'Redundant power (N+1)', 'Tier-3 physical security', 'Cross-connect available'],
                'features_km' => ['Co-location rack & cage', 'ថាមពលបម្រុង (N+1)', 'សុវត្ថិភាពរូបវន្ត Tier-3', 'Cross-connect អាចប្រើ'],
            ],
            [
                'icon'     => 'fa-microchip',
                'color'    => 'orange',
                'badge_en' => 'ICT Solutions',
                'badge_km' => 'ICT Solutions',
                'title_en' => 'ICT & Network Projects',
                'title_km' => 'គម្រោង ICT និងបណ្តាញ',
                'desc_en'  => 'End-to-end ICT infrastructure design, deployment, and managed services for your organisation.',
                'desc_km'  => 'ការរចនា ការដំឡើង និងសេវាគ្រប់គ្រង ICT ពីចុងដល់ចុងសម្រាប់ស្ថាប័នរបស់អ្នក។',
                'features_en' => ['Network design & deployment', 'LAN / WAN / SD-WAN', 'Structured cabling', 'Ongoing managed services'],
                'features_km' => ['រចនា & ដំឡើងបណ្តាញ', 'LAN / WAN / SD-WAN', 'ការដំឡើង Cabling', 'សេវាគ្រប់គ្រងបន្ត'],
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            @foreach($packages as $pkg)
            <div class="glass-card glass-card-hover p-7 rounded-2xl flex flex-col gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl flex-shrink-0 flex items-center justify-center text-xl
                        {{ $pkg['color'] === 'green' ? 'bg-brand-green/10 text-brand-green' : 'bg-brand-orange/10 text-brand-orange' }}">
                        <i class="fa-solid {{ $pkg['icon'] }}"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold px-2 py-0.5 rounded
                            {{ $pkg['color'] === 'green' ? 'bg-brand-green/10 text-brand-green' : 'bg-brand-orange/10 text-brand-orange' }}">
                            {{ $isKm ? $pkg['badge_km'] : $pkg['badge_en'] }}
                        </span>
                        <h3 class="text-lg font-bold text-adaptive-main mt-1">{{ $isKm ? $pkg['title_km'] : $pkg['title_en'] }}</h3>
                    </div>
                </div>
                <p class="text-adaptive-muted text-sm leading-relaxed">{{ $isKm ? $pkg['desc_km'] : $pkg['desc_en'] }}</p>
                <ul class="space-y-1.5">
                    @foreach($isKm ? $pkg['features_km'] : $pkg['features_en'] as $feat)
                    <li class="flex items-center gap-2 text-xs text-adaptive-muted">
                        <i class="fa-solid fa-check text-brand-green flex-shrink-0"></i>
                        <span>{{ $feat }}</span>
                    </li>
                    @endforeach
                </ul>
                <button onclick="openModal('serviceModal')"
                    class="mt-auto inline-flex items-center gap-1.5 text-xs font-bold
                        {{ $pkg['color'] === 'green' ? 'text-brand-green' : 'text-brand-orange' }}
                        hover:gap-2.5 transition-all">
                    <span>{{ $isKm ? 'សាកសួរព័ត៌មាន' : 'Request This Service' }}</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </button>
            </div>
            @endforeach
        </div>

        {{-- DB services if any --}}
        @if($services->count())
        <div class="border-t border-gray-200 dark:border-gray-800 pt-10">
            <h3 class="text-xl font-bold text-adaptive-main mb-6 text-center">
                {{ $isKm ? 'សេវាកម្មរបស់យើង' : 'Our Available Services' }}
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($services as $service)
                <div class="glass-card glass-card-hover p-5 rounded-2xl">
                    <div class="w-10 h-10 rounded-xl mb-3 flex items-center justify-center text-lg
                        {{ $service->color === 'green' ? 'bg-brand-green/10 text-brand-green' : 'bg-brand-orange/10 text-brand-orange' }}">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    <span class="text-xs font-bold px-2 py-0.5 rounded
                        {{ $service->color === 'green' ? 'bg-brand-green/10 text-brand-green' : 'bg-brand-orange/10 text-brand-orange' }}">
                        {{ $service->getBadge() }}
                    </span>
                    <h4 class="text-sm font-bold text-adaptive-main mt-2 mb-1">{{ $service->getName() }}</h4>
                    <p class="text-xs text-adaptive-muted leading-relaxed line-clamp-3">{{ $service->getDescription() }}</p>
                    <button onclick="openModal('serviceModal')"
                        class="mt-3 text-xs font-bold {{ $service->color === 'green' ? 'text-brand-green' : 'text-brand-orange' }} flex items-center gap-1 hover:gap-2 transition-all">
                        <span>{{ $isKm ? 'សាកសួរ' : 'Inquire' }}</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
        @endif
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
                ['num'=>'100+',  'label_en'=>'Corporate Clients',      'label_km'=>'អតិថិជនសហស្ថាប័ន'],
                ['num'=>'99.9%', 'label_en'=>'Network Uptime SLA',     'label_km'=>'SLA ហ្វូបណ្តាញ'],
                ['num'=>'24/7',  'label_en'=>'NOC Support',            'label_km'=>'ការគាំទ្រ NOC'],
                ['num'=>'12+',   'label_en'=>'PoPs Nationwide',        'label_km'=>'PoP ទូទាំងប្រទេស'],
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

@endsection
