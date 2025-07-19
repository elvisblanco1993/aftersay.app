<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Cashier\Billable;

use function Illuminate\Events\queueable;

class Tenant extends Model
{
    use Billable;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::updated(
            queueable(function (Tenant $customer) {
                if ($customer->hasStripeId()) {
                    $customer->syncStripeCustomerDetails();
                }
            }),
        );
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('permissions')
            ->withTimestamps();
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function platforms(): HasMany
    {
        return $this->hasMany(Platform::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function concerns(): HasMany
    {
        return $this->hasMany(Concern::class);
    }

    public function page(): HasOne
    {
        return $this->hasOne(Page::class);
    }
}
