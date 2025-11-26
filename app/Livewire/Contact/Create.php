<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public $first_name;

    public $last_name;

    public $email;

    public function rules()
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
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
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        $this->redirect(url: url()->previous(), navigate: true);
    }
}
