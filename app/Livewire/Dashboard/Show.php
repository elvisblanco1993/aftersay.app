<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $tenant = Auth::user()->currentTenant;

        return view('livewire.dashboard.show', [
            'campaigns' => $tenant->campaigns->count(),
            'linkClicks' => $tenant->linkClicks->count(),
            'concerns' => $tenant->concerns->count(),
        ]);
    }
}
