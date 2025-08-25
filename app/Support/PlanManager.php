<?php

namespace App\Support;

class PlanManager
{
    public static function getPlanConfig(string $plan): array
    {
        $plans = config('internal.plans');

        return $plans[$plan] ?? [];
    }

    public static function allows(string $plan, string $feature): bool
    {
        $config = self::getPlanConfig($plan);

        return $config[$feature] ?? false;
    }

    public static function limit(string $plan, string $limit): int
    {
        $config = self::getPlanConfig($plan);

        return $config[$limit] ?? -1;
    }

    // Helpers for tenant-aware checks (if using Cashier subscriptions)
    public static function allowsTenant($tenant, string $feature): bool
    {
        $plan = $tenant->currentPlanKey();

        return self::allows($plan, $feature);
    }

    public static function limitTenant($tenant, string $limit): int
    {
        $plan = $tenant->currentPlanKey();

        return self::limit($plan, $limit);
    }
}
