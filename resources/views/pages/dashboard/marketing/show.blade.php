<x-layout.dashboard title="عرض المورد">
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">{{ $resource->title }}</h1>
            @can('manage marketing resources')
                <div class="flex gap-2">
                    <a href="{{ route('dashboard.marketing.edit', $resource) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                        <i class="fas fa-edit"></i>
                        تعديل
                    </a>
                    <button type="button" onclick="openDeleteModal('{{ $resource->id }}', '{{ $resource->title }}', '{{ route('dashboard.marketing.destroy', $resource) }}')" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                        <i class="fas fa-trash"></i>
                        حذف
                    </button>
                </div>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <x-ui.card class="mb-6">
                @if($resource->image_url)
                <img src="{{ $resource->image_url }}" class="w-full rounded-lg object-cover mb-6" style="max-height: 400px;" alt="{{ $resource->title }}">
                @endif

                <div class="mb-4">
                    <x-ui.badge color="blue">
                        @switch($resource->resource_type)
                            @case('guide')
                                دليل شامل
                            @break
                            @case('template')
                                نموذج جاهز
                            @break
                            @case('case-study')
                                دراسة حالة
                            @break
                        @endswitch
                    </x-ui.badge>
                </div>

                <div class="prose prose-sm max-w-none mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $resource->title }}</h2>
                    <p class="text-gray-600 mb-6">{{ $resource->description }}</p>
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        {!! $resource->content !!}
                    </div>
                </div>

                @if($resource->file_url)
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex items-center gap-3 p-4 bg-green-50 rounded-lg mb-3">
                            <i class="fas fa-file text-green-600 text-xl"></i>
                            <div>
                                <p class="text-sm text-gray-600">الملف المرفوع</p>
                                <p class="text-sm font-medium text-gray-900">{{ basename($resource->file_url) }}</p>
                            </div>
                        </div>
                        <a href="{{ $resource->file_url }}" target="_blank" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                            <i class="fas fa-download"></i> تحميل الملف
                        </a>
                    </div>
                @endif
            </x-ui.card>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.marketing.index') }}" class="flex-1 bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-center transition flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    العودة
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div>
            <x-ui.card class="sticky top-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">معلومات المورد</h3>

                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-700">نوع المورد</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            @switch($resource->resource_type)
                                @case('guide')
                                    دليل شامل
                                @break
                                @case('template')
                                    نموذج جاهز
                                @break
                                @case('case-study')
                                    دراسة حالة
                                @break
                            @endswitch
                        </dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="text-sm font-medium text-gray-700">الحالة</dt>
                        <dd class="mt-1">
                            <x-ui.badge :color="$resource->is_active ? 'green' : 'gray'">
                                {{ $resource->is_active ? 'نشط' : 'معطل' }}
                            </x-ui.badge>
                        </dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="text-sm font-medium text-gray-700">المعرف الفريد</dt>
                        <dd class="mt-1 text-sm font-mono text-gray-900 bg-gray-50 p-2 rounded">{{ $resource->slug }}</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="text-sm font-medium text-gray-700">ترتيب العرض</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $resource->order }}</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="text-sm font-medium text-gray-700">تاريخ الإنشاء</dt>
                        <dd class="mt-1 text-xs text-gray-500">{{ $resource->created_at->format('d/m/Y H:i') }}</dd>
                    </div>

                    @if($resource->updated_at != $resource->created_at)
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="text-sm font-medium text-gray-700">آخر تحديث</dt>
                            <dd class="mt-1 text-xs text-gray-500">{{ $resource->updated_at->format('d/m/Y H:i') }}</dd>
                        </div>
                    @endif
                </dl>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>

@include('components.delete-modal')
