<?php

namespace App\Actions;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class DeleteContact
{
    public function execute(Contact $contact)
    {
        return DB::transaction(function () use ($contact) {
            $contact->delete();
        });
    }
}
