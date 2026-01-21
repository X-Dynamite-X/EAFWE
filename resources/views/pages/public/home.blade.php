{{-- Home Page --}}

<x-layout.app title="الرئيسية">
    {{-- Hero Section --}}
    <section class="relative bg-charcoal-900 overflow-hidden py-32">
        {{-- Background Pattern Decoration --}}
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <div class="absolute top-0 right-0 w-96 h-96 bg-gold-500 rounded-full blur-3xl -mr-48 -mt-48"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-gold-500 rounded-full blur-3xl -ml-48 -mb-48"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="order-2 md:order-1">
                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight">
                        {{ __('website.home.hero.title_prefix') }} <br>
                        <span class="text-gold-500">{{ __('website.home.hero.title_suffix') }}</span>
                    </h1>
                    <p class="text-xl lg:text-2xl text-gold-100/90 mb-10 font-bold border-r-4 border-gold-500 pr-4">
                        {{ __('website.home.hero.subtitle') }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        @guest
                            <x-ui.button href="{{ route('register') }}" color="gold" size="lg"
                                class="rounded-full px-10 shadow-xl shadow-gold-500/20 w-full sm:w-auto">
                                {{ __('website.home.hero.join_us') }}
                            </x-ui.button>
                            <x-ui.button href="{{ route('about.index') }}" color="white" size="lg"
                                class="rounded-full px-10 bg-transparent! border-2! border-white! hover:bg-white! hover:text-charcoal-900! w-full sm:w-auto">
                                {{ __('website.home.hero.learn_more') }}
                            </x-ui.button>
                        @else
                            <x-ui.button href="{{ route('dashboard') }}" color="gold" size="lg"
                                class="rounded-full px-10 shadow-xl shadow-gold-500/20">
                                {{ __('website.home.hero.dashboard') }}
                            </x-ui.button>
                        @endguest
                    </div>
                </div>
                <div class="order-1 md:order-2 flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gold-500 rounded-full blur-2xl opacity-20 animate-pulse"></div>
                        {{-- Placeholder for logo/icon --}}
                        <div
                            class="w-64 h-64 lg:w-80 lg:h-80 bg-white/5 backdrop-blur-sm border border-gold-500/30 rounded-full flex items-center justify-center p-8 relative">
                            <svg class="w-32 h-32 text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Introduction Section --}}
    <section class="py-24 bg-white relative">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <span
                class="inline-block px-4 py-1 bg-gold-50  text-gold-600 font-bold rounded-full mb-6 italic tracking-wider uppercase">{{ __('website.home.intro.label') }}</span>
            <h2 class="text-3xl lg:text-4xl font-black text-charcoal-900  mb-10">
                {{ __('website.home.intro.title') }}</h2>
            <div
                class="bg-gold-50/30  p-8 lg:p-12 rounded-3xl border border-gold-100 ">
                <p class="text-lg lg:text-xl text-charcoal-800  leading-loose text-justify">
                    {{ __('website.home.intro.desc') }}
                </p>
                <div class="mt-10">
                    <a href="{{ route('about.index') }}"
                        class="text-gold-600 font-black hover:text-gold-700 transition-all group flex items-center justify-center gap-2 text-lg">
                        {{ __('website.home.intro.read_more') }}
                        <span class="group-hover:translate-x-1 transition-transform">←</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Vision/Mission Cards --}}
    <section class="py-24 bg-gold-50/20  relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
                {{-- Vision Card --}}
                <div class="bg-gold-500 text-white p-12 rounded-[2.5rem] shadow-2xl relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-8 transform group-hover:scale-110 transition-transform">
                        <svg class="w-16 h-16 text-blue-100 opacity-40" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-black mb-6 relative">{{ __('website.home.vision.title') }}</h3>
                    <p class="text-xl leading-relaxed opacity-95 relative">
                        {{ __('website.home.vision.desc') }}
                    </p>
                </div>

                {{-- Mission Card --}}
                <div
                    class="bg-charcoal-900  text-white p-12 rounded-[2.5rem] shadow-2xl relative overflow-hidden group border border-white/5">
                    <div class="absolute top-0 right-0 p-8 transform group-hover:scale-110 transition-transform">
                        <svg class="w-16 h-16 text-green-400 opacity-40" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-black mb-6 relative text-gold-500">{{ __('website.home.mission.title') }}
                    </h3>
                    <p class="text-xl leading-relaxed opacity-95 relative">
                        {{ __('website.home.mission.desc') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-32 relative">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div
                class="bg-white  p-12 lg:p-20 rounded-[3rem] shadow-xl border border-gold-100  relative overflow-hidden">
                <div
                    class="absolute top-0 left-0 w-32 h-32 bg-gold-50  rounded-br-full -ml-8 -mt-8 opacity-50">
                </div>
                <h2 class="text-4xl font-black text-charcoal-900  mb-6">
                    {{ __('website.home.cta.title') }}</h2>
                <p class="text-xl text-charcoal-700  mb-10 leading-relaxed">
                    {{ __('website.home.cta.desc') }}
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    @guest
                        <x-ui.button href="{{ route('register') }}" color="gold" size="lg"
                            class="rounded-full px-12 shadow-lg">{{ __('website.home.cta.register') }}</x-ui.button>
                        <x-ui.button href="{{ route('contact') }}" color="white" size="lg"
                            class="rounded-full px-12 shadow-lg">{{ __('website.home.cta.contact') }}</x-ui.button>
                    @else
                        <x-ui.button href="{{ route('dashboard') }}" color="gold" size="lg"
                            class="rounded-full px-12 shadow-lg">{{ __('website.home.cta.platform') }}</x-ui.button>
                    @endguest
                </div>
</x-layout.app>
