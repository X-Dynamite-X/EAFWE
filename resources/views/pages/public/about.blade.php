{{-- About Page --}}

<x-layout.app title="عن المنصة">
    {{-- Hero Section --}}
    <div class="bg-gradient-to-r from-gold-600 to-gold-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-4xl font-bold mb-4">عن منصة EAFWE</h1>
            <p class="text-xl opacity-90">منصة رائدة في تقديم الخدمات والحلول المتكاملة</p>
        </div>
    </div>

    {{-- About Section --}}
    <div class="max-w-7xl mx-auto px-6 py-16">
        {{-- Mission & Vision --}}
        <div class="grid md:grid-cols-2 gap-12 mb-16">
            {{-- Mission --}}
            <div class="bg-white p-8 rounded-lg shadow-md border-r-4 border-gold-600">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gold-600 text-white rounded-full flex items-center justify-center text-2xl">
                        🎯
                    </div>
                    <h2 class="text-2xl font-bold mr-4">مهمتنا</h2>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    نهدف إلى تقديم خدمات عالية الجودة تلبي احتياجات العملاء والشركاء. نركز على الابتكار والتطور المستمر
                    لضمان أفضل تجربة للمستخدمين.
                </p>
            </div>

            {{-- Vision --}}
            <div class="bg-white p-8 rounded-lg shadow-md border-r-4 border-blue-600">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl">
                        👁️
                    </div>
                    <h2 class="text-2xl font-bold mr-4">رؤيتنا</h2>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    أن نصبح المنصة الموثوقة والرائدة في المنطقة، والمشهورة بالجودة والابتكار. نسعى لبناء علاقات طويلة الأجل
                    مع عملائنا.
                </p>
            </div>
        </div>

        {{-- Core Values --}}
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-12">قيمنا الأساسية</h2>
            <div class="grid md:grid-cols-4 gap-6">
                {{-- Integrity --}}
                <div class="text-center p-6 bg-gray-50 rounded-lg hover:bg-gold-50 transition">
                    <div class="text-4xl mb-3">⚖️</div>
                    <h3 class="text-xl font-bold mb-2">النزاهة</h3>
                    <p class="text-gray-600">نعمل بأمانة وشفافية مع جميع أصحابنا</p>
                </div>

                {{-- Excellence --}}
                <div class="text-center p-6 bg-gray-50 rounded-lg hover:bg-gold-50 transition">
                    <div class="text-4xl mb-3">✨</div>
                    <h3 class="text-xl font-bold mb-2">التميز</h3>
                    <p class="text-gray-600">نسعى للتفوق في كل ما نقدمه</p>
                </div>

                {{-- Innovation --}}
                <div class="text-center p-6 bg-gray-50 rounded-lg hover:bg-gold-50 transition">
                    <div class="text-4xl mb-3">💡</div>
                    <h3 class="text-xl font-bold mb-2">الابتكار</h3>
                    <p class="text-gray-600">نبتكر حلولاً جديدة للتحديات</p>
                </div>

                {{-- Respect --}}
                <div class="text-center p-6 bg-gray-50 rounded-lg hover:bg-gold-50 transition">
                    <div class="text-4xl mb-3">🤝</div>
                    <h3 class="text-xl font-bold mb-2">الاحترام</h3>
                    <p class="text-gray-600">نحترم الجميع ونقدر اختلافاتهم</p>
                </div>
            </div>
        </div>

        {{-- Statistics --}}
        <div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white rounded-lg p-12 mb-16">
            <h2 class="text-3xl font-bold text-center mb-12">إحصائياتنا</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-gold-400 mb-2">10+</div>
                    <p class="text-gray-300">سنوات من الخبرة</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-gold-400 mb-2">5000+</div>
                    <p class="text-gray-300">عميل راضٍ</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-gold-400 mb-2">50+</div>
                    <p class="text-gray-300">موظف متخصص</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-gold-400 mb-2">99%</div>
                    <p class="text-gray-300">معدل الرضا</p>
                </div>
            </div>
        </div>

        {{-- Team Section --}}
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-12">فريق العمل</h2>
            <p class="text-center text-gray-600 mb-8 max-w-3xl mx-auto">
                نحن فريق من المتخصصين والمحترفين الذين يعملون بجد لتحقيق رؤيتنا. كل عضو في الفريق يجلب خبرة فريدة وشغف حقيقي
                للعمل.
            </p>
        </div>

        {{-- CTA Section --}}
        <div class="bg-gold-50 border-l-4 border-gold-600 p-8 rounded-lg text-center">
            <h2 class="text-2xl font-bold mb-4">هل تريد معرفة المزيد؟</h2>
            <p class="text-gray-700 mb-6">تواصل معنا الآن وتعرف على كيف يمكننا مساعدتك</p>
            <a href="{{ route('contact') }}" class="inline-block bg-gold-600 text-white px-8 py-3 rounded-lg hover:bg-gold-700 transition">
                اتصل بنا الآن
            </a>
        </div>
    </div>
</x-layout.app>
