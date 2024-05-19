@props([
    'label' => false,
    'modifier' => null,
    'labelText' => null,
    'id' => null,
    'name' => null,
    'type' => 'text',
    'placeholder' => null,
    'autocomplete' => null,
    'inputStyle' => null,
    'required' => false,
    'focus' => false,
    'inputGroup' => false,
    'passwordMeter' => false,
    'tips' => null,
])

@php
    $inputStyle = match ($inputStyle){
        'default' => 'form-control',
        'solid' => 'form-control form-control-solid',
        'transparent' => 'form-control form-control-transparent',
        'bg-transparent' => 'form-control bg-transparent',
    };
@endphp

@php
// $wireModel = $attributes->get('wire:model');
// $wireModels = $modifier ? 'wire:model' . '.' . $modifier . '="' . $id . '"' : 'wire:model="' . '.' . $id.'"';;
@endphp
@if($inputGroup == false)
    @if($label == true)
        <label for="{{ $id ?? '' }}" class="{{ $required == true ? 'required' : '' }} form-label"> {{ $labelText }} </label>
    @endif
    <input wire:model{{ '.'.$modifier }}="{{ $id }}" id="{{ $id ?? '' }}" type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder }}" autocomplete="{{ $autocomplete ?? 'off' }}" class="{{ $inputStyle }} @if($this->$id != null) @error($id) is-invalid @else is-valid @enderror @endif" {{ $focus == true ? 'autofocus' : '' }} />
    @error($id)
        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
    @enderror
@else
    <div class="fv-row mb-8" @if($passwordMeter == true ? 'data-kt-password-meter="true"' : '') @endif>
        <div class="mb-1">
            <div class="position-relative mb-3">
                <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" />

                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="ki-duotone ki-eye-slash fs-2"></i>
                    <i class="ki-duotone ki-eye fs-2 d-none"></i>
                </span>
            </div>
            @if($passwordMeter == true)
            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
            </div>
            @endif
        </div>
        <div class="text-muted">{{ $tips }}</div>
    </div>
@endif