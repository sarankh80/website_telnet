@extends('admin.layouts.app')
@section('title', $subscriber->exists ? 'Edit Subscriber' : 'Add Corporate Subscriber')

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.corporate-subscribers.index') }}"
       class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Subscribers
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST"
              action="{{ $subscriber->exists
                  ? route('admin.corporate-subscribers.update', $subscriber)
                  : route('admin.corporate-subscribers.store') }}"
              enctype="multipart/form-data"
              class="space-y-5" id="corp-sub-form">
            @csrf
            @if($subscriber->exists) @method('PUT') @endif

            @if($errors->any())
                <div class="p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm space-y-1">
                    @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
                </div>
            @endif

            {{-- Company names --}}
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Company Name (English) *</label>
                    <input type="text" name="company_name"
                           value="{{ old('company_name', $subscriber->company_name ?? '') }}"
                           required class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Company Name (Khmer) *</label>
                    <input type="text" name="company_name_km"
                           value="{{ old('company_name_km', $subscriber->company_name_km ?? '') }}"
                           required class="admin-input">
                </div>
            </div>

            {{-- Logo --}}
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5">Company Logo</label>
                @if($subscriber->exists && $subscriber->logo)
                    <div class="mb-2 flex items-center gap-3">
                        <img src="{{ Storage::url($subscriber->logo) }}" alt="Logo"
                             class="h-14 max-w-[120px] object-contain rounded-lg border border-slate-700 bg-white/5 p-1">
                        <span class="text-xs text-slate-500">Current logo — upload a new one to replace</span>
                    </div>
                @endif
                <input type="file" name="logo" accept="image/*"
                       class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg
                              file:border-0 file:text-sm file:font-semibold file:bg-slate-700 file:text-slate-200
                              hover:file:bg-slate-600 file:transition">
                <p class="mt-1 text-xs text-slate-600">PNG, JPG, SVG — max 2 MB. Transparent PNG recommended.</p>
            </div>

            {{-- Industry --}}
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Industry (English)</label>
                    <input type="text" name="industry"
                           value="{{ old('industry', $subscriber->industry ?? '') }}"
                           placeholder="e.g. Banking & Finance" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Industry (Khmer)</label>
                    <input type="text" name="industry_km"
                           value="{{ old('industry_km', $subscriber->industry_km ?? '') }}"
                           class="admin-input">
                </div>
            </div>

            {{-- Contact --}}
            <div class="grid md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Contact Person</label>
                    <input type="text" name="contact_person"
                           value="{{ old('contact_person', $subscriber->contact_person ?? '') }}"
                           class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Contact Email</label>
                    <input type="email" name="contact_email"
                           value="{{ old('contact_email', $subscriber->contact_email ?? '') }}"
                           class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Phone</label>
                    <input type="text" name="contact_phone"
                           value="{{ old('contact_phone', $subscriber->contact_phone ?? '') }}"
                           placeholder="+855 ..." class="admin-input">
                </div>
            </div>

            {{-- Website --}}
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5">Website URL</label>
                <input type="url" name="website"
                       value="{{ old('website', $subscriber->website ?? '') }}"
                       placeholder="https://example.com" class="admin-input">
            </div>

            {{-- Description --}}
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
                        <div id="editor-description" class="quill-editor"></div>
                        <textarea name="description" id="input-description" class="hidden">{{ old('description', $subscriber->description ?? '') }}</textarea>
                    </div>
                    <div x-show="tab==='km'">
                        <div id="editor-description_km" class="quill-editor"></div>
                        <textarea name="description_km" id="input-description_km" class="hidden">{{ old('description_km', $subscriber->description_km ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Status + order --}}
            <div class="grid md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order"
                           value="{{ old('sort_order', $subscriber->sort_order ?? 0) }}"
                           class="admin-input">
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $subscriber->is_active ?? true) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-brand-green focus:ring-brand-green">
                        <span class="text-sm text-slate-300">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.corporate-subscribers.index') }}"
                   class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $subscriber->exists ? 'Update Subscriber' : 'Add Subscriber' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
@include('admin.partials.quill-editor', [
    'formId'  => 'corp-sub-form',
    'editors' => [
        ['editorId' => 'editor-description',    'inputId' => 'input-description'],
        ['editorId' => 'editor-description_km', 'inputId' => 'input-description_km'],
    ],
])
@endpush
