<x-layout.dashboard title="إدارة برامج التدريب">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">إدارة برامج التدريب</h1>
            <p class="text-gray-600 mt-1">أضف وعدل وحذف برامج التدريب بسهولة</p>
        </div>
        <x-ui.button href="{{ route('dashboard.training.create') }}" color="primary">
            <i class="fas fa-plus"></i> برنامج جديد
        </x-ui.button>
    </div>

    @if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </x-ui.alert>
    @endif

    @if($programs->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($programs as $program)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            <!-- صورة المعاينة -->
            @if($program->image_url)
            <img src="{{ $program->image_url }}" class="w-full h-40 object-cover rounded-t-lg -m-4 mb-4" alt="{{ $program->title }}">
            @else
            <div class="w-full h-40 bg-gradient-to-br from-blue-100 to-blue-50 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                <i class="fas fa-graduation-cap text-4xl text-blue-300"></i>
            </div>
            @endif

            <!-- المعلومات -->
            <div class="flex-1 flex flex-col">
                <div class="flex items-start gap-2 mb-2">
                    <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">
                        #{{ $program->id }}
                    </span>
                    @if($program->is_active)
                        <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                            <i class="fas fa-check-circle text-xs"></i> نشط
                        </span>
                    @else
                        <span class="inline-block px-3 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full">
                            <i class="fas fa-times-circle text-xs"></i> معطل
                        </span>
                    @endif
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $program->title }}</h3>
                <p class="text-xs text-gray-600 mb-3">
                    <i class="fas fa-link text-gray-400"></i>
                    {{ $program->slug }}
                </p>

                <div class="flex flex-wrap gap-2 mb-3">
                    <x-ui.badge color="blue" size="sm">
                        @switch($program->category)
                            @case('training')
                                <i class="fas fa-book"></i> تدريب
                            @break
                            @case('workshop')
                                <i class="fas fa-tools"></i> ورشة عمل
                            @break
                            @case('seminar')
                                <i class="fas fa-presentation"></i> ندوة
                            @break
                        @endswitch
                    </x-ui.badge>
                    <span class="inline-flex items-center text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded">
                        <i class="fas fa-sort-numeric-up text-gray-400 ml-1"></i> {{ $program->order }}
                    </span>
                </div>

                <p class="text-sm text-gray-600 line-clamp-2 mb-3">
                    {{ Str::limit($program->description, 80) }}
                </p>
            </div>

            <!-- الإجراءات -->
            <div class="mt-auto pt-4 border-t border-gray-200 flex gap-2">
                <a href="{{ route('dashboard.training.show', $program) }}" class="flex-1 text-center px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition text-sm">
                    <i class="fas fa-eye"></i> عرض
                </a>
                <a href="{{ route('dashboard.training.edit', $program) }}" class="flex-1 text-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium rounded-lg transition text-sm">
                    <i class="fas fa-edit"></i> تعديل
                </a>
                <button type="button" onclick="openDeleteModal('{{ $program->id }}', '{{ $program->title }}', '{{ route('dashboard.training.destroy', $program) }}')" class="flex-1 text-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 font-medium rounded-lg transition text-sm">
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
            <p class="text-gray-600 text-lg font-medium">لا توجد برامج حالياً</p>
            <p class="text-gray-500 text-sm mt-2 mb-6">ابدأ بإنشاء برنامج تدريبي جديد الآن</p>
            <x-ui.button href="{{ route('dashboard.training.create') }}" color="primary">
                <i class="fas fa-plus"></i> إضافة برنامج جديد
            </x-ui.button>
        </div>
    </x-ui.card>
    @endif

    @include('components.delete-modal')
</x-layout.dashboard>
