@props([
    'active' => false
])

@php
$classes = ($active ?? false) ? 'menu-link active' : 'menu-link';
@endphp
<div class="menu-item">
    <!--begin:Menu link-->
    <a {{ $attributes->get('target') ? '' : 'wire:navigate' }} {{ $attributes->merge(['class' => $classes])}}>
        <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
        </span>
        <span class="menu-title">
            {{ $slot }}
        </span>
    </a>
    <!--end:Menu link-->
</div>