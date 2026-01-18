<?php

namespace Database\Seeders;

use App\Models\MarketingResource;
use Illuminate\Database\Seeder;

class MarketingResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MarketingResource::create([
            'title' => ['en' => 'Social Media Marketing Guide', 'ar' => 'دليل التسويق عبر وسائل التواصل الاجتماعي'],
            'slug' => 'social-media-marketing-guide',
            'description' => ['en' => 'Complete guide to effective social media marketing', 'ar' => 'دليل كامل للتسويق الفعال عبر وسائل التواصل الاجتماعي'],
            'content' => ['en' => '<p>This guide covers:</p><ul><li>Platform selection</li><li>Content strategy</li><li>Engagement tactics</li><li>Analytics measurement</li></ul>', 'ar' => '<p>يغطي هذا الدليل:</p><ul><li>اختيار المنصة</li><li>استراتيجية المحتوى</li><li>تكتيكات المشاركة</li><li>قياس التحليلات</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Social+Media+Guide',
            'resource_type' => 'guide',
            'file_url' => 'https://example.com/downloads/social-media-guide.pdf',
            'is_active' => true,
            'order' => 1,
        ]);

        MarketingResource::create([
            'title' => ['en' => 'Email Campaign Template', 'ar' => 'قالب حملة البريد الإلكتروني'],
            'slug' => 'email-campaign-template',
            'description' => ['en' => 'Professional email template for marketing campaigns', 'ar' => 'قالب بريد إلكتروني احترافي للحملات التسويقية'],
            'content' => ['en' => '<p>Templates included for:</p><ul><li>Welcome emails</li><li>Promotional campaigns</li><li>Newsletter designs</li><li>Follow-up sequences</li></ul>', 'ar' => '<p>القوالب المضمنة لـ:</p><ul><li>رسائل الترحيب</li><li>الحملات الترويجية</li><li>تصاميم النشرات الإخبارية</li><li>سلاسل المتابعة</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Email+Template',
            'resource_type' => 'template',
            'file_url' => 'https://example.com/downloads/email-template.html',
            'is_active' => true,
            'order' => 2,
        ]);

        MarketingResource::create([
            'title' => ['en' => 'Success Case Study', 'ar' => 'دراسة حالة ناجحة'],
            'slug' => 'success-case-study',
            'description' => ['en' => 'Real-world examples of successful marketing campaigns', 'ar' => 'أمثلة واقعية لحملات تسويقية ناجحة'],
            'content' => ['en' => '<p>Learn from our success stories:</p><ul><li>Campaign analysis</li><li>Results achieved</li><li>Lessons learned</li><li>Best practices</li></ul>', 'ar' => '<p>تعلم من قصص نجاحنا:</p><ul><li>تحليل الحملة</li><li>النتائج المحققة</li><li>الدروس المستفادة</li><li>أفضل الممارسات</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Case+Study',
            'resource_type' => 'case-study',
            'file_url' => 'https://example.com/downloads/case-study.pdf',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
