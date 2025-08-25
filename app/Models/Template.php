<?php

namespace App\Models;

use App\Enums\TemplateStatus;
use App\Enums\TemplateType;
use App\Models\Scopes\TemplateScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

#[ScopedBy(TemplateScope::class)]
class Template extends Model
{
    use Searchable;

    protected $casts = [
        'type' => TemplateType::class,
        'status' => TemplateStatus::class,
    ];

    public function toSearchableArray()
    {
        return [
            'id' => (string) $this->id,
            'tenant_id' => (string) $this->tenant_id,
            'name' => (string) $this->name,
            'type' => (string) $this->type?->value,
            'subject' => (string) $this->subject,
            'created_at' => $this->created_at->timestamp,
        ];
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(WorkflowStep::class);
    }
}
