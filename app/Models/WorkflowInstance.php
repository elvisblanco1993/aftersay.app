<?php

namespace App\Models;

use App\Enums\WorkflowStatus;
use Illuminate\Database\Eloquent\Model;

class WorkflowInstance extends Model
{
    protected $fillable = [
        'workflow_id',
        'link_id',
        'current_step',
        'status',
        'next_run_at',
    ];

    protected $casts = [
        'status' => WorkflowStatus::class,
        'next_run_at' => 'datetime',
    ];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
