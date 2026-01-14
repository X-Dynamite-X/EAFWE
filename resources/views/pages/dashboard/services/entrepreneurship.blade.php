<x-layout.dashboard title="خدمات ريادة الأعمال">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900 mb-2">خدمات ريادة الأعمال</h1>
        <p class="text-charcoal-600">دعم وتمكين مشاريعك الريادية من خلال الإرشاد والتوجيه وعرض الفرص.</p>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        {{-- My Projects --}}
        <div class="lg:col-span-2 space-y-6">
            <x-ui.card title="مشروعي الريادي">
                <div class="text-center py-12 border-2 border-dashed border-gold-100 rounded-4xl">
                    <div class="text-5xl mb-6">🏗️</div>
                    <h3 class="text-xl font-black text-charcoal-900 mb-2">لم تقومي بإضافة مشروعك بعد</h3>
                    <p class="text-charcoal-600 mb-8 max-w-sm mx-auto">أضيفي بيانات مشروعك ليتم عرضه داخل منصة الجمعية
                        والاستفادة من فرص الترويج والتعاون.</p>
                    <x-ui.button>إضافة مشروع جديد</x-ui.button>
                </div>
            </x-ui.card>

            <x-ui.card title="جلسات الإرشاد والتوجيه (Mentorship)">
                <div class="space-y-4">
                    @php
                        $sessions = [
                            [
                                'mentor' => 'د. نورة الشامسي',
                                'specialty' => 'استشارات مالية وقانونية',
                                'date' => 'قريباً',
                                'status' => 'متاح',
                            ],
                            [
                                'mentor' => 'أ. مريم السويدي',
                                'specialty' => 'تطوير الأعمال والتسويق',
                                'date' => 'مكتمل',
                                'status' => 'غير متاح',
                            ],
                        ];
                    @endphp

                    @foreach ($sessions as $session)
                        <div
                            class="flex items-center justify-between p-4 rounded-xl border border-gray-100 {{ $session['status'] == 'غير متاح' ? 'opacity-50' : '' }}">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-gold-50 rounded-full flex items-center justify-center text-xl text-gold-500">
                                    👤</div>
                                <div>
                                    <p class="font-black text-charcoal-900">{{ $session['mentor'] }}</p>
                                    <p class="text-xs text-charcoal-500">{{ $session['specialty'] }}</p>
                                </div>
                            </div>
                            <div class="text-left">
                                <span
                                    class="text-xs font-bold block mb-1 text-charcoal-400">{{ $session['date'] }}</span>
                                <x-ui.button size="sm" :disabled="$session['status'] == 'غير متاح'">حجز جلسة</x-ui.button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        </div>

        {{-- Side Actions --}}
        <div class="space-y-6">
            <x-ui.card title="فرص التعاون والشراكات">
                <div class="space-y-4">
                    <div class="p-4 rounded-xl bg-blue-50 border border-blue-100">
                        <p class="text-sm font-black text-blue-900 mb-1">طلب توريد منتجات</p>
                        <p class="text-xs text-blue-700 leading-relaxed">تبحث إحدى الجهات الحكومية عن موردين للمصنوعات
                            اليدوية التراثية.</p>
                        <a href="#" class="text-xs font-black text-blue-900 mt-2 inline-block">التفاصيل ←</a>
                    </div>
                    <div class="p-4 rounded-xl bg-purple-50 border border-purple-100">
                        <p class="text-sm font-black text-purple-900 mb-1">شراكة لوجستية</p>
                        <p class="text-xs text-purple-700 leading-relaxed">فرصة للعضوات في قطاع التجارة الإلكترونية
                            للحصول على خصومات شحن حصرية.</p>
                        <a href="#" class="text-xs font-black text-purple-900 mt-2 inline-block">التفاصيل ←</a>
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card title="استشارة سريعة">
                <form class="space-y-4">
                    <x-ui.textarea label="اكتبي سؤالك هنا" placeholder="كيف يمكنني..." rows="3" />
                    <x-ui.button size="sm" class="w-full">إرسال الطلب</x-ui.button>
                </form>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>
