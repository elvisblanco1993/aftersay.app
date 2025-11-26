<?php

namespace App\Livewire\Concern;

use App\Models\Concern;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public string $query = '';

    public int $perPage = 15;

    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.concern.index', [
            'concerns' => Concern::search($this->query)->where('tenant_id', $this->user->current_tenant_id)->paginate($this->perPage),
        ]);
    }
}
