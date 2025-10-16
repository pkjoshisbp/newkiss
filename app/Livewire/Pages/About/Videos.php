<?php

namespace App\Livewire\Pages\About;

use Livewire\Component;

class Videos extends Component
{
    public function render()
    {
        return view('livewire.pages.about.videos')
            ->layout('layouts.app', [
                'title' => 'Videos - K.I.S.S. Aquatics',
                'description' => 'Watch our swim survival and safety videos. Up to 3 featured videos per the client specification.',
            ]);
    }
}
