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
        ];

        $url = Uri::of(route('review-page.show', ['slug' => $tenant?->page->slug]))
            ->withQuery([
                'ref' => $contact->ulid,
            ]);

        $data = [
            $contact->first_name ?? null,
            $contact->last_name ?? null,
            $contact->email ?? null,
            $contact->phone ?? null,
            $tenant->name ?? null,
            $tenant->industry ?? null,
            "<a href='".($url ?? '#')."'><strong>Leave us a Review</strong></a>",
        ];

        return str_replace($shortcodes, $data, $content);
    }
}
