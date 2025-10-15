<?php

namespace App\Livewire\Pages\About;

use Livewire\Component;

class Locations extends Component
{
    public function render()
    {
        return view('pages.about.locations')
            ->layout('layouts.app', [
                'title' => 'Our Locations - K.I.S.S. Aquatics',
                'description' => 'Find convenient K.I.S.S. Aquatics swimming lesson locations across Northeast Ohio including Twinsburg, Mayfield, Brooklyn, and Independence.',
            ]);
    }
}
