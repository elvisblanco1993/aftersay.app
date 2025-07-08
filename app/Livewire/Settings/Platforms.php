<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Platforms extends Component
{
    public $user;

    public $tenant;

    public function mount()
    {
        $this->user = Auth::user();
        $this->tenant = $this->user->currentTenant;
    }

    public function render()
    {
        return view('livewire.settings.platforms', [
            'platforms' => $this->tenant->platforms,
        ]);
    }
}
