<?php

namespace App\Models;

use App\Models\Scopes\ConcernScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ScopedBy(ConcernScope::class)]
class Concern extends Model
{
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
}
