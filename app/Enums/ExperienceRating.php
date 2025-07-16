<?php

namespace App\Enums;

enum ExperienceRating: int
{
    case Great = 5;
    case Good = 4;
    case Okay = 3;
    case Bad = 2;
    case Terrible = 1;

    public function label(): string
    {
        return match ($this) {
            self::Great => 'Great',
            self::Good => 'Good',
            self::Okay => 'Okay',
            self::Bad => 'Bad',
            self::Terrible => 'Terrible',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->sortByDesc(fn ($case) => $case->value)
            ->map(fn ($case) => [
                'value' => $case->value,
                'label' => $case->label(),
            ])
            ->values()
            ->all();
    }
}
