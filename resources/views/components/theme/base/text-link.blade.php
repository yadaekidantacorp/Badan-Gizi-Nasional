@props([
    'href' => null,
    'text' => null,
    'class' => 'primary',
])
@php
$class = match($class) {
    'primary', 'info', 'warning', 'danger', 'succes' => "linnk-{$class}",
    default => $class,
};
@endphp
<div class="text-gray-500 text-center fw-semibold fs-6">
    {{ $text ?? '' }}
    <a href="{{ $href }}" wire:navigate {{ $attributes->merge(['class' => $class])}}>{{ $slot }}</a>
</div>