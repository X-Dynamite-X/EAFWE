{{--
    Auth Layout
    لصفحات التسجيل والدخول
    يشمل: Logo + Card + Footer
--}}

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'تسجيل الدخول' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Vite CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gold-500 to-gold-700 text-gray-900 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white mb-2">EAFWE</h1>
            <p class="text-white/80">{{ $subtitle ?? 'نظام إدارة العضويات' }}</p>
        </div>

        {{-- Form Card --}}
        <x-ui.card class="shadow-2xl">
            {{ $slot }}
        </x-ui.card>

        {{-- Footer --}}
        <div class="text-center mt-6 text-white/80 text-sm">
            <p>© 2025 EAFWE. جميع الحقوق محفوظة</p>
        </div>
    </div>

    {{-- Scripts --}}
    @vite('resources/js/app.js')
</body>
</html>
