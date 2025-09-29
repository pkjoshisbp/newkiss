<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Program;
use App\Models\Location;
use App\Models\Video;
use App\Models\SiteSetting;

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

        return view('livewire.home-page', compact('programs', 'locations', 'featuredVideos'))
            ->layout('layouts.app', [
                'title' => 'K.I.S.S. Aquatics - Swimming Lessons for Water Safety & Survival',
                'description' => 'Learn essential water safety and survival swimming skills for all ages in Northeast Ohio. Professional swim instructors teaching children to swim, float, and survive.'
            ]);
    }
}
