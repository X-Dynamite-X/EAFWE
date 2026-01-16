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
            'title' => 'Community Volunteer Program',
            'slug' => 'community-volunteer-program',
            'description' => 'Join us in making a difference in our community',
            'content' => '<p>Volunteer opportunities include:</p><ul><li>Community outreach</li><li>Youth mentoring</li><li>Event organization</li><li>Training delivery</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Volunteering',
            'type' => 'volunteer',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addMonths(6)->toDateString(),
            'is_active' => true,
            'order' => 1,
        ]);

        ParticipationOpportunity::create([
            'title' => 'Strategic Partnership',
            'slug' => 'strategic-partnership',
            'description' => 'Partner with us for mutual growth',
            'content' => '<p>Partnership benefits:</p><ul><li>Resource sharing</li><li>Joint ventures</li><li>Market expansion</li><li>Innovation collaboration</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Partnership',
            'type' => 'partner',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addYears(1)->toDateString(),
            'is_active' => true,
            'order' => 2,
        ]);

        ParticipationOpportunity::create([
            'title' => 'Sponsorship Opportunity',
            'slug' => 'sponsorship-opportunity',
            'description' => 'Support our mission through sponsorship',
            'content' => '<p>Sponsorship packages include:</p><ul><li>Brand visibility</li><li>Event participation</li><li>Community recognition</li><li>Tax benefits</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Sponsorship',
            'type' => 'sponsor',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addMonths(12)->toDateString(),
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
