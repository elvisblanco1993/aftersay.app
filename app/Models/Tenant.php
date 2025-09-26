<?php

namespace App\Models;

use App\Support\PlanManager;
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

    protected $casts = [
        'trial_ends_at' => 'datetime',
    ];

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

    public function currentPlanKey(): ?string
    {
        // If trial, assume they are trialing on the plan they signed up for
        if ($this->onTrial()) {
            return '50';
        }

        // Fallback to active subscription
        if ($this->subscribed('default')) {
            $priceId = $this->subscription('default')->stripe_price;

            foreach (config('internal.plans') as $key => $plan) {
                if ($plan['stripe_price_id_monthly'] === $priceId || $plan['stripe_price_id_annual'] === $priceId) {
                    return $key;
                }
            }
        }

        return null;
    }

    public function planConfig(): array
    {
        $plan_key = $this->currentPlanKey() ?? '50';

        return PlanManager::getPlanConfig($plan_key);
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

    public function campaigns(): HasMany
    {
        return $this->hasMany(Campaign::class);
    }

    public function linkClicks(): HasMany
    {
        return $this->hasMany(LinkClick::class);
    }

    public function concerns(): HasMany
    {
        return $this->hasMany(Concern::class);
    }

    public function page(): HasOne
    {
        return $this->hasOne(Page::class);
    }

    public function workflows(): HasMany
    {
        return $this->hasMany(Workflow::class);
    }

    public function templates(): HasMany
    {
        return $this->hasMany(Template::class);
    }
}
