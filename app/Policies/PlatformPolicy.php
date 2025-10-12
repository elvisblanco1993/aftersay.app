<?php

namespace App\Policies;

use App\Models\Platform;
use App\Models\User;

class PlatformPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Platform $platform): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $tenant = $user->currentTenant;

        $currentCount = $tenant->platforms->count(); // adjust relationship name

        if ($tenant->onTrial()) {
            return $currentCount < config('internal.plans.50.max_review_platforms');
        }

        if ($tenant->subscribed()) {
            $maxItems = $tenant->planConfig()['max_review_platforms'];

            return is_null($maxItems) || $currentCount < $maxItems;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Platform $platform): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Platform $platform): bool
    {
        return $user->current_tenant_id === $platform->tenant_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Platform $platform): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Platform $platform): bool
    {
        return false;
    }
}
