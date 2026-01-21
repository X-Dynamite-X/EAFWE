<x-layout.app :title="__('website.history.title')">
    {{-- Hero Section --}}
    <div class="bg-charcoal-900 text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute transform -rotate-12 -right-20 top-0">
                <span class="text-[20rem] font-bold text-gold-500">History</span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">{{ __('website.history.hero.title') }}</h1>
            <p class="text-xl text-gold-400 font-bold border-r-4 border-gold-500 pr-4">
                {{ __('website.history.hero.subtitle') }}</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-24 dark:bg-gray-900">
        <x-ui.section-header :title="__('website.history.story.title')" :description="__('website.history.story.desc')" />

        <div class="relative">
            {{-- Timeline Vertical Line --}}
            <div
                class="absolute right-0 lg:right-1/2 top-0 bottom-0 w-1 bg-gold-100 dark:bg-gold-500/20 transform translate-x-1/2">
            </div>

            @php
                $milestones = [
                    [
                        'year' => __('website.history.timeline.founding.year'),
                        'title' => __('website.history.timeline.founding.title'),
                        'desc' => __('website.history.timeline.founding.desc'),
                    ],
                    [
                        'year' => __('website.history.timeline.expansion.year'),
                        'title' => __('website.history.timeline.expansion.title'),
                        'desc' => __('website.history.timeline.expansion.desc'),
                    ],
                    [
                        'year' => __('website.history.timeline.leadership.year'),
                        'title' => __('website.history.timeline.leadership.title'),
                        'desc' => __('website.history.timeline.leadership.desc'),
                    ],
                    [
                        'year' => __('website.history.timeline.today.year'),
                        'title' => __('website.history.timeline.today.title'),
                        'desc' => __('website.history.timeline.today.desc'),
                    ],
                ];
            @endphp

            <div class="space-y-16">
                @foreach ($milestones as $index => $item)
                    <div
                        class="relative flex flex-col lg:flex-row {{ $index % 2 == 0 ? 'lg:flex-row-reverse' : '' }} items-center text-right">
                        {{-- Timeline Dot --}}
                        <div
                            class="absolute right-0 lg:right-1/2 w-4 h-4 bg-gold-500 rounded-full border-4 border-white dark:border-gray-900 transform translate-x-1/2 shadow-lg">
                        </div>

                        <div class="w-full lg:w-1/2 p-8 lg:p-12">
                            <div
                                class="bg-white dark:bg-gray-800 p-10 rounded-[2.5rem] shadow-xl border border-gold-100 dark:border-gold-500/20 hover:border-gold-300 dark:hover:border-gold-500/40 transition-colors">
                                <span class="text-gold-500 font-black text-2xl mb-2 block">{{ $item['year'] }}</span>
                                <h3 class="text-2xl font-black text-charcoal-900  mb-4">
                                    {{ $item['title'] }}</h3>
                                <p class="text-charcoal-700 dark:text-gray-300 leading-relaxed text-lg">
                                    {{ $item['desc'] }}</p>
                            </div>
                        </div>
                        <div class="hidden lg:block lg:w-1/2"></div>
                    </div>
                @endforeach
            </div>
        </div>

        <div
            class="mt-24 p-12 bg-gold-50 dark:bg-gold-500/5 rounded-[3rem] border border-gold-200 dark:border-gold-500/10">
            <h2 class="text-3xl font-black text-charcoal-900  mb-6 text-center">
                {{ __('website.history.role.title') }}</h2>
            <div class="grid md:grid-cols-2 gap-12 text-lg leading-relaxed text-charcoal-800 dark:text-gray-300">
                <p>
                    {{ __('website.history.role.p1') }}
                </p>
                <p>
                    {{ __('website.history.role.p2') }}
                </p>
            </div>
        </div>
    </div>
</x-layout.app>
