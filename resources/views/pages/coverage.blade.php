@extends('layouts.app')
@section('title', 'ការគ្របដណ្តប់ & សាខា — TELNET CO., LTD.')

@section('content')

<section class="py-12 section-bg-primary border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-adaptive-muted mb-4">
            <a href="{{ route('home') }}" class="hover:text-brand-green transition" data-km="ទំព័រដើម" data-en="Home">ទំព័រដើម</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span data-km="ការគ្របដណ្តប់" data-en="Network Coverage">ការគ្របដណ្តប់</span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-black text-adaptive-main mb-3"
            data-km="ហេដ្ឋារចនាសម្ព័ន្ធ ១២ PoPs នៅ ២០ ក្រុង/ស្រុក"
            data-en="12 PoPs Infrastructure Across 20 Cities/Districts">
            ហេដ្ឋារចនាសម្ព័ន្ធ ១២ PoPs នៅ ២០ ក្រុង/ស្រុក
        </h1>
        <p class="text-adaptive-muted text-sm max-w-2xl"
           data-km="ការិយាល័យ និងសាខាផ្ទាល់នៅក្នុងខេត្ត-ក្រុងសំខាន់ៗ"
           data-en="Offices and branches in key provinces and cities">
            ការិយាល័យ និងសាខាផ្ទាល់នៅក្នុងខេត្ត-ក្រុងសំខាន់ៗ
        </p>
    </div>
</section>

<section class="py-16 section-bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
            @foreach([
                ['value'=>'12','label_km'=>'PoP Nodes','label_en'=>'PoP Nodes','color'=>'text-brand-green'],
                ['value'=>'20+','label_km'=>'ក្រុង/ស្រុក','label_en'=>'Cities/Districts','color'=>'text-brand-orange'],
                ['value'=>'6','label_km'=>'ខេត្ត','label_en'=>'Provinces','color'=>'text-brand-green'],
                ['value'=>'24/7','label_km'=>'ការគាំទ្រ','label_en'=>'Support','color'=>'text-brand-orange'],
            ] as $s)
            <div class="glass-card p-5 rounded-2xl text-center">
                <div class="text-3xl font-black {{ $s['color'] }} mb-1">{{ $s['value'] }}</div>
                <div class="text-xs text-adaptive-muted" data-km="{{ $s['label_km'] }}" data-en="{{ $s['label_en'] }}">{{ $s['label_km'] }}</div>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($branches as $branch)
            <div class="glass-card p-6 rounded-2xl {{ $branch->type === 'hq' ? 'border border-brand-green/40' : 'border border-gray-200 dark:border-gray-800' }} relative glass-card-hover">
                @if($branch->type === 'hq')
                    <span class="absolute top-4 right-4 text-xs bg-brand-green/20 text-brand-green px-2.5 py-0.5 rounded-full font-bold"
                          data-km="ការិយាល័យកណ្តាល" data-en="Head Office">ការិយាល័យកណ្តាល</span>
                @endif
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-11 h-11 rounded-lg {{ $branch->type === 'hq' ? 'bg-brand-green text-white' : ($loop->even ? 'bg-brand-orange/20 text-brand-orange' : 'bg-brand-green/20 text-brand-green') }} flex items-center justify-center text-lg flex-shrink-0">
                        <i class="{{ $branch->type === 'hq' ? 'fa-solid fa-building-user' : 'fa-solid fa-map-pin' }}"></i>
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-adaptive-main">{{ $branch->getName() }}</h4>
                        <p class="text-xs text-adaptive-muted">{{ $branch->getProvince() }}</p>
                    </div>
                </div>
                <div class="space-y-2">
                    @if($branch->address_km)
                    <p class="text-xs text-adaptive-main flex items-start gap-2">
                        <i class="fa-solid fa-location-dot text-brand-orange mt-0.5 flex-shrink-0"></i>
                        {{ $branch->getAddress() }}
                    </p>
                    @endif
                    @if($branch->phone)
                    <p class="text-xs text-adaptive-main flex items-center gap-2">
                        <i class="fa-solid fa-phone text-brand-green flex-shrink-0"></i>
                        <a href="tel:{{ preg_replace('/\s+/','',$branch->phone) }}" class="hover:text-brand-green transition">{{ $branch->phone }}</a>
                    </p>
                    @endif
                    @if($branch->email)
                    <p class="text-xs text-adaptive-main flex items-center gap-2">
                        <i class="fa-solid fa-envelope text-brand-orange flex-shrink-0"></i>
                        <a href="mailto:{{ $branch->email }}" class="hover:text-brand-orange transition">{{ $branch->email }}</a>
                    </p>
                    @endif
                </div>
                @if($branch->type !== 'hq')
                <p class="text-xs text-brand-green mt-3 font-medium">
                    <i class="fa-solid fa-circle-check mr-1"></i>
                    <span data-km="មានហេដ្ឋារចនាសម្ព័ន្ធកាប់អ៊ីនធឺណិតសកម្ម" data-en="Active Fiber Optic Infrastructure">មានហេដ្ឋារចនាសម្ព័ន្ធកាប់អ៊ីនធឺណិតសកម្ម</span>
                </p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-14 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20 border-y border-gray-200 dark:border-gray-800">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-5">
        <h2 class="text-2xl font-extrabold text-adaptive-main"
            data-km="ចង់ដឹងថាតំបន់អ្នកមានសេវាឬទេ?" data-en="Want to know if your area is covered?">
            ចង់ដឹងថាតំបន់អ្នកមានសេវាឬទេ?
        </h2>
        <button onclick="openModal('serviceModal')"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-brand-green to-brand-orange text-white font-bold px-8 py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5">
            <i class="fa-solid fa-paper-plane"></i>
            <span data-km="ស្នើសុំភ្ជាប់សេវាអ៊ីនធឺណិត" data-en="Request Internet Service">ស្នើសុំភ្ជាប់សេវាអ៊ីនធឺណិត</span>
        </button>
    </div>
</section>

@endsection
