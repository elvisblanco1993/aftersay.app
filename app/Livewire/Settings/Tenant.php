<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tenant extends Component
{
    public $user;

    public $tenant;

    public $name;

    public $website;

    public $phone;

    public $email;

    public $country;

    public $industry;

    public function mount()
    {
        $this->user = Auth::user();
        $this->tenant = $this->user->currentTenant;
        $this->name = $this->tenant->name;
        $this->website = $this->tenant->website;
        $this->phone = $this->tenant->phone;
        $this->email = $this->tenant->email;
        $this->country = $this->tenant->country;
        $this->industry = $this->tenant->industry;
    }

    public function render()
    {
        return view('livewire.settings.tenant');
    }

    public function updateTenantInformation()
    {
        $this->tenant->update([
            'name' => $this->name,
            'website' => $this->website,
            'phone' => $this->phone,
            'email' => $this->email,
            'country' => $this->country,
            'industry' => $this->industry,
        ]);

        $this->dispatch('tenant-updated');
    }
}
