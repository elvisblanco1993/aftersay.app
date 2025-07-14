<?php

namespace App\Livewire\Page;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.business-page')]
class Show extends Component
{
    public $page;

    public function mount($slug)
    {
        $this->page = Page::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.page.show');
    }
}
