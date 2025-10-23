<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomePageContent;

class HomePageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'section_key' => 'hero_title',
                'title' => 'Survival Swimming Lessons',
                'subtitle' => 'Kids and infants safety & survival swim — teaching children to swim, float, and survive.',
                'content' => null,
                'button_text' => 'Learn More',
                'button_link' => '/programs/survival',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'section_key' => 'programs_section',
                'title' => 'Private 1 on 1 Swim Programs',
                'subtitle' => null,
                'content' => 'All new students must do the Survival Program and upon completion can advance into our Continuing Education Program.',
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'section_key' => 'locations_section',
                'title' => 'Our Locations',
                'subtitle' => null,
                'content' => 'Convenient locations across Northeast Ohio to serve your family\'s swimming needs.',
                'button_text' => 'View All Locations',
                'button_link' => '/about/locations',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'section_key' => 'videos_section',
                'title' => 'See Our Students in Action',
                'subtitle' => null,
                'content' => 'Watch how our students learn essential water safety and swimming skills.',
                'button_text' => 'View All Videos',
                'button_link' => '/about/videos',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'section_key' => 'stats_section',
                'title' => 'Every Second Counts in Water Safety',
                'subtitle' => null,
                'content' => '<strong>Drowning is the leading cause of death for children ages 1-4</strong> and the second leading cause of unintentional injury death for children ages 5-14. Don\'t wait - give your child the life-saving skills they need.',
                'button_text' => 'Start Lessons Today',
                'button_link' => 'https://momence.com/kiss-aquatics',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'section_key' => 'cdc_link',
                'title' => null,
                'subtitle' => null,
                'content' => 'https://www.cdc.gov/drowning/about/index.html',
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($sections as $section) {
            HomePageContent::updateOrCreate(
                ['section_key' => $section['section_key']],
                $section
            );
        }
    }
}
