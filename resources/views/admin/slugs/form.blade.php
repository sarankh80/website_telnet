@extends('admin.layouts.app')
@section('title', $slug->exists ? __('admin.slugs.edit') : __('admin.slugs.add'))

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.slugs.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> {{ __('admin.btn.back') }}
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
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.field.name_en') }} *</label>
                    <input type="text" name="name" value="{{ old('name', $slug->name ?? '') }}" required class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.field.name_km') }} *</label>
                    <input type="text" name="name_km" value="{{ old('name_km', $slug->name_km ?? '') }}" required class="admin-input">
                </div>
            </div>

            @include('admin.partials.editor-tab-group', [
                'label'      => __('admin.field.description'),
                'icon'       => 'fa-align-left',
                'iconColor'  => 'text-brand-green',
                'enEditorId' => 'editor-desc',
                'enInputId'  => 'desc',
                'enValue'    => old('desc', $slug->desc ?? ''),
                'kmEditorId' => 'editor-desc_km',
                'kmInputId'  => 'desc_km',
                'kmValue'    => old('desc_km', $slug->desc_km ?? ''),
            ])

            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.field.image') }}</label>
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
                   class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">
                    {{ __('admin.btn.cancel') }}
                </a>
                <button type="submit"
                        class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $slug->exists ? __('admin.btn.update') : __('admin.btn.create') }}
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
        ['editorId' => 'editor-desc',    'inputId' => 'desc'],
        ['editorId' => 'editor-desc_km', 'inputId' => 'desc_km'],
    ],
])
@endpush
