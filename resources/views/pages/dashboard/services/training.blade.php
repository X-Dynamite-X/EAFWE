<x-layout.dashboard title="خدمات التمكين والتطوير">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900 mb-2">خدمات التمكين والتطوير</h1>
        <p class="text-charcoal-600">هنا يمكنك الوصول {{ __('common.time.to') }} كافة ال{{ __('modules.training.title') . 'ية' والورش الحصرية للعضوات.</p>
    </div>

    <div class="grid lg:grid-cols-4 gap-6">
        {{-- Training Schedule --}}
        <div class="lg:col-span-3 space-y-6">
            <x-ui.card title="الجدول ال{{ __('modules.training.categories.training') . 'ي' الحالي">
                <div class="grid md:grid-cols-2 gap-4">
                    @php
                        $trainings = [
                            [
                                'title' => 'التخطيط لالاستراتيجي للمشاريع الصغيرة',
                                'date' => '20 يناير 2026',
                                'time' => '10:00 ص - 01:00 م',
                                'type' => '{{ __('modules.training.categories.workshop') }} حضورية',
                            ],
                            [
                                'title' => 'التسويق الرقمي وبناء الهوية التجارية',
                                'date' => '25 يناير 2026',
                                'time' => '05:00 م - 08:00 م',
                                'type' => 'عبر الإنترنت (Zoom)',
                            ],
                        ];
                    @endphp

                    @foreach ($trainings as $training)
                        <div class="p-6 rounded-2xl bg-gold-50 border border-gold-100">
                            <h3 class="font-black text-charcoal-900 mb-4">{{ $training['title'] }}</h3>
                            <div class="space-y-2 text-sm text-charcoal-600">
                                <p class="flex items-center gap-2">
                                    <span class="text-gold-500">📅</span>
                                    {{ $training['date'] }}
                                </p>
                                <p class="flex items-center gap-2">
                                    <span class="text-gold-500">🕒</span>
                                    {{ $training['time'] }}
                                </p>
                                <p class="flex items-center gap-2">
                                    <span class="text-gold-500">📍</span>
                                    {{ $training['type'] }}
                                </p>
                            </div>
                            <div class="mt-6">
                                <x-ui.button size="sm" class="w-full">التسجيل في الدورة</x-ui.button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>

            <x-ui.card title="المواد ال{{ __('modules.training.categories.training') . 'ية' المتاحة">
                <div class="divide-y divide-gray-100">
                    @php
                        $materials = [
                            ['title' => '{{ __('modules.marketing.resource_types.guide') }} رائدة الأعمال الناجحة ({{ __('modules.files.file_types.pdf') }})', 'size' => '2.5 MB'],
                            ['title' => 'حقيبة {{ __('modules.training.categories.training') . 'ية': إدارة التغيير (ZIP)', 'size' => '15.0 MB'],
                            ['title' => 'نماذج دراسة الجدوى لالاقتصادية (Excel)', 'size' => '180 KB'],
                        ];
                    @endphp

                    @foreach ($materials as $file)
                        <div class="py-4 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-xl">
                                    📄</div>
                                <div>
                                    <p class="font-bold text-charcoal-900">{{ $file['title'] }}</p>
                                    <p class="text-xs text-charcoal-400">{{ $file['size'] }}</p>
                                </div>
                            </div>
                            <x-ui.button size="sm" color="gray">{{ __('common.actions.download') }}</x-ui.button>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        </div>

        {{-- Sidebar Info --}}
        <div class="space-y-6">
            <x-ui.card title="شهاداتي">
                <div class="text-center py-8">
                    <div class="text-4xl mb-4">🏆</div>
                    <p class="text-sm text-charcoal-600 mb-6">لم تصدر لك أي شهادات حتى الآن. أكملي إحدى الدورات
                        ال{{ __('modules.training.categories.training') . 'ية' للحصول على شهادة مشاركة.</p>
                </div>
            </x-ui.card>

            <x-ui.card title="مساعدة">
                <p class="text-sm text-charcoal-600 leading-relaxed mb-4">إذا واجهتك أي مشكلة في التسجيل أو {{ __('common.actions.download') }}
                    المواد، يسعدنا تواصلك مع قسم الدعم الفني.</p>
                <x-ui.button size="sm" variant="outline" class="w-full">تواصل معنا</x-ui.button>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>
