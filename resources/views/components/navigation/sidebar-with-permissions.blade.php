{{--
    Sidebar مع دعم الصلاحيات
    عرض عناصر الـ menu حسب دور المستخدم
--}}

<aside class="w-64 bg-gray-900 text-white shadow-lg overflow-y-auto">
    <div class="p-6">
        {{-- Logo --}}
        <h2 class="text-2xl font-bold text-gold-400 mb-8">EAFWE</h2>

        {{-- User Info --}}
        <div class="mb-6 pb-6 border-b border-gray-700">
            <p class="font-semibold">{{ Auth::user()->name }}</p>
            <p class="text-sm text-gray-400">
                @foreach(Auth::user()->roles as $role)
                    {{ $role->name }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </p>
        </div>

        {{-- Navigation Menu with Permissions --}}
        <nav class="space-y-2">
            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg transition
                {{ request()->routeIs('dashboard') ? 'bg-gold-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                <span>📊</span>
                <span>لوحة التحكم</span>
            </a>

            {{-- Users - يتطلب صلاحية view users --}}
            @can('view users')
                <a href="{{ route('users.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('users.*') ? 'bg-gold-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                    <span>👥</span>
                    <span>المستخدمون</span>
                </a>
            @endcan

            {{-- Roles - يتطلب صلاحية manage roles --}}
            @can('manage roles')
                <a href="{{ route('roles.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('roles.*') ? 'bg-gold-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                    <span>🔐</span>
                    <span>الأدوار والصلاحيات</span>
                </a>
            @endcan

            {{-- Memberships - يتطلب صلاحية view memberships --}}
            @can('view memberships')
                <a href="{{ route('memberships.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('memberships.*') ? 'bg-gold-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                    <span>📋</span>
                    <span>طلبات العضوية</span>
                </a>
            @endcan

            {{-- Reports - يتطلب صلاحية view reports --}}
            @can('view reports')
                <a href="{{ route('reports.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('reports.*') ? 'bg-gold-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                    <span>📈</span>
                    <span>التقارير</span>
                </a>
            @endcan

            {{-- Settings - يتطلب صلاحية manage settings --}}
            @can('manage settings')
                <a href="{{ route('settings.index') }}"
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('settings.*') ? 'bg-gold-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                    <span>⚙️</span>
                    <span>الإعدادات</span>
                </a>
            @endcan
        </nav>

        {{-- Divider --}}
        <hr class="border-gray-700 my-6">

        {{-- User Actions --}}
        <nav class="space-y-2">
            <a href="{{ route('profile.edit') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-800 transition">
                <span>👤</span>
                <span>الملف الشخصي</span>
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
