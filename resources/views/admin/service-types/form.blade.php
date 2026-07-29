@extends('admin.layouts.app')
@section('title', $serviceType->exists ? 'Edit Service Type' : 'Add Service Type')

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.service-types.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Service Types
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST"
              action="{{ $serviceType->exists ? route('admin.service-types.update', $serviceType) : route('admin.service-types.store') }}"
              class="space-y-5" id="stype-form">
            @csrf
            @if($serviceType->exists) @method('PUT') @endif

            @if($errors->any())
                <div class="p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm space-y-1">
                    @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
                </div>
            @endif

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5">Slug Category *</label>
                <select name="slug_id" required class="admin-input">
                    <option value="">— Select Category —</option>
                    @foreach($slugs as $slug)
                        <option value="{{ $slug->id }}"
                            {{ old('slug_id', $serviceType->slug_id ?? '') == $slug->id ? 'selected' : '' }}>
                            {{ $slug->name }} / {{ $slug->name_km }}
                        </option>
                    @endforeach
                </select>
                @if($slugs->isEmpty())
                    <p class="mt-1 text-xs text-brand-orange">
                        <i class="fa-solid fa-triangle-exclamation mr-1"></i>
                        No slug categories yet — <a href="{{ route('admin.slugs.create') }}" class="underline">create one first</a>.
                    </p>
                @endif
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Name (English) *</label>
                    <input type="text" name="name" value="{{ old('name', $serviceType->name ?? '') }}" required class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Name (Khmer) *</label>
                    <input type="text" name="name_km" value="{{ old('name_km', $serviceType->name_km ?? '') }}" required class="admin-input">
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
                        <div id="editor-desc" class="quill-editor"></div>
                        <textarea name="desc" id="input-desc" class="hidden">{{ old('desc', $serviceType->desc ?? '') }}</textarea>
                    </div>
                    <div x-show="tab==='km'">
                        <div id="editor-desc_km" class="quill-editor"></div>
                        <textarea name="desc_km" id="input-desc_km" class="hidden">{{ old('desc_km', $serviceType->desc_km ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.service-types.index') }}"
                   class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">Cancel</a>
                <button type="submit"
                        class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $serviceType->exists ? 'Update Type' : 'Create Type' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
@include('admin.partials.quill-editor', [
    'formId'  => 'stype-form',
    'editors' => [
        ['editorId' => 'editor-desc',    'inputId' => 'input-desc'],
        ['editorId' => 'editor-desc_km', 'inputId' => 'input-desc_km'],
    ],
])
@endpush
