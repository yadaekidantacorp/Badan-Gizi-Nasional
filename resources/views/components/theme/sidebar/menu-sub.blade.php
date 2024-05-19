@props([
    'show' => false,
    'id' => null,
    'icon' => null,
    'collapse' => false,
    'toggle' => null,
])
@php
$classes = ($show ?? false) ? 'menu-item show here menu-accordion' : 'menu-item menu-accordion';
@endphp
<div data-kt-menu-trigger="click" {{ $attributes->merge(['class' => $classes])}}>
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <i class="{{ $icon }} fs-2"></i>
        </span>
        <span class="menu-title">{{ $slot }}</span>
        <span class="menu-arrow"></span>
    </span>
    <!--end:Menu link-->
    <!--begin:Menu sub-->
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
        {{ $sub }}
        <!--end:Menu item-->
        @if($collapse)
        <div class="menu-inner flex-column collapse" id="{{ $id }}">
            {{ $collapse }}
        </div>
            @if($toggle)
            <div class="menu-item">
                <div class="menu-content">
                    <a class="btn btn-flex btn-color-primary d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed" data-bs-toggle="collapse" href="#{{ $id }}" data-kt-toggle-text="Show Less">
                        {{ $toggle }}
                        <i class="ki-outline ki-minus-square toggle-on fs-2 me-0"></i>
                        <i class="ki-outline ki-plus-square toggle-off fs-2 me-0"></i>
                    </a>
                </div>
            </div>
            @endif
        @endif
    </div>
    <!--end:Menu sub-->
</div>