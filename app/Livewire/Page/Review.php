<?php

namespace App\Livewire\Page;

use App\Enums\SequenceStatus;
use App\Models\Concern;
use App\Models\Contact;
use App\Models\Page;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Url;
use Livewire\Component;

class Review extends Component
{
    public $page;

    #[Url(except: null)]
    public $rating;

    public $links;

    public $contact;

    public $feedback_comment;

    public $feedback_name;

    public $feedback_email;

    public $showBranding;

    public function mount($slug)
    {
        $this->page = Page::where('slug', $slug)->firstOrFail();
        $this->updatedRating();
        $this->contact = request(key: 'ref');

        $tenant = $this->page->tenant;
        $subscription = $tenant->subscription('default');

        $this->showBranding = ! $subscription
            || ($subscription
            && ($subscription->onTrial() || $subscription->active())
            && ($tenant->planConfig()['show_powered_by'] ?? false));

    }

    public function render()
    {
        return view('livewire.page.review')
            ->layout('components.layouts.business-page', [
                'title' => 'How did we do? | '.$this->page->tenant->name,
            ]);
    }

    public function saveFeedback()
    {
        $this->validate([
            'feedback_comment' => ['required', 'min:20'],
        ], [
            'feedback_comment.*' => 'Please give us a bit more information.',
        ]);

        try {
            $contact = Contact::where('ulid', $this->contact)->first() ?: null;

            Concern::create([
                'tenant_id' => $this->page->tenant_id,
                'rating' => $this->rating,
                'content' => $this->feedback_comment,
                'contact_id' => $this->contact ? $contact->id : null,
                'contact_email' => $this->contact ? $contact?->email : $this->feedback_email,
                'contact_name' => $this->contact ? $contact?->full_name : $this->feedback_name,
            ]);

            // End sequence - No more automated emails
            if ($this->contact && $contact = Contact::where('ulid', $this->contact)->first()) {
                $contact->sequence->update([
                    'status' => SequenceStatus::Completed,
                    'next_run_at' => null,
                ]);
            }
        } catch (\Throwable $th) {
            Log::error($th);
        }

        $this->redirect(url: route('review-page.completed', ['slug' => $this->page->slug]), navigate: true);
    }

    public function updatedRating()
    {
        if ($this->rating > 2) {
            $this->links = optional($this->page->tenant)->platforms ?? [];
        }
    }
}
