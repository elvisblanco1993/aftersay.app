<?php

namespace App\Livewire\Platform;

use App\Models\Platform;
use App\Services\Search\SearchProviderFactory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Add extends Component
{
    public ?string $provider = '';

    public ?string $business_search;

    public $business_results = [];

    public $selected_place_id;

    public $url;

    public function render()
    {
        return view('livewire.platform.add');
    }

    public function savePlatform()
    {
        $url = $this->provider === 'google' ? config('services.google.places_review_url').$this->selected_place_id : $this->url;

        Platform::updateOrCreate(
            [
                'tenant_id' => Auth::user()->current_tenant_id,
                'name' => $this->provider,
            ], [
                'url' => $url,
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
