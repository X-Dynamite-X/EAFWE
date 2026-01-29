<x-layout.dashboard title="{{ __('modules.portal.title') }}">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ __('modules.portal.index') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('modules.portal.subtitle') }}</p>
        </div>
        @can('manage portal opportunities')
            <x-ui.button href="{{ route('dashboard.portal-opportunities.manage') }}" color="primary">
                <i class="fas fa-cog"></i> {{ __('modules.portal.manage') }}
            </x-ui.button>
        @endcan
    </div>

    @if (session('success'))
        <x-ui.alert type="success" class="mb-6">
            {{ session('success') }}
        </x-ui.alert>
    @endif

    @if ($opportunities->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($opportunities as $opportunity)
                <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
                    @if ($opportunity->image_url)
                        <img src="{{ $opportunity->image_url }}" class="w-full h-48 object-cover rounded-t-lg -m-4 mb-4"
                            alt="{{ $opportunity->title }}">
                    @else
                        <div class="w-full h-48 bg-gray-100 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                            <i class="fas fa-briefcase text-5xl text-gray-300"></i>
                        </div>
                    @endif

                    <div class="flex-1 flex flex-col">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $opportunity->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($opportunity->description, 100) }}</p>

                        <div class="mt-4">
                            <x-ui.badge color="purple">
                                @switch($opportunity->opportunity_type)
                                    @case('business')
                                        {{ __('modules.portal.types.business') }}
                                    @break

                                    @case('investment')
                                        {{ __('modules.portal.types.investment') }}
                                    @break

                                    @case('partnership')
                                        {{ __('modules.portal.types.partnership') }}
                                    @break

                                    @case('volunteer')
                                        {{ __('modules.portal.types.volunteer') }}
                                    @break

                                    @default
                                        {{ $opportunity->opportunity_type }}
                                @endswitch
                            </x-ui.badge>
                        </div>

                        <div class="mt-auto pt-4 border-t border-gray-200">
                            <a href="{{ route('dashboard.portal-opportunities.show', $opportunity) }}"
                                class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium gap-1">
                                {{ __('common.actions.view') }} {{ __('common.general.details') }}
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                </x-ui.card>
            @endforeach
        </div>
    @else
        <x-ui.alert type="info" class="text-center">
            <div class="flex justify-center mb-2">
                <i class="fas fa-info-circle text-4xl text-blue-400"></i>
            </div>
            <p class="text-gray-700 font-medium">{{ __('modules.portal.no_opportunities') }}</p>
            <p class="text-gray-500 text-sm mt-1">{{ __('modules.portal.start_creating') }}</p>
        </x-ui.alert>
    @endif
</x-layout.dashboard>
