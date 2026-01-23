{{-- Contact Page --}}

<x-layout.app title="{{ __('website.contact.hero.title') }}">
    {{-- Hero Section --}}
    <div class="bg-charcoal-900 text-white py-24 relative overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="0.5" fill="none"
                    class="text-gold-500" />
                <circle cx="50" cy="50" r="30" stroke="currentColor" stroke-width="0.5" fill="none"
                    class="text-gold-500" />
            </svg>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">{{ __('website.contact.hero.title') }}</h1>
            <p class="text-xl text-gold-400 font-bold">{{ __('website.contact.hero.subtitle') }}</p>
        </div>
    </div>

    {{-- Contact Content --}}
    <div class="max-w-7xl mx-auto px-6 py-24">
        <div class="grid lg:grid-cols-3 gap-12 mb-24">
            {{-- Contact Cards --}}
            <div
                class="bg-white p-10 rounded-3xl shadow-sm border border-gold-100 flex flex-col items-center text-center group hover:border-gold-500 transition-colors">
                <div
                    class="w-16 h-16 bg-gold-50 text-gold-500 rounded-full flex items-center justify-center text-3xl mb-6 group-hover:bg-gold-500 group-hover:text-white transition-all">
                    📧
                </div>
                <h3 class="text-xl font-black mb-4 text-charcoal-900">{{ __('website.contact.cards.email.title') }}</h3>
                <p class="text-charcoal-600 mb-6">{{ __('website.contact.cards.email.desc') }}</p>
                <a href="mailto:info@eafwe.ae" class="text-gold-600 font-bold hover:text-gold-700">info@eafwe.ae</a>
            </div>

            <div
                class="bg-white p-10 rounded-3xl shadow-sm border border-gold-100 flex flex-col items-center text-center group hover:border-gold-500 transition-colors">
                <div
                    class="w-16 h-16 bg-gold-50 text-gold-500 rounded-full flex items-center justify-center text-3xl mb-6 group-hover:bg-gold-500 group-hover:text-white transition-all">
                    📍
                </div>
                <h3 class="text-xl font-black mb-4 text-charcoal-900">{{ __('website.contact.cards.location.title') }}
                </h3>
                <p class="text-charcoal-600 mb-6">{{ __('website.contact.cards.location.desc') }}</p>
                <span class="text-gold-600 font-bold">{{ __('website.contact.cards.location.value') }}</span>
            </div>

            <div
                class="bg-white p-10 rounded-3xl shadow-sm border border-gold-100 flex flex-col items-center text-center group hover:border-gold-500 transition-colors">
                <div
                    class="w-16 h-16 bg-gold-50 text-gold-500 rounded-full flex items-center justify-center text-3xl mb-6 group-hover:bg-gold-500 group-hover:text-white transition-all">
                    📸
                </div>
                <h3 class="text-xl font-black mb-4 text-charcoal-900">{{ __('website.contact.cards.social.title') }}
                </h3>
                <p class="text-charcoal-600 mb-6">{{ __('website.contact.cards.social.desc') }}</p>
                <a href="#" class="text-gold-600 font-bold hover:text-gold-700">@EAFWE_UAE</a>
            </div>
        </div>

        <div class="max-w-3xl mx-auto">
            <div class="bg-white p-10 lg:p-12 rounded-[2.5rem] shadow-xl border border-gold-50">
                <h2 class="text-3xl font-black text-charcoal-900 mb-8">{{ __('website.contact.form.title') }}</h2>
                <form action="#" method="POST" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label
                                class="block text-sm font-bold text-charcoal-700 mb-2">{{ __('website.contact.form.name') }}</label>
                            <input type="text"
                                class="w-full px-5 py-4 border border-gold-100 rounded-2xl focus:border-gold-500 transition-colors bg-gold-50/20"
                                placeholder="{{ __('website.contact.form.name_placeholder') }}">
                        </div>
                        <div>
                            <label
                                class="block text-sm font-bold text-charcoal-700 mb-2">{{ __('website.contact.form.email') }}</label>
                            <input type="email"
                                class="w-full px-5 py-4 border border-gold-100 rounded-2xl focus:border-gold-500 transition-colors bg-gold-50/20"
                                placeholder="example@mail.com">
                        </div>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold text-charcoal-700 mb-2">{{ __('website.contact.form.subject') }}</label>
                        <input type="text"
                            class="w-full px-5 py-4 border border-gold-100 rounded-2xl focus:border-gold-500 transition-colors bg-gold-50/20"
                            placeholder="{{ __('website.contact.form.subject_placeholder') }}">
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold text-charcoal-700 mb-2">{{ __('website.contact.form.message') }}</label>
                        <textarea rows="5"
                            class="w-full px-5 py-4 border border-gold-100 rounded-2xl focus:border-gold-500 transition-colors bg-gold-50/20"
                            placeholder="{{ __('website.contact.form.message_placeholder') }}"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-gold-500 text-white font-black py-5 rounded-2xl hover:bg-gold-600 transition-all shadow-lg shadow-gold-500/30">
                        {{ __('website.contact.form.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
