@props([
    'type' => null,
    'class' => 'primary',
])
<h{{$type}} class="text-gray-900 fw-bolder mb-3">{{ $slot }}</h{{$type}}>