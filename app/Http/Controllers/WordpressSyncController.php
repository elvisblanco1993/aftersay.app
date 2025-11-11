<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class WordpressSyncController extends Controller
{
    public function index(Request $request, Tenant $tenant)
    {
        if (! $request->user()->tenants->contains($tenant)) {
            abort(403);
        }

        $query = Testimonial::query()
            ->where('is_approved', true) // Only send approved testimonials
            ->orderBy('created_at', 'desc');

        // Return all testimonials
        $testimonials = $query->get();

        // Transform to WordPress-friendly format
        return $testimonials->map(function ($testimonial) {
            return [
                'id' => $testimonial->id,
                'title' => $testimonial->title,
                'content' => $testimonial->content,
                'author_name' => $testimonial->author_name,
                'author_title' => $testimonial->author_title,
                'company' => $testimonial->company,
                'date_given' => $testimonial->created_at->format('Y-m-d'),
                'featured' => (bool) $testimonial->is_featured,
                'headshot_url' => $testimonial->headshot_url
                    ? $testimonial->author_headshot
                    : null,
            ];
        });
    }
}
