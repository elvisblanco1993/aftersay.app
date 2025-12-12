<?php

namespace App\Livewire\Sequence;

use App\Enums\SequenceStatus;
use App\Models\Contact;
use App\Models\Sequence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Create extends Component
{
    public $workflows;

    public $workflow_id;

    public string $contact_query = '';

    public array $selected_contacts = [];

    public function render()
    {
        $filters = [];
        $filters[] = 'tenant_id:='.Auth::user()->current_tenant_id;

        if ($this->workflow_id) {
            $ids = Sequence::where('workflow_id', $this->workflow_id)->pluck('contact_id')->toArray();
            if (count($ids) > 0) {
                $filters[] = 'id:!=['.implode(',', $ids).']';
            }
        }

        $filters = implode(' && ', $filters);

        $contacts = Contact::search($this->contact_query)
            ->options([
                'filter_by' => $filters,
            ])
            ->take(5)->get();

        return view('livewire.sequence.create', [
            'contacts' => $contacts,
        ]);
    }

    public function save()
    {
        $this->validate([
            'workflow_id' => ['required', 'exists:workflows,id'],
            'selected_contacts' => ['required', 'array', 'min:1'],
            'selected_contacts.*' => ['integer', 'distinct', 'exists:contacts,id'],
        ]);

        try {
            DB::transaction(function () {
                $contacts = Contact::whereIn('id', $this->selected_contacts)->get();
                foreach ($contacts as $contact) {
                    $contact->sequences()->updateOrCreate([
                        'tenant_id' => $contact->tenant_id,
                        'workflow_id' => $this->workflow_id,
                    ], [
                        'contact_id' => $contact->id,
                        'current_step' => 1,
                        'status' => SequenceStatus::Queued->value,
                        'next_run_at' => now()->addSeconds(90),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            });
            session()->flash('flash.banner', 'Sequence queued for selected contacts.');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'There was an error and we could not process your request. Please try again or contact support.');
            session()->flash('flash.bannerStyle', 'danger');
        }

        $this->redirect(url: url()->previous(), navigate: true);
    }

    /**
     * Reset contact selection if no workflow has been selected
     */
    public function updatedSelectedContacts()
    {
        if (! $this->workflow_id) {
            $this->selected_contacts = [];
        }
    }

    /**
     * Reset contact selection if no workflow selected after contacts
     */
    public function updatedWorkflowId()
    {
        if (count($this->selected_contacts) > 0) {
            $this->selected_contacts = [];
        }
    }
}
