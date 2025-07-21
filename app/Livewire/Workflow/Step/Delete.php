<?php

namespace App\Livewire\Workflow\Step;

use App\Models\WorkflowStep;
use Livewire\Component;

class Delete extends Component
{
    public WorkflowStep $step;

    public function render()
    {
        return view('livewire.workflow.step.delete');
    }

    public function delete()
    {
        $this->step->delete();
        $this->redirect(url: url()->previous(), navigate: true);
    }
}
