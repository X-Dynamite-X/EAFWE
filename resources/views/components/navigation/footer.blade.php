{{-- Footer Component --}}

<footer class="bg-charcoal-900 text-gold-50 py-16 border-t border-gold-500/10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-12 mb-12">
            {{-- About --}}
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-gold-50 text-xl font-bold mb-6">{{ __('website.footer.about.title') }}</h3>
                <p class="text-gold-100/80 leading-relaxed mb-6">
                    {{ __('website.footer.about.desc') }}
                </p>
                <div class="flex items-center gap-4">
                    <a href="#"
                        class="w-10 h-10 border border-gold-500/30 rounded-full flex items-center justify-center hover:bg-gold-500 hover:text-charcoal-900 transition-all duration-300">
                        <span class="sr-only">Instagram</span>
                        📸
                    </a>
                </div>
            </div>

            {{-- Links --}}
            <div>
                <h3 class="text-gold-50 font-bold mb-6">{{ __('website.footer.links.title') }}</h3>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ route('home') }}"
                            class="hover:text-gold-400 transition-colors">{{ __('website.footer.links.home') }}</a></li>
                    <li><a href="{{ route('about.index') }}"
                            class="hover:text-gold-400 transition-colors">{{ __('website.footer.links.about') }}</a>
                    </li>
                    <li><a href="{{ route('programs.index') }}"
                            class="hover:text-gold-400 transition-colors">{{ __('website.footer.links.programs') }}</a>
                    </li>
                    <li><a href="{{ route('contact') }}"
                            class="hover:text-gold-400 transition-colors">{{ __('website.footer.links.contact') }}</a>
                    </li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="text-white font-bold mb-6">{{ __('website.footer.contact.title') }}</h3>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-center gap-3">
                        <span>📧</span>
                        <a href="mailto:info@eafwe.ae" class="hover:text-gold-400 transition-colors">info@eafwe.ae</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <span>📍</span>
                        <span>{{ __('website.footer.contact.location') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom --}}
        <div
            class="border-t border-gold-500/20 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gold-100/50">
            <p>{{ __('website.footer.copyright') }}</p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="#"
                    class="hover:text-gold-400 transition-colors">{{ __('website.footer.legal.privacy') }}</a>
                <a href="#"
                    class="hover:text-gold-400 transition-colors">{{ __('website.footer.legal.terms') }}</a>
            </div>
        </div>
    </div>
</footer>
