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
            'title' => 'Startup Incubation Program',
            'slug' => 'startup-incubation-program',
            'description' => 'Support for new entrepreneurs launching their startups',
            'content' => '<p>Our incubation program provides:</p><ul><li>Mentorship from experienced entrepreneurs</li><li>Access to funding opportunities</li><li>Networking events</li><li>Business development resources</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Startup+Incubation',
            'type' => 'startup',
            'is_active' => true,
            'order' => 1,
        ]);

        EntrepreneurshipProgram::create([
            'title' => 'Business Mentorship',
            'slug' => 'business-mentorship',
            'description' => 'One-on-one mentorship with industry experts',
            'content' => '<p>Get personalized guidance from our mentors:</p><ul><li>Business strategy development</li><li>Market research assistance</li><li>Financial planning</li><li>Growth acceleration</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Mentorship',
            'type' => 'mentorship',
            'is_active' => true,
            'order' => 2,
        ]);

        EntrepreneurshipProgram::create([
            'title' => 'Business Expansion Program',
            'slug' => 'business-expansion-program',
            'description' => 'Scale your existing business to new markets',
            'content' => '<p>Expand your business successfully:</p><ul><li>Market expansion strategies</li><li>International business guidance</li><li>Funding solutions</li><li>Operations optimization</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Business+Expansion',
            'type' => 'business',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
