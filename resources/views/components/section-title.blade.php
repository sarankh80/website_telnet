@props(['label' => '', 'title' => '', 'subtitle' => '', 'labelColor' => 'text-brand-orange'])
<div class="text-center max-w-3xl mx-auto mb-12">
    @if($label)
        <h2 class="text-xs {{ $labelColor }} font-extrabold uppercase tracking-widest mb-2">{{ $label }}</h2>
    @endif
    @if($title)
        <p class="text-2xl sm:text-3xl font-extrabold text-adaptive-main">{{ $title }}</p>
    @endif
    @if($subtitle)
        <p class="text-adaptive-muted text-sm mt-3">{{ $subtitle }}</p>
    @endif
    {{ $slot }}
</div>
