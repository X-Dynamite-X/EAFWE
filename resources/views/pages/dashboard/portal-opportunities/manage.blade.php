<x-layout.dashboard title="إدارة فرص البوابة">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">إدارة فرص البوابة</h1>
            <p class="text-gray-600 mt-1">أضف وعدل وحذف فرص التمويل والشراكات</p>
        </div>
        <x-ui.button href="{{ route('dashboard.portal-opportunities.create') }}" color="primary">
            <i class="fas fa-plus"></i> فرصة جديدة
        </x-ui.button>
    </div>

    @if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </x-ui.alert>
    @endif

    @if($opportunities->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($opportunities as $opportunity)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            @if($opportunity->image_url)
            <img src="{{ $opportunity->image_url }}" class="w-full h-40 object-cover rounded-t-lg -m-4 mb-4" alt="{{ $opportunity->title }}">
            @else
            <div class="w-full h-40 bg-gradient-to-br from-cyan-100 to-cyan-50 rounded-t-lg flex items-center justify-center -m-4 mb-4">
                <i class="fas fa-briefcase text-4xl text-cyan-300"></i>
            </div>
            @endif

            <div class="flex-1 flex flex-col">
                <div class="flex items-start gap-2 mb-2">
                    <span class="inline-block px-3 py-1 bg-cyan-100 text-cyan-800 text-xs font-semibold rounded-full">
                        #{{ $opportunity->id }}
                    </span>
                    <x-ui.badge :color="$opportunity->status == 'active' ? 'green' : ($opportunity->status == 'closed' ? 'red' : 'yellow')" size="sm">
                        @switch($opportunity->status)
                            @case('active')
                                <i class="fas fa-check text-xs"></i> نشط
                            @break
                            @case('closed')
                                <i class="fas fa-times text-xs"></i> مغلق
                            @break
                            @case('upcoming')
                                <i class="fas fa-clock text-xs"></i> قريباً
                            @break
                        @endswitch
                    </x-ui.badge>
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $opportunity->title }}</h3>
                <p class="text-xs text-gray-600 mb-3">
                    <i class="fas fa-link text-gray-400"></i>
                    {{ $opportunity->slug }}
                </p>

                <div class="flex flex-wrap gap-2 mb-3">
                    <x-ui.badge color="cyan" size="sm">
                        @switch($opportunity->opportunity_type)
                            @case('business')
                                <i class="fas fa-store"></i> عمل تجاري
                            @break
                            @case('partnership')
                                <i class="fas fa-handshake"></i> شراكة
                            @break
                            @case('funding')
                                <i class="fas fa-piggy-bank"></i> تمويل
                            @break
                        @endswitch
                    </x-ui.badge>
                    <span class="inline-flex items-center text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded">
                        <i class="fas fa-sort-numeric-up text-gray-400 ml-1"></i> {{ $opportunity->order }}
                    </span>
                </div>

                <p class="text-sm text-gray-600 line-clamp-2 mb-3">
                    {{ Str::limit($opportunity->description, 80) }}
                </p>
            </div>

            <div class="mt-auto pt-4 border-t border-gray-200 flex gap-2">
                <a href="{{ route('dashboard.portal-opportunities.show', $opportunity) }}" class="flex-1 text-center px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition text-sm">
                    <i class="fas fa-eye"></i> عرض
                </a>
                <a href="{{ route('dashboard.portal-opportunities.edit', $opportunity) }}" class="flex-1 text-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium rounded-lg transition text-sm">
                    <i class="fas fa-edit"></i> تعديل
                </a>
                <button type="button" onclick="openDeleteModal('{{ $opportunity->id }}', '{{ $opportunity->title }}', '{{ route('dashboard.portal-opportunities.destroy', $opportunity) }}')" class="flex-1 text-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 font-medium rounded-lg transition text-sm">
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
            <p class="text-gray-600 text-lg font-medium">لا توجد فرص حالياً</p>
            <p class="text-gray-500 text-sm mt-2 mb-6">ابدأ بإنشاء فرصة جديدة الآن</p>
            <x-ui.button href="{{ route('dashboard.portal-opportunities.create') }}" color="primary">
                <i class="fas fa-plus"></i> إضافة فرصة جديدة
            </x-ui.button>
        </div>
    </x-ui.card>
    @endif

    @include('components.delete-modal')
</x-layout.dashboard>
    @endif
</div>
</x-layout.dashboard>

