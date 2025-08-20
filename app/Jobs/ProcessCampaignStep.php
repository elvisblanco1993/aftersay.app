<?php

namespace App\Jobs;

use App\Actions\ParseMessageContent;
use App\Enums\CampaignStatus;
use App\Models\Campaign;
use App\Models\CampaignLog;
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
        $this->campaigns = Campaign::whereIn('id', $step_ids)->get();
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

                // Send Email
                $content = $step->template_id ? $step->template->body : $step->custom_message;

                // Parse message shortcodes.
                $content = (new ParseMessageContent)(
                    content: $content,
                    contact: $recipient,
                    tenant: $recipient->tenant,
                );

                $recipient->notify(
                    new SendMessage(
                        step: $step,
                        contact: $recipient,
                        content: $content
                    )
                );

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

                    // Update campaign
                    $campaign->update([
                        'current_step' => $nextStep->id,
                        'next_run_at' => $nextRunAt,
                        'status' => CampaignStatus::Running->value,
                    ]);
                } else {
                    $campaign->update([
                        'status' => CampaignStatus::Completed->value,
                    ]);
                }

                $status = 'success';
            } catch (\Throwable $th) {
                Log::error($th);
                $details = $th;
                $status = 'error';
            }

            // Log the instance run
            CampaignLog::create([
                'campaign_id' => $campaign->id,
                'workflow_step_id' => $step?->id,
                'action' => $step->action,
                'status' => $status,
                'details' => $details,
            ]);
        }
    }
}
