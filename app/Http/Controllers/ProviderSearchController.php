<?php

namespace App\Http\Controllers;

use App\Services\Search\SearchProviderFactory;
use Illuminate\Http\Request;

class ProviderSearchController extends Controller
{
    public function search(string $provider, Request $request)
    {
        $query = $request->input('query');

        if (! $query) {
            return response()->json(['error' => 'Query is required.'], 422);
        }

        try {
            $service = SearchProviderFactory::make($provider);
            $results = $service->search($query);

            return response()->json(collect($results)->map->toArray());
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Search failed.'], 500);
        }
    }
}
