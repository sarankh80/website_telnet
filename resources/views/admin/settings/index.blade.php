@extends('admin.layouts.app')
@section('title', 'Settings')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-8 max-w-3xl">
    @csrf

    @php
    $groupLabels = [
        'general' => ['label' => 'General',         'icon' => 'fa-gear',          'desc' => 'Site name and tagline'],
        'footer'  => ['label' => 'Footer',           'icon' => 'fa-rectangle-list','desc' => 'Footer tagline, CEO info, copyright'],
        'contact' => ['label' => 'Contact Info',     'icon' => 'fa-phone',         'desc' => 'Phone numbers, email, website'],
        'social'  => ['label' => 'Social Links',     'icon' => 'fa-share-nodes',   'desc' => 'Facebook, Telegram, YouTube, LinkedIn'],
        'stats'   => ['label' => 'Stats / Numbers',  'icon' => 'fa-chart-bar',     'desc' => 'Hero section stat numbers'],
        'seo'     => ['label' => 'SEO',              'icon' => 'fa-magnifying-glass','desc' => 'Page title and meta description'],
        'links'   => ['label' => 'External Links',   'icon' => 'fa-arrow-up-right-from-square','desc' => 'Portal and other external URLs'],
        'map'     => ['label' => 'Map',              'icon' => 'fa-map',           'desc' => 'Google Maps embed URL'],
    ];

    $textareaKeys = ['seo_description_en','seo_description_km','tagline_km','tagline_en',
                     'ceo_title_km','ceo_title_en','copyright_km','copyright_en','google_maps_embed',
                     'site_tagline_km','site_tagline_en'];
    @endphp

    @foreach($settings as $group => $items)
    @php $meta = $groupLabels[$group] ?? ['label' => ucfirst($group), 'icon' => 'fa-sliders', 'desc' => '']; @endphp
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden">
        {{-- Group header --}}
        <div class="flex items-center gap-3 px-5 py-4 border-b border-slate-800 bg-slate-800/40">
            <div class="w-8 h-8 rounded-lg bg-brand-green/10 text-brand-green flex items-center justify-center flex-shrink-0">
                <i class="fa-solid {{ $meta['icon'] }} text-sm"></i>
            </div>
            <div>
                <h3 class="font-semibold text-slate-100 text-sm">{{ $meta['label'] }}</h3>
                @if($meta['desc'])
                    <p class="text-xs text-slate-500">{{ $meta['desc'] }}</p>
                @endif
            </div>
        </div>

        <div class="p-5 space-y-4">
            @foreach($items as $setting)
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1.5">
                    {{ ucwords(str_replace(['_','.'], ' ', $setting->key)) }}
                    <span class="ml-1 text-slate-600 font-normal">{{ $setting->key }}</span>
                </label>

                @if(in_array($setting->key, $textareaKeys) || str_contains($setting->key, 'description') || str_contains($setting->key, 'address') || str_contains($setting->key, 'about') || str_contains($setting->key, 'embed'))
                    <textarea name="settings[{{ $setting->key }}]" rows="3"
                              class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2.5 text-sm
                                     focus:outline-none focus:border-brand-green focus:ring-1 focus:ring-brand-green transition
                                     placeholder-slate-500 resize-none">{{ old('settings.'.$setting->key, $setting->value) }}</textarea>
                @elseif(str_contains($setting->key, '_url') || str_contains($setting->key, 'website'))
                    <input type="url" name="settings[{{ $setting->key }}]"
                           value="{{ old('settings.'.$setting->key, $setting->value) }}"
                           placeholder="https://"
                           class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2.5 text-sm
                                  focus:outline-none focus:border-brand-green focus:ring-1 focus:ring-brand-green transition
                                  placeholder-slate-500">
                @else
                    <input type="text" name="settings[{{ $setting->key }}]"
                           value="{{ old('settings.'.$setting->key, $setting->value) }}"
                           class="w-full bg-slate-800 border border-slate-700 text-slate-100 rounded-lg px-4 py-2.5 text-sm
                                  focus:outline-none focus:border-brand-green focus:ring-1 focus:ring-brand-green transition
                                  placeholder-slate-500">
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endforeach

    <div class="flex justify-end sticky bottom-4">
        <button type="submit"
                class="px-7 py-3 bg-gradient-to-r from-brand-green to-brand-orange hover:from-[#7ab534] hover:to-[#dc6e11] text-white font-semibold rounded-xl transition shadow-lg text-sm flex items-center gap-2">
            <i class="fa-solid fa-floppy-disk"></i>
            Save All Settings
        </button>
    </div>
</form>
@endsection
