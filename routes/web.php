<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Platforms;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Tenant;
use Illuminate\Support\Facades\Route;

Route::view('/', 'website.home')->name('home');

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
        Route::get('clients', \App\Livewire\Client\Index::class)->name('client.index');
    });

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/tenant', Tenant::class)->name('settings.tenant');
    Route::get('settings/platforms', Platforms::class)->name('settings.platforms');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
require __DIR__.'/billing.php';
