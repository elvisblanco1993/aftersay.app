<?php

namespace App\Livewire\Workflow;

use App\Models\Workflow;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Update extends Component
{
    public Workflow $workflow;

    #[Rule('required')]
    public $name;

    public function mount()
    {
        $this->name = $this->workflow->name;
    }

    public function render()
    {
        return view('livewire.workflow.update');
    }

    public function save()
    {
        $this->validate();

        $this->workflow->update([
            'name' => $this->name,
        ]);

        $this->redirect(url: url()->previous(), navigate: true);
    }
}
