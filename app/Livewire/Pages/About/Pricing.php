<?php

namespace App\Livewire\Pages\About;

use Livewire\Component;

class Pricing extends Component
{
    public function render()
    {
        return view('pages.about.pricing')
            ->layout('layouts.app', [
                'title' => 'Pricing - K.I.S.S. Aquatics',
                'description' => 'View our competitive pricing for swimming lessons at K.I.S.S. Aquatics. Programs for survival swimming and continuing education across Northeast Ohio.',
            ]);
    }
}
