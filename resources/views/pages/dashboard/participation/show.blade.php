<x-layout.dashboard title="عرض الفرصة المشاركة">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $opportunity->title }}</h1>
                <p class="text-gray-600 mt-1">عرض تفاصيل فرصة المشاركة</p>
            </div>
            @can('manage participation opportunities')
            <div class="flex gap-2">
                <x-ui.button href="{{ route('dashboard.participation.edit', $opportunity) }}" color="primary" size="sm">
                    <i class="fas fa-edit"></i> تعديل
                </x-ui.button>
                <button type="button" onclick="openDeleteModal('{{ $opportunity->id }}', '{{ $opportunity->title }}', '{{ route('dashboard.participation.destroy', $opportunity) }}')" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded text-sm transition-colors">
                    <i class="fas fa-trash"></i> حذف
                </button>
            </div>
            @endcan
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <x-ui.card>
                    @if($opportunity->image_url)
                    <img src="{{ $opportunity->image_url }}" class="w-full rounded-lg object-cover mb-6" style="max-height: 400px;" alt="{{ $opportunity->title }}">
                    @endif

                    <div class="mb-4">
                        <x-ui.badge color="blue">
                            @switch($opportunity->type)
                                @case('volunteer')
                                    تطوع
                                    @break
                                @case('partner')
                                    شراكة
                                    @break
                                @case('sponsor')
                                    رعاية
                                    @break
                            @endswitch
                        </x-ui.badge>
                    </div>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">{{ $opportunity->description }}</p>

                    <div class="prose prose-sm max-w-none mb-6 text-gray-700">
                        {!! $opportunity->content !!}
                    </div>

                    <div class="border-t border-gray-200 pt-4 text-sm text-gray-600">
                        <div class="mb-2">
                            <i class="fas fa-calendar"></i>
                            من: {{ $opportunity->start_date?->format('d/m/Y') ?? 'غير محدد' }}
                        </div>
                        <div>
                            <i class="fas fa-calendar-check"></i>
                            إلى: {{ $opportunity->end_date?->format('d/m/Y') ?? 'غير محدد' }}
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4 mt-4 text-sm text-gray-600">
                        <i class="fas fa-clock"></i>
                        تم الإنشاء: {{ $opportunity->created_at->format('d/m/Y H:i') }}
                        @if($opportunity->updated_at != $opportunity->created_at)
                        | تم التحديث: {{ $opportunity->updated_at->format('d/m/Y H:i') }}
                        @endif
                    </div>
                </x-ui.card>

                <div class="mt-6">
                    <x-ui.button href="{{ route('dashboard.participation.opportunities') }}" color="gray">
                        <i class="fas fa-arrow-right"></i> العودة
                    </x-ui.button>
                </div>
            </div>

            <div class="lg:col-span-1">
                <x-ui.card>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">معلومات الفرصة</h3>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-600">النوع</p>
                            <p class="font-medium text-gray-900">
                                @switch($opportunity->type)
                                    @case('volunteer')
                                        تطوع
                                        @break
                                    @case('partner')
                                        شراكة
                                        @break
                                    @case('sponsor')
                                        رعاية
                                        @break
                                @endswitch
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">تاريخ البداية</p>
                            <p class="font-medium text-gray-900">{{ $opportunity->start_date?->format('d/m/Y') ?? 'غير محدد' }}</p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">تاريخ النهاية</p>
                            <p class="font-medium text-gray-900">{{ $opportunity->end_date?->format('d/m/Y') ?? 'غير محدد' }}</p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">الحالة</p>
                            <p class="font-medium text-gray-900">
                                <x-ui.badge :color="$opportunity->is_active ? 'green' : 'red'">
                                    {{ $opportunity->is_active ? 'نشط' : 'معطل' }}
                                </x-ui.badge>
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">المعرف</p>
                            <p class="font-mono text-sm bg-gray-100 p-2 rounded">{{ $opportunity->slug }}</p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">الترتيب</p>
                            <p class="font-medium text-gray-900">{{ $opportunity->order }}</p>
                        </div>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </div>

    @include('components.delete-modal')
</x-layout.dashboard>
