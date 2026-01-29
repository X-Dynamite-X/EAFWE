<x-layout.dashboard title="{{ __('dashboard.services.entrepreneurship.title') }}">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900 mb-2">{{ __('dashboard.services.entrepreneurship.title') }}</h1>
        <p class="text-charcoal-600">{{ __('dashboard.services.entrepreneurship.subtitle') }}</p>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        {{-- My Projects --}}
        <div class="lg:col-span-2 space-y-6">
            <x-ui.card title="{{ __('dashboard.services.entrepreneurship.my_project') }}">
                <div class="text-center py-12 border-2 border-dashed border-gold-100 rounded-4xl">
                    <div class="text-5xl mb-6">🏗️</div>
                    <h3 class="text-xl font-black text-charcoal-900 mb-2">
                        {{ __('dashboard.services.entrepreneurship.no_project') }}</h3>
                    <p class="text-charcoal-600 mb-8 max-w-sm mx-auto">
                        {{ __('dashboard.services.entrepreneurship.add_project_desc') }}</p>
                    <x-ui.button>{{ __('dashboard.services.entrepreneurship.add_project_btn') }}</x-ui.button>
                </div>
            </x-ui.card>

            <x-ui.card title="{{ __('dashboard.services.entrepreneurship.mentorship_sessions') }}">
                <div class="space-y-4">
                    @forelse ($programs as $program)
                        <div
                            class="flex items-center justify-between p-4 rounded-xl border border-gray-100 {{ !$program->is_active ? 'opacity-50' : '' }}">
                            <div class="flex items-center gap-4">
                                @if ($program->image_url)
                                    <img src="{{ $program->image_url }}" alt="{{ $program->title }}"
                                        class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <div
                                        class="w-12 h-12 bg-gold-50 rounded-full flex items-center justify-center text-xl text-gold-500">
                                        👤</div>
                                @endif
                                <div>
                                    <p class="font-black text-charcoal-900">{{ $program->title }}</p>
                                    <p class="text-xs text-charcoal-500">{{ Str::limit($program->description, 50) }}
                                    </p>
                                </div>
                            </div>
                            <div class="text-left">
                                <span class="text-xs font-bold block mb-1 text-charcoal-400">
                                    {{ $program->is_active ? __('common.status.active') : __('common.status.disabled') }}
                                </span>
                                <x-ui.button size="sm"
                                    :disabled="!$program->is_active">{{ __('dashboard.services.entrepreneurship.book_session') }}</x-ui.button>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4 text-gray-500">
                            لا توجد برامج متاحة حالياً
                        </div>
                    @endforelse
                </div>
            </x-ui.card>
        </div>

        {{-- Side Actions --}}
        <div class="space-y-6">
            <x-ui.card title="{{ __('dashboard.services.entrepreneurship.collaborations') }}">
                <div class="space-y-4">
                    {{-- Placeholder for external opportunities --}}
                    <div class="p-4 rounded-xl bg-blue-50 border border-blue-100">
                        <p class="text-sm font-black text-blue-900 mb-1">
                            {{ __('modules.participation.types.partner') }}</p>
                        <p class="text-xs text-blue-700 leading-relaxed">تصفحص الفرص المتاحة في بوابة الفرص.</p>
                        <a href="{{ route('dashboard.portal-opportunities.index') }}"
                            class="text-xs font-black text-blue-900 mt-2 inline-block">{{ __('common.general.details') }}
                            ←</a>
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card title="{{ __('dashboard.services.entrepreneurship.quick_consultation') }}">
                <form class="space-y-4">
                    <x-ui.textarea label="{{ __('dashboard.services.entrepreneurship.consultation_placeholder') }}"
                        placeholder="..." rows="3" />
                    <x-ui.button size="sm"
                        class="w-full">{{ __('dashboard.services.entrepreneurship.submit_request') }}</x-ui.button>
                </form>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>
