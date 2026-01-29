<x-layout.dashboard title="{{ __('dashboard.communication.title') }}">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black text-charcoal-900 mb-2">{{ __('dashboard.communication.title') }}</h1>
            <p class="text-charcoal-600">{{ __('dashboard.communication.subtitle') }}</p>
        </div>
        @php
            $unreadCount = $communications->count(); // In real app, check 'read' status
        @endphp
        <div class="bg-gold-500 text-charcoal-900 px-4 py-2 rounded-xl font-black text-sm">
            {{ $unreadCount }} {{ __('dashboard.communication.new_notifications') }}
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        {{-- Internal Announcements --}}
        <div class="lg:col-span-2 space-y-6">
            <x-ui.card title="{{ __('dashboard.communication.latest_alerts') }}">
                <div class="space-y-0 divide-y divide-gray-100">
                    @forelse ($communications as $note)
                        <div class="py-6 {{-- $note->is_read ? '' : 'bg-gold-50/30' --}} px-6 -mx-6">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-black text-charcoal-900 flex items-center gap-2">
                                    {{-- @if (!$note->is_read)
                                        <span class="w-2 h-2 bg-gold-500 rounded-full"></span>
                                    @endif --}}
                                    {{ $note->title }}
                                </h3>
                                <span
                                    class="text-[10px] text-gray-400 font-bold uppercase">{{ $note->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm text-charcoal-700 leading-relaxed">{{ $note->message }}</p>
                            <div class="mt-4 flex gap-4">
                                <button
                                    class="text-xs font-black text-gold-600 hover:text-gold-700 underline">{{ __('dashboard.communication.take_action') }}</button>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6 text-gray-500">
                            لا توجد تنبيهات حالياً
                        </div>
                    @endforelse
                </div>
            </x-ui.card>
        </div>

        {{-- Direct Messages / Support --}}
        <div class="space-y-6">
            <x-ui.card title="{{ __('dashboard.communication.admin_messages') }}">
                <div class="text-center py-8">
                    <div class="text-4xl mb-4">📧</div>
                    <p class="text-xs text-charcoal-500 mb-6 leading-relaxed">
                        {{ __('dashboard.communication.admin_msg_desc') }}</p>
                    <x-ui.button size="sm" variant="outline"
                        class="w-full">{{ __('dashboard.communication.start_conversation') }}</x-ui.button>
                </div>
            </x-ui.card>

            <x-ui.card title="{{ __('dashboard.communication.stats') }}">
                <div class="space-y-4">
                    {{-- Placeholder stats --}}
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-charcoal-600">طلب استشارة</span>
                        <span class="font-black">2</span>
                    </div>
                    <div class="w-full bg-gray-100 h-1.5 rounded-full">
                        <div class="bg-blue-500 h-1.5 rounded-full w-2/3"></div>
                    </div>
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>
