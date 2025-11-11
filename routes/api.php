<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\WordpressSyncController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/contacts', [ContactController::class, 'store'])->name('api.contacts.create');

    Route::get('/testimonials/{tenant}', [WordpressSyncController::class, 'index'])->name('api.testimonials');

    Route::get('/me', function (Request $request) {
        return response()->json([
            'id' => $request->user()->id,
            'name' => $request->user()->name,
            'email' => $request->user()->email,
        ]);
    });
});
