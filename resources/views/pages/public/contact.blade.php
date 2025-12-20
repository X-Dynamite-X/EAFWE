{{-- Contact Page --}}

<x-layout.app title="التواصل معنا">
    {{-- Hero Section --}}
    <div class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-4xl font-bold mb-4">تواصل معنا</h1>
            <p class="text-xl opacity-90">نحن هنا للإجابة على جميع أسئلتك</p>
        </div>
    </div>

    {{-- Contact Content --}}
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            {{-- Phone --}}
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition text-center">
                <div class="text-4xl mb-4">📞</div>
                <h3 class="text-xl font-bold mb-2">الهاتف</h3>
                <p class="text-gray-600 mb-4">اتصل بنا مباشرة</p>
                <a href="tel:+1234567890" class="text-green-600 font-bold hover:text-green-700">
                    +966 1 234 5678
                </a>
            </div>

            {{-- Email --}}
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition text-center">
                <div class="text-4xl mb-4">📧</div>
                <h3 class="text-xl font-bold mb-2">البريد الإلكتروني</h3>
                <p class="text-gray-600 mb-4">أرسل لنا رسالة</p>
                <a href="mailto:info@eafwe.com" class="text-green-600 font-bold hover:text-green-700">
                    info@eafwe.com
                </a>
            </div>

            {{-- Location --}}
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition text-center">
                <div class="text-4xl mb-4">📍</div>
                <h3 class="text-xl font-bold mb-2">العنوان</h3>
                <p class="text-gray-600">الرياض، المملكة العربية السعودية</p>
                <p class="text-gray-600">شارع الملك فهد، المركز التجاري</p>
            </div>
        </div>

        {{-- Contact Form Section --}}
        <div class="grid md:grid-cols-2 gap-12">
            {{-- Form --}}
            <div>
                <h2 class="text-2xl font-bold mb-6">أرسل لنا رسالة</h2>
                <form action="#" method="POST" class="space-y-4">
                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم الكامل</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                            placeholder="أدخل اسمك الكامل">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                            placeholder="أدخل بريدك الإلكتروني">
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف</label>
                        <input type="tel" id="phone" name="phone"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                            placeholder="أدخل رقم هاتفك">
                    </div>

                    {{-- Subject --}}
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">الموضوع</label>
                        <input type="text" id="subject" name="subject" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                            placeholder="موضوع الرسالة">
                    </div>

                    {{-- Message --}}
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">الرسالة</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-600"
                            placeholder="أدخل رسالتك هنا"></textarea>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="w-full bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-bold">
                        إرسال الرسالة
                    </button>
                </form>
            </div>

            {{-- Info Section --}}
            <div>
                <h2 class="text-2xl font-bold mb-6">معلومات التواصل</h2>

                {{-- Working Hours --}}
                <div class="bg-gray-50 p-6 rounded-lg mb-6">
                    <h3 class="font-bold text-lg mb-4">ساعات العمل</h3>
                    <div class="space-y-2 text-gray-700">
                        <p><span class="font-semibold">الأحد - الخميس:</span> 8:00 صباحاً - 5:00 مساءً</p>
                        <p><span class="font-semibold">الجمعة - السبت:</span> مغلق</p>
                    </div>
                </div>

                {{-- Services --}}
                <div class="bg-gray-50 p-6 rounded-lg mb-6">
                    <h3 class="font-bold text-lg mb-4">خدمات العملاء</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li>✓ الدعم الفني متاح 24/7</li>
                        <li>✓ الرد على الاستفسارات خلال 24 ساعة</li>
                        <li>✓ استشارات مجانية</li>
                        <li>✓ دعم متعدد اللغات</li>
                    </ul>
                </div>

                {{-- Quick Links --}}
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="font-bold text-lg mb-4">روابط سريعة</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-green-600 hover:text-green-700">الرئيسية</a></li>
                        <li><a href="{{ route('about') }}" class="text-green-600 hover:text-green-700">عن المنصة</a></li>
                        <li><a href="{{ route('services') }}" class="text-green-600 hover:text-green-700">الخدمات</a></li>
                        <li><a href="{{ route('login') }}" class="text-green-600 hover:text-green-700">دخول</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Map Section (Optional) --}}
        <div class="mt-16">
            <h2 class="text-2xl font-bold mb-6">موقعنا على الخريطة</h2>
            <div class="bg-gray-200 rounded-lg overflow-hidden h-96">
                <iframe 
                    class="w-full h-full"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3625.3556826894173!2d46.67581212346904!3d24.774265878906047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d22d5d5%3A0x50669c0b41aeb10!2sRiyadh%2C%20Saudi%20Arabia!5e0!3m2!1sen!2ssa!4v1234567890" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        {{-- FAQ Section --}}
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-center mb-12">الأسئلة الشائعة</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="border-l-4 border-green-600 pl-4">
                    <h4 class="font-bold mb-2">كم معدل الرد على الاستفسارات؟</h4>
                    <p class="text-gray-600">نرد على جميع الاستفسارات خلال 24 ساعة كحد أقصى</p>
                </div>
                <div class="border-l-4 border-green-600 pl-4">
                    <h4 class="font-bold mb-2">هل تقدمون استشارات مجانية؟</h4>
                    <p class="text-gray-600">نعم، نقدم استشارات مجانية للعملاء الجدد</p>
                </div>
                <div class="border-l-4 border-green-600 pl-4">
                    <h4 class="font-bold mb-2">ما وسائل الدفع المتاحة؟</h4>
                    <p class="text-gray-600">نقبل جميع طرق الدفع الرئيسية والحوالات البنكية</p>
                </div>
                <div class="border-l-4 border-green-600 pl-4">
                    <h4 class="font-bold mb-2">هل يوجد ضمان على الخدمات؟</h4>
                    <p class="text-gray-600">نعم، نوفر ضمان شامل على جميع خدماتنا</p>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
