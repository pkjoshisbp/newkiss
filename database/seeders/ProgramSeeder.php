<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'name' => 'Survival Program',
                'slug' => 'survival',
                'description' => 'Our introduction 24 lesson package is required for all new swimmers. This package is 24x 10-minute lessons.',
                'lesson_count' => 24,
                'duration_minutes' => 10,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Continuing Education',
                'slug' => 'continuing',
                'description' => 'All packages are sold in 12 lesson packages for $225 ($15 savings). Swim Like a Fish or Maintenance program.',
                'lesson_count' => 12,
                'duration_minutes' => 10,
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($programs as $program) {
            Program::updateOrCreate(
                ['slug' => $program['slug']],
                $program
            );
        }
    }
}
