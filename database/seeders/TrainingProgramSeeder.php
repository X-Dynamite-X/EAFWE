<?php

namespace Database\Seeders;

use App\Models\TrainingProgram;
use Illuminate\Database\Seeder;

class TrainingProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrainingProgram::create([
            'title_ar' => 'تدريب إدارة الأعمال',
            'title_en' => 'Business Management Training',
            'slug' => 'business-management-training',
            'description_ar' => 'برنامج تدريبي شامل لإدارة الأعمال',
            'description_en' => 'Comprehensive training program for business management',
            'content_ar' => '<p>تعلم أساسيات إدارة الأعمال بما في ذلك:</p><ul><li>التخطيط الاستراتيجي</li><li>الإدارة المالية</li><li>قيادة الفريق</li><li>إدارة المشاريع</li></ul>',
            'content_en' => '<p>Learn the fundamentals of business management including:</p><ul><li>Strategic Planning</li><li>Financial Management</li><li>Team Leadership</li><li>Project Management</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Business+Management',
            'category' => 'training',
            'is_active' => true,
            'order' => 1,
        ]);

        TrainingProgram::create([
            'title_ar' => 'ورشة عمل التسويق الرقمي',
            'title_en' => 'Digital Marketing Workshop',
            'slug' => 'digital-marketing-workshop',
            'description_ar' => 'تعلم استراتيجيات التسويق الرقمي الحديثة',
            'description_en' => 'Learn modern digital marketing strategies',
            'content_ar' => '<p>احترف التسويق الرقمي في هذه الورشة الشاملة:</p><ul><li>التسويق عبر وسائل التواصل الاجتماعي</li><li>تحسين محركات البحث SEO</li><li>تسويق المحتوى</li><li>حملات البريد الإلكتروني</li></ul>',
            'content_en' => '<p>Master digital marketing in this comprehensive workshop:</p><ul><li>Social Media Marketing</li><li>SEO Optimization</li><li>Content Marketing</li><li>Email Campaigns</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Digital+Marketing',
            'category' => 'workshop',
            'is_active' => true,
            'order' => 2,
        ]);

        TrainingProgram::create([
            'title_ar' => 'ندوة القيادة',
            'title_en' => 'Leadership Seminar',
            'slug' => 'leadership-seminar',
            'description_ar' => 'طور مهاراتك القيادية',
            'description_en' => 'Develop your leadership skills',
            'content_ar' => '<p>عزز قدراتك القيادية:</p><ul><li>التواصل الفعال</li><li>اتخاذ القرار</li><li>حل النزاعات</li><li>بناء الفريق</li></ul>',
            'content_en' => '<p>Enhance your leadership capabilities:</p><ul><li>Effective Communication</li><li>Decision Making</li><li>Conflict Resolution</li><li>Team Building</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Leadership',
            'category' => 'seminar',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
