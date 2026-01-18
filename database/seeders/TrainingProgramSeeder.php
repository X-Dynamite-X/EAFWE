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
            'title' => ['en' => 'Business Management Training', 'ar' => 'تدريب إدارة الأعمال'],
            'slug' => 'business-management-training',
            'description' => ['en' => 'Comprehensive training program for business management', 'ar' => 'برنامج تدريبي شامل لإدارة الأعمال'],
            'content' => ['en' => '<p>Learn the fundamentals of business management including:</p><ul><li>Strategic Planning</li><li>Financial Management</li><li>Team Leadership</li><li>Project Management</li></ul>', 'ar' => '<p>تعلم أساسيات إدارة الأعمال بما في ذلك:</p><ul><li>التخطيط الاستراتيجي</li><li>الإدارة المالية</li><li>قيادة الفريق</li><li>إدارة المشاريع</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Business+Management',
            'category' => 'training',
            'is_active' => true,
            'order' => 1,
        ]);

        TrainingProgram::create([
            'title' => ['en' => 'Digital Marketing Workshop', 'ar' => 'ورشة عمل التسويق الرقمي'],
            'slug' => 'digital-marketing-workshop',
            'description' => ['en' => 'Learn modern digital marketing strategies', 'ar' => 'تعلم استراتيجيات التسويق الرقمي الحديثة'],
            'content' => ['en' => '<p>Master digital marketing in this comprehensive workshop:</p><ul><li>Social Media Marketing</li><li>SEO Optimization</li><li>Content Marketing</li><li>Email Campaigns</li></ul>', 'ar' => '<p>احترف التسويق الرقمي في هذه الورشة الشاملة:</p><ul><li>التسويق عبر وسائل التواصل الاجتماعي</li><li>تحسين محركات البحث SEO</li><li>تسو يق المحتوى</li><li>حملات البريد الإلكتروني</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Digital+Marketing',
            'category' => 'workshop',
            'is_active' => true,
            'order' => 2,
        ]);

        TrainingProgram::create([
            'title' => ['en' => 'Leadership Seminar', 'ar' => 'ندوة القيادة'],
            'slug' => 'leadership-seminar',
            'description' => ['en' => 'Develop your leadership skills', 'ar' => 'طور مهاراتك القيادية'],
            'content' => ['en' => '<p>Enhance your leadership capabilities:</p><ul><li>Effective Communication</li><li>Decision Making</li><li>Conflict Resolution</li><li>Team Building</li></ul>', 'ar' => '<p>عزز قدراتك القيادية:</p><ul><li>التواصل الفعال</li><li>اتخاذ القرار</li><li>حل النزاعات</li><li>بناء الفريق</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Leadership',
            'category' => 'seminar',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
