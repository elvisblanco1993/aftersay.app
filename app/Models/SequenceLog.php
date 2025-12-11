<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SequenceLog extends Model
{
    protected $fillable = [
        'sequence_id',
        'workflow_step_id',
        'action',
        'details',
        'status',
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
}
