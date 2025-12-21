{{-- Dashboard Index Page --}}

<x-layout.dashboard title="لوحة التحكم">
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        {{-- Stats Cards --}}
        @php
            $stats = [
                ['label' => 'إجمالي المستخدمين', 'value' => '1,234', 'color' => 'bg-blue-100', 'icon' => '👥'],
                ['label' => 'الطلبات الجديدة', 'value' => '24', 'color' => 'bg-yellow-100', 'icon' => '📋'],
                ['label' => 'الأدوار النشطة', 'value' => '5', 'color' => 'bg-green-100', 'icon' => '🔐'],
                ['label' => 'الأنشطة اليومية', 'value' => '156', 'color' => 'bg-purple-100', 'icon' => '📊'],
            ];
        @endphp

        @foreach ($stats as $stat)
            <x-ui.card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">{{ $stat['label'] }}</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stat['value'] }}</p>
                    </div>
                    <div class="text-4xl">{{ $stat['icon'] }}</div>
                </div>
            </x-ui.card>
        @endforeach
    </div>

    {{-- Main Content --}}
    <div class="grid lg:grid-cols-3 gap-6">
        {{-- Recent Users --}}
        <div class="lg:col-span-2">
            <x-ui.card title="آخر المستخدمين">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-right px-4 py-2">الاسم</th>
                                <th class="text-right px-4 py-2">البريد</th>
                                <th class="text-right px-4 py-2">الدور</th>
                                <th class="text-right px-4 py-2">التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="px-4 py-2">أحمد محمد</td>
                                <td class="px-4 py-2">ahmed@email.com</td>
                                <td class="px-4 py-2"><x-ui.badge color="green">مدير</x-ui.badge></td>
                                <td class="px-4 py-2">منذ 2 ساعة</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-4 py-2">فاطمة علي</td>
                                <td class="px-4 py-2">fatima@email.com</td>
                                <td class="px-4 py-2"><x-ui.badge color="blue">موظف</x-ui.badge></td>
                                <td class="px-4 py-2">منذ 4 ساعات</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-4 py-2">محمود عباس</td>
                                <td class="px-4 py-2">mahmoud@email.com</td>
                                <td class="px-4 py-2"><x-ui.badge color="gray">مستخدم</x-ui.badge></td>
                                <td class="px-4 py-2">منذ يوم</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-center">
                    <x-ui.button href="{{ route('users.index') }}" color="gray" size="sm">
                        عرض الكل
                    </x-ui.button>
                </div>
            </x-ui.card>
        </div>

        {{-- Quick Actions --}}
        <div>
            <x-ui.card title="الإجراءات السريعة">
                <div class="space-y-3">
                    <x-ui.button href="{{ route('users.create') }}" color="gold" class="w-full text-center">
                        إضافة مستخدم
                    </x-ui.button>
                    <x-ui.button href="{{ route('memberships.index') }}" color="gray" class="w-full text-center">
                        عرض الطلبات
                    </x-ui.button>
                    <x-ui.button href="{{ route('roles.index') }}" color="black" class="w-full text-center">
                        إدارة الأدوار
                    </x-ui.button>
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>

@push('scripts')
    @vite(['resources/js/pages/dashboard.js'])
@endpush
