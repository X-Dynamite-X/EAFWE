{{-- Services Page --}}

<x-layout.app title="الخدمات">
    {{-- Hero Section --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-4xl font-bold mb-4">خدماتنا</h1>
            <p class="text-xl opacity-90">حلول شاملة ومتكاملة لجميع احتياجاتك</p>
        </div>
    </div>

    {{-- Services Grid --}}
    <div class="max-w-7xl mx-auto px-6 py-16">
        {{-- Introduction --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">ما الذي نقدمه؟</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                نقدم مجموعة شاملة من الخدمات المتخصصة المصممة لتلبية احتياجات الأفراد والشركات. 
                كل خدمة مصممة بعناية لتوفير أفضل قيمة وفائدة.
            </p>
        </div>

        {{-- Main Services --}}
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            {{-- Service 1 --}}
            <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-32 flex items-center justify-center">
                    <div class="text-6xl">📊</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3">إدارة البيانات</h3>
                    <p class="text-gray-600 mb-4">
                        نوفر حلولاً متقدمة لإدارة وتحليل البيانات بكفاءة عالية.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ تحليل البيانات المتقدم</li>
                        <li>✓ إدارة قواعد البيانات</li>
                        <li>✓ التقارير المخصصة</li>
                    </ul>
                </div>
            </div>

            {{-- Service 2 --}}
            <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition overflow-hidden">
                <div class="bg-gradient-to-r from-green-500 to-green-600 h-32 flex items-center justify-center">
                    <div class="text-6xl">🔐</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3">الأمان والحماية</h3>
                    <p class="text-gray-600 mb-4">
                        نضمن أمان بيانات عملائنا بأحدث تقنيات التشفير.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ تشفير من الدرجة الأولى</li>
                        <li>✓ حماية 24/7</li>
                        <li>✓ نسخ احتياطية آمنة</li>
                    </ul>
                </div>
            </div>

            {{-- Service 3 --}}
            <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-32 flex items-center justify-center">
                    <div class="text-6xl">🎯</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3">التخطيط والاستراتيجية</h3>
                    <p class="text-gray-600 mb-4">
                        نساعدك في وضع خطط استراتيجية فعالة لتحقيق أهدافك.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ تطوير الاستراتيجيات</li>
                        <li>✓ تحليل السوق</li>
                        <li>✓ تخطيط الموارد</li>
                    </ul>
                </div>
            </div>

            {{-- Service 4 --}}
            <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition overflow-hidden">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 h-32 flex items-center justify-center">
                    <div class="text-6xl">💼</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3">الاستشارات</h3>
                    <p class="text-gray-600 mb-4">
                        استشاريون متخصصون يساعدونك في حل التحديات الشاملة.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ استشارات متخصصة</li>
                        <li>✓ دراسات جدوى</li>
                        <li>✓ حل المشاكل</li>
                    </ul>
                </div>
            </div>

            {{-- Service 5 --}}
            <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition overflow-hidden">
                <div class="bg-gradient-to-r from-red-500 to-red-600 h-32 flex items-center justify-center">
                    <div class="text-6xl">📱</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3">التطبيقات الذكية</h3>
                    <p class="text-gray-600 mb-4">
                        تطبيقات مخصصة توفر أداءً عالياً وسهولة في الاستخدام.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ تطبيقات ويب</li>
                        <li>✓ تطبيقات موبايل</li>
                        <li>✓ واجهات مستخدم متقدمة</li>
                    </ul>
                </div>
            </div>

            {{-- Service 6 --}}
            <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition overflow-hidden">
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 h-32 flex items-center justify-center">
                    <div class="text-6xl">📚</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3">التدريب والتطوير</h3>
                    <p class="text-gray-600 mb-4">
                        برامج تدريبية شاملة لتطوير مهارات فريقك.
                    </p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>✓ برامج تدريبية</li>
                        <li>✓ ورش عمل</li>
                        <li>✓ شهادات معتمدة</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Why Choose Us --}}
        <div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white rounded-lg p-12">
            <h2 class="text-3xl font-bold text-center mb-12">لماذا تختار خدماتنا؟</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="flex items-start">
                    <div class="bg-gold-600 rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0 mt-1">
                        ✓
                    </div>
                    <div class="mr-4">
                        <h4 class="font-bold mb-2">خبرة عميقة</h4>
                        <p class="text-gray-300">سنوات من الخبرة في تقديم الخدمات الموثوقة</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-gold-600 rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0 mt-1">
                        ✓
                    </div>
                    <div class="mr-4">
                        <h4 class="font-bold mb-2">فريق محترف</h4>
                        <p class="text-gray-300">متخصصون مؤهلون لتقديم أفضل الخدمات</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-gold-600 rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0 mt-1">
                        ✓
                    </div>
                    <div class="mr-4">
                        <h4 class="font-bold mb-2">أسعار تنافسية</h4>
                        <p class="text-gray-300">أفضل قيمة مقابل الخدمات المقدمة</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-gold-600 rounded-full w-10 h-10 flex items-center justify-center flex-shrink-0 mt-1">
                        ✓
                    </div>
                    <div class="mr-4">
                        <h4 class="font-bold mb-2">دعم مستمر</h4>
                        <p class="text-gray-300">دعم 24/7 لضمان رضاك التام</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA Section --}}
        <div class="mt-16 text-center">
            <h2 class="text-3xl font-bold mb-4">هل أنت مهتم بإحدى خدماتنا؟</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                تواصل معنا الآن لمناقشة احتياجاتك والحصول على عرض مخصص.
            </p>
            <a href="{{ route('contact') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                تواصل معنا
            </a>
        </div>
    </div>
</x-layout.app>
