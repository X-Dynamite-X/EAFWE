<x-layout.app title="{{ __('website.programs.hero.title') }}">

    {{-- Hero Section --}}
    <section class="bg-charcoal-900 text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <span class="absolute -right-20 top-0 text-[18rem] font-black text-gold-500 select-none">
                {{ __('website.programs.hero.bg_text') }}
            </span>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">
                {{ __('website.programs.hero.title') }}
            </h1>
            <p class="text-xl text-gold-400 font-bold border-r-4 border-gold-500 pr-4">
                {{ __('website.programs.hero.subtitle') }}
            </p>
        </div>
    </section>

    @php
        $locale = app()->getLocale();
        $titleField = 'title_' . $locale;
        $descriptionField = 'description_' . $locale;
    @endphp

    {{-- Training Programs --}}
    <section class="max-w-7xl mx-auto px-6 py-24">
        <x-ui.section-header :title="__('website.programs.training.title')" :description="__('website.programs.training.desc')" />

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($training_programs as $program)
                <div
                    class="bg-white rounded-[2.5rem] p-8 shadow-xl border border-gold-100
                           hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 flex flex-col">

                    <div
                        class="w-16 h-16 bg-gold-50 text-gold-500 text-3xl flex items-center justify-center rounded-2xl mb-6">
                        🎓
                    </div>

                    <h3 class="text-2xl font-black text-charcoal-900 mb-4">
                        {{ $program->$titleField }}
                    </h3>

                    <p class="text-charcoal-700 mb-8 leading-relaxed grow line-clamp-3">
                        {{ $program->$descriptionField }}
                    </p>

                    <a href="{{ route('programs.training.show', $program) }}"
                        class="mt-auto inline-flex items-center gap-2 text-gold-600 font-bold hover:text-gold-700 transition">
                        {{ __('website.programs.view_details') }}
                        <span>→</span>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Entrepreneurship Programs --}}
    <section class="max-w-7xl mx-auto px-6 py-24 bg-gold-50 rounded-[3rem]">
        <x-ui.section-header :title="__('website.programs.entrepreneurship.title')" :description="__('website.programs.entrepreneurship.desc')" />

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($entrepreneurship_programs as $program)
                <div
                    class="bg-white rounded-[2.5rem] p-8 shadow-xl border border-gold-100
                           hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 flex flex-col">

                    <div
                        class="w-16 h-16 bg-gold-50 text-gold-500 text-3xl flex items-center justify-center rounded-2xl mb-6">
                        🚀
                    </div>

                    <h3 class="text-2xl font-black text-charcoal-900 mb-4">
                        {{ $program->$titleField }}
                    </h3>

                    <p class="text-charcoal-700 mb-8 leading-relaxed grow line-clamp-3">
                        {{ $program->$descriptionField }}
                    </p>

                    <a href="{{ route('programs.entrepreneurship.show', $program) }}"
                        class="mt-auto inline-flex items-center gap-2 text-gold-600 font-bold hover:text-gold-700 transition">
                        {{ __('website.programs.view_details') }}
                        <span>→</span>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

</x-layout.app>
