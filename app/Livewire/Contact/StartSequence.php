<?php

namespace App\Livewire\Contact;

use App\Enums\SequenceStatus;
use App\Models\Contact;
use App\Models\Workflow;
use Flux\Flux;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class StartSequence extends Component
{
    public $contact = null;

    public $workflows;

    public int $workflow_id;

    public function mount()
    {
        $this->workflows = Workflow::get();
    }

    #[On('start-sequence')]
    public function startSequence($contact_id)
    {
        $this->contact = Contact::findOrFail($contact_id);
        Flux::modal('start-sequence')->show();
    }

    public function save()
    {
        $this->validate([
            'workflow_id' => ['required', Rule::in(Workflow::pluck('id')->toArray())],
        ], [
            'workflow_id' => 'Please select a workflow.',
        ]);

        try {
            $this->contact->sequences()->updateOrCreate([
                'tenant_id' => $this->contact->tenant_id,
                'workflow_id' => $this->workflow_id,
            ], [
                'contact_id' => $this->contact->id,
                'current_step' => 1,
                'status' => SequenceStatus::Running->value,
                'next_run_at' => now()->ceilMinute(5),
            ]);
            session()->flash('flash.banner', $this->contact->name.' messages will start processing soon.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'There was an error and we could not process your request. Please try again or contact support.');
            session()->flash('flash.bannerStyle', 'danger');
        }

        $this->redirect(url: url()->previous(), navigate: true);
    }

    public function render()
    {
        return view('livewire.contact.start-sequence');
    }
}
