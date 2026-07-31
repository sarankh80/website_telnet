@extends('admin.layouts.app')
@section('title', __('admin.service_requests.title'))

@section('content')

{{-- Filters --}}
<form method="GET" class="flex flex-wrap gap-3 mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, phone, location…"
           class="flex-1 min-w-0 bg-slate-900 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm
                  focus:outline-none focus:border-brand-green transition placeholder-slate-500">
    <select name="status"
            class="bg-slate-900 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-brand-green transition">
        <option value="">{{ __('admin.service_requests.all_statuses') }}</option>
        @foreach(['new','contacted','in_progress','completed','cancelled'] as $s)
            <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>
                {{ ucfirst(str_replace('_',' ',$s)) }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
        {{ __('admin.btn.filter') }}
    </button>
    @if(request()->hasAny(['search','status']))
        <a href="{{ route('admin.service-requests.index') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm rounded-lg transition">
            {{ __('admin.btn.clear') }}
        </a>
    @endif
</form>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <table class="w-full text-sm admin-datatable" style="min-width:580px">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left">{{ __('admin.service_requests.requester') }}</th>
                <th class="px-5 py-3.5 text-left hidden md:table-cell">{{ __('admin.service_requests.service') }}</th>
                <th class="px-5 py-3.5 text-left hidden lg:table-cell">{{ __('admin.service_requests.location') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.status') }}</th>
                <th class="px-5 py-3.5 text-right hidden sm:table-cell">{{ __('admin.field.date') }}</th>
                <th class="px-5 py-3.5 text-right">{{ __('admin.field.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($requests as $req)
                <tr class="hover:bg-slate-800/40 transition {{ $req->status === 'new' ? 'bg-brand-orange/5' : '' }}">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            @if($req->status === 'new')
                                <span class="w-2 h-2 rounded-full bg-brand-orange flex-shrink-0"></span>
                            @endif
                            <div>
                                <p class="font-medium text-slate-200">{{ $req->full_name }}</p>
                                <p class="text-xs text-slate-500">{{ $req->phone }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell text-slate-400">{{ $req->service_type }}</td>
                    <td class="px-5 py-4 hidden lg:table-cell text-slate-400">{{ Str::limit($req->location, 30) }}</td>
                    <td class="px-5 py-4 text-center">
                        @php
                            $colors = [
                                'new'         => 'bg-brand-orange/15 text-brand-orange',
                                'contacted'   => 'bg-sky-500/15 text-sky-400',
                                'in_progress' => 'bg-yellow-500/15 text-yellow-400',
                                'completed'   => 'bg-green-500/15 text-green-400',
                                'cancelled'   => 'bg-slate-700 text-slate-400',
                            ];
                        @endphp
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold {{ $colors[$req->status] ?? '' }}">
                            {{ ucfirst(str_replace('_',' ',$req->status)) }}
                        </span>
                    </td>
                    <td class="px-5 py-4 text-right text-slate-500 text-xs hidden sm:table-cell">
                        {{ $req->created_at->format('d M Y') }}
                    </td>
                    <td class="px-5 py-4 text-right">
                        <a href="{{ route('admin.service-requests.show', $req) }}"
                           class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">
                            {{ __('admin.btn.view') }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-5 py-10 text-center text-slate-500">{{ __('admin.service_requests.no_requests') }}</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
