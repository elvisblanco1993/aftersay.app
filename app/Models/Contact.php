<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use Notifiable;

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function workflowInstance(): HasOne
    {
        return $this->hasOne(WorkflowInstance::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function concerns(): HasMany
    {
        return $this->hasMany(Concern::class);
    }
}
