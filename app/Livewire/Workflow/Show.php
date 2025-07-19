<?php

namespace App\Livewire\Workflow;

use App\Models\Workflow;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $workflow;

    public function mount(Workflow $workflow)
    {
        $user = Auth::user();
        if ($workflow->tenant_id !== $user->current_tenant_id) {
            abort(404);
        }

        $this->workflow = $workflow;
    }

    public function render()
    {
        return view('livewire.workflow.show');
    }
}
