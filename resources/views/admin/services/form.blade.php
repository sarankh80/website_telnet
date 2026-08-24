@extends('admin.layouts.app')
@section('title', $service->exists ? __('admin.btn.edit') : __('admin.services.add'))

@section('content')
<div class="max-w-7xl">
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> {{ __('admin.btn.back') }}
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
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.field.name_en') }} *</label>
                    <input type="text" name="name_en" value="{{ old('name_en', $service->name_en ?? '') }}" required
                        class="admin-input" placeholder="{{ __('admin.field.name_en') }} *">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.field.name_km') }} *</label>
                    <input type="text" name="name_km" placeholder="{{ __('admin.field.name_km') }} *" value="{{ old('name_km', $service->name_km ?? '') }}" required
                        class="admin-input">
                </div>
            </div>


            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Prices</label>
                    <input type="number" step="1" name="price" value="{{ old('price', $service->price ?? '') }}" placeholder="Prices" class="admin-input">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Payment Terms(As Month)</label>
                    <select class="admin-input select2" name="terms" id="terms">
                        <option value="">-- SELECT --</option>
                        @for($i=1;$i<=50;$i++)
                            <option value="{{$i}}">{{"Every ". $i." Month". ($i>0?"s":"")}}</option>
                            @endfor
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.services.service_type') }}</label>
                    <select name="service_type" class="admin-input select2">
                        <option value="">-- SELECT --</option>
                        @foreach($serviceTypes as $type)
                        <option value="{{ $type->id }}"
                            {{ old('service_type', $service->service_type ?? '') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}{{ $type->slug ? ' (' . $type->slug->name . ')' : '' }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.services.service_image') }}</label>
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
            </div>



            @include('admin.partials.editor-tab-group', [
            'label' => __('admin.field.description'),
            'icon' => 'fa-align-left',
            'iconColor' => 'text-brand-green',
            'enEditorId' => 'editor-description_en',
            'enInputId' => 'description_en',
            'enValue' => old('description_en', $service->description_en ?? ''),
            'kmEditorId' => 'editor-description_km',
            'kmInputId' => 'description_km',
            'kmValue' => old('description_km', $service->description_km ?? ''),
            ])
            <div class="grid md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('admin.field.sort_order') }}</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}" class="admin-input">
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1"
                            {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-brand-green focus:ring-brand-green">
                        <span class="text-sm text-slate-300">{{ __('admin.field.is_active') }}</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.services.index') }}"
                    class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">
                    {{ __('admin.btn.cancel') }}
                </a>
                <button type="submit"
                    class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $service->exists ? __('admin.btn.update') : __('admin.btn.create') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
@include('admin.partials.quill-editor', [
'formId' => 'service-form',
'editors' => [
['editorId' => 'editor-description_en', 'inputId' => 'description_en'],
['editorId' => 'editor-description_km', 'inputId' => 'description_km'],
],
])
@endpush