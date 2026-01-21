{{-- Reports Page --}}

<x-layout.dashboard title="التقارير" subtitle="{{ __('common.actions.view') }} تفصيلي للبيانات والإحصائيات">
    <div class="grid grid-cols-4 gap-6 mb-8">
        {{-- Total Users Card --}}
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">إجمالي المستخدمين</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalUsers }}</p>
                </div>
                <div class="text-4xl text-blue-600">👥</div>
            </div>
        </div>

        {{-- Total Memberships Card --}}
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">إجمالي الطلبات</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalMemberships }}</p>
                </div>
                <div class="text-4xl text-green-600">📋</div>
            </div>
        </div>

        {{-- Pending Memberships Card --}}
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">الطلبات المعلقة</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $pendingMemberships }}</p>
                </div>
                <div class="text-4xl text-yellow-600">⏳</div>
            </div>
        </div>

        {{-- Approved Memberships Card --}}
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">الطلبات المعتمدة</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $approvedMemberships }}</p>
                </div>
                <div class="text-4xl text-red-600">✅</div>
            </div>
        </div>
    </div>

    {{-- Recent Users Section --}}
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">آخر المستخدمين</h3>
            <a href="{{ route('users.index') }}"
                class="text-gold-600 hover:text-gold-700 text-sm">{{ __('common.actions.view') }} الكل</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">الاسم</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">
                            {{ __('common.general.email') }}</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">الحالة</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">
                            {{ __('common.time.date') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($recentUsers as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span
                                    class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $user->is_active ? __('common.status.active') : __('common.status.disabled') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $user->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                لا توجد بيانات</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Recent Memberships Section --}}
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">آخر طلبات العضوية</h3>
            <a href="{{ route('memberships.index') }}"
                class="text-gold-600 hover:text-gold-700 text-sm">{{ __('common.actions.view') }} الكل</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">المستخدم</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">نوع العضوية</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">الحالة</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">
                            {{ __('common.time.date') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($recentMemberships as $membership)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $membership->user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $membership->membership_type }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span
                                    class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                    @if ($membership->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($membership->status === 'approved') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif
                                ">
                                    {{ ucfirst($membership->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $membership->created_at->format('Y-m-d') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                لا توجد بيانات</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout.dashboard>
