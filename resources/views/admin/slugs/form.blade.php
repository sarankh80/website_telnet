@extends('admin.layouts.app')
@section('title', $slug->exists ? 'Edit Category' : 'Add Category')

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.slugs.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Categories
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST"
              action="{{ $slug->exists ? route('admin.slugs.update', $slug) : route('admin.slugs.store') }}"
              enctype="multipart/form-data"
              class="space-y-5" id="slug-form">
            @csrf
            @if($slug->exists) @method('PUT') @endif

            @if($errors->any())
                <div class="p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm space-y-1">
                    @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
                </div>
            @endif

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Name (English) *</label>
                    <input type="text" name="name" value="{{ old('name', $slug->name ?? '') }}" required class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Name (Khmer) *</label>
                    <input type="text" name="name_km" value="{{ old('name_km', $slug->name_km ?? '') }}" required class="admin-input">
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
                        <textarea name="desc" id="input-desc" class="hidden">{{ old('desc', $slug->desc ?? '') }}</textarea>
                    </div>
                    <div x-show="tab==='km'">
                        <div id="editor-desc_km" class="quill-editor"></div>
                        <textarea name="desc_km" id="input-desc_km" class="hidden">{{ old('desc_km', $slug->desc_km ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5">Image</label>
                @if($slug->exists && $slug->image)
                    <div class="mb-2 flex items-center gap-3">
                        <img src="{{ Storage::url($slug->image) }}" alt=""
                             class="w-24 h-16 object-cover rounded-lg border border-slate-700">
                        <span class="text-xs text-slate-500">Upload a new one to replace</span>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                       class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg
                              file:border-0 file:text-sm file:font-semibold file:bg-slate-700 file:text-slate-200
                              hover:file:bg-slate-600 file:transition">
                <p class="mt-1 text-xs text-slate-600">PNG, JPG, WebP — max 2 MB.</p>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.slugs.index') }}"
                   class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">Cancel</a>
                <button type="submit"
                        class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $slug->exists ? 'Update Category' : 'Create Category' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
@include('admin.partials.quill-editor', [
    'formId'  => 'slug-form',
    'editors' => [
        ['editorId' => 'editor-desc',    'inputId' => 'input-desc'],
        ['editorId' => 'editor-desc_km', 'inputId' => 'input-desc_km'],
    ],
])
@endpush
