<?php

namespace App\Livewire\Pages\Programs;

use App\Models\Program;
use App\Models\Location;
use Livewire\Component;

class Survival extends Component
{
    public function render()
    {
        $program = Program::where('slug', 'survival')->firstOrFail();
        
        $locations = Location::with(['pricingPlans' => function($query) {
            $query->where('is_active', true)
                  ->whereHas('program', function($q){
                      $q->where('slug', 'survival');
                  })
                  ->with('program');
        }])
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

        return view('livewire.pages.programs.survival', [
            'program' => $program,
            'locations' => $locations,
        ])
        ->layout('layouts.app', [
            'title' => 'Survival Swimming Program - K.I.S.S. Aquatics',
            'description' => 'Learn essential water safety and survival swimming skills. Our survival program teaches children to swim, float, and survive in emergency situations.',
        ]);
    }
}
