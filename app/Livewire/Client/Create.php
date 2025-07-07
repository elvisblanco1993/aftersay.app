<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public $business_name;

    public $contact_name;

    public $email;

    public $phone;

    public $website;

    public $industry;

    public function rules()
    {
        return [
            'business_name' => ['required'],
            'contact_name' => ['required'],
            'email' => ['required', Rule::email()->defaults()],
        ];
    }

    public function render()
    {
        return view('livewire.client.create');
    }

    public function save()
    {
        $this->validate();
        try {
            Client::create([
                'tenant_id' => Auth::user()->current_tenant_id,
                'business_name' => $this->business_name,
                'contact_name' => $this->contact_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'website' => $this->website,
                'industry' => $this->industry ?? null,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
        $this->redirect(url: url()->previous(), navigate: true);
    }
}
