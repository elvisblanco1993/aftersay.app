<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\EnsureTenantIsSetup;
use App\Http\Middleware\EnsureTenantIsSubscribed;
use App\Livewire\Settings\ApiTokens;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Tenant;
use Illuminate\Support\Facades\Route;

Route::view('/', 'website.home')->name('home');

Route::get('join', \App\Livewire\Waitlist\Join::class)->name('waitlist.join');

/**
 * Client Public Routes
 * This is where you record the routes for public business pages.
 */
Route::get('/r/{slug}/', \App\Livewire\Page\Show::class)->name('review-page.show');
Route::get('/r/{slug}/l/{ulid}', [PageController::class, 'linkRedirect'])->name('review-page.link');

Route::middleware(['auth'])->group(function () {

    Route::get('onboard', \App\Livewire\Onboard\Tenant::class)->name('onboard.tenant');
    Route::redirect('settings', 'settings/profile');

    Route::middleware([
        'verified',
        EnsureTenantIsSetup::class,
        EnsureTenantIsSubscribed::class,
    ])->group(function () {

        Route::get('dashboard', \App\Livewire\Dashboard\Show::class)->name('dashboard');

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

        /**
         * Settings
         */
        Route::prefix('settings')->group(function () {
            Route::get('tenant', Tenant::class)->name('settings.tenant');
            Route::get('page', \App\Livewire\Page\Manage::class)->name('settings.page');
            Route::get('platforms', \App\Livewire\Platform\Index::class)->name('settings.platforms');
            Route::get('api-tokens', ApiTokens::class)->name('settings.api-tokens');
            Route::get('profile', Profile::class)->name('settings.profile');
            Route::get('password', Password::class)->name('settings.password');

            Route::get('billing', \App\Livewire\Billing\Dashboard::class)->name('billing.dashboard');
            Route::get('billing/plans', \App\Livewire\Billing\Plans::class)->name('billing.plans');
            Route::get('billing/portal', [BillingController::class, 'billingPortal'])->name('billing.portal');
            Route::get('billing/plans/update', [BillingController::class, 'updatePlan'])->name('billing.update-plan');
        });

    });
});

require __DIR__.'/auth.php';
