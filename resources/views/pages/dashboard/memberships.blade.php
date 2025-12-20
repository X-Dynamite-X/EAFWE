{{-- Memberships Management Page --}}

<x-layout.dashboard title="طلبات العضوية">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">طلبات العضوية</h2>
        <x-ui.button href="{{ route('memberships.create') }}" color="gold">
            طلب عضوية جديد
        </x-ui.button>
    </div>

    {{-- Filter Tabs --}}
    <div class="mb-6 border-b border-gray-200">
        <div class="flex gap-4">
            @php
                $statuses = ['pending' => 'قيد الانتظار', 'approved' => 'موافق عليها', 'rejected' => 'مرفوضة'];
            @endphp

            @foreach($statuses as $key => $label)
                <button class="px-4 py-2 border-b-2 {{ request('status') === $key ? 'border-gold-600 text-gold-600' : 'border-transparent text-gray-600' }} transition">
                    {{ $label }}
                </button>
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
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $membership->user_name }}</td>
                            <td class="px-6 py-3">{{ $membership->email }}</td>
                            <td class="px-6 py-3">{{ $membership->membership_type }}</td>
                            <td class="px-6 py-3">{{ $membership->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-3">
                                @if($membership->status === 'pending')
                                    <x-ui.badge color="yellow">قيد الانتظار</x-ui.badge>
                                @elseif($membership->status === 'approved')
                                    <x-ui.badge color="green">موافق</x-ui.badge>
                                @else
                                    <x-ui.badge color="red">مرفوض</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-6 py-3">
                                <div class="flex gap-2">
                                    <x-ui.button href="{{ route('memberships.show', $membership) }}" color="gray" size="sm">
                                        عرض
                                    </x-ui.button>
                                    @if($membership->status === 'pending')
                                        <x-ui.button onclick="approveMembership({{ $membership->id }})" color="green" size="sm">
                                            موافقة
                                        </x-ui.button>
                                    @endif
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
</x-layout.dashboard>

@push('scripts')
<script src="{{ mix('resources/js/pages/membership.js') }}"></script>
<script>
    function approveMembership(membershipId) {
        if (confirm('هل تريد الموافقة على هذا الطلب؟')) {
            fetch(`/memberships/${membershipId}/approve`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                }
            }).then(r => r.ok ? location.reload() : alert('خطأ'));
        }
    }
</script>
@endpush
