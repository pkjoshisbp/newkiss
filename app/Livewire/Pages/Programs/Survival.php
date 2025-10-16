<?php

namespace App\Livewire\Pages\Programs;

use Livewire\Component;

class Survival extends Component
{
    public function render()
    {
        return view('livewire.pages.programs.survival')
            ->layout('layouts.app', [
                'title' => 'Survival Program - K.I.S.S. Aquatics',
                'description' => 'Our core Survival Swim program teaches children to swim, float, and survive with confidence.',
            ]);
    }
}
