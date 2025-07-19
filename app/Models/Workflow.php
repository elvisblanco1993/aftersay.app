<?php

namespace App\Models;

use App\Enums\WorkflowTriggerType;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    protected $fillable = ['tenant_id', 'name', 'trigger', 'active'];

    protected $casts = [
        'trigger' => WorkflowTriggerType::class,
    ];

    public function steps()
    {
        return $this->hasMany(WorkflowStep::class)->orderBy('order');
    }

    public function instances()
    {
        return $this->hasMany(WorkflowInstance::class);
    }
}
