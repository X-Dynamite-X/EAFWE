<?php

namespace Database\Seeders;

use App\Models\ParticipationOpportunity;
use Illuminate\Database\Seeder;

class ParticipationOpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParticipationOpportunity::create([
            'title' => ['en' => 'Community Volunteer Program', 'ar' => 'برنامج التطوع المجتمعي'],
            'slug' => 'community-volunteer-program',
            'description' => ['en' => 'Join us in making a difference in our community', 'ar' => 'انضم إلينا لإحداث فرق في مجتمعنا'],
            'content' => ['en' => '<p>Volunteer opportunities include:</p><ul><li>Community outreach</li><li>Youth mentoring</li><li>Event organization</li><li>Training delivery</li></ul>', 'ar' => '<p>تشمل فرص التطوع:</p><ul><li>التوعية المجتمعية</li><li>توجيه الشباب</li><li>تنظيم الفعاليات</li><li>تقديم التدريب</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Volunteering',
            'type' => 'volunteer',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addMonths(6)->toDateString(),
            'is_active' => true,
            'order' => 1,
        ]);

        ParticipationOpportunity::create([
            'title' => ['en' => 'Strategic Partnership', 'ar' => 'شراكة استراتيجية'],
            'slug' => 'strategic-partnership',
            'description' => ['en' => 'Partner with us for mutual growth', 'ar' => 'شاركنا من أجل النمو المتبادل'],
            'content' => ['en' => '<p>Partnership benefits:</p><ul><li>Resource sharing</li><li>Joint ventures</li><li>Market expansion</li><li>Innovation collaboration</li></ul>', 'ar' => '<p>فوائد الشراكة:</p><ul><li>مشاركة الموارد</li><li>المشاريع المشتركة</li><li>توسيع السوق</li><li>التعاون في الابتكار</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Partnership',
            'type' => 'partner',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addYears(1)->toDateString(),
            'is_active' => true,
            'order' => 2,
        ]);

        ParticipationOpportunity::create([
            'title' => ['en' => 'Sponsorship Opportunity', 'ar' => 'فرصة رعاية'],
            'slug' => 'sponsorship-opportunity',
            'description' => ['en' => 'Support our mission through sponsorship', 'ar' => 'ادعم مهمتنا من خلال الرعاية'],
            'content' => ['en' => '<p>Sponsorship packages include:</p><ul><li>Brand visibility</li><li>Event participation</li><li>Community recognition</li><li>Tax benefits</li></ul>', 'ar' => '<p>تشمل باقات الرعاية:</p><ul><li>ظهور العلامة التجارية</li><li>المشاركة في الفعاليات</li><li>الاعتراف المجتمعي</li><li>المزايا الضريبية</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Sponsorship',
            'type' => 'sponsor',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addMonths(12)->toDateString(),
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
