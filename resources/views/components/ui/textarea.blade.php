{{-- Textarea Component

    الخصائص:
    - name: اسم الحقل (مطلوب)
    - label: العنوان
    - placeholder: النص الفارغ
    - value: القيمة الحالية
    - rows: عدد الصفوف (افتراضي: 4)
    - error: رسالة الخطأ
    - required: boolean
    - readonly: boolean

    الاستخدام:
    <x-ui.textarea name="description" label="الوصف" rows="6" />
--}}

@props([
    'name' => '',
    'label' => null,
    'placeholder' => null,
    'value' => null,
    'rows' => 4,
    'error' => null,
    'required' => false,
    'readonly' => false,
])

@php
    $hasError = $error || $errors->has($name);
    $errorMessage = $error ?? $errors->first($name);
@endphp

<div class="mb-4">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-2">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $readonly ? 'readonly' : '' }}
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold-500 transition ' .
                      ($hasError ? 'border-red-500 bg-red-50' : 'border-gray-300 bg-white')
        ]) }}
    >{{ old($name, $value) }}</textarea>

    @if($hasError)
        <p class="mt-1 text-sm text-red-600">{{ $errorMessage }}</p>
    @endif
</div>
