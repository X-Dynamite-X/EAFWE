{{-- Roles Management Page --}}

<x-layout.dashboard title="إدارة الأدوار والصلاحيات">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">الأدوار والصلاحيات</h2>
        @can('create roles')
            <x-ui.button onclick="openModal('addRoleModal')" color="gold">
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

                @can('update roles')
                    <div class="flex gap-2">
                        <x-ui.button onclick="editRole({{ $role->id }})" color="gray" size="sm" class="flex-1">
                            تعديل
                        </x-ui.button>
                        <x-ui.button onclick="deleteRole({{ $role->id }})" color="red" size="sm" class="flex-1">
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

    {{-- Add Role Modal --}}
    <x-ui.modal id="addRoleModal" title="إضافة دور جديد">
        <form id="roleForm" action="{{ route('roles.store') }}" method="POST">
            @csrf

            <x-ui.input name="name" label="اسم الدور" placeholder="مثال: مدير" required />
            <x-ui.textarea name="description" label="الوصف" rows="3" />

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">الصلاحيات</label>
                <div class="space-y-2 max-h-48 overflow-y-auto">
                    @foreach($permissions ?? [] as $permission)
                        <label class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="mr-2">
                            <span class="text-gray-700">{{ $permission->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex gap-2">
                <x-ui.button type="submit" color="gold" class="flex-1">حفظ</x-ui.button>
                <x-ui.button type="button" onclick="closeModal('addRoleModal')" color="gray" class="flex-1">إلغاء</x-ui.button>
            </div>
        </form>
    </x-ui.modal>
</x-layout.dashboard>

@push('scripts')
<script>
    function editRole(roleId) {
        // Fetch role data and populate form
        console.log('Edit role:', roleId);
    }

    function deleteRole(roleId) {
        if (confirm('هل أنت متأكد من حذف هذا الدور؟')) {
            fetch(`/roles/${roleId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                }
            }).then(r => r.ok ? location.reload() : alert('خطأ'));
        }
    }
</script>
@endpush
