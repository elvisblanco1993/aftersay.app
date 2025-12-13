<?php

namespace App\Support;

use Illuminate\Support\Facades\URL;

class EmailTracking
{
    public static function pixelUrl(string $token): string
    {
        return URL::signedRoute(
            'email.pixel',
            ['token' => $token]
        );
    }
}
