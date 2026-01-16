<x-layout.dashboard title="إدارة ملفات الأعضاء">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">إدارة ملفات الأعضاء</h1>
            <p class="text-gray-600 mt-1">أضف وعدل وحذف ملفات الأعضاء والمواد التدريبية</p>
        </div>
        <x-ui.button href="{{ route('dashboard.files.create') }}" color="primary">
            <i class="fas fa-plus"></i> ملف جديد
        </x-ui.button>
    </div>

    @if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </x-ui.alert>
    @endif

    @if($files->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($files as $file)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            <div class="w-full h-40 bg-gradient-to-br from-green-100 to-green-50 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                <i class="fas fa-file-download text-4xl text-green-300"></i>
            </div>

            <div class="flex-1 flex flex-col">
                <div class="flex items-start gap-2 mb-2">
                    <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                        #{{ $file->id }}
                    </span>
                    @if($file->is_active)
                        <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                            <i class="fas fa-check-circle text-xs"></i> نشط
                        </span>
                    @else
                        <span class="inline-block px-3 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full">
                            <i class="fas fa-times-circle text-xs"></i> معطل
                        </span>
                    @endif
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $file->title }}</h3>
                <p class="text-xs text-gray-600 mb-3">
                    <i class="fas fa-link text-gray-400"></i>
                    {{ $file->slug }}
                </p>

                <div class="flex flex-wrap gap-2 mb-3">
                    <x-ui.badge color="green" size="sm">
                        @switch($file->file_type)
                            @case('document')
                                <i class="fas fa-file-word"></i> وثيقة
                            @break
                            @case('pdf')
                                <i class="fas fa-file-pdf"></i> PDF
                            @break
                            @case('guide')
                                <i class="fas fa-book"></i> دليل
                            @break
                            @case('template')
                                <i class="fas fa-copy"></i> نموذج
                            @break
                        @endswitch
                    </x-ui.badge>
                    @if($file->file_size)
                    <span class="inline-flex items-center text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded">
                        <i class="fas fa-database text-gray-400 ml-1"></i> 
                        @php
                            $size = (int)$file->file_size;
                            if ($size >= 1073741824) {
                                $size = number_format($size / 1073741824, 2) . ' GB';
                            } elseif ($size >= 1048576) {
                                $size = number_format($size / 1048576, 2) . ' MB';
                            } elseif ($size >= 1024) {
                                $size = number_format($size / 1024, 2) . ' KB';
                            } else {
                                $size = $size . ' B';
                            }
                        @endphp
                        {{ $size }}
                    </span>
                    @endif
                </div>

                <p class="text-sm text-gray-600 line-clamp-2 mb-3">
                    {{ Str::limit($file->description, 80) }}
                </p>
            </div>

            <div class="mt-auto pt-4 border-t border-gray-200 flex gap-2">
                <a href="{{ route('dashboard.files.show', $file) }}" class="flex-1 text-center px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition text-sm">
                    <i class="fas fa-download"></i> تحميل
                </a>
                <a href="{{ route('dashboard.files.edit', $file) }}" class="flex-1 text-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium rounded-lg transition text-sm">
                    <i class="fas fa-edit"></i> تعديل
                </a>
                <button type="button" onclick="openDeleteModal('{{ $file->id }}', '{{ $file->title }}', '{{ route('dashboard.files.destroy', $file) }}')" class="flex-1 text-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 font-medium rounded-lg transition text-sm">
                    <i class="fas fa-trash"></i> حذف
                </button>
            </div>
        </x-ui.card>
        @endforeach
    </div>
    @else
    <x-ui.card>
        <div class="text-center py-12">
            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-600 text-lg font-medium">لا توجد ملفات حالياً</p>
            <p class="text-gray-500 text-sm mt-2 mb-6">ابدأ بإضافة ملف جديد الآن</p>
            <x-ui.button href="{{ route('dashboard.files.create') }}" color="primary">
                <i class="fas fa-plus"></i> إضافة ملف جديد
            </x-ui.button>
        </div>
    </x-ui.card>
    @endif

    @include('components.delete-modal')
</x-layout.dashboard>

@php
if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2) {
        $units = ['B', 'KB', 'MB', 'GB'];
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        return round($bytes, $precision) . ' ' . $units[$i];
    }
}
@endphp
