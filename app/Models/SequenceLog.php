<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SequenceLog extends Model
{
    protected $fillable = [
        'sequence_id',
        'workflow_step_id',
        'action',
        'details',
        'status',
    ];

    public function sequence()
    {
        return $this->belongsTo(Sequence::class);
    }

    public function step()
    {
        return $this->belongsTo(WorkflowStep::class);
    }
}
