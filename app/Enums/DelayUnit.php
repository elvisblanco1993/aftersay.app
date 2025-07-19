<?php

namespace App\Enums;

enum DelayUnit: string
{
    case Minutes = 'minutes';
    case Hours = 'hours';
    case Days = 'days';

    public function label(): string
    {
        return ucfirst($this->value);
    }
}
