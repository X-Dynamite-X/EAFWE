@props([
    'title',
    'subtitle' => null,
    'image' => null,
    'badges' => [],
    'description' => null,
    'content' => null,
    'meta' => [],
    'actions' => null,
    'show_sidebar' => true,

])

<x-layout.dashboard :title="$title" :show_sidebar="$show_sidebar">
    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-lg shadow-sm p-6 border border-cyan-100 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
                        {{ $title }}
                    </h1>
                    @if ($subtitle)
                        <p class="text-gray-600 text-sm mt-2">{{ $subtitle }}</p>
                    @endif
                </div>

                @if ($actions)
                    <div class="flex gap-2">
                        {{ $actions }}
                    </div>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Main Content --}}
            <div class="lg:col-span-2">
                <x-ui.card>

                    @if ($image)
                        <div class="mb-6 rounded-lg overflow-hidden shadow-lg">
                            <img src="{{ $image }}" class="w-full h-80 object-cover">
                        </div>
                    @endif

                    @if ($badges)
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($badges as $badge)
                                {{ $badge }}
                            @endforeach
                        </div>
                    @endif

                    @if ($description)
                        <p class="text-lg text-gray-700 leading-relaxed mb-6">
                            {{ $description }}
                        </p>
                    @endif

                    @if ($content)
                        <div class="prose prose-sm max-w-none text-gray-700">
                            {!! $content !!}
                        </div>
                    @endif
                </x-ui.card>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                <x-ui.card>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        {{ __('common.general.details') }}
                    </h3>

                    <div class="space-y-4">
                        @foreach ($meta as $item)
                            <div class="border-t pt-4 first:border-0 first:pt-0">
                                <p class="text-sm text-gray-600">{{ $item['label'] }}</p>
                                <p class="font-medium text-gray-900">
                                    {{ $item['value'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </x-ui.card>
            </div>

        </div>
    </div>
</x-layout.dashboard>
