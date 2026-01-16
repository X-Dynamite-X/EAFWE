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
            'title' => 'Welcome to Our Community',
            'slug' => 'welcome-announcement',
            'message' => '<p>Welcome to our vibrant community! We are excited to have you join us. Explore our resources, participate in our programs, and connect with fellow members.</p>',
            'type' => 'announcement',
            'published_date' => now()->toDateString(),
            'is_active' => true,
            'is_pinned' => true,
            'order' => 1,
        ]);

        Communication::create([
            'title' => 'Upcoming Training Sessions',
            'slug' => 'upcoming-training-sessions',
            'message' => '<p>Join us for our upcoming training sessions this month. Learn new skills and network with industry professionals. Register now to secure your spot!</p>',
            'type' => 'announcement',
            'published_date' => now()->toDateString(),
            'is_active' => true,
            'is_pinned' => false,
            'order' => 2,
        ]);

        Communication::create([
            'title' => 'Monthly Newsletter - January 2026',
            'slug' => 'newsletter-january-2026',
            'message' => '<p>Read our latest newsletter to stay updated on member activities, success stories, and upcoming events.</p>',
            'type' => 'newsletter',
            'published_date' => now()->toDateString(),
            'is_active' => true,
            'is_pinned' => false,
            'order' => 3,
        ]);

        Communication::create([
            'title' => 'New Mentorship Program Launched',
            'slug' => 'mentorship-program-launch',
            'message' => '<p>We are thrilled to announce the launch of our new one-on-one mentorship program. Connect with experienced mentors and accelerate your growth.</p>',
            'type' => 'notification',
            'published_date' => now()->toDateString(),
            'is_active' => true,
            'is_pinned' => false,
            'order' => 4,
        ]);
    }
}
