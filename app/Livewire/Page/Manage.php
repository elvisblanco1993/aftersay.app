<?php

namespace App\Livewire\Page;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Manage extends Component
{
    public $tenant;

    public $page;

    public $slug;

    public function mount()
    {
        $this->tenant = Auth::user()->currentTenant;
    }

    public function render()
    {
        return view('livewire.page.manage');
    }
}
