<?php

namespace App\Http\Controllers;

use App\Enums\CampaignStatus;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\LinkClick;
use App\Models\Page;
use App\Models\Platform;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function linkRedirect(Request $request)
    {
        // TODO: Make sure this is not a bot

        $link = Platform::where('ulid', $request->ulid)->first();
        $ref = request(key: 'ref');

        $contact = $ref ? Contact::where('ulid', $ref)->first() : null;

        // Record the click
        defer(function () use ($link, $contact) {
            LinkClick::create([
                'tenant_id' => $link->tenant_id,
                'platform_id' => $link->id,
                'contact_id' => $contact?->id,
                'created_at' => now(),
            ]);

            // Stop Campaign
            if ($contact->exists()) {
                Campaign::where('contact_id', $contact?->id)
                    ->update([
                        'status' => CampaignStatus::Completed,
                        'next_run_at' => null,
                    ]);
            }
        });

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
