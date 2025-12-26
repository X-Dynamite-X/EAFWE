{{-- Roles Management Page --}}

<x-layout.dashboard title="إدارة الأدوار والصلاحيات">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">الأدوار والصلاحيات</h2>
        @can('create roles')
            <x-ui.button onclick="openCreateModal()" color="gold">
                إضافة دور جديد
            </x-ui.button>
        @endcan
    </div>

    {{-- Roles Grid --}}
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($roles ?? [] as $role)
            <x-ui.card title="{{ $role->name }}" class="relative">
                <p class="text-gray-600 mb-4">{{ $role->description ?? 'بدون وصف' }}</p>

                <div class="mb-4">
                    <p class="text-sm font-semibold text-gray-700 mb-2">الصلاحيات:</p>
                    <div class="flex flex-wrap gap-2">
                        @forelse($role->permissions ?? [] as $permission)
                            <x-ui.badge size="sm" color="gray">{{ $permission->name }}</x-ui.badge>
                        @empty
                            <span class="text-gray-500 text-sm">لا توجد صلاحيات</span>
                        @endforelse
                    </div>
                </div>

                @role('admin')
                    <div class="flex gap-2">
                        <x-ui.button
                            onclick="editRole({{ $role->id }}, '{{ $role->name }}', '{{ $role->description ?? '' }}', {{ json_encode($role->permissions->pluck('id')) }})"
                            color="gray" size="sm" class="flex-1">
                            تعديل
                        </x-ui.button>
                        <x-ui.button onclick="openDeleteModal({{ $role->id }})" color="red" size="sm" class="flex-1">
                            حذف
                        </x-ui.button>
                    </div>
                @endcan
            </x-ui.card>
        @empty
            <div class="col-span-full">
                <x-ui.card>
                    <p class="text-center text-gray-500 py-8">لا توجد أدوار</p>
                </x-ui.card>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if (isset($roles) && method_exists($roles, 'links'))
        <div class="mt-6">
            {{ $roles->links() }}
        </div>
    @endif

    {{-- Role Modal (Create & Edit) --}}
    <x-ui.modal id="roleModal" title="إضافة دور جديد">
        <form id="roleForm" method="POST">
            @csrf
            {{-- Method Spoofing for Edit --}}
            <input type="hidden" name="_method" id="formMethod" value="POST">

            <x-ui.input name="name" id="roleName" label="اسم الدور" placeholder="مثال: مدير" required />
            <x-ui.textarea name="description" id="roleDescription" label="الوصف" rows="3" />

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">الصلاحيات</label>
                <div class="space-y-2 max-h-48 overflow-y-auto border p-2 rounded">
                    @foreach ($permissions ?? [] as $permission)
                        <label class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                class="mr-2 role-permission">
                            <span class="text-gray-700">{{ $permission->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex gap-2">
                <x-ui.button type="submit" color="gold" class="flex-1">حفظ</x-ui.button>
                <x-ui.button type="button" onclick="closeModal('roleModal')" color="gray"
                    class="flex-1">إلغاء</x-ui.button>
            </div>
        </form>
    </x-ui.modal>
    <x-ui.modal id="deleteModal" title="حذف دور">
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex gap-2">
            <p class="text-gray-700">هل أنت متأكد من رغبتك في حذف هذا  دور لا يمكن التراجع عن هذا الإجراء.</p>

                <x-slot:footer>
                <x-ui.button type="submit" onclick="deleteRole()" color="red" class="flex-1">حذف</x-ui.button>
                <x-ui.button type="button" onclick="closeModal('deleteModal')" color="gray"
                    class="flex-1">إلغاء</x-ui.button>
                </x-slot:footer>
            </div>



        </form>
    </x-ui.modal>

    @push('scripts')
        <script>
            let roleId = null;
            function openDeleteModal(id) {
                roleId = id;
                openModal('deleteModal');
            }
            function openCreateModal() {
                // Reset Form
                document.getElementById('roleForm').action = "{{ route('roles.store') }}";
                document.getElementById('formMethod').value = "POST";
                document.getElementById('roleName').value = "";
                document.getElementById('roleDescription').value = "";

                // Uncheck all permissions
                document.querySelectorAll('.role-permission').forEach(cb => cb.checked = false);

                // Update Title (Need to access Modal component internals or just simple DOM manipulation if possible,
                // but for now relying on the default title or updating it via JS if the modal allows)
                // Assuming simple text update:
                const modalTitle = document.querySelector('#roleModal h3') || document.querySelector('#roleModal .text-lg');
                if (modalTitle) modalTitle.innerText = "إضافة دور جديد";

                openModal('roleModal');
            }

            function editRole(id, name, description, permissions) {
                // Populate Form
                document.getElementById('roleForm').action = `/roles/${id}`;
                document.getElementById('formMethod').value = "PATCH"; // Laravel uses PATCH/PUT for updates
                document.getElementById('roleName').value = name;
                document.getElementById('roleDescription').value = description;

                // Check permissions
                document.querySelectorAll('.role-permission').forEach(cb => {
                    cb.checked = permissions.includes(parseInt(cb.value));
                });

                // Update Title
                const modalTitle = document.querySelector('#roleModal h3') || document.querySelector('#roleModal .text-lg');
                if (modalTitle) modalTitle.innerText = "تعديل الدور";

                openModal('roleModal');
            }

            let isDeleting = false;

            function deleteRole(roleId) {
                if (isDeleting) return;
                if (!confirm('هل أنت متأكد من حذف هذا الدور؟')) return;

                isDeleting = true;

                $.ajax({
                    url: `/roles/${roleId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                        // Or remove row if we had a table structure, but this is grid cards. Reload is safer for roles.
                    },
                    error: function(xhr) {
                        isDeleting = false;
                        alert(' حدث خطأ أثناء الحذف');
                    }
                });
            }
        </script>
    @endpush
</x-layout.dashboard>
