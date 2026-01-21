<x-layout.dashboard title="{{ __('modules.portal.title') }}">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ __('modules.portal.title') }} وال{{ __('modules.portal.opportunity_types.funding') }}</h1>
            <p class="text-gray-600 mt-1">اكتشف فرص الأعمال وال{{ __('modules.portal.opportunity_types.funding') }} والشراكات المتاحة</p>
        </div>
        @can('manage portal opportunities')
        <x-ui.button href="{{ route('dashboard.portal-opportunities.manage') }}" color="primary">
            <i class="fas fa-cog"></i> {{ __('modules.portal.manage') }}
        </x-ui.button>
        @endcan
    </div>

    @if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        {{ session('success') }}
    </x-ui.alert>
    @endif

    @if($opportunities->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($opportunities as $opportunity)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            @if($opportunity->image_url)
            <img src="{{ $opportunity->image_url }}" class="w-full h-48 object-cover rounded-t-lg -m-4 mb-4" alt="{{ $opportunity->title }}">
            @else
            <div class="w-full h-48 bg-gray-100 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                <i class="fas fa-briefcase text-5xl text-gray-300"></i>
            </div>
            @endif

            <div class="flex-1 flex flex-col">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 flex-1">{{ $opportunity->title }}</h3>
                    <x-ui.badge :color="$opportunity->status == 'active' ? 'green' : ($opportunity->status == 'closed' ? 'red' : 'yellow')">
                        @switch($opportunity->status)
                            @case('active')
                                {{ __('common.status.active') }}
                            @break
                            @case('closed')
                                {{ __('modules.portal.statuses.closed') }}
                            @break
                            @case('upcoming')
                                {{ __('modules.portal.statuses.upcoming') }}
                            @break
                        @endswitch
                    </x-ui.badge>
                </div>

                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($opportunity->description, 120) }}</p>

                <div class="mt-4 flex gap-2 flex-wrap">
                    <x-ui.badge color="blue">
                        @switch($opportunity->opportunity_type)
                            @case('business')
                                {{ __('modules.entrepreneurship.types.business') }}
                            @break
                            @case('partnership')
                                {{ __('modules.participation.types.partner') }}
                            @break
                            @case('funding')
                                {{ __('modules.portal.opportunity_types.funding') }}
                            @break
                        @endswitch
                    </x-ui.badge>
                </div>
            </div>

            <div class="mt-auto pt-4 border-t border-gray-200">
                <a href="{{ route('dashboard.portal-opportunities.show', $opportunity) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium gap-1">
                    {{ __('common.actions.view') }} {{ __('common.general.details') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </x-ui.card>
        @endforeach
    </div>
    @else
    <x-ui.alert type="info" class="text-center">
        <div class="flex justify-center mb-2">
            <i class="fas fa-info-circle text-4xl text-blue-400"></i>
        </div>
        <p class="text-gray-700 font-medium">لا توجد فرص متاحة حالياً</p>
        <p class="text-gray-500 text-sm mt-1">سيتم {{ __('common.actions.add') }} فرص جديدة {{ __('modules.portal.statuses.upcoming') }}</p>
    </x-ui.alert>
    @endif
</x-layout.dashboard>
