<?php

namespace App\Enums;

enum ExperienceRating: int
{
    case Great = 3;
    case Okay = 2;
    case Bad = 1;

    public function label(): string
    {
        return match ($this) {
            self::Great => 'Great',
            self::Okay => 'Okay',
            self::Bad => 'Bad',
        };
    }
}
