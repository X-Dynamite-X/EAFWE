<?php

namespace Database\Seeders;

use App\Models\MemberFile;
use Illuminate\Database\Seeder;

class MemberFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemberFile::create([
            'title' => 'Member Handbook',
            'slug' => 'member-handbook',
            'description' => 'Complete guide for members with policies and procedures',
            'file_type' => 'pdf',
            'file_url' => 'https://example.com/files/member-handbook.pdf',
            'file_size' => '2.5MB',
            'category' => 'Handbook',
            'is_active' => true,
            'order' => 1,
        ]);

        MemberFile::create([
            'title' => 'Financial Management Guide',
            'slug' => 'financial-management-guide',
            'description' => 'Template and guidance for financial management',
            'file_type' => 'document',
            'file_url' => 'https://example.com/files/financial-guide.docx',
            'file_size' => '1.2MB',
            'category' => 'Guide',
            'is_active' => true,
            'order' => 2,
        ]);

        MemberFile::create([
            'title' => 'Business Planning Template',
            'slug' => 'business-planning-template',
            'description' => 'Ready-to-use template for business planning',
            'file_type' => 'template',
            'file_url' => 'https://example.com/files/business-plan-template.xlsx',
            'file_size' => '0.8MB',
            'category' => 'Template',
            'is_active' => true,
            'order' => 3,
        ]);

        MemberFile::create([
            'title' => 'Marketing Checklist',
            'slug' => 'marketing-checklist',
            'description' => 'Comprehensive marketing checklist for businesses',
            'file_type' => 'document',
            'file_url' => 'https://example.com/files/marketing-checklist.pdf',
            'file_size' => '0.5MB',
            'category' => 'Checklist',
            'is_active' => true,
            'order' => 4,
        ]);
    }
}
