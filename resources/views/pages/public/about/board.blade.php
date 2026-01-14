<x-layout.app title="مجلس الإدارة">
    {{-- Hero Section --}}
    <div class="bg-charcoal-900 text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute transform -rotate-12 -right-20 top-0">
                <span class="text-[20rem] font-bold text-gold-500">Board</span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <h1 class="text-4xl lg:text-5xl font-black mb-6">مجلس الإدارة</h1>
            <p class="text-xl text-gold-400 font-bold border-r-4 border-gold-500 pr-4">قيادة حكيمة نحو مستقبل مزدهر</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-24">
        <x-ui.section-header title="الهيكل التنظيمي"
            description="نخبة من الكفاءات الوطنية التي تسعى لتحقيق رؤية الجمعية وتمكين المرأة في عالم الأعمال." />

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
            @php
                $board = [
                    [
                        'name' => 'رئيسة الجمعية',
                        'position' => 'رئيس مجلس الإدارة',
                        'desc' => 'قائدة ملهمة بخبرة واسعة في إدارة الأعمال والمبادرات المجتمعية.',
                        'image' => 'https://via.placeholder.com/400x500?text=President',
                    ],
                    [
                        'name' => 'نائبة الرئيس',
                        'position' => 'نائب رئيس مجلس الإدارة',
                        'desc' => 'خبيرة اقتصادية تساهم في تطوير الاستراتيجيات المالية والتنموية للجمعية.',
                        'image' => 'https://via.placeholder.com/400x500?text=VP',
                    ],
                    [
                        'name' => 'أمينة السر',
                        'position' => 'عضو مجلس الإدارة',
                        'desc' => 'تتولى إدارة الشؤون الإدارية والتنسيق بين اللجان المختلفة.',
                        'image' => 'https://via.placeholder.com/400x500?text=Member+1',
                    ],
                    // يمكن إضافة المزيد من الأعضاء هنا
                ];
            @endphp

            @foreach ($board as $member)
                <div
                    class="bg-white rounded-[2.5rem] overflow-hidden shadow-xl border border-gold-100 hover:-translate-y-2 transition-transform duration-300 group">
                    <div class="relative h-[400px]">
                        <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500">
                        <div
                            class="absolute inset-0 bg-linear-to-t from-charcoal-900/80 to-transparent flex flex-col justify-end p-8">
                            <h3 class="text-2xl font-black text-white mb-1">{{ $member['name'] }}</h3>
                            <p class="text-gold-400 font-bold">{{ $member['position'] }}</p>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-charcoal-700 leading-relaxed">{{ $member['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout.app>
