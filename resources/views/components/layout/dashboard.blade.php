{{--
    Dashboard Layout
    لوحة التحكم
    يشمل: Sidebar + Top Navbar + Content
--}}

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'لوحة التحكم' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Vite CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="flex h-screen">
        {{-- Sidebar --}}
        <x-navigation.sidebar />

        {{-- Main Content --}}
        <div class="flex flex-col flex-1">
            {{-- Top Navbar --}}
            <x-navigation.navbar-dashboard />

            {{-- Content Area --}}
            <main class="flex-1 overflow-auto p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    {{-- Scripts --}}
    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>
