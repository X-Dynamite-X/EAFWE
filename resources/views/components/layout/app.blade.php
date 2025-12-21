{{--
    Main App Layout
    للصفحات العامة
    يشمل: Navbar + Footer + Content
--}}

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'EAFWE' }}</title>

    {{-- Vite CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

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
