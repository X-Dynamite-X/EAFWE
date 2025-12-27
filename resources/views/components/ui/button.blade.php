{{-- Button Component

    الخصائص:
    - color: gold, black, gray (افتراضي: gold)
    - size: sm, md, lg (افتراضي: md)
    - disabled: boolean
    - type: button, submit (افتراضي: button)
    - href: للروابط بدل الأزرار

    الاستخدام:
    <x-ui.button>انقر هنا</x-ui.button>
    <x-ui.button color="black" size="lg">زر كبير</x-ui.button>
    <x-ui.button href="{{ route('home') }}">رابط</x-ui.button>
--}}

@props([
    'color' => 'gold',
    'size' => 'md',
    'disabled' => false,
    'type' => 'button',
    'href' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-semibold rounded-lg transition duration-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2';

    $colorClasses = match($color) {
        'gold' => 'bg-gold-600 text-white hover:bg-gold-700 focus:ring-gold-500',
        'black' => 'bg-black text-white hover:bg-gray-900 focus:ring-black',
        'red' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
        'gray' => 'bg-gray-300 text-gray-900 hover:bg-gray-400 focus:ring-gray-500',
        'green' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
        default => 'bg-gold-600 text-white hover:bg-gold-700 focus:ring-gold-500',
    };

    $sizeClasses = match($size) {
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
        default => 'px-4 py-2 text-base',
    };

    $disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';
    $classes = "{$baseClasses} {$colorClasses} {$sizeClasses} {$disabledClasses}";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
