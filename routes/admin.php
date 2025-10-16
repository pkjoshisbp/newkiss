<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
    
    // Slides Management
    Route::get('/slides', \App\Livewire\Admin\Slides\Index::class)->name('slides');
    
    // Locations Management
    Route::get('/locations', \App\Livewire\Admin\Locations\Index::class)->name('locations');
    
    // Pricing Management
    Route::get('/pricing', \App\Livewire\Admin\Pricing\Index::class)->name('pricing');
    
    // Programs Management
    Route::get('/programs', \App\Livewire\Admin\Programs\Index::class)->name('programs');
    
    // Videos Management
    Route::get('/videos', \App\Livewire\Admin\Videos\Index::class)->name('videos');
    
    // Settings Management
    Route::get('/settings', \App\Livewire\Admin\Settings\Index::class)->name('settings');
});
