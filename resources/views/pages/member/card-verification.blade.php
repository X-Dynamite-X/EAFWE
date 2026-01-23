{{-- Card Verification Result Page --}}

<x-layout.app title="التحقق من البطاقة">
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 flex items-center justify-center p-4">
        <div class="max-w-2xl w-full">
            @if ($isValid)
                {{-- Success State --}}
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-green-400 to-green-600 px-8 py-12 text-center">
                        <div class="text-6xl mb-4">✓</div>
                        <h1 class="text-3xl font-bold text-white">{{ __('member.verification.authentic') }}</h1>
                        <p class="text-green-100 mt-2">{{ __('member.verification.verified_success') }}</p>
                    </div>

                    <div class="p-8">
                        <div class="bg-green-50 border-2 border-green-200 rounded-lg p-6 mb-8">
                            <h2 class="text-lg font-bold text-green-900 mb-4">
                                {{ __('member.verification.member_info') }}</h2>

                            <div class="space-y-4">
                                <div class="flex justify-between items-center pb-4 border-b border-green-200">
                                    <span class="text-gray-600">{{ __('member.pdf.full_name') }}:</span>
                                    <span class="font-semibold text-gray-900">{{ $user->name }}</span>
                                </div>

                                <div class="flex justify-between items-center pb-4 border-b border-green-200">
                                    <span class="text-gray-600">{{ __('member.pdf.email') }}:</span>
                                    <span class="font-semibold text-gray-900">{{ $user->email }}</span>
                                </div>

                                <div class="flex justify-between items-center pb-4 border-b border-green-200">
                                    <span class="text-gray-600">{{ __('member.pdf.member_id') }}:</span>
                                    <span
                                        class="font-mono font-semibold text-gray-900">{{ str_pad($membership->user_id, 6, '0', STR_PAD_LEFT) }}</span>
                                </div>

                                <div class="flex justify-between items-center pb-4 border-b border-green-200">
                                    <span class="text-gray-600">{{ __('member.pdf.membership_type') }}:</span>
                                    <span class="font-semibold text-gray-900">
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
                                    </span>
                                </div>

                                <div class="flex justify-between items-center pb-4 border-b border-green-200">
                                    <span class="text-gray-600">{{ __('member.pdf.country') }}:</span>
                                    <span class="font-semibold text-gray-900">{{ $membership->country }}</span>
                                </div>

                                @if ($membership->company_name)
                                    <div class="flex justify-between items-center pb-4 border-b border-green-200">
                                        <span class="text-gray-600">{{ __('member.pdf.company_name') }}:</span>
                                        <span
                                            class="font-semibold text-gray-900">{{ $membership->company_name }}</span>
                                    </div>
                                @endif

                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">{{ __('member.pdf.approval_date') }}:</span>
                                    <span
                                        class="font-semibold text-gray-900">{{ $membership->approval_date->format('d M, Y') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Verification Details --}}
                        <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-6 mb-8">
                            <h3 class="text-lg font-bold text-blue-900 mb-4">
                                {{ __('member.verification.verification_details') }}</h3>

                            <div class="space-y-3 text-sm">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="text-gray-700"><strong>{{ __('member.verification.authentic_label') }}:</strong>
                                        {{ __('member.verification.authentic_desc') }}</span>
                                </div>

                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="text-gray-700"><strong>{{ __('member.verification.approved_label') }}:</strong>
                                        {{ __('member.verification.approved_desc') }}</span>
                                </div>

                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="text-gray-700"><strong>{{ __('member.verification.no_forgery_label') }}:</strong>
                                        {{ __('member.verification.no_forgery_desc') }}</span>
                                </div>

                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="text-gray-700"><strong>{{ __('member.verification.time_label') }}:</strong>
                                        {{ now()->format('d M, Y H:i:s') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Security Information --}}
                        <div class="bg-yellow-50 border-2 border-yellow-200 rounded-lg p-6 mb-8">
                            <h3 class="text-lg font-bold text-yellow-900 mb-3">🔒
                                {{ __('member.verification.security_info_title') }}</h3>

                            <p class="text-sm text-yellow-800 mb-3">
                                {{ __('member.verification.security_desc') }}
                            </p>

                            <ul class="text-sm text-yellow-800 space-y-2 list-disc list-inside">
                                <li>{{ __('member.pdf.features.unique_qr') }}</li>
                                <li>{{ __('member.verification.linked_to_member') }}</li>
                                <li>{{ __('member.verification.no_forgery') }}</li>
                                <li>{{ __('member.verification.reissue_available') }}</li>
                            </ul>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="space-y-3">
                            <a href="javascript:window.print()"
                                class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition text-center">
                                {{ __('member.verification.print_button') }}
                            </a>
                            <a href="/"
                                class="block w-full bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-4 rounded-lg transition text-center">
                                {{ __('member.verification.back_button') }}
                            </a>
                        </div>
                    </div>
                </div>
            @else
                {{-- Error State --}}
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-red-400 to-red-600 px-8 py-12 text-center">
                        <div class="text-6xl mb-4">✗</div>
                        <h1 class="text-3xl font-bold text-white">{{ __('member.verification.invalid_title') }}</h1>
                        <p class="text-red-100 mt-2">{{ __('member.verification.failed_desc') }}</p>
                    </div>

                    <div class="p-8">
                        <div class="bg-red-50 border-2 border-red-200 rounded-lg p-6 mb-6">
                            <p class="text-red-900 font-semibold">⚠️ {{ __('member.verification.warning_label') }}:</p>
                            <p class="text-red-800 mt-2">
                                {{ __('member.verification.warning_desc') }}
                            </p>
                        </div>

                        <a href="/"
                            class="block w-full bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-4 rounded-lg transition text-center">
                            {{ __('member.verification.back_button') }}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout.app>
