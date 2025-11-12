<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Page extends Model
{
    /**
     * Generates a unique slug for a given title and tenant.
     */
    public static function generateUniqueSlug(string $page_name, int $tenantId): string
    {
        $slug = Str::slug($page_name);

        // If the base slug exists, append the tenant ID.
        if (static::where('slug', $slug)->exists()) {
            return $slug.'-'.$tenantId;
        }

        // Otherwise, return the unique base slug.
        return $slug;
    }

    public function getLogoUrlAttribute()
    {
        $cacheKey = "tenant_logo_url:{$this->id}";

        if ($this->logo) {
            $logo = Storage::temporaryUrl($this->logo, now()->addMinutes(10));
        } else {
            $logo = "https://avatars.laravel.cloud/{$this?->slug}";
        }

        return Cache::remember($cacheKey, now()->addMinutes(9), function () use ($logo) {
            return $logo;
        });

        return '';
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
