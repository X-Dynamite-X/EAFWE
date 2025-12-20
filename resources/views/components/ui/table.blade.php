{{-- Table Component

    الخصائص:
    - headers: رؤوس الجدول (array)
    - rows: صفوف البيانات (array of arrays)
    - actions: عمود الإجراءات (اختياري)

    الاستخدام:
    <x-ui.table
        :headers="['الاسم', 'البريد', 'الدور']"
        :rows="$users->map(fn($u) => [$u->name, $u->email, $u->role])->toArray()"
    />
--}}

@props([
    'headers' => [],
    'rows' => [],
])

<div class="overflow-x-auto">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b-2 border-gray-300">
                @foreach($headers as $header)
                    <th class="text-right px-6 py-3 text-sm font-semibold text-gray-700">
                        {{ $header }}
                    </th>
                @endforeach
                @if(isset($actions))
                    <th class="text-right px-6 py-3 text-sm font-semibold text-gray-700">الإجراءات</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($rows as $index => $row)
                <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                    @foreach($row as $cell)
                        <td class="text-right px-6 py-3 text-sm text-gray-700">
                            {{ $cell }}
                        </td>
                    @endforeach
                    @if(isset($actions))
                        <td class="text-right px-6 py-3 text-sm">
                            {{ $actions($index) ?? '' }}
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) + (isset($actions) ? 1 : 0) }}" class="text-center px-6 py-8 text-gray-500">
                        لا توجد بيانات
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
