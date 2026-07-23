@extends('admin.layouts.app')
@section('title', $permission->exists ? 'Edit Permission' : 'Add Permission')

@section('content')
<div class="max-w-lg">
    <a href="{{ route('admin.permissions.index') }}" class="inline-flex items-center gap-1.5 text-sm text-slate-400 hover:text-slate-200 transition mb-6">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Permissions
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <h2 class="text-base font-bold text-slate-100 mb-6">
            {{ $permission->exists ? 'Edit Permission' : 'Add New Permission' }}
        </h2>

        <form method="POST"
              action="{{ $permission->exists ? route('admin.permissions.update', $permission) : route('admin.permissions.store') }}">
            @csrf
            @if($permission->exists) @method('PUT') @endif

            @if($errors->any())
                <div class="mb-5 p-4 bg-red-500/10 border border-red-500/30 rounded-xl text-sm text-red-400">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-4">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Permission Name</label>
                <input type="text" name="name" value="{{ old('name', $permission->name) }}" required autofocus
                       class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2.5 text-sm
                              focus:outline-none focus:border-brand-green transition placeholder-slate-500"
                       placeholder="e.g. manage reports">
                <p class="text-xs text-slate-500 mt-2">
                    Convention: <span class="text-slate-400 font-mono">view &lt;resource&gt;</span> for read-only,
                    <span class="text-slate-400 font-mono">manage &lt;resource&gt;</span> for full access.
                </p>
            </div>

            {{-- Quick-fill suggestions --}}
            @if(!$permission->exists)
                <div class="mb-6">
                    <p class="text-xs text-slate-500 mb-2">Quick fill:</p>
                    <div class="flex flex-wrap gap-2" id="suggestions">
                        @foreach(['view reports','manage reports','view analytics','manage analytics','view logs','export data'] as $s)
                            <button type="button"
                                    onclick="document.querySelector('[name=name]').value='{{ $s }}'"
                                    class="px-2.5 py-1 text-xs bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-slate-200 rounded-lg transition border border-slate-700">
                                {{ $s }}
                            </button>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="flex items-center gap-3 pt-5 border-t border-slate-800">
                <button type="submit"
                        class="px-6 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $permission->exists ? 'Update Permission' : 'Create Permission' }}
                </button>
                <a href="{{ route('admin.permissions.index') }}"
                   class="px-6 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm rounded-lg transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    @if($permission->exists && $permission->roles->count())
        <div class="mt-4 bg-slate-900 border border-slate-800 rounded-2xl p-5">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Assigned to Roles</p>
            <div class="flex flex-wrap gap-2">
                @foreach($permission->roles as $r)
                    <span class="px-3 py-1 text-xs rounded-full
                        {{ $r->name === 'super-admin' ? 'bg-brand-orange/15 text-brand-orange' : 'bg-brand-green/15 text-brand-green' }}">
                        {{ $r->name }}
                    </span>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
