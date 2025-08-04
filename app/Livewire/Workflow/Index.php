<?php

namespace App\Livewire\Workflow;

use App\Models\Workflow;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    public int $per_page = 15;

    #[Url(except: '')]
    public ?string $query = '';

    public function render()
    {
        return view('livewire.workflow.index', [
            'workflows' => Workflow::search($this->query)
                ->query(function ($builder) {
                    $builder->withCount('instances');
                })
                ->paginate($this->per_page),
        ]);
    }
}
