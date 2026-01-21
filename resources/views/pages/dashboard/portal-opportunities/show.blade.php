<x-layout.dashboard title="{{ __('common.actions.view') }} الفرصة">
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-lg shadow-sm p-6 border border-cyan-100 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-cyan-100 rounded-lg">
                            <i class="fas fa-briefcase text-cyan-600"></i>
                        </div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $opportunity->title }}</h1>
                    </div>
                    <p class="text-gray-600 text-sm md:text-base mt-1 ml-0 md:ml-11">{{ __('common.actions.view') }} تفاصيل الفرصة والمعلومات الهامة
                    </p>
                </div>
                @can('manage portal opportunities')
                    <div class="flex gap-2 flex-wrap md:flex-nowrap">
                        <a href="{{ route('dashboard.portal-opportunities.edit', $opportunity) }}"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors text-sm">
                            <i class="fas fa-edit"></i> {{ __('common.actions.edit') }}
                        </a>
                        <button type="button"
                            onclick="openDeleteModal('{{ $opportunity->id }}', '{{ $opportunity->title }}', '{{ route('dashboard.portal-opportunities.destroy', $opportunity) }}')"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors text-sm">
                            <i class="fas fa-trash"></i> {{ __('common.actions.delete') }}
                        </button>
                    </div>
                @endcan
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <x-ui.card>
                    @if ($opportunity->image_url)
                        <div class="mb-6 rounded-lg overflow-hidden shadow-lg">
                            <img src="{{ $opportunity->image_url }}" class="w-full h-80 object-cover"
                                alt="{{ $opportunity->title }}">
                        </div>
                    @endif

                    <div class="mb-4">
                        <div class="flex flex-wrap gap-2 mb-4">
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
                            <x-ui.badge
                                color="{{ $opportunity->status == 'active' ? 'green' : ($opportunity->status == 'closed' ? 'red' : 'yellow') }}">
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
                    </div>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">{{ $opportunity->description }}</p>

                    <div class="prose prose-sm max-w-none mb-6 text-gray-700">
                        {!! $opportunity->content !!}
                    </div>

                    <div class="border-t border-gray-200 pt-4 text-sm text-gray-600">
                        <i class="fas fa-clock"></i>
                        تم ال{{ __('common.actions.create') }}: {{ $opportunity->created_at->format('d/m/Y H:i') }}
                        @if ($opportunity->updated_at != $opportunity->created_at)
                            | {{ __('common.time.updated_at') }}: {{ $opportunity->updated_at->format('d/m/Y H:i') }}
                        @endif
                    </div>
                </x-ui.card>

                <div class="mt-6">
                    <x-ui.button href="{{ route('dashboard.portal-opportunities.index') }}" color="gray">
                        <i class="fas fa-arrow-right"></i> {{ __('common.actions.back') }}
                    </x-ui.button>
                </div>
            </div>

            <div class="lg:col-span-1">
                <x-ui.card>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">معلومات الفرصة</h3>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-600">{{ __('common.general.type') }}</p>
                            <p class="font-medium text-gray-900">
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
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">الحالة</p>
                            <p class="font-medium text-gray-900">
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
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">{{ __('common.status.published') }}</p>
                            <p class="font-medium text-gray-900">
                                {{ $opportunity->is_active  ? __('common.general.yes') : __('common.general.no') }}
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">المعرف</p>
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
