<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowLog extends Model
{
    protected $fillable = [
        'workflow_instance_id',
        'workflow_step_id',
        'action',
        'details',
        'status',
    ];

    public function instance()
    {
        return $this->belongsTo(WorkflowInstance::class);
    }

    public function step()
    {
        return $this->belongsTo(WorkflowStep::class);
    }
}
