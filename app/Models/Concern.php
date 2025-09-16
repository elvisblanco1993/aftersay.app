<?php

namespace App\Models;

use App\Enums\ConcernStatus;
use App\Models\Scopes\ConcernScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ScopedBy(ConcernScope::class)]
class Concern extends Model
{
    protected function casts(): array
    {
        return [
            'status' => ConcernStatus::class,
        ];
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => (string) $this->id,
            'tenant_id' => (string) $this->tenant_id,
            'contact_name' => (string) $this->contact_name ?: $this?->contact?->full_name,
            'contact_email' => (string) $this->contact_email ?: $this?->contact?->email,
            'content' => (string) $this->content,
            'created_at' => $this->created_at->timestamp,
        ];
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(ConcernComment::class);
    }
}
