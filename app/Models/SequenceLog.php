<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SequenceLog extends Model
{
    protected $casts = [
        'first_opened_at' => 'datetime',
    ];

    public function sequence(): BelongsTo
    {
        return $this->belongsTo(Sequence::class);
    }

    public function step(): BelongsTo
    {
        return $this->belongsTo(WorkflowStep::class);
    }

    public function workflowStep(): BelongsTo
    {
        return $this->belongsTo(WorkflowStep::class);
    }

    public function opens(): HasMany
    {
        return $this->hasMany(EmailOpen::class);
    }
}
