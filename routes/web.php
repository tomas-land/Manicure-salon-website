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


    

});

Route::resource('paslaugos', App\Http\Controllers\ServiceController::class);
Route::resource('galerija', App\Http\Controllers\GalleryController::class);
