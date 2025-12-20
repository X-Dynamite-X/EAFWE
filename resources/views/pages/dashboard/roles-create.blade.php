{{-- Create Role Page --}}

<x-layout.dashboard title="إنشاء دور جديد">
    <div class="max-w-2xl mx-auto">
        <x-ui.card title="بيانات الدور">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <x-ui.input
                    name="name"
                    label="اسم الدور"
                    placeholder="مثال: محرر"
                    value="{{ old('name') }}"
                    required
                />

                <x-ui.textarea
                    name="description"
                    label="الوصف"
                    rows="3"
                    placeholder="وصف الدور..."
                    value="{{ old('description') }}"
                />

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">الصلاحيات</label>
                    <div class="space-y-2 max-h-96 overflow-y-auto border border-gray-300 rounded-lg p-4">
                        @foreach($permissions as $permission)
                            <label class="flex items-center">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    class="w-4 h-4 rounded border-gray-300">
                                <span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex gap-4 mt-6">
                    <x-ui.button type="submit" color="gold" class="flex-1 text-center">
                        إنشاء الدور
                    </x-ui.button>
                    <x-ui.button href="{{ route('roles.index') }}" color="gray" class="flex-1 text-center">
                        إلغاء
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layout.dashboard>
