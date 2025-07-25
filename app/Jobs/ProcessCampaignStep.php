<?php

namespace App\Jobs;

use App\Models\WorkflowInstance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessCampaignStep implements ShouldQueue
{
    use Queueable;

    public $campaigns;

    /**
     * Create a new job instance.
     */
    public function __construct(array $step_ids)
    {
        $this->campaigns = WorkflowInstance::whereIn('id', $step_ids)->get();
        dd($this->campaigns);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
