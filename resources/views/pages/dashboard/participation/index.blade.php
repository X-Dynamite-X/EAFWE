<x-layout.dashboard title="{{ __('modules.participation.title') }}">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ __('modules.participation.title') }} وال{{ __('modules.participation.types.volunteer') }}</h1>
            <p class="text-gray-600 mt-1">انضم {{ __('common.time.to') }} مشاريع وفرص {{ __('modules.participation.types.volunteer') }}ية قيمة</p>
        </div>
        @can('manage participation opportunities')
        <x-ui.button href="{{ route('dashboard.participation.manage') }}" color="primary">
            <i class="fas fa-cog"></i> {{ __('modules.portal.manage') }}
        </x-ui.button>
        @endcan
    </div>

    @if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        {{ session('success') }}
    </x-ui.alert>
    @endif

    @if($opportunities->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($opportunities as $opportunity)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            @if($opportunity->image_url)
            <img src="{{ $opportunity->image_url }}" class="w-full h-48 object-cover rounded-t-lg -m-4 mb-4" alt="{{ $opportunity->title }}">
            @else
            <div class="w-full h-48 bg-gray-100 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                <i class="fas fa-hands-helping text-5xl text-gray-300"></i>
            </div>
            @endif

            <div class="flex-1 flex flex-col">
                <h3 class="text-lg font-semibold text-gray-900">{{ $opportunity->title }}</h3>
                <p class="text-gray-600 text-sm mt-2">{{ Str::limit($opportunity->description, 100) }}</p>

                <div class="mt-4 space-y-1">
                    <p class="text-xs text-gray-600">
                        <i class="fas fa-calendar"></i>
                        {{ __('common.time.from') }}: {{ $opportunity->start_date?->format('d/m/Y') ?? 'N/A' }}
                    </p>
                    <p class="text-xs text-gray-600">
                        <i class="fas fa-calendar-check"></i>
                        {{ __('common.time.to') }}: {{ $opportunity->end_date?->format('d/m/Y') ?? 'N/A' }}
                    </p>
                </div>

                <div class="mt-4">
                    <x-ui.badge color="cyan">
                        @switch($opportunity->type)
                            @case('volunteer')
                                {{ __('modules.participation.types.volunteer') }}
                            @break
                            @case('partner')
                                {{ __('modules.participation.types.partner') }}
                            @break
                            @case('sponsor')
                                {{ __('modules.participation.types.sponsor') }}
                            @break
                        @endswitch
                    </x-ui.badge>
                </div>
            </div>

            <x-ui.button href="{{ route('dashboard.participation.show', $opportunity) }}" color="primary" size="sm" class="mt-4 w-full text-center">
                تفاصيل الفرصة <i class="fas fa-arrow-left text-xs"></i>
            </x-ui.button>
        </x-ui.card>
        @endforeach
    </div>
    @else
    <x-ui.card>
        <div class="text-center py-12">
            <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-600 text-lg">لا توجد فرص متاحة حالياً</p>
        </div>
    </x-ui.card>
    @endif
</x-layout.dashboard>
