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
    
    // Instructors Management
    Route::get('/instructors', \App\Livewire\Admin\Instructors\Index::class)->name('instructors');
    
    // Videos Management
    Route::get('/videos', \App\Livewire\Admin\Videos\Index::class)->name('videos');
    
    // FAQs Management
    Route::get('/faqs', \App\Livewire\Admin\Faqs\Index::class)->name('faqs');
    
    // Pages Management (Rules, etc.)
    Route::get('/pages', \App\Livewire\Admin\Pages\Index::class)->name('pages');
    
    // Settings Management
    Route::get('/settings', \App\Livewire\Admin\Settings\Index::class)->name('settings');
});
