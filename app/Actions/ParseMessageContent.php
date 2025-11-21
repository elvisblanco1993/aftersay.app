<?php

namespace App\Actions;

use App\Models\Contact;
use App\Models\Tenant;
use Illuminate\Support\Uri;

class ParseMessageContent
{
    public function __invoke(string $content, Contact $contact, Tenant $tenant)
    {
        $shortcodes = [
            '[first_name]',
            '[last_name]',
            '[email]',
            '[phone]',
            '[company_name]',
            '[business_type]',
            '[feedback_url]',
            '[testimonial_url]',
        ];

        $feedback_url = Uri::of(route('review-page.show', ['slug' => $tenant?->page->slug]))
            ->withQuery([
                'ref' => $contact->ulid ?: $contact->id,
            ]);

        $testimonial_url = Uri::of(route('testimonial-page.show', ['slug' => $tenant?->page?->slug]));

        $data = [
            $contact->first_name ?? null,
            $contact->last_name ?? null,
            $contact->email ?? null,
            $contact->phone ?? null,
            $tenant->name ?? null,
            $tenant->industry ?? null,
            "<a href='".($feedback_url ?? '#')."'><strong>Leave Us a Quick Review</strong></a>",
            "<a href='".($testimonial_url ?? '#')."'><strong>Share Your Story With Others</strong></a>",
        ];

        return str_replace($shortcodes, $data, $content);
    }
}
