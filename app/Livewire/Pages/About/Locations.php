<?php

namespace App\Livewire\Pages\About;

use App\Models\Location;
use Livewire\Component;

class Locations extends Component
{
    public function render()
    {
        $locations = Location::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('livewire.pages.about.locations', [
            'locations' => $locations,
        ])
            ->layout('layouts.app', [
                'title' => 'Our Locations - K.I.S.S. Aquatics',
                'description' => 'Find convenient K.I.S.S. Aquatics swimming lesson locations across Northeast Ohio including Twinsburg, Mayfield, Brooklyn, and Independence.',
            ]);
    }
}
