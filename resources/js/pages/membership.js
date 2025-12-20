/**
 * Membership Page JavaScript
 * منطق صفحة إدارة العضويات
 */

import { ModalComponent } from '../components/modal.js';
import { FormComponent } from '../components/form.js';
import { TableComponent } from '../components/table.js';

export const MembershipPage = {
    init() {
        this.setupEventListeners();
        this.setupFormHandling();
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
    }
};

// تهيئة الصفحة عند التحميل
document.addEventListener('DOMContentLoaded', () => {
    MembershipPage.init();
});
