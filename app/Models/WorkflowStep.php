<?php

namespace App\Models;

use App\Enums\WorkflowActionType;
use Illuminate\Database\Eloquent\Model;

class WorkflowStep extends Model
{
    protected $fillable = ['workflow_id', 'order', 'action', 'parameters'];

    protected $casts = [
        'action' => WorkflowActionType::class,
        'parameters' => 'array',
    ];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }
}
