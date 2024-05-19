@props([
    'title' => false,
    'toolbar' => false,
    'footer' => false
])

@php
$classes = ($active ?? false) ? 'menu-link active' : 'menu-link';
@endphp

<div class="card shadow-sm">
    <div class="card-header border-0 pt-6">
        @if($title)
        <div class="card-title">
            {{ $title }}
        </div>
        @endif
        @if($toolbar)
        <div class="card-toolbar">
            {{ $toolbar }}
        </div>
        @endif
    </div>
    <div class="card-body pt-0">
        {{ $slot }}
    </div>
    @if($footer)
    <div class="card-footer">
        {{ $footer }}
    </div>
    @endif
</div>