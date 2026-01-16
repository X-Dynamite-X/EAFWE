<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'training',
                'title' => 'Training',
                'content' => 'This is the training page. Content can be edited from the admin panel.',
            ],
            [
                'slug' => 'entrepreneurship',
                'title' => 'Entrepreneurship',
                'content' => 'This is the entrepreneurship page. Content can be edited from the admin panel.',
            ],
            [
                'slug' => 'participation-opportunities',
                'title' => 'Participation Opportunities',
                'content' => 'This is the participation opportunities page. Content can be edited from the admin panel.',
            ],
            [
                'slug' => 'marketing',
                'title' => 'Marketing',
                'content' => 'This is the marketing page. Content can be edited from the admin panel.',
            ],
            [
                'slug' => 'files',
                'title' => 'Files',
                'content' => 'This is the files page. Content can be edited from the admin panel.',
            ],
            [
                'slug' => 'communication',
                'title' => 'Communication',
                'content' => 'This is the communication page. Content can be edited from the admin panel.',
            ],
            [
                'slug' => 'portal-opportunities',
                'title' => 'Portal Opportunities',
                'content' => 'This is the portal opportunities page. Content can be edited from the admin panel.',
            ],
            [
                'slug' => 'portal-volunteering',
                'title' => 'Portal Volunteering',
                'content' => 'This is the portal volunteering page. Content can be edited from the admin panel.',
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
