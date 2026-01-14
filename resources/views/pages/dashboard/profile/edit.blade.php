{{-- Profile Edit Page --}}

<x-layout.dashboard title="الملف الشخصي" subtitle="تعديل بيانات حسابك">
    @if (session('success'))
        <x-alerts.success>{{ session('success') }}</x-alerts.success>
    @endif

    @if ($errors->any())
        <x-alerts.error>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alerts.error>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            @method('PATCH')

            <div class="grid md:grid-cols-2 gap-8 mb-8">
                {{-- Basic Info --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-black text-charcoal-900 border-b border-gray-100 pb-2">البيانات الأساسية</h3>
                    <x-ui.input type="text" name="name" label="الاسم الكامل" value="{{ old('name', $user->name) }}"
                        required />

                    <x-ui.input type="email" name="email" label="البريد الإلكتروني"
                        value="{{ old('email', $user->email) }}" required />

                    <x-ui.input type="text" name="phone" label="رقم الهاتف" placeholder="+966 50 000 0000"
                        value="{{ old('phone', $user->phone) }}" />
                </div>

                {{-- Membership Info --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-black text-charcoal-900 border-b border-gray-100 pb-2">تفاصيل العضوية</h3>

                    <div class="bg-gold-50 p-6 rounded-2xl border border-gold-100">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <p class="text-xs text-gold-600 font-bold mb-1">نوع العضوية</p>
                                <p class="font-black text-charcoal-900">عضوية عاملة</p>
                            </div>
                            <span
                                class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-[10px] font-black uppercase tracking-wider">نشط
                                ✅</span>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <p class="text-[10px] text-gray-500 font-bold mb-1">تاريخ الانضمام</p>
                                <p class="text-xs font-black text-charcoal-900">01 يناير 2024</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-500 font-bold mb-1">تاريخ التجديد</p>
                                <p class="text-xs font-black text-charcoal-900">01 يناير 2027</p>
                            </div>
                        </div>

                        <x-ui.button variant="outline" size="sm" class="w-full bg-white">
                            <span class="flex items-center justify-center gap-2">
                                <span>📥</span> تحميل بطاقة العضوية
                            </span>
                        </x-ui.button>

                        <button type="button"
                            class="w-full text-center mt-4 text-xs font-black text-gold-600 hover:text-gold-700">طلب
                            تجديد العضوية</button>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">

            </div>
    </div>

    <div class="flex gap-4">
        <x-ui.button type="submit" color="gold" class="flex-1 text-center">
            حفظ التغييرات
        </x-ui.button>
        <x-ui.button href="{{ route('dashboard') }}" color="gray" class="flex-1 text-center">
            إلغاء
        </x-ui.button>
    </div>
    </form>
    </div>
</x-layout.dashboard>
