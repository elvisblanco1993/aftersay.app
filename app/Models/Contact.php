<?php

namespace App\Models;

use App\Enums\SequenceStatus;
use App\Models\Scopes\ContactScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

#[ScopedBy(ContactScope::class)]
class Contact extends Model
{
    use Notifiable;
    use Searchable;

    public function toSearchableArray(): array
    {
        return [
            'id' => (string) $this->id,
            'tenant_id' => (string) $this->tenant_id,
            'name' => (string) $this->full_name,
            'email' => (string) $this->email,
            'phone' => (string) $this->phone,
            'created_at' => $this->created_at->timestamp,
        ];
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function sequences(): HasMany
    {
        return $this->hasMany(Sequence::class);
    }

    public function getActiveSequencesAttribute()
    {
        return $this->sequences->where('status', SequenceStatus::Running);
    }

    public function concerns(): HasMany
    {
        return $this->hasMany(Concern::class);
    }
}
