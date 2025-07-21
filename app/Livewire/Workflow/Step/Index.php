<?php

namespace App\Livewire\Workflow\Step;

use App\Models\Workflow;
use App\Models\WorkflowStep;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public Workflow $workflow;

    #[On('reloadSteps')]
    public function render()
    {
        return view('livewire.workflow.step.index', [
            'steps' => $this->workflow->steps,
        ]);
    }

    public function updateStepOrder($steps)
    {
        foreach ($steps as $step) {
            WorkflowStep::whereId($step['value'])->update([
                'order' => $step['order'],
            ]);
        }

        $this->redirect(url: url()->previous(), navigate: true);
    }
}
