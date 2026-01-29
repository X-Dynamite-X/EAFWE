<?php

/**
 * Translation Replacement Script
 *
 * This script automatically replaces hardcoded Arabic/English text
 * with translation keys in all blade files.
 *
 * Usage: php translate_views.php
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
    'تحميل' => "{{ __('common.actions.download') }}",
    'رفع' => "{{ __('common.actions.upload') }}",

    // Status
    'نشط' => "{{ __('common.status.active') }}",
    'غير نشط' => "{{ __('common.status.inactive') }}",
    'منشور' => "{{ __('common.status.published') }}",

    // Form Elements
    '-- اختر --' => "{{ __('common.form.select_option') }}",
    'مطلوب' => "{{ __('common.form.required') }}",
    'اختياري' => "{{ __('common.form.optional') }}",

    // Tabs
    'العربية' => "{{ __('common.tabs.arabic') }}",

    // Training Module
    'برامج التدريب' => "{{ __('modules.training.title') }}",
    'إضافة برنامج تدريبي جديد' => "{{ __('modules.training.create') }}",
    'إضافة برنامج تدريب جديد' => "{{ __('modules.training.create') }}",
    'تعديل برنامج التدريب' => "{{ __('modules.training.edit') }}",
    'إدارة برامج التدريب' => "{{ __('modules.training.manage') }}",
    'عرض برنامج التدريب' => "{{ __('modules.training.show') }}",
    'العنوان (بالعربية)' => "{{ __('modules.training.fields.title_ar') }}",
    'العنوان (بالإنجليزية)' => "{{ __('modules.training.fields.title_en') }}",
    'الوصف (بالعربية)' => "{{ __('modules.training.fields.description_ar') }}",
    'الوصف (بالإنجليزية)' => "{{ __('modules.training.fields.description_en') }}",
    'المحتوى (بالعربية)' => "{{ __('modules.training.fields.content_ar') }}",
    'المحتوى (بالإنجليزية)' => "{{ __('modules.training.fields.content_en') }}",

    // Entrepreneurship Module
    'برامج ريادة الأعمال' => "{{ __('modules.entrepreneurship.title') }}",
    'برامج الريادة والعمل الحر' => "{{ __('modules.entrepreneurship.index') }}",

    // Participation Module
    'فرص المشاركة' => "{{ __('modules.participation.title') }}",
    'فرص المشاركة والتطوع' => "{{ __('modules.participation.index') }}",

    // Marketing Module
    'الموارد التسويقية' => "{{ __('modules.marketing.title') }}",
    'موارد التسويق والتدريب' => "{{ __('modules.marketing.index') }}",

    // Files Module
    'ملفات الأعضاء' => "{{ __('modules.files.title') }}",

    // Communication Module
    'الاتصالات والإعلانات' => "{{ __('modules.communication.title') }}",

    // Portal Module
    'فرص البوابة' => "{{ __('modules.portal.title') }}",
    'فرص البوابة والتمويل' => "{{ __('modules.portal.index') }}",
];

// Directories to process
$directories = [
    'resources/views/pages/dashboard/training',
    'resources/views/pages/dashboard/entrepreneurship',
    'resources/views/pages/dashboard/participation',
    'resources/views/pages/dashboard/marketing',
    'resources/views/pages/dashboard/files',
    'resources/views/pages/dashboard/communication',
    'resources/views/pages/dashboard/portal-opportunities',
];

$filesProcessed = 0;
$replacementsMade = 0;

foreach ($directories as $dir) {
    if (! is_dir($dir)) {
        echo "Directory not found: $dir\n";

        continue;
    }

    $files = glob($dir.'/*.blade.php');

    foreach ($files as $file) {
        $content = file_get_contents($file);
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
            file_put_contents($file, $content);
            $filesProcessed++;
            echo "✓ Updated: $file\n";
        }
    }
}

echo "\n";
echo "========================================\n";
echo "Translation Replacement Complete!\n";
echo "========================================\n";
echo "Files processed: $filesProcessed\n";
echo "Replacements made: $replacementsMade\n";
echo "\n";
echo "Next steps:\n";
echo "1. Review the changes with: git diff\n";
echo "2. Test the application to ensure translations work\n";
echo "3. Add more replacements to this script as needed\n";
