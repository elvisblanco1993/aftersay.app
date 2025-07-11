<?php

namespace App\Services\Search;

class SearchResult
{
    public function __construct(
        public string $provider,
        public string $id,
        public string $name,
        public string $address,
    ) {}

    public function toArray(): array
    {
        return [
            'provider' => $this->provider,
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
        ];
    }
}
