<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class ContactPage extends Component
{
    public function render()
    {
        return view('pages.contact')
            ->layout('layouts.app', [
                'title' => 'Contact Us - K.I.S.S. Aquatics',
                'description' => 'Get in touch with K.I.S.S. Aquatics for questions about locations, pricing, or scheduling swim lessons.',
            ]);
    }
}
