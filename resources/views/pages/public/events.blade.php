<x-layout.app title="الفعاليات القادمة">
    {{-- Hero Section --}}
    <div class="bg-charcoal-900 text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute transform -rotate-12 -right-20 top-0">
                <span class="text-[20rem] font-bold text-gold-500">Events</span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">الفعاليات القادمة</h1>
            <p class="text-xl text-gold-400 font-bold border-r-4 border-gold-500 pr-4">انضمي إلينا في فعالياتنا المميزة
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-24">
        <x-ui.section-header title="جدول الفعاليات"
            description="نظم الجمعية مجموعة متنوعة من الفعاليات، من ورش العمل إلى المؤتمرات الكبرى، لتعزيز التواصل وتبادل الخبرات." />

        <div class="grid gap-8">
            @php
                $events = [
                    [
                        'title' => 'ملتقى رائدات الأعمال السنوي',
                        'date' => '25 مايو 2026',
                        'location' => 'دبي، الإمارات العربية المتحدة',
                        'desc' =>
                            'تجمع سنوي يضم نخبة من رائدات الأعمال لتبادل الخبرات ومناقشة التحديات والفرص المستقبلية.',
                        'status' => 'قريبًا',
                        'status_color' => 'blue',
                    ],
                    [
                        'title' => 'ورشة عمل: القيادة الابتكارية',
                        'date' => '10 يونيو 2026',
                        'location' => 'أبوظبي، الإمارات العربية المتحدة',
                        'desc' => 'ورشة عمل تدريبية تركز على تطوير مهارات القيادة والابتكار في إدارة المشاريع الناشئة.',
                        'status' => 'مفتوح للتسجيل',
                        'status_color' => 'green',
                    ],
                    [
                        'title' => 'منتدى المرأة والاقتصاد الرقمي',
                        'date' => '15 يوليو 2026',
                        'location' => 'الشارقة، الإمارات العربية المتحدة',
                        'desc' => 'منتدى متخصص يناقش دور المرأة في التحول الرقمي وكيفية الاستفادة من التقنيات الحديثة.',
                        'status' => 'قريبًا',
                        'status_color' => 'blue',
                    ],
                ];
            @endphp

            @foreach ($events as $event)
                <div
                    class="bg-white rounded-[2.5rem] p-8 lg:p-12 shadow-xl border border-gold-100 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex flex-col lg:flex-row gap-8 items-start lg:items-center">
                        <div class="grow">
                            <div class="flex items-center gap-4 mb-4">
                                <span
                                    class="px-4 py-1.5 rounded-full text-sm font-black bg-{{ $event['status_color'] }}-50 text-{{ $event['status_color'] }}-600">
                                    {{ $event['status'] }}
                                </span>
                                <span class="text-charcoal-500 font-bold flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $event['date'] }}
                                </span>
                            </div>
                            <h3 class="text-2xl lg:text-3xl font-black text-charcoal-900 mb-4">{{ $event['title'] }}
                            </h3>
                            <p class="text-charcoal-700 text-lg mb-6 leading-relaxed max-w-3xl">{{ $event['desc'] }}</p>
                            <div class="flex items-center gap-2 text-charcoal-500 font-bold">
                                <svg class="w-5 h-5 text-gold-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $event['location'] }}
                            </div>
                        </div>
                        <div class="shrink-0">
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center justify-center bg-charcoal-900 text-gold-400 px-8 py-4 rounded-2xl font-black hover:bg-charcoal-800 transition-colors shadow-lg shadow-charcoal-900/20 group">
                                <span>سجل الآن (للأعضاء فقط)</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout.app>
