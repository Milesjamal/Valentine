@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-2 text-sm font-medium text-white bg-geartrail-red rounded-md group transition-colors duration-200'
            : 'flex items-center px-4 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-geartrail-red hover:text-white group transition-colors duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
