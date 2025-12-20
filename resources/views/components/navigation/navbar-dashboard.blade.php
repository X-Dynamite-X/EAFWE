{{-- Dashboard Top Navbar --}}

<nav class="bg-white shadow-sm border-b border-gray-200">
    <div class="px-6 py-4 flex justify-between items-center">
        {{-- Page Title --}}
        <h1 class="text-2xl font-bold text-gray-900">{{ $title ?? 'لوحة التحكم' }}</h1>

        {{-- Right Side: User Menu --}}
        <div class="flex items-center space-x-6">
            {{-- Notifications --}}
            <button class="relative text-gray-600 hover:text-gray-900 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
            </button>

            {{-- User Dropdown --}}
            <div class="flex items-center space-x-3">
                <div class="text-right">
                    <p class="font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-500">{{ Auth::user()->roles->first()->name ?? 'مستخدم' }}</p>
                </div>
                <button class="w-10 h-10 bg-gold-600 text-white rounded-full flex items-center justify-center font-bold hover:bg-gold-700 transition">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </button>
            </div>
        </div>
    </div>
</nav>
