<?php

namespace App\Enums;

enum ArticleStatus: string
{
    case Queued = 'queued';
    case Draft = 'draft';
    case Scheduled = 'scheduled';
    case Published = 'published';

    public function label(): string
    {
        return match ($this) {
            self::Queued => 'Queued',
            self::Draft => 'Draft',
            self::Scheduled => 'Scheduled',
            self::Published => 'Published',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Queued => 'blue',
            self::Draft => 'zinc',
            self::Scheduled => 'yellow',
            self::Published => 'green',
        };
    }
}
