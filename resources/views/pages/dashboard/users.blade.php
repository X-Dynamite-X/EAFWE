{{-- Users Management Page --}}

<x-layout.dashboard title="إدارة المستخدمين">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">المستخدمون</h2>
        <x-ui.button href="{{ route('users.create') }}" color="gold">
            إضافة مستخدم
        </x-ui.button>
    </div>

    {{-- Search and Filter --}}
    <x-ui.card class="mb-6">
        <div class="grid md:grid-cols-2 gap-4">
            <x-ui.input name="search" id="userSearch" placeholder="ابحث عن مستخدم..." />
            <x-ui.select name="role" :options="['admin' => 'مدير', 'staff' => 'موظف', 'member' => 'عضو']" placeholder="اختر الدور" />
        </div>
    </x-ui.card>

    {{-- Users Table --}}
    <x-ui.card>
        <div class="overflow-x-auto">
            <table id="usersTable" class="w-full">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="text-right px-6 py-3 font-semibold">الاسم</th>
                        <th class="text-right px-6 py-3 font-semibold">البريد</th>
                        <th class="text-right px-6 py-3 font-semibold">الهاتف</th>
                        <th class="text-right px-6 py-3 font-semibold">الدور</th>
                        <th class="text-right px-6 py-3 font-semibold">الحالة</th>
                        <th class="text-right px-6 py-3 font-semibold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                    @forelse($users ?? [] as $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $user->name }}</td>
                            <td class="px-6 py-3">{{ $user->email }}</td>
                            <td class="px-6 py-3">{{ $user->phone ?? '-' }}</td>
                            <td class="px-6 py-3">
                                <x-ui.badge color="gold">
                                    {{ $user->roles->first()->name ?? 'بدون دور' }}
                                </x-ui.badge>
                            </td>
                            <td class="px-6 py-3">
                                @if($user->is_active)
                                    <x-ui.badge color="green">نشط</x-ui.badge>
                                @else
                                    <x-ui.badge color="red">معطل</x-ui.badge>
                                @endif
                            </td>
                            <td class="px-6 py-3">
                                <div class="flex gap-2">
                                    <x-ui.button href="{{ route('users.edit', $user) }}" color="gray" size="sm">
                                        تعديل
                                    </x-ui.button>
                                    <x-ui.button color="red" size="sm" onclick="if(confirm('هل أنت متأكد؟')) deleteUser({{ $user->id }})">
                                        حذف
                                    </x-ui.button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center px-6 py-8 text-gray-500">
                                لا توجد مستخدمون
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-ui.card>

    {{-- Pagination --}}
    @if(isset($users) && method_exists($users, 'links'))
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    @endif
</x-layout.dashboard>

@push('scripts')
<script src="{{ mix('resources/js/pages/dashboard.js') }}"></script>
<script>
    function deleteUser(userId) {
        fetch(`/users/${userId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            }
        }).then(r => r.ok ? location.reload() : alert('خطأ'));
    }
</script>
@endpush
