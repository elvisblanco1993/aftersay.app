<?php

namespace App\Livewire\Workflow;

use App\Enums\WorkflowTriggerType;
use App\Models\Workflow;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    #[Rule('required')]
    public $name;

    public function render()
    {
        return view('livewire.workflow.create');
    }

    public function save()
    {
        $this->validate();
        $user = Auth::user();

        $workflow = Workflow::create([
            'tenant_id' => $user->current_tenant_id,
            'trigger' => WorkflowTriggerType::Manual->value,
            'name' => $this->name,
            'is_active' => false,
        ]);

        Flux::toast(text: 'Workflow created!', variant: 'success');

        $this->redirect(url: route('workflow.show', ['workflow' => $workflow]), navigate: false);
    }
}
