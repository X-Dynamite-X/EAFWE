{{-- Modal Component

    الخصائص:
    - id: معرّف فريد للـ modal (مطلوب)
    - title: عنوان النافذة
    - footer: محتوى التذييل

    الاستخدام:
    <x-ui.modal id="confirmDelete" title="تأكيد الحذف">
        هل أنت متأكد من حذف هذا العنصر؟
    </x-ui.modal>
--}}

@props([
    'id' => '',
    'title' => null,
])

<div id="{{ $id }}" class="fixed inset-0 z-50   bg-opacity-50 hidden flex items-center justify-center modal"
    onclick="if(event.target.id === this.id) closeModal('{{ $id }}')">

    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4" onclick="event.stopPropagation()">
        {{-- Header --}}
        @if($title)
            <div class="bg-gold-600 text-white px-6 py-4 flex justify-between items-center">
                <h2 id="modalTitle" class="text-xl font-bold">{{ $title }}</h2>
                <button onclick="closeModal('{{ $id }}')" class="text-white hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif

        {{-- Body --}}
        <div class="px-6 py-4">
            {{ $slot }}
        </div>

        {{-- Footer --}}
        @if(isset($footer))
            <div class="bg-gray-50 border-t border-gray-200 px-6 py-4 flex gap-3 justify-end">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>
