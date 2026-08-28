@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.service-types.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> {{ __('admin.btn.back') }}
    </a>

    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST"

            action="{{ $serviceType->exists ? route('admin.service-types.update', $serviceType) : route('admin.service-types.store') }}"
            enctype="multipart/form-data"
            class="space-y-5" id="stype-form">
            @csrf
            @if($serviceType->exists) @method('PUT') @endif

            @if($errors->any())
            <div class="p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm space-y-1">
                @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
            </div>
            @endif
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.servicetype.name') }} *</label>
                    <input type="text" name="name" value="{{ old('name', $serviceType->name ?? '') }}" required class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.servicetype.name_km') }} *</label>
                    <input type="text" name="name_km" value="{{ old('name_km', $serviceType->name_km ?? '') }}" required class="admin-input">
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.servicetype.slugs') }}</label>
                    <select name="slug_id" required class="admin-input select2">
                        <option value="">-- Select Category --</option>
                        @foreach($slugs as $slug)
                        <option value="{{ $slug->id }}"
                            {{ old('slug_id', $serviceType->slug_id ?? '') == $slug->id ? 'selected' : '' }}>
                            {{ $slug->name }}
                        </option>
                        @endforeach
                    </select>
                    @if($slugs->isEmpty())
                    <p class="mt-1 text-xs text-brand-orange">
                        <i class="fa-solid fa-triangle-exclamation mr-1"></i>
                        {{ __('admin.service_types.no_slugs') }}
                        <a href="{{ route('admin.slugs.create') }}" class="underline">{{ __('admin.slugs.add') }}</a>.
                    </p>
                    @endif
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.servicetype.image') }}</label>
                    <input type="file" name="image" accept="image/*"
                        class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg
                              file:border-0 file:text-sm file:font-semibold file:bg-slate-700 file:text-slate-200
                              hover:file:bg-slate-600 file:transition">
                    <p class="mt-1 text-xs text-slate-600">PNG, JPG, WebP — max 2 MB. Used as card thumbnail.</p>
                    @if($serviceType->exists && $serviceType->image)
                    <div class="mb-2 flex items-center gap-3">
                        <img src="{{ Storage::url($serviceType->image) }}" alt="Current image"
                            class="w-24 h-16 object-cover rounded-lg border border-slate-700">
                        <span class="text-xs text-slate-500">Current image — upload a new one to replace</span>
                    </div>
                    @endif
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.servicetype.icon') }}</label>

                    <input type="file" name="icon" accept="image/*"
                        class="w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg
                              file:border-0 file:text-sm file:font-semibold file:bg-slate-700 file:text-slate-200
                              hover:file:bg-slate-600 file:transition">
                    <p class="mt-1 text-xs text-slate-600">PNG, JPG, WebP — max 2 MB. Used as card thumbnail.</p>
                    @if($serviceType->exists && $serviceType->icon)
                    <div class="mb-2 flex items-center gap-3">
                        <img src="{{ Storage::url($serviceType->icon) }}" alt="Current icon"
                            class="w-24 h-16 object-cover rounded-lg border border-slate-700">
                        <span class="text-xs text-slate-500">Current icon — upload a new one to replace</span>
                    </div>
                    @endif
                </div>
            </div>



            @include('admin.partials.editor-tab-group', [
            'label' => __('admin.field.description'),
            'icon' => 'fa-align-left',
            'iconColor' => 'text-brand-green',
            'enEditorId' => 'editor-desc',
            'enInputId' => 'desc',
            'enValue' => old('desc', $serviceType->desc ?? ''),
            'kmEditorId' => 'editor-desc_km',
            'kmInputId' => 'desc_km',
            'kmValue' => old('desc_km', $serviceType->desc_km ?? ''),
            ])

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.service-types.index') }}"
                    class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">
                    {{ __('admin.btn.cancel') }}
                </a>
                <button type="submit"
                    class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $serviceType->exists ? __('admin.btn.update') : __('admin.btn.create') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
@include('admin.partials.quill-editor', [
'formId' => 'stype-form',
'editors' => [
['editorId' => 'editor-desc', 'inputId' => 'desc'],
['editorId' => 'editor-desc_km', 'inputId' => 'desc_km'],
],
])
@endpush