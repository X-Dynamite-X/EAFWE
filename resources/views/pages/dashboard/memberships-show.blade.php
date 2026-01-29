{{-- Show Membership Page --}}
<x-layout.dashboard title="{{ __('dashboard.memberships.details.request_info') }}">
    <div class="max-w-3xl mx-auto">
        <x-ui.card title="{{ __('dashboard.memberships.details.request_info') }}">
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <p class="text-gray-500 text-sm mb-1">{{ __('dashboard.memberships.details.user') }}</p>
                    <p class="text-lg font-semibold">{{ $membership->user->name }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">{{ __('dashboard.memberships.details.email') }}</p>
                    <p class="text-lg font-semibold">{{ $membership->user->email }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">{{ __('dashboard.memberships.details.type') }}</p>
                    <p class="text-lg font-semibold">{{ $membership->getMembershipTypeLabel() }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">{{ __('dashboard.memberships.details.country') }}</p>
                    <p class="text-lg font-semibold">{{ $membership->country }}</p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">{{ __('dashboard.memberships.details.status') }}</p>
                    <div>
                        @if ($membership->isPending())
                            <x-ui.badge color="yellow">{{ __('dashboard.memberships.status.pending') }}</x-ui.badge>
                        @elseif($membership->isApproved())
                            <x-ui.badge color="green">{{ __('dashboard.memberships.status.approved') }}</x-ui.badge>
                        @else
                            <x-ui.badge color="red">{{ __('dashboard.memberships.status.rejected') }}</x-ui.badge>
                        @endif
                    </div>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">{{ __('dashboard.memberships.details.date') }}</p>
                    <p class="text-lg font-semibold">{{ $membership->created_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>

            @if ($membership->company_name)
                <div class="mb-6 pb-6 border-b">
                    <p class="text-gray-500 text-sm mb-1">{{ __('dashboard.memberships.details.company') }}</p>
                    <p class="text-lg">{{ $membership->company_name }}</p>
                </div>
            @endif

            <div class="mb-6">
                <p class="text-gray-500 text-sm mb-2">{{ __('dashboard.memberships.details.description') }}</p>
                <p class="text-gray-800 whitespace-pre-wrap">{{ $membership->description }}</p>
            </div>

            @if ($membership->approvedBy)
                <div class="bg-gray-50 p-4 rounded-lg">
                    @if ($membership->rejection_reason)
                        <p class="text-gray-500 text-sm mb-1">{{ __('dashboard.memberships.details.rejected_by') }}</p>
                    @else
                        <p class="text-gray-500 text-sm mb-1">{{ __('dashboard.memberships.details.processed_by') }}
                        </p>
                    @endif
                    <p class="font-semibold">{{ $membership->approvedBy->name }}</p>
                    <p class="text-sm text-gray-500">{{ $membership->approval_date->format('Y-m-d H:i') }}</p>
                    @if ($membership->rejection_reason)
                        <p class="text-sm text-gray-500">{{ __('dashboard.memberships.details.rejection_reason') }}:
                            {{ $membership->rejection_reason }}</p>
                    @endif
                </div>
            @endif
        </x-ui.card>

        {{-- Action Buttons --}}
        <div class="mt-6 flex gap-4 flex-wrap">
            {{-- Back Button --}}
            <x-ui.button href="{{ route('memberships.index') }}" color="gray">
                {{ __('common.actions.back') }}
            </x-ui.button>

            {{-- Approve Button (Only for pending and with permission) --}}
            @can('approve memberships')
                @if ($membership->isPending())
                    <x-ui.button type="button" data-action="approve" data-id="{{ $membership->id }}"
                        data-name="{{ $membership->user->name }}" color="green">
                        {{ __('dashboard.memberships.actions.approve') }}
                    </x-ui.button>
                @endif
            @endcan

            {{-- Reject Button (Only for pending and with permission) --}}
            @can('approve memberships')
                @if ($membership->isPending())
                    <x-ui.button type="button" data-action="reject" data-id="{{ $membership->id }}"
                        data-name="{{ $membership->user->name }}" color="red">
                        {{ __('dashboard.memberships.actions.reject') }}
                    </x-ui.button>
                @endif
            @endcan

            {{-- Delete Button (Only for pending or admin) --}}
            @can('delete memberships')
                @if ($membership->isPending() || auth()->user()->hasRole('admin'))
                    <x-ui.button type="button" data-action="delete" data-id="{{ $membership->id }}"
                        data-name="{{ $membership->user->name }}" color="gray">
                        {{ __('dashboard.memberships.actions.delete') }}
                    </x-ui.button>
                @endif
            @endcan
        </div>
        <x-ui.modal id="actionModal" title="{{ __('dashboard.memberships.actions.confirm_title') }}">
            <p id="modalBody" class="text-center text-lg mb-4"></p>

            {{-- Rejection Reason Input --}}
            <div id="rejectionReasonGroup" class="hidden mb-4">
                <label for="rejectionReason"
                    class="block text-sm font-medium text-gray-700 mb-1">{{ __('dashboard.memberships.actions.rejection_reason') }}</label>
                <textarea id="rejectionReason" name="rejection_reason" rows="3"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-gold-500 focus:ring-gold-500"
                    placeholder="{{ __('dashboard.memberships.actions.rejection_placeholder') }}"></textarea>
            </div>

            <div class="flex justify-center gap-4 mt-6">
                <button type="button" id="confirmButton"
                    class="w-full sm:w-auto px-4 py-2 rounded-lg text-white font-semibold transition">
                    {{ __('dashboard.memberships.actions.confirm_title') }}
                </button>
                <button type="button" onclick="closeModal('actionModal')"
                    class="w-full sm:w-auto px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 font-semibold transition">
                    {{ __('dashboard.memberships.actions.cancel') }}
                </button>
            </div>
        </x-ui.modal>

        <x-slot name="scripts">
            @vite('resources/js/pages/membership.js')
        </x-slot>
</x-layout.dashboard>
