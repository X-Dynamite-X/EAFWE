<?php

namespace Database\Seeders;

use App\Models\PortalOpportunity;
use Illuminate\Database\Seeder;

class PortalOpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PortalOpportunity::create([
            'title' => ['en' => 'Export Business Opportunity', 'ar' => 'فرصة أعمال التصدير'],
            'slug' => 'export-business-opportunity',
            'description' => ['en' => 'Connect with international markets through our export program', 'ar' => 'تواصل مع الأسواق الدولية من خلال برنامج التصدير لدينا'],
            'content' => ['en' => '<p>Expand your business internationally:</p><ul><li>Market research support</li><li>Trade connections</li><li>Export documentation guidance</li><li>Logistics support</li></ul>', 'ar' => '<p>وسع نطاق عملك دوليًا:</p><ul><li>دعم أبحاث السوق</li><li>الاتصالات التجارية</li><li>توجيه وثائق التصدير</li><li>دعم لوجستي</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Export+Opportunity',
            'opportunity_type' => 'business',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addMonths(6)->toDateString(),
            'status' => 'active',
            'is_active' => true,
            'order' => 1,
        ]);

        PortalOpportunity::create([
            'title' => ['en' => 'B2B Partnership Program', 'ar' => 'برنامج شراكة B2B'],
            'slug' => 'b2b-partnership-program',
            'description' => ['en' => 'Strategic partnerships with established organizations', 'ar' => 'شراكات استراتيجية مع المنظمات الراسخة'],
            'content' => ['en' => '<p>Build strategic alliances:</p><ul><li>Partner matching service</li><li>Joint venture support</li><li>Co-marketing opportunities</li><li>Mutual growth plans</li></ul>', 'ar' => '<p>بناء تحالفات استراتيجية:</p><ul><li>خدمة مطابقة الشركاء</li><li>دعم المشاريع المشتركة</li><li>فرص التسويق المشترك</li><li>خطط نمو متبادلة</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=B2B+Partnership',
            'opportunity_type' => 'partnership',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addYears(1)->toDateString(),
            'status' => 'active',
            'is_active' => true,
            'order' => 2,
        ]);

        PortalOpportunity::create([
            'title' => ['en' => 'Community Volunteer Network', 'ar' => 'شبكة التطوع المجتمعي'],
            'slug' => 'community-volunteer-network',
            'description' => ['en' => 'Make a positive impact through volunteering', 'ar' => 'أحدث تأثيرًا إيجابيًا من خلال التطوع'],
            'content' => ['en' => '<p>Join our volunteer network:</p><ul><li>Community projects</li><li>Skills-based volunteering</li><li>Event support</li><li>Mentoring opportunities</li></ul>', 'ar' => '<p>انضم إلى شبكة المتطوعين لدينا:</p><ul><li>مشاريع مجتمعية</li><li>التطوع القائم على المهارات</li><li>دعم الفعاليات</li><li>فرص التوجيه</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Volunteer+Network',
            'opportunity_type' => 'business',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addMonths(12)->toDateString(),
            'status' => 'active',
            'is_active' => true,
            'order' => 3,
        ]);

        PortalOpportunity::create([
            'title' => ['en' => 'Funding Opportunities Fund', 'ar' => 'صندوق فرص التمويل'],
            'slug' => 'funding-opportunities-fund',
            'description' => ['en' => 'Access to various funding sources for business growth', 'ar' => 'الوصول إلى مصادر تمويل مختلفة لنمو الأعمال'],
            'content' => ['en' => '<p>Secure funding for growth:</p><ul><li>Grants and subsidies</li><li>Loan programs</li><li>Investor connections</li><li>Crowdfunding guidance</li></ul>', 'ar' => '<p>تأمين التمويل للنمو:</p><ul><li>المنح والإعانات</li><li>برامج القروض</li><li>اتصالات المستثمرين</li><li>توجيه التمويل الجماعي</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Funding',
            'opportunity_type' => 'funding',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addMonths(9)->toDateString(),
            'status' => 'active',
            'is_active' => true,
            'order' => 4,
        ]);
    }
}
