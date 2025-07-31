<?php

namespace App\Livewire\Onboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;

class Tenant extends Component
{
    use WithFileUploads;

    public $user;

    public $tenant;

    public $platforms;

    public $page;

    public $business_name;

    public $industry;

    public $country;

    public $website;

    public $phone;

    public $logo;

    public $page_heading;

    public $page_subheading;

    #[Url(except: 1)]
    public $step = 1;

    public function mount()
    {
        $this->user = Auth::user();
        $this->tenant = $this->user->currentTenant;
        $this->platforms = $this->tenant->platforms;
        $this->page = $this->tenant->page;

        $this->business_name = $this->tenant->name;
        $this->industry = $this->tenant->industry;
        $this->country = $this->tenant->country;
        $this->website = $this->tenant->website;
        $this->phone = $this->tenant->phone;
        $this->logo = $this->page?->logo_url;
        $this->page_heading = $this->page->heading;
        $this->page_subheading = $this->page->subheading;

        if ($this->tenant->onboarded_at && $this->page->ready_at) {
            $this->step = 3;
        } elseif ($this->tenant->onboarded_at) {
            $this->step = 2;
        }

    }

    public function save()
    {
        if ($this->step === 1) {
            $this->validate([
                'business_name' => 'required|string|min:2|max:100',
                'industry' => 'required|string|max:50',
                'country' => 'required|string',
                'website' => 'nullable|url|max:255',
                'phone' => ['required'],
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            ]);
        }

        if ($this->step === 2) {
            $this->validate([
                'page_heading' => 'required|string|max:100',
                'page_subheading' => 'required|string|max:200',
            ]);
        }

        if ($this->step === 3 && $this->tenant->platforms()->count() < 1) {
            $this->addError('platforms', 'Please add at least 1 platform link.');

            return;
        }

        DB::transaction(function () {

            if ($this->step === 1) {
                // code...
                $this->tenant->update([
                    'name' => $this->business_name,
                    'industry' => $this->industry,
                    'country' => $this->country,
                    'website' => $this->website,
                    'phone' => $this->phone,
                    'onboarded_at' => now(),
                ]);

                $url = $this->logo ? $this->logo->store("tenant/{$this->page->slug}/logo") : null;

                $this->page->update([
                    'logo' => $url,
                ]);
            }

            if ($this->step === 2) {
                $this->page->update([
                    'heading' => $this->page_heading,
                    'subheading' => $this->page_subheading,
                    'ready_at' => now(),
                ]);
            }
        });

        if ($this->step === 3) {
            $this->redirect(url: route('dashboard'), navigate: true);
        }

    }

    public function render()
    {
        return view('livewire.onboard.tenant');
    }
}
