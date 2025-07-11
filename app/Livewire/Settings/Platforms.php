<?php

namespace App\Livewire\Settings;

use App\Models\Platform;
use App\Services\Search\SearchProviderFactory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Platforms extends Component
{
    public $user;

    public $tenant;

    public ?string $provider = '';

    public ?string $business_search;

    public $business_results = [];

    public $selected_place_id;

    public function mount()
    {
        $this->user = Auth::user();
        $this->tenant = $this->user->currentTenant;
    }

    public function render()
    {
        return view('livewire.settings.platforms', [
            'platforms' => $this->tenant->platforms,
        ]);
    }

    public function savePlatform()
    {
        Platform::updateOrCreate(
            [
                'tenant_id' => Auth::user()->current_tenant_id,
                'name' => $this->provider,
            ], [
                'url' => config('services.google.places_review_url').$this->selected_place_id,
            ],
        );

        $this->redirect(url: url()->previous(), navigate: true);
    }

    public function updatedBusinessSearch()
    {
        if ($this->provider) {
            $service = SearchProviderFactory::make($this->provider);
            $this->business_results = collect($service->search($this->business_search))
                ->map(fn ($result) => $result->toArray())
                ->all();
        }
    }
}
