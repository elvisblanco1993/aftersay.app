<?php

namespace App\Livewire\Workflow;

use App\Models\Workflow;
use Flux\Flux;
use Livewire\Component;

class Delete extends Component
{
    public Workflow $workflow;

    public function render()
    {
        return view('livewire.workflow.delete');
    }

    public function delete()
    {
        if ($this->workflow->instances->count() > 0) {
            Flux::toast(text: 'This workflow cannot be deleted because there are contacts with active sequences.', variant: 'danger');
            $this->redirect(url: url()->previous(), navigate: true);
        } else {
            $this->workflow->delete();
            Flux::toast(text: 'Workflow deleted!', variant: 'success');
            $this->redirect(url: route('workflow.index'), navigate: true);
        }
    }
}
