/**
 * Form Component JavaScript
 * للتحكم في النماذج والتحقق من البيانات
 */

export const FormComponent = {
    /**
     * تقديم نموذج مع التحقق
     */
    submit(formId, onSuccess = null) {
        const form = document.getElementById(formId);

        if (form) {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                // التحقق من النموذج
                if (!form.checkValidity()) {
                    this.showValidationErrors(form);
                    return;
                }

                // إرسال البيانات
                const formData = new FormData(form);

                try {
                    const response = await fetch(form.action, {
                        method: form.method,
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                        }
                    });

                    if (response.ok && onSuccess) {
                        onSuccess(response);
                    } else {
                        this.showErrors(form, response.data?.errors);
                    }
                } catch (error) {
                    console.error('Form submission error:', error);
                }
            });
        }
    },

    /**
     * عرض أخطاء التحقق
     */
    showValidationErrors(form) {
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');

        inputs.forEach(input => {
            if (!input.value) {
                this.addErrorClass(input);
            }
        });
    },

    /**
     * عرض الأخطاء من الخادم
     */
    showErrors(form, errors) {
        Object.keys(errors || {}).forEach(fieldName => {
            const field = form.querySelector(`[name="${fieldName}"]`);
            if (field) {
                this.addErrorClass(field);
            }
        });
    },

    /**
     * إضافة فئة الخطأ
     */
    addErrorClass(element) {
        element.classList.add('border-red-500', 'bg-red-50');
    },

    /**
     * مسح الأخطاء
     */
    clearErrors(form) {
        form.querySelectorAll('.border-red-500').forEach(el => {
            el.classList.remove('border-red-500', 'bg-red-50');
        });
    }
};
