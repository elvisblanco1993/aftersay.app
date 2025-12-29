<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Platform extends Model
{
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function getIcon()
    {
        $url = "https://cdn.simpleicons.org/{$this->name}";

        $response = Http::get($url);
        $iconUrl = null;
        if ($response->successful()) {
            $iconUrl = Cache::remember(
                "simpleicon:url:{$this->name}",
                now()->addDays(30),
                fn () => "https://cdn.simpleicons.org/{$this->name}"
            );
        }

        return $iconUrl;
    }
}
