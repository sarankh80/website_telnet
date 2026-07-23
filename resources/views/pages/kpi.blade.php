@extends('layouts.app')
@section('title', 'ស្តង់ដារប្រតិបត្តិការ — TELNET CO., LTD.')

@section('content')

<section class="py-12 section-bg-primary border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-adaptive-muted mb-4">
            <a href="{{ route('home') }}" class="hover:text-brand-green transition" data-km="ទំព័រដើម" data-en="Home">ទំព័រដើម</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span data-km="ស្តង់ដារប្រតិបត្តិការ" data-en="Standard Operation">ស្តង់ដារប្រតិបត្តិការ</span>
        </div>
        <h1 class="text-3xl sm:text-4xl font-black text-adaptive-main mb-3"
            data-km="ស្តង់ដារប្រតិបត្តិការ & KPI" data-en="Standard Operation &amp; KPIs">
            ស្តង់ដារប្រតិបត្តិការ & KPI
        </h1>
        <p class="text-adaptive-muted text-sm max-w-2xl"
           data-km="ការវាស់វែងគុណភាព និងសន្ទស្សន៍វដ្ដ/ភាពជឿជាក់ដែល TELNET ប្រតិបត្តិ"
           data-en="Quality benchmarks and reliability indicators that TELNET operates under">
            ការវាស់វែងគុណភាព និងសន្ទស្សន៍វដ្ដ/ភាពជឿជាក់ដែល TELNET ប្រតិបត្តិ
        </p>
    </div>
</section>

<section class="py-16 section-bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- KPI Stats --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
            @php $kpiStats = [
                ['value'=>'99.9%', 'label_km'=>'Uptime SLA',             'label_en'=>'Uptime SLA',              'color'=>'text-brand-green'],
                ['value'=>'< 10ms','label_km'=>'Latency (Local)',         'label_en'=>'Latency (Local)',          'color'=>'text-brand-orange'],
                ['value'=>'15min', 'label_km'=>'Response Time (NOC)',     'label_en'=>'NOC Response Time',        'color'=>'text-brand-green'],
                ['value'=>'24/7',  'label_km'=>'ការត្រួតពិនិត្យបណ្ដាញ', 'label_en'=>'Network Monitoring',      'color'=>'text-brand-orange'],
            ]; @endphp
            @foreach($kpiStats as $s)
            <div class="glass-card p-5 rounded-2xl text-center">
                <div class="text-2xl font-black {{ $s['color'] }} mb-1">{{ $s['value'] }}</div>
                <div class="text-xs text-adaptive-muted" data-km="{{ $s['label_km'] }}" data-en="{{ $s['label_en'] }}">{{ $s['label_km'] }}</div>
            </div>
            @endforeach
        </div>

        {{-- KPI Table --}}
        <div class="glass-card rounded-2xl overflow-hidden mb-12">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-800 flex items-center gap-3">
                <i class="fa-solid fa-chart-line text-brand-green text-lg"></i>
                <h2 class="font-bold text-adaptive-main"
                    data-km="ស្តង់ដារប្រតិបត្តិការ (KPI Table)" data-en="Key Performance Indicators (KPI Table)">
                    ស្តង់ដារប្រតិបត្តិការ (KPI Table)
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-800/50 text-xs">
                            <th class="text-left px-6 py-3 text-adaptive-muted font-bold"
                                data-km="#"           data-en="#">#</th>
                            <th class="text-left px-6 py-3 text-adaptive-muted font-bold"
                                data-km="ស្តង់ដារ"   data-en="Standard">ស្តង់ដារ</th>
                            <th class="text-left px-6 py-3 text-adaptive-muted font-bold"
                                data-km="សសិការ"     data-en="Metric">សសិការ</th>
                            <th class="text-left px-6 py-3 text-adaptive-muted font-bold"
                                data-km="គោលដៅ"      data-en="Target">គោលដៅ</th>
                            <th class="text-left px-6 py-3 text-adaptive-muted font-bold"
                                data-km="ស្ថានភាព"   data-en="Status">ស្ថានភាព</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $kpiRows = [
                            ['std_km'=>'Network Availability',   'std_en'=>'Network Availability',   'metric_km'=>'Uptime (%)',                   'metric_en'=>'Uptime (%)',                 'target'=>'≥ 99.9%','status'=>'achieved'],
                            ['std_km'=>'Latency (Local)',         'std_en'=>'Latency (Local)',         'metric_km'=>'Round-Trip Time (RTT)',         'metric_en'=>'Round-Trip Time (RTT)',      'target'=>'< 10 ms','status'=>'achieved'],
                            ['std_km'=>'Latency (International)','std_en'=>'Latency (International)','metric_km'=>'RTT (Intl.)',                   'metric_en'=>'RTT (Intl.)',                'target'=>'< 80 ms','status'=>'achieved'],
                            ['std_km'=>'Packet Loss',            'std_en'=>'Packet Loss',            'metric_km'=>'% Packet Loss',                'metric_en'=>'% Packet Loss',             'target'=>'< 0.1%', 'status'=>'achieved'],
                            ['std_km'=>'Bandwidth Utilization',  'std_en'=>'Bandwidth Utilization',  'metric_km'=>'Peak Traffic (%)',             'metric_en'=>'Peak Traffic (%)',           'target'=>'≤ 70%',  'status'=>'achieved'],
                            ['std_km'=>'NOC Response Time',      'std_en'=>'NOC Response Time',      'metric_km'=>'First Response (Minutes)',     'metric_en'=>'First Response (Minutes)',   'target'=>'≤ 15 min','status'=>'achieved'],
                            ['std_km'=>'Incident Resolution',    'std_en'=>'Incident Resolution',    'metric_km'=>'Critical Issue Resolution',    'metric_en'=>'Critical Issue Resolution', 'target'=>'≤ 2 hrs','status'=>'achieved'],
                            ['std_km'=>'Customer Satisfaction',  'std_en'=>'Customer Satisfaction',  'metric_km'=>'CSAT Score',                   'metric_en'=>'CSAT Score',                'target'=>'≥ 4.5/5','status'=>'achieved'],
                            ['std_km'=>'Mean Time to Repair',    'std_en'=>'Mean Time to Repair',    'metric_km'=>'MTTR (Hours)',                 'metric_en'=>'MTTR (Hours)',              'target'=>'< 4 hrs','status'=>'achieved'],
                            ['std_km'=>'On-Time Delivery',       'std_en'=>'On-Time Delivery',       'metric_km'=>'Service Activation Rate (%)', 'metric_en'=>'Service Activation Rate (%)', 'target'=>'≥ 95%', 'status'=>'achieved'],
                        ]; @endphp
                        @foreach($kpiRows as $i => $row)
                        <tr class="border-t border-gray-200 dark:border-gray-800 hover:bg-slate-800/30 transition">
                            <td class="px-6 py-3.5 text-adaptive-muted text-xs">{{ $i + 1 }}</td>
                            <td class="px-6 py-3.5 font-medium text-adaptive-main"
                                data-km="{{ $row['std_km'] }}" data-en="{{ $row['std_en'] }}">{{ $row['std_km'] }}</td>
                            <td class="px-6 py-3.5 text-adaptive-muted"
                                data-km="{{ $row['metric_km'] }}" data-en="{{ $row['metric_en'] }}">{{ $row['metric_km'] }}</td>
                            <td class="px-6 py-3.5 font-bold text-brand-green">{{ $row['target'] }}</td>
                            <td class="px-6 py-3.5">
                                <span class="inline-flex items-center gap-1 text-xs font-bold bg-brand-green/10 text-brand-green px-2.5 py-1 rounded-full">
                                    <i class="fa-solid fa-circle-check text-[10px]"></i>
                                    <span data-km="សម្រេចបាន" data-en="Achieved">សម្រេចបាន</span>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SLA Levels --}}
        <h3 class="text-lg font-bold text-adaptive-main mb-6"
            data-km="កម្រិតសេវា (SLA) ការធានា" data-en="Service Level Agreement (SLA) Guarantees">
            កម្រិតសេវា (SLA) ការធានា
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php $slaPlans = [
                ['name'=>'Business',   'uptime'=>'99.9%', 'latency'=>'< 10ms','support'=>'24/7','resolution'=>'< 2h', 'color'=>'brand-green','icon'=>'fa-building'],
                ['name'=>'Enterprise', 'uptime'=>'99.95%','latency'=>'< 5ms', 'support'=>'24/7','resolution'=>'< 1h', 'color'=>'brand-orange','icon'=>'fa-city'],
                ['name'=>'Carrier',    'uptime'=>'99.99%','latency'=>'< 3ms', 'support'=>'24/7','resolution'=>'< 30m','color'=>'brand-green','icon'=>'fa-tower-broadcast'],
            ]; @endphp
            @foreach($slaPlans as $plan)
            <div class="glass-card p-6 rounded-2xl {{ $plan['color'] === 'brand-green' ? 'border border-brand-green/30' : 'border border-brand-orange/30' }}">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-lg bg-{{ $plan['color'] }}/10 text-{{ $plan['color'] }} flex items-center justify-center">
                        <i class="fa-solid {{ $plan['icon'] }}"></i>
                    </div>
                    <h4 class="font-bold text-adaptive-main">{{ $plan['name'] }} SLA</h4>
                </div>
                <ul class="space-y-2.5 text-sm">
                    @foreach(['Uptime:'=>$plan['uptime'],'Latency:'=>$plan['latency'],'Support:'=>$plan['support'],'Resolution:'=>$plan['resolution']] as $label => $val)
                    <li class="flex items-center justify-between">
                        <span class="text-adaptive-muted">{{ $label }}</span>
                        <span class="font-bold text-{{ $plan['color'] }}">{{ $val }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-14 bg-gradient-to-r from-brand-green/20 via-brand-orange/20 to-brand-green/20 border-y border-gray-200 dark:border-gray-800">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-5">
        <h2 class="text-2xl font-extrabold text-adaptive-main"
            data-km="ស្នើ SLA លម្អិតសម្រាប់អ្នក?" data-en="Need a detailed SLA for your business?">
            ស្នើ SLA លម្អិតសម្រាប់អ្នក?
        </h2>
        <button onclick="openModal('serviceModal')"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-brand-green to-brand-orange text-white font-bold px-8 py-3.5 rounded-xl shadow-lg text-sm transition hover:-translate-y-0.5">
            <i class="fa-solid fa-paper-plane"></i>
            <span data-km="ទាក់ទងទៅ TELNET" data-en="Contact TELNET">ទាក់ទងទៅ TELNET</span>
        </button>
    </div>
</section>

@endsection
