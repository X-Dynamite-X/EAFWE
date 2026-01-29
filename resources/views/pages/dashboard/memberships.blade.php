{{-- Memberships Management Page --}}
<x-layout.dashboard title="{{ __('dashboard.memberships.title') }}">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">{{ __('dashboard.memberships.title') }}</h2>
        @can('create memberships')
            <x-ui.button href="{{ route('memberships.create') }}" color="gold">
                {{ __('dashboard.memberships.create_button') }}
            </x-ui.button>
        @endcan
    </div>

    {{-- Filter Tabs --}}
    <div class="mb-6 border-b border-gray-200">
        <div class="flex gap-4">
            @php
                $statuses = [
                    '' => __('dashboard.memberships.filter.all'),
                    'pending' => __('dashboard.memberships.filter.pending'),
                    'approved' => __('dashboard.memberships.filter.approved'),
                    'rejected' => __('dashboard.memberships.filter.rejected'),
                ];
            @endphp

            @foreach ($statuses as $key => $label)
                <a href="{{ route('memberships.index', $key ? ['status' => $key] : []) }}"
                    class="px-4 py-2 border-b-2 font-medium transition {{ request('status') === $key || (!request('status') && $key === '') ? 'border-gold-600 text-gold-600' : 'border-transparent text-gray-600 hover:text-gray-900' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- Memberships Table --}}
    <x-ui.card>
        <div class="overflow-x-auto">
            <table id="membershipsTable" class="w-full">
                <thead class="bg-gray-100 border-b ">
                    <tr>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.memberships.table.name') }}</th>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.memberships.table.email') }}</th>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.memberships.table.type') }}</th>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.memberships.table.date') }}</th>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.memberships.table.status') }}
                        </th>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.memberships.table.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($memberships ?? [] as $membership)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="text-left px-6 py-3 font-medium">{{ $membership->user->name ?? 'N/A' }}</td>
                            <td class="text-left px-6 py-3">{{ $membership->user->email ?? 'N/A' }}</td>
                            <td class="text-left px-6 py-3">{{ $membership->getMembershipTypeLabel() }}</td>
                            <td class="text-left px-6 py-3 text-sm text-gray-600">
                                {{ $membership->created_at->format('Y-m-d H:i') }}</td>
                            <td class="text-left px-6 py-3">
                                @if ($membership->status === 'pending')
                                    <x-ui.badge
                                        color="yellow">{{ __('dashboard.memberships.status.pending') }}</x-ui.badge>
                                @elseif($membership->status === 'approved')
                                    <x-ui.badge
                                        color="green">{{ __('dashboard.memberships.status.approved') }}</x-ui.badge>
                                @else
                                    <x-ui.badge
                                        color="red">{{ __('dashboard.memberships.status.rejected') }}</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-6 py-3">
                                <div class="flex gap-2 flex-wrap">
                                    {{-- View Button --}}
                                    <x-ui.button href="{{ route('memberships.show', $membership) }}" color="gray"
                                        size="sm">
                                        {{ __('dashboard.memberships.actions.view') }}
                                    </x-ui.button>

                                    {{-- Approve Button --}}
                                    @can('approve memberships')
                                        @if ($membership->status === 'pending')
                                            <x-ui.button type="button" data-action="approve"
                                                data-id="{{ $membership->id }}"
                                                data-name="{{ $membership->user->name ?? 'N/A' }}" color="green"
                                                size="sm">
                                                {{ __('dashboard.memberships.actions.approve') }}
                                            </x-ui.button>
                                        @endif
                                    @endcan

                                    {{-- Reject Button --}}
                                    @can('approve memberships')
                                        @if ($membership->status === 'pending')
                                            <x-ui.button type="button" data-action="reject"
                                                data-id="{{ $membership->id }}"
                                                data-name="{{ $membership->user->name ?? 'N/A' }}" color="red"
                                                size="sm">
                                                {{ __('dashboard.memberships.actions.reject') }}
                                            </x-ui.button>
                                        @endif
                                    @endcan

                                    {{-- Delete Button --}}
                                    @can('delete memberships')
                                        @if ($membership->status === 'pending' || auth()->user()->hasRole('admin'))
                                            <x-ui.button type="button" data-action="delete"
                                                data-id="{{ $membership->id }}"
                                                data-name="{{ $membership->user->name ?? 'N/A' }}" color="gray"
                                                size="sm">
                                                {{ __('dashboard.memberships.actions.delete') }}
                                            </x-ui.button>
                                        @endif
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center px-6 py-8 text-gray-500">
                                {{ __('dashboard.memberships.table.empty') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>

    {{-- Pagination --}}
    @if (isset($memberships) && method_exists($memberships, 'links'))
        <div class="mt-6">
            {{ $memberships->links() }}
        </div>
    @endif

    {{-- Action Confirmation Modal --}}
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
