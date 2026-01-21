{{-- Services Page --}}

<x-layout.app title="مجالات العمل والخدمات">
    {{-- Hero Section --}}
    <div class="bg-charcoal-900 text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="grid grid-cols-6 h-full">
                @for ($i = 0; $i < 12; $i++)
                    <div class="border-l border-b border-gold-500/20"></div>
                @endfor
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative text-center">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">مجالات العمل والخدمات</h1>
            <p class="text-xl text-gold-400 font-bold max-w-3xl mx-auto">{{ __('common.general.yes') }}ل على تمكين المرأة الإماراتية {{ __('common.time.from') }} خلال مسارات
                عمل متكاملة وشراكات استراتيجية.</p>
        </div>
    </div>

    {{-- Areas of Work --}}
    <div class="max-w-7xl mx-auto px-6 py-24">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-black text-charcoal-900 mb-4">مجالات عمل الجمعية</h2>
            <div class="w-24 h-1.5 bg-gold-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-24">
            @php
                $areas = [
                    ['تشجيع الإبداع والابتكار', '💡'],
                    ['{{ __('modules.training.categories.training') }} وتأهيل رائدات الأعمال', '🎓'],
                    ['تزويد رائدات الاعمال بالاستشارات المتخصصة', '👔'],
                    ['تنظيم المؤتمرات والملتقيات والندوات الاقتصادية والمجتمعية', '🤝'],
                    ['تنظيم المعارض', '🖼️'],
                    ['تنظيم الوفود الخارجية والداخلية', '✈️'],
                    ['نشر ثقافة ريادة الاعمال لدى رائدات الأعمال', '📖'],
                    ['توقيع اتفاقيات استراتيجية مع الشركاء', '📝'],
                ];
            @endphp
            @foreach ($areas as $area)
                <div
                    class="bg-white p-8 rounded-4xl shadow-sm border border-gold-100 hover:shadow-xl hover:border-gold-300 transition-all duration-300 group">
                    <div class="mb-6 group-hover:scale-110 transition-transform">
                        <span
                            class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center text-3xl">
                            {{ $area[1] }}
                        </span>
                    </div>
                    <h3 class="text-lg font-black text-charcoal-900 leading-relaxed">{{ $area[0] }}</h3>
                </div>
            @endforeach
        </div>

        {{-- Objectives Section --}}
        <div class="bg-charcoal-900 text-white rounded-[3rem] p-12 lg:p-20 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-12 opacity-5">
                <svg class="w-64 h-64 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="relative">
                <h2 class="text-3xl lg:text-4xl font-black mb-12 text-gold-500">أهداف الجمعية</h2>
                <div class="grid md:grid-cols-2 gap-x-16 gap-y-8">
                    @php
                        $objectives = [
                            'تفعيل دور ومشاركة رائدات الأعمال في القطاع الخاص والمساهمة في المحافظة على استدامة وإستمرارية أعمالهن.',
                            'تقديم الإستشارات اللازمة لتذليل الصعوبات التي تواجه الرائدات وتساهم في تطوير أعمالهن واستدامتها سواء {{ __('common.time.from') }} خلال الخبراء أو المستشارين أو الجهات المتعاونة.',
                            'نشر وتعزيز ثقافة ريادة الأعمال والإبتكار لدى المرأة في بيئة العمل التنافسية {{ __('common.time.from') }} خلال الوسائل والأساليب المختلفة لتعزيز هذه الثقافة والترويج للأفكار الإبداعية والممارسات الناجحة.',
                            'توقيع اتفاقيات التعاون والتفاهم مع المؤسسات الحكومية وغير الحكومية داخل وخارج الدولة لتقديم الدعم لرائدات الأعمال وتسهيل نفاذ {{ __('common.time.from') }}تجاتهم وخدماتهم {{ __('common.time.to') }} الأسواق المحلية والخارجية وذلك بعد موافقة الوزارة.',
                            'توفير البرامج الداعمة لتمكين المرأة {{ __('common.time.from') }} خلال تطوير مهاراتها وقدراتها كال{{ __('modules.training.categories.training') }} والتأهيل في مجال ريادة الأعمال وإدارة المشاريع الخاصة بهن.',
                            'المساهمة في زيادة مشاركة المواطنات في وظائف سوق العمل في القطاع الخاص.',
                            'اتاحة فرص ربط رائدات الأعمال مع الأسواق وبيئات الأعمال {{ __('common.time.from') }} خلال إقامة المعارض والمؤتمرات والمشاركة بها داخلياً وخارجياً وتبادل الوفود الدولية {{ __('common.time.from') }} رجال ورائدات الأعمال وذلك بعد موافقة الوزارة.',
                            'تعزيز التعاون والترابط بين سيدات ورائدات الأعمال لتطوير فرص بناء العلاقات التجارية والمهنية المشتركة.',
                            'انشاء ال{{ __('common.time.from') }}صات الإلكترونية التي تعمل على الترويج والتعريف بالمشاريع والأفكار الإستثمارية التي تقيمها رائدات الأعمال.',
                        ];
                    @endphp
                    @foreach ($objectives as $objective)
                        <div class="flex items-start gap-4">
                            <span class="w-2 h-2 rounded-full bg-gold-500 mt-3 shrink-0"></span>
                            <p class="text-lg text-gold-50/80 leading-relaxed">{{ $objective }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- CTA Section --}}
        <div class="mt-24 text-center">
            <h2 class="text-3xl font-black text-charcoal-900 mb-6">هل ت{{ __('common.actions.search') }}ين عن دعم لمشروعك؟</h2>
            <p class="text-xl text-charcoal-600 mb-10 max-w-2xl mx-auto">
                نحن هنا لنضع خبراتنا ومواردنا بين يديك. تواصلي معنا اليوم ل{{ __('common.time.from') }}اقشة كيف يمكننا مساعدتك في تحقيق أهدافك.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <x-ui.button href="{{ route('contact') }}" color="gold" size="lg"
                    class="rounded-full px-12 shadow-lg">تواصل معنا</x-ui.button>
                <x-ui.button href="{{ route('register') }}" color="white" size="lg"
                    class="rounded-full px-12 border-2 border-charcoal-900 text-charcoal-900 hover:bg-charcoal-900 hover:text-white transition-all">انضمي
                    إلينا</x-ui.button>
            </div>
        </div>
    </div>
</x-layout.app>
