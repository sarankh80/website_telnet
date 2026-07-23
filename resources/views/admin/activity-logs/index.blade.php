@extends('admin.layouts.app')
@section('title', 'Activity Logs')

@section('content')

{{-- Filters --}}
<form method="GET" class="flex flex-wrap gap-3 mb-6">
    <select name="user_id"
            class="bg-slate-900 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-brand-green transition">
        <option value="">All Users</option>
        @foreach($users as $id => $name)
            <option value="{{ $id }}" {{ request('user_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
    </select>
    <select name="action"
            class="bg-slate-900 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-brand-green transition">
        <option value="">All Actions</option>
        @foreach($actions as $action)
            <option value="{{ $action }}" {{ request('action') === $action ? 'selected' : '' }}>{{ ucfirst($action) }}</option>
        @endforeach
    </select>
    <input type="date" name="date" value="{{ request('date') }}"
           class="bg-slate-900 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-brand-green transition">
    <button type="submit" class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
        Filter
    </button>
    @if(request()->hasAny(['user_id','action','date']))
        <a href="{{ route('admin.activity-logs.index') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm rounded-lg transition">Clear</a>
    @endif

    {{-- Clear old logs --}}
    <form method="POST" action="{{ route('admin.activity-logs.clear') }}" class="ml-auto"
          onsubmit="return confirm('Delete logs older than 30 days?')">
        @csrf @method('DELETE')
        <button type="submit"
                class="px-4 py-2 bg-red-500/10 hover:bg-red-500/20 text-red-400 text-sm rounded-lg transition flex items-center gap-1.5">
            <i class="fa-solid fa-trash-can text-xs"></i>
            Clear Old Logs
        </button>
    </form>
</form>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm min-w-[640px]">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left">User</th>
                <th class="px-5 py-3.5 text-center">Action</th>
                <th class="px-5 py-3.5 text-left">Description</th>
                <th class="px-5 py-3.5 text-left hidden lg:table-cell">Subject</th>
                <th class="px-5 py-3.5 text-right hidden md:table-cell">IP</th>
                <th class="px-5 py-3.5 text-right">Time</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($logs as $log)
                <tr class="hover:bg-slate-800/40 transition">
                    <td class="px-5 py-3.5">
                        @if($log->user)
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-brand-green/20 flex items-center justify-center flex-shrink-0 text-brand-green text-xs font-bold">
                                    {{ strtoupper(substr($log->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-slate-200 text-xs font-medium">{{ $log->user->name }}</p>
                                </div>
                            </div>
                        @else
                            <span class="text-slate-600 text-xs">—</span>
                        @endif
                    </td>
                    <td class="px-5 py-3.5 text-center">
                        <span class="px-2 py-0.5 text-[10px] font-semibold rounded-full {{ $log->actionBadge() }}">
                            {{ $log->action }}
                        </span>
                    </td>
                    <td class="px-5 py-3.5 text-slate-300 text-xs">{{ $log->description }}</td>
                    <td class="px-5 py-3.5 hidden lg:table-cell">
                        @if($log->subject_type)
                            <span class="text-xs text-slate-500">{{ $log->subject_type }}{{ $log->subject_id ? ' #'.$log->subject_id : '' }}</span>
                        @else
                            <span class="text-slate-700">—</span>
                        @endif
                    </td>
                    <td class="px-5 py-3.5 text-right text-slate-500 text-xs hidden md:table-cell font-mono">
                        {{ $log->ip_address }}
                    </td>
                    <td class="px-5 py-3.5 text-right text-slate-500 text-xs">
                        <span title="{{ $log->created_at->format('Y-m-d H:i:s') }}">
                            {{ $log->created_at->diffForHumans() }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-5 py-10 text-center text-slate-500">No activity logs found.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>{{-- /overflow-x-auto --}}
    @if($logs->hasPages())
        <div class="px-5 py-4 border-t border-slate-800">{{ $logs->links() }}</div>
    @endif
</div>
@endsection
