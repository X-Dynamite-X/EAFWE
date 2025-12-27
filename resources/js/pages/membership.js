/**
 * Membership Page JavaScript
 * منطق صفحة إدارة العضويات
 */

import { ModalComponent } from '../components/modal.js';
import { FormComponent } from '../components/form.js';
import { TableComponent } from '../components/table.js';

// Store current action data
let currentAction = {
    type: null,
    id: null,
    name: null
};

export const MembershipPage = {
    init() {
        this.setupEventListeners();
        this.setupFormHandling();
        this.setupActionHandlers();
    },

    setupEventListeners() {
        // البحث في جدول العضويات
        TableComponent.search('membershipSearch', 'membershipsTable');

        // إظهار نموذج إضافة عضوية
        const addBtn = document.getElementById('addMembershipBtn');
        if (addBtn) {
            addBtn.addEventListener('click', () => {
                ModalComponent.open('membershipModal');
            });
        }
    },

    setupFormHandling() {
        FormComponent.submit('membershipForm', (response) => {
            console.log('Form submitted successfully');
            this.refreshMemberships();
            ModalComponent.close('membershipModal');
        });
    },

    setupActionHandlers() {
        // Setup confirm button handler
        const confirmButton = document.getElementById('confirmButton');
        if (confirmButton) {
            confirmButton.addEventListener('click', () => {
                this.executeAction();
            });
        }

        // Setup delegated event listeners for action buttons
        const self = this; // Preserve context
        document.addEventListener('click', function (event) {
            const button = event.target.closest('[data-action]');
            if (!button) return;

            const action = button.dataset.action;
            const id = button.dataset.id;
            const name = button.dataset.name;

            console.log('Button clicked:', { action, id, name }); // Debug log

            if (action && id) {
                self.handleActionClick(action, id, name);
            }
        });
    },

    handleActionClick(action, id, name) {
        console.log(`${action}Membership called with ID:`, id);

        currentAction = {
            type: action,
            id: id,
            name: name || 'N/A'
        };

        const modalBody = document.getElementById('modalBody');
        const rejectionReasonGroup = document.getElementById('rejectionReasonGroup');
        const confirmButton = document.getElementById('confirmButton');
        const rejectionReason = document.getElementById('rejectionReason');

        // Reset state
        if (rejectionReasonGroup) rejectionReasonGroup.classList.add('hidden');
        if (rejectionReason) rejectionReason.value = '';

        if (action === 'approve') {
            if (modalBody) modalBody.textContent = `هل تريد الموافقة على طلب ${currentAction.name}؟`;
            if (confirmButton) {
                confirmButton.className = 'w-full sm:w-auto px-4 py-2 rounded-lg text-white font-semibold transition bg-green-600 hover:bg-green-700';
                confirmButton.textContent = 'موافقة';
            }
        } else if (action === 'reject') {
            if (modalBody) modalBody.textContent = `هل تريد رفض طلب ${currentAction.name}؟`;
            if (rejectionReasonGroup) rejectionReasonGroup.classList.remove('hidden');
            if (rejectionReason) rejectionReason.focus();
            if (confirmButton) {
                confirmButton.className = 'w-full sm:w-auto px-4 py-2 rounded-lg text-white font-semibold transition bg-red-600 hover:bg-red-700';
                confirmButton.textContent = 'رفض';
            }
        } else if (action === 'delete') {
            if (modalBody) modalBody.textContent = `هل أنت متأكد من حذف طلب ${currentAction.name}؟ لا يمكن التراجع عن هذا الإجراء.`;
            if (confirmButton) {
                confirmButton.className = 'w-full sm:w-auto px-4 py-2 rounded-lg text-white font-semibold transition bg-gray-600 hover:bg-gray-700';
                confirmButton.textContent = 'حذف';
            }
        }

        ModalComponent.open('actionModal');
    },

    /**
     * تحديث قائمة العضويات
     */
    refreshMemberships() {
        fetch('/api/memberships')
            .then(response => response.json())
            .then(data => {
                console.log('Memberships refreshed:', data);
                location.reload(); // إعادة تحميل الصفحة
            })
            .catch(error => console.error('Error:', error));
    },

    /**
     * تنفيذ الإجراء المطلوب
     */
    executeAction() {
        const { type, id } = currentAction;

        if (!type || !id) {
            console.error('Invalid action data');
            return;
        }

        switch (type) {
            case 'approve':
                this.performApprove(id);
                break;
            case 'reject':
                this.performReject(id);
                break;
            case 'delete':
                this.performDelete(id);
                break;
            default:
                console.error('Unknown action type:', type);
        }
    },

    /**
     * الموافقة على طلب العضوية
     */
    performApprove(membershipId) {
        $.ajax({
            url: `/memberships/${membershipId}/approve`,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (response) => {
                this.showNotification('تم الموافقة على الطلب بنجاح', 'success');
                ModalComponent.close('actionModal');
                setTimeout(() => location.reload(), 1000);
            },
            error: (xhr) => {
                const message = xhr.responseJSON?.message || 'حدث خطأ في الموافقة';
                this.showNotification(message, 'error');
            }
        });
    },

    /**
     * رفض طلب العضوية
     */
    performReject(membershipId) {
        const rejectionReason = $('#rejectionReason').val();

        if (!rejectionReason || !rejectionReason.trim()) {
            this.showNotification('يرجى إدخال سبب الرفض', 'error');
            return;
        }

        $.ajax({
            url: `/memberships/${membershipId}/reject`,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: 'application/json',
            data: JSON.stringify({
                rejection_reason: rejectionReason
            }),
            success: (response) => {
                this.showNotification('تم رفض الطلب بنجاح', 'success');
                ModalComponent.close('actionModal');
                setTimeout(() => location.reload(), 1000);
            },
            error: (xhr) => {
                const message = xhr.responseJSON?.message || 'حدث خطأ في الرفض';
                this.showNotification(message, 'error');
            }
        });
    },

    /**
     * حذف طلب العضوية
     */
    performDelete(membershipId) {
        $.ajax({
            url: `/memberships/${membershipId}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (response) => {
                this.showNotification('تم حذف الطلب بنجاح', 'success');
                ModalComponent.close('actionModal');
                setTimeout(() => location.reload(), 1000);
            },
            error: (xhr) => {
                const message = xhr.responseJSON?.message || 'حدث خطأ في الحذف';
                this.showNotification(message, 'error');
            }
        });
    },

    /**
     * عرض إشعار للمستخدم
     */
    showNotification(message, type = 'success') {
        const event = new CustomEvent('notify', {
            detail: { message, type }
        });
        window.dispatchEvent(event);
    }
};

// تهيئة الصفحة عند التحميل
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        console.log('MembershipPage: Initializing on DOMContentLoaded');
        MembershipPage.init();
    });
} else {
    // DOM already loaded, initialize immediately
    console.log('MembershipPage: DOM already loaded, initializing immediately');
    MembershipPage.init();
}
