<x-layout.dashboard title="برامج ريادة الأعمال">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">برامج الريادة والعمل الحر</h1>
            <p class="text-gray-600 mt-1">استكشف برامج تطوير الأعمال والريادة</p>
        </div>
        @can('manage entrepreneurship programs')
        <x-ui.button href="{{ route('dashboard.entrepreneurship.manage') }}" color="primary">
            <i class="fas fa-cog"></i> إدارة البرامج
        </x-ui.button>
        @endcan
    </div>

    @if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        {{ session('success') }}
    </x-ui.alert>
    @endif

    @if($programs->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($programs as $program)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            @if($program->image_url)
            <img src="{{ $program->image_url }}" class="w-full h-48 object-cover rounded-t-lg -m-4 mb-4" alt="{{ $program->title }}">
            @else
            <div class="w-full h-48 bg-gray-100 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                <i class="fas fa-rocket text-5xl text-gray-300"></i>
            </div>
            @endif

            <div class="flex-1 flex flex-col">
                <h3 class="text-lg font-semibold text-gray-900">{{ $program->title }}</h3>
                <p class="text-gray-600 text-sm mt-2">{{ Str::limit($program->description, 100) }}</p>

                <div class="mt-4">
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

                <div class="mt-auto pt-4 border-t border-gray-200">
                    <a href="{{ route('dashboard.entrepreneurship.show', $program) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium gap-1">
                        تفاصيل البرنامج
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>
        </x-ui.card>
        @endforeach
    </div>
    @else
    <x-ui.alert type="info" class="text-center">
        <div class="flex justify-center mb-2">
            <i class="fas fa-info-circle text-4xl text-blue-400"></i>
        </div>
        <p class="text-gray-700 font-medium">لا توجد برامج متاحة حالياً</p>
    </x-ui.alert>
    @endif
</x-layout.dashboard>
