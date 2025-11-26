<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $query = '';

    public int $per_page = 15;

    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.contact.index', [
            'contacts' => Contact::search($this->query)->where('tenant_id', $this->user->current_tenant_id)->paginate($this->per_page),
        ]);
    }

    public function addContact()
    {
        $this->dispatch('add-contact');
    }
}
