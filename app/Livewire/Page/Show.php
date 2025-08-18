<?php

namespace App\Livewire\Page;

use App\Enums\WorkflowStatus;
use App\Models\Concern;
use App\Models\Contact;
use App\Models\Page;
use Livewire\Attributes\Url;
use Livewire\Component;

class Show extends Component
{
    public $page;

    #[Url(except: '')]
    public $rating;

    public $links;

    public $contact;

    public $feedback_comment;

    public $feedback_email;

    public function mount($slug)
    {
        $this->page = Page::where('slug', $slug)->firstOrFail();
        $this->updatedRating();
        $this->contact = request(key: 'ref');
    }

    public function render()
    {
        return view('livewire.page.show')
            ->layout('components.layouts.business-page', [
                'title' => 'How did we do? | '.$this->page->tenant->name,
            ]);
    }

    public function saveFeedback()
    {
        $this->validate([
            'feedback_comment' => ['required', 'min:20'],
        ], [
            'feedback_comment.*' => 'Please give us a bit more information to work with.',
        ]);

        Concern::create([
            'tenant_id' => $this->page->tenant_id,
            'content' => $this->feedback_comment,
            'contact_id' => $this->contact ? Contact::where('ulid', $this->contact)->first()?->id : null,
            'contact_email' => $this->feedback_email,
        ]);

        // End campaign - No more automated emails
        if ($this->contact && $contact = Contact::where('ulid', $this->contact)->first()) {
            $contact->workflowInstance->update([
                'status' => WorkflowStatus::Completed->value,
                'next_run_at' => null,
            ]);
        }

        // TODO: Redirect to Thank You page.

    }

    public function updatedRating()
    {
        if ($this->rating > 2) {
            $this->links = optional($this->page->tenant)->platforms ?? [];
        }
    }
}
