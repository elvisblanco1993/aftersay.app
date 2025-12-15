<?php

namespace App\Livewire\Workflow;

use App\Models\Workflow;
use Livewire\Component;

class Duplicate extends Component
{
    public Workflow $workflow;

    public function render()
    {
        return view('livewire.workflow.duplicate');
    }
}
