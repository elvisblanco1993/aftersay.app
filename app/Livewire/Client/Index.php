<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public int $per_page = 15;

    public function render()
    {
        return view('livewire.client.index', [
            'clients' => Client::paginate($this->per_page),
        ]);
    }
}
