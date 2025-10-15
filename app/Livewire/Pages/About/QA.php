<?php

namespace App\Livewire\Pages\About;

use Livewire\Component;

class QA extends Component
{
    public function render()
    {
        return view('pages.about.qa')
            ->layout('layouts.app', [
                'title' => 'Q&A - K.I.S.S. Aquatics',
                'description' => 'Frequently asked questions about K.I.S.S. Aquatics programs, policies, and scheduling.',
            ]);
    }
}
