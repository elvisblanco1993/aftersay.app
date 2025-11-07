<?php

namespace App\Http\Controllers;

use App\Enums\CampaignStatus;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\LinkClick;
use App\Models\Page;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function linkRedirect(Request $request)
    {
        $link = Platform::where('ulid', $request->ulid)->firstOrFail();
        $ref = $request->query('ref');

        $contact = $ref ? Contact::where('ulid', $ref)->first() : null;

        try {
            LinkClick::create([
                'tenant_id' => $link->tenant_id,
                'platform_id' => $link->id,
                'contact_id' => $contact?->id,
                'created_at' => now(),
            ]);

            // Stop Campaign if a valid contact exists
            if ($contact && $contact->exists) {
                Campaign::where('contact_id', $contact->id)->update([
                    'status' => CampaignStatus::Completed,
                    'next_run_at' => null,
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('Deferred linkRedirect error: '.$e->getMessage());
        }

        return redirect()->away($link->url);
    }

    /**
     * Clients are redirected here after they submit feedback.
     */
    public function formCompleted($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('website.thank-you', [
            'title' => 'How did we do? | '.$page->tenant->name,
            'page' => $page,
        ]);
    }
}
