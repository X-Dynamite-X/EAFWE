{{-- Reset Password Page --}}

<x-layout.auth title="إعادة تعيين كلمة المرور" subtitle="أدخل كلمة المرور الجديدة">
    @if($errors->any())
        <x-alerts.error>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alerts.error>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <x-ui.input
            type="email"
            name="email"
            label="البريد الإلكتروني"
            placeholder="you@example.com"
            value="{{ old('email') }}"
            required
        />

        <x-ui.input
            type="password"
            name="password"
            label="كلمة المرور الجديدة"
            placeholder="••••••••"
            required
        />

        <x-ui.input
            type="password"
            name="password_confirmation"
            label="تأكيد كلمة المرور"
            placeholder="••••••••"
            required
        />

        <x-ui.button type="submit" color="gold" class="w-full text-center">
            إعادة تعيين كلمة المرور
        </x-ui.button>

        <p class="mt-4 text-center text-sm text-gray-600">
            <a href="{{ route('login') }}" class="text-gold-600 font-semibold hover:text-gold-700">
                العودة لتسجيل الدخول
            </a>
        </p>
    </form>
</x-layout.auth>
