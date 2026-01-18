<?php

namespace Database\Seeders;

use App\Models\EntrepreneurshipProgram;
use Illuminate\Database\Seeder;

class EntrepreneurshipProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EntrepreneurshipProgram::create([
            'title' => ['en' => 'Startup Incubation Program', 'ar' => 'برنامج احتضان الشركات الناشئة'],
            'slug' => 'startup-incubation-program',
            'description' => ['en' => 'Support for new entrepreneurs launching their startups', 'ar' => 'دعم رواد الأعمال الجدد لإطلاق شركاتهم الناشئة'],
            'content' => ['en' => '<p>Our incubation program provides:</p><ul><li>Mentorship from experienced entrepreneurs</li><li>Access to funding opportunities</li><li>Networking events</li><li>Business development resources</li></ul>', 'ar' => '<p>يوفر برنامج حاضنة الأعمال لدينا:</p><ul><li>إرشاد من رواد أعمال ذوي خبرة</li><li>الوصول إلى فرص التمويل</li><li>فعاليات التشبيك</li><li>موارد تطوير الأعمال</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Startup+Incubation',
            'type' => 'startup',
            'is_active' => true,
            'order' => 1,
        ]);

        EntrepreneurshipProgram::create([
            'title' => ['en' => 'Business Mentorship', 'ar' => 'الإرشاد والتوجيه التجاري'],
            'slug' => 'business-mentorship',
            'description' => ['en' => 'One-on-one mentorship with industry experts', 'ar' => 'إرشاد فردي مع خبراء الصناعة'],
            'content' => ['en' => '<p>Get personalized guidance from our mentors:</p><ul><li>Business strategy development</li><li>Market research assistance</li><li>Financial planning</li><li>Growth acceleration</li></ul>', 'ar' => '<p>احصل على توجيه شخصي من موجهينا:</p><ul><li>تطوير استراتيجية الأعمال</li><li>المساعدة في أبحاث السوق</li><li>التخطيط المالي</li><li>تسريع النمو</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Mentorship',
            'type' => 'mentorship',
            'is_active' => true,
            'order' => 2,
        ]);

        EntrepreneurshipProgram::create([
            'title' => ['en' => 'Business Expansion Program', 'ar' => 'برنامج توسيع الأعمال'],
            'slug' => 'business-expansion-program',
            'description' => ['en' => 'Scale your existing business to new markets', 'ar' => 'توسيع نطاق عملك الحالي إلى أسواق جديدة'],
            'content' => ['en' => '<p>Expand your business successfully:</p><ul><li>Market expansion strategies</li><li>International business guidance</li><li>Funding solutions</li><li>Operations optimization</li></ul>', 'ar' => '<p>وسع نطاق عملك بنجاح:</p><ul><li>استراتيجيات توسيع السوق</li><li>توجيه الأعمال الدولية</li><li>حلول التمويل</li><li>تحسين العمليات</li></ul>'],
            'image_url' => 'https://via.placeholder.com/400x300?text=Business+Expansion',
            'type' => 'business',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
