@extends('admin.layouts.app')
@section('title', __('admin.users.title'))

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-slate-400">{{ $users->total() }} {{ __('admin.users.title') }}</p>
    <a href="{{ route('admin.users.create') }}"
       class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> {{ __('admin.users.add') }}
    </a>
</div>

{{-- Filters --}}
<form method="GET" class="flex flex-wrap gap-3 mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or email…"
           class="flex-1 min-w-0 bg-slate-900 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm
                  focus:outline-none focus:border-brand-green transition placeholder-slate-500">
    <select name="role"
            class="bg-slate-900 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-brand-green transition">
        <option value="">{{ __('admin.users.all_roles') }}</option>
        @foreach($roles as $role)
            <option value="{{ $role }}" {{ request('role') === $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
        @endforeach
    </select>
    <button type="submit" class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
        {{ __('admin.btn.filter') }}
    </button>
    @if(request()->hasAny(['search','role']))
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm rounded-lg transition">{{ __('admin.btn.clear') }}</a>
    @endif
</form>

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
    <table class="w-full text-sm min-w-[640px]">
        <thead>
            <tr class="border-b border-slate-800 text-xs text-slate-400 uppercase tracking-wider">
                <th class="px-5 py-3.5 text-left">{{ __('admin.field.user') }}</th>
                <th class="px-5 py-3.5 text-left hidden md:table-cell">{{ __('admin.users.role') }}</th>
                <th class="px-5 py-3.5 text-center">{{ __('admin.field.status') }}</th>
                <th class="px-5 py-3.5 text-right hidden sm:table-cell">{{ __('admin.users.last_login') }}</th>
                <th class="px-5 py-3.5 text-right hidden sm:table-cell">{{ __('admin.users.joined') }}</th>
                <th class="px-5 py-3.5 text-right">{{ __('admin.field.actions') }}</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($users as $u)
                <tr class="hover:bg-slate-800/40 transition">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-brand-green/20 flex items-center justify-center flex-shrink-0 text-brand-green font-bold text-sm">
                                {{ strtoupper(substr($u->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-medium text-slate-200">{{ $u->name }}</p>
                                <p class="text-xs text-slate-500">{{ $u->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 hidden md:table-cell">
                        @foreach($u->roles as $r)
                            <span class="px-2 py-0.5 text-[10px] font-semibold rounded-full
                                {{ $r->name === 'super-admin' ? 'bg-brand-orange/15 text-brand-orange' : 'bg-sky-500/15 text-sky-400' }}">
                                {{ $r->name }}
                            </span>
                        @endforeach
                    </td>
                    <td class="px-5 py-4 text-center">
                        @if($u->is_active)
                            <span class="text-green-400"><i class="fa-solid fa-circle-check"></i></span>
                        @else
                            <span class="text-red-400"><i class="fa-solid fa-circle-xmark"></i></span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-right text-slate-500 text-xs hidden sm:table-cell">
                        {{ $u->last_login_at?->diffForHumans() ?? '—' }}
                    </td>
                    <td class="px-5 py-4 text-right text-slate-500 text-xs hidden sm:table-cell">
                        {{ $u->created_at->format('d M Y') }}
                    </td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.users.edit', $u) }}"
                               class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">
                                {{ __('admin.btn.edit') }}
                            </a>
                            @if($u->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.destroy', $u) }}"
                                      onsubmit="return confirm('{{ __('admin.btn.delete') }} {{ addslashes($u->name) }}?')">
                                    @csrf @method('DELETE')
                                    <button class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">
                                        {{ __('admin.btn.delete') }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-5 py-10 text-center text-slate-500">{{ __('admin.users.no_users') }}</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>{{-- /overflow-x-auto --}}
    @if($users->hasPages())
        <div class="px-5 py-4 border-t border-slate-800">{{ $users->links() }}</div>
    @endif
</div>
@endsection
