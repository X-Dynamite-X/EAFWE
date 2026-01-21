<x-layout.app title="المركز الإعلامي">
    {{-- Hero Section --}}
    <div class="bg-charcoal-900 text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute transform -rotate-12 -right-20 top-0">
                <span class="text-[20rem] font-bold text-gold-500">News</span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">المركز الإعلامي</h1>
            <p class="text-xl text-gold-400 font-bold border-r-4 border-gold-500 pr-4">آخر الأخبار والبيانات الصحفية</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-24">
        <x-ui.section-header title="أخبار الجمعية"
            description="تابعي آخر مستجدات الجمعية، إنجازاتنا، وشراكاتنا الجديدة." />

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $news = [
                    [
                        'title' => 'توقيع اتفاقية تعاون مع دائرة التنمية الاقتصادية',
                        'date' => '12 يناير 2026',
                        'category' => 'أخبار رسمية',
                        'desc' =>
                            'تهدف الاتفاقية {{ __('common.time.to') }} تعزيز بيئة الأعمال لرائدات الأعمال في الإمارة وتوفير تسهيلات جديدة.',
                        'image' => 'https://via.placeholder.com/600x400?text=News+1',
                    ],
                    [
                        'title' => 'اختتام وفد الجمعية زيارته الرسمية للمملكة المتحدة',
                        'date' => '05 يناير 2026',
                        'category' => 'مشاركات دولية',
                        'desc' => 'ناقش الوفد سبل التعاون المشترك في مجالات الابتكار وريادة الأعمال النسائية.',
                        'image' => 'https://via.placeholder.com/600x400?text=News+2',
                    ],
                    [
                        'title' => 'إطلاق مبادرة "رائدات المستقبل" للطالبات الجامعيات',
                        'date' => '28 ديسمبر 2025',
                        'category' => 'مبادرات',
                        'desc' => 'مبادرة جديدة تهدف {{ __('common.time.to') }} تأهيل جيل جديد {{ __('common.time.from') }} رائدات الأعمال {{ __('common.time.from') }}ذ المرحلة الجامعية.',
                        'image' => 'https://via.placeholder.com/600x400?text=News+3',
                    ],
                ];
            @endphp

            @foreach ($news as $item)
                <article
                    class="bg-white rounded-[2.5rem] overflow-hidden shadow-xl border border-gold-100 hover:-translate-y-2 transition-transform duration-300">
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover">
                    <div class="p-8">
                        <div class="flex items-center gap-4 mb-4">
                            <span class="bg-gold-50 text-gold-600 px-3 py-1 rounded-full text-xs font-black">
                                {{ $item['category'] }}
                            </span>
                            <span class="text-charcoal-400 text-sm font-bold">{{ $item['date'] }}</span>
                        </div>
                        <h3 class="text-xl font-black text-charcoal-900 mb-4 line-clamp-2">{{ $item['title'] }}</h3>
                        <p class="text-charcoal-700 mb-6 line-clamp-3 leading-relaxed">{{ $item['desc'] }}</p>
                        <a href="#" class="text-gold-600 font-black flex items-center gap-2 hover:text-gold-700">
                            <span>{{ __('common.actions.read_more') }}</span>
                            <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-layout.app>
