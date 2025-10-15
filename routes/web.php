<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\Pages\About\{Locations as AboutLocations, Pricing as AboutPricing, Instructors as AboutInstructors, Rules as AboutRules, Videos as AboutVideos, QA as AboutQA};
use App\Livewire\Pages\Programs\{Survival as ProgramsSurvival, Continuing as ProgramsContinuing};
use App\Livewire\Pages\ContactPage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePage::class)->name('home');

// About routes
Route::group(['prefix' => 'about'], function () {
    Route::get('/locations', AboutLocations::class)->name('about.locations');
    Route::get('/pricing', AboutPricing::class)->name('about.pricing');
    Route::get('/instructors', AboutInstructors::class)->name('about.instructors');
    Route::get('/rules', AboutRules::class)->name('about.rules');
    Route::get('/videos', AboutVideos::class)->name('about.videos');
    Route::get('/qa', AboutQA::class)->name('about.qa');
});

// Programs routes
Route::group(['prefix' => 'programs'], function () {
    Route::get('/survival', ProgramsSurvival::class)->name('programs.survival');
    Route::get('/continuing', ProgramsContinuing::class)->name('programs.continuing');
});

// Contact route
Route::get('/contact', ContactPage::class)->name('contact');
