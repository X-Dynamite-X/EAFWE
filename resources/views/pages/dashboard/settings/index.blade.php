{{-- Settings Page --}}

<x-layout.dashboard title="الإعدادات" subtitle="إدارة تفضيلات حسابك">
    @if (session('success'))
        <x-alerts.success>{{ session('success') }}</x-alerts.success>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Language Settings --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">إعدادات اللغة</h3>
            <form action="{{ route('settings.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">اللغة المفضلة</label>
                    <select name="language" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gold-500">
                        <option value="ar" {{ session('preferences.language', 'ar') === 'ar' ? 'selected' : '' }}>العربية</option>
                        <option value="en" {{ session('preferences.language') === 'en' ? 'selected' : '' }}>English</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-gold-600 hover:bg-gold-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    حفظ
                </button>
            </form>
        </div>

        {{-- Theme Settings --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">إعدادات المظهر</h3>
            <form action="{{ route('settings.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">المظهر</label>
                    <select name="theme" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gold-500">
                        <option value="light" {{ session('preferences.theme', 'light') === 'light' ? 'selected' : '' }}>فاتح</option>
                        <option value="dark" {{ session('preferences.theme') === 'dark' ? 'selected' : '' }}>غامق</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-gold-600 hover:bg-gold-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    حفظ
                </button>
            </form>
        </div>

        {{-- Notification Settings --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">الإشعارات</h3>
            <form action="{{ route('settings.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="notifications" value="1" {{ session('preferences.notifications', true) ? 'checked' : '' }} class="w-4 h-4 rounded border-gray-300">
                        <span class="mr-2 text-sm text-gray-700">تفعيل الإشعارات</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-gold-600 hover:bg-gold-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    حفظ
                </button>
            </form>
        </div>

        {{-- Security Settings --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">الأمان</h3>
            <div class="space-y-3">
                <p class="text-sm text-gray-600">لتغيير كلمة المرور الخاصة بك:</p>
                <a href="{{ route('password.request') }}" class="inline-block bg-gold-600 hover:bg-gold-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    تغيير كلمة المرور
                </a>
            </div>
        </div>
    </div>

    {{-- Account Information --}}
    <div class="bg-white rounded-lg shadow p-6 mt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">معلومات الحساب</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-600">تاريخ التسجيل</p>
                <p class="font-semibold text-gray-900">{{ Auth::user()->created_at->format('d/m/Y') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">آخر تحديث</p>
                <p class="font-semibold text-gray-900">{{ Auth::user()->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
</x-layout.dashboard>
