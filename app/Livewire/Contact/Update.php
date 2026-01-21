<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Flux\Flux;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Update extends Component
{
    public Contact $contact;

    public $first_name;

    public $last_name;

    public $email;

    public function mount()
    {
        $this->first_name = $this->contact->first_name;
        $this->last_name = $this->contact->last_name;
        $this->email = $this->contact->email;
    }

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
        return view('livewire.contact.update');
    }

    public function save()
    {
        $this->validate();
        try {
            $this->contact->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
            ]);
            Flux::toast(text: 'Contact updated!', variant: 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            Flux::toast(text: 'We ran into an issue updating this contact!', variant: 'danger');
        }
        $this->redirect(url: url()->previous(), navigate: true);
    }
}
