@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')

{{-- Stats grid --}}
<div class="grid grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
    @php
        $statCards = [
            ['label' => 'Services',        'value' => $stats['services'],        'icon' => 'fa-bolt',    'color' => 'text-brand-green',  'bg' => 'bg-brand-green/10',  'href' => route('admin.services.index')],
            ['label' => 'Branches',        'value' => $stats['branches'],        'icon' => 'fa-map-pin', 'color' => 'text-sky-400',      'bg' => 'bg-sky-400/10',      'href' => route('admin.branches.index')],
            ['label' => 'Team Members',    'value' => $stats['team'],            'icon' => 'fa-users',   'color' => 'text-violet-400',   'bg' => 'bg-violet-400/10',   'href' => route('admin.teams.index')],
            ['label' => 'New Requests',    'value' => $stats['new_requests'],    'icon' => 'fa-inbox',   'color' => 'text-brand-orange', 'bg' => 'bg-brand-orange/10', 'href' => route('admin.service-requests.index')],
            ['label' => 'Unread Messages', 'value' => $stats['unread_messages'], 'icon' => 'fa-envelope','color' => 'text-purple-400',   'bg' => 'bg-purple-400/10',   'href' => route('admin.contact-messages.index')],
        ];
    @endphp

    @foreach($statCards as $stat)
        <a href="{{ $stat['href'] }}" class="bg-slate-900 border border-slate-800 hover:border-slate-700 rounded-2xl p-5 flex items-center gap-4 transition group">
            <div class="w-10 h-10 rounded-xl {{ $stat['bg'] }} flex items-center justify-center {{ $stat['color'] }} flex-shrink-0">
                <i class="fa-solid {{ $stat['icon'] }} text-base"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-slate-100 group-hover:text-white transition">{{ $stat['value'] }}</p>
                <p class="text-xs text-slate-500">{{ $stat['label'] }}</p>
            </div>
        </a>
    @endforeach
</div>

<div class="grid lg:grid-cols-2 gap-6">

    {{-- Recent Service Requests --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-800">
            <h2 class="font-semibold text-slate-100 text-sm">Recent Service Requests</h2>
            <a href="{{ route('admin.service-requests.index') }}" class="text-xs text-brand-green hover:underline">View all</a>
        </div>
        <div class="divide-y divide-slate-800">
            @forelse($recentRequests as $req)
                <a href="{{ route('admin.service-requests.show', $req) }}"
                   class="flex items-center gap-3 px-5 py-3.5 hover:bg-slate-800/50 transition">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-200 truncate">{{ $req->full_name }}</p>
                        <p class="text-xs text-slate-500">{{ $req->phone }} · {{ $req->service_type }}</p>
                    </div>
                    <span class="flex-shrink-0 px-2 py-0.5 rounded-full text-[10px] font-semibold
                        {{ $req->status === 'new' ? 'bg-brand-orange/15 text-brand-orange' :
                           ($req->status === 'completed' ? 'bg-green-500/15 text-green-400' : 'bg-slate-700 text-slate-300') }}">
                        {{ ucfirst(str_replace('_',' ',$req->status)) }}
                    </span>
                </a>
            @empty
                <p class="px-5 py-8 text-center text-sm text-slate-500">No requests yet.</p>
            @endforelse
        </div>
    </div>

    {{-- Recent Messages --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-800">
            <h2 class="font-semibold text-slate-100 text-sm">Recent Contact Messages</h2>
            <a href="{{ route('admin.contact-messages.index') }}" class="text-xs text-brand-green hover:underline">View all</a>
        </div>
        <div class="divide-y divide-slate-800">
            @forelse($recentMessages as $msg)
                <a href="{{ route('admin.contact-messages.show', $msg) }}"
                   class="flex items-center gap-3 px-5 py-3.5 hover:bg-slate-800/50 transition {{ !$msg->is_read ? 'bg-brand-green/5' : '' }}">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            @if(!$msg->is_read)
                                <span class="w-2 h-2 rounded-full bg-brand-green flex-shrink-0"></span>
                            @endif
                            <p class="text-sm font-medium text-slate-200 truncate">{{ $msg->name }}</p>
                        </div>
                        <p class="text-xs text-slate-500 truncate pl-{{ !$msg->is_read ? '4' : '0' }}">{{ $msg->subject }}</p>
                    </div>
                    <p class="text-xs text-slate-600 flex-shrink-0">{{ $msg->created_at->diffForHumans() }}</p>
                </a>
            @empty
                <p class="px-5 py-8 text-center text-sm text-slate-500">No messages yet.</p>
            @endforelse
        </div>
    </div>

</div>
@endsection
