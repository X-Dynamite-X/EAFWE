<x-layout.dashboard title="{{ $opportunity->title }}">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            @if ($opportunity->image_url)
                <img src="{{ $opportunity->image_url }}" alt="{{ $opportunity->title }}" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-40 bg-gray-100 flex items-center justify-center text-4xl">💼</div>
            @endif

            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <span class="px-3 py-1 bg-gold-50 text-gold-600 rounded-lg text-sm font-bold mb-2 inline-block">
                            {{ __('dashboard.portal.filter.' . $opportunity->type) ?? $opportunity->type }}
                        </span>
                        <h1 class="text-3xl font-black text-charcoal-900 mb-2">{{ $opportunity->title }}</h1>
                        <div class="text-sm text-gray-500 space-x-4">
                            <span>📅
                                {{ $opportunity->deadline ? __('dashboard.portal.form.deadline') . ': ' . $opportunity->deadline->format('Y-m-d') : 'Open' }}</span>
                            <span>👁️ {{ $opportunity->views }} {{ __('dashboard.portal.table.views') }}</span>
                        </div>
                    </div>
                    @if (url()->previous() == route('dashboard.portal-opportunities.manage'))
                        <x-ui.button href="{{ route('dashboard.portal-opportunities.edit', $opportunity) }}"
                            color="gray">
                            {{ __('common.actions.edit') }}
                        </x-ui.button>
                    @endif
                </div>

                <div class="prose max-w-none text-charcoal-600 mb-8">
                    <h3 class="text-lg font-bold text-charcoal-900 mb-2">{{ __('dashboard.portal.form.description') }}
                    </h3>
                    <p class="whitespace-pre-wrap">{{ $opportunity->description }}</p>

                    @if ($opportunity->requirements)
                        <div class="my-6">
                            <h3 class="text-lg font-bold text-charcoal-900 mb-2">
                                {{ __('dashboard.portal.form.requirements') }}</h3>
                            <p class="whitespace-pre-wrap">{{ $opportunity->requirements }}</p>
                        </div>
                    @endif
                </div>

                <div class="mt-8 pt-8 border-t border-gray-100 flex justify-between items-center">
                    <x-ui.button href="{{ url()->previous() }}" color="gray">
                        {{ __('common.actions.back') }}
                    </x-ui.button>
                    {{-- Assuming there might be an 'Apply' action for users --}}
                    @if ($opportunity->status == 'open')
                        <x-ui.button onclick="alert('Applications coming soon!')" class="ml-auto">
                            Apply Now
                        </x-ui.button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout.dashboard>
