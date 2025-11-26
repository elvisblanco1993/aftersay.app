<?php

namespace App\Livewire\Billing;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.billing.dashboard', [
            'plan' => $this->user->currentTenant->planConfig(),
            'contacts_count' => $this->user->currentTenant->contacts()->count(),
            'platforms_count' => $this->user->currentTenant->platforms()->count(),
        ]);
    }
}
