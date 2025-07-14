<?php

namespace App\Livewire\Platform;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
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
        return view('livewire.platform.index', [
            'platforms' => $this->tenant->platforms,
        ]);
    }
}
