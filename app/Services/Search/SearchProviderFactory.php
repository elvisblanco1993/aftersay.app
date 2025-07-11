<?php

namespace App\Services\Search;

use App\Services\Search\Contracts\SearchProviderInterface;
use App\Services\Search\Providers\GoogleSearchService;

class SearchProviderFactory
{
    public static function make(string $provider): SearchProviderInterface
    {
        return match (strtolower($provider)) {
            'google' => new GoogleSearchService,
            default => throw new \InvalidArgumentException("Unsupported search provider: $provider"),
        };
    }
}
