<?php

namespace Database\Seeders;

use App\Models\Communication;
use Illuminate\Database\Seeder;

class CommunicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Communication::create([
            'title_ar' => 'مرحباً بك في مجتمعنا',
            'title_en' => 'Welcome to Our Community',
            'slug' => 'welcome-announcement',
            'message_ar' => '<p>مرحباً بك في مجتمعنا النابض بالحياة! نحن متحمسون لانضمامك إلينا. استكشف مواردنا، وشارك في برامجنا، وتواصل مع الأعضاء الآخرين.</p>',
            'message_en' => '<p>Welcome to our vibrant community! We are excited to have you join us. Explore our resources, participate in our programs, and connect with fellow members.</p>',
            'type' => 'announcement',
            'published_date' => now()->toDateString(),
            'is_active' => true,
            'is_pinned' => true,
            'order' => 1,
        ]);

        Communication::create([
            'title_ar' => 'جلسات تدريبية قادمة',
            'title_en' => 'Upcoming Training Sessions',
            'slug' => 'upcoming-training-sessions',
            'message_ar' => '<p>انضم إلينا في جلساتنا التدريبية القادمة هذا الشهر. تعلم مهارات جديدة وتواصل مع المحترفين في المجال. سجل الآن لضمان مقعدك!</p>',
            'message_en' => '<p>Join us for our upcoming training sessions this month. Learn new skills and network with industry professionals. Register now to secure your spot!</p>',
            'type' => 'announcement',
            'published_date' => now()->toDateString(),
            'is_active' => true,
            'is_pinned' => false,
            'order' => 2,
        ]);

        Communication::create([
            'title_ar' => 'النشرة الشهرية - يناير 2026',
            'title_en' => 'Monthly Newsletter - January 2026',
            'slug' => 'newsletter-january-2026',
            'message_ar' => '<p>اقرأ نشرتنا الإخبارية الأخيرة للبقاء على اطلاع بأنشطة الأعضاء وقصص النجاح والفعاليات القادمة.</p>',
            'message_en' => '<p>Read our latest newsletter to stay updated on member activities, success stories, and upcoming events.</p>',
            'type' => 'newsletter',
            'published_date' => now()->toDateString(),
            'is_active' => true,
            'is_pinned' => false,
            'order' => 3,
        ]);

        Communication::create([
            'title_ar' => 'إطلاق برنامج الإرشاد الجديد',
            'title_en' => 'New Mentorship Program Launched',
            'slug' => 'mentorship-program-launch',
            'message_ar' => '<p>يسعدنا الإعلان عن إطلاق برنامجنا الجديد للإرشاد الفردي. تواصل مع موجهين ذوي خبرة وعزز نموك.</p>',
            'message_en' => '<p>We are thrilled to announce the launch of our new one-on-one mentorship program. Connect with experienced mentors and accelerate your growth.</p>',
            'type' => 'notification',
            'published_date' => now()->toDateString(),
            'is_active' => true,
            'is_pinned' => false,
            'order' => 4,
        ]);
    }
}
