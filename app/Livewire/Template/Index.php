<?php

namespace App\Livewire\Template;

use App\Models\Template;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    public int $per_page = 15;

    #[Url(except: '')]
    public ?string $query = '';

    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.template.index', [
            'templates' => Template::search($this->query)
                ->where('tenant_id', $this->user->current_tenant_id)
                ->paginate($this->per_page),
        ]);
    }
}
