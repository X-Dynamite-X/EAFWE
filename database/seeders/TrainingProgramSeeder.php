<?php

namespace Database\Seeders;

use App\Models\TrainingProgram;
use Illuminate\Database\Seeder;

class TrainingProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrainingProgram::create([
            'title' => 'Business Management Training',
            'slug' => 'business-management-training',
            'description' => 'Comprehensive training program for business management',
            'content' => '<p>Learn the fundamentals of business management including:</p><ul><li>Strategic Planning</li><li>Financial Management</li><li>Team Leadership</li><li>Project Management</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Business+Management',
            'category' => 'training',
            'is_active' => true,
            'order' => 1,
        ]);

        TrainingProgram::create([
            'title' => 'Digital Marketing Workshop',
            'slug' => 'digital-marketing-workshop',
            'description' => 'Learn modern digital marketing strategies',
            'content' => '<p>Master digital marketing in this comprehensive workshop:</p><ul><li>Social Media Marketing</li><li>SEO Optimization</li><li>Content Marketing</li><li>Email Campaigns</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Digital+Marketing',
            'category' => 'workshop',
            'is_active' => true,
            'order' => 2,
        ]);

        TrainingProgram::create([
            'title' => 'Leadership Seminar',
            'slug' => 'leadership-seminar',
            'description' => 'Develop your leadership skills',
            'content' => '<p>Enhance your leadership capabilities:</p><ul><li>Effective Communication</li><li>Decision Making</li><li>Conflict Resolution</li><li>Team Building</li></ul>',
            'image_url' => 'https://via.placeholder.com/400x300?text=Leadership',
            'category' => 'seminar',
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
