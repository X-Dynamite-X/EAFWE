{{-- Sidebar Component --}}

<aside id="sidebar"
    class="fixed inset-y-0 right-0 z-50 w-72 bg-charcoal-950 text-white shadow-2xl transition-transform duration-300 transform lg:translate-x-0 lg:static lg:inset-0"
    :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full'">
    <div class="p-8 h-full flex flex-col overflow-y-auto">
        <div class="flex items-center justify-between mb-10 lg:block">
            {{-- Logo --}}
            <h2 class="text-xl font-black text-gold-500 tracking-tight">جمعية الإمارات <br> <span
                    class="text-sm font-normal text-gold-300">لرائدات الأعمال</span></h2>

            <button @click="sidebarOpen = false" class="lg:hidden text-gold-400 p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        {{-- Navigation Menu --}}
        <nav class="space-y-2">
            @php
                $menuItems = [
                    [
                        'label' => 'لوحة التحكم',
                        'route' => 'dashboard',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>',
                        'color' => 'text-blue-400',
                    ],
                    [
                        'label' => 'المستخدمون',
                        'route' => 'users.index',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 15.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
                        'color' => 'text-green-400',
                        'permission' => 'view users',
                    ],
                    [
                        'label' => 'الأدوار والصلاحيات',
                        'route' => 'roles.index',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 11-1 0v3h1z"></path></svg>',
                        'color' => 'text-blue-400',
                        'permission' => 'manage roles',
                    ],
                    [
                        'label' => 'طلبات العضوية',
                        'route' => 'memberships.index',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
                        'color' => 'text-green-400',
                        'permission' => 'view memberships',
                    ],
                    [
                        'label' => 'التقارير',
                        'route' => 'reports.index',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"></path></svg>',
                        'color' => 'text-blue-400',
                        'permission' => 'view reports',
                    ],
                    // Member Services
                    [
                        'label' => 'خدمات التمكين',
                        'route' => 'dashboard.training.index',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>',
                        'color' => 'text-gold-400',
                    ],
                    [
                        'label' => 'ريادة الأعمال',
                        'route' => 'dashboard.entrepreneurship.index',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>',
                        'color' => 'text-gold-400',
                    ],
                    [
                        'label' => 'فرص المشاركة',
                        'route' => 'dashboard.participation.opportunities',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
                        'color' => 'text-gold-400',
                    ],
                    [
                        'label' => 'مركز الملفات',
                        'route' => 'dashboard.files.index',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>',
                        'color' => 'text-gold-400',
                    ],
                    [
                        'label' => 'التسويق والإعلام',
                        'route' => 'dashboard.marketing.index',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.167H3.382a.75.75 0 01-.73-.833L3.13 9.027a.75.75 0 01.73-.667h1.123l2.147-6.167a1.76 1.76 0 013.417.592zM17.273 16.293a1 1 0 01-1.414 0l-1.414-1.414a1 1 0 111.414-1.414l1.414 1.414a1 1 0 010 1.414zM15.859 9.121a1 1 0 010 1.414L14.445 11.95a1 1 0 11-1.414-1.414l1.414-1.414a1 1 0 011.414 0z"></path></svg>',
                        'color' => 'text-gold-400',
                    ],
                    [
                        'label' => 'التواصل الداخلي',
                        'route' => 'dashboard.communication.index',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>',
                        'color' => 'text-gold-400',
                    ],
                    [
                        'label' => 'بوابة الفرص',
                        'route' => 'dashboard.portal-opportunities.index',
                        'icon' =>
                            '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>',
                        'color' => 'text-gold-400',
                    ],
                ];
            @endphp

            @foreach ($menuItems as $item)
                @if (!isset($item['permission']) || Auth::user()->can($item['permission']))
                    <a href="{{ route($item['route']) }}"
                        class="flex items-center gap-4 px-4 py-3 rounded-xl transition duration-300 group
                        {{ request()->routeIs($item['route'] . '*') ? 'bg-gold-500 text-charcoal-950 font-black shadow-lg shadow-gold-500/20' : 'text-gold-100/60 hover:bg-gold-500/10 hover:text-gold-100' }}">
                        <span
                            class="shrink-0 {{ request()->routeIs($item['route'] . '*') ? 'text-charcoal-950' : $item['color'] }} group-hover:scale-110 transition-transform">
                            {!! $item['icon'] !!}
                        </span>
                        <span class="text-sm">{{ $item['label'] }}</span>
                    </a>
                @endif
            @endforeach
        </nav>

        {{-- Divider --}}
        <hr class="border-gray-700 my-6">

        {{-- Settings & Logout --}}
        <nav class="space-y-2">
            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-4 px-4 py-3 rounded-xl text-gold-100/60 hover:bg-gold-500/10 hover:text-gold-100 transition duration-300 group">
                <span class="text-blue-400 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37a1.724 1.724 0 002.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </span>
                <span class="text-sm">الإعدادات</span>
            </a>
            <form action="{{ route('logout') }}" method="POST" class="block">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-4 px-4 py-3 rounded-xl text-gold-100/60 hover:bg-red-500/20 hover:text-red-400 transition duration-300 group">
                    <span class="group-hover:translate-x-1 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                    </span>
                    <span class="text-sm">تسجيل الخروج</span>
                </button>
            </form>
        </nav>
    {{-- </div> --}}
    </div>
</aside>
