@extends('admin.layouts.app')
@section('title', 'Contact Messages')

@section('content')

{{-- Filters --}}
<form method="GET" class="flex flex-wrap gap-3 mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, subject…"
           class="flex-1 min-w-0 bg-slate-900 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm
                  focus:outline-none focus:border-brand-green transition placeholder-slate-500">
    <select name="is_read"
            class="bg-slate-900 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-brand-green transition">
        <option value="">All Messages</option>
        <option value="0" {{ request('is_read') === '0' ? 'selected' : '' }}>Unread</option>
        <option value="1" {{ request('is_read') === '1' ? 'selected' : '' }}>Read</option>
    </select>
    <button type="submit" class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
        Filter
    </button>
    @if(request()->hasAny(['search','is_read']))
        <a href="{{ route('admin.contact-messages.index') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm rounded-lg transition">
            Clear
        </a>
    @endif
</form>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm min-w-[560px]">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left">Sender</th>
                <th class="px-5 py-3.5 text-left hidden md:table-cell">Subject</th>
                <th class="px-5 py-3.5 text-center">Status</th>
                <th class="px-5 py-3.5 text-right hidden sm:table-cell">Date</th>
                <th class="px-5 py-3.5 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($messages as $msg)
                <tr class="hover:bg-slate-800/40 transition {{ !$msg->is_read ? 'bg-brand-green/5' : '' }}">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-2">
                            @if(!$msg->is_read)
                                <span class="w-2 h-2 rounded-full bg-brand-green flex-shrink-0"></span>
                            @endif
                            <div class="{{ !$msg->is_read ? '' : 'pl-4' }}">
                                <p class="font-medium text-slate-200">{{ $msg->name }}</p>
                                <p class="text-xs text-slate-500">{{ $msg->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell text-slate-400">{{ Str::limit($msg->subject, 40) }}</td>
                    <td class="px-5 py-4 text-center">
                        @if($msg->is_read)
                            <span class="px-2 py-0.5 text-[10px] rounded-full bg-slate-700 text-slate-400">Read</span>
                        @else
                            <span class="px-2 py-0.5 text-[10px] rounded-full bg-brand-green/15 text-brand-green font-semibold">New</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-right text-slate-500 text-xs hidden sm:table-cell">
                        {{ $msg->created_at->format('d M Y') }}
                    </td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.contact-messages.show', $msg) }}"
                               class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">
                                View
                            </a>
                            <form method="POST" action="{{ route('admin.contact-messages.destroy', $msg) }}"
                                  onsubmit="return confirm('Delete this message?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-5 py-10 text-center text-slate-500">No messages found.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>{{-- /overflow-x-auto --}}
    @if($messages->hasPages())
        <div class="px-5 py-4 border-t border-slate-800">{{ $messages->links() }}</div>
    @endif
</div>
@endsection
