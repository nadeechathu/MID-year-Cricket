<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'getAllPublishedFeaturedPosts'])->name('web.home');
Route::post('/subscribe', [App\Http\Controllers\Frontend\HomeController::class, 'subscribe'])->name('web.subscribe');


Route::get('/forgot-password', [App\Http\Controllers\Frontend\AuthController::class, 'forgotPasswordUI'])->name('web.password.forgot');
Route::post('/forgot-password', [App\Http\Controllers\Frontend\AuthController::class, 'forgotPassword'])->name('web.password.reset');
Route::get('/reset-password/{token}', [App\Http\Controllers\Frontend\AuthController::class, 'resetPassword'])->name('web.password.resetUI');
Route::post('/reset-password', [App\Http\Controllers\Frontend\AuthController::class, 'changePassword'])->name('web.password.change');



//blog
Route::get('/news',[App\Http\Controllers\Frontend\PageController::class, 'loadNews'])->name('web.news');
Route::get('/news/{slug}',[App\Http\Controllers\Frontend\PageController::class, 'singleNews'])->name('web.single_news');
Route::get('/contact-us', [App\Http\Controllers\Frontend\PageController::class, 'loadContactUs'])->name('web.contact_us');
Route::post('/contact-us', [App\Http\Controllers\Frontend\PageController::class, 'contactSubmit'])->name('web.contactsubmit');
Route::get('/about-us', [App\Http\Controllers\Frontend\PageController::class, 'loadAboutUs'])->name('web.about_us');
// Gallery
Route::get('/gallery',[App\Http\Controllers\Frontend\PageController::class, 'loadGallery'])->name('web.gallery');

// Events
Route::get('/events',[App\Http\Controllers\Frontend\PageController::class, 'loadEventsArchive'])->name('web.events.archive');
Route::get('/events/{slug}',[App\Http\Controllers\Frontend\PageController::class, 'loadEventsSingle'])->name('web.events.single');

Route::post('/subscribe', [App\Http\Controllers\Frontend\HomeController::class, 'subscribe'])->name('web.subscribe');

// Club Contacts
Route::get('/club-contacts',[App\Http\Controllers\Frontend\PageController::class, 'loadClubContacts'])->name('web.club.contacts');


Route::get('/season-calender',[App\Http\Controllers\Frontend\PageController::class, 'loadSeasonCalender'])->name('web.season.calender');
Route::get('/get_eventData',[App\Http\Controllers\Frontend\PageController::class, 'getEventData'])->name('web.get.eventData');
Route::get('/load_eventData/{id}',[App\Http\Controllers\Frontend\PageController::class, 'loadEventData'])->name('web.loadEventData');


// rules and regulations
Route::get('/rules-and-regulations',[App\Http\Controllers\Frontend\PageController::class, 'loadRuleRegulations'])->name('web.rules.regulations');

// resources
Route::get('/resources',[App\Http\Controllers\Frontend\PageController::class, 'loadResources'])->name('web.resources');
