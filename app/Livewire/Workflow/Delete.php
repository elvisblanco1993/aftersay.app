<?php

namespace App\Livewire\Workflow;

use App\Models\Workflow;
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
            session()->flash('flash.banner', 'This workflow cannot be deleted because there are contacts with active sequences.');
            session()->flash('flash.bannerStyle', 'danger');
            $this->redirect(url: url()->previous(), navigate: true);
        } else {
            $this->workflow->delete();
            session()->flash('flash.banner', 'Workflow deleted!');
            session()->flash('flash.bannerStyle', 'success');
            $this->redirect(url: route('workflow.index'), navigate: true);
        }
    }
}
