<x-layout.dashboard title="{{ __('modules.portal.title') }}">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ __('modules.portal.title') }}
                وال{{ __('modules.portal.opportunity_types.funding') }}</h1>
            <p class="text-gray-600 mt-1">اكتشف فرص الأعمال وال{{ __('modules.portal.opportunity_types.funding') }}
                والشراكات المتاحة</p>
        </div>
        @can('manage portal opportunities')
            <x-ui.button href="{{ route('dashboard.portal-opportunities.manage') }}" color="primary">
                <i class="fas fa-cog"></i> {{ __('modules.portal.manage') }}
            </x-ui.button>
        @endcan
    </div>

    @if (session('success'))
        <x-ui.alert type="success" class="mb-6">
            {{ session('success') }}
        </x-ui.alert>
    @endif

    @if ($opportunities->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($opportunities as $opportunity)
                <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
                    @if ($opportunity->image_url)
                        <img src="{{ $opportunity->image_url }}" class="w-full h-48 object-cover rounded-t-lg -m-4 mb-4"
                            alt="{{ $opportunity->title }}">
                    @else
                        <div class="w-full h-48 bg-gray-100 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                            <i class="fas fa-briefcase text-5xl text-gray-300"></i>
                            <x-layout.dashboard title="{{ __('dashboard.portal.title') }}">
                                <div class="mb-8">
                                    <h1 class="text-3xl font-black text-charcoal-900 mb-2">
                                        {{ __('dashboard.portal.title') }}</h1>
                                    <p class="text-charcoal-600">{{ __('dashboard.portal.subtitle') }}</p>
                                </div>

                                {{-- Filters --}}
                                <div class="mb-6 overflow-x-auto pb-2">
                                    <div class="flex gap-2 min-w-max">
                                        @php
                                            $types = [
                                                '' => __('dashboard.portal.filter.all'),
                                                'business' => __('dashboard.portal.filter.business'),
                                                'investment' => __('dashboard.portal.filter.investment'),
                                                'partnership' => __('dashboard.portal.filter.partnership'),
                                                'volunteer' => __('dashboard.portal.filter.volunteer'),
                                            ];
                                        @endphp
                                        @foreach ($types as $key => $label)
                                            <a href="{{ route('dashboard.portal-opportunities.index', ['type' => $key]) }}"
                                                class="px-4 py-2 rounded-xl text-sm font-bold transition-colors {{ request('type') == $key ? 'bg-gold-500 text-charcoal-900' : 'bg-white border border-gray-200 text-charcoal-600 hover:bg-gray-50' }}">
                                                {{ $label }}
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
            <p class="text-gray-700 font-medium">لا توجد فرص متاحة حالياً</p>
            <p class="text-gray-500 text-sm mt-1">سيتم {{ __('common.actions.add') }} فرص جديدة
                {{ __('modules.portal.statuses.upcoming') }}</p>
        </x-ui.alert>
    @endif
</x-layout.dashboard>
