<x-layout.dashboard title="التواصل الداخلي">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-charcoal-900 mb-2">التواصل الداخلي والإشعارات</h1>
            <p class="text-charcoal-600">تابعي رسائل وتنبيهات إدارة الجمعية واللقاءات الخاصة بالعضوات.</p>
        </div>
        <div class="bg-gold-500 text-charcoal-900 px-4 py-2 rounded-xl font-black text-sm">
            3 إشعارات جديدة
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        {{-- Internal Announcements --}}
        <div class="lg:col-span-2 space-y-6">
            <x-ui.card title="آخر التنبيهات">
                <div class="space-y-0 divide-y divide-gray-100">
                    @php
                        $notifications = [
                            [
                                'title' => 'تذكير: لقاء المجلس الدوري للعضوات',
                                'time' => 'منذ ساعتين',
                                'content' =>
                                    'نذكركم بحضور اللقاء الدوري يوم الخميس القادم في تمام الساعة 11 صباحاً بمقر الجمعية.',
                                'unread' => true,
                            ],
                            [
                                'title' => 'تحديث في سياسة المعارض الدولية',
                                'time' => 'يوم أمس',
                                'content' =>
                                    'تم رفع سياسة المشاركة الجديدة في مركز الملفات، يرجى الاطلاع عليها قبل تقديم طلبات الترشح.',
                                'unread' => true,
                            ],
                            [
                                'title' => 'دعوة خاص: حفل تكريم الرائدات المتميزات',
                                'time' => 'منذ يومين',
                                'content' => 'يسرنا دعوتكم لحفل التكريم السنوي الذي سيقام في فندق أتلانتس دبي.',
                                'unread' => false,
                            ],
                        ];
                    @endphp

                    @foreach ($notifications as $note)
                        <div class="py-6 {{ $note['unread'] ? 'bg-gold-50/30' : '' }} px-6 -mx-6">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-black text-charcoal-900 flex items-center gap-2">
                                    @if ($note['unread'])
                                        <span class="w-2 h-2 bg-gold-500 rounded-full"></span>
                                    @endif
                                    {{ $note['title'] }}
                                </h3>
                                <span class="text-[10px] text-gray-400 font-bold uppercase">{{ $note['time'] }}</span>
                            </div>
                            <p class="text-sm text-charcoal-700 leading-relaxed">{{ $note['content'] }}</p>
                            <div class="mt-4 flex gap-4">
                                <button class="text-xs font-black text-gold-600 hover:text-gold-700 underline">اتخاذ
                                    إجراء</button>
                                <button class="text-xs font-black text-gray-400 hover:text-gray-600">حذف</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        </div>

        {{-- Direct Messages / Support --}}
        <div class="space-y-6">
            <x-ui.card title="رسائل الإدارة">
                <div class="text-center py-8">
                    <div class="text-4xl mb-4">📧</div>
                    <p class="text-xs text-charcoal-500 mb-6 leading-relaxed">يمكنك استقبال الرسائل الخاصة والرد عليها
                        مباشرة من خلال هذه المنصة.</p>
                    <x-ui.button size="sm" variant="outline" class="w-full">بدأ محادثة جديدة</x-ui.button>
                </div>
            </x-ui.card>

            <x-ui.card title="إحصائيات التواصل">
                <div class="space-y-4">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-charcoal-600">طلب استشارة</span>
                        <span class="font-black">2</span>
                    </div>
                    <div class="w-full bg-gray-100 h-1.5 rounded-full">
                        <div class="bg-blue-500 h-1.5 rounded-full w-2/3"></div>
                    </div>

                    <div class="flex items-center justify-between text-sm mt-4">
                        <span class="text-charcoal-600">دعوات الفعاليات</span>
                        <span class="font-black">5</span>
                    </div>
                    <div class="w-full bg-gray-100 h-1.5 rounded-full">
                        <div class="bg-purple-500 h-1.5 rounded-full w-full"></div>
                    </div>
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>
