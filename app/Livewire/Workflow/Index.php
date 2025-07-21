<?php

namespace App\Livewire\Workflow;

use App\Models\Workflow;
use Livewire\Component;

class Index extends Component
{
    public int $per_page = 15;

    public function render()
    {
        return view('livewire.workflow.index', [
            'workflows' => Workflow::withCount('instances')->paginate($this->per_page),
        ]);
    }
}
