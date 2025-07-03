<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('billing', function (Request $request) {
    return $request->user()->currentTenant->redirectToBillingPortal(
        returnUrl: route('dashboard')
    );
})->middleware(['auth']);
