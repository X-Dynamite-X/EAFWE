{{-- Permissions Management Page --}}

<x-layout.dashboard title="إدارة الصلاحيات">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">الصلاحيات</h2>
    </div>

    {{-- Permissions Table --}}
    <x-ui.card>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="text-right px-6 py-3 font-semibold">اسم الصلاحية</th>
                        <th class="text-right px-6 py-3 font-semibold">الأدوار المسندة</th>
                        <th class="text-right px-6 py-3 font-semibold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3 font-medium text-gray-900">{{ $permission->name }}</td>
                            <td class="px-6 py-3">
                                <div class="flex flex-wrap gap-1">
                                    @forelse($permission->roles as $role)
                                        <x-ui.badge size="sm" color="gray">{{ $role->name }}</x-ui.badge>
                                    @empty
                                        <span class="text-gray-400 text-sm">غير مسندة</span>
                                    @endforelse
                                </div>
                            </td>
                            <td class="px-6 py-3">
                                <x-ui.button
                                    onclick="manageRoles({{ $permission->id }}, '{{ $permission->name }}', {{ json_encode($permission->roles->pluck('id')) }})"
                                    color="gray" size="sm">
                                    أدوار الصلاحية
                                </x-ui.button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center px-6 py-8 text-gray-500">
                                لا توجد صلاحيات
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>

    <div class="mt-6">
        {{ $permissions->links() }}
    </div>

    {{-- Manage Roles Modal --}}
    <x-ui.modal id="manageRolesModal" title="إدارة الأدوار">
        <form id="manageRolesForm" method="POST">
            @csrf

            <p class="mb-4 text-gray-600">حدد الأدوار التي يجب أن تمتلك صلاحية: <span id="permissionName"
                    class="font-bold text-gray-800"></span></p>

            <div class="mb-6 space-y-2 max-h-60 overflow-y-auto border p-4 rounded-lg">
                @foreach ($roles as $role)
                    <label class="flex items-center p-2 hover:bg-gray-50 rounded cursor-pointer">
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                            class="w-4 h-4 rounded text-gold-600 focus:ring-gold-500 border-gray-300">
                        <span class="mr-2 text-gray-700 font-medium">{{ $role->name }}</span>
                    </label>
                @endforeach
            </div>

            <div class="flex gap-3">
                <x-ui.button type="submit" color="gold" class="flex-1">حفظ التغييرات</x-ui.button>
                <x-ui.button type="button" onclick="closeModal('manageRolesModal')" color="gray"
                    class="flex-1">إلغاء</x-ui.button>
            </div>
        </form>
    </x-ui.modal>

    @push('scripts')
        <script>
            function manageRoles(permissionId, permissionName, assignedRoleIds) {
                // Update Modal Content
                document.getElementById('permissionName').innerText = permissionName;

                // Update Form Action
                const form = document.getElementById('manageRolesForm');
                form.action = `/permissions/${permissionId}/roles`;

                // Reset checkboxes
                const checkboxes = form.querySelectorAll('input[name="roles[]"]');
                checkboxes.forEach(cb => {
                    cb.checked = assignedRoleIds.includes(parseInt(cb.value));
                });

                openModal('manageRolesModal');
            }
        </script>
    @endpush
</x-layout.dashboard>
