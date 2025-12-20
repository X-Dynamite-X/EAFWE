{{-- Show Membership Page --}}

<x-layout.dashboard title="تفاصيل طلب العضوية">
    <div class="max-w-3xl mx-auto">
        <x-ui.card title="معلومات الطلب">
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <p class="text-gray-500 text-sm mb-1">المستخدم</p>
                    <p class="text-lg font-semibold">{{ $membership->user->name }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">البريد الإلكتروني</p>
                    <p class="text-lg font-semibold">{{ $membership->user->email }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">نوع العضوية</p>
                    <p class="text-lg font-semibold">{{ $membership->getMembershipTypeLabel() }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">البلد</p>
                    <p class="text-lg font-semibold">{{ $membership->country }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">الحالة</p>
                    <div>
                        @if($membership->isPending())
                            <x-ui.badge color="yellow">قيد الانتظار</x-ui.badge>
                        @elseif($membership->isApproved())
                            <x-ui.badge color="green">موافق عليها</x-ui.badge>
                        @else
                            <x-ui.badge color="red">مرفوضة</x-ui.badge>
                        @endif
                    </div>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">تاريخ الطلب</p>
                    <p class="text-lg font-semibold">{{ $membership->created_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>

            @if($membership->company_name)
                <div class="mb-6 pb-6 border-b">
                    <p class="text-gray-500 text-sm mb-1">اسم الشركة</p>
                    <p class="text-lg">{{ $membership->company_name }}</p>
                </div>
            @endif

            <div class="mb-6">
                <p class="text-gray-500 text-sm mb-2">الوصف</p>
                <p class="text-gray-800 whitespace-pre-wrap">{{ $membership->description }}</p>
            </div>

            @if($membership->approvedBy)
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-500 text-sm mb-1">وافق عليه</p>
                    <p class="font-semibold">{{ $membership->approvedBy->name }}</p>
                    <p class="text-sm text-gray-500">{{ $membership->approval_date->format('Y-m-d H:i') }}</p>
                </div>
            @endif
        </x-ui.card>

        @if($membership->isPending() && auth()->user()->can('approve memberships'))
            <div class="mt-6 flex gap-4">
                <form action="{{ route('memberships.approve', $membership) }}" method="POST" class="flex-1">
                    @csrf
                    <x-ui.button type="submit" color="green" class="w-full text-center">
                        الموافقة على الطلب
                    </x-ui.button>
                </form>

                <button onclick="openModal('rejectModal')" class="flex-1">
                    <x-ui.button color="red" class="w-full text-center">
                        رفض الطلب
                    </x-ui.button>
                </button>
            </div>

            <!-- Modal للرفض -->
            <x-ui.modal id="rejectModal" title="رفض الطلب">
                <form action="{{ route('memberships.reject', $membership) }}" method="POST">
                    @csrf

                    <x-ui.textarea
                        name="rejection_reason"
                        label="سبب الرفض"
                        rows="4"
                        required
                    />

                    @slot('footer')
                        <x-ui.button type="submit" color="red">رفض</x-ui.button>
                        <x-ui.button onclick="closeModal('rejectModal')" color="gray">إلغاء</x-ui.button>
                    @endslot
                </form>
            </x-ui.modal>
        @endif
    </div>
</x-layout.dashboard>
