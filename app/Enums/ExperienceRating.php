<?php

namespace App\Enums;

enum ExperienceRating: int
{
    case Great = 4;
    case Good = 3;
    case Okay = 2;
    case Bad = 1;

    public function label(): string
    {
        return match ($this) {
            self::Great => 'Great',
            self::Good => 'Good',
            self::Okay => 'Okay',
            self::Bad => 'Bad',
        };
    }

    public function emoji(): string
    {
        return match ($this) {
            self::Great => '😍',
            self::Good => '😀',
            self::Okay => '🫤',
            self::Bad => '😔',
        };
    }
}
