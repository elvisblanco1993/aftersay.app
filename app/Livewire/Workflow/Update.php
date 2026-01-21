<?php

namespace App\Livewire\Workflow;

use App\Models\Workflow;
use Flux\Flux;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Update extends Component
{
    public Workflow $workflow;

    #[Rule('required')]
    public $name;

    public bool $is_active = false;

    public function mount()
    {
        $this->name = $this->workflow->name;
        $this->is_active = $this->workflow->is_active->toBool();
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
            'is_active' => $this->is_active,
        ]);

        Flux::toast(text: 'Workflow updated!', variant: 'success');

        $this->redirect(url: url()->previous(), navigate: true);
    }
}
