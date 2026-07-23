@extends('admin.layouts.app')
@section('title', 'Permissions')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-slate-400">{{ $permissions->total() }} permissions total</p>
    <a href="{{ route('admin.permissions.create') }}"
       class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Add Permission
    </a>
</div>

{{-- Search --}}
<form method="GET" class="flex flex-wrap gap-3 mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search permissions…"
           class="flex-1 min-w-0 bg-slate-900 border border-slate-700 text-slate-100 rounded-lg px-4 py-2 text-sm
                  focus:outline-none focus:border-brand-green transition placeholder-slate-500">
    <button type="submit" class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
        Search
    </button>
    @if(request('search'))
        <a href="{{ route('admin.permissions.index') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm rounded-lg transition">Clear</a>
    @endif
</form>

{{-- Grouped list --}}
@php
    $grouped = $permissions->getCollection()->groupBy(fn($p) => trim(preg_replace('/^(view|manage)\s+/', '', $p->name)));
@endphp

@if($grouped->count())
    <div class="space-y-4 mb-6">
        @foreach($grouped as $resource => $perms)
            <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
                <div class="px-5 py-3 border-b border-slate-800 bg-slate-800/40">
                    <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider capitalize">{{ $resource }}</h3>
                </div>
                <div class="divide-y divide-slate-800">
                    @foreach($perms as $perm)
                        <div class="flex items-center gap-4 px-5 py-3.5">
                            {{-- Icon --}}
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0
                                {{ str_starts_with($perm->name, 'manage') ? 'bg-brand-green/15' : 'bg-slate-800' }}">
                                <i class="fa-solid {{ str_starts_with($perm->name, 'manage') ? 'fa-shield-halved text-brand-green' : 'fa-eye text-slate-500' }} text-xs"></i>
                            </div>

                            {{-- Name --}}
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-slate-200">{{ $perm->name }}</p>
                                <p class="text-xs text-slate-500 mt-0.5">
                                    Used by {{ $perm->roles_count }} role{{ $perm->roles_count !== 1 ? 's' : '' }}
                                </p>
                            </div>

                            {{-- Badge --}}
                            <span class="px-2 py-0.5 text-[10px] font-semibold rounded-full flex-shrink-0
                                {{ str_starts_with($perm->name, 'manage') ? 'bg-brand-green/15 text-brand-green' : 'bg-slate-800 text-slate-400' }}">
                                {{ str_starts_with($perm->name, 'manage') ? 'write' : 'read' }}
                            </span>

                            {{-- Actions --}}
                            <div class="flex items-center gap-2 flex-shrink-0">
                                <a href="{{ route('admin.permissions.edit', $perm) }}"
                                   class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.permissions.destroy', $perm) }}"
                                      onsubmit="return confirm('Delete permission \'{{ addslashes($perm->name) }}\'?\nThis will remove it from all roles.')">
                                    @csrf @method('DELETE')
                                    <button class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-slate-900 border border-slate-800 rounded-2xl px-5 py-12 text-center text-slate-500">
        No permissions found.
    </div>
@endif

@if($permissions->hasPages())
    <div class="mt-2">{{ $permissions->links() }}</div>
@endif
@endsection
