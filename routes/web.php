<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;

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
    Route::get('/locations', function () {
        return view('pages.about.locations');
    })->name('about.locations');
    
    Route::get('/pricing', function () {
        return view('pages.about.pricing');
    })->name('about.pricing');
    
    Route::get('/instructors', function () {
        return view('pages.about.instructors');
    })->name('about.instructors');
    
    Route::get('/rules', function () {
        return view('pages.about.rules');
    })->name('about.rules');
    
    Route::get('/videos', function () {
        return view('pages.about.videos');
    })->name('about.videos');
    
    Route::get('/qa', function () {
        return view('pages.about.qa');
    })->name('about.qa');
});

// Programs routes
Route::group(['prefix' => 'programs'], function () {
    Route::get('/survival', function () {
        return view('pages.programs.survival');
    })->name('programs.survival');
    
    Route::get('/continuing', function () {
        return view('pages.programs.continuing');
    })->name('programs.continuing');
});

// Contact route
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
