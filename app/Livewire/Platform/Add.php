<?php

namespace App\Livewire\Platform;

use App\Models\Platform;
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
        Platform::updateOrCreate(
            [
                'tenant_id' => Auth::user()->current_tenant_id,
                'name' => $this->provider,
            ], ['url' => $this->url]
        );

        $this->redirect(url: url()->previous(), navigate: true);
    }
}
