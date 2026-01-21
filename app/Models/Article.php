<?php

namespace App\Models;

use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $casts = [
        'status' => ArticleStatus::class,
        'published_at' => 'datetime',
    ];
}
