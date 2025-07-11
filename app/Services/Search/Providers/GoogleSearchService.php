<?php

namespace App\Services\Search\Providers;

use App\Services\Search\Contracts\SearchProviderInterface;
use App\Services\Search\SearchResult;
use Illuminate\Support\Facades\Http;

class GoogleSearchService implements SearchProviderInterface
{
    public function search(string $query): array
    {
        $config = config('services.google');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Goog-Api-Key' => $config['places_api_key'],
            'X-Goog-FieldMask' => $config['places_fields_mask'],
        ])->post($config['places_base_url'], [
            'textQuery' => $query,
        ]);

        $data = $response->json();

        return collect($data['places'] ?? [])->map(function ($place) {
            return new SearchResult(
                provider: 'google',
                id: $place['id'] ?? '',
                name: $place['displayName']['text'] ?? '',
                address: $place['formattedAddress'] ?? '',
            );
        })->all();
    }
}
