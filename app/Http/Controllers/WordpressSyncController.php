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

        $testimonials = [];

        for ($i = 0; $i < 20; $i++) {
            $testimonials[] = [
                'id' => $i + 1,
                'title' => 'Great Service!',
                'content' => 'This was an amazing experience...',
                'author_name' => 'John Doe',
                'author_title' => 'CEO',
                'company' => 'Acme Corp',
                'rating' => 5,
                'date_given' => '2024-01-15',
                'featured' => true,
                'headshot_url' => 'https://example.com/images/john.jpg',
            ];
        }

        return $testimonials;

        $query = Testimonial::query()
            ->where('status', 'approved') // Only send approved testimonials
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
                'rating' => $testimonial->rating,
                'date_given' => $testimonial->created_at->format('Y-m-d'),
                'featured' => (bool) $testimonial->featured,
                'headshot_url' => $testimonial->headshot_url
                    ? asset('storage/'.$testimonial->headshot_url)
                    : null,
            ];
        });
    }
}
