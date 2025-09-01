<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'website.home')->name('home');
Route::get('/join', \App\Livewire\Waitlist\Join::class)->name('waitlist.join');
Route::view('/about', 'website.privacy')->name('about');
Route::view('/pricing', 'website.privacy')->name('pricing');
Route::view('/privacy', 'website.privacy')->name('privacy');
Route::view('/terms', 'website.terms')->name('terms');
