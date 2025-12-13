<?php

namespace App\Livewire\Sequence;

use App\Models\Sequence;
use App\Models\Workflow;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(except: '')]
    public string $query = '';

    public int $perPage = 5;

    #[Url(except: 'all')]
    public string $status_filter = 'all';

    #[Url(except: null)]
    public $workflow_filter;

    public $tenantId;

    public function mount()
    {
        $this->tenantId = Auth::user()->current_tenant_id;
    }

    public function render()
    {
        $sequences = Sequence::search($this->query)
            ->where('tenant_id', $this->tenantId)
            ->when($this->status_filter !== 'all', fn ($query) => $query->where('status', $this->status_filter))
            ->when($this->workflow_filter, fn ($query) => $query->where('workflow_id', $this->workflow_filter))
            ->query(function ($builder) {
                $builder->with([
                    'contact',
                    'workflow:id,name',
                    'workflow.steps',
                    'latestLog:id,sequence_logs.sequence_id,workflow_step_id,created_at',
                    'latestLog.workflowStep.template:id,name',
                ])->withCount(['logs', 'workflowSteps']);
            })
            ->paginate($this->perPage);

        return view('livewire.sequence.index', [
            'sequences' => $sequences,
            'workflows' => Workflow::where('tenant_id', $this->tenantId)->where('is_active', 1)->select(['id', 'name'])->get(),
        ]);
    }
}
