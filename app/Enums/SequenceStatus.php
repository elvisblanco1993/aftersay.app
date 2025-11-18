<?php

namespace App\Enums;

enum SequenceStatus: string
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
            self::Running => 'blue',
            self::Paused => 'yellow',
            self::Completed => 'green',
            self::Failed => 'red',
        };
    }
}
