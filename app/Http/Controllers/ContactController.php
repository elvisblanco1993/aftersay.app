<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $validated['ulid'] = Str::ulid();
        $validated['phone'] = $request->phone;

        $contact = $request->user()->currentTenant->contacts()->create($validated);

        return response()->json([
            'message' => 'Contact created successfully.',
            'contact' => $contact,
        ], 201);
    }
}
