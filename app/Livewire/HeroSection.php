<?php

namespace App\Livewire;

use Livewire\Component;

class HeroSection extends Component
{
    public array $slides = [];

    public function mount()
    {
        $this->slides = [
            [ 'src' => asset('images/hero/Caden.jpg'), 'alt' => 'Caden' ],
            [ 'src' => asset('images/hero/Sloane.jpg'), 'alt' => 'Sloane' ],
            [ 'src' => asset('images/hero/KISS_Sizzle.jpg'), 'alt' => 'Sizzle' ],
            [ 'src' => asset('images/hero/Lilianna.jpg'), 'alt' => 'Lilianna' ],
            [ 'src' => asset('images/hero/Raegan.jpg'), 'alt' => 'Raegan' ],
        ];
    }

    public function render()
    {
        return view('livewire.hero-section');
    }
}
