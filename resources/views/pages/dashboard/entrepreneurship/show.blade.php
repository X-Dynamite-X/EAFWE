<x-layout.dashboard title="عرض البرنامج">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $program->title }}</h1>
                <p class="text-gray-600 mt-1">عرض تفاصيل برنامج الريادة</p>
            </div>
            @can('manage entrepreneurship programs')
            <div class="flex gap-2">
                <x-ui.button href="{{ route('dashboard.entrepreneurship.edit', $program) }}" color="primary" size="sm">
                    <i class="fas fa-edit"></i> تعديل
                </x-ui.button>
                <button type="button" onclick="openDeleteModal('{{ $program->id }}', '{{ $program->title }}', '{{ route('dashboard.entrepreneurship.destroy', $program) }}')" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded text-sm transition-colors">
                    <i class="fas fa-trash"></i> حذف
                </button>
            </div>
            @endcan
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <x-ui.card>
                    @if($program->image_url)
                    <div class="mb-6 rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ $program->image_url }}" class="w-full h-80 object-cover" alt="{{ $program->title }}">
                    </div>
                    @endif

                    <div class="mb-4">
                        <x-ui.badge color="yellow">
                            @switch($program->type)
                                @case('business')
                                    عمل تجاري
                                    @break
                                @case('startup')
                                    شركة ناشئة
                                    @break
                                @case('mentorship')
                                    إرشاد وتوجيه
                                    @break
                            @endswitch
                        </x-ui.badge>
                    </div>

                    <p class="text-lg text-gray-700 leading-relaxed mb-6">{{ $program->description }}</p>

                    <div class="prose prose-sm max-w-none mb-6 text-gray-700">
                        {!! $program->content !!}
                    </div>

                    <div class="border-t border-gray-200 pt-4 text-sm text-gray-600">
                        <i class="fas fa-clock"></i>
                        تم الإنشاء: {{ $program->created_at->format('d/m/Y H:i') }}
                        @if($program->updated_at != $program->created_at)
                        | تم التحديث: {{ $program->updated_at->format('d/m/Y H:i') }}
                        @endif
                    </div>
                </x-ui.card>

                <div class="mt-6">
                    <x-ui.button href="{{ route('dashboard.entrepreneurship.index') }}" color="gray">
                        <i class="fas fa-arrow-right"></i> العودة
                    </x-ui.button>
                </div>
            </div>

            <div class="lg:col-span-1">
                <x-ui.card>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">معلومات البرنامج</h3>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-600">النوع</p>
                            <p class="font-medium text-gray-900">
                                @switch($program->type)
                                    @case('business')
                                        عمل تجاري
                                        @break
                                    @case('startup')
                                        شركة ناشئة
                                        @break
                                    @case('mentorship')
                                        إرشاد وتوجيه
                                        @break
                                @endswitch
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">الحالة</p>
                            <p class="font-medium text-gray-900">
                                <x-ui.badge :color="$program->is_active ? 'green' : 'red'">
                                    {{ $program->is_active ? 'نشط' : 'معطل' }}
                                </x-ui.badge>
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">المعرف</p>
                            <p class="font-mono text-sm bg-gray-100 p-2 rounded">{{ $program->slug }}</p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-sm text-gray-600">الترتيب</p>
                            <p class="font-medium text-gray-900">{{ $program->order }}</p>
                        </div>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </div>

    @include('components.delete-modal')
</x-layout.dashboard>
