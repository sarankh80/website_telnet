@extends('admin.layouts.app')
@section('title', 'Roles & Permissions')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-slate-400">{{ $roles->count() }} roles configured</p>
    <a href="{{ route('admin.roles.create') }}"
       class="px-4 py-2 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Add Role
    </a>
</div>

<div class="grid gap-4">
    @foreach($roles as $role)
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 flex flex-wrap items-center gap-4">
            {{-- Icon + Name --}}
            <div class="flex items-center gap-3 flex-1 min-w-[160px]">
                <div class="w-10 h-10 rounded-xl
                    {{ $role->name === 'super-admin' ? 'bg-brand-orange/15' : 'bg-brand-green/15' }}
                    flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-key text-sm {{ $role->name === 'super-admin' ? 'text-brand-orange' : 'text-brand-green' }}"></i>
                </div>
                <div>
                    <p class="font-semibold text-slate-100 capitalize">{{ $role->name }}</p>
                    <p class="text-xs text-slate-500 mt-0.5">
                        {{ $role->permissions_count }} permission{{ $role->permissions_count !== 1 ? 's' : '' }} &bull;
                        {{ $role->users_count }} user{{ $role->users_count !== 1 ? 's' : '' }}
                    </p>
                </div>
            </div>

            {{-- Permission pills --}}
            <div class="flex flex-wrap gap-1.5 flex-1">
                @foreach($role->permissions->sortBy('name') as $perm)
                    <span class="px-2 py-0.5 text-[10px] rounded-full
                        {{ str_starts_with($perm->name, 'manage') ? 'bg-brand-green/10 text-brand-green' : 'bg-slate-800 text-slate-400' }}">
                        {{ $perm->name }}
                    </span>
                @endforeach
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-2 flex-shrink-0">
                <a href="{{ route('admin.roles.edit', $role) }}"
                   class="px-3 py-1.5 text-xs bg-slate-700 hover:bg-slate-600 text-slate-200 rounded-lg transition">
                    Edit
                </a>
                @if(!in_array($role->name, ['super-admin', 'admin']))
                    <form method="POST" action="{{ route('admin.roles.destroy', $role) }}"
                          onsubmit="return confirm('Delete role \'{{ $role->name }}\'? Users with this role will lose access.')">
                        @csrf @method('DELETE')
                        <button class="px-3 py-1.5 text-xs bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg transition">
                            Delete
                        </button>
                    </form>
                @else
                    <span class="px-3 py-1.5 text-xs bg-slate-800 text-slate-600 rounded-lg cursor-not-allowed">
                        System
                    </span>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
