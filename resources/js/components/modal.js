/**
 * Modal Component JavaScript
 * للتحكم في نوافذ الـ Modal
 *
 * الاستخدام:
 * openModal('modalId');
 * closeModal('modalId');
 */

export const ModalComponent = {
    open(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    },

    close(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    },

    closeOnEscape(modalId) {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.close(modalId);
            }
        });
    },

    closeOnBackdropClick(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    this.close(modalId);
                }
            });
        }
    }
};

// Export global functions for backward compatibility
window.openModal = (modalId) => ModalComponent.open(modalId);
window.closeModal = (modalId) => ModalComponent.close(modalId);
