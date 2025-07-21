<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;

class Update extends Component
{
    public Contact $contact;

    public function render()
    {
        return view('livewire.contact.update');
    }
}
