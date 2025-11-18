<?php

namespace App\Livewire\Sequence;

use App\Models\Sequence;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $query = '';

    public int $perPage = 15;

    public $tenantId;

    public function mount()
    {
        $this->tenantId = Auth::user()->current_tenant_id;
    }

    public function render()
    {
        $sequences = Sequence::search($this->query)
            ->where('tenant_id', $this->tenantId)
            ->query(function ($builder) {
                $builder->with([
                    'contact',
                    'workflow:id,name',
                ]);
            })
            ->paginate($this->perPage);

        return view('livewire.sequence.index', [
            'sequences' => $sequences,
        ]);
    }
}
