<x-layout.dashboard title="عرض الملف">

@php
if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2) {
        $bytes = (int)$bytes;
        $units = ['B', 'KB', 'MB', 'GB'];
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        return round($bytes, $precision) . ' ' . $units[$i];
    }
}
@endphp

<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ $file->title }}</h1>
            <p class="text-gray-600 mt-1">عرض تفاصيل الملف</p>
        </div>
        @can('manage member files')
        <div class="flex gap-2">
            <x-ui.button href="{{ route('dashboard.files.edit', $file) }}" color="primary" size="sm">
                <i class="fas fa-edit"></i> تعديل
            </x-ui.button>
            <button type="button" onclick="openDeleteModal('{{ $file->id }}', '{{ $file->title }}', '{{ route('dashboard.files.destroy', $file) }}')" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded text-sm transition-colors">
                <i class="fas fa-trash"></i> حذف
            </button>
        </div>
        @endcan
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <x-ui.card>
                <div class="mb-6">
                    <div class="flex flex-wrap gap-2">
                        <x-ui.badge color="green">
                            @switch($file->file_type)
                                @case('document')
                                    وثيقة
                                    @break
                                @case('pdf')
                                    PDF
                                    @break
                                @case('guide')
                                    دليل
                                    @break
                                @case('template')
                                    نموذج
                                    @break
                            @endswitch
                        </x-ui.badge>
                        @if($file->file_size)
                        <span class="text-sm text-gray-600 flex items-center gap-1">
                            <i class="fas fa-database"></i>
                            الحجم: {{ formatBytes($file->file_size) }}
                        </span>
                        @endif
                    </div>
                </div>

                <p class="text-lg text-gray-700 mb-6">{{ $file->description }}</p>

                @if($file->content)
                <div class="prose prose-sm max-w-none mb-6">
                    {!! $file->content !!}
                </div>
                @endif

                <div class="border-t border-gray-200 pt-6 mb-6">
                    @if($file->file_url)
                    <div class="space-y-3">
                        @if(strpos($file->file_url, '/storage/') !== false)
                        <div class="flex items-center gap-3 p-4 bg-blue-50 rounded-lg">
                            <i class="fas fa-file text-blue-600 text-xl"></i>
                            <div>
                                <p class="text-sm text-gray-600">الملف المرفوع</p>
                                <p class="text-sm font-medium text-gray-900">{{ basename($file->file_url) }}</p>
                            </div>
                        </div>
                        @endif
                        <a href="{{ $file->file_url }}" target="_blank" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                            <i class="fas fa-download"></i> تحميل الملف
                        </a>
                    </div>
                    @endif
                </div>

                <div class="border-t border-gray-200 pt-4 text-sm text-gray-600">
                    <i class="fas fa-clock"></i>
                    تم الإنشاء: {{ $file->created_at->format('d/m/Y H:i') }}
                    @if($file->updated_at != $file->created_at)
                    | تم التحديث: {{ $file->updated_at->format('d/m/Y H:i') }}
                    @endif
                </div>
            </x-ui.card>

            <div class="mt-6">
                <x-ui.button href="{{ route('dashboard.files.index') }}" color="gray">
                    <i class="fas fa-arrow-right"></i> العودة
                </x-ui.button>
            </div>
        </div>

        <div class="lg:col-span-1">
            <x-ui.card>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">معلومات الملف</h3>

                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-600">النوع</dt>
                        <dd class="text-gray-900 mt-1">
                            @switch($file->file_type)
                                @case('document')
                                    وثيقة
                                    @break
                                @case('pdf')
                                    PDF
                                    @break
                                @case('guide')
                                    دليل
                                    @break
                                @case('template')
                                    نموذج
                                    @break
                            @endswitch
                        </dd>
                    </div>

                    @if($file->file_size)
                    <div class="border-t border-gray-200 pt-4">
                        <dt class="text-sm font-medium text-gray-600">الحجم</dt>
                        <dd class="text-gray-900 mt-1">{{ formatBytes($file->file_size) }}</dd>
                    </div>
                    @endif

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="text-sm font-medium text-gray-600">الحالة</dt>
                        <dd class="text-gray-900 mt-1">
                            <x-ui.badge :color="$file->is_active ? 'green' : 'red'">
                                {{ $file->is_active ? 'نشط' : 'معطل' }}
                            </x-ui.badge>
                        </dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="text-sm font-medium text-gray-600">المعرف</dt>
                        <dd class="font-mono text-sm bg-gray-100 p-2 rounded mt-1">{{ $file->slug }}</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="text-sm font-medium text-gray-600">الترتيب</dt>
                        <dd class="text-gray-900 mt-1">{{ $file->order }}</dd>
                    </div>
                </dl>
            </x-ui.card>
        </div>
    </div>
</div>

@include('components.delete-modal')
</x-layout.dashboard>
