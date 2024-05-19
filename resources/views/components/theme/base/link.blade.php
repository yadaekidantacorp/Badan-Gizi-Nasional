@props([
    'href' => null,
    'class' => 'primary',
])
@php
$class = match($class) {
    'primary', 'info', 'warning', 'danger', 'succes' => "linnk-{$class}",
    default => $class,
};
@endphp

<a href="{{ $href }}" wire:navigate {{ $attributes->merge(['class' => $class])}}>{{ $slot }}</a>