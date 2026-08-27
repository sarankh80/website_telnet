@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl">
    @if(isset($redirectRoute))
    <a href="{{ $redirectRoute }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-slate-200 mb-6 transition">
        <i class="fa-solid fa-arrow-left text-xs"></i> {{ __('admin.btn.back') }}
    </a>
    @endif
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <form method="POST"
            action="{{ $tariffs->exists ? route('admin.tariffs.update', $tariffs) : route('admin.tariffs.store') }}"
            enctype="multipart/form-data"
            class="space-y-5" id="service-form">
            @csrf
            @if($tariffs->exists) @method('PUT') @endif

            @if($errors->any())
            <div class="p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm space-y-1">
                @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
            </div>
            @endif

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.tariff.name_en') }} *</label>
                    <input type="text" name="name_en" value="{{ old('name_en', $tariffs->name_en ?? '') }}" required
                        class="admin-input" placeholder="{{ __('app.internet.tariff.name_en') }} *">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.tariff.name_kh') }} *</label>
                    <input type="text" name="name_kh" placeholder="{{ __('app.internet.tariff.name_kh') }} *" value="{{ old('name_kh', $tariffs->name_kh ?? '') }}" required
                        class="admin-input">
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.tariff.price') }} *</label>
                    <input type="number" name="price" value="{{ old('price', $tariffs->price ?? '') }}" required
                        class="admin-input" placeholder="{{ __('app.internet.tariff.price') }} *">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.tariff.term') }} *</label>
                    <input type="number" name="term" placeholder="{{ __('app.internet.tariff.term') }} *" value="{{ old('term', $tariffs->term ?? '') }}" required
                        class="admin-input">
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.tariff.service') }}</label>
                    <select class="select2 admin-input" name="services_id" id="services_id">
                        <option value="">{{__('app.controls.action.select_defualt')}}</option>
                        {!! $services !!}
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">{{ __('app.internet.tariff.order') }}</label>
                    <input type="number" name="sort" value="{{ old('sort', $tariffs->sort ?? 0) }}" class="admin-input">
                </div>
                <div class="flex items-end pb-1">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="status" value="1" {{ old('status', $tariffs->status ?? true) ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-brand-green focus:ring-brand-green">
                        <span class="text-sm text-slate-300">{{ __('app.internet.tariff.is_active') }}</span>
                    </label>
                </div>
            </div>

            @include('admin.partials.editor-tab-group', [
            'label' => __('app.internet.tariff.desc_en'),
            'icon' => 'fa-align-left',
            'iconColor' => 'text-brand-green',
            'enEditorId' => 'editor-description_en',
            'enInputId' => 'description_en',
            'enValue' => old('description_en', $tariffs->description_en ?? ''),
            'kmEditorId' => 'editor-description_kh',
            'kmInputId' => 'description_kh',
            'kmValue' => old('description_kh', $tariffs->description_kh ?? ''),
            ])


            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ $redirectRoute }}"
                    class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-slate-200 text-sm font-medium rounded-lg transition">
                    {{ __('admin.btn.cancel') }}
                </a>
                <button type="submit"
                    class="px-5 py-2.5 bg-brand-green hover:bg-[#7ab534] text-white text-sm font-semibold rounded-lg transition">
                    {{ $tariffs->exists ? __('admin.btn.update') : __('admin.btn.create') }}s
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
['editorId' => 'editor-description_kh', 'inputId' => 'description_kh'],
],
])
@endpush