<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'website.home')->name('home');
Route::view('/about', 'website.about')->name('about');
Route::view('/privacy', 'website.privacy')->name('policy');
Route::view('/terms', 'website.terms')->name('terms');
Route::get('/join', \App\Livewire\Waitlist\Join::class)->name('waitlist.join');
