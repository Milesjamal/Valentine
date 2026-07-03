@props(['type' => 'button', 'variant' => 'primary', 'size' => 'md'])

@php
$baseClasses = 'inline-flex items-center border font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed';

$sizes = [
    'xs' => 'px-2.5 py-1.5 text-xs',
    'sm' => 'px-3 py-2 text-sm leading-4',
    'md' => 'px-4 py-2 text-sm',
    'lg' => 'px-4 py-2 text-base',
];

$variants = [
    'primary' => 'border-transparent text-white bg-geartrail-red hover:bg-red-700 focus:ring-geartrail-red',
    'secondary' => 'border-gray-300 text-gray-700 bg-white hover:bg-gray-50 focus:ring-geartrail-red',
    'danger' => 'border-transparent text-white bg-red-600 hover:bg-red-700 focus:ring-red-500',
    'dark' => 'border-transparent text-white bg-geartrail-dark hover:bg-gray-800 focus:ring-geartrail-dark',
    'success' => 'border-transparent text-white bg-green-600 hover:bg-green-700 focus:ring-green-500',
];

$classes = $baseClasses . ' ' . ($sizes[$size] ?? $sizes['md']) . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
