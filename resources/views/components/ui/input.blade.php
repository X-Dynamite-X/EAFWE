{{-- Input Component

    الخصائص:
    - type: text, email, password, number, tel (افتراضي: text)
    - name: اسم الحقل (مطلوب)
    - label: العنوان
    - placeholder: النص الفارغ
    - value: القيمة الحالية
    - error: رسالة الخطأ
    - required: boolean
    - readonly: boolean

    الاستخدام:
    <x-ui.input name="email" type="email" label="البريد الإلكتروني" />
    <x-ui.input name="password" type="password" label="كلمة المرور" />
--}}

@props([
    'type' => 'text',
    'name' => '',
    'label' => null,
    'placeholder' => null,
    'value' => null,
    'error' => null,
    'required' => false,
    'readonly' => false,
    'id' => null,
])

@php
    $hasError = $error || $errors->has($name);
    $errorMessage = $error ?? $errors->first($name);
@endphp

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-2">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input type="{{ $type }}" id="{{ $id ?? $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} {{ $readonly ? 'readonly' : '' }}
        {{ $attributes->merge([
            'class' =>
                'w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold-500 transition ' .
                ($hasError ? 'border-red-500 bg-red-50' : 'border-gray-300 bg-white'),
        ]) }} />

    @if ($hasError)
        <p class="mt-1 text-sm text-red-600">{{ $errorMessage }}</p>
    @endif
</div>
