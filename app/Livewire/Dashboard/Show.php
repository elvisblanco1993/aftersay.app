<?php

namespace App\Livewire\Dashboard;

use App\Enums\SequenceStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $chart = [
        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        'series' => [
            [
                'name' => 'Views',
                'data' => [45, 55, 75, 25, 45, 110],
            ],
            [
                'name' => 'Previous',
                'data' => [30, 40, 60, 20, 30, 90],
            ],
        ],
    ];

    public function render()
    {
        $tenant = Auth::user()->currentTenant;

        return view('livewire.dashboard.show', [
            'contacts' => $tenant->contacts()->count(),
            'sequences' => $tenant->sequences->where('status', '!=', SequenceStatus::Completed)->count(),
            'linkClicks' => $tenant->linkClicks()->count(),
            'concerns' => $tenant->concerns()->count(),
            'testimonials' => $tenant->testimonials()->count(),
        ]);
    }
}
