<x-layout.dashboard title="مركز الملفات">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-charcoal-900 mb-2">مركز الملفات الخاص بالأعضاء</h1>
            <p class="text-charcoal-600">تحميل النماذج الرسمية، السياسات، والأدلة الإرشادية الخاصة بالجمعية.</p>
        </div>
        <div class="hidden md:block">
            <div class="relative">
                <input type="text" placeholder="بحث عن ملف..."
                    class="pr-10 pl-4 py-2 border rounded-xl focus:ring-2 focus:ring-gold-500 border-gray-200 text-sm">
                <span class="absolute right-3 top-2.5 text-gray-400">🔍</span>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-4 gap-6">
        {{-- File Categories --}}
        <div class="space-y-4">
            @php
                $categories = [
                    ['label' => 'جميع الملفات', 'count' => 24, 'active' => true],
                    ['label' => 'نماذج رسمية', 'count' => 8, 'active' => false],
                    ['label' => 'سياسات وقوانين', 'count' => 5, 'active' => false],
                    ['label' => 'أدلة إرشادية', 'count' => 7, 'active' => false],
                    ['label' => 'تقارير داخلية', 'count' => 4, 'active' => false],
                ];
            @endphp
            @foreach ($categories as $cat)
                <button
                    class="w-full flex items-center justify-between px-4 py-3 rounded-xl transition-colors {{ $cat['active'] ? 'bg-gold-500 text-charcoal-900 font-black' : 'bg-white border border-gray-100 text-charcoal-600 hover:bg-gray-50' }}">
                    <span>{{ $cat['label'] }}</span>
                    <span class="text-xs opacity-60">{{ $cat['count'] }}</span>
                </button>
            @endforeach
        </div>

        {{-- Files List --}}
        <div class="lg:col-span-3">
            <x-ui.card>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th
                                    class="text-right px-6 py-4 text-xs font-black text-charcoal-500 uppercase tracking-wider">
                                    اسم الملف</th>
                                <th
                                    class="text-right px-6 py-4 text-xs font-black text-charcoal-500 uppercase tracking-wider">
                                    التصنيف</th>
                                <th
                                    class="text-right px-6 py-4 text-xs font-black text-charcoal-500 uppercase tracking-wider">
                                    الحجم</th>
                                <th
                                    class="text-right px-6 py-4 text-xs font-black text-charcoal-500 uppercase tracking-wider">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @php
                                $files = [
                                    [
                                        'name' => 'نموذج طلب رعاية مشروع جديد',
                                        'cat' => 'نماذج رسمية',
                                        'size' => '450 KB',
                                        'type' => 'PDF',
                                    ],
                                    [
                                        'name' => 'سياسة العضوية المحدثة 2026',
                                        'cat' => 'سياسات وقوانين',
                                        'size' => '1.2 MB',
                                        'type' => 'PDF',
                                    ],
                                    [
                                        'name' => 'دليل الخدمات الإلكترونية للعضوات',
                                        'cat' => 'أدلة إرشادية',
                                        'size' => '3.8 MB',
                                        'type' => 'PDF',
                                    ],
                                    [
                                        'name' => 'استمارة المشاركة في المعارض الدولية',
                                        'cat' => 'نماذج رسمية',
                                        'size' => '320 KB',
                                        'type' => 'DOCX',
                                    ],
                                    [
                                        'name' => 'التقرير السنوي لإنجازات رائدات الأعمال',
                                        'cat' => 'تقارير داخلية',
                                        'size' => '5.5 MB',
                                        'type' => 'PDF',
                                    ],
                                ];
                            @endphp
                            @foreach ($files as $file)
                                <tr class="hover:bg-gray-50 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="text-2xl">{{ $file['type'] == 'PDF' ? '📕' : '📘' }}</span>
                                            <span class="font-bold text-charcoal-900">{{ $file['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 bg-gray-100 text-charcoal-600 rounded-lg text-xs font-bold">{{ $file['cat'] }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-charcoal-500">{{ $file['size'] }}</td>
                                    <td class="px-6 py-4 text-left">
                                        <button
                                            class="text-gold-500 hover:text-gold-600 font-bold transition-colors">تحميل</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>
