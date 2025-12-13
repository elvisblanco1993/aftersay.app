<?php

namespace App\Models;

use App\Enums\WorkFlowStatus;
use App\Enums\WorkflowTriggerType;
use App\Models\Scopes\WorkflowScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Laravel\Scout\Searchable;

#[ScopedBy(WorkflowScope::class)]
class Workflow extends Model
{
    use Searchable;

    protected $fillable = ['tenant_id', 'name', 'trigger', 'active'];

    protected $casts = [
        'trigger' => WorkflowTriggerType::class,
        'is_active' => WorkFlowStatus::class,
    ];

    public function toSearchableArray()
    {
        return [
            'id' => (string) $this->id,
            'tenant_id' => (string) $this->tenant_id,
            'name' => (string) $this->name,
            'is_active' => (bool) $this->is_active,
            'created_at' => $this->created_at->timestamp,
        ];
    }

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
        return $this->hasMany(Sequence::class);
    }

    public function contacts(): HasManyThrough
    {
        return $this->hasManyThrough(Contact::class, Sequence::class, 'workflow_id', 'id', 'id', 'contact_id');
    }
}
