<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Program;
use App\Models\Location;
use App\Models\Video;
use App\Models\SiteSetting;
use App\Models\HomePageContent;

class HomePage extends Component
{
    public function render()
    {
        $programs = Program::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        $locations = Location::where('is_active', true)
            ->orderBy('sort_order')
            ->take(4)
            ->get();
            
        $featuredVideos = Video::where('is_published', true)
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        // Hero slides data (moved from HeroSection component)
        $heroSlides = [
            [ 'src' => asset('images/hero/Caden.jpg'), 'alt' => 'Caden' ],
            [ 'src' => asset('images/hero/Sloane.jpg'), 'alt' => 'Sloane' ],
            [ 'src' => asset('images/hero/KISS_Sizzle.jpg'), 'alt' => 'Sizzle' ],
            [ 'src' => asset('images/hero/Lilianna.jpg'), 'alt' => 'Lilianna' ],
            [ 'src' => asset('images/hero/Raegan.jpg'), 'alt' => 'Raegan' ],
        ];

        // Get homepage content sections
        $heroContent = HomePageContent::getSection('hero_title');
        $programsHeading = HomePageContent::getSection('programs_heading');
        $safetyBanner = HomePageContent::getSection('safety_banner');

        return view('livewire.home-page', compact('programs', 'locations', 'featuredVideos', 'heroSlides', 'heroContent', 'programsHeading', 'safetyBanner'))
            ->layout('layouts.app', [
                'title' => 'K.I.S.S. Aquatics - Swimming Lessons for Water Safety & Survival',
                'description' => 'Learn essential water safety and survival swimming skills for all ages in Northeast Ohio. Professional swim instructors teaching children to swim, float, and survive.'
            ]);
    }
}
