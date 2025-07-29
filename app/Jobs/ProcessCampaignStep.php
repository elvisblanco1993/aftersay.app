<?php

namespace App\Jobs;

use App\Enums\WorkflowActionType;
use App\Enums\WorkflowStatus;
use App\Models\WorkflowInstance;
use App\Models\WorkflowLog;
use App\Notifications\SendMessage;
use Carbon\Carbon;
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
                $recipient = $campaign->contact;
                $step = $workflow->steps()->where('order', $campaign->current_step)->first();

                // Send Email or SMS
                if ($step) {
                    if ($step->action->value === WorkflowActionType::SendEmail->value) {
                        $recipient->notify(new SendMessage($step, 'mail'));
                    }
                    if ($step->action->value === WorkflowActionType::SendSms->value) {
                        $recipient->notify(new SendMessage($step, 'twilio'));
                    }
                }

                // TODO:
                // Set the next current_step
                $nextStep = $workflow->steps()->where('order', ($campaign->current_step + 1))->first();
                if ($nextStep) {
                    $delay = $nextStep->delay;
                    $delayUnit = $nextStep->delay_unit;
                    $baseDate = Carbon::parse($step->next_run_at ?? now());
                    $nextRunAt = match ($delayUnit) {
                        'minutes' => $baseDate->copy()->addMinutes($delay),
                        'hours' => $baseDate->copy()->addHours($delay),
                        'days' => $baseDate->copy()->addDays($delay),
                        default => $baseDate,
                    };

                    // Update workflow_instance
                    $campaign->update([
                        'current_step' => $nextStep->id,
                        'next_run_at' => $nextRunAt,
                        'status' => WorkflowStatus::Running->value,
                    ]);
                } else {
                    $campaign->update([
                        'status' => WorkflowStatus::Completed->value,
                    ]);
                }

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
