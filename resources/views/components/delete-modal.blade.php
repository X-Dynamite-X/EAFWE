<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full mx-4">
        <div class="p-6">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>

            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">تأكيد الحذف</h3>
            <p class="text-gray-600 text-center mb-4">
                هل أنت متأكد من حذف <strong id="deleteItemName"></strong>؟ هذا الإجراء لا يمكن التراجع عنه.
            </p>
        </div>

        <div class="flex gap-3 px-6 py-4 bg-gray-50 border-t border-gray-200">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-gray-900 font-medium hover:bg-gray-50">
                إلغاء
            </button>
            <form id="deleteForm" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700">
                    حذف
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(id, name, deleteRoute) {
        document.getElementById('deleteItemName').textContent = name;
        document.getElementById('deleteForm').action = deleteRoute;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Close modal when pressing Escape
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeDeleteModal();
        }
    });

    // Close modal when clicking outside
    document.getElementById('deleteModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeDeleteModal();
        }
    });
</script>
