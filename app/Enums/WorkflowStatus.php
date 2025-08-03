<?php

namespace App\Enums;

enum WorkflowStatus: string
{
    case Running = 'running';
    case Paused = 'paused';
    case Completed = 'completed';
    case Failed = 'failed';

    public function label(): string
    {
        return match ($this) {
            self::Running => 'Running',
            self::Paused => 'Paused',
            self::Completed => 'Completed',
            self::Failed => 'Failed',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Running => 'green',
            self::Paused => 'yellow',
            self::Completed => 'blue',
            self::Failed => 'red',
        };
    }
}
