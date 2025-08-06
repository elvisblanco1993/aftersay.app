<?php

namespace App\Actions;

use App\Models\Contact;
use App\Models\Template;

class ParseMessageContent
{
    public function __invoke(Template $template, Contact $contact)
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
            $template->tenant->name,
            $template->tenant->industry,
        ];

        return str_replace($shortcodes, $data, $template->body);
    }
}
