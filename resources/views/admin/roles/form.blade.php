@extends('admin.layouts.app')
@section('title', $role->exists ? 'Edit Role' : 'Add Role')

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.roles.index') }}" class="inline-flex items-center gap-1.5 text-sm text-slate-400 hover:text-slate-200 transition mb-6">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Roles
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <h2 class="text-base font-bold text-slate-100 mb-6">
            {{ $role->exists ? 'Edit Role: ' . $role->name : 'Create New Role' }}
        </h2>

        <form method="POST"
              action="{{ $role->exists ? route('admin.roles.update', $role) : route('admin.roles.store') }}">
            @csrf
            @if($role->exists) @method('PUT') @endif

            @if($errors->any())
                <div class="mb-5 p-4 bg-red-500/10 border border-red-500/30 rounded-xl text-sm text-red-400">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                    </ul>
                </div>
            @endif

            {{-- Role Name --}}
            <div class="mb-6">
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Role Name</label>
                <input type="text" name="name" value="{{ old('name', $role->name) }}" required
                       {{ $role->exists && in_array($role->name, ['super-admin','admin']) ? 'readonly' : '' }}
                       class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2.5 text-sm
                              focus:outline-none focus:border-brand-green transition placeholder-slate-500
                              {{ $role->exists && in_array($role->name, ['super-admin','admin']) ? 'opacity-60 cursor-not-allowed' : '' }}"
                       placeholder="e.g. editor">
                @if($role->exists && in_array($role->name, ['super-admin','admin']))
                    <p class="text-xs text-slate-500 mt-1.5">System roles cannot be renamed.</p>
                @endif
            </div>

            {{-- Permissions --}}
            <div class="mb-6">
                <div class="flex items-center justify-between mb-3">
                    <label class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Permissions</label>
                    <button type="button" id="toggleAll"
                            class="text-xs text-brand-green hover:text-[#7ab534] transition">
                        Toggle All
                    </button>
                </div>

                <div class="space-y-3">
                    @foreach($permissions as $resource => $perms)
                        <div class="bg-slate-800/50 border border-slate-700/50 rounded-xl p-4">
                            <p class="text-xs font-semibold text-slate-300 uppercase tracking-wider mb-3 capitalize">
                                {{ $resource }}
                            </p>
                            <div class="flex flex-wrap gap-3">
                                @foreach($perms as $perm)
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input type="checkbox" name="permissions[]" value="{{ $perm->name }}"
                                               class="perm-checkbox w-4 h-4 accent-[#8dc63f] rounded cursor-pointer"
                                               {{ in_array($perm->name, $rolePermissions ?? []) || old('permissions') && in_array($perm->name, (array)old('permissions')) ? 'checked' : '' }}>
                                        <span class="text-sm text-slate-300 group-hover:text-slate-100 transition
                                            {{ str_starts_with($perm->name, 'manage') ? 'font-medium' : '' }}">
                                            {{ $perm->name }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center gap-3 pt-5 border-t border-slate-800">
                <button type="submit"
                        class="px-6 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $role->exists ? 'Update Role' : 'Create Role' }}
                </button>
                <a href="{{ route('admin.roles.index') }}"
                   class="px-6 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm rounded-lg transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('toggleAll').addEventListener('click', function () {
    const boxes = document.querySelectorAll('.perm-checkbox');
    const anyUnchecked = [...boxes].some(b => !b.checked);
    boxes.forEach(b => b.checked = anyUnchecked);
});
</script>
@endsection
