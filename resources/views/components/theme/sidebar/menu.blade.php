@props([
    'active' => false,
    'icon' => null
])

@php
$class = ($active ?? false) ? 'menu-item here show' : 'menu-item';
$classes = ($active ?? false) ? 'menu-link' : 'menu-link';
@endphp

<div {{ $attributes->merge(['class' => $class])}}>
    <!--begin:Menu link-->
    <a wire:navigate {{ $attributes->merge(['class' => $classes])}} {{ $attributes->get('target') }}>
        <span class="menu-icon">
            <i class="{{ $icon }} fs-2"></i>
        </span>
        <span class="menu-title">{{ $slot }}</span>
    </a>
    <!--end:Menu link-->
</div>