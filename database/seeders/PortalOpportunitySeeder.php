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
            'title' => 'Export Business Opportunity',
            'slug' => 'export-business-opportunity',
            'description' => 'Connect with international markets through our export program',
            'content' => '<p>Expand your business internationally:</p><ul><li>Market research support</li><li>Trade connections</li><li>Export documentation guidance</li><li>Logistics support</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Export+Opportunity',
            'opportunity_type' => 'business',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addMonths(6)->toDateString(),
            'status' => 'active',
            'is_active' => true,
            'order' => 1,
        ]);

        PortalOpportunity::create([
            'title' => 'B2B Partnership Program',
            'slug' => 'b2b-partnership-program',
            'description' => 'Strategic partnerships with established organizations',
            'content' => '<p>Build strategic alliances:</p><ul><li>Partner matching service</li><li>Joint venture support</li><li>Co-marketing opportunities</li><li>Mutual growth plans</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=B2B+Partnership',
            'opportunity_type' => 'partnership',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addYears(1)->toDateString(),
            'status' => 'active',
            'is_active' => true,
            'order' => 2,
        ]);

        PortalOpportunity::create([
            'title' => 'Community Volunteer Network',
            'slug' => 'community-volunteer-network',
            'description' => 'Make a positive impact through volunteering',
            'content' => '<p>Join our volunteer network:</p><ul><li>Community projects</li><li>Skills-based volunteering</li><li>Event support</li><li>Mentoring opportunities</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Volunteer+Network',
            'opportunity_type' => 'business',
            'start_date' => now()->toDateString(),
            'end_date' => now()->addMonths(12)->toDateString(),
            'status' => 'active',
            'is_active' => true,
            'order' => 3,
        ]);

        PortalOpportunity::create([
            'title' => 'Funding Opportunities Fund',
            'slug' => 'funding-opportunities-fund',
            'description' => 'Access to various funding sources for business growth',
            'content' => '<p>Secure funding for growth:</p><ul><li>Grants and subsidies</li><li>Loan programs</li><li>Investor connections</li><li>Crowdfunding guidance</li></ul>',
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
