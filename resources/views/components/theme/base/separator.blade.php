@props([
    'text' => null,
    'border' => null,
    'color' => null,
    'dotted' => null,
    'dashed' => null,
    'class' => 'primary',
])
<div class="separator {{ $border ? "border-{$border}" : '' }} {{ $color ? "border-{$color}" : '' }} {{ $dotted ? 'separator-dotted' : '' }} {{ $dashed ? 'separator-dashed' : '' }} {{ $text ? 'separator-content' : '' }} my-14">
    @if($text)
    <span class="w-125px text-gray-500 fw-semibold fs-7">{{ $text }}</span>
    @endif
</div>