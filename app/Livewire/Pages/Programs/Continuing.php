<?php

namespace App\Livewire\Pages\Programs;

use Livewire\Component;

class Continuing extends Component
{
    public function render()
    {
        return view('livewire.pages.programs.continuing')
            ->layout('layouts.app', [
                'title' => 'Continuing Education - K.I.S.S. Aquatics',
                'description' => 'Ongoing swim lessons to build on survival skills and develop strong, confident swimmers.',
            ]);
    }
}
