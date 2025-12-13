<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\EmailPixelController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\EnsureTenantIsSetup;
use App\Http\Middleware\EnsureTenantIsSubscribed;
use App\Livewire\Settings\ApiTokens;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Tenant;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

/**
 * Website routes are located in the "website.php" routes file.
 */
/**
 * Client Public Routes
 * This is where you record the routes for public business pages.
 */
Route::get('/r/{slug}/', \App\Livewire\Page\Review::class)->name('review-page.show');
Route::get('/r/{slug}/l/{ulid}', [PageController::class, 'linkRedirect'])->name('review-page.link');
Route::get('/r/{slug}/thank-you', [PageController::class, 'formCompleted'])->name('review-page.completed');
// Testimonial Page
Route::get('/t/{slug}/', \App\Livewire\Page\Testimonial::class)->name('testimonial-page.show');

// Email Pixel
Route::get('p/e/{token}.gif', [EmailPixelController::class, 'show'])->name('email.pixel')->middleware('signed');

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
         * Sequence routes
         */
        Route::get('sequences', \App\Livewire\Sequence\Index::class)->name('sequence.index');
        Route::get('sequences/{sequence}', \App\Livewire\Sequence\Show::class)->name('sequence.show');

        /**
         * Concern management routes
         */
        Route::get('concerns', \App\Livewire\Concern\Index::class)->name('concern.index');
        Route::get('concerns/{concern}', \App\Livewire\Concern\Show::class)->name('concern.show');

        /**
         * Testimonial management routes
         */
        Route::get('testimonials', \App\Livewire\Testimonial\Index::class)->name('testimonial.index');
        Route::get('testimonials/{testimonial}', \App\Livewire\Testimonial\Show::class)->name('testimonial.show');

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

            Route::get('two-factor', TwoFactor::class)
                ->middleware(
                    when(
                        Features::canManageTwoFactorAuthentication() &&
                            Features::optionEnabled(
                                Features::twoFactorAuthentication(),
                                'confirmPassword',
                            ),
                        ['password.confirm'],
                        [],
                    ),
                )
                ->name('two-factor.show');

            Route::get('billing', \App\Livewire\Billing\Dashboard::class)->name('billing.dashboard');
            Route::get('billing/portal', [BillingController::class, 'billingPortal'])->name('billing.portal');
            Route::get('billing/plans/update', [BillingController::class, 'updatePlan'])->name('billing.update-plan');
        });
    });
    /**
     * Billing Plans
     * This route must be here to correctly redirect users who's trial
     * period has ended and must sign up for a plan, should they
     * want to continue to use AfterSay.
     */
    Route::get('billing/plans', \App\Livewire\Billing\Plans::class)->name('billing.plans');
});

require __DIR__.'/auth.php';
require __DIR__.'/website.php';
