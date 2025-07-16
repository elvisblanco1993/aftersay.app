<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public $email;

    public $phone;

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', Rule::email()->defaults()],
        ];
    }

    public function render()
    {
        return view('livewire.contact.create');
    }

    public function save()
    {
        $this->validate();
        try {
            Contact::create([
                'tenant_id' => Auth::user()->current_tenant_id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
        $this->redirect(url: url()->previous(), navigate: true);
    }
}
