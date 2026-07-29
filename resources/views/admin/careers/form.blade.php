@extends('admin.layouts.app')
@section('title', $career->exists ? 'Edit Job Posting' : 'Add Job Posting')

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.careers.index') }}"
       class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> Back to Careers
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST"
              action="{{ $career->exists ? route('admin.careers.update', $career) : route('admin.careers.store') }}"
              class="space-y-5" id="career-form">
            @csrf
            @if($career->exists) @method('PUT') @endif

            @if($errors->any())
                <div class="p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm space-y-1">
                    @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
                </div>
            @endif

            {{-- Titles --}}
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Job Title (English) *</label>
                    <input type="text" name="title" value="{{ old('title', $career->title ?? '') }}" required class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Job Title (Khmer) *</label>
                    <input type="text" name="title_km" value="{{ old('title_km', $career->title_km ?? '') }}" required class="admin-input">
                </div>
            </div>

            {{-- Department + Location --}}
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Department (English)</label>
                    <input type="text" name="department" value="{{ old('department', $career->department ?? '') }}" placeholder="e.g. Engineering" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Department (Khmer)</label>
                    <input type="text" name="department_km" value="{{ old('department_km', $career->department_km ?? '') }}" class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Location (English)</label>
                    <input type="text" name="location" value="{{ old('location', $career->location ?? '') }}" placeholder="e.g. Phnom Penh" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Location (Khmer)</label>
                    <input type="text" name="location_km" value="{{ old('location_km', $career->location_km ?? '') }}" class="admin-input">
                </div>
            </div>

            {{-- Type + Deadline + Sort + Active --}}
            <div class="grid md:grid-cols-4 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Employment Type *</label>
                    <select name="type" class="admin-input">
                        @foreach(['full-time' => 'Full-Time', 'part-time' => 'Part-Time', 'contract' => 'Contract', 'internship' => 'Internship'] as $val => $lbl)
                            <option value="{{ $val }}" {{ old('type', $career->type ?? 'full-time') === $val ? 'selected' : '' }}>{{ $lbl }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Application Deadline</label>
                    <input type="date" name="deadline"
                           value="{{ old('deadline', $career->deadline?->format('Y-m-d') ?? '') }}"
                           class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $career->sort_order ?? 0) }}" class="admin-input">
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $career->is_active ?? true) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-brand-green focus:ring-brand-green">
                        <span class="text-sm text-slate-300">Active</span>
                    </label>
                </div>
            </div>

            {{-- Description (tabbed EN / KM) --}}
            <div x-data="{ tab: 'en' }" class="border border-slate-800 rounded-xl overflow-hidden">
                <div class="flex items-center justify-between bg-slate-800/50 px-4 py-2.5 border-b border-slate-800">
                    <span class="text-xs font-semibold text-slate-300 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-align-left text-brand-green"></i> Job Description
                    </span>
                    <div class="flex rounded-lg overflow-hidden border border-slate-700 text-xs">
                        <button type="button" @click="tab='en'"
                                :class="tab==='en' ? 'bg-brand-green text-white' : 'text-slate-400 hover:text-slate-200'"
                                class="px-3 py-1.5 font-medium transition">EN</button>
                        <button type="button" @click="tab='km'"
                                :class="tab==='km' ? 'bg-brand-green text-white' : 'text-slate-400 hover:text-slate-200'"
                                class="px-3 py-1.5 font-medium transition border-l border-slate-700">KM</button>
                    </div>
                </div>
                <div class="p-4">
                    <div x-show="tab==='en'">
                        <div id="editor-description" class="quill-editor"></div>
                        <textarea name="description" id="input-description" class="hidden">{{ old('description', $career->description ?? '') }}</textarea>
                    </div>
                    <div x-show="tab==='km'">
                        <div id="editor-description_km" class="quill-editor"></div>
                        <textarea name="description_km" id="input-description_km" class="hidden">{{ old('description_km', $career->description_km ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Requirements (tabbed EN / KM) --}}
            <div x-data="{ tab: 'en' }" class="border border-slate-800 rounded-xl overflow-hidden">
                <div class="flex items-center justify-between bg-slate-800/50 px-4 py-2.5 border-b border-slate-800">
                    <span class="text-xs font-semibold text-slate-300 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-brand-orange"></i> Requirements
                    </span>
                    <div class="flex rounded-lg overflow-hidden border border-slate-700 text-xs">
                        <button type="button" @click="tab='en'"
                                :class="tab==='en' ? 'bg-brand-green text-white' : 'text-slate-400 hover:text-slate-200'"
                                class="px-3 py-1.5 font-medium transition">EN</button>
                        <button type="button" @click="tab='km'"
                                :class="tab==='km' ? 'bg-brand-green text-white' : 'text-slate-400 hover:text-slate-200'"
                                class="px-3 py-1.5 font-medium transition border-l border-slate-700">KM</button>
                    </div>
                </div>
                <div class="p-4">
                    <div x-show="tab==='en'">
                        <div id="editor-requirements" class="quill-editor"></div>
                        <textarea name="requirements" id="input-requirements" class="hidden">{{ old('requirements', $career->requirements ?? '') }}</textarea>
                    </div>
                    <div x-show="tab==='km'">
                        <div id="editor-requirements_km" class="quill-editor"></div>
                        <textarea name="requirements_km" id="input-requirements_km" class="hidden">{{ old('requirements_km', $career->requirements_km ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.careers.index') }}"
                   class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">Cancel</a>
                <button type="submit"
                        class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $career->exists ? 'Update Job' : 'Create Job' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
@include('admin.partials.quill-editor', [
    'formId'  => 'career-form',
    'editors' => [
        ['editorId' => 'editor-description',    'inputId' => 'input-description'],
        ['editorId' => 'editor-description_km', 'inputId' => 'input-description_km'],
        ['editorId' => 'editor-requirements',   'inputId' => 'input-requirements'],
        ['editorId' => 'editor-requirements_km','inputId' => 'input-requirements_km'],
    ],
])
@endpush
