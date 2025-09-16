<?php

namespace App\Enums;

enum ConcernStatus: string
{
    case New = 'new';
    case Resolved = 'resolved';

    public function label(): string
    {
        return match ($this) {
            self::New => 'New',
            self::Resolved => 'Resolved'
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::New => 'red',
            self::Resolved => 'green'
        };
    }
}
