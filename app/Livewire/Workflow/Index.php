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

    #[Url(except: '')]
    public ?string $status_filter = '';

    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        $isActive = match ($this->status_filter) {
            'active' => true,
            'draft' => false,
            default => null,
        };

        return view('livewire.workflow.index', [
            'workflows' => Workflow::search($this->query)
                ->where('tenant_id', $this->user->current_tenant_id)
                ->when($isActive !== null, fn ($builder) => $builder->where('is_active', $isActive)
                )
                ->query(function ($builder) {
                    $builder->withCount(['instances', 'steps', 'contacts']);
                })
                ->paginate($this->per_page),
        ]);
    }
}
