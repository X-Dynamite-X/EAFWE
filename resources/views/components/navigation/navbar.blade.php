{{-- Navbar Component --}}

<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            {{-- Logo --}}
            <div class="flex items-center">
                <h2 class="text-2xl font-bold text-gold-600">EAFWE</h2>
            </div>

            {{-- Nav Links (Desktop) --}}
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-gold-600 transition">الرئيسية</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-gold-600 transition">عن المنصة</a>
                <a href="{{ route('services') }}" class="text-gray-700 hover:text-gold-600 transition">الخدمات</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-gold-600 transition">التواصل</a>
            </div>

            {{-- Auth Buttons --}}
            <div class="flex items-center space-x-4">
                @auth
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                        <x-ui.button href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            color="gold" size="sm">
                            تسجيل الخروج
                        </x-ui.button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                @else
                    <x-ui.button href="{{ route('login') }}" color="gray" size="sm">دخول</x-ui.button>
                    <x-ui.button href="{{ route('register') }}" color="gold" size="sm">تسجيل جديد</x-ui.button>
                @endauth
            </div>

            {{-- Mobile Menu Button --}}
            <button class="md:hidden text-gray-700" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        // Mobile menu logic will go here
    }
</script>
