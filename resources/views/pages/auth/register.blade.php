{{-- Register Page --}}

<x-layout.auth title="إنشاء حساب جديد" subtitle="انضم إلينا اليوم">
    @if($errors->any())
        <x-alerts.error>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alerts.error>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <x-ui.input
            name="name"
            label="الاسم الكامل"
            placeholder="أدخل اسمك الكامل"
            required
        />

        <x-ui.input
            type="email"
            name="email"
            label="البريد الإلكتروني"
            placeholder="you@example.com"
            required
        />

        <x-ui.input
            name="phone"
            label="رقم الهاتف"
            placeholder="+966 50 000 0000"
        />

        <x-ui.select
            name="membership_type"
            label="نوع العضوية"
            :options="['basic' => 'أساسية', 'premium' => 'متميزة', 'enterprise' => 'مؤسسية']"
            required
        />

        <x-ui.input
            type="password"
            name="password"
            label="كلمة المرور"
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

        <div class="mb-4">
            <label class="flex items-start">
                <input type="checkbox" name="agree_terms" required class="w-4 h-4 rounded border-gray-300 mt-1">
                <span class="mr-2 text-sm text-gray-700">
                    أوافق على <a href="#" class="text-gold-600 hover:text-gold-700">شروط الاستخدام</a>
                    و <a href="#" class="text-gold-600 hover:text-gold-700">سياسة الخصوصية</a>
                </span>
            </label>
        </div>

        <x-ui.button type="submit" color="gold" class="w-full text-center">
            إنشاء حساب
        </x-ui.button>

        <p class="mt-4 text-center text-sm text-gray-600">
            هل لديك حساب بالفعل؟
            <a href="{{ route('login') }}" class="text-gold-600 font-semibold hover:text-gold-700">
                سجل الدخول
            </a>
        </p>
    </form>
</x-layout.auth>
