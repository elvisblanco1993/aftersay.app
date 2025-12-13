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

    public $sortBy = 'name';

    public $sortDirection = 'desc';

    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.contact.index', [
            'contacts' => Contact::search($this->query)
                ->where('tenant_id', $this->user->current_tenant_id)
                ->options([
                    'sort_by' => $this->sortBy.':'.$this->sortDirection,
                ])
                ->paginate($this->per_page),
        ]);
    }

    public function addContact()
    {
        $this->dispatch('add-contact');
    }
}
