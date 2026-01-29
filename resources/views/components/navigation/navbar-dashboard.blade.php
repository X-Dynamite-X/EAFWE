{{-- Dashboard Top Navbar --}}
<nav
    class="bg-gradient-to-r from-charcoal-900 via-charcoal-900 to-charcoal-800 shadow-lg border-b border-gold-600/20  sticky top-0 z-40">
    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-3 sm:py-4">
        <div class="flex items-center justify-between gap-3 sm:gap-4 lg:gap-6">

            {{-- Left Side: Toggle & Title --}}
            <div class="flex items-center gap-2 sm:gap-3 flex-1 min-w-0">
                {{-- Mobile Menu Toggle --}}
                <button @click="sidebarOpen = !sidebarOpen"
                    class="lg:hidden flex-shrink-0 p-2 text-gold-400 hover:text-gold-300 hover:bg-gold-500/10 rounded-lg transition-all duration-300"
                    :class="sidebarOpen ? 'bg-gold-500/20' : ''">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                {{-- Title --}}
                <h1 class="text-base sm:text-lg lg:text-2xl font-black text-gold-400 truncate">
                    {{ $title ?? __('dashboard.sidebar.dashboard') }}
                </h1>
            </div>

            {{-- Right Side: User Menu --}}
            <div class="flex items-center gap-2 sm:gap-3 lg:gap-6 flex-shrink-0">

                {{-- Language and Theme Switcher --}}
                <x-language-theme-switcher />

                {{-- Notifications Icon --}}
                {{-- <button
                    class="relative flex-shrink-0 p-2 text-gold-400 hover:text-gold-300 hover:bg-gold-500/10 rounded-lg transition-all duration-300 group"
                    title="{{ __('dashboard.navbar.notifications') }}">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                    <span class="absolute top-1 right-1 h-2 w-2 bg-red-500 rounded-full animate-pulse"></span>
                </button> --}}

                {{-- Divider --}}
                <div class="hidden md:block h-6 w-px bg-gold-600/20"></div>

                {{-- User Profile Section --}}
                @auth
                    <div x-data="{ userMenuOpen: false }" class="relative">
                        <button @click="userMenuOpen = !userMenuOpen"
                            class="flex items-center gap-2 sm:gap-3 px-2 sm:px-3 py-2 hover:bg-gold-500/10 rounded-lg transition-all duration-300">

                            {{-- Avatar --}}
                            <div
                                class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 bg-gold-500 text-charcoal-900 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm hover:bg-gold-400 transition-all duration-300">
                                {{ mb_substr(Auth::user()->name, 0, 1, 'UTF-8') }}
                            </div>

                            {{-- User Info (Hidden on mobile) --}}
                            <div class="hidden md:flex md:flex-col gap-1 min-w-0 text-right">
                                <p class="text-xs sm:text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gold-300 truncate">
                                    {{ Auth::user()->roles->first()->name ?? __('dashboard.navbar.default_role') }}</p>
                            </div>

                            {{-- Dropdown Arrow --}}
                            <svg class="hidden md:block flex-shrink-0 w-4 h-4 text-gold-400 transition-transform duration-300"
                                :class="userMenuOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </button>

                        {{-- User Dropdown Menu --}}
                        <div x-show="userMenuOpen" @click.away="userMenuOpen = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                            class="absolute left-0 mt-2 w-48 sm:w-56 bg-charcoal-800 border border-gold-600/30 rounded-lg shadow-2xl overflow-hidden z-50">

                            {{-- Profile Info --}}
                            <div
                                class="px-3 sm:px-4 py-3 sm:py-4 bg-gradient-to-r from-gold-600/10 to-gold-500/5 border-b border-gold-600/20">
                                <p class="font-bold text-white text-xs sm:text-sm truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gold-300 mt-1 truncate">
                                    {{ Auth::user()->roles->first()->name ?? __('dashboard.navbar.default_role') }}</p>
                            </div>

                            {{-- Menu Items --}}
                            <div class="py-2">
                                <a href="{{ route('member.profile') }}"
                                    class="w-full flex items-center gap-2 sm:gap-3 px-3 sm:px-4 py-2 sm:py-3 text-gold-200 hover:bg-gold-500/10 transition-all duration-300 text-xs sm:text-sm">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 5v2m-4 4v2m4 4v2M9 5h.01M5 9h.01M9 15h.01M5 5a4 4 0 110 8 4 4 0 010-8zm6 10a4 4 0 110 8 4 4 0 010-8z">
                                        </path>
                                    </svg>
                                    <span>{{ __('dashboard.sidebar.member_card') }}</span>
                                </a>
                                <a href="{{ route('profile.edit') }}"
                                    class="w-full flex items-center gap-2 sm:gap-3 px-3 sm:px-4 py-2 sm:py-3 text-gold-200 hover:bg-gold-500/10 transition-all duration-300 text-xs sm:text-sm">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ __('dashboard.sidebar.profile') }}</span>
                                </a>
                                {{-- <a href="{{ route('settings.index') }}"
                                class="w-full flex items-center gap-2 sm:gap-3 px-3 sm:px-4 py-2 sm:py-3 text-gold-200 hover:bg-gold-500/10 transition-all duration-300 text-xs sm:text-sm">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>{{ __('dashboard.sidebar.settings') }}</span>
                            </a> --}}
                            </div>

                            {{-- Divider --}}
                            <div class="h-px bg-gold-600/20"></div>

                            {{-- Logout --}}
                            <form action="{{ route('logout') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-2 sm:gap-3 px-3 sm:px-4 py-2 sm:py-3 text-red-400 hover:bg-red-500/10 transition-all duration-300 text-xs sm:text-sm font-semibold">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    <span>{{ __('dashboard.sidebar.logout') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
