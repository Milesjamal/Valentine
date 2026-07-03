@props(['status'])

@php
$colors = [
    'new' => 'bg-blue-100 text-blue-800',
    'inspection' => 'bg-yellow-100 text-yellow-800',
    'diagnosis_complete' => 'bg-indigo-100 text-indigo-800',
    'awaiting_approval' => 'bg-orange-100 text-orange-800',
    'repair_in_progress' => 'bg-purple-100 text-purple-800',
    'testing' => 'bg-cyan-100 text-cyan-800',
    'completed' => 'bg-green-100 text-green-800',
    'closed' => 'bg-gray-100 text-gray-800',
    // Customer requests
    'reviewed' => 'bg-green-100 text-green-800',
    'converted' => 'bg-blue-100 text-blue-800',
    'declined' => 'bg-red-100 text-red-800',
    // Invoices
    'unpaid' => 'bg-red-100 text-red-800',
    'paid' => 'bg-green-100 text-green-800',
    'overdue' => 'bg-red-200 text-red-900',
];
$colorClass = $colors[strtolower($status)] ?? 'bg-gray-100 text-gray-800';
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ' . $colorClass]) }}>
    {{ str_replace('_', ' ', ucfirst($status)) }}
</span>
