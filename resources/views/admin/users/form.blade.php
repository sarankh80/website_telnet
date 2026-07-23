@extends('admin.layouts.app')
@section('title', $user->exists ? 'Edit User' : 'Add User')

@section('content')
<div class="max-w-xl">
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-1.5 text-sm text-slate-400 hover:text-slate-200 transition mb-6">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Users
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <h2 class="text-base font-bold text-slate-100 mb-6">
            {{ $user->exists ? 'Edit ' . $user->name : 'Add New User' }}
        </h2>

        <form method="POST"
              action="{{ $user->exists ? route('admin.users.update', $user) : route('admin.users.store') }}">
            @csrf
            @if($user->exists) @method('PUT') @endif

            @if($errors->any())
                <div class="mb-5 p-4 bg-red-500/10 border border-red-500/30 rounded-xl text-sm text-red-400">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-4">
                {{-- Name --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2.5 text-sm
                                  focus:outline-none focus:border-brand-green transition placeholder-slate-500"
                           placeholder="John Doe">
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                           class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2.5 text-sm
                                  focus:outline-none focus:border-brand-green transition placeholder-slate-500"
                           placeholder="user@telnet.com.kh">
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">
                        Password {{ $user->exists ? '(leave blank to keep current)' : '' }}
                    </label>
                    <input type="password" name="password" {{ !$user->exists ? 'required' : '' }}
                           class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2.5 text-sm
                                  focus:outline-none focus:border-brand-green transition placeholder-slate-500"
                           placeholder="Min 8 characters">
                </div>

                {{-- Password Confirm --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Confirm Password</label>
                    <input type="password" name="password_confirmation" {{ !$user->exists ? 'required' : '' }}
                           class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2.5 text-sm
                                  focus:outline-none focus:border-brand-green transition placeholder-slate-500"
                           placeholder="Repeat password">
                </div>

                {{-- Role --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1.5">Role</label>
                    <select name="role" required
                            class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2.5 text-sm
                                   focus:outline-none focus:border-brand-green transition">
                        <option value="">Select a role…</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}"
                                {{ old('role', $user->exists ? $user->roles->first()?->name : '') === $role->name ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Active --}}
                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl border border-slate-700">
                    <div>
                        <p class="text-sm font-medium text-slate-200">Active</p>
                        <p class="text-xs text-slate-500 mt-0.5">Inactive users cannot log in</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                               {{ old('is_active', $user->exists ? $user->is_active : true) ? 'checked' : '' }}>
                        <div class="w-10 h-5 bg-slate-600 peer-focus:outline-none rounded-full peer
                                    peer-checked:after:translate-x-5 peer-checked:bg-brand-green
                                    after:content-[''] after:absolute after:top-0.5 after:left-0.5
                                    after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-6 pt-6 border-t border-slate-800">
                <button type="submit"
                        class="px-6 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $user->exists ? 'Update User' : 'Create User' }}
                </button>
                <a href="{{ route('admin.users.index') }}"
                   class="px-6 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm rounded-lg transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
