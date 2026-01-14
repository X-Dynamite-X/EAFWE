<x-layout.dashboard title="بوابة التطوع والمبادرات">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900 mb-2">بوابة التطوع والمبادرات</h1>
        <p class="text-charcoal-600">ساهمي في نجاح مبادرات الجمعية واتركي بصمة إيجابية في المجتمع.</p>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        {{-- Volunteer Stats --}}
        <div class="lg:col-span-1 space-y-6">
            <x-ui.card title="ملف التطوع الخاص بي">
                <div class="text-center py-6">
                    <div
                        class="w-24 h-24 bg-gold-500 text-charcoal-900 rounded-full flex items-center justify-center text-3xl font-black mx-auto mb-4">
                        15
                    </div>
                    <p class="font-black text-charcoal-900">ساعة تطوعية</p>
                    <p class="text-xs text-charcoal-400">منذ انضمامك للجمعية</p>
                </div>
                <div class="mt-6 p-4 bg-gray-50 rounded-2xl">
                    <p class="text-xs text-charcoal-600 text-center">أنتِ على بعد 5 ساعات من الحصول على "وسام العطاء"
                    </p>
                </div>
            </x-ui.card>
        </div>

        {{-- Active Volunteering Initiatives --}}
        <div class="lg:col-span-2 space-y-6">
            <x-ui.card title="مبادرات حالية للتطوع">
                <div class="space-y-4">
                    @php
                        $volunteering = [
                            [
                                'title' => 'مبادرة "إرشاد الناشئات"',
                                'role' => 'مرشدة مهنية',
                                'hours' => '4 ساعات أسبوعياً',
                                'desc' => 'تقديم التوجيه لطالبات المدارس الراغبات في دخول عالم ريادة الأعمال.',
                            ],
                            [
                                'title' => 'تنظيم ملتقى العيد الوطني',
                                'role' => 'منسقة فعاليات',
                                'hours' => 'حسب الحاجة',
                                'desc' => 'المساهمة في تنظيم فعاليات الجمعية الخاصة باليوم الوطني للدولة.',
                            ],
                        ];
                    @endphp

                    @foreach ($volunteering as $item)
                        <div class="p-6 rounded-2xl border border-gray-100 hover:border-gold-300 transition-colors">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-black text-charcoal-900">{{ $item['title'] }}</h3>
                                <span
                                    class="text-xs px-3 py-1 bg-blue-50 text-blue-600 rounded-full font-bold">{{ $item['role'] }}</span>
                            </div>
                            <p class="text-sm text-charcoal-600 mb-6 leading-relaxed">{{ $item['desc'] }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-charcoal-400 flex items-center gap-1">
                                    <span>⏱️</span> {{ $item['hours'] }}
                                </span>
                                <x-ui.button size="sm">انضمي كمتطوعة</x-ui.button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>
