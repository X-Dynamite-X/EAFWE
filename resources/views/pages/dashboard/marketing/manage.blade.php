<x-layout.dashboard title="إدارة موارد التسويق">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">إدارة موارد التسويق</h1>
            <p class="text-gray-600 mt-1">أضف وعدل وحذف موارد التسويق والإعلام</p>
        </div>
        <x-ui.button href="{{ route('dashboard.marketing.create') }}" color="primary">
            <i class="fas fa-plus"></i> مورد جديد
        </x-ui.button>
    </div>

    @if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </x-ui.alert>
    @endif

    @if($resources->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($resources as $resource)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            @if($resource->image_url)
            <img src="{{ $resource->image_url }}" class="w-full h-40 object-cover rounded-t-lg -m-4 mb-4" alt="{{ $resource->title }}">
            @else
            <div class="w-full h-40 bg-gradient-to-br from-green-100 to-green-50 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                <i class="fas fa-file-alt text-4xl text-green-300"></i>
            </div>
            @endif

            <div class="flex-1 flex flex-col">
                <div class="flex items-start gap-2 mb-2">
                    <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                        #{{ $resource->id }}
                    </span>
                    @if($resource->is_active)
                        <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                            <i class="fas fa-check-circle text-xs"></i> نشط
                        </span>
                    @else
                        <span class="inline-block px-3 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full">
                            <i class="fas fa-times-circle text-xs"></i> معطل
                        </span>
                    @endif
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $resource->title }}</h3>
                <p class="text-xs text-gray-600 mb-3">
                    <i class="fas fa-link text-gray-400"></i>
                    {{ $resource->slug }}
                </p>

                <div class="flex flex-wrap gap-2 mb-3">
                    <x-ui.badge color="green" size="sm">
                        @switch($resource->resource_type)
                            @case('guide')
                                <i class="fas fa-book"></i> دليل
                            @break
                            @case('template')
                                <i class="fas fa-copy"></i> نموذج
                            @break
                            @case('case_study')
                                <i class="fas fa-graduation-cap"></i> دراسة حالة
                            @break
                        @endswitch
                    </x-ui.badge>
                    <span class="inline-flex items-center text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded">
                        <i class="fas fa-sort-numeric-up text-gray-400 ml-1"></i> {{ $resource->order }}
                    </span>
                </div>

                <p class="text-sm text-gray-600 line-clamp-2 mb-3">
                    {{ Str::limit($resource->description, 80) }}
                </p>
            </div>

            <div class="mt-auto pt-4 border-t border-gray-200 flex gap-2">
                <a href="{{ route('dashboard.marketing.show', $resource) }}" class="flex-1 text-center px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition text-sm">
                    <i class="fas fa-eye"></i> عرض
                </a>
                <a href="{{ route('dashboard.marketing.edit', $resource) }}" class="flex-1 text-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium rounded-lg transition text-sm">
                    <i class="fas fa-edit"></i> تعديل
                </a>
                <button type="button" onclick="openDeleteModal('{{ $resource->id }}', '{{ $resource->title }}', '{{ route('dashboard.marketing.destroy', $resource) }}')" class="flex-1 text-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 font-medium rounded-lg transition text-sm">
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
            <p class="text-gray-600 text-lg font-medium">لا توجد موارد حالياً</p>
            <p class="text-gray-500 text-sm mt-2 mb-6">ابدأ بإنشاء مورد تسويقي جديد الآن</p>
            <x-ui.button href="{{ route('dashboard.marketing.create') }}" color="primary">
                <i class="fas fa-plus"></i> إضافة مورد جديد
            </x-ui.button>
        </div>
    </x-ui.card>
    @endif

    @include('components.delete-modal')
</x-layout.dashboard>
        <p class="mt-2">لا توجد موارد حالياً. <a href="{{ route('dashboard.marketing.create') }}" class="text-blue-600 hover:text-blue-900">أضف مورداً جديداً</a></p>
    </x-ui.alert>
    @endif

    @include('components.delete-modal')
</x-layout.dashboard>
