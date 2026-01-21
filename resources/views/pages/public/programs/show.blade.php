<x-layout.app :title="$entrepreneurship_program->title">

    {{-- Hero Section --}}
    <section class="relative h-[70vh] min-h-[500px] flex items-center overflow-hidden">

        {{-- Background Image --}}
        @if ($entrepreneurship_program->image_url)
            <img
                src="{{ $entrepreneurship_program->image_url }}"
                alt="{{ $entrepreneurship_program->title }}"
                class="absolute inset-0 w-full h-full object-cover">
        @endif

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b
            from-charcoal-900/90 via-charcoal-900/70 to-charcoal-900">
        </div>

        {{-- Hero Content --}}
        <div class="relative z-10 max-w-7xl mx-auto px-6 text-white">
            <div class="max-w-3xl">
                <span class="inline-block mb-4 text-sm font-bold tracking-widest text-gold-400">
                    {{ __('برنامج ريادة الأعمال') }}
                </span>

                <h1 class="text-4xl lg:text-6xl font-black leading-tight mb-6">
                    {{ $entrepreneurship_program->title }}
                </h1>

                @if ($entrepreneurship_program->description)
                    <p class="text-lg lg:text-xl text-gold-300 font-semibold border-r-4 border-gold-500 pr-4">
                        {{ $entrepreneurship_program->description }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="relative bg-gray-50 py-24">
        <div class="max-w-7xl mx-auto px-6">

            <div
                class="bg-white rounded-[3rem] shadow-2xl p-8 lg:p-16 border border-gold-100">

                {{-- Meta Info --}}
                <div class="flex flex-wrap items-center gap-6 mb-10 text-sm text-charcoal-600">
                    <span class="flex items-center gap-2">
                        📅 <span>{{ optional($entrepreneurship_program->created_at)->format('Y-m-d') }}</span>
                    </span>

                    <span class="flex items-center gap-2">
                        🚀 <span>{{ __('برنامج ريادة أعمال') }}</span>
                    </span>
                </div>

                {{-- Main Content --}}
                <article
                    class="prose prose-lg lg:prose-xl max-w-none
                           prose-headings:font-black
                           prose-headings:text-charcoal-900
                           prose-p:text-charcoal-800
                           prose-a:text-gold-600 hover:prose-a:text-gold-700">

                    {!! $entrepreneurship_program->content !!}
                </article>

            </div>

        </div>
    </section>

</x-layout.app>
