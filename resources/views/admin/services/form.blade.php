@extends('admin.layouts.app')
@section('title', $service->exists ? 'Edit Service' : 'Add Service')

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Services
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST"
              action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}"
              enctype="multipart/form-data"
              class="space-y-5" id="service-form">
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

            <div x-data="{ tab: 'en' }" class="border border-slate-800 rounded-xl overflow-hidden">
                <div class="flex items-center justify-between bg-slate-800/50 px-4 py-2.5 border-b border-slate-800">
                    <span class="text-xs font-semibold text-slate-300 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-align-left text-brand-green"></i> Description
                    </span>
                    <div class="flex rounded-lg overflow-hidden border border-slate-700 text-xs">
                        <button type="button" @click="tab='en'" :class="tab==='en' ? 'bg-brand-green text-white' : 'text-slate-400 hover:text-slate-200'" class="px-3 py-1.5 font-medium transition">EN</button>
                        <button type="button" @click="tab='km'" :class="tab==='km' ? 'bg-brand-green text-white' : 'text-slate-400 hover:text-slate-200'" class="px-3 py-1.5 font-medium transition border-l border-slate-700">KM</button>
                    </div>
                </div>
                <div class="p-4">
                    <div x-show="tab==='en'">
                        <div id="editor-description_en" class="quill-editor"></div>
                        <textarea name="description_en" id="input-description_en" class="hidden">{{ old('description_en', $service->description_en ?? '') }}</textarea>
                    </div>
                    <div x-show="tab==='km'">
                        <div id="editor-description_km" class="quill-editor"></div>
                        <textarea name="description_km" id="input-description_km" class="hidden">{{ old('description_km', $service->description_km ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Image upload --}}
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5">Service Image</label>
                @if($service->exists && $service->image)
                    <div class="mb-2 flex items-center gap-3">
                        <img src="{{ Storage::url($service->image) }}" alt="Current image"
                             class="w-24 h-16 object-cover rounded-lg border border-slate-700">
                        <span class="text-xs text-slate-500">Current image — upload a new one to replace</span>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                       class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg
                              file:border-0 file:text-sm file:font-semibold file:bg-slate-700 file:text-slate-200
                              hover:file:bg-slate-600 file:transition">
                <p class="mt-1 text-xs text-slate-600">PNG, JPG, WebP — max 2 MB. Used as card thumbnail.</p>
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

            {{-- Slug + Service Type --}}
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Slug Category</label>
                    <select name="slug_id" class="admin-input">
                        <option value="">— None —</option>
                        @foreach($slugs as $s)
                            <option value="{{ $s->id }}"
                                {{ old('slug_id', $service->slug_id ?? '') == $s->id ? 'selected' : '' }}>
                                {{ $s->name }} / {{ $s->name_km }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Service Type</label>
                    <select name="service_type" class="admin-input">
                        <option value="">— None —</option>
                        @foreach($serviceTypes as $type)
                            <option value="{{ $type->id }}"
                                {{ old('service_type', $service->service_type ?? '') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}{{ $type->slug ? ' (' . $type->slug->name . ')' : '' }}
                            </option>
                        @endforeach
                    </select>
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

@push('scripts')
@include('admin.partials.quill-editor', [
    'formId'  => 'service-form',
    'editors' => [
        ['editorId' => 'editor-description_en', 'inputId' => 'input-description_en'],
        ['editorId' => 'editor-description_km', 'inputId' => 'input-description_km'],
    ],
])
@endpush
