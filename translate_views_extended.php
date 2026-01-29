<?php

/**
 * Extended Translation Replacement Script
 * Covers ALL dashboard and public pages
 */

$replacements = [
    // Common Actions & Buttons
    'إضافة' => "{{ __('common.actions.add') }}",
    'إنشاء' => "{{ __('common.actions.create') }}",
    'تعديل' => "{{ __('common.actions.edit') }}",
    'حذف' => "{{ __('common.actions.delete') }}",
    'حفظ' => "{{ __('common.actions.save') }}",
    'إلغاء' => "{{ __('common.actions.cancel') }}",
    'العودة' => "{{ __('common.actions.back') }}",
    'عرض' => "{{ __('common.actions.view') }}",
    'عرض الكل' => "{{ __('common.actions.view_all') }}",
    'تحميل' => "{{ __('common.actions.download') }}",
    'رفع' => "{{ __('common.actions.upload') }}",
    'بحث' => "{{ __('common.actions.search') }}",
    'إرسال' => "{{ __('common.actions.submit') }}",
    'تأكيد' => "{{ __('common.actions.confirm') }}",
    'إغلاق' => "{{ __('common.actions.close') }}",
    'اقرأ المزيد' => "{{ __('common.actions.read_more') }}",

    // Status
    'نشط' => "{{ __('common.status.active') }}",
    'غير نشط' => "{{ __('common.status.inactive') }}",
    'مفعل' => "{{ __('common.status.enabled') }}",
    'معطل' => "{{ __('common.status.disabled') }}",
    'منشور' => "{{ __('common.status.published') }}",
    'مسودة' => "{{ __('common.status.draft') }}",
    'قيد الانتظار' => "{{ __('common.status.pending') }}",
    'موافق عليه' => "{{ __('common.status.approved') }}",
    'مرفوض' => "{{ __('common.status.rejected') }}",

    // Messages
    'تم الإنشاء بنجاح' => "{{ __('common.messages.success.created') }}",
    'تم التحديث بنجاح' => "{{ __('common.messages.success.updated') }}",
    'تم الحذف بنجاح' => "{{ __('common.messages.success.deleted') }}",
    'تم الحفظ بنجاح' => "{{ __('common.messages.success.saved') }}",
    'حدث خطأ ما' => "{{ __('common.messages.error.general') }}",
    'هل أنت متأكد من الحذف؟' => "{{ __('common.messages.confirm.delete') }}",

    // Form Elements
    '-- اختر --' => "{{ __('common.form.select_option') }}",
    'مطلوب' => "{{ __('common.form.required') }}",
    'اختياري' => "{{ __('common.form.optional') }}",
    'اختر ملف' => "{{ __('common.form.choose_file') }}",
    'لم يتم اختيار ملف' => "{{ __('common.form.no_file_chosen') }}",

    // General
    'نعم' => "{{ __('common.general.yes') }}",
    'لا' => "{{ __('common.general.no') }}",
    'جاري التحميل...' => "{{ __('common.general.loading') }}",
    'لا توجد بيانات' => "{{ __('common.general.no_data') }}",
    'لا توجد نتائج' => "{{ __('common.general.no_results') }}",
    'خطأ' => "{{ __('common.general.error') }}",
    'نجاح' => "{{ __('common.general.success') }}",
    'التفاصيل' => "{{ __('common.general.details') }}",
    'الوصف' => "{{ __('common.general.description') }}",
    'العنوان' => "{{ __('common.general.title') }}",
    'الاسم' => "{{ __('common.general.name') }}",
    'البريد الإلكتروني' => "{{ __('common.general.email') }}",
    'الهاتف' => "{{ __('common.general.phone') }}",
    'الصورة' => "{{ __('common.general.image') }}",
    'الملف' => "{{ __('common.general.file') }}",
    'النوع' => "{{ __('common.general.type') }}",
    'الفئة' => "{{ __('common.general.category') }}",
    'الترتيب' => "{{ __('common.general.order') }}",

    // Tabs
    'العربية' => "{{ __('common.tabs.arabic') }}",

    // Time & Date
    'تم الإنشاء' => "{{ __('common.time.created_at') }}",
    'تم التحديث' => "{{ __('common.time.updated_at') }}",
    'تم النشر' => "{{ __('common.time.published_at') }}",
    'التاريخ' => "{{ __('common.time.date') }}",
    'الوقت' => "{{ __('common.time.time') }}",
    'من' => "{{ __('common.time.from') }}",
    'إلى' => "{{ __('common.time.to') }}",

    // Training Module
    'برامج التدريب' => "{{ __('modules.training.title') }}",
    'إضافة برنامج تدريبي جديد' => "{{ __('modules.training.create') }}",
    'إضافة برنامج تدريب جديد' => "{{ __('modules.training.create') }}",
    'إضافة برنامج تدريب' => "{{ __('modules.training.create') }}",
    'تعديل برنامج التدريب' => "{{ __('modules.training.edit') }}",
    'إدارة برامج التدريب' => "{{ __('modules.training.manage') }}",
    'عرض برنامج التدريب' => "{{ __('modules.training.show') }}",
    'العنوان (بالعربية)' => "{{ __('modules.training.fields.title_ar') }}",
    'العنوان (بالإنجليزية)' => "{{ __('modules.training.fields.title_en') }}",
    'الوصف (بالعربية)' => "{{ __('modules.training.fields.description_ar') }}",
    'الوصف (بالإنجليزية)' => "{{ __('modules.training.fields.description_en') }}",
    'المحتوى (بالعربية)' => "{{ __('modules.training.fields.content_ar') }}",
    'المحتوى (بالإنجليزية)' => "{{ __('modules.training.fields.content_en') }}",
    'تدريب' => "{{ __('modules.training.categories.training') }}",
    'ورشة عمل' => "{{ __('modules.training.categories.workshop') }}",
    'ندوة' => "{{ __('modules.training.categories.seminar') }}",

    // Entrepreneurship Module
    'برامج ريادة الأعمال' => "{{ __('modules.entrepreneurship.title') }}",
    'برامج الريادة والعمل الحر' => "{{ __('modules.entrepreneurship.index') }}",
    'إضافة برنامج ريادة أعمال جديد' => "{{ __('modules.entrepreneurship.create') }}",
    'تعديل برنامج ريادة الأعمال' => "{{ __('modules.entrepreneurship.edit') }}",
    'إدارة برامج ريادة الأعمال' => "{{ __('modules.entrepreneurship.manage') }}",
    'عرض برنامج ريادة الأعمال' => "{{ __('modules.entrepreneurship.show') }}",
    'عمل تجاري' => "{{ __('modules.entrepreneurship.types.business') }}",
    'شركة ناشئة' => "{{ __('modules.entrepreneurship.types.startup') }}",
    'إرشاد وتوجيه' => "{{ __('modules.entrepreneurship.types.mentorship') }}",

    // Participation Module
    'فرص المشاركة' => "{{ __('modules.participation.title') }}",
    'فرص المشاركة والتطوع' => "{{ __('modules.participation.index') }}",
    'إضافة فرصة مشاركة جديدة' => "{{ __('modules.participation.create') }}",
    'تعديل فرصة المشاركة' => "{{ __('modules.participation.edit') }}",
    'إدارة فرص المشاركة' => "{{ __('modules.participation.manage') }}",
    'عرض فرصة المشاركة' => "{{ __('modules.participation.show') }}",
    'تطوع' => "{{ __('modules.participation.types.volunteer') }}",
    'شراكة' => "{{ __('modules.participation.types.partner') }}",
    'رعاية' => "{{ __('modules.participation.types.sponsor') }}",

    // Marketing Module
    'الموارد التسويقية' => "{{ __('modules.marketing.title') }}",
    'موارد التسويق والتدريب' => "{{ __('modules.marketing.index') }}",
    'إضافة مورد تسويقي جديد' => "{{ __('modules.marketing.create') }}",
    'تعديل المورد التسويقي' => "{{ __('modules.marketing.edit') }}",
    'إدارة الموارد التسويقية' => "{{ __('modules.marketing.manage') }}",
    'عرض المورد التسويقي' => "{{ __('modules.marketing.show') }}",
    'دليل' => "{{ __('modules.marketing.resource_types.guide') }}",
    'نموذج' => "{{ __('modules.marketing.resource_types.template') }}",
    'دراسة حالة' => "{{ __('modules.marketing.resource_types.case-study') }}",

    // Files Module
    'ملفات الأعضاء' => "{{ __('modules.files.title') }}",
    'إضافة ملف جديد' => "{{ __('modules.files.create') }}",
    'تعديل الملف' => "{{ __('modules.files.edit') }}",
    'إدارة الملفات' => "{{ __('modules.files.manage') }}",
    'عرض الملف' => "{{ __('modules.files.show') }}",
    'وثيقة' => "{{ __('modules.files.file_types.document') }}",
    'PDF' => "{{ __('modules.files.file_types.pdf') }}",

    // Communication Module
    'الاتصالات والإعلانات' => "{{ __('modules.communication.title') }}",
    'إضافة اتصال جديد' => "{{ __('modules.communication.create') }}",
    'تعديل الاتصال' => "{{ __('modules.communication.edit') }}",
    'إدارة الاتصالات' => "{{ __('modules.communication.manage') }}",
    'عرض الاتصال' => "{{ __('modules.communication.show') }}",
    'نص الإعلان (بالعربية)' => "{{ __('modules.communication.fields.message_ar') }}",
    'نص الإعلان (بالإنجليزية)' => "{{ __('modules.communication.fields.message_en') }}",
    'إعلان' => "{{ __('modules.communication.types.announcement') }}",
    'نشرة' => "{{ __('modules.communication.types.newsletter') }}",
    'إشعار' => "{{ __('modules.communication.types.notification') }}",

    // Portal Module
    'فرص البوابة' => "{{ __('modules.portal.title') }}",
    'فرص البوابة والتمويل' => "{{ __('modules.portal.index') }}",
    'إضافة فرصة جديدة' => "{{ __('modules.portal.create') }}",
    'تعديل الفرصة' => "{{ __('modules.portal.edit') }}",
    'إدارة الفرص' => "{{ __('modules.portal.manage') }}",
    'عرض الفرصة' => "{{ __('modules.portal.show') }}",
    'تمويل' => "{{ __('modules.portal.opportunity_types.funding') }}",
    'مغلق' => "{{ __('modules.portal.statuses.closed') }}",
    'قريباً' => "{{ __('modules.portal.statuses.upcoming') }}",
];

// All dashboard directories
$directories = [
    'resources/views/pages/dashboard/training',
    'resources/views/pages/dashboard/entrepreneurship',
    'resources/views/pages/dashboard/participation',
    'resources/views/pages/dashboard/marketing',
    'resources/views/pages/dashboard/files',
    'resources/views/pages/dashboard/communication',
    'resources/views/pages/dashboard/portal-opportunities',
    'resources/views/pages/dashboard',
    'resources/views/pages/public',
];

$filesProcessed = 0;
$replacementsMade = 0;

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        continue;
    }

    // Get all blade files including subdirectories
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir)
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php' &&
            strpos($file->getFilename(), '.blade.php') !== false) {

            $filepath = $file->getPathname();
            $content = file_get_contents($filepath);
            $originalContent = $content;

            // Apply replacements
            foreach ($replacements as $search => $replace) {
                $count = 0;
                $content = str_replace($search, $replace, $content, $count);
                if ($count > 0) {
                    $replacementsMade += $count;
                }
            }

            // Only write if changes were made
            if ($content !== $originalContent) {
                file_put_contents($filepath, $content);
                $filesProcessed++;
                echo "✓ Updated: $filepath\n";
            }
        }
    }
}

echo "\n";
echo "========================================\n";
echo "Extended Translation Replacement Complete!\n";
echo "========================================\n";
echo "Files processed: $filesProcessed\n";
echo "Replacements made: $replacementsMade\n";
echo "\n";
