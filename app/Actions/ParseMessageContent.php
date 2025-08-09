<?php

namespace App\Actions;

use App\Models\Contact;
use App\Models\Tenant;

class ParseMessageContent
{
    public function __invoke(string $content, Contact $contact, Tenant $tenant)
    {
        $shortcodes = [
            '[first_name]',
            '[last_name]',
            '[company_name]',
            '[business_type]',
        ];

        $data = [
            $contact->first_name,
            $contact->last_name,
            $tenant->name,
            $tenant->industry,
        ];

        return str_replace($shortcodes, $data, $content);
    }
}
