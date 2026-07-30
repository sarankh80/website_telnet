@extends('admin.layouts.app')
@section('title', $career->exists ? __('admin.careers.edit') : __('admin.careers.create'))

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.careers.index') }}"
       class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> {{ __('admin.btn.back') }}
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

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.careers.title_en') }} *</label>
                    <input type="text" name="title" value="{{ old('title', $career->title ?? '') }}" required class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.careers.title_km') }} *</label>
                    <input type="text" name="title_km" value="{{ old('title_km', $career->title_km ?? '') }}" required class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.careers.department_en') }}</label>
                    <input type="text" name="department" value="{{ old('department', $career->department ?? '') }}" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.careers.department_km') }}</label>
                    <input type="text" name="department_km" value="{{ old('department_km', $career->department_km ?? '') }}" class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.careers.location_en') }}</label>
                    <input type="text" name="location" value="{{ old('location', $career->location ?? '') }}" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.careers.location_km') }}</label>
                    <input type="text" name="location_km" value="{{ old('location_km', $career->location_km ?? '') }}" class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-4 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.careers.type') }} *</label>
                    <select name="type" class="admin-input">
                        @foreach(['full-time', 'part-time', 'contract', 'internship'] as $t)
                            <option value="{{ $t }}" {{ old('type', $career->type ?? 'full-time') === $t ? 'selected' : '' }}>
                                {{ __('admin.careers.types.' . $t) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.careers.deadline') }}</label>
                    <input type="date" name="deadline"
                           value="{{ old('deadline', $career->deadline?->format('Y-m-d') ?? '') }}"
                           class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.field.sort_order') }}</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $career->sort_order ?? 0) }}" class="admin-input">
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1"
                               {{ old('is_active', $career->is_active ?? true) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-brand-green focus:ring-brand-green">
                        <span class="text-sm text-slate-300">{{ __('admin.field.is_active') }}</span>
                    </label>
                </div>
            </div>

            @include('admin.partials.editor-tab-group', [
                'label'      => __('admin.careers.description'),
                'icon'       => 'fa-align-left',
                'iconColor'  => 'text-brand-green',
                'enEditorId' => 'editor-description',
                'enInputId'  => 'description',
                'enValue'    => old('description', $career->description ?? ''),
                'kmEditorId' => 'editor-description_km',
                'kmInputId'  => 'description_km',
                'kmValue'    => old('description_km', $career->description_km ?? ''),
            ])

            @include('admin.partials.editor-tab-group', [
                'label'      => __('admin.careers.requirements'),
                'icon'       => 'fa-list-check',
                'iconColor'  => 'text-brand-orange',
                'enEditorId' => 'editor-requirements',
                'enInputId'  => 'requirements',
                'enValue'    => old('requirements', $career->requirements ?? ''),
                'kmEditorId' => 'editor-requirements_km',
                'kmInputId'  => 'requirements_km',
                'kmValue'    => old('requirements_km', $career->requirements_km ?? ''),
            ])

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.careers.index') }}"
                   class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">
                    {{ __('admin.btn.cancel') }}
                </a>
                <button type="submit"
                        class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $career->exists ? __('admin.btn.update') : __('admin.btn.create') }}
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
        ['editorId' => 'editor-description',    'inputId' => 'description'],
        ['editorId' => 'editor-description_km', 'inputId' => 'description_km'],
        ['editorId' => 'editor-requirements',   'inputId' => 'requirements'],
        ['editorId' => 'editor-requirements_km','inputId' => 'requirements_km'],
    ],
])
@endpush
