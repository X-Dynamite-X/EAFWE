{{-- About Page --}}

<x-layout.app title="عن الجمعية">
    {{-- Hero Section --}}
    <div class="bg-charcoal-900 text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute transform -rotate-12 -right-20 top-0">
                <span class="text-[20rem] font-bold text-gold-500">EAFWE</span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">عن جمعية الإمارات لرائدات الأعمال</h1>
            <p class="text-xl text-gold-400 font-bold border-r-4 border-gold-500 pr-4">تمكين، ابتكار، استدامة</p>
        </div>
    </div>

    {{-- Vision & Mission --}}
    <div class="max-w-7xl mx-auto px-6 py-24">
        <div class="grid md:grid-cols-2 gap-12 mb-24">
            {{-- Vision Card --}}
            <div
                class="bg-white p-12 rounded-[2.5rem] shadow-xl border-t-8 border-gold-500 group hover:-translate-y-2 transition-transform duration-300">
                <div
                    class="w-16 h-16 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-blue-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </div>
                <h2 class="text-3xl font-black mb-6 text-charcoal-900">الرؤية</h2>
                <p class="text-charcoal-800 text-xl leading-relaxed">
                    تعزيز ثقافة ريادة الأعمال لدى المرأة الإماراتية للارتقاء بدورها الفاعل كشريك استراتيجي في صناعة
                    اقتصاد مستدام.
                </p>
            </div>

            {{-- Mission Card --}}
            <div
                class="bg-white p-12 rounded-[2.5rem] shadow-xl border-t-8 border-charcoal-900 group hover:-translate-y-2 transition-transform duration-300">
                <div
                    class="w-16 h-16 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-green-600 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-black mb-6 text-charcoal-900">الرسالة</h2>
                <p class="text-charcoal-800 text-xl leading-relaxed">
                    تمكين المرأة في سوق العمل، وخلق جيل من رائدات الأعمال برؤى جديدة وأفكار مبتكرة تسهم بكفاءة عالية في
                    تحقيق أهداف التنمية المستدامة.
                </p>
            </div>
        </div>

        {{-- Core Values --}}
        <div class="mb-24">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-charcoal-900 mb-4">قيمنا الجوهرية</h2>
                <div class="w-24 h-1.5 bg-gold-500 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">
                @php
                    $values = [
                        ['التمكين', '💪'],
                        ['الابتكار', '💡'],
                        ['الاستدامة', '🌱'],
                        ['المسؤولية المجتمعية', '🤝'],
                        ['التميز والريادة', '🏆'],
                        ['الشمولية', '🌐'],
                        ['الشراكات الفاعلة', '🔗'],
                        ['الحفاظ على هويتنا', '🇦🇪'],
                    ];
                @endphp
                @foreach ($values as $value)
                    <div
                        class="bg-white p-8 rounded-3xl text-center shadow-sm border border-gold-100 hover:shadow-md hover:border-gold-300 transition-all group">
                        <div class="mb-4 group-hover:scale-110 transition-transform flex justify-center">
                            <span
                                class="w-12 h-12 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center text-2xl">
                                {{ $value[1] }}
                            </span>
                        </div>
                        <h3 class="text-lg font-black text-charcoal-800">{{ $value[0] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Logo Description --}}
        <div class="bg-gold-50 rounded-[3rem] p-12 lg:p-20 mb-24 relative overflow-hidden">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-black text-charcoal-900 mb-8">وصف الشعار</h2>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <span class="w-2 h-2 rounded-full bg-gold-500 mt-3 shrink-0"></span>
                            <p class="text-xl text-charcoal-800"><strong>اللوتس:</strong> القوة، المرونة، الرفعة</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="w-2 h-2 rounded-full bg-gold-500 mt-3 shrink-0"></span>
                            <p class="text-xl text-charcoal-800"><strong>الشعلة:</strong> النور الذي ينقل المعرفة وقوة
                                لتأثير على مدى الأجيال والمحافظة على القيم والمبادئ</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="w-2 h-2 rounded-full bg-gold-500 mt-3 shrink-0"></span>
                            <p class="text-xl text-charcoal-800"><strong>وجود السيدتين:</strong> للتعبير عن التمكين
                                والتضامن والدعم</p>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-center">
                    <div
                        class="w-64 h-64 lg:w-80 lg:h-80 bg-white rounded-full shadow-inner flex items-center justify-center p-8 border-4 border-gold-200">
                        <svg class="w-32 h-32 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Target Groups --}}
        <div class="mb-24">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-charcoal-900 mb-4">الفئات المستهدفة</h2>
                <div class="w-24 h-1.5 bg-gold-500 mx-auto rounded-full"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $targets = [
                        'رائدات الأعمال المنتسبات للجمعية',
                        'طالبات الجامعات والمدارس',
                        'الخريجات من الجامعات',
                        'المرأة العاملة',
                        'أصحاب الهمم',
                        'الحرفيات',
                        'نزلاء المنشآت العقابية والاصلاحية',
                        'ربات البيت اللواتي يرغبن في تأسيس مشروع خاص فيهن',
                    ];
                @endphp
                @foreach ($targets as $target)
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border-r-4 border-gold-500 flex items-center gap-4 hover:bg-gold-50 transition-colors">
                        <span class="text-green-600 text-xl">✓</span>
                        <span class="text-charcoal-800 font-bold">{{ $target }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout.app>
