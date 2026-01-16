<x-layout.dashboard title="الموارد التسويقية">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">موارد التسويق والتدريب</h1>
            <p class="text-gray-600 mt-1">اطّلع على أحدث الأدلة والنماذج التسويقية</p>
        </div>
        @can('manage marketing resources')
        <x-ui.button href="{{ route('dashboard.marketing.manage') }}" color="primary">
            <i class="fas fa-cog"></i> إدارة الموارد
        </x-ui.button>
        @endcan
    </div>

    @if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        {{ session('success') }}
    </x-ui.alert>
    @endif

    @if($resources->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($resources as $resource)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            @if($resource->image_url)
            <img src="{{ $resource->image_url }}" class="w-full h-48 object-cover rounded-t-lg -m-4 mb-4" alt="{{ $resource->title }}">
            @else
            <div class="w-full h-48 bg-gray-100 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                <i class="fas fa-image text-5xl text-gray-300"></i>
            </div>
            @endif

            <div class="flex-1 flex flex-col">
                <div class="flex items-start gap-3 mb-3">
                    <i class="fas fa-file text-2xl text-gray-400 mt-1"></i>
                    <h3 class="text-lg font-semibold text-gray-900 flex-1">{{ $resource->title }}</h3>
                </div>
                <p class="text-gray-600 text-sm">{{ Str::limit($resource->description, 100) }}</p>

                <div class="mt-4">
                    <x-ui.badge color="blue">
                        @switch($resource->resource_type)
                            @case('guide')
                                دليل
                            @break
                            @case('template')
                                نموذج
                            @break
                            @case('case_study')
                                دراسة حالة
                            @break
                        @endswitch
                    </x-ui.badge>
                </div>
            </div>

            <div class="mt-auto pt-4 border-t border-gray-200">
                <a href="{{ route('dashboard.marketing.show', $resource) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium gap-1">
                    عرض الموارد
                    <i class="fas fa-arrow-left"></i>
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
        <p class="text-gray-700 font-medium">لا توجد موارد متاحة حالياً</p>
    </x-ui.alert>
    @endif
</x-layout.dashboard>
