@extends('layouts.app')
@section('title', 'NOC Portal & Support — TELNET CO., LTD.')

@section('content')

<section class="py-12 section-bg-primary border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-adaptive-muted mb-4">
            <a href="{{ route('home') }}" class="hover:text-brand-green transition" data-km="ទំព័រដើម" data-en="Home">ទំព័រដើម</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span data-km="Portal & ជំនួយ" data-en="Portal &amp; Support">Portal & ជំនួយ</span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-black text-adaptive-main mb-3"
            data-km="NOC Portal & ការគាំទ្រ ២៤/៧" data-en="NOC Portal &amp; 24/7 Support">
            NOC Portal & ការគាំទ្រ ២៤/៧
        </h1>
        <p class="text-adaptive-muted text-sm max-w-2xl"
           data-km="ការគ្រប់គ្រង បណ្ដោះអាសន្ន រាយការណ៍ ផ្ដល់ ការគាំទ្រ ២៤/៧ ដោយក្រុមអ្នកជំនាញ"
           data-en="Monitoring, escalation, reporting, and 24/7 expert support">
            ការគ្រប់គ្រង បណ្ដោះអាសន្ន រាយការណ៍ ផ្ដល់ ការគាំទ្រ ២៤/៧ ដោយក្រុមអ្នកជំនាញ
        </p>
    </div>
</section>

<section class="py-16 section-bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- NOC Contact Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-14">
            <a href="tel:0975135135" class="glass-card glass-card-hover p-6 rounded-2xl border border-brand-orange/40 block">
                <div class="w-12 h-12 rounded-xl bg-brand-orange/10 text-brand-orange flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <h3 class="font-bold text-adaptive-main mb-1"
                    data-km="NOC Hotline (24/7)" data-en="NOC Hotline (24/7)">NOC Hotline (24/7)</h3>
                <p class="text-2xl font-black text-brand-orange">097 513 5135</p>
                <p class="text-xs text-adaptive-muted mt-1"
                   data-km="ហៅភ្លាមៗ ២៤ ម៉ោង ៧ ថ្ងៃក្នុងសប្ដាហ៍" data-en="Call immediately 24 hours, 7 days a week">
                    ហៅភ្លាមៗ ២៤ ម៉ោង ៧ ថ្ងៃក្នុងសប្ដាហ៍
                </p>
            </a>
            <a href="mailto:noc@telnet.com.kh" class="glass-card glass-card-hover p-6 rounded-2xl border border-brand-green/40 block">
                <div class="w-12 h-12 rounded-xl bg-brand-green/10 text-brand-green flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <h3 class="font-bold text-adaptive-main mb-1"
                    data-km="NOC អ៊ីម៉ែល" data-en="NOC Email">NOC អ៊ីម៉ែល</h3>
                <p class="text-sm font-bold text-brand-green">noc@telnet.com.kh</p>
                <p class="text-xs text-adaptive-muted mt-1"
                   data-km="ការឆ្លើយតបក្នុងរយៈពេល ១ ម៉ោង" data-en="Response within 1 hour">
                    ការឆ្លើយតបក្នុងរយៈពេល ១ ម៉ោង
                </p>
            </a>
            <div class="glass-card p-6 rounded-2xl border border-brand-green/20">
                <div class="w-12 h-12 rounded-xl bg-brand-green/10 text-brand-green flex items-center justify-center text-xl mb-4">
                    <i class="fa-brands fa-telegram"></i>
                </div>
                <h3 class="font-bold text-adaptive-main mb-1"
                    data-km="Telegram / Online Chat" data-en="Telegram / Online Chat">Telegram / Online Chat</h3>
                <p class="text-sm font-bold text-brand-green">@telnet_noc</p>
                <p class="text-xs text-adaptive-muted mt-1"
                   data-km="ការឆ្លើយតបភ្លាមៗ" data-en="Instant response">ការឆ្លើយតបភ្លាមៗ</p>
            </div>
        </div>

        {{-- Escalation Levels --}}
        <h2 class="text-xl font-bold text-adaptive-main mb-6"
            data-km="ដំណើរការ Escalation (ការជូនដំណឹង)" data-en="Escalation Process">
            ដំណើរការ Escalation (ការជូនដំណឹង)
        </h2>
        <div class="space-y-4 mb-14">
            @php $escalations = [
                ['level'=>'L1', 'title_km'=>'ជំនួយកម្រិត ១ — NOC Helpdesk',          'title_en'=>'Level 1 — NOC Helpdesk',          'desc_km'=>'ការឆ្លើយតបដំបូង — ផ្ទៀងផ្ទាត់ ចុះឈ្មោះ ហើយចាប់ផ្ដើម troubleshoot បញ្ហា', 'desc_en'=>'First response — verify, register, and begin troubleshooting the issue',                'time'=>'≤ 15 min','color'=>'brand-green'],
                ['level'=>'L2', 'title_km'=>'ជំនួយកម្រិត ២ — Technical Support',     'title_en'=>'Level 2 — Technical Support',     'desc_km'=>'ក្រុមបច្ចេកទេស ដោះស្រាយបញ្ហា Configuration Network Level',                     'desc_en'=>'Technical team resolves network configuration-level issues',                        'time'=>'≤ 2 hrs', 'color'=>'brand-orange'],
                ['level'=>'L3', 'title_km'=>'ជំនួយកម្រិត ៣ — Senior/NOC Engineer',  'title_en'=>'Level 3 — Senior/NOC Engineer',  'desc_km'=>'វិស្វករជំនាញ ដោះស្រាយ Infrastructure / Core Network Issues',                  'desc_en'=>'Expert engineers resolve infrastructure / core network issues',                      'time'=>'≤ 4 hrs', 'color'=>'brand-green'],
                ['level'=>'L4', 'title_km'=>'ជំនួយកម្រិត ៤ — Management/Vendor',    'title_en'=>'Level 4 — Management/Vendor',    'desc_km'=>'ថ្នាក់ដឹកនាំ / Vendor engagement សម្រាប់ Critical Outage',                     'desc_en'=>'Management / vendor engagement for critical outage events',                         'time'=>'≤ 8 hrs', 'color'=>'brand-orange'],
            ]; @endphp
            @foreach($escalations as $i => $e)
            <div class="glass-card p-5 rounded-xl flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-{{ $e['color'] }}/10 text-{{ $e['color'] }} font-black flex items-center justify-center text-lg">
                    {{ $e['level'] }}
                </div>
                <div class="flex-1">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                        <h4 class="font-bold text-adaptive-main" data-km="{{ $e['title_km'] }}" data-en="{{ $e['title_en'] }}">{{ $e['title_km'] }}</h4>
                        <span class="text-xs font-bold text-{{ $e['color'] }} bg-{{ $e['color'] }}/10 px-2.5 py-1 rounded-full self-start">{{ $e['time'] }}</span>
                    </div>
                    <p class="text-xs text-adaptive-muted mt-1" data-km="{{ $e['desc_km'] }}" data-en="{{ $e['desc_en'] }}">{{ $e['desc_km'] }}</p>
                </div>
                @if(!$loop->last)
                <div class="hidden sm:block flex-shrink-0 self-center text-adaptive-muted">
                    <i class="fa-solid fa-arrow-down text-xs opacity-30"></i>
                </div>
                @endif
            </div>
            @endforeach
        </div>

        {{-- Support Portal Links --}}
        <h2 class="text-xl font-bold text-adaptive-main mb-6"
            data-km="ប្រព័ន្ធគ្រប់គ្រង" data-en="Management Systems">ប្រព័ន្ធគ្រប់គ្រង</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach([
                ['icon'=>'fa-chart-area',    'title_km'=>'Network Monitoring',   'title_en'=>'Network Monitoring',     'desc_km'=>'ត្រួតពិនិត្យ Real-time Status',     'desc_en'=>'Real-time network status monitoring','color'=>'brand-green'],
                ['icon'=>'fa-ticket',        'title_km'=>'Ticket System',        'title_en'=>'Ticket System',          'desc_km'=>'ដំណើរការ Incident ប្រកបដោយប្រសិទ្ធភាព','desc_en'=>'Efficient incident processing system','color'=>'brand-orange'],
                ['icon'=>'fa-file-invoice',  'title_km'=>'Billing Portal',       'title_en'=>'Billing Portal',         'desc_km'=>'ត្រួតពិនិត្យ Invoice & ការទូទាត់',  'desc_en'=>'Invoice and payment management','color'=>'brand-green'],
                ['icon'=>'fa-shield-halved', 'title_km'=>'Security Dashboard',   'title_en'=>'Security Dashboard',     'desc_km'=>'ការជូនដំណឹង DDoS & Firewall',       'desc_en'=>'DDoS and firewall alert dashboard','color'=>'brand-orange'],
                ['icon'=>'fa-sliders',       'title_km'=>'Self-Service Portal',  'title_en'=>'Self-Service Portal',    'desc_km'=>'គ្រប់គ្រងគណនី & Configuration',     'desc_en'=>'Account and configuration management','color'=>'brand-green'],
                ['icon'=>'fa-book-open',     'title_km'=>'Knowledge Base',       'title_en'=>'Knowledge Base',         'desc_km'=>'ឯកសារបច្ចេកទេស & ការណែនាំ',       'desc_en'=>'Technical docs and user guides','color'=>'brand-orange'],
            ] as $portal)
            <div class="glass-card glass-card-hover p-5 rounded-xl cursor-default">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-9 h-9 rounded-lg bg-{{ $portal['color'] }}/10 text-{{ $portal['color'] }} flex items-center justify-center">
                        <i class="fa-solid {{ $portal['icon'] }}"></i>
                    </div>
                    <h4 class="font-bold text-adaptive-main text-sm" data-km="{{ $portal['title_km'] }}" data-en="{{ $portal['title_en'] }}">{{ $portal['title_km'] }}</h4>
                </div>
                <p class="text-xs text-adaptive-muted" data-km="{{ $portal['desc_km'] }}" data-en="{{ $portal['desc_en'] }}">{{ $portal['desc_km'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-14 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20 border-y border-gray-200 dark:border-gray-800">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-3">
        <p class="text-xs text-brand-orange font-extrabold uppercase tracking-widest"
           data-km="ជំនួយ ២៤/៧" data-en="24/7 Support">ជំនួយ ២៤/៧</p>
        <h2 class="text-2xl font-extrabold text-adaptive-main"
            data-km="ត្រូវការជំនួយ? ក្រុម NOC ជួយស្ទើរ" data-en="Need help? Our NOC team is always ready.">
            ត្រូវការជំនួយ? ក្រុម NOC ជួយស្ទើរ
        </h2>
        <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
            <a href="tel:0975135135"
               class="inline-flex items-center justify-center gap-2 bg-brand-orange text-white font-bold px-7 py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5">
                <i class="fa-solid fa-phone"></i>
                097 513 5135
            </a>
            <button onclick="openModal('serviceModal')"
                    class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-brand-green to-brand-orange text-white font-bold px-7 py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5">
                <i class="fa-solid fa-paper-plane"></i>
                <span data-km="ស្នើសុំសេវាកម្ម" data-en="Request Service">ស្នើសុំសេវាកម្ម</span>
            </button>
        </div>
    </div>
</section>

@endsection
