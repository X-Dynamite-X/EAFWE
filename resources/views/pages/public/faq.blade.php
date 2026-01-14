<x-layout.app title="الأسئلة الشائعة">
    {{-- Hero Section --}}
    <div class="bg-charcoal-900 text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute transform -rotate-12 -right-20 top-0">
                <span class="text-[20rem] font-bold text-gold-500">FAQ</span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">الأسئلة الشائعة</h1>
            <p class="text-xl text-gold-400 font-bold border-r-4 border-gold-500 pr-4">كل ما تحتاجين معرفته عن الجمعية
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-24">
        <x-ui.section-header title="إجابات لأسئلتك"
            description="نحن هنا لمساعدتك. إليك مجموعة من الأسئلة الأكثر شيوعاً التي قد تدور في ذهنك." />

        <div class="max-w-4xl mx-auto space-y-6">
            @php
                $faqs = [
                    [
                        'q' => 'كيف يمكنني الانضمام للجمعية؟',
                        'a' =>
                            'يمكنك الانضمام من خلال الضغط على زر "انضمي إلينا" في القائمة العلوية وتعبئة استمارة التسجيل الإلكترونية مع إرفاق الوثائق المطلوبة.',
                    ],
                    [
                        'q' => 'ما هي أنواع العضويات المتاحة؟',
                        'a' =>
                            'توجد عدة أنواع للعضويات تشمل: العضوية العاملة، العضوية المنتسبة، وعضوية طالبات الجامعات والمدارس. كل نوع له شروطه ومميزاته الخاصة.',
                    ],
                    [
                        'q' => 'كيف يمكنني المشاركة في الفعاليات؟',
                        'a' =>
                            'المشاركة في الفعاليات متاحة للعضوات المسجلات. بعد تسجيل الدخول، يمكنك تصفح الفعاليات القادمة والضغط على زر التسجيل المتاح لكل فعالية.',
                    ],
                    [
                        'q' => 'ما هي الخدمات التي تقدمها الجمعية لرائدات الأعمال؟',
                        'a' =>
                            'نقدم حزمة متكاملة من الخدمات تشمل التدريب، الإرشاد المهني، فرص التشبيك، الدفاع عن مصالح رائدات الأعمال، وتسهيل الوصول للتمويل والأسواق.',
                    ],
                    [
                        'q' => 'كيف يمكنني التواصل مع إدارة الجمعية؟',
                        'a' =>
                            'يمكنك التواصل معنا عبر صفحة "اتصل بنا"، أو من خلال البريد الإلكتروني الرسمي، أو زيارة مقرنا في المواعيد الرسمية.',
                    ],
                ];
            @endphp

            @foreach ($faqs as $faq)
                <div x-data="{ open: false }"
                    class="bg-white rounded-3xl border border-gold-100 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <button @click="open = !open"
                        class="w-full px-8 py-6 text-right flex items-center justify-between group">
                        <span
                            class="text-xl font-black text-charcoal-900 group-hover:text-gold-600 transition-colors">{{ $faq['q'] }}</span>
                        <svg :class="{ 'rotate-180': open }"
                            class="w-6 h-6 text-gold-500 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse
                        class="px-8 pb-8 text-charcoal-700 text-lg leading-relaxed border-t border-gold-50">
                        {{ $faq['a'] }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout.app>
