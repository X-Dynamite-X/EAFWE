<x-layout.dashboard title="{{ $opportunity->title }}">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            @if ($opportunity->image_url)
                <img src="{{ $opportunity->image_url }}" alt="{{ $opportunity->title }}" class="w-full h-80 object-cover">
            @else
                <div class="w-full h-40 bg-gray-100 flex items-center justify-center text-5xl">
                    @switch($opportunity->opportunity_type)
                        @case('business')
                            💼
                        @break

                        @case('partnership')
                            🤝
                        @break

                        @case('funding')
                            💰
                        @break

                        @case('investment')
                            💎
                        @break

                        @case('volunteer')
                            ❤️
                        @break

                        @default
                            🌟
                    @endswitch
                </div>
            @endif

            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <div class="flex gap-2 mb-2">
                            <x-ui.badge color="purple">
                                {{ __('modules.portal.types.' . $opportunity->opportunity_type) }}
                            </x-ui.badge>
                            <x-ui.badge :color="$opportunity->is_active ? 'green' : 'gray'">
                                {{ $opportunity->is_active ? __('common.status.active') : __('common.status.disabled') }}
                            </x-ui.badge>
                        </div>
                        <h1 class="text-3xl font-black text-charcoal-900 mb-2">{{ $opportunity->title }}</h1>
                        <div class="text-sm text-gray-500 flex items-center gap-4">
                            <span class="flex items-center gap-1">
                                <i class="far fa-calendar-alt"></i>
                                {{ __('common.time.created_at') }}: {{ $opportunity->created_at->format('Y-m-d') }}
                            </span>
                        </div>
                    </div>
                    @can('manage portal opportunities')
                        <x-ui.button href="{{ route('dashboard.portal-opportunities.edit', $opportunity) }}" color="gray">
                            <i class="fas fa-edit"></i> {{ __('common.actions.edit') }}
                        </x-ui.button>
                    @endcan
                </div>

                <div class="prose max-w-none text-charcoal-600 mb-8">
                    <h3 class="text-lg font-bold text-charcoal-900 mb-4 border-b pb-2">
                        {{ __('common.general.description') }}</h3>
                    <p class="whitespace-pre-wrap mb-8 text-lg leading-relaxed">{{ $opportunity->description }}</p>

                    <h3 class="text-lg font-bold text-charcoal-900 mb-4 border-b pb-2">
                        {{ __('modules.portal.fields.content') }}</h3>
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                        {!! $opportunity->content !!}
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-gray-100 flex justify-between items-center">
                    <x-ui.button href="{{ url()->previous() }}" variant="outline">
                        <i class="fas fa-arrow-right"></i> {{ __('common.actions.back') }}
                    </x-ui.button>

                    @if ($opportunity->opportunity_type == 'volunteer')
                        <x-ui.button color="primary">
                            {{ __('modules.portal.join_as_volunteer') }}
                        </x-ui.button>
                    @else
                        <x-ui.button color="primary">
                            {{ __('common.actions.apply') }}
                        </x-ui.button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout.dashboard>
