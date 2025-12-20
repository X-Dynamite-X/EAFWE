{{-- Create Membership Page --}}

<x-layout.dashboard title="تقديم طلب عضوية">
    <div class="max-w-2xl mx-auto">
        <x-ui.card title="بيانات الطلب">
            <form action="{{ route('memberships.store') }}" method="POST">
                @csrf

                <x-ui.select
                    name="membership_type"
                    label="نوع العضوية"
                    :options="$membershipTypes"
                    value="{{ old('membership_type') }}"
                    required
                />

                <x-ui.select
                    name="country"
                    label="البلد"
                    :options="$countries"
                    value="{{ old('country') }}"
                    required
                />

                <x-ui.input
                    name="company_name"
                    label="اسم الشركة (اختياري)"
                    value="{{ old('company_name') }}"
                />

                <x-ui.textarea
                    name="description"
                    label="الوصف / الأهداف"
                    rows="5"
                    placeholder="أخبرنا عن أهداف عضويتك..."
                    value="{{ old('description') }}"
                    required
                />

                <div class="flex gap-4 mt-6">
                    <x-ui.button type="submit" color="gold" class="flex-1 text-center">
                        إرسال الطلب
                    </x-ui.button>
                    <x-ui.button href="{{ route('memberships.index') }}" color="gray" class="flex-1 text-center">
                        إلغاء
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layout.dashboard>
