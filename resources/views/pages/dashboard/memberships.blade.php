{{-- Memberships Management Page --}}
<x-layout.dashboard title="طلبات العضوية">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">طلبات العضوية</h2>
        @can('create memberships')
            <x-ui.button href="{{ route('memberships.create') }}" color="gold">
                طلب عضوية جديد
            </x-ui.button>
        @endcan
    </div>

    {{-- Filter Tabs --}}
    <div class="mb-6 border-b border-gray-200">
        <div class="flex gap-4">
            @php
                $statuses = [
                    '' => 'الكل',
                    'pending' => 'قيد الانتظار',
                    'approved' => 'موافق عليها',
                    'rejected' => 'مرفوضة',
                ];
            @endphp

            @foreach ($statuses as $key => $label)
                <a href="{{ route('memberships.index', $key ? ['status' => $key] : []) }}"
                    class="px-4 py-2 border-b-2 font-medium transition {{ request('status') === $key || (!request('status') && $key === '') ? 'border-gold-600 text-gold-600' : 'border-transparent text-gray-600 hover:text-gray-900' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- Memberships Table --}}
    <x-ui.card>
        <div class="overflow-x-auto">
            <table id="membershipsTable" class="w-full">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="text-right px-6 py-3 font-semibold">الاسم</th>
                        <th class="text-right px-6 py-3 font-semibold">البريد</th>
                        <th class="text-right px-6 py-3 font-semibold">نوع العضوية</th>
                        <th class="text-right px-6 py-3 font-semibold">التاريخ</th>
                        <th class="text-right px-6 py-3 font-semibold">الحالة</th>
                        <th class="text-right px-6 py-3 font-semibold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($memberships ?? [] as $membership)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-3 font-medium">{{ $membership->user->name ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $membership->user->email ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $membership->getMembershipTypeLabel() }}</td>
                            <td class="px-6 py-3 text-sm text-gray-600">
                                {{ $membership->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-6 py-3">
                                @if ($membership->status === 'pending')
                                    <x-ui.badge color="yellow">قيد الانتظار</x-ui.badge>
                                @elseif($membership->status === 'approved')
                                    <x-ui.badge color="green">موافق عليها</x-ui.badge>
                                @else
                                    <x-ui.badge color="red">مرفوضة</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-6 py-3">
                                <div class="flex gap-2 flex-wrap">
                                    {{-- View Button --}}
                                    <x-ui.button href="{{ route('memberships.show', $membership) }}" color="gray"
                                        size="sm">
                                        عرض
                                    </x-ui.button>

                                    {{-- Approve Button --}}
                                    @can('approve memberships')
                                        @if ($membership->status === 'pending')
                                            <button type="button" data-action="approve" data-id="{{ $membership->id }}"
                                                data-name="{{ $membership->user->name ?? 'N/A' }}"
                                                class="inline-flex items-center justify-center font-semibold rounded-lg transition duration-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 px-3 py-2 text-sm bg-green-600 text-white hover:bg-green-700 focus:ring-green-500">
                                                موافقة
                                            </button>
                                        @endif
                                    @endcan

                                    {{-- Reject Button --}}
                                    @can('approve memberships')
                                        @if ($membership->status === 'pending')
                                            <button type="button" data-action="reject" data-id="{{ $membership->id }}"
                                                data-name="{{ $membership->user->name ?? 'N/A' }}"
                                                class="inline-flex items-center justify-center font-semibold rounded-lg transition duration-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 px-3 py-2 text-sm bg-red-600 text-white hover:bg-red-700 focus:ring-red-500">
                                                رفض
                                            </button>
                                        @endif
                                    @endcan

                                    {{-- Delete Button --}}
                                    @can('delete memberships')
                                        @if ($membership->status === 'pending' || auth()->user()->hasRole('admin'))
                                            <button type="button" data-action="delete" data-id="{{ $membership->id }}"
                                                data-name="{{ $membership->user->name ?? 'N/A' }}"
                                                class="inline-flex items-center justify-center font-semibold rounded-lg transition duration-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 px-3 py-2 text-sm bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500">
                                                حذف
                                            </button>
                                        @endif
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center px-6 py-8 text-gray-500">
                                لا توجد طلبات عضوية
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>

    {{-- Pagination --}}
    @if (isset($memberships) && method_exists($memberships, 'links'))
        <div class="mt-6">
            {{ $memberships->links() }}
        </div>
    @endif

    {{-- Action Confirmation Modal --}}
    <x-ui.modal id="actionModal" title="تأكيد الإجراء">
        <p id="modalBody" class="text-center text-lg mb-4"></p>

        {{-- Rejection Reason Input --}}
        <div id="rejectionReasonGroup" class="hidden mb-4">
            <label for="rejectionReason" class="block text-sm font-medium text-gray-700 mb-1">سبب الرفض</label>
            <textarea id="rejectionReason" name="rejection_reason" rows="3"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-gold-500 focus:ring-gold-500"
                placeholder="أدخل سبب رفض الطلب هنا..."></textarea>
        </div>

        <div class="flex justify-center gap-4 mt-6">
            <button type="button" id="confirmButton"
                class="w-full sm:w-auto px-4 py-2 rounded-lg text-white font-semibold transition">
                تأكيد
            </button>
            <button type="button" onclick="closeModal('actionModal')"
                class="w-full sm:w-auto px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 font-semibold transition">
                إلغاء
            </button>
        </div>
    </x-ui.modal>

    <x-slot name="scripts">
        @vite('resources/js/pages/membership.js')
    </x-slot>
</x-layout.dashboard>
