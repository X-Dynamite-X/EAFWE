{{-- Login Page --}}

<x-layout.auth title="تسجيل الدخول" subtitle="أدخل بيانات حسابك">
    @if($errors->any())
        <x-alerts.error>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alerts.error>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <x-ui.input
            type="email"
            name="email"
            label="البريد الإلكتروني"
            placeholder="you@example.com"
            required
        />

        <x-ui.input
            type="password"
            name="password"
            label="كلمة المرور"
            placeholder="••••••••"
            required
        />

        <div class="mb-4 flex items-center justify-between">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300">
                <span class="mr-2 text-sm text-gray-700">تذكرني</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm text-gold-600 hover:text-gold-700">
                هل نسيت كلمة المرور؟
            </a>
        </div>

        <x-ui.button type="submit" color="gold" class="w-full text-center">
            دخول
        </x-ui.button>

        <p class="mt-4 text-center text-sm text-gray-600">
            ليس لديك حساب؟
            <a href="{{ route('register') }}" class="text-gold-600 font-semibold hover:text-gold-700">
                سجل الآن
            </a>
        </p>
    </form>
</x-layout.auth>
