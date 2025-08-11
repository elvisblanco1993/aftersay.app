<?php

use App\Http\Middleware\EnsureTenantIsSetup;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'website.home')->name('home');

Route::get('join', \App\Livewire\Waitlist\Join::class)->name('waitlist.join');

/**
 * Client Public Routes
 * This is where you record the routes for public business pages.
 */
Route::get('/p/{slug}', \App\Livewire\Page\Show::class)->name(
    'review-page.show',
);

Route::middleware(['auth'])->group(function () {

    Route::get('onboard', \App\Livewire\Onboard\Tenant::class)->name('onboard.tenant');

    Route::middleware([
        'verified',
        EnsureTenantIsSetup::class,
    ])->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');

        /**
         * Client management routes
         */
        Route::get('contacts', \App\Livewire\Contact\Index::class)->name('contact.index');
        Route::get('contacts/{contact}', \App\Livewire\Contact\Show::class)->name('contact.show');

        /**
         * Link management routes
         */
        Route::get('workflows', \App\Livewire\Workflow\Index::class)->name('workflow.index');
        Route::get('workflows/{workflow}', \App\Livewire\Workflow\Show::class)->name('workflow.show');

        /**
         * Template management routes
         */
        Route::get('templates', \App\Livewire\Template\Index::class)->name('template.index');
        Route::get('templates/{template}/update', \App\Livewire\Template\Update::class)->name('template.update');
    });

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/tenant', Tenant::class)->name('settings.tenant');
    Route::get('settings/page', \App\Livewire\Page\Manage::class)->name('settings.page');
    Route::get('settings/platforms', \App\Livewire\Platform\Index::class)->name('settings.platforms');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('billing', function (Request $request) {
        return $request
            ->user()
            ->currentTenant->redirectToBillingPortal(
                returnUrl: route('settings.tenant'),
            );
    })->name('billing-portal');
});

require __DIR__.'/auth.php';
