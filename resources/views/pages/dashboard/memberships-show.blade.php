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
                        @if ($membership->isPending())
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

            @if ($membership->company_name)
                <div class="mb-6 pb-6 border-b">
                    <p class="text-gray-500 text-sm mb-1">اسم الشركة</p>
                    <p class="text-lg">{{ $membership->company_name }}</p>
                </div>
            @endif

            <div class="mb-6">
                <p class="text-gray-500 text-sm mb-2">الوصف</p>
                <p class="text-gray-800 whitespace-pre-wrap">{{ $membership->description }}</p>
            </div>

            @if ($membership->approvedBy)
                <div class="bg-gray-50 p-4 rounded-lg">
                    @if ($membership->rejection_reason)
                        <p class="text-gray-500 text-sm mb-1">تم رفض الطلب بواسطة</p>
                    @else
                        <p class="text-gray-500 text-sm mb-1">تم الموافقة على الطلب أو رفضه بواسطة</p>
                    @endif
                    <p class="font-semibold">{{ $membership->approvedBy->name }}</p>
                    <p class="text-sm text-gray-500">{{ $membership->approval_date->format('Y-m-d H:i') }}</p>
                    @if ($membership->rejection_reason)
                        <p class="text-sm text-gray-500">سبب الرفض: {{ $membership->rejection_reason }}</p>
                    @endif
                </div>
            @endif
        </x-ui.card>

        {{-- Action Buttons --}}
        <div class="mt-6 flex gap-4 flex-wrap">
            {{-- Back Button --}}
            <x-ui.button href="{{ route('memberships.index') }}" color="gray">
                العودة
            </x-ui.button>

            {{-- Approve Button (Only for pending and with permission) --}}
            @can('approve memberships')
                @if ($membership->isPending())
                    <button type="button" data-action="approve" data-id="{{ $membership->id }}"
                        data-name="{{ $membership->user->name }}"
                        class="inline-flex items-center justify-center font-semibold rounded-lg transition duration-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm bg-green-600 text-white hover:bg-green-700 focus:ring-green-500">
                        الموافقة على الطلب
                    </button>
                @endif
            @endcan

            {{-- Reject Button (Only for pending and with permission) --}}
            @can('approve memberships')
                @if ($membership->isPending())
                    <button type="button" data-action="reject" data-id="{{ $membership->id }}"
                        data-name="{{ $membership->user->name }}"
                        class="inline-flex items-center justify-center font-semibold rounded-lg transition duration-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm bg-red-600 text-white hover:bg-red-700 focus:ring-red-500">
                        رفض الطلب
                    </button>
                @endif
            @endcan

            {{-- Delete Button (Only for pending or admin) --}}
            @can('delete memberships')
                @if ($membership->isPending() || auth()->user()->hasRole('admin'))
                    <button type="button" data-action="delete" data-id="{{ $membership->id }}"
                        data-name="{{ $membership->user->name }}"
                        class="inline-flex items-center justify-center font-semibold rounded-lg transition duration-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500">
                        حذف الطلب
                    </button>
                @endif
            @endcan
        </div>
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
