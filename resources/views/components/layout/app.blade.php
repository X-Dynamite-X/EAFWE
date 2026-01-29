{{--
    Main App Layout
    للصفحات العامة
    يشمل: Navbar + Footer + Content
--}}

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'EAFWE' }}</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset(config('app.logo')) }}">

    {{-- Vite CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 transition-colors duration-300">

    {{-- Navbar --}}
    <x-navigation.navbar />

    {{-- Main Content --}}
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-navigation.footer />
</body>

</html>
