<?php

namespace Database\Seeders;

use App\Models\MarketingResource;
use Illuminate\Database\Seeder;

class MarketingResourceSeeder extends Seeder
{
    public function run(): void
    {
        MarketingResource::create([
            'title_ar' => 'دليل التسويق عبر وسائل التواصل الاجتماعي',
            'title_en' => 'Social Media Marketing Guide',
            'slug' => 'social-media-marketing-guide',
            'description_ar' => 'دليل كامل للتسويق الفعال عبر وسائل التواصل الاجتماعي',
            'description_en' => 'Complete guide to effective social media marketing',
            'content_ar' => '<p>يغطي هذا الدليل:</p><ul><li>اختيار المنصة</li><li>استراتيجية المحتوى</li><li>تكتيكات المشاركة</li><li>قياس التحليلات</li></ul>',
            'content_en' => '<p>This guide covers:</p><ul><li>Platform selection</li><li>Content strategy</li><li>Engagement tactics</li><li>Analytics measurement</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Social+Media+Guide',
            'resource_type' => 'guide',
            'file_url' => 'https://example.com/downloads/social-media-guide.pdf',
            'is_active' => true,
            'order' => 1,
        ]);

        MarketingResource::create([
            'title_ar' => 'قالب حملة البريد الإلكتروني',
            'title_en' => 'Email Campaign Template',
            'slug' => 'email-campaign-template',
            'description_ar' => 'قالب بريد إلكتروني احترافي للحملات التسويقية',
            'description_en' => 'Professional email template for marketing campaigns',
            'content_ar' => '<p>القوالب المضمنة لـ:</p><ul><li>رسائل الترحيب</li><li>الحملات الترويجية</li><li>تصاميم النشرات الإخبارية</li><li>سلاسل المتابعة</li></ul>',
            'content_en' => '<p>Templates included for:</p><ul><li>Welcome emails</li><li>Promotional campaigns</li><li>Newsletter designs</li><li>Follow-up sequences</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Email+Template',
            'resource_type' => 'template',
            'file_url' => 'https://example.com/downloads/email-template.html',
            'is_active' => true,
            'order' => 2,
        ]);

        MarketingResource::create([
            'title_ar' => 'دراسة حالة ناجحة',
            'title_en' => 'Success Case Study',
            'slug' => 'success-case-study',
            'description_ar' => 'أمثلة واقعية لحملات تسويقية ناجحة',
            'description_en' => 'Real-world examples of successful marketing campaigns',
            'content_ar' => '<p>تعلم من قصص نجاحنا:</p><ul><li>تحليل الحملة</li><li>النتائج المحققة</li><li>الدروس المستفادة</li><li>أفضل الممارسات</li></ul>',
            'content_en' => '<p>Learn from our success stories:</p><ul><li>Campaign analysis</li><li>Results achieved</li><li>Lessons learned</li><li>Best practices</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Case+Study',
            'resource_type' => 'case-study',
            'file_url' => 'https://example.com/downloads/case-study.pdf',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
