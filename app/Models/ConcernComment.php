<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConcernComment extends Model
{
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function concern(): BelongsTo
    {
        return $this->belongsTo(Concern::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
