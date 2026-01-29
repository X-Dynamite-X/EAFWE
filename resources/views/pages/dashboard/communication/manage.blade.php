<x-layout.dashboard title="{{ __('modules.communication.manage') }}">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ __('modules.communication.manage') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('common.actions.add') }} و{{ __('common.actions.edit') }}
                و{{ __('common.actions.delete') }} {{ __('modules.communication.title') }}</p>
        </div>
        @can('create communications')
            <x-ui.button href="{{ route('dashboard.communication.create') }}" color="primary">
                <i class="fas fa-plus"></i> {{ __('modules.communication.create') }}
            </x-ui.button>
        @endcan
    </div>

    @if (session('success'))
        <x-ui.alert type="success" class="mb-6">
            {{ session('success') }}
        </x-ui.alert>
    @endif

    @if (session('error'))
        <x-ui.alert type="danger" class="mb-6">
            {{ session('error') }}
        </x-ui.alert>
    @endif

    @if ($communications->count())
        <div class="space-y-4">
            @foreach ($communications as $communication)
                <x-ui.card>
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2 flex-wrap">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $communication->title }}</h3>
                                @if ($communication->is_pinned)
                                    <x-ui.badge color="yellow">
                                        <i class="fas fa-thumbtack text-xs"></i>
                                        {{ __('modules.communication.pinned') }}
                                    </x-ui.badge>
                                @endif
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
                                <x-ui.badge color="{{ $communication->is_active ? 'green' : 'red' }}">
                                    {{ $communication->is_active ? __('common.status.active') : __('common.status.disabled') }}
                                </x-ui.badge>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">{{ Str::limit($communication->message, 100) }}</p>
                            <p class="text-xs text-gray-500">
                                <i class="fas fa-calendar"></i>
                                {{ $communication->published_date?->format('d/m/Y') ?? __('common.general.no_date') }}
                            </p>
                        </div>

                        <div class="flex gap-2 flex-wrap md:flex-nowrap">
                            @can('update communications')
                                <x-ui.button href="{{ route('dashboard.communication.edit', $communication) }}"
                                    color="primary" size="sm">
                                    <i class="fas fa-edit"></i> {{ __('common.actions.edit') }}
                                </x-ui.button>
                            @endcan

                            @can('delete communications')
                                <button type="button"
                                    onclick="openDeleteModal('{{ $communication->id }}', '{{ $communication->title }}', '{{ route('dashboard.communication.destroy', $communication) }}')"
                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded text-sm transition-colors">
                                    <i class="fas fa-trash"></i> {{ __('common.actions.delete') }}
                                </button>
                            @endcan
                        </div>
                    </div>
                </x-ui.card>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $communications->links() }}
        </div>
    @else
        <x-ui.card>
            <div class="text-center py-8">
                <i class="fas fa-folder-open text-4xl text-gray-300 mb-3"></i>
                <p class="text-gray-600">{{ __('modules.communication.no_communications') }}</p>
                @can('create communications')
                    <x-ui.button href="{{ route('dashboard.communication.create') }}" color="primary" class="mt-4">
                        <i class="fas fa-plus"></i> {{ __('common.actions.add') }}
                        {{ __('modules.communication.create') }}
                    </x-ui.button>
                @endcan
            </div>
        </x-ui.card>
    @endif

    @include('components.delete-modal')
</x-layout.dashboard>
