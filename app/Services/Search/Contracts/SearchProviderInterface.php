<?php

namespace App\Services\Search\Contracts;

interface SearchProviderInterface
{
    /**
     * Search for places and return standardized results.
     *
     * @return SearchResult[]
     */
    public function search(string $query): array;
}
