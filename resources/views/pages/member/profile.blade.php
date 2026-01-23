{{-- Member Profile Page --}}

<x-layout.dashboard title="ملفي الشخصي">
    <div class="max-w-6xl mx-auto">
        {{-- Header Section --}}
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900  mb-2">{{ __('member.profile.title') }}</h1>
            <p class="text-gray-600">{{ __('member.profile.subtitle') }}</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            {{-- User Information Card --}}
            <div class="md:col-span-2">
                <x-ui.card class="mb-6">
                    <div class="flex items-center gap-6 pb-6 border-b border-gray-200">
                        <div
                            class="w-24 h-24 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full flex items-center justify-center text-white text-3xl font-bold">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 ">{{ $user->name }}</h2>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            @if ($user->phone)
                                <p class="text-gray-600">{{ $user->phone }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="pt-6">
                        <a href="{{ route('profile.edit') }}"
                            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            {{ __('member.profile.edit_button') }}
                        </a>
                    </div>
                </x-ui.card>

                {{-- Membership Information --}}
                <x-ui.card>
                    <h3 class="text-xl font-bold text-gray-900  mb-6">{{ __('member.profile.membership_data') }}</h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">
                                {{ __('member.profile.membership_type') }}</p>
                            <p class="text-lg font-semibold text-gray-900 ">
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

                        <div>
                            <p class="text-sm text-gray-600 mb-1">{{ __('member.profile.country') }}
                            </p>
                            <p class="text-lg font-semibold text-gray-900 ">{{ $membership->country }}</p>
                        </div>

                        @if ($membership->company_name)
                            <div>
                                <p class="text-sm text-gray-600 mb-1">
                                    {{ __('member.profile.company_name') }}</p>
                                <p class="text-lg font-semibold text-gray-900 ">{{ $membership->company_name }}</p>
                            </div>
                        @endif

                        <div>
                            <p class="text-sm text-gray-600 mb-1">
                                {{ __('member.profile.approval_date') }}</p>
                            <p class="text-lg font-semibold text-gray-900 ">
                                {{ $membership->approval_date?->format('Y-m-d') ?? __('member.profile.pending_review') }}
                            </p>
                        </div>

                        <div class="md:col-span-2">
                            <p class="text-sm text-gray-600 mb-1">
                                {{ __('member.profile.description') }}</p>
                            <p class="text-gray-900 ">{{ $membership->description }}</p>
                        </div>
                    </div>
                </x-ui.card>
            </div>

            {{-- Membership Card Section --}}
            <div>
                <x-ui.card class="sticky top-8">
                    <h3 class="text-xl font-bold text-gray-900  mb-6">{{ __('member.card.title') }}</h3>

                    <div class="space-y-4">
                        @if ($cardStatus['has_card'])
                            <div
                                class="bg-gradient-to-br from-blue-500 to-purple-600 text-white rounded-lg p-6 min-h-48 flex flex-col justify-between">
                                <div>
                                    <p class="text-sm opacity-80">{{ __('member.card.cardholder') }}</p>
                                    <h4 class="text-lg font-bold">{{ $user->name }}</h4>
                                </div>
                                <div class="pt-4 border-t border-white/20">
                                    <p class="text-xs opacity-80">{{ __('member.card.membership_id') }}</p>
                                    <p class="font-mono text-sm">{{ $membership->id }}</p>
                                </div>
                                <div class="text-xs opacity-80 mt-2">
                                    {{ __('member.card.issued_at') }}:
                                    {{ $cardStatus['issued_at']?->format('d/m/Y') }}
                                </div>
                            </div>

                            <a href="{{ route('member-card.show', $membership->id) }}"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition text-center">
                                {{ __('member.card.view_button') }}
                            </a>

                            <a href="{{ route('member-card.download', $membership->id) }}"
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition text-center flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                {{ __('member.card.download_button') }}
                            </a>

                            <button onclick="confirmReissue({{ $membership->id }})"
                                class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                                {{ __('member.card.reissue_button') }}
                            </button>

                            @if ($cardStatus['verified'])
                                <div
                                    class="bg-green-100 border border-green-300 rounded-lg p-3 text-sm">
                                    <p class="text-green-800 font-semibold">✓
                                        {{ __('member.card.verified') }}</p>
                                </div>
                            @endif
                        @else
                            <div
                                class="bg-yellow-100 border border-yellow-300 rounded-lg p-4 mb-4">
                                <p class="text-yellow-800">{{ __('member.card.no_card_created') }}
                                </p>
                            </div>
                        @endif
                    </div>
                </x-ui.card>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function confirmReissue(membershipId) {
                if (confirm('{{ __('member.card.confirm_reissue') }}')) {
                    fetch(`/member-card/${membershipId}/reissue`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        }
                    }).then(r => r.json()).then(data => {
                        window.location.reload();
                    });
                }
            }
        </script>
    @endpush
</x-layout.dashboard>
