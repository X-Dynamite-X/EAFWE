/**
 * Dashboard Page JavaScript
 * منطق صفحة لوحة التحكم
 */

import { ModalComponent } from '../components/modal.js';
import { FormComponent } from '../components/form.js';
import { TableComponent } from '../components/table.js';

export const DashboardPage = {
    init() {
        this.setupEventListeners();
        this.loadData();
    },

    setupEventListeners() {
        // مثال: إضافة مستخدم جديد
        const addUserBtn = document.getElementById('addUserBtn');
        if (addUserBtn) {
            addUserBtn.addEventListener('click', () => {
                ModalComponent.open('addUserModal');
            });
        }

        // مثال: البحث في الجدول
        TableComponent.search('userSearch', 'usersTable');
    },

    loadData() {
        // تحميل البيانات من الخادم
        console.log('Loading dashboard data...');
    },

    /**
     * تحديث بيانات المستخدمين
     */
    refreshUsers() {
        fetch('/api/users')
            .then(response => response.json())
            .then(data => {
                console.log('Users refreshed:', data);
            })
            .catch(error => console.error('Error:', error));
    }
};

// تهيئة الصفحة عند التحميل
document.addEventListener('DOMContentLoaded', () => {
    DashboardPage.init();
});
