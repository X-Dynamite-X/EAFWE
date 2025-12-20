{{-- Badge Component

    الخصائص:
    - color: gold, black, gray, green, red (افتراضي: gray)
    - size: sm, md, lg (افتراضي: md)

    الاستخدام:
    <x-ui.badge color="green">نشط</x-ui.badge>
    <x-ui.badge color="red" size="sm">غير منشط</x-ui.badge>
--}}

@props([
    'color' => 'gray',
    'size' => 'md',
])

@php
    $colorClasses = match($color) {
        'gold' => 'bg-gold-100 text-gold-800',
        'black' => 'bg-gray-900 text-white',
        'gray' => 'bg-gray-200 text-gray-800',
        'green' => 'bg-green-100 text-green-800',
        'red' => 'bg-red-100 text-red-800',
        default => 'bg-gray-200 text-gray-800',
    };

    $sizeClasses = match($size) {
        'sm' => 'px-2 py-1 text-xs',
        'md' => 'px-3 py-1 text-sm',
        'lg' => 'px-4 py-2 text-base',
        default => 'px-3 py-1 text-sm',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-block rounded-full font-semibold {$colorClasses} {$sizeClasses}"]) }}>
    {{ $slot }}
</span>
