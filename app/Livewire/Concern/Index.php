<?php

namespace App\Livewire\Concern;

use App\Models\Concern;
use Livewire\Component;

class Index extends Component
{
    public string $query = '';

    public int $perPage = 15;

    public function render()
    {
        return view('livewire.concern.index', [
            'concerns' => Concern::search($this->query)->paginate($this->perPage),
        ]);
    }
}
