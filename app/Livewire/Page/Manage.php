<?php

namespace App\Livewire\Page;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Manage extends Component
{
    use WithFileUploads;

    public $tenant;

    public $page;

    public $slug;

    public $url;

    public $heading;

    public $subheading;

    public $logo;

    public function mount()
    {
        $this->tenant = Auth::user()->currentTenant;
        $this->page = $this->tenant->page;
        $this->url = route('review-page.show', ['slug' => $this->page->slug]);
        $this->heading = $this->page->heading;
        $this->subheading = $this->page->subheading;
    }

    public function render()
    {
        return view('livewire.page.manage');
    }

    public function save()
    {
        $this->validate([
            'heading' => ['required', 'string'],
            'subheading' => ['required', 'string'],
            'logo' => ['nullable', Rule::imageFile(allowSvg: true)],
        ]);

        if ($this->logo) {
            if ($this->tenant->logo) {
                Storage::delete($this->tenant->logo);
            }
            $url = $this->logo->store("tenant/{$this->page->slug}/logo");
        } else {
            $url = $this->page->logo;
        }

        $this->page->update([
            'heading' => $this->heading,
            'subheading' => $this->subheading,
            'logo' => $url,
        ]);
        Cache::forget("logo_url:{$this->page->id}");

        $this->dispatch('saved-page');
    }
}
