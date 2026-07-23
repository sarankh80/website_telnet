@extends('layouts.app')

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section class="relative overflow-hidden py-8 lg:py-16 section-bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-8 space-y-6 text-center lg:text-left">

                <h1 class="text-3xl sm:text-5xl font-black leading-tight tracking-normal text-adaptive-main lg:leading-snug">
                    <span
                        data-km="ផ្តល់សេវាអ៊ីនធឺណិតល្បឿនខ្ពស់ និងដំណោះស្រាយឌីជីថល "
                        data-en="High-Speed Internet Service &amp; Digital Solutions ">
                        ផ្តល់សេវាអ៊ីនធឺណិតល្បឿនខ្ពស់ និងដំណោះស្រាយឌីជីថល
                    </span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-green to-brand-orange"
                          data-km="ដែលអ្នកអាចទុកចិត្ត"
                          data-en="You Can Trust">
                        ដែលអ្នកអាចទុកចិត្ត
                    </span>
                </h1>

                <p class="text-adaptive-muted !text-[#777] text-base sm:text-lg max-w-2xl leading-relaxed"
                   data-km="ក្រុមហ៊ុន TELNET CO., LTD ផ្តល់ហេដ្ឋារចនាសម្ព័ន្ធកាប់អ៊ីនធឺណិតល្អប្រណីត (FTTH, FTTB, FTTX, FTTR) និងដំណោះស្រាយបណ្តាញ ICT ដល់គ្រួសារ អាជីវកម្ម ក្រុមហ៊ុន និងស្ថាប័នរដ្ឋាភិបាល"
                   data-en="TELNET CO., LTD provides state-of-the-art optical fiber infrastructure (FTTH, FTTB, FTTX, FTTR) and ICT network solutions for households, businesses, enterprises, and government institutions.">
                    ក្រុមហ៊ុន <strong>TELNET CO., LTD</strong>
                    ផ្តល់ហេដ្ឋារចនាសម្ព័ន្ធកាប់អ៊ីនធឺណិតល្អប្រណីត (FTTH, FTTB, FTTX, FTTR)
                    និងដំណោះស្រាយបណ្តាញ ICT ដល់គ្រួសារ អាជីវកម្ម ក្រុមហ៊ុន និងស្ថាប័នរដ្ឋាភិបាល
                </p>

                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                    <button onclick="openModal('serviceModal')"
                            class="bg-gradient-to-r from-brand-green to-brand-orange hover:from-brand-green-hover hover:to-brand-orange-hover text-white font-bold px-7 py-3.5 rounded-xl shadow-lg shadow-brand-green/20 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                        <span data-km="ចុះឈ្មោះប្រើសេវាអ៊ីនធឺណិត" data-en="Subscribe Internet">ចុះឈ្មោះប្រើសេវាអ៊ីនធឺណិត</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                    <a href="#services"
                       class="glass-card hover:bg-slate-200 dark:hover:bg-slate-800 text-adaptive-main font-semibold px-6 py-3.5 rounded-xl border border-gray-300 dark:border-gray-700 transition flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-brand-orange"></i>
                        <span data-km="មើលបន្ថែមអំពីសេវាកម្ម" data-en="Explore Services">មើលបន្ថែមអំពីសេវាកម្ម</span>
                    </a>
                </div>
            </div>

            {{-- Right side: hidden (matches original HTML) --}}
            <div class="lg:col-span-5"></div>
        </div>
    </div>
</section>

{{-- ===== ABOUT SECTION — hidden (matches original HTML) ===== --}}
<section id="about" class="py-16 section-bg-secondary hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title label="01. ប្រវត្តិក្រុមហ៊ុន &amp; ប្រវត្តិ" title="TELNET CO., LTD — ដៃគូអ៊ីនធឺណិតដែលអ្នកទុកចិត្ត" />
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="glass-card p-8 rounded-2xl border-l-4 border-l-brand-green relative overflow-hidden">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-brand-green/10 text-brand-green flex items-center justify-center text-xl"><i class="fa-solid fa-eye"></i></div>
                    <div>
                        <h3 class="text-xl font-bold text-adaptive-main" data-km="ចក្ខុវិស័យ​ (OUR VISION)" data-en="OUR VISION">ចក្ខុវិស័យ (OUR VISION)</h3>
                        <p class="text-xs text-brand-green font-bold" data-km="គោលដៅអភិវឌ្ឍន៍រយៈពេលវែង" data-en="Long-term Development Goals">គោលដៅអភិវឌ្ឍន៍រយៈពេលវែង</p>
                    </div>
                </div>
                <p class="text-adaptive-muted text-sm leading-relaxed"
                   data-km="ក្លាយជាអ្នកផ្តល់សេវាអ៉ីនធឺណិត (ISP) ឈានមុខគេនៅកម្ពុជា ដោយផ្តល់សេវាដែលមានគុណភាពខ្ពស់ ល្បឿនលឿន គួរឱ្យទុកចិត្ត និងដំណោះស្រាយតភ្ជាប់ឌីជីថលប្រកបដោយភាពច្នៃប្រឌិតខ្ពស់បំផុត។"
                   data-en="To become a leading Internet Service Provider (ISP) in Cambodia by offering high-quality, high-speed, reliable services and innovative digital connectivity solutions.">
                    ក្លាយជាអ្នកផ្តល់សេវាអ៉ីនធឺណិត (ISP) ឈានមុខគេនៅកម្ពុជា ដោយផ្តល់សេវាដែលមានគុណភាពខ្ពស់ ល្បឿនលឿន គួរឱ្យទុកចិត្ត និងដំណោះស្រាយតភ្ជាប់ឌីជីថលប្រកបដោយភាពច្នៃប្រឌិតខ្ពស់បំផុត។
                </p>
            </div>
            <div class="glass-card p-8 rounded-2xl border-l-4 border-l-brand-orange relative overflow-hidden">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-brand-orange/10 text-brand-orange flex items-center justify-center text-xl"><i class="fa-solid fa-bullseye"></i></div>
                    <div>
                        <h3 class="text-xl font-bold text-adaptive-main" data-km="បេសកម្ម​ (OUR MISSION)" data-en="OUR MISSION">បេសកម្ម (OUR MISSION)</h3>
                        <p class="text-xs text-brand-orange font-bold" data-km="ការប្តេជ្ញាចិត្តចំពោះអតិថិជន" data-en="Customer Commitment">ការប្តេជ្ញាចិត្តចំពោះអតិថិជន</p>
                    </div>
                </div>
                <ul class="text-adaptive-muted text-xs sm:text-sm space-y-2 list-disc list-inside">
                    <li data-km="ផ្តល់សេវាតភ្ជាប់អ៉ីនធឺណិតដែលមានល្បឿនលឿន គួរឱ្យទុកចិត្ត និងមានស្ថេរភាព។" data-en="Provide high-speed, reliable, and highly stable internet connectivity.">ផ្តល់សេវាតភ្ជាប់អ៉ីនធឺណិតដែលមានល្បឿនលឿន គួរឱ្យទុកចិត្ត និងមានស្ថេរភាព។</li>
                    <li data-km="សាងសង់ហេដ្ឋារចនាសម្ព័ន្ធបណ្តាញដែលមានសុវត្ថិភាព និងអាចពង្រីកបានទូទាំងប្រទេសកម្ពុជា។" data-en="Build secure, scalable network infrastructure across Cambodia.">សាងសង់ហេដ្ឋារចនាសម្ព័ន្ធបណ្តាញដែលមានសុវត្ថិភាព និងអាចពង្រីកបានទូទាំងប្រទេសកម្ពុជា។</li>
                    <li data-km="ផ្តល់បទពិសោធន៍ល្អបំផុតដល់អតិថិជន និងបច្ចេកវិទ្យាព័ត៌មានប្រកបដោយភាពច្នៃប្រឌិត។" data-en="Deliver top customer experience and cutting-edge IT technology.">ផ្តល់បទពិសោធន៍ល្អបំផុតដល់អតិថិជន និងបច្ចេកវិទ្យាព័ត៌មានប្រកបដោយភាពច្នៃប្រឌិត។</li>
                    <li data-km="រក្សាស្តង់ដារខ្ពស់នៃការគាំទ្រអតិថិជន និងរួមចំណែកដល់ការផ្លាស់ប្តូរឌីជីថល។" data-en="Maintain top-tier customer support and support Cambodia's digital transformation.">រក្សាស្តង់ដារខ្ពស់នៃការគាំទ្រអតិថិជន និងរួមចំណែកដល់ការផ្លាស់ប្តូរឌីជីថល។</li>
                </ul>
            </div>
        </div>
        <div class="mt-8">
            <h3 class="text-center text-lg font-bold text-adaptive-main mb-6" data-km="គុណតម្លៃស្នូល (CORE VALUES) ចំនួន ៨ គោលការណ៍" data-en="OUR 8 CORE VALUES">គុណតម្លៃស្នូល (CORE VALUES) ចំនួន ៨ គោលការណ៍</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @php $coreValues = [
                    ['icon'=>'fa-network-wired','color'=>'brand-green','km'=>'1. ការតភ្ជាប់ដែលអាចទុកចិត្តបាន','en'=>'1. Reliable Connectivity','dk'=>'ផ្តល់សេវាអ៉ីនធឺណិតដែលមានស្ថេរភាពឥតរអាក់រអួល។','de'=>'Ensure seamless, stable internet service for all users.'],
                    ['icon'=>'fa-user-gear','color'=>'brand-orange','km'=>'2. អតិថិជនជាចម្បង','en'=>'2. Customer First','dk'=>'ការប្តេជ្ញាចិត្តខ្ពស់ក្នុងការបម្រើតម្រូវការរបស់អតិថិជន។','de'=>'Dedicated commitment to serving every customer need.'],
                    ['icon'=>'fa-award','color'=>'brand-green','km'=>'3. ភាពឆ្នើមផ្នែកប្រតិបត្តិការ','en'=>'3. Operational Excellence','dk'=>'រក្សាស្តង់ដារបច្ចេកទេស និងប្រតិបត្តិការកម្រិតខ្ពស់។','de'=>'Maintain rigorous technical and operational standards.'],
                    ['icon'=>'fa-lightbulb','color'=>'brand-orange','km'=>'4. នវានុវត្តន៍បច្ចេកវិទ្យា','en'=>'4. Technological Innovation','dk'=>'ដឹកនាំក្នុងការប្រើប្រាស់បច្ចេកវិទ្យាឌីជីថលថ្មីៗ។','de'=>'Lead the adoption of modern digital tech solutions.'],
                    ['icon'=>'fa-users','color'=>'brand-green','km'=>'5. ក្រុមការងារមានវិជ្ជាជីវៈ','en'=>'5. Professional Team','dk'=>'សមត្ថភាពខ្ពស់ និងការសហការគ្នាយ៉ាងជិតស្និទ្ធ។','de'=>'High competence and close team collaboration.'],
                    ['icon'=>'fa-shield-heart','color'=>'brand-orange','km'=>'6. សុចរិតភាព និងឥរិយាបថ','en'=>'6. Integrity & Ethics','dk'=>'ប្រកាន់ខ្ជាប់នូវភាពស្មោះត្រង់ និងឥរិយាបថវិជ្ជមាន។','de'=>'Uphold honesty and positive professional ethics.'],
                    ['icon'=>'fa-graduation-cap','color'=>'brand-green','km'=>'7. ការរៀនសូត្រពេញមួយជីវិត','en'=>'7. Lifelong Learning','dk'=>'អភិវឌ្ឍចំណេះដឹង និងជំនាញបច្ចេកទេសជាប្រចាំ។','de'=>'Continuously develop knowledge and technical skills.'],
                    ['icon'=>'fa-building-flag','color'=>'brand-orange','km'=>'8. អភិវឌ្ឍសហគមន៍ និងជាតិ','en'=>'8. Community & Nation Building','dk'=>'ចូលរួមចំណែកក្នុងការអភិវឌ្ឍសង្គម និងសេដ្ឋកិច្ចឌីជីថល។','de'=>'Contribute to social development and digital economy.'],
                ]; @endphp
                @foreach($coreValues as $val)
                <div class="glass-card p-5 rounded-xl border border-gray-200 dark:border-gray-800 glass-card-hover">
                    <div class="text-{{ $val['color'] }} text-2xl mb-2"><i class="fa-solid {{ $val['icon'] }}"></i></div>
                    <h4 class="font-bold text-adaptive-main text-sm" data-km="{{ $val['km'] }}" data-en="{{ $val['en'] }}">{{ $val['km'] }}</h4>
                    <p class="text-xs text-adaptive-muted mt-1" data-km="{{ $val['dk'] }}" data-en="{{ $val['de'] }}">{{ $val['dk'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ===== SERVICES SECTION — visible, image-based cards ===== --}}
<section id="services" class="py-8 section-bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
        $serviceCards = [
            ['image' => '/images/High_Speed.png',  'badge' => 'High Speed',       'badge_km' => 'ល្បឿនខ្ពស់',         'desc_en' => 'Provide high-speed, reliable and stable internet connectivity.',       'desc_km' => 'ផ្តល់ការតភ្ជាប់អ៊ីនធឺណិតល្បឿនលឿន ជឿជាក់ និងស្ថិតស្ថេរ។'],
            ['image' => '/images/Scalable.png',    'badge' => 'Scalable',         'badge_km' => 'អាចពង្រីកបាន',       'desc_en' => 'Build scalable and secure network infrastructure across Cambodia.',    'desc_km' => 'សាងសង់ហេដ្ឋារចនាសម្ព័ន្ធបណ្តាញអាចពង្រីក និងមានសុវត្ថិភាពទូទាំងកម្ពុជា។'],
            ['image' => '/images/Hot_Service.png', 'badge' => 'Best Experience',  'badge_km' => 'បទពិសោធន៍ល្អបំផុត', 'desc_en' => 'Deliver excellent customer experience and innovative ICT.',               'desc_km' => 'ផ្តល់បទពិសោធន៍អតិថិជនដ៏ល្អ និង ICT ប្រកបដោយភាពច្នៃប្រឌិត។'],
            ['image' => '/images/Reliable.png',   'badge' => 'Reliable',         'badge_km' => 'ជឿជាក់',             'desc_en' => 'Maintain high standards of customer support and service reliability.', 'desc_km' => 'រក្សាស្តង់ដារខ្ពស់នៃការគាំទ្រអតិថិជន និងការជឿជាក់លើសេវាកម្ម។'],
            ['image' => '/images/Quality.png',    'badge' => 'Quality & Saving', 'badge_km' => 'គុណភាព & សន្សំ',   'desc_en' => 'Offering high quality, prompt service and selling what you need.',     'desc_km' => 'ផ្តល់ការេវាកម្មគុណភាពខ្ពស់ ឆ្លើយតបរហ័ស និងលក់តែអ្វីដែលអ្នកត្រូវការ។'],
            ['image' => '/images/Contribute.png', 'badge' => 'Contribute',       'badge_km' => 'រួមចំណែក',           'desc_en' => "Contribute to Cambodia's digital transformation.",                   'desc_km' => 'រួមចំណែកក្នុងការផ្លាស់ប្តូរឌីជីថលរបស់ប្រទេសកម្ពុជា។'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($serviceCards as $card)
            <div class="glass-card glass-card-hover p-6 rounded-2xl relative">
                <div class="w-full h-24 rounded-xl flex items-center justify-center mb-4">
                    <img src="{{ $card['image'] }}" alt="{{ $card['badge'] }}" class="h-24 w-auto object-contain">
                </div>
                <div class="w-full flex justify-center">
                    <span class="text-md text-center font-bold text-brand-green bg-brand-green/10 px-2.5 py-1 rounded-md"
                          data-km="{{ $card['badge_km'] }}" data-en="{{ $card['badge'] }}">{{ $card['badge_km'] }}</span>
                </div>
                <h3 class="text-md text-center font-bold text-[#777] mt-2"
                    data-km="{{ $card['desc_km'] }}" data-en="{{ $card['desc_en'] }}">{{ $card['desc_km'] }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== COVERAGE SECTION — hidden ===== --}}
<section id="coverage" class="py-16 section-bg-secondary hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title label="03. ការគ្របដណ្តប់ &amp; ការិយាល័យ" title="ហេដ្ឋារចនាសម្ព័ន្ធ ១២ PoPs នៅ ២០ ក្រុង/ស្រុក" subtitle="មានវត្តមានការិយាល័យ និងសាខានៅក្នុងខេត្ត-ក្រុងសំខាន់ៗ" />
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($branches as $branch)
            <div class="glass-card p-6 rounded-2xl {{ $branch->type === 'hq' ? 'border border-brand-green/40' : 'border border-gray-200 dark:border-gray-800' }} relative">
                @if($branch->type === 'hq')
                    <span class="absolute top-4 right-4 text-xs bg-brand-green/20 text-brand-green px-2.5 py-0.5 rounded-full font-bold">សำนักงานใหญ่</span>
                @endif
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-lg {{ $branch->type === 'hq' ? 'bg-brand-green text-white' : ($loop->even ? 'bg-brand-orange/20 text-brand-orange' : 'bg-brand-green/20 text-brand-green') }} flex items-center justify-center font-bold">
                        <i class="{{ $branch->type === 'hq' ? 'fa-solid fa-building-user' : 'fa-solid fa-map-pin' }}"></i>
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-adaptive-main">{{ $branch->getName() }}</h4>
                        <p class="text-xs text-adaptive-muted">{{ $branch->getProvince() }}</p>
                    </div>
                </div>
                @if($branch->address_km)
                    <p class="text-xs text-adaptive-main mt-2">
                        <i class="fa-solid fa-location-dot text-brand-orange mr-1.5"></i>{{ $branch->getAddress() }}
                    </p>
                @endif
                @if($branch->phone)
                    <p class="text-xs text-adaptive-main mt-1">
                        <i class="fa-solid fa-phone text-brand-green mr-1.5"></i>{{ $branch->phone }}
                    </p>
                @endif
                @if($branch->type !== 'hq')
                    <p class="text-xs text-brand-green mt-1 font-medium">
                        <i class="fa-solid fa-circle-check mr-1"></i>
                        <span data-km="មានហេដ្ឋារចនាសម្ព័ន្ធកាប់អ៊ីនធឺណិតសកម្ម" data-en="Active Fiber Optic Infrastructure">មានហេដ្ឋារចនាសម្ព័ន្ធកាប់អ៊ីនធឺណិតសកម្ម</span>
                    </p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== BSS/OSS SECTION — hidden ===== --}}
<section id="bss-oss" class="py-16 section-bg-primary hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title label="04. ប្រព័ន្ធ BSS/OSS &amp; ការអនុលោម" title="ប្រព័ន្ធគ្រប់គ្រងអតិថិជន និងការអនុលោម" labelColor="text-brand-green" />
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center gap-3 mb-4 pb-3 border-b border-gray-200 dark:border-gray-800">
                    <div class="w-10 h-10 rounded-lg bg-brand-green/20 text-brand-green flex items-center justify-center text-lg"><i class="fa-solid fa-server"></i></div>
                    <div>
                        <h3 class="text-lg font-bold text-adaptive-main">Radius AAA &amp; BSS/OSS Control</h3>
                        <p class="text-xs text-adaptive-muted">ការគ្រប់គ្រង Bandwidth &amp; វិក័យប័ត្រ</p>
                    </div>
                </div>
                <ul class="space-y-3 text-xs sm:text-sm text-adaptive-muted">
                    <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-brand-green mt-1 flex-shrink-0"></i><span><strong class="text-adaptive-main">Radius AAA Server:</strong> គ្រប់គ្រង Bandwidth, Syslog User Logs, និងការតភ្ជាប់ស្វ័យប្រវត្តិ។</span></li>
                    <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-brand-green mt-1 flex-shrink-0"></i><span><strong class="text-adaptive-main">Dynamic Rate Control:</strong> ការកំណត់ Bandwidth តាមតម្រូវការ dynamically។</span></li>
                    <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-brand-green mt-1 flex-shrink-0"></i><span><strong class="text-adaptive-main">Multi-Service &amp; Currency:</strong> គិតវិក័យប័ត្រ Prepaid/Postpaid ជាប្រាក់រៀល (KHR) និងដុល្លារ (USD)។</span></li>
                    <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-brand-green mt-1 flex-shrink-0"></i><span><strong class="text-adaptive-main">ABA Mobile Gateway:</strong> តភ្ជាប់ជាមួយច្រកទូទាត់ប្រាក់ធនាគារ ABA ងាយស្រួល និងរហ័ស។</span></li>
                </ul>
            </div>
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center gap-3 mb-4 pb-3 border-b border-gray-200 dark:border-gray-800">
                    <div class="w-10 h-10 rounded-lg bg-brand-orange/20 text-brand-orange flex items-center justify-center text-lg"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                    <div>
                        <h3 class="text-lg font-bold text-adaptive-main">ការអនុលោមតាមច្បាប់ (DMC &amp; GDT Sync)</h3>
                        <p class="text-xs text-adaptive-muted">ការបញ្ជូនទិន្នន័យស្វ័យប្រវត្តិ</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2 text-xs text-adaptive-main mb-4">
                    <div class="bg-slate-100 dark:bg-slate-900/80 p-2.5 rounded-lg border border-gray-200 dark:border-gray-800 flex items-center gap-2"><i class="fa-solid fa-file-invoice text-brand-green"></i> <span>វិក័យប័ត្រប្រចាំថ្ងៃ</span></div>
                    <div class="bg-slate-100 dark:bg-slate-900/80 p-2.5 rounded-lg border border-gray-200 dark:border-gray-800 flex items-center gap-2"><i class="fa-solid fa-receipt text-brand-green"></i> <span>វិក័យប័ត្របញ្ញើ</span></div>
                    <div class="bg-slate-100 dark:bg-slate-900/80 p-2.5 rounded-lg border border-gray-200 dark:border-gray-800 flex items-center gap-2"><i class="fa-solid fa-credit-card text-brand-orange"></i> <span>លិខិតឥណទាន</span></div>
                    <div class="bg-slate-100 dark:bg-slate-900/80 p-2.5 rounded-lg border border-gray-200 dark:border-gray-800 flex items-center gap-2"><i class="fa-solid fa-users text-brand-orange"></i> <span>បញ្ជីឈ្មោះអតិថិជន</span></div>
                </div>
                <div class="p-3 bg-brand-green/10 rounded-xl border border-brand-green/30 text-xs text-adaptive-main">
                    <span class="text-brand-green font-bold block mb-1"><i class="fa-solid fa-building-columns mr-1"></i> អគ្គនាយកដ្ឋានពន្ធដារ (GDT) &amp; NBC:</span>
                    វិក័យប័ត្រទាំងអស់ត្រូវបានបំប្លែងអត្រាប្តូរប្រាក់ស្វ័យប្រវត្តិ អនុលោមតាមប្រព័ន្ធ NBC និង GDT ជារៀងរាល់ថ្ងៃ។
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== KPI SECTION — hidden ===== --}}
<section id="kpi" class="py-16 section-bg-secondary hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title label="05. តារាងលទ្ធផលបច្ចេកទេស (KPIs)" title="ស្តង់ដារប្រតិបត្តិការបណ្តាញ (SLA &amp; Network Quality)" subtitle="ការត្រួតពិនិត្យ និងធានាគុណភាពបណ្តាញស្នូលគ្រប់ពេលវេលា" />
        <div class="overflow-x-auto rounded-2xl border border-gray-200 dark:border-gray-800 glass-card">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="table-header text-brand-green uppercase text-xs border-b border-gray-200 dark:border-gray-800">
                        <th class="p-4">ល.រ</th>
                        <th class="p-4">ប៉ារ៉ាម៉ែត្រ KPI (Parameter)</th>
                        <th class="p-4">តម្លៃ KPI បទដ្ឋាន (Standard Target)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-800 text-adaptive-muted">
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/40 transition"><td class="p-4 font-bold text-adaptive-main">1</td><td class="p-4 font-medium">គុណភាពប្រតិបត្តិការបណ្តាញស្នូល (Core Network) គ្រប់ពេលវេលា</td><td class="p-4 text-brand-green font-bold">≤ 99.99%</td></tr>
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/40 transition"><td class="p-4 font-bold text-adaptive-main">2</td><td class="p-4 font-medium">កម្រិតបញ្ជូនទិន្នន័យថ្នាក់ជាតិ និងអន្តរជាតិ — SLA</td><td class="p-4 text-brand-orange font-bold">≥ 95%</td></tr>
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/40 transition"><td class="p-4 font-bold text-adaptive-main">3</td><td class="p-4 font-medium">ភាពយឺតយ៉ាវ (Latency Benchmark)</td><td class="p-4"><span class="block">ថ្នាក់ជាតិ: <strong class="text-brand-green">&lt; 50ms</strong></span><span class="block">អាស៊ីប៉ាស៊ីហ្វិក: <strong class="text-brand-orange">&lt; 70ms</strong></span><span class="block">អឺរ៉ុប: <strong>&lt; 200ms</strong> | USA: <strong>&lt; 300ms</strong></span></td></tr>
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/40 transition"><td class="p-4 font-bold text-adaptive-main">4</td><td class="p-4 font-medium">ភាពប្រែប្រួលនៃពេលវេលា (Jitter)</td><td class="p-4 text-brand-orange font-bold">≤ 50 មីលីវិនាទី</td></tr>
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/40 transition"><td class="p-4 font-bold text-adaptive-main">5</td><td class="p-4 font-medium">ការបាត់ទិន្នន័យ (Packet Loss)</td><td class="p-4 text-brand-green font-bold">≤ 0.001%</td></tr>
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/40 transition"><td class="p-4 font-bold text-adaptive-main">6</td><td class="p-4 font-medium">ការចូលមើលគេហទំព័រ (Web Loading &lt; 3s)</td><td class="p-4 text-brand-green font-bold">អត្រាជោគជ័យ 98%</td></tr>
                    <tr class="hover:bg-slate-100 dark:hover:bg-slate-800/40 transition"><td class="p-4 font-bold text-adaptive-main">7</td><td class="p-4 font-medium">ការទស្សនាវីដេអូ (Video Streaming)</td><td class="p-4"><span class="block text-xs">ក្រុង: ជោគជ័យ &gt; 95%, ចូល &lt; 5s, ដាំង &lt; 5%</span><span class="block text-xs text-adaptive-muted">ជនបទ: ជោគជ័យ &gt; 85%, ចូល &lt; 5s, ដាំង &lt; 10%</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- ===== SUPPORT SECTION — hidden ===== --}}
<section id="support" class="py-16 section-bg-primary hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title label="06. ការគាំទ្រ និងប្រព័ន្ធ ២៤/៧" title="កម្រិតការឡើងនៃបញ្ហា (Escalation Level Matrix)" subtitle="ក្រុមការងារជំនាញត្រៀមខ្លួនដោះស្រាយបញ្ហារហ័ស ២៤ ម៉ោង" labelColor="text-brand-green" />
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php $levels = [
                ['color'=>'green','level'=>'Level 1','tk'=>'ក្រុមការងារ NOC 24/7','te'=>'NOC Team 24/7','dk'=>'ទទួលសំបុត្រ (Ticket) វិភាគ និងដោះស្រាយពីចម្ងាយ','de'=>'Receive tickets, analyze, and resolve remotely','phone'=>'097 513 5135','email'=>'noc@telnet.com.kh'],
                ['color'=>'orange','level'=>'Level 2','tk'=>'ប្រធានផ្នែក NOC','te'=>'NOC Department Head','dk'=>'លោក នី សាវណ្ណ (Mr. Ny Savann)','de'=>'Mr. Ny Savann','phone'=>'088 891 6667','email'=>'ny.savann@telnet.com.kh'],
                ['color'=>'green','level'=>'Level 3','tk'=>'ប្រតិបត្តិការ និងនាយក','te'=>'Operations & Director','dk'=>'លោក ណេត សុគន្ធធារិទ្ធ (Mr. Neth Sokunthearith)','de'=>'Mr. Neth Sokunthearith','phone'=>'081 687 697','email'=>'neth.sokunthearith@telnet.com.kh'],
            ]; @endphp
            @foreach($levels as $i => $lvl)
            <div class="glass-card p-6 rounded-2xl border-t-4 {{ $lvl['color']==='green' ? 'border-t-brand-green' : 'border-t-brand-orange' }} relative">
                <span class="text-xs font-bold {{ $lvl['color']==='green' ? 'text-brand-green bg-brand-green/10' : 'text-brand-orange bg-brand-orange/10' }} px-2.5 py-1 rounded">
                    កម្រិតទ{{ ['ី១','ី២','ី៣'][$i] }} ({{ $lvl['level'] }})
                </span>
                <h3 class="text-lg font-bold text-adaptive-main mt-3" data-km="{{ $lvl['tk'] }}" data-en="{{ $lvl['te'] }}">{{ $lvl['tk'] }}</h3>
                <p class="text-xs text-adaptive-muted mt-1" data-km="{{ $lvl['dk'] }}" data-en="{{ $lvl['de'] }}">{{ $lvl['dk'] }}</p>
                <div class="mt-6 space-y-3 text-xs">
                    <a href="tel:{{ preg_replace('/\s+/','',$lvl['phone']) }}" class="flex items-center gap-3 p-3 bg-slate-100 dark:bg-slate-900 rounded-xl hover:bg-slate-200 dark:hover:bg-slate-800 transition">
                        <i class="fa-solid fa-phone text-{{ $lvl['color']==='green' ? 'brand-green' : 'brand-orange' }} text-base"></i>
                        <div><span class="text-adaptive-muted block text-[10px]">លេខទូរស័ព្ទ:</span><span class="font-bold text-adaptive-main text-sm">{{ $lvl['phone'] }}</span></div>
                    </a>
                    <a href="mailto:{{ $lvl['email'] }}" class="flex items-center gap-3 p-3 bg-slate-100 dark:bg-slate-900 rounded-xl hover:bg-slate-200 dark:hover:bg-slate-800 transition">
                        <i class="fa-solid fa-envelope text-{{ $lvl['color']==='green' ? 'brand-green' : 'brand-orange' }} text-base"></i>
                        <div><span class="text-adaptive-muted block text-[10px]">អ៊ីមែល:</span><span class="font-bold text-adaptive-main text-xs">{{ $lvl['email'] }}</span></div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== TEAM SECTION — hidden ===== --}}
<section id="team" class="py-16 section-bg-secondary hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-title label="07. ភាពជាអ្នកដឹកនាំ &amp; ក្រុមការងារ" title="ក្រុមអ្នកគ្រប់គ្រង និងក្រុមការងារ TELNET" subtitle="ក្រុមការងារប្រកបដោយវិជ្ជាជីវៈ និងបទពិសោធន៍ខ្ពស់" />
        @if($ceo)
        <div class="glass-card p-6 sm:p-8 rounded-2xl border border-brand-green/30 mb-10 bg-gradient-to-r from-brand-green/10 via-transparent to-brand-orange/10">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full bg-gradient-to-tr from-brand-green to-brand-orange p-1 flex-shrink-0 shadow-lg">
                    @if($ceo->photo)
                        <img src="{{ asset('storage/'.$ceo->photo) }}" alt="{{ $ceo->getName() }}" class="w-full h-full rounded-full object-cover">
                    @else
                        <div class="w-full h-full rounded-full bg-slate-900 flex items-center justify-center text-3xl text-brand-green font-bold"><i class="fa-solid fa-user-tie"></i></div>
                    @endif
                </div>
                <div class="text-center md:text-left space-y-2">
                    <span class="text-xs font-bold text-brand-orange uppercase tracking-wider bg-brand-orange/10 px-2.5 py-1 rounded">{{ $ceo->getPosition() }}</span>
                    <h3 class="text-2xl font-black text-adaptive-main">{{ $ceo->name_km }} <span class="text-sm font-normal text-adaptive-muted">({{ $ceo->name_en }})</span></h3>
                    <p class="text-xs text-brand-green font-bold">អគ្គនាយក ក្រុមហ៊ុន TELNET CO., LTD.</p>
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start text-xs text-adaptive-muted pt-2">
                        @if($ceo->phone)<span><i class="fa-solid fa-phone text-brand-green mr-1"></i> {{ $ceo->phone }}</span>@endif
                        @if($ceo->telegram)<span><i class="fa-paper-plane fa-solid text-brand-orange mr-1"></i> Telegram: {{ $ceo->telegram }}</span>@endif
                        @if($ceo->email)<span><i class="fa-solid fa-envelope text-brand-green mr-1"></i> {{ $ceo->email }}</span>@endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($teamMembers->where('is_ceo', false) as $member)
            <div class="glass-card p-4 rounded-xl flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg {{ $loop->iteration % 2 === 0 ? 'bg-brand-orange/20 text-brand-orange' : 'bg-brand-green/20 text-brand-green' }} flex items-center justify-center font-bold">
                    @if($member->photo)<img src="{{ asset('storage/'.$member->photo) }}" alt="{{ $member->getName() }}" class="w-full h-full rounded-lg object-cover">
                    @else<i class="fa-solid fa-user"></i>@endif
                </div>
                <div>
                    <h4 class="text-sm font-bold text-adaptive-main">{{ $member->name_km }}</h4>
                    <p class="text-[11px] {{ $loop->iteration % 2 === 0 ? 'text-brand-green' : 'text-brand-orange' }} font-bold">{{ $member->getPosition() }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CTA SECTION — visible ===== --}}
<section class="py-16 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20 border-y border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-2xl sm:text-4xl font-extrabold text-adaptive-main"
            data-km="តើអ្នកត្រៀមរួចរាល់ដើម្បីទទួលបានអ៊ីនធឺណិតល្បឿនខ្ពស់ហើយឬ?"
            data-en="Ready to Experience High-Speed Internet?">
            តើអ្នកត្រៀមរួចរាល់ដើម្បីទទួលបានអ៊ីនធឺណិតល្បឿនខ្ពស់ហើយឬ?
        </h2>
        <p class="text-adaptive-muted text-sm max-w-2xl mx-auto"
           data-km="ទាក់ទងមកកាន់ TELNET CO., LTD ឥឡូវនេះ ដើម្បីទទួលបានការពិគ្រោះយោបល់ និងការតំឡើងសេវាអ៊ីនធឺណិតនៅទីតាំងរបស់អ្នក!"
           data-en="Contact TELNET CO., LTD now for a consultation and internet installation at your location!">
            ទាក់ទងមកកាន់ <strong>TELNET CO., LTD</strong> ឥឡូវនេះ ដើម្បីទទួលបានការពិគ្រោះយោបល់ និងការតំឡើងសេវា!
        </p>
        <div class="flex justify-center gap-4 flex-wrap">
            <button onclick="openModal('serviceModal')"
                    class="bg-gradient-to-r from-brand-green to-brand-orange hover:from-brand-green-hover hover:to-brand-orange-hover text-white font-bold px-8 py-4 rounded-xl shadow-lg shadow-brand-green/20 text-sm transition">
                <i class="fa-solid fa-paper-plane mr-2"></i>
                <span data-km="ស្នើសុំតំឡើងសេវាអ៊ីនធឺណិតថ្ងៃនេះ" data-en="Submit Service Connection Request">ស្នើសុំតំឡើងសេវាអ៊ីនធឺណិតថ្ងៃនេះ</span>
            </button>
        </div>
    </div>
</section>

@endsection
