<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Location, Program, PricingPlan, Page, FAQ, SiteSetting};

class KissAquaticsContentSeeder extends Seeder
{
    public function run(): void
    {
        // Create Locations
        $twinsburg = Location::create([
            'name' => 'Twinsburg Fitness Center',
            'address' => '10084 Ravenna Rd',
            'city' => 'Twinsburg',
            'state' => 'OH',
            'zip' => '44087',
            'phone' => '(216) 469-6400',
            'email' => 'kiss.swim.twin@gmail.com',
            'hours' => [
                'monday' => '8:00am - 2:00pm, 3:30pm - 7:30pm',
                'tuesday' => '8:00am - 2:00pm, 3:30pm - 7:30pm',
                'wednesday' => '8:00am - 2:00pm, 3:30pm - 7:30pm',
                'thursday' => '8:00am - 2:00pm, 3:30pm - 7:30pm',
                'friday' => '8:00am - 2:00pm, 3:30pm - 7:30pm'
            ],
            'is_active' => true,
            'sort_order' => 1
        ]);

        $brooklyn = Location::create([
            'name' => 'Brooklyn Rec Center',
            'address' => '7600 Memphis Ave',
            'city' => 'Brooklyn',
            'state' => 'OH',
            'zip' => '44144',
            'phone' => '(440) 773-5922',
            'email' => 'kissswimna@gmail.com',
            'hours' => [
                'monday' => '9:00am-12:30pm',
                'tuesday' => '9:00am-12:30pm, 3:30pm-5:30pm',
                'wednesday' => '9:00am-12:30pm, 3:30pm-5:30pm',
                'thursday' => '9:00am-12:30pm'
            ],
            'is_active' => true,
            'sort_order' => 3
        ]);

        // Create Programs
        $survivalProgram = Program::create([
            'name' => 'Swim-Float-Swim (Survival Program)',
            'slug' => 'survival',
            'description' => 'Our Swim Float Swim (survival swim) program is a 24 class program that teaches children essential water survival skills.',
            'features' => [
                'Swim on the tummy',
                'Roll-back-to-float',
                'Start the swimming process depending on the child\'s age',
                'Length of each lesson is approx. 10 minutes'
            ],
            'age_range' => '6 months and up',
            'lesson_count' => 24,
            'duration_minutes' => 10.0,
            'is_active' => true,
            'sort_order' => 1
        ]);

        // Create Pricing Plans
        PricingPlan::create([
            'program_id' => $survivalProgram->id,
            'location_id' => $twinsburg->id,
            'name' => 'Survival Program - Twinsburg',
            'price' => 480.00,
            'lesson_count' => 24,
            'description' => '24 lessons at Twinsburg location',
            'is_active' => true
        ]);

        PricingPlan::create([
            'program_id' => $survivalProgram->id,
            'location_id' => $brooklyn->id,
            'name' => 'Survival Program - Brooklyn',
            'price' => 500.00,
            'lesson_count' => 24,
            'description' => '24 lessons at Brooklyn location',
            'is_active' => true
        ]);

        // Site Settings
        SiteSetting::setValue('site_name', 'K.I.S.S. Aquatics');
        SiteSetting::setValue('contact_email', 'kiss.swim@gmail.com');
        SiteSetting::setValue('phone_main', '(216) 469-6400');
    }
}
