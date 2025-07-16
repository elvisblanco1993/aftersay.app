<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
