<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

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


Route::get('/', [EventController::class, 'showEventCardList']);

Auth::routes();
Route::group(['middleware' => 'auth'],function()
{
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/eventos', [EventController::class, 'showEventCardList']);
    Route::get('/evento/{id}', [EventController::class, 'showEvent']);
    Route::get('/event/get/{id}', [EventController::class, 'getEventById']);
    Route::get('/user/get/{id}', [UserController::class, 'getUserById']);
    Route::post('/event/booking/{id}', [EventController::class, 'confirmEventBooking']);
    Route::resource('/event', EventController::class);
    Route::resource('/user', UserController::class);
});