<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\ProgramSkill;

class ProgramSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get Survival Program
        $survivalProgram = Program::where('slug', 'survival')->first();

        if ($survivalProgram) {
            $skills = [
                [
                    'title' => 'Breath Control',
                    'description' => 'Learning to get the face wet and learn to hold their breath',
                    'icon' => 'fas fa-wind',
                    'sort_order' => 1,
                ],
                [
                    'title' => 'Back Float',
                    'description' => 'Comfort laying down on float independently and trust the float for safety',
                    'icon' => 'fas fa-water',
                    'sort_order' => 2,
                ],
                [
                    'title' => 'Transitions',
                    'description' => 'Ability to roll over or rotate into a back float position',
                    'icon' => 'fas fa-sync-alt',
                    'sort_order' => 3,
                ],
                [
                    'title' => 'Survival',
                    'description' => 'Simulation of a real water accident for ultimate training',
                    'icon' => 'fas fa-life-ring',
                    'sort_order' => 4,
                ],
                [
                    'title' => 'Swim Posture',
                    'description' => 'Proper swim posture and face in the water swimming',
                    'icon' => 'fas fa-swimmer',
                    'sort_order' => 5,
                ],
                [
                    'title' => 'Wall Safety',
                    'description' => 'Swim and hold a pool wall/edge for safety',
                    'icon' => 'fas fa-hand-paper',
                    'sort_order' => 6,
                ],
                [
                    'title' => 'Roll Over',
                    'description' => 'Develop roll over techniques',
                    'icon' => 'fas fa-redo',
                    'sort_order' => 7,
                ],
                [
                    'title' => 'Entry Skills',
                    'description' => 'Jumping/Falling from a wall/ledge',
                    'icon' => 'fas fa-arrow-down',
                    'sort_order' => 8,
                ],
                [
                    'title' => 'Water Retrieval',
                    'description' => 'Diving for water toys',
                    'icon' => 'fas fa-arrow-circle-down',
                    'sort_order' => 9,
                ],
                [
                    'title' => 'Directional Swimming',
                    'description' => 'Swim both to and away from the instructor',
                    'icon' => 'fas fa-arrows-alt-h',
                    'sort_order' => 10,
                ],
            ];

            foreach ($skills as $skill) {
                ProgramSkill::create([
                    'program_id' => $survivalProgram->id,
                    'title' => $skill['title'],
                    'description' => $skill['description'],
                    'icon' => $skill['icon'],
                    'sort_order' => $skill['sort_order'],
                    'is_active' => true,
                ]);
            }
        }
    }
}
