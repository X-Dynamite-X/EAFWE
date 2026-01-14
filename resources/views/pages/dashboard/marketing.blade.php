<x-layout.dashboard title="خدمات إعلامية وتسويقية">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900 mb-2">خدمات إعلامية وتسويقية</h1>
        <p class="text-charcoal-600">عززي حضورك الإعلامي وسوقي لمشروعك من خلال منصات الجمعية الرسمية.</p>
    </div>

    <div class="grid lg:grid-cols-2 gap-8">
        {{-- Success Stories --}}
        <x-ui.card title="إبراز قصص النجاح">
            <div class="p-6 rounded-2xl bg-gold-50 border border-gold-100 mb-6">
                <h3 class="font-black text-charcoal-900 mb-2">هل تودين مشاركة قصة نجاحك؟</h3>
                <p class="text-sm text-charcoal-600 mb-6 leading-relaxed">نقوم دورياً بنشر قصص نجاح العضوات المتميزات عبر
                    مجلة الجمعية وحساباتنا في وسائل التواصل الاجتماعي.</p>
                <x-ui.button size="sm">تقديم طلب نشر قصة نجاح</x-ui.button>
            </div>

            <div class="space-y-4">
                <p class="text-xs font-black text-gray-400 uppercase tracking-wider">طلباتي السابقة</p>
                <div class="flex items-center justify-between p-4 bg-white border border-gray-100 rounded-xl">
                    <div>
                        <p class="text-sm font-bold text-charcoal-900">مشروع "رداء التراث"</p>
                        <p class="text-xs text-gray-500">تم النشر في: 10 ديسمبر 2025</p>
                    </div>
                    <span class="px-2 py-1 bg-green-50 text-green-600 rounded text-[10px] font-black">منشور ✅</span>
                </div>
            </div>
        </x-ui.card>

        {{-- Media Coverage --}}
        <x-ui.card title="التغطية الإعلامية">
            <div class="space-y-6">
                @php
                    $services = [
                        [
                            'title' => 'تغطية إعلامية لافتتاح مشروع',
                            'desc' => 'حضور فريق الجمعية الإعلامي لافتتاح مشروعك الجديد ونشره.',
                            'icon' => '📸',
                        ],
                        [
                            'title' => 'مقابلة في "رائدات أعمال الإمارات"',
                            'desc' => 'إجراء مقابلة مصورة أو مكتوبة للنشر في منصاتنا.',
                            'icon' => '🎬',
                        ],
                        [
                            'title' => 'ترويج عبر وسائل التواصل',
                            'desc' => 'مشاركة محتوى مشروعك عبر حسابات الجمعية الرسمية.',
                            'icon' => '📱',
                        ],
                    ];
                @endphp

                @foreach ($services as $svc)
                    <div
                        class="flex items-start gap-4 p-4 hover:bg-gray-50 rounded-2xl transition-colors cursor-pointer border border-transparent hover:border-gold-100">
                        <div class="text-3xl">{{ $svc['icon'] }}</div>
                        <div class="grow">
                            <h4 class="font-black text-charcoal-900 text-sm mb-1">{{ $svc['title'] }}</h4>
                            <p class="text-xs text-charcoal-500 leading-relaxed">{{ $svc['desc'] }}</p>
                        </div>
                        <x-ui.button size="sm" variant="outline" class="shrink-0">طلب</x-ui.button>
                    </div>
                @endforeach
            </div>
        </x-ui.card>

        {{-- Media Pack --}}
        <x-ui.card title="حقيبة الهوية الإعلامية للجمعية" class="lg:col-span-2">
            <div class="flex flex-col md:flex-row items-center gap-8 py-4">
                <div class="w-full md:w-1/3 text-center md:text-right">
                    <div class="inline-block p-4 bg-gray-100 rounded-3xl mb-4">
                        <span class="text-5xl">🎨</span>
                    </div>
                    <h3 class="text-lg font-black text-charcoal-900 mb-2">شعارات الجمعية</h3>
                    <p class="text-sm text-charcoal-600">يمكنك استخدام شعارات الجمعية في مطبوعاتك للاشارة لعضويتك.</p>
                </div>
                <div class="grow grid grid-cols-2 md:grid-cols-4 gap-4 w-full">
                    @php $logos = ['شعار ملون', 'شعار أبيض', 'شعار ذهبي', 'صيغة वेक्टर']; @endphp
                    @foreach ($logos as $logo)
                        <div
                            class="p-4 border border-dashed border-gray-200 rounded-2xl text-center hover:bg-gray-50 transition-colors cursor-pointer group">
                            <div
                                class="text-xl mb-2 opacity-20 group-hover:opacity-100 grayscale group-hover:grayscale-0">
                                🖼️</div>
                            <p class="text-[10px] font-black text-charcoal-900">{{ $logo }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-ui.card>
    </div>
</x-layout.dashboard>
