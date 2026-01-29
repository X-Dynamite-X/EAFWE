<x-layout.dashboard title="{{ __('dashboard.files.title') }}">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-charcoal-900 mb-2">{{ __('dashboard.files.title') }}</h1>
            <p class="text-charcoal-600">{{ __('dashboard.files.subtitle') }}</p>
        </div>
        <div class="hidden md:block">
            <div class="relative">
                <input type="text" placeholder="{{ __('dashboard.files.search_placeholder') }}"
                    class="pr-10 pl-4 py-2 border rounded-xl focus:ring-2 focus:ring-gold-500 border-gray-200 text-sm">
                <span class="absolute right-3 top-2.5 text-gray-400">🔍</span>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-4 gap-6">
        {{-- File Categories --}}
        <div class="space-y-4">
            {{-- TODO: Dynamic Categories if needed --}}
            <button
                class="w-full flex items-center justify-between px-4 py-3 rounded-xl transition-colors bg-gold-500 text-charcoal-900 font-black">
                <span>{{ __('dashboard.files.categories.all') }}</span>
                <span class="text-xs opacity-60">{{ $files->count() }}</span>
            </button>
        </div>

        {{-- Files List --}}
        <div class="lg:col-span-3">
            <x-ui.card>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th
                                    class="text-right px-6 py-4 text-xs font-black text-charcoal-500 uppercase tracking-wider">
                                    {{ __('dashboard.files.table.name') }}</th>
                                <th
                                    class="text-right px-6 py-4 text-xs font-black text-charcoal-500 uppercase tracking-wider">
                                    {{ __('dashboard.files.table.category') }}</th>
                                <th
                                    class="text-right px-6 py-4 text-xs font-black text-charcoal-500 uppercase tracking-wider">
                                    {{ __('dashboard.files.table.size') }}</th>
                                <th
                                    class="text-right px-6 py-4 text-xs font-black text-charcoal-500 uppercase tracking-wider">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($files as $file)
                                <tr class="hover:bg-gray-50 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="text-2xl">{{ $file->file_type == 'pdf' ? '📕' : '📘' }}</span>
                                            <span class="font-bold text-charcoal-900">{{ $file->title }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 bg-gray-100 text-charcoal-600 rounded-lg text-xs font-bold">{{ $file->category ?? 'General' }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-charcoal-500">
                                        {{ $file->file_size ? round($file->file_size / 1024) . ' KB' : '-' }}</td>
                                    <td class="px-6 py-4 text-left">
                                        <a href="{{ $file->file_url }}" target="_blank"
                                            class="text-gold-500 hover:text-gold-600 font-bold transition-colors">{{ __('dashboard.files.table.download') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-8 text-gray-500">
                                        {{ __('dashboard.files.table.empty') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>
