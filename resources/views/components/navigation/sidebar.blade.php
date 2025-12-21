{{-- Sidebar Component --}}

<aside class="w-72 bg-charcoal-950 text-white shadow-2xl overflow-y-auto border-l border-gold-900/10">
    <div class="p-8">
        {{-- Logo --}}
        <h2 class="text-xl font-black text-gold-500 mb-10 tracking-tight">جمعية الإمارات <br> <span
                class="text-sm font-normal text-gold-300">لرائدات الأعمال</span></h2>

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
    </div>
</aside>
