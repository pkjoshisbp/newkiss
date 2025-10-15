<?php

namespace App\Livewire\Pages\About;

use Livewire\Component;

class Instructors extends Component
{
    public function render()
    {
        return view('pages.about.instructors')
            ->layout('layouts.app', [
                'title' => 'Our Instructors - K.I.S.S. Aquatics',
                'description' => 'Meet our experienced swim instructors dedicated to water safety and survival skills.',
            ]);
    }
}
