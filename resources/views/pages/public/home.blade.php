{{-- Home Page --}}

<x-layout.app title="الرئيسية">
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-gold-500 via-gold-600 to-gold-700 text-white py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl font-bold mb-4">مرحباً بك في EAFWE</h1>
                    <p class="text-xl mb-2 text-white/90">منصة متخصصة في إدارة العضويات والطلبات</p>
                    <p class="text-lg text-white/80 mb-8">نوفر حلولاً شاملة وفعّالة لإدارة عملياتك بسهولة وأمان</p>

                    @auth
                        <x-ui.button href="{{ route('dashboard') }}" color="black" size="lg">
                            انتقل إلى لوحة التحكم
                        </x-ui.button>
                    @else
                        <div class="flex gap-4">
                            <x-ui.button href="{{ route('login') }}" color="black" size="lg">دخول</x-ui.button>
                            <x-ui.button href="{{ route('register') }}" color="white" size="lg">تسجيل جديد</x-ui.button>
                        </div>
                    @endauth
                </div>
                <div class="text-center">
                    <div class="text-8xl">🚀</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">المميزات الرئيسية</h2>

            <div class="grid md:grid-cols-4 gap-6">
                {{-- Feature 1 --}}
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="text-4xl mb-3">⚡</div>
                    <h3 class="font-bold text-lg mb-2">سريعة وفعّالة</h3>
                    <p class="text-gray-600 text-sm">منصة سريعة وموثوقة توفر الأداء الأمثل</p>
                </div>

                {{-- Feature 2 --}}
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="text-4xl mb-3">🔐</div>
                    <h3 class="font-bold text-lg mb-2">آمنة تماماً</h3>
                    <p class="text-gray-600 text-sm">تشفير من الدرجة الأولى لحماية بيانات العملاء</p>
                </div>

                {{-- Feature 3 --}}
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="text-4xl mb-3">📊</div>
                    <h3 class="font-bold text-lg mb-2">تحليلات متقدمة</h3>
                    <p class="text-gray-600 text-sm">تقارير وتحليلات شاملة لاتخاذ القرارات</p>
                </div>

                {{-- Feature 4 --}}
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="text-4xl mb-3">🎯</div>
                    <h3 class="font-bold text-lg mb-2">سهلة الاستخدام</h3>
                    <p class="text-gray-600 text-sm">واجهة ودية وسهلة للاستخدام للجميع</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Preview --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-5xl">💼</div>
                <div>
                    <h2 class="text-3xl font-bold mb-6">خدماتنا المتنوعة</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        نقدم مجموعة شاملة من الخدمات المتخصصة المصممة لتلبية احتياجات الأفراد والشركات.
                    </p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-center"><span class="text-gold-600 mr-3">✓</span> إدارة البيانات المتقدمة</li>
                        <li class="flex items-center"><span class="text-gold-600 mr-3">✓</span> الأمان والحماية من الدرجة الأولى</li>
                        <li class="flex items-center"><span class="text-gold-600 mr-3">✓</span> التخطيط والاستراتيجية</li>
                        <li class="flex items-center"><span class="text-gold-600 mr-3">✓</span> الاستشارات المتخصصة</li>
                    </ul>
                    <a href="{{ route('services') }}" class="inline-block bg-gold-600 text-white px-6 py-3 rounded-lg hover:bg-gold-700 transition">
                        اعرف المزيد عن خدماتنا
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- About Preview --}}
    <section class="py-16 bg-gradient-to-r from-gray-900 to-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">عن EAFWE</h2>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        EAFWE هي منصة رائدة متخصصة في توفير حلول إدارية متكاملة وفعّالة.
                    </p>
                    <div class="grid grid-cols-3 gap-6 mb-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-gold-400">10+</div>
                            <p class="text-gray-300">سنوات خبرة</p>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-gold-400">5000+</div>
                            <p class="text-gray-300">عميل راضٍ</p>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-gold-400">99%</div>
                            <p class="text-gray-300">معدل الرضا</p>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="inline-block bg-gold-600 text-white px-6 py-3 rounded-lg hover:bg-gold-700 transition">
                        تعرف علينا أكثر
                    </a>
                </div>
                <div class="text-5xl text-center">🏆</div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">هل تريد البدء الآن؟</h2>
            <p class="text-gray-600 mb-8">انضم إلى آلاف العملاء الراضين الذين يستخدمون EAFWE</p>
            <div class="flex gap-4 justify-center">
                @auth
                    <a href="{{ route('dashboard') }}" class="inline-block bg-gold-600 text-white px-8 py-3 rounded-lg hover:bg-gold-700 transition">
                        اذهب إلى لوحة التحكم
                    </a>
                @else
                    <a href="{{ route('register') }}" class="inline-block bg-gold-600 text-white px-8 py-3 rounded-lg hover:bg-gold-700 transition">
                        سجل الآن مجاناً
                    </a>
                    <a href="{{ route('contact') }}" class="inline-block border-2 border-gold-600 text-gold-600 px-8 py-3 rounded-lg hover:bg-gold-50 transition">
                        تواصل معنا
                    </a>
                @endauth
            </div>
        </div>
    </section>
</x-layout.app>
