{{--
    Permission-Protected Component
    عرض المحتوى حسب الصلاحية

    الاستخدام:
    <x-permission-gate permission="edit posts">
        محتوى محمي
    </x-permission-gate>
--}}

@can($permission ?? null)
    {{ $slot }}
@else
    @if(isset($fallback))
        {{ $fallback }}
    @else
        <x-alerts.error>
            ليس لديك الصلاحية لعرض هذا المحتوى
        </x-alerts.error>
    @endif
@endcan
