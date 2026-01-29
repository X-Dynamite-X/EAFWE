{{-- Users Management Page --}}
<x-layout.dashboard title="{{ __('dashboard.users.title') }}">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">{{ __('dashboard.users.title') }}</h2>
        <x-ui.button href="{{ route('users.create') }}" color="gold">
            {{ __('dashboard.users.create_button') }}
        </x-ui.button>
    </div>

    {{-- Search and Filter --}}
    <x-ui.card class="mb-6">
        <div class="grid md:grid-cols-2 gap-4">
            <x-ui.input name="search" id="userSearch" placeholder="{{ __('dashboard.users.search_placeholder') }}" />
            <x-ui.select name="role" :options="[
                'admin' => __('dashboard.users.roles.admin'),
                'staff' => __('dashboard.users.roles.staff'),
                'member' => __('dashboard.users.roles.member'),
            ]" placeholder="{{ __('dashboard.users.role_placeholder') }}" />
        </div>
    </x-ui.card>

    {{-- Users Table --}}
    <x-ui.card>
        <div class="overflow-x-auto">
            <table id="usersTable" class="w-full">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.users.table.name') }}</th>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.users.table.email') }}</th>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.users.table.phone') }}</th>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.users.table.role') }}</th>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.users.table.status') }}</th>
                        <th class="text-left px-6 py-3 font-semibold">{{ __('dashboard.users.table.actions') }}</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                    @forelse($users ?? [] as $user)
                        <tr id="user-row-{{ $user->id }}" class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $user->name }}</td>
                            <td class="px-6 py-3">{{ $user->email }}</td>
                            <td class="px-6 py-3">{{ $user->phone ?? '-' }}</td>
                            <td class="px-6 py-3">
                                <x-ui.badge color="gold">
                                    {{ $user->roles->first()?->name ?? __('dashboard.users.table.no_role') }}
                                </x-ui.badge>
                            </td>
                            <td class="px-6 py-3">
                                @if ($user->is_active)
                                    <x-ui.badge color="green">{{ __('common.status.active') }}</x-ui.badge>
                                @else
                                    <x-ui.badge color="red">{{ __('common.status.disabled') }}</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-6 py-3">
                                <div class="flex gap-2">
                                    <x-ui.button href="{{ route('users.edit', $user) }}" color="gray" size="sm">
                                        {{ __('common.actions.edit') }}
                                    </x-ui.button>
                                    <x-ui.button color="red" size="sm"
                                        onclick="deleteUser({{ $user->id }})">
                                        {{ __('common.actions.delete') }}
                                    </x-ui.button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center px-6 py-8 text-gray-500">
                                {{ __('dashboard.users.table.empty') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>

    {{-- Pagination --}}
    @if (isset($users) && method_exists($users, 'links'))
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    @endif
    {{-- Delete Confirmation Modal --}}
    <x-ui.modal id="deleteUserModal" title="{{ __('dashboard.users.delete_modal.title') }}">
        <p class="text-gray-700">{{ __('dashboard.users.delete_modal.message') }}</p>

        <x-slot:footer>
            <x-ui.button onclick="confirmDeleteUser(event)"
                color="red">{{ __('dashboard.users.delete_modal.confirm') }}</x-ui.button>
            <x-ui.button onclick="closeModal('deleteUserModal')"
                color="gray">{{ __('common.actions.cancel') }}</x-ui.button>
        </x-slot:footer>
    </x-ui.modal>

    @push('scripts')
        @vite(['resources/js/pages/dashboard.js'])
        <script>
            let userToDeleteId = null;
            let isDeleting = false;

            function deleteUser(userId) {
                userToDeleteId = userId;
                openModal('deleteUserModal');
            }

            function confirmDeleteUser(event) {
                if (event) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                if (!userToDeleteId || isDeleting) return;

                isDeleting = true;

                $.ajax({
                    url: `/users/${userToDeleteId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Hide Modal
                        closeModal('deleteUserModal');

                        // Remove row from table
                        $(`#user-row-${userToDeleteId}`).fadeOut(300, function() {
                            $(this).remove();
                        });

                        // Show success message
                        window.dispatchEvent(new CustomEvent('notify', {
                            detail: {
                                message: '{{ __('dashboard.users.messages.deleted') }}',
                                type: 'success'
                            }
                        }));

                        // Reset
                        userToDeleteId = null;
                        isDeleting = false;
                    },
                    error: function(xhr) {
                        isDeleting = false;
                        let errorMessage =
                            '{{ __('dashboard.users.messages.error_delete') }}';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error;
                        }
                        window.dispatchEvent(new CustomEvent('notify', {
                            detail: {
                                message: errorMessage,
                                type: 'error'
                            }
                        }));
                        console.error('Delete error:', xhr);
                    }
                });
            }
        </script>
    @endpush
</x-layout.dashboard>
