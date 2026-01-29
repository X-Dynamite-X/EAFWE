<x-layout.dashboard title="{{ __('common.actions.view') }} {{ __('modules.participation.title') }}">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $opportunity->title }}</h1>
                <p class="text-gray-600 mt-1">{{ __('modules.participation.opportunity_details') }}</p>
            </div>
            @can('manage participation opportunities')
                <div class="flex gap-2">
                    <x-ui.button href="{{ route('dashboard.participation.edit', $opportunity) }}" color="primary"
                        size="sm">
                        <i class="fas fa-edit"></i> {{ __('common.actions.edit') }}
                    </x-ui.button>
                    <button type="button"
                        onclick="openDeleteModal('{{ $opportunity->id }}', '{{ $opportunity->title }}', '{{ route('dashboard.participation.destroy', $opportunity) }}')"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded text-sm transition-colors">
                        <i class="fas fa-trash"></i> {{ __('common.actions.delete') }}
                    </button>
                </div>
            @endcan
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <x-ui.card>
                    @if ($opportunity->image_url)
                        <img src="{{ $opportunity->image_url }}" class="w-full rounded-lg object-cover mb-6"
                            style="max-height: 400px;" alt="{{ $opportunity->title }}">
                    @endif

                    <div class="mb-4">
                        <x-ui.badge color="blue">
                            @switch($opportunity->type)
                                @case('volunteer')
                                    {{ __('modules.participation.types.volunteer') }}
                                @break

                                @case('partner')
                                    {{ __('modules.participation.types.partner') }}
                                @break

                                @case('sponsor')
                                    {{ __('modules.participation.types.sponsor') }}
                                @break
                            @endswitch
                        </x-ui.badge>
                    </div>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">{{ $opportunity->description }}</p>

                    <div class="prose prose-sm max-w-none mb-6 text-gray-700">
                        {!! $opportunity->content !!}
                    </div>

                    <div class="border-t border-gray-200 pt-4 text-sm text-gray-600">
                        <div class="mb-2">
                            <i class="fas fa-calendar"></i>
                            {{ __('common.time.from') }}:
                            {{ $opportunity->start_date?->format('d/m/Y') ?? __('common.general.not_specified') }}
                        </div>
                        <div>
                            <i class="fas fa-calendar-check"></i>
                            {{ __('common.time.to') }}:
                            {{ $opportunity->end_date?->format('d/m/Y') ?? __('common.general.not_specified') }}
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4 mt-4 text-sm text-gray-600">
                        <i class="fas fa-clock"></i>
                        {{ __('common.time.created_at') }}: {{ $opportunity->created_at->format('d/m/Y H:i') }}
                        @if ($opportunity->updated_at != $opportunity->created_at)
                            | {{ __('common.time.updated_at') }}: {{ $opportunity->updated_at->format('d/m/Y H:i') }}
                        @endif
                    </div>
                </x-ui.card>

                <div class="mt-6">
                    <x-ui.button href="{{ route('dashboard.participation.opportunities') }}" color="gray">
                        <i class="fas fa-arrow-right"></i> {{ __('common.actions.back') }}
                    </x-ui.button>
                </div>
            </div>

            <div class="lg:col-span-1">
                <x-ui.card>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        {{ __('modules.participation.opportunity_info') }}</h3>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-600">{{ __('common.general.type') }}</p>
                            <p class="font-medium text-gray-900">
                                @switch($opportunity->type)
                                    @case('volunteer')
                                        {{ __('modules.participation.types.volunteer') }}
                                    @break

                                    @case('partner')
                                        {{ __('modules.participation.types.partner') }}
                                    @break

                                    @case('sponsor')
                                        {{ __('modules.participation.types.sponsor') }}
                                    @break
                                @endswitch
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">{{ __('modules.participation.fields.start_date') }}</p>
                            <p class="font-medium text-gray-900">
                                {{ $opportunity->start_date?->format('d/m/Y') ?? __('common.general.not_specified') }}
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">{{ __('modules.participation.fields.end_date') }}</p>
                            <p class="font-medium text-gray-900">
                                {{ $opportunity->end_date?->format('d/m/Y') ?? __('common.general.not_specified') }}
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">{{ __('modules.participation.status_label') }}</p>
                            <p class="font-medium text-gray-900">
                                <x-ui.badge :color="$opportunity->is_active ? 'green' : 'red'">
                                    {{ $opportunity->is_active ? __('common.status.active') : __('common.status.disabled') }}
                                </x-ui.badge>
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">{{ __('modules.participation.identifier') }}</p>
                            <p class="font-mono text-sm bg-gray-100 p-2 rounded">{{ $opportunity->slug }}</p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">{{ __('common.general.order') }}</p>
                            <p class="font-medium text-gray-900">{{ $opportunity->order }}</p>
                        </div>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </div>

    @include('components.delete-modal')
</x-layout.dashboard>
