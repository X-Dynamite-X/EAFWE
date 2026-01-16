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

<x-layout.dashboard title="ملفات الأعضاء">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">ملفات الأعضاء</h1>
            <p class="text-gray-600 mt-1">حمّل الأدلة والنماذج المتاحة للأعضاء</p>
        </div>
        @can('manage member files')
        <x-ui.button href="{{ route('dashboard.files.manage') }}" color="primary">
            <i class="fas fa-cog"></i> إدارة الملفات
        </x-ui.button>
        @endcan
    </div>

    @if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        {{ session('success') }}
    </x-ui.alert>
    @endif

    @if($files->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($files as $file)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            <div class="flex-1 flex flex-col">
                <div class="flex items-start gap-3 mb-3">
                    <i class="fas fa-file-download text-2xl text-gray-400 mt-1"></i>
                    <h3 class="text-lg font-semibold text-gray-900 flex-1">{{ $file->title }}</h3>
                </div>
                <p class="text-gray-600 text-sm">{{ Str::limit($file->description, 100) }}</p>

                <div class="mt-4 space-y-2">
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
                    <p class="text-xs text-gray-600">
                        <i class="fas fa-database"></i>
                        {{ formatBytes($file->file_size) }}
                    </p>
                    @endif
                </div>
            </div>

            <div class="mt-auto pt-4 border-t border-gray-200">
                <a href="{{ route('dashboard.files.show', $file) }}" class="inline-flex items-center text-green-600 hover:text-green-800 text-sm font-medium gap-1 w-full justify-center py-2 bg-green-50 rounded-lg hover:bg-green-100 transition">
                    <i class="fas fa-download"></i> تحميل
                </a>
            </div>
        </x-ui.card>
        @endforeach
    </div>
    @else
    <x-ui.alert type="info" class="text-center">
        <div class="flex justify-center mb-2">
            <i class="fas fa-info-circle text-4xl text-blue-400"></i>
        </div>
        <p class="text-gray-700 font-medium">لا توجد ملفات متاحة حالياً</p>
    </x-ui.alert>
    @endif
</x-layout.dashboard>
