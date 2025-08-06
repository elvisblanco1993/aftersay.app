<?php

namespace App\Models;

use App\Models\Scopes\ContactScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
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

    // Send twilio notifications to the contact's phone number.
    public function routeNotificationForTwilio()
    {
        return (string) $this->phone;
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function workflowInstance(): HasOne
    {
        return $this->hasOne(WorkflowInstance::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function concerns(): HasMany
    {
        return $this->hasMany(Concern::class);
    }
}
