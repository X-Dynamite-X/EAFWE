<?php

namespace Database\Seeders;

use App\Models\EntrepreneurshipProgram;
use Illuminate\Database\Seeder;

class EntrepreneurshipProgramSeeder extends Seeder
{
    public function run(): void
    {
        EntrepreneurshipProgram::create([
            'title_ar' => 'برنامج احتضان الشركات الناشئة',
            'title_en' => 'Startup Incubation Program',
            'slug' => 'startup-incubation-program',
            'description_ar' => 'دعم رواد الأعمال الجدد لإطلاق شركاتهم الناشئة',
            'description_en' => 'Support for new entrepreneurs launching their startups',
            'content_ar' => '<p>يوفر برنامج حاضنة الأعمال لدينا:</p><ul><li>إرشاد من رواد أعمال ذوي خبرة</li><li>الوصول إلى فرص التمويل</li><li>فعاليات التشبيك</li><li>موارد تطوير الأعمال</li></ul>',
            'content_en' => '<p>Our incubation program provides:</p><ul><li>Mentorship from experienced entrepreneurs</li><li>Access to funding opportunities</li><li>Networking events</li><li>Business development resources</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Startup+Incubation',
            'type' => 'startup',
            'is_active' => true,
            'order' => 1,
        ]);

        EntrepreneurshipProgram::create([
            'title_ar' => 'الإرشاد والتوجيه التجاري',
            'title_en' => 'Business Mentorship',
            'slug' => 'business-mentorship',
            'description_ar' => 'إرشاد فردي مع خبراء الصناعة',
            'description_en' => 'One-on-one mentorship with industry experts',
            'content_ar' => '<p>احصل على توجيه شخصي من موجهينا:</p><ul><li>تطوير استراتيجية الأعمال</li><li>المساعدة في أبحاث السوق</li><li>التخطيط المالي</li><li>تسريع النمو</li></ul>',
            'content_en' => '<p>Get personalized guidance from our mentors:</p><ul><li>Business strategy development</li><li>Market research assistance</li><li>Financial planning</li><li>Growth acceleration</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Mentorship',
            'type' => 'mentorship',
            'is_active' => true,
            'order' => 2,
        ]);

        EntrepreneurshipProgram::create([
            'title_ar' => 'برنامج توسيع الأعمال',
            'title_en' => 'Business Expansion Program',
            'slug' => 'business-expansion-program',
            'description_ar' => 'توسيع نطاق عملك الحالي إلى أسواق جديدة',
            'description_en' => 'Scale your existing business to new markets',
            'content_ar' => '<p>وسع نطاق عملك بنجاح:</p><ul><li>استراتيجيات توسيع السوق</li><li>توجيه الأعمال الدولية</li><li>حلول التمويل</li><li>تحسين العمليات</li></ul>',
            'content_en' => '<p>Expand your business successfully:</p><ul><li>Market expansion strategies</li><li>International business guidance</li><li>Funding solutions</li><li>Operations optimization</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Business+Expansion',
            'type' => 'business',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
