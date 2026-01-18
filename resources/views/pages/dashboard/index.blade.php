{{-- Dashboard Index Page --}}

<x-layout.dashboard title="{{ __('dashboard.index.title') }}">
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        {{-- Stats Cards --}}
        @php

            $stats = [
                [
                    'label' => __('dashboard.index.stats.total_users'),
                    'value' => $totalUsers,
                    'color' => 'bg-blue-100',
                    'icon' => '👥',
                ],
                [
                    'label' => __('dashboard.index.stats.new_requests'),
                    'value' => $pendingMemberships,
                    'color' => 'bg-yellow-100',
                    'icon' => '📋',
                ],
                [
                    'label' => __('dashboard.index.stats.approved_requests'),
                    'value' => $approvedMemberships,
                    'color' => 'bg-purple-100',
                    'icon' => '✅',
                ],
                [
                    'label' => __('dashboard.index.stats.active_roles'),
                    'value' => $totalRoles,
                    'color' => 'bg-green-100',
                    'icon' => '🔐',
                ],
                [
                    'label' => __('dashboard.index.stats.active_accounts'),
                    'value' => $activeUsers,
                    'color' => 'bg-purple-100',
                    'icon' => '📊',
                ],
            ];
        @endphp

        @foreach ($stats as $stat)
            <x-ui.card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">{{ $stat['label'] }}</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stat['value'] }}</p>
                    </div>
                    <div class="text-4xl">{{ $stat['icon'] }}</div>
                </div>
            </x-ui.card>
        @endforeach
    </div>

    {{-- Main Content --}}
    <div class="grid lg:grid-cols-4 gap-4">
        {{-- Recent Users --}}
        <div class="lg:col-span-2">
            <x-ui.card title="{{ __('dashboard.index.recent_users.title') }}">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-right px-4 py-2">{{ __('dashboard.index.recent_users.name') }}</th>
                                <th class="text-right px-4 py-2">{{ __('dashboard.index.recent_users.email') }}</th>
                                <th class="text-right px-4 py-2">{{ __('dashboard.index.recent_users.role') }}</th>
                                <th class="text-right px-4 py-2">{{ __('dashboard.index.recent_users.date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentUsers as $recentUser)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $recentUser->name }}</td>
                                    <td class="px-4 py-2">{{ $recentUser->email }}</td>
                                    <td class="px-4 py-2"><x-ui.badge color="green">{{ $recentUser->roles()->first()->name ?? '-' }}</x-ui.badge></td>
                                    <td class="px-4 py-2">{{ $recentUser->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-center">
                    <x-ui.button href="{{ route('users.index') }}" color="gray" size="sm">
                        {{ __('dashboard.index.recent_users.view_all') }}
                    </x-ui.button>
                </div>
            </x-ui.card>
        </div>

        {{-- Quick Actions --}}
        <div class="lg:col-span-2">
            <x-ui.card title="{{ __('dashboard.index.recent_requests.title') }}">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-right px-4 py-2">{{ __('dashboard.index.recent_users.name') }}</th>
                                <th class="text-right px-4 py-2">{{ __('dashboard.index.recent_users.email') }}</th>
                                <th class="text-right px-4 py-2">{{ __('dashboard.index.recent_users.role') }}</th>
                                <th class="text-right px-4 py-2">{{ __('dashboard.index.recent_users.date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentMemberships as $recentMembership)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $recentMembership->user->name }}</td>
                                    <td class="px-4 py-2">{{ $recentMembership->user->email }}</td>
                                    <td class="px-4 py-2"><x-ui.badge
                                            color="green">{{ $recentMembership->user->roles()->first()->name ?? '-' }}</x-ui.badge>
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $recentMembership->user->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-center">
                    <x-ui.button href="{{ route('memberships.index') }}" color="gray" size="sm">
                        {{ __('dashboard.index.recent_users.view_all') }}
                    </x-ui.button>
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>

@push('scripts')
    @vite(['resources/js/pages/dashboard.js'])
@endpush
