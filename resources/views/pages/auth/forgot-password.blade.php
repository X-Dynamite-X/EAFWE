{{-- Forgot Password Page --}}

<x-layout.auth title="هل نسيت كلمة المرور؟" subtitle="أدخل بريدك الإلكتروني لتلقي رابط إعادة التعيين">
    @if($errors->any())
        <x-alerts.error>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alerts.error>
    @endif

    @if(session('status'))
        <x-alerts.success>
            {{ session('status') }}
        </x-alerts.success>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <x-ui.input
            type="email"
            name="email"
            label="البريد الإلكتروني"
            placeholder="you@example.com"
            value="{{ old('email') }}"
            required
        />

        <x-ui.button type="submit" color="gold" class="w-full text-center">
            إرسال رابط إعادة التعيين
        </x-ui.button>

        <p class="mt-4 text-center text-sm text-gray-600">
            تذكرت كلمة المرور؟
            <a href="{{ route('login') }}" class="text-gold-600 font-semibold hover:text-gold-700">
                العودة لتسجيل الدخول
            </a>
        </p>
    </form>
</x-layout.auth>
