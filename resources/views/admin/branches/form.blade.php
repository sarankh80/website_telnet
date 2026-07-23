@extends('admin.layouts.app')
@section('title', $branch->exists ? 'Edit Branch' : 'Add Branch')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.branches.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Branches
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST"
              action="{{ $branch->exists ? route('admin.branches.update', $branch) : route('admin.branches.store') }}"
              class="space-y-5">
            @csrf
            @if($branch->exists) @method('PUT') @endif

            @if($errors->any())
                <div class="p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm space-y-1">
                    @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
                </div>
            @endif

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Name (English) *</label>
                    <input type="text" name="name_en" value="{{ old('name_en', $branch->name_en ?? '') }}" required class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Name (Khmer) *</label>
                    <input type="text" name="name_km" value="{{ old('name_km', $branch->name_km ?? '') }}" required class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Address (English)</label>
                    <textarea name="address_en" rows="3" class="admin-input resize-none">{{ old('address_en', $branch->address_en ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Address (Khmer)</label>
                    <textarea name="address_km" rows="3" class="admin-input resize-none">{{ old('address_km', $branch->address_km ?? '') }}</textarea>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Province (English)</label>
                    <input type="text" name="province_en" value="{{ old('province_en', $branch->province_en ?? '') }}" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Province (Khmer)</label>
                    <input type="text" name="province_km" value="{{ old('province_km', $branch->province_km ?? '') }}" class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $branch->phone ?? '') }}" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email', $branch->email ?? '') }}" class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Latitude</label>
                    <input type="text" name="lat" value="{{ old('lat', $branch->lat ?? '') }}" placeholder="11.5564" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Longitude</label>
                    <input type="text" name="lng" value="{{ old('lng', $branch->lng ?? '') }}" placeholder="104.9282" class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Type *</label>
                    <select name="type" class="admin-input">
                        <option value="branch" {{ old('type', $branch->type ?? '') === 'branch' ? 'selected' : '' }}>Branch</option>
                        <option value="hq"     {{ old('type', $branch->type ?? '') === 'hq'     ? 'selected' : '' }}>Headquarters</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $branch->sort_order ?? 0) }}" class="admin-input">
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $branch->is_active ?? true) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-brand-green focus:ring-brand-green">
                        <span class="text-sm text-slate-300">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.branches.index') }}"
                   class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $branch->exists ? 'Update Branch' : 'Create Branch' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
