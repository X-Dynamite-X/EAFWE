<x-layout.dashboard title="{{ __('modules.portal.volunteering_and_initiatives') }}">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900 mb-2">{{ __('modules.portal.volunteering_and_initiatives') }}
        </h1>
        <p class="text-charcoal-600">{{ __('modules.portal.volunteering_subtitle') }}</p>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        {{-- Volunteer Stats --}}
        <div class="lg:col-span-1 space-y-6">
            <x-ui.card title="{{ __('modules.portal.my_volunteer_profile') }}">
                <div class="text-center py-6">
                    <div
                        class="w-24 h-24 bg-gold-500 text-charcoal-900 rounded-full flex items-center justify-center text-3xl font-black mx-auto mb-4">
                        15
                    </div>
                    <p class="font-black text-charcoal-900">15 {{ __('modules.portal.volunteer_hours') }}</p>
                    <p class="text-xs text-charcoal-400">{{ __('modules.portal.since_joining') }}</p>
                </div>
                <div class="mt-6 p-4 bg-gray-50 rounded-2xl">
                    <p class="text-xs text-charcoal-600 text-center">أنتِ على بعد 5 ساعات من الحصول على "وسام العطاء"
                    </p>
                </div>
            </x-ui.card>
        </div>

        {{-- Active Volunteering Initiatives --}}
        <div class="lg:col-span-2 space-y-6">
            <x-ui.card title="{{ __('modules.portal.active_initiatives') }}">
                @if ($volunteering->isEmpty())
                    <div class="py-12 text-center text-gray-400">
                        <i class="fas fa-hand-holding-heart text-5xl mb-4"></i>
                        <p>{{ __('modules.portal.no_opportunities') }}</p>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach ($volunteering as $item)
                            <div class="p-6 rounded-2xl border border-gray-100 hover:border-gold-300 transition-colors">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-black text-charcoal-900">{{ $item->title }}</h3>
                                    <span class="text-xs px-3 py-1 bg-blue-50 text-blue-600 rounded-full font-bold">
                                        {{ __('modules.portal.types.volunteer') }}
                                    </span>
                                </div>
                                <p class="text-sm text-charcoal-600 mb-6 leading-relaxed">{{ $item->description }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-charcoal-400 flex items-center gap-1">
                                        <span>⏱️</span> {{ __('common.time.available') }}
                                    </span>
                                    <x-ui.button href="{{ route('dashboard.portal-opportunities.show', $item) }}"
                                        size="sm">
                                        {{ __('modules.portal.join_as_volunteer') }}
                                    </x-ui.button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>
