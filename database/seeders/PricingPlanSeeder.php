<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Program, Location, PricingPlan};

class PricingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $survivalProgram = Program::where('slug', 'survival')->first();
        $continuingProgram = Program::where('slug', 'continuing')->first();

        if (!$survivalProgram || !$continuingProgram) {
            $this->command->error('Programs not found. Please run ProgramSeeder first.');
            return;
        }

        // Survival Program pricing by location
        $survivalPricing = [
            'Twinsburg' => 480,
            'Mayfield' => 480,
            'Brooklyn' => 500,
            'Independence' => 500,
        ];

        foreach ($survivalPricing as $locationName => $price) {
            $location = Location::where('name', $locationName)->first();
            if ($location) {
                PricingPlan::updateOrCreate(
                    [
                        'program_id' => $survivalProgram->id,
                        'location_id' => $location->id,
                    ],
                    [
                        'name' => 'Survival Program (24 Lessons)',
                        'price' => $price,
                        'lesson_count' => 24,
                        'description' => '24x 10-minute lessons - Required for all new swimmers',
                        'is_active' => true,
                    ]
                );
            }
        }

        // Continuing Education pricing (same for all locations)
        $locations = Location::all();
        foreach ($locations as $location) {
            PricingPlan::updateOrCreate(
                [
                    'program_id' => $continuingProgram->id,
                    'location_id' => $location->id,
                ],
                [
                    'name' => 'Continuing Education (12 Lessons)',
                    'price' => 225,
                    'lesson_count' => 12,
                    'description' => '12 lesson package - $15 savings',
                    'is_active' => true,
                ]
            );
        }

        $this->command->info('Pricing plans seeded successfully.');
    }
}
