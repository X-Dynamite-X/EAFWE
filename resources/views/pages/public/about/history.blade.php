<x-layout.app title="تاريخ الجمعية">
    {{-- Hero Section --}}
    <div class="bg-charcoal-900 text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute transform -rotate-12 -right-20 top-0">
                <span class="text-[20rem] font-bold text-gold-500">History</span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">تاريخ وتأسيس الجمعية</h1>
            <p class="text-xl text-gold-400 font-bold border-r-4 border-gold-500 pr-4">مسيرة من العطاء والتمكين</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-24">
        <x-ui.section-header title="قصتنا"
            description="منذ البدايات الأولى، وضعت الجمعية نصب أعينها هدفاً واضحاً: أن تكون المنصة الأولى لتمكين المرأة الإماراتية في عالم ريادة الأعمال." />

        <div class="relative">
            {{-- Timeline Vertical Line --}}
            <div class="absolute right-0 lg:right-1/2 top-0 bottom-0 w-1 bg-gold-100 transform translate-x-1/2"></div>

            @php
                $milestones = [
                    [
                        'year' => 'التأسيس',
                        'title' => 'انطلاق الرؤية',
                        'desc' =>
                            'تأسست الجمعية بمباركة ودعم من القيادة الرشيدة، لتكون المظلة الرسمية لرائدات الأعمال الإماراتيات.',
                    ],
                    [
                        'year' => 'التوسع',
                        'title' => 'بناء الشراكات',
                        'desc' => 'عقد شراكات استراتيجية مع مؤسسات حكومية وخاصة لتوفير بيئة داعمة للمشاريع النسائية.',
                    ],
                    [
                        'year' => 'الريادة',
                        'title' => 'المشاركات الدولية',
                        'desc' => 'تمثيل المرأة الإماراتية في المحافل الدولية وعرض قصص نجاح رائدات الأعمال في الخارج.',
                    ],
                    [
                        'year' => 'اليوم',
                        'title' => 'مستقبل مستدام',
                        'desc' =>
                            'نواصل العمل من أجل خلق جيل جديد من رائدات الأعمال المبدعات اللاتي يساهمن في دفع عجلة الاقتصاد الوطني.',
                    ],
                ];
            @endphp

            <div class="space-y-16">
                @foreach ($milestones as $index => $item)
                    <div
                        class="relative flex flex-col lg:flex-row {{ $index % 2 == 0 ? 'lg:flex-row-reverse' : '' }} items-center text-right">
                        {{-- Timeline Dot --}}
                        <div
                            class="absolute right-0 lg:right-1/2 w-4 h-4 bg-gold-500 rounded-full border-4 border-white transform translate-x-1/2 shadow-lg">
                        </div>

                        <div class="w-full lg:w-1/2 p-8 lg:p-12">
                            <div
                                class="bg-white p-10 rounded-[2.5rem] shadow-xl border border-gold-100 hover:border-gold-300 transition-colors">
                                <span class="text-gold-500 font-black text-2xl mb-2 block">{{ $item['year'] }}</span>
                                <h3 class="text-2xl font-black text-charcoal-900 mb-4">{{ $item['title'] }}</h3>
                                <p class="text-charcoal-700 leading-relaxed text-lg">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                        <div class="hidden lg:block lg:w-1/2"></div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-24 p-12 bg-gold-50 rounded-[3rem] border border-gold-200">
            <h2 class="text-3xl font-black text-charcoal-900 mb-6 text-center">دور الجمعية في تمكين رائدات الأعمال</h2>
            <div class="grid md:grid-cols-2 gap-12 text-lg leading-relaxed text-charcoal-800">
                <p>
                    تلعب جمعية الإمارات لرائدات الأعمال دوراً محورياً في صياغة مستقبل ريادة الأعمال النسائية في الدولة.
                    نحن نعمل كحلقة وصل بين العضوات والجهات التنظيمية، ونسعى دائماً لتذليل العقبات التي قد تواجه المرأة
                    في مسيرتها المهنية.
                </p>
                <p>
                    من خلال برامجنا المتنوعة وشبكة علاقاتنا الواسعة، نوفر للعضوات فرصة الوصول إلى موارد حصرية، وتدريب
                    عالي المستوى، ومنصة لعرض مشاريعهن وإنجازاتهن على المستويين المحلي والدولي.
                </p>
            </div>
        </div>
    </div>
</x-layout.app>
