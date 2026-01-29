<x-layout.dashboard title="{{ __('modules.communication.title') }}">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ __('modules.communication.title') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('modules.communication.subtitle') }}</p>
        </div>
        @can('manage communications')
            <x-ui.button href="{{ route('dashboard.communication.manage') }}" color="primary">
                <i class="fas fa-cog"></i> {{ __('modules.communication.manage') }}
            </x-ui.button>
        @endcan
    </div>

    @if (session('success'))
        <x-ui.alert type="success" class="mb-6">
            {{ session('success') }}
        </x-ui.alert>
    @endif

    @if ($communications->count())
        <div class="space-y-4">
            @foreach ($communications as $communication)
                <x-ui.card>
                    <div class="flex justify-between items-start mb-3">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $communication->title }}</h3>
                                @if ($communication->is_pinned)
                                    <x-ui.badge color="yellow">
                                        <i class="fas fa-thumbtack text-xs"></i>
                                        {{ __('modules.communication.pinned') }}
                                    </x-ui.badge>
                                @endif
                            </div>
                            <p class="text-sm text-gray-500 mt-1">
                                <i class="fas fa-calendar text-xs"></i>
                                {{ $communication->published_date ? $communication->published_date->format('d/m/Y') : __('common.general.no_date') }}
                            </p>
                        </div>
                        <x-ui.badge
                            color="{{ $communication->type == 'announcement' ? 'blue' : ($communication->type == 'newsletter' ? 'cyan' : 'green') }}">
                            @switch($communication->type)
                                @case('announcement')
                                    {{ __('modules.communication.types.announcement') }}
                                @break

                                @case('newsletter')
                                    {{ __('modules.communication.types.newsletter') }}
                                @break

                                @case('notification')
                                    {{ __('modules.communication.types.notification') }}
                                @break
                            @endswitch
                        </x-ui.badge>
                    </div>

                    <div class="mt-4 text-gray-700 text-sm leading-relaxed">
                        {!! Str::limit($communication->message, 200) !!}
                    </div>

                    <div class="mt-4">
                        <x-ui.button href="{{ route('dashboard.communication.show', $communication) }}" color="primary"
                            size="sm">
                            {{ __('common.actions.read_more') }} <i class="fas fa-arrow-left text-xs"></i>
                        </x-ui.button>
                    </div>
                </x-ui.card>
            @endforeach
        </div>
    @else
        <x-ui.card>
            <div class="text-center py-8">
                <i class="fas fa-info-circle text-4xl text-gray-300 mb-3"></i>
                <p class="text-gray-600">{{ __('modules.communication.no_communications') }}</p>
            </div>
        </x-ui.card>
    @endif
</x-layout.dashboard>
