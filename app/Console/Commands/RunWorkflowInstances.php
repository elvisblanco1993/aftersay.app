<?php

namespace App\Console\Commands;

use App\Enums\WorkflowStatus;
use App\Jobs\ProcessCampaignStep;
use App\Models\WorkflowInstance;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class RunWorkflowInstances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaign:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Processes any running Workflow Instances.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now()->startOfMinute();
        $nextMinute = (clone $now)->addMinute();
        WorkflowInstance::where('status', WorkflowStatus::Running->value)
            ->whereBetween('next_run_at', [$now, $nextMinute])
            ->chunkById(10, function ($campaigns) {
                ProcessCampaignStep::dispatch($campaigns->pluck('id')->toArray());
            });

        return Command::SUCCESS;
    }
}
