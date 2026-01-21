{{-- Membership Card Display --}}

<x-layout.dashboard :title="__('member.card.title')">
    <div class="max-w-4xl mx-auto">
        {{-- Header --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 ">{{ __('member.card.title') }}</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">{{ __('member.card.card_preview') }}</p>
            </div>
            <div class="flex items-center gap-4">
                <x-language-theme-switcher />
                <a href="{{ route('member.profile') }}"
                    class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    ← {{ __('member.card.back') }}
                </a>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            {{-- Card Preview --}}
            <div>
                <div
                    class="bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 dark:from-blue-700 dark:via-purple-700 dark:to-pink-700 rounded-2xl shadow-2xl p-8 text-white min-h-96 flex flex-col justify-between relative overflow-hidden">
                    {{-- Background Pattern --}}
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white opacity-10 rounded-full -mr-20 -mt-20"></div>
                    <div class="absolute bottom-0 left-0 w-40 h-40 bg-white opacity-10 rounded-full -ml-20 -mb-20">
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-8">
                            <div>
                                <h2 class="text-xl font-bold">MEMBER CARD</h2>
                                <p class="text-sm opacity-80">{{ __('member.card.title') }}</p>
                            </div>
                            <div class="text-4xl">🎖️</div>
                        </div>

                        <div class="mb-8">
                            <p class="text-xs opacity-80">{{ __('member.card.cardholder') }}</p>
                            <h3 class="text-3xl font-bold">{{ $user->name }}</h3>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-8 pb-8 border-b border-white/30">
                            <div>
                                <p class="text-xs opacity-80">{{ __('member.card.member_id') }}</p>
                                <p class="text-lg font-mono">{{ str_pad($membership->user_id, 6, '0', STR_PAD_LEFT) }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs opacity-80">{{ __('member.card.membership_type') }}</p>
                                <p class="text-lg font-semibold">
                                    @switch($membership->membership_type)
                                        @case('basic')
                                            {{ __('member.membership_types.basic') }}
                                        @break

                                        @case('premium')
                                            {{ __('member.membership_types.premium') }}
                                        @break

                                        @case('enterprise')
                                            {{ __('member.membership_types.enterprise') }}
                                        @break
                                    @endswitch
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-10 text-xs opacity-80">
                        <p>{{ __('member.card.issued') }}: {{ $membership->approval_date?->format('d/m/Y') }}</p>
                        <p class="font-mono text-xs mt-1">TOKEN: {{ substr($membership->card_token, 0, 16) }}...</p>
                    </div>
                </div>

                {{-- Card Details --}}
                <x-ui.card class="mt-6 dark:bg-gray-800 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900  mb-4">{{ __('member.card.card_details') }}</h3>

                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">{{ __('member.card.email') }}:</span>
                            <span class="font-semibold text-gray-900 ">{{ $user->email }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">{{ __('member.card.country') }}:</span>
                            <span class="font-semibold text-gray-900 ">{{ $membership->country }}</span>
                        </div>
                        @if ($membership->company_name)
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">{{ __('member.card.company') }}:</span>
                                <span class="font-semibold text-gray-900 ">{{ $membership->company_name }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between">
                            <span
                                class="text-gray-600 dark:text-gray-400">{{ __('member.card.verification_status') }}:</span>
                            <span class="font-semibold">
                                @if ($membership->card_verified)
                                    <span class="text-green-600 dark:text-green-400">✓
                                        {{ __('member.profile.verified') }}</span>
                                @else
                                    <span class="text-yellow-600 dark:text-yellow-400">⏳
                                        {{ __('member.profile.no_card_yet') }}</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </x-ui.card>
            </div>

            {{-- QR Code Section --}}
            <div>
                <x-ui.card class="dark:bg-gray-800 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900  mb-6">{{ __('member.card.qr_code') }}</h3>

                    <div
                        class="bg-gray-50 dark:bg-gray-900 p-8 rounded-lg flex justify-center mb-6 border border-gray-200 dark:border-gray-700">
                        <div id="qr-code-container" class="w-64 h-64 flex items-center justify-center">
                            {!! QrCode::format('svg')->size(250)->generate($qrCodeUrl) !!}
                        </div>
                    </div>

                    <div
                        class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-700 rounded-lg p-4 mb-6">
                        <h4 class="font-semibold text-blue-900 dark:text-blue-200 mb-2">
                            {{ __('member.card.how_to_use') }}:</h4>
                        <ol class="text-sm text-blue-900 dark:text-blue-200 space-y-1 list-decimal list-inside">
                            <li>{{ __('member.card.scan_qr') }}</li>
                            <li>{{ __('member.card.verification_page') }}</li>
                            <li>{{ __('member.card.verify_authentic') }}</li>
                            <li>{{ __('member.card.cannot_forge') }}</li>
                        </ol>
                    </div>

                    <div class="space-y-3">
                        <a href="{{ route('member-card.download', $membership->id) }}"
                            class="w-full bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-600 text-white font-semibold py-3 px-4 rounded-lg transition flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            {{ __('member.profile.download_card') }}
                        </a>

                        <a href="{{ route('member-card.show', $membership->id) }}"
                            class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg transition flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            {{ __('member.card.full_view') }}
                        </a>

                        <a href="{{ route('member.profile') }}"
                            class="w-full bg-gray-600 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600 text-white font-semibold py-3 px-4 rounded-lg transition">
                            {{ __('member.card.back') }}
                        </a>
                    </div>
                </x-ui.card>

                {{-- Security Info --}}
                <x-ui.card class="mt-6 dark:bg-gray-800 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900  mb-4">🔒 {{ __('member.card.security_info') }}</h3>

                    <div class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
                        <p>• {{ __('member.card.unique_qr') }}</p>
                        <p>• {{ __('member.card.auto_logging') }}</p>
                        <p>• {{ __('member.card.linked_data') }}</p>
                        <p>• {{ __('member.card.reissue_option') }}</p>
                        <p>• {{ __('member.card.encrypted_data') }}</p>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </div>


</x-layout.dashboard>
