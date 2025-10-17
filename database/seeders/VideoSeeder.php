<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing videos
        Video::truncate();

        $videos = [
            [
                'title' => 'Raegan - Survival Swimming Skills',
                'description' => 'Watch Raegan demonstrate essential survival swimming skills including floating, rolling to breathe, and swimming to safety. This video showcases the life-saving techniques taught in our program.',
                'url' => '/videos/Raegan.mp4',
                'type' => 'local',
                'thumbnail' => '/posters/Raegan.jpg',
                'duration' => null,
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Caden - Learning to Float and Swim',
                'description' => 'See how Caden has mastered the fundamental skills of back floating and swimming. This demonstrates the confidence and competence children gain through our program.',
                'url' => '/videos/Caden.mp4',
                'type' => 'local',
                'thumbnail' => '/posters/Caden.jpg',
                'duration' => null,
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Lilianna - Water Safety in Action',
                'description' => 'Lilianna shows off her water safety skills with perfect form and technique. Watch as she demonstrates the swim-float-swim sequence that could save her life.',
                'url' => '/videos/Lilianna.mp4',
                'type' => 'local',
                'thumbnail' => '/posters/Lilianna.jpg',
                'duration' => null,
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Sloane - Building Confidence in Water',
                'description' => 'Follow Sloane\'s journey as she builds confidence and masters critical water safety skills. This video highlights the progress children make through consistent practice.',
                'url' => '/videos/Sloane.mp4',
                'type' => 'local',
                'thumbnail' => '/posters/Sloane.jpg',
                'duration' => null,
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'K.I.S.S. Aquatics Sizzle Reel',
                'description' => 'An exciting compilation showcasing students of all ages demonstrating their survival swimming skills. See the amazing transformations and life-saving abilities our students develop!',
                'url' => '/videos/KISS_Sizzle.mp4',
                'type' => 'local',
                'thumbnail' => '/posters/KISS_Sizzle.jpg',
                'duration' => null,
                'is_published' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
