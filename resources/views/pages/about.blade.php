@extends('layouts.app')
@section('title', 'ក្រុមហ៊ុន​យើង​ខ្ញុំ — TELNET CO., LTD.')

@section('content')

{{-- Page Hero --}}
<section class="py-12 section-bg-primary ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-adaptive-muted mb-4">
            <a href="{{ route('home') }}" class="hover:text-brand-green transition" data-km="ទំព័រដើម" data-en="Home">ទំព័រដើម</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span data-km="ក្រុមហ៊ុន​យើង​ខ្ញុំ" data-en="About Us">ក្រុមហ៊ុន​យើង​ខ្ញុំ</span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-black text-adaptive-main mb-3"
            data-km="ក្រុមហ៊ុន​យើង​ខ្ញុំ" data-en="About Us">ក្រុមហ៊ុន​យើង​ខ្ញុំ</h1>
        <p class="text-adaptive-muted text-sm max-w-2xl"
           data-km="ស្វែងយល់អំពីប្រវត្តិ ចក្ខុវិស័យ បេសកកម្ម និងគុណតម្លៃស្នូលរបស់ TELNET CO., LTD."
           data-en="Learn about the history, vision, mission, and core values of TELNET CO., LTD.">
            ស្វែងយល់អំពីប្រវត្តិ ចក្ខុវិស័យ បេសកកម្ម និងគុណតម្លៃស្នូលរបស់ TELNET CO., LTD.
        </p>
    </div>
</section>

{{-- Company Overview --}}
<section class="py-16 section-bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-xs text-brand-orange font-extrabold uppercase tracking-widest mb-2">
                01. ប្រវត្តិក្រុមហ៊ុន &amp; ប្រវត្តិ
            </h2>
            <p class="text-2xl sm:text-3xl font-extrabold text-adaptive-main"
               data-km="TELNET CO., LTD — ដៃគូអ៊ីនធឺណិតដែលអ្នកទុកចិត្ត"
               data-en="TELNET CO., LTD — Your Trusted Internet Partner">
                TELNET CO., LTD — ដៃគូអ៊ីនធឺណិតដែលអ្នកទុកចិត្ត
            </p>
            <p class="text-adaptive-muted text-sm mt-3"
               data-km="បង្កើតឡើង និងទទួលបានអាជ្ញាបណ្ណនៅឆ្នាំ ២០១៨ ហើយទទួលបានការអនុម័តជាISP នៅឆ្នាំ ២០២០ ពី TRC។"
               data-en="Established and licensed in 2018, TELNET obtained in-principle approval to operate as an ISP in 2020 from the Telecommunication Regulator of Cambodia (TRC).">
                បង្កើតឡើង និងទទួលបានអាជ្ញាបណ្ណនៅឆ្នាំ ២០១៨
                ហើយទទួលបានការអនុម័ត ជា ISP នៅឆ្នាំ ២០២០
                ពីគណៈកម្មការទូរគមនាគមន៍កម្ពុជា (TRC)។
            </p>
        </div>

        {{-- Vision & Mission --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="glass-card p-8 rounded-2xl border-l-4 border-l-brand-green relative overflow-hidden">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-brand-green/10 text-brand-green flex items-center justify-center text-xl">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-adaptive-main"
                            data-km="ចក្ខុវិស័យ (OUR VISION)" data-en="OUR VISION">ចក្ខុវិស័យ (OUR VISION)</h3>
                        <p class="text-xs text-brand-green font-bold"
                           data-km="គោលដៅអភិវឌ្ឍន៍រយៈពេលវែង" data-en="Long-term Development Goals">គោលដៅអភិវឌ្ឍន៍រយៈពេលវែង</p>
                    </div>
                </div>
                <p class="text-adaptive-muted text-sm leading-relaxed"
                   data-km="ក្លាយជាអ្នកផ្តល់សេវាអ៉ីនធឺណិត (ISP) ឈានមុខគេនៅកម្ពុជា ដោយផ្តល់សេវាដែលមានគុណភាពខ្ពស់ ល្បឿនលឿន គួរឱ្យទុកចិត្ត និងដំណោះស្រាយតភ្ជាប់ឌីជីថលប្រកបដោយភាពច្នៃប្រឌិត។"
                   data-en="To become a leading Internet Service Provider (ISP) in Cambodia by offering high-quality, high-speed, reliable services and innovative digital connectivity solutions.">
                    ក្លាយជាអ្នកផ្តល់សេវាអ៉ីនធឺណិត (ISP) ឈានមុខគេនៅកម្ពុជា
                    ដោយផ្តល់សេវាដែលមានគុណភាពខ្ពស់ ល្បឿនលឿន គួរឱ្យទុកចិត្ត
                    និងដំណោះស្រាយតភ្ជាប់ឌីជីថលប្រកបដោយភាពច្នៃប្រឌិត។
                </p>
            </div>

            <div class="glass-card p-8 rounded-2xl border-l-4 border-l-brand-orange relative overflow-hidden">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-brand-orange/10 text-brand-orange flex items-center justify-center text-xl">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-adaptive-main"
                            data-km="បេសកម្ម (OUR MISSION)" data-en="OUR MISSION">បេសកម្ម (OUR MISSION)</h3>
                        <p class="text-xs text-brand-orange font-bold"
                           data-km="ការប្តេជ្ញាចិត្តចំពោះអតិថិជន" data-en="Customer Commitment">ការប្តេជ្ញាចិត្តចំពោះអតិថិជន</p>
                    </div>
                </div>
                <ul class="text-adaptive-muted text-sm space-y-3">
                    @foreach([
                        ['km'=>'ផ្តល់សេវាតភ្ជាប់អ៉ីនធឺណិតដែលមានល្បឿនលឿន គួរឱ្យទុកចិត្ត និងមានស្ថេរភាព។','en'=>'Provide high-speed, reliable, and highly stable internet connectivity.'],
                        ['km'=>'សាងសង់ហេដ្ឋារចនាសម្ព័ន្ធបណ្តាញដែលមានសុវត្ថិភាព និងអាចពង្រីកបានទូទាំងប្រទេសកម្ពុជា។','en'=>'Build secure, scalable network infrastructure across Cambodia.'],
                        ['km'=>'ផ្តល់បទពិសោធន៍ល្អបំផុតដល់អតិថិជន និងបច្ចេកវិទ្យាព័ត៌មានប្រកបដោយភាពច្នៃប្រឌិត។','en'=>'Deliver top customer experience and cutting-edge IT technology.'],
                        ['km'=>'រក្សាស្តង់ដារខ្ពស់នៃការគាំទ្រអតិថិជន និងរួមចំណែកដល់ការផ្លាស់ប្តូរឌីជីថល។','en'=>"Maintain top-tier customer support and support Cambodia's digital transformation."],
                    ] as $m)
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-circle-check text-brand-orange mt-1 flex-shrink-0 text-xs"></i>
                        <span data-km="{{ $m['km'] }}" data-en="{{ $m['en'] }}">{{ $m['km'] }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Core Values --}}
        <div>
            <h3 class="text-center text-lg font-bold text-adaptive-main mb-8"
                data-km="គុណតម្លៃស្នូល (CORE VALUES) ចំនួន ៨ គោលការណ៍"
                data-en="OUR 8 CORE VALUES">
                គុណតម្លៃស្នូល (CORE VALUES) ចំនួន ៨ គោលការណ៍
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @php $coreValues = [
                    ['icon'=>'fa-network-wired','color'=>'brand-green', 'km'=>'1. ការតភ្ជាប់ដែលអាចទុកចិត្តបាន','en'=>'1. Reliable Connectivity',      'dk'=>'ផ្តល់សេវាអ៉ីនធឺណិតដែលមានស្ថេរភាពឥតរអាក់រអួល។',                     'de'=>'Ensure seamless, stable internet service for all users.'],
                    ['icon'=>'fa-user-gear',    'color'=>'brand-orange','km'=>'2. អតិថិជនជាចម្បង',              'en'=>'2. Customer First',             'dk'=>'ការប្តេជ្ញាចិត្តខ្ពស់ក្នុងការបម្រើតម្រូវការរបស់អតិថិជន។',           'de'=>'Dedicated commitment to serving every customer need.'],
                    ['icon'=>'fa-award',        'color'=>'brand-green', 'km'=>'3. ភាពឆ្នើមផ្នែកប្រតិបត្តិការ', 'en'=>'3. Operational Excellence',    'dk'=>'រក្សាស្តង់ដារបច្ចេកទេស និងប្រតិបត្តិការកម្រិតខ្ពស់។',             'de'=>'Maintain rigorous technical and operational standards.'],
                    ['icon'=>'fa-lightbulb',    'color'=>'brand-orange','km'=>'4. នវានុវត្តន៍បច្ចេកវិទ្យា',     'en'=>'4. Technological Innovation',   'dk'=>'ដឹកនាំក្នុងការប្រើប្រាស់បច្ចេកវិទ្យាឌីជីថលថ្មីៗ។',               'de'=>'Lead the adoption of modern digital tech solutions.'],
                    ['icon'=>'fa-users',        'color'=>'brand-green', 'km'=>'5. ក្រុមការងារមានវិជ្ជាជីវៈ',   'en'=>'5. Professional Team',          'dk'=>'សមត្ថភាពខ្ពស់ និងការសហការគ្នាយ៉ាងជិតស្និទ្ធ។',                   'de'=>'High competence and close team collaboration.'],
                    ['icon'=>'fa-shield-heart', 'color'=>'brand-orange','km'=>'6. សុចរិតភាព និងឥរិយាបថ',       'en'=>'6. Integrity &amp; Ethics',     'dk'=>'ប្រកាន់ខ្ជាប់នូវភាពស្មោះត្រង់ និងឥរិយាបថវិជ្ជមាន។',            'de'=>'Uphold honesty and positive professional ethics.'],
                    ['icon'=>'fa-graduation-cap','color'=>'brand-green','km'=>'7. ការរៀនសូត្រពេញមួយជីវិត',     'en'=>'7. Lifelong Learning',           'dk'=>'អភិវឌ្ឍចំណេះដឹង និងជំនាញបច្ចេកទេសជាប្រចាំ។',                   'de'=>'Continuously develop knowledge and technical skills.'],
                    ['icon'=>'fa-building-flag','color'=>'brand-orange','km'=>'8. អភិវឌ្ឍសហគមន៍ និងជាតិ',      'en'=>'8. Community &amp; Nation Building','dk'=>'ចូលរួមចំណែកក្នុងការអភិវឌ្ឍសង្គម និងសេដ្ឋកិច្ចឌីជីថល។',       'de'=>'Contribute to social development and digital economy.'],
                ]; @endphp
                @foreach($coreValues as $val)
                <div class="glass-card p-5 rounded-xl border border-gray-200 dark:border-gray-800 glass-card-hover">
                    <div class="text-{{ $val['color'] }} text-2xl mb-3"><i class="fa-solid {{ $val['icon'] }}"></i></div>
                    <h4 class="font-bold text-adaptive-main text-sm mb-1" data-km="{{ $val['km'] }}" data-en="{{ $val['en'] }}">{{ $val['km'] }}</h4>
                    <p class="text-xs text-adaptive-muted" data-km="{{ $val['dk'] }}" data-en="{{ $val['de'] }}">{{ $val['dk'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-14 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20 ">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-5">
        <h2 class="text-2xl font-extrabold text-adaptive-main"
            data-km="ត្រៀមតភ្ជាប់ជាមួយ TELNET?" data-en="Ready to connect with TELNET?">
            ត្រៀមតភ្ជាប់ជាមួយ TELNET?
        </h2>
        <button onclick="openModal('serviceModal')"
                class="inline-flex items-center gap-2 gradient-brand text-white font-bold px-8 py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5">
            <i class="fa-solid fa-paper-plane"></i>
            <span data-km="ស្នើសុំភ្ជាប់សេវាអ៊ីនធឺណិត" data-en="Request Internet Service">ស្នើសុំភ្ជាប់សេវាអ៊ីនធឺណិត</span>
        </button>
    </div>
</section>

@endsection
