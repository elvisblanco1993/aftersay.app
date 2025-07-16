<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public int $per_page = 15;

    public function render()
    {
        return view('livewire.contact.index', [
            'contacts' => Contact::paginate($this->per_page),
        ]);
    }
}
