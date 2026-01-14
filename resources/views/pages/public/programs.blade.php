<x-layout.app title="البرامج والمبادرات">
    {{-- Hero Section --}}
    <div class="bg-charcoal-900 text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute transform -rotate-12 -right-20 top-0">
                <span class="text-[20rem] font-bold text-gold-500">Programs</span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">البرامج والمبادرات</h1>
            <p class="text-xl text-gold-400 font-bold border-r-4 border-gold-500 pr-4">مبادراتنا لتمكين رائدات الأعمال
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-24">
        <x-ui.section-header title="برامجنا المتميزة"
            description="نقدم مجموعة واسعة من البرامج والمبادرات المصممة خصيصاً لدعم وتطوير رائدات الأعمال في مراحل مختلفة من مسيرتهن المهنية." />

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $programs = [
                    [
                        'title' => 'برامج تمكين رائدات الأعمال',
                        'desc' => 'برامج متكاملة تهدف إلى تزويد رائدات الأعمال بالمهارات والأدوات اللازمة للنجاح.',
                        'icon' => '💪',
                    ],
                    [
                        'title' => 'المبادرات المجتمعية',
                        'desc' => 'مشاريع تهدف إلى تعزيز دور المرأة في تنمية المجتمع المحلي.',
                        'icon' => '🤝',
                    ],
                    [
                        'title' => 'البرامج التدريبية',
                        'desc' => 'دورات تخصصية في مختلف مجالات الإدارة والتقنية وريادة الأعمال.',
                        'icon' => '🎓',
                    ],
                    [
                        'title' => 'المبادرات الدولية',
                        'desc' => 'توسيع آفاق رائدات الأعمال من خلال الشراكات والفعاليات العالمية.',
                        'icon' => '🌐',
                    ],
                    [
                        'title' => 'برامج الشراكات',
                        'desc' => 'بناء جسور التواصل مع المؤسسات الحكومية والخاصة لدعم العضوات.',
                        'icon' => '🔗',
                    ],
                    [
                        'title' => 'المشاريع الريادية',
                        'desc' => 'احتضان ودعم الأفكار المبتكرة وتحويلها إلى مشاريع قائمة.',
                        'icon' => '💡',
                    ],
                ];
            @endphp

            @foreach ($programs as $program)
                <div
                    class="bg-white rounded-[2.5rem] p-8 shadow-xl border border-gold-100 hover:-translate-y-2 transition-transform duration-300 flex flex-col">
                    <div class="w-16 h-16 bg-gold-50 text-3xl flex items-center justify-center rounded-2xl mb-6">
                        {{ $program['icon'] }}
                    </div>
                    <h3 class="text-2xl font-black text-charcoal-900 mb-4">{{ $program['title'] }}</h3>
                    <p class="text-charcoal-800 mb-8 grow leading-relaxed">{{ $program['desc'] }}</p>

                    <div class="mt-auto">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center gap-2 text-gold-600 font-black hover:text-gold-700 group">
                            <span>التسجيل متاح للأعضاء فقط</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout.app>
