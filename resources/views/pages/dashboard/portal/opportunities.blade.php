<x-layout.dashboard title="{{ __('modules.portal.index') }}">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900 mb-2">{{ __('modules.portal.index') }}</h1>
        <p class="text-charcoal-600">{{ __('modules.portal.subtitle') }}</p>
    </div>

    @if ($opportunities->isEmpty())
        <div class="bg-white rounded-2xl p-12 text-center border border-gray-100">
            <div class="text-gray-400 mb-4">
                <i class="fas fa-briefcase text-5xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('modules.portal.no_opportunities') }}</h3>
            <p class="text-gray-600">{{ __('modules.portal.start_creating') }}</p>
        </div>
    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($opportunities as $opp)
                <x-ui.card>
                    @if ($opp->image_url)
                        <img src="{{ $opp->image_url }}" class="w-full h-48 object-cover rounded-xl mb-4"
                            alt="{{ $opp->title }}">
                    @else
                        <div class="w-full h-48 bg-gray-100 rounded-xl mb-4 flex items-center justify-center text-4xl">
                            @switch($opp->opportunity_type)
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

                                @default
                                    🌟
                            @endswitch
                        </div>
                    @endif
                    <span class="text-[10px] font-black uppercase text-gold-600 mb-2 block tracking-widest">
                        {{ __('modules.portal.types.' . $opp->opportunity_type) }}
                    </span>
                    <h3 class="text-xl font-black text-charcoal-900 mb-4">{{ $opp->title }}</h3>
                    <p class="text-sm text-charcoal-600 leading-relaxed mb-8 line-clamp-3">{{ $opp->description }}</p>
                    <x-ui.button href="{{ route('dashboard.portal-opportunities.show', $opp) }}" class="w-full"
                        size="sm" variant="outline">
                        {{ __('common.actions.view_details') }}
                    </x-ui.button>
                </x-ui.card>
            @endforeach
        </div>
    @endif
</x-layout.dashboard>
