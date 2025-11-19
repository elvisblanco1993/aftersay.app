<?php

namespace App\Livewire\Page;

use App\Models\Contact;
use App\Models\Page;
use App\Models\Testimonial as TestimonialModel;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Testimonial extends Component
{
    use WithFileUploads;

    public $page;

    public $contact;

    public bool $showBranding = false;

    public $title;

    public $content;

    public $author_name;

    public $author_title;

    public $company;

    public $headshot;

    public bool $terms = false;

    public function mount($slug)
    {
        $this->page = Page::where('slug', $slug)->firstOrFail();

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
        return view('livewire.page.testimonial')
            ->layout('components.layouts.business-page', [
                'title' => 'Share Your Experience - Customer Testimonial | '.$this->page->tenant->name,
            ]);
    }

    public function save()
    {

        $this->validate([
            'title' => ['required'],
            'content' => ['required', 'min:50'],
            'author_name' => ['required'],
            'headshot' => ['nullable', 'image', 'max:51200'], // 50mb
            'terms' => ['accepted', 'required'],
        ]);

        try {

            $contact = Contact::where('ulid', $this->contact)->first() ?: null;

            $headshot_url = $this->headshot ? $this->headshot->store("tenant/{$this->page->slug}/testimonials") : null;

            TestimonialModel::create([
                'tenant_id' => $this->page->tenant_id,
                'contact_id' => $this->contact ? $contact->id : null,
                'title' => $this->title,
                'content' => $this->content,
                'author_name' => $this->author_name,
                'author_title' => $this->author_title,
                'company' => $this->company,
                'headshot_url' => $headshot_url,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }

        $this->redirect(url: route('review-page.completed', ['slug' => $this->page->slug]), navigate: true);
    }
}
