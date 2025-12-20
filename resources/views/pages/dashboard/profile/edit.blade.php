{{-- Profile Edit Page --}}

<x-layout.dashboard title="الملف الشخصي" subtitle="تعديل بيانات حسابك">
    @if (session('success'))
        <x-alerts.success>{{ session('success') }}</x-alerts.success>
    @endif

    @if($errors->any())
        <x-alerts.error>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alerts.error>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <x-ui.input
                type="text"
                name="name"
                label="الاسم الكامل"
                value="{{ old('name', $user->name) }}"
                required
            />

            <x-ui.input
                type="email"
                name="email"
                label="البريد الإلكتروني"
                value="{{ old('email', $user->email) }}"
                required
            />

            <x-ui.input
                type="text"
                name="phone"
                label="رقم الهاتف"
                placeholder="+966 50 000 0000"
                value="{{ old('phone', $user->phone) }}"
            />

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">الأدوار الحالية:</label>
                <div class="flex flex-wrap gap-2">
                    @forelse ($user->roles as $role)
                        <span class="inline-block px-3 py-1 bg-gold-100 text-gold-800 rounded-full text-sm">
                            {{ $role->name }}
                        </span>
                    @empty
                        <p class="text-gray-500">لا توجد أدوار</p>
                    @endforelse
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">الصلاحيات:</label>
                <div class="flex flex-wrap gap-2">
                    @forelse ($user->permissions as $permission)
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                            {{ $permission->name }}
                        </span>
                    @empty
                        <p class="text-gray-500">لا توجد صلاحيات مباشرة</p>
                    @endforelse
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
