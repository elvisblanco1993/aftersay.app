<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tenant extends Component
{
    public $user;

    public $tenant;

    public $name;

    public $logo;

    public $website;

    public $phone;

    public $fax;

    public $email;

    public $address;

    public $address_ext;

    public $city;

    public $state;

    public $zip;

    public $country;

    public $industry;

    public function mount()
    {
        $this->user = Auth::user();
        $this->tenant = $this->user->currentTenant;
        $this->name = $this->tenant->name;
        $this->logo = $this->tenant->logo;
        $this->website = $this->tenant->website;
        $this->phone = $this->tenant->phone;
        $this->fax = $this->tenant->fax;
        $this->email = $this->tenant->email;
        $this->address = $this->tenant->address;
        $this->address_ext = $this->tenant->address_ext;
        $this->city = $this->tenant->city;
        $this->state = $this->tenant->state;
        $this->zip = $this->tenant->zip;
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
            'state' => $this->state,
            'country' => $this->country,
            'industry' => $this->industry,
            'logo' => $this->logo,
        ]);

        $this->dispatch('tenant-updated');
    }
}
