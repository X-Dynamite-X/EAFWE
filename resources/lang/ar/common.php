<?php

return [
    // Actions & Buttons
    'actions' => [
        'create' => 'إنشاء',
        'add' => 'إضافة',
        'edit' => 'تعديل',
        'update' => 'تحديث',
        'delete' => 'حذف',
        'save' => 'حفظ',
        'cancel' => 'إلغاء',
        'back' => 'العودة',
        'view' => 'عرض',
        'manage' => 'إدارة',
        'download' => 'تحميل',
        'upload' => 'رفع',
        'search' => 'بحث',
        'filter' => 'تصفية',
        'export' => 'تصدير',
        'import' => 'استيراد',
        'submit' => 'إرسال',
        'confirm' => 'تأكيد',
        'close' => 'إغلاق',
        'next' => 'التالي',
        'previous' => 'السابق',
        'view_all' => 'عرض الكل',
        'view_details' => 'عرض التفاصيل',
        'read_more' => 'اقرأ المزيد',
        'apply' => 'تقديم الطلب',
    ],

    // Status
    'status' => [
        'active' => 'نشط',
        'inactive' => 'غير نشط',
        'enabled' => 'مفعل',
        'disabled' => 'معطل',
        'published' => 'منشور',
        'draft' => 'مسودة',
        'pending' => 'قيد الانتظار',
        'approved' => 'موافق عليه',
        'rejected' => 'مرفوض',
        'completed' => 'مكتمل',
        'in_progress' => 'قيد التنفيذ',
        'cancelled' => 'ملغي',
    ],

    // Messages
    'messages' => [
        'success' => [
            'created' => 'تم الإنشاء بنجاح',
            'updated' => 'تم التحديث بنجاح',
            'deleted' => 'تم الحذف بنجاح',
            'saved' => 'تم الحفظ بنجاح',
        ],
        'error' => [
            'general' => 'حدث خطأ ما',
            'not_found' => 'العنصر غير موجود',
            'unauthorized' => 'غير مصرح لك بهذا الإجراء',
            'validation' => 'خطأ في البيانات المدخلة',
        ],
        'confirm' => [
            'delete' => 'هل أنت متأكد من الحذف؟',
            'action' => 'هل أنت متأكد من هذا الإجراء؟',
        ],
    ],

    // Form Labels
    'form' => [
        'required' => 'مطلوب',
        'optional' => 'اختياري',
        'select' => 'اختر',
        'select_option' => '-- اختر --',
        'choose_file' => 'اختر ملف',
        'drag_drop' => 'اسحب وأفلت الملف هنا',
        'or' => 'أو',
        'browse' => 'تصفح',
        'no_file_chosen' => 'لم يتم اختيار ملف',
        'placeholder' => [
            'search' => 'ابحث...',
            'enter' => 'أدخل',
            'select' => 'اختر',
        ],
        'fill' => 'املأ',
    ],

    // Pagination
    'pagination' => [
        'previous' => 'السابق',
        'next' => 'التالي',
        'showing' => 'عرض',
        'to' => 'إلى',
        'of' => 'من',
        'results' => 'نتيجة',
    ],

    // Time & Date
    'time' => [
        'created_at' => 'تم الإنشاء',
        'updated_at' => 'تم التحديث',
        'published_at' => 'تم النشر',
        'deleted_at' => 'تم الحذف',
        'date' => 'التاريخ',
        'time' => 'الوقت',
        'from' => 'من',
        'to' => 'إلى',
        'available' => 'متاح',
    ],

    // General
    'general' => [
        'yes' => 'نعم',
        'no' => 'لا',
        'all' => 'الكل',
        'none' => 'لا شيء',
        'no_date' => 'بدون تاريخ',
        'other' => 'أخرى',
        'loading' => 'جاري التحميل...',
        'no_data' => 'لا توجد بيانات',
        'no_results' => 'لا توجد نتائج',
        'error' => 'خطأ',
        'success' => 'نجاح',
        'warning' => 'تحذير',
        'info' => 'معلومة',
        'details' => 'التفاصيل',
        'description' => 'الوصف',
        'title' => 'العنوان',
        'name' => 'الاسم',
        'email' => 'البريد الإلكتروني',
        'phone' => 'الهاتف',
        'address' => 'العنوان',
        'image' => 'الصورة',
        'current_image' => 'الصورة الحالية',
        'selected_image' => 'الصورة المختارة',
        'file' => 'الملف',
        'current_file' => 'الملف الحالي',
        'selected_file' => 'الملف المختار',
        'size' => 'الحجم',
        'type' => 'النوع',
        'category' => 'الفئة',
        'order' => 'الترتيب',
        'not_specified' => 'غير محدد',
        'in_data' => 'في البيانات المدخلة',
        'in_arabic' => '(بالعربية)',
        'in_english' => '(بالإنجليزية)',
    ],

    // Tabs
    'tabs' => [
        'arabic' => 'العربية',
        'english' => 'English',
    ],

    // Validation Hints
    'hints' => [
        'slug' => 'يُستخدم في الرابط',
        'order' => 'الأرقام الأقل تظهر أولاً',
        'image_formats' => 'الصيغ المدعومة: JPG, PNG, GIF, WEBP',
        'max_file_size' => 'الحد الأقصى لحجم الملف',
        'html_allowed' => 'يمكنك استخدام HTML للتنسيق',
    ],

    // Units
    'units' => [
        'mb' => 'ميجابايت',
        'kb' => 'كيلوبايت',
        'bytes' => 'بايت',
    ],
];
