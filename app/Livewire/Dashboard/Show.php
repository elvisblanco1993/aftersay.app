<?php

namespace App\Livewire\Dashboard;

use App\Enums\CampaignStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $tenant = Auth::user()->currentTenant;

        return view('livewire.dashboard.show', [
            'campaigns' => $tenant->campaigns->where('status', '!=', CampaignStatus::Completed)->count(),
            'linkClicks' => $tenant->linkClicks->count(),
            'concerns' => $tenant->concerns->count(),
        ]);
    }
}
