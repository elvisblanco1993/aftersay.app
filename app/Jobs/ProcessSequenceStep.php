<?php

namespace App\Jobs;

use App\Actions\ParseMessageContent;
use App\Enums\SequenceStatus;
use App\Models\Sequence;
use App\Models\SequenceLog;
use App\Notifications\SendMessage;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ProcessSequenceStep implements ShouldQueue
{
    use Queueable;

    public $sequences;

    /**
     * Create a new job instance.
     */
    public function __construct(array $step_ids)
    {
        $this->sequences = Sequence::whereIn('id', $step_ids)->get();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->sequences as $sequence) {
            $details = null;
            $status = null;

            try {
                $workflow = $sequence->workflow;
                $recipient = $sequence->contact;
                $step = $workflow->steps()->where('order', $sequence->current_step)->first();

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
                $nextStep = $workflow->steps()->where('order', ($sequence->current_step + 1))->first();
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

                    // Update sequence
                    $sequence->update([
                        'current_step' => $nextStep->id,
                        'next_run_at' => $nextRunAt,
                        'status' => SequenceStatus::Running->value,
                    ]);
                } else {
                    $sequence->update([
                        'status' => SequenceStatus::Completed->value,
                    ]);
                }

                $status = 'success';
            } catch (\Throwable $th) {
                Log::error($th);
                $details = $th;
                $status = 'error';
            }

            // Log the instance run
            SequenceLog::create([
                'sequence_id' => $sequence->id,
                'workflow_step_id' => $step?->id,
                'action' => $step->action,
                'status' => $status,
                'details' => $details,
            ]);
        }
    }
}
