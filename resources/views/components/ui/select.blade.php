{{-- Select Component

    الخصائص:
    - name: اسم الحقل (مطلوب)
    - label: العنوان
    - options: المخيارات (array: value => label)
    - selected: القيمة المختارة
    - error: رسالة الخطأ
    - required: boolean
    - multiple: boolean

    الاستخدام:
    <x-ui.select name="role" :options="['admin' => 'مدير', 'user' => 'مستخدم']" label="الدور" />
--}}

@props([
    'name' => '',
    'label' => null,
    'options' => [],
    'selected' => null,
    'error' => null,
    'required' => false,
    'multiple' => false,
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

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $multiple ? 'multiple' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gold-500 transition bg-white ' .
                      ($hasError ? 'border-red-500 bg-red-50' : 'border-gray-300')
        ]) }}
    >
        @if(!$multiple && !$required)
            <option value="">-- اختر --</option>
        @endif

        @foreach($options as $value => $label)
            <option value="{{ $value }}"
                {{ (old($name, $selected) == $value) ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>

    @if($hasError)
        <p class="mt-1 text-sm text-red-600">{{ $errorMessage }}</p>
    @endif
</div>
