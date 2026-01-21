<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'website.home')->name('home');
Route::view('/about', 'website.about')->name('about');
Route::view('/privacy', 'website.privacy')->name('policy');
Route::view('/terms', 'website.terms')->name('terms');
Route::get('/join', \App\Livewire\Waitlist\Join::class)->name('waitlist.join');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
