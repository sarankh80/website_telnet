@extends('layouts.app')
@section('title', 'ក្រុមការងារ — TELNET CO., LTD.')

@section('content')

<section class="py-12 section-bg-primary border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-adaptive-muted mb-4">
            <a href="{{ route('home') }}" class="hover:text-brand-green transition" data-km="ទំព័រដើម" data-en="Home">ទំព័រដើម</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span data-km="ក្រុមការងារ" data-en="Our Team">ក្រុមការងារ</span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-black text-adaptive-main mb-3"
            data-km="ក្រុមការងារ & ថ្នាក់ដឹកនាំ" data-en="Our Team &amp; Leadership">
            ក្រុមការងារ & ថ្នាក់ដឹកនាំ
        </h1>
        <p class="text-adaptive-muted text-sm max-w-2xl"
           data-km="ក្រុមអ្នកជំនាញដែលដឹកនាំ TELNET ឆ្ពោះទៅអនាគតឌីជីថល"
           data-en="The expert team leading TELNET into the digital future">
            ក្រុមអ្នកជំនាញដែលដឹកនាំ TELNET ឆ្ពោះទៅអនាគតឌីជីថល
        </p>
    </div>
</section>

<section class="py-16 section-bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- CEO / Founder spotlight --}}
        @if($ceo)
        <div class="glass-card rounded-2xl overflow-hidden mb-12 border border-brand-green/30">
            <div class="p-8 flex flex-col md:flex-row items-center gap-8">
                <div class="flex-shrink-0 text-center">
                    @if($ceo->photo)
                        <img src="{{ asset('storage/' . $ceo->photo) }}"
                             alt="{{ $ceo->getName() }}"
                             class="w-36 h-36 rounded-2xl object-cover border-4 border-brand-green/40 shadow-lg mx-auto">
                    @else
                        <div class="w-36 h-36 rounded-2xl bg-gradient-to-br from-brand-green to-brand-orange flex items-center justify-center mx-auto shadow-lg">
                            <i class="fa-solid fa-user text-5xl text-white/60"></i>
                        </div>
                    @endif
                    <div class="mt-3">
                        <span class="text-xs bg-brand-green/20 text-brand-green font-bold px-3 py-1 rounded-full">
                            <data-km="{{ $ceo->position_km ?? 'CEO & Founder' }}" data-en="{{ $ceo->position_en ?? 'CEO & Founder' }}">
                                {{ $ceo->position_km ?? 'CEO & Founder' }}
                            </data-km>
                        </span>
                    </div>
                </div>
                <div class="text-center md:text-left">
                    <div class="text-xs text-brand-orange font-extrabold uppercase tracking-widest mb-1"
                         data-km="ដឹកនាំកំពូល" data-en="Executive Leadership">ដឹកនាំកំពូល</div>
                    <h2 class="text-2xl sm:text-3xl font-black text-adaptive-main mb-3">{{ $ceo->getName() }}</h2>
                    @if($ceo->bio_km || $ceo->bio_en)
                    <p class="text-adaptive-muted text-sm leading-relaxed max-w-xl"
                       data-km="{{ $ceo->bio_km }}" data-en="{{ $ceo->bio_en }}">
                        {{ $ceo->bio_km ?? $ceo->bio_en }}
                    </p>
                    @else
                    <p class="text-adaptive-muted text-sm leading-relaxed max-w-xl"
                       data-km="ដឹកនាំក្រុម TELNET ដ៏ចំណានក្នុងការផ្តល់សេវា ISP ប្រកបដោយគុណភាព និងច្នៃប្រឌិតទូទាំងព្រះរាជាណាចក្រកម្ពុជា។"
                       data-en="Leading TELNET's talented team in delivering quality and innovative ISP services across the Kingdom of Cambodia.">
                        ដឹកនាំក្រុម TELNET ដ៏ចំណានក្នុងការផ្តល់សេវា ISP ប្រកបដោយគុណភាព
                        និងច្នៃប្រឌិតទូទាំងព្រះរាជាណាចក្រកម្ពុជា។
                    </p>
                    @endif
                    <div class="mt-4 flex flex-wrap gap-2 justify-center md:justify-start">
                        <span class="text-xs bg-slate-800 text-adaptive-muted px-2.5 py-1 rounded-lg">Networking</span>
                        <span class="text-xs bg-slate-800 text-adaptive-muted px-2.5 py-1 rounded-lg">Telecommunications</span>
                        <span class="text-xs bg-slate-800 text-adaptive-muted px-2.5 py-1 rounded-lg">Business Strategy</span>
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- Management Team --}}
        @php $members = $teamMembers->where('is_ceo', false); @endphp
        @if($members->count())
        <h2 class="text-xl font-bold text-adaptive-main mb-6"
            data-km="ក្រុមអ្នកគ្រប់គ្រង & ថ្នាក់ដឹកនាំ" data-en="Management &amp; Leadership Team">
            ក្រុមអ្នកគ្រប់គ្រង & ថ្នាក់ដឹកនាំ
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach($members as $member)
            <div class="glass-card glass-card-hover p-5 rounded-2xl text-center">
                @if($member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}"
                         alt="{{ $member->getName() }}"
                         class="w-20 h-20 rounded-xl object-cover border-2 border-brand-green/30 shadow mx-auto mb-3">
                @else
                    <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-slate-700 to-slate-600 flex items-center justify-center mx-auto mb-3">
                        <i class="fa-solid fa-user text-3xl text-slate-400"></i>
                    </div>
                @endif
                <h4 class="font-bold text-adaptive-main text-sm">{{ $member->getName() }}</h4>
                @if($member->position_km || $member->position_en)
                <p class="text-xs text-brand-green mt-1 font-medium"
                   data-km="{{ $member->position_km }}" data-en="{{ $member->position_en }}">
                    {{ $member->position_km ?? $member->position_en }}
                </p>
                @endif
            </div>
            @endforeach
        </div>
        @else
        {{-- Placeholder cards when no team data --}}
        <h2 class="text-xl font-bold text-adaptive-main mb-6"
            data-km="ក្រុមអ្នកគ្រប់គ្រង & ថ្នាក់ដឹកនាំ" data-en="Management &amp; Leadership Team">
            ក្រុមអ្នកគ្រប់គ្រង & ថ្នាក់ដឹកនាំ
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach([
                ['title_km'=>'Chief Technology Officer','title_en'=>'CTO','color'=>'brand-green'],
                ['title_km'=>'Head of Operations','title_en'=>'Operations','color'=>'brand-orange'],
                ['title_km'=>'Head of Finance','title_en'=>'Finance','color'=>'brand-green'],
                ['title_km'=>'Head of Sales','title_en'=>'Sales','color'=>'brand-orange'],
            ] as $placeholder)
            <div class="glass-card p-5 rounded-2xl text-center opacity-60">
                <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-slate-700 to-slate-600 flex items-center justify-center mx-auto mb-3">
                    <i class="fa-solid fa-user text-3xl text-slate-400"></i>
                </div>
                <h4 class="font-bold text-adaptive-main text-sm" data-km="{{ $placeholder['title_km'] }}" data-en="{{ $placeholder['title_en'] }}">{{ $placeholder['title_km'] }}</h4>
                <p class="text-xs text-{{ $placeholder['color'] }} mt-1 font-medium"
                   data-km="TELNET CO., LTD." data-en="TELNET CO., LTD.">TELNET CO., LTD.</p>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Join Us CTA --}}
        <div class="mt-12 glass-card rounded-2xl p-8 text-center border border-brand-green/20">
            <div class="text-3xl mb-3"><i class="fa-solid fa-handshake text-brand-green"></i></div>
            <h3 class="text-lg font-bold text-adaptive-main mb-2"
                data-km="ចង់ចូលរួមជាមួយ TELNET?" data-en="Want to join the TELNET team?">
                ចង់ចូលរួមជាមួយ TELNET?
            </h3>
            <p class="text-adaptive-muted text-sm mb-5"
               data-km="យើងកំពុងស្វែងរកអ្នកទេពកោសល្យ ដើម្បីរួមគ្នាកសាងបណ្ដាញអ៊ីនធឺណិតកម្ពុជា"
               data-en="We are looking for talented individuals to help build Cambodia's internet infrastructure.">
                យើងកំពុងស្វែងរកអ្នកទេពកោសល្យ ដើម្បីរួមគ្នាកសាងបណ្ដាញអ៊ីនធឺណិតកម្ពុជា
            </p>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-brand-green to-brand-orange text-white font-bold px-7 py-3 rounded-xl text-sm transition hover:-translate-y-0.5">
                <i class="fa-solid fa-envelope"></i>
                <span data-km="ទំនាក់ទំនងមកយើង" data-en="Contact Us">ទំនាក់ទំនងមកយើង</span>
            </a>
        </div>
    </div>
</section>

@endsection
