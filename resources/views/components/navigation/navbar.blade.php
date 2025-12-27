<div x-data="{ open: false }">
    <nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-gold-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center group">
                    <span
                        class="text-xl md:text-2xl font-black text-charcoal-900 group-hover:text-gold-500 transition-colors">جمعية
                        الإمارات لرائدات الأعمال</span>
                </a>

                {{-- Desktop Nav Links --}}
                <div class="hidden md:flex space-x-10 space-x-reverse">
                    <a href="{{ route('home') }}"
                        class="text-charcoal-800 font-medium hover:text-gold-500 transition-colors  py-2 border-b-2 {{ request()->routeIs('home') ? 'border-gold-500 text-gold-500' : 'border-transparent' }}">الرئيسية</a>
                    <a href="{{ route('about') }}"
                        class="text-charcoal-800 font-medium hover:text-gold-500 transition-colors  py-2 border-b-2 {{ request()->routeIs('about') ? 'border-gold-500 text-gold-500' : 'border-transparent' }}">عن
                        الجمعية</a>
                    <a href="{{ route('services') }}"
                        class="text-charcoal-800 font-medium hover:text-gold-500 transition-colors mx-6 py-2 border-b-2 {{ request()->routeIs('services') ? 'border-gold-500 text-gold-500' : 'border-transparent' }}">مجالات
                        العمل</a>
                    <a href="{{ route('contact') }}"
                        class="text-charcoal-800 font-medium hover:text-gold-500 transition-colors px-2 py-2 border-b-2 {{ request()->routeIs('contact') ? 'border-gold-500 text-gold-500' : 'border-transparent' }}">تواصل
                        معنا</a>
                </div>

                {{-- Desktop Auth Buttons --}}
                <div class="hidden md:flex items-center gap-4">
                    @auth
                        <div class="flex items-center gap-4">
                            <span class="text-charcoal-800 text-sm hidden lg:inline-block">مرحباً،
                                {{ Auth::user()->name }}</span>
                            <x-ui.button href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                color="gold" size="sm" class="rounded-full px-6">
                                تسجيل الخروج
                            </x-ui.button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    @else
                        <div class="flex items-center gap-2">
                            <a href="{{ route('login') }}"
                                class="text-charcoal-800 hover:text-gold-500 px-4 py-2 text-sm font-semibold transition">دخول</a>
                            <x-ui.button href="{{ route('register') }}" color="gold" size="sm"
                                class="rounded-full px-6 shadow-md">انضمي إلينا</x-ui.button>
                        </div>
                    @endauth
                </div>

                {{-- Mobile Menu Button --}}
                <button class="md:hidden text-charcoal-900 focus:outline-none" @click="open = !open">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- Mobile Sidebar (Overlay) - Moved outside sticky nav --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-[-10px]" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-[-10px]" class="fixed inset-0 z-[60] md:hidden bg-white"
        @keydown.escape.window="open = false" style="display: none;">

        <div class="flex flex-col h-full">
            {{-- Header --}}
            <div class="px-6 py-8 border-b border-gold-50 flex justify-between items-center bg-gray-50/50">
                <span class="text-2xl font-black text-charcoal-900">القائمة</span>
                <button @click="open = false" class="text-charcoal-500 hover:text-gold-600 transition-colors p-2">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            {{-- Links --}}
            <div class="flex-1 overflow-y-auto py-12 px-8">
                <nav class="flex flex-col space-y-8">
                    <a href="{{ route('home') }}" @click="open = false"
                        class="text-3xl font-black transition-all duration-300 {{ request()->routeIs('home') ? 'text-gold-500 pr-4 border-r-4 border-gold-500' : 'text-charcoal-800 hover:text-gold-500 pr-0 border-r-0 border-transparent' }}">الرئيسية</a>
                    <a href="{{ route('about') }}" @click="open = false"
                        class="text-3xl font-black transition-all duration-300 {{ request()->routeIs('about') ? 'text-gold-500 pr-4 border-r-4 border-gold-500' : 'text-charcoal-800 hover:text-gold-500 pr-0 border-r-0 border-transparent' }}">عن
                        الجمعية</a>
                    <a href="{{ route('services') }}" @click="open = false"
                        class="text-3xl font-black transition-all duration-300 {{ request()->routeIs('services') ? 'text-gold-500 pr-4 border-r-4 border-gold-500' : 'text-charcoal-800 hover:text-gold-500 pr-0 border-r-0 border-transparent' }}">مجالات
                        العمل</a>
                    <a href="{{ route('contact') }}" @click="open = false"
                        class="text-3xl font-black transition-all duration-300 {{ request()->routeIs('contact') ? 'text-gold-500 pr-4 border-r-4 border-gold-500' : 'text-charcoal-800 hover:text-gold-500 pr-0 border-r-0 border-transparent' }}">تواصل
                        معنا</a>
                </nav>

                <div class="mt-16 pt-10 border-t border-gold-100">
                    @auth
                        <div class="space-y-6">
                            <p class="text-charcoal-600 text-lg">مرحباً، <span
                                    class="font-black text-charcoal-900">{{ Auth::user()->name }}</span></p>
                            <a href="{{ route('dashboard') }}" @click="open = false"
                                class="block w-full text-center bg-gold-500 text-charcoal-950 px-6 py-5 rounded-2xl font-black text-xl shadow-xl shadow-gold-500/20 active:scale-95 transition-transform">لوحة
                                التحكم</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full text-center border-2 border-gold-500 text-gold-600 px-6 py-4 rounded-2xl font-black text-xl active:scale-95 transition-transform">تسجيل
                                    الخروج</button>
                            </form>
                        </div>
                    @else
                        <div class="space-y-6">
                            <a href="{{ route('register') }}" @click="open = false"
                                class="block w-full text-center bg-gold-500 text-charcoal-950 px-6 py-5 rounded-2xl font-black text-xl shadow-xl shadow-gold-500/20 active:scale-95 transition-transform">انضمي
                                إلينا</a>
                            <a href="{{ route('login') }}" @click="open = false"
                                class="block w-full text-center border-2 border-gold-500 text-gold-600 px-6 py-4 rounded-2xl font-black text-xl active:scale-95 transition-transform">تسجيل
                                الدخول</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
