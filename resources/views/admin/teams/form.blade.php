@extends('admin.layouts.app')
@section('title', $member->exists ? 'Edit Member' : 'Add Member')

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.teams.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Team
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST"
              action="{{ $member->exists ? route('admin.teams.update', $member) : route('admin.teams.store') }}"
              enctype="multipart/form-data"
              class="space-y-5">
            @csrf
            @if($member->exists) @method('PUT') @endif

            @if($errors->any())
                <div class="p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm space-y-1">
                    @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
                </div>
            @endif

            {{-- Photo --}}
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5">Photo</label>
                @if($member->exists && $member->photo)
                    <img src="{{ Storage::url($member->photo) }}" class="w-20 h-20 rounded-xl object-cover mb-2">
                @endif
                <input type="file" name="photo" accept="image/*"
                       class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg
                              file:border-0 file:text-sm file:font-semibold file:bg-slate-700 file:text-slate-200
                              hover:file:bg-slate-600 file:transition">
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Name (English) *</label>
                    <input type="text" name="name_en" value="{{ old('name_en', $member->name_en ?? '') }}" required class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Name (Khmer) *</label>
                    <input type="text" name="name_km" value="{{ old('name_km', $member->name_km ?? '') }}" required class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Position (English)</label>
                    <input type="text" name="position_en" value="{{ old('position_en', $member->position_en ?? '') }}" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Position (Khmer)</label>
                    <input type="text" name="position_km" value="{{ old('position_km', $member->position_km ?? '') }}" class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $member->phone ?? '') }}" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email', $member->email ?? '') }}" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Telegram</label>
                    <input type="text" name="telegram" value="{{ old('telegram', $member->telegram ?? '') }}" class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $member->sort_order ?? 0) }}" class="admin-input">
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_ceo" value="1"
                               {{ old('is_ceo', $member->is_ceo ?? false) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-brand-orange focus:ring-brand-orange">
                        <span class="text-sm text-slate-300">CEO / Director</span>
                    </label>
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-brand-green focus:ring-brand-green">
                        <span class="text-sm text-slate-300">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.teams.index') }}"
                   class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $member->exists ? 'Update Member' : 'Add Member' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
