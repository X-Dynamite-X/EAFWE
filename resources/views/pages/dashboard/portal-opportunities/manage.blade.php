<x-layout.dashboard title="إدارة {{ __('modules.portal.title') }}">
    <div class="mb-8">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-lg shadow-sm p-6 border border-cyan-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-3 bg-cyan-100 rounded-lg">
                            <i class="fas fa-briefcase text-cyan-600 text-xl"></i>
                        </div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">إدارة {{ __('modules.portal.title') }}
                        </h1>
                    </div>
                    <p class="text-gray-600 text-sm md:text-base mt-1 ml-0 md:ml-12">أضف وعدل
                        و{{ __('common.actions.delete') }} فرص ال{{ __('modules.portal.opportunity_types.funding') }}
                        والشراكات والتطوير الأعمال</p>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('dashboard.portal-opportunities.create') }}"
                        class="inline-flex items-center gap-2 px-4 md:px-6 py-2 md:py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors whitespace-nowrap">
                        <i class="fas fa-plus"></i>
                        <span>فرصة جديدة</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <x-ui.alert type="success" class="mb-6">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </x-ui.alert>
    @endif

    @if ($opportunities->count())
        </a>
        <a href="{{ route('dashboard.portal-opportunities.edit', $opportunity) }}"
            class="flex-1 text-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium rounded-lg transition text-sm">
            <i class="fas fa-edit"></i> {{ __('common.actions.edit') }}
        </a>
        <button type="button"
            onclick="openDeleteModal('{{ $opportunity->id }}', '{{ $opportunity->title }}', '{{ route('dashboard.portal-opportunities.destroy', $opportunity) }}')"
            class="flex-1 text-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 font-medium rounded-lg transition text-sm">
            <i class="fas fa-trash"></i> {{ __('common.actions.delete') }}
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
            <p class="text-gray-500 text-sm mt-2 mb-6">ابدأ ب{{ __('common.actions.create') }} فرصة جديدة الآن</p>
            <x-ui.button href="{{ route('dashboard.portal-opportunities.create') }}" color="primary">
                <i class="fas fa-plus"></i> {{ __('common.actions.add') }} فرصة جديدة
            </x-ui.button>
        </div>
    </x-ui.card>
    @endif

    @include('components.delete-modal')

    </div>
</x-layout.dashboard>
