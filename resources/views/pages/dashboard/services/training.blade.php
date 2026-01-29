<x-layout.dashboard title="{{ __('dashboard.services.training.title') }}">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900 mb-2">{{ __('dashboard.services.training.title') }}</h1>
        <p class="text-charcoal-600">{{ __('dashboard.services.training.subtitle') }}</p>
    </div>

    <div class="grid lg:grid-cols-4 gap-6">
        {{-- Training Schedule --}}
        <div class="lg:col-span-3 space-y-6">
            <x-ui.card title="{{ __('dashboard.services.training.schedule') }}">
                <div class="grid md:grid-cols-2 gap-4">
                    @forelse ($programs as $training)
                        <div class="p-6 rounded-2xl bg-gold-50 border border-gold-100">
                            <h3 class="font-black text-charcoal-900 mb-4">{{ $training->title }}</h3>
                            <div class="space-y-2 text-sm text-charcoal-600">
                                <p class="flex items-center gap-2">
                                    <span class="text-gold-500">📅</span>
                                    {{ $training->created_at->format('Y-m-d') }}
                                </p>
                                <p class="flex items-center gap-2">
                                    <span class="text-gold-500">📍</span>
                                    {{ $training->category }}
                                </p>
                            </div>
                            <div class="mt-6">
                                <x-ui.button size="sm"
                                    class="w-full">{{ __('dashboard.services.training.register') }}</x-ui.button>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 text-center py-4 text-gray-500">
                            لا توجد دورات تدريبية متاحة حالياً
                        </div>
                    @endforelse
                </div>
            </x-ui.card>

            <x-ui.card title="{{ __('dashboard.services.training.materials') }}">
                <div class="divide-y divide-gray-100">
                    {{-- Assuming we fetch materials related to training programs or a separate model --}}
                    <div class="text-center py-4 text-gray-500">
                        قريباً
                    </div>
                </div>
            </x-ui.card>
        </div>

        {{-- Sidebar Info --}}
        <div class="space-y-6">
            <x-ui.card title="{{ __('dashboard.services.training.certificates') }}">
                <div class="text-center py-8">
                    <div class="text-4xl mb-4">🏆</div>
                    <p class="text-sm text-charcoal-600 mb-6">{{ __('dashboard.services.training.no_certificates') }}
                    </p>
                </div>
            </x-ui.card>

            <x-ui.card title="{{ __('dashboard.services.training.help') }}">
                <p class="text-sm text-charcoal-600 leading-relaxed mb-4">
                    {{ __('dashboard.services.training.help_desc') }}</p>
                <x-ui.button size="sm" variant="outline"
                    class="w-full">{{ __('dashboard.services.training.contact_us') }}</x-ui.button>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>
