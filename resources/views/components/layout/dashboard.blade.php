@props([
    'show_sidebar' => true,
])
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" x-data="{ sidebarOpen: false }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'لوحة التحكم' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Vite CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-charcoal-900 antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        @if ($show_sidebar == true)
        <x-navigation.sidebar />
        @endif


        {{-- Main Content --}}
        <div class="flex flex-col flex-1 min-w-0 overflow-hidden">
            {{-- Top Navbar --}}
            <x-navigation.navbar-dashboard :title="$title ?? ''" />

            {{-- Content Area --}}
            <main class="flex-1 overflow-auto p-6 bg-gray-50/30">
                {{ $slot }}
            </main>
        </div>

        {{-- Mobile Overlay --}}
        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition:enter="transition opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-charcoal-900/50 z-40 lg:hidden">
        </div>
    </div>

    <x-ui.alert />

    {{-- Scripts --}}
    @vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        // Ensure jQuery is loaded before executing stacked scripts
        if (typeof jQuery === 'undefined') {
            console.warn('jQuery is not loaded. Some functionality may not work.');
        }
    </script>
    {{ $scripts ?? '' }}
    @stack('scripts')
</body>

</html>
