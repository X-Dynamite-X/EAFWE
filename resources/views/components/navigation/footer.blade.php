{{-- Footer Component --}}

<footer class="bg-charcoal-900 text-gold-50 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-12 mb-12">
            {{-- About --}}
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-white text-xl font-bold mb-6">جمعية الإمارات لرائدات الأعمال</h3>
                <p class="text-gold-100/80 leading-relaxed mb-6">
                    جمعية غير ربحية ذات نفع عام تهدف إلى نشر وتعزيز ثقافة ريادة الأعمال لدى المرأة الإماراتية للارتقاء
                    بدورها الفاعل كشريك استراتيجي في صناعة اقتصاد مستدام.
                </p>
                <div class="flex items-center gap-4">
                    <a href="#"
                        class="w-10 h-10 border border-gold-500/30 rounded-full flex items-center justify-center hover:bg-gold-500 hover:text-charcoal-900 transition-all duration-300">
                        <span class="sr-only">Instagram</span>
                        📸
                    </a>
                </div>
            </div>

            {{-- Links --}}
            <div>
                <h3 class="text-white font-bold mb-6">روابط سريعة</h3>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">الرئيسية</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-gold-400 transition-colors">عن الجمعية</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-gold-400 transition-colors">مجالات العمل</a>
                    </li>
                    <li><a href="{{ route('contact') }}" class="hover:text-gold-400 transition-colors">تواصل معنا</a>
                    </li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="text-white font-bold mb-6">اتصلي بنا</h3>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-center gap-3">
                        <span>📧</span>
                        <a href="mailto:info@eafwe.ae" class="hover:text-gold-400 transition-colors">info@eafwe.ae</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <span>📍</span>
                        <span>الإمارات العربية المتحدة</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom --}}
        <div
            class="border-t border-gold-500/20 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gold-100/50">
            <p>© 2025 جمعية الإمارات لرائدات الأعمال. جميع الحقوق محفوظة</p>
            <div class="flex gap-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-gold-400 transition-colors">سياسة الخصوصية</a>
                <a href="#" class="hover:text-gold-400 transition-colors">شروط الاستخدام</a>
            </div>
        </div>
    </div>
</footer>
