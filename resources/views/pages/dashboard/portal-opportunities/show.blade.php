<x-dashboard.show-page
    :title="$opportunity->title"
    subtitle="عرض تفاصيل الفرصة"
    :image="$opportunity->image_url"
    :description="$opportunity->description"
    :content="$opportunity->content"
    :meta="[
        ['label' => __('common.general.type'), 'value' => __('modules.portal.opportunity_types.' . $opportunity->opportunity_type)],
        ['label' => __('common.general.status'), 'value' => __('common.status.' . $opportunity->status)],
        ['label' => __('common.status.published'), 'value' => $opportunity->is_active ? __('common.general.yes') : __('common.general.no')],
        ['label' => __('common.general.order'), 'value' => $opportunity->order],
    ]"
>
    <x-slot name="badges">
        <x-ui.badge color="blue">{{ $opportunity->opportunity_type }}</x-ui.badge>
        <x-ui.badge color="green">{{ $opportunity->status }}</x-ui.badge>
    </x-slot>

    <x-slot name="actions">
        @can('manage portal opportunities')
            <a href="{{ route('dashboard.portal-opportunities.edit', $opportunity) }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">
                {{ __('common.actions.edit') }}
            </a>
        @endcan
    </x-slot>
</x-dashboard.show-page>
