<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('flights', App\Http\Controllers\FlightController::class)->only(['index']);
Route::get('flights/departure-locations', [App\Http\Controllers\FlightController::class, 'getDepartureLocations']);
Route::get('flights/destination-locations', [App\Http\Controllers\FlightController::class, 'getDestinationLocations']);
Route::get('flights/{id}/detail', [App\Http\Controllers\FlightController::class, 'showDetail'])->name('flights.detail');

Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

