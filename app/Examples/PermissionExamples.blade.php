{{--
    كمثال على استخدام الصلاحيات في الـ Components

    مثال 1: إظهار زر فقط للمديرين
--}}

@can('manage roles')
    <x-ui.button href="{{ route('roles.index') }}" color="gold">
        إدارة الأدوار
    </x-ui.button>
@endcan

{{--
    مثال 2: إظهار قسم كامل حسب الصلاحية
--}}

@can('view reports')
    <x-ui.card title="التقارير">
        <!-- محتوى التقارير -->
    </x-ui.card>
@endcan

{{--
    مثال 3: عرض محتوى مختلف حسب الدور
--}}

@if(auth()->user()->hasRole('admin'))
    <div>محتوى خاص بالمدير</div>
@elseif(auth()->user()->hasRole('staff'))
    <div>محتوى خاص بالموظف</div>
@else
    <div>محتوى عام</div>
@endif

{{--
    مثال 4: استخدام الـ permission-gate component
--}}

<x-permission-gate permission="approve memberships">
    <x-ui.button onclick="approveMembership(id)">موافقة</x-ui.button>
</x-permission-gate>
