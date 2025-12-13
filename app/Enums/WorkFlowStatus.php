<?php

namespace App\Enums;

enum WorkFlowStatus: int
{
    case Active = 1;
    case Draft = 0;

    public function label(): string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Draft => 'Draft',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Active => 'green',
            self::Draft => 'zinc',
        };
    }

    public function toBool(): bool
    {
        return $this === self::Active;
    }
}
