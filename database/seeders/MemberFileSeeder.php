<?php

namespace Database\Seeders;

use App\Models\MemberFile;
use Illuminate\Database\Seeder;

class MemberFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemberFile::create([
            'title_ar' => 'دليل الأعضاء',
            'title_en' => 'Member Handbook',
            'slug' => 'member-handbook',
            'description_ar' => 'دليل شامل للأعضاء يتضمن السياسات والإجراءات',
            'description_en' => 'Complete guide for members with policies and procedures',
            'file_type' => 'pdf',
            'file_url' => 'https://example.com/files/member-handbook.pdf',
            'file_size' => '2.5MB',
            'category' => 'Handbook',
            'is_active' => true,
            'order' => 1,
        ]);

        MemberFile::create([
            'title_ar' => 'دليل الإدارة المالية',
            'title_en' => 'Financial Management Guide',
            'slug' => 'financial-management-guide',
            'description_ar' => 'نموذج وإرشادات للإدارة المالية',
            'description_en' => 'Template and guidance for financial management',
            'file_type' => 'document',
            'file_url' => 'https://example.com/files/financial-guide.docx',
            'file_size' => '1.2MB',
            'category' => 'Guide',
            'is_active' => true,
            'order' => 2,
        ]);

        MemberFile::create([
            'title_ar' => 'نموذج التخطيط للأعمال',
            'title_en' => 'Business Planning Template',
            'slug' => 'business-planning-template',
            'description_ar' => 'نموذج جاهز للاستخدام للتخطيط للأعمال',
            'description_en' => 'Ready-to-use template for business planning',
            'file_type' => 'template',
            'file_url' => 'https://example.com/files/business-plan-template.xlsx',
            'file_size' => '0.8MB',
            'category' => 'Template',
            'is_active' => true,
            'order' => 3,
        ]);

        MemberFile::create([
            'title_ar' => 'قائمة التحقق التسويقية',
            'title_en' => 'Marketing Checklist',
            'slug' => 'marketing-checklist',
            'description_ar' => 'قائمة تحقق تسويقية شاملة للأعمال',
            'description_en' => 'Comprehensive marketing checklist for businesses',
            'file_type' => 'document',
            'file_url' => 'https://example.com/files/marketing-checklist.pdf',
            'file_size' => '0.5MB',
            'category' => 'Checklist',
            'is_active' => true,
            'order' => 4,
        ]);
    }
}
