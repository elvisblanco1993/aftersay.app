<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Update extends Component
{
    public Contact $contact;

    public $name;

    public $email;

    public $phone;

    public function mount()
    {
        $this->name = $this->contact->name;
        $this->email = $this->contact->email;
        $this->phone = $this->contact->phone;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', Rule::email()->defaults()],
        ];
    }

    public function render()
    {
        return view('livewire.contact.update');
    }

    public function save()
    {
        $this->validate();
        try {
            $this->contact->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        $this->redirect(url: url()->previous(), navigate: true);
    }
}
