<?php

namespace App\Jobs;

use App\Enums\WorkflowActionType;
use App\Models\WorkflowInstance;
use App\Models\WorkflowLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

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
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->campaigns as $campaign) {
            $details = null;
            $status = null;

            try {
                $workflow = $campaign->workflow;
                $recipient = $campaign->contact->email;
                $step = $workflow->steps()->where('order', $campaign->current_step)->sole();

                // Send Email or SMS
                if ($step) {
                    if ($step->action === WorkflowActionType::SendEmail->value) {
                        // Send Email...
                    }
                    if ($step->action === WorkflowActionType::SendSms->value) {
                        // Send SMS...
                    }
                }

                // TODO:
                // Set the next current_step
                // Set the  date and time of the next_run_at
                // Update workflow_instance

                $status = 'success';
            } catch (\Throwable $th) {
                Log::error($th);
                $details = $th;
                $status = 'error';
            }

            // Log the instance run
            WorkflowLog::create([
                'workflow_instance_id' => $campaign->id,
                'workflow_step_id' => $step?->id,
                'action' => $step->action,
                'status' => $status,
                'details' => $details,
            ]);
        }
    }
}
