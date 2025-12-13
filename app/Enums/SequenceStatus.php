<?php

namespace App\Enums;

enum SequenceStatus: string
{
    case Queued = 'queued';
    case Running = 'running';
    case Paused = 'paused';
    case Completed = 'completed';
    case Failed = 'failed';

    public function label(): string
    {
        return match ($this) {
            self::Queued => 'Queued',
            self::Running => 'Running',
            self::Paused => 'Paused',
            self::Completed => 'Completed',
            self::Failed => 'Failed',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Queued => 'zinc',
            self::Running => 'blue',
            self::Paused => 'yellow',
            self::Completed => 'green',
            self::Failed => 'red',
        };
    }

    public function is(SequenceStatus $status): bool
    {
        return $this === $status;
    }

    public function timestamp(\App\Models\Sequence $sequence)
    {
        return match ($this) {
            self::Queued => $sequence->next_run_at,
            self::Running => $sequence->created_at,
            self::Paused => $sequence->created_at,
            self::Completed => $sequence->updated_at,
            self::Failed => $sequence->updated_at,
        };
    }
}
