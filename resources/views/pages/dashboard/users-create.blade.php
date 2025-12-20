{{-- Create User Page --}}

<x-layout.dashboard title="إنشاء مستخدم جديد">
    <div class="max-w-2xl mx-auto">
        <x-ui.card title="بيانات المستخدم الجديد">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="grid md:grid-cols-2 gap-4">
                    <x-ui.input
                        name="name"
                        label="الاسم الكامل"
                        placeholder="أحمد محمد"
                        value="{{ old('name') }}"
                        required
                    />

                    <x-ui.input
                        type="email"
                        name="email"
                        label="البريد الإلكتروني"
                        placeholder="user@example.com"
                        value="{{ old('email') }}"
                        required
                    />
                </div>

                <x-ui.input
                    name="phone"
                    label="رقم الهاتف"
                    placeholder="+966 50 000 0000"
                    value="{{ old('phone') }}"
                />

                <div class="grid md:grid-cols-2 gap-4">
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
                </div>

                <x-ui.select
                    name="role"
                    label="الدور"
                    :options="['admin' => 'مدير', 'staff' => 'موظف', 'member' => 'عضو']"
                    value="{{ old('role') }}"
                    required
                />

                <div class="flex gap-4 mt-6">
                    <x-ui.button type="submit" color="gold" class="flex-1 text-center">
                        إنشاء المستخدم
                    </x-ui.button>
                    <x-ui.button href="{{ route('users.index') }}" color="gray" class="flex-1 text-center">
                        إلغاء
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layout.dashboard>
