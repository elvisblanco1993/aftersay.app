<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Testimonial extends Model
{
    use Searchable;

    public function toSearchableArray(): array
    {
        return [
            'id' => (string) $this->id,
            'tenant_id' => (string) $this->tenant_id,
            'title' => (string) $this->title,
            'content' => (string) $this->content,
            'author_name' => (string) $this->author_name,
            'author_title' => (string) $this->author_title,
            'company' => (string) $this->company,
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

    public function getAuthorHeadshotAttribute()
    {
        $cacheKey = "testimonial_author_headshot_url:{$this->id}";

        return Cache::remember($cacheKey, now()->addMinutes(9), function () {
            if ($this->headshot_url) {
                return Storage::temporaryUrl($this->headshot_url, now()->addMinutes(10));
            } else {
                $slug = str($this?->author_name)->slug();

                return "https://avatars.laravel.cloud/{$slug}";
            }
        });

        return '';
    }
}
