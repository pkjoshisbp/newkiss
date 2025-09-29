<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class HomeHero extends Component
{
    public array $slides = [];

    public function mount()
    {
        $this->slides = [
            [ 'src' => asset('images/slider1.png'), 'alt' => 'KISS Aquatics' ],
        ];
    }

    public function render()
    {
        return view('livewire.partials.home-hero');
    }
}
