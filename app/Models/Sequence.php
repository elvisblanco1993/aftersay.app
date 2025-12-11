<?php

namespace App\Models;

use App\Enums\SequenceStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Sequence extends Model
{
    use Searchable;

    protected $fillable = [
        'tenant_id',
        'workflow_id',
        'link_id',
        'current_step',
        'status',
        'next_run_at',
    ];

    protected $casts = [
        'status' => SequenceStatus::class,
        'next_run_at' => 'datetime',
    ];

    public function toSearchableArray(): array
    {
        return [
            'id' => (string) $this->id,
            'tenant_id' => (string) $this->tenant_id,
            'workflow_id' => (string) $this->workflow_id,
            'name' => (string) $this?->workflow?->name ?? '__NULL__',
            'contact_name' => (string) $this?->contact?->full_name ?? '__NULL__',
            'status' => (string) $this->status->value,
            'created_at' => $this->created_at->timestamp,
        ];
    }

    public function workflow(): BelongsTo
    {
        return $this->belongsTo(Workflow::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(SequenceLog::class);
    }

    public function latestLog(): HasOne
    {
        return $this->hasOne(SequenceLog::class)->latestOfMany();
    }

    public function workflowSteps()
    {
        return $this->hasManyThrough(
            WorkflowStep::class,
            Workflow::class,
            'id',
            'workflow_id',
            'workflow_id',
            'id'
        );
    }
}
