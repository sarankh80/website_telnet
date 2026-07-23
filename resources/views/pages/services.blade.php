@extends('layouts.app')
@section('title', 'សេវាកម្មស្នូល — TELNET CO., LTD.')

@section('content')

<section class="py-12 section-bg-primary border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-adaptive-muted mb-4">
            <a href="{{ route('home') }}" class="hover:text-brand-green transition" data-km="ទំព័រដើម" data-en="Home">ទំព័រដើម</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span data-km="សេវាកម្មស្នូល" data-en="Core Products &amp; Services">សេវាកម្មស្នូល</span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-black text-adaptive-main mb-3"
            data-km="ផលិតផល និងសេវាកម្មស្នូល" data-en="Core Products &amp; Services">
            ផលិតផល និងសេវាកម្មស្នូល
        </h1>
        <p class="text-adaptive-muted text-sm max-w-2xl"
           data-km="ដំណោះស្រាយតភ្ជាប់អ៊ីនធឺណិត និងព័ត៌មានវិទ្យា ដែលឆ្លើយតបគ្រប់តម្រូវការ"
           data-en="Internet connectivity and ICT solutions that meet every need">
            ដំណោះស្រាយតភ្ជាប់អ៊ីនធឺណិត និងព័ត៌មានវិទ្យា ដែលឆ្លើយតបគ្រប់តម្រូវការ
        </p>
    </div>
</section>

<section class="py-16 section-bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
        $serviceCards = [
            ['image'=>'/images/High_Speed.png',  'badge'=>'High Speed',      'badge_km'=>'ល្បឿនខ្ពស់',         'desc_en'=>'Provide high-speed, reliable and stable internet connectivity.',      'desc_km'=>'ផ្តល់ការតភ្ជាប់អ៊ីនធឺណិតល្បឿនលឿន ជឿជាក់ និងស្ថិតស្ថេរ។'],
            ['image'=>'/images/Scalable.png',    'badge'=>'Scalable',        'badge_km'=>'អាចពង្រីកបាន',      'desc_en'=>'Build scalable and secure network infrastructure across Cambodia.',   'desc_km'=>'សាងសង់ហេដ្ឋារចនាសម្ព័ន្ធបណ្តាញអាចពង្រីក និងមានសុវត្ថិភាពទូទាំងកម្ពុជា។'],
            ['image'=>'/images/Hot_Service.png', 'badge'=>'Best Experience', 'badge_km'=>'បទពិសោធន៍ល្អបំផុត','desc_en'=>'Deliver excellent customer experience and innovative ICT.',             'desc_km'=>'ផ្តល់បទពិសោធន៍អតិថិជនដ៏ល្អ និង ICT ប្រកបដោយភាពច្នៃប្រឌិត។'],
            ['image'=>'/images/Reliable.png',   'badge'=>'Reliable',        'badge_km'=>'ជឿជាក់',            'desc_en'=>'Maintain high standards of customer support and service reliability.','desc_km'=>'រក្សាស្តង់ដារខ្ពស់នៃការគាំទ្រអតិថិជន និងការជឿជាក់លើសេវាកម្ម។'],
            ['image'=>'/images/Quality.png',    'badge'=>'Quality & Saving', 'badge_km'=>'គុណភាព & សន្សំ',  'desc_en'=>'Offering high quality, prompt service and selling what you need.',    'desc_km'=>'ផ្តល់ការេវាកម្មគុណភាពខ្ពស់ ឆ្លើយតបរហ័ស និងលក់តែអ្វីដែលអ្នកត្រូវការ។'],
            ['image'=>'/images/Contribute.png', 'badge'=>'Contribute',      'badge_km'=>'រួមចំណែក',          'desc_en'=>"Contribute to Cambodia's digital transformation.",                   'desc_km'=>'រួមចំណែកក្នុងការផ្លាស់ប្តូរឌីជីថលរបស់ប្រទេសកម្ពុជា។'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach($serviceCards as $card)
            <div class="glass-card glass-card-hover p-6 rounded-2xl">
                <div class="w-full h-28 flex items-center justify-center mb-4">
                    <img src="{{ $card['image'] }}" alt="{{ $card['badge'] }}" class="h-24 w-auto object-contain">
                </div>
                <div class="w-full flex justify-center mb-2">
                    <span class="font-bold text-brand-green bg-brand-green/10 px-3 py-1 rounded-md text-sm"
                          data-km="{{ $card['badge_km'] }}" data-en="{{ $card['badge'] }}">{{ $card['badge_km'] }}</span>
                </div>
                <p class="text-center font-bold text-[#777] mt-2 text-sm leading-relaxed"
                   data-km="{{ $card['desc_km'] }}" data-en="{{ $card['desc_en'] }}">{{ $card['desc_km'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- DB services detail --}}
        @if($services->count())
        <div class="border-t border-gray-200 dark:border-gray-800 pt-12">
            <h2 class="text-2xl font-bold text-adaptive-main mb-8 text-center"
                data-km="ប្រភេទសេវាកម្មលម្អិត" data-en="Service Details">ប្រភេទសេវាកម្មលម្អិត</h2>
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
                        <span data-km="សាកសួរព័ត៌មាន" data-en="Inquire Now">សាកសួរព័ត៌មាន</span>
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
        <h2 class="text-2xl font-extrabold text-adaptive-main"
            data-km="ចាប់អារម្មណ៍ចង់ប្រើសេវាកម្មមែនទេ?" data-en="Interested in our services?">
            ចាប់អារម្មណ៍ចង់ប្រើសេវាកម្មមែនទេ?
        </h2>
        <button onclick="openModal('serviceModal')"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-brand-green to-brand-orange text-white font-bold px-8 py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5">
            <i class="fa-solid fa-paper-plane"></i>
            <span data-km="ស្នើសុំភ្ជាប់សេវាអ៊ីនធឺណិត" data-en="Request Internet Service">ស្នើសុំភ្ជាប់សេវាអ៊ីនធឺណិត</span>
        </button>
    </div>
</section>

@endsection
