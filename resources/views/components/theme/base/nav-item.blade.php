@props(['active' => false,'label' => null])

@php
$classes = ($active ?? false) ? $attributes->get('class') . ' active' : $attributes->get('target');
@endphp
<li class="nav-item mt-2">
    <a wire:navigate {{ $attributes->merge(['class' => $classes])}} {{ $attributes->get('target') }} href="account/overview.html">
        {{ $label }}
    </a>
</li>