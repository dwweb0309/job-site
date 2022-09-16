@props(['items' => []])

<div class="space-y-1" aria-label="Sidebar">

@foreach($items as $item)

@php
$active = Request::url() == $item['target'];
$classes = $active
            ? 'bg-gray-200 text-gray-900 hover:bg-gray-100 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md'
            : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md';
@endphp

    <a href="{{ $item['target'] }}" {{ $attributes->merge(['class' => $classes]) }} aria-current="page">
    <span class="truncate">{{ $item['name'] }}</span>
    </a>

@endforeach

</div>
