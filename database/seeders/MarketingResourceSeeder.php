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
            'title' => 'Social Media Marketing Guide',
            'slug' => 'social-media-marketing-guide',
            'description' => 'Complete guide to effective social media marketing',
            'content' => '<p>This guide covers:</p><ul><li>Platform selection</li><li>Content strategy</li><li>Engagement tactics</li><li>Analytics measurement</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Social+Media+Guide',
            'resource_type' => 'guide',
            'file_url' => 'https://example.com/downloads/social-media-guide.pdf',
            'is_active' => true,
            'order' => 1,
        ]);

        MarketingResource::create([
            'title' => 'Email Campaign Template',
            'slug' => 'email-campaign-template',
            'description' => 'Professional email template for marketing campaigns',
            'content' => '<p>Templates included for:</p><ul><li>Welcome emails</li><li>Promotional campaigns</li><li>Newsletter designs</li><li>Follow-up sequences</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Email+Template',
            'resource_type' => 'template',
            'file_url' => 'https://example.com/downloads/email-template.html',
            'is_active' => true,
            'order' => 2,
        ]);

        MarketingResource::create([
            'title' => 'Success Case Study',
            'slug' => 'success-case-study',
            'description' => 'Real-world examples of successful marketing campaigns',
            'content' => '<p>Learn from our success stories:</p><ul><li>Campaign analysis</li><li>Results achieved</li><li>Lessons learned</li><li>Best practices</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Case+Study',
            'resource_type' => 'case-study',
            'file_url' => 'https://example.com/downloads/case-study.pdf',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
