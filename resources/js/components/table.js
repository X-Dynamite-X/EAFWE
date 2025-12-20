/**
 * Table Component JavaScript
 * للتحكم في الجداول والفرز والتصفية
 */

export const TableComponent = {
    /**
     * تنفيذ البحث في الجدول
     */
    search(searchInputId, tableId) {
        const searchInput = document.getElementById(searchInputId);
        const table = document.getElementById(tableId);

        if (searchInput && table) {
            searchInput.addEventListener('keyup', (e) => {
                const searchText = e.target.value.toLowerCase();
                const rows = table.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchText) ? '' : 'none';
                });
            });
        }
    },

    /**
     * فرز الجدول حسب العمود
     */
    sort(tableId, columnIndex, isAscending = true) {
        const table = document.getElementById(tableId);

        if (table) {
            const rows = Array.from(table.querySelectorAll('tbody tr'));

            rows.sort((a, b) => {
                const aValue = a.cells[columnIndex].textContent;
                const bValue = b.cells[columnIndex].textContent;

                return isAscending
                    ? aValue.localeCompare(bValue)
                    : bValue.localeCompare(aValue);
            });

            const tbody = table.querySelector('tbody');
            rows.forEach(row => tbody.appendChild(row));
        }
    },

    /**
     * إظهار رسالة تأكيد قبل الحذف
     */
    confirmDelete(event, message = 'هل أنت متأكد من الحذف؟') {
        if (!confirm(message)) {
            event.preventDefault();
            return false;
        }
    }
};
