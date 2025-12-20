{{-- Sidebar Component --}}

<aside class="w-64 bg-gray-900 text-white shadow-lg overflow-y-auto">
    <div class="p-6">
        {{-- Logo --}}
        <h2 class="text-2xl font-bold text-gold-400 mb-8">EAFWE</h2>

        {{-- Navigation Menu --}}
        <nav class="space-y-2">
            @php
                $menuItems = [
                    [
                        'label' => 'لوحة التحكم',
                        'route' => 'dashboard',
                        'icon' => '📊',
                        'permission' => null,
                    ],
                    [
                        'label' => 'المستخدمون',
                        'route' => 'users.index',
                        'icon' => '👥',
                        'permission' => 'view users',
                    ],
                    [
                        'label' => 'الأدوار والصلاحيات',
                        'route' => 'roles.index',
                        'icon' => '🔐',
                        'permission' => 'manage roles',
                    ],
                    [
                        'label' => 'طلبات العضوية',
                        'route' => 'memberships.index',
                        'icon' => '📋',
                        'permission' => 'view memberships',
                    ],
                    [
                        'label' => 'التقارير',
                        'route' => 'reports.index',
                        'icon' => '📈',
                        'permission' => 'view reports',
                    ],
                ];
            @endphp

            @foreach ($menuItems as $item)
                @if (!$item['permission'] || Auth::user()->can($item['permission']))
                    <a href="{{ route($item['route']) }}"
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg transition
                        {{ request()->routeIs($item['route'] . '*') ? 'bg-gold-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                        <span class="text-lg">{{ $item['icon'] }}</span>
                        <span>{{ $item['label'] }}</span>
                    </a>
                @endif
            @endforeach
        </nav>

        {{-- Divider --}}
        <hr class="border-gray-700 my-6">

        {{-- Settings & Logout --}}
        <nav class="space-y-2">
            <a href="{{ route('profile.edit') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-800 transition">
                <span>⚙️</span>
                <span>الإعدادات</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" class="block">
                @csrf
                <button type="submit"
                    class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-red-600 transition">
                    <span>🚪</span>
                    <span>تسجيل الخروج</span>
                </button>
            </form>
        </nav>
    </div>
</aside>
