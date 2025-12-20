{{-- Card Component

    الخصائص:
    - title: عنوان الكارد (اختياري)
    - footer: محتوى التذييل (اختياري)

    الاستخدام:
    <x-ui.card title="معلومات المستخدم">
        محتوى الكارد
    </x-ui.card>
--}}

@props([
    'title' => null,
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-md overflow-hidden']) }}>
    @if($title)
        <div class="bg-gray-50 border-b border-gray-200 px-6 py-4">
            <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
        </div>
    @endif

    <div class="px-6 py-4">
        {{ $slot }}
    </div>

    @if(isset($footer))
        <div class="bg-gray-50 border-t border-gray-200 px-6 py-4">
            {{ $footer }}
        </div>
    @endif
</div>
