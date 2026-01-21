<x-layout.dashboard title="{{ __('common.actions.view') }} برنامج ال{{ __('modules.training.categories.training') }}">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <x-ui.card>
                <div class="flex justify-between items-start mb-6 pb-6 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $program->title }}</h1>
                    @can('manage training programs')
                    <div class="flex gap-2">
                        <x-ui.button href="{{ route('dashboard.training.edit', $program) }}" color="primary" size="sm">
                            <i class="fas fa-edit"></i> {{ __('common.actions.edit') }}
                        </x-ui.button>
                        <button type="button" onclick="openDeleteModal('{{ $program->id }}', '{{ $program->title }}', '{{ route('dashboard.training.destroy', $program) }}')" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded text-sm transition-colors">
                            <i class="fas fa-trash"></i> {{ __('common.actions.delete') }}
                        </button>
                    </div>
                    @endcan
                </div>

                @if($program->image_url)
                <div class="mb-6 rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ $program->image_url }}" class="w-full h-80 object-cover" alt="{{ $program->title }}">
                </div>
                @endif

                <div class="mb-6">
                    <x-ui.badge color="cyan">
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
                        @endswitch
                    </x-ui.badge>
                </div>

                <p class="text-lg text-gray-700 mb-6">{{ $program->description }}</p>

                <div class="prose prose-sm max-w-none text-gray-700 leading-relaxed">
                    {!! $program->content !!}
                </div>

                <div class="mt-6 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        <i class="fas fa-clock"></i>
                        تم ال{{ __('common.actions.create') }}: {{ $program->created_at->format('d/m/Y H:i') }}
                        @if($program->updated_at != $program->created_at)
                        | {{ __('common.time.updated_at') }}: {{ $program->updated_at->format('d/m/Y H:i') }}
                        @endif
                    </p>
                </div>
            </x-ui.card>

            <x-ui.button href="{{ route('dashboard.training.index') }}" color="gray" class="mt-4">
                <i class="fas fa-arrow-right"></i> {{ __('common.actions.back') }}
            </x-ui.button>
        </div>

        <div>
            <x-ui.card>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">معلومات البرنامج</h3>

                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-600">{{ __('common.general.category') }}</dt>
                        <dd class="text-gray-900 mt-1">
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
                                @endswitch
                            </x-ui.badge>
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-600">الحالة</dt>
                        <dd class="text-gray-900 mt-1">
                            <x-ui.badge color="{{ $program->is_active ? 'green' : 'red' }}">
                                {{ $program->is_active  ? __('common.status.active') : __('common.status.disabled') }}
                            </x-ui.badge>
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-600">المعرف</dt>
                        <dd class="text-gray-900 mt-1 text-xs font-mono">{{ $program->slug }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-600">{{ __('common.general.order') }}</dt>
                        <dd class="text-gray-900 mt-1">{{ $program->order }}</dd>
                    </div>
                </dl>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>

@include('components.delete-modal')
