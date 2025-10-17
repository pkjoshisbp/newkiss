<?php

namespace App\Livewire\Pages\About;

use App\Models\Instructor;
use Livewire\Component;

class Instructors extends Component
{
    public function render()
    {
        $instructors = Instructor::active()->ordered()->get();
        
        return view('livewire.pages.about.instructors', [
            'instructors' => $instructors,
        ])
            ->layout('layouts.app', [
                'title' => 'Our Instructors - K.I.S.S. Aquatics',
                'description' => 'Meet our experienced swim instructors dedicated to water safety and survival skills.',
            ]);
    }
}
