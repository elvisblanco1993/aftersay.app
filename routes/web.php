<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'website.home')->name('home');

/**
 * Client Public Routes
 * This is where you record the routes for public business pages.
 */
Route::get('/p/{slug}/{client?}', \App\Livewire\Page\Show::class)->name('review-page.show');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['verified'])->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');

        /**
         * Link management routes
         */
        Route::get('links', \App\Livewire\Link\Index::class)->name('link.index');

        /**
         * Client management routes
         */
        Route::get('conatcts', \App\Livewire\Contact\Index::class)->name('contact.index');
    });

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/tenant', Tenant::class)->name('settings.tenant');
    Route::get('settings/page', \App\Livewire\Page\Manage::class)->name('settings.page');
    Route::get('settings/platforms', \App\Livewire\Platform\Index::class)->name('settings.platforms');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('billing', function (Request $request) {
        return $request->user()->currentTenant->redirectToBillingPortal(
            returnUrl: route('settings.tenant')
        );
    })->name('billing-portal');
});

require __DIR__.'/auth.php';
