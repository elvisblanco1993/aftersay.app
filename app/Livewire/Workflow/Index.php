<?php

namespace App\Livewire\Workflow;

use App\Models\Workflow;
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
        return view('livewire.workflow.index', [
            'workflows' => Workflow::search($this->query)
                ->where('tenant_id', $this->user->current_tenant_id)
                ->query(function ($builder) {
                    $builder->withCount('instances');
                })
                ->paginate($this->per_page),
        ]);
    }
}
