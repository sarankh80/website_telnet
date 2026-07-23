@extends('admin.layouts.app')
@section('title', $service->exists ? 'Edit Service' : 'Add Service')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Services
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST"
              action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}"
              class="space-y-5">
            @csrf
            @if($service->exists) @method('PUT') @endif

            @if($errors->any())
                <div class="p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm space-y-1">
                    @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
                </div>
            @endif

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Name (English) *</label>
                    <input type="text" name="name_en" value="{{ old('name_en', $service->name_en ?? '') }}" required
                           class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Name (Khmer) *</label>
                    <input type="text" name="name_km" value="{{ old('name_km', $service->name_km ?? '') }}" required
                           class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Description (English)</label>
                    <textarea name="description_en" rows="4" class="admin-input resize-none">{{ old('description_en', $service->description_en ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Description (Khmer)</label>
                    <textarea name="description_km" rows="4" class="admin-input resize-none">{{ old('description_km', $service->description_km ?? '') }}</textarea>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Icon (FontAwesome class)</label>
                    <input type="text" name="icon" value="{{ old('icon', $service->icon ?? 'fa-wifi') }}"
                           placeholder="fa-wifi" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Badge (EN)</label>
                    <input type="text" name="badge_en" value="{{ old('badge_en', $service->badge_en ?? '') }}" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Badge (KM)</label>
                    <input type="text" name="badge_km" value="{{ old('badge_km', $service->badge_km ?? '') }}" class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Accent Color</label>
                    <select name="color" class="admin-input">
                        <option value="green"  {{ old('color', $service->color ?? 'green') === 'green'  ? 'selected' : '' }}>Green</option>
                        <option value="orange" {{ old('color', $service->color ?? 'green') === 'orange' ? 'selected' : '' }}>Orange</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}" class="admin-input">
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-brand-green focus:ring-brand-green">
                        <span class="text-sm text-slate-300">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.services.index') }}"
                   class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $service->exists ? 'Update Service' : 'Create Service' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
