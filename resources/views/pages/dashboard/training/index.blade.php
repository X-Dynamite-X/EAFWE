<x-layout.dashboard title="{{ __('modules.training.title') }}">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ __('modules.training.title') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('modules.training.subtitle') }}</p>
        </div>
        @can('manage training programs')
            <x-ui.button href="{{ route('dashboard.training.manage') }}" color="primary">
                <i class="fas fa-cog"></i> {{ __('modules.training.manage_button') }}
            </x-ui.button>
        @endcan
    </div>

    @if (session('success'))
        <x-ui.alert type="success" class="mb-6">
            {{ session('success') }}
        </x-ui.alert>
    @endif

    @if ($programs->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($programs as $program)
                <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
                    @if ($program->image_url)
                        <img src="{{ $program->image_url }}" class="w-full h-48 object-cover rounded-t-lg -m-4 mb-4"
                            alt="{{ $program->title }}">
                    @else
                        <div class="w-full h-48 bg-gray-100 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                            <i class="fas fa-graduation-cap text-5xl text-gray-300"></i>
                        </div>
                    @endif

                    <div class="flex-1 flex flex-col">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $program->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($program->description, 100) }}</p>

                        <div class="mt-4">
                            <x-ui.badge color="blue">
                                @switch($program->category)
                                    @case('training')
                                        {{ __('modules.training.categories.training') }}
                                    @break

                                    @case('workshop')
                                        {{ __('modules.training.categories.workshop') }}
                                    @break

                                    @case('seminar')
                                        {{ __('modules.training.categories.seminar') }}
                                    @break

                                    @default
                                        {{ $program->category }}
                                @endswitch
                            </x-ui.badge>
                        </div>

                        <x-ui.button href="{{ route('dashboard.training.show', $program) }}" color="primary"
                            size="sm" class="mt-4 w-full text-center">
                            {{ __('common.actions.view') }} {{ __('common.general.details') }} <i
                                class="fas fa-arrow-left text-xs"></i>
                        </x-ui.button>
                    </div>
                </x-ui.card>
            @endforeach
        </div>
    @else
        <x-ui.card>
            <div class="text-center py-12">
                <i class="fas fa-graduation-cap text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-600 text-lg">{{ __('modules.training.no_programs_message') }}</p>
                <p class="text-gray-500 text-sm mt-2">{{ __('modules.training.visit_later') }}</p>
            </div>
        </x-ui.card>
    @endif
</x-layout.dashboard>
