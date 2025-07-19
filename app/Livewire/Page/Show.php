<?php

namespace App\Livewire\Page;

use App\Models\Contact;
use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.business-page')]
class Show extends Component
{
    public $page;

    public ?Contact $contact;

    public $rating;

    public $links;

    public function mount($slug)
    {
        $this->page = Page::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.page.show');
    }

    public function saveFeedback()
    {
        //
    }

    public function updatedRating()
    {
        if ($this->rating > 2) {
            $this->links = optional($this->page->tenant)->platforms ?? [];
        }
    }
}
