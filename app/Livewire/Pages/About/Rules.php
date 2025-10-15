<?php

namespace App\Livewire\Pages\About;

use Livewire\Component;

class Rules extends Component
{
    public function render()
    {
        return view('pages.about.rules')
            ->layout('layouts.app', [
                'title' => 'The Rules - K.I.S.S. Aquatics',
                'description' => 'Guidelines and rules to ensure safe and effective swim lessons at K.I.S.S. Aquatics.',
            ]);
    }
}
