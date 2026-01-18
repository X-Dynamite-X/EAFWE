<div x-data="{ open: false }" class="w-full">
    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-gold-100 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-4 md:py-5">
            <div class="flex justify-between items-center gap-4">
                <a href="{{ route('home') }}" class="flex items-center group flex-shrink-0">
                    <span
                        class="text-lg md:text-xl lg:text-2xl font-black text-charcoal-900 group-hover:text-gold-500 transition-colors duration-300 leading-tight">
                        جمعية الإمارات لرائدات الأعمال
                    </span>
                </a>

                    <div class="hidden lg:flex items-center gap-1 xl:gap-2 flex-1 justify-center">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 text-charcoal-800 font-semibold text-sm hover:text-gold-500 transition-all duration-300 relative group">
                        الرئيسية
                        <span
                            class="absolute bottom-0 right-0 w-0 h-0.5 bg-gold-500 group-hover:w-full transition-all duration-300"></span>
                        <span
                            class="absolute bottom-0 right-0 h-0.5 w-full bg-gold-500 opacity-100 {{ request()->routeIs('home') ? '' : 'opacity-0' }} transition-opacity duration-300"></span>
                    </a>
                    <a href="{{ route('about.index') }}"
                        class="px-4 py-2 text-charcoal-800 font-semibold text-sm hover:text-gold-500 transition-all duration-300 relative group">
                        عن الجمعية
                        <span
                            class="absolute bottom-0 right-0 w-0 h-0.5 bg-gold-500 group-hover:w-full transition-all duration-300"></span>
                        <span
                            class="absolute bottom-0 right-0 h-0.5 w-full bg-gold-500 opacity-100 {{ request()->routeIs('about.*') ? '' : 'opacity-0' }} transition-opacity duration-300"></span>
                    </a>
                    <a href="{{ route('programs.index') }}"
                        class="px-4 py-2 text-charcoal-800 font-semibold text-sm hover:text-gold-500 transition-all duration-300 relative group">
                        مجالات العمل
                        <span
                            class="absolute bottom-0 right-0 w-0 h-0.5 bg-gold-500 group-hover:w-full transition-all duration-300"></span>
                        <span
                            class="absolute bottom-0 right-0 h-0.5 w-full bg-gold-500 opacity-100 {{ request()->routeIs('programs.*') ? '' : 'opacity-0' }} transition-opacity duration-300"></span>
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-4 py-2 text-charcoal-800 font-semibold text-sm hover:text-gold-500 transition-all duration-300 relative group">
                        تواصل معنا
                        <span
                            class="absolute bottom-0 right-0 w-0 h-0.5 bg-gold-500 group-hover:w-full transition-all duration-300"></span>
                        <span
                            class="absolute bottom-0 right-0 h-0.5 w-full bg-gold-500 opacity-100 {{ request()->routeIs('contact') ? '' : 'opacity-0' }} transition-opacity duration-300"></span>
                    </a>
                </div>

                <div class="hidden md:flex items-center gap-3 flex-shrink-0">
                    <x-language-theme-switcher />

                    @auth
                        <span
                            class="text-charcoal-700 dark:text-gray-300 text-xs lg:text-sm font-medium hidden lg:inline-block px-3 py-2">
                            {{ __('dashboard.nav.welcome') }} {{ Auth::user()->name }}
                        </span>
                        <button onclick="document.getElementById('logout-form').submit();"
                            class="px-4 lg:px-5 py-2 bg-gold-500 text-charcoal-900 font-semibold text-xs lg:text-sm rounded-full hover:bg-gold-600 transition-all duration-300 active:scale-95 shadow-md hover:shadow-lg">
                            {{ __('dashboard.nav.logout') }}
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-charcoal-800 font-semibold text-xs lg:text-sm hover:text-gold-500 transition-colors duration-300">
                            {{ __('website.home.hero.join_us') }}
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-4 lg:px-5 py-2 bg-gold-500 text-charcoal-900 font-semibold text-xs lg:text-sm rounded-full hover:bg-gold-600 transition-all duration-300 active:scale-95 shadow-md hover:shadow-lg">
                            {{ __('website.home.cta.register') }}
                        </a>
                    @endauth
                </div>

                {{-- Mobile Menu Button --}}
                <button @click="open = !open"
                    class="md:hidden p-2 text-charcoal-900 hover:text-gold-500 hover:bg-gold-50 rounded-lg transition-all duration-300 focus:outline-none"
                    :class="open ? 'bg-gold-100' : ''">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"
                            style="display: none;"></path>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"
                            style="display: none;"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-full" @keydown.escape.window="open = false"
        class="fixed inset-0 z-40 md:hidden">

        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/30" @click="open = false"></div>

        {{-- Sidebar Panel -    }}
        <div class="absolute right-0 top-0 bottom-0 w-80 bg-white shadow-2xl flex flex-col">
            {{-- Header --}}
            <div
                class="flex justify-between items-center px-6 py-6 border-b border-gold-100 bg-gradient-to-b from-gold-50/50 to-white">
                <span class="text-xl font-black text-charcoal-900">القائمة</span>
                <button @click="open = false"
                    class="p-2 text-charcoal-500 hover:text-gold-600 hover:bg-gold-100 rounded-lg transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            {{-- Navigation Links --}}
            <nav class="flex-1 overflow-y-auto px-6 py-8">
                <div class="flex flex-col gap-6">
                    <a href="{{ route('home') }}" @click="open = false"
                        class="text-2xl font-bold transition-all duration-300 pb-3 border-r-4 {{ request()->routeIs('home') ? 'text-gold-500 border-gold-500 pr-4' : 'text-charcoal-800 border-transparent pr-0 hover:text-gold-500' }}">
                        الرئيسية
                    </a>
                    <a href="{{ route('about.index') }}" @click="open = false"
                        class="text-2xl font-bold transition-all duration-300 pb-3 border-r-4 {{ request()->routeIs('about.*') ? 'text-gold-500 border-gold-500 pr-4' : 'text-charcoal-800 border-transparent pr-0 hover:text-gold-500' }}">
                        عن الجمعية
                    </a>
                    <a href="{{ route('programs.index') }}" @click="open = false"
                        class="text-2xl font-bold transition-all duration-300 pb-3 border-r-4 {{ request()->routeIs('programs.*') ? 'text-gold-500 border-gold-500 pr-4' : 'text-charcoal-800 border-transparent pr-0 hover:text-gold-500' }}">
                        مجالات العمل
                    </a>
                    <a href="{{ route('contact') }}" @click="open = false"
                        class="text-2xl font-bold transition-all duration-300 pb-3 border-r-4 {{ request()->routeIs('contact') ? 'text-gold-500 border-gold-500 pr-4' : 'text-charcoal-800 border-transparent pr-0 hover:text-gold-500' }}">
                        تواصل معنا
                    </a>
                </div>
            </nav>

            {{-- Auth Section --}}
            <div class="border-t border-gold-100 p-6 bg-gradient-to-t from-gold-50/50 to-white">
                @auth
                    <div class="space-y-4">
                        <p class="text-charcoal-700 text-center font-semibold">
                            مرحباً، <br><span class="text-gold-600 font-bold">{{ Auth::user()->name }}</span>
                        </p>
                        <a href="{{ route('dashboard') }}" @click="open = false"
                            class="block w-full text-center py-4 px-4 bg-gold-500 text-charcoal-900 font-bold rounded-xl hover:bg-gold-600 transition-all duration-300 active:scale-95 shadow-lg hover:shadow-xl">
                            لوحة التحكم
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full text-center py-3 px-4 border-2 border-gold-500 text-gold-600 font-bold rounded-xl hover:bg-gold-50 transition-all duration-300 active:scale-95">
                                تسجيل الخروج
                            </button>
                        </form>
                    </div>
                @else
                    <div class="space-y-4">
                        <a href="{{ route('register') }}" @click="open = false"
                            class="block w-full text-center py-4 px-4 bg-gold-500 text-charcoal-900 font-bold rounded-xl hover:bg-gold-600 transition-all duration-300 active:scale-95 shadow-lg hover:shadow-xl">
                            انضمي إلينا
                        </a>
                        <a href="{{ route('login') }}" @click="open = false"
                            class="block w-full text-center py-3 px-4 border-2 border-gold-500 text-gold-600 font-bold rounded-xl hover:bg-gold-50 transition-all duration-300 active:scale-95">
                            تسجيل الدخول
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
