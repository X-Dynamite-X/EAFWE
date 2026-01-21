<?php

namespace Tests\Feature;

use App\Models\EntrepreneurshipProgram;
use App\Models\MarketingResource;
use App\Models\ParticipationOpportunity;
use App\Models\PortalOpportunity;
use App\Models\TrainingProgram;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class MultilingualSupportTest extends TestCase
{
    use RefreshDatabase;

    public function test_training_program_multilingual_storage_and_retrieval()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'title_en' => 'Training En',
            'title_ar' => 'Training Ar',
            'description_en' => 'Desc En',
            'description_ar' => 'Desc Ar',
            'content_en' => 'Content En',
            'content_ar' => 'Content Ar',
            'slug' => 'training-slug',
            'category' => 'training',
            'is_active' => true,
            'image' => null, // Assuming image is optional or handled
        ];

        // Store directly via model to test database and accessors first, or controller?
        // Let's test Model Accessors first as that is the core logic.
        $program = TrainingProgram::create($data);

        // Test Default Locale (Ar)
        App::setLocale('ar');
        $this->assertEquals('Training Ar', $program->title);
        $this->assertEquals('Desc Ar', $program->description);
        $this->assertEquals('Content Ar', $program->content);

        // Test English Locale
        App::setLocale('en');
        // We need to fetch fresh to ensure accessors rely on current app locale if they cache?
        // Accessors usually don't cache unless implemented.
        $this->assertEquals('Training En', $program->title);
        $this->assertEquals('Desc En', $program->description);
        $this->assertEquals('Content En', $program->content);
    }

    public function test_entrepreneurship_program_multilingual()
    {
        $program = EntrepreneurshipProgram::create([
            'title_en' => 'Entre En',
            'title_ar' => 'Entre Ar',
            'description_en' => 'Desc En',
            'description_ar' => 'Desc Ar',
            'content_en' => 'Content En',
            'content_ar' => 'Content Ar',
            'slug' => 'entre-slug',
            'type' => 'business',
            'is_active' => true,
        ]);

        App::setLocale('ar');
        $this->assertEquals('Entre Ar', $program->title);

        App::setLocale('en');
        $this->assertEquals('Entre En', $program->title);
    }

    public function test_participation_opportunity_multilingual()
    {
        $opportunity = ParticipationOpportunity::create([
            'title_en' => 'Part En',
            'title_ar' => 'Part Ar',
            'description_en' => 'Desc En',
            'description_ar' => 'Desc Ar',
            'content_en' => 'Content En',
            'content_ar' => 'Content Ar',
            'slug' => 'part-slug',
            'type' => 'volunteer',
            'is_active' => true,
            'start_date' => now(),
            'end_date' => now()->addDays(5),
        ]);

        App::setLocale('ar');
        $this->assertEquals('Part Ar', $opportunity->title);

        App::setLocale('en');
        $this->assertEquals('Part En', $opportunity->title);
    }

    public function test_marketing_resource_multilingual()
    {
        $resource = MarketingResource::create([
            'title_en' => 'Market En',
            'title_ar' => 'Market Ar',
            'description_en' => 'Desc En',
            'description_ar' => 'Desc Ar',
            'content_en' => 'Content En',
            'content_ar' => 'Content Ar',
            'slug' => 'market-slug',
            'resource_type' => 'guide',
            'is_active' => true,
        ]);

        App::setLocale('ar');
        $this->assertEquals('Market Ar', $resource->title);

        App::setLocale('en');
        $this->assertEquals('Market En', $resource->title);
    }

    public function test_portal_opportunity_multilingual()
    {
        $opportunity = PortalOpportunity::create([
            'title_en' => 'Portal En',
            'title_ar' => 'Portal Ar',
            'description_en' => 'Desc En',
            'description_ar' => 'Desc Ar',
            'content_en' => 'Content En',
            'content_ar' => 'Content Ar',
            'slug' => 'portal-slug',
            'opportunity_type' => 'business',
            'status' => 'active',
            'is_active' => true,
        ]);

        App::setLocale('ar');
        $this->assertEquals('Portal Ar', $opportunity->title);

        App::setLocale('en');
        $this->assertEquals('Portal En', $opportunity->title);
    }
}
