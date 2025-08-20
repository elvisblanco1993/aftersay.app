<?php

namespace App\Models;

use App\Enums\WorkflowTriggerType;
use App\Models\Scopes\WorkflowScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

#[ScopedBy(WorkflowScope::class)]
class Workflow extends Model
{
    use Searchable;

    protected $fillable = ['tenant_id', 'name', 'trigger', 'active'];

    protected $casts = [
        'trigger' => WorkflowTriggerType::class,
    ];

    public function toSearchableArray()
    {
        return [
            'id' => (string) $this->id,
            'tenant_id' => (string) $this->tenant_id,
            'name' => (string) $this->name,
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
        return $this->hasMany(Campaign::class);
    }
}
