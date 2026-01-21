<?php

namespace App\Livewire\Workflow;

use App\Enums\WorkflowTriggerType;
use App\Models\Workflow;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Duplicate extends Component
{
    public Workflow $workflow;

    #[Rule('required')]
    public $name;

    public function render()
    {
        return view('livewire.workflow.duplicate');
    }

    public function duplicate()
    {
        $this->validate();

        DB::transaction(function () {
            $user = Auth::user();
            $newWorkflow = Workflow::create([
                'tenant_id' => $user->current_tenant_id,
                'trigger' => WorkflowTriggerType::Manual->value,
                'name' => $this->name,
                'is_active' => false,
            ]);

            $this->workflow->steps()->each(function ($step) use ($newWorkflow) {
                $newStep = $step->replicate();
                $newStep->workflow_id = $newWorkflow->id;
                $newStep->save();
            });
        });

        Flux::toast(text: 'Workflow duplicated!', variant: 'success');

        $this->redirect(url: route('workflow.index'), navigate: true);
    }
}
