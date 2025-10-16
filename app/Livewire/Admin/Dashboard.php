<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\{Program, Location, Video, PricingPlan};

class Dashboard extends Component
{
    public function render()
    {
        $stats = [
            'programs' => Program::count(),
            'locations' => Location::count(),
            'videos' => Video::count(),
            'pricing_plans' => PricingPlan::count(),
        ];

        return view('livewire.admin.dashboard', compact('stats'))
            ->layout('layouts.admin', [
                'title' => 'Dashboard',
                'header' => 'Dashboard'
            ]);
    }
}
