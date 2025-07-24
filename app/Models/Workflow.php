<?php

namespace App\Models;

use App\Enums\WorkflowTriggerType;
use App\Models\Scopes\WorkflowScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ScopedBy(WorkflowScope::class)]
class Workflow extends Model
{
    protected $fillable = ['tenant_id', 'name', 'trigger', 'active'];

    protected $casts = [
        'trigger' => WorkflowTriggerType::class,
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(WorkflowStep::class)->orderBy('order');
    }

    public function instances(): HasMany
    {
        return $this->hasMany(WorkflowInstance::class);
    }
}
