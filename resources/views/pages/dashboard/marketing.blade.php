<x-layout.dashboard :title="__('dashboard.marketing.title')">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900  mb-2">{{ __('dashboard.marketing.title') }}</h1>
        <p class="text-charcoal-600">{{ __('dashboard.marketing.subtitle') }}</p>
    </div>

    <div class="grid lg:grid-cols-2 gap-8">
        {{-- Success Stories --}}
        <x-ui.card :title="__('dashboard.marketing.success_stories.title')">
            <div
                class="p-6 rounded-2xl bg-gold-50 border border-gold-100 mb-6">
                <h3 class="font-black text-charcoal-900  mb-2">
                    {{ __('dashboard.marketing.success_stories.call_to_action') }}</h3>
                <p class="text-sm text-charcoal-600 mb-6 leading-relaxed">
                    {{ __('dashboard.marketing.success_stories.description') }}</p>
                <x-ui.button size="sm">{{ __('dashboard.marketing.success_stories.button') }}</x-ui.button>
            </div>

            <div class="space-y-4">
                <p class="text-xs font-black text-gray-400 uppercase tracking-wider">
                    {{ __('dashboard.marketing.success_stories.previous_requests') }}</p>
                <div
                    class="flex items-center justify-between p-4 bg-white border border-gray-100 rounded-xl">
                    <div>
                        <p class="text-sm font-bold text-charcoal-900 ">
                            {{ __('dashboard.marketing.success_stories.example_project') }}</p>
                        <p class="text-xs text-gray-500">
                            {{ __('dashboard.marketing.success_stories.published_at') }}</p>
                    </div>
                    <span
                        class="px-2 py-1 bg-green-50 text-green-600 rounded text-[10px] font-black">{{ __('dashboard.marketing.success_stories.status_published') }}
                        ✅</span>
                </div>
            </div>
        </x-ui.card>

        {{-- Media Coverage --}}
        <x-ui.card :title="__('dashboard.marketing.media_coverage.title')">
            <div class="space-y-6">
                @php
                    $services = [
                        [
                            'title' => __('dashboard.marketing.services.opening_coverage.title'),
                            'desc' => __('dashboard.marketing.services.opening_coverage.desc'),
                            'icon' => '📸',
                        ],
                        [
                            'title' => __('dashboard.marketing.services.interview.title'),
                            'desc' => __('dashboard.marketing.services.interview.desc'),
                            'icon' => '🎬',
                        ],
                        [
                            'title' => __('dashboard.marketing.services.social_promotion.title'),
                            'desc' => __('dashboard.marketing.services.social_promotion.desc'),
                            'icon' => '📱',
                        ],
                    ];
                @endphp

                @foreach ($services as $svc)
                    <div
                        class="flex items-start gap-4 p-4 hover:bg-gray-50 rounded-2xl transition-colors cursor-pointer border border-transparent hover:border-gold-100">
                        <div class="text-3xl">{{ $svc['icon'] }}</div>
                        <div class="grow">
                            <h4 class="font-black text-charcoal-900  text-sm mb-1">{{ $svc['title'] }}
                            </h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">{{ $svc['desc'] }}
                            </p>
                        </div>
                        <x-ui.button size="sm" variant="outline"
                            class="shrink-0">{{ __('dashboard.marketing.services.request_button') }}</x-ui.button>
                    </div>
                @endforeach
            </div>
        </x-ui.card>

        {{-- Media Pack --}}
        <x-ui.card :title="__('dashboard.marketing.media_pack.title')" class="lg:col-span-2">
            <div class="flex flex-col md:flex-row items-center gap-8 py-4">
                <div class="w-full md:w-1/3 text-center md:text-right">
                    <div class="inline-block p-4 bg-gray-100 rounded-3xl mb-4">
                        <span class="text-5xl">🎨</span>
                    </div>
                    <h3 class="text-lg font-black text-charcoal-900  mb-2">
                        {{ __('dashboard.marketing.media_pack.logos_title') }}</h3>
                    <p class="text-sm text-charcoal-600">
                        {{ __('dashboard.marketing.media_pack.logos_desc') }}</p>
                </div>
                <div class="grow grid grid-cols-2 md:grid-cols-4 gap-4 w-full">
                    @php
                        $logos = [
                            __('dashboard.marketing.media_pack.logo_colored'),
                            __('dashboard.marketing.media_pack.logo_white'),
                            __('dashboard.marketing.media_pack.logo_gold'),
                            __('dashboard.marketing.media_pack.logo_vector'),
                        ];
                    @endphp
                    @foreach ($logos as $logo)
                        <div
                            class="p-4 border border-dashed border-gray-200 rounded-2xl text-center hover:bg-gray-50 transition-colors cursor-pointer group">
                            <div
                                class="text-xl mb-2 opacity-20 group-hover:opacity-100 grayscale group-hover:grayscale-0">
                                🖼️</div>
                            <p class="text-[10px] font-black text-charcoal-900 ">{{ $logo }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-ui.card>
    </div>
</x-layout.dashboard>
