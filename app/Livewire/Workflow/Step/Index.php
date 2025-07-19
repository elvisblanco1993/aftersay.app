<?php

namespace App\Livewire\Workflow\Step;

use App\Models\Workflow;
use Livewire\Component;

class Index extends Component
{
    public Workflow $workflow;

    public function render()
    {
        return view('livewire.workflow.step.index', [
            'steps' => $this->workflow->steps,
        ]);
    }
}
