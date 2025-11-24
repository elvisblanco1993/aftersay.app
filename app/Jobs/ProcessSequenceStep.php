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

    public array $sequence_ids;

    public function __construct(array $sequence_ids)
    {
        $this->sequence_ids = $sequence_ids;
    }

    public function handle(): void
    {
        $sequences = Sequence::whereIn('id', $this->sequence_ids)->get();

        foreach ($sequences as $sequence) {
            try {
                $workflow = $sequence->workflow;
                $recipient = $sequence->contact;

                // Current step (safe lookup)
                $step = $workflow->steps()
                    ->where('order', $sequence->current_step)
                    ->first();

                if (! $step) {
                    // If the step doesn't exist, mark as failed.
                    $sequence->update([
                        'status' => SequenceStatus::Failed->value,
                    ]);

                    continue;
                }

                // Resolve template / custom message
                $content = $step->template_id
                    ? $step->template?->body
                    : $step->custom_message;

                // Process shortcodes
                $content = (new ParseMessageContent)(
                    content: $content,
                    contact: $recipient,
                    tenant: $recipient->tenant
                );

                // Send notification
                $recipient->notify(
                    new SendMessage(
                        step: $step,
                        contact: $recipient,
                        content: $content
                    )
                );

                /**
                 * Advance to the next step
                 */
                $nextStep = $workflow->steps()
                    ->where('order', $sequence->current_step + 1)
                    ->first();

                if ($nextStep) {
                    $delay = $nextStep->delay;
                    $delayUnit = $nextStep->delay_unit;
                    $baseDate = Carbon::parse($sequence->next_run_at ?? now());

                    $nextRunAt = match ($delayUnit) {
                        'minutes' => $baseDate->copy()->addMinutes($delay),
                        'hours' => $baseDate->copy()->addHours($delay),
                        'days' => $baseDate->copy()->addDays($delay),
                        default => $baseDate,
                    };

                    $sequence->update([
                        'current_step' => $nextStep->order,
                        'next_run_at' => $nextRunAt,
                        'status' => SequenceStatus::Running->value,
                    ]);
                } else {
                    // No next step → sequence completed
                    $sequence->update([
                        'status' => SequenceStatus::Completed->value,
                        'next_run_at' => null,
                    ]);
                }

                /**
                 * Log only successful actions
                 */
                SequenceLog::create([
                    'sequence_id' => $sequence->id,
                    'workflow_step_id' => $step->id,
                    'action' => $step->action,
                    'status' => 'success', // Only business activity statuses
                    'details' => null,
                ]);
            } catch (\Throwable $th) {

                // Only log error to system log — NOT to SequenceLog
                Log::error($th);

                // Mark as failed
                $sequence->update([
                    'status' => SequenceStatus::Failed->value,
                ]);
            }
        }
    }
}
