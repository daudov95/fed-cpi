<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactsController;
use App\Http\Controllers\Frontend\DetailsController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\ExcursionController;
use App\Http\Controllers\Frontend\LegislationController;
use App\Http\Controllers\Frontend\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.pages.excursions');
});

/* Routs for guests */
Route::middleware('guest')->group(function () {

    /* Excursion */
    Route::get('/', [ExcursionController::class, 'index'])->name('index');
    Route::get('/excursions', [ExcursionController::class, 'index'])->name('excursions');
    Route::get('/excursions/{id}', [ExcursionController::class, 'single'])->name('single-excursion');

    /* Event */
    Route::get('/events', [EventController::class, 'index'])->name('events');

    /* About */
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    /* Payment */
    Route::get('/details/payment', [DetailsController::class, 'payment'])->name('payment');

    /* Details */
    Route::get('/details', [DetailsController::class, 'index'])->name('details');

    /* legislation */
    Route::get('/legislation', [LegislationController::class, 'index'])->name('legislation');

    /* Contact */
    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');

});

/* Routes for admin */
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /* Dashboard */
    Route::get('/', [AdminController::class, 'index'])->name('index');

    /* Excursion */
    Route::group(['prefix' => 'excursion', 'as' => 'excursion.'], function () {
        Route::get('/', [AdminController::class, 'excursion'])->name('index');
        Route::get('/create', [AdminController::class, 'excursionCreate'])->name('create');
        Route::get('/edit/{id}', [AdminController::class, 'excursionEdit'])->name('edit');
        Route::post('/store', [AdminController::class, 'excursionStore'])->name('store');
        Route::post('/update', [AdminController::class, 'excursionUpdate'])->name('update');
        Route::post('/delete', [AdminController::class, 'excursionDelete'])->name('delete');
        Route::post('/image/delete', [AdminController::class, 'excursionDeleteImage'])->name('delete.image');
        Route::get('/edit/{id}/schedule', [AdminController::class, 'excursionSchedule'])->name('schedule.index');
    });


    /* Others */
})->middleware('guest');
