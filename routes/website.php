<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'website.home')->name('home');
Route::redirect('/', '/join')->name('home');
Route::view('/about', 'website.privacy')->name('about');
Route::view('/pricing', 'website.privacy')->name('pricing');
Route::view('/privacy', 'website.privacy')->name('policy');
Route::view('/terms', 'website.terms')->name('terms');
Route::get('/join', \App\Livewire\Waitlist\Join::class)->name('waitlist.join');
