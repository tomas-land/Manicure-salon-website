<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::resource('/admin/clients', App\Http\Controllers\ClientController::class);
    Route::resource('/admin/visits', App\Http\Controllers\VisitController::class);
    Route::get('/admin/calendar', [App\Http\Controllers\CalendarController::class, 'index']);
    Route::post('/admin/calendar/action', [App\Http\Controllers\CalendarController::class, 'action']);
    Route::get('/admin/finance', [App\Http\Controllers\FinanceController::class, 'index'])->name('finance');
    Route::get('/admin/statistics', [App\Http\Controllers\StatisticsController::class, 'index'])->name('statistics');

});

Route::resource('paslaugos', App\Http\Controllers\ServiceController::class);
Route::resource('galerija', App\Http\Controllers\GalleryController::class);

// curl -u "50ffa6fe:pYarAQx6YzJSmBoW" \
//      "https://api.nexmo.com/v2/reports/records?account_id=abcd1234&product=MESSAGES&direction=outbound&date_start=2022-06-01T00:01:00Z"
//      https://api.nexmo.com/v2/reports/records?api_key=50ffa6fe&api_secret=pYarAQx6YzJSmBoW